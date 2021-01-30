<?php
header('Content-Type: application/json');

include dirname(dirname(__FILE__)) . '/db/Db.class.php';

$db = new Db();

$limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 0;
$nama_pro = isset($_GET['nama_pro']) ? $_GET['nama_pro'] : '';

$sql_limit = '';
if (!empty($limit)) {
  $sql_limit = ' LIMIT 0,' . $limit;
}
$sql_name = '';
if (!empty($nama_pro)) {
  $sql_name = ' where nama_pro LIKE \'%' . $nama_pro . '%\' ';
}

// $cat_list = $db->query('select * from produk ' . $sql_name . ' ' . $sql_limit);
$cat_list = $db->query('SELECT * from produk as p inner join kategori as k where p.idkat=k.idkat ' . $sql_limit) or die(mysqli_error($db));

$arr = array();
$arr['info'] = 'success';
$arr['num'] = count($cat_list);
$arr['result'] = $cat_list;

echo json_encode($arr);
