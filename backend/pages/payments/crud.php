<?php
require '../../../api/panggil.php';
$tabel = 'tbl_payments';

// proses tambah
if (!empty($_GET['act'] == 'tambah')) {
	$nama = trim(htmlspecialchars(strip_tags($_POST['nama'])));

	# proses insert
	$data[] = array(
		'nama'    => $nama,
	);
	$proses->tambah_data($tabel, $data);
	header('location: ' . $abs . '/backend/pages/index.php?page=payments');
}

// proses edit
if (!empty($_GET['act'] == 'edit')) {
	$nama = trim(htmlspecialchars(strip_tags($_POST['nama'])));

	// jika password tidak diisi
	if (!$pass == '') {
		$data = array();
	} else {

		$data = array(
			'nama' => $nama,
		);
	}
	$where = 'id';
	$id = strip_tags($_POST['id']);
	$proses->edit_data($tabel, $data, $where, $id);
	header('location: ' . $abs . '/backend/pages/index.php?page=payments');
}

// hapus data
if (!empty($_GET['act'] == 'hapus')) {
	$where = 'id';
	$id = strip_tags($_GET['id']);
	$proses->hapus_data($tabel, $where, $id);
	header('location: ' . $abs . '/backend/pages/index.php?page=payments');
}
