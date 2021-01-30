<?php
// session start
if (!empty($_SESSION)) {
} else {
	session_start();
}
//session
if (!empty($_SESSION['ADMIN'])) {
} else {
	header('location:login.php');
}
// panggil file
require '../../api/panggil.php';
?>

<!DOCTYPE HTML>
<html>

<head>
	<title>Tambah Pengguna</title>
	<?php include "../layouts/head.php"; ?>
</head>

<body style="background:#586df5;">
	<div class="container">
		<?php include "../layouts/menu.php"; ?>
		<br />
		<span style="color:#fff" ;>Selamat Datang, <?php echo $sesi['nama_pengguna']; ?></span>
		<div class="float-right">
			<a href="index.php" class="btn btn-success btn-md" style="margin-right:1pc;"><span class="fa fa-home"></span> Kembali</a>
			<a href="logout.php" class="btn btn-danger btn-md float-right"><span class="fa fa-sign-out"></span> Logout</a>
		</div>
		<br /><br /><br />
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-lg-6">
				<br />
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Tambah Pengguna</h4>
					</div>
					<div class="card-body">
						<form action="<?=$abs;?>/backend/user/crud.php?aksi=tambah" method="POST">
							<div class="form-group">
								<label>Nama </label>
								<input type="text" value="" class="form-control" name="nama">
							</div>
							<div class="form-group">
								<label>Telepon</label>
								<input type="number" value="" class="form-control" name="telepon">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="harga" value="" class="form-control" name="email">
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<textarea name="alamat" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<label>Username</label>
								<input type="text" value="" class="form-control" name="user">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" value="" class="form-control" name="pass">
							</div>
							<button class="btn btn-primary btn-md" name="create"><i class="fa fa-plus"> </i> Tambah Data</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-3"></div>
		</div>
	</div>
</body>

</html>