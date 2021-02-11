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
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$api_categories_detail = $api_url_morillo . '/4dMinMrl/api/news/detail.php?id=' . $id;
$json_list = @file_get_contents($api_categories_detail);
$array = json_decode($json_list, true);
$result = isset($array['result']) ? $array['result'] : array();
?>
<?php if (!empty($_SESSION['ADMIN'])) { ?>

  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">News Detail</h3>

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
              <div class="col-12">
                <h4>News Detail</h4>
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="<?= $api_url_morillo; ?>/images/news/<?= $result['acak1']; ?>" alt="<?= $result['nama']; ?>">
                    <span class="username">
                      <a href="#"><?= $result['nama']; ?></a>
                    </span>
                    <span class="description"><?= $result['tgl']; ?></span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    <?= $result['ket']; ?> </p>

                  <p>
                    <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v2</a>
                  </p>
                </div>

              </div>
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