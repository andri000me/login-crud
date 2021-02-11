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
$hasil = $proses->tampil_data_id('tbl_req_survey', 'id', $idGet);
$tbl_customers = $proses->tampil_data('tbl_customers', 'id');
// $tbl_job_methods = $proses->tampil_data('tbl_job_methods', 'id');
// $tbl_job_status = $proses->tampil_data('tbl_job_status', 'id');
?>
<?php if (!empty($_SESSION['ADMIN'])) { ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->
        <div class="card card-default">
          <div class="card-header">
            <h4 class="card-title"><?= $_GET['act']; ?> survey request - <?php echo $hasil['nama']; ?></h4>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form enctype="multipart/form-data" id="quickForm" action="<?= $abs; ?>/backend/pages/req-survey/crud.php?act=<?= $_GET['act']; ?>" method="POST">
              <div class="row">
                <div class="form-group col-4">
                  <label for="id_customers">Customers</label>
                  <select name="id_customers" id="id_customers" class="form-control select2bs4" required>
                    <option>-- select --</option>
                    <?php
                    foreach ($tbl_customers as $tbl_customers) { ?>
                      <option <?php if ($hasil['id_customers'] == $tbl_customers['id']) echo 'selected'; ?> value="<?= $tbl_customers['id']; ?>">
                        <?= $tbl_customers['nama']; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-4">
                  <label>Nama Survey</label>
                  <input type="nama" value="<?php echo $hasil['nama']; ?>" class="form-control" name="nama" required>
                  <input type="hidden" value="<?php echo $hasil['id']; ?>" class="form-control" name="id">
                </div>
                <div class="form-group col-4">
                  <label>Tanggal</label>
                  <input type="date" value="<?php echo $hasil['tgl']; ?>" class="form-control" name="tgl" required>
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