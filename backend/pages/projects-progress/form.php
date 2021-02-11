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
$hasil = $proses->tampil_data_id('tbl_projects_progress', 'id', $idGet);
$tbl_projects = $proses->tampil_data('tbl_projects', 'id');

$tbl_projects_id = $proses->tampil_data_id('tbl_projects', 'id', $_GET['id_projects']);
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
            <form enctype="multipart/form-data" id="quickForm" action="<?= $abs; ?>/backend/pages/projects-progress/crud.php?act=<?= $_GET['act']; ?>" method="POST">
              <input type="hidden" value="<?php echo $hasil['id']; ?>" class="form-control" name="id">
              <div class="row">
                <div class="form-group col-md-4">
                  <label>Projects</label>
                  <input type="text" value="<?= $tbl_projects_id['nama']; ?>" class="form-control" name="id_projects" disabled>
                  <input type="hidden" value="<?= $tbl_projects_id['id']; ?>" class="form-control" name="id_projects">

                  <!-- <select name="id_projects" class="form-control select2bs4" required>
                    <option>-- select --</option>
                    <?php
                    foreach ($tbl_projects as $tbl_projects) { ?>
                      <option <?php if ($hasil['id_projects'] == $tbl_projects['id']) echo 'selected'; ?> value="<?= $tbl_projects['id']; ?>">
                        <?= $tbl_projects['nama']; ?>
                      </option>
                    <?php } ?>
                  </select> -->
                </div>
                <!-- <div class="form-group col-4">
                  <label>Nama </label>
                  <input type="text" value="<?php echo $hasil['nama']; ?>" class="form-control" name="nama" required>
                </div> -->
                <div class="form-group col-md-4">
                  <label>Tanggal</label>
                  <input type="date" value="<?php echo $hasil['tgl']; ?>" class="form-control" name="tgl" required>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-4">
                  <label>Job Planning</label>
                  <textarea name="job_plan" class="textarea-" placeholder="Place some text here" style="width: 100%; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $hasil['job_plan']; ?></textarea>
                </div>
                <div class="form-group col-md-4">
                  <label>Job Repair</label>
                  <textarea name="job_repair" class="textarea-" placeholder="Place some text here" style="width: 100%; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $hasil['job_repair']; ?></textarea>
                </div>
                <div class="form-group col-md-4">
                  <label>Note</label>
                  <textarea name="note" class="textarea-" placeholder="Place some text here" style="width: 100%; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $hasil['note']; ?></textarea>
                </div>
                <?php for ($i = 1; $i <= 8; $i++) { ?>
                  <div class="form-group col-md-3">
                    <?php if ($fopen = fopen('../../assets/uploads/images/projects-progress/' . $hasil['acak'] . '-' . $i . '.jpg', 'r')) { ?>
                      <img src="<?= $abs; ?>/assets/uploads/images/projects-progress/<?= $hasil['acak']; ?>-<?= $i; ?>.jpg" height="40">
                    <?php } else { ?>
                      <img src="<?= $abs; ?>/assets/logo.png" height="40">
                    <?php } ?>
                    <label for="file<?= $i; ?>">Images <?= $i; ?></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input-" id="file<?= $i; ?>" name="file<?= $i; ?>">
                        <!-- <label class="custom-file-label" for="file<?= $i; ?>">Choose file</label> -->
                      </div>
                      <!-- <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div> -->
                    </div>
                  </div>
                <?php } ?>
              </div>
              <button class="btn btn-primary btn-sm" name="create"><i class="fa fa-edit"> </i> Submit</button>
              <button class="btn btn-danger btn-sm" name="create" type="reset">Reset</button>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h4 class="card-title"><?= $data['title']; ?> Gallery</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <?php for ($i = 1; $i <= 8; $i++) {
                if ($fopen = fopen('../../assets/uploads/images/projects-progress/' . $hasil['acak'] . '-' . $i . '.jpg', 'r')) {
                  $images = $abs . "/assets/uploads/images/projects-progress/" . $hasil['acak'] . "-" . $i . ".jpg";
                } else {
                  $images = $abs . "/assets/logo.png";
                }
              ?>
                <div class="col-sm-2">
                  <a href="<?= $images; ?>" data-toggle="lightbox" data-title="<?= $tbl_projects_id['nama']; ?>" data-gallery="gallery">
                    <img src="<?= $abs; ?>/backend/timthumb.php?src=<?= $images; ?>" height="40" class="img-fluid mb-2" alt="<?= $tbl_projects_id['nama']; ?>">
                  </a>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
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