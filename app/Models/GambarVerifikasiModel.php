<?php

namespace App\Models;

use CodeIgniter\Model;

class GambarVerifikasiModel extends Model
{
    protected $table      = 'gambar_verifikasi';
    protected $useTimestamps = false;
    protected $allowedFields = ['id_order', 'kode_order', 'nama_file'];
}
