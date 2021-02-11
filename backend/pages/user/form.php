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
$idGet = strip_tags($_GET['id_login']);
$hasil = $proses->tampil_data_id('tbl_user', 'id_login', $idGet);
$tbl_user_level = $proses->tampil_data('tbl_user_level', 'id');
?>
<?php if (!empty($_SESSION['ADMIN']) && $sesi['id_login'] == $_GET['id_login'] || $level['id']==1) { ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"><?= $_GET['act']; ?> <?= $data['title']; ?> / <?php echo $hasil['nama_pengguna']; ?></h4>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form enctype="multipart/form-data" id="quickForm" action="<?= $abs; ?>/backend/pages/user/crud.php?act=<?= $_GET['act']; ?>" method="POST">
              <div class="row">
                <div class="form-group col-md-4">
                  <label>Nama </label>
                  <input type="text" value="<?php echo $hasil['nama_pengguna']; ?>" class="form-control" name="nama" required>
                </div>
                <div class="form-group col-md-4">
                  <label>Telepon</label>
                  <input type="text" value="<?php echo $hasil['telepon']; ?>" class="form-control" name="telepon">
                </div>
                <div class="form-group col-md-4">
                  <label>Email</label>
                  <input type="harga" value="<?php echo $hasil['email']; ?>" class="form-control" name="email">
                </div>
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $hasil['alamat']; ?></textarea>
              </div>
              <div class="row">
                <div class="form-group col-md-4">
                  <label>Username</label>
                  <input type="text" value="<?php echo $hasil['username']; ?>" class="form-control" name="user" required>
                </div>
                <div class="form-group col-md-4">
                  <label>Password</label>
                  <input type="password" value="" placeholder="ubah password" class="form-control" name="pass">
                  <input type="hidden" value="<?php echo $hasil['id_login']; ?>" class="form-control" name="id_login">
                </div>
                <div class="form-group col-md-4">
                  <label>Level</label>
                  <select name="id_level" class="form-control select2bs4" required>
                    <option disabled>-- select --</option>
                    <?php
                    foreach ($tbl_user_level as $tbl_user_level) { ?>
                      <option <?php if ($hasil['id_level'] == $tbl_user_level['id']) echo 'selected'; ?> value="<?= $tbl_user_level['id']; ?>">
                        <?= $tbl_user_level['nama']; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
                <?php for ($i = 1; $i <= 1; $i++) { ?>
                  <div class="form-group col-md-4">
                    <label for="exampleInputFile">Gambar <?= $i; ?></label>
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