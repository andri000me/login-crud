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
$cat_list = $db->query('SELECT s.id, s.nama, s.id_customers, s.tgl, s.access, s.volume, s.id_methods, s.dtl_obj,
c.nama as nama_customers, c.pic as nama_pic,
m.nama as nama_methods 
from tbl_site_survey s 
inner join tbl_customers c on s.id_customers=c.id
inner join tbl_job_methods m on s.id_methods=m.id
order by id desc
' . $sql_limit) or die(mysqli_error($db));
$arr = array();
$arr['info'] = 'success';
$arr['num'] = count($cat_list);
$arr['result'] = $cat_list;
echo json_encode($arr);
