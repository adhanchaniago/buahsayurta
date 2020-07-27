<?php

namespace App\Models;

use CodeIgniter\Model;

class AlamatModel extends Model
{
    protected $table      = 'alamat';
    protected $useTimestamps = false;
    protected $allowedFields = ['id_order', 'kode_order', 'nama_penerima', 'no_hp', 'alamat_lengkap', 'kode_pos', 'kelurahan', 'kecamatan', 'kota', 'provinsi', 'tipe_alamat'];
}
