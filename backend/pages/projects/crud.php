<?php
require '../../../api/panggil.php';
$tabel = 'tbl_projects';
// proses tambah
if (!empty($_GET['act'] == 'tambah')) {
	$nama = strip_tags($_POST['nama']);
	$id_customers = strip_tags($_POST['id_customers']);

	# proses insert
	$data[] = array(
		'nama'		=> $nama,
		'id_customers'		=> $id_customers
	);
	$proses->tambah_data($tabel, $data);
	header('location: ' . $abs . '/backend/pages/index.php?page=projects');
}

// proses edit
if (!empty($_GET['act'] == 'edit')) {
	$nama = strip_tags($_POST['nama']);
	$id_customers = strip_tags($_POST['id_customers']);

	// jika password tidak diisi
	if (!$nama == '') {

		$data = array(
			'nama'		=> $nama,
			'id_customers'		=> $id_customers,
		);
	}
	$where = 'id';
	$id = strip_tags($_POST['id']);
	$proses->edit_data($tabel, $data, $where, $id);
	header('location: ' . $abs . '/backend/pages/index.php?page=projects');
}

// hapus data
if (!empty($_GET['aksi'] == 'hapus')) {
	$where = 'id';
	$id = strip_tags($_GET['id']);
	$proses->hapus_data($tabel, $where, $id);
	header('location: '.$abs . '/backend/pages/index.php?page=projects');
}
