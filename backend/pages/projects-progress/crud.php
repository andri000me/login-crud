<?php
require '../../../api/panggil.php';
$tabel = 'tbl_projects_progress';
$id_projects = trim(htmlspecialchars(strip_tags($_POST['id_projects'])));
$nama = trim(htmlspecialchars(strip_tags($_POST['nama'])));
$job_plan = trim(htmlspecialchars(strip_tags($_POST['job_plan'])));
$job_repair = trim(htmlspecialchars(strip_tags($_POST['job_repair'])));
$note = trim(htmlspecialchars(strip_tags($_POST['note'])));
$tgl = trim(htmlspecialchars(strip_tags($_POST['tgl'])));
$created_at = date('Y-m-d H:i:s');
$updated_at = date('Y-m-d H:i:s');

$acak = rand(0000, 9999) . '-' . rand(0000, 9999) . '-' . rand(0000, 9999);

// proses tambah
if (!empty($_GET['act'] == 'tambah')) {
	for ($x = 1; $x <= 8; $x++) {
		$pathTmp = $_FILES['file' . $x]['tmp_name'];
		$pathDest = "../../../assets/uploads/images/projects-progress/" . $acak . "-" . $x . ".jpg";
		if ($_FILES['file' . $x]['tmp_name'] != "") {
			chmod($file . $x, 775);
			move_uploaded_file($pathTmp, $pathDest);
		}
	}

	# proses insert
	$data[] = array(
		'id_projects'		=> $id_projects,
		// 'nama'		=> $nama,
		'job_plan'		=> $job_plan,
		'job_repair'		=> $job_repair,
		'note'		=> $note,
		'tgl'		=> $tgl,
		'acak'		=> $acak,
		'created_at'		=> $created_at,
	);
	$proses->tambah_data($tabel, $data);
	header('location: ' . $abs . '/backend/pages/index.php?page=projects&act=detail&id='.$id_projects);
	// header('location: ' . $abs . '/backend/pages/index.php?page=projects-progress');
}

// proses edit
if (!empty($_GET['act'] == 'edit')) {
	$detail = $proses->tampil_data_id('tbl_projects_progress', 'id', $_POST['id']);


	if ($detail['acak'] == '') {
		$data = array(
			'id_projects'		=> $id_projects,
			'job_plan'		=> $job_plan,
			'job_repair'		=> $job_repair,
			'note'		=> $note,
			'tgl'		=> $tgl,
			'acak'		=> $acak,
			'updated_at'		=> $updated_at,
		);
	} else {
		$data = array(
			'id_projects'		=> $id_projects,
			'job_plan'		=> $job_plan,
			'job_repair'		=> $job_repair,
			'note'		=> $note,
			'tgl'		=> $tgl,
			'updated_at'		=> $updated_at,
		);
	}

	for ($x = 1; $x <= 8; $x++) {
		$flama = $abs . "/assets/uploads/images/projects-progress/" . $detail['acak'] . "-$x";
		$pathTmp = $_FILES['file' . $x]['tmp_name'];
		$pathDest = "../../../assets/uploads/images/projects-progress/" . $detail['acak'] . "-" . $x . ".jpg";
		if ($_FILES['file' . $x]['tmp_name'] <> "") {
			chmod($file . $x, 775);
			move_uploaded_file($pathTmp, $pathDest);
		}
	}

	$where = 'id';
	$id = strip_tags($_POST['id']);
	$proses->edit_data($tabel, $data, $where, $id);
	header('location: ' . $abs . '/backend/pages/index.php?page=projects&act=detail&id='.$id_projects);
	// header('location: ' . $abs . '/backend/pages/index.php?page=projects-progress');
}

// hapus data
if (!empty($_GET['act'] == 'hapus')) {
	$where = 'id';
	$id = strip_tags($_GET['id']);
	$proses->hapus_data($tabel, $where, $id);
	header('location: '.$abs . '/backend/pages/index.php?page=projects-progress');
}
