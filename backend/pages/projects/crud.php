<?php
require '../../../api/panggil.php';
$tabel = 'tbl_projects';

$id_marketing = trim(htmlspecialchars(strip_tags($_POST['id_marketing'])));
$id_supervisor = trim(htmlspecialchars(strip_tags($_POST['id_supervisor'])));
$id_site_survey = trim(htmlspecialchars(strip_tags($_POST['id_site_survey'])));
$nama = trim(htmlspecialchars(strip_tags($_POST['nama'])));
$id_methods = trim(htmlspecialchars(strip_tags($_POST['id_methods'])));
$id_status = trim(htmlspecialchars(strip_tags($_POST['id_status'])));
$progress = trim(htmlspecialchars(strip_tags($_POST['progress'])));
$volume = trim(htmlspecialchars(strip_tags($_POST['volume'])));
$budget_estimation = trim(htmlspecialchars(strip_tags($_POST['budget_estimation'])));
$budget_spent = trim(htmlspecialchars(strip_tags($_POST['budget_spent'])));
$duration = trim(htmlspecialchars(strip_tags($_POST['duration'])));
$created_at = date('Y-m-d H:i:s');
$updated_at = date('Y-m-d H:i:s');
// proses tambah
if (!empty($_GET['act'] == 'tambah')) {

	# proses insert
	$data[] = array(
		'id_site_survey'		=> $id_site_survey,
		'id_marketing'		=> $id_marketing,
		'id_supervisor'		=> $id_supervisor,
		'nama'		=> $nama,
		'id_status'		=> $id_status,
		'progress'		=> $progress,
		'budget_estimation'		=> $budget_estimation,
		'budget_spent'		=> $budget_spent,
		'duration'		=> $duration,
		'created_at'		=> $created_at,
	);
	$proses->tambah_data($tabel, $data);
	header('location: ' . $abs . '/backend/pages/index.php?page=projects');
}

// proses edit
if (!empty($_GET['act'] == 'edit')) {

	// jika password tidak diisi
	if (!$nama == '') {

		$data = array(
			'id_site_survey'		=> $id_site_survey,
			'id_marketing'		=> $id_marketing,
			'id_supervisor'		=> $id_supervisor,
			'nama'		=> $nama,
			'id_status'		=> $id_status,
			'progress'		=> $progress,
			'budget_estimation'		=> $budget_estimation,
			'budget_spent'		=> $budget_spent,
			'duration'		=> $duration,
			'updated_at'		=> $created_at,
		);
	}
	$where = 'id';
	$id = strip_tags($_POST['id']);
	$proses->edit_data($tabel, $data, $where, $id);
	header('location: ' . $abs . '/backend/pages/index.php?page=projects');
}

// hapus data
if (!empty($_GET['act'] == 'hapus')) {
	$where = 'id';
	$id = strip_tags($_GET['id']);
	$proses->hapus_data($tabel, $where, $id);
	header('location: '.$abs . '/backend/pages/index.php?page=projects');
}
