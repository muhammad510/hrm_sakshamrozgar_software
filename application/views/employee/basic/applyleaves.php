<style>
.eIcn {color: #00A412;}#aplyForLeave{ display:none;}#toDt { display:none;}
</style>


 <!-------------------- @mit Code Changes Here Start -------------------->                     
    <div class="row row-sm" style="margin:15px -10px 15px -10px;">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header  border-0"> <h4 class="card-title">Apply Leave</h4> 
                
                 <span id="aplyForLeave"><?php echo $aplyForLeave;?></span>
                
                </div> 
                <div class="card-body">   
                   <form id="apply_leave" method="post" accept-charset="utf-8" enctype="multipart/form-data">  
                  	<div class="row row-sm">
                    
                    
                    <?php
					
					
					
					
					 ?> <!--<div class="col-lg-4"><div style=""><img src="<?php echo base_url('assets/img/leaveApply.png');?>" ></div></div>-->
                        <div class="col-lg-12">
                         <div class="row row-sm">
                            <div class="col-md-6">
                              <label>Leave Mode:<span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ti-briefcase eIcn"></i></span>
                                    </div>
                                    <div class="miSlwdth" style="width:92.2%"> 
                                          <select class="form-control custom-select select2 arvOnChange" name="leavePattern" id="leavePattern">
                                            <option value=""> --- Select One --- </option>
                                            <option value="1">Single Leave</option>
                                            <option value="2">Multi Leaves</option>
                                          </select>
                                       </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                              <label>Leave Type:<span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ti-panel eIcn"></i></span>
                                    </div>
                                    <div class="miSlwdth" style="width:92.2%"> 
                                          <select class="form-control custom-select select2 " name="leaveType" id="leaveType">
                                            <option value=""> --- Select One --- </option>
                                            <?php 
                                                 if($leaveManage)
                                                 {
                                                  foreach($leaveManage as $lvList)
                                                    {?><option value="<?php echo $lvList['id'];?>"><?php echo $lvList['leave_name'];?></option>
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
                                <input type="text" class="form-control fc-datepicker arvActn" id="frmDate" name="frmDate" placeholder="<?php echo date('d/m/Y');?>">
                                
                                </div>
                            </div>
                            <div class="col-12" id="toDt">
                              <label>To Date: <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ti-calendar eIcn"></i></span>
                                    </div>
                                    <input type="text" class="form-control fc-datepicker"  id="toDate" name="toDate" placeholder="<?php echo date('d/m/Y');?>">
                                </div>
                            </div> 
                            <div class="col-12">
                                <label>Reason:<span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ti-files eIcn"></i></span>
                                    </div>
                                   <textarea type="text" name="reasonFrLeave" id="reasonFrLeave" class="form-control" placeholder="Reason For Leave..."></textarea>
                                </div>
                             </div>
                            
                            
                            
                            
                       	 </div>
                        </div>
                        <div class="col-md-12">
                             <a href="<?php echo base_url('employee/leave/summary');?>" class="btn ripple btn-outline-dark"><i class="ti-arrow-left"></i> Back</a>
                             <button class="btn ripple btn-outline-success pull-right" id="aplFrLeave" type="submit"><i class="ti-save"></i> Apply</button>
                        </div>
                    </div>
                   </form>  
            </div>
        </div>
    </div>
    </div>
    
<script>
$(document).ready(function()
{
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

$('#apply_leave').submit(function(e) {
    let target=$('#aplyForLeave').html();
    e.preventDefault();
    $.ajax({url: target,type: "POST",data: $(this).serialize(),dataType: 'json',
			beforeSend: function() { $('#aplFrLeave').html('<i class="fe fe-settings bx-spin"></i> Please Wait'); },
			complete: function() { $('#aplFrLeave').html('<i class="ti-save"></i> Submit'); },
			success: function(htmlAmi) {toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
			if(htmlAmi.addClas=='tst_success'){setTimeout(function(){window.location.reload(1);},2000);}	
        }
    });
});
		
		
</script>
 <!-------------------- @mit Code Changes Here End ---------------------->
