<div class="inner-body">                       
	<!-- Page Header -->
	<div class="page-header">
		<div>
			<h2 class="main-content-title tx-24 mg-b-5">Team Group</h2>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">All</a></li>
				<li class="breadcrumb-item active" aria-current="page">View</li>
			</ol>
		</div>
		<div class="d-flex">
			<div class="justify-content-center">
				<a href="<?php echo base_url('staff/dashboard');?>" class="btn btn-success btn-icon-text my-2 me-2"  title="Dashboard"> <i class="ti-home"></i> Dashboard </a>
                <button type="button" class="btn btn-primary btn-icon-text my-2 me-2" id="miArvClk"> <i class="fe fe-filter me-2"></i> Current Time </button>
                <a href="<?php echo base_url('auth/login/signout');?>" class="btn btn-danger btn-icon-text  my-2 me-2"> <i class="fe fe-power me-2"></i> Sign Out </a>
			</div>
		</div>
	</div>
	<!-- End Page Header -->

	<style>
		.miBck a:hover{ background-color:#645bca; color:#fff;}
		.miBck{ font-weight:600;text-transform: uppercase; float:right;margin-right: 10px;padding-top: 7px;}
		.miBck a{ border:1px solid #645bca;padding: 8px 12px 8px 12px;border-radius: 5px;color: #645bca;font-weight: bold;}
		.miLst{ font-weight:600;text-transform: uppercase;}
		.miLst i{ background-color: #645bca;padding: 11px 11px 10px 10px ;margin-right: 10px;border-radius: 20px;color: #fff;font-weight: bold;}
		.miHeader{padding:10px 15px 10px 15px;border-bottom: 1px solid #cccece;margin: 0px -10px 20px -10px;border-top-left-radius: 5px;border-top-right-radius: 5px;}
		.cardTtl{border:1px solid #fff;padding:0px 0px 40px 0px;margin-bottom: 75px;border-radius: 5px;background-color: #fff;}
.ami_tHeader > tr > th{ color:#FFFFFF !important;border: 1px solid #088 !important;padding: 12px 0px 12px 5px !important;}.ami_tHeader > tr{border: 1px solid #088 !important;}.ami_tHeader{background-color:#088;}		
#searchBranchDetails,#createTeam{display:none;}.dataTables_processing{ background-color:#EBC7A0 !important; color:#874921 !important;}#branch_det .badge { padding: 9px 13px 9px;}	
.mSpn{padding-top:8px;}.mSrchPnl{ margin:-16px 0px 0px 0px;position: absolute;width: 290px;z-index: 1;cursor: pointer; display:none;}
.mSrchPnl ul{ list-style:none;background-color:#fff; border: 1px solid #d9d9d9;border-bottom-left-radius: 6px;border-bottom-right-radius: 6px;-webkit-box-shadow: 0px 3px 5px 0px rgba(145,145,145,1);-moz-box-shadow: 0px 3px 5px 0px rgba(145,145,145,1);box-shadow: 0px 3px 5px 0px rgba(145,145,145,1);max-height: 230px;overflow-x: hidden;overflow-y: scroll;scrollbar-width: thin;scrollbar-color: #24839f #fff;}
.mSrchPnl ul li{ padding:8px 0px 8px 8px; border-bottom:1px solid #d9d9d9;margin-left: -31px; color: #757575;font-weight: 600;}
.mSrchPnl ul li:last-child{ border-bottom:0px solid #000;} .mSrchPnl ul li span{color: #c65d00;padding-left: 5px;}.mSrchPnl ul li i{color:#181;background:#e1e1e1;padding:5px;border-radius:12px;font-size:10px;margin-right: 3px;}
.miPlease{color: #0087ff !important;padding:10px 0px 10px 10px !important;}.miPlease i{ background-color:#0087ff !important;color: #fff !important;padding:8px !important; border-radius: 20px !important}
.miNoEmp{color: #d23d03 !important;padding:10px 0px 10px 10px !important;}.miNoEmp i{ background-color:#d23d03 !important;color: #fff !important;padding:8px !important; border-radius: 20px !important}
#gtReptEmpNmID{margin: -9px 0px -9px -9px;width:100%;border-radius: 0px;}#assignRole{ margin:-7px 8px -7px -8px;}
.ojshTbl >thead >tr >th{background-color: #eeeeee78 !important; border: 1px solid #dfdfdf !important; color:#645bca !important;padding:8px 5px 8px 8px !important;}
.delMsg {text-align: center;font-size: 20px;margin: 30px 0px 10px 0px;color: #595959;}.actnData {text-align:center;margin:0px 0px 20px 0px;color:green;font-size:.8rem;}.tempDel{float:right;cursor:pointer;padding-right: 5px;}
#createReportingMember{ margin-top:0px !important;}.mgActive{ padding:5px 15px 7px 15px;}.cmnPadd{ padding:5px 10px 7px 10px;}

.amiRole span {float:right;font-weight:bold;color:#7870d5;}.amiRole{padding: 3px 0px 3px 0px;}
#view_team_details{ display:none;margin-bottom:50px;}
.miBck{ border:0px !important; }
</style>
<div class="row row-sm" id="searchBranchDetails">
<div class="cardTtl">
	<div class="miHeader"><span class="miLst"><i class="fe fe-sliders"></i>Search Branch Details</span></div>
		<form method="post" id="search_branch"> 	            
            <div class="col-md-12">
                <div class="row row-sm">
                  
                    <div class="col-md-6">
                        <label>Search Based On:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                            </div>
                           
                              <div class="miSlwdth" style="width:92.33%"> 
                                  <select class="form-control select2-with-search" name="searchTyp" id="searchTyp">
                                        <option value=""> Choose one</option>
                                        <option value="all"> All </option>
                                        <option value="code">Branch Code</option>
                                        <option value="contact_person_name">Contact Name</option>
                                        <option value="phone_nu">Phone No</option>
                                        <option value="mobile_nu">Mobile No</option>
                                        <option value="branch_email">E-Mail</option>
                                    </select> 
                              </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Search Content:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-puzzle"></i></span>
                            </div>
                            <input type="text" class="form-control" name="srchContent" id="srchContent">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Branch Name:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-grid"></i></span>
                            </div>
                            <input type="text" class="form-control" name="brName" id="brName">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>State:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-organization"></i></span>
                            </div>
                            <div class="miSlwdth" style="width:92.33%"> 
                                <select class="form-control select2-with-search" name="state" id="state">
                              		<option value=""> Choose one</option>
                                    <option value="All"> All </option>
									<?php if($getState){foreach($getState as $state){?>
                                    <option value="<?php echo $state->id;?>"><?php echo $state->state_cities;?></option>
									<?php }}?>
                                 </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                       <a href="javascript:void(0)"  class="btn ripple btn-outline-dark branchManage" id="bkSrch"><i class="fe fe-arrow-left"></i> Back</a>
                            <button class="btn ripple btn-outline-success pull-right" onclick="return get_search(reportBranch,'#search_branch','#branch_det')">
                            	<i class="ti-search"></i> Search
                            </button>
                    </div>
                </div>
		    </div>
         </form>
	</div>
</div>

 <!---------------------------------------------------------------Veiw Employee Start------------------------------------------------------------------------------->
	<div id="view_team_details">SoftArena</div>        
 <!---------------------------------------------------------------Veiw Employee End------------------------------------------------------------------------------->
<div id="all_team_list">	
	<div class="row row-sm">
		<div class="cardTtl">
			<div class="miHeader">
				<span class="miLst"><i class="fe fe-sliders"></i><span id="bxTitleNm"><?php echo $title;?></span></span>
				<span class="miBck">
                	<a href="javascript:void(0);" style="margin-left:-5px;" title="Click to search branch details" class="miDefault branchManage" id="branchSrch">
                    	<i class="ti-search"></i>
                    </a>
                </span>
                <span class="miBck">
                <a href="javascript:void(0);" style="margin-left:-5px;" title="Click to add branch details" class="miDefault getAction" id="addEmpNwTeam" data-id="create_team===<?php echo $tempCreate;?>">
                    	<i class="ti-plus"></i>
                    </a>
                </span>
			</div>
			<div class="row row-sm">	
                <div id="amiResult">
                 <div class="table-responsive">
                    <table class="table text-nowrap text-md-nowrap table-striped table-bordered table-hover mg-b-0" id="team_det" data-id="<?php echo 'software/team/index/view';?>">
                        <thead class="ami_tHeader">
                                <tr>
                                    <th><div style="width:50px;">S.No.</div></th>
                                    <th>Team Name</th>
                                    <th>Head Name</th>
                                    <th>Team Member</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                        </thead>
                    </table>
                  </div>
                </div>
                <div id="createTeam">
                    <div class="col-md-12">
                        <div class="row row-sm">
                            <div class="col-md-3">
                            <label>Employee Name/ID : <span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text miClr"><i class="si si-user"></i></span>
                                </div>
                                <input type="hidden" name="gtEmpNmID" id="gtEmpNmID">
                                <input type="text" name="gtEmpNmCode" id="gtEmpNmCode" class="form-control miKeyUp" data-id="<?php echo $findEmployee;?>">
                             </div>
                            <div class="mSrchPnl" id="createTeamMember"><ul></ul></div>
                        </div>
                            <div class="col-md-3">
                            <label>Branch Name:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text miClr"><i class="si si-organization"></i></span>
                                </div>
                                <span class="form-control mSpn" id="brNwName">&nbsp;</span>
                            </div>
                        </div>
                            <div class="col-md-3">
                                <label>Department: </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text miClr"><i class="si si-layers"></i></span>
                                    </div>
                                    <span class="form-control mSpn" id="deptName">&nbsp;</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>Designation: </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text miClr"><i class="si si-badge"></i></span>
                                    </div>
                                     <span class="form-control mSpn" id="desigName">&nbsp;</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                               <a href="javascript:void(0)"  class="btn ripple btn-outline-dark getAction" data-id="miBack_List===<?php echo $tempCreate;?>">
                                    <i class="fe fe-arrow-left"></i> Back</a>
                                    <button type="button" class="btn ripple btn-outline-success pull-right getAction" id="tempCreate" data-id="<?php echo $tempCreate.'temp';?>"><i class="ti-save"></i> Add </button>
                            </div>
                        </div>
                    </div>
                   <div class="col-md-12">
                        <div class="row row-sm"> 
                          <div style=" padding-top: 25px;">  
                            <table class="table text-nowrap text-md-nowrap table-bordered mg-b-0 ojshTbl" id="tempEmplTble">
                                <thead>
                                    <tr>
                                        <th>S. No.</th>
                                        <th>Emp. ID</th>
                                        <th>Name</th>
                                        <th>Branch</th>
                                        <th>Department</th>
                                        <th>Designation</th>
                                    </tr>
                                </thead>
                                <tbody id="tempAssign">
                                    <?php
                                        if($alreadyAdded)
                                        {
                                            $count=0;
                                            foreach($alreadyAdded as $temp)
                                            {
                                                ++$count;
                                                $isAction="miStatusView===software/team/index/remove===".$temp->id;
                                                ?>
                                             <tr id="delArv-<?php echo $temp->id;?>">
                                                    <th id="serial-<?php echo $temp->id;?>"><?php echo $count;?>.</th>
                                                    <th><?php echo $temp->employee_id;?></th>
                                                    <td><?php echo $temp->empName;?></td>
                                                    <td><?php echo $temp->branch;?></td>
                                                    <td><?php echo $temp->department;?></td>
                                                    <td>
                                                        <?php echo $temp->desgination;?>
                                                        <span class="getAction tempDel" data-id="<?php echo $isAction;?>" data-bs-toggle="modal" data-bs-target="#trashTempEmployee" title="Click to remove" id="arvs--<?php echo $temp->id;?>">
                                                           <i class="fe fe-trash-2 text-danger"></i>
                                                        </span>
                                                    </td>
                                                    
                                                </tr> 
                                        <?php }}else{?>
                                            <tr>
                                                <th colspan="6" style="text-align:center;">
                                                    <div style="color:#8a3b3b;text-transform:uppercase;font-weight:bold;">No data available in table</div>
                                                    <img src="<?php echo base_url('uploads/addnewitem.svg');?>">
                                                </th>
                                            </tr> 
                                        <?php }?>                            
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2" style="text-align:right;font-weight:600;text-transform:uppercase;">Team Name</td>
                                        <td style="padding: 0px !important;"><input type="text" class="form-control" name="teamReportingName" id="teamReportingName" style="border:0px" placeholder="Team alpha"></td>
                                        <td colspan="2" style="text-align:right;font-weight:600;text-transform:uppercase;">Reporting Manager</td>
                                        <td style="padding: 0px !important;"><input type="hidden" name="gtReptEmpID" id="gtReptEmpID">
                                            <input type="text" class="form-control miKeyUp" name="gtReptEmpNm" id="gtReptEmpNm" data-id="<?php echo $findEmployee;?>" placeholder="Reporting Employee Name">
                                            <div class="mSrchPnl" id="createReportingMember"><ul></ul></div>
                                            </td>
                                     </tr>
                                     <tr><td colspan="5">&nbsp;</td><td><button class="btn ripple btn-outline-success getAction" id="assignRole" data-id="<?php echo $tempCreate.'reportting';?>"><i class="ti-save"></i> Assign Role </button></td></tr>                            </tfoot>
                            </table>
                          </div>   
                        </div>
                   </div>
                </div>
			</div>
	</div>
</div>
</div>

<div id="trashTempEmployee" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style=" padding-left: 0px;" aria-modal="true" role="dialog">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right;"><i class="si si-close"></i></button>
            <div class="delMsg"><i class="ti-trash"></i> Remove Employee</div>
                <div class="actnData" id="remvMsg"><i class="si si-power"></i> Do you really want to remove the employee with ID #F33333.</div>
                <div id="mdlFtrBtn">
                  <button type="button" class="btn btn-outline-secondary waves-effect waves-light pull-right getAction" id="cnfRemoveEmp" data-id="@misingh143">
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
<script src="<?php echo base_url() ?>assets/js/setting/team.js"></script>


