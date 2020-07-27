<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\UsermenuModel;
use CodeIgniter\I18n\Time;

class Home extends BaseController
{
	protected $datalogin;
	protected $produkModel;
	protected $usermenuModel;
	protected $time;

	public function __construct()
	{
		$this->datalogin = new Auth();
		$this->produkModel = new ProdukModel();
		$this->usermenuModel = new UsermenuModel();
		$this->time = new Time();
	}

	public function index()
	{
		// // $join = $this->produkModel->query('SELECT P.*, F.nama_file FROM foto_produk F INNER JOIN produk P WHERE P.id=F.id_produk AND P.id = 1')->findAll();
		// $join = $this->produkModel->join('foto_produk', 'foto_produk.id_produk = produk.id')->where('id_kategori', '2')->findAll();
		// $buah = $this->produkModel->where('id', 1);
		// echo $this->datalogin->datauser['level_id'];
		if ($this->datalogin->datauser['level_id'] == 1) {
			return redirect()->to(base_url('penjual'));
		} elseif ($this->datalogin->datauser['level_id'] == 2) {
			$date = date('y-m-d');
			$data = [
				'title' => 'Home',
				'item' => 'tes',
				'validation' => $this->datalogin->datavalid,
				'user' => $this->datalogin->datauser,
				'produkbuah' => $this->produkModel->join('foto_produk', 'foto_produk.id_produk = produk.id')->where('id_kategori', '1')->where('created_at', $date)->findAll(),
				'produksayur' => $this->produkModel->join('foto_produk', 'foto_produk.id_produk = produk.id')->where('id_kategori', '2')->where('created_at', $date)->findAll()
			];

			// dd($date);
			return view('index', $data);
		} elseif (!session()->has('email')) {
			# code...
			$date = date('y-m-d');
			$data = [
				'title' => 'Home',
				'item' => 'tes',
				'validation' => $this->datalogin->datavalid,
				'user' => $this->datalogin->datauser,
				'produkbuah' => $this->produkModel->join('foto_produk', 'foto_produk.id_produk = produk.id')->where('id_kategori', '1')->where('created_at', $date)->findAll(),
				'produksayur' => $this->produkModel->join('foto_produk', 'foto_produk.id_produk = produk.id')->where('id_kategori', '2')->where('created_at', $date)->findAll()
			];
			return view('index', $data);
		}
	}

	public function tes()
	{
		$tes = $this->datalogin->menu;
		dd($tes);
	}
	//--------------------------------------------------------------------

}
