  <!-- Leave Apply start -->
    <div class="modal" id="applyleaves">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Apply Leaves</h6>
                    <span id="aplyForLeave"><?php echo $aplyForLeave;?></span>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                        <i class="ion-fork-repo"></i>				
                    </button>
                </div>
            <form id="apply_leave" method="post" accept-charset="utf-8" enctype="multipart/form-data">  
                <div class="modal-body">
                    <div class="row row-sm">
                       <div class="col-md-12"><div id="resultSu" class="alert alert-success errCls" role="alert"></div></div>
                        <div class="col-md-6">
                          <label>Leave Mode:<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ti-user eIcn"></i></span>
                                </div>
                                <div class="miSlwdth" style="width:82%"> 
                                      <select class="form-control custom-select select2 arvOnChange" name="leavePattern" id="leavePattern">
                                        <option value=""> --- Select One --- </option>
                                        <option value="1">Single Leave</option>
                                        <option value="2">Multi Leaves</option>
                                      </select>
                                   </div>
                            </div>
                            
                          <div class="miTooltip errCls" id="lvMode"></div>  
                            
                        </div>
                        <div class="col-md-6">
                          <label>Leave Type:<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ti-user eIcn"></i></span>
                                </div>
                                <div class="miSlwdth" style="width:82%"> 
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
                            <div class="miTooltip errCls" id="lvType"></div> 
                        </div>
                        <div class="col-12">
                          <label><span id="lvDateType">Leave Date</span>: <span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ti-calendar eIcn"></i></span>
                                </div>
                            <input type="text" class="form-control fc-datepicker arvActn" id="frmDate" name="frmDate" placeholder="<?php echo date('d/m/Y');?>">
                            
                            </div>
                            <div class="miTooltip errCls" id="lvDate"></div> 
                        </div>
                        <div class="col-12" id="toDt">
                          <label>To Date: <span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ti-calendar eIcn"></i></span>
                                </div>
                                <input type="text" class="form-control fc-datepicker"  id="toDate" name="toDate" placeholder="<?php echo date('d/m/Y');?>">
                            </div>
                           <div class="miTooltip errCls" id="lvToDate"></div> 	
                        </div> 
                        <div class="col-12">
                            <label>Reason:<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ti-map eIcn"></i></span>
                                </div>
                               <textarea type="text" name="reasonFrLeave" id="reasonFrLeave" class="form-control" placeholder="Reason For Leave..."></textarea>
                            </div>
                            <div class="miTooltip errCls" id="lvReason"></div> 
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-outline-secondary" data-bs-dismiss="modal" type="button"><i class="si si-close"></i> Close</button>
                    <button class="btn ripple btn-outline-primary" id="aplFrLeave" type="submit"><i class="ti-save"></i> Apply</button>
                </div>
            </form>
            </div>
        </div>
    </div>
<!-- Leave Apply start -->