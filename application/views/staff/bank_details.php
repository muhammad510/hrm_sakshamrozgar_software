
<div id="viewBnkDetails">
  <div class="row">
    <div class="col-md-12">
      <div class="row prodeRow">
        <div class="col-md-4 icnClr"><i class="si si-user"></i> Account Holder's Name.</div>
        <div class="col-md-8 detDrk "><?php echo $employee->holder_name;?> </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row prodeRow">
        <div class="col-md-4 icnClr"><i class="pe-7s-culture"></i> Bank Name.</div>
        <div class="col-md-8 detDrk "><?php echo $employee->bank_name;?> </div>
      </div>
    </div>
     <div class="col-md-12">
      <div class="row prodeRow">
        <div class="col-md-4 icnClr"><i class="si si-screen-desktop"></i> Account Type.</div>
        <div class="col-md-8 detDrk "><?php echo ($employee->acc_typ=='1')?'Saving':'Current';?> </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row prodeRow">
        <div class="col-md-4 icnClr"><i class="si si-screen-desktop"></i> Account Number.</div>
        <div class="col-md-8 detDrk "><?php echo $employee->bank_account_no;?> </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row prodeRow">
        <div class="col-md-4 icnClr"><i class="si si-screen-desktop"></i> Branch Name.</div>
        <div class="col-md-8 detDrk"> <?php echo $employee->bank_branch;?> </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row prodeRow prLst">
        <div class="col-md-4 icnClr"><i class="si si-screen-desktop"></i> IFSC CODE.</div>
        <div class="col-md-8 detDrk"> <?php echo $employee->ifsc_code;?> </div>
      </div>
    </div>
    <div class="col-md-12">
      <button class="btn ripple btn-outline-secondary pull-right amiStl" id="bnkDetBtn"><i class="ti-save"></i> Edit </button>
    </div>
  </div>
</div>
<div id="edtBnkDetails" style="display:none;">
  <form id="edBnkDetails" method="post" data-id="<?php echo base_url('staff/profile/update/'.urlencode(base64_encode($employee->id)));?>">
    <input type="hidden" value="<?php echo $employee->id;?>" id="empID" name="empID" />
    <div class="row row-sm">
      <div class="col-6">
        <label>Account Holder's Name:<span class="text-danger">*</span></label>
        <div class="input-group mb-3">
          <div class="input-group-prepend"> <span class="input-group-text"><i class="ti-user eIcn"></i></span> </div>
          <input type="text" class="form-control" name="acHldrname" id="acHldrname" value="<?php echo $employee->holder_name;?>" placeholder="Enter Name Here..">
        </div>
      </div>
      <div class="col-6">
        <label>Bank Name:</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend"> <span class="input-group-text"><i class="pe-7s-culture eIcn"></i></span> </div>
          <input type="text" class="form-control" name="bnk_name" id="bnk_name" value="<?php echo $employee->bank_name;?>"  placeholder="Enter Father Name Here..">
        </div>
      </div>
      <div class="col-6">
        <label>Account Type:<span class="text-danger">*</span></label>
        <div class="input-group mb-3">
          <div class="input-group-prepend"> <span class="input-group-text miSlctSpn"><i class="ti-medall eIcn"></i></span> </div>
          <div class="miSlwdth">
            <select class="form-control custom-select select2 " name="acType" id="acType">
              <option value=""> --- Select One --- </option>
              <option value="1" <?php if($employee->acc_typ=='1'){echo 'selected="selected"';}?> >Saving</option>
              <option value="2" <?php if($employee->acc_typ=='2'){echo 'selected="selected"';}?>>Current</option>
            </select>
          </div>
        </div>
      </div>
      <div class="col-6">
        <label>Account Number.:<span class="text-danger">*</span></label>
        <div class="input-group mb-3">
          <div class="input-group-prepend"> <span class="input-group-text"><i class="si si-screen-desktop eIcn"></i></span> </div>
          <input type="text" class="form-control" name="bnkAcNumber" id="bnkAcNumber" placeholder="Enter your bank account number...."  value="<?php echo $employee->bank_account_no;?>" >
        </div>
      </div>
      <div class="col-6">
        <label>Branch Name:<span class="text-danger">*</span></label>
        <div class="input-group mb-3">
          <div class="input-group-prepend"> <span class="input-group-text"><i class="si si-screen-desktop eIcn"></i></span> </div>
          <input type="text" name="brnchName" id="brnchName" class="form-control" placeholder="Enter your branch name.." value="<?php echo $employee->bank_branch;?>" >
        </div>
      </div>
      <div class="col-6">
        <label>IFSC Code:</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend"> <span class="input-group-text"><i class="si si-screen-desktop eIcn"></i></span> </div>
          <input type="text" name="ifsc_code" id="ifsc_code" class="form-control" value="<?php echo $employee->ifsc_code;?>" placeholder="Enter your ifsc code..">
        </div>
      </div>
      <div class="col-md-12">
        <button class="btn ripple btn-outline-secondary pull-right amiStl" id="saveBnkDet"><i class="ti-save"></i> Save</button>
        <button class="btn ripple btn-outline-dark pull-right amiStl" id="proBnkBck" type="button"><i class="ti-arrow-left"></i> Back</button>
      </div>
    </div>
  </form>
</div>
