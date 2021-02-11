<?php
header('Content-Type: application/json');
include dirname(dirname(__FILE__)) . '/db/Db.class.php';
$db = new Db();
$limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 0;
$nama = isset($_GET['nama']) ? $_GET['nama'] : '';
$sql_limit = '';
if (!empty($limit)) {
  $sql_limit = ' LIMIT 0,' . $limit;
}
$sql_name = '';
if (!empty($nama)) {
  $sql_name = ' where nama LIKE \'%' . $nama . '%\' ';
}
// $cat_list = $db->query('select * from tbl_projects ' . $sql_name . ' ' . $sql_limit);
$cat_list = $db->query('SELECT rs.id, rs.nama, rs.tgl,
c.nama as nama_customers
from tbl_req_survey rs
inner join tbl_customers c
on rs.id_customers=c.id
order by rs.id desc' . $sql_limit) or die(mysqli_error($db));
$arr = array();
$arr['info'] = 'success';
$arr['num'] = count($cat_list);
$arr['result'] = $cat_list;
echo json_encode($arr);
