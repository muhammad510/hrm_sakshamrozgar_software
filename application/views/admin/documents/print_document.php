<style>
  .miSlwdth4w {
    width: 87.32%;
  }

  .no-padding {
    padding-bottom: 0px !important;
  }

  .marginBtm {
    margin-bottom: 50px;
  }

  .mClose {
    margin: -10px -10px 0px 0px !important;
  }

  .slipImg img {
    width: 100%;
    padding-top: 20px;
  }

  /*.letterHead{font-weight: 700;text-align: center;text-transform: uppercase;font-size: 1.25rem;border-top: 1px solid #e3e3e3;padding-top: 10px;}*/
  /*.letterHead p{ float:right;font-weight: lighter;font-size: .75rem;padding-top: 10px;}*/
  .header {
    text-align: center;
    margin-bottom: 20px;
  }

  .letter-content {
    margin-top: 20px;
    font-size: 15px;
    text-align: justify;
  }

  .signature {
    margin-top: 30px;
    font-weight: bold;
  }

  .signature p {
    margin: 5px 0px -5px 0px !important;
  }

  .wrningLtr {
    margin-top: 80px;
  }

  .parent {
    display: flex;
    font-weight: 700;
    text-align: center;
    text-transform: uppercase;
    font-size: 1.25rem;
    border-top: 1px solid #e3e3e3;
    padding-top: 10px;
  }

  .child {
    padding: 10px;
    text-align: center;
  }

  .child-1 {
    width: 25%;
    text-align: left;
    font-weight: lighter;
    font-size: .75rem;
    padding-top: 17px;
  }

  .child-2 {
    width: 50%;
  }

  .child-3 {
    width: 25%;
    text-align: right;
    font-weight: lighter;
    font-size: .75rem;
    padding-top: 17px;
  }

  .offrHdrImg {
    margin-top: -35px;
  }

  .offrHdrImg img {
    width: 100%;
    padding-top: 0px;
  }

  .offrFtrImg {
    margin-bottom: 30px;
  }

  .offrFtrImg img {
    width: 100%;
    padding-top: 0px;
    border-top: 1px solid #e1e1e1;
    margin-top: 155px;
  }

  #downloadForOffrFrm {
    display: none
  }

  #getPrfrmList {
    min-height: 350px;
  }

  #find_emp_id {
    border: 1px solid #5248B5 !important
  }

  .appointment-letter {
    padding: 30px 20px;
    font-size: 12px;

    td {
      padding: 5px 10px;
      border: 1px solid #d9d9d9;
      font-size: 11px;
    }

    table {
      width: 100%;
      font-size: 12px;
    }
  }

  .myFontBg {
    font-weight: 700;
  }

  .page-break {
    page-break-before: always;
  }

  .baComponent {
    background-color: #F2F2F2;
    font-weight: 700;
  }

  .mrvPd {
    padding-left: 10px;
  }
</style>
<div class="inner-body">
  <div class="page-header">
    <div>
      <h2 class="main-content-title tx-24 mg-b-5">Documents Print</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('staff/dashboard'); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $breadcrums; ?></li>
      </ol>
    </div>
    <div class="d-flex">
      <div class="justify-content-center">
        <a href="<?php echo $bckUrl; ?>" class="btn btn-white btn-icon-text my-2 me-2"> <i class="ti-arrow-left me-2"></i> Back</a>
        <a href="javascript:void(0)" class="btn btn-primary btn-icon-text my-2 me-2"> <i class="ti-search me-2"></i> Search</a>
      </div>
    </div>
  </div>
  <div class="marginBtm">

    <div class="row row-sm">

      <div class="col-md">
        <div class="card custom-card">
          <div class="card-header custom-card-header border-bottom-0">
            <h5 class="main-content-label tx-dark tx-medium mb-0">Offer Letter</h5>
          </div>
          <div class="card-body no-padding">
            <div class="row row-sm">
              <label>Branch : <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-building"></i></span> </div>
                <div class="miSlwdth4w">
                  <select id="offrBranch" class="form-control select2-with-search getSelection" data-id="<?php echo $branchFrOffer; ?>">
                    <option value=""> Choose One </option>
                    <?php
                    if ($isBranch) {
                      foreach ($isBranch as $list) { ?>
                        <option value="<?php echo $list->id; ?>"><?php echo $list->branch_name; ?></option>
                    <?php
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row row-sm">
              <label>Employee ID : <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>
                <div class="miSlwdth4w">
                  <select name="joinginEmployee" id="joinginEmployee" class="form-control select2-with-search getSelection" data-id="<?php echo $empFrOfrLetter; ?>">
                    <option value=""> Choose One </option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row row-sm">
              <label>Date of Joining : <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>
                <input type="text" class="form-control fc-datepicker dtClean" name="empDtJoining" id="empDtJoining" placeholder="DD/MM/YYYY">
              </div>
            </div>
            <div class="row row-sm">
              <label>Annual CTC : <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i class="mdi mdi-cash"></i></span> </div>
                <input type="text" class="form-control" name="offrSalary" id="offrSalary" placeholder="Ex. 10000.00" disabled="disabled">
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button class="btn ripple btn-sm btn-outline-success getClickOptn" id="joinNEmployee" type="button" data-id="<?php echo $clickFrNewJoining; ?>"> <i class="ti-save"></i> Create Offer Letter </button>
          </div>
        </div>
      </div>

      <div class="col-md">
        <div class="card custom-card">
          <div class="card-header custom-card-header border-bottom-0">
            <h5 class="main-content-label tx-dark tx-medium mb-0">Experience Letter</h5>
          </div>
          <div class="card-body no-padding">
            <div class="row row-sm">
              <label>Branch : <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-building"></i></span> </div>
                <div class="miSlwdth4w">
                  <select name="gender" id="gender" class="form-control select2-with-search" disabled>
                    <option value=""> Choose One </option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                    <option value="3">Transgender</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row row-sm">
              <label>Employee ID : <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>
                <div class="miSlwdth4w">
                  <select name="gender" id="gender" class="form-control select2-with-search" disabled>
                    <option value=""> Choose One </option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                    <option value="3">Transgender</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row row-sm">
              <label>Period Start Date : <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i class="si si-calendar"></i></span> </div>
                <input type="text" class="form-control fc-datepicker" name="perStartDate" id="perStartDate" disabled placeholder="DD/MM/YYYY">
              </div>
            </div>
            <div class="row row-sm">
              <label>Period End Date : <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i class="si si-calendar"></i></span> </div>
                <input type="text" class="form-control fc-datepicker" name="perEndDate" id="perEndDate" disabled placeholder="DD/MM/YYYY">
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button class="btn ripple btn-sm btn-outline-dark" id="adEmployeeDetails" type="button" disabled> <i class="ti-save"></i> Create Experience Letter </button>
          </div>
        </div>
      </div>


      <div class="col-md">
        <div class="card custom-card">
          <div class="card-header custom-card-header border-bottom-0">
            <h5 class="main-content-label tx-dark tx-medium mb-0">Relieving(Termination) Letter</h5>
          </div>
          <div class="card-body no-padding">
            <div class="row row-sm">
              <label>Branch : <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-building"></i></span> </div>
                <div class="miSlwdth4w">
                  <select name="gender" id="gender" class="form-control select2-with-search" disabled>
                    <option value=""> Choose One </option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                    <option value="3">Transgender</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row row-sm">
              <label>Employee ID : <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>
                <div class="miSlwdth4w">
                  <select name="gender" id="gender" class="form-control select2-with-search" disabled>
                    <option value=""> Choose One </option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                    <option value="3">Transgender</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row row-sm">
              <label>Resignation Date : <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name Here.." disabled oninput="this.value=this.value.replace(/[^a-zA-Z\s]/g,'').replace(/\s+/g,' ')">
              </div>
            </div>
            <div class="row row-sm">
              <label>Last Date of Employement : <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name Here.." disabled oninput="this.value=this.value.replace(/[^a-zA-Z\s]/g,'').replace(/\s+/g,' ')">
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button class="btn ripple btn-sm btn-outline-dark" id="adEmployeeDetails" type="button" disabled> <i class="ti-save"></i> Create Relieving Letter </button>
          </div>
        </div>
      </div>


    </div>

    <div class="row row-sm">
      <div class="col-md-4">
        <div class="card custom-card">
          <div class="card-header custom-card-header border-bottom-0">
            <h5 class="main-content-label tx-dark tx-medium mb-0">Warning Letter</h5>
          </div>
          <div class="card-body no-padding">
            <div class="row row-sm">
              <label>Branch : <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>
                <div class="miSlwdth4w">
                  <select id="branchFrWarn" class="form-control select2-with-search getSelection" data-id="<?php echo $branchFrWarn; ?>">
                    <option value=""> Choose One </option>
                    <?php
                    if ($isBranch) {
                      foreach ($isBranch as $list) { ?>
                        <option value="<?php echo $list->id; ?>"><?php echo $list->branch_name; ?></option>
                    <?php
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row row-sm">
              <label>Employee ID : <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>
                <div class="miSlwdth4w">
                  <select id="warningEmployee" class="form-control select2-with-search">
                    <option value=""> Choose One </option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row row-sm">
              <label>Refrence Number : <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>
                <input type="text" class="form-control" name="reportingManager" id="reportingManager" placeholder="Enter Name Here..">
              </div>
            </div>
            <div class="row row-sm">
              <label>Subject : <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>
                <input type="text" class="form-control" name="warningRegarding" id="warningRegarding" placeholder="Enter Subject Here.." oninput="this.value=this.value.replace(/[^a-zA-Z\s]/g,'').replace(/\s+/g,' ')">
              </div>
            </div>
            <div class="row row-sm">
              <label>Message : <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>
                <input type="text" class="form-control" name="warningMesg" id="warningMesg" placeholder="Enter Message Here.." oninput="this.value=this.value.replace(/[^a-zA-Z\s]/g,'').replace(/\s+/g,' ')">
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button class="btn ripple btn-sm btn-outline-success getClickOptn" id="warningLetter" type="button" data-id="<?php echo $clickFrWarning; ?>"> <i class="ti-save"></i> Create Warning Letter </button>
          </div>
        </div>
      </div>
      <div class="col-md">
        <div class="card custom-card">
          <div class="card-header custom-card-header border-bottom-0">
            <h5 class="main-content-label tx-dark tx-medium mb-0">Promotion Letter</h5>
          </div>
          <div class="card-body no-padding">
            <div class="row row-sm">
              <label>Branch : <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-building"></i></span> </div>
                <div class="miSlwdth4w">
                  <select id="branchFrPromo" class="form-control select2-with-search getSelection" data-id="<?php echo $branchFrPrePromo; ?>">
                    <option value=""> Choose One </option>
                    <?php
                    if ($isBranch) {
                      foreach ($isBranch as $list) { ?>
                        <option value="<?php echo $list->id; ?>"><?php echo $list->branch_name; ?></option>
                    <?php
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row row-sm">
              <label>Employee Name/ID : <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>
                <div class="miSlwdth4w">
                  <select id="preProEmployee" class="form-control select2-with-search getSelection" data-id="<?php echo $empFrPrePromo; ?>">
                    <option value=""> Choose One </option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row row-sm">
              <label>Department : </label>
              <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>
                <input type="text" class="form-control" id="prevEmpDeparment" disabled="disabled" placeholder="Ex. Development">
              </div>
            </div>
            <div class="row row-sm">
              <label>Designation : <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>
                <div class="miSlwdth4w">
                  <select id="promoDesignation" class="form-control select2-with-search getSelection" data-id="<?php echo $empFrPromoCtc; ?>">
                    <option value=""> Choose One </option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row row-sm">
              <label>Annual CTC : </label>
              <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i class="mdi mdi-cash"></i></span> </div>
                <input type="text" class="form-control" name="empPromoCtc" disabled id="empPromoCtc" placeholder="Ex. 100000.00" oninput="this.value=this.value.replace(/[^a-zA-Z\s]/g,'').replace(/\s+/g,' ')">
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button class="btn ripple btn-sm btn-outline-success getClickOptn" id="promotEmployee" type="button" data-id="<?php echo $clickFrPromote; ?>"> <i class="ti-save"></i> Create Promotion Letter </button>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card custom-card">
          <div class="card-header custom-card-header border-bottom-0">
            <h5 class="main-content-label tx-dark tx-medium mb-0">Confirmation Letter</h5>
          </div>
          <div class="card-body no-padding">
            <div class="row row-sm">
              <label>Branch : <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-building"></i></span> </div>
                <div class="miSlwdth4w">
                  <select id="branchFrCnfrm" class="form-control select2-with-search getSelection" data-id="<?php echo $branchFrCnfrm; ?>" disabled>
                    <option value=""> Choose One </option>
                    <?php
                    if ($isBranch) {
                      foreach ($isBranch as $list) { ?>
                        <option value="<?php echo $list->id; ?>"><?php echo $list->branch_name; ?></option>
                    <?php
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row row-sm">
              <label>Employee ID : <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>
                <div class="miSlwdth4w">
                  <select id="cnfrmEmployee" class="form-control select2-with-search" disabled>
                    <option value=""> Choose One </option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row row-sm">
              <label>Name Of Reporting Mananger : <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>
                <input type="text" class="form-control" name="name" disabled id="name" placeholder="Enter Name Here.." oninput="this.value=this.value.replace(/[^a-zA-Z\s]/g,'').replace(/\s+/g,' ')">
              </div>
            </div>
            <div class="row row-sm">
              <label>Annual CTC : <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i class="mdi mdi-cash"></i></span> </div>
                <input type="text" class="form-control" name="name" disabled id="name" placeholder="Enter Name Here.." oninput="this.value=this.value.replace(/[^a-zA-Z\s]/g,'').replace(/\s+/g,' ')">
              </div>
            </div>
            <div class="row row-sm">
              <label>Subject : <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i class="mdi mdi-cash"></i></span> </div>
                <input type="text" class="form-control" name="name" disabled id="name" placeholder="Enter Message Here.." oninput="this.value=this.value.replace(/[^a-zA-Z\s]/g,'').replace(/\s+/g,' ')">
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button class="btn ripple btn-sm btn-outline-dark" id="adEmployeeDetails" disabled="disabled" type="button"> <i class="ti-save"></i> Create Confirmation Letter </button>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card custom-card">
          <div class="card-header custom-card-header border-bottom-0">
            <h5 class="main-content-label tx-dark tx-medium mb-0">Form 16 Letter</h5>
          </div>
          <div class="card-body no-padding">
            <div class="row row-sm">
              <label>Branch : <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-building"></i></span> </div>
                <div class="miSlwdth4w">
                  <select id="branchFrForm16" class="form-control select2-with-search getSelection" data-id="<?php echo $branchFrForm16; ?>" disabled>
                    <option value=""> Choose One </option>
                    <?php
                    if ($isBranch) {
                      foreach ($isBranch as $list) { ?>
                        <option value="<?php echo $list->id; ?>"><?php echo $list->branch_name; ?></option>
                    <?php
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row row-sm">
              <label>Employee ID : <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>
                <div class="miSlwdth4w">
                  <select id="frm16Employee" class="form-control select2-with-search" disabled>
                    <option value=""> Choose One </option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row row-sm">
              <label>Resignation Date : <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>
                <input type="text" class="form-control" name="name" id="name" disabled placeholder="Enter Name Here.." oninput="this.value=this.value.replace(/[^a-zA-Z\s]/g,'').replace(/\s+/g,' ')">
              </div>
            </div>
            <div class="row row-sm">
              <label>Last Date of Employement : <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>
                <input type="text" class="form-control" name="name" id="name" disabled placeholder="Enter Name Here.." oninput="this.value=this.value.replace(/[^a-zA-Z\s]/g,'').replace(/\s+/g,' ')">
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button class="btn ripple btn-sm btn-outline-dark" id="adEmployeeDetails" disabled type="button"> <i class="ti-save"></i> Create Form 16 Letter </button>
          </div>
        </div>
      </div>
    </div>

  </div>

  <div class="modal fade" id="document_printArea">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content modal-content-demo">
        <div class="modal-header">
          <h6 class="modal-title" id="typLetter">Warning Letter</h6>
          <button aria-label="Close" class="btn-close mClose" data-bs-dismiss="modal" type="button"> <i class="fe fe-x"></i> </button>
        </div>
        <div class="modal-body">
          <div id="printDataArea">
            Welcome back to print
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn ripple btn-outline-dark" data-bs-dismiss="modal" type="button"><i class="fe fe-arrow-left"></i> Back </button>
          <button class="btn ripple btn-outline-primary getClickOptn" type="button" data-id="download===docum" id="downloadForOffrFrm"><i class="si si-printer"></i> Print</button>
          <button class="btn ripple btn-outline-primary" type="button" id="downloadFrm"><i class="si si-printer"></i> Print</button>

        </div>
      </div>
    </div>
  </div>

  <script src="<?php echo base_url("assets/js/html2pdf.bundle.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/admin/employee_document.js") ?>"></script>