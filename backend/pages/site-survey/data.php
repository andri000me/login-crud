<?php
session_start();
include "../../../lib/config.php";
include "../../../api/panggil.php";

//kolom apa saja yang akan ditampilkan
$columns = array(
	'ss.nama',
	'ss.tgl',
	'ss.access',
	'ss.volume',
	'c.nama',
);

$query = $datatable->get_custom("SELECT ss.id, ss.nama, ss.tgl, ss.access, ss.volume, 
	c.nama as nama_customers
	FROM tbl_site_survey as ss 
	inner join tbl_customers as c
	on ss.id_customers=c.id",
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
	$ResultData[] = $value->nama;
	$ResultData[] = $value->nama_customers;
	$ResultData[] = date("j M Y", strtotime($value->tgl)); 
	$ResultData[] = $value->access;
	$ResultData[] = $value->volume;
	// $ResultData[] = "<span class=\"badge badge-success\">".$value->nama_methods."</span>";

	//bisa juga pake logic misal jika value tertentu maka outputnya

	//kita bisa buat tombol untuk keperluan edit, delete, dll, 
	$ResultData[] = "
	<a href=" . $abs . "/backend/pages/index.php?page=site-survey&act=detail&id=" . $value->id . " class=\"btn btn-primary btn-sm\">
		<i class=\"fas fa-folder\">
		</i>
	</a>
	<a href=\"" . $abs . "/backend/pages/index.php?page=site-survey&act=edit&id=" . $value->id . "\" class=\"btn btn-info btn-sm\">
		<i class=\"fas fa-pencil-alt\">
		</i>
	</a>
	<a onclick=\"return confirm('Apakah yakin data akan di hapus?')\" href=\"" . $abs . "/backend/pages/site-survey/crud.php?aksi=hapus&id=" . $value->id . "\" class=\"btn btn-danger btn-sm\">
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
