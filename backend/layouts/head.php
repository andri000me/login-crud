<?php
$page = $_GET['page'];
switch ($page) {
  case 'main-menu':
    $title = 'Main Menu';
    break;
  case 'user':
    $title = 'Users';
    break;
  case 'level':
    $title = 'Level';
    break;
  case 'customers':
    $title = 'Customers';
    break;
  case 'site-survey':
    $title = 'Site Survey';
    break;
  case 'site-survey-methods':
    $title = 'Site Survey Methods';
    break;
  case 'req-material':
    $title = 'Material Request';
    break;
  case 'projects':
    $title = 'Projects';
    break;
  case 'projects-progress':
    $title = 'Progress';
    break;
  case 'invoices':
    $title = 'Invoices';
    break;
  case 'payments':
    $title = 'Payments';
    break;
  case 'misc':
    $title = 'Miscellaneous';
    break;
}
$data = ['title' => $title];
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Morillo Room / <?= $data['title']; ?></title>
  <link rel="shortcut icon" href="<?= $abs; ?>/assets/favicon.png">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= $abs; ?>/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= $abs; ?>/admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= $abs; ?>/admin-lte/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= $abs; ?>/admin-lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= $abs; ?>/admin-lte/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= $abs; ?>/admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= $abs; ?>/admin-lte/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= $abs; ?>/admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= $abs; ?>/admin-lte/plugins/summernote/summernote-bs4.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?=$abs;?>/admin-lte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?=$abs;?>/admin-lte/plugins/toastr/toastr.min.css">

</head>