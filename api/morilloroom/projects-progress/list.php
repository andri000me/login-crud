<?php
header('Content-Type: application/json');
include dirname(dirname(__FILE__)) . '/db/Db.class.php';
$db = new Db();

$limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 0;
$id_projects = isset($_GET['id_projects']) ? $_GET['id_projects'] : '';
$nama = isset($_GET['nama']) ? $_GET['nama'] : '';

$sql_limit = '';
if (!empty($limit)) {
  $sql_limit = ' LIMIT 0,' . $limit;
}

$sql_name = '';
if (!empty($nama)) {
  $sql_name = ' where nama LIKE \'%' . $nama . '%\' ';
} elseif (!empty($id_projects)) {
  $sql_name = ' where id_projects LIKE \'%' . $id_projects . '%\' ';
}

// if ($nama) {
//   $cat_list = $db->query("SELECT * from tbl_projects_progress".$sql_name) or die(mysqli_error($db));
// } elseif ($id_projects) {
//   $cat_list = $db->query("SELECT * from tbl_projects_progress".$sql_name) or die(mysqli_error($db));
// } else {
//   $cat_list = $db->query("SELECT * from tbl_projects_progress") or die(mysqli_error($db));
// }

// $cat_list = $db->query("SELECT * from tbl_projects_progress" . $sql_name) or die(mysqli_error($db));
// $cat_list = $db->query('select * from tbl_projects ' . $sql_name . ' ' . $sql_limit);
$cat_list = $db->query('SELECT prog.id, prog.nama, prog.job_plan, prog.job_repair, prog.note, prog.created_at,
proj.nama as nama_projects
from tbl_projects_progress prog 
inner join tbl_projects proj on prog.id_projects=proj.id
' . $sql_limit) or die(mysqli_error($db));
$arr = array();
$arr['info'] = 'success';
$arr['num'] = count($cat_list);
$arr['result'] = $cat_list;
echo json_encode($arr);
