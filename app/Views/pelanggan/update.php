<?= $this->extend('layout/template') ?>

<!-- masukin ke content -->
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
        <h1 class="mt-4 mb-4">DATA PELANGGAN</h1>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <?= $title ?>
            </div>
            <div class="card-body">
                <form action="<?= base_url('pelanggan/edit/' . $result['Id_Pelanggan']) ?>" method="POST" enctype="multipart/form-data">

                    <?= csrf_field() ?>
                    <input type="hidden" name="Id_Pelanggan" value="<?= $result['Id_Pelanggan'] ?>">

                    <div class="mb-3 row">
                        <label for="Jenis_Kelamin" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-4">
                            <select type="text" class="form-control <?= $validation->hasError('Jenis_Kelamin') ? 'is-invalid'
                                                                        : '' ?>" id="Jenis_Kelamin" name="Jenis_Kelamin" value="<?= old('Jenis_Kelamin', $result['Jenis_Kelamin']) ?>">
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('Jenis_Kelamin') ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="Nama_Pelanggan" class="col-sm-2 col-form-label">Customer Name</label>
                        <div class="col-sm-10">

                            <input type="text" class="form-control <?= $validation->hasError('Nama_Pelanggan') ? 'is-invalid'
                                                                        : '' ?>" id="Nama_Pelanggan" name="Nama_Pelanggan" value="<?= old('Nama_Pelanggan', $result['Nama_Pelanggan']) ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('Nama_Pelanggan') ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="Nomor_Telepon" class="col-sm-2 col-form-label">Phone Number </label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control <?= $validation->hasError('Nomor_Telepon') ? 'is-invalid'
                                                                        : '' ?>" id="Nomor_Telepon" name="Nomor_Telepon" value="<?= old('Nomor_Telepon', $result['Nomor_Telepon']) ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('Nomor_Telepon') ?>
                            </div>
                        </div>
                    </div>



                    <div class="d-grip gap-2 d-md-flex justify-content-md-end">
                        <button class="btn simpan btn-primary me-md-2 " type="submit">Update</button>
                        <button class="btn batal btn-danger ml-3" type="reset">Cancel</button>
                    </div>
            </div>
            </form>


        </div>
    </div>

</main>
<?= $this->endSection() ?>