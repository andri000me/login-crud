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
$hasil = $proses->tampil_data_id('tbl_projects', 'id', $idGet);

$marketing = $proses->tampil_data_id('tbl_user', 'id_login', $hasil['id_marketing']);
$supervisor = $proses->tampil_data_id('tbl_user', 'id_login', $hasil['id_supervisor']);
$tbl_site_survey = $proses->tampil_data_id('tbl_site_survey', 'id', $hasil['id_site_survey']);
$tbl_customers = $proses->tampil_data_id('tbl_customers', 'id', $tbl_site_survey['id_customers']);
$tbl_job_methods = $proses->tampil_data_id('tbl_job_methods', 'id', $tbl_site_survey['id_methods']);
?>
<?php if (!empty($_SESSION['ADMIN'])) { ?>
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Projects Detail</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
            <div class="row">
              <div class="col-12 col-sm-4">
                <div class="info-box bg-light">
                  <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Estimated budget</span>
                    <span class="info-box-number text-center text-muted mb-0"><?= "Rp. " . number_format($hasil['budget_estimation'], 0, '.', '.'); ?></span>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-4">
                <div class="info-box bg-light">
                  <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Total amount spent</span>
                    <span class="info-box-number text-center text-muted mb-0"><?= "Rp. " . number_format($hasil['budget_spent'], 0, '.', '.'); ?></span>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-4">
                <div class="info-box bg-light">
                  <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Estimated project duration</span>
                    <span class="info-box-number text-center text-muted mb-0"><?= $hasil['duration']; ?></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <p class="text-sm">
                  <a href="<?= $abs; ?>/backend/pages/index.php?page=projects-progress&act=tambah&id_projects=<?= $_GET['id']; ?>" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> Tambah</a> Progress
                </p>
                <h4>Recent Activity</h4>

                <table id="projects-progress" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama</th>
                      <th>Tanggal</th>
                      <th>Job Planning</th>
                      <th>Repair Job</th>
                      <th>Note</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
            <h3 class="text-primary"><i class="fas fa-paint-brush"></i> <?= $hasil['nama']; ?></h3>
            <p class="text-muted"><?= $tbl_site_survey['dtl_obj']; ?></p>
            <div class="text-muted">
              <p class="text-sm">
                <b class="d-block">Detail Site Survey</b>
                <span class="d-block"><?= $tbl_site_survey['nama']; ?></span>
                <span class="d-block"><?= $tbl_site_survey['access']; ?></span>
                <span class="d-block"><?= $tbl_site_survey['volume']; ?></span>
                <span class="d-block"><?= $tbl_site_survey['dtl_obj']; ?></span>
                <span class="d-block"><?= date("j M Y", strtotime($tbl_site_survey['tgl'])); ?></span>
              </p>
            </div>

            <div class="text-muted">
              <p class="text-sm">
                <b class="d-block">Client Company</b>
                <span class="d-block"><?= $tbl_customers['nama']; ?></span>
                <span class="d-block"><?= $tbl_customers['pic']; ?></span>
                <span class="d-block"><?= $tbl_customers['telepon']; ?></span>
                <span class="d-block"><?= $tbl_customers['email']; ?></span>
                <span class="d-block"><?= $tbl_customers['alamat']; ?></span>
                <span class="badge badge-success"><?= $tbl_job_methods['nama']; ?></span>
              </p>
              <p class="text-sm">Marketing
                <b class="d-block"><?= $marketing['nama_pengguna']; ?></b>
              </p>
              <p class="text-sm">Project Leader
                <b class="d-block"><?= $supervisor['nama_pengguna']; ?></b>
              </p>
            </div>

            <h5 class="mt-5 text-muted">Project files</h5>
            <ul class="list-unstyled">
              <li>
                <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Functional-requirements.docx</a>
              </li>
              <li>
                <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
              </li>
              <li>
                <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>
              </li>
              <li>
                <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
              </li>
              <li>
                <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-10_12_2014.docx</a>
              </li>
            </ul>
            <div class="text-center mt-5 mb-3">
              <a href="#" class="btn btn-sm btn-primary">Add files</a>
              <a href="#" class="btn btn-sm btn-warning">Report contact</a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
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