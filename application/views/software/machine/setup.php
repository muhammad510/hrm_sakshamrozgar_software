<div class="inner-body">                       
	<!-- Page Header -->
	<div class="page-header">
		<div>
			<h2 class="main-content-title tx-24 mg-b-5">Machine Configuration</h2>
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

	<style>#searchMachineDetails,#amiMachineAllChanges,#newMachineID{display:none;}
		.miBck a:hover{ background-color:#645bca; color:#fff;}
		.miBck{ font-weight:600;text-transform: uppercase; float:right;margin-right: 10px;padding-top: 7px;}
		.miBck a{ border:1px solid #645bca;padding:6px 12px 6px 12px;border-radius: 5px;color: #645bca;font-weight: bold;}
		.miLst{ font-weight:600;text-transform: uppercase;}
		.miLst i{ background-color: #645bca;padding: 11px 11px 10px 10px ;margin-right: 10px;border-radius: 20px;color: #fff;font-weight: bold;}
		.miHeader{padding:10px 15px 10px 15px;border-bottom: 1px solid #cccece;margin: 0px -10px 20px -10px;border-top-left-radius: 5px;border-top-right-radius: 5px;}
		.cardTtl{border:1px solid #fff;padding:0px 0px 40px 0px;margin-bottom: 20px;border-radius: 5px;background-color: #fff;}
	    .ami_tHeader{ background-color:#088 !important }
		.ami_tHeader > tr > th{ color:#FFFFFF !important;border: 1px solid #088 !important;padding: 12px 0px 12px 5px !important;}
		.ami_tHeader > tr{border: 1px solid #088 !important;}
		.miRfr i{ font-size:12px;}
	.miRfr{padding:4px 8px 2px 8px;color:#ffffff;background-color:#0077AF;border-color:#0077AF;margin-right:1.5px;}	
	.miRfr:hover{ background-color:#0089C9;color:#fff;border-color:#0089C9;}
	.delMsg {text-align: center;font-size: 20px;margin: 30px 0px 10px 0px;color: #00805c;}
.actnData {text-align: center;margin: 0px 0px 20px 0px;color: #716c6c;font-size: .8rem;}    .miLvs {
  padding: 5px 12px 5px 12px;
}
    </style>
<span id="newMachineID"><?php echo $newMachineID;?></span>    
<div class="row row-sm" id="searchMachineDetails">
<div class="cardTtl">
	<div class="miHeader"><span class="miLst"><i class="fe fe-sliders"></i>Search Branch Details</span></div>
		<form method="post" id="search_branch"> 	            
            <div class="col-md-12">
            	<?php //print_r($getState);?>
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
                       <a href="javascript:void(0)"  class="btn ripple btn-outline-dark machineManage" id="bkSrch"><i class="fe fe-arrow-left"></i> Back</a>
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
				<span class="miLst"><i class="fe fe-sliders"></i><span id="bxTitleNm"><?php echo $breadcrumb;?></span></span>
				<span class="miBck">
                	<a href="javascript:void(0);" style="margin-left:-5px;" title="Search machine details" class="miDefault machineManage" id="machineSrch">
                    	<i class="ti-search"></i>
                    </a>
                </span>
                <span class="miBck">
                <a href="javascript:void(0);" style="margin-left:-5px;" title="Add Machine" class="miDefault machineManage" id="addNewMachineDetails" data-id="<?php echo $addMachine;?>">
                    	<i class="ti-plus"></i>
                    </a>
                </span>
			</div>
			<div class="row row-sm">
              <div id="amiResult">
				  <div class="table-responsive">
                    <table class="table text-nowrap text-md-nowrap table-striped table-bordered table-hover mg-b-0" id="machine_det">
                        <thead class="ami_tHeader">
                            <tr>
                                <th><div style="width:50px;">S.No.</div></th>
                                <th>MACHINE CODE </th>
                                <th>BRAND NAME</th>
                                <th>Model</th>
                                <th>Machine IP</th>
                                <th>Connection Mode</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                    </table>
                  </div>
              </div>    
              <div id="amiMachineAllChanges">
                <div class="col-md-12">
                	<?php //print_r($this->session->userdata('user_cate'));?>
               <form method="post" id="manage_branch"> 
               		<input type="hidden" id="target" name="target" value="<?php echo $target;?>" />	  
                    <input type="hidden" id="oprType" name="oprType"/>
               		<div class="row row-sm">
                	<div class="col-md-4">
                        <label>Machine Code : </label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend"><span class="input-group-text miClr"><i class="si si-grid"></i></span></div>
                            <input type="text" readonly="readonly" name="gtMchneCode" id="gtMchneCode" class="form-control" value="<?php echo $newMachineID;?>">
                        </div>
                    </div>
                    
                   <div class="col-md-4">
                        <label>Machine Brand :<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend"><span class="input-group-text miClr"><i class="si si-screen-tablet"></i></span></div>
                           <div class="miSlwdth" style="width:88.38%"> 
							 <select class="form-control select2-with-search" name="machineBrand" id="machineBrand">
                              <option value=""> --- Select State --- </option>
                              <option value="Realtime"> Realtime</option>
                              <option value="Attendance">Essl Machine</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Model Number : <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend"><span class="input-group-text miClr"><i class="fe fe-cpu"></i></span></div>
                            <input type="text" class="form-control" name="machineModelNo" id="machineModelNo">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Machine/Device Id : <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend"><span class="input-group-text miClr"><i class="fe fe-hard-drive"></i></span></div>
                            <input type="text" class="form-control" name="machineDeviceNo" id="machineDeviceNo">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Machine Ip Address : <span class="text-danger">*</span> <span id="error"></span></label>
                                              <div class="input-group mb-3">
                            <div class="input-group-prepend"><span class="input-group-text miClr"><i class="si si-screen-desktop"></i></span></div>
                            <input type="text" class="form-control" name="machineIpAddr" id="machineIpAddr">
                        </div>
                    </div>                   
                    <div class="col-md-4">
                        <label>Machine Port No. : <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend"><span class="input-group-text miClr"><i class="si si-directions"></i></span></div>
                            <input type="text" class="form-control" name="machinePort" id="machinePort">
                        </div>
                    </div>
                    <div class="col-12">
                        <label>Machine Location : <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend"><span class="input-group-text miClr"><i class="si si-pin"></i></span></div>
                           <textarea class="form-control" name="machineLocation" id="machineLocation" rows="2" placeholder="Machine Location..."></textarea>
                        </div>
                    </div>
                   
                    <div class="col-md-4">
                        <label>Select Branch :<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend"><span class="input-group-text miClr"><i class="si si-screen-tablet"></i></span></div>
                           <div class="miSlwdth" style="width:88.38%"> 
							 <select class="form-control select2-with-search" name="branchName" id="branchName">
                                 <option value=""> --- Select One --- </option>
                                <?php foreach($branchLIst as $bList):?>
                                    <option value="<?php echo $bList['id'];?>"> <?php echo $bList['branch_name'];?></option>
                                <?php endforeach;?>
                            </select>
                            </div>
                        </div>
                    </div>
                  
                    <div class="col-md-4">
                        <label>Connection Mode : <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend"><span class="input-group-text miClr"><i class="si si-equalizer"></i></span></div>
                           <div class="miSlwdth" style="width:88.38%"> 
							 <select class="form-control select2-with-search" name="con_mode" id="con_mode">
                               <option value=""> --- Select State --- </option>
                               <option value="CLOUD">CLOUD</option>
                               <option value="LAN">LAN</option>
                             </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <label>Serial No. : <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend"><span class="input-group-text miClr"><i class="si si-info"></i></span></div>
                            <input type="text" class="form-control" name="machineSno" id="machineSno">
                        </div>
                    </div>

                    <div class="col-4">
                    <label>State: <span class="text-danger">*</span></label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text miClr"><i class="fe fe-tv"></i></span>
                        </div>
                       <div class="miSlwdth" style="width:88.38%"> 
                         <select class="form-control select2-with-search empSelectR" name="get_state" id="get_state">
                          <option value=""> --- Select State --- </option>
                            <?php if($getState){foreach($getState as $state){?>   
                              <option value="<?php echo $state->id;?>" >
                                    <?php echo $state->state_cities;?>
                               </option>
                            <?php }}?>
                        </select>
                        </div>
                    </div>
                    </div>
                    <div class="col-4">
                    <label>District: <span class="text-danger">*</span></label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text miClr"><i class="fe fe-map-pin"></i></span>
                        </div>
                       <div class="miSlwdth" style="width:88.38%"> 
                            <select class="form-control select2-with-search " name="district" id="district">
                                <option value=""> --- Select Dsitrict --- </option>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="col-4">
                    <label>Zipcode: <span class="text-danger">*</span></label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text miClr"><i class="fe fe-target"></i></span>
                        </div>
                        <input type="text" class="form-control" name="zipCode" id="zipCode">
                    </div>
                    </div>

                    <div class="col-12">
                        <label>Remarks : <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend"><span class="input-group-text miClr"><i class="si si-book-open"></i></span></div>
                           <textarea class="form-control" name="machineRemarks" id="machineRemarks" rows="2" placeholder="Remarks..."></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <a href="javascript:void(0)"  class="btn ripple btn-outline-dark machineManage" id="bkSrch_01"><i class="fe fe-arrow-left"></i> Back</a>   
                       <button class="btn ripple btn-outline-success pull-right" id="manage"><i class="ti-save"></i> Update</button>
                    </div>
                    </div> 
                </form>
			</div>
              </div>	
		   </div>
           <input type="hidden" id="target" name="target" value="<?php echo $target;?>" />	  
	</div>
   <!-- End Row -->
</div>


<div id="statusChange" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style=" padding-left: 0px;" aria-modal="true" role="dialog">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right;"><i class="si si-close"></i></button>
            <div class="delMsg"><i class="fe fe-sliders"></i> Machine Status</div>
                <div class="actnData"><i class="si si-power"></i>  Are you sure want to activate of Machine ID #F33333</div>
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

<script src="<?php echo base_url('assets/js/setting/machine.js'); ?>"></script>





  