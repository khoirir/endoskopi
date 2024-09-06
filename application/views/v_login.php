<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Endoskopi - RSUKH</title>

	<!-- Global stylesheets -->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>template/assets/images/logorskh2.png">
	<link href="<?php echo base_url(); ?>template/assets/css/font.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>template/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>template/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>template/assets/css/core.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>template/assets/css/components.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>template/assets/css/colors.min.css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->


	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/core/app.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/plugins/forms/validation/validate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/pages/login_validation.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/plugins/ui/ripple.min.js"></script>
	<!-- /theme JS files -->

</head>

<body class="login-container">

	<!-- Main navbar -->
	<div class="navbar navbar-default">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?php echo base_url('login'); ?>"><img src="" alt=""></a>

			<!-- <ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul> -->
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Simple login form -->
					<form action="<?php echo base_url('login/cekLogin'); ?>" method="POST" class="form-validate">
						<div class="panel panel-body login-form">
							<div class="text-center">
								<!-- <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div> -->
								<img style="width: 40%;height: auto;" src="<?php echo base_url(); ?>template/assets/images/logorskh2.png">
								<h5 class="content-group">USER LOGIN<small class="display-block">
										<font color="red">
											<?php
											if ($this->session->userdata("sess_endoskopi_salah")) {
												echo $pesan_salah;
											}
											?></font>
									</small>
								</h5>
							</div>
							<div class="form-group has-feedback has-feedback-left">
								<input type="text" class="form-control" placeholder="Username" name="username" required="required">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" class="form-control" placeholder="Password" name="password" required="required">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>
							<br>
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">LOGIN <i class="icon-circle-right2 position-right"></i></button>
							</div>

						</div>
					</form>
					<!-- /simple login form -->


					<!-- Footer -->
					<div class="footer text-muted text-center">
						&copy; <?php echo date('Y'); ?>. <a href="https://rsukarsahusadabatu.jatimprov.go.id/" target="_blank">RSU KARSA HUSADA BATU</a> - <a href="https://rsukarsahusadabatu.jatimprov.go.id/teknologi-dan-komunikasi/" target="_blank">SIRS</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>

</html>