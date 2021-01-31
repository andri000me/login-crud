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
