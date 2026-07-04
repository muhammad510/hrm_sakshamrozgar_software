<style>#target{ display:none;}</style>
    </head>
    <body class="ltr main-body leftmenu error-1">  
      <div class="ami_toast tst_warning" style="top:8px;left: 32%;"><i class="bx bx-error"></i> ami popup notification</div>
	    <!-- LOADEAR -->
		<div id="global-loader">
			<img src="<?php echo base_url('assets/img/loader.svg');?>" class="loader-img" alt="Loader">
		</div>
        <!-- END PAGE -->
        <div class="page main-signin-wrapper">
        	<!-- Row -->
			
			<?php //print_r($keyFile);?>
				<div class="row signpages text-center">
					<div class="col-md-12">
						<div class="card">
							<div class="row row-sm">
								<div class="col-lg-6 col-xl-5 d-none d-lg-block bg-primary details">
									<div class="mt-4 pt-4 ps-3 ms-3 pe-3 pos-absolute">
										<img src="<?php echo base_url('assets/img/brand/logo-light.png');?>" class="header-brand-img mb-4" alt="logo">
										<div class="clearfix"></div>
										<img src="<?php echo base_url('assets/img/user.svg');?>" class="ht-100 mb-0" alt="user">
										<h5 class="mt-4 text-white">Unlock</h5>
										<span class="tx-white-6 tx-13 mb-5 mt-xl-0">Enter your license key to access the software.</span>
									</div>
								</div>
								<div class="col-lg-6 col-xl-7 col-xs-12 col-sm-12 login_form ">
									<div class="main-container container-fluid">
										<div class="row row-sm">
											<div class="card-body main-profile-overview mt-3 mb-3">
				<img src="<?php echo base_url('assets/img/brand/logo-light.png');?>" class="d-lg-none header-brand-img text-start float-start mb-4 error-logo-light" alt="logo">
				<img src="<?php echo base_url('assets/img/brand/logo.png');?>" class=" d-lg-none header-brand-img text-start float-start mb-4 error-logo" alt="logo">
												<div class="clearfix"></div>
												<h5 class="text-start mb-2">Lockscreen</h5>
												<p class="mb-4 text-muted tx-13 ms-0 text-start">Unlock your screen by entering password</p>
												  <div id="target"><?php echo base_url('install/start/isCheckKey');?></div>
													<div class="text-start d-flex float-start mb-4 user-lock">
														<img alt="avatar avatar-sm" class="rounded-circle mb-0" src="<?php echo base_url('assets/img/unlock.png');?>">
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
