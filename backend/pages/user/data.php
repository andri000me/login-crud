<?php
session_start();
include "../../../lib/config.php";
include "../../../api/panggil.php";

//kolom apa saja yang akan ditampilkan
$columns = array(
	'u.nama_pengguna',
	'u.username',
	'u.telepon',
	'u.email',
	'l.nama',
	'u.acak',
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

$query = $datatable->get_custom("SELECT u.id_login, u.nama_pengguna, u.username, u.telepon, u.email, u.acak,
l.nama as nama_level
from tbl_user as u 
inner join tbl_user_level as l 
on u.id_level=l.id
where u.id_login>1", $columns);

//buat inisialisasi array data
$data = array();

$no = 1;
foreach ($query	as $value) {

	//array sementara data
	$ResultData = array();

	//masukan data ke array sesuai kolom table
	$ResultData[] = $no;
	$ResultData[] = $value->nama_pengguna;
	$ResultData[] = $value->username;
	$ResultData[] = $value->telepon;
	$ResultData[] = $value->email;
	$ResultData[] = "
		<span class=\"badge badge-success\">" . $value->nama_level . "</span>
	";
	if ($fopen=fopen('../../../assets/uploads/images/user/'.$value->acak."-1.jpg", 'r')) {
		$img="<img src=\"" . $abs . "/assets/uploads/images/user/" . $value->acak . "-1.jpg\" height=\"40\">";
	} else {
		$img="<img src=\"" . $abs . "/assets/logo.png\" height=\"40\">";
	}
	$ResultData[] = $img;

	//bisa juga pake logic misal jika value tertentu maka outputnya

	//kita bisa buat tombol untuk keperluan edit, delete, dll, 
	$ResultData[] = "
	<a href=\"" . $abs . "/backend/pages/index.php?page=user&act=edit&id_login=" . $value->id_login . "\" class=\"btn btn-success btn-sm\"><span class=\"fa fa-edit\"></span></a>
	<a onclick=\"return confirm('Apakah yakin data akan di hapus?')\" href=\"" . $abs . "/backend/pages/user/crud.php?act=hapus&id_login=" . $value->id_login . "\" class=\"btn btn-danger btn-sm\"><span class=\"fa fa-trash\"></span></a>";

	//memasukan array ke variable $data

	$no++;
	$data[] = $ResultData;
}

//set data
$datatable->set_data($data);
//create our json
$datatable->create_data();
