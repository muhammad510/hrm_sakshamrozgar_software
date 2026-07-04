<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<div class="inner-body">
<!-- Page Header -->
<div class="page-header">
  <div>
    <h2 class="main-content-title tx-24 mg-b-5"><?php echo $title; ?></h2>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="javascript:void(0);">View</a></li>
      <li class="breadcrumb-item active" aria-current="page">All</li>
    </ol>
  </div>
  <div class="d-flex">
    <div class="justify-content-center">
       <a href="<?php echo base_url('attendance/reportList');?>" class="btn btn-success btn-icon-text my-2 me-2" title="Attendance Overview">
       		 <i class="fe fe-list"></i> Overview 
       </a>
       <button type="button" class="btn btn-primary btn-icon-text my-2 me-2" id="miArvClk" title="Current Time"> <i class="fe fe-filter me-2"></i> Current Time </button>
       <a href="<?php echo base_url('auth/login/signout');?>" class="btn btn-danger btn-icon-text  my-2 me-2"  title="Sign Out"> <i class="fe fe-power me-2"></i> Sign Out </a>
    </div>
  </div>
</div>
<!-- End Page Header -->
<style>
.card .card-header .card-title::before {content:"";position:absolute;left:0px;padding:2px;height:30px;background:#6f42c1;}.countdowntimer{text-align: center;margin-top: 0.75rem;}.size_md {font-size: 30px;border-width: 5px;border-radius: 4px;}.mi-lebel{display: block;margin-bottom: 0.375rem;font-weight: 500;font-size: 0.875rem;color:rgb(29, 42, 87);}.fntMi{ font-size:12px; padding: 8px 10px 5px 10px;}.bg-working-mi {background: rgba(114, 155, 0, 0.25);color: #618400 !important;}.bg-success-mi {background: rgba(13, 205, 148, 0.25);color: #0dcd94 !important;}.bg-danger-mi {background:rgba(247, 40, 74, 0.25);color:#f7284a !important;}.bg-warning-mi{background: rgba(251, 197, 24, 0.25);color: #e3b113 !important;}.bg-orange-mi{background: rgba(243, 73, 50, 0.25);color: #f34932  !important;}.bg-holidy-mi{background: rgba(0, 115, 217, 0.25);color: #0073d9 !important;}
.bgPrsnt{background:rgba(13, 205, 148, 0.25);color:#007d58 !important;}.bgLat{ background-color:#f34932;}.bgAbsnt{ background-color:#f7284a;}.bgHoliDy{ background-color:#0073d9;}.bgHfDy{ background-color:#e3b113;}
.bgLvDy{ background-color:#009EA6;}.avMi-md {width: 2.5rem;height: 2.5rem;line-height: 2.5rem;font-size: 1rem;}.bradius {border-radius: 15%;}
.miBgs{width:3.5rem;padding:5px 0px 5px 0px;}
.avMi{width: 3rem;height: 3rem;line-height:3rem;position: relative;text-align: center;display: inline-block;color: #fff;font-weight: 600;vertical-align: bottom;font-size:1.3rem;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;}

.miFntSz{font-size: .9rem; color:#0E204E;}

.bdrBottom{ border-bottom:1px solid #e6e6e6;margin:0px -25px 30px -25px;}
.ami_tHeader > tr > th {color: #FFFFFF !important;border: 1px solid #088 !important;border-top-width: 1px;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: rgb(0, 136, 136);padding: 12px 0px 12px 5px !important;}
.ami_tHeader{ background-color:#088 }
.miBottom{margin-bottom: 75px;}
.dark-theme .bdrBottom{ border-bottom:1px solid #2d2d48;}
.dark-theme .ami_tHeader{ background-color:#025959}
.dark-theme .ami_tHeader > tr > th{border: 1px solid #027373 !important;}
.dark-theme .miFntSz{color:#cdcddf;}



.mSrchPnl{ margin:-1px 0px 0px 0px;position: absolute;width: 290px;z-index: 1;cursor: pointer; display:none;}
.mSrchPnl ul{ list-style:none;background-color:#fff; border: 1px solid #d9d9d9;border-bottom-left-radius: 6px;border-bottom-right-radius: 6px;-webkit-box-shadow: 0px 3px 5px 0px rgba(145,145,145,1);-moz-box-shadow: 0px 3px 5px 0px rgba(145,145,145,1);box-shadow: 0px 3px 5px 0px rgba(145,145,145,1);max-height: 230px;overflow-x: hidden;overflow-y: scroll;scrollbar-width: thin;scrollbar-color: #24839f #fff;}
.mSrchPnl ul li{ padding:8px 0px 8px 8px; border-bottom:1px solid #d9d9d9;margin-left: -31px; color: #757575;font-weight: 600;}
.mSrchPnl ul li:last-child{ border-bottom:0px solid #000;} 
.mSrchPnl ul li span{color: #c65d00;padding-left: 5px;}
.mSrchPnl ul li i{color:#181;background:#e1e1e1;padding:5px;border-radius:12px;font-size:10px;margin-right: 3px;}
.miPlease{color: #0087ff !important;padding:10px 0px 10px 10px !important;}
.miPlease i{ background-color:#0087ff !important;color: #fff !important;padding:8px !important; border-radius: 20px !important}
.miNoEmp{color: #d23d03 !important;padding:10px 0px 10px 10px !important;}
.miNoEmp i{ background-color:#d23d03 !important;color: #fff !important;padding:8px !important; border-radius: 20px !important}
.miSalHeader{margin:15px -26px 10px -26px;padding:5px 0px 5px 15px;border-left:3px solid #645bca;font-weight:bold;border-bottom:1px solid #f9f9f9;}
.miFtrHdr{margin-top: 20px;border-top: 1px solid #eee;padding-top: 20px;}
#frSearchEmplyee,#ovrOfEmpByMonth{ display:none;}
.miBlink{margin:14px 5px 4px 5px;height:1.25rem;width:1.25rem;color:#46598847 !important;}
.wrKng {color: white;background-color: rgb(4, 155, 215);padding: 3px 8px 3px 8px;font-size: .65rem;border-radius: 12px;}
#loggedDate{color: #506ddb;margin: -10px 0px 10px 0px;text-transform:uppercase;font-weight: 600;}
.locateNow{color:#fbf7f7;padding:5px 10px 3px 10px;background-color:#0051b9;cursor:pointer;border-radius:3px;}
.locateNow:hover{background-color:#045fd5;}
#traceMap{width: 100%;margin-top: -10px; display:none;}
.trcSuccess{ height:350px;}
.trcErr{padding: 10px 0px 10px 10px;background-color: #ff63475e;color: #d52000;}
#mUser{margin:-48px 0px 5px 55px;font-size: 11px;}.mEmpID{font-weight:700;color:#5b5b5a;}#memDetails{padding:5px 0px 5px 0px;}
.mEmpName{font-weight:700;font-size:12px;color:#005ec1;}#memDetails img{width:50px;height:50px;border-radius:50%;}.mEmpTime{font-weight:600;color: #039b29;}.mEmpOutTime{font-weight:600;color:#d06b00; }
.wrkHr{color: #005462;font-weight: 700;}

</style>
<div class="row row-sm miBottom">
  <div class="col-sm-12 col-lg-12 col-xl-12">
    <div class="card">
      <div class="card-header  border-0">
        <h4 class="card-title">Days Overview This Month</h4>
      </div>
      <div class="card-body pt-0 pb-3">
        <div class="row mb-0 pb-0">
          <div class="col-md-6 col-xl-2 text-center py-3"> <span class="avMi avMi-md bradius fs-20 bg-working-mi"><?php echo $empAttendance['tWorking'];?></span>
            <h5 class="mb-0 mt-3 miFntSz">Total Working Days</h5>
          </div>
          <div class="col-md-6 col-xl-2 text-center py-3 "><span class="avMi avMi-md bradius bg-success-mi"><?php echo $empAttendance['present'];?></span>
            <h5 class="mb-0 mt-3 miFntSz">Present Days</h5>
          </div>
          <div class="col-md-6 col-xl-2 text-center py-3"><span class="avMi avMi-md bradius bg-danger-mi"><?php echo $empAttendance['absent'];?></span>
            <h5 class="mb-0 mt-3 miFntSz">Absent Days</h5>
          </div>
          <div class="col-md-6 col-xl-2 text-center py-3"><span class="avMi avMi-md bradius bg-warning-mi"><?php echo $empAttendance['hfDy'];?></span>
            <h5 class="mb-0 mt-3 miFntSz">Half Days</h5>
          </div>
          <div class="col-md-6 col-xl-2 text-center py-3"><span class="avMi avMi-md bradius bg-orange-mi"><?php echo $empAttendance['late'];?></span>
            <h5 class="mb-0 mt-3 miFntSz">Late Days</h5>
          </div>
          <div class="col-md-6 col-xl-2 text-center py-3"><span class="avMi avMi-md bradius bg-holidy-mi"><?php echo $empAttendance['holiday'];?></span>
            <h5 class="mb-0 mt-3 miFntSz">Holidays</h5>
          </div>
        </div>
        <div class="bdrBottom">&nbsp;</div>
        <span id="ovrOfEmpByMonth"><?php echo $attMonthwise; ?></span>
        <form method="post" id="searchAttendance">
          <div class="row row-sm">
            <div class="col-sm-3">
              <label class="">Employee Name/ID:</label>
              <span id="frSearchEmplyee"><?php echo $frSearchEmplyee; ?></span>
              <input type="text" id="fieldSrchIDorName" name="fieldSrchIDorName" class="form-control miKeyUp" placeholder="Employee Name Or ID" value="<?php echo $this->logName; ?>"/>
              <div class="mSrchPnl">
                <ul>
                </ul>
              </div>
              <input type="hidden" id="empSrchdID" name="empSrchdID" value="<?php echo $this->logId; ?>"/>
            </div>
            <div class="col-sm-3">
              <label class="">Select Date:</label>
              <input type="text" id="empAttDate" name="empAttDate" class="form-control fc-datepicker" placeholder="DD/MM/YYYY" />
            </div>
            <div class="col-sm-2">
              <label class="">Month:</label>
              <select class="form-control select2-with-search" id="attMonth" name="attMonth">
                <option value="">Select</option>
                <?php  $monthName=array('January','February','March','April','May','June','July','August','September','October','November','December');
                   foreach($monthName as $nme){$selected=(date('F',strtotime(date('y-m-d')))==$nme)?'selected="selected"':'';
				   ?>
                <option value="<?php print_r($nme);?>" <?php echo $selected; ?> ><?php print_r($nme);?></option>
                <?php };?>
              </select>
            </div>
            <div class="col-sm-2">
              <label class="">Year:</label>
              <select class="form-control select  select2-with-search" id="attYear" name="attYear">
                <option value="">Select</option>
                <?php $salYear=date('Y');for($x=0;$x<5;$x++){$session=$salYear-$x;?>
                <option value="<?php echo $session;?>" <?php if($session==date('Y')){echo 'selected="selected"';}?>  ><?php echo $session;?></option>
                <?php }?>
              </select>
            </div>
            <div class="col-sm-2">
              <div style="padding-top: 1.8rem;">
                <button class="btn ripple btn-outline-success getAction mSch" onclick="return searchAttendance(reportAttendance,'#searchAttendance','#getReportMiDetails')" data-id="overViewThis"> <i class="ti-search"></i> Search </button>
                <button type="button" class="btn ripple btn-outline-danger getAction" data-id="clearDetails"><i class="ti-trash"></i></button>
              </div>
            </div>
          </div>
        </form>
        <!--  <div style="padding: 10px;margin: 10px 0px 10px 0px;border: 1px solid #e4eac8;" id="resultShow">Result show here </div>-->
        <div class="bdrBottom">&nbsp;</div>
        <div class="table-responsive">
          <input type="hidden" id="target" value="<?php echo $target; ?>" />
          <table class="table text-nowrap text-md-nowrap table-striped table-bordered table-hover mg-b-0 " id="getReportMiDetails">
            <thead class="ami_tHeader">
              <tr>
                <th>S No.</th>
                <th>Date</th>
                <th>Day</th>
                <th class="text-center">Status</th>
                <th>Clock In</th>
                <th>Clock Out</th>
                <th>Duration (<strong>HH:MM:SS</strong>)</th>
                <th>Action</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="veiwLoggedInOut">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title" id="attUser">@mit Kumar</h6>
                <span aria-label="Close" class="btn-close" data-bs-dismiss="modal" style="margin-right:-5px; cursor:pointer;">
               		 <i class="si si-close"></i>
                </span>
            </div>
            <div class="modal-body">
            	<div id="loggedDate"><?php echo date('d-M-Y');?></div>
              	<table class="table text-nowrap text-md-nowrap table-striped table-bordered table-hover mg-b-0"  id="daily_log_list">
                  <thead class="ami_tHeader">
                    <tr>
                      <th>S. No. </th>
                      <th>IN-Time</th>
                      <th>Out Time</th>
                     <th style="text-align:center">Action</th>
                     </tr>
                  </thead>
                  <tbody id="log_history_list">
                  </tbody>
                </table>
                <div id="traceMap"></div> 
            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-outline-dark" data-bs-dismiss="modal" type="button"> <i class="fe fe-arrow-left"></i> Back </button>
            </div>
        </div>
    </div>
</div>









<script>
var reportAttendance='';let map;
$(document).ready(function()
{	
    let searchObj = {};
    var target = $('#target').val();
    reportAttendance={printTable: function(search_data) { getpaginate(search_data, '#getReportMiDetails', target, 'Only For Id, Name.'); } }
    reportAttendance.printTable(searchObj);
	$(".miKeyUp").keyup(function()
	{
		let actNbtn = $(this).attr('id');
		if(actNbtn=='fieldSrchIDorName')
		{
			let target=$('#frSearchEmplyee').html();let fldVal=$('#'+actNbtn).val();
			$('.mSrchPnl').show();$('.mSrchPnl ul').html('<li class="miPlease"><i class="fe fe-settings bx-spin"></i> Please wait...</li>');
			$.post(target,{oprType:$('#'+actNbtn).val()},function(htmlAmi){$('.mSrchPnl ul').html(htmlAmi);});
			}
		});
});	

$(function() 
 {
	$(document).unbind("click").on("click", '.getAction', function() 
	{
		let actNbtn = $(this).attr('data-id');
		let getData=actNbtn.split('===');	
		if(getData[0]=='findEmployee')
		{
			let target=$('#base_url').val()+getData[1];$.post(target,{id:getData[2]},function(htmlAmi)
			{$('.mSrchPnl').hide();$('.mSrchPnl ul').html('<li>Er. Amit Kumar </li>');$('#fieldSrchIDorName').val(htmlAmi.name);$('#empSrchdID').val(htmlAmi.id);},'json');
			}	
			else if(getData[0]=='clearDetails'){$('#empAttDate,#fieldSrchIDorName').val('');$('#attMonth,#attYear').val(' ').trigger("change");}
			else if(getData[0]=='overViewThis')
			{
				
				$('.avMi').html('<div class="spinner-grow miBlink" role="status"><span class="sr-only">Loading...</span></div>');
				$('.mSch').html('<i class="fe fe-settings bx-spin"></i> Wait ...');
				let target=$('#ovrOfEmpByMonth').html();$.post(target,{id:$('#empSrchdID').val(),attMonth:$('#attMonth').val(),attYear:$('#attYear').val()},
				function(htmlAmi)
				{
					//$('#resultShow').html(htmlAmi);
					$('.mSch').html('<i class="ti-search"></i> Search');
					$('.bg-working-mi').html(htmlAmi.tWorking);$('.bg-success-mi').html(htmlAmi.present);$('.bg-danger-mi').html(htmlAmi.absent);
					$('.bg-warning-mi').html(htmlAmi.hfDy);$('.bg-orange-mi').html(htmlAmi.late);$('.bg-holidy-mi').html(htmlAmi.holiday);
					},'json');
				}
			else if(getData[0]=='checkLogged')
			{
				 $.post(base_url+getData[1],{id:getData[2],actnTyp:getData[3]},
					function(htmlAmi)
					{
						$('#attUser').html(htmlAmi.name);
						$('#log_history_list').html(htmlAmi.loggedHistory);
						$('#loggedDate').html('Working Date :: '+htmlAmi.loggeDate);
						$('#traceMap').html('Please wait..').css('text-align','center').hide();
						}, 'json');
				}
				
		/********************************************************************************************/
			let urtActn=actNbtn.split('---');
			if(urtActn[0]=='traceUserLoc')
			{
				let target=base_url+urtActn[1];
				traceOutDetails(urtActn[2],target,urtActn[3]);
				//console.log(target);
				}
		/********************************************************************************************/			
	});
});

function searchAttendance(tbactn, frmId, tbstorage)
{
    $(frmId).unbind("click").submit(function(e){e.preventDefault();$(tbstorage).DataTable().clear().destroy();let search = $(frmId).serializeArray();
        let searchObj = {};$.each(search, function(i, row) { searchObj[row.name] = row.value; });
        tbactn.printTable(searchObj);
    });

}

function traceOutDetails(empID,resource,dtType)
{
	$.post(resource,{id:empID,dtType:dtType,customDt:$('#loggedDate').text()},function(htmlAmi)
	{
		//console.log(htmlAmi);
		if(htmlAmi.actnCls=='success')
		{
 			if(htmlAmi.inLoc!='unTrace')
			{
				if(map){map.remove();}
				$('#traceMap').removeClass('trcErr').addClass('trcSuccess').show();
				let inLoctnCordinate=htmlAmi.inLoc;let inCordnts=inLoctnCordinate.split(',');map = L.map('traceMap').setView([inCordnts[0],inCordnts[1]],8);
  				L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{attribution: '&copy; <a href="https://www.camwel.com">Camwel Solution</a> ',}).addTo(map);
		   		L.marker([inCordnts[0],inCordnts[1]]).addTo(map).bindPopup(htmlAmi.empInTime).openPopup();
				if(htmlAmi.outLoc!='unTrace'){let outLoctnCordinate=htmlAmi.outLoc;let outCordnts=outLoctnCordinate.split(',');L.marker([outCordnts[0],outCordnts[1]]).addTo(map).bindPopup(htmlAmi.empOutTime).openPopup();}
				}
			else{$('#traceMap').removeClass('trcSuccess').addClass('trcErr').html('<i class="si si-exclamation"></i> Unfortunately, there are no records available.').show();}	
			}
			else{$('#traceMap').removeClass('trcSuccess').addClass('trcErr').html(htmlAmi.msg).show();}
		},'json');
 }


</script>
