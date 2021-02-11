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
$hasil = $proses->tampil_data_id('tbl_invoices', 'id', $idGet);
$tbl_projects = $proses->tampil_data('tbl_projects', 'id');
$tbl_payments = $proses->tampil_data('tbl_payments', 'id');
?>
<?php if (!empty($_SESSION['ADMIN'])) { ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"><?= $_GET['act']; ?> <?=$data['title'];?> - <?=$hasil['no_faktur']; ?></h4>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form id="quickForm" action="<?= $abs; ?>/backend/pages/invoices/crud.php?act=<?= $_GET['act']; ?>" method="POST">
              <div class="row">
                <div class="form-group col-md-4">
                  <label>Projects</label>
                  <select name="id_projects" class="form-control select2bs4">
                    <option disabled>-- select --</option>
                    <?php
                    foreach ($tbl_projects as $tbl_projects) { ?>
                      <option <?php if ($hasil['id_projects'] == $tbl_projects['id']) echo 'selected'; ?> value="<?= $tbl_projects['id']; ?>">
                        <?= $tbl_projects['nama']; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group col-md-4">
                  <label>No. Faktur</label>
                  <input type="text" value="<?=$hasil['no_faktur']; ?>" class="form-control" name="no_faktur" required>
                  <input type="hidden" value="<?php echo $hasil['id']; ?>" class="form-control" name="id">
                </div>
                <div class="form-group col-md-4">
                  <label>No. Quotation</label>
                  <input type="text" value="<?=$hasil['no_quo']; ?>" class="form-control" name="no_quo" required>
                </div>
                <div class="form-group col-md-4">
                  <label>Tanggal</label>
                  <input type="date" value="<?php echo $hasil['tgl']; ?>" class="form-control" name="tgl" required>
                </div>
                <div class="form-group col-md-4">
                  <label>Tanggal Jatuh Tempo Uang Muka</label>
                  <input type="date" value="<?=$hasil['tgl_due']; ?>" class="form-control" name="tgl_due">
                </div>
                <div class="form-group col-md-4">
                  <label>Jenis Pembayaran</label>
                  <select name="id_payments" class="form-control select2bs4">
                    <option disabled>-- select --</option>
                    <?php
                    foreach ($tbl_payments as $tbl_payments) { ?>
                      <option <?php if ($hasil['id_payments'] == $tbl_payments['id']) echo 'selected'; ?> value="<?= $tbl_payments['id']; ?>">
                        <?= $tbl_payments['nama']; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <button class="btn btn-primary btn-sm" name="create"><i class="fa fa-edit"> </i> Submit</button>
              <input type="reset" class="btn btn-danger btn-sm" name="progress" required>
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