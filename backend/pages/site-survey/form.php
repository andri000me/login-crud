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
$hasil = $proses->tampil_data_id('tbl_site_survey', 'id', $idGet);
$tbl_customers = $proses->tampil_data('tbl_customers', 'id');
$tbl_job_methods = $proses->tampil_data('tbl_job_methods', 'id');
// $tbl_job_status = $proses->tampil_data('tbl_job_status', 'id');
?>
<?php if (!empty($_SESSION['ADMIN'])) { ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->
        <div class="card card-default">
          <div class="card-header">
            <h4 class="card-title"><?= $_GET['act']; ?> site survey - <?php echo $hasil['nama']; ?></h4>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form enctype="multipart/form-data" id="quickForm" action="<?= $abs; ?>/backend/pages/site-survey/crud.php?act=<?= $_GET['act']; ?>" method="POST">
              <div class="row">
                <div class="form-group col-md-4">
                  <label for="id_customers">Customers</label>
                  <select name="id_customers" id="id_customers" class="form-control select2bs4" required>
                    <option>-- select --</option>
                    <?php
                    foreach ($tbl_customers as $tbl_customers) { ?>
                      <option <?php if ($hasil['id_customers'] == $tbl_customers['id']) echo 'selected'; ?> value="<?= $tbl_customers['id']; ?>">
                        <?= $tbl_customers['nama']; ?>/<?= $tbl_customers['pic']; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label>Nama Survey</label>
                  <input type="nama" value="<?php echo $hasil['nama']; ?>" class="form-control" name="nama" required>
                  <input type="hidden" value="<?php echo $hasil['id']; ?>" class="form-control" name="id">
                </div>
                <div class="form-group col-md-4">
                  <label>Tanggal</label>
                  <input type="date" value="<?php echo $hasil['tgl']; ?>" class="form-control" name="tgl" required>
                </div>

                <div class="form-group col-md-4">
                  <label>Access</label>
                  <input type="text" value="<?php echo $hasil['access']; ?>" class="form-control" name="access" required>
                </div>
                <div class="form-group col-md-4">
                  <label>Volume (meter)</label>
                  <input type="number" value="<?php echo $hasil['volume']; ?>" class="form-control" name="volume" required>
                </div>
                <!-- <div class="form-group col-md-4">
                  <label>Metode</label>
                  <select name="id_methods" class="form-control select2bs4">
                    <option disabled>-- select --</option>
                    <?php
                    foreach ($tbl_job_methods as $tbl_job_methods) { ?>
                      <option <?php if ($hasil['id_methods'] == $tbl_job_methods['id']) echo 'selected'; ?> value="<?= $tbl_job_methods['id']; ?>">
                        <?= $tbl_job_methods['nama']; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div> -->
                <div class="form-group col-12">
                  <label>Detail Objection</label>
                  <textarea name="dtl_obj" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $hasil['dtl_obj']; ?></textarea>
                </div>
                <?php for ($i = 1; $i <= 8; $i++) { ?>
                  <div class="form-group col-md-3">
                    <?php if ($fopen = fopen('../../assets/uploads/images/site-survey/' . $hasil['acak'] . '-' . $i . '.jpg', 'r')) { ?>
                      <img src="<?= $abs; ?>/assets/uploads/images/site-survey/<?= $hasil['acak']; ?>-<?= $i; ?>.jpg" height="40">
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
              <input type="reset" class="btn btn-danger btn-sm">
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h4 class="card-title"><?=$data['title'];?> Gallery</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <?php for ($i = 1; $i <= 8; $i++) { 
                if ($fopen = fopen('../../assets/uploads/images/site-survey/' . $hasil['acak'] . '-' . $i . '.jpg', 'r')) { 
                  $images=$abs."/assets/uploads/images/site-survey/".$hasil['acak']."-".$i.".jpg";
                } else {
                  $images=$abs."/assets/logo.png";
                }
                ?>
                <div class="col-sm-2">
                  <a href="<?=$images;?>" data-toggle="lightbox" data-title="<?=$hasil['nama'];?>" data-gallery="gallery">
                    <img src="<?=$abs;?>/backend/timthumb.php?src=<?=$images;?>" height="40" class="img-fluid mb-2" alt="<?=$hasil['nama'];?>">
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

