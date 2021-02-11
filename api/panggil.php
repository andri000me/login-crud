<?php
// panggil file
include 'koneksi.php';
include 'prosescrud.php';
// cara panggil class di koneksi php
$db = new Koneksi();
// cara panggil koneksi di fungsi DBConnect()
$koneksi =  $db->DBConnect();
// panggil class prosesCrud di file prosescrud.php
$proses = new prosesCrud($koneksi);
// menghilangkan pesan error
error_reporting(1);
// panggil session ID
$id = $_SESSION['ADMIN']['id_login'];
$sesi = $proses->tampil_data_id('tbl_user', 'id_login', $id);
$level = $proses->tampil_data_id('tbl_user_level', 'id', $sesi['id_level']);

$abs = 'https://localhost/morilloroom';
$api_url = 'http://localhost/morilloroom/api/morilloroom';
// $abs = 'https://morilloroom.com';
// $api_url = 'http://morilloroom.com/api/morilloroom';

$api_url_morillo = 'http://morillo.co.id';
$api_url_tomat = 'http://tokomaterial.co.id';
