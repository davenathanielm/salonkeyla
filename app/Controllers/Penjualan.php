<?php

namespace App\Controllers;

use App\Models\LayananModel;
use App\Models\UserModel;
use App\Models\PelangganModel;
use App\Models\StokModel;
use App\Models\PenjualanModel;
use App\Models\PenjualanDetailModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use TCPDF;

class Penjualan extends BaseController
{
    private $layanan, $user, $stok, $penjualan, $penjualandetail, $pelanggan, $cart;

    public function __construct()
    {
        $this->layanan = new LayananModel();
        $this->user = new UserModel();
        $this->stok = new StokModel();
        $this->penjualan = new PenjualanModel();
        $this->penjualandetail = new PenjualanDetailModel();
        $this->pelanggan = new PelangganModel();
        $this->cart = \Config\Services::cart();
    }

    public function index()
    {
        $this->cart->destroy();
        // session()->remove('cart');
        $dataLayanan = $this->layanan->getLayanan();
        $dataPelanggan = $this->pelanggan->getPelanggan();
        $data = [
            'title' => 'Penjualan',
            'dataLayanan' => $dataLayanan,
            'dataPelanggan' => $dataPelanggan,
        ];
        return view('penjualan/list', $data);
    }

    public function ShowCart()
    {
        $output = '';
        $no = 1;
        // dd($this->cart->contents());
        foreach ($this->cart->contents() as $items) {
            // $diskon = ($items['options']['discount'] / 100) * $items['subtotal'];
            $output .= '
            <tr>
            <td>' . $no++ . '</td>
            <td>' . $items['name'] . '</td>
            <td>' . number_to_currency($items['price'], 'IDR', 'id_ID', 2) . '</td>
            
            <td>' . number_to_currency(($items['subtotal']), 'IDR', 'id_ID', 2) . '</td>
            <td>
            <button id="' . $items['rowid'] . '" qty="' . $items['qty'] . '"
            class="ubah_cart btn btn-warning btn-xs" title="Ubah Jumlah"><i class="fa 
            fa-edit"></i></button>
            <button type="button" id="' . $items['rowid'] . '" class="hapus_cart btn 
            btn-danger btn-xs"><i class="fa fa-trash" title="Hapus"></i></button>
            </td>
            </tr>
            ';
        }
        if (!$this->cart->contents()) {
            $output = '<tr><td colspan="7" align="center">Tidak ada transaksi!</td></tr>';
        }
        return $output;
    }

    // public function showCart() {
    //     $cart = session()->get('cart', []);
    //     $output = '';
    //     $no = 1;

    //     if (empty($cart)) {
    //         $output = '<tr><td colspan="7" align="center">Tidak ada transaksi!</td></tr>';
    //     } else {
    //         $no = 1; // Inisialisasi nomor urutan
    //         foreach ($cart as $index => $item) {
    //             $output .= '
    //         <tr>
    //             <td>' . $no++ . '</td>
    //             <td style="width: 20%;">' . $item['name'] . '</td>
    //             <td style="width: 15%;">' . $item['qty'] . '</td>
    //             <td style="width: 17%;">Rp ' . number_format($item['subtotal'], 0, ',', '.') . '</td>
    //             <td style="width: 17%;"><button id="' . $index . '" qty="' . $item['qty'] . '" class="ubah_cart btn btn-warning btn-xs" title="Ubah Jumlah"><i class="fa fa-edit"></i></button>
    //             <button type="button" id="' . $index . '" class="hapus_cart btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash"></i></button></td>
    //         </tr>';
    //         }
    //     }
    //     return $output;
    // }

    public function loadCart()
    {
        echo $this->ShowCart();
    }

    public function addCart()
    {
        $this->cart->insert(array(
            'id'    => $this->request->getVar('id'),
            'qty'    => $this->request->getVar('qty'),
            'price'    => $this->request->getVar('price'),
            'name'    => $this->request->getVar('name'),
        ));
        // $data = $this->cart->insert(array(
        //     'id'    => $this->request->getVar('id'),
        //     'qty'    => $this->request->getVar('qty'),
        //     'price'    => $this->request->getVar('price'),
        //     'name'    => $this->request->getVar('name'),
        // ));
        // dd($data);

        echo $this->ShowCart();
    }

    // public function addCart()
    // {
    //     $cart = session()->get('cart', []);

    //     $id = $this->request->getVar('id');
    //     $name = $this->request->getVar('name');
    //     $price = $this->request->getVar('price');

    //     if (isset($cart[$id])) {
    //         $cart[$id]['qty']++;
    //     } else {
    //         $cart[$id] = [
    //             'name' => $name,
    //             'harga' => $price,
    //             'qty' => 1,
    //             'subtotal' => $price, // Initial price as subtotal
    //         ];

    //         echo $this->ShowCart();
    //     }
    // }

    public function getTotal()
    {
        $totalBayar = 0;
        foreach ($this->cart->contents() as $items) {
            // $diskon = ($items['options']['discount'] / 100) * $items['subtotal'];
            $totalBayar += $items['subtotal'];
        }
        echo number_to_currency($totalBayar, 'IDR', 'id_ID', 2);
    }

    public function updateCart()
    {
        $this->cart->update(array(
            'rowid' => $this->request->getVar('rowid'),
            'qty'   => $this->request->getVar('qty')
        ));
        echo $this->ShowCart();
    }

    public function deleteCart($rowid)
    {
        $this->cart->remove($rowid);
        echo $this->showCart();
    }

    public function pembayaran()
    {
        // Mengecek apakah ada transaksi yang dilakukan
        if (!$this->cart->contents()) {
            // Transaksi kosong
            $response = [
                'status' => false,
                'msg' => "Tidak ada transaksi!",
            ];
            echo json_encode($response);
        } else {
            // ada transaksi
            $totalBayar = 0;
            foreach ($this->cart->contents() as $items) {
                // $diskon = ($items['options']['discount'] / 100) * $items['subtotal'];
                $totalBayar += $items['subtotal'];
            }

            $nominal = $this->request->getVar('nominal');
            $id = "J" . time();
            // ini inisial username

            // Pengecekan apakah nominal yang dimasukkan cukup atau kurang
            if ($nominal < $totalBayar) {
                $response = [
                    'status' => false,
                    'msg' => "Nominal Pembayaran Kurang!",
                ];
                echo json_encode($response);
            } else {
                // Jika Nominal Memenuhi, akan menyimpan data
                // di tabel sale dan sale_detail
                $this->penjualan->insert([
                    'Id_Penjualan' => $id,
                    'Id_Role' => session()->user_id,
                    'Id_Pelanggan' => $this->request->getVar('Id_Pelanggan')
                ]);

                foreach ($this->cart->contents() as $items) {
                    $this->penjualandetail->insert([
                        'Id_Penjualan' => $id,
                        'Id_Layanan' => $items['id'],
                        'jumlah' => $items['qty'],
                        'harga' => $items['price'],
                        'total_harga' => $items['subtotal']
                    ]);
                }

                $this->cart->destroy();
                $kembalian = $nominal - $totalBayar;

                $response = [
                    'status' => true,
                    'msg' => "Pembayaran berhasil!",
                    'data' => [
                        'kembalian'     => number_to_currency(
                            $kembalian,
                            'IDR',
                            'id_ID',
                            2
                        )
                    ]
                ];
                echo json_encode($response);
            }
        }
    }

    public function report($tgl_awal = null, $tgl_akhir = null)
    {
        $_SESSION['tgl_awal'] = $tgl_awal == null ? date('Y-m-01') : $tgl_awal;
        $_SESSION['tgl_akhir'] = $tgl_akhir == null ? date('Y-m-t') : $tgl_akhir;

        $tgl1 = $_SESSION['tgl_awal'];
        $tgl2 = $_SESSION['tgl_akhir'];

        $report = $this->penjualan->getReport($tgl1, $tgl2);
        $data = [
            'title' => 'Laporan Penjualan',
            'result' => $report,
            'tanggal' => [
                'tgl_awal' => $tgl1,
                'tgl_akhir' => $tgl2,
            ],
        ];
        return view('penjualan/report', $data);
    }

    public function exportPDF()
    {
        $tgl1 = $_SESSION['tgl_awal'];
        $tgl2 = $_SESSION['tgl_akhir'];
        $report = $this->penjualan->getReport($tgl1, $tgl2);
        $data = [
            'title' => 'Laporan Penjualan',
            'result' => $report,
        ];
        $html = view('penjualan/exportPDF', $data);

        $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
        $pdf->writeHTML($html);
        $this->response->setContentType('application/pdf');
        $pdf->Output('laporan-penjualan.pdf', 'I');
    }

    public function exportExcel()
    {
        $tgl1 = $_SESSION['tgl_awal'];
        $tgl2 = $_SESSION['tgl_akhir'];
        $report = $this->penjualan->getReport($tgl1, $tgl2);

        $spreadsheet = new Spreadsheet();
        // tulis header/nama kolom
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Nota')
            ->setCellValue('C1', 'Tgl Transaksi')
            ->setCellValue('D1', 'User')
            ->setCellValue('E1', 'Customer')
            ->setCellValue('F1', 'Total');

        // Tulis data mobil ke cell
        $rows = 2;
        $no = 1;
        foreach ($report as $value) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $rows, $no++)
                ->setCellValue('B' . $rows, $value['Id_Penjualan'])
                ->setCellValue('C' . $rows, $value['tgl_transaksi'])
                ->setCellValue('D' . $rows, $value['firstname'] . ' ' . $value['lastname'])
                ->setCellValue('E' . $rows, $value['name_cust'])
                ->setCellValue('F' . $rows, $value['total']);
            $rows++;
        }
        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Laporan-Penjualan';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function filter()
    {
        $_SESSION['tgl_awal'] = $this->request->getVar('tgl_awal');
        $_SESSION['tgl_akhir'] = $this->request->getVar('tgl_akhir');
        return $this->report($_SESSION['tgl_awal'], $_SESSION['tgl_akhir']);
    }
}
