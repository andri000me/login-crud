<?php
header('Content-Type: application/json');

include dirname(dirname(__FILE__)) . '/db/Db.class.php';

$db = new Db();

$idkat = isset($_POST['idkat']) ? $_POST['idkat'] : '';
$nama_pro = isset($_POST['nama_pro']) ? $_POST['nama_pro'] : '';
$ket = isset($_POST['ket']) ? $_POST['ket'] : '';
$acak1 = isset($_POST['acak1']) ? $_POST['acak1'] : '';

if (empty($nama_pro)) {
  $arr = array();
  $arr['info'] = 'error';
  $arr['msg'] = 'Kategori tidak ada';

  echo json_encode($arr);
  exit();
}

$datas = array();
$datas['idkat'] = $idkat;
$datas['nama_pro'] = $nama_pro;
$datas['ket'] = $ket;
$datas['acak1'] = $acak1;

$exec = $db->insert('produk', $datas);

if (!$exec) {
  $arr = array();
  $arr['info'] = 'error';
  $arr['msg'] = 'Query tidak berhasil dijalankan.';

  echo json_encode($arr);
  exit();
}

$arr = array();
$arr['info'] = 'success';
$arr['msg'] = 'Data berhasil diproses.';
echo json_encode($arr);
