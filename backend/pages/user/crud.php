<?php
require '../../../api/panggil.php';
$tabel = 'tbl_user';
// proses tambah
if (!empty($_GET['act'] == 'tambah')) {
	$nama = strip_tags($_POST['nama']);
	$telepon = strip_tags($_POST['telepon']);
	$email = strip_tags($_POST['email']);
	$alamat = strip_tags($_POST['alamat']);
	$user = strip_tags($_POST['user']);
	$pass = strip_tags($_POST['pass']);
	$id_level = strip_tags($_POST['id_level']);

	# proses insert
	$data[] = array(
		'username'		=> $user,
		'password'		=> md5($pass),
		'id_level'		=> $id_level,
		'nama_pengguna'	=> $nama,
		'telepon'		=> $telepon,
		'email'			=> $email,
		'alamat'		=> $alamat
	);
	$proses->tambah_data($tabel, $data);
	echo '<script>alert("Tambah Data Berhasil");window.location="' . $abs . '/backend/pages/index.php?page=user"</script>';
}

// proses edit
if (!empty($_GET['act'] == 'edit')) {
	$nama = strip_tags($_POST['nama']);
	$telepon = strip_tags($_POST['telepon']);
	$email = strip_tags($_POST['email']);
	$alamat = strip_tags($_POST['alamat']);
	$user = strip_tags($_POST['user']);
	$pass = strip_tags($_POST['pass']);
	$id_level = strip_tags($_POST['id_level']);

	// jika password tidak diisi
	if ($pass == '') {
		$data = array(
			'username'		=> $user,
			'id_level'		=> $id_level,
			'nama_pengguna'	=> $nama,
			'telepon'		=> $telepon,
			'email'			=> $email,
			'alamat'		=> $alamat
		);
	} else {

		$data = array(
			'username'		=> $user,
			'id_level'		=> $id_level,
			'password'		=> md5($pass),
			'nama_pengguna'	=> $nama,
			'telepon'		=> $telepon,
			'email'			=> $email,
			'alamat'		=> $alamat
		);
	}
	$where = 'id_login';
	$id = strip_tags($_POST['id_login']);
	$proses->edit_data($tabel, $data, $where, $id);
	echo '<script>alert("Edit Data Berhasil");window.location="' . $abs . '/backend/pages/index.php?page=user"</script>';
}

// hapus data
if (!empty($_GET['aksi'] == 'hapus')) {
	$where = 'id_login';
	$id = strip_tags($_GET['id']);
	$proses->hapus_data($tabel, $where, $id);
	echo '<script>alert("Hapus Data Berhasil");window.location="' . $abs . '/backend/pages/index.php?page=user"</script>';
}

// login
if (!empty($_GET['aksi'] == 'login')) {
	// validasi text untuk filter karakter khusus dengan fungsi strip_tags()
	$user = strip_tags($_POST['user']);
	$pass = strip_tags($_POST['pass']);
	// panggil fungsi proses_login() yang ada di class prosesCrud()
	$result = $proses->proses_login($user, $pass);
	if ($result == 'gagal') {
		echo "<script>window.location='../login.php?get=gagal';</script>";
	} else {
		// status yang diberikan 
		session_start();
		$_SESSION['ADMIN'] = $result;
		// status yang diberikan 
		echo "<script>window.location='../user/index.php';</script>";
	}
}
