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
<?php include "../layouts/head.php"; ?>
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
          <?php include "../layouts/contents.php"; ?>
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
    <p><a href="<?=$abs;?>/backend/login.php">Please login here</a></p>
  </div>
<?php } ?>

</html>