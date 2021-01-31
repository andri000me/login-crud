<?php
$page=$_GET['page'];
switch ($page) {
  case 'user':
    include "user/index.php";
    break;
  case 'user-form':
    include "user/form.php";
    break;
  case 'level':
    include "level/index.php";
    break;
  case 'level-form':
    include "level/form.php";
    break;
  case 'customers':
    include "customers/index.php";
    break;
  case 'customers-form':
    include "customers/form.php";
    break;
  case 'projects':
    include "projects/index.php";
    break;
  case 'projects-form':
    include "projects/form.php";
    break;
  case 'kategori':
    include "kategori/index.php";
    break;
  case 'produk':
    include "produk/index.php";
    break;
  case 'produk-form':
    include "produk/edit.php";
    break;
}
?>
