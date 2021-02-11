<?php
require '../../../api/panggil.php';
$tabel = 'tbl_customers';

$nama = trim(htmlspecialchars(strip_tags($_POST['nama'])));
$telepon = trim(htmlspecialchars(strip_tags($_POST['telepon'])));
$email = trim(htmlspecialchars(strip_tags($_POST['email'])));
$alamat = trim(htmlspecialchars(strip_tags($_POST['alamat'])));
$pic = trim(htmlspecialchars(strip_tags($_POST['pic'])));
$created_at = date('Y-m-d H:i:s');
$updated_at = date('Y-m-d H:i:s');
// proses tambah
if (!empty($_GET['act'] == 'tambah')) {

	# proses insert
	$data[] = array(
		'nama'		=> $nama,
		'pic'	=> $pic,
		'telepon'		=> $telepon,
		'email'			=> $email,
		'alamat'		=> $alamat,
		'created_at'		=> $created_at
	);
	$proses->tambah_data($tabel, $data);
	// echo '<script>alert("Tambah Data Berhasil");window.location="' . $abs . '/backend/pages/index.php?page=customers"</script>';
	header('location: ' . $abs . '/backend/pages/index.php?page=customers');
}

// proses edit
if (!empty($_GET['act'] == 'edit')) {

	// jika password tidak diisi
	if (!$nama == '') {

		$data = array(
			'nama'		=> $nama,
			'pic'		=> $pic,
			'telepon'		=> $telepon,
			'email'			=> $email,
			'alamat'		=> $alamat,
			'updated_at'		=> $updated_at
		);
	}
	$where = 'id';
	$id = strip_tags($_POST['id']);
	$proses->edit_data($tabel, $data, $where, $id);
	header('location: ' . $abs . '/backend/pages/index.php?page=customers');
}

// hapus data
if (!empty($_GET['act'] == 'hapus')) {
	$where = 'id';
	$id = strip_tags($_GET['id']);
	$proses->hapus_data($tabel, $where, $id);
	header('location: '.$abs . '/backend/pages/index.php?page=customers');
}
