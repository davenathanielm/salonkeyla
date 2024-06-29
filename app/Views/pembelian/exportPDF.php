<html>

<head>
    <!-- BERISI CSS -->
    <style>
        .title {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }

        .left {
            text-align: left;
        }

        .right {
            text-align: right;
        }

        .border-table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            text-align: center;
            font-size: 12px;
        }

        .border-table th {
            border: 1px solid #000;
            background-color: #e1e3e9;
            font-weight: bold;
        }

        .border-table td {
            border: 1px solid #000;
        }
    </style>
</head>

<body>
    <main>
        <div class="title">
            <h1>LAPORAN PEMBELIAN</h1>
        </div>
        <div>
            <!-- Isi Laporan -->
            <table class="border-table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th>User</th>
                        <th scope="col">Nota</th>
                        <th scope="col">Goods Name</th>
                        <th>Total</th>
                        <th scope="col">Transaction Date</th>

                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php
                    $no = 1;
                    foreach ($result as $value) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['firstname'] ?> <?= $value['lastname'] ?></td>
                            <td><?= $value['Id_Pembelian'] ?></td>
                            <td><?= $value['Nama_Barang'] ?></td>
                            <td><?= number_to_currency($value['total'], 'IDR', 'id_ID', 2) ?></td>
                            <td><?= date("d/m/Y H:i:s", strtotime($value['tgl_transaksi'])) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!--  -->
        </div>
    </main>
</body>

</html>