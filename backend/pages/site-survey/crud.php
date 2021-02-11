<?php
require '../../../api/panggil.php';
$tabel = 'tbl_site_survey';
$id_customers = trim(htmlspecialchars(strip_tags($_POST['id_customers'])));
$nama = trim(htmlspecialchars(strip_tags($_POST['nama'])));
$access = trim(htmlspecialchars(strip_tags($_POST['access'])));
$volume = trim(htmlspecialchars(strip_tags($_POST['volume'])));
$id_methods = trim(htmlspecialchars(strip_tags($_POST['id_methods'])));
$dtl_obj = trim(htmlspecialchars(strip_tags($_POST['dtl_obj'])));
$tgl = trim(htmlspecialchars(strip_tags($_POST['tgl'])));
$acak = trim(htmlspecialchars(strip_tags($_POST['acak'])));
$created_at = date('Y-m-d H:i:s');
$updated_at = date('Y-m-d H:i:s');

$acak = rand(0000, 9999) . '-' . rand(0000, 9999) . '-' . rand(0000, 9999);

// proses tambah
if (!empty($_GET['act'] == 'tambah')) {
	for ($x = 1; $x <= 8; $x++) {
		$pathTmp = $_FILES['file' . $x]['tmp_name'];
		$pathDest = "../../../assets/uploads/images/site-survey/" . $acak . "-" . $x . ".jpg";
		if ($_FILES['file' . $x]['tmp_name'] != "") {
			chmod($file . $x, 775);
			move_uploaded_file($pathTmp, $pathDest);
		}
	}

	# proses insert
	$data[] = array(
		'id_customers'		=> $id_customers,
		'nama'		=> $nama,
		'access'		=> $access,
		'volume'		=> $volume,
		// 'id_methods'		=> $id_methods,
		'dtl_obj'		=> $dtl_obj,
		'tgl'		=> $tgl,
		'acak'		=> $acak,
		'created_at'		=> $created_at,
	);
	$proses->tambah_data($tabel, $data);
	header('location: ' . $abs . '/backend/pages/index.php?page=site-survey');
}

// proses edit
if (!empty($_GET['act'] == 'edit')) {
	$detail = $proses->tampil_data_id('tbl_site_survey', 'id', $_POST['id']);

	// jika password tidak diisi
	if ($detail['acak'] == '') {
		$data = array(
			'id_customers'		=> $id_customers,
			'nama'		=> $nama,
			'access'		=> $access,
			'volume'		=> $volume,
			// 'id_methods'		=> $id_methods,
			'dtl_obj'		=> $dtl_obj,
			'tgl'		=> $tgl,
			'acak'		=> $acak,
			'updated_at'		=> $created_at,
		);
	} else {
				$data = array(
			'id_customers'		=> $id_customers,
			'nama'		=> $nama,
			'access'		=> $access,
			'volume'		=> $volume,
			// 'id_methods'		=> $id_methods,
			'dtl_obj'		=> $dtl_obj,
			'tgl'		=> $tgl,
			'updated_at'		=> $created_at,
		);
	}

	for ($x = 1; $x <= 8; $x++) {
		$flama = $abs . "/assets/uploads/images/site-survey/" . $detail['acak'] . "-$x";
		$pathTmp = $_FILES['file' . $x]['tmp_name'];
		$pathDest = "../../../assets/uploads/images/site-survey/" . $detail['acak'] . "-" . $x . ".jpg";
		if ($_FILES['file' . $x]['tmp_name'] <> "") {
			chmod($file . $x, 775);
			move_uploaded_file($pathTmp, $pathDest);
		}
	}

	$where = 'id';
	$id = strip_tags($_POST['id']);
	$proses->edit_data($tabel, $data, $where, $id);
	header('location: ' . $abs . '/backend/pages/index.php?page=site-survey');
}

// hapus data
if (!empty($_GET['act'] == 'hapus')) {
	$where = 'id';
	$id = strip_tags($_GET['id']);
	$proses->hapus_data($tabel, $where, $id);
	header('location: '.$abs . '/backend/pages/index.php?page=site-survey');
}
