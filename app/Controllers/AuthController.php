<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function __construct()
    {
        helper('form');
    }
       
    public function login() 
    {
    if ($this ->request->getpost()) {
    $rules = [
    'username' => 'required|min_length[6]',
    'password' => 'required|min_length[7]|numeric',
];
        if ($this->validate($rules)) {
}
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            
            $dataUser = [
                'username' => 'april', 
                'password' => '202cb962ac59075b964b07152d234b70', // md5 dari '123'
                'role'     => 'admin'
            ];

            // 1. Cek apakah username cocok
            if ($username == $dataUser['username']) {
                
                // 2. Cek apakah password (setelah di-md5) cocok
                if (md5($password) == $dataUser['password']) {
                    
                    // Jika cocok, set session login
                    session()->set([
                        'username'   => $dataUser['username'],
                        'role'       => $dataUser['role'],
                        'isLoggedIn' => TRUE
                    ]);

                    return redirect()->to(base_url('/')); 

                } else {
                    // Jika password salah
                    session()->setFlashdata('failed', 'Username & Password Salah');
                    return redirect()->to(base_url('login'));
                }

            } else {
                // Jika username salah / tidak ditemukan
                session()->setFlashdata('failed', 'Username Tidak Ditemukan');
                return redirect()->to(base_url('login'));
            }
        }

   else {
    session()->setFlashdata('failed', $this->validator->listErrors());
    return redirect()->back();

}

    


        return view('v_login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}