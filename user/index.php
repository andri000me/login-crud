<?php
// session start
if (!empty($_SESSION)) {
} else {
	session_start();
}
require '../api/panggil.php';
?>

<!DOCTYPE HTML>
<html>

<head>
	<title>Tutorial Membuat CRUD PHP OOP dengan PDO MySQL</title>
	<?php include "../layouts/head.php"; ?>
</head>

<body style="background:#586df5;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">

				<?php if (!empty($_SESSION['ADMIN'])) { ?>
					<?php include "../layouts/menu.php"; ?>
					<br />
					<span style="color:#fff" ;>Selamat Datang, <?php echo $sesi['nama_pengguna']; ?></span>
					<a href="../logout.php" class="btn btn-danger btn-md float-right"><span class="fa fa-sign-out"></span> Logout</a>
					<br /><br />
					<a href="tambah.php" class="btn btn-success btn-md"><span class="fa fa-plus"></span> Tambah</a>
					<br /><br />
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Data Pengguna</h4>
						</div>
						<div class="card-body">
							<table class="table table-hover table-bordered" id="mytable" style="margin-top: 10px">
								<thead>
									<tr>
										<th width="50px">No</th>
										<th>Nama Pengguna</th>
										<th>Telepon</th>
										<th>Email</th>
										<th>Alamat</th>
										<th>Username</th>
										<th>Password</th>
										<th style="text-align: center;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									$hasil = $proses->tampil_data('tbl_user', 'id_login');
									foreach ($hasil as $isi) {
									?>
										<tr>
											<td><?php echo $no; ?></td>
											<td><?php echo $isi['nama_pengguna'] ?></td>
											<td><?php echo $isi['telepon']; ?></td>
											<td><?php echo $isi['email']; ?></td>
											<td><?php echo $isi['alamat']; ?></td>
											<td><?php echo $isi['username']; ?></td>
											<td>****</td>
											<td style="text-align: center;">
												<a href="edit.php?id=<?php echo $isi['id_login']; ?>" class="btn btn-success btn-md">
													<span class="fa fa-edit"></span></a>
												<a onclick="return confirm('Apakah yakin data akan di hapus?')" href="crud.php?aksi=hapus&hapusid=<?php echo $isi['id_login']; ?>" class="btn btn-danger btn-md"><span class="fa fa-trash"></span></a>
											</td>
										</tr>
									<?php
										$no++;
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				<?php } else { ?>
					<br />
					<div class="alert alert-info">
						<h3>Your session has been expired</h3>
						<hr />
						<p><a href="../login.php">Please login here</a></p>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<script>
		$('#mytable').dataTable();
	</script>
</body>

</html>