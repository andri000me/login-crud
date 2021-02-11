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
$idGet = strip_tags($_GET['idkat']);
$hasil = $proses->tampil_data_id('kategori', 'idkat', $idGet);
?>
<?php if (!empty($_SESSION['ADMIN'])) { ?>

  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <h4 class="card-title"><?= $_GET['act']; ?> kategori - <?php echo $hasil['nama']; ?></h4>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form action="<?= $abs; ?>/backend/pages/kategori/crud.php?act=<?=$_GET['act'];?>" method="POST">
              <div class="form-group">
                <label>Nama </label>
                <input type="text" value="<?php echo $hasil['nama']; ?>" class="form-control" name="nama">
                <input type="hidden" value="<?php echo $hasil['idkat']; ?>" class="form-control" name="idkat">
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <textarea name="ket" class="form-control"><?php echo $hasil['ket']; ?></textarea>
              </div>
              <div class="form-group">
                <label>Gambar</label>
                <input type="harga" value="<?php echo $hasil['gambar']; ?>" class="form-control" name="gambar">
              </div>
              <button class="btn btn-primary btn-sm" name="create"><i class="fa fa-edit"> </i> Edit Data</button>
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