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
  case 'job-methods':
    $title = 'Job Methods';
    break;
  case 'brands':
    $title = 'Brands';
    break;
  case 'products':
    $title = 'Products';
    break;
}
$data = ['title' => $title];
?>
