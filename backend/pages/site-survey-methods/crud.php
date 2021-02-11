<?php
require '../../../api/panggil.php';
$tabel = 'tbl_site_survey_methods';
$id_site_survey = trim(htmlspecialchars(strip_tags($_POST['id_site_survey'])));
$id_methods = trim(htmlspecialchars(strip_tags($_POST['id_methods'])));
$created_at = date('Y-m-d H:i:s');
$updated_at = date('Y-m-d H:i:s');
// proses tambah
if (!empty($_GET['act'] == 'tambah')) {

	# proses insert
	$data[] = array(
		'id_site_survey'		=> $id_site_survey,
		'id_methods'		=> $id_methods,
		'created_at'		=> $created_at,
	);
	$proses->tambah_data($tabel, $data);
	header('location: ' . $abs . '/backend/pages/index.php?page=site-survey&act=detail&id='.$id_site_survey);
	// header('location: ' . $abs . '/backend/pages/index.php?page=site-survey');
}

// proses edit
if (!empty($_GET['act'] == 'edit')) {

	// jika password tidak diisi
	if (!$id_methods == '') {

		$data = array(
			'id_site_survey'		=> $id_site_survey,
			'id_methods'		=> $id_methods,
			'updated_at'		=> $created_at,
		);
	}
	$where = 'id';
	$id = strip_tags($_POST['id']);
	$proses->edit_data($tabel, $data, $where, $id);
	header('location: ' . $abs . '/backend/pages/index.php?page=site-survey&act=detail&id='.$id_site_survey);
	// header('location: ' . $abs . '/backend/pages/index.php?page=site-survey-methods');
}

// hapus data
if (!empty($_GET['act'] == 'hapus')) {
	$where = 'id';
	$id = strip_tags($_GET['id']);
	$proses->hapus_data($tabel, $where, $id);
	header('location: ' . $abs . '/backend/pages/index.php?page=site-survey&act=detail&id='.$id_site_survey);
	// header('location: ' . $abs . '/backend/pages/index.php?page=site-survey-methods');
}
