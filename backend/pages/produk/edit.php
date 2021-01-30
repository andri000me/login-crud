<?php
// session start
if (!empty($_SESSION)) {
} else {
	session_start();
}
$idGet = strip_tags($_GET['id']);
$hasil = $proses->tampil_data_id('produk', 'id', $idGet);
$qkat1 = $proses->tampil_data('kategori', 'idkat');
?>
<?php if (!empty($_SESSION['ADMIN'])) { ?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<!-- /.card -->

				<div class="card">
					<div class="card-header">
						<h3 class="card-title">DataTable with default features</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<form action="<?= $abs; ?>/backend/produk/crud.php?aksi=edit" method="POST">
							<div class="form-group">
								<label>Kategori</label>
								<select name="idkat" class="form-control">
									<?php
									foreach ($qkat1 as $qkat1) { ?>
										<option <?php if ($hasil['idkat'] == $qkat1['idkat']) echo 'selected'; ?> value="<?= $qkat1['idkat']; ?>">
											<?= $qkat1['nama']; ?>
										</option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label>Nama </label>
								<input type="text" value="<?php echo $hasil['nama_pro']; ?>" class="form-control" name="nama_pro">
								<input type="hidden" value="<?php echo $hasil['id']; ?>" class="form-control" name="id">
							</div>
							<div class="form-group">
								<label>Keterangan</label>
								<textarea name="ket" class="form-control"><?php echo $hasil['ket']; ?></textarea>
							</div>
							<div class="form-group">
								<label>Gambar</label>
								<input type="harga" value="<?php echo $hasil['acak1']; ?>" class="form-control" name="acak1">
							</div>
							<button class="btn btn-primary btn-md" name="create"><i class="fa fa-edit"> </i> Edit Data</button>
						</form>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!-- /.col -->
		</div>
	</div>
<?php } else { ?>
	<br />
	<div class="alert alert-info">
		<h3>Your session has been expired</h3>
		<hr />
		<p><a href="<?= $abs; ?>/backend/login.php">Please login here</a></p>
	</div>
<?php } ?>