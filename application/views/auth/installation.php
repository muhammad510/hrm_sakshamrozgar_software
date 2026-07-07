<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<meta name="description" content="<?php echo system_info('company_name') ?>">
	<meta name="author" content="<?php echo system_info('company_name') ?>">
	<meta name="keywords" content="<?php echo system_info('company_name') ?>">
	<!-- TITLE -->
	<title> <?php echo $title ?> | <?php echo system_info('company_name') ?> </title>
	<!-- FAVICON -->
	<link rel="icon" href="<?php echo base_url();?>assets/img/fbicon.ico">
	<!-- BOOTSTRAP CSS -->
	<link  id="style" href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- ICONS CSS -->
	<link href="<?php echo base_url();?>assets/plugins/web-fonts/icons.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/plugins/web-fonts/font-awesome/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/plugins/web-fonts/plugin.css" rel="stylesheet">
	<!-- STYLE CSS -->
	<link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/plugins.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/common.min.css');?>" rel="stylesheet"> 
  
  
  
  
    <?php 
		if(config_item('is_valid'))
		{
	?>	       

		<!-- SWITCHER CSS -->
		<!--<link href="<?php //echo base_url();?>assets/switcher/css/switcher.css" rel="stylesheet">
		<link href="<?php //echo base_url();?>assets/switcher/demo.css" rel="stylesheet">-->
        
<style>
.icn i{ background-color: #d5d5d5;padding: 10px; border-radius: 15px;margin-right: 10px;}
.mi{ list-style:none;}
.mi li:first-child{ padding: 20px 0px 20px 15px;border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom: 1px solid #e1e1e1;font-weight: 600; color:#222877;}

.mi li:first-child i{padding: 10px;
  background-color: #222877; color:#fff;
  border-radius: 10px;}

.mi li{padding: 15px 0px 15px 18px;background-color: #fff; border-bottom: 1px solid #f0e9e9;font-weight: 600; color: #6c6c6c;}
.mi li i{ padding: 8px; background-color: #6c6c6c; color: #fff; margin-right: 5px;border-radius: 15px;}
.mi li:last-child{ border-bottom:0px;}
.cNm{font-size: 1.5rem; font-weight:600}
.sfNm{font-weight:600; padding:10px 0px 0px 5px}
.arActive{ background-color: #222877 !important;color: #f9f9f9 !important;}
.arActive i{ background-color: #fff !important; color: #222877 !important; }
.miRequir{ padding:0px 0px 10px 0px; background-color:#fff;border-top-left-radius: 15px;border-top-right-radius: 15px; margin-bottom:20px;}
.miRequir ul{ list-style:none;margin-left: -30px;}
.miRequir li{ padding:10px;/* border-bottom: 1px dashed #222877;*/font-size: 1rem;font-weight: bold;color: #222877;}
.miRequir li:first-child{ text-transform: uppercase;padding: 22px 10px 15px 15px;background-color: #222877;color: #fff;border-top-left-radius: 15px;border-top-right-radius: 15px;}
.miRequir li:last-child{ border-bottom:0px;padding: 0px 30px 40px 0px; }
.miRequir td{font-weight:normal;}
.miRequir table > tbody > tr>td:first-child{ text-transform:capitalize !important;}
.miRequir table > tbody > tr:last-child{ border-bottom:0px solid #fff !important;}
.miRequir table { margin-left:10px; margin-right:10px;}
.lbl{padding: 4px 8px 4px 8px !important;}.label-success {background: transparent;border: 1px solid #259b24;color: #259b24;padding: 4px 5px 4px 5px;font-size: 12px;}
.mi-right{ float:right;}#crtDb,#crtSprUsr,#amiFinish{ display:none;}.mifrm{margin: 20px 5px 20px 5px;}.mifrm label{ font-size: 15px;font-weight: normal; }.errCls{float:right;color:#d90000;margin-top:-60px;font-size:12px;font-weight:normal;}.miInstall i{ padding: 0px 9px 0px 9px;}.scsMsg{border: 1px solid #f0f0f0;padding: 15px;}.scsMsg span{font-weight: 400;}







</style>
    </head>
    <body class="ltr main-body leftmenu">
        <!-- LOADEAR -->
		<div id="global-loader">
			<img src="<?php echo base_url('assets/img/loader.svg');?>" class="loader-img" alt="Loader">
		</div>
		<!-- END LOADEAR -->
        <!-- PAGE -->
	
	    <div class="page">
          <!-- HEADER -->
                    
			<div class="main-header side-header sticky">
				<div class="main-container container-fluid">
					<div class="main-header-left">
						<a class="main-header-menu-icon" href="javascript:void(0);" id="mainSidebarToggle"><span></span></a>
						<div class="hor-logo">
							<a class="main-logo" href="index.html">
								<img src="<?php echo base_url(system_info('logo'));?>" class="header-brand-img desktop-logo" alt="logo">
								<img src="<?php echo base_url(system_info('logo'));?>" class="header-brand-img desktop-logo-dark"
									alt="logo">
							</a>
						</div>
					</div>
					<div class="main-header-center" style="text-align:left">
						<div class="responsive-logo">
							<a href="index.html"><img src="<?php echo base_url(system_info('logo'));?>" class="mobile-logo" alt="logo"></a>
							<a href="index.html"><img src="<?php echo base_url(system_info('logo'));?>" class="mobile-logo-dark"
									alt="logo"></a>
						</div>
						<div class="input-group">
							<span class="cNm"><?php echo system_info('company_name');?></span> <span class="sfNm"> :  <?php echo config_item('software');?> - Installer</span>
						</div>
					</div>
					
				</div>
			</div>
            <!-- END HEADER -->
			
			
			<div class="ami_toast tst_warning"><i class="bx bx-error"></i> ami popup notification</div>
			<!-- MAIN-CONTENT -->
            <div class="main-content side-content pt-0">
                <div class="main-container container-fluid">
                    <div class="inner-body">
						<!-- Page Header -->
						<div class="page-header">
							<div>&nbsp;</div>							
						</div>
						<!-- End Page Header -->
						<!-- Row -->
						<div class="row row-sm">
							<div class="col-sm-12 col-md-5 col-xl-4">
							
									<ul class="mi">
									   <li><i class="ti-write"></i> INSTALLATION PROCESS</li>
									   <li class="arActive"><i class="ti-notepad"></i>System Requirements</li>
									   <li id="dbs"><i class="ti-server"></i> Database</li>
									   <li id="instl"><i class="ti-import"></i> Install</li>
									   <li id="fnsh"><i class="ti-thumb-up"></i> Finish</li>
									</ul>							
<?php
$error = false;
if (phpversion() < "5.6") {$error = true;$requirement1 = "<span class='label label-warning'>Your PHP version is " . phpversion() . "</span>";} 
else{$requirement1 = "<span class='label label-success lbl'>v." . phpversion() . "</span>";}
if (!extension_loaded('mysqli')) {$error = true;$requirement3 = "<span class='label label-danger'>Not enabled</span>";} 
else{$requirement3 = "<span class='label label-success'>Enabled</span>";}
if (!extension_loaded('gd')){$error = true;$requirement6 = "<span class='label label-danger'>Not enabled</span>";} 
else{$requirement6 = "<span class='label label-success'>Enabled</span>";}
if (!extension_loaded('curl')) {$error = true;$requirement8 = "<span class='label label-warning'>Not enabled</span>";} 
else{$requirement8 = "<span class='label label-success'>Enabled</span>";}
if (!extension_loaded('mbstring')) {$error = true;$requirement5 = "<span class='label label-danger'>Not enabled</span>";}
else{$requirement5 = "<span class='label label-success'>Enabled</span>";}
if (!extension_loaded('curl')) {$error = true;$requirement8 = "<span class='label label-warning'>Not enabled</span>";}
else{$requirement8 = "<span class='label label-success'>Enabled</span>";}
if (!extension_loaded('mbstring')) {$error = true;$requirement5 = "<span class='label label-danger'>Not enabled</span>";}
else{$requirement5 = "<span class='label label-success'>Enabled</span>";}
if (ini_get('allow_url_fopen') != "1") {$error = true;$requirement9 = "<span class='label label-danger'>Allow_url_fopen is not enabled!</span>";} 
else {$requirement9 = "<span class='label label-success'>Enabled</span>";}
if (!extension_loaded('zip')) {$error = true;$requirement12 = "<span class='label label-danger'>Zip Extension is not enabled</span>";} 
else {$requirement12 = "<span class='label label-success'>Enabled</span>";}
if (!is_really_writable($config_path)){$error=true;$requirement13="<span class='label label-danger'>No (Make application/config/config.php writable) - Permissions 755</span>";}
else {$requirement13 = "<span class='label label-success'>Ok</span>";}
if (!is_really_writable(APPPATH . 'config/database.php')) 
{$error = true;$requirement14 = "<span class='label label-danger'>No (Make application/config/database.php writable) - Permissions - 755</span>";} 
else{$requirement14 = "<span class='label label-success'>Ok</span>";}
if (!is_really_writable(FCPATH . 'temp')){$error = true;$requirement15 = "<span class='label label-danger'>No (Make temp folder writable) - Permissions 755</span>";}
else{$requirement15 = "<span class='label label-success'>Ok</span>";}

?>	
							</div>
							<div class="col-sm-12 col-md-7 col-xl-8">
								<div class="miRequir">
									<ul>
										<li><i class="ti-write"></i> Server Requirements</li>
										<li>
										<?php if($error==true){echo '<div class="text-center alert alert-danger">Please fix the requirements to begin Smart School Installation.</div>';}?>
											<table class="table table-hover" id="dbInfor">
												<thead>
													<tr>
														<th><b>Requirements</b></th><th><b>Result</b></th>
													</tr>
												</thead>
												<tbody>
													<tr><td>PHP 5.6+ </td><td><?php echo $requirement1;?></td></tr>
													<tr><td>MySQLi PHP Extension</td><td><?php echo $requirement3;?></td></tr>
													<tr><td>GD PHP Extension</td><td><?php echo $requirement6;?></td></tr>
													<tr><td>CURL PHP Extension</td><td><?php echo $requirement8; ?></td></tr>
													<tr><td>MBString PHP Extension</td><td><?php echo $requirement5; ?></td></tr>
													<tr><td>Allow allow_url_fopen</td><td><?php echo $requirement9; ?></td></tr>
													<tr><td>Zip Extension</td><td><?php echo $requirement12; ?></td></tr>
													<tr><td>config.php Writable</td><td><?php echo $requirement13; ?></td></tr>
													<tr><td>database.php Writable</td><td><?php echo $requirement14; ?></td></tr>
													<tr><td>/temp folder Writable</td><td><?php echo $requirement15; ?></td></tr>
												</tbody>
											</table>
											<div class="" id="crtDb">
											    <div class="row mifrm">
											    	<div class="col-lg-12 alert alert-secondary">Create Database Details</div>
													<div class="col-lg-12 form-group">
														<label class="form-label">MYSQL Hostname : <span class="tx-danger">*</span></label>
														<input class="form-control" id="mysqlHost" placeholder="Enter Hostname" type="text">
														<span id="eRmysqlHost" class="errCls">&nbsp;</span>
													</div>
													<div class="col-lg-12 form-group">
														<label class="form-label">Database Name : <span class="tx-danger">*</span></label>
														<input class="form-control" id="databaseName" placeholder="Enter Database Name" type="text" >
														<span id="eRdatabaseName" class="errCls">&nbsp;</span>
													</div>
													<div class="col-lg-12 form-group">
														<label class="form-label">Database Username : <span class="tx-danger">*</span></label>
														<input class="form-control" id="databaseUser" placeholder="Enter Database Username" type="text" >
														<span id="eRdatabaseUser" class="errCls">&nbsp;</span>
													</div>
													<div class="col-lg-12 form-group">
														<label class="form-label">Database Password : <span class="tx-danger">*</span></label>
														<input class="form-control" id="databasePass" placeholder="Enter Database Password" type="password" >
														<span id="eRdatabasePass" class="errCls">&nbsp;</span>
													</div>
												</div>
										    </div>	
										
											<div class="" id="crtSprUsr">
											   <div class="row mifrm">
													<div class="col-lg-12 form-group alert alert-secondary miInstall"><i class="ti-import"></i> Create Administrator Details</div>
													<div class="col-lg-12 form-group">
														<label class="form-label">Email Address : <span class="tx-danger">*</span></label>
														<input class="form-control admn" id="adminUsr" placeholder="Enter email address" type="text">
														<span id="eRadminUsr" class="errCls">&nbsp;</span>
													</div>
													<div class="col-lg-12 form-group">
														<label class="form-label"> Password : <span class="tx-danger">*</span></label>
														<input class="form-control admn" id="pass" placeholder="Enter password" type="password" >
														<span id="eRpass" class="errCls">&nbsp;</span>
													</div>
													<div class="col-lg-12 form-group">
														<label class="form-label">Confirm Password : <span class="tx-danger">*</span></label>
														<input class="form-control admn" id="cnfPass" placeholder="Enter confirm password" type="password" >
														<span id="eRcnfPass" class="errCls">&nbsp;</span>
													</div>
												</div>
										</div>
											<div id="amiFinish">
											   <div class="row mifrm">
											       <!--<div id="resultMsg"></div>-->
													
													<div class="col-lg-12">
														<div class="scsMsg">
														<p><span>Thank you for subscribing!</span></p>
														<p><span>Congratulations on becoming a valued member of our community.</span></p>
														<p><span style="text-align:justify;">
														We want to thank you for deciding to sign up for our subscription service, and we are pleased to welcome you. Stay tuned for special offers, early access to new software and services, and exciting promotions that we have in store just for you. </span></p>
														<p><span>
														We are excited to embark on this journey together!
														</span></p>
														<p><span>
														Best Regards,</span></p>
														<h3><?php echo system_info('company_name') ?></h3>
													</div>
													</div>
													
												</div>
										</div>
											<input type="hidden" id="setpProcess" value="1"><input type="hidden" id="base_url" value="<?php echo base_url('install/start');?>">
										</li>
										<li>
											<?php if($error!=true){?>	
											<button class="btn ripple btn-secondary mi-right btnActn" id="createStp"><i class="ti-pencil-alt"></i> Create Setup </button>
											<?php }?>	
												</li>
									</ul>
								
								</div>
							</div>
						</div>
						<!-- End Row -->


                    </div>
                </div>
            </div>
            <!-- END MAIN-CONTENT -->

            

            <!-- FOOTER -->
            
            <div class="main-footer text-center">
				<div class="container">
					<div class="row row-sm">
						<div class="col-md-12">
							<span>Copyright © 2023 <a href="#"><?php echo system_info('company_name') ?> </a>. Designed by 
							<a href="https://camwel.com/"><?php echo system_info('company_name') ?> </a> All rights reserved.</span>
						</div>
					</div>
				</div>
			</div>
            <!-- END FOOTER -->

        </div>
        <!-- END PAGE -->
		<!-- SCRIPTS -->		
		<!-- BACK TO TOP -->
		<a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>
		
	
	
	
	<?php }else{
 			 $this->load->view('auth/license');
	 }?>    
	
<!-- JQUERY JS -->
		<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js');?>"></script>
		<!-- BOOTSTRAP JS -->
		<script src="<?php echo base_url('assets/plugins/bootstrap/js/popper.min.js');?>"></script>
		<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js');?>"></script>
		<!-- SIDEBAR JS -->
		<script src="<?php echo base_url('assets/plugins/sidebar/sidebar.js');?>"></script>
		<!-- SELECT2 JS -->
		<script src="<?php echo base_url('assets/plugins/select2/js/select2.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/select2.js');?>"></script>
        <!-- STICKY JS -->
		<script src="<?php echo base_url('assets/js/sticky.js');?>"></script>
        <!-- COLOR THEME JS -->
        <script src="<?php echo base_url('assets/js/themeColors.js');?>"></script>
        <!-- CUSTOM JS -->
        <script src="<?php echo base_url('assets/js/custom.js');?>"></script>
		<script src="<?php echo base_url('assets/js/software.min.js');?>"></script>
		<script>
		//document.addEventListener('contextmenu', event => event.preventDefault());
		</script>
        <!-- END SCRIPTS -->
	</body>
</html>


       

	
	
	
	
	
	
	
	