<div class="inner-body">                       
	<!-- Page Header -->
	<div class="page-header">
		<div>
			<h2 class="main-content-title tx-24 mg-b-5">Leave</h2>
			<ol class="breadcrumb"><li class="breadcrumb-item"><a href="javascript:void(0);">All</a></li><li class="breadcrumb-item active" aria-current="page">View</li></ol>
		</div>
		<div class="d-flex">
			<div class="justify-content-center">
              <a href="<?php echo base_url('staff/dashboard');?>" class="btn btn-success btn-icon-text my-2 me-2"  title="Dashboard">
              	 <i class="ti-home"></i> Dashboard 
              </a>
              <button type="button" class="btn btn-primary btn-icon-text my-2 me-2" id="miArvClk"> <i class="fe fe-filter me-2"></i> Current Time </button>
              <a href="<?php echo base_url('auth/login/signout');?>" class="btn btn-danger btn-icon-text  my-2 me-2"> <i class="fe fe-power me-2"></i> Sign Out </a>
            </div>
		</div>
	</div>
	<!-- End Page Header -->

	<style>
		.miBck a:hover{ background-color:#645bca; color:#fff;}
		.miBck{ font-weight:600;text-transform: uppercase; float:right;margin-right: 10px;}
		.miBck a{ border:1px solid #645bca;padding: 8px 12px 8px 12px;border-radius: 5px;color: #645bca;font-weight: bold;}
		.miLst{ font-weight:600;text-transform: uppercase;}
		.miLst i{ background-color: #645bca;padding: 11px 11px 10px 10px ;margin-right: 10px;border-radius: 20px;color: #fff;font-weight: bold;}
		.miHeader{padding:14px 5px 14px 15px;border-bottom: 1px solid #cccece;margin: 5px -10px 20px -10px;border-top-left-radius: 5px;border-top-right-radius: 5px;}
		.cardTtl{border:1px solid #fff;padding:0px 0px 40px 0px;margin-bottom: 75px;border-radius: 5px;background-color: #fff;}
.ami_tHeader > tr > th{ color:#FFFFFF !important;border: 1px solid #088 !important;padding: 12px 0px 12px 5px !important;}
.ami_tHeader > tr{border: 1px solid #088 !important;}
		#searchLeaveDetails,#newLeaveID,#amiLeaveAllChanges,#locTrgt{display:none;}
 	   
	
	</style>

<div class="row row-sm" id="searchLeaveDetails">
<div class="cardTtl">
	<div class="miHeader"><span class="miLst"><i class="si si-plane"></i>Search Leave Details</span></div>
		<form method="post" id="search_branch"> 	            
            <div class="col-md-12 col-lg-12">
            	<?php //print_r($getState);?>
                <div class="row row-sm">
                  
                    <div class="col-md-4">
                        <label>Leave ID:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                            </div>
                           <input type="text" class="form-control" name="leaveID" id="leaveID">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Leave Name:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-puzzle"></i></span>
                            </div>
                            <input type="text" class="form-control" name="leaveName" id="leaveName">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Status:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-grid"></i></span>
                            </div>
                            <div class="miSlwdth" style="width:88.38%"> 
							 <select class="form-control select2-with-search" name="leaveSts" id="leaveSts">
                                <option value=""> --- Select Status --- </option>
                              	<option value="99">All</option>
								<option value="1">Active</option>
                                <option value="2">Deactive</option>
                             </select> 
							</div>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                       <a href="javascript:void(0)"  class="btn ripple btn-outline-dark leaveManage" id="bkSrch">
							<i class="fe fe-arrow-left"></i> Back</a>
                            <button class="btn ripple btn-outline-success pull-right" onclick="return get_search(reportBranch,'#search_branch','#branch_det')">
                            	<i class="ti-search"></i> Search
                            </button>
                    </div>
                </div>
		    </div>
         </form>
	</div>
</div>
	<!-- Row -->
	<div class="row row-sm">
		<div class="cardTtl">
			<div class="miHeader">
				<span class="miLst"><i class="si si-plane"></i><span id="bxTitleNm"><?php echo $title;?></span></span>
				<!-- <span class="miBck"><a href="<?php echo $bckUrl;?>"><i class="ti-arrow-left"></i></a></span> -->
				<span class="miBck">
                	<a href="javascript:void(0);" style="margin-left:-5px;" title="Click to search leave details" class="miDefault leaveManage" id="leaveSrch">
                    	<i class="ti-search"></i>
                    </a>
                </span>
                <span class="miBck">
                	<a href="javascript:void(0);" style="margin-left:-5px;" title="Click to add leave details" id="addNewLeaveDetails" class="miDefault leaveManage">
                    	<i class="ti-plus"></i>
                    </a>
                </span>
			</div>
			<div class="col-md-12 col-lg-12">
			
            <span id="newLeaveID"><?php echo $newLeaveID;?></span>
            <span id="locTrgt"><?php echo $addNewLeave;?></span>
             <div id="amiLeaveAllChanges">
           		<form method="post" id="add_leaveDetails"> 
                    <input type="hidden" id="target" name="target" value="<?php echo $target;?>" />
                    <input type="hidden" id="oprType" name="oprType" />		     		
                	<div class="row">
                    <div class="col-md-6">
                        <label>Leave ID:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                            </div>
                           <input type="text" class="form-control" name="leaveNwiD" readonly="readonly" id="leaveNwiD" value="<?php echo $newLeaveID;?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Leave Name: <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-puzzle"></i></span>
                            </div>
                            <input type="text" class="form-control ojArv" name="leaveNwName" id="leaveNwName"  oninput="this.value=this.value.replace(/[^a-zA-Z\s]/g,'').replace(/\s+/g,' ')">
                        </div>
                    </div>
                   
                   <div class="col-md-6">
                        <label>Leave Type: <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-grid"></i></span>
                            </div>
							<div class="miSlwdth" style="width:92.33%"> 
							    <select class="form-control select2-with-search arvOnChange" name="leaveType" id="leaveType">
								   <option value=""> --- Select One --- </option>
								   <option value="4">Weekly</option>
								   <option value="3">Monthly</option>
								   <option value="2">Quarterly</option>
								   <option value="1">Yearly</option>
								</select> 
							</div>  
                        </div>
                    </div>
                   
                   
                    <div class="col-md-6">
                        <label>Number of days: <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-grid"></i></span>
                            </div>
                             <input type="text" class="form-control ojArv" name="leaveNoDays" id="leaveNoDays" oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')" > 
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label>Description: <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-grid"></i></span>
                            </div>
                            <textarea class="form-control" id="lvDscription" name="lvDscription" placeholder="Leave Description..." rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                         <a href="javascript:void(0)"  class="btn ripple btn-outline-dark leaveManage" id="bkSrch_01"><i class="fe fe-arrow-left"></i> Back</a>
                         <button type="submit" class="btn ripple btn-outline-success pull-right" id="manageAction"><i class="ti-save"></i> Submit</button>
                    </div>
                </div>
                </form>
            </div>
            
            <div class="row row-sm" id="amiLeaveList">
			 <div class="table-responsive">
            	<table class="table text-nowrap text-md-nowrap table-striped table-bordered table-hover mg-b-0" id="branch_det">
					<thead class="ami_tHeader">
						<tr>
                            <th>S.N.</th>
                            <th>LEAVE ID</th>
                            <th>LEAVE NAME</th>
                            <th>LEAVE TYPE</th>
                            <th>LEAVE CREDIT</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
					</thead>
				</table>
              </div>
			</div>
		</div>
	</div>
	<!-- End Row -->
</div>
	
<div id="statusChange" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style=" padding-left: 0px;" aria-modal="true" role="dialog">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right;"><i class="si si-close"></i></button>
            <div class="delMsg"><i class="si si-plane"></i> Leave Status</div>
                <div class="actnData"><i class="si si-power"></i>  Are you sure want to activate of Leave ID #F33333</div>
                <div id="mdlFtrBtn">
                  <button type="button" class="btn btn-outline-secondary waves-effect waves-light pull-right getAction" id="cnfChanges" data-id="@misingh143">
                        Confirm <i class="si si-check"></i>
                  </button>
                  <button type="button" class="btn btn-outline-dark pull-right miIcn " data-bs-dismiss="modal" style="margin-right:10px;">
                    <i class="fa fa-arrow-left"></i> Back 
                  </button>   
               </div>		
            </div>
    </div>
</div>
</div>   
    				
<style>
.miLvs{ padding:5px 12px 5px 12px;}.delMsg {text-align: center;font-size: 20px;margin: 30px 0px 10px 0px;color :#00805c;}.actnData {text-align: center;margin: 0px 0px 20px 0px;color: #716c6c;font-size: .8rem;}.delMsg i{ background-color: #00805c;padding: .5rem;font-size: .75rem;border-radius: .5rem;color: #fff;}.mibdge{ padding:6px 0px 6px 0px;width:70px;}.ami_tHeader{background-color:#088;}.ami_tHeader >tr>th{ color:#fff;font-weight: 600;padding:13px 7px 13px 7px;}.miSuccess{padding:6px 10px 6px 10px;color:#19b159;border:1px solid #19b159;border-radius: 2px;}.miSuccess:hover{background-color:#19b159;color: #fff;}.miDefault{padding:6px 10px 6px 10px;color:#3b4863;border:1px solid #3b4863;border-radius: 2px;}.miDefault:hover{background-color:#3b4863;color: #fff;}.miDanger{padding:6px 10px 6px 10px;color:#f16d75;border:1px solid #f16d75;border-radius: 2px;}.miDanger:hover{background-color:#f16d75;color: #fff;}
</style>
<script src="<?php echo base_url('assets/js/setting/leave.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatable/js/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/datatable/js/dataTables.bootstrap5.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/datatable/js/dataTables.buttons.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/datatable/js/buttons.bootstrap5.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/datatable/js/jszip.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/datatable/pdfmake/pdfmake.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/datatable/pdfmake/vfs_fonts.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/datatable/js/buttons.html5.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/datatable/js/buttons.print.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/datatable/js/buttons.colVis.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/datatable/dataTables.responsive.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/datatable/responsive.bootstrap5.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/table-data.js');?>"></script>