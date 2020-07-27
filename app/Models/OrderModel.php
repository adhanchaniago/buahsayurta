<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table      = 'orderr';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_user', 'code', 'total_item', 'total_biaya', 'payment_method', 'status_order'];
}
