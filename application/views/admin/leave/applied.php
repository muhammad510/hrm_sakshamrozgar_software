<style>
.dataTables_processing{ background-color:#DCC392 !important; color:#805400;}
.miWdth{ width:65px;}
#forViewDetailLeave{ display:none;}/*.lvListView{ display:none;}*/
.btn-miOk {color: #10c1b1  !important;border-color: #10c1b1 ;}
.btn-miOk:hover{border-color: #10c1b1 ; background-color:#10c1b1; color:#fff !important }
.appResultMsg{padding:20px;padding-right:20px;padding-left:20px;margin:auto auto 35px auto;width:75%;border-radius:10px;text-align: center; }

.delMsg{text-align:center;font-size:20px;margin:30px 0px 10px 0px;color:#c65300;}
.delMsg i{background-color: #c65300;color:#fff;padding: 7px;border-radius: 5px;}

.actnData{text-align: center;margin: 0px 0px 20px 0px;color: #716c6c;font-size: .8rem;}

</style>
 <!-------------------- @mit Code Changes Here Start -------------------->                     
     <div class="row row-sm" style="margin:15px -10px 15px -10px;">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header  border-0"> <h4 class="card-title"><?php echo $title; ?> Summary</h4> </div> 
                 <div class="card-body lvListView">   
                    <form method="post" id="search_details">
                    <div class="row row-sm">
                        <div class="col-lg-6 col-md-6">
                            <div class="row"> 
                              <div class="col-md-6"> 
                                  <div class="form-group"> 
                                    <label class="form-label">Start Date:</label> 
                                     <div class="input-group">
                                        <div class="input-group-text border-end-0">
                                            <i class="fe fe-calendar lh--9 op-6"></i>
                                        </div>
                                        <input type="text"  id="strtDt" name="strtDt" class="form-control fc-datepicker dtClean" placeholder="DD/MM/YYYY" >
                                    </div> 
                                   </div> 
                              </div> 
                              <div class="col-md-6">
                               <div class="form-group">
                                <label class="form-label">End Date:</label> 
                                  <div class="input-group">
                                        <div class="input-group-text border-end-0">
                                            <i class="fe fe-calendar lh--9 op-6"></i>
                                        </div>
                                        <input type="text" id="endDt" name="endDt"  class="form-control fc-datepicker dtClean" placeholder="DD/MM/YYYY">
                                    </div>
                              </div>
                             </div>
                            </div>                                                                                            
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="row"> 
                              <div class="col-md-5"> 
                                  <div class="form-group"> 
                                    <label class="form-label">Leave Type:</label> 
                                         <select name="leaveTp" id="leaveTp" class="form-control custom-select select2">
                                             <option label="Select Status"></option> 
											 <?php if($leaveManage){?>
                                             <option value="99">All</option> 
                                             <?php foreach($leaveManage as $mLv){?>
                                             <option value="<?php echo $mLv['id'];?>"><?php echo $mLv['leave_name'];?></option> 
                                             <?php }}else{?> <option value="9999">No Available</option><?php }?>
                                         </select> 
                                   </div> 
                              </div> 
                              <div class="col-md-4">
                               <div class="form-group">
                                <label class="form-label">Status:</label> 
                                    <select name="applyStatus" id="applyStatus" class="form-control custom-select select2 arvChange">
                                        <option label="Select Status"></option> 
                                          <!--  <option value="99">All</option> -->
                                           <?php if($reportTyp=='requested'){?> 
                                            <option value="3">Hold</option> 
                                            <option value="4">Pending</option>
											<?php } else if($reportTyp=='approved'){?> 
                                            <option value="1">Approved</option>
                                            <option value="2">Reject</option>
                                            <?php }?>
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
                  <div class="card-body lvListView">
                  <?php 				  			
						/*if($isLeaveApproved)
						{
							foreach($isLeaveApproved as $aprLv)
							{
								print_r($aprLv);echo '<br>';
								}
							}*/
							?>
                    <div class="table-responsive">
                        <div class="row row-sm">
                            <table class="table text-nowrap text-md-nowrap table-striped table-bordered table-hover mg-b-0" id="reportAppearance">
                                <thead class="ami_tHeader">
                                     <tr>
                                        <th><div style="width:65px; text-align:center;">S. No.</div></th>
                                        <th>Emp ID</th>
										<th>Emp. Name</th>
										<!--<th>Leave Type</th>-->
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Days</th>
                                        <!-- <th>Reason</th>-->
                                        <th>Applied On</th>
                                         <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>   
                    </div>
                </div>
                
                <div class="card-body" id="forViewDetailLeave">
               		<div style="padding:4rem; border:1px solid #f7f7f7;font-size:1.25rem;">
                        <div class="row row-sm">
                        	<div id="showResultHere">	
                                <div style="font-weight:700;">
                                    To,<br />
                                    The Branch Manager,<br/>
                                    <span class="emName"></span>,<br />
                                    <?php echo config_item('company_name'); ?><br />
    							</div>
                                <div style="margin: 20px auto 20px auto;">Dear Sir,</div>
                                
                                
                              <p id="uprAppMsg">I hope this message finds you well. I am writing to inform you that I have been unwell for the past three days, and today I visited the hospital for a blood test. The test results revealed that I am suffering from dengue fever/flu, along with cough and high temperature. The doctor has advised me to take at least three weeks of bed rest for proper recovery.</p>
                              <p id="gtLwrAppMsg">Given my current health condition and the level of weakness, I believe it would not be feasible for me to come to the office or work during this period. Therefore, I kindly request you to accept my sick leave application and grant me leave for three weeks from (date to date). Your understanding and support in this matter will be highly appreciated.</p>
                      
        <div style="margin: 20px auto 10px auto;"> Thank you for considering my request,</div>
        <div style="margin: 0px auto 5px auto;"> Regards,</div>
        <div style="margin-bottom:10px;font-size:.9rem;">Name : <span style="font-weight:600;text-transform:uppercase;padding-left:5px;"><span class="emName"></span></span></div>
        <div style="margin-bottom:10px;font-size:.9rem;">Designation : <span style="font-weight:600;padding-left:5px;"><span id="emAppledDegsin"></span></span></div>
        <div style="margin-bottom:35px;font-size:.9rem;">Date : <span style="font-weight:600;padding-left:5px;"><span id="emAppledDate"></span></span></div>


        <div id="appStatusWillShow">
        </div>
	<!--	<div class="appResultMsg" id="memMsgReson" style="border:1px solid #909000">
        </div>-->

                <input type="hidden" id="appStsShow" />                  
                               </div>
                            <div class="col=md-12">
                            	<a href="javascript:void(0);" class="btn ripple btn-outline-dark miArvAction" id="BackToList"><i class="ti-arrow-left"></i> Back</a>
                                <button type="button" class="btn ripple btn-outline-danger pull-right miArvAction" style="margin-left:5px;" id="rejectApp" data-id="<?php echo $appManage;?>">
                                	<i class="fe fe-x"></i> Reject 
                                </button>
                                <button type="button"  class="btn ripple btn-outline-success pull-right miArvAction" id="acceptApp"  data-id="<?php echo $appManage;?>">
                                	<i class="fe fe-check"></i> Accept
                                </button>
                                
                            	
                            </div>       
                        </div>
                   </div> 
                </div>
                
                
            </div>
        </div>
    </div>
 
 <!-------------------- @mit Code Changes Here End ---------------------->
 
 
 <!-------------------------Delete Leave details start------------------------------->
<div id="deleteLeave" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style=" padding-left: 0px;" aria-modal="true" role="dialog">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right;"><i class="si si-close"></i></button>
            <div class="delMsg"><i class="ti-trash"></i> Delete Application</div>
                <div class="actnData"><i class="si si-power"></i>  Are you sure want to activate of salary ID #F33333</div>
                <div id="mdlFtrBtn">
                  <button type="button" class="btn btn-outline-secondary waves-effect waves-light pull-right miAction" id="cnfChanges" data-id="@misingh143">
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
<!-------------------------Delete Leave details end------------------------------->    
    
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 <!--<script src="<?php //echo base_url('assets/js/employee/pay_slips.js');?>"></script>-->
 <script>
 $(function() 
 {
	$(document).on("click", '.miAction', function() 
	{
		let actNbtn = $(this).attr('data-id');
		let getData=actNbtn.split('===');
		if(getData[0]=='watchLeaveDetails')
		{
			let target=$('#base_url').val()+getData[1];
			$('.lvListView').hide();
			$('#forViewDetailLeave').show();
			$.post(target,{oprType:getData[2]},function(htmlAmi) 
			{				
				$('.emName').html(htmlAmi.name);$('#emAppledDegsin').html(htmlAmi.designation_name);$('#emAppledDate').html(htmlAmi.created_date);
				$('#appStatusWillShow').html(htmlAmi.apStatus);$('#gtLwrAppMsg').html(htmlAmi.lwrAppMsg);$('#uprAppMsg').html(htmlAmi.uprAppMsg);
				$('#appStsShow').val(htmlAmi.id);$('#memMsgReson').html(htmlAmi.reason);
				$('#rejectApp,#acceptApp').prop("disabled",false);
				$('#acceptApp').html('<i class="fe fe-check"></i> Accept');$('#rejectApp').html('<i class="fe fe-x"></i> Reject');
				if(htmlAmi.status=='1' || htmlAmi.status=='2'){$('#rejectApp,#acceptApp').hide();}else{$('#rejectApp,#acceptApp').show();}
				},'json');
			}
		else if(getData[0]=='delOperation')
		{
			let target=$('#base_url').val()+getData[1];
			$.post(target,{oprType:getData[2]},function(htmlAmi) 
			{				
				$('.actnData').html(htmlAmi.msg);
				$('#cnfChanges').attr('data-id',htmlAmi.action);
				},'json');
			}	
		else if(getData[0]=='miConfirmDel')
		{
			let target=$('#base_url').val()+getData[1];
			$('#cnfChanges').html('<i class="fe fe-settings bx-spin"></i> Please Wait').removeClass('btn-outline-secondary').addClass('btn-outline-primary');
			$.post(target,{oprType:getData[2]},function(htmlAmi) 
			{				
				$('.actnData').html(htmlAmi.msg);$('#cnfChanges').html('Confirm <i class="si si-check"></i>').removeClass('btn-outline-primary').addClass('btn-outline-secondary');
				if(htmlAmi.tnxResult=='success'){setTimeout(function(){window.location.reload(1);},2000);}
				},'json');
			
		
		}	
		
		
		
		
 	});
	$(".miArvAction").click(function()
	{
		let actNbtn = $(this).attr('id');
		if(actNbtn=='BackToList'){$('#forViewDetailLeave').hide();$('.lvListView').show();}
		else if(actNbtn=='acceptApp' || actNbtn=='rejectApp')
		{
				if(actNbtn=='acceptApp'){$('#rejectApp').prop("disabled",true);}else{$('#acceptApp').prop("disabled",true);}
				$('#'+actNbtn).html('<i class="fe fe-settings bx-spin"></i> Please Wait');
				$.post($(this).attr('data-id'),{oprType:actNbtn,id:$('#appStsShow').val()},function(htmlAmi) 
				{
					if(actNbtn=='rejectApp'){$('#rejectApp').html('<i class="fe fe-x"></i> Reject');}else{$('#acceptApp').html('<i class="fe fe-check"></i> Accept');}	
						$('#appStatusWillShow').html(htmlAmi.result);toastMultiShow(htmlAmi.addClas,htmlAmi.msg, htmlAmi.icon);
						 if(htmlAmi.addClas=='tst_success'){setTimeout(function(){window.location.reload(1);},2000);}
					},'json');
			
			}
		});
});
 
function toastMultiShow(adCls,msg,icon){let valid='';let myClass="tst_success tst_warning tst_danger";let restCls=myClass.replace(adCls," ");let addonMsg='';$.each(msg,function(i, item){valid+='<li>' + item + '</li>';});
    $('.tst_danger') /*.addClass('ts_dan')*/ ;
    $('.tst_warning').addClass('ts_war');
    if (adCls == 'tst_success') { addonMsg = icon + ' <ul>' + valid + '</ul>'; } else if (adCls == 'tst_danger') { addonMsg = icon + ' <ul>' + valid + '</ul>'; } else if (adCls == 'tst_warning') { addonMsg = icon + ' <ul>' + valid + '</ul>'; }
    $('.ami_toast').css('visibility', 'visible').html(addonMsg).addClass(adCls).removeClass(restCls);
    setTimeout(function() { $('.ami_toast').css('visibility', 'hidden') }, 2000);
}
 </script>
 
<script src="<?php echo base_url('assets/js/admin/leave_applied.js')?>"></script> 
 
 
 
 
 
 
 
 