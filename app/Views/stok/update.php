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
        <h1 class="mt-4 mb-4">DATA STOCK</h1>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <?= $title ?>
            </div>
            <div class="card-body">
                <form action="<?= base_url('stok/edit/' . $result['Id_Barang']) ?>" method="POST" enctype="multipart/form-data">

                    <?= csrf_field() ?>
                    <input type="hidden" name="Id_Barang" value="<?= $result['Id_Barang'] ?>">
                    <!-- <input type="hidden" name="user_id" value="< ?= $session()->get('user_id') ?>"> -->

                    <div class="mb-3 row">
                        <label for="Nama_Barang" class="col-sm-2 col-form-label">Product Name</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('Nama_Barang') ? 'is-invalid'
                                                                        : '' ?>" id="Nama_Barang" name="Nama_Barang" value="<?= old('Nama_Barang', $result['Nama_Barang']) ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('Nama_Barang') ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="Jumlah_Barang" class="col-sm-2 col-form-label"> Amount </label>
                        <div class="col-sm-10">

                            <input type="text" class="form-control <?= $validation->hasError('Jumlah_Barang') ? 'is-invalid'
                                                                        : '' ?>" id="Jumlah_Barang" name="Jumlah_Barang" value="<?= old('Jumlah_Barang', $result['Jumlah_Barang']) ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('Jumlah_Barang') ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="Harga_Barang" class="col-sm-2 col-form-label"> Price </label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control <?= $validation->hasError('Harga_Barang') ? 'is-invalid'
                                                                        : '' ?>" id="Harga_Barang" name="Harga_Barang" value="<?= old('Harga_Barang', $result['Harga_Barang']) ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('Harga_Barang') ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="Gambar" class="col-sm-2 col-form-label">Picture</label>
                        <div class="col-sm-5">
                            <input type="hidden" name="gambarlama" value="<?= $result['Gambar'] ?>">
                            <input type="file" class=" <?= $validation->hasError('Gambar') ?
                                                            'is-invalid' : '' ?>" id="Gambar" name="Gambar" value="Gambar" onchange="previewImage()">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('Gambar') ?>
                            </div>
                            <div class="col-sm-6 mt-2">
                                <img src="/img/<?= $result['Gambar'] == "" ? "default.jpg" : $result['Gambar'] ?>" alt="" class="img-thumbnail img-preview">
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