<?php
session_start();
include "../../../lib/config.php";
include "../../../api/panggil.php";

//kolom apa saja yang akan ditampilkan
$columns = array(
	'id',
	'nama',
);

$query = $datatable->get_custom("SELECT * from tbl_payments as p", $columns);

//buat inisialisasi array data
$data = array();

foreach ($query	as $value) {

	//array sementara data
	$ResultData = array();

	//masukan data ke array sesuai kolom table
	$ResultData[] = $value->id;
	$ResultData[] = $value->nama;

	//bisa juga pake logic misal jika value tertentu maka outputnya

	//kita bisa buat tombol untuk keperluan edit, delete, dll, 
	$ResultData[] = "
	<a href=\"" . $abs . "/backend/pages/index.php?page=payments&act=edit&id=" . $value->id . "\" class=\"btn btn-info btn-sm\">
		<i class=\"fas fa-pencil-alt\">
		</i>
	</a>
	<a onclick=\"return confirm('Apakah yakin data akan di hapus?')\" href=\"".$abs."/backend/pages/payments/crud.php?act=hapus&id=" . $value->id . "\" class=\"btn btn-danger btn-sm\">
		<i class=\"fas fa-trash\">
		</i>
	</a>";

	//memasukan array ke variable $data

	$data[] = $ResultData;
}

//set data
$datatable->set_data($data);
//create our json
$datatable->create_data();
