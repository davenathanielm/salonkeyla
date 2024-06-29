<?php

namespace App\Controllers;

Use App\Models\PelangganModel;

class Pelanggan extends BaseController
{
    private $pelangganModel;

    public function __construct()
    {
        $this->pelangganModel = new PelangganModel();
    }

    public function index()
    {
        $dataPelanggan = $this->pelangganModel->getPelanggan();
        $data = [
            'title' => 'Data Pelanggan',
            'result' => $dataPelanggan,
            'Nama_Pelanggan' => $this->request->getVar('Nama_Pelanggan')
        ];
        echo view('pelanggan/index', $data);
        // echo view('layout/dashboard',$data);
    }

    public function create()
    {
        session();
        $data =
        [
            'title' => 'Create Customer',
            'validation' => \Config\Services::validation()
        ];
        return view('pelanggan/create', $data);
    }

    public function save()
    {
         if (!$this->validate([
            'Nama_Pelanggan' => [
                'rules' => 'required[pelanggan.Nama_Pelanggan]',
                'label' => 'Nama_Pelanggan',
                'errors' => [
                    'required' => '{field} harus diisi',
                    
                ]
            ],

            'Jenis_Kelamin' => [
                'rules' => 'required[pelanggan.Jenis_Kelamin]',
                'label' => 'Jenis_Kelamin',
                'errors' => [
                    'required' => '{field} harus diisi',
    
                ]
            ],

            'Nomor_Telepon' => [
                'rules' => 'required[pelanggan.Nomor_Telepon]',
                'label' => 'Nomor_Telepon',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
        ]))
        {
            return redirect()->to('pelanggan/create')->withInput();
        }

        $this->pelangganModel->save([
            'Nama_Pelanggan' => $this->request->getVar('Nama_Pelanggan'),
            'Jenis_Kelamin' => $this->request->getVar('Jenis_Kelamin'),
            'Nomor_Telepon' => $this->request->getVar('Nomor_Telepon'),
        ]);

        session()->setFlashdata("msg", "Data berhasil ditambahkan!");
        return redirect()->to('pelanggan/index')->withInput();
    }

    public function edit($id)
    {
        $dataPelanggan = $this->pelangganModel->getPelanggan($id);
        

        // Jika data Pengguna kosong
        if (empty($dataPelanggan)) {

            //kalau data yang dicari ga ketemu maka akan diarahin ke website page not found 
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Pelanggan $id tidak ditemukan");
        }

        $data = [
            'title' => 'Update Data Pelanggan',
            'validation' => \Config\Services::validation(),
            'result' => $dataPelanggan
        ];
        
        return view('pelanggan/update', $data);
        }

    public function update($id)
    {
        // dd($id);
        if (!$this->validate([
            'Nama_Pelanggan' => [
                'rules' => 'required',
                'label' => 'Nama_Pelanggan',
                'errors' => [
                    'required' => 'Nama harus diisi',
                ]
            ],

            'Jenis_Kelamin' => [
                'rules' => 'required',
                'label' => 'Jenis_Kelamin',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],

            'Nomor_Telepon' => [
                'rules' => 'required',
                'label' => 'Nomor_Telepon',
                'errors' => [
                    'required' => 'Nomer Telepon harus diisi',
                ]
            ],
        ]))
        {
            // Ini ngarah ke routes
            return redirect()->to( 'pelanggan/edit/' . $this->request->getVar('Id_Pelanggan'))->withInput();
        }

        // ini ngirim data nya untuk di update 
        if ($this->pelangganModel->update($id,[
          
            'Id_pelanggan' => $id,
            'Nama_Pelanggan' => $this->request->getVar('Nama_Pelanggan'),
            'Jenis_Kelamin' => $this->request->getVar('Jenis_Kelamin'),
            'Nomor_Telepon' => $this->request->getVar('Nomor_Telepon'),
            
        ]))
            
        session()->setFlashdata('msg' , 'Data Updated');

        return redirect()->to('/pelanggan');
    }

    public function delete($id)
    {
        $this->pelangganModel->delete($id);
        session()->setFlashdata("msg", "Data Deleted!");
        return redirect()->to('/pelanggan');
    }
}
