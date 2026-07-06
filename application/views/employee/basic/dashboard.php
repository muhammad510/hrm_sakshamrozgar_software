<style>
.ami_toast_page,#toDt { display:none;}.ami_toast_page i{  padding:10px;border-radius: 20px;}.ami_toast_page ul{margin: -27px 0px 5px 10px; list-style:none;}

.ami_toast_page.alert-warning i{ background-color:#856404; color:#ffeeba;} 

.ami_toast_page.alert-success i{ background-color:#1f5c01; color:#d8efcc;} 
.ami_toast_page.alert-success ul{margin: -20px 0px 5px 10px !important;  }
.ami_toast_page.alert-success{ padding-top: 13px;padding-bottom: 5px;}
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
$(document).ready(function(){
startTime();
$(".form-control").keyup(function()
{
 	$('.ami_toast_page').fadeOut();
});
$(".form-control").change(function() {
	$('.ami_toast_page').fadeOut();
});


  $(".arvActn").click(function()
  {
    let arAction=$(this).attr('id');
	if(arAction=='mrkPresentIn')// || arAction=='mrkPresentOut'
	{
		let arvTarget=$('#markPresent').text();$('#'+arAction).addClass('arvWidth').html('<i class="fe fe-settings bx-spin"></i> Wait..');
		$.post(arvTarget,{arAction:arAction,miClock:$('#miClock').text(),workFrm:$('#workFrm').val(),attRemarks:$('#attRemarks').val()},function(htmlAmi)
	    {	  
			
			//$('#arvResultSection').html(htmlAmi);	
			 if(htmlAmi.arvResult=='alert-success')
			  {
					$('#'+arAction).prop('id','complete').removeClass(htmlAmi.rmvCls+' arvWidth').addClass(htmlAmi.adCls).html(htmlAmi.actBtnTxt);
					$('#'+htmlAmi.othrBtn).addClass(htmlAmi.rmvCls).removeClass(htmlAmi.adCls).html(htmlAmi.actBtnTxt);  	
				}
				 else
				 {
					 $('#'+arAction).removeClass('arvWidth').html(htmlAmi.nBtnTxt);
					 }
					toastShowInPage(htmlAmi.arvResult,htmlAmi.msg, htmlAmi.icon);
				},'json');
		}
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
   // setTimeout(function() { $('.ami_toast_page').hide(); }, 2000);
}

</script>

<div class="inner-body">                       
	<div class="page-header d-xxl-flex d-block">
  <div class="page-leftheader">
  	<div class="page-title">Employee<span class="fw-normal text-muted ms-2">Dashboard</span></div> 
  </div>
<div class="page-rightheader mt-0 mt-xxl-0 arvMtp">
   <div class="d-flex align-items-center flex-wrap my-auto end-content breadcrumb-end gap-1">
      <a href="javascript:void(0);" class="btn btn-outline-primary me-2 my-md-0 my-1" data-bs-toggle="modal" data-bs-target="#applyleaves">
          <i class="si si-plane"></i> Apply Leaves
      </a> 
        <div class="d-flex flex-wrap gap-2 miCalTime">
              <span> <i class="ti-calendar"></i> <?php echo date('d-M-Y');?></span><span id="miArvClk"><i class="ti-timer"></i>  9:29 am</span>
        </div> 
        <div class="d-flex gap-2"> 
            <button class="btn ripple fntMi btn-outline-success " data-bs-toggle="modal" data-bs-target="#clockinmodal">
               <?php if($getAttendance){if($getAttendance['log_in_time']==""){?> <i class="fe fe-sunrise"></i> Clock In<?php }else{?><i class="fe fe-sunset"></i> Clock Out<?php }}?>
             </button>
              <a href="mailto:<?php echo system_info('email'); ?>" class="btn ripple btn-outline-secondary">
                     <i class="fe fe-mail"></i>
              </a>
               <a href="tel:<?php echo system_info('phone'); ?>" class="btn ripple btn-outline-info">
                    <i class="fe fe-phone-call"></i>
               </a> 
               <button class="btn ripple btn-outline-dark" data-bs-placement="top" data-bs-toggle="tooltip" aria-label="Info" data-bs-original-title="Info">
                    <i class="fe fe-info"></i>
               </button>
            </div>
    </div>
  </div>
</div>
<!--------------------------------------@mit Emp Dashboard Start------------------------------------------------->                        
<div class="row row-sm">
  <div class="col-sm-12">
    <div class="card custom-card" style="font-weight: bold;"> 
        <div class="card-header p-3 tx-medium my-auto tx-white bg-success">
            @m!t Testing phase
        </div> 
    	<div class="card-body">    
			<?php 
                   
				   print_r($getAttendance);
				    //SELECT id,name,dob FROM staff where dob like '%-12-%' 
                    //SELECT id,name,dob FROM staff where dob like '%-%-22'
                    //print_r($empUpComingBdy);
                    
                    //echo "<br>SELECT id,name,dob FROM staff where dob like '%-".date('m')."-%'";
					
				
            ?>
       </div>   
    </div>	  
  </div>
</div>	
	
	<!--<div class="row row-sm">
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card custom-card">
            <div class="card-body">
                <div class="card-item">
                    <div class="card-item-icon card-icon">
                        <svg class="text-primary" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24">
                            <g>
                                <rect height="14" opacity=".3" width="14" x="5" y="5"></rect>
                                <g>
                                    <rect fill="none" height="24" width="24"></rect>
                                    <g>
                                        <path d="M19,3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.1,3,19,3z M19,19H5V5h14V19z"></path>
                                        <rect height="5" width="2" x="7" y="12"></rect>
                                        <rect height="10" width="2" x="15" y="7"></rect>
                                        <rect height="3" width="2" x="11" y="14"></rect>
                                        <rect height="2" width="2" x="11" y="10"></rect>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="card-item-title mb-2">
                        <label class="main-content-label tx-13 font-weight-bold mb-1">Completed Project</label>
                     </div>
                    <div class="card-item-body">
                        <div class="card-item-stat">
                            <h4 class="font-weight-bold">99</h4>
                            <small><b class="text-success">55%</b> higher</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card custom-card">
            <div class="card-body">
                <div class="card-item">
                    <div class="card-item-icon card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                            <path d="M0 0h24v24H0V0z" fill="none"></path>
                            <path d="M12 4c-4.41 0-8 3.59-8 8 0 1.82.62 3.49 1.64 4.83 1.43-1.74 4.9-2.33 6.36-2.33s4.93.59 6.36 2.33C19.38 15.49 20 13.82 20 12c0-4.41-3.59-8-8-8zm0 9c-1.94 0-3.5-1.56-3.5-3.5S10.06 6 12 6s3.5 1.56 3.5 3.5S13.94 13 12 13z" opacity=".3"></path>
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM7.07 18.28c.43-.9 3.05-1.78 4.93-1.78s4.51.88 4.93 1.78C15.57 19.36 13.86 20 12 20s-3.57-.64-4.93-1.72zm11.29-1.45c-1.43-1.74-4.9-2.33-6.36-2.33s-4.93.59-6.36 2.33C4.62 15.49 4 13.82 4 12c0-4.41 3.59-8 8-8s8 3.59 8 8c0 1.82-.62 3.49-1.64 4.83zM12 6c-1.94 0-3.5 1.56-3.5 3.5S10.06 13 12 13s3.5-1.56 3.5-3.5S13.94 6 12 6zm0 5c-.83 0-1.5-.67-1.5-1.5S11.17 8 12 8s1.5.67 1.5 1.5S12.83 11 12 11z"></path>
                        </svg>
                    </div>
                    <div class="card-item-title mb-2">
                        <label class="main-content-label tx-13 font-weight-bold mb-1">On Going Project</label>
                    </div>
                    <div class="card-item-body">
                        <div class="card-item-stat">
                            <h4 class="font-weight-bold">15</h4>
                            <small><b class="text-success">5%</b> Increased</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3">
        <div class="card custom-card">
            <div class="card-body">
                <div class="card-item">
                    <div class="card-item-icon card-icon">
                        <svg class="text-primary" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                            <path d="M0 0h24v24H0V0z" fill="none"></path>
                            <path d="M12 4c-4.41 0-8 3.59-8 8s3.59 8 8 8 8-3.59 8-8-3.59-8-8-8zm1.23 13.33V19H10.9v-1.69c-1.5-.31-2.77-1.28-2.86-2.97h1.71c.09.92.72 1.64 2.32 1.64 1.71 0 2.1-.86 2.1-1.39 0-.73-.39-1.41-2.34-1.87-2.17-.53-3.66-1.42-3.66-3.21 0-1.51 1.22-2.48 2.72-2.81V5h2.34v1.71c1.63.39 2.44 1.63 2.49 2.97h-1.71c-.04-.97-.56-1.64-1.94-1.64-1.31 0-2.1.59-2.1 1.43 0 .73.57 1.22 2.34 1.67 1.77.46 3.66 1.22 3.66 3.42-.01 1.6-1.21 2.48-2.74 2.77z" opacity=".3"></path>
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.31-8.86c-1.77-.45-2.34-.94-2.34-1.67 0-.84.79-1.43 2.1-1.43 1.38 0 1.9.66 1.94 1.64h1.71c-.05-1.34-.87-2.57-2.49-2.97V5H10.9v1.69c-1.51.32-2.72 1.3-2.72 2.81 0 1.79 1.49 2.69 3.66 3.21 1.95.46 2.34 1.15 2.34 1.87 0 .53-.39 1.39-2.1 1.39-1.6 0-2.23-.72-2.32-1.64H8.04c.1 1.7 1.36 2.66 2.86 2.97V19h2.34v-1.67c1.52-.29 2.72-1.16 2.73-2.77-.01-2.2-1.9-2.96-3.66-3.42z"></path>
                        </svg>
                    </div>
                    <div class="card-item-title  mb-2">
                        <label class="main-content-label tx-13 font-weight-bold mb-1">Total Attendance</label>
                        
                    </div>
                    <div class="card-item-body">
                        <div class="card-item-stat">
                            <h4 class="font-weight-bold">$8,500</h4>
                            <small><b class="text-danger">12%</b> decrease</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3">
        <div class="card custom-card">
            <div class="card-body">
                <div class="card-item">
                    <div class="card-item-icon card-icon">
                        <svg class="text-primary" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                            <path d="M0 0h24v24H0V0z" fill="none"></path>
                            <path d="M12 4c-4.41 0-8 3.59-8 8s3.59 8 8 8 8-3.59 8-8-3.59-8-8-8zm1.23 13.33V19H10.9v-1.69c-1.5-.31-2.77-1.28-2.86-2.97h1.71c.09.92.72 1.64 2.32 1.64 1.71 0 2.1-.86 2.1-1.39 0-.73-.39-1.41-2.34-1.87-2.17-.53-3.66-1.42-3.66-3.21 0-1.51 1.22-2.48 2.72-2.81V5h2.34v1.71c1.63.39 2.44 1.63 2.49 2.97h-1.71c-.04-.97-.56-1.64-1.94-1.64-1.31 0-2.1.59-2.1 1.43 0 .73.57 1.22 2.34 1.67 1.77.46 3.66 1.22 3.66 3.42-.01 1.6-1.21 2.48-2.74 2.77z" opacity=".3"></path>
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.31-8.86c-1.77-.45-2.34-.94-2.34-1.67 0-.84.79-1.43 2.1-1.43 1.38 0 1.9.66 1.94 1.64h1.71c-.05-1.34-.87-2.57-2.49-2.97V5H10.9v1.69c-1.51.32-2.72 1.3-2.72 2.81 0 1.79 1.49 2.69 3.66 3.21 1.95.46 2.34 1.15 2.34 1.87 0 .53-.39 1.39-2.1 1.39-1.6 0-2.23-.72-2.32-1.64H8.04c.1 1.7 1.36 2.66 2.86 2.97V19h2.34v-1.67c1.52-.29 2.72-1.16 2.73-2.77-.01-2.2-1.9-2.96-3.66-3.42z"></path>
                        </svg>
                    </div>
                    <div class="card-item-title  mb-2">
                        <label class="main-content-label tx-13 font-weight-bold mb-1">Total Absent</label>
                       
                    </div>
                    <div class="card-item-body">
                        <div class="card-item-stat">
                            <h4 class="font-weight-bold">$8,500</h4>
                            <small><b class="text-danger">12%</b> decrease</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->
     
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
		 		<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#applyleaves" class="btn ripple btn-outline-primary">Apply For Leave</a>
	     </div>
      </div>
	   <div class="table-responsive leave_table fs13 mt-4">
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
				<table class="table card-table table-vcenter text-nowrap mb-0  border">
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
<!--------------------------------------@mit Emp Dashboard End-------------------------------------------------> 
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
				     <div class="ami_toast_page alert" id="arvResultSection"></div>
					<div class="col-12">
					 <div class="countdowntimer text-center"> <div class="mt-3 d-flex justify-content-center fs-30 digital-clock" id="miClock">22:17:55</div> <label class="form-label">Current Time</label> </div>
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
					</div>
				</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn ripple btn-outline-secondary" data-bs-dismiss="modal" type="button"><i class="si si-close"></i> Close</button>
				<button class="btn ripple btn-outline-primary arvActn" id="mrkPresentIn" type="button"><i class="si si-clock"></i> Clock In</button>
			</div>
		</div>
	</div>
</div>


 				
<!-- Leave Apply start -->
<div class="modal" id="applyleaves">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-content-demo">
			<div class="modal-header">
				<h6 class="modal-title">Apply Leaves</h6>
				<button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
					<i class="ion-fork-repo"></i>				
				</button>
			</div>
			<div class="modal-body">
				<div class="row row-sm">
					<div class="col-md-6">
					  <label>Leaves Dates:<span class="text-danger">*</span></label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="ti-user eIcn"></i></span>
							</div>
							<div class="miSlwdth" style="width:80%"> 
								  <select class="form-control custom-select select2 arvOnChange" name="leavePattern" id="leavePattern">
									<option value=""> --- Select One --- </option>
									<option value="1">Single Leave</option>
									<option value="2">Multi Leaves</option>
								  </select>
							   </div>
						</div>
					</div>
                    <div class="col-md-6">
					  <label>Leave Types:<span class="text-danger">*</span></label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="ti-user eIcn"></i></span>
							</div>
							<div class="miSlwdth" style="width:80%"> 
								  <select class="form-control custom-select select2 " name="leaveType" id="leaveType">
									<option value=""> --- Select One --- </option>
									<?php 
											if($leaveManage)
											{
											foreach($leaveManage as $lvList)
											{
										?>
                                    		<option value="<?php echo $lvList['id'];?>"><?php echo $lvList['leave_name'];?></option>
											<?php }}else{?>
                                              <option value="not">No available</option>
                                           <?php }?>
                                    
									
								  </select>
							   </div>
						</div>
					</div>
                    <div class="col-12">
					  <label><span id="lvDateType">Leave Date</span>: <span class="text-danger">*</span></label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="ti-calendar eIcn"></i></span>
							</div>
							<input type="text" class="form-control fc-datepicker hasDatepicker" placeholder="<?php echo date('d-m-Y');?>">
						</div>
					</div>
                    <div class="col-12" id="toDt">
					  <label>To Date: <span class="text-danger">*</span></label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="ti-calendar eIcn"></i></span>
							</div>
							<input type="text" class="form-control choose-date flatpickr-input" placeholder="06 Mar 2020">
						</div>
					</div> 
                    <div class="col-12">
                        <label>Reason:<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ti-map eIcn"></i></span>
                            </div>
                           <textarea type="text" name="address" id="address" class="form-control" placeholder="Please Enter Your Address...">Patna</textarea>
                        </div>
                    </div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn ripple btn-outline-secondary" data-bs-dismiss="modal" type="button"><i class="si si-close"></i> Close</button>
				<button class="btn ripple btn-outline-primary" type="button"><i class="ti-save"></i> Apply</button>
			</div>
		</div>
	</div>
</div>
<!-- Leave Apply start -->
<script src="<?php echo base_url();?>assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jquery.maskedinput/jquery.maskedinput.js"></script>
<script src="<?php echo base_url();?>assets/plugins/spectrum-colorpicker/spectrum.js"></script>
<script src="<?php echo base_url();?>assets/js/form-elements.js"></script>
<script src="<?php echo base_url();?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>
<script>
	$(document).ready(function(){
	  $(".arvOnChange").change(function()
	  {
			let actNbtn = $(this).attr('id');
			if(actNbtn=='leavePattern')
			{
				let getVl=$('#'+actNbtn).val();if(getVl=='1'){$('#toDt').hide();}else{$('#toDt').show();}
				if($('#toDt').is(":hidden")){$('#lvDateType').html('Leave Date');}else{$('#lvDateType').html('From Date');}		
			}
	  });
	});

</script>				
					
					
					