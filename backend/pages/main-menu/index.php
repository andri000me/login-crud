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
                  <h5><i class="icon fas fa-info"></i> Selamat datang di Morillo</h5>
                  Jangan lupa log out setelah selesai
                </div>
    <div class="row">
      <div class="col-md-3 col-sm-6 col-12">
        <a href="<?= $abs; ?>/backend/pages/index.php?page=req-survey">
          <div class="info-box">
            <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Survey Request</span>
              <span class="info-box-number">1,410</span>
            </div>
            <!-- /.info-box-content -->
          </div>

        </a>
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-12">
        <a href="<?= $abs; ?>/backend/pages/index.php?page=site-survey">
          <div class="info-box">
            <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Site Survey</span>
              <span class="info-box-number">1,410</span>
            </div>
          </div>
        </a>
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-12">
        <a href="<?= $abs; ?>/backend/pages/index.php?page=site-survey">
          <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Daily Report</span>
              <span class="info-box-number">1,410</span>
            </div>
          </div>
        </a>
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-12">
        <a href="<?= $abs; ?>/backend/pages/index.php?page=projects">
          <div class="info-box">
            <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Projects (Approved)</span>
              <span class="info-box-number">1,410</span>
            </div>
          </div>
        </a>
      </div>
      <!-- /.col -->
    </div>

    <div class="row">
      <div class="col-lg-3 col-6">
        <a href="<?= $abs; ?>/backend/pages/index.php?page=site-survey" class="small-box-footer">
          <div class="small-box bg-default">
            <div class="inner">
              <h3>150</h3>
              <p>Projects (Not Approved)</p>
            </div>
            <div class="icon">
              <i class="fas fa-shopping-cart"></i>
            </div>
            <span class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </span>
          </div>
        </a>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <a href="<?= $abs; ?>/backend/pages/index.php?page=site-survey" class="small-box-footer">
          <div class="small-box bg-default">
            <div class="inner">
              <h3>150</h3>
              <p>Jobs Done</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <span class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </span>
          </div>
        </a>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <a href="<?= $abs; ?>/backend/pages/index.php?page=site-survey" class="small-box-footer">
          <div class="small-box bg-default">
            <div class="inner">
              <h3>150</h3>
              <p>Job Planning</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-plus"></i>
            </div>
            <span class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </span>
          </div>
        </a>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <a href="<?= $abs; ?>/backend/pages/index.php?page=site-survey" class="small-box-footer">
          <div class="small-box bg-default">
            <div class="inner">
              <h3>150</h3>
              <p>Repair</p>
            </div>
            <div class="icon">
              <i class="fas fa-chart-pie"></i>
            </div>
            <span class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </span>
          </div>
        </a>
      </div>
      <!-- ./col -->
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