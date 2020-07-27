<?php

namespace App\Models;

use CodeIgniter\Model;

class UsermenuModel extends Model
{
    protected $table      = 'user_menu';

    public function getMenu()
    {
        $this->join('user_access_menu', 'user_access_menu.menu_id = user_menu.id')->join('user_submenu', 'user_submenu.id_user_menu = user_menu.id')->where('user_access_menu.level_id', session()->get('level_id'))->find();
    }
}
