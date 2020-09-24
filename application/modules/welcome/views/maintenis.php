<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>
		<?php
		echo strtoupper(SITE_NAME);
		?>
	</title>
	<link rel="shortcut icon" href="<?php echo LOGO2; ?>" type="image/x-icon">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url('plugins/fontawesome-free/css/all.min.css'); ?>">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url('plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url('dist/css/adminlte.min.css'); ?>">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- jQuery-UI -->
	<link rel="stylesheet" href="<?php echo base_url('plugins/jquery-ui/jquery-ui.css'); ?>">

	<style>
		/* .login-page, .register-page {
			background: url("dist/logo/back2.jpg") no-repeat center fixed;
			background-size: cover;
		} */
	</style>
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<img src="<?php echo LOGO; ?>" alt="" width="100px"> <br>
			<!-- <a href="javascript:;"><?php echo SITE_NAME; ?></a> -->

			<div class="error-content mt-5">
				<p><i class="fas fa-exclamation-triangle text-danger"></i> Error 502</p>
				<h4>Oops! Aplikasi Sedang Maintenance</h4>

				<p>Dinas Kesehatan Kabupaten Jepara</p>
			</div>
		</div>
	</div>
	<!-- /.login-box -->
	<!-- jQuery -->
	<script src="<?php echo base_url('plugins/jquery/jquery.min.js'); ?>"></script>
	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
	<!-- jQuery-UI -->
	<script src="<?php echo base_url('plugins/jquery-ui/jquery-ui.js'); ?>"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url('dist/js/adminlte.min.js'); ?>"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$("#user").autocomplete({
				source: "<?php echo site_url('welcome/get_autocomplete/?'); ?>"
			});
		});
	</script>

</body>

</html>