<?php
require '../../../api/panggil.php';
$tabel = 'tbl_invoices';

$id_projects = trim(htmlspecialchars(strip_tags($_POST['id_projects'])));
$no_faktur = trim(htmlspecialchars(strip_tags($_POST['no_faktur'])));
$no_quo = trim(htmlspecialchars(strip_tags($_POST['no_quo'])));
$tgl = trim(htmlspecialchars(strip_tags($_POST['tgl'])));
$tgl_due = trim(htmlspecialchars(strip_tags($_POST['tgl_due'])));
$id_payments = trim(htmlspecialchars(strip_tags($_POST['id_payments'])));
$created_at = date('Y-m-d H:i:s');
$updated_at = date('Y-m-d H:i:s');
// proses tambah
if (!empty($_GET['act'] == 'tambah')) {

	# proses insert
	$data[] = array(
		'id_projects'		=> $id_projects,
		'no_faktur'		=> $no_faktur,
		'no_quo'		=> $no_quo,
		'tgl'		=> $tgl,
		'tgl_due'		=> $tgl_due,
		'id_payments'		=> $id_payments,
		'created_at'		=> $created_at,
	);
	$proses->tambah_data($tabel, $data);
	header('location: ' . $abs . '/backend/pages/index.php?page=invoices');
}

// proses edit
if (!empty($_GET['act'] == 'edit')) {

	// jika password tidak diisi
	if (!$no_faktur == '') {

		$data = array(
		'id_projects'		=> $id_projects,
		'no_faktur'		=> $no_faktur,
		'no_quo'		=> $no_quo,
		'tgl'		=> $tgl,
		'tgl_due'		=> $tgl_due,
		'id_payments'		=> $id_payments,
		'updated_at'		=> $created_at,
		);
	}
	$where = 'id';
	$id = strip_tags($_POST['id']);
	$proses->edit_data($tabel, $data, $where, $id);
	header('location: ' . $abs . '/backend/pages/index.php?page=invoices');
}

// hapus data
if (!empty($_GET['act'] == 'hapus')) {
	$where = 'id';
	$id = strip_tags($_GET['id']);
	$proses->hapus_data($tabel, $where, $id);
	header('location: '.$abs . '/backend/pages/index.php?page=invoices');
}
