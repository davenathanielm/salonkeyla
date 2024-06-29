<?php

namespace App\Controllers;

use App\Models\UserModel;

use App\Models\BerandaModel;

class Home extends BaseController
{
    private $UserModel;
    private $dashboard;

    public function __construct()
    {
        $this->dashboard = new BerandaModel();
    }


    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('dashboard', $data);
    }

    public function cobaGambar()
    {
        return view('gambar');
    }

    public function showChartTransaksi()
    {
        $tahun = $this->request->getVar('tahun');
        $reportTrans = $this->dashboard->reportTransaksi($tahun);
        $response = [
            'status' => false,
            'data' => $reportTrans
        ];
        echo json_encode($response);
    }

    public function showChartPembelian()
    {
        $tahun = $this->request->getVar('tahun');
        // dd($tahun);
        $reportPem = $this->dashboard->reportPembelian($tahun);
        $response = [
            'status' => false,
            'data' => $reportPem
        ];
        echo json_encode($response);
    }

    public function showChartLayanan()
    {
        $tahun = $this->request->getVar('tahun');
        $reportSup = $this->dashboard->reportLayanan($tahun);
        $response = [
            'status' => false,
            'data' => $reportSup
        ];
        echo json_encode($response);
    }

    public function showChartPelanggan()
    {
        $tahun = $this->request->getVar('tahun');
        $reportCust = $this->dashboard->reportPelanggan($tahun);
        $response = [
            'status' => false,
            'data' => $reportCust
        ];
        echo json_encode($response);
    }
}
