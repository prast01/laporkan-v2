<!DOCTYPE html>
<html lang="en">

	<head>
		<?php $this->load->view('template/_partial/head.php'); ?>
	</head>

	<body class="hold-transition layout-top-nav">
		<div class="wrapper">

			<?php $this->load->view('template/_partial/navbar.php'); ?>

			<?php //$this->load->view('template/_partial/sidebar.php'); ?>

			<?php echo $content; ?>

			<?php $this->load->view('template/_partial/footer.php'); ?>

		</div>
	<!-- ./wrapper -->

		<?php $this->load->view('template/_partial/js.php'); ?>
	</body>
</html>