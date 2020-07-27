<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table      = 'produk';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_kategori', 'id_user', 'slug', 'nama_produk', 'harga_produk', 'status_produk', 'deskripsi_produk', 'stok'];
}
