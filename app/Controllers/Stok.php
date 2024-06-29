<?php

namespace App\Controllers;

use App\Models\StokModel;



class Stok extends BaseController
{
    private $stokModel;

    public function __construct()
    {
        $this->stokModel = new StokModel();
    }

    public function index()
    {
        $dataStok = $this->stokModel->getStok();
        $data = [
            'title' => 'Data Stock',
            'result' => $dataStok,
            'Nama_Barang' => $this->request->getVar('Nama_Barang')
        ];
        echo view('stok/index', $data);
    }

    public function create()
    {
        session();
        $data =
            [
                'title' => 'Create Stock',
                'validation' => \Config\Services::validation()
            ];
        return view('stok/create', $data);
    }

    public function save()
    {
       
        if (!$this->validate([
            'Nama_Barang' => [
                'rules' => 'required',
                'label' => 'Nama_Barang',
                'errors' => [
                    'required' => 'Nama Barang harus diisi',
                ]
            ],

            'Jumlah_Barang' => [
                'rules' => 'required|numeric',
                'label' => 'Jumlah_Barang',
                'errors' => [
                    'required' => 'Jumlah Barang harus diisi',
                    'numeric' => 'Jumlah Barang harus berisi angka'
                ]
            ],

            'Harga_Barang' => [
                'rules' => 'required|numeric',
                'label' => 'Harga_Barang',
                'errors' => [
                    'required' => 'Harga Barang harus diisi',
                    'numeric' => 'Harga Barang harus berisi angka'
                ]
            ],

            'Gambar' => [
                'rules' => 'max_size[Gambar,1024]|is_image[Gambar]|mime_in[Gambar,image/jpg,image/jpeg,image/png]',
                'label' => 'Gambar',
                'errors' => [
                    'max_size' => 'Gambar tidak boleh lebih dari 1 MB!',
                    'is_image' => 'Yang anda pilih bukan gambar!',
                    'mime_in' => 'Yang anda pilih bukan gambar!'
                ]
            ],

        ])) 
        // dd(\Config\Services::validation());
        {
            return redirect()->to('/stok/create')->withInput();
        }

        // Mengambil file gambar

        // kalau nama sampul nya mau di acak namanya 
        // $namaFile = $fileGambar->getRandomName();
        $fileGambar = $this->request->getFile('Gambar');
        // kalau gaada file yang di upload dan errornya 4 maka pakai defaultImage
        if ($fileGambar->getError() == 4) {
            $namaFile = $this->defaultImage;
        } else {
            $namaFile = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaFile);
        }
        
        $this->stokModel->insert([
            'Nama_Barang' => $this->request->getVar('Nama_Barang'),
            'Jumlah_Barang' => $this->request->getVar('Jumlah_Barang'),
            'Harga_Barang' => $this->request->getVar('Harga_Barang'),
            'Gambar' => $namaFile,
            // masukin user _id
            'Id' => session()->user_id,
        ]);
        // $coba = session()->user_id;
        // dd($coba);

        session()->setFlashdata("msg", "Data Berhasil Ditambahkan !");
        return redirect()->to('stok/index');
    }

    public function edit($id)
    {
        $dataStok = $this->stokModel->getStok($id);

        if (empty($dataStok)) {

            //kalau data yang dicari ga ketemu maka akan diarahin ke website page not found 
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Stok $id tidak ditemukan");
        }

        $data = [
            'title' => 'Ubah Stock',
            'validation' => \Config\Services::validation(),
            'result' => $dataStok
        ];
        return view('stok/update', $data);
    }

    public function update($id)
    {
        if (!$this->validate([

            'Nama_Barang' => [
                'rules' => 'required',
                'label' => 'Nama_Barang',
                'errors' => [
                    'required' => 'Nama Barang harus diisi',
                ]
            ],

            'Jumlah_Barang' => [
                'rules' => 'required|numeric',
                'label' => 'Jumlah_Barang',
                'errors' => [
                    'required' => 'Jumlah Barang harus diisi',
                    'numeric' => 'Jumlah Barang harus berisi angka'
                ]
            ],

            'Harga_Barang' => [
                'rules' => 'required|numeric',
                'label' => 'Harga_Barang',
                'errors' => [
                    'required' => 'Harga Barang harus diisi',
                    'numeric' => 'Harga Barang harus berisi angka'
                ]
            ],

            'Gambar' => [
                'rules' => 'max_size[Gambar,1024]|is_image[Gambar]|mime_in[Gambar,image/jpg,image/jpeg,image/png]',
                'label' => 'Gambar',
                'errors' => [
                    'max_size' => 'Gambar tidak boleh lebih dari 1 MB!',
                    'is_image' => 'Yang anda pilih bukan gambar!',
                    'mime_in' => 'Yang anda pilih bukan gambar!'
                    // fungsi mime in itu misal file yang di upload blakang nya diganti.jpg pdhl bkn gambar ttp gamau ke upload 
                ]
            ],

        ]))

        // tampilan valid itu dri bootstrap bisa cari is-invalid atau is-valid
        {
            return redirect()->to('stok/edit/'.$this->request->getVar('Id_Barang'))->withInput();
        }

        $fileGambar = $this->request->getFile('Gambar');
        // $namaFileLama = $this->request->getVar('gambarlama');
        // dd($namaFileLama);
        if ($fileGambar->getError()==4) {
            $namaFile = $this->request->getVar('gambarlama');
        } 
        else 
        {
            $namaFile = $fileGambar->getRandomName();
            $fileGambar->move('img',$namaFile);
            // hapus gambar
            unlink('img/'. $this->request->getVar('gambarlama'));
        }


        if ($this->stokModel->update($id,[
          
            'Id_Barang' => $id,
            'Jumlah_Barang' => $this->request->getVar('Jumlah_Barang'),
            'Harga_Barang' => $this->request->getVar('Harga_Barang'),
            'Gambar' => $namaFile,
            
        ]))

        session()->setFlashdata('msg', 'Data Updated');
        return redirect()->to('/stok');
    }


    public function delete($id)
    {
        // kalau mau hapus gambar nya juga
        // $stok = $this->stokModel->find($id);
        // if($stok['Gambar'] != 'default.jpg')
        // {
        // unlink ('img/' . $stok['Gambar']) 
        // }
        $this->stokModel->delete($id);
        session()->setFlashdata("msg", "Data Deleted");
        return redirect()->to('/stok');
    }
}
