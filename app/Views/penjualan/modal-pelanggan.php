<!-- modal ada di folder html bagian ui-modal -->
<div class="modal fade" id="modalCust" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-x1">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Data Pelanggan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Tabel Supplier -->
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="20%">Name</th>
                            <th width="30%">Gender</th>
                            <th width="15%">Phone Number</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($dataPelanggan as $value) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['Nama_Pelanggan'] ?></td>
                                <td><?= $value['Jenis_Kelamin'] ?></td>
                                <td><?= $value['Nomor_Telepon'] ?></td>
                                <td>
                                    <button onclick="selectPelanggan('<?= $value['Id_Pelanggan'] ?>','<?= $value['Nama_Pelanggan'] ?>')" class="btn btn-success"><i class="fa fa-cart-plus"></i> Pilih</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- -->
            </div>
            <!-- modal ada di folder html bagian ui-modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    function selectPelanggan(id, name) {
        // ini berhubungan sama controller penjualan fungsi pembayaran
        $('#Id_Pelanggan').val(id);
        $('#Nama_Pelanggan').val(name);
        $('#modalCust').modal('hide');
    }
</script>