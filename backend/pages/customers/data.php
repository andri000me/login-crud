<?php
session_start();
include "../../../lib/config.php";
include "../../../api/panggil.php";

//kolom apa saja yang akan ditampilkan
$columns = array(
	'id',
	'nama',
	'pic',
	'telepon',
	'email',
	'alamat',
);

$query = $datatable->get_custom("SELECT * from tbl_customers", $columns);

//buat inisialisasi array data
$data = array();

$no = 1;
foreach ($query	as $value) {

	//array sementara data
	$ResultData = array();

	//masukan data ke array sesuai kolom table
	$ResultData[] = $no;
	$ResultData[] = $value->nama;
	$ResultData[] = $value->pic;
	$ResultData[] = $value->telepon;
	$ResultData[] = $value->email;
	$ResultData[] = $value->alamat;

	//bisa juga pake logic misal jika value tertentu maka outputnya

	//kita bisa buat tombol untuk keperluan edit, delete, dll, 
	$ResultData[] = "
	<a href=\"" . $abs . "/backend/pages/index.php?page=customers&act=edit&id=" . $value->id . "\" class=\"btn btn-success btn-sm\">
		<i class=\"fas fa-pencil-alt\">
		</i>
	</a>
	<a onclick=\"return confirm('Apakah yakin data akan di hapus?')\" href=\"" . $abs . "/backend/pages/customers/crud.php?aksi=hapus&id=" . $value->id . "\" class=\"btn btn-danger btn-sm\">
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
