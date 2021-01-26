<?php
require 'panggil.php';

// proses tambah
if (!empty($_GET['aksi'] == 'tambah')) {
	$nama = strip_tags($_POST['nama']);
	$ket = strip_tags($_POST['ket']);
	$gambar = strip_tags($_POST['gambar']);

	$tabel = 'kategori';
	# proses insert
	$data[] = array(
		'nama'    => $nama,
		'ket'    => $ket,
		'gambar'  => $gambar,
	);
	$proses->tambah_data($tabel, $data);
	echo '<script>alert("Tambah Data Berhasil");window.location="' . $abs . '/kategori"</script>';
}

// proses edit
if (!empty($_GET['aksi'] == 'edit')) {
	$nama = strip_tags($_POST['nama']);
	$ket = strip_tags($_POST['ket']);
	$gambar = strip_tags($_POST['gambar']);

	// jika password tidak diisi
	if (!$pass == '') {
		$data = array();
	} else {

		$data = array(
			'nama'    => $nama,
			'ket'  => $ket,
			'gambar'    => $gambar,
		);
	}
	$tabel = 'kategori';
	$where = 'idkat';
	$id = strip_tags($_POST['idkat']);
	$proses->edit_data($tabel, $data, $where, $id);
	echo '<script>alert("Edit Data Berhasil");window.location="' . $abs . '/kategori"</script>';
}

// hapus data
if (!empty($_GET['aksi'] == 'hapus')) {
	$tabel = 'kategori';
	$where = 'idkat';
	$id = strip_tags($_GET['idkat']);
	$proses->hapus_data($tabel, $where, $id);
	echo '<script>alert("Hapus Data Berhasil");window.location="' . $abs . '/kategori"</script>';
}
