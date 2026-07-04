<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
        <meta name="description" content="<?php echo config_item('company_name') ?>">
        <meta name="author" content="<?php echo config_item('company_name') ?>">
        <meta name="keywords" content="<?php echo config_item('company_name') ?>">
        
        <!-- TITLE -->
        <title> <?php echo $title ?> | <?php echo config_item('company_name') ?>  </title>

        <!-- FAVICON -->
        <link rel="icon" href="<?php echo base_url('assets/img/fbicon.ico');?>">

        
		<!-- BOOTSTRAP CSS -->
		<link  id="style" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
<style>
#target{ display:none;}


</style>
		<!-- ICONS CSS -->
		<link href="<?php echo base_url('assets/plugins/web-fonts/icons.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/plugins/web-fonts/font-awesome/font-awesome.min.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/plugins/web-fonts/plugin.css');?>" rel="stylesheet">
		<!-- STYLE CSS -->
		<link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/plugins.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/common.min.css');?>" rel="stylesheet">
    </head>

    <body class="ltr main-body leftmenu error-1">
        <div class="ami_toast tst_warning" style="top:8px;left:32%;"><i class="bx bx-error"></i> ami popup notification</div>
        <!-- LOADEAR -->
		<div id="global-loader">
			<img src="<?php echo base_url('assets/img/loader.svg');?>" class="loader-img" alt="Loader">
		</div>
		<!-- END LOADEAR -->
	
        <!-- END PAGE -->
        <div class="page main-signin-wrapper">
        	<!-- Row -->
			<div class="row signpages text-center">
				<div class="col-md-12">
					<div class="card">
						<div class="row row-sm">
							<div class="col-lg-6 col-xl-5 d-none d-lg-block text-center bg-primary details">
								<div class="mt-5 p-2 pos-absolute">
									<img src="<?php echo base_url('assets/img/brand/logo-light.png');?>" class="header-brand-img mb-4" alt="logo">
									<div class="clearfix"></div>
									<img src="<?php echo base_url('assets/img/user.svg');?>" class="ht-100 mb-0" alt="user">
									<h5 class="mt-4 text-white" id="actnAmiMark"><?php echo $title;?></h5>
									<span class="tx-white-6 tx-13 mb-5 mt-xl-0" style="text-align:left;">What is important is no longer either signature or a number, but a code: the code is passowrd.</span>
								</div>
							</div>
							<div class="col-lg-6 col-xl-7 col-xs-12 col-sm-12 login_form">
								<div class="main-container container-fluid">
									<div class="row row-sm">
										<div class="card-body mt-2 mb-2">
											<img src="<?php echo base_url('assets/img/brand/logo-light.png');?>" class="d-lg-none header-brand-img text-start float-start mb-4 error-logo-light" alt="logo">
											<img src="<?php echo base_url('assets/img/brand/logo.png');?>" class=" d-lg-none header-brand-img text-start float-start mb-4 error-logo" alt="logo">
											<div class="clearfix"></div>
											<form>
												<h5 class="text-start mb-2"><?php echo $title;?></h5>
												<p class="mb-4 text-muted tx-13 ms-0 text-start" style="text-align:left;">
														Mark your calendars and remember to change all your passwords every year to protect your files and all your personal data.
												</p>
												<div class="form-group text-start">
													<label>Password</label>
													<input class="form-control" id="password" placeholder="Enter your password" type="password">
												</div>
												<div class="form-group text-start">
													<label>Confirm Password</label>
													<input class="form-control" id="cnfPassword" placeholder="Enter your confirm password" type="password">
												</div>
												<div id="target"><?php echo $target;?></div>
												
												<a href="<?php echo base_url();?>" class="btn ripple btn-outline-secondary" style="float:left;">
													<i class="si si-lock-open"></i> Sign in
												</a>
												<button type="button" id="createPass" class="btn ripple btn-outline-secondary btnActn pull-right">
													<i class="si si-note"></i> Reset Password
												</button>
											</form>
											
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
		<!-- SCRIPTS -->
		<!-- JQUERY JS -->
		<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js');?>"></script>
		<!-- BOOTSTRAP JS -->
		<script src="<?php echo base_url('assets/plugins/bootstrap/js/popper.min.js');?>"></script>
		<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js');?>"></script>
		 <!-- COLOR THEME JS -->
		<script src="<?php echo base_url('assets/js/themeColors.js');?>"></script>
        <!-- CUSTOM JS -->
        <script src="<?php echo base_url('assets/js/custom.js');?>"></script>
		<script src="<?php echo base_url('assets/js/software.min.js');?>"></script>
    </body>
</html>
