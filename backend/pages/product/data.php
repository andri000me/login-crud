<?php
session_start();
include "../../../lib/config.php";
include "../../../api/panggil.php";

//kolom apa saja yang akan ditampilkan
$columns = array(
	'p.nama',
	'p.harga',
	'p.acak',
	'k.nama',
);


//jika ingin langsung menambahkan kondisi where dengan parameter terentu query seperti ini 
//misal kita akan langsung menambahkan kondisi langsung hanya menampilkan provinsi jawabarat saja, 
//prepared statement untuk keamanan data
/*$array_id_provinsi = array('provinsi.id_prov' => 32); //32 adalah id untuk jawabarat
	$query = $datatable->get_custom("select provinsi.nama_prov,kabupaten.nama_kab, kecamatan.nama_kec,id_kec
from provinsi inner join kabupaten 
on provinsi.id_prov=kabupaten.id_prov
inner join kecamatan on kabupaten.id_kab=kecamatan.id_kab where provinsi.id_prov=?",$columns,$array_id_provinsi);*/

//untuk mencobanya uncomment query diatas dan comment query dibawah

//lakukan query data dari 3 table dengan inner join
// 	$query = $datatable->get_custom("select provinsi.nama_prov,kabupaten.nama_kab, kecamatan.nama_kec,id_kec
// from provinsi inner join kabupaten 
// on provinsi.id_prov=kabupaten.id_prov
// inner join kecamatan on kabupaten.id_kab=kecamatan.id_kab ",$columns);

$query = $datatable->get_custom("SELECT p.nama, p.harga, p.acak k.nama 
	from prod as p 
	inner join prodkat as k 
	on p.kid=k.kid", $columns);

//buat inisialisasi array data
$data = array();

foreach ($query	as $value) {

	//array sementara data
	$ResultData = array();

	//masukan data ke array sesuai kolom table
	$ResultData[] = $value->nama_pro;
	$ResultData[] = $value->nama;
	$ResultData[] = $value->acak1;

	//bisa juga pake logic misal jika value tertentu maka outputnya

	//kita bisa buat tombol untuk keperluan edit, delete, dll, 
	$ResultData[] = "
	<a href=\"" . $abs . "/backend/index.php?page=produk-form&act=edit&id=" . $value->id . "\" class=\"btn btn-success btn-sm\"><span class=\"fa fa-edit\"></span></a>
	<a onclick=\"return confirm('Apakah yakin data akan di hapus?')\" href=\"" . $abs . "/backend/produk/crud.php?aksi=hapus&id=" . $value->id . "\" class=\"btn btn-danger btn-sm\"><span class=\"fa fa-trash\"></span></a>";

	//memasukan array ke variable $data

	$data[] = $ResultData;
}

//set data
$datatable->set_data($data);
//create our json
$datatable->create_data();
