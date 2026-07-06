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
	.card-title{padding-top: 5px;}
	.card .card-header .card-title::before {content:"";position:absolute;left:0px;padding:2px;height:30px;background:#6f42c1;top: 18px;}.countdowntimer{text-align: center;margin-top: 0.75rem;}.size_md {font-size: 30px;border-width: 5px;border-radius: 4px;}.mi-lebel{display: block;margin-bottom: 0.375rem;font-weight: 500;font-size: 0.875rem;color:rgb(29, 42, 87);}.fntMi{ font-size:12px; padding: 8px 10px 5px 10px;}
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
@media (max-width: 576px) {.micrd{margin-bottom:15px;}  }
.thCl{padding: 0px 25px 0px 5px;margin: 0px;text-align: center;}
.inOutDet div{ float:left; text-align: center;width: 50%; font-size: 12.5px;}
.inOutDet div:first-child{ border-right:1px solid #bdb0b0;}
.inOutDet{ width: 125px;text-align: center;}
.inOutDet div.on_time{ color:#036612; font-weight:500;}
.inOutDet div.late_time{ color:#d04e00; font-weight:500;}
.ami_tHeader{ background-color:#088;}
.ami_tHeader > tr > th{ color:#FFFFFF !important;border: 1px solid #088 !important;padding: 12px 0px 12px 5px !important;}.ami_tHeader > tr{border: 1px solid #088 !important;}
.ami_tHeader > tr:last-child > th {padding:0px 10px 1.5px 8px !important;}
.ami_tHeader > tr:first-child > th {padding:1.5px 10px 0px 8px !important;border-bottom:0px !important;}
.myNaming{margin: 0px 0px 5px 0px;}
.mbrPad{padding:20px 0px 18px 15px !important;}
.teamHead{border-top: 1px solid #00000017;margin-top: -25px;padding-top: 15px;}	
.miBgs{ width: 3.5rem;padding: 5px 0px 5px 0px;}
.wrKng{color: white;background-color: rgb(4, 155, 215);padding:3px 8px 3px 8px;font-size: .65rem;border-radius: 12px;}	
table thead th, table thead td {font-weight: 700 !important;font-size: 12px !important;}
.myIndicate div.presnt{ padding: 0px 5px 0px 5px;}.myIndicate div.presnt span {background:#036612;padding: 0px 8px 0px 8px; margin-left: 5px;border-radius: 4px;}
.myIndicate div.latee{ padding: 0px 5px 0px 5px;}.myIndicate div.latee span {background:#e11b00;padding: 0px 8px 0px 8px; margin-left: 5px;border-radius: 4px;}
.myIndicate div.absn{ padding: 0px 5px 0px 5px;}.myIndicate div.absn span {background:#F16D758F;padding: 0px 8px 0px 8px; margin-left: 5px;border-radius: 4px;}

</style>
  </head>
    <body class="ltr main-body leftmenu" onLoad="startTime()">
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
		<div id="global-loader"><img src="<?php echo base_url('/assets/img/loader.svg');?>" class="loader-img" alt="Loader"></div>
        <div class="page">
           <?php $this->load->view('employee/include/header'); ?>
           <?php $this->load->view('employee/include/left'); ?>
            <div class="main-content side-content pt-0">
                <div class="main-container container-fluid">
                    <div class="inner-body">
                        <div class="ami_toast tst_warning" style="top:72px;"><i class="bx bx-error"></i> ami popup notification</div>
                        <?php //print_r($this->session->userdata('name'));?>
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Reporting Manager</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item active" aria-current="page"><?php print_r($this->session->userdata('mi_name'));?></li>
								</ol>
							</div>
							<div class="d-flex">
								<div class="justify-content-center">
									<a href="<?php echo base_url('employee/dashboard');?>" class="btn btn-success btn-icon-text my-2 me-2" title="Dashboard"> <i class="ti-home"></i> Dashboard </a>
									 <button type="button" class="btn btn-primary btn-icon-text my-2 me-2" title="Current Time"> <i class="ti-timer"></i> <span  id="miClock">Current Time</span> </button>
									<a href="<?php echo base_url('auth/login/signout');?>" class="btn btn-danger btn-icon-text  my-2 me-2" title="Sign Out">
									  <i class="fe fe-power me-2"></i> Sign Out
									</a>
								</div>
							</div>
						</div>
	 <!-------------------- @mit Code Changes Here Start -------------------->
        <div class="row row-sm" style="margin:15px -10px 15px -10px;"> 
            <div class="col-lg-12 col-md-12">
                <div class="card">              
                    <div class="card-header custom-card-header border-0 ">
                        <h5 class="card-title">Team Attendance</h5>
                        <div class="card-options myIndicate">
                            <div class="latee">Late <span></span></div>
                            <div class="presnt">Present <span></span> </div>
                            <div class="absn">Absent <span></span></div>
                        </div>
                    </div>
                    <div class="card-body">   
                   		<form method="post" id="search_details">
                        <div class="row row-sm">
                            <div class="col-lg-7 col-md-7">
                                <div class="row"> 
                                  <div class="col-md-6"> 
                                  	<div class="form-group"><label class="form-label">Employee Name/ID : </label><input type="text" id="fieldSrchIDorName" name="fieldSrchIDorName" class="form-control miKeyUp" placeholder="Employee Name Or ID"/></div>   
                                  </div> 
                                  <div class="col-md-6">
                                   <div class="form-group"> 
                                        <label class="form-label">From:</label> 
                                         <div class="input-group">
                                            <div class="input-group-text border-end-0"><i class="fe fe-calendar lh--9 op-6"></i></div>
                                            <input type="text"  id="strtDt" name="strtDt" class="form-control fc-datepicker dtClean" placeholder="MM/DD/YYYY" >
                                        </div> 
                                       </div>
                                    </div>
                                </div>                                                                                            
                            </div>
                            <div class="col-lg-5 col-md-5">
                                <div class="row"> 
                                  <div class="col-md-8"> 
                                    <div class="form-group">
                                        <label class="form-label">To:</label> 
                                        <div class="input-group"><div class="input-group-text border-end-0"><i class="fe fe-calendar lh--9 op-6"></i></div>
                                            <input type="text" id="endDt" name="endDt"  class="form-control fc-datepicker dtClean" placeholder="MM/DD/YYYY">
                                        </div>
                                    </div>
                                  </div> 
                                  <div class="col-md-4">
                                     <div class="form-group">
                                         <label class="form-label">&nbsp;</label>  
                                  		 <button class="btn ripple btn-outline-success" type="button" onClick="getReport('1');"><i class="si si-magnifier"></i> Search </button>
                                     </div>
                                  </div>
                                </div>                                                                                            
                            </div>
                        </div>
                    </form>
                    </div>
                   <input type="hidden" id="target" value="<?php echo $target;?>" > 
					  <div class="card-body teamHead">
						<div class="table-responsive">
							<div id="emp-attendance_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">								
								<div class="row">
									<div class="col-sm-12">
                                            <table class="table text-nowrap text-md-nowrap table-bordered table-hover mg-b-0 " id="getReportMiDetails" data-id="<?php echo $target;?>">
                                                <thead class="ami_tHeader" id="setMonthWise"></thead>
                                                 <tbody id="employee-list">              
                                                     <!--<tr id="setMonthWise">
                                                      <td><div class="thCl">1.</div></td>
                                                        <td><div class="thCl">9004</div></td>
                                                        <td>Arav Singh</td>
                                                        <?php //for ($i = 1; $i <= $dayInMonth; $i++) : ?><td>
                                                                <div class="thCl"><div class="inOutDet"><div class="on_time">09:10:10</div><div class="on_time">18:00:10</div></div></div>
                                                         </td><?php //endfor; ?>
                                                        <td><div class="thCl">T. Present</div></td>
                                                        <td><div class="thCl">T. Absent</div></td>
                                                        <td><div class="thCl">T. Leave</div></td>
                                                    </tr>-->
                                                </tbody>
                                            </table>
									</div>
								</div>
							</div>
						</div>
                        <div id="list-pagination">Please Wait....</div>
					</div>
                </div>
            </div>
        </div>
     <!-------------------- @mit Code Changes Here End ---------------------->
                    </div>
                </div>
            </div>
            <div class="main-footer text-center">
				<div class="container">
					<div class="row row-sm">
						<div class="col-md-12">
							<span>Copyright © 2023 <a href="#"><?php echo system_info('company_name'); ?></a>. Designed by 
							<a href="https://camwel.com/"><?php echo system_info('company_name'); ?></a> All rights reserved.</span>
						</div>
					</div>
				</div>
			</div>
        </div>
		<a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>
		<input type="hidden" id="base_url" value="<?php echo base_url();?>" >
		<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/popper.min.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/sidemenu/sidemenu.js" id="leftmenu"></script>
		<script src="<?php echo base_url();?>assets/plugins/sidebar/sidebar.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/select2/js/select2.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/select2.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/jquery.maskedinput/jquery.maskedinput.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/spectrum-colorpicker/spectrum.js"></script>
		<script src="<?php echo base_url();?>assets/js/form-elements.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/sticky.js"></script>
        <script src="<?php echo base_url();?>assets/js/custom.js"></script>
        <script src="<?php echo base_url();?>assets/switcher/js/switcher.js"></script>
        <script src="<?php echo base_url() ?>assets/js/employee/data_custom.js"></script>
		<script src="<?php echo base_url('assets/js/employee/common.js');?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/dayjs@1.10.4/dayjs.min.js"></script>
        <script>
			$(function()
			{	 
	  			$(document).ready(function(){getReport(1);});	
 				});	
				function getReport(page)
				{	
					let toDate=$('#endDt').val();
					let fromDate=$('#strtDt').val();
					let is_toDate = moment(toDate, 'DD/MM/YYYY');
    				let is_fromDate = moment(fromDate, 'DD/MM/YYYY');
					 if(is_toDate.isBefore(is_fromDate)){toastMultiShow('tst_warning',['To date is greater than from date'],'<i class="fe fe-settings bx-spin"></i>');} 
					 else 
					 {
						$.post($('#getReportMiDetails').attr("data-id"),{page:page,toDate:toDate,fromDate:fromDate},function(htmlAmi)
						{
							var totalRows = htmlAmi.total_rows;
							var limit =htmlAmi.limit;
							var totalPages = Math.ceil(totalRows / limit);
							var dayInMonth=htmlAmi.dayInMonth;
							let shwInDate='';var tableHtml ='';
							let numRecord='<tr><th rowspan="2"><div class="thCl myNaming">S.No.</div></th><th rowspan="2"><div class="thCl myNaming">EMP. ID</div></th><th rowspan="2"><div class="thCl myNaming">EMPLOYEE NAME</div></th>';
							$.each(dayInMonth, function(i, dayInMonth){numRecord+='<th><div class="thCl">' + dayInMonth + '</div></th>';shwInDate+='<th><div class="thCl"><div class="inOutDet"><div>In</div><div>Out</div></div></div></th>';});
							numRecord+='<th rowspan="2"><div class="thCl myNaming">T. Present</div></th><th rowspan="2"><div class="thCl myNaming">T. Absent</div></th><th rowspan="2"><div class="thCl myNaming">T. Leave</div></th></tr><tr>';
							$("#setMonthWise").html(numRecord+shwInDate+'</tr>');
							$.each(htmlAmi.empDetails, function(i, employee)
							{
								tableHtml += '<tr><td><span style="padding-left:10px;font-weight:900">' + ((page - 1) * limit + i + 1) + '.</span></td>';
								for (let a = 0; a < employee.length; a++){tableHtml += '<td>' +((a==0)?('<span style="padding-left:10px;font-weight:600">'+ employee[a] +'</span>'):employee[a]) + '</td>';}
								tableHtml += '</tr>';
							});
							 $('#employee-list').html(tableHtml);
						 var paginationHtml = '<div class="row g-0 align-items-center pb-4"><div class="col-sm-6"><div><p class="mb-sm-0">Showing ' + ((page - 1) * limit + 1) + ' to ' + ((page * limit) > totalRows ? totalRows : (page * limit)) + ' of ' + totalRows + ' entries</p></div></div>';
							paginationHtml += '<div class="col-sm-6"><div class="float-sm-end"><ul class="pagination mb-sm-0">';
							paginationHtml += '<li class="page-item prev-btn" data-page="' + (page - 1) + '"> <a href="javascript:void(0);" class="page-link"> Previous </a> </li>';
							for (var i = 1; i <= totalPages; i++){paginationHtml += '<li class="page-item page-btn" id="arm'+i+'" data-page="' + i + '"> <a href="javascript:void(0);" class="page-link">' + i + '</a> </li>';}
							paginationHtml += '<li class="page-item next-btn" data-page="' + (page + 1) + '"> <a href="javascript:void(0);" class="page-link">Next</a> </li>';
							paginationHtml += '</ul></div></div></div>';				
							$('#list-pagination').html(paginationHtml);
							$('.page-btn').each(function() {if ($(this).data('page')===page){$(this).addClass('active');}else{$(this).removeClass('active');}});
							$('.page-btn').click(function(){var page=$(this).data('page');getReport(page);});
							$('.prev-btn').click(function(){var page=$(this).data('page');if(page >= 1){getReport(page);}});
							$('.next-btn').click(function(){var page=$(this).data('page');if(page <= totalPages) {getReport(page);}});
							if(page==1){$('.prev-btn').addClass('disabled');}else{$('.prev-btn').removeClass('disabled');}
							if(page==totalPages){$('.next-btn').addClass('disabled');}else{$('.next-btn').removeClass('disabled');}
							},'json');
						}
				}
					
		</script>
    </body>
</html>
