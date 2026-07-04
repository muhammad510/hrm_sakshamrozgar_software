<div id="viewCmpnyDetails">
  <div class="row">
    <?php //print_r($employee);?>
    <div class="col-md-12">
      <div class="row prodeRow">
        <div class="col-md-4 icnClr"><i class="ti-id-badge"></i> Employee ID.</div>
        <div class="col-md-8 detDrk "><?php echo $employee->employee_id;?> </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row prodeRow">
        <div class="col-md-4 icnClr"><i class="si si-organization"></i> Branch Name.</div>
        <div class="col-md-8 detDrk" id="branch_name"><?php echo $employee->branch_name ? $employee->branch_name :'Super Admin';?> </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row prodeRow">
        <div class="col-md-4 icnClr"><i class="ti-panel"></i> Department.</div>
        <div class="col-md-8 detDrk" id="department_name"><?php echo $employee->department_name;?> </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row prodeRow">
        <div class="col-md-4 icnClr"><i class="ti-stamp"></i> Desgination .</div>
        <div class="col-md-8 detDrk" id="designation_name"><?php echo $employee->designation_name;?></div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row prodeRow">
        <div class="col-md-4 icnClr"><i class="si si-event"></i> Date Of Joining.</div>
        <div class="col-md-8 detDrk" id="joinDate"> <?php echo date('d-m-Y',strtotime($employee->date_of_joining));?> </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row prodeRow">
        <div class="col-md-4 icnClr"><i class="si si-plane"></i> Credit Leave.</div>
        <div class="col-md-8 detDrk" id="creditLv"> <?php echo $approved_leave;?> </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row prodeRow">
        <div class="col-md-4 icnClr"><i class="si si-equalizer"></i> Salary Type .</div>
        <div class="col-md-8 detDrk" id="slTyp">
          <?php if($employee->salary_type=='1'){echo 'Daily';}else if($employee->salary_type=='2'){echo 'Weekly';}else{echo 'Monthly';};?>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row prodeRow">
        <div class="col-md-4 icnClr"><i class="si si-wallet"></i> Salary Amount .</div>
        <div class="col-md-8 detDrk" id="slAmount"> <?php echo $employee->salary_amount;?> </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row prodeRow">
        <div class="col-md-4 icnClr"><i class="si si-calendar"></i> Resignation Date.</div>
        <div class="col-md-8 detDrk" id="regisnDate"> <?php echo($employee->resignation_date) ? $employee->resignation_date:" Currently Working";?> </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row prodeRow">
        <div class="col-md-4 icnClr"><i class="ti-calendar"></i> Termination Date.</div>
        <div class="col-md-8 detDrk" id="terminDate"> <?php echo($employee->termination_date) ? $employee->termination_date:" Currently Working";?></div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row prodeRow">
        <div class="col-md-4 icnClr"><i class="ti-calendar"></i> Notification Date.</div>
        <div class="col-md-8 detDrk" id="noticeDt"> <?php echo($employee->notify_period) ? $employee->notify_period:" Currently Working";?></div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row prodeRow prLst prLst">
        <div class="col-md-4 icnClr"><i class="ti-write"></i> Notification Remarks.</div>
        <div class="col-md-8 detDrk" id="notiFyRmrks"> <?php echo($employee->notify_remarks) ? $employee->notify_remarks:" Currently Working";?></div>
      </div>
    </div>
    <div class="col-md-12">
      <button class="btn ripple btn-outline-secondary pull-right amiStl" id="compnyDetBtn"><i class="ti-save"></i> Edit </button>
    </div>
  </div>
</div>
<div id="edtCmpnyDetails" style="display:none;">
  <?php //print_r($employee);?>
  <form id="edCmpnyDetails" method="post" data-id="<?php echo $companySummary;?>">
    <div class="row row-sm">
      <div class="col-6">
        <label>Branch Name : <span class="text-danger">*</span></label>
        <div class="input-group mb-3" style="height:60px;">
          <div class="input-group-prepend"><span class="input-group-text"><i class="si si-organization eIcn"></i></span></div>
          <div class="miSlwdth" >
            <select name="branch" id="branch" class="form-control select2-with-search arvManage" data-id="department">
              <option value=""> --- Select One --- </option>
              <?php if($employee->user_type=='1'){echo '<option value="9999" selected="selected">Super Admin</option>';}
					if($getBrList){foreach($getBrList as $brList){?>
					<option value="<?php echo $brList->id;?>" <?php if($brList->id==$employee->branch_id){echo 'selected="selected"';}?>> <?php echo $brList->branch_name;?> </option>
					<?php }}else{echo '<option value="none">There is no data available here</option>';}?>
            </select>
          </div>
        </div>
      </div>
      <div class="col-6">
        <label>Department Name : <span class="text-danger">*</span></label>
        <div class="input-group mb-3" style="height:60px;">
          <div class="input-group-prepend"><span class="input-group-text"><i class="ti-panel eIcn"></i></span></div>
          <div class="miSlwdth" >
            <select name="department_nm" id="department" class="form-control select2-with-search arvManage"  data-id="designation">
              <option value=""> --- Select One --- </option>
              <?php 
					 if($employee->user_type=='1'){echo '<option value="9999" selected="selected">Super Admin</option>';}
					 if($department)
					 {
						foreach($department as $deprtList)
						{
						?>
              <option value="<?php echo $deprtList->id;?>" <?php if($deprtList->id==$employee->department){echo 'selected="selected"';}?>> <?php echo $deprtList->department_name;?> </option>
              <?php }}else{echo '<option value="none">There is no data available here</option>';}?>
            </select>
          </div>
        </div>
      </div>
      <div class="col-6">
        <label>Designation : <span class="text-danger">*</span></label>
        <div class="input-group mb-3" style="height:60px;">
          <div class="input-group-prepend"><span class="input-group-text"><i class="ti-stamp eIcn"></i></span></div>
          <div class="miSlwdth">
            <select name="designation" id="designation" class="form-control select2-with-search arvChange" data-id="salary_amount">
              <option value=""> --- Select One --- </option>
              <?php 
                                                                 if($employee->user_type=='1'){echo '<option value="9999" selected="selected">Super Admin</option>';}
                                                                 if($designation)
                                                                 {
                                                                    foreach($designation as $desigList)
                                                                    {
                                                                    ?>
              <option value="<?php echo $desigList->id;?>" <?php if($desigList->id==$employee->designation){echo 'selected="selected"';}?>> <?php echo $desigList->designation_name;?> </option>
              <?php }}else{echo '<option value="none">There is no data available here</option>';}?>
            </select>
          </div>
        </div>
      </div>
      <div class="col-6">
        <label>Employee Role : <span class="text-danger">*</span></label>
        <div class="input-group mb-3" style="height:60px;">
          <div class="input-group-prepend"><span class="input-group-text"><i class="ti-stamp eIcn"></i></span></div>
          <div class="miSlwdth">
            <select name="empRole" id="empRole" class="form-control select2-with-search">
              <option value=""> --- Select One --- </option>
              <option value="2" <?php if($employee->user_type=='2'){echo 'selected="selected"';}?>>Super Admin</option>
              <option value="3" <?php if($employee->user_type=='3'){echo 'selected="selected"';}?>>Admin</option>
              <option value="5" <?php if($employee->user_type=='5'){echo 'selected="selected"';}?>>Branch Admin</option>
              <option value="4" <?php if($employee->user_type=='4'){echo 'selected="selected"';}?>>Employee</option>
            </select>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <label>Credit Leave :</label>
        <div class="input-group mb-3" style="height:63px;">
          <div class="input-group-prepend"><span class="input-group-text"><i class="ti-stamp eIcn"></i></span></div>
          <div style="margin:-39px 0px 0px 35px !important; width:100%;" >
            <input type="hidden" id="lvDet" name="lvDet" value="<?php echo $employee->approved_leave;?>" />
            <select name="current_leave[]" id="current_leave" class="form-control select2-with-search"  multiple="multiple">
              <option value=""> --- Choose One --- </option>
              <?php 
                                                                 if($leaveMaster)
                                                                 {
                                                                    $setSelectedLeave=explode(',',$employee->approved_leave);
                                                                    $lvCnt=0;
                                                                    foreach($leaveMaster as $lvList)
                                                                    {
                                                                        $lvID=explode("==",$setSelectedLeave[$lvCnt]);
                                                                    ?>
              <option value="<?php echo $lvList->id;?>" <?php if($lvList->id==$lvID[0]){echo 'selected="selected"';}?>> <?php echo $lvList->leave_name;?> </option>
              <?php ++$lvCnt; }}else{echo '<option value="none">There is no data available here</option>';}?>
            </select>
          </div>
        </div>
      </div>
      <div class="col-6">
        <label>Shift Manage : </label>
        <div class="input-group mb-3" style="height:60px;">
          <div class="input-group-prepend"><span class="input-group-text"><i class="ti-exchange-vertical eIcn"></i></span></div>
          <div class="miSlwdth">
            <select name="empShift" id="empShift" class="form-control select2-with-search">
              <option value=""> --- Select One --- </option>
              <?php 
                                                                                // if($employee->user_type=='1'){echo '<option value="9999" selected="selected">Super Admin</option>';}
                                                                                 if($shiftMaster)
                                                                                 {
                                                                                    foreach($shiftMaster as $shiftList)
                                                                                    {
                                                                                    ?>
              <option value="<?php echo $shiftList->id;?>" <?php if($shiftList->id==$employee->shift){echo 'selected="selected"';}?>> <?php echo $shiftList->shift_name;?> </option>
              <?php }}else{echo '<option value="none">There is no data available here</option>';}?>
            </select>
          </div>
        </div>
      </div>
      <div class="col-6">
        <label>Salary Type: <!--<span class="text-danger">*</span>--></label>
        <div class="input-group mb-3" style="height:60px;">
          <div class="input-group-prepend"><span class="input-group-text"><i class="si si-equalizer eIcn"></i></span></div>
          <div class="miSlwdth">
            <select name="salary_type" id="salary_type" class="form-control select2-with-search arvChange" data-id="salary_amount">
              <option value=""> --- Select One --- </option>
              <option value="1" <?php if($employee->salary_type=='1'){echo 'selected="selected"';}?>>Daily</option>
              <option value="2" <?php if($employee->salary_type=='2'){echo 'selected="selected"';}?>>Weekly</option>
              <option value="3" <?php if($employee->salary_type=='3'){echo 'selected="selected"';}?>>Monthly</option>
            </select>
          </div>
        </div>
      </div>
      <div class="col-6">
        <label>Salary Amount : <!--<span class="text-danger">*</span>--></label>
        <div class="input-group mb-3">
          <div class="input-group-prepend"><span class="input-group-text"><i class="si si-wallet eIcn"></i></span></div>
          <input type="text" class="form-control" id="salary_amount" name="salary_amount" readonly="readonly" value="<?php echo ($employee->salary_amount?$employee->salary_amount:'0.00');?>" placeholder="Salary Amount">
          <input type="hidden" name="salID" id="salID" value="<?php echo $salID;?>">
        </div>
      </div>
      <input type="hidden" value="<?php echo config_item('notifyDay');?>">
      <div class="col-6">
        <label>Notice Period Date : </label>
        <div class="input-group mb-3">
          <div class="input-group-prepend"><span class="input-group-text"><i class="ti-calendar eIcn"></i></span></div>
          <input type="text" class="form-control fc-datepicker" id="noticeDate" name="noticeDate" value="<?php echo $employee->notify_period?date('d/m/Y',strtotime($employee->notify_period)):'';?>" placeholder="MM/DD/YYYY">
        </div>
      </div>
      <div class="col-4">
        <label>Date of joining : <span class="text-danger">*</span></label>
        <div class="input-group mb-3">
          <div class="input-group-prepend"><span class="input-group-text"><i class="si si-event eIcn"></i></span></div>
          <input type="text" class="form-control fc-datepicker" id="dateOfJoin" name="dateOfJoin" value="<?php echo date('d/m/Y',strtotime($employee->date_of_joining));?>" placeholder="MM/DD/YYYY">
        </div>
      </div>
      <div class="col-4">
        <label>Resignation Date : </label>
        <div class="input-group mb-3">
          <div class="input-group-prepend"><span class="input-group-text"><i class="si si-calendar eIcn"></i></span></div>
          <input type="text" class="form-control fc-datepicker" id="resignDate" name="resignDate" value="<?php echo $employee->resignation_date?date('d/m/Y',strtotime($employee->resignation_date)):'';?>" placeholder="MM/DD/YYYY">
        </div>
      </div>
      <div class="col-4">
        <label>Termination Date : </label>
        <div class="input-group mb-3">
          <div class="input-group-prepend"><span class="input-group-text"><i class="ti-calendar eIcn"></i></span></div>
          <input type="text" class="form-control fc-datepicker" id="terminationDate" name="terminationDate" value="<?php echo $employee->termination_date?date('d/m/Y',strtotime($employee->termination_date)):'';?>" placeholder="MM/DD/YYYY">
        </div>
      </div>
      <div class="col-12">
        <label>Notice Remarks : </label>
        <div class="input-group mb-3">
          <div class="input-group-prepend"><span class="input-group-text"><i class="ti-write eIcn"></i></span></div>
          <textarea type="text" name="noticeRemarks" rows="4" id="noticeRemarks" class="form-control" placeholder="Notify me if you want to leave job..."></textarea>
        </div>
      </div>
      <div class="col-md-12">
        <button class="btn ripple btn-outline-secondary pull-right amiStl" id="saveCompnyDet"><i class="ti-save"></i> Save</button>
        <button class="btn ripple btn-outline-dark pull-right amiStl" id="proCompBck" type="button"><i class="ti-arrow-left"></i> Back</button>
      </div>
    </div>
  </form>
</div>
