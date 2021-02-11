<?php
session_start();
include "../../../lib/config.php";
include "../../../api/panggil.php";

//kolom apa saja yang akan ditampilkan
$columns = array(
	'ssm.id',
	'ss.nama',
	'm.nama',
);

$id_site_survey=$_GET['id_site_survey'];
$query = $datatable->get_custom("SELECT ssm.id, ssm.id_site_survey,
	ss.nama as nama_site_survey,
	m.nama as nama_methods
	from tbl_site_survey_methods as ssm
	inner join tbl_site_survey as ss
	on ssm.id_site_survey=ss.id
	inner join tbl_job_methods as m
	on ssm.id_methods=m.id
	where ssm.id_site_survey='$id_site_survey'",
	$columns
);

//buat inisialisasi array data
$data = array();

$no = 1;
foreach ($query	as $value) {

	//array sementara data
	$ResultData = array();

	//masukan data ke array sesuai kolom table
	$ResultData[] = $no;
	$ResultData[] = $value->nama_site_survey;
	$ResultData[] = $value->nama_methods;

	//bisa juga pake logic misal jika value tertentu maka outputnya

	//kita bisa buat tombol untuk keperluan edit, delete, dll, 
	$ResultData[] = "
	<a href=\"" . $abs . "/backend/pages/index.php?page=site-survey-methods&act=edit&id_site_survey=".$value->id_site_survey."&id=" . $value->id . "\" class=\"btn btn-info btn-sm\">
    <i class=\"fas fa-pencil-alt\">
	  </i>
	</a>
	<a onclick=\"return confirm('Apakah yakin data akan di hapus?')\" href=\"" . $abs . "/backend/pages/site-survey-methods/crud.php?act=hapus&id=" . $value->id . "\" class=\"btn btn-danger btn-sm\">
    <i class=\"fas fa-trash\">
	  </i>
	</a>";

	//memasukan array ke variable $data

	$no++;
	$data[] = $ResultData;
}

//set data
$datatable->set_data($data);
//create our json
$datatable->create_data();
