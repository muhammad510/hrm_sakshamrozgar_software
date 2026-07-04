<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<meta name="description" content="<?php echo system_info('company_name') ?>">
	<meta name="author" content="<?php echo system_info('company_name') ?>">
	<meta name="keywords" content="<?php echo system_info('company_name') ?>">

	<!-- TITLE -->
	<title> <?php echo $title ?> | <?php echo system_info('company_name') ?> </title>

	<!-- FAVICON -->
	<link rel="icon" href="<?php echo base_url(system_info('favicon')); ?>">


	<!-- BOOTSTRAP CSS -->
	<link id="style" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<style>
		#target,
		#targetReset {
			display: none;
		}

		.visiblePass {
			float: right;
			color: #b3b2b2;
			margin-top: -30px;
			margin-right: 10px;
			z-index: 5;
			position: relative;
			cursor: pointer;
		}
	</style>
	<!-- ICONS CSS -->
	<link href="<?php echo base_url('assets/plugins/web-fonts/icons.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/plugins/web-fonts/font-awesome/font-awesome.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/plugins/web-fonts/plugin.css'); ?>" rel="stylesheet">
	<!-- STYLE CSS -->
	<link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/plugins.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/common.min.css'); ?>" rel="stylesheet">
</head>

<body class="ltr main-body leftmenu error-1">
	<div class="ami_toast tst_warning" style="top:8px;left:32%;"><i class="bx bx-error"></i> ami popup notification</div>
	<!-- LOADEAR -->
	<div id="global-loader">
		<img src="<?php echo base_url('assets/img/loader.svg'); ?>" class="loader-img" alt="Loader">
	</div>
	<!-- END LOADEAR -->
	<?php
	if (config_item('is_valid')) {
	?>
		<!-- END PAGE -->
		<div class="page main-signin-wrapper">
			<!-- Row -->
			<div class="row signpages text-center">
				<div class="col-md-12">
					<div class="card">
						<div class="row row-sm">
							<div class="col-lg-6 col-xl-5 d-none d-lg-block text-center bg-primary details">
								<div class="mt-5 p-2 pos-absolute">
									<img src="<?php echo base_url(system_info('logo')); ?>" class="header-brand-img mb-4" alt="logo">
									<div class="clearfix"></div>
									<img src="<?php echo base_url('assets/img/user.svg'); ?>" class="ht-100 mb-0" alt="user">
									<h5 class="mt-4 text-white" id="actnAmiMark">Sign In Your Account</h5>
									<span class="tx-white-6 tx-13 mb-5 mt-xl-0">Discipline is the bridge between goals and accomplishment.</span>
								</div>
							</div>
							<div class="col-lg-6 col-xl-7 col-xs-12 col-sm-12 login_form">
								<div class="main-container container-fluid" id="login_panel">
									<div class="row row-sm">
										<div class="card-body mt-2 mb-2">
											<img src="<?php echo base_url(system_info('logo')); ?>" class="d-lg-none header-brand-img text-start float-start mb-4 error-logo-light" alt="logo">
											<img src="<?php echo base_url(system_info('logo')); ?>" class=" d-lg-none header-brand-img text-start float-start mb-4 error-logo" alt="logo">
											<div class="clearfix"></div>
											<form>
												<h5 class="text-start mb-2">Signin to Your Account</h5>
												<p class="mb-4 text-muted tx-13 ms-0 text-start">Don't forget to turn it off. Otherwise It also leaks data risk of being stolen.</p>
												<div class="form-group text-start">
													<label>Email</label>
													<input class="form-control" id="emailID" placeholder="Enter your email" type="text">
												</div>
												<div class="form-group text-start">
													<label>Password</label>
													<input class="form-control" id="usrPass" placeholder="Enter your password" type="password">
													<div class="visiblePass"> <i aria-hidden="true" class="fa fa-eye"></i></div>
												</div>
												<div id="target"><?php echo $target; ?></div>
												<button type="button" id="authenticate" class="btn btn-main-primary btn-block text-white btnActn">
													<i class="si si-login"></i> Sign In
												</button>
											</form>
											<div class="text-start mt-5 ms-0">
												<div class="mb-1"><a href="javascript:void(0);" class="btnActn" id="forgot_pass">Forgot password?</a></div>
											</div>
										</div>
									</div>
								</div>
								<div class="main-container container-fluid" id="reset_password" style="display:none;">
									<div class="row row-sm">
										<div class="card-body mt-2 mb-2">
											<img src="<?php echo base_url(system_info('logo')); ?>" class="d-lg-none header-brand-img text-start float-start mb-4 error-logo-light" alt="logo">
											<img src="<?php echo base_url(system_info('logo')); ?>" class=" d-lg-none header-brand-img text-start float-start mb-4 error-logo" alt="logo">
											<div class="clearfix"></div>
											<form>
												<h5 class="text-start mb-2">Reset Your Password</h5>
												<p class="mb-4 text-muted tx-13 ms-0 text-start">Resetting your password is easy. Just press the button below and follow the instructions. Well have you up and running in no time.</p>
												<div class="form-group text-start">
													<label>Email</label>
													<input class="form-control" id="register_email" placeholder="Enter your email" type="text">
												</div>
												<!--<div class="form-group text-start">
													<label>Password</label>
													<input class="form-control" id="usrPass" placeholder="Enter your password" type="password">
												</div>-->
												<div id="targetReset"><?php echo $targetReset; ?></div>
												<button type="button" id="resetYrPs" class="btn btn-main-primary btn-block text-white btnActn">Request reset link</button>
											</form>
											<div class="text-start mt-5 ms-0">
												<div class="mb-1"><a href="javascript:void(0);" class="btnActn" id="signIn">Sign In</a></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Row -->


		</div>
		<!-- END PAGE -->
	<?php } else { ?>
		<!-- END PAGE -->
		<div class="page main-signin-wrapper">
			<!-- Row -->

			<?php //print_r($keyFile);
			?>
			<div class="row signpages text-center">
				<div class="col-md-12">
					<div class="card">
						<div class="row row-sm">
							<div class="col-lg-6 col-xl-5 d-none d-lg-block bg-primary details">
								<div class="mt-4 pt-4 ps-3 ms-3 pe-3 pos-absolute">
									<img src="<?php echo base_url(system_info('logo')); ?>" class="header-brand-img mb-4" alt="logo">
									<div class="clearfix"></div>
									<img src="<?php echo base_url('assets/img/user.svg'); ?>" class="ht-100 mb-0" alt="user">
									<h5 class="mt-4 text-white">Unlock</h5>
									<span class="tx-white-6 tx-13 mb-5 mt-xl-0">Enter your license key to access the software.</span>
								</div>
							</div>
							<div class="col-lg-6 col-xl-7 col-xs-12 col-sm-12 login_form ">
								<div class="main-container container-fluid">
									<div class="row row-sm">
										<div class="card-body main-profile-overview mt-3 mb-3">
											<img src="<?php echo base_url(system_info('logo')); ?>" class="d-lg-none header-brand-img text-start float-start mb-4 error-logo-light" alt="logo">
											<img src="<?php echo base_url(system_info('logo')); ?>" class=" d-lg-none header-brand-img text-start float-start mb-4 error-logo" alt="logo">
											<div class="clearfix"></div>
											<h5 class="text-start mb-2">Lockscreen</h5>
											<p class="mb-4 text-muted tx-13 ms-0 text-start">Unlock your screen by entering password</p>
											<div id="target"><?php echo base_url('install/start/isCheckKey'); ?></div>
											<div class="text-start d-flex float-start mb-4 user-lock">
												<img alt="avatar avatar-sm" class="rounded-circle mb-0" src="<?php echo base_url('assets/img/unlock.png'); ?>">
												<div class="my-auto">
													<p class="font-weight-semibold my-auto ms-2 text-uppercase ">Unlock Software</p>
												</div>
											</div>
											<div class="form-group">
												<input class="form-control" id="liKey" placeholder="Enter your license key" type="text">
											</div>
											<div class="text-start">
												<label class="">
													<span class="form-switch-indicator">Key Format : </span>
													<span class="form-switch-description">XXXX-XXXX-XXXX-XXXX-XXXX</span>
												</label>
											</div>
											<button type="button" class="btn btn-main-primary btn-block text-white btnActn" id="unlock_period">Unlock</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Row -->
		</div>
		<!-- END PAGE -->


	<?php } ?>
	<!-- SCRIPTS -->
	<!-- JQUERY JS -->
	<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
	<!-- BOOTSTRAP JS -->
	<script src="<?php echo base_url('assets/plugins/bootstrap/js/popper.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
	<!-- COLOR THEME JS -->
	<script src="<?php echo base_url('assets/js/themeColors.js'); ?>"></script>
	<!-- CUSTOM JS -->
	<script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/software.min.js'); ?>"></script>
	<script>
		$(document).ready(function() {
			$(".visiblePass").click(function() {
				$("i", this).toggleClass("fa-eye-slash fa-eye");
				let typ = $('#usrPass').attr('type');
				if (typ == 'password') {
					$('#usrPass').attr('type', 'text');
				} else {
					$('#usrPass').attr('type', 'password');
				}
			});
		});
	</script>


</body>

</html>