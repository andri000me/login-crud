<?php
require '../../../api/panggil.php';
$tabel = 'tbl_products';

$nama = trim(htmlspecialchars(strip_tags($_POST['nama'])));
$id_brands = trim(htmlspecialchars(strip_tags($_POST['id_brands'])));
$harga = trim(htmlspecialchars(strip_tags($_POST['harga'])));
$created_at = date('Y-m-d H:i:s');
$updated_at = date('Y-m-d H:i:s');
// proses tambah
if (!empty($_GET['act'] == 'tambah')) {
	# proses insert
	$data[] = array(
		'nama'		=> $nama,
		'id_brands'	=> $id_brands,
		'harga'		=> $harga,
		'created_at'		=> $created_at
	);
	$proses->tambah_data($tabel, $data);
	// echo '<script>alert("Tambah Data Berhasil");window.location="' . $abs . '/backend/pages/index.php?page=products"</script>';
	header('location: ' . $abs . '/backend/pages/index.php?page=products');
}

// proses edit
if (!empty($_GET['act'] == 'edit')) {

	// jika password tidak diisi
	if (!$nama == '') {

		$data = array(
			'nama'		=> $nama,
			'id_brands'	=> $id_brands,
			'harga'		=> $harga,
			'updated_at'		=> $updated_at
		);
	}
	$where = 'id';
	$id = strip_tags($_POST['id']);
	$proses->edit_data($tabel, $data, $where, $id);
	header('location: ' . $abs . '/backend/pages/index.php?page=products');
}

// hapus data
if (!empty($_GET['act'] == 'hapus')) {
	$where = 'id';
	$id = strip_tags($_GET['id']);
	$proses->hapus_data($tabel, $where, $id);
	header('location: '.$abs . '/backend/pages/index.php?page=products');
}
