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
	

/*#toDt { display:none;}*/.ami_toast_page i{  padding:10px;border-radius: 20px;margin: -5px 0px -5px -10px;}.ami_toast_page ul{margin: -27px 0px 5px 10px; list-style:none;}

.ami_toast_page{display:none;}


.ami_toast_page.alert-warning i{ background-color:#856404; color:#ffeeba;} 

.ami_toast_page.alert-success i{ background-color:#1f5c01; color:#d8efcc;} 
.ami_toast_page.alert-success ul{margin: -20px 0px 5px 10px !important;  }
.ami_toast_page.alert-success{ padding-top: 13px;padding-bottom: 11px;}
.arvMtp{margin-top: 8px !important;}

.ami_toast_page.alert-danger i{ background-color:#721c24; color:#f8d7da;} 



.miImgCir img{ border-radius: 5px;border: 1px solid #a7a9ac24;padding: 1px;height: 3.3rem;width: 100vh;}
.bdMr{padding-bottom: 10px !important;border-bottom: 1px solid #e7eee8;}.bdNotify i{ padding: 9px 10px 10px 10px; background-color: #721c24;color: #f5c6cb;border-radius: 20px;}
.miYrLbl{color: #00619b;padding-left: 5px;font-weight: bold;}.form-control[readonly] {background-color: #fff !important;}#miClock{ font-weight:900;color:#432FB3;}.eIcn {color: #00A412;}.miCalTime{width:18.9rem;height: 2.45rem;}.miCalTime span i{ color:#fff;background-color: #bd9700;padding: 10px 10px 13px 10px;margin-right: 10px;border-top-left-radius: 3px;border-bottom-left-radius: 3px;}.miCalTime span{ background-color:#FFFFFF;width:48%;padding:.5rem 0px 0px 0px;font-weight:bold;color: #a26100;border: 1px solid #bd9700; border-radius: 5px;}
:root{
--success-rgb:13, 205, 148;--purple-rgb:170,76,242;--orange-rgb:243,73,50;--warning-rgb:227, 177, 19;--pink-rgb:239,78,184;
--mi-bar-color: #0e0e23;--mi-bar-bg-color: #fff;--mi-bar_color: #fff;
	}
.comming_holidays.calendar-icon .date_time {display: block;height: 3.313rem;width: 3.313rem;}
.calendar-icon .date_time {display: block;height: 45px;width: 45px;border-radius: 8px;text-align: center;font-size: 13px;}
.mi-success-transparent {background-color: rgba(var(--success-rgb),.1) !important;color: rgb(var(--success-rgb)) !important;}
.mi-purple-transparent {background-color: rgba(var(--purple-rgb),.1) !important;color: rgb(var(--purple-rgb)) !important;}
.mi-orange-transparent {background-color: rgba(var(--orange-rgb),.1) !important;color: rgb(var(--orange-rgb)) !important;}
.mi-warning-transparent {background-color: rgba(var(--warning-rgb),.1) !important;color: rgb(var(--warning-rgb)) !important;}
.mi-pink-transparent {background-color: rgba(var(--pink-rgb),.1) !important;color: rgb(var(--pink-rgb)) !important;}
.fs20 {  font-size: 1.25rem !important;}.fs13 {font-size: .8125rem;}.calendar-icon span {display: block;font-weight: 500;}
.date{ margin:5px 0px 0px 0px;}.month{ margin:-8px 0px 0px 0px;}


.h-3 {height: .75rem !important;}.w-3 {width: .75rem !important;}.bg-primary{background-color: var(--primary-color) !important;color: #fff;}
.rounded-circle{border-radius: 50% !important;}
.bg-primary {--bs-bg-opacity: 1;background-color: rgba(var(--bs-primary-rgb),var(--bs-bg-opacity)) !important;}
.me-3 {margin-right: 1rem !important;}

.overflow-auto:hover{scrollbar-color: var(--mi-bar-color) var(--mi-bar-bg-color);}
.overflow-auto{scrollbar-width: thin;scrollbar-color: var(--mi-bar_color) var(--mi-bar-bg-color);}
.hldy:hover{scrollbar-color: var(--mi-bar-color) var(--mi-bar-bg-color);}
.hldy{scrollbar-width: thin;scrollbar-color: var(--mi-bar_color) var(--mi-bar-bg-color);}

.h-8{height: 4rem !important;}.w-8{width: 4rem !important;}
.rounded-4{border-radius: var(--bs-border-radius-xl) !important;}
.me-3 {margin-right: 1rem !important;}	
.ui-datepicker{ z-index:999999 !important;}	

</style>
  <script>
function startTime() {
  const today = new Date();
  let h = today.getHours();
  let m = today.getMinutes();
  let s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('miClock').innerHTML =  h + ":" + m + ":" + s;
  document.getElementById('miArvClk').innerHTML =  '<i class="ti-timer"></i> '+h + ":" + m + ":" + s;
  setTimeout(startTime, 1000);
}
function checkTime(i){if(i< 10) {i="0"+i};return i;}
$(document).ready(function()
{
	startTime();
	$(".form-control").keyup(function(){$('.ami_toast_page').fadeOut();});
	$(".form-control").change(function(){$('.ami_toast_page').fadeOut();});


  $(".arvActn").click(function()
  {
    let arAction=$(this).attr('id');
	if(arAction=='mrkPresentIn')// || arAction=='mrkPresentOut'
	{
		let arvTarget=$('#markPresent').text();$('#'+arAction).addClass('arvWidth').html('<i class="fe fe-settings bx-spin"></i> Wait..');
		$.post(arvTarget,{arAction:arAction,miClock:$('#miClock').text(),workFrm:$('#workFrm').val(),getPosition:$('#getPosition').val(),attRemarks:$('#attRemarks').val()},function(htmlAmi)
	    {	  
			
			//$('#arvResultSection').html(htmlAmi);	
			 if(htmlAmi.arvResult=='alert-success')
			  {
					$('#'+arAction).prop('id','complete').removeClass(htmlAmi.rmvCls+' arvWidth').addClass(htmlAmi.adCls).html(htmlAmi.actBtnTxt);
					$('#'+htmlAmi.othrBtn).addClass(htmlAmi.rmvCls).removeClass(htmlAmi.adCls).html(htmlAmi.actBtnTxt);
					setTimeout(function(){window.location.reload(1);},2000);	
				}
				 else
				 {
					 $('#'+arAction).removeClass('arvWidth').html(htmlAmi.nBtnTxt);
					 }
					 $('#arvResultSection').removeClass(htmlAmi.rmvCls).addClass(htmlAmi.arvResult).html(htmlAmi.icon+' '+htmlAmi.msg).fadeIn();
					 setTimeout(function(){$("#arvResultSection").fadeOut();}, 3000);
					//toastShowInPage(htmlAmi.arvResult,htmlAmi.msg, htmlAmi.icon);
				},'json');
		}
	/*else if(arAction=='frmDate')
	{
		let frmDt=$('#frmDate').val();
		//let newDate=frmDt.spilt('/');
		$('#toDate').attr("placeholder", frmDt);	
		}*/	
			
  });
});


function toastShowInPage(adCls,msg,icon) {
    let valid = '';
    let myClass = "alert-danger alert-success alert-warning alert-info";
    let restCls = myClass.replace(adCls, " ");
    let addonMsg = '';
    $.each(msg, function(i, item) { valid += '<li>' + item + '</li>'; });
    if (adCls == 'alert-success') { addonMsg = icon + ' <ul>' + valid + '</ul>'; } else if (adCls == 'alert-danger') { addonMsg = icon + ' <ul>' + valid + '</ul>'; } else if (adCls == 'alert-warning') { addonMsg = icon + ' <ul>' + valid + '</ul>'; }else{addonMsg = icon + ' <ul>' + valid + '</ul>';}
    $('.ami_toast_page').html(addonMsg).addClass(adCls+' miError').removeClass(restCls).show();
    setTimeout(function() { $('.ami_toast_page').hide(); }, 2000);
}




</script>  
    
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
						<!--------------------------------------@mit Emp Dashboard Start-------------------------------------------------> 
                            <div class="page-header d-xxl-flex d-block">
                                <div class="page-leftheader">
                                      <div class="page-title">Employee<span class="fw-normal text-muted ms-2">Dashboard</span></div> 
                                </div>
                                <div class="page-rightheader mt-0 mt-xxl-0 arvMtp">
                                <div class="d-flex align-items-center flex-wrap my-auto end-content breadcrumb-end gap-1">
                                      <a href="<?php echo base_url('employee/leave/apply');?>" class="btn btn-outline-primary me-2 my-md-0 my-1">
                                          <i class="si si-plane"></i> Apply Leaves
                                      </a> 
                                      <div class="d-flex flex-wrap gap-2 miCalTime">
                                          <span> <i class="ti-calendar"></i> <?php echo date('d-M-Y');?></span><span id="miArvClk"><i class="ti-timer"></i>  9:29 am</span>
                                      </div> 
                                    <div class="d-flex gap-2"> 
                                        <button class="btn ripple fntMi btn-outline-success " data-bs-toggle="modal" data-bs-target="#clockinmodal">
                                           <?php if($getAttendance){if($getAttendance['log_in_time']==""){?> <i class="fe fe-sunrise"></i> Punch In
                                           <?php }else{?><i class="fe fe-sunset"></i> Punch Out<?php }}?>
                                         </button>
                                          <a href="mailto:<?php echo config_item('email'); ?>" class="btn ripple btn-outline-secondary">
                                                 <i class="fe fe-mail"></i>
                                          </a>
                                           <a href="tel:<?php echo config_item('mobile_number'); ?>" class="btn ripple btn-outline-info">
                                                <i class="fe fe-phone-call"></i>
                                           </a> 
                                           <button class="btn ripple btn-outline-dark"> <i class="fe fe-info"></i></button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="row row-sm" style="display:none;">
                              <div class="col-sm-12">
                                <div class="card custom-card" style="font-weight: bold;"> 
                                    <div class="card-header p-3 tx-medium my-auto tx-white bg-success">
                                        @m!t Testing phase
                                    </div> 
                                    <div class="card-body" id="miTestingResult">    
                                        <?php 
                                               
                                            if($getAttendance){ echo 'Attendance complete';}else{ echo 'Make attendance';}
											 //  print_r($getAttendance);
											 //  echo $this->db->last_query().'<br>';
                                                //SELECT id,name,dob FROM staff where dob like '%-12-%' 
                                                //SELECT id,name,dob FROM staff where dob like '%-%-22'
                                                //print_r($empUpComingBdy);
                                                
                                                //echo "<br>SELECT id,name,dob FROM staff where dob like '%-".date('m')."-%'";
                                         ?>
                                   </div>   
                                </div>	  
                              </div>
                            </div>	
                            <div class="row"> 
                                <div class="col-xl-3 col-lg-12 col-md-12"> 
                                    <div class="card custom-card"> 
                                        <div class="card-header border-0"> <h4 class="card-title">Calendar</h4> </div> 
                                         <div class="card-body">
                                                <div class="overflow-auto">
                                                    <div class="wd-276" style="margin-bottom:10px;">
                                                        <div class="fc-datepicker"></div>
                                                    </div>
                                                </div>             
                                         </div>
                                      </div>
                                </div> 
                                <div class="col-xl-4 col-lg-12 col-md-12">
                                 		<div class="card custom-card">
                                  <div class="card-header border-0"> <h4 class="card-title">This Month Holidays</h4> </div> 
                                  <div class="card-body mt-1"> 
                                     <div <?php if( count($thisMonthHoliday) >4){?> class="hldy" style="height:293px;overflow-y:auto;margin-right:-25px;padding-right: 15px;" <?php }?>>
                                      <?php
                                            //echo count($thisMonthHoliday);
                                        if($thisMonthHoliday)
                                        {
                                            $noClrCnt=0;
                                            $clrNotifyArr=array('mi-success-transparent','mi-purple-transparent','mi-warning-transparent','mi-pink-transparent');
                                            foreach($thisMonthHoliday as $isHday)
                                            {
                                                //print_r($isHday['holiday_name']);echo '<br>';
                                                $nHoliDy=date('Y').'-'.date('m-d',strtotime($isHday['holiday_date']));
                                                if($nHoliDy >date('Y-m-d'))
                                                {
                                                     $holidayDiff=abs(round((strtotime($nHoliDy)-strtotime(date('Y-m-d')))/86400)); 
                                                     if($holidayDiff=='1'){$nHdyLeft=$holidayDiff. ' day to left';}else{$nHdyLeft=$holidayDiff. ' days to left';}
                                                    }else{$nHdyLeft='<label style="color:#ca4c00">Completed</label>';}
                                                    
                                                if($isHday['holiday_name']=='Office Off'){$hdEfct='mi-orange-transparent';}
                                                else{$noClrCnt++;$chosClr=rand(1,4)-$noClrCnt;if($chosClr <0){$chosClr=1;}else{$chosClr=$chosClr;}$hdEfct=$clrNotifyArr[$chosClr];}	
                                            ?>
                                            <div class="mb-4"> 
                                                <div class="d-flex comming_holidays calendar-icon icons"> 
                                                    <span class="date_time <?php echo $hdEfct;?> rounded-3 me-3">
                                                        <span class="date fs20"><?php echo date('d',strtotime($isHday['holiday_date']));?></span> 
                                                        <span class="month fs13" style="text-transform:uppercase"><?php echo date('M',strtotime($isHday['holiday_date']));?></span> 
                                                    </span> 
                                                    <div class="me-3 mt-0 mt-sm-1 d-block">
                                                     <h6 class="mb-1 fw-medium"><?php echo $isHday['description'];?></h6> 
                                                        <span class="clearfix"></span> <small><?php echo $isHday['holiday_name'];?></small> 
                                                    </div>
                                                     <p class="float-end text-muted  mb-0 fs13 ms-auto rounded-3 my-auto"><?php echo $nHdyLeft;?></p>
                                                </div>
                                            </div>
                                        <?php }}else{?>
                                                <div class="mb-4 mi-orange-transparent rounded-3"> 
                                                    <div class="d-flex comming_holidays calendar-icon icons"> 
                                                        <span class="date_time mi-orange-transparent rounded-3 me-3"><span class="date fs20">X</span><span class="month fs13">FEB</span></span> 
                                                        <div><h6 class="mb-1 fw-medium" style="padding-top:5px;">Ooops</h6><span class="clearfix"></span> <small>There is no holiday this month</small></div>
                                                    </div>
                                                </div>
                                         <?php }?>
                                      </div>
                                    </div> 
                                 </div>
                         		 </div>  
                                <div class="col-xl-5 col-lg-12 col-md-12"> 
                                    <div class="card custom-card">
                                     <div class="card-header justify-content-between border-0"> <h4 class="card-title">Leave Balance</h4> 
                                     <div style="float:right;margin-top:-2.3rem;"> 
                                            <a href="<?php echo base_url('employee/leave/apply');?>" class="btn ripple btn-outline-primary">Apply For Leave</a>
                                     </div>
                                  </div>
                                   <div class="table-responsive leave_table fs13 mt-4" style="min-height: 230px !important;">
                                    <table class="table mb-0 text-nowrap">
                                        <thead class="border-top">
                                            <tr>
                                                <th class="text-start">Balance</th>
                                                <th class="text-start">Used</th>
                                                <th class="text-center">Available</th>
                                                <th class="text-center">Allowance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="fs-15">
                                               <td class="text-center d-flex"><span class="bg-primary rounded-circle d-block me-3 mt-1 h-3 w-3"></span><span class="fw-medium fs-15">Vacation</span></td>
                                               <td class="fw-medium fs-15">16.5</td><td class="text-center text-muted fs-15">3.5</td>
                                               <td class="text-center text-muted">20</td>
                                            </tr>
                                            <tr class="fs-15">
                                                <td class="text-center d-flex"><span class="bg-orange rounded-circle d-block me-3 mt-1 h-3 w-3"></span><span class="fw-medium fs-15">Sick Leave</span></td>
                                                <td class="fw-medium">4.5</td><td class="text-center text-muted">16</td><td class="text-center text-muted">20</td>
                                            </tr>
                                            <tr class="fs-15">
                                                <td class="text-center d-flex"><span class="bg-warning rounded-circle d-block me-3 mt-1 h-3 w-3"></span><span class="fw-medium fs-15">Unpaid leave</span></td>
                                                <td class="fw-medium">5</td><td class="text-center text-muted">360</td><td class="text-center text-muted">365</td></tr><tr class="fs-15">
                                                <td class="text-center d-flex"><span class="bg-info rounded-circle d-block me-3 mt-1 h-3 w-3"></span><span class="fw-medium fs-15">Work from Home</span></td>
                                                <td class="fw-medium">8</td><td class="text-center text-muted">22</td><td class="text-center text-muted">30</td>
                                            </tr> 
                                       </tbody>
                                    </table>
                                 </div> 
                                 <div class="row mb-0 pb-0"> 
                                    <div class="col-4 text-center py-4 border-end"> <h5>Vacation</h5> 
                                        <div class="justify-content-center text-center d-flex my-auto">
                                            <span class="text-primary fs20 fw-medium">8 <span class="my-auto fs-14 fw-normal text-muted op-5">/</span> 16</span>
                                        </div> 
                                    </div> 
                                    <div class="col-4 text-center py-4 border-end"> <h5>Sick leave</h5> 
                                        <div class="justify-content-center text-center d-flex my-auto">
                                            <span class="text-danger fs20 fw-medium">4.5 <span class="my-auto fs-14 fw-normal text-muted op-5">/</span> 10</span>
                                        </div> 
                                    </div> 
                                    <div class="col-4 text-center py-4"> 
                                        <h5>Unpaid leave</h5> 
                                        <div class="justify-content-center text-center d-flex my-auto">
                                            <span class="fs20 fw-medium">5 <span class="my-auto fs-14 fw-normal text-muted op-5">/</span> 365</span>
                                        </div>
                                    </div>
                                </div>
                              </div>
                             </div>
                            </div>    
                            <div class="row row-sm">
                               <div class="col-lg-7">
                                  <div class="card custom-card mg-b-20">
                                    <div class="card-header justify-content-between border-0"> <h4 class="card-title">Recent Job Application</h4></div>
                                    <div class="card-body">
                                        <div class="table-responsive tasks">
                                        
                                        	Coming Soon
                                        
                                            <table class="table card-table table-vcenter text-nowrap mb-0  border" style="display:none;">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-lg-10p">Task</th>
                                                        <th class="wd-lg-20p">Team</th>
                                                        <th class="wd-lg-20p text-center">Open task</th>
                                                        <th class="wd-lg-20p">Prority</th>
                                                        <th class="wd-lg-20p">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="font-weight-semibold d-flex"><label class="ckbox my-auto me-4 mt-1"><input checked="" type="checkbox"><span></span></label><span class="mt-1">Evaluating the design</span></td>
                                                        <td class="text-nowrap">
                                                            <div class="demo-avatar-group my-auto float-end">
                                                                <div class="main-img-user avatar-sm">
                                                                    <img alt="avatar" class="rounded-circle" src="<?php echo base_url();?>assets/img/users/1.jpg">
                                                                </div>
                                                                <div class="main-img-user avatar-sm">
                                                                    <img alt="avatar" class="rounded-circle" src="<?php echo base_url();?>assets/img/users/2.jpg">
                                                                </div>
                                                                <div class="main-img-user avatar-sm">
                                                                    <img alt="avatar" class="rounded-circle" src="<?php echo base_url();?>assets/img/users/3.jpg">
                                                                </div>
                                                                <div class="main-img-user avatar-sm">
                                                                    <img alt="avatar" class="rounded-circle" src="<?php echo base_url();?>assets/img/users/4.jpg">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">37<i class=""></i></td>
                                                        <td class="text-primary">High</td>
                                                        <td><span class="badge bg-pill bg-primary-light">Completed</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-weight-semibold d-flex"><label class="ckbox my-auto me-4"><input checked="" type="checkbox"><span></span></label><span class="mt-1"> Generate ideas for design</span></td>
                                                        <td class="text-nowrap">
                                                            <div class="demo-avatar-group my-auto float-end">
                                                                <div class="main-img-user avatar-sm">
                                                                    <img alt="avatar" class="rounded-circle" src="<?php echo base_url();?>assets/img/users/5.jpg">
                                                                </div>
                                                                <div class="main-img-user avatar-sm">
                                                                    <img alt="avatar" class="rounded-circle" src="<?php echo base_url();?>assets/img/users/6.jpg">
                                                                </div>
                                                                <div class="main-img-user avatar-sm">
                                                                    <img alt="avatar" class="rounded-circle" src="<?php echo base_url();?>assets/img/users/7.jpg">
                                                                </div>
                                                                <div class="main-img-user avatar-sm">
                                                                    <img alt="avatar" class="rounded-circle" src="<?php echo base_url();?>assets/img/users/8.jpg">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">37<i class=""></i></td>
                                                        <td class="text-secondary">Normal</td>
                                                        <td><span class="badge bg-pill bg-warning-light">Pending</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-weight-semibold d-flex"><label class="ckbox my-auto me-4"><input type="checkbox"><span></span></label><span class="mt-1">Define the problem</span></td>
                                                        <td class="text-nowrap">
                                                            <div class="demo-avatar-group my-auto float-end">
                                                                <div class="main-img-user avatar-sm">
                                                                    <img alt="avatar" class="rounded-circle" src="<?php echo base_url();?>assets/img/users/11.jpg">
                                                                </div>
                                                                <div class="main-img-user avatar-sm">
                                                                    <img alt="avatar" class="rounded-circle" src="<?php echo base_url();?>assets/img/users/12.jpg">
                                                                </div>
                                                                <div class="main-img-user avatar-sm">
                                                                    <img alt="avatar" class="rounded-circle" src="<?php echo base_url();?>assets/img/users/9.jpg">
                                                                </div>
                                                                <div class="main-img-user avatar-sm">
                                                                    <img alt="avatar" class="rounded-circle" src="<?php echo base_url();?>assets/img/users/10.jpg">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">37<i class=""></i></td>
                                                        <td class="text-warning">Low</td>
                                                        <td><span class="badge bg-pill bg-primary-light">Completed</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-weight-semibold d-flex"><label class="ckbox my-auto me-4"><input type="checkbox"><span></span></label><span class="mt-1">Empathize with users</span></td>
                                                        <td class="text-nowrap">
                                                            <div class="demo-avatar-group my-auto float-end">
                                                                <div class="main-img-user avatar-sm">
                                                                    <img alt="avatar" class="rounded-circle" src="<?php echo base_url();?>assets/img/users/7.jpg">
                                                                </div>
                                                                <div class="main-img-user avatar-sm">
                                                                    <img alt="avatar" class="rounded-circle" src="<?php echo base_url();?>assets/img/users/9.jpg">
                                                                </div>
                                                                <div class="main-img-user avatar-sm">
                                                                    <img alt="avatar" class="rounded-circle" src="<?php echo base_url();?>assets/img/users/11.jpg">
                                                                </div>
                                                                <div class="main-img-user avatar-sm">
                                                                    <img alt="avatar" class="rounded-circle" src="<?php echo base_url();?>assets/img/users/12.jpg">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">37<i class=""></i></td>
                                                        <td class="text-primary">High</td>
                                                        <td><span class="badge bg-pill bg-danger-light">Rejected</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                               </div>
                               <div class="col-lg-5">
                                  <div class="card custom-card mg-b-20">
                                    <div class="card-header justify-content-between border-0"> <h4 class="card-title">Up Coming Birthdays</h4></div>
                                    <div class="card-body">
                                    <?php
                                     if($empUpComingBdy)
                                     {
                                       
                                       foreach($empUpComingBdy as $bdy)
                                       {
                                            //print_r($bdy);echo '<br>';
                                            //$getPrevDay=date('m-d',strtotime("-1 days"));
                                            $dob = new DateTime($bdy->dob);
                                            $today   = new DateTime('today');
                                            $year = $dob->diff($today)->y;
                                            $month = $dob->diff($today)->m;
                                            $day = $dob->diff($today)->d;
                                            if($year=='1'){$year=$year.' Year old';}else{$year=$year.' Years old';}
                                            /*if($month=='1'){$month=$month. 'Month';}else{$month=$month. 'Months';}
                                            if($day=='1'){$day=$day. 'day';}else{$day=$day. 'days';}
                                            $currentYears=$year.$month.$day;*/
                                            
                                            $nDy=date('Y').'-'.date('m-d',strtotime($bdy->dob));
                                            if($nDy >date('Y-m-d'))
                                            {
                                                 $dayDiff=abs(round((strtotime($nDy)-strtotime(date('Y-m-d')))/86400)); 
                                                 if($dayDiff=='1'){$ndyLeft=$dayDiff. ' day to left';}else{$ndyLeft=$dayDiff. ' days to left';}
                                                }else{$ndyLeft='<label style="color:#ca4c00">Birthday gone</label>';}
                                            
                                            if(date('m-d',strtotime($bdy->dob))==date('m-d'))
                                            {$bdyBtn='<div class="btn-list"><button class="btn ripple btn-outline-secondary btn-with-icon" style="margin-top:8px;"><i class="ti-gift"></i> Wish Now </button>
                                                      </div>';
                                                }
                                                else{$bdyBtn='<p class="float-end text-muted  mb-0 fs13 ms-auto rounded-3 my-auto">'.$ndyLeft.'</p>';}
                                                if($bdy->image){$bdyImg=base_url($bdy->image);}else{$bdyImg=base_url('uploads/staff/profile/developer.png');}
                                                ?>
                                        
                                       <div class="mb-4 bdMr"> 
                                            <div class="d-flex comming_holidays calendar-icon icons"> 
                                                <span class="date_time mi-success-transparent rounded-3 me-3 miImgCir">
                                                     <img src="<?php echo $bdyImg;?>" alt="media1">
                                                </span> 
                                                <div class="me-3 mt-0 mt-sm-1 d-block">
                                                 <h6 class="mb-1 fw-medium"><a href="javascript:void(0);" class="mb-1 fw-medium fs-16"><?php echo $bdy->name;?></a></h6> 
                                                    <span class="clearfix"></span> 
                                                   <small><p class="text-muted mb-0"><?php echo date('d M',strtotime($bdy->dob)).' '.date('Y');?><label class="miYrLbl"><?php echo $year;?></label></p></small>
                                                </div>
                                                 <p class="float-end mb-0 ms-auto rounded-3 my-auto"><?php echo $bdyBtn;?></p>
                                            </div>
                                        </div>
                                        <?php }}else{?> <div class="alert alert-danger"><span class="bdNotify"><i class="ti-gift"></i></span> Oops it seems there is no recent birthday</div><?php }?>
                                    </div>
                                </div>
                               </div>
                            </div>
<div class="modal" id="clockinmodal">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title"><i class="si si-clock"></i> Clock In</h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                    <i class="ion-fork-repo"></i>				
                </button>
            </div>
            <div class="modal-body">
             <div id="markPresent" style="display:none;"><?php echo $markPresentAction;?></div>
                <div class="row row-sm">
                     
                    <div class="col-12">
                     <div class="countdowntimer text-center"> 
                     	<div class="mt-3 d-flex justify-content-center fs-30 digital-clock" id="miClock">22:17:55</div> 
                        <label class="form-label">Current Time</label>
                     </div>
                    </div>
                    <!--<div class="col-12">
                      <label>IP Address</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-screen-desktop eIcn"></i></span>
                            </div>
                            <input type="text" class="form-control" value="" readonly="">
                        </div>
                    </div>-->
                    <div class="col-12"><div class="ami_toast_page alert" id="arvResultSection">Here message will show to mark attendance</div></div>
                   <div class="col-12">
                      <label>Working From:<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ti-user eIcn"></i></span>
                            </div>
                            <div class="miSlwdth" style="width:91.5%"> 
                                  <select class="form-control custom-select select2 " name="workFrm" id="workFrm">
                                       <option value="0">Choose One</option>
                                       <option value="1" >Office</option>
                                       <option value="2" >Home</option>
                                       <option value="3" >Others</option>
                                 </select>
                               </div>
                        </div>
                    </div>	
                <div class="col-12">
                    <label>Notes:<span class="text-danger">*</span></label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="si si-speech eIcn"></i></span>
                        </div>
                        <textarea type="text" name="attRemarks" id="attRemarks" class="form-control" placeholder="Some text here.."></textarea>
                         <input type="hidden" name="getPosition" id="getPosition">
                    </div>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-outline-secondary" data-bs-dismiss="modal" type="button"><i class="si si-close"></i> Close</button>
                <?php if($getAttendance){if($getAttendance['log_in_time']==""){?>
                <button class="btn ripple btn-outline-success arvActn" id="mrkPresentIn" type="button">
                  <i class="fe fe-sunrise"></i> Clock In<?php }else{?>
                <button class="btn ripple btn-outline-success arvActn" id="mrkPresentOut" type="button">  
                  <i class="fe fe-sunset"></i> Clock Out<?php }}?></button>
            </div>
        </div>
    </div>
</div>
                            
                          
                            
                        <!--------------------------------------@mit Emp Dashboard End-------------------------------------------------> 
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
							<a href="https://camwel.com/"><?php echo system_info('company_name'); ?></a> All rights reserved.</span>
						</div>
					</div>
				</div>
			</div>
            <!-- END FOOTER -->
        </div>
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
       <script src="<?php echo base_url('assets/js/employee/common.js');?>"></script>
        <!-- END SCRIPTS -->
		<script>
		$(document).ready(function()
		{
			getAxisPosition();
			});
		function getAxisPosition(){if(navigator.geolocation){navigator.geolocation.getCurrentPosition(function(position){$('#getPosition').val(position.coords.latitude+","+position.coords.longitude);});}
else{alert('Geolocation is not supported by this browser.');}}	
		</script>
		
		
    </body>
</html>
