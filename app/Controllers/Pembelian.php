<?php

namespace App\Controllers;

use \App\Models\StokModel;
use \App\Models\PembelianModel;
use \App\Models\PembelianDetailModel;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pembelian extends BaseController
{
    private $stok, $cart, $pembelian, $pembelianDetail;
    public function __construct()
    {
        $this->stok = new StokModel();
        $this->pembelian = new PembelianModel();
        $this->pembelianDetail = new PembelianDetailModel();
        $this->cart = \Config\Services::cart();
    }
    public function index()
    {
        $this->cart->destroy();
        $dataStok = $this->stok->getStok();
        $data = [
            'title' => 'Pembelian',
            'dataStok' => $dataStok,
        ];
        return view('Pembelian/list', $data);
    }

    public function showCart()
    {
        //Fungsi untuk menampilkan Cart
        $output = '';
        $no = 1;
        foreach ($this->cart->contents() as $items) {
            $output .= '
            <tr>
            <td>' . $no++ . '</td>
            <td>' . $items['name'] . '</td>
            <td>' . $items['qty'] . '</td>
            <td>' . number_to_currency($items['price'], 'IDR', 'id_ID', 2) . '</td>
            <td>' . number_to_currency(($items['subtotal']), 'IDR', 'id_ID', 2) . '</td>
            <td><button id="' . $items['rowid'] . '" qty="' . $items['qty'] . '"
            class="ubah_cart btn btn-warning btn-xs" title="Ubah Jumlah"><i class="fa
            fa-edit"></i></button>
            <button type="button" id="' . $items['rowid'] . '" class="hapus_cart btn
            btn-danger btn-xs"><i class="fa fa-trash" title="Hapus"></i></button>
            </td>
            </tr>
            ';
        }

        if (!$this->cart->contents()) {
            $output =
                '<tr><td colspan="7" align="center">Tidak ada transaksi!</td></tr>';
        }
        return $output;
    }

    public function loadCart()
    {
        // load data cart

        echo $this->showCart();
    }

    public function addCart()
    {
        $this->cart->insert(array(
            'id'    => $this->request->getVar('id'),
            'qty'    => $this->request->getVar('qty'),
            'price'    => $this->request->getVar('price'),
            'name'    => $this->request->getVar('name'),
            'options'    => array(
                'discount' => $this->request->getVar('discount')
            )
        ));

        echo $this->loadCart();
    }

    public function getTotal()
    {
        $totalBayar = 0;
        foreach ($this->cart->contents() as $items) {
            $diskon = ($items['options']['discount'] / 100) * $items['subtotal'];
            $totalBayar += $items['subtotal'] - $diskon;
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
        // fungsi untuk menghapus item cart
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
                $diskon = ($items['options']['discount'] / 100) * $items['subtotal'];
                $totalBayar += $items['subtotal'] - $diskon;
            }

            $nominal = $this->request->getVar('nominal');
            $id = "B" . time();

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
                $this->pembelian->insert([
                    'Id_Pembelian' => $id,
                    'Id_Role' => session()->user_id
                ]);
                foreach ($this->cart->contents() as $items) {
                    $this->pembelianDetail->insert([
                        'Id_Pembelian' => $id,
                        'Id_Barang' => $items['id'],
                        'jumlah' => $items['qty'],
                        'harga' => $items['price'],
                        'diskon' => $diskon,
                        'total_harga' => $items['subtotal'] - $diskon
                    ]);

                    // Mengurangi jumlah stok di tabel book
                    // kita get atau dapat data buku berdasarkan ID Buku
                    $stok = $this->stok->where('Id_Barang', $items['id'])->first();
                    $this->stok->update($items['id'], [
                        'Jumlah_Barang' => $stok['Jumlah_Barang'] + $items['qty'],
                    ]);
                }
                $this->cart->destroy();
                $kembalian = $nominal - $totalBayar;

                $response = [
                    'status' => true,
                    'msg' => "Pembayaran berhasil!",
                    'data' => [
                        'kembalian' => number_to_currency(
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

        $report = $this->pembelian->getReport($tgl1, $tgl2);
        $data = [
            'title' => 'Laporan Pembelian',
            'result' => $report,
            'tanggal' => [
                'tgl_awal' => $tgl1,
                'tgl_akhir' => $tgl2,
            ],
        ];
        return view('pembelian/report', $data);
    }

    public function exportPDF()
    {
        $tgl1 = $_SESSION['tgl_awal'];
        $tgl2 = $_SESSION['tgl_akhir'];
        $report = $this->pembelian->getReport($tgl1, $tgl2);
        $data = [
            'title' => 'Laporan Pembelian',
            'result' => $report,
        ];
        $html = view('pembelian/exportPDF', $data);

        $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
        $pdf->writeHTML($html);
        $this->response->setContentType('application/pdf');
        $pdf->Output('laporan-pembelian.pdf', 'I');
    }

    public function exportExcel()
    {
        $tgl1 = $_SESSION['tgl_awal'];
        $tgl2 = $_SESSION['tgl_akhir'];
        $report = $this->pembelian->getReport($tgl1, $tgl2);

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
                ->setCellValue('B' . $rows, $value['Id_Pembelian'])
                ->setCellValue('C' . $rows, $value['tgl_transaksi'])
                ->setCellValue('D' . $rows, $value['firstname'] . ' ' . $value['lastname'])
                ->setCellValue('E' . $rows, $value['Nama_Barang'])
                ->setCellValue('F' . $rows, $value['total']);
            $rows++;
        }
        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Laporan-Pembelian';

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
