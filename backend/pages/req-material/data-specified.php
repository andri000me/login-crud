<?php
session_start();
include "../../../lib/config.php";
include "../../../api/panggil.php";

//kolom apa saja yang akan ditampilkan
$columns = array(
	'rm.id',
	'rm.id_site_survey',
	'rm.id_products',
	'rm.jumlah',
	'rm.total',
	'ss.nama',
	'p.nama',
);

$id_site_survey=$_GET['id_site_survey'];
$array_id_site_survey = array('rm.id_site_survey' => $id_site_survey); //32 adalah id untuk jawabarat

$query = $datatable->get_custom("SELECT rm.id, rm.id_products, rm.jumlah, rm.total,
	ss.nama as nama_site_survey, 
	p.nama as nama_products, 
	p.harga as harga 
	from tbl_req_material as rm
	inner join tbl_site_survey as ss
	on rm.id_site_survey=ss.id
	inner join tbl_products as p
	on rm.id_products=p.id
	where rm.id_site_survey=?",
	$columns, $array_id_site_survey
);

//buat inisialisasi array data
$data = array();

$no = 1;
foreach ($query	as $value) {

	//array sementara data
	$ResultData = array();

	//masukan data ke array sesuai kolom table
	$ResultData[] = $no;
	// $ResultData[] = $value->nama_site_survey;
	$ResultData[] = $value->nama_products;
	$ResultData[] = $value->jumlah;
	$ResultData[] = number_format($value->harga, 0, '.', '.'); 
	$ResultData[] = number_format($value->total, 0, '.', '.'); 

	//bisa juga pake logic misal jika value tertentu maka outputnya

	//kita bisa buat tombol untuk keperluan edit, delete, dll, 
	// $ResultData[] = "
	// <a href=\"" . $abs . "/backend/pages/index.php?page=req-material&act=edit&id=" . $value->id . "\" class=\"btn btn-info btn-sm\">
	// 	<i class=\"fas fa-pencil-alt\">
	// 	</i>
	// </a>
	// <a onclick=\"return confirm('Apakah yakin data akan di hapus?')\" href=\"" . $abs . "/backend/pages/req-material/crud.php?act=hapus&id=" . $value->id . "\" class=\"btn btn-danger btn-sm\">
	// 	<i class=\"fas fa-trash\">
	// 	</i>
	// </a>";

	//memasukan array ke variable $data

	$no++;
	$data[] = $ResultData;
}

//set data
$datatable->set_data($data);
//create our json
$datatable->create_data();
