<div class="inner-body">                       
	<!-- Page Header -->
	<div class="page-header">
		<div>
			<h2 class="main-content-title tx-24 mg-b-5">Branch</h2>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">All</a></li>
				<li class="breadcrumb-item active" aria-current="page">View</li>
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
	<!-- End Page Header -->

	<style>
		.miBck a:hover{ background-color:#645bca; color:#fff;}
		.miBck{ font-weight:600;text-transform: uppercase; float:right;margin-right: 10px;padding-top: 7px;}
		.miBck a{ border:1px solid #645bca;padding: 8px 12px 8px 12px;border-radius: 5px;color: #645bca;font-weight: bold;}
		.miLst{ font-weight:600;text-transform: uppercase;}
		.miLst i{ background-color: #645bca;padding: 11px 11px 10px 10px ;margin-right: 10px;border-radius: 20px;color: #fff;font-weight: bold;}
		.miHeader{padding:10px 15px 10px 15px;border-bottom: 1px solid #cccece;margin: 0px -10px 20px -10px;border-top-left-radius: 5px;border-top-right-radius: 5px;}
		.cardTtl{border:1px solid #fff;padding:0px 0px 40px 0px;margin-bottom: 75px;border-radius: 5px;background-color: #fff;}
.ami_tHeader > tr > th{ color:#FFFFFF !important;border: 1px solid #088 !important;padding: 12px 0px 12px 5px !important;}.ami_tHeader > tr{border: 1px solid #088 !important;}

		
		#searchBranchDetails,#newBranchID,#amiBranchAllChanges{display:none;}.input-group-text i{ color:#06a470;}.miSlwdth{width:92.33%}
		.dataTables_processing{ background-color:#EBC7A0 !important; color:#874921 !important;}
		.depDesig{margin:-39.5px 0px 23.5px 39px !important; width:100%; border:1px solid #e8e8f7; border-left:0px solid #e8e8f7; border-top-right-radius:3px;border-bottom-right-radius:3px; cursor:pointer;}
		.depSelct{ color:#0D3E73;margin:8px 5px -15px 1px; padding-left: 10px;}
		.depDesig-drop{margin:39px 0px 0px 0px;z-index: 1;position: absolute; width:100%; display:none;}
		.depDesig-drop ul{ list-style:none;margin-bottom: 0px; margin-left: 8px;margin-right: -1px;border-right: 1px solid #edeef0;}
		.depDesig-drop ul li{ background-color:#fff;padding: 10px; width:100%;border-bottom: 1px solid #e8e9ea;box-shadow: -8px 12px 18px 0 rgba(21, 21, 62, 0.3);cursor: pointer;}
		.depDesig-drop ul li span{padding: 2px 10.25px 2px 10.25px;background-color: #5e68ff;margin: 0px 7px 0px 3px;border-radius: 5px;font-weight: bold;color: #fff; cursor:pointer}.mrkAdd{ padding:2px 5px 2px 5px !important;margin-right: 3px !important;}
#getCheckMrk/*,#getDepIdFr,#getDesigIdFr*/{display:none;}

	</style>
<span id="newBranchID"><?php echo $newBranchID;?></span>
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
                <a href="javascript:void(0);" style="margin-left:-5px;" title="Click to add branch details" class="miDefault branchManage" id="addNewBranchDetails" data-id="<?php echo $addBranch;?>">
                    	<i class="ti-plus"></i>
                    </a>
                </span>
			</div>
			<div class="row row-sm">	
			<div id="amiResult">
			 <div class="table-responsive">
            	<table class="table text-nowrap text-md-nowrap table-striped table-bordered table-hover mg-b-0" id="branch_det">
					<thead class="ami_tHeader">
						
							<tr>
								<th><div style="width:50px;">S.No.</div></th>
                                <th>BRANCH CODE</th>
                                <th>BRANCH NAME</th>
                               <!-- <th>ADDRESS</th><th>CONTACT NAME</th><th>PHONE NO.</th>-->
                                <th>MOBILE NO.</th>
                                <th>EMAIL-ID</th>
                                <!--<th>PINCODE</th>-->
                                <th>Status</th>
                                <th class="text-center">Action</th>
							</tr>
				
					</thead>
				</table>
              </div>
			</div>
            <div id="amiBranchAllChanges">
              	
                <div class="col-md-12">
                	<?php //print_r($this->session->userdata('user_cate'));?>
               <form method="post" id="manage_branch" data-id="<?php echo $oprLocTrgt;?>"> 
               		<input type="hidden" id="target" name="target" value="<?php echo $target;?>" />	  
                    <input type="hidden" id="oprType" name="oprType"/>
               		<div class="row row-sm">
                		<div class="col-md-6">
                        <label>Branch Code:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text miClr"><i class="si si-grid"></i></span>
                            </div>
                            <input type="text" readonly="readonly" name="gtBrCode" id="gtBrCode" class="form-control" value="<?php echo $newBranchID;?>">
                        </div>
                    </div>
                    	<div class="col-md-6">
                        <label>Branch Name: <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text miClr"><i class="si si-layers"></i></span>
                            </div>
                            <input type="text" class="form-control" name="brNwName" id="brNwName" oninput="this.value=this.value.replace(/[^a-zA-Z\s]/g,'').replace(/\s+/g,' ')">
                        </div>
                    </div>
                   	</div>
                    <div class="row row-sm">
                        <div class="col-md-6">
                            <label>Department:<input type="hidden" id="getDepIdFr" name="getDepIdFr" value=""/></label>
                            <div class="input-group mb-3" style="height:63px;">
                                <div class="input-group-prepend">
                                <span class="input-group-text miClr"><i class="si si-organization"></i></span>
                                </div>
                               <div class="depDesig" id="department">
                               		<div class="depSelct" id="depSelct"> Select Department</div><span id="getCheckMrk">&#10003;</span>						
                                    
                               </div>
                               <div class="depDesig-drop" id="opn--department">
                                    <ul>  
                                         <?php 
                                    if($getDepartment)
                                    {
                                        foreach($getDepartment as $dep)
                                        {
                                           $depID=$dep->id.'--'.str_replace(" ","_",$dep->department_name);
										   $liUrlActn=base_url('software/branch/administration/department');
                                            ?> 
                                            	<li id="dept--<?php echo $depID;?>" data-id="<?php echo $liUrlActn;?>" class="depCollect">
                                                	<span id="adMrk--<?php echo $dep->id;?>"></span>
													<?php echo $dep->department_name;?>
                                                </li>
                                          <?php  }}else{echo '<li>There is no data available here</li>';}?>    
                                    </ul>    	
                                </div>
                             </div>
                        </div>
                        <div class="col-md-6">
                            <label>Designation:<input type="text" id="getDesigIdFr" name="getDesigIdFr" value=""/></label>
                            <div class="input-group mb-3" style="height:63px;">
                                <div class="input-group-prepend">
                                <span class="input-group-text miClr"><i class="si si-graduation"></i></span>
                                </div>
                                 <div class="depDesig" id="gtDeisgnation">
                               		<div class="depSelct" id="desigSelct"> Select Designation</div>					
                                    
                               </div>
                              	 <div class="depDesig-drop" id="opn--gtDeisgnation">
                                    <ul id="availDesgination">  
                                         <li>There is no data available here</li> 
                                    </ul>    	
                                </div>    
                            </div>
                        </div>
                    	
                   	</div>
                   <div class="row row-sm">
                    <div class="col-md-6">
                        <label>Contact Name: <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text miClr"><i class="si si-user"></i></span>
                            </div>
                        <input type="text" class="form-control" name="contactName" id="contactName" oninput="this.value=this.value.replace(/[^a-zA-Z\s]/g,'').replace(/\s+/g,' ')">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Alternate Mobile Number: <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text miClr"><i class="si si-phone"></i></span>
                            </div>
                            <input type="text" class="form-control" name="contactNu" id="contactNu"  maxlength="10" oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Mobile Number: <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text miClr"><i class="si si-screen-smartphone"></i></span>
                            </div>
           <input type="text" id="mobileNu" maxlength="10" oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')" name="mobileNu" class="form-control">
                        </div>
                    </div>                   
                    <div class="col-md-6">
                        <label>Email Id: <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text miClr"><i class="si si-envelope"></i></span>
                            </div>
                            <input type="text" class="form-control" name="emailID" id="emailID">
                        </div>
                    </div>
                    <div class="col-12">
                        <label>Address: <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text miClr"><i class="si si-home"></i></span>

                            </div>
                           <textarea class="form-control" name="brAddress" id="brAddress" rows="2" placeholder="Branch Address..."></textarea>
                        </div>
                    </div>
                    <div class="col-4">
                        <label>State: <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text miClr"><i class="fas fa-briefcase"></i></span>
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
                                <span class="input-group-text miClr"><i class="fas fa-briefcase"></i></span>
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
                                <span class="input-group-text miClr"><i class="si si-pin"></i></span>
                            </div>
                            <input type="text" class="form-control" name="zipCode" id="zipCode" oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')" maxlength="6">
                        </div>
                    </div>
                    <div class="col-md-12">
                       <a href="javascript:void(0)"  class="btn ripple btn-outline-dark branchManage" id="bkSrch_01">
							<i class="fe fe-arrow-left"></i> Back</a>
                            <button class="btn ripple btn-outline-success pull-right" id="manage"><i class="ti-save"></i> Update </button>
                    </div>
                    </div> 
                </form>
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
            <div class="delMsg"><i class="fe fe-sliders"></i> Branch Status</div>
                <div class="actnData"><i class="si si-power"></i>  Are you sure want to activate of Branch ID #F33333</div>
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

.miLvs{ padding:5px 12px 5px 12px;}.delMsg {text-align: center;font-size: 20px;margin: 30px 0px 10px 0px;color :#00805c;}.actnData {text-align: center;margin: 0px 0px 20px 0px;color: #716c6c;font-size: .8rem;}.delMsg i{ background-color: #00805c;padding: .5rem;font-size: .75rem;border-radius: .5rem;color: #fff;}
.form-control[readonly] { background-color: #fff !important;}	
	.mibdge{ padding:6px 0px 6px 0px;width:70px;}
	.ami_tHeader{background-color:#088;}
	.ami_tHeader >tr>th{ color:#fff;font-weight: 600;padding:13px 7px 13px 7px;}
	.miSuccess{padding:6px 10px 6px 10px;color:#19b159;border:1px solid #19b159;border-radius: 2px;}
	.miSuccess:hover{background-color:#19b159;color: #fff;}
	.miDefault{padding:6px 10px 6px 10px;color:#3b4863;border:1px solid #3b4863;border-radius: 2px;}
	.miDefault:hover{background-color:#3b4863;color: #fff;}
	.miDanger{padding:6px 10px 6px 10px;color:#f16d75;border:1px solid #f16d75;border-radius: 2px;}
	.miDanger:hover{background-color:#f16d75;color: #fff;}
</style>
<script>
$(function() 
{
	$(document).on("click",'.depCollect',function()
	{
		let curentID=$(this).attr('id');
		let getResourceLoc=$(this).attr('data-id');
		let crntDiv=curentID.split('--');
		let getCheckMrk=$("#getCheckMrk").text();
		let optedDetails='';
		
	if(crntDiv[0]=='dept')
	{	
		let depSelct=$("#depSelct").html();
		let getDepIdFr=$('#getDepIdFr').val();
		if($('#'+curentID).hasClass('depActve'))
		{
			$('#'+curentID).removeClass('depActve');$("#adMrk--"+crntDiv[1]).html('').removeClass('mrkAdd');
			if(getDepIdFr!="")
			{
				let firstDt=getDepIdFr.substring(0,1);
				if(getDepIdFr==crntDiv[1]){optedDetails='';}
				else if(firstDt==crntDiv[1]){optedDetails=getDepIdFr.replace(crntDiv[1]+',','');}
				else{optedDetails=getDepIdFr.replace(','+crntDiv[1],'');}
				  $('#getDepIdFr').val(optedDetails);
				}
			}
			else
			{if(getDepIdFr!=""){optedDetails=getDepIdFr+","+crntDiv[1];$('#getDepIdFr').val(optedDetails);}else{$('#getDepIdFr').val(crntDiv[1]);}
				$('#'+curentID).addClass('depActve');$("#adMrk--"+crntDiv[1]).addClass('mrkAdd').html(getCheckMrk);
				}
			let crntOptedID=$('#getDepIdFr').val();
			$('#depSelct,#desigSelct').css('color','#2C6377').html('<i class="fe fe-sun bx-spin"></i> Please Wait...');		
			$.post(getResourceLoc,{id:crntOptedID}, function(htmlAmi)
			{
				if(htmlAmi.department)
				{
					$('#depSelct').css('color','#0D3E73').html(htmlAmi.department);
					$('#availDesgination').html(htmlAmi.designation);
					$('#desigSelct').css('color','#0D3E73').html(htmlAmi.titleDesign);
					}
				else
				{
					$('#depSelct').css('color','#0D3E73').html('Select Department');
					$('#desigSelct').css('color','#0D3E73').html(htmlAmi.titleDesign);
					$('#getDesigIdFr').val('');
					$('#availDesgination').html(htmlAmi.designation);
					 }
				},'json');		
			}		
			else if(crntDiv[0]=='desig')
			{
				let desigSelct=$("#desigSelct").html();
				let getDesigIdFr=$('#getDesigIdFr').val();
				$('#desigSelct').css('color','#2C6377').html('<i class="fe fe-sun bx-spin"></i> Please Wait...');
				if($('#'+curentID).hasClass('depActve'))
				{
					$('#'+curentID).removeClass('depActve');$("#adDesigMrk--"+crntDiv[1]).html('').removeClass('mrkAdd');
					if(getDesigIdFr!="")
					{
						let firstDt=getDesigIdFr.substring(0,1);
						if(getDesigIdFr==crntDiv[1]){optedDetails='';}
						else if(firstDt==crntDiv[1]){optedDetails=getDesigIdFr.replace(crntDiv[1]+',','');}
						else{optedDetails=getDesigIdFr.replace(','+crntDiv[1],'');}
						$('#getDesigIdFr').val(optedDetails);
						}
					}
					else
					{if(getDesigIdFr!=""){optedDetails=getDesigIdFr+","+crntDiv[1];$('#getDesigIdFr').val(optedDetails);}else{$('#getDesigIdFr').val(crntDiv[1]);}
						$('#'+curentID).addClass('depActve');$("#adDesigMrk--"+crntDiv[1]).addClass('mrkAdd').html(getCheckMrk);
						}		
						/*$('#desigSelct').css('color','#2C6377').html('<i class="fe fe-sun bx-spin"></i> Please Wait...');		
						$.post(getResourceLoc,{id:getDesigIdFr,crID:crntDiv[1]}, function(htmlAmi)
						{
							if(htmlAmi.resultAction=='success')
							{
								$('#getDesigIdFr').html(desigID	);
								$('#desigSelct').css('color','#0D3E73').html(htmlAmi.titleDesign);
								}
								else
								{
									$('#desigSelct').css('color','#0D3E73').html(htmlAmi.titleDesign);
									$('#getDesigIdFr').val('');
									}
							},'json');	*/	
				
				
				}
		});
$(document).ready(function(){
  $(".depDesig").click(function(){
    let curentDiv=$(this).attr('id');
	$("#opn--"+curentDiv).toggle();
  });
	});  
});
</script>

<script src="<?php echo base_url('assets/js/setting/branch.js'); ?>"></script>

