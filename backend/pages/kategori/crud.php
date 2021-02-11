<?php
require '../../../api/panggil.php';

// proses tambah
if (!empty($_GET['act'] == 'tambah')) {
	$nama = strip_tags($_POST['nama']);
	$ket = strip_tags($_POST['ket']);
	$gambar = strip_tags($_POST['gambar']);

	$tabel = 'kategori';
	# proses insert
	$data[] = array(
		'nama'    => $nama,
		'ket'    => $ket,
		'gambar'  => $gambar,
	);
	$proses->tambah_data($tabel, $data);
	header('location: ' . $abs . '/backend/pages/index.php?page=kategori');
}

// proses edit
if (!empty($_GET['act'] == 'edit')) {
	$nama = strip_tags($_POST['nama']);
	$ket = strip_tags($_POST['ket']);
	$gambar = strip_tags($_POST['gambar']);

	// jika password tidak diisi
	if (!$pass == '') {
		$data = array();
	} else {

		$data = array(
			'nama'    => $nama,
			'ket'  => $ket,
			'gambar'    => $gambar,
		);
	}
	$tabel = 'kategori';
	$where = 'idkat';
	$id = strip_tags($_POST['idkat']);
	$proses->edit_data($tabel, $data, $where, $id);
	header('location: ' . $abs . '/backend/pages/index.php?page=kategori');
}

// hapus data
if (!empty($_GET['act'] == 'hapus')) {
	$tabel = 'kategori';
	$where = 'idkat';
	$id = strip_tags($_GET['idkat']);
	$proses->hapus_data($tabel, $where, $id);
	header('location: ' . $abs . '/backend/pages/index.php?page=kategori');
}
