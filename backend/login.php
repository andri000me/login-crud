<?php
// session start();
if (!empty($_SESSION)) {
} else {
	session_start();
}
?>
<?php include "../api/panggil.php"; ?>
<!doctype html>
<html>

<head>
	<title>Morillo Room</title>
	<?php include "layouts/head.php"; ?>
	<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css"> -->
	<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
	<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div id="logout">
			<?php if (isset($_GET['signout'])) { ?>
				<div class="alert alert-success">
					<small>You've been logged out!</small>
				</div>
			<?php } ?>
		</div>
		<div id="notifikasi">
			<div class="alert alert-danger">
				<small>Login Anda Gagal, Periksa Kembali Username dan Password</small>
			</div>
		</div>

		<div class="login-logo">
			<a href="#"><b>Morillo</b>Room</a>
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Sign in to start your session</p>
				<form method="post" action="<?= $abs; ?>/backend/proses/crud.php?aksi=login" id="formlogin">
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="Email" name="user">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" placeholder="Password" name="pass">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-8">
						</div>
						<!-- /.col -->
						<div class="col-4">
							<button type="submit" class="btn btn-primary btn-block">Sign In</button>
						</div>
						<!-- /.col -->
					</div>
				</form>
				<!-- /.social-auth-links -->
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
</body>

</html>