<?php

namespace App\Models;

use CodeIgniter\Model;

class KeranjangModel extends Model
{
    protected $table      = 'keranjang';
    protected $useTimestamps = false;
    protected $allowedFields = ['kode', 'id_user', 'id_produk', 'kuantitas'];
}
