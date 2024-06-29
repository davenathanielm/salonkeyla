<?= $this->extend('layout/template') ?>

<!-- masukin dia ke content -->
<?= $this->section('content') ?>

<style>
    .card {
        box-shadow: 5px 10px 20px #888888;
        border-radius: 10px;
    }

    .batal:hover {
        background-color: white;
        color: red;
    }

    .simpan:hover {
        background-color: white;
        color: blue;
    }
</style>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4 mb-4">DATA LAYANAN</h1>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <?= $title ?>
            </div>
            <div class="card-body">
                <!-- Ngarah ke routes -->
                <form action="<?= base_url('layanan/edit/' . $result['Id_Layanan']) ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" name="Id_Layanan" value="<?= $result['Id_Layanan'] ?>">

                    <div class="mb-3 row">
                        <label for="Nama_Layanan" class="col-sm-2 col-form-label">Service Name</label>
                        <div class="col-sm-10">

                            <input type="text" class="form-control <?= $validation->hasError('Nama_Layanan') ? 'is-invalid'
                                                                        : '' ?>" id="Nama_Layanan" name="Nama_Layanan" value="<?= old('Nama_Layanan', $result['Nama_Layanan']) ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('Nama_Layanan') ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="Harga_Layanan" class="col-sm-2 col-form-label">Service Price</label>
                        <div class="col-sm-10">

                            <input type="text" class="form-control <?= $validation->hasError('Harga_Layanan') ? 'is-invalid'
                                                                        : '' ?>" id="Harga_Layanan" name="Harga_Layanan" value="<?= old('Harga_Layanan', $result['Harga_Layanan']) ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('Harga_Layanan') ?>
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