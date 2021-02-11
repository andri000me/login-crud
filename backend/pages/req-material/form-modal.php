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
$hasil = $proses->tampil_data_id('tbl_req_material', 'id', $idGet);
$tbl_site_survey = $proses->tampil_data('tbl_site_survey', 'id');
// $tbl_job_methods = $proses->tampil_data('tbl_job_methods', 'id');
$tbl_site_survey_id = $proses->tampil_data_id('tbl_site_survey', 'id', $hasil['id_site_survey']);
?>
<?php if (!empty($_SESSION['ADMIN'])) { ?>
  <form enctype="multipart/form-data" id="quickForm" action="<?= $abs; ?>/backend/pages/req-material/crud.php?act=tambah&ref=site-survey" method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Material Request</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" value="<?php echo $hasil['id']; ?>" class="form-control" name="id">
        <div class="row">
          <div class="form-group col-md-4">
            <label for="id_site_survey">Site Survey</label>
            <select name="id_site_survey" id="id_site_survey" class="form-control select2bs4" required>
              <option>-- select --</option>
              <?php
              foreach ($tbl_site_survey as $tbl_site_survey) { ?>
                <option <?php if ($hasil['id_site_survey'] == $tbl_site_survey['id'] || $_GET['id'] == $tbl_site_survey['id']) echo 'selected'; ?> value="<?= $tbl_site_survey['id']; ?>">
                  <?= $tbl_site_survey['nama']; ?>/<?= date("j M Y", strtotime($tbl_site_survey['tgl'])); ?>
                </option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="id_customers">Product</label>
            <select name="id_products" id="id_products" class="form-control select2bs4" required>
              <option>-- select --</option>
              <?php
              $api_categories_list = $api_url_tomat . '/4dm1n01102017/api/prod/list.php';
              $json_list = @file_get_contents($api_categories_list);
              $array = json_decode($json_list, true);
              $result = isset($array['result']) ? $array['result'] : array();
              $no = 0;
              foreach ($result as $arr) {
              ?>
                <option <?php if ($hasil['id_products'] == $arr['id']) echo 'selected'; ?> value="<?= $arr['id']; ?>">
                  <?= $arr['nama']; ?>/<?="Rp. ".number_format($arr['harga'], 0, '.', '.');?>
                </option>
              <?php $no++;} ?>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label>Jumlah</label>
            <input type="number" value="<?=$hasil['jumlah']; ?>" class="form-control" name="jumlah" required>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="Submit" class="btn btn-primary">Save changes</button>
      </div>
      
    </div>
  </form>
<?php } else { ?>
  <br />
  <div class="alert alert-info">
    <h3>Your session has been expired</h3>
    <hr />
    <p><a href="<?= $abs; ?>/backend/login.php">Please login here</a></p>
  </div>
<?php } ?>

