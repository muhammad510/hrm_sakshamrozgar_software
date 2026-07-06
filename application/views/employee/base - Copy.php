<?php defined('BASEPATH') OR exit('No direct script access allowed'); $isExpired=base64_decode(config_item('is_expiry'));$isCheck=config_item('is_check');
$userCt=$this->session->userdata('user_cate');
?>
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
	<link rel="icon" href="<?php echo base_url(system_info('favicon'));?>">
	<?php $this->load->view('employee/include/css') ?>
    <style>
	.micrd{ padding: 30px !important;margin-bottom:0px !important;}
	.countdowntimer{text-align: center;margin-top: 0.75rem;}
	.size_md {font-size: 30px;border-width: 5px;border-radius: 4px;}
	.mi-lebel{display: block;margin-bottom: 0.375rem;font-weight: 500;font-size: 0.875rem;color:rgb(29, 42, 87);}
	.fntMi{ font-size:12px; padding: 8px 10px 5px 10px;}
	
	.card .card-header .card-title::before {content:"";position:absolute;left:0px;padding:2px;height:30px;background:#6f42c1;}
	
	.bg-primary-mi {background: rgba(51, 102, 255, 0.2);color: #3164fd !important;}
	.bg-success-mi {background: rgba(13, 205, 148, 0.25);color: #0dcd94 !important;}
	.bg-danger-mi {background:rgba(247, 40, 74, 0.1);color:#f7284a !important;}
    .bg-warning-mi{background: rgba(251, 197, 24, 0.1);color: #e3b113 !important;}
    .bg-orange-mi{background: rgba(243, 73, 50, 0.1);color: #f34932  !important;}
	.bg-pink-mi{background: rgba(239, 78, 184, 0.1);color: #ef4eb8 !important;}

.avMi-md {width: 2.5rem;height: 2.5rem;line-height: 2.5rem;font-size: 1rem;}.bradius {border-radius: 25%;}
.avMi{width: 2rem;height: 2rem;line-height: 2rem;position: relative;text-align: center;display: inline-block;color: #fff;font-weight: 600;vertical-align: bottom;font-size: 0.875rem;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;}
.miFntSz{ font-size:.9rem;}
	</style>
    
    
    </head>
    <body class="ltr main-body leftmenu" onLoad="startTime()">
        <input type="hidden" value="<?php echo base_url();?>" id="base_url">
		<?php //if(!$userCt=='dev'){?>
		<!-- SWITCHER -->
		<div class="switcher-wrapper">
			<div class="demo_changer">
				<div class="form_holder sidebar-right1">
					<div class="row">
						<div class="predefined_styles">
							<div class="swichermainleft">
								<h4>LTR and RTL Versions</h4>
								<div class="skin-body">
									<div class="switch_section">
										<div class="switch-toggle d-flex">
											<span class="me-auto">LTR</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch7" id="myonoffswitch19" class="onoffswitch2-checkbox" checked>
												<label for="myonoffswitch19" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">RTL</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch7"
													id="myonoffswitch20" class="onoffswitch2-checkbox">
												<label for="myonoffswitch20" class="onoffswitch2-label"></label>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft menu-styles">
								<h4>Navigation Style</h4>
								<div class="skin-body">
									<div class="switch_section">
										<div class="switch-toggle d-flex">
											<span class="me-auto">Vertical Menu</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch01"
													id="myonoffswitch01" class="onoffswitch2-checkbox" checked>
												<label for="myonoffswitch01" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Horizontal Click Menu</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch01"
													id="myonoffswitch02" class="onoffswitch2-checkbox">
												<label for="myonoffswitch02" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Horizontal Hover Menu</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch01"
													id="myonoffswitch03" class="onoffswitch2-checkbox">
												<label for="myonoffswitch03" class="onoffswitch2-label"></label>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft">
								<h4>Light Theme Style</h4>
								<div class="skin-body">
									<div class="switch_section">
										<div class="switch-toggle d-flex">
											<span class="me-auto">Light Theme</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch1"
													id="myonoffswitch1" class="onoffswitch2-checkbox" checked>
												<label for="myonoffswitch1" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Light Primary</span>
											<div class="">
												<input class="wd-30 ht-30 input-color-picker color-primary-light"
													value="#6259ca" id="colorID" oninput="changePrimaryColor()" type="color"
													data-id="bg-color" data-id1="bg-hover" data-id2="bg-border"
													data-id7="transparentcolor" name="lightPrimary">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft">
								<h4>Dark Theme Style</h4>
								<div class="skin-body">
									<div class="switch_section">
										<div class="switch-toggle d-flex">
											<span class="me-auto">Dark Theme</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch1"
													id="myonoffswitch2" class="onoffswitch2-checkbox">
												<label for="myonoffswitch2" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Dark Primary</span>
											<div class="">
												<input class="wd-30 ht-30 input-dark-color-picker color-primary-dark"
													value="#6259ca" id="darkPrimaryColorID" oninput="darkPrimaryColor()"
													type="color" data-id="bg-color" data-id1="bg-hover" data-id2="bg-border"
													data-id3="primary" data-id8="transparentcolor" name="darkPrimary">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft menu-colors">
								<h4>Menu Styles</h4>
								<div class="skin-body">
									<div class="switch_section">
										<div class="switch-toggle lightMenu d-flex">
											<span class="me-auto">Light Menu</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch2"
													id="myonoffswitch3" class="onoffswitch2-checkbox">
												<label for="myonoffswitch3" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle colorMenu d-flex mt-2">
											<span class="me-auto">Color Menu</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch2"
													id="myonoffswitch4" class="onoffswitch2-checkbox">
												<label for="myonoffswitch4" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle darkMenu d-flex mt-2">
											<span class="me-auto">Dark Menu</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch2"
													id="myonoffswitch5" class="onoffswitch2-checkbox" checked>
												<label for="myonoffswitch5" class="onoffswitch2-label"></label>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft header-colors">
								<h4>Header Styles</h4>
								<div class="skin-body">
									<div class="switch_section">
										<div class="switch-toggle lightHeader d-flex">
											<span class="me-auto">Light Header</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch3"
													id="myonoffswitch6" class="onoffswitch2-checkbox" checked>
												<label for="myonoffswitch6" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle  colorHeader d-flex mt-2">
											<span class="me-auto">Color Header</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch3"
													id="myonoffswitch7" class="onoffswitch2-checkbox">
												<label for="myonoffswitch7" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle darkHeader d-flex mt-2">
											<span class="me-auto">Dark Header</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch3"
													id="myonoffswitch8" class="onoffswitch2-checkbox">
												<label for="myonoffswitch8" class="onoffswitch2-label"></label>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft layout-width-style">
								<h4>Layout Width Styles</h4>
								<div class="skin-body">
									<div class="switch_section">
										<div class="switch-toggle d-flex">
											<span class="me-auto">Full Width</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch4"
													id="myonoffswitch9" class="onoffswitch2-checkbox" checked>
												<label for="myonoffswitch9" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Boxed</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch4"
													id="myonoffswitch10" class="onoffswitch2-checkbox">
												<label for="myonoffswitch10" class="onoffswitch2-label"></label>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft layout-positions">
								<h4>Layout Positions</h4>
								<div class="skin-body">
									<div class="switch_section">
										<div class="switch-toggle d-flex">
											<span class="me-auto">Fixed</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch5"
													id="myonoffswitch11" class="onoffswitch2-checkbox" checked>
												<label for="myonoffswitch11" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Scrollable</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch5"
													id="myonoffswitch12" class="onoffswitch2-checkbox">
												<label for="myonoffswitch12" class="onoffswitch2-label"></label>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft vertical-switcher">
								<h4>Sidemenu layout Styles</h4>
								<div class="skin-body">
									<div class="switch_section">
										<div class="switch-toggle d-flex">
											<span class="me-auto">Default Menu</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch6"
													id="myonoffswitch13" class="onoffswitch2-checkbox default-menu" checked>
												<label for="myonoffswitch13" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Icon with Text</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch6"
													id="myonoffswitch14" class="onoffswitch2-checkbox">
												<label for="myonoffswitch14" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Icon Overlay</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch6"
													id="myonoffswitch15" class="onoffswitch2-checkbox">
												<label for="myonoffswitch15" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Closed Sidemenu</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch6"
													id="myonoffswitch16" class="onoffswitch2-checkbox">
												<label for="myonoffswitch16" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Hover Submenu</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch6"
													id="myonoffswitch17" class="onoffswitch2-checkbox">
												<label for="myonoffswitch17" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Hover Submenu Style 1</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch6"
													id="myonoffswitch18" class="onoffswitch2-checkbox">
												<label for="myonoffswitch18" class="onoffswitch2-label"></label>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft">
								<h4>Reset All Styles</h4>
								<div class="skin-body">
									<div class="switch_section my-4">
										<button class="btn btn-danger btn-block" onClick="localStorage.clear();
											document.querySelector('html').style = '';
											names() ;
											resetData();" type="button">Reset All
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <!-- END SWITCHER -->
        <?php //}?>
        <!-- LOADEAR -->
		<div id="global-loader">
			<img src="<?php echo base_url('/assets/img/loader.svg');?>" class="loader-img" alt="Loader">
		</div>
		<!-- END LOADEAR -->

        <!-- PAGE -->
        <div class="page">

          <?php $this->load->view('employee/include/header') ?>

          <?php $this->load->view('employee/include/left') ?>

            <!-- MAIN-CONTENT -->
            <div class="main-content side-content pt-0">
                <div class="main-container container-fluid">
                    <div class="inner-body">
							<div class="ami_toast tst_warning" style="top:72px;"><i class="bx bx-error"></i> ami popup notification</div>
                     <?php if($isCheck <= $isExpired) {		
					 
					 if (!empty($layout) && trim($layout) !== "") {
                       require_once($layout);
                    } else { 
					//print_r($this->session->userdata('user_cate'));
					
					?>   
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Welcome To Dashboard</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Project Dashboard</li>
								</ol>
							</div>
							<div class="d-flex">
								<div class="justify-content-center">
									<button type="button" class="btn btn-white btn-icon-text my-2 me-2">
										<i class="fe fe-download me-2"></i> Import
									</button>
									<button type="button" class="btn btn-white btn-icon-text my-2 me-2">
										<i class="fe fe-filter me-2"></i> Filter
									</button>
									<button type="button" class="btn btn-primary my-2 btn-icon-text">
										<i class="fe fe-download-cloud me-2"></i> Download Report
									</button>
								</div>
							</div>
						</div>
						<!-- End Page Header -->
						<!--Row-->
                        <div class="row row-sm">
                        	<div class="col-sm-12 col-lg-12 col-xl-3">
                         		  <div class="card custom-card card-body micrd">
									   <div class="countdowntimer mt-0"> 
                                       		<span id="miClock" class="border-0 style size_md" style="background: transparent; color:#4268c1; border-color: transparent; font-weight:600;">13:54:13</span> <label class="mi-lebel">Current Time</label> </div>
                                     <div class="btn-list text-center mt-3">  <a href="javascript:void(0);" class="btn ripple disabled fntMi btn-outline-dark"><i class="fe fe-sunrise"></i> Clock In</a>  <a href="javascript:void(0);" class="btn ripple fntMi btn-outline-success"><i class="fe fe-sunset"></i> Clock Out</a> 
                                     </div>
								</div>
                        	</div>
                            
                            <div class="col-sm-12 col-lg-12 col-xl-9">
                         	   <div class="card"> 
                                  <div class="card-header  border-0"> <h4 class="card-title">Days Overview This Month</h4> </div> 
                                  <div class="card-body pt-0 pb-3"> 
                                  	<div class="row mb-0 pb-0"> 
                                    	<div class="col-md-6 col-xl-2 text-center py-3"> 
                                        	<span class="avMi avMi-md bradius fs-20 bg-primary-mi">31</span> 
                                            <h5 class="mb-0 mt-3 miFntSz">Total Working Days</h5> 
                                         </div> 
                                         <div class="col-md-6 col-xl-2 text-center py-3 "> 
                                         	<span class="avMi avMi-md bradius fs-20 bg-success-mi">24</span> 
                                            <h5 class="mb-0 mt-3 miFntSz">Present Days</h5>
                                         </div> 
                                         <div class="col-md-6 col-xl-2 text-center py-3"> 
                                         	<span class="avMi avMi-md bradius fs-20 bg-danger-mi">2</span> 
                                            <h5 class="mb-0 mt-3 miFntSz">Absent Days</h5> 
                                          </div> 
                                          <div class="col-md-6 col-xl-2 text-center py-3"> 
                                          		<span class="avMi avMi-md bradius fs-20 bg-warning-mi">0</span> 
                                                <h5 class="mb-0 mt-3 miFntSz">Half Days</h5> 
                                          </div> 
                                          <div class="col-md-6 col-xl-2 text-center py-3 "> 
                                          	<span class="avMi avMi-md bradius fs-20 bg-orange-mi">2</span> 
                                            <h5 class="mb-0 mt-3 miFntSz">Late Days</h5> 
                                          </div> 
                                          <div class="col-md-6 col-xl-2 text-center py-3"> 
                                          		<span class="avMi avMi-md bradius fs-20 bg-pink-mi">5</span> 
                                                <h5 class="mb-0 mt-3 miFntSz">Holidays</h5>
                                           </div> 
                                       </div> 
                                   </div> 
                                </div>
                        	</div>
                            
                            
                        </div>
                        <div class="row row-sm">
                        	
							<div class="col-sm-12 col-lg-12 col-xl-8">
								<!--Row-->
								<div class="row row-sm  mt-lg-4">
									<div class="col-sm-12 col-lg-12 col-xl-12">
										<?php if($employee['attendance_status'] ==0) { ?>
											<div class="card bg-danger custom-card card-box">
												<div class="card-body p-4">
													<div class="row align-items-center">
														<div class="offset-xl-3 offset-sm-6 col-xl-8 col-sm-6 col-12 img-bg">
															<h4 class="d-flex  mb-3">
																<span class="font-weight-bold text-white "><?php echo $employee['name']; ?>!</span>
															</h4>
															<p class="tx-white-7 mb-1">You have two projects to finish, you had
															completed <b class="text-warning">57%</b> from your montly level,
															Keep going to your level
														</div>
														<?php if($employee['gender'] == 1) { ?>
															<img src="<?php echo base_url();?>assets/img/pngs/boy.png" alt="user-img" style="height: 195px;">
														<?php } elseif($employee['gender'] == 2) { ?>
															<img src="<?php echo base_url();?>assets/img/pngs/work2.png" alt="user-img" style="height: 195px;">
														<?php } ?>
													</div>
													<form id="mark_attendance" method="post" accept-charset="utf-8" enctype="multipart/form-data">
														
														<input type="hidden" class="form-control" name="employee_id" id="employee_id"
														value="<?php echo $employee['employee_id'] ?>">
														<input type="hidden" class="form-control" name="id" id="id"
														value="<?php echo $employee['id'] ?>">

														<input type="hidden" class="form-control" name="attendance_date_time" id="attendance_date_time" value="<?php echo date('Y-m-d h:i a') ?>">

														<input type="hidden" class="form-control" name="attendance_status" id="attendance_status" value="<?php echo $employee['attendance_status'] ?>">
														<div class="col-md-12">
															<button class="btn btn-danger my-2 btn-icon-text pull-right" id="attendancedata"><i class="ti-check"></i> Start Working Today</button>
														</div>
													</form>
												</div>
											</div>
										<?php } elseif($employee['attendance_status'] == 1 || $employee['attendance_status'] == 2 || $employee['attendance_status'] == 5) { ?>


											<div class="card bg-success custom-card card-box">
												<div class="card-body p-4">
													<div class="row align-items-center">
														<div class="offset-xl-3 offset-sm-6 col-xl-8 col-sm-6 col-12 img-bg">
															<h4 class="d-flex  mb-3">
																<span class="font-weight-bold text-white "><?php echo $employee['name']; ?>!</span>
															</h4>
															<p class="tx-white-7 mb-1">You have two projects to finish, you had
															completed <b class="text-warning">57%</b> from your montly level,
															Keep going to your level
														</div>
														<?php if($employee['gender'] == 1) { ?>
															<img src="<?php echo base_url();?>assets/img/pngs/boy.png" alt="user-img" style="height: 195px;">
														<?php } elseif($employee['gender'] == 2) { ?>
															<img src="<?php echo base_url();?>assets/img/pngs/work2.png" alt="user-img" style="height: 195px;">
														<?php } ?>
													</div>
													<form id="logout_attendance" method="post" accept-charset="utf-8" enctype="multipart/form-data">
														<input type="hidden" class="form-control" name="employee_id" id="employee_id"
														value="<?php echo $employee['employee_id'] ?>">
														<input type="hidden" class="form-control" name="id" id="id"
														value="<?php echo $employee['id'] ?>">
														<input type="hidden" class="form-control" name="attendance_date_time" id="attendance_date_time" value="<?php echo date('h:i a') ?>">
														<div class="col-md-12">
															<button class="btn btn-success my-2 btn-icon-text pull-right" id="logoutattendancedata"><i class="ti-check"></i> Close Working Today</button>
														</div>
													</form>
												</div>
											</div>


										<?php } elseif($employee['attendance_status'] == 6 ) { ?>

											<div class="card bg-warning custom-card card-box">
												<div class="card-body p-4">
													<div class="row align-items-center">
														<div class="offset-xl-3 offset-sm-6 col-xl-8 col-sm-6 col-12 img-bg">
															<h4 class="d-flex  mb-3">
																<span class="font-weight-bold text-white "><?php echo $employee['name']; ?>!</span>
															</h4>
															<p class="tx-white-7 mb-1">You have two projects to finish, you had
															completed <b class="text-warning">57%</b> from your montly level,
															Keep going to your level
														</div>
														<?php if($employee['gender'] == 1) { ?>
															<img src="<?php echo base_url();?>assets/img/pngs/boy.png" alt="user-img" style="height: 195px;">
														<?php } elseif($employee['gender'] == 2) { ?>
															<img src="<?php echo base_url();?>assets/img/pngs/work2.png" alt="user-img" style="height: 195px;">
														<?php } ?>
													</div>
													
													<div>
														<p class="pull-right"> On Leave</p>
													</div>
												</div>
											</div>



										<?php } elseif($employee['attendance_status'] == 4 ) { ?>

											<div class="card bg-primary custom-card card-box">
												<div class="card-body p-4">
													<div class="row align-items-center">
														<div class="offset-xl-3 offset-sm-6 col-xl-8 col-sm-6 col-12 img-bg">
															<h4 class="d-flex  mb-3">
																<span class="font-weight-bold text-white "><?php echo $employee['name']; ?>!</span>
															</h4>
															<p class="tx-white-7 mb-1">You have two projects to finish, you had
															completed <b class="text-warning">57%</b> from your montly level,
															Keep going to your level
														</div>
														<?php if($employee['gender'] == 1) { ?>
															<img src="<?php echo base_url();?>assets/img/pngs/boy.png" alt="user-img" style="height: 195px;">
														<?php } elseif($employee['gender'] == 2) { ?>
															<img src="<?php echo base_url();?>assets/img/pngs/work2.png" alt="user-img" style="height: 195px;">
														<?php } ?>
													</div>
													<div>
														<p class="pull-right"> Today is Holiday</p>
													</div>
												</div>
											</div>

										<?php } ?>
									</div>
								</div>
								<!--Row -->
								<!--row-->
								<div class="row row-sm">
									<div class="col-sm-12 col-lg-12 col-xl-12">
										<div class="card custom-card overflow-hidden">
											<div class="card-header border-bottom-0">
												<div>
													<label class="main-content-label mb-2">Project Budget</label> <span
														class="d-block tx-12 mb-0 text-muted">The Project Budget is a tool
														used by project managers to estimate the total cost of a
														project</span>
												</div>
											</div>
											<div class="card-body ps-0">
												<div class>
													<div class="container">
														<canvas id="project" class="chart-dropshadow2 ht-250"></canvas>
													</div>
												</div>
											</div>
										</div>
									</div><!-- col end -->
								</div><!-- Row end -->
							</div><!-- col end -->
							<div class="col-sm-12 col-lg-12 col-xl-4 mt-xl-4">
								<div class="card custom-card">
									<div class="card-header border-bottom-0 pb-0 d-flex ps-3 ms-1">
										<div>
											<label class="main-content-label mb-2 pt-2">On goiong projects</label>
											<span class="d-block tx-12 mb-2 text-muted">Projects where development work is
												on completion</span>
										</div>
									</div>
									<div class="card-body pt-2 mt-0">
										<div class="list-card">
											<div class="d-flex">
												<div class="demo-avatar-group my-auto float-end">
													<div class="main-img-user avatar-xs">
														<img alt="avatar" class="rounded-circle"
															src="<?php echo base_url();?>assets/img/users/1.jpg">
													</div>
													<div class="main-img-user avatar-xs">
														<img alt="avatar" class="rounded-circle"
															src="<?php echo base_url();?>assets/img/users/2.jpg">
													</div>
													<div class="main-img-user avatar-xs">
														<img alt="avatar" class="rounded-circle"
															src="<?php echo base_url();?>assets/img/users/3.jpg">
													</div>
													<div class="main-img-user avatar-xs">
														<img alt="avatar" class="rounded-circle"
															src="<?php echo base_url();?>assets/img/users/4.jpg">
													</div>
													<div class="">Design team</div>
												</div>
												<div class="ms-auto float-end">
													<div class="">
														<a href="javascript:void(0)" class="option-dots" data-bs-toggle="dropdown"
															aria-haspopup="true" aria-expanded="false"><i
																class="fe fe-more-horizontal"></i></a>
														<div class="dropdown-menu dropdown-menu-end">
															<a class="dropdown-item" href="javascript:void(0)">Today</a>
															<a class="dropdown-item" href="javascript:void(0)">Last Week</a>
															<a class="dropdown-item" href="javascript:void(0)">Last Month</a>
															<a class="dropdown-item" href="javascript:void(0)">Last Year</a>
														</div>
													</div>
												</div>
											</div>
											<div class="card-item mt-4">
												<div class="card-item-icon bg-transparent card-icon">
													<span class="peity-donut"
														data-peity='{ "fill": ["#6259ca", "rgba(204, 204, 204,0.3)"], "innerRadius": 15, "radius": 20}'>6/7</span>
												</div>
												<div class="card-item-body">
													<div class="card-item-stat">
														<small class="tx-10 text-primary font-weight-semibold">25 August
															2020</small>
														<h6 class=" mt-2">Mobile app design</h6>
													</div>
												</div>
											</div>
										</div>
										<div class="list-card mb-0">
											<div class="d-flex">
												<div class="demo-avatar-group my-auto float-end">
													<div class="main-img-user avatar-xs">
														<img alt="avatar" class="rounded-circle"
															src="<?php echo base_url();?>assets/img/users/5.jpg">
													</div>
													<div class="main-img-user avatar-xs">
														<img alt="avatar" class="rounded-circle"
															src="<?php echo base_url();?>assets/img/users/6.jpg">
													</div>
													<div class="main-img-user avatar-xs">
														<img alt="avatar" class="rounded-circle"
															src="<?php echo base_url();?>assets/img/users/7.jpg">
													</div>
													<div class="main-img-user avatar-xs">
														<img alt="avatar" class="rounded-circle"
															src="<?php echo base_url();?>assets/img/users/8.jpg">
													</div>
													<div class="">Design team</div>
												</div>
												<div class="ms-auto float-end">
													<div class="">
														<a href="javascript:void(0)" class="option-dots" data-bs-toggle="dropdown"
															aria-haspopup="true" aria-expanded="false"><i
																class="fe fe-more-horizontal"></i></a>
														<div class="dropdown-menu dropdown-menu-end">
															<a class="dropdown-item" href="javascript:void(0)">Today</a>
															<a class="dropdown-item" href="javascript:void(0)">Last Week</a>
															<a class="dropdown-item" href="javascript:void(0)">Last Month</a>
															<a class="dropdown-item" href="javascript:void(0)">Last Year</a>
														</div>
													</div>
												</div>
											</div>
											<div class="card-item mt-4">
												<div class="card-item-icon bg-transparent card-icon">
													<span class="peity-donut"
														data-peity='{ "fill": ["#6259ca", "rgba(204, 204, 204,0.3)"], "innerRadius": 15, "radius": 20}'>5/7</span>
												</div>
												<div class="card-item-body">
													<div class="card-item-stat">
														<small class="tx-10 text-primary font-weight-semibold">12 JUNE
															2020</small>
														<h6 class=" mt-2">Website Redesign</h6>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div><!-- col end -->
						</div>
						<!-- Row end -->
						<?php }}else{?>
						     <!--<div class="row row-sm">
							<div class="col-sm-12 col-lg-12 col-xl-8">
								<div class="mt-lg-4">	
									
									
									
									<div class="card custom-card">
										<div class="card-header p-3 tx-medium my-auto tx-white bg-secondary">
											Time to Renew License
										</div>
										<div class="card-body">
											<p class="mg-b-0">
											
											<p>Subject: Time to Renew Your <strong>[<?php echo  config_item('software');?>]</strong> License</p>
	<p>Hello [Customer Name],</p>
	<p>We hope you’ve been enjoying your experience with <strong><?php echo  config_item('software');?></strong>. We wanted to send you a friendly reminder that your software license subscription is due to expire on [Expiration Date].</p>
	<p>To ensure uninterrupted access to all the features and benefits you’ve come to rely on, please renew your subscription before the expiration date.</p>
	<p>To renew your subscription, simply follow these steps:</p>
	<p>Step 1<br> Step 2<br> Step 3</p>
	<p>If you have any questions or need assistance, please don’t hesitate to contact our support team at [Support Email Address] or visit our [Support Page].</p>
	<p>Keep Enjoying [Your Software Name],<br> [Your Company Name]</p>
											
											</p>
										</div>
									</div>
									
									</div>
							</div>	
						</div>-->	
						<div class="modal" id="isCheckLicence" data-bs-backdrop="static" data-bs-keyboard="false">
							<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
								<div class="modal-content tx-size-sm">
									<div class="modal-body tx-center pd-y-20 pd-x-20">
                                        <div id="renwMsg">
                                            <i class="icon ion-ios-power tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                                            <h4 class="tx-danger tx-semibold mg-b-20">Warning !!!</h4>
                                            <p class="mg-b-0">
                                                <p>Subject: Time to Renew Your <strong>[<?php echo  config_item('software');?>]</strong> software.</p>
                                                    <p style=" text-align:justify;">Dear <?php echo $this->session->userdata('mi_name');?>,<br>We hope you’ve been enjoying your experience with <strong><?php echo  config_item('software');?></strong>. We wanted to send you a friendly reminder that your software license subscription is due to expire on <strong>[<?php echo date('d-m-Y',$isExpired);?>]</strong>.To ensure uninterrupted access to all the features and benefits you’ve come to reply on,please renew your subscription before the expiration date.</p>
                                                </p>
                                        <a href="<?php echo base_url('auth/login/signout');?>" id="renwContinue" class="btn ripple btn-success amiBtnActn">
                                                Continue <i class="si si-arrow-right-circle"></i> 
                                        </a>
                                        </div>
									</div>
								</div>
							</div>
						</div>
						<?php }?>

                    </div>
                </div>
            </div>
            <!-- END MAIN-CONTENT -->

            <?php //$this->load->view('employee/include/side_bar') ?>

            <!-- FOOTER -->
            
            <div class="main-footer text-center">
				<div class="container">
					<div class="row row-sm">
						<div class="col-md-12">
							<span>Copyright © 2023 <a href="#"><?php echo system_info('company_name'); ?></a>. Designed by 
							<a href="https://camwel.com/"><?php echo config_item('dev_name'); ?></a> All rights reserved.</span>
						</div>
					</div>
				</div>
			</div>
            <!-- END FOOTER -->
        </div>
        <!-- END PAGE -->
        <!-- SCRIPTS -->
       <?php $this->load->view('employee/include/js');if(!($isCheck <= $isExpired)){?>
	   		<style>#renwContinue i{ font-size: 12px;}#target{ display:none;} .licnce{ margin:-20px;}#errKey{display:none;color:#cc4300;float: right;margin-top:-60px;}</style>
	   		<script>
	   			$(document).ready(function()
				{
					$(".form-control").keyup(function()
					{
							 let actNbtn=$(this).attr('id');
							 $('#'+actNbtn).addClass('parsley-success').removeClass('parsley-error');
							 $('#errKey').fadeOut('slow');
							 
						});
					
					
					
					$("#isCheckLicence").modal('show');
					$(".amiBtnActn").click(function()
					{ 
						let actNbtn=$(this).attr('id');							  
   						/*if(actNbtn=='renwContinue')
						{
						$("#renwMsg").hide();
						$("#renwProcess").show();
						}
						else if(actNbtn=='unlock_period')
						{
							$("#isCheckLicence").modal('hide');
							if(!isCheck('liKey')){isNull('liKey');$("#errKey").show();}
							else
							{$('#unlock_period').html('<i class="fe fe-settings bx-spin"></i> Please Wait...');}
						}*/
							
					});
				  
				});
			</script>
		<?php }?>
	   <script src="<?php echo base_url() ?>assets/js/employee/dashboard.js"></script>
    </body>
</html>
