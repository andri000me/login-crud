<?php
require '../../../api/panggil.php';
$tabel = 'tbl_customers';
// proses tambah
if (!empty($_GET['act'] == 'tambah')) {
	$nama = strip_tags($_POST['nama']);
	$telepon = strip_tags($_POST['telepon']);
	$email = strip_tags($_POST['email']);
	$alamat = strip_tags($_POST['alamat']);
	$pic = strip_tags($_POST['pic']);

	# proses insert
	$data[] = array(
		'nama'		=> $nama,
		'pic'	=> $pic,
		'telepon'		=> $telepon,
		'email'			=> $email,
		'alamat'		=> $alamat
	);
	$proses->tambah_data($tabel, $data);
	echo '<script>alert("Tambah Data Berhasil");window.location="' . $abs . '/backend/pages/index.php?page=customers"</script>';
}

// proses edit
if (!empty($_GET['act'] == 'edit')) {
	$nama = strip_tags($_POST['nama']);
	$telepon = strip_tags($_POST['telepon']);
	$email = strip_tags($_POST['email']);
	$alamat = strip_tags($_POST['alamat']);
	$pic = strip_tags($_POST['pic']);

	// jika password tidak diisi
	if (!$nama == '') {

		$data = array(
			'nama'		=> $nama,
			'pic'		=> $pic,
			'telepon'		=> $telepon,
			'email'			=> $email,
			'alamat'		=> $alamat
		);
	}
	$where = 'id';
	$id = strip_tags($_POST['id']);
	$proses->edit_data($tabel, $data, $where, $id);
	header('location: ' . $abs . '/backend/pages/index.php?page=customers');
}

// hapus data
if (!empty($_GET['aksi'] == 'hapus')) {
	$where = 'id';
	$id = strip_tags($_GET['id']);
	$proses->hapus_data($tabel, $where, $id);
	header('location: '.$abs . '/backend/pages/index.php?page=customers');
}
