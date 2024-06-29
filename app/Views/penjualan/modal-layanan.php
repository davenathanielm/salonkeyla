 <!-- modal ada di folder html bagian ui-modal -->
 <div class="modal fade" id="modalLayanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-x1">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalToggleLabel">Data Layanan</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <!-- Tabel Supplier -->
                 <!-- pakai table class untuk datatablessimple -->
                 <table class="table table-striped table-bordered">
                     <thead>
                         <tr>
                             <th width="5%">No</th>
                             <th width="20%">Name</th>
                             <th width="30%">Price</th>
                             <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $no = 1;
                            foreach ($dataLayanan as $value) : ?>
                             <tr>
                                 <td><?= $no++ ?></td>
                                 <td><?= $value['Nama_Layanan'] ?></td>
                                 <td><?= $value['Harga_Layanan'] ?></td>
                                 <td>
                                     <!-- <button onclick="selectLayanan('< ?= $value['Id_Layanan'] ?>','< ?= $value['Nama_Layanan'] ?>','< ?= $value['Harga_Layanan'] ?>')" class="btn btn-success"><i class="fa fa-cart-plus"></i> Add</button> -->
                                     <!-- ini untuk masukin value ke dalam cart -->
                                     <button type="button" onclick="add_cart('<?= $value['Id_Layanan'] ?>','<?= $value['Nama_Layanan'] ?>','<?= $value['Harga_Layanan'] ?>')" class="btn btn-primary">Save changes</button>
                                 </td>
                             </tr>
                         <?php endforeach; ?>
                     </tbody>
                 </table>
                 <!-- -->
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             </div>
         </div>
     </div>
 </div>
 <script>
     function add_cart(id, name, price) {
         $.ajax({
             url: "<?= base_url('jual/addCart') ?>",
             method: "POST",
             data: {
                 id: id,
                 name: name,
                 qty: 1,
                 price: price,
             },
             success: function(data) {
                 load()
             }
         });
     }
 </script>
 <!-- <div class="modal fade" id="modalUbah" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Ubah Jumlah Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mt-3">
                    <div class="col-sm-7">
                        <input type="hidden" id="rowid">
                        <input type="number" id="qty" class="form-control" placeholder="Masukkan Jumlah Produk" min="1" value="1">
                    </div>
                    <div class="col-sm-5">
                        <button class="btn btn-primary" onclick="update_cart()">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
 <script>
     // function update_cart() {
     //     var rowid = $('#rowid').val();
     //     var qty = $('#qty').val();

     //     $.ajax({
     //         url: "/beli/update",
     //         method: "POST",
     //         data: {
     //             rowid: rowid,
     //             qty: qty,
     //         },
     //         success: function(data) {
     //             load();
     //             $('#modalUbah').modal('hide');
     //         }
     //     });
     // }

     //  $(document).on('click', '.hapus_cart', function() {
     //      var row_id = $(this).attr("id");
     //      $.ajax({
     //          url: "jual/" + row_id,
     //          method: "GET",
     //          success: function(data) {
     //              load();
     //          }
     //      });
     //  });
 </script>