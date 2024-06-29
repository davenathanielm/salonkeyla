<?= $this->extend('layout/template.php') ?>
<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url() ?>/css/tabel.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
    .button {
        padding-top: 30px;
    }

    .pdf {
        background-color: #0f102c;
        color: white;
    }

    .excel {
        background-color: #0f102c;
        color: white;
    }
</style>
<div class="container-fluid px-4 mt-5">
    <h3 class="header-table mb-4"><?= $title ?></h3>

    <form action="/beli/laporan/filter" method="post">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <input type="date" class="form-control" name="tgl_awal" value="<?= $tanggal['tgl_awal'] ?>" title="Tanggal Awal">
                </div>
                <div class="col-4">
                    <input type="date" class="form-control" name="tgl_akhir" value="<?= $tanggal['tgl_akhir'] ?>" title="Tanggal Akhir">
                </div>
                <div class="col-4">
                    <button class="btn btn-primary">Filter</button>
                </div>
            </div>
        </div>
    </form>

    <div class="col-sm-12 col-md-6">
        <div class="button">
            <a target="_blank" class="btn pdf" type="button" href="/beli/exportpdf">PDF</a>
            <a class="btn excel" type="button" href="/beli/exportexcel">Excel</a>
            <!-- <a target="_blank" class="iq-bg-primary" type="button" href="< ?= base_url('jual/laporan') ?>">
                Pdf
            </a> -->
        </div>
    </div>
    <!-- Ngirim message selsai  -->
    <br>
    <input type="text" class="form-control" id="myInput" placeholder="Search in here">
    <table class="table table-bordered  table-hover mt-4">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th>Profile</th>
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
                    <td class="text-center"><img class="rounded img-fluid avatar-40" src="/images/user/01.jpg" alt="profile"></td>
                    <td><?= $value['firstname'] ?> <?= $value['lastname'] ?></td>
                    <td><?= $value['Id_Pembelian'] ?></td>
                    <td><?= $value['Nama_Barang'] ?></td>
                    <td><?= number_to_currency($value['total'], 'IDR', 'id_ID', 2) ?></td>
                    <td><?= date("d/m/Y H:i:s", strtotime($value['tgl_transaksi'])) ?></td>


                </tr>

            <?php endforeach ?>


        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>



<?= $this->endSection() ?>