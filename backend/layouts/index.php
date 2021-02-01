<?php include "../../api/panggil.php"; ?>
<!DOCTYPE html>
<html lang="en">
<?php include "head.php"; ?>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <?php include "navbar.php"; ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include "aside.php"; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <?php include "header.php"; ?>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <?php include "contents.php"; ?>
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
    <?php include "footer.php"; ?>
  </div>
  <!-- ./wrapper -->

  <?php include "scripts.php"; ?>
</body>

</html>