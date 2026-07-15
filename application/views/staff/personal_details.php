<div id="viewProDet">
  <div class="row">
    <?php if ($employee->gender == '1') {
      $genIcn = 'si si-user';
    } else if ($employee->gender == '2') {
      $genIcn = 'si si-user-female';
    } else {
      $genIcn = 'si si-emotsmile';
    } ?>
    <div class="col-md-12">
      <div class="row prodeRow">
        <div class="col-md-4 icnClr"><i class="si si-support "></i> User Id.</div>
        <div class="col-md-8 detDrk "><?php echo 'EMP' . $employee->employee_id; ?> </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="row prodeRow">
        <div class="col-md-4 icnClr"><i class="si si-support "></i>Uan.</div>
        <div class="col-md-8 detDrk "><?php echo $employee->uan; ?> </div>
      </div>
    </div>


    <div class="col-md-12">
      <div class="row prodeRow">
        <div class="col-md-4 icnClr"><i class="<?php echo $genIcn; ?>"></i> Name.</div>
        <div class="col-md-8 detDrk "><?php echo $employee->name; ?> </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="row prodeRow">
        <div class="col-md-4 icnClr"><i class="<?php echo $genIcn; ?>"></i> Blood Group.</div>
        <div class="col-md-8 detDrk "><?php echo ($employee->blood_group) ? $employee->blood_group : 'NA'; ?> </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="row prodeRow">
        <div class="col-md-4 icnClr"><i class="si si-info"></i> Gender.</div>
        <div class="col-md-8 detDrk">
          <?php if ($employee->gender == '1') {
            echo 'Male';
          } elseif ($employee->gender == '2') {
            echo 'Female';
          } else {
            echo 'Others';
          } ?>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row prodeRow">
        <div class="col-md-4 icnClr"><i class="si si-user"></i> Father's Name.</div>
        <div class="col-md-8 detDrk"> <?php echo $employee->father_name; ?> </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row prodeRow">
        <div class="col-md-4 icnClr"><i class="si si-screen-smartphone"></i> Contact Number.</div>
        <div class="col-md-8 detDrk"> <?php echo $employee->contact_no; ?> </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row prodeRow">
        <div class="col-md-4 icnClr"><i class="si si-envelope"></i> Email Id.</div>
        <div class="col-md-8 detDrk"> <?php echo $employee->email; ?> </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row prodeRow">
        <div class="col-md-4 icnClr"><i class="si si-event"></i> Date of birth.</div>
        <div class="col-md-8 detDrk"> <?php echo date('d-m-Y', strtotime($employee->dob)); ?> </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row prodeRow">
        <div class="col-md-4 icnClr"><i class="si si-badge"></i> Marital Status.</div>
        <div class="col-md-8 detDrk">
          <?php if ($employee->marital_status == '1') {
            echo 'Married';
          } else {
            echo 'Un-Married';
          } ?>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row prodeRow">
        <div class="col-md-4 icnClr"><i class="si si-flag"></i> Nationality.</div>
        <div class="col-md-8 detDrk"> <?php echo $employee->nationality; ?></div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row prodeRow">
        <div class="col-md-4 icnClr"><i class="si si-user"></i> Referred By.</div>
        <div class="col-md-8 detDrk"> <?php echo $employee->reference_person_name; ?></div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row prodeRow prLst">
        <div class="col-md-4 icnClr"><i class="si si-screen-smartphone"></i> Reference Contact Nu.</div>
        <div class="col-md-8 detDrk"> <?php echo $employee->reference_person_number; ?></div>
      </div>
    </div>
    <div class="col-md-12">
      <button class="btn ripple btn-outline-secondary pull-right amiStl" id="employeedata"><i class="ti-save"></i> Edit Personal</button>
    </div>
  </div>
</div>
<div id="editProDetails" style="display:none;">
  <form id="edProDetails" method="post" data-id="<?php echo base_url('staff/profile/update/' . urlencode(base64_encode($employee->id))); ?>">
    <div class="row row-sm">

      <div class="col-6">
        <label>Universal Account Number[UAN]:</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend"> <span class="input-group-text"><i class="ti-use eIcn"></i></span> </div>
          <input type="text" class="form-control" name="uan" id="uan" value="<?php echo $employee->uan; ?>" placeholder="Enter Uan Here..">
        </div>
      </div>

      <div class="col-6">
        <label>Name:<span class="text-danger">*</span></label>
        <div class="input-group mb-3">
          <div class="input-group-prepend"> <span class="input-group-text"><i class="ti-user eIcn"></i></span> </div>
          <input type="text" class="form-control" name="name" id="name" value="<?php echo $employee->name; ?>" placeholder="Enter Name Here..">
        </div>
      </div>

      <div class="col-6">
        <label>Father Name:</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend"> <span class="input-group-text"><i class="ti-user eIcn"></i></span> </div>
          <input type="text" class="form-control" name="father_name" id="father_name" value="<?php echo $employee->father_name; ?>" placeholder="Enter Father Name Here..">
        </div>
      </div>
      <div class="col-6">
        <label>Date of Birth:<span class="text-danger">*</span></label>
        <div class="input-group mb-3">
          <div class="input-group-prepend"> <span class="input-group-text"><i class="si si-calendar eIcn"></i></span> </div>
          <input type="text" class="form-control fc-datepicker" name="dob" id="dob" value="<?php echo date('d/m/Y', strtotime($employee->dob)); ?>">
        </div>
      </div>

      <div class="col-6">
        <label>Blood Group:<span class="text-danger">*</span></label>
        <div class="input-group mb-3">
          <div class="input-group-prepend"> <span class="input-group-text miSlctSpn"><i class="ti-medall eIcn"></i></span> </div>
          <div class="miSlwdth">
            <select class="form-control select2-with-search" name="blood_group" id="blood_group">
              <option value=""> --- Select Blood Group --- </option>
              <?php foreach ($blood_group as $b): ?>
                <option value="<?php echo $b->id; ?>" <?php echo ($employee->blood_group_id==$b->id)?'selected':'';?>><?php echo $b->name; ?></option>
              <?php endforeach; ?>

            </select>
          </div>
        </div>
      </div>


      <div class="col-6">
        <label>Gender:<span class="text-danger">*</span></label>
        <div class="input-group mb-3">
          <div class="input-group-prepend"> <span class="input-group-text miSlctSpn"><i class="ti-medall eIcn"></i></span> </div>
          <div class="miSlwdth">
            <select class="form-control select2-with-search" name="gender" id="gender">
              <option value=""> --- Select Gnder --- </option>
              <option value="1" <?php if ($employee->gender == '1') {
                                  echo 'selected="selected"';
                                } ?>>Male</option>
              <option value="2" <?php if ($employee->gender == '2') {
                                  echo 'selected="selected"';
                                } ?>>Female</option>
            </select>
          </div>
        </div>
      </div>
      <div class="col-6">
        <label>Mobile No.:<span class="text-danger">*</span></label>
        <div class="input-group mb-3">
          <div class="input-group-prepend"> <span class="input-group-text"><i class="ti-mobile eIcn"></i></span> </div>
          <input type="text" class="form-control" name="contact_no" id="contact_no" placeholder="Enter Your Mobile No...." value="<?php echo $employee->contact_no; ?>">
        </div>
      </div>
      <div class="col-6">
        <label>Email Id:<span class="text-danger">*</span></label>
        <div class="input-group mb-3">
          <div class="input-group-prepend"> <span class="input-group-text"><i class="ti-email eIcn"></i></span> </div>
          <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email Here.." value="<?php echo $employee->email; ?>">
        </div>
      </div>
      <div class="col-12">
        <label>Address:<span class="text-danger">*</span></label>
        <div class="input-group mb-3">
          <div class="input-group-prepend"> <span class="input-group-text"><i class="ti-map eIcn"></i></span> </div>
          <textarea type="text" name="address" id="address" class="form-control" placeholder="Please Enter Your Address..."><?php echo $employee->address; ?></textarea>
        </div>
      </div>
      <div class="col-6">
        <label>State:</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend"> <span class="input-group-text miSlctSpn"><i class="si si-support eIcn"></i></span> </div>
          <div class="miSlwdth">
            <select name="state" id="state" class="form-control select2-with-search arvChange">
              <option label="Select State"></option>
              <?php if ($getState) {
                foreach ($getState as $stD) { ?>
                  <option value="<?php echo $stD->id; ?>" <?php if ($employee->state == $stD->id) {
                                                            echo 'selected="selected"';
                                                          } ?>> <?php echo $stD->state_cities; ?> </option>
              <?php }
              } ?>
            </select>
          </div>
        </div>
      </div>
      <div class="col-6">
        <label>District:</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend"> <span class="input-group-text miSlctSpn"><i class="si si-support eIcn"></i></span> </div>
          <div class="miSlwdth">
            <select name="district" id="district" class="form-control select2-with-search arvChange">
              <option label="Select District"></option>
              <?php if ($getCity) {
                foreach ($getCity as $distrct) { ?>
                  <option value="<?php echo $distrct->id; ?>" <?php if ($employee->district == $distrct->id) {
                                                                echo 'selected="selected"';
                                                              } ?>> <?php echo $distrct->state_cities; ?> </option>
              <?php }
              } ?>
            </select>
          </div>
        </div>
      </div>
      <div class="col-6">
        <label>Zipcode:</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend"> <span class="input-group-text"><i class="si si-globe-alt eIcn"></i></span> </div>
          <input type="text" name="zipCode" id="zipCode" class="form-control" value="<?php echo $employee->zipcode; ?>" placeholder="Enter Your Zipcode..">
        </div>
      </div>
      <div class="col-6">
        <label>Marital Status:</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend"> <span class="input-group-text miSlctSpn"><i class="si si-bell eIcn"></i></span> </div>
          <div class="miSlwdth">
            <select name="marital_status" id="marital_status" class="form-control select2-with-search">
              <option value=""> --- Select One --- </option>
              <option value="1" <?php if ($employee->marital_status == '1') {
                                  echo 'selected="selected"';
                                } ?>>Married</option>
              <option value="2" <?php if ($employee->marital_status == '2') {
                                  echo 'selected="selected"';
                                } ?>>Un Married</option>
            </select>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <button class="btn ripple btn-outline-secondary pull-right amiStl" id="savePersnlDet"> <i class="ti-save"></i> Save </button>
        <button class="btn ripple btn-outline-dark pull-right amiStl" id="proDetBck" type="button"><i class="ti-arrow-left"></i> Back</button>
      </div>
    </div>
  </form>
</div>