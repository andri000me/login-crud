<?php
// session start
if (!empty($_SESSION)) {
} else {
  session_start();
}
// require 'proses/panggil.php';
?>
<?php if (!empty($_SESSION['ADMIN'])) { ?>

  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Produk</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="produk" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Kategori</th>
                  <th>Gambar</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
  </div>
<?php } else { ?>
  <br />
  <div class="alert alert-info">
    <h3>Your session has been expired</h3>
    <hr />
    <p><a href="<?= $abs; ?>/backend/login.php">Please login here</a></p>
  </div>
<?php } ?>
<script>
  $(function() {
    $("#produk").dataTable({
      'bProcessing': true,
      'bServerSide': true,
      //disable order dan searching pada tombol aksi
      "columnDefs": [{
        "targets": [3],
        "orderable": false,
        "searchable": false
      }],
      "ajax": {
        // url: "<?= $abs; ?>/backend/pages/produk/data-ajax.php",
        url: "../../data/ajax/produk.php",
        type: "post", // method  , by default get
        //bisa kirim data ke server
        /*data: function ( d ) {
                  d.jurusan = "3223";
              },*/
        error: function(xhr, error, thrown) {
          console.log(xhr);
        }
      },
    });

  });
</script>