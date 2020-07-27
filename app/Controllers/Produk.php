<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\KeranjangModel;
use App\Models\OrderModel;
use App\Models\Data_orderModel;
use App\Models\AlamatModel;
use App\Models\GambarVerifikasiModel;
use App\Models\KomentarModel;

class Produk extends BaseController
{
    protected $datalogin;
    protected $produkModel;
    protected $keranjangModel;
    protected $orderModel;
    protected $data_orderModel;
    protected $alamatModel;
    protected $gambarVerifikasiModel;
    protected $komentarModel;

    public function __construct()
    {
        $this->datalogin = new Auth();
        $this->produkModel = new ProdukModel();
        $this->keranjangModel = new KeranjangModel();
        $this->orderModel = new OrderModel();
        $this->data_orderModel = new Data_orderModel();
        $this->alamatModel = new AlamatModel();
        $this->gambarVerifikasiModel = new GambarVerifikasiModel();
        $this->komentarModel = new KomentarModel();
        $this->datalogin->permission();
    }

    public function index()
    {
        $data = [
            'title' => 'Produk',
            'validation' => $this->datalogin->datavalid,
            'user' => $this->datalogin->datauser,
            'produk' => $this->produkModel->join('foto_produk', 'foto_produk.id_produk = produk.id')->findAll()
        ];

        // dd($data);
        return   view('product', $data);
    }

    public function single($slug)
    {
        // echo $slug;
        $produk = $this->produkModel->join('foto_produk', 'foto_produk.id_produk = produk.id')->where('slug', $slug)->first();
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

    public function buah()
    {
        $data = [
            'title' => 'Produk - Buah',
            'validation' => $this->datalogin->datavalid,
            'user' => $this->datalogin->datauser,
            'produk' => $this->produkModel->join('foto_produk', 'foto_produk.id_produk = produk.id')->where('id_kategori', '1')->findAll()
        ];

        // dd($data);
        return   view('product', $data);
    }
    public function sayur()
    {
        $data = [
            'title' => 'Produk - Sayur',
            'validation' => $this->datalogin->datavalid,
            'user' => $this->datalogin->datauser,
            'produk' => $this->produkModel->join('foto_produk', 'foto_produk.id_produk = produk.id')->where('id_kategori', '2')->findAll()
        ];

        // dd($data);
        return   view('product', $data);
    }

    public function checkout()
    {
        if (session()->has('email')) {
            # code...
            $post = count($this->request->getPost());
            $d = ($post - 7) / 7;
            for ($i = 1; $i <= $d; $i++) {
                $kode = $this->request->getPost('id_user_' . $i) . '-' . $this->request->getPost('id_produk_' . $i);
                $daker = $this->keranjangModel->where('kode', $kode)->first();
                if ($daker) {
                    # code...
                    $kuantitas = $daker['kuantitas'] + $this->request->getPost('quantity_' . $i);
                    if ($daker['kode'] = $kode) {
                        $this->keranjangModel->save([
                            'id' => $daker['id'],
                            'kode' => $kode,
                            'id_user' => $this->request->getPost('id_user_' . $i),
                            'id_produk' => $this->request->getPost('id_produk_' . $i),
                            'kuantitas' => $kuantitas
                        ]);
                        # code...
                    }
                } else {
                    $kode = $this->request->getPost('id_user_' . $i) . '-' . $this->request->getPost('id_produk_' . $i);
                    $this->keranjangModel->save([
                        'kode' => $kode,
                        'id_user' => $this->request->getPost('id_user_' . $i),
                        'id_produk' => $this->request->getPost('id_produk_' . $i),
                        'kuantitas' => $this->request->getPost('quantity_' . $i)
                    ]);
                }
            }
            $keranjang = $this->keranjangModel->join('produk', 'produk.id = keranjang.id_produk')->join('foto_produk', 'foto_produk.id_produk = keranjang.id_produk')->where('keranjang.id_user', $this->datalogin->datauser['id'])->findAll();
            $data = [
                'title' => 'Check-Out',
                'validation' => $this->datalogin->datavalid,
                'user' => $this->datalogin->datauser,
                'jumlah' => $d,
                'keranjang' => $keranjang
            ];
            // dd($data['keranjang']);
            // dd($this->request->getPost());
            return   view('checkout', $data);
        } else {
            # code...
            return redirect()->to(base_url('produk'));
        }
    }

    public function delete($kode)
    {
        $this->keranjangModel->where(['kode' => $kode])->delete();
        return redirect()->to(base_url('produk/checkout'));
    }

    public function order()
    {
        if (session()->has('email')) {
            # code...
            $post = count($this->request->getPost());
            $d = ($post - 14) / 3;
            $tgl = date('m/d/Y h:i:s a', time());
            $tes = strtotime($tgl);
            $kode = $this->request->getPost('id_user') . '-' . $tes;
            // echo strtotime($tgl);
            // echo 'jumlah' . $d;
            // dd($this->request->getPost());
            $this->orderModel->save([
                'id_user' => $this->request->getPost('id_user'),
                'code' => $kode,
                'total_item' => $this->request->getPost('total_item'),
                'total_biaya' => $this->request->getPost('total_biaya'),
                'payment_method' => $this->request->getPost('methodSelect'),
                'status_order' => 'Ordered'
            ]);
            $id = $this->orderModel->where('code', $kode)->first();

            $this->alamatModel->save([
                'id_order' => $id['id'],
                'kode_order' => $kode,
                'nama_penerima' => $this->request->getPost('nama_lengkap'),
                'no_hp' => $this->request->getPost('no_hp'),
                'alamat_lengkap' => $this->request->getPost('alamat_lengkap'),
                'kode_pos' => $this->request->getPost('kode_pos'),
                'kelurahan' => $this->request->getPost('kelurahan'),
                'kecamatan' => $this->request->getPost('kecamatan'),
                'kota' => $this->request->getPost('kota'),
                'provinsi' => $this->request->getPost('provinsi'),
                'tipe_alamat' => $this->request->getPost('adrressSelect'),
            ]);

            for ($i = 1; $i <= $d; $i++) {
                $this->data_orderModel->save([
                    'id_order' => $id['id'],
                    'id_user' => $this->request->getPost('id_user'),
                    'kode_order' => $kode,
                    'id_produk' => $this->request->getPost('id_produk_' . $i),
                    'kuantitas' => $this->request->getPost('kuantitas_' . $i)
                ]);
                $this->keranjangModel->where(['id_produk' => $this->request->getPost('id_produk_' . $i),])->delete();
            }
            session()->setFlashdata('order', 'Yeay, Orderan anda akan segera diproses');
            return redirect()->to(base_url());
        } else {
            # code...
            return redirect()->to(base_url('produk'));
        }
    }

    public function orderanku()
    {
        $order = $this->orderModel->join('user', 'user.id = orderr.id_user')->select('nama, code, total_item, total_biaya, payment_method, status_order, orderr.created_at')->where('orderr.id_user', $this->datalogin->datauser['id'])->findAll();
        // dd($order);

        $data = [
            'title' => 'Orderanku',
            'user' => $this->datalogin->datauser,
            'menu' => $this->datalogin->menu,
            'submenu' => $this->datalogin->submenu,
            'order' => $order
        ];
        return view('admin/order', $data);
    }

    public function detail($kode)
    {
        // $pro = $this->data_orderModel->join('produk', 'produk.id = data_order.id_produk')->join('foto_produk', 'foto_produk.id_produk = produk.id')->where('data_order.kode_order', $kode)->where('data_order.id_user', $this->datalogin->datauser['id'])->findAll();
        $prokom = $this->data_orderModel->join('produk', 'produk.id = data_order.id_produk', 'inner')->join('foto_produk', 'foto_produk.id_produk = produk.id', 'inner')->select('nama_file, nama_produk, kuantitas, harga_produk, slug, data_order.id_produk, data_order.kode_order, data_order.id_order')->where('data_order.kode_order', $kode)->where('data_order.id_user', $this->datalogin->datauser['id'])->findAll();
        $alamat = $this->alamatModel->join('orderr', 'orderr.id = alamat.id_order')->where('kode_order', $kode)->where('orderr.id_user', $this->datalogin->datauser['id'])->first();
        $foto = $this->gambarVerifikasiModel->join('orderr', 'orderr.id = gambar_verifikasi.id_order')->where('kode_order', $kode)->where('orderr.id_user', $this->datalogin->datauser['id'])->first();
        // dd($prokom);
        $data = [
            'title' => 'Detail Order ' . $kode,
            'user' => $this->datalogin->datauser,
            'validation' => $this->datalogin->datavalid,
            'menu' => $this->datalogin->menu,
            'submenu' => $this->datalogin->submenu,
            'produk' => $prokom,
            'alamat' => $alamat,
            'foto' => $foto,
        ];
        // echo $kode;
        return view('admin/detailorder', $data);
    }

    public function statusorder()
    {
        // dd($this->request->getPost());
        $valStatus = $this->request->getPost('status');
        $status = [
            'status_order' => $valStatus
        ];
        $this->orderModel->where('code', $this->request->getPost('kode_order'))->set($status)->update();

        session()->setFlashdata('success', 'Yeay.. You has received your orders. Thank You');
        return redirect()->to(base_url('produk/detail') . '/' . $this->request->getPost('kode_order'));
    }

    public function komentar($kode)
    {
        $pro = $this->produkModel->where('slug', $kode)->first();
        $komentar = $this->komentarModel->where('id_produk', $pro['id'])->where('id_order', $this->request->getPost('id_order'))->first();
        // echo $kode;
        // dd($komentar);
        // dd($this->request->getPost());
        if (!$komentar) {
            $this->komentarModel->save([
                'id_produk' => $pro['id'],
                'id_order' => $this->request->getPost('id_order'),
                'kode_order' => $this->request->getPost('kode_order'),
                'username' => $this->request->getPost('username'),
                'komentar' => $this->request->getPost('komentar')
            ]);
            session()->setFlashdata('success', 'Komentar anda telah ditambahkan');
            return redirect()->to(base_url('produk/detail') . '/' . $this->request->getPost('kode_order'));
        } else {
            $this->komentarModel->save([
                'id' => $komentar['id'],
                'id_produk' => $pro['id'],
                'id_order' => $this->request->getPost('id_order'),
                'kode_order' => $this->request->getPost('kode_order'),
                'username' => $this->request->getPost('username'),
                'komentar' => $this->request->getPost('komentar')
            ]);
            // dd($this->request->getPost());
            session()->setFlashdata('success', 'Komentar anda telah diubah');
            return redirect()->to(base_url('produk/detail') . '/' . $this->request->getPost('kode_order'));
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
