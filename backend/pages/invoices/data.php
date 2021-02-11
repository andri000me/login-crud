<?php
session_start();
include "../../../lib/config.php";
include "../../../api/panggil.php";

//kolom apa saja yang akan ditampilkan
$columns = array(
	'i.id',
	'i.no_faktur',
	'i.no_quo',
	'i.tgl',
	'i.tgl_due',
	'pay.nama',
	'proj.nama',
);

$query = $datatable->get_custom("SELECT i.id, i.no_faktur, i.no_quo, i.tgl, i.tgl_due, 
	pay.nama as nama_payments,
	proj.nama as nama_projects 
	FROM tbl_invoices as i
	inner join tbl_projects as proj
	on i.id_projects=proj.id
	inner join tbl_payments as pay
	on i.id_payments=pay.id
	", $columns);

//buat inisialisasi array data
$data = array();

$no = 1;
foreach ($query	as $value) {

	//array sementara data
	$ResultData = array();

	//masukan data ke array sesuai kolom table
	$ResultData[] = $no;
	$ResultData[] = $value->nama_projects;
	$ResultData[] = $value->no_faktur;
	$ResultData[] = $value->no_quo;
	$ResultData[] = date("j M Y", strtotime($value->tgl));
	$ResultData[] = date("j M Y", strtotime($value->tgl_due));
	$ResultData[] = $value->nama_payments;

	//bisa juga pake logic misal jika value tertentu maka outputnya

	//kita bisa buat tombol untuk keperluan edit, delete, dll, 
	$ResultData[] = "
	<a href=" . $abs . "/backend/pages/index.php?page=invoices&act=detail&id=" . $value->id . " class=\"btn btn-primary btn-sm\">
		<i class=\"fas fa-folder\">
		</i>
	</a>
	<a href=\"" . $abs . "/backend/pages/index.php?page=invoices&act=form&act=edit&id=" . $value->id . "\" class=\"btn btn-success btn-sm\">
		<i class=\"fas fa-pencil-alt\">
		</i>
	</a>
	<a onclick=\"return confirm('Apakah yakin data akan di hapus?')\" href=\"" . $abs . "/backend/pages/invoices/crud.php?act=hapus&id=" . $value->id . "\" class=\"btn btn-danger btn-sm\">
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
