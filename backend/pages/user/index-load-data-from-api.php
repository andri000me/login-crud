<?php
// session start
if (!empty($_SESSION)) {
} else {
  session_start();
}
// require 'proses/panggil.php';
?>
<?php if (!empty($_SESSION['ADMIN'])) { ?>

  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <a href="<?= $abs; ?>/backend/pages/index.php?page=<?= $page; ?>-form&act=tambah" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> Tambah</a>
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Telepon</th>
                  <th>Email</th>
                  <th>Level</th>
                  <th>Gambar</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $api_categories_list = $api_url . '/user/list.php';
                $json_list = @file_get_contents($api_categories_list);
                $array = json_decode($json_list, true);
                $result = isset($array['result']) ? $array['result'] : array();
                $no = 0;
                foreach ($result as $arr) {
                  $no++;
                  // $link_edit = '<a href="produk-edit.php?id=' . $arr['id'] . '">[Edit]</a>';
                  // $link_delete = '<a href="javascript:void:;" onclick="deleteData(\'' . $arr['id'] . '\')">[Delete]</a>';
                ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td><?= $arr['nama_pengguna']; ?></td>
                    <td><?= $arr['username']; ?></td>
                    <td><?= $arr['telepon']; ?></td>
                    <td><?= $arr['email']; ?></td>
                    <td>
                      <span class="badge badge-success"><?= $arr['nama_level']; ?></span>
                    </td>
                    <td>
                      <img src="<?= $abs; ?>/assets/uploads/images/user/<?= $arr['acak']; ?>-1.jpg" height="40">
                    </td>
                    <td>
                      <a href="<?= $abs; ?>/backend/pages/index.php?page=user-form&act=edit&id_login=<?= $arr['id_login']; ?>" class="btn btn-success btn-sm">
                        <i class="fas fa-pencil-alt">
                        </i>
                      </a>
                      <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="<?= $abs; ?>/backend/pages/user/crud.php?act=hapus&id_login=<?= $arr['id_login']; ?>" class="btn btn-danger btn-sm"> <i class="fas fa-trash">
                        </i>
                      </a>
                      <!-- <?= $link_edit . ' ' . $link_delete; ?> -->
                    </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Telepon</th>
                  <th>Email</th>
                  <th>Level</th>
                  <th>Gambar</th>
                  <th>Action</th>
                </tr>
              </tfoot>
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