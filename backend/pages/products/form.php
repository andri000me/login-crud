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
$hasil = $proses->tampil_data_id('tbl_products', 'id', $idGet);
$tbl_brands = $proses->tampil_data('tbl_brands', 'id');
?>
<?php if (!empty($_SESSION['ADMIN'])) { ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"><?= $_GET['act']; ?> <?= $data['title']; ?> / <?=$hasil['nama']; ?></h4>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form id="quickForm" action="<?= $abs; ?>/backend/pages/products/crud.php?act=<?= $_GET['act']; ?>" method="POST">
              <div class="row">
                <div class="form-group col-md-4">
                  <label>Nama </label>
                  <input type="text" value="<?=$hasil['nama']; ?>" class="form-control" name="nama" required>
                  <input type="hidden" value="<?=$hasil['id']; ?>" class="form-control" name="id">
                </div>
                <div class="form-group col-md-4">
                  <label>Brands</label>
                  <select name="id_brands" id="id_brands" class="form-control select2bs4" required>
                    <option>-- select --</option>
                    <?php
                    foreach ($tbl_brands as $tbl_brands) { ?>
                      <option <?php if ($hasil['id_brands'] == $tbl_brands['id']) echo 'selected'; ?> value="<?= $tbl_brands['id']; ?>">
                        <?= $tbl_brands['nama']; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label>Harga</label>
                  <input type="number" value="<?=$hasil['harga']; ?>" class="form-control" name="harga">
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