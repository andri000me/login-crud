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
$hasil = $proses->tampil_data_id('tbl_invoices', 'id', $idGet);

$tbl_misc = $proses->tampil_data_id('tbl_misc', 'id', 1);
$tbl_projects = $proses->tampil_data_id('tbl_projects', 'id', $hasil['id_projects']);
$tbl_site_survey = $proses->tampil_data_id('tbl_site_survey', 'id', $tbl_projects['id_site_survey']);
$tbl_customers = $proses->tampil_data_id('tbl_customers', 'id', $tbl_site_survey['id_customers']);
$tbl_job_methods = $proses->tampil_data_id('tbl_job_methods', 'id', $tbl_site_survey['id_methods']);
?>
<?php if (!empty($_SESSION['ADMIN'])) { ?>
  <div class="container-fluid">
    <div class="invoice p-3 mb-3">
      <!-- title row -->
      <div class="row">
        <div class="col-12">
          <h4>
            <i class="fas fa-globe"></i> <?=$tbl_misc['nama'];?>
            <small class="float-right">Date: <?=date("j M Y", strtotime($hasil['tgl']));?></small>
          </h4>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong><?=$tbl_misc['nama'];?></strong><br>
            <?=$tbl_misc['alamat'];?><br>
            Phone: <?=$tbl_misc['telepon'];?><br>
            Email: <?=$tbl_misc['email'];?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong><?=$tbl_customers['nama'];?></strong><br>
            <?=$tbl_customers['alamat'];?><br>
            Phone: <?=$tbl_customers['telepon'];?><br>
            Email: <?=$tbl_customers['email'];?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice #<?=$hasil['no_faktur'];?></b><br>
          <br>
          <b>Order ID:</b> 4F3S8J<br>
          <b>Payment Due:</b> <?=date("j M Y", strtotime($hasil['tgl_due']));?><br>
          <b>Account:</b> 968-34567
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Qty</th>
              <th>Product</th>
              <th>Serial #</th>
              <th>Description</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>1</td>
              <td>Call of Duty</td>
              <td>455-981-221</td>
              <td>El snort testosterone trophy driving gloves handsome</td>
              <td>$64.50</td>
            </tr>
            <tr>
              <td>1</td>
              <td>Need for Speed IV</td>
              <td>247-925-726</td>
              <td>Wes Anderson umami biodiesel</td>
              <td>$50.00</td>
            </tr>
            <tr>
              <td>1</td>
              <td>Monsters DVD</td>
              <td>735-845-642</td>
              <td>Terry Richardson helvetica tousled street art master</td>
              <td>$10.70</td>
            </tr>
            <tr>
              <td>1</td>
              <td>Grown Ups Blue Ray</td>
              <td>422-568-642</td>
              <td>Tousled lomo letterpress</td>
              <td>$25.99</td>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-6">
          <p class="lead">Payment Methods:</p>
          <img src="<?=$abs;?>/admin-lte/dist/img/credit/visa.png" alt="Visa">
          <img src="<?=$abs;?>/admin-lte/dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="<?=$abs;?>/admin-lte/dist/img/credit/american-express.png" alt="American Express">
          <img src="<?=$abs;?>/admin-lte/dist/img/credit/paypal2.png" alt="Paypal">

          <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
            <?=stripslashes(html_entity_decode($tbl_misc['note']));?>
          </p>
        </div>
        <!-- /.col -->
        <div class="col-6">
          <p class="lead">Amount Due <?=date("j M Y", strtotime($hasil['tgl_due']));?></p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>$250.30</td>
              </tr>
              <tr>
                <th>Tax (9.3%)</th>
                <td>$10.34</td>
              </tr>
              <tr>
                <th>Shipping:</th>
                <td>$5.80</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>$265.24</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-12">
          <a href="<?=$abs;?>/backend/pages/invoices/print.php?id=<?=$idGet;?>" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
          <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
            Payment
          </button>
          <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
            <i class="fas fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
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