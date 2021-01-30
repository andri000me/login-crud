<?php
header('Content-Type: application/json');

include dirname(dirname(__FILE__)) . '/db/Db.class.php';

$db = new Db();

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

$cat_detail = $db->row('select * from produk where id=' . $id);

$arr = array();
$arr['info'] = 'success';
$arr['result'] = $cat_detail;
echo json_encode($arr);
