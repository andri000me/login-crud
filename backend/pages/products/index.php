<?php
// session start
if (!empty($_SESSION)) {
} else {
  session_start();
}
// require 'proses/panggil.php';
?>
<?php if (!empty($_SESSION['ADMIN']) && $level['id'] == 1 || $level['id'] == 2) { ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <form action="<?=$abs;?>/lib/import/import-products.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="exampleInputFile">Upload excel file (.xls)</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input-" name="filepegawai" id="exampleInputFile" required="">
                      <!-- <label class="custom-file-label" for="exampleInputFile">Choose file</label> -->
                    </div>
                    <div class="input-group-append">
                      <input type="submit" value="Upload" class="input-group-text" />
                    </div>
                  </div>
                </div>
              </form>
              <a href="<?= $abs; ?>/backend/pages/index.php?page=<?= $page; ?>&act=tambah" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> Tambah</a>
              <?= $data['title']; ?>
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="products" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Brand</th>
                  <th>Harga (Rp.)</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
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