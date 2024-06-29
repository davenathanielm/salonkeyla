<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">DATA TRANSAKSI</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <?= $title ?>
            </div>
            <div>
                <div class="card-body">
                    <!-- Isi POS -->
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <label class="col-form-label">Tanggal: </label>
                                <br>
                                <input type="text" value="<?= date('d/m/Y') ?>" disabled>
                            </div>

                            <div class="col">
                                <label class="col-form-label">User: </label>
                                <br>
                                <input type="text" value="<?= session()->user_name ?>" disabled>
                            </div>

                            <!-- <div class="col">
                                    <label class="col-form-label">User: </label>
                                    <input type="text" value="< ?= session()->user_name ?>" disabled>
                                </div> -->
                            
                            <div class="col mt-4">
                                <!-- <button class="btn btn-primary mr-4" data-bs-target="#modalLayanan" data-bs-toggle="modal">Layanan</button> -->
                                <!-- <button class="btn btn-primary" data-bs-target="#modalLayanan" data-bs-toggle="modal">Layanan</button> -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalStok">
                                    Stok
                                </button>
                                
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover mt-4">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="detail_cart"></tbody>
                    </table>

                    <div class="container">
                        <div class="row">
                            <div class="col-8">
                                <label class="col-form-label">Total Bayar</label>
                                <h1><span id="spanTotal">0</span></h1>
                            </div>
                            <div class="col-4">
                                <div class="mb-3 row">
                                    <label class="col-4 col-form-label">Nominal</label>
                                    <div class="col-8">
                                        <input type="text" class="form-control" id="nominal" autocomplete="off">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-4 col-form-label">Kembalian</label>
                                    <div class="col-8">
                                        <input type="text" class="form-control" id="kembalian" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-grip gap-3 d-md-flex justify-content-md-end">
                            <button onclick="bayar()" class="btn btn-success me-md-2" type="button">Proses Bayar</button>
                            <button onclick="location.reload()" class="btn btn-primary ml-4" type="button">Transaksi Baru</button>
                        </div>
                    </div>
                    <!-- -->
                </div>
            </div>
        </div>
</main>
<?= $this->include('pembelian/modal-stok') ?>
<script>
    function load() {
        $('#detail_cart').load('/beli/load');
        $('#spanTotal').load('/beli/getTotal');
    }

    $(document).ready(function() {
        load();
    });

    $(document).on('click', '.ubah_cart', function() {
        var row_id = $(this).attr("id");
        var qty = $(this).attr("qty");
        $('#rowid').val(row_id);
        $('#qty').val(qty);
        $('#modalUbah').modal('show');
    });

    $(document).on('click', '.hapus_cart', function() {
        var row_id = $(this).attr("id");
        $.ajax({
            url: "beli/" + row_id,
            method: "DELETE",
            success: function(data) {
                load();
            }
        });
    });

    function bayar() {
        var nominal = $('#nominal').val();
        var idpelanggan = $('#Id_Pelanggan').val();
        $.ajax({
            url: "/beli/bayar",
            method: "POST",
            data: {
                'nominal': nominal,
                'Id_Pelanggan': idpelanggan
            },
            success: function(response) {
                var result = JSON.parse(response);
                swal({
                    title: result.msg,
                    icon: result.status ? "success" : "error",
                });
                load();
                $('#nominal').val("");
                $('#kembalian').val(result.data.kembalian);
            }
        });
    }
</script>
<?= $this->endSection() ?>