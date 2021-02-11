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
$hasil = $proses->tampil_data_id('tbl_site_survey_methods', 'id', $idGet);
$tbl_site_survey = $proses->tampil_data('tbl_site_survey', 'id');
$tbl_job_methods = $proses->tampil_data('tbl_job_methods', 'id');

$tbl_site_survey_id = $proses->tampil_data_id('tbl_site_survey', 'id', $_GET['id_site_survey']);
?>
<?php if (!empty($_SESSION['ADMIN'])) { ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"><?= $_GET['act']; ?> <?= $data['title']; ?> / <?php echo $tbl_projects_id['nama']; ?></h4>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form enctype="multipart/form-data" id="quickForm" action="<?= $abs; ?>/backend/pages/site-survey-methods/crud.php?act=<?= $_GET['act']; ?>" method="POST">
              <input type="hidden" value="<?php echo $hasil['id']; ?>" class="form-control" name="id">
              <div class="row">
                <div class="form-group col-md-4">
                  <label>Site Survey</label>
                  <select name="id_site_survey" id="id_site_survey" class="form-control select2bs4" required>
                    <option>-- select --</option>
                    <?php
                    foreach ($tbl_site_survey as $tbl_site_survey) { ?>
                      <option <?php if ($hasil['id_site_survey'] == $tbl_site_survey['id'] || $_GET['id_site_survey'] == $tbl_site_survey['id']) echo 'selected'; ?> value="<?= $tbl_site_survey['id']; ?>">
                        <?= $tbl_site_survey['nama']; ?>/<?= date("j M Y", strtotime($tbl_site_survey['tgl'])); ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-4">
                  <label>Methods</label>
                  <select name="id_methods" class="form-control select2bs4" required>
                    <option disabled="">-- select --</option>
                    <?php
                    foreach ($tbl_job_methods as $tbl_job_methods) { ?>
                      <option <?php if ($hasil['id_methods'] == $tbl_job_methods['id']) echo 'selected'; ?> value="<?= $tbl_job_methods['id']; ?>">
                        <?= $tbl_job_methods['nama']; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <button class="btn btn-primary btn-sm" name="create"><i class="fa fa-edit"> </i> Submit</button>
              <button class="btn btn-danger btn-sm" name="create" type="reset">Reset</button>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
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