<?php
require '../../../api/panggil.php';
$tabel = 'tbl_req_material';
$id_site_survey = trim(htmlspecialchars(strip_tags($_POST['id_site_survey'])));
$id_products = trim(htmlspecialchars(strip_tags($_POST['id_products'])));
$jumlah = trim(htmlspecialchars(strip_tags($_POST['jumlah'])));

$tbl_products = $proses->tampil_data_id('tbl_products', 'id', $id_products);
$total=$tbl_products['harga']*$jumlah;

$created_at = date('Y-m-d H:i:s');
$updated_at = date('Y-m-d H:i:s');

$acak = rand(0000, 9999) . '-' . rand(0000, 9999) . '-' . rand(0000, 9999);

// proses tambah
if (!empty($_GET['act'] == 'tambah')) {

	# proses insert
	$data[] = array(
		'id_site_survey'		=> $id_site_survey,
		'id_products'		=> $id_products,
		'jumlah'		=> $jumlah,
		'total'		=> $total,
		'created_at'		=> $created_at,
	);
	$proses->tambah_data($tabel, $data);

	if ($_GET['ref']=="site-survey") {
	header('location: ' . $abs . '/backend/pages/index.php?page=site-survey&act=detail&id='.$id_site_survey);
	} else {
	header('location: ' . $abs . '/backend/pages/index.php?page=req-material');
	}
}

// proses edit
if (!empty($_GET['act'] == 'edit')) {
	$detail = $proses->tampil_data_id('tbl_site_survey', 'id', $_POST['id']);

	// jika password tidak diisi
	if (!$jumlah == '') {

		$data = array(
		'id_site_survey'		=> $id_site_survey,
		'id_products'		=> $id_products,
		'jumlah'		=> $jumlah,
		'total'		=> $total,
		'updated_at'		=> $created_at,
		);
	}
	$where = 'id';
	$id = strip_tags($_POST['id']);
	$proses->edit_data($tabel, $data, $where, $id);
	header('location: ' . $abs . '/backend/pages/index.php?page=req-material');
}

// hapus data
if (!empty($_GET['act'] == 'hapus')) {
	$where = 'id';
	$id = strip_tags($_GET['id']);
	$proses->hapus_data($tabel, $where, $id);

	if ($_GET['ref']=="site-survey") {
		header('location: ' . $abs . '/backend/pages/index.php?page=site-survey&act=detail&id='.$id_site_survey);
	} else {
		header('location: '.$abs . '/backend/pages/index.php?page=req-material');
	}
}
