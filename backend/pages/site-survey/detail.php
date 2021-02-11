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
$hasil = $proses->tampil_data_id('tbl_site_survey', 'id', $idGet);

$tbl_req_material = $proses->tampil_data_specified('tbl_req_material', 'id_site_survey', $idGet);
$tbl_customers = $proses->tampil_data_id('tbl_customers', 'id', $hasil['id_customers']);
?>
<?php if (!empty($_SESSION['ADMIN'])) { ?>
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Site Survey Detail</h3>
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
                <p class="text-sm">
                  <a href="<?= $abs; ?>/backend/pages/index.php?page=site-survey-methods&act=tambah&id_site_survey=<?= $_GET['id']; ?>" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> Tambah</a> Methods
                </p>
                <table id="site-survey-methods" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Site Survey</th>
                      <th>Methods</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <p class="text-sm">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-lg">
                    <i class="fas fa-plus">
                    </i>
                    Tambah Material Request
                  </button>
                </p>
                <table id="req-material-specified-" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <!-- <th>Site Survey</th> -->
                      <th>Produk</th>
                      <th>Jumlah</th>
                      <th>Harga (Rp.)</th>
                      <th>Total (Rp.)</th>
                      <!-- <th>Action</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i=1;
                    foreach ($tbl_req_material as $arr) {
                      $tbl_products = $proses->tampil_data_id('tbl_products', 'id', $arr['id_products']);
                      $total[$i]=$arr['total'];
                      ?>
                      <tr>
                        <td><?=$i;?></td>
                        <td><?=$tbl_products['nama'];?></td>
                        <td><?=$arr['jumlah'];?></td>
                        <td><?=number_format($tbl_products['harga'], 0, ',', '.');?></td>
                        <td><?=number_format($arr['total'], 0, ',', '.');?></td>
                      </tr>
                    <?php $i++;}?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="4">Total (Rp.)
                      <td>
                        <?php
                        $total=array_sum($total);
                        echo number_format($total, 0, '.', '.');
                        ?>
                      </td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
            <h3 class="text-primary"><i class="fas fa-paint-brush"></i> <?= $hasil['nama']; ?></h3>
            <p class="text-muted"><?= $hasil['dtl_obj']; ?></p>
            <div class="text-muted">
              <p class="text-sm">
                <b class="d-block">Site Survey Detail</b>
                <span class="d-block"><?= $hasil['access']; ?></span>
                <span class="d-block"><?= $hasil['volume']; ?></span>
                <span class="d-block"><?= date("j M Y", strtotime($hasil['tgl'])); ?></span>
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
              </p>
              <p class="text-sm">Marketing
                <b class="d-block"><?= $marketing['nama_pengguna']; ?></b>
              </p>
              <p class="text-sm">Project Leader
                <b class="d-block"><?= $supervisor['nama_pengguna']; ?></b>
              </p>
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

<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <?php include "req-material/form-modal.php";?>
  </div>
</div>
