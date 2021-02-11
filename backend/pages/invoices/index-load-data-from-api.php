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
    <div class="alert alert-info alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><i class="icon fas fa-info"></i> Alert!</h5>
      Sebelum menginput projects, terlebih dulu harus menginput <a href="<?= $abs; ?>/backend/pages/index.php?page=site-survey-form&act=tambah">site survey</a><br>
      Klik tambah untuk menginput projects baru
    </div>

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
                  <!-- <th>Customers</th>
                  <th>Metode</th> -->
                  <th>Progress</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $api_categories_list = $api_url . '/projects/list.php';
                $json_list = @file_get_contents($api_categories_list);

                $array = json_decode($json_list, true);
                $result = isset($array['result']) ? $array['result'] : array();

                $no = 0;
                foreach ($result as $arr) {
                  $no++;

                  $link_edit = '<a href="produk-edit.php?id=' . $arr['id'] . '">[Edit]</a>';
                  $link_delete = '<a href="javascript:void:;" onclick="deleteData(\'' . $arr['id'] . '\')">[Delete]</a>';

                ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td><?= $arr['nama']; ?></td>
                    <!-- <td><?= $arr['nama_customers']; ?></td>
                    <td><?= $arr['nama_methods']; ?></td> -->
                    <td class="project_progress">
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-green" role="progressbar" aria-volumenow="<?= $arr['progress']; ?>" aria-volumemin="0" aria-volumemax="100" style="width: <?= $arr['progress']; ?>%">
                        </div>
                      </div>
                      <small>
                        <?= $arr['progress']; ?>% Complete
                      </small>
                    </td>
                    <td>
                      <span class="badge badge-success"><?= $arr['nama_status']; ?></span>
                    </td>
                    <td>
                      <!-- <a href="<?= $abs; ?>/backend/pages/index.php?page=projects-progress&id_projects=<?= $arr['id']; ?>" class="btn btn-primary btn-sm">
                        <i class="fas fa-folder">
                        </i>
                        View Progress
                      </a> -->
                      <a href="<?= $abs; ?>/backend/pages/index.php?page=projects-detail&id=<?= $arr['id']; ?>" class="btn btn-primary btn-sm">
                        <i class="fas fa-folder">
                        </i>
                      </a>
                      <a href="<?= $abs; ?>/backend/pages/index.php?page=projects-form&act=edit&id=<?= $arr['id']; ?>" class="btn btn-info btn-sm">
                        <i class="fas fa-pencil-alt">
                        </i>
                      </a>
                      <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="<?= $abs; ?>/backend/pages/projects/crud.php?act=hapus&id=<?= $arr['id']; ?>" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash">
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
                  <!-- <th>Customers</th>
                  <th>Metode</th> -->
                  <th>Progress</th>
                  <th>Status</th>
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