<?php

namespace App\Models;

use CodeIgniter\Model;

class FotoProdukModel extends Model
{
    protected $table      = 'foto_produk';
    protected $useTimestamps = false;
    protected $allowedFields = ['id_produk', 'nama_file', 'thumb'];
}
