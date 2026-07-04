<style>


.miSlwdth{width:92.33%;margin: -38px 0px 0px 39px !important;}
.select2-container .select2-selection--single{ height:38px;padding-top:3px;border-color: #e1e1e1;
    border-left-color: rgb(225, 225, 225);
  border-top-left-radius: 0px;
  border-bottom-left-radius: 0px;
  border-left-color: #e3e3e3; }
.select2-container--default .select2-selection--single .select2-selection__arrow b
{margin-top: 2px;margin-left: -10px;
	
	}
.depDesig{/*margin:-39.5px 0px 23.5px 39px !important;*/ width:100%; border:1px solid #e8e8f7; border-top-right-radius:3px;border-bottom-right-radius:3px; cursor:pointer;}
		.depSelct{ color:#0D3E73;margin: 7px 5px 7px 1px;padding: 0px 0px 0px 10px;}
		.depDesig-drop{margin:0px 0px 0px -20px;z-index: 1;position: absolute; width:100%; display:none;
	max-height: 200px;
			overflow-x:hidden;
  overflow-y: scroll;
  scrollbar-width: thin;
  scrollbar-color:#27456a #f2f2f2;	
		-webkit-box-shadow:0 8px 8px -11px #000;
   -moz-box-shadow:0 8px 8px -11px #000;
        box-shadow:0 8px 8px -11px #000;
		
		}
		.depDesig-drop ul
		{
			list-style:none;margin-bottom: 0px; margin-right:0px;border-right: 1px solid #edeef0;
			
			 margin-left:-12px;
			
  }
		.depDesig-drop ul li{ background-color:#fff;padding: 10px; width:100%;border-bottom: 1px solid #e8e9ea;cursor: pointer;border-left: 1px solid #edeef0;}
		.depDesig-drop ul li span{padding: 2px 10.25px 2px 10.25px;background-color: #3a83e1;margin: 0px 7px 0px 3px;border-radius: 5px;font-weight: bold;color: #fff; cursor:pointer}.mrkAdd{ padding:2px 5px 2px 5px !important;margin-right: 3px !important;}
#getCheckMrk,#getDepIdFr/*,#getDesigIdFr*/{display:none;}


#searchTyp{ width:100% !important;}





/*************************************************************************/	
.tTle{border-bottom:1px solid #e3e3e3;padding-bottom: 5px; color:#0576b9;text-transform: uppercase;margin-top: -10px !important;}
.tLeft i{background-color: #0576b9;padding: 11px 11px 10px 10px;margin-right: 10px;border-radius: 20px;color: #fff;font-weight: bold;}
.miBck a:hover{ background-color:#0576b9; color:#fff;}.miBck{ font-weight:600;text-transform: uppercase; float:right;margin-right:-10px;padding-top: 60px;}
.miBck a{ border:1px solid #0576b9;padding:5px 12px 5px 12px;border-radius: 5px;color: #0576b9;font-weight: bold;}
.miLvs {padding: 5px 12px 5px 12px;}.bgDng{ padding: 5px;}.edtPd{ padding:3px 5px 3px 10px;}
.input-group-text i{ color:#06a470;}.input-group-text{ height:38px;}
/*************************************************************************/	
.select2-container--default .select2-selection--single {border-radius:4px !important;}
.select2-container--default .select2-selection--single .select2-selection__rendered {line-height:28px !important;}
.select2-container--default .select2-selection--single .select2-selection__arrow {top: 1px;right: 1px;}











#searchBranchDetails,#newBranchID,#amiBranchAllChanges{display:none;}
</style>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between card flex-sm-row border-0">
            <h4 class="mb-sm-0 font-size-16 fw-bold"><?php echo $title ?></h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
                    <li class="breadcrumb-item active"><?php echo $breadcrums ?></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<span id="newBranchID"><?php echo $newBranchID;?></span>
<div id="searchBranchDetails">
	<form method="post"  id="search_branch">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-header header-green"><i class="mdi mdi-shopping"></i> Search Branch Details</div>
			<div class="card-body p-4" style="margin-bottom:-10px;">
				<div class="row row-sm">
                  
                    <div class="col-md-6">
                        <label>Search Based On:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                            </div>
                           
                              <div class="miSlwdth"> 
                                  <select class="form-control amiSelect" name="searchTyp" id="searchTyp">
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
                                <span class="input-group-text"><i class="bx bx-desktop"></i></span>
                            </div>
                            <input type="text" class="form-control" name="srchContent" id="srchContent">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Branch Name:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bx bx-grid-small"></i></span>
                            </div>
                            <input type="text" class="form-control" name="brName" id="brName">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>State:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bx bx-book-bookmark"></i></span>
                            </div>
                            <div class="miSlwdth"> 
                                <select class="form-control amiSelect" name="state" id="state">
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
                       <a href="javascript:void(0)"  class="btn ripple btn-outline-dark branchManage" id="bkSrch"><i class="bx bx-arrow-back"></i> Back</a>
                            <button class="btn ripple btn-outline-success pull-right" onclick="return get_search(reportBranch,'#search_branch','#branch_det')">
                            	<i class="mdi mdi-account-search"></i> Search
                            </button>
                    </div>
                </div>
                
                
                
                <!--<div class="row">
				<div class="col-lg-6">
						<div class="form-floating mb-3">
							<input type="text" name="tnxId" id="tnxId" value="" class="form-control">
							<label for="mobileN"><i class="bx bx-transfer fntClr"></i> Transaction Id</label>
						</div>
					</div>
				<div class="col-lg-6">
					<div class="form-floating mb-3">
						<input type="text" nname="srchContent" id="srchContent" class="form-control" >
						<label for="userId"><i class="bx bxs-user fntClr"></i> Search Content:</label>
					</div>
				</div>
					
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-floating mb-3">
							<input type="date" name="strtDt" id="strtDt" value="" class="form-control">
							<label for="strtDt"><i class="mdi mdi-calendar-account fntClr"></i> Join Start Date </label>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-floating mb-3">
							<input type="date" name="endDt" id="endDt" value="" class="form-control">
							<label for="endDt"><i class="mdi mdi-calendar-account fntClr"></i> Join End Date </label>
						</div>
					</div>
				</div>
		<a href="<?php echo base_url(); ?>mlm_software/admin/pin/manage" class="btn btn-outline-dark  waves-effect waves-light"><i class="bx bx-arrow-back"></i> Back</a>
<button type="submit" class="btn btn-outline-primary waves-effect waves-light pull-right ActnCmdByAmi" onclick="return get_search(reportPinTable,'#search_pin','#epin_table')" style="float:right;"><i class="mdi mdi-account-search"></i> Search </button>-->
			</div>
		</div>

	</div>
</form>
</div>
<div class="card">
    <div class="card-body">	
    <h4 class="card-title mb-4 tTle">
    	<span class="tLeft"><i class="bx bx-sitemap"></i></span><span id="bxTitleNm"><?php echo $title;?></span>
    	<span class="miBck">
            <a href="javascript:void(0);" style="margin-left:-5px;" title="Click to search branch details" class="miDefault branchManage" id="branchSrch">
                <i class="bx bx-search"></i>
            </a>
        </span>
        <span class="miBck">
                <a href="javascript:void(0);" style="margin-left:-5px;" title="Click to add branch details" class="miDefault branchManage" id="addNewBranchDetails" data-id="<?php echo $addBranch;?>">
                    	<i class="bx bx-plus"></i>
                    </a>
                </span>    
    </h4>
		<div id="defaultMsg" class="alert alert-warning" role="alert" style="display:none;">&nbsp;</div>	
		  <div id="amiResult"> 
            <div class="table-responsive">
				<div id="search_data">  
				<table id="branch_det" class="table align-middle table-striped table-nowrap mb-0 text-nowrap">
                    <thead class="header-green">
                            <tr>
								<th><div style="width:50px;">S.No.</div></th>
                                <th>BRANCH CODE</th>
                                <th>BRANCH NAME</th>
                                <th>MOBILE NO.</th>
                                <th>EMAIL-ID</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
							</tr>
                        </thead>
                    </table>
				</div>
		   </div>
          </div> 
          <div id="amiBranchAllChanges">
          	 <form method="post" id="manage_branch"> 
               		<input type="hidden" id="target" name="target" value="<?php echo $target;?>" />	  
                    <input type="hidden" id="oprType" name="oprType"/>	
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Branch Code :</label>
                                  <input type="text" readonly="readonly" name="gtBrCode" id="gtBrCode" class="form-control" value="<?php echo $newBranchID;?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="example-search-input" class="form-label">Branch Name :</label>
                                 <input type="text" class="form-control" name="brNwName" id="brNwName" oninput="this.value=this.value.replace(/[^a-zA-Z\s]/g,'').replace(/\s+/g,' ')">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label  for="example-search-input" class="form-label">Department :<input type="hidden" id="getDepIdFr" name="getDepIdFr" value=""/></label>
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
                                               $liUrlActn=base_url('admin/branch/administration/department');
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
                        
                        
                    <div class="col-lg-6">
                            <div class="mb-3">
                                <label  for="example-search-input" class="form-label">Designation :<input type="hidden" id="getDesigIdFr" name="getDesigIdFr" value=""/></label>
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
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">Contact Name :</label>
                            <input type="text" class="form-control" name="contactName" id="contactName" oninput="this.value=this.value.replace(/[^a-zA-Z\s]/g,'').replace(/\s+/g,' ')">
                        </div>
                    </div>  
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">Email Id :</label>
                            <input type="text" class="form-control" name="emailID" id="emailID">
                        </div>
                    </div>         
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">Contact Number :</label>
                             <input type="text" class="form-control" name="contactNu" id="contactNu"  maxlength="10" oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')">
                        </div>
                    </div>    
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">Alternate Mobile Number : </label>
                           <input type="text" id="mobileNu" maxlength="10" oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')" name="mobileNu" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">Address : </label>
                            <textarea class="form-control" name="brAddress" id="brAddress" rows="3" placeholder="Branch Address..."></textarea>
                        </div>
                    </div>                                            
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">State : </label>
                            <select class="form-control amiSelect empSelectR" name="get_state" id="get_state">
                              <option value=""> Select State  </option>
                                <?php if($getState){foreach($getState as $state){?>   
                                  <option value="<?php echo $state->id;?>" >
                                        <?php echo $state->state_cities;?>
                                   </option>
                                <?php }}?>
                            </select>
                        </div>
                    </div>                                           
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">District : </label>
                            <select class="form-control amiSelect" name="district" id="district">
                                <option value=""> Select Dsitrict  </option>
                            </select>
                        </div>
                    </div>                                          
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">State : </label>
                            <input type="text" class="form-control" name="zipCode" id="zipCode" oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')" maxlength="6">
                        </div>
                    </div>                    
                        
                        
                        
                        
                        
                        
                    </div>
                    <div class="col-md-12">
                           <a href="javascript:void(0)"  class="btn ripple btn-outline-dark branchManage" id="bkSrch_01">
                                <i class="bx bx-arrow-back"></i> Back</a>
                                <button class="btn ripple btn-outline-success pull-right" id="manage">
                                    <i class="bx bx-save"></i> Update
                                </button>
                        </div>
              </form>          
          </div>
    </div>
</div>
 
 
 
 
 <div class="modal fade" id="statusChange" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
		   <div class="modal-body">
			 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right;"></button>
				<div class="delMsg"><i class="bx bx-slider-alt"></i> Branch Status</div>
                <div class="actnData"><i class="bx bx-power-off"></i> Are you sure want to activate of Branch ID #F33333 </div>
				   <div id="mdlFtrBtn">
				   
						<button type="button" class="btn btn-outline-primary waves-effect waves-light pull-right getAction" id="cnfChanges" data-id="@misingh143">
                        	 Confirm <i class="bx bx-check-circle"></i>
                        </button>
						<button type="button" class="btn btn-outline-dark pull-right" data-bs-dismiss="modal"><i class="bx bx-arrow-back"></i> Back </button>
				   </div>		
				</div>
		</div>
	</div>
</div>
 
 
 
 
 
 
 
 
 
 
<script>

/*popup.addEventListener('click',function(e){e.stopPropagation();});
var body = document.body;body.addEventListener('click', function(e){if(popup.classList.contains('show')) {popup.classList.remove("show");});*/



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
					$('#depSelct').css('color','#0D3E73').html(htmlAmi.department);$('#availDesgination').html(htmlAmi.designation);
					$('#desigSelct').css('color','#0D3E73').html(htmlAmi.titleDesign);
					}
				else{$('#depSelct').css('color','#0D3E73').html('Select Department');$('#desigSelct').css('color','#0D3E73').html(htmlAmi.titleDesign);}
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
					//let crntOptedID=$('#getDesigIdFr').val();
					//$('#desigSelct').css('color','#2C6377').html('No Problem');		
					let getDesigId=$('#getDesigIdFr').val();
					console.log(getDesigId);
/*					$('#depSelct,#desigSelct').css('color','#2C6377').html('<i class="fe fe-sun bx-spin"></i> Please Wait...');		
					$.post(getResourceLoc,{id:crntOptedID}, function(htmlAmi)
					{
						if(htmlAmi.department)
						{
							$('#depSelct').css('color','#0D3E73').html(htmlAmi.department);$('#availDesgination').html(htmlAmi.designation);
							$('#desigSelct').css('color','#0D3E73').html(htmlAmi.titleDesign);
							}
						else{$('#depSelct').css('color','#0D3E73').html('Select Department');$('#desigSelct').css('color','#0D3E73').html(htmlAmi.titleDesign);}
						},'json');		
*/				
				
				}
		});
$(document).ready(function(){
  $(".depDesig").click(function(){
    let curentDiv=$(this).attr('id');
	$("#opn--"+curentDiv).toggle();
  });
   /*$(".depCollect").click(function()
   {
    
  });*/
	});  
});
</script>

<script src="<?php echo base_url('media/js/setting/branch.js'); ?>"></script>

