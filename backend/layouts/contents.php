<?php
$page=$_GET['page'];
switch ($page) {
  case 'user':
    include "user/index.php";
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
