<?php

namespace App\Controllers;

use App\Models\AlamatModel;
use App\Models\OrderModel;
use App\Models\ProdukModel;
use App\Models\Data_orderModel;
use App\Models\FotoProdukModel;
use App\Models\GambarVerifikasiModel;
use App\Models\KomentarModel;
use App\Models\UsermenuModel;

class Penjual extends BaseController
{
    protected $datavalid;
    protected $datalogin;
    protected $produkModel;
    protected $fotoProdukModel;
    protected $gambarVerifikasiModel;
    protected $usermenuModel;
    protected $orderModel;
    protected $dataOrderModel;
    protected $alamatModel;
    protected $komentarModel;

    public function __construct()
    {
        $this->datavalid = \Config\Services::validation();
        $this->datalogin = new Auth();
        $this->produkModel = new ProdukModel();
        $this->produkModel = new ProdukModel();
        $this->fotoProdukModel = new FotoProdukModel();
        $this->gambarVerifikasiModel = new GambarVerifikasiModel();
        $this->orderModel = new OrderModel();
        $this->dataOrderModel = new Data_orderModel();
        $this->alamatModel = new AlamatModel();
        $this->komentarModel = new KomentarModel();
        $this->datalogin->permission();

        if (!session()->has('email')) {
            return redirect(base_url());
        }
    }

    public function index()
    {
        $produk = $this->produkModel->join('kategori', 'kategori.id = produk.id_kategori')->join('foto_produk', 'foto_produk.id_produk = produk.id')->where('id_user', $this->datalogin->datauser['id'])->findAll();
        // dd($produk);
        $data = [
            'title' => 'Penjual',
            'user' => $this->datalogin->datauser,
            'validation' => $this->datalogin->datavalid,
            'menu' => $this->datalogin->menu,
            'submenu' => $this->datalogin->submenu,
            'produk' => $produk
        ];
        return view('admin/admin', $data);
    }

    public function single($slug)
    {
        // echo $slug;
        $produk = $this->produkModel->join('foto_produk', 'foto_produk.id_produk = produk.id')->where('slug', $slug)->where('id_user', $this->datalogin->datauser['id'])->first();
        $komentar = $this->komentarModel->where('id_produk', $produk['id_produk'])->findAll();
        $data = [
            'title' => $slug,
            'validation' => $this->datalogin->datavalid,
            'user' => $this->datalogin->datauser,
            'produk' => $produk,
            'komentar' => $komentar
        ];
        // dd($data);
        return view('single', $data);
    }

    public function order()
    {
        $order = $this->orderModel->join('user', 'user.id = orderr.id_user')->select('nama, code, total_item, total_biaya, payment_method, status_order, orderr.created_at')->findAll();
        // dd($order);

        $data = [
            'title' => 'Order',
            'user' => $this->datalogin->datauser,
            'menu' => $this->datalogin->menu,
            'submenu' => $this->datalogin->submenu,
            'order' => $order
        ];
        return view('admin/order', $data);
    }

    public function tambah()
    {
        if (!$this->validate([
            'foto' => [
                'rules' => 'max_size[foto,5120]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Maximum size is 5 Mb',
                    'is_image' => 'Please chosee image file',
                    'mime_in' => 'File should be Jpeg, Jpg and PNG'
                ]
            ]
        ])) {

            session()->setFlashdata('warning', 'There is a wrong Input, Please check it!');
            return redirect()->to('index')->withInput();
        }
        $tgl = date('m/d/Y h:i:s a', time());
        $tes = strtotime($tgl) . "-" . url_title($this->request->getPost('namaProduk'), '-', true);
        $slug = $tes;
        // echo $slug;
        // dd($this->request->getPost());
        $gambar = $this->request->getFile('foto');
        // dd($gambar);
        $namaFile = $gambar->getRandomName();
        $gambar->move('images/foto_produk', $namaFile);
        $this->produkModel->save([
            'id_kategori' => $this->request->getPost('kategori'),
            'id_user' => $this->request->getPost('iduser'),
            'slug' => $slug,
            'nama_produk' => $this->request->getPost('namaProduk'),
            'harga_produk' => $this->request->getPost('hargaProduk'),
            'status_produk' => $this->request->getPost('statusProduk'),
            'deskripsi_produk' => $this->request->getPost('deskripsi'),
            'stok' => $this->request->getPost('stok'),
        ]);

        $id = $this->produkModel->where('slug', $slug)->first();

        $this->fotoProdukModel->save([
            'id_produk' => $id['id'],
            'nama_file' => $namaFile,
            'thumb' => $namaFile,
        ]);
        session()->setFlashdata('success', 'Yeay, your new produk has added');
        return redirect()->to(base_url('penjual'));
    }

    public function editproduk($slug)
    {
        $produk = $this->fotoProdukModel->join('produk', 'produk.id = foto_produk.id_produk')->where('produk.slug', $slug)->first();
        // dd($produk);
        $data = [
            'title' => 'Edit',
            'user' => $this->datalogin->datauser,
            'validation' => $this->datalogin->datavalid,
            'menu' => $this->datalogin->menu,
            'submenu' => $this->datalogin->submenu,
            'produk' => $produk
        ];
        return view('admin/edit', $data);
    }

    public function update()
    {
        $slug = $this->request->getPost('slug');
        // dd($this->request->getPost());

        if (!$this->validate([
            'foto' => [
                'rules' => 'max_size[foto,5120]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Maximum size is 5 Mb',
                    'is_image' => 'Please chosee image file',
                    'mime_in' => 'File should be Jpeg, Jpg and PNG'
                ]
            ]
        ])) {
            session()->setFlashdata('warning', 'There is a wrong Input, Please check it!');
            return redirect()->to(base_url('penjual/edit/' . $slug))->withInput();
        }
        $gambar = $this->request->getFile('foto');
        $fileLama = $this->request->getPost('fileLama');

        if ($gambar->getError() == 4) {
            # code...
            $namaFile = $fileLama;
        } else {
            $namaFile = $gambar->getRandomName();
            unlink('images/foto_produk/' . $fileLama);
            $gambar->move('images/foto_produk', $namaFile);
        }
        // dd($this->request->getPost());
        $this->produkModel->save([
            'id' => $this->request->getPost('id'),
            'id_kategori' => $this->request->getPost('kategori'),
            'id_user' => $this->request->getPost('iduser'),
            'slug' => $this->request->getPost('slug'),
            'nama_produk' => $this->request->getPost('namaProduk'),
            'harga_produk' => $this->request->getPost('hargaProduk'),
            'status_produk' => $this->request->getPost('statusProduk'),
            'deskripsi_produk' => $this->request->getPost('deskripsi'),
            'stok' => $this->request->getPost('stok'),
        ]);
        $foto = [
            'nama_file' => $namaFile,
            'thumb' => $namaFile
        ];
        $this->fotoProdukModel->where('id_produk', $this->request->getPost('id'))->set($foto)->update();
        session()->setFlashdata('success', 'Success to changes');
        return redirect()->to(base_url('penjual'));
    }

    public function delete($slug)
    {
        $produk = $this->produkModel->where('slug', $slug)->first();
        $foto = $this->fotoProdukModel->where('id_produk', $produk['id'])->first();
        // $namaFile = $foto['thumb'];
        // echo $namaFile;
        unlink('images/foto_produk/' . $foto['thumb']);
        $this->fotoProdukModel->where(['id_produk' => $produk['id']])->delete();
        $this->produkModel->where(['slug' => $slug])->delete();
        session()->setFlashdata('success', 'Your product has deleted');
        return redirect()->to(base_url('penjual'));
    }

    public function detail($kode)
    {
        $pro = $this->dataOrderModel->join('produk', 'produk.id = data_order.id_produk', 'left')->join('foto_produk', 'foto_produk.id_produk = produk.id', 'left')->where('data_order.kode_order', $kode)->findAll();
        $alamat = $this->alamatModel->join('orderr', 'orderr.id = alamat.id_order')->where('kode_order', $kode)->first();
        $foto = $this->gambarVerifikasiModel->join('orderr', 'orderr.id = gambar_verifikasi.id_order')->where('kode_order', $kode)->first();
        // dd($pro);
        $data = [
            'title' => 'Detail Order ' . $kode,
            'user' => $this->datalogin->datauser,
            'validation' => $this->datalogin->datavalid,
            'menu' => $this->datalogin->menu,
            'submenu' => $this->datalogin->submenu,
            'produk' => $pro,
            'alamat' => $alamat,
            'foto' => $foto
        ];
        // echo $kode;
        return view('admin/detailorder', $data);
    }

    public function statusorder()
    {
        // dd($this->request->getPost());
        $gambar = $this->request->getFile('foto');
        if ($gambar) {
            if (!$this->validate([
                'foto' => [
                    'rules' => 'max_size[foto,5120]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Maximum size is 5 Mb',
                        'is_image' => 'Please chosee image file',
                        'mime_in' => 'File should be Jpeg, Jpg and PNG'
                    ]
                ]
            ])) {
                session()->setFlashdata('warning', 'There is a wrong Input, Please check it!');
                return redirect()->to(base_url('penjual/detail') . '/' . $this->request->getPost('kode_order'));
            }
            $namaFile = $gambar->getRandomName();
            $gambar->move('images/gambar_verifikasi', $namaFile);
            $this->gambarVerifikasiModel->save([
                'id_order' => $this->request->getPost('id'),
                'kode_order' => $this->request->getPost('kode_order'),
                'nama_file' => $namaFile,
            ]);

            $valStatus = $this->request->getPost('status');

            $status = [
                'status_order' => $valStatus
            ];
            $this->orderModel->where('code', $this->request->getPost('kode_order'))->set($status)->update();

            session()->setFlashdata('success', 'Yeay.. You ' . $valStatus . ' the order');
            return redirect()->to(base_url('penjual/detail') . '/' . $this->request->getPost('kode_order'));
        } else {
            $valStatus = $this->request->getPost('status');
            $status = [
                'status_order' => $valStatus
            ];
            $this->orderModel->where('code', $this->request->getPost('kode_order'))->set($status)->update();

            session()->setFlashdata('success', 'Yeay.. You ' . $valStatus . ' the order');
            return redirect()->to(base_url('penjual/detail') . '/' . $this->request->getPost('kode_order'));
        }
    }

    public function review($kode)
    {
        $komentar = $this->komentarModel->join('produk', 'produk.id = komentar.id_produk')->join('foto_produk', 'foto_produk.id_produk = produk.id')->where('kode_order', $kode)->findAll();
        // dd($komentar);
        $data = [
            'title' => 'Komentar Produk',
            'user' => $this->datalogin->datauser,
            'validation' => $this->datalogin->datavalid,
            'menu' => $this->datalogin->menu,
            'submenu' => $this->datalogin->submenu,
            'komentar' => $komentar
        ];
        return view('admin/komentar', $data);
    }
}
