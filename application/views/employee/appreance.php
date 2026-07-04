<?php defined('BASEPATH') OR exit('No direct script access allowed'); $isExpired=base64_decode(config_item('is_expiry'));$isCheck=config_item('is_check');
$userCt=$this->session->userdata('user_cate');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<meta name="description" content="<?php echo system_info('company_name') ?>">
	<meta name="author" content="<?php echo system_info('company_name') ?>">
	<meta name="keywords" content="<?php echo system_info('company_name') ?>">
	<title> <?php echo $title ?> | <?php echo system_info('company_name') ?> </title>
	<link rel="icon" href="<?php echo base_url(system_info('favicon'));?>">
	<?php $this->load->view('employee/include/css') ?>
    <style>
	.card .card-header .card-title::before {content:"";position:absolute;left:0px;padding:2px;height:30px;background:#6f42c1;}.countdowntimer{text-align: center;margin-top: 0.75rem;}.size_md {font-size: 30px;border-width: 5px;border-radius: 4px;}.mi-lebel{display: block;margin-bottom: 0.375rem;font-weight: 500;font-size: 0.875rem;color:rgb(29, 42, 87);}.fntMi{ font-size:12px; padding: 8px 10px 5px 10px;}
	.bg-working-mi {background: rgba(114, 155, 0, 0.25);color: #618400 !important;}
	.bg-success-mi {background: rgba(13, 205, 148, 0.25);color: #0dcd94 !important;}
	.bg-danger-mi {background:rgba(247, 40, 74, 0.25);color:#f7284a !important;}
    .bg-warning-mi{background: rgba(251, 197, 24, 0.25);color: #e3b113 !important;}
    .bg-orange-mi{background: rgba(243, 73, 50, 0.25);color: #f34932  !important;}
	.bg-holidy-mi{background: rgba(0, 115, 217, 0.25);color: #0073d9 !important;}
	
	.bgPrsnt{ background-color:#17a602;}
	.bgLat{ background-color:#f34932;}
	.bgAbsnt{ background-color:#f7284a;}
	.bgHoliDy{ background-color:#0073d9;}
	.bgHfDy{ background-color:#e3b113;}
	.bgLvDy{ background-color:#009EA6;}
	

.avMi-md {width: 2.5rem;height: 2.5rem;line-height: 2.5rem;font-size: 1rem;}.bradius {border-radius: 25%;}
.avMi{width: 2rem;height: 2rem;line-height: 2rem;position: relative;text-align: center;display: inline-block;color: #fff;font-weight: 600;vertical-align: bottom;font-size: 0.875rem;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;}
.miFntSz{ font-size:.9rem;}
  .micrd{ padding: 30px !important;margin-bottom:0px;}  
    
	
	
	@media (max-width: 576px) {
  .micrd{margin-bottom:15px;}  
}
	
	
	
	
	
	
	
	
	
 /* :root{--mi-bar-color: #0e0e23;--mi-bar-bg-color: #fff;--mi-bar_color: #fff;}
	.table-responsive:hover{scrollbar-color: var(--mi-bar-color) var(--mi-bar-bg-color);}
	.table-responsive{overflow-x: scroll;scrollbar-width: thin;scrollbar-color: var(--mi-bar_color) var(--mi-bar-bg-color);}
	.table{ margin-bottom:10px;}
	.ami_tHeader > tr > th{ color:#FFFFFF !important;border: 1px solid #088 !important;padding: 12px 0px 12px 5px !important;}.ami_tHeader > tr{border: 1px solid #088 !important;}  
    */
	.ami_tHeader{ background-color:#088;}
	.ami_tHeader > tr > th{ color:#FFFFFF !important;border: 1px solid #088 !important;padding: 12px 0px 12px 5px !important;}.ami_tHeader > tr{border: 1px solid #088 !important;}
	.miBgs{ width: 3.5rem;padding: 5px 0px 5px 0px;}
	
	
	.wrKng{color: white;background-color: rgb(4, 155, 215);padding:3px 8px 3px 8px;font-size: .65rem;border-radius: 12px;}
</style>
    
    
 </head>

    <body class="ltr main-body leftmenu" onLoad="startTime()">

        <!-- SWITCHER -->
        
		<div class="switcher-wrapper">
			<div class="demo_changer">
				<div class="form_holder sidebar-right1">
					<div class="row">
						<div class="predefined_styles">
							<div class="swichermainleft text-center">
								<div class="p-3 d-grid gap-2">
									<a href="index.html" target="_blank" class="btn btn-primary rounded-10 mt-0">View Demo</a>
									<a href="https://1.envato.market/MGEaN" target="_blank"
										class="rounded-10 btn btn-secondary">Buy Now</a>
									<a href="https://1.envato.market/MGEaN" target="_blank"
										class="rounded-10 btn btn-info">Our Portfolio</a>
								</div>
							</div>
							<div class="swichermainleft">
								<h4>LTR and RTL Versions</h4>
								<div class="skin-body">
									<div class="switch_section">
										<div class="switch-toggle d-flex">
											<span class="me-auto">LTR</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch7"
													id="myonoffswitch19" class="onoffswitch2-checkbox" checked>
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
        
        <!-- LOADEAR -->
		<div id="global-loader">
			<img src="<?php echo base_url('/assets/img/loader.svg');?>" class="loader-img" alt="Loader">
		</div>
		<!-- END LOADEAR -->

        <!-- PAGE -->
        <div class="page">
           <?php $this->load->view('employee/include/header'); ?>
           <?php $this->load->view('employee/include/left'); ?>
            <!-- MAIN-CONTENT -->
            <div class="main-content side-content pt-0">
                <div class="main-container container-fluid">
                    <div class="inner-body">
						<!-- Page Header -->
                        
                        <div class="ami_toast tst_warning" style="top:72px;"><i class="bx bx-error"></i> ami popup notification</div>
                        <?php //print_r($this->session->userdata('name'));?>
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Attandance</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item active" aria-current="page"><?php print_r($this->session->userdata('mi_name'));?></li>
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
	 <!-------------------- @mit Code Changes Here Start -------------------->
       <div id="markPresent" style="display:none;"><?php echo $markPresentAction;?></div>
       <?php 
	   			//print_r($mrkAttendance);echo '<br>';
				
				//print_r($ifShifExist);
				?>
      <!-- <div id="arvResultSection">Cheking function will execute</div>-->
               
        <div class="row row-sm">
        <div class="col-sm-12 col-lg-12 col-xl-3">
              <div class="card custom-card card-body micrd">
                   <div class="countdowntimer mt-0"> 
                        <span id="miClock" class="border-0 style size_md" style="background: transparent; color:#4268c1; border-color: transparent; font-weight:600;">
                        	13:54:13</span> <label class="mi-lebel">Current Time</label> 
                        </div>
                 <div class="btn-list text-center mt-3"> 
                    <a href="javascript:void(0);" class="btn arvActn ripple fntMi <?php if($mrkAttendance['log_in_time']==''){echo 'btn-outline-success';}else{ echo 'btn-outline-dark disabled';}?>" id="mrkPresentIn"><i class="fe fe-sunrise"></i> Clock In</a>  
                    <a href="javascript:void(0);" id="mrkPresentOut" class="btn arvActn ripple fntMi <?php if($mrkAttendance['log_out_time']==''){if($mrkAttendance['log_in_time']==''){echo 'btn-outline-dark disabled';}else{ echo 'btn-outline-success'; }}else{ echo 'btn-outline-dark disabled'; }?>"><i class="fe fe-sunset"></i> Clock Out</a> 
                 </div>
            </div>
        </div>
                            
                            <div class="col-sm-12 col-lg-12 col-xl-9">
                         	   <div class="card"> 
                                  <div class="card-header  border-0"> <h4 class="card-title">Days Overview This Month</h4> </div> 
                                  <div class="card-body pt-0 pb-3"> 
                                  	<div class="row mb-0 pb-0"> 
                                    	<div class="col-md-6 col-xl-2 text-center py-3"> 
                                        	<span class="avMi avMi-md bradius fs-20 bg-working-mi">
											    <?php if($ovrVthisMonth){echo $ovrVthisMonth['wrkngDy'];}else{ echo '0';}?>
                                            </span> 
                                            <h5 class="mb-0 mt-3 miFntSz">Total Working Days</h5> 
                                         </div> 
                                         <div class="col-md-6 col-xl-2 text-center py-3 "> 
                                         	<span class="avMi avMi-md bradius fs-20 bg-success-mi">
                                                <?php if($ovrVthisMonth){echo $ovrVthisMonth['present'];}else{ echo '0';}?>
                                            </span> 
                                            <h5 class="mb-0 mt-3 miFntSz">Present Days</h5>
                                         </div> 
                                         <div class="col-md-6 col-xl-2 text-center py-3"> 
                                         	<span class="avMi avMi-md bradius fs-20 bg-danger-mi">
                                                <?php if($ovrVthisMonth){echo $ovrVthisMonth['absent'];}else{ echo '0';}?>
                                            </span> 
                                            <h5 class="mb-0 mt-3 miFntSz">Absent Days</h5> 
                                          </div> 
                                          <div class="col-md-6 col-xl-2 text-center py-3"> 
                                          		<span class="avMi avMi-md bradius fs-20 bg-warning-mi">
                                                   <?php if($ovrVthisMonth){echo $ovrVthisMonth['halfDy'];}else{ echo '0';}?>
                                                </span> 
                                                <h5 class="mb-0 mt-3 miFntSz">Half Days</h5> 
                                          </div> 
                                          <div class="col-md-6 col-xl-2 text-center py-3 "> 
                                          	<span class="avMi avMi-md bradius fs-20 bg-orange-mi">
                                               <?php if($ovrVthisMonth){echo $ovrVthisMonth['lateDy'];}else{ echo '0';}?>
                                            </span> 
                                            <h5 class="mb-0 mt-3 miFntSz">Late Days</h5> 
                                          </div> 
                                          <div class="col-md-6 col-xl-2 text-center py-3"> 
                                          		<span class="avMi avMi-md bradius fs-20 bg-holidy-mi">
													<?php if($ovrVthisMonth){echo $ovrVthisMonth['dayOff'];}else{ echo '0';}?>
                                                </span> 
                                                <h5 class="mb-0 mt-3 miFntSz">Holidays</h5>
                                           </div> 
                                       </div> 
                                   </div> 
                                </div>
                        	</div>
                            
                            
                        </div>
                        
        <div class="row row-sm" style="margin:15px -10px 15px -10px;"> 
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header  border-0"> <h4 class="card-title">Attendance Overview</h4> </div> 
                    <div class="card-body">   
                   		<form method="post" id="search_details">
                        <div class="row row-sm">
                            <div class="col-lg-6 col-md-6">
                                <div class="row"> 
                                  <div class="col-md-6"> 
                                      <div class="form-group"> 
                                        <label class="form-label">From:</label> 
                                         <div class="input-group">
                                            <div class="input-group-text border-end-0">
                                                <i class="fe fe-calendar lh--9 op-6"></i>
                                            </div>
                                            <input type="text"  id="strtDt" name="strtDt" class="form-control fc-datepicker dtClean" placeholder="MM/DD/YYYY" >
                                        </div> 
                                       </div> 
                                  </div> 
                                  <div class="col-md-6">
                                   <div class="form-group">
                                    <label class="form-label">To:</label> 
                                      <div class="input-group">
                                            <div class="input-group-text border-end-0">
                                                <i class="fe fe-calendar lh--9 op-6"></i>
                                            </div>
                                            <input type="text" id="endDt" name="endDt"  class="form-control fc-datepicker dtClean" placeholder="MM/DD/YYYY">
                                        </div>
                                  </div>
                                 </div>
                                </div>                                                                                            
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="row"> 
                                  <div class="col-md-5"> 
                                      <div class="form-group"> 
                                        <label class="form-label">Attendance Status:</label> 
                                             <select name="attStatus" id="attStatus" class="form-control custom-select select2">
                                                 <option label="Select Status"></option> 
                                                 <option value=" ">All</option> 
                                                 <option value="1">Present</option> 
                                                 <option value="2">Late</option>
                                                 <option value="3">Absent</option>
                                                 <option value="4">Holiday</option>
                                                 <option value="5">Half Day</option>
                                                 <option value="6">On Leave</option>
                                             </select> 
                                       </div> 
                                  </div> 
                                  <div class="col-md-4">
                                   <div class="form-group">
                                    <label class="form-label">Year:</label> 
                                        <select name="yrWise" id="yrWise" class="form-control custom-select select2 arvChange">
                                            <option label="Select Year"></option> 
                                                <option value="1">2024</option> 
                                                <option value="2">2023</option>
                                                <option value="3">2022</option>
                                                <option value="4">2021</option>
                                                <option value="5">2020</option> 
                                            </select>
                                  </div>
                                 </div>
                                  <div class="col-md-3">
                                     <div class="form-group">
                                         <label class="form-label">&nbsp;</label>  
                                  <button class="btn ripple btn-outline-success" type="submit" onClick="return get_search(reportAppearance,'#search_details','#reportAppearance')">
                                         <i class="si si-magnifier"></i> Search
                                  </button>
                                     </div>
                                  </div>
                                </div>                                                                                            
                            </div>
                        </div>
                    
                    </form>
                    </div>
                   <input type="hidden" id="target" value="<?php echo $target;?>" > 
					  <div class="card-body">
						<div class="table-responsive">
							<div id="emp-attendance_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
								
								<div class="row">
									<div class="col-sm-12">
										<table class="table text-nowrap text-md-nowrap table-striped table-bordered table-hover mg-b-0" id="reportAppearance">
											<thead class="ami_tHeader">
												<tr>
													<th>S.No.</th>
													<th>Date</th>
													<th>Status</th>
													<th>Clock-In</th>
													<th>Clock-Out</th>
													<th>Hours</th>
                                                    <th>Created Date</th>
                                                    <th>Remarks</th>
												</tr>
											</thead>
											
										</table>
									</div>
								</div>
								
							</div>
						</div>
					</div>
                    
                    
                    
                    
                    
                    
                </div>
            </div>
        </div>
     <!-------------------- @mit Code Changes Here End ---------------------->
                    </div>
                </div>
            </div>
            <!-- END MAIN-CONTENT -->
          
            <!-- FOOTER -->
            <div class="main-footer text-center">
				<div class="container">
					<div class="row row-sm">
						<div class="col-md-12">
							<span>Copyright © 2023 <a href="#"><?php echo system_info('company_name'); ?></a>. Designed by 
							<a href="http://www.facebook.com/amisingh143"><?php echo config_item('dev_name'); ?></a> All rights reserved.</span>
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
		<input type="hidden" id="base_url" value="<?php echo base_url();?>" >
		<!-- JQUERY JS -->
		<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
        <!-- BOOTSTRAP JS -->
		<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/popper.min.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<!-- PERFECT SCROLLBAR JS -->
		<script src="<?php echo base_url();?>assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<!-- SIDEMENU JS -->
		<script src="<?php echo base_url();?>assets/plugins/sidemenu/sidemenu.js" id="leftmenu"></script>
		<!-- SIDEBAR JS -->
		<script src="<?php echo base_url();?>assets/plugins/sidebar/sidebar.js"></script>
		<!-- SELECT2 JS -->
		<script src="<?php echo base_url();?>assets/plugins/select2/js/select2.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/select2.js"></script>
		<!-- INTERNAL JQUERY-UI JS -->
		<script src="<?php echo base_url();?>assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>
		<!-- INTERNAL JQUERY.MASKEDINPUT JS -->
		<script src="<?php echo base_url();?>assets/plugins/jquery.maskedinput/jquery.maskedinput.js"></script>
		<!-- INTERNAL SPECTURM-COLORPICKER JS -->
		<script src="<?php echo base_url();?>assets/plugins/spectrum-colorpicker/spectrum.js"></script>
	
		<script src="<?php echo base_url();?>assets/js/form-elements.js"></script>
		<!-- BOOTSTRAP-DATEPICKER JS -->
		<script src="<?php echo base_url();?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
		<!-- INTERNAL JQUERY-SIMPLE-DATETIMEPICKER JS -->
		<script src="<?php echo base_url();?>assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>
		<!-- COLOR PICKER JS -->
		<!--<script src="<?php //echo base_url();?>assets/plugins/pickr-master/pickr.es5.min.js"></script>
		<script src="<?php //echo base_url();?>assets/js/picker.js"></script>        -->
        <!-- STICKY JS -->
		<script src="<?php echo base_url();?>assets/js/sticky.js"></script>
        <!-- COLOR THEME JS -->
       <!-- <script src="<?php //echo base_url();?>assets/js/themeColors.js"></script>-->
        <!-- CUSTOM JS -->
        <script src="<?php echo base_url();?>assets/js/custom.js"></script>
        <!-- SWITCHER JS -->
        <script src="<?php echo base_url();?>assets/switcher/js/switcher.js"></script>
        <!-- END SCRIPTS -->
        <script src="<?php echo base_url() ?>assets/js/employee/appearance.js"></script>
		<script src="<?php echo base_url('assets/js/employee/common.js');?>"></script>
        
		<script src="<?php echo base_url('assets/plugins/datatable/js/jquery.dataTables.min.js')?>"></script>
		<script src="<?php echo base_url('assets/plugins/datatable/js/dataTables.bootstrap5.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatable/js/dataTables.buttons.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatable/js/buttons.bootstrap5.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatable/js/jszip.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatable/pdfmake/pdfmake.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatable/pdfmake/vfs_fonts.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatable/js/buttons.html5.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatable/js/buttons.print.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatable/js/buttons.colVis.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatable/dataTables.responsive.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatable/responsive.bootstrap5.min.js')?>"></script>
        <script src="<?php echo base_url('assets/js/table-data.js')?>"></script>
		
		
		
    </body>
</html>
