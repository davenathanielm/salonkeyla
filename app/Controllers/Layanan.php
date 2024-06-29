<?php

namespace App\Controllers;

use App\Models\LayananModel;

class Layanan extends BaseController
{
    private $layananModel;

    public function __construct()
    {
        $this->layananModel = new LayananModel();
    }

    public function index()
    {
        $dataLayanan = $this->layananModel->getLayanan();
        $data = [
            'title' => 'Data Layanan',
            'result' => $dataLayanan,
            'Nama_Layanan' => $this->request->getVar('Nama_Layanan')
        ];
        echo view('layanan/index', $data);
    }


    public function create()
    {
        session();
        $data =
            [
                'title' => 'Create Customer',
                'validation' => \Config\Services::validation()
            ];
        return view('layanan/create', $data);
    }

    public function save()
    {
        // Kalo create harus tetep pakai [layanan.Nama_Layanan]
        if (!$this->validate([
            'Nama_Layanan' => [
                'rules' => 'required',
                'label' => 'Nama_Layanan',
                'errors' => [
                    'required' => 'Nama Layanan harus diisi',
                ]
            ],

            // Kalau ada 2 error maka gausa pake [layanan.Nama_Layanan]
            'Harga_Layanan' => [
                'rules' => 'required|numeric',
                'label' => 'Harga_Layanan',
                'errors' => [
                    'required' => 'Harga Layanan harus diisi',
                    'numeric' => 'Harga Layanan harus berupa angka'
                ]
            ],
        ])) {
            return redirect()->to('layanan/create')->withInput();
        }

        $this->layananModel->save([
            'Nama_Layanan' => $this->request->getVar('Nama_Layanan'),
            'Harga_Layanan' => $this->request->getVar('Harga_Layanan'),
        ]);

        session()->setFlashdata("msg", "Data berhasil ditambahkan!");
        return redirect()->to('layanan/index')->withInput();
    }

    public function edit($id)
    {
        $dataLayanan = $this->layananModel->getLayanan($id);

        // Jika data pengguna kosong
        if (empty($dataLayanan)) {

            //kalau data yang dicari ga ketemu maka akan diarahin ke website page not found 
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Layanan $id tidak ditemukan");
        }

        $data =
            [
                'title' => 'Update Services',
                'validation' => \Config\Services::validation(),
                'result' => $dataLayanan
            ];

        return view('layanan/update', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'Nama_Layanan' => [
                'rules' => 'required',
                'label' => 'Nama_Layanan',
                'errors' => [
                    'required' => 'Nama Layanan harus diisi',
                ]
            ],

            'Harga_Layanan' => [
                'rules' => 'required|numeric',
                'label' => 'Harga_Layanan',
                'errors' => [
                    'required' => 'Harga Layanan harus diisi',
                    'numeric' => 'Harga Layanan harus berupa angka'
                ]
            ],

        ])) {
            return redirect()->to('layanan/edit/' . $this->request->getVar('Id_Layanan'))->withInput();
        }

        // Ini ngirim datanya untuk di update
        if ($this->layananModel->update($id, [
            'Id_Layanan' => $id,
            'Nama_Layanan' => $this->request->getVar('Nama_Layanan'),
            'Harga_Layanan' => $this->request->getVar('Harga_Layanan'),
        ])) {
            session()->setFlashdata('msg', 'Data Updated');

            return redirect()->to('/layanan');
        }
    }

    public function delete($id)
    {
        $this->layananModel->delete($id);
        session()->setFlashdata("msg", "Data Deleted");
        return redirect()->to('/layanan');
    }
}
