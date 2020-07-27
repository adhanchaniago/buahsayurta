<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profile extends BaseController
{
    protected $datalogin;
    protected $userModel;

    public function __construct()
    {
        $this->datalogin = new Auth();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        // dd($produk);
        $data = [
            'title' => 'My Profile',
            'user' => $this->datalogin->datauser,
            'menu' => $this->datalogin->menu,
            'submenu' => $this->datalogin->submenu,
        ];
        return view('admin/profile', $data);
    }
}
