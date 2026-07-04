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
	.card .card-header .card-title::before {content:"";position:absolute;left:0px;padding:2px;height:30px;background:#6f42c1;}.countdowntimer{text-align: center;margin-top: 0.75rem;}
 
	:root{--mi-bar-color: #0e0e23;--mi-bar-bg-color: #fff;--mi-bar_color: #fff;}
	.table-responsive:hover{scrollbar-color: var(--mi-bar-color) var(--mi-bar-bg-color);}
	.table-responsive{overflow-x: scroll;scrollbar-width: thin;scrollbar-color: var(--mi-bar_color) var(--mi-bar-bg-color);}
	.table{ margin-bottom:10px;}
	.ami_tHeader{ background-color:#088;}
	.ami_tHeader > tr > th{ color:#FFFFFF !important;border: 1px solid #088 !important;padding: 12px 0px 12px 5px !important;}.ami_tHeader > tr{border: 1px solid #088 !important;}

</style>
    
    
 </head>

    <body class="ltr main-body leftmenu">
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
		<div id="global-loader">
			<img src="<?php echo base_url('/assets/img/loader.svg');?>" class="loader-img" alt="Loader">
		</div>
        <div class="page">
           <?php $this->load->view('employee/include/header'); ?>
           <?php $this->load->view('employee/include/left'); ?>
            <div class="main-content side-content pt-0">
                <div class="main-container container-fluid">
                    <div class="inner-body">
						<!-- Page Header -->
                        
                        <div class="ami_toast tst_warning" style="top:72px;"><i class="bx bx-error"></i> ami popup notification</div>
                        <?php //print_r($this->session->userdata('name'));?>
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5"><?php echo $title;?></h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item active" aria-current="page"><?php print_r($this->session->userdata('mi_name'));?></li>
								</ol>
							</div>
							<div class="d-flex">
								<div class="justify-content-center">
									
									<a href="<?php echo base_url('auth/login/signout');?>" class="btn btn-danger my-2 btn-icon-text">
									  <i class="fe fe-power me-2"></i> Sign Out
									</a>
								</div>
							</div>
						</div>
                       
                       <?php 
								if(!empty($layout) && trim($layout) !== ""){require_once($layout);}
								 else { 
						   
					   ?>
                       
                       
                         <!-------------------- @mit Code Changes Here Start -------------------->                     
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
                         
                         <?php }?>
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
        <script src="<?php echo base_url('assets/js/employee/appearance.js'); ?>"></script>
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
