<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Login extends BaseController
{
    protected $dataModel;
    public function __construct()
    {
        $this->dataModel = new \App\Models\LoginModel();
    }

    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            $data = [
                'page_title' => 'Halaman Login',
                'page_desc' => 'Selamat datang, silahkan login untuk melanjutkan!',
                'page_key' => 'Halaman Login',
            ];
            return view('v_login', $data);
        }

        if (session()->get('tipe') > 0 ){
            return redirect()->to('admin/index.html');
        }
        return redirect('/');
    }

    public function loginAuth()
    {
        session();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $this->dataModel->where('username', $username)->first();
        if ($data) {
            if (password_verify($password, $data['password'])) {
                $ses_data = [
                    'id_login'      => $data['id'],
                    'id_guru'       => $data['id_guru'],
                    'id_kelas'      => $data['id_kelas'],
                    'tipe'          => $data['tipe_user'],
                    'username'      => $data['username'],
                    'isLoggedIn'    => TRUE
                ];
                session()->set($ses_data);
                if ($data['tipe_user'] > 0 ){
                    return redirect()->to('admin/index.html');
                }
                return redirect('/');
            } else {
                return redirect('login')->with('pesan', 'Password yang anda masukkan salah!');
            }
        } else {
            return redirect('login')->with('pesan', 'Username yang anda masukkan salah!');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect('login');
    }
}
