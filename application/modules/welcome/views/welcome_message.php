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
			<img src="<?php echo LOGO; ?>" alt="" width="200px"> <br>
			<!-- <a href="javascript:;"><?php echo SITE_NAME; ?></a> -->
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Portal Masuk | <?php echo SITE_NAME; ?></p>

				<?php if ($this->session->flashdata('gagal')): ?>
                <div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h5><i class="icon fas fa-ban"></i> Opss!</h5>
					<?php echo $this->session->flashdata('gagal'); ?>
                </div>
				<?php endif; ?>
				
				<form method="post" action="<?php echo base_url('welcome/login') ?>">
					<div class="input-group mb-3">
						<input type="text" class="form-control" id="user" name="user" placeholder="Username">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" name="password" placeholder="Password">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
						</div>
					</div>
				</form>
				<!-- <h4>MAAF APLIKASI SEDANG MAINTENANCE</h4> -->
				<div class="social-auth-links text-center mb-3">
					<p>- OR -</p>
				</div>
				<p class="mb-0">
					<a href="http://corona.jepara.go.id/" target="_blank" class="text-center btn btn-success btn-block btn-flat">Lihat Rekap</a>
				</p>
			</div>
			<!-- /.login-card-body -->
			<div class="card-footer text-center">
				<a href="http://lapor-covid19.mi-kes.net"><?php echo COPY; ?></a>
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
        $(document).ready(function(){
            $( "#user" ).autocomplete({
              source: "<?php echo site_url('welcome/get_autocomplete/?');?>"
            });
        });
    </script>

</body>
</html>