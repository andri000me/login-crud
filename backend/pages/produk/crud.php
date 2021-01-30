<?php
require '../../api/panggil.php';
$tabel = 'produk';
// proses tambah
if (!empty($_GET['aksi'] == 'tambah')) {
	$idkat = strip_tags($_POST['idkat']);
	$nama_pro = strip_tags($_POST['nama_pro']);
	$ket = strip_tags($_POST['ket']);
	$acak1 = strip_tags($_POST['acak1']);

	# proses insert
	$data[] = array(
		'idkat'    => $idkat,
		'nama_pro'    => $nama_pro,
		'ket'    => $ket,
		'acak1'  => $acak1,
	);
	$proses->tambah_data($tabel, $data);
	echo '<script>alert("Tambah Data Berhasil");window.location="' . $abs . '/backend/index.php?page=produk"</script>';
}

// proses edit
if (!empty($_GET['aksi'] == 'edit')) {
	// $id = strip_tags($_POST['id']);
	$idkat = strip_tags($_POST['idkat']);
	$nama_pro = strip_tags($_POST['nama_pro']);
	$ket = strip_tags($_POST['ket']);
	$acak1 = strip_tags($_POST['acak1']);

	// jika password tidak diisi
	if (!$pass == '') {
		$data = array();
	} else {

		$data = array(
			// 'id' => $id,
			'idkat' => $idkat,
			'nama_pro'    => $nama_pro,
			'ket'  => $ket,
			'acak1'    => $acak1,
		);
	}
	$where = 'id';
	$id = strip_tags($_POST['id']);
	$proses->edit_data($tabel, $data, $where, $id);
	echo '<script>alert("Edit Data Berhasil");window.location="' . $abs . '/backend/index.php?page=produk"</script>';
}

// hapus data
if (!empty($_GET['aksi'] == 'hapus')) {
	$where = 'id';
	$id = strip_tags($_GET['id']);
	$proses->hapus_data($tabel, $where, $id);
	echo '<script>alert("Hapus Data Berhasil");window.location="' . $abs . '/backend/index.php?page=produk"</script>';
}
