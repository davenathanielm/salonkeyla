<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $dataUser = $this->userModel->getUsers();
        $data = [
            'title' => 'Data User',
            'result' => $dataUser,
            'user_name' => $this->request->getVar('user_name')
        ];
        echo view('users/index', $data);
        // echo view('layout/dashboard',$data);
    }

    public function create()
    {
        session();
        $data = [
            'title' => 'Create User',
            // Harus menambahkan validation disini kalo mau kasi validation 
            'validation' => \Config\Services::validation()
        ];
        return view('users/create', $data);
    }

    public function save()
    {
        // Validasi
        if (!$this->validate([
            'firstname' => [
                'rules' => 'required|is_unique[role.firstname]',
                'label' => 'firstname',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada'
                ]
            ],

            'lastname' => [
                'rules' => 'required|is_unique[role.lastname]',
                'label' => 'lastname',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada'
                ]
            ],

            'username' => [
                'rules' => 'required|is_unique[role.user_name]',
                'label' => 'username',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada'
                ]
            ],

            'email' => [
                'rules' => 'required|is_unique[role.user_email]',
                'label' => 'email',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada'
                ]
            ],

            'password' => [
                'rules' => 'required|is_unique[role.user_password]',
                'label' => 'password',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => 'sudah ada'
                ]
            ],

            'pass_confirm' => [
                'rules' => 'required|matches[password]',
                'label' => 'password',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'matches[password]' => 'Password tidak sama'
                ]
            ],

            'role' => [
                'rules' => 'required[role.role]',
                'label' => 'role',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],

            // 'required|is_unique[book.title]',
            // ini yang bikin required gaa sesuai dengan error yang diminta

            // 'firstname' => 'required',
            // 'lastname' => 'required',
            // 'username' => 'required',
            // 'email' => 'required',
            // 'password' => 'required',
            // 'role'=>'required'
        ])) {
            //     session()->setFlashdata("msg", "Data berhasil ditambahkan!");
            return redirect()->to('users/create')->withInput();
        }
        // $this->userModel->save([
        //     'firstname' => $this->request->getVar('firstname'),
        //     'lastname' => $this->request->getVar('lastname'),
        //     'user_name' => $this->request->getVar('username'),
        //     'user_email' => $this->request->getVar('email'),
        //     'role' => $this->request->getVar('role'),
        //     'user_password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        // ]);

        $this->userModel->save([
            'firstname' => $this->request->getVar('firstname'),
            'lastname' => $this->request->getVar('lastname'),
            'user_name' => $this->request->getVar('username'),
            'user_email' => $this->request->getVar('email'),
            'user_password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getVar('role'),
        ]);

        session()->setFlashdata("msg", "Data berhasil ditambahkan!");
        return redirect()->to('users/index')->withInput();
    }

    public function edit($id)
    {
        $dataUser = $this->userModel->getUsers($id);

        // // Jika data Pengguna kosong
        if (empty($dataUser)) {

            //kalau data yang dicari ga ketemu maka akan diarahin ke website page not found 
            throw new \CodeIgniter\Exceptions\PageNotFoundException("User $id tidak ditemukan");
        }

        $data = [
            'title' => 'Update Data User',
            'validation' => \Config\Services::validation(),
            'result' => $dataUser
        ];
        return view('users/update', $data);
    }

    public function update($id)
    {
        // // Cek Id
        // $dataOld = $this->userModel->getUsers($this->request->getVar('Id'));

        if (!$this->validate([
            'firstname' => [
                'rules' => 'required|is_unique[role.firstname]',
                'label' => 'firstname',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada'
                ]
            ],

            'lastname' => [
                'rules' => 'required|is_unique[role.lastname]',
                'label' => 'lastname',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada'
                ]
            ],

            'username' => [
                'rules' => 'required|is_unique[role.user_name]',
                'label' => 'username',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada'
                ]
            ],

            'email' => [
                'rules' => 'required|is_unique[role.user_email]',
                'label' => 'email',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada'
                ]
            ],

            'password' => [
                'rules' => 'required|is_unique[role.user_password]',
                'label' => 'password',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => 'sudah ada'
                ]
            ],

            'pass_confirm' => [
                'rules' => 'required|matches[password]',
                'label' => 'password',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'matches[password]' => 'Password tidak sama'
                ]
            ],

            'role' => [
                'rules' => 'required[role.role]',
                'label' => 'role',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],

        ])) {
            return redirect()->to('users/edit/' . $this->request->getVar('Id'))->withInput();
        }

        if ($this->userModel->update($id, [
            'Id' => $id,
            'firstname' => $this->request->getVar('firstname'),
            'lastname' => $this->request->getVar('lastname'),
            'user_name' => $this->request->getVar('username'),
            'user_email' => $this->request->getVar('email'),
            'user_password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getVar('role'),
        ])); {
            session()->setFlashdata("msg", "Berhasil memperbaharui User!");
        }

        return redirect()->to('/users');
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
        session()->setFlashdata("msg", "Data Deleted!");
        return redirect()->to('/users');
    }
}
