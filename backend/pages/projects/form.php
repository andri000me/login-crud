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
$hasil = $proses->tampil_data_id('tbl_projects', 'id', $idGet);
$tbl_site_survey = $proses->tampil_data('tbl_site_survey', 'id');
$tbl_job_status = $proses->tampil_data('tbl_job_status', 'id');
// $tbl_customers = $proses->tampil_data('tbl_customers', 'id');
// $tbl_job_methods = $proses->tampil_data('tbl_job_methods', 'id');

$marketing = $proses->tampil_data_specified('id_login, nama_pengguna, id_level', 'tbl_user', 'id_level=2 || id_level=6');
$supervisor = $proses->tampil_data_specified('id_login, nama_pengguna, id_level', 'tbl_user', 'id_level=3');
?>
<?php if (!empty($_SESSION['ADMIN'])) { ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"><?= $_GET['act']; ?> <?=$data['title'];?> / <?=$hasil['nama']; ?></h4>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form id="quickForm" action="<?= $abs; ?>/backend/pages/projects/crud.php?act=<?= $_GET['act']; ?>" method="POST">
              <div class="row">
                <div class="form-group col-md-4">
                  <label>Site Survey</label>
                  <select name="id_site_survey" class="form-control select2bs4">
                    <option disabled>-- select --</option>
                    <?php
                    foreach ($tbl_site_survey as $tbl_site_survey) { ?>
                      <option <?php if ($hasil['id_site_survey'] == $tbl_site_survey['id']) echo 'selected'; ?> value="<?= $tbl_site_survey['id']; ?>">
                        <?= $tbl_site_survey['nama']; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group col-md-4">
                  <label>Nama Projects</label>
                  <input type="text" value="<?php echo $hasil['nama']; ?>" class="form-control" name="nama" required>
                  <input type="hidden" value="<?php echo $hasil['id']; ?>" class="form-control" name="id">
                </div>
                <div class="form-group col-md-4">
                  <label>Marketing</label>
                  <select name="id_marketing" class="form-control select2bs4">
                    <option disabled>-- select --</option>
                    <?php
                    foreach ($marketing as $marketing) { 
                      $tbl_user_level = $proses->tampil_data_id('tbl_user_level', 'id', $marketing['id_level']);
                      ?>
                      <option <?php if ($hasil['id_marketing'] == $marketing['id_login']) echo 'selected'; ?> value="<?= $marketing['id_login']; ?>">
                        <?= $marketing['nama_pengguna']; ?>/<?=$tbl_user_level['nama'];?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label>Supervisor</label>
                  <select name="id_supervisor" class="form-control select2bs4">
                    <option disabled>-- select --</option>
                    <?php
                    foreach ($supervisor as $supervisor) { 
                      $tbl_user_level = $proses->tampil_data_id('tbl_user_level', 'id', $supervisor['id_level']);
                      ?>
                      <option <?php if ($hasil['id_supervisor'] == $supervisor['id_login']) echo 'selected'; ?> value="<?= $supervisor['id_login']; ?>">
                        <?= $supervisor['nama_pengguna']; ?>/<?=$tbl_user_level['nama'];?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label>Status</label>
                  <select name="id_status" class="form-control select2bs4">
                    <option disabled>-- select --</option>
                    <?php
                    foreach ($tbl_job_status as $tbl_job_status) { ?>
                      <option <?php if ($hasil['id_status'] == $tbl_job_status['id']) echo 'selected'; ?> value="<?= $tbl_job_status['id']; ?>">
                        <?= $tbl_job_status['nama']; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label>Progress (0-100%)</label>
                  <input type="number" maxlength="3" value="<?php echo $hasil['progress']; ?>" class="form-control" name="progress" required>
                </div>
                <div class="form-group col-md-4">
                  <label>Biaya Dikeluarkan</label>
                  <input type="number" value="<?= $hasil['budget_spent']; ?>" class="form-control" name="budget_spent" required>
                </div>
                <div class="form-group col-md-4">
                  <label>Durasi</label>
                  <input type="number" value="<?= $hasil['duration']; ?>" class="form-control" name="duration" required>
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