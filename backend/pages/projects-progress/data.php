<?php
session_start();
include "../../../lib/config.php";
include "../../../api/panggil.php";

//kolom apa saja yang akan ditampilkan
$columns = array(
	'prog.id',
	'prog.tgl',
	'prog.job_plan',
	'prog.job_repair',
	'prog.note',
	'proj.nama',
);


//jika ingin langsung menambahkan kondisi where dengan parameter terentu query seperti ini 
//misal kita akan langsung menambahkan kondisi langsung hanya menampilkan provinsi jawabarat saja, 
//prepared statement untuk keamanan data
// $array_id_provinsi = array('provinsi.id_prov' => 32); //32 adalah id untuk jawabarat
// $query = $datatable->get_custom("SELECT provinsi.nama_prov, kabupaten.nama_kab, kecamatan.nama_kec, id_kec from provinsi inner join kabupaten on provinsi.id_prov=kabupaten.id_prov inner join kecamatan on kabupaten.id_kab=kecamatan.id_kab where provinsi.id_prov=?", $columns, $array_id_provinsi);

//untuk mencobanya uncomment query diatas dan comment query dibawah

//lakukan query data dari 3 table dengan inner join
// 	$query = $datatable->get_custom("select provinsi.nama_prov,kabupaten.nama_kab, kecamatan.nama_kec,id_kec
// from provinsi inner join kabupaten 
// on provinsi.id_prov=kabupaten.id_prov
// inner join kecamatan on kabupaten.id_kab=kecamatan.id_kab ",$columns);
$id_projects=$_GET['id_projects'];
if ($id_projects) {
	$query = $datatable->get_custom(
		"SELECT prog.id, prog.id_projects, prog.tgl, prog.job_plan, prog.job_repair, prog.note,
	proj.nama as nama_projects 
	FROM tbl_projects_progress as prog 
	inner join tbl_projects as proj
	on prog.id_projects=proj.id where prog.id_projects='$id_projects'",
		$columns
	);
} else {
	// $query = $datatable->get_custom(
	// 	"SELECT prog.id, prog.tgl, prog.job_plan, prog.job_repair, prog.note,
	// proj.nama as nama_projects 
	// FROM tbl_projects_progress as prog 
	// inner join tbl_projects as proj
	// on prog.id_projects=proj.id",
	// 	$columns
	// );
}

//buat inisialisasi array data
$data = array();

$no = 1;
foreach ($query	as $value) {

	//array sementara data
	$ResultData = array();

	//masukan data ke array sesuai kolom table
	$ResultData[] = $no;
	$ResultData[] = $value->nama_projects;
	$ResultData[] = date("j M, Y", strtotime($value->tgl));
	$ResultData[] = $value->job_plan;
	$ResultData[] = $value->job_repair;
	$ResultData[] = $value->note;

	//bisa juga pake logic misal jika value tertentu maka outputnya

	//kita bisa buat tombol untuk keperluan edit, delete, dll, 
	$ResultData[] = "
	<a href=\"" . $abs . "/backend/pages/index.php?page=projects-progress&act=edit&id_projects=".$value->id_projects."&id=" . $value->id . "\" class=\"btn btn-success btn-sm\"><span class=\"fa fa-edit\"></span></a>
	<a onclick=\"return confirm('Apakah yakin data akan di hapus?')\" href=\"" . $abs . "/backend/pages/projects-progress/crud.php?act=hapus&id=" . $value->id . "\" class=\"btn btn-danger btn-sm\"><span class=\"fa fa-trash\"></span></a>";

	//memasukan array ke variable $data

	$no++;
	$data[] = $ResultData;
}

//set data
$datatable->set_data($data);
//create our json
$datatable->create_data();
