<?php
session_start();
include "../../../lib/config.php";
include "../../../api/panggil.php";

//kolom apa saja yang akan ditampilkan
$columns = array(
	'id',
	'id_customers',
	'nama',
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

$query = $datatable->get_custom("SELECT p.id, p.nama, c.nama as nama_customers FROM tbl_projects p INNER JOIN tbl_customers c ON p.id_customers=c.id", $columns);

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

	//bisa juga pake logic misal jika value tertentu maka outputnya

	//kita bisa buat tombol untuk keperluan edit, delete, dll, 
	$ResultData[] = "
	<button type=\"button\" class=\"btn btn-default\" data-toggle=\"modal\" data-target=\"#modal-user-" . $value->id . "\">quick info</button>
	<a href=\"" . $abs . "/backend/pages/index.php?page=projects-form&act=edit&id=" . $value->id . "\" class=\"btn btn-success btn-sm\"><span class=\"fa fa-edit\"></span></a>
	<a onclick=\"return confirm('Apakah yakin data akan di hapus?')\" href=\"" . $abs . "/backend/pages/projects/crud.php?aksi=hapus&id=" . $value->id . "\" class=\"btn btn-danger btn-sm\"><span class=\"fa fa-trash\"></span></a>";

	//memasukan array ke variable $data

	$no++;
	$data[] = $ResultData;
}

//set data
$datatable->set_data($data);
//create our json
$datatable->create_data();
