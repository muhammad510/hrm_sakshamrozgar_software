<style>
.dataTables_processing{ background-color:#DCC392 !important; color:#805400;}
.miWdth{ width:65px;}
#forViewDetailLeave{ display:none;}.lvListView{display:block;}
.btn-miOk{color:#10c1b1  !important;border-color:#10c1b1;}
.btn-miOk:hover{border-color:#10c1b1;background-color:#10c1b1;color:#fff !important }

</style>

 <!-------------------- @mit Code Changes Here Start -------------------->                     
     <div class="row row-sm" style="margin:15px -10px 15px -10px;">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header  border-0"> <h4 class="card-title">Leave Summary</h4> </div> 
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
                                        <input type="text"  id="strtDt" name="strtDt" class="form-control fc-datepicker dtClean" placeholder="MM/DD/YYYY" >
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
                                        <input type="text" id="endDt" name="endDt"  class="form-control fc-datepicker dtClean" placeholder="MM/DD/YYYY">
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
                                            <option value="99">All</option> 
                                            <option value="4">Pending</option>
                                            <option value="1">Approved</option>
                                            <option value="2">Reject</option>
                                            <option value="3">Hold</option> 
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
                  <?php //echo date('M');?>
                    <div class="table-responsive">
                        <div class="row row-sm">
                            <table class="table text-nowrap text-md-nowrap table-striped table-bordered table-hover mg-b-0" id="reportAppearance">
                                <thead class="ami_tHeader">
                                     <tr>
                                        <th style="width:65px;">S. No.</th>
                                        <th>Leave Type</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Days</th>
                                         <th>Reason</th>
                                        <th>Applied On</th>
                                         <th>Status</th>
                                        <th class="text-center"><div style="width:100%;">Action</div></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>   
                    </div>
                </div>
                
                <div class="card-body" id="forViewDetailLeave">
               		<div style="padding:4rem; border:1px solid #f7f7f7;font-size:1.25rem;">
                        <div class="row row-sm">
                        		<div style="font-weight:700;">
                                    To,<br />
                                    The Branch Manager,<br/>
                                    Aarav Singh,<br />
                                    <?php echo config_item('company_name'); ?><br />
    							</div>
                                <div style="padding-left:10px;margin: 20px auto 20px auto;">Dear Sir,</div>
                                
                                
                              <!--<p>I hope this message finds you well. I am writing to inform you that I have been unwell for the past three days, and today I visited the hospital for a blood test. The test results revealed that I am suffering from dengue fever/flu, along with cough and high temperature. The doctor has advised me to take at least three weeks of bed rest for proper recovery.</p>
                              <p>Given my current health condition and the level of weakness, I believe it would not be feasible for me to come to the office or work during this period. Therefore, I kindly request you to accept my sick leave application and grant me leave for three weeks from (date to date). Your understanding and support in this matter will be highly appreciated.</p>-->
                              
                                <p id="uprAppMsg">I hope this message finds you well. I am writing to inform you that I have been unwell for the past three days, and today I visited the hospital for a blood test. The test results revealed that I am suffering from dengue fever/flu, along with cough and high temperature. The doctor has advised me to take at least three weeks of bed rest for proper recovery.</p>
                              <p id="gtLwrAppMsg">Given my current health condition and the level of weakness, I believe it would not be feasible for me to come to the office or work during this period. Therefore, I kindly request you to accept my sick leave application and grant me leave for three weeks from (date to date). Your understanding and support in this matter will be highly appreciated.</p>
                      
                            <div style="margin: 20px auto 10px auto;"> Thank you for considering my request,</div>
                            <div style="margin: 0px auto 5px auto;"> Regards,</div>
                            <div style="margin-bottom:10px;font-size:1.25rem;"><span style="font-weight:600;text-transform:uppercase;"><span class="emName"></span></span></div>
                            <div style="margin-bottom:10px;font-size:1.25rem;"><span style="font-weight:600;"><span id="emAppledDegsin"></span></span></div>
                            <div style="margin-bottom:35px;font-size:1.25rem;"><span style="font-weight:600;"><span id="emAppledDate"></span></span></div>
                            <div class="col=md-12">
                            	
                                
                                <a href="javascript:void(0);" class="btn ripple btn-outline-dark miArvAction" id="BackToList"><i class="ti-arrow-left"></i> Back</a>
                                <span class="pull-right" id="forTeamAction">&nbsp;</span>
                            </div>       
                        </div>
                   </div> 
                </div>
                
                
            </div>
        </div>
    </div>
 
 <!-------------------- @mit Code Changes Here End ---------------------->
 <!--<script src="<?php //echo base_url('assets/js/employee/pay_slips.js');?>"></script>-->
 <script>
 $(function() 
 {
	$(document).on("click", '.miAction', function() 
	{
		let actNbtn = $(this).attr('data-id');
		let getData=actNbtn.split('===');
		let target=$('#base_url').val()+getData[1];
		if(getData[0]=='watchLeaveDetails')
		{
			$('.lvListView').hide();$('#forViewDetailLeave').show();
			$.post(target,{oprType:getData[2],action:getData[3]},function(htmlAmi) 
			{
				//$('#showResultHere').html(htmlAmi);
				$('.emName').html(htmlAmi.name);$('#emAppledDegsin').html(htmlAmi.designation_name);$('#emAppledDate').html(htmlAmi.created_date);
				$('#appStatusWillShow').html(htmlAmi.apStatus);$('#gtLwrAppMsg').html(htmlAmi.lwrAppMsg);$('#uprAppMsg').html(htmlAmi.uprAppMsg);
				$('#appStsShow').val(htmlAmi.id);$('#memMsgReson').html(htmlAmi.reason);
				if(htmlAmi.isActn=='team'){$('#forTeamAction').html(htmlAmi.actionBtn);}
				}, 'json');
			}
		  else if(getData[0]=='leaveAppr')
		 {
			let curID=$(this).attr('id');
			$.post(target,{oprType:curID,id:getData[2]},function(htmlAmi) 
			{
				if(curID=='acceptApp'){$('#rejectApp').prop("disabled",true);}else{$('#acceptApp').prop("disabled",true);}
				$('#'+curID).html('<i class="fe fe-settings bx-spin"></i> Please Wait');
				if(curID=='rejectApp'){$('#rejectApp').html('<i class="fe fe-x"></i> Reject');}else{$('#acceptApp').html('<i class="fe fe-check"></i> Accept');}	
						$('#appStatusWillShow').html(htmlAmi.result);toastMultiShow(htmlAmi.addClas,htmlAmi.msg, htmlAmi.icon);
						 if(htmlAmi.addClas=='tst_success'){setTimeout(function(){window.location.reload(1);},2000);}
				}, 'json');	
			}
		
 	});
	$(".miArvAction").click(function(){let actNbtn=$(this).attr('id');if(actNbtn=='BackToList'){$('#forViewDetailLeave').hide();$('.lvListView').show();}});
});
 
 
 </script>
 
 
 
 
 
 
 
 
 
 