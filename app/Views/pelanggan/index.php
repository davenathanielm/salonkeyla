<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url() ?>/css/tabel.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<div class="container-fluid px-4 mt-5">
    <h3 class="header-table"><?= $title ?></h3>
    <!-- Ngirim message -->
    <?php if (session()->getFlashdata('msg')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('msg') ?>
        </div>
    <?php endif; ?>
    <!-- Ngirim message selsai  -->
    <br>
    <input type="text" class="form-control" id="myInput" placeholder="Search in here">
    <table class="table table-bordered  table-hover mt-4">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Button</th>
            </tr>
        </thead>
        <tbody id="myTable">
            <?php

            use Kint\Zval\Value;

            $no = 1;
            foreach ($result as $value) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td>
                        <?= $value['Nama_Pelanggan'] ?>
                    </td>
                    <td>
                        <?= $value['Jenis_Kelamin'] ?>
                    </td>
                    <td>
                        <?= $value['Nomor_Telepon'] ?>
                    </td>

                    <td>
                        <a class="btn btn-warning" href="<?= base_url('Pelanggan/edit/' . $value['Id_Pelanggan']) ?>" role="button">Update</a>

                        <form action="<?= base_url('Pelanggan/delete/' . $value['Id_Pelanggan']) ?>" method="post" class="d-inline">

                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn hapus btn-danger" role="button" onclick="return confirm('Are you sure delete this data?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
            <!-- <tr>
                <td>1</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr> -->
            <!-- <tr>
                <td>3</td>
                <! ini untuk cangkup 2 tabel -->

            <!-- </tr>  -->
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