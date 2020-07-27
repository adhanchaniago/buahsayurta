<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ProdukModel;
use App\Models\ControllerAccessModel;
use App\Models\UsermenuModel;
use App\Models\UserSubmenuModel;
use CodeIgniter\HTTP\Request;
use phpDocumentor\Reflection\Types\Null_;

class Auth extends BaseController
{
    protected $userModel;
    protected $produkModel;
    protected $controllerModel;
    protected $usermenuModel;
    protected $userSubmenuModel;
    public $datauser;
    public $menu;
    public $submenu;
    public $datavalid;
    public $iduser;

    public function __construct()
    {
        $uri = new \CodeIgniter\HTTP\URI();
        $this->userModel = new UserModel();
        $this->produkModel = new ProdukModel();
        $this->controllerModel = new ControllerAccessModel();
        $this->usermenuModel = new UsermenuModel();
        $this->userSubmenuModel = new UserSubmenuModel();
        $this->datauser =  $this->userModel->where(['email' => session()->get('email')])->first();
        $this->menu =  $this->usermenuModel->join('user_access_menu', 'user_access_menu.menu_id = user_menu.id')->join('user_submenu', 'user_submenu.id_user_menu = user_menu.id')->where('user_access_menu.level_id', session()->get('level'))->findAll();
        $this->datavalid = \Config\Services::validation();
        $this->iduser = session()->get('id');
    }

    public function login()
    {
        $validation = \Config\Services::validation();

        $email = $this->request->getVar('email');
        $password = $this->request->getPost('password');

        $user = $this->userModel->where(['email' => $email])->first();
        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {

                    $data = [
                        'id' => $user['id'],
                        'email' => $user['email'],
                        'level' => $user['level_id']
                    ];
                    session()->set($data);
                    // dd($sessdata);
                    if (session()->get('level') == 1) {
                        return redirect()->to(base_url('penjual'));
                    } elseif (session()->get('level') == 2) {
                        return redirect()->to(base_url());
                    }
                } else {
                    session()->setFlashdata('pesan', 'You entered the wrong password. Try Again!');
                    return redirect()->to(base_url())->withInput()->with('validation', $validation);
                }
            } else {
                session()->setFlashdata('pesan', 'Your email has not activated. Cek your email to activate your account!');
                return redirect()->to(base_url())->withInput()->with('validation', $validation);
            }
        } else {
            session()->setFlashdata('pesan', 'Your email has not registed. Please Regist before to Log In!');
            return redirect()->to(base_url())->withInput()->with('validation', $validation);
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }

    public function registration()
    {
        // dd($this->request->getPost(''));
        if (!$this->validate([
            'email' => 'is_unique[user.email]'
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('pesan', 'Email is already registed. Try to regist a new email!');
            return redirect()->to(base_url())->withInput()->with('validation', $validation);
        }

        $this->userModel->save([
            'nama' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password2'), PASSWORD_DEFAULT),
            'level_id' => $this->request->getPost('level'),
            'is_active' => 1
        ]);
        // dd($this->request->getPost());
        session()->setFlashdata('berhasil', 'Yeay, You has registed your account. Log In now!');
        return redirect()->to(base_url());
    }

    public function error()
    {
        return view('admin/error');
    }

    public function permission()
    {
        if (session()->has('email')) {
            $uri = current_url(true);
            $current = $uri->getSegment(1);

            // echo session()->get('level');

            $controller = $this->controllerModel->where('level_id', session()->get('level'))->where('controller', $current)->findAll();
            // dd($controller);
            // echo $current;

            if (!$controller) {
                // return redirect()->back();
                // echo 'Tidak bisa bossqu';
                return redirect('error');
            }
        }
    }

    public function tes()
    {
        $tes = $this->userModel->findAll();
        dd($tes);
    }
    //--------------------------------------------------------------------

}
