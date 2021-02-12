<?php
$page=$_GET['page'];
switch ($page) {
  case 'main-menu':
    include "main-menu/index.php";
    break;
  case 'user':
    if ($_GET['act'] == "tambah" || $_GET['act'] == "edit") require "user/form.php";
    else require "user/index.php"; 
    break;
  case 'level':
    if ($_GET['act'] == "tambah" || $_GET['act'] == "edit") require "level/form.php";
    else require "level/index.php"; 
    break;
  case 'customers':
    if ($_GET['act'] == "tambah" || $_GET['act'] == "edit") require "customers/form.php";
    else require "customers/index.php"; 
    break;
  case 'site-survey':
    if ($_GET['act'] == "tambah" || $_GET['act'] == "edit") require "site-survey/form.php";
    else if ($_GET['act'] == "detail") require "site-survey/detail.php";
    else require "site-survey/index.php"; 
    break;
  case 'site-survey-methods':
    if ($_GET['act'] == "tambah" || $_GET['act'] == "edit") require "site-survey-methods/form.php";
    else require "site-survey-methods/index.php"; 
    break;
  case 'projects':
    if ($_GET['act'] == "tambah" || $_GET['act'] == "edit") require "projects/form.php";
    else if ($_GET['act'] == "detail") require "projects/detail.php";
    else require "projects/index.php"; 
    break;
  case 'projects-progress':
    if ($_GET['act'] == "tambah" || $_GET['act'] == "edit") require "projects-progress/form.php";
    else require "projects-progress/index.php"; 
    break;
  case 'job-methods':
    if ($_GET['act'] == "tambah" || $_GET['act'] == "edit") require "job-methods/form.php";
    else require "job-methods/index.php"; 
    break;
  case 'brands':
    if ($_GET['act'] == "tambah" || $_GET['act'] == "edit") require "brands/form.php";
    else require "brands/index.php"; 
    break;
  case 'invoices':
    if ($_GET['act'] == "tambah" || $_GET['act'] == "edit") require "invoices/form.php";
    else if ($_GET['act'] == "detail") require "invoices/detail.php";
    else require "invoices/index.php"; 
    break;
  case 'job-status':
    include "job-status/index.php";
    break;
  case 'payments':
    if ($_GET['act'] == "tambah" || $_GET['act'] == "edit") require "payments/form.php";
    else require "payments/index.php"; 
    break;
  case 'req-survey':
    include "req-survey/index.php";
    break;
  case 'misc':
    if ($_GET['act'] == "tambah" || $_GET['act'] == "edit") require "misc/form.php";
    else require "misc/index.php"; 
    break;
  case 'req-material':
    if ($_GET['act'] == "tambah" || $_GET['act'] == "edit") require "req-material/form.php";
    else require "req-material/index.php"; 
    break;
  case 'kategori':
    include "kategori/index.php";
    break;
  case 'kategori-form':
    include "kategori/form.php";
    break;
  case 'products':
    if ($_GET['act'] == "tambah" || $_GET['act'] == "edit") require "products/form.php";
    else require "products/index.php"; 
    break;
}
?>
