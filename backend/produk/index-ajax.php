<?php
// session start
if (!empty($_SESSION)) {
} else {
	session_start();
}
require '../../api/panggil.php';
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
							<h4 class="card-title">Data Produk</h4>
						</div>
						<div class="card-body">
							<table id="contoh" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Nama</th>
										<th>Kategori</th>
										<th>Gambar</th>
										<th></th>
									</tr>
								</thead>
								<tbody>

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
	<script type="text/javascript">
		$("#contoh").dataTable({
			'bProcessing': true,
			'bServerSide': true,
			//disable order dan searching pada tombol aksi
			"columnDefs": [{
				"targets": [3],
				"orderable": false,
				"searchable": false

			}],
			"ajax": {
				url: "data.php",
				type: "post", // method  , by default get
				//bisa kirim data ke server
				/*data: function ( d ) {
				  
				          d.jurusan = "3223";
				      },*/
				error: function(xhr, error, thrown) {
					console.log(xhr);

				}
			},

		});
	</script>
</body>

</html>