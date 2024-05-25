<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class UsersController extends BaseController
{
    protected $filters = ['auth'];

    protected $helpers = ['form'];

    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();

        if (!$this->session->has('user_id')) {
            return redirect()->to('/login');
        }
    }

    public function index()
    {
        $title['title'] = "Data User - User";
        $userModel = new UsersModel;
        $user['users'] = $userModel->findAll();
        return view('pages/users/index', ['title' => $title, 'user' => $user]);
    }

    public function create()
    {
        $title['title'] = "Data User - User";
        return view('pages/users/create', ['title' => $title]);
    }

    public function store()
    {
        $userModel = new UsersModel();

        $validationRules = [
            'username' => 'required|alpha_numeric|min_length[3]|max_length[100]|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]',
        ];

        if ($this->validate($validationRules)) {
            $hashedPassword = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);

            $dataToAdd = [
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => $hashedPassword,
            ];

            $result = $userModel->insert($dataToAdd);

            if ($result) {
                session()->setFlashdata("success", "Data Berhasil Ditambahkan!!!");
                return redirect()->to(base_url('/users'));
            } else {
                session()->setFlashdata("error", "Data Gagal Ditambahkan!!!");
                return redirect()->back();
            }
        } else {
            session()->setFlashdata("error", "Data Gagal Ditambahkan!!!");
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $title['title'] = "Ubah User - User";
        $userModel = new UsersModel;
        $user['users'] = $userModel->getUsersById($id);
        return view('pages/users/edit', ['title' => $title, 'user' => $user]);
    }

    public function update($id)
    {
        $usersModel = new UsersModel();

        $existingData = $usersModel->find($id);

        if (!$existingData) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Data not found.']);
        }

        // Retrieve password from the request
        $password = $this->request->getPost('password');

        // Check if password is empty
        if ($password !== "") {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Prepare data with hashed password
            $dataToUpdate = [
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => $hashedPassword, // Update with hashed password
            ];
        } else {
            // Password is empty, don't update it
            $dataToUpdate = [
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
            ];
        }

        $result = $usersModel->update($id, $dataToUpdate);

        if ($result) {
            session()->setFlashdata("success", "Data Berhasil Ditambahkan!!!");
            return redirect()->to(base_url('/users'));
        } else {
            session()->setFlashdata("error", "Data Gagal Ditambahkan!!!");
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $usersModel = new UsersModel();

        $existingData = $usersModel->find($id);

        if (!$existingData) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Data not found.']);
        }

        $result = $usersModel->delete($id);

        if ($result) {
            session()->setFlashdata("success", "Berhasil dihapus!");
            return redirect()->back();
        } else {
            session()->setFlashdata("error", "Data gagal dihapus.");
            return redirect()->back();
        }
    }
}
