<?php
// session start
if (!empty($_SESSION)) {
} else {
  session_start();
}
//session
if (!empty($_SESSION['ADMIN'])) {
} else {
  header('location:login.php');
}
// panggil file
// require '../../api/panggil.php';
// tampilkan form edit
$idGet = strip_tags($_GET['id']);
$hasil = $proses->tampil_data_id('tbl_customers', 'id', $idGet);
?>
<?php if (!empty($_SESSION['ADMIN']) && $level['id'] == 1 || $level['id'] == 2) { ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"><?= $_GET['act']; ?> <?= $_GET['page']; ?> / <?php echo $hasil['nama']; ?></h4>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form id="quickForm" action="<?= $abs; ?>/backend/pages/customers/crud.php?act=<?= $_GET['act']; ?>" method="POST">
              <div class="row">
                <div class="form-group col-md-4">
                  <label>Nama </label>
                  <input type="text" value="<?php echo $hasil['nama']; ?>" class="form-control" name="nama" required>
                  <input type="hidden" value="<?php echo $hasil['id']; ?>" class="form-control" name="id">
                </div>
                <div class="form-group col-md-4">
                  <label>Telepon</label>
                  <input type="text" value="<?php echo $hasil['telepon']; ?>" class="form-control" name="telepon" required>
                </div>
                <div class="form-group col-md-4">
                  <label>Email</label>
                  <input type="email" value="<?php echo $hasil['email']; ?>" class="form-control" name="email">
                </div>
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $hasil['alamat']; ?></textarea>
              </div>
              <div class="row">
                <div class="form-group col-md-4">
                  <label>PIC</label>
                  <input type="text" value="<?php echo $hasil['pic']; ?>" class="form-control" name="pic">
                </div>
              </div>
              <button class="btn btn-primary btn-sm" name="create"><i class="fa fa-edit"> </i> Submit</button>
              <input type="reset" class="btn btn-danger btn-sm">
            </form>
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