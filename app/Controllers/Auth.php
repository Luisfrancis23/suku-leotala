<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\LogModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }

        $data['title'] = 'Login - Suku Leotala';

        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'username' => 'required',
                'password' => 'required',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                return view('auth/login', $data);
            }

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $userModel = new UserModel();
            $user = $userModel->attemptLogin($username, $password);

            if ($user) {
                session()->set([
                    'id'           => $user->id,
                    'username'     => $user->username,
                    'nome_completo'=> $user->nome_completo,
                    'tipo'         => $user->tipo,
                    'foto'         => $user->foto,
                    'isLoggedIn'   => true,
                ]);

                $logModel = new LogModel();
                $logModel->logActivity($user->id, 'Login', 'User login successfully');

                return redirect()->to('/dashboard')->with('message', 'Login sucesso!');
            }

            session()->setFlashdata('error', 'Username ou password la los!');
            return redirect()->to('/login');
        }

        return view('auth/login', $data);
    }

    public function logout()
    {
        $logModel = new LogModel();
        $logModel->logActivity(session()->get('id'), 'Logout', 'User logout successfully');

        session()->destroy();
        return redirect()->to('/login')->with('message', 'Logout sucesso!');
    }

    public function profile()
    {
        $data['title'] = 'Profile';
        $userModel = new UserModel();
        $data['user'] = $userModel->find(session()->get('id'));

        return view('auth/profile', $data);
    }

    public function updateProfile()
    {
        $userModel = new UserModel();
        $id = session()->get('id');

        $rules = [
            'nome_completo' => 'required',
            'email'         => 'permit_empty|valid_email',
            'telefone'      => 'permit_empty|max_length[20]',
        ];

        if ($this->request->getPost('password')) {
            $rules['password'] = 'min_length[6]';
            $rules['confirm_password'] = 'matches[password]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nome_completo' => $this->request->getPost('nome_completo'),
            'email'         => $this->request->getPost('email'),
            'telefone'      => $this->request->getPost('telefone'),
        ];

        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $userModel->update($id, $data);

        $logModel = new LogModel();
        $logModel->logActivity($id, 'Update Profile', 'User updated profile');

        return redirect()->to('/profile')->with('message', 'Profile atualiza sucesso!');
    }
}
