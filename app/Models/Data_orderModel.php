<?php

namespace App\Models;

use CodeIgniter\Model;

class Data_orderModel extends Model
{
    protected $table      = 'data_order';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_order', 'id_user', 'kode_order', 'id_produk', 'kuantitas'];
}
