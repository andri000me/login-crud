<?php
require '../../../api/panggil.php';
$tabel = 'tbl_user';

$nama = trim(htmlspecialchars(strip_tags($_POST['nama'])));
$telepon = trim(htmlspecialchars(strip_tags($_POST['telepon'])));
$email = trim(htmlspecialchars(strip_tags($_POST['email'])));
$alamat = trim(htmlspecialchars(strip_tags($_POST['alamat'])));
$user = trim(htmlspecialchars(strip_tags($_POST['user'])));
$pass = trim(htmlspecialchars(strip_tags($_POST['pass'])));
$id_level = trim(htmlspecialchars(strip_tags($_POST['id_level'])));
$file1 = trim(htmlspecialchars(strip_tags($_POST['file1'])));
$created_at = date('Y-m-d H:i:s');
$updated_at = date('Y-m-d H:i:s');

$acak=rand(0000, 9999).'-'.rand(0000, 9999).'-'.rand(0000, 9999);
$fileacak = $acak . "-" . $filename1;

// proses tambah
if (!empty($_GET['act'] == 'tambah')) {
	for ($x = 1; $x <= 6; $x++) {
		$pathTmp = $_FILES['file' . $x]['tmp_name'];
		$pathDest = "../../../assets/uploads/images/user/" . $acak . "-" . $x . ".jpg";
		if ($_FILES['file' . $x]['tmp_name'] != "") {
			chmod($file . $x, 775);
			move_uploaded_file($pathTmp, $pathDest);
		}
	}

	# proses insert
	$detail = $proses->tampil_data_id('tbl_user', 'username', $_POST['user']);
	if ($user== $detail['username']) {
		echo $user." duplicate";
		exit;
	}

	$data[] = array(
		'username'		=> $user,
		// 'password'		=> password_hash($pass, PASSWORD_DEFAULT),
		'password'		=> sha1($pass),
		'id_level'		=> $id_level,
		'nama_pengguna'	=> $nama,
		'telepon'		=> $telepon,
		'email'			=> $email,
		'alamat'		=> $alamat,
		'acak'		=> $acak,
		'created_at'		=> $created_at
	);
	$proses->tambah_data($tabel, $data);
	header('location: ' . $abs . '/backend/pages/index.php?page=user&msg='.urlencode('insert data success'));
}

// proses edit
if (!empty($_GET['act'] == 'edit')) {
	$detail = $proses->tampil_data_id('tbl_user', 'id_login', $_POST['id_login']);

	for ($x = 1; $x <= 6; $x++) {
		$flama = $abs . "/assets/uploads/images/user/".$detail['acak'] . "-$x";
		$pathTmp = $_FILES['file' . $x]['tmp_name'];
		$pathDest = "../../../assets/uploads/images/user/" . $detail['acak'] . "-" . $x . ".jpg";
		if ($_FILES['file' . $x]['tmp_name'] <> "") {
			chmod($file . $x, 775);
			move_uploaded_file($pathTmp, $pathDest);
		}
	}

	// jika password tidak diisi
	if ($pass == '') {
		$data = array(
			'username'		=> $user,
			'id_level'		=> $id_level,
			'nama_pengguna'	=> $nama,
			'telepon'		=> $telepon,
			'email'			=> $email,
			'alamat'		=> $alamat,
			'updated_at'		=> $updated_at
		);
	} else {
		$data = array(
			'username'		=> $user,
			'id_level'		=> $id_level,
			'password'		=> sha1($pass),
			// 'password'		=> hash('md5', $pass),
			'nama_pengguna'	=> $nama,
			'telepon'		=> $telepon,
			'email'			=> $email,
			'alamat'		=> $alamat,
			'updated_at'		=> $updated_at
		);
	}
	$where = 'id_login';
	$id = strip_tags($_POST['id_login']);
	$proses->edit_data($tabel, $data, $where, $id);
	header('location: ' . $abs . '/backend/pages/index.php?page=user&msg='.urlencode('update data success'));
}

// hapus data
if (!empty($_GET['act'] == 'hapus')) {
	$where = 'id_login';
	$id = strip_tags($_GET['id_login']);
	$proses->hapus_data($tabel, $where, $id);
	header('location: ' . $abs . '/backend/pages/index.php?page=user&msg='.urlencode('delete data success'));
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
