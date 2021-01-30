<?php
// session start
if (!empty($_SESSION)) {
} else {
	session_start();
}
require '../../api/panggil.php';
include '../inc.php';
?>

<!DOCTYPE HTML>
<html>

<head>
	<title>Tutorial Membuat CRUD PHP OOP dengan PDO MySQL</title>
	<?php include "../layouts/head.php"; ?>
</head>

<body style="background:#586df5;">
	<?php
	?>


	<?php
	$info = isset($_GET['info']) ? $_GET['info'] : '';
	$msg = isset($_GET['msg']) ? $_GET['msg'] : '';

	if (!empty($info)) {
		echo 'Info: ' . $info;
		echo '<br />Msg: ' . $msg;
		echo '<br />';
	}
	?>
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
										<th>ID</th>
										<th>Nama</th>
										<th>Kategori</th>
										<!-- <th>Keterangan</th> -->
										<th>Gambar</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$api_categories_list = $api_url . '/produk/list.php';
									$json_list = @file_get_contents($api_categories_list);

									$array = json_decode($json_list, true);
									$result = isset($array['result']) ? $array['result'] : array();

									$no = 0;
									foreach ($result as $arr) {
										$no++;

										$link_edit = '<a href="produk-edit.php?id=' . $arr['id'] . '">[Edit]</a>';
										$link_delete = '<a href="javascript:void:;" onclick="deleteData(\'' . $arr['id'] . '\')">[Delete]</a>';

									?>
										<tr>
											<td><?= $no; ?></td>
											<td><?= $arr['nama_pro']; ?></td>
											<td><?= $arr['nama']; ?></td>
											<!-- <td><?= $arr['ket']; ?></td> -->
											<td>
												<img src="<?= $abs_morillo; ?>/images/produk/<?= $arr['acak1']; ?>" height="40">
											</td>
											<td>
												<a href="<?=$abs;?>/backend/produk/edit.php?id=<?=$arr['id'];?>" class="btn btn-success btn-sm"><span class="fa fa-edit"></span></a>
												<a onclick="return confirm('Apakah yakin data akan di hapus?')" href="<?=$abs;?>/backend/produk/crud.php?aksi=hapus&id=<?=$arr['id'];?>" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
												<!-- <?= $link_edit . ' ' . $link_delete; ?> -->
											</td>
										</tr>
									<?php
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
	<script type="text/javascript">
		$("#contoh").dataTable({
			// 'bProcessing': true,
			// 'bServerSide': true,
			// //disable order dan searching pada tombol aksi
			// "columnDefs": [{
			// 	"targets": [3],
			// 	"orderable": false,
			// 	"searchable": false

			// }],
			// "ajax": {
			// 	url: "data.php",
			// 	type: "post", // method  , by default get
			// 	//bisa kirim data ke server
			// 	/*data: function ( d ) {

			// 	          d.jurusan = "3223";
			// 	      },*/
			// 	error: function(xhr, error, thrown) {
			// 		console.log(xhr);

			// 	}
			// },

		});
	</script>
</body>

</html>