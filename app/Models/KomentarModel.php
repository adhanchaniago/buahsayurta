<?php

namespace App\Models;

use CodeIgniter\Model;

class KomentarModel extends Model
{
    protected $table      = 'komentar';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_produk', 'id_order', 'kode_order', 'username', 'komentar'];
}
