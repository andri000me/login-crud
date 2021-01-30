<?php
// session start
if (!empty($_SESSION)) {
} else {
  session_start();
}
// require 'proses/panggil.php';
?>
<?php include "../../api/panggil.php"; ?>
<!DOCTYPE html>
<html lang="en">
<?php include "../layouts/head-moroom.php"; ?>
<?php if (!empty($_SESSION['ADMIN'])) { ?>

  <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
      <!-- Navbar -->
      <?php include "../layouts/navbar.php"; ?>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <?php include "../layouts/aside.php"; ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?php include "../layouts/header.php"; ?>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <!-- /.card -->

                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">DataTable with default features</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="contoh" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama</th>
                          <th>Username</th>
                          <th>Level</th>
                          <th>Telepon</th>
                          <th>Email</th>
                          <th>Alamat</th>
                          <th>Action</th>
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
          <!--/. container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->

      <!-- Main Footer -->
      <?php include "../layouts/footer.php"; ?>
    </div>
    <!-- ./wrapper -->

    <?php include "../layouts/scripts.php"; ?>
  </body>
<?php } else { ?>
  <br />
  <div class="alert alert-info">
    <h3>Your session has been expired</h3>
    <hr />
    <p><a href="<?= $abs; ?>/backend/login.php">Please login here</a></p>
  </div>
<?php } ?>

</html>
<script type="text/javascript">
  $("#contoh").dataTable({
    'bProcessing': true,
    'bServerSide': true,
    //disable order dan searching pada tombol aksi
    "columnDefs": [{
      "targets": [0],
      "orderable": false,
      "searchable": false
    }],
    "ajax": {
      url: "data.php",
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
</script>