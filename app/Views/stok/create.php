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
        <h1 class="mt-4 mb-4">DATA STOCK</h1>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <?= $title ?>
            </div>
            <div class="card-body">
                <!-- Ngarah ke routes -->
              
                <form action="<?= base_url('stok/create') ?>" method="POST" enctype="multipart/form-data">
                <!-- csrf itu supaya form nya hanya bisa diisi melalui form itu saja -->
                    <?= csrf_field() ?>
                    <div class="mb-3 row">
                        <label for="Nama_Barang" class="col-sm-2 col-form-label">Product Name</label>
                        <div class="col-sm-10">
                            
                        <!-- is-invalid untuk ngirim yang pesan data harus diisi dan lain-lain css nya -->
                        <!-- arti $ validation has error : 
                            jika di dalam validation  itu ada error  untuk input bagian Nama_Barang  tanda tanya atau ngapin , cetaik is invalid ,
                            kalau false atau gaa error gausa di tulis apa"-->
                            <input type="text" class="form-control <?= $validation->hasError('Nama_Barang') ? 'is-invalid'
                                                                        : '' ?>" id="Nama_Barang" name="Nama_Barang" value="<?= old('Nama_Barang') ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                            <!-- getError untuk manggil tulisan error di dalam controller nya -->
                                <?= $validation->getError('Nama_Barang') ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="Jumlah_Barang" class="col-sm-2 col-form-label">Amount</label>
                        <div class="col-sm-10">
                            <!-- name itu untuk cocokin validasi di controller  -->

                            <input type="text" class="form-control <?= $validation->hasError('Jumlah_Barang') ? 'is-invalid'
                                                                        : '' ?>" id="Jumlah_Barang" name="Jumlah_Barang" value="<?= old('Jumlah_Barang') ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('Jumlah_Barang') ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="Harga_Barang" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">

                            <input type="text" class="form-control <?= $validation->hasError('Harga_Barang') ? 'is-invalid'
                                                                        : '' ?>" id="Harga_Barang" name="Harga_Barang" value="<?= old('Harga_Barang') ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('Harga_Barang') ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <!-- ini untuk insert file -->
                        <label for="Gambar" class="col-sm-2 col-form-label">Picture</label>
                        <div class="col-sm-5">

                            <input type="file" class="<?= $validation->hasError('Gambar') ?
                                                            'is-invalid' : '' ?>" id="Gambar" name="Gambar" value="Gambar" onchange="previewImage()">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('Gambar') ?>
                            </div>
                            <div class="col-sm-6 mt-2">
                                <img src="/img/default.jpg" alt="" class="img-thumbnail img-preview mt-4">
                              
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