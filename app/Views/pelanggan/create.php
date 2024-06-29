<?= $this->extend('layout/template') ?>

<!-- masukin dia ke content -->
<?= $this->section('content') ?>

<style>
    .card {
        box-shadow: 5px 10px 20px #888888;
        border-radius: 10px;
    }
    .batal:hover
    {
        background-color: white;
        color: red;
    }

    .simpan:hover
    {
        background-color: white;
        color: blue;
    }
</style>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4 mb-4">DATA CUSTOMER</h1>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <?= $title ?>
            </div>
            <div class="card-body">
                <!-- Ngarah ke routes -->
                <form action="<?= base_url('pelanggan/create') ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="mb-3 row">
                        <label for="Nama_Pelanggan" class="col-sm-2 col-form-label">Customer Name</label>
                        <div class="col-sm-10">

                            <input type="text" class="form-control <?= $validation->hasError('Nama_Pelanggan') ? 'is-invalid'
                                                                        : '' ?>" id="Nama_Pelanggan" name="Nama_Pelanggan" value="<?= old('Nama_Pelanggan') ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('Nama_Pelanggan') ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="Jenis_Kelamin" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="Jenis_Kelamin">
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="Nomor_Telepon" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10">

                            <input type="text" class="form-control <?= $validation->hasError('Nomor_Telepon') ? 'is-invalid'
                                                                        : '' ?>" id="Nomor_Telepon" name="Nomor_Telepon" value="<?= old('Nomor_Telepon') ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('Nomor_Telepon') ?>
                            </div>
                        </div>
                    </div>

                    <div class="d-grip gap-2 d-md-flex justify-content-md-end">

                        <button class="btn batal btn-danger" type="reset">Cancel</button>
                        <button class="btn simpan btn-primary me-md-2 ml-3" type="submit">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</main>
<?= $this->endSection() ?>