<?php
require '../../../api/panggil.php';
$tabel = 'tbl_user_level';

// proses tambah
if (!empty($_GET['act'] == 'tambah')) {
	$nama = strip_tags($_POST['nama']);

	# proses insert
	$data[] = array(
		'nama'    => $nama,
	);
	$proses->tambah_data($tabel, $data);
	echo '<script>alert("Tambah Data Berhasil");window.location="' . $abs . '/backend/pages/index.php?page=level"</script>';
}

// proses edit
if (!empty($_GET['act'] == 'edit')) {
	$nama = strip_tags($_POST['nama']);

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
	echo '<script>alert("Edit Data Berhasil");window.location="' . $abs . '/backend/pages/index.php?page=level"</script>';
}

// hapus data
if (!empty($_GET['aksi'] == 'hapus')) {
	$where = 'id';
	$id = strip_tags($_GET['id']);
	$proses->hapus_data($tabel, $where, $id);
	echo '<script>alert("Hapus Data Berhasil");window.location="' . $abs . '/backend/level"</script>';
}
