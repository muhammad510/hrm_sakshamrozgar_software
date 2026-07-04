<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<div class="inner-body">
<!-- Page Header -->
<div class="page-header">
  <div>
    <h2 class="main-content-title tx-24 mg-b-5">Employee Attendance List</h2>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo $breadcrums; ?></a></li>
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
  </div>
  <div class="d-flex">
    <div class="justify-content-center">
      <button type="button" class="btn btn-white btn-icon-text my-2 me-2" id="miArvClk"> <i class="ti-timer"></i> 00:00:00 </button>
      <button type="button" class="btn btn-white btn-icon-text my-2 me-2 srchPanel" id="srchBtn"><i class="ti-search"></i> Filter </button>
      <a href="<?php echo base_url('admin/attendance/report');?>" class="btn btn-primary my-2 btn-icon-text"> <i class="fe fe-download-cloud me-2"></i> Download Report </a>
    </div>
  </div>
</div>
<!-- End Page Header -->
<style>
.miSlwdth{width:92.33%;margin:-38px 0px 0px 39px !important;}.datetimepicker{z-index: 100009 !important;}#searchBranchDetails{ display:none;}.miBck a:hover{background-color:#645bca;color:#fff;}.miBck{font-weight: 600;text-transform: uppercase;float: right;margin-right: 10px;padding-top: 7px;}.miBck a{border: 1px solid #645bca;padding: 8px 12px 8px 12px;border-radius: 5px;color: #645bca;font-weight: bold;}.miLst {font-weight: 600;text-transform: uppercase;}.miLst i {background-color: #645bca;padding: 11px 11px 10px 10px;margin-right: 10px;border-radius: 20px;color: #fff;font-weight: bold;}.miHeader {padding: 10px 15px 10px 15px;border-bottom: 1px solid #cccece;margin: 0px -10px 20px -10px;border-top-left-radius: 5px;border-top-right-radius: 5px;}.cardTtl {border: 1px solid #fff;padding: 0px 0px 40px 0px;margin-bottom: 20px;border-radius: 5px;background-color: #fff;}
.mibdge{padding: 6px 0px 6px 0px;width: 70px;color:#fff;text-align:center;font-weight: 600;}.miHeader1 {padding: 18px 15px 18px 15px;border-bottom: 1px solid #cccece;margin: 0px -10px 20px -10px;border-top-left-radius: 5px;border-top-right-radius: 5px;}.ami_tHeader {background-color: #088;}.ami_tHeader > tr > th{color: #fff !important;font-weight: 600;padding: 13px 7px 13px 7px; height:25px;}.miSuccess {padding: 6px 10px 6px 10px;color: #19b159;border: 1px solid #19b159;border-radius: 2px;}.miSuccess:hover{background-color: #19b159;color: #fff;}.miDefault {padding: 6px 10px 6px 10px;color: #3b4863;border: 1px solid #3b4863;border-radius: 2px;}.miDefault:hover{background-color: #3b4863;color: #fff;}.miDanger{padding: 6px 10px 6px 10px;color: #f16d75;border: 1px solid #f16d75;border-radius: 2px;}.miDanger:hover{background-color:#f16d75;color:#fff;}.wrKng {color: white;background-color: rgb(4, 155, 215);padding: 3px 8px 3px 8px;font-size: .65rem;border-radius: 12px;}.miClr{height: 38px;}		
#daily_log_list thead > tr >th{ padding:5px !important; border:1px solid #088 !important;}#loggedDate{color: #506ddb;margin: -10px 0px 10px 0px;text-transform:uppercase;font-weight: 600;}.noRcrd{text-align: center;color: #b00616;font-weight: bold;text-transform: uppercase;}
.locateNow{color:#fbf7f7;padding:5px 10px 3px 10px;background-color:#0051b9;cursor:pointer;border-radius:3px;}
.locateNow:hover{background-color:#045fd5;}
#traceMap{width: 100%;margin-top: -10px; display:none;}
.trcSuccess{ height:350px;}
.trcErr{padding: 10px 0px 10px 10px;background-color: #ff63475e;color: #d52000;}
#mUser{margin:-48px 0px 5px 55px;font-size: 11px;}.mEmpID{font-weight:700;color:#5b5b5a;}#memDetails{padding:5px 0px 5px 0px;}
.mEmpName{font-weight:700;font-size:12px;color:#005ec1;}#memDetails img{width:50px;height:50px;border-radius:50%;}.mEmpTime{font-weight:600;color: #039b29;}.mEmpOutTime{font-weight:600;color:#d06b00; }
.wrkHr{color: #005462;font-weight: 700;}
</style>
 <div class="row row-sm" id="searchBranchDetails">
  <div class="cardTtl">
    <div class="miHeader1"><span class="miLst"><i class="si si-user"></i>Search Attendance Details</span></div>
    <form method="post" id="search_employee">
      <div class="col-md-12 col-lg-12">
        <?php //print_r($desigList);
				 
				?>
        <div class="row row-sm">
         <div class="col-md-4">
            <label>Working Shift : </label>
            <div class="input-group mb-3">
              <div class="input-group-prepend"> <span class="input-group-text miClr"><i class="ti-id-badge"></i></span> </div>
               <div class="miSlwdth" style="width:88.38%"> 
                     <select class="form-control select2-with-search" name="shiftDet" id="shiftDet">
                        <option value=""> --- Select State --- </option>
                        <?php if($shiftDet){?><option value="all">All Shift</option>
							<?php foreach($shiftDet as $shift){?>
                        		<option value="<?php echo $shift->id;?>"><?php echo $shift->shift_name;?></option>
                        	<?php }}?>
                    </select>
               </div>
            </div>
          </div>
          
          <div class="col-md-4">
            <label>Employee Id:</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend"> <span class="input-group-text"><i class="ti-id-badge"></i></span> </div>
              <input type="text" class="form-control" name="employID" id="employID">
            </div>
          </div>
          <div class="col-md-4">
            <label>Employee Name:</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend"> <span class="input-group-text"><i class="si si-user"></i></span> </div>
              <input type="text" class="form-control" name="employName" id="employName">
            </div>
          </div>
          <div class="col-md-12"> <a href="javascript:void(0)"  class="btn ripple btn-outline-dark srchPanel" > <i class="fe fe-arrow-left"></i> Back</a>
            <button class="btn ripple btn-outline-success pull-right" onclick="return get_search(reportDAttendnce,'#search_employee','#daily_attendance_list')"> <i class="ti-search"></i> Search </button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
 <div class="row row-sm">
  <div class="cardTtl">
    <div class="miHeader"> <span class="miLst"><i class="fe fe-sliders"></i><?php echo $title; ?></span> 
    <span class="miBck"><a href="<?php echo $bckUrl; ?>"><i class="ti-arrow-left"></i></a></span> </div>
    <div class="col-md-12 col-lg-12">
      <input type="hidden" id="target" value="<?php echo $target; ?>" />
      <div class="row row-sm" id="amiResult">
      <div class="table-responsive">
        <table class="table text-nowrap text-md-nowrap table-striped table-bordered table-hover mg-b-0" id="daily_attendance_list">
          <thead class="ami_tHeader">
            <tr>
              <th>S. No. </th>
              <th>ID</th>
              <th>Employee Name</th>
              <th>Shift</th>
              <th>In-Time</th>
              <th>Out-Time</th>
              <th>Duration (<strong>HH:MM:SS</strong>)</th>
              <th>Status</th>
              <th>Mark Attendance</th>      
            </tr>
          </thead>
        </table>
       </div> 
      </div>
	  <div id="mkAttendance" style="display:none; min-height:450px;">
	  		<form id="attendance_updata" method="post" data-id="<?php echo $markTarget;?>" accept-charset="utf-8" enctype="multipart/form-data">
              
                <div id="notifyMe" class="alert" style="display:none;">Indication will show</div>
                <div class="row row-sm">
                  <input type="hidden" name="getPosition" id="getPosition">
                  <input type="hidden" name="id" id="id">
                  <div class="col-md-6">
                    <label>Employee As : </label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="si si-user"></i></span></div>
                      <input type="text" class="form-control" name="empNameAs" id="empNameAs" readonly="readonly">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label>Mark Attendance Status:<span class="text-danger">*</span></label>
                    <div class="input-group mb-3" style="height:60px;margin-bottom: -15px !important;">
                      <div class="input-group-prepend"> <span class="input-group-text"><i class="si si-bell"></i></span> </div>
                      <div class="miSlwdth">
                        <select name="attendance_status" id="attendance_status" class="form-control select2-with-search">
                          <option value=""> --- Select One --- </option>
                          <?php foreach($attendance_type as $attd) { ?>
                          <option value="<?php echo $attd['id'] ?>"><?php echo $attd['type'];?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label>Logged In:</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend"> <span class="input-group-text"><i class="fe fe-sunrise"></i></span> </div>
                      <input type="text" class="form-control miDtTimePicker" name="atLogIn" id="atLogIn" readonly="readonly" value="<?php echo date('h:i:s d-m-Y') ?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label>Logged Out:</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend"> <span class="input-group-text"><i class="fe fe-sunset"></i></span> </div>
                      <input type="text" class="form-control miDtTimePicker" name="atlogOut" id="atlogOut"  readonly="readonly" value="<?php echo date('h:i:s d-m-Y',strtotime('+8 hours')) ?>">
                    </div>
                  </div>
                </div>
              <button class="btn ripple btn-outline-dark getAction" id="bkSrch_01" type="button"><i class="fe fe-arrow-left"></i> Back</button>
              <button class="btn ripple btn-outline-success pull-right" type="submit" id="attendancedataupdate"><i class="ti-save"></i>&nbsp;&nbsp;Save changes</button>
           </form>
	  </div>	 
    </div>
  </div>
  <!-- End Row -->
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
                      <th>S No.</th>
                      <th>IN-Time</th>
                      <th>Out Time</th>
                      <th style="text-align:center">Action</th>
                     </tr>
                  </thead>
                  <tbody id="log_history_list"></tbody>
                </table>
            <div id="traceMap"></div>    
            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-outline-dark" data-bs-dismiss="modal" type="button"> <i class="fe fe-arrow-left"></i> Back </button>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/js/admin/daily_attendance.js'); ?>"></script>
