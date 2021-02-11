<?php
require '../../../api/panggil.php';
$tabel = 'tbl_misc';
$nama = trim(htmlspecialchars(strip_tags($_POST['nama'])));
$telepon = trim(htmlspecialchars(strip_tags($_POST['telepon'])));
$email = trim(htmlspecialchars(strip_tags($_POST['email'])));
$alamat = trim(htmlspecialchars(strip_tags($_POST['alamat'])));
$note = trim(htmlspecialchars(strip_tags($_POST['note'])));

// proses tambah
if (!empty($_GET['act'] == 'tambah')) {

	# proses insert
	$data[] = array(
		'nama'    => $nama,
		'telepon'    => $telepon,
		'email'    => $email,
		'alamat'    => $alamat,
		'note'    => $note,
	);
	$proses->tambah_data($tabel, $data);
	header('location: ' . $abs . '/backend/pages/index.php?page=misc');
}

// proses edit
if (!empty($_GET['act'] == 'edit')) {

	// jika password tidak diisi
	if (!$pass == '') {
		$data = array();
	} else {

		$data = array(
		'nama'    => $nama,
		'telepon'    => $telepon,
		'email'    => $email,
		'alamat'    => $alamat,
		'note'    => $note,
		);
	}
	$where = 'id';
	$id = strip_tags($_POST['id']);
	$proses->edit_data($tabel, $data, $where, $id);
	header('location: ' . $abs . '/backend/pages/index.php?page=misc&act='.$_GET['act'].'&id='.$id);
}

// hapus data
if (!empty($_GET['act'] == 'hapus')) {
	$where = 'id';
	$id = strip_tags($_GET['id']);
	$proses->hapus_data($tabel, $where, $id);
	header('location: ' . $abs . '/backend/pages/index.php?page=misc');
}
