	<div class="inner-body">
	    <!-- Page Header -->
	    <div class="page-header" style="margin: 5px 0px 5px 0px;">
	        <!--<h2 class="main-content-title tx-24 mg-b-5">Profile</h2>-->
	        <ol class="breadcrumb">
	            <li class="breadcrumb-item"><a href="javascript:void(0);">Profile</a></li>
	            <li class="breadcrumb-item active" aria-current="page"><?php echo $employee->name; ?></li>
	        </ol>
	    </div>
	    <!-- End Page Header -->
	    <div class="row row-sm" style="margin-bottom:75px;">
	        <?php //print_r($employee);
            ?>
	        <div class="col-xl-3 col-lg-12 col-md-12">
	            <div class="card custom-card">
	                <div class="card-header">
	                    <h3 class="main-content-label">My Account</h3>
	                </div>
	                <div class="card-body text-center item-user">
	                    <div class="profile-pic">
	                        <div class="profile-pic-img">
	                            <img src="<?php echo base_url($employee->image); ?>" id="empProfilePic" class="rounded-circle" alt="user">
	                            <div id="imgUpload" data-bs-toggle="modal" data-bs-target="#profileChange"><i class="si si-camera"></i></div>
	                        </div>
	                        <a href="javascript:void(0);" class="text-dark">
	                            <h5 class="mt-3 mb-0 font-weight-semibold"><?php echo $employee->name; ?></h5>
	                        </a>
	                        <h6 class="mHd">Emp ID : <span><?php echo $employee->employee_id; ?></span></h6>
	                    </div>
	                </div>

	                <ul class="item1-links nav nav-tabs  mb-0">

	                    <li class="nav-item">
	                        <a data-bs-target="#personalDetails" class="nav-link active" data-bs-toggle="tab" role="tablist">
	                            <i class="ti-user icon1"></i> Personal Details
	                        </a>
	                    </li>

	                    <li class="nav-item">
	                        <a data-bs-target="#bankAcDet" class="nav-link" data-bs-toggle="tab" role="tablist">
	                            <i class="pe-7s-culture icon1"></i> Bank Account Details
	                        </a>
	                    </li>

	                    <li class="nav-item">
	                        <a data-bs-target="#empCompanyDet" class="nav-link " data-bs-toggle="tab" role="tablist">
	                            <i class="ti-bookmark-alt icon1"></i> Company Details
	                        </a>
	                    </li>

	                    <li class="nav-item">
	                        <a data-bs-target="#salary_setup" class="nav-link" data-bs-toggle="tab" role="tablist"><i class="si si-badge icon1"></i> Salary Setup</a>
	                    </li>

	                    <li class="nav-item">
	                        <a data-bs-target="#empDocuDet" class="nav-link" data-bs-toggle="tab" role="tablist">
	                            <i class="ti-agenda icon1"></i> Document Details
	                        </a>
	                    </li>

	                    <li class="nav-item">
	                        <a data-bs-target="#leaveDetails" class="nav-link" data-bs-toggle="tab" role="tablist">
	                            <i class="si si-plane icon1"></i> Leave Details
	                        </a>
	                    </li>

	                    <li class="nav-item">
	                        <a data-bs-target="#wallet" class="nav-link" data-bs-toggle="tab" role="tablist"><i class="ti-wallet icon1"></i> Payroll Details</a>
	                    </li>

	                    <li class="nav-item">
	                        <a data-bs-target="#attendanceDet" class="nav-link" data-bs-toggle="tab" role="tablist">
	                            <i class="si si-bell icon1"></i> Attendance Details
	                        </a>
	                    </li>

	                    <li class="nav-item">
	                        <a data-bs-target="#changePass" class="nav-link" data-bs-toggle="tab" role="tablist">
	                            <i class="si si-settings icon1"></i> Change Password
	                        </a>
	                    </li>

	                    <?php if ($this->router->fetch_class() == 'profile') { ?>
	                        <li class="nav-item">
	                            <a href="<?php echo base_url('auth/login/signout'); ?>" class="nav-link"><i class="ti-power-off icon1"></i> Log Out</a>
	                        </li>
	                    <?php } ?>
	                </ul>
	            </div>
	        </div>
	        <div class="col-xl-9 col-lg-12 col-md-12">
	            <div class="card custom-card">
	                <div class="card-body">
	                    <div class="tab-content" id="myTabContent">
	                        <div class="tab-pane fade active show" id="personalDetails" role="tabpanel">
	                            <div class="d-flex mb-4 hedings">
	                                <label class="main-content-label my-auto"><i class="si si-user"></i> <span id="edtProDet">Personal Details</span></label>
	                            </div>
	                            <?php $this->load->view('staff/personal_details'); ?>
	                        </div>
	                        <div class="tab-pane fade" id="bankAcDet" role="tabpanel">
	                            <div class="d-flex mb-4 hedings">
	                                <label class="main-content-label my-auto"><i class="ti-save-alt"></i><span id="edtBnk"> Bank Account Details</span></label>
	                                <a href="<?php echo $backUrl; ?>"><i class="ti-arrow-left"></i></a>
	                            </div>
	                            <?php $this->load->view('staff/bank_details'); ?>

	                        </div>
	                        <!----------------------------------------------@mi Company Details Start---------------------------------------------------------------------->
	                        <div class="tab-pane fade" id="salary_setup" role="tabpanel">
	                            <div class="d-flex mb-4 hedings">
	                                <label class="main-content-label my-auto"><i class="si si-badge"></i> <span id="edtSsl">Salary Summary</span></label>
	                                <a href="<?php echo $backUrl; ?>"><i class="ti-arrow-left"></i></a>
	                            </div>
	                            <div class="row row-sm">
	                                <?php

                                    $this->load->view('staff/salary_setup');
                                    ?>
	                            </div>
	                        </div>
	                        <div class="tab-pane fade" id="empCompanyDet" role="tabpanel">
	                            <div class="d-flex mb-4 hedings">
	                                <label class="main-content-label my-auto"><i class="si si-user"></i> <span id="edtCmpDet">Company Details</span></label>
	                                <a href="<?php echo $backUrl; ?>"><i class="ti-arrow-left"></i></a>
	                            </div>
	                            <?php $this->load->view('staff/company_details'); ?>
	                        </div>
	                        <div class="tab-pane fade" id="empDocuDet" role="tabpanel">
	                            <div class="d-flex mb-4 hedings">
	                                <label class="main-content-label my-auto"><i class="ti-desktop"></i> Document Details</label>
	                                <a href="<?php echo $backUrl; ?>"><i class="ti-arrow-left"></i></a>
	                            </div>
	                            <div class="empDocHead">
	                                <span id="edtDocDet">List of documents</span>
	                                <span class="miBck">
	                                    <a href="javascript:void(0);" style="margin-left:-5px;" title="Click to add new document" class="miAction amiStl" id="AddNewDoc"> upoload New </a>
	                                </span>
	                            </div>
	                            <div class="row">
	                                <div class="col-md-12">
	                                    <div class="row" id="lstDocDet">
	                                        <div class="table-responsive">
	                                            <table class="table border text-md-nowrap text-nowrap" id="empDocTble">
	                                                <thead class="ami_tHeader miCntr">
	                                                    <tr>
	                                                        <th>S. No.</th>
	                                                        <th>Document Type</th>
	                                                        <th>Image</th>
	                                                        <th>Create Date</th>
	                                                        <!-- <th>Modified Date</th>-->
	                                                        <th>Action</th>
	                                                    </tr>
	                                                </thead>
	                                                <tbody>
	                                                    <?php
                                                        if ($getEmpDocument) {
                                                            $empD = NULL;
                                                            $cnt = 0;
                                                            foreach ($getEmpDocument as $empD) {
                                                                $docTypArr = array('1' => 'Driving Licence', '2' => 'Pan Card', '3' => 'Aadhaar Card', '4' => 'Resume', '5' => 'Joining letter', '6' => 'Driving Licence');
                                                                ++$cnt;
                                                        ?>
	                                                            <tr class="border-bottom miCenter" id="miDcSrl-<?php echo $empD->id; ?>">
	                                                                <th id="smDocCnt-<?php echo $empD->id; ?>"><?php echo $cnt; ?></th>
	                                                                <td><?php echo $docTypArr[$empD->doc_type] ?></td>
	                                                                <td><img src="<?php echo base_url($empD->doc_image); ?>" id="empDc--<?php echo $empD->id; ?>" class="img-sm product-image border arvImg" alt="product-img"></td>
	                                                                <td><?php echo ($empD->created_date) ? date('d-m-Y', strtotime($empD->created_date)) : '<span class="naSpc">N/A</span>'; ?></td>
	                                                                <!--  <td><?php //echo($empD->modified_date)?date('d-m-Y',strtotime($empD->modified_date)):'<span class="naSpc">N/A</span>';
                                                                                ?></td>-->
	                                                                <td>
	                                                                    <a href="javascript:void(0);" data-id="viewDetails===<?php echo $empD->id; ?>===<?php echo $docTypArr[$empD->doc_type]; ?>" title="View" class="btn btn-outline-primary btn-sm viewEmpDocDetails">
	                                                                        <i class="ti-eye"></i>
	                                                                    </a>
	                                                                    <a href="javascript:void(0);" class="btn btn-outline-danger btn-sm viewEmpDocDetails" data-id="trashDocDetails===staff/profile/trashDetails===<?php echo $empD->id . '===' . $docTypArr[$empD->doc_type]; ?>" data-bs-toggle="modal" data-bs-target="#trashEmpDetails" title="Delete document">
	                                                                        <i class="fe fe-trash-2"></i>
	                                                                    </a>
	                                                                </td>
	                                                            </tr>
	                                                        <?php }
                                                        } else { ?>
	                                                        <tr>
	                                                            <td colspan="6">
	                                                                <div class="midocImg">
	                                                                    <div>No document available in here</div> <img src="<?php echo base_url('uploads/addnewitem.svg'); ?>">
	                                                                </div>
	                                                            </td>
	                                                        </tr>
	                                                    <?php } ?>
	                                                </tbody>
	                                            </table>
	                                        </div>
	                                    </div>
	                                    <div id="uplDocDetails">
	                                        <form method="post" id="manage_document" enctype="multipart/form-data">

	                                            <input type="hidden" value="<?php echo $targetDoc; ?>" id="targetDoc" name="targetDoc">
	                                            <div class="row">
	                                                <div class="col-md-6">
	                                                    <label>Document Type : <span class="text-danger">*</span></label>
	                                                    <div class="input-group mb-3" style=" height:60px;">
	                                                        <div class="input-group-prepend">
	                                                            <span class="input-group-text"><i class="si si-user"></i></span>
	                                                        </div>
	                                                        <div class="miSlwdth">
	                                                            <select name="docuType" id="docuType" class="form-control select2-with-search">
	                                                                <option value=""> Choose One </option>
	                                                                <option value="1">Aadhaar Card</option>
	                                                                <option value="2">Pan</option>
	                                                                <option value="3">Experiance Letter</option>
	                                                                <option value="4">Resume</option>
	                                                                <option value="5">Joining Letter</option>
	                                                                <option value="6">Driving Licence</option>
	                                                            </select>
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                                <div class="col-md-6">
	                                                    <label>Upload Document : <span class="text-danger">*</span></label>
	                                                    <div class="input-group file-browser">
	                                                        <input type="text" class="form-control border-end-0 browse-file" id="empDocFile" name="empDocFile" placeholder="Choose file" readonly="">
	                                                        <label class="input-group-btn">
	                                                            <span class="btn btn-outline-success">
	                                                                Browse <input type="file" style="display:none;" id="empDocFileAdd" name="empDocFileAdd">
	                                                            </span>
	                                                        </label>
	                                                    </div>
	                                                </div>
	                                                <div class="col-md-12">
	                                                    <button class="btn ripple btn-outline-secondary pull-right amiStl" id="saveDocDet"><i class="ti-save"></i> Save</button>
	                                                    <button class="btn ripple btn-outline-dark pull-right amiStl" id="bckToDoclist" type="button"><i class="ti-arrow-left"></i> Back</button>
	                                                </div>
	                                            </div>
	                                        </form>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                        <!----------------------------------------------@mi Company Details END---------------------------------------------------------------------->
	                        <div class="tab-pane fade" id="leaveDetails" role="tabpanel">
	                            <div class="d-flex mb-4 hedings">
	                                <label class="main-content-label my-auto"><i class="si si-plane"></i> Leaves Summary</label>
	                                <a href="<?php echo $backUrl; ?>"><i class="ti-arrow-left"></i></a>
	                            </div>
	                            <?php //print_r($employee);
                                ?>
	                            <input type="hidden" id="leaveSummary" value="<?php echo $leaveSummary; ?>">
	                            <div class="table-responsive">
	                                <table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="empLeaveSummary">
	                                    <thead class="ami_tHeader">
	                                        <tr>
	                                            <th>
	                                                <div style="width:60px;">S No.</div>
	                                            </th>
	                                            <th class="">Leave Type</th>
	                                            <th class="">From</th>
	                                            <th class="">TO</th>
	                                            <th class="">Days</th>
	                                            <th class="">Reason</th>
	                                            <th class="">Applied On</th>
	                                            <th class="">Status</th>
	                                            <th class="">Action</th>
	                                        </tr>
	                                    </thead>
	                                    <!--<tbody>
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td>Casual Leave</td>
                                                    <td>16-01-2021</td>
                                                    <td>16-01-2021</td>
                                                    <td class="fw-semibold">1 Day</td>
                                                    <td>Personal</td>
                                                    <td>05-01-2021</td>
                                                    <td> <span class="badge bg-primary">New</span> </td>
                                                    <td> <div class="d-flex text-start"> <a href="javascript:void(0);" class="action-btns1 ms-0" data-bs-toggle="modal" data-bs-target="#leaveapplictionmodal"> <i class="fe fe-eye  text-primary" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="view" data-bs-original-title="view"></i> </a> <a href="javascript:void(0);" class="action-btns1" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete"> <i class="fe fe-trash-2 text-danger"></i> </a> <a href="javascript:void(0);" class="action-btns1" data-bs-toggle="modal" data-bs-target="#reportmodal"> <i class="fe fe-info text-secondary" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Report" data-bs-original-title="Report"></i> </a> </div> </td>
                                                </tr>
                                                </tbody>-->
	                                </table>
	                            </div>
	                        </div>
	                        <div class="tab-pane fade" id="wallet" role="tabpanel">
	                            <div class="d-flex mb-4 hedings">
	                                <label class="main-content-label my-auto"><i class="ti-wallet"></i> My Payslips Summary</label>
	                                <a href="<?php echo $backUrl; ?>"><i class="ti-arrow-left"></i></a>
	                            </div>
	                            <input type="hidden" id="paySlipSummary" value="<?php echo $paySlipSummary; ?>">
	                            <div class="table-responsive">
	                                <table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="empPayslip">
	                                    <thead class="ami_tHeader">
	                                        <tr>
	                                            <th class="text-center">Tnx. Id</th>
	                                            <th class="">Month</th>
	                                            <th class="">Year</th>
	                                            <th class="">Generated Date</th>
	                                            <th class="">Net Salary</th>
	                                            <th class="">Action</th>
	                                        </tr>
	                                    </thead>
	                                    <!--<tbody>
                                                        <tr>
                                                            <td class="text-center">#10029</td>
                                                            <td>January</td>
                                                            <td>2021</td>
                                                            <td class="fw-semibold">$32,000</td>
                                                            <td>01-02-2021</td>
                                                            <td> 
                                                                 <a class="btn btn-primary  btn-sm" data-bs-toggle="tooltip" data-original-title="View"><i class="fe fe-eye"></i></a> 
                                                                 <a class="btn btn-success  btn-sm" data-bs-toggle="tooltip" data-original-title="Download"><i class="fe fe-download"></i></a> 
                                                                 <a class="btn btn-info  btn-sm" data-bs-toggle="tooltip" data-original-title="Print" onclick="javascript:window.print();">
                                                                    <i class="fe fe-printer"></i>
                                                                 </a> 
                                                                 <a class="btn btn-warning  btn-sm" data-bs-toggle="tooltip" data-original-title="Share"><i class="fe fe-share-2"></i></a> 
                                                            </td>
                                                        </tr>
                                                    </tbody>-->
	                                </table>
	                            </div>
	                        </div>
	                        <div class="tab-pane fade" id="attendanceDet" role="tabpanel">
	                            <div class="d-flex mb-4 hedings">
	                                <label class="main-content-label my-auto"><i class="si si-bell"></i> My Attendance Summary</label>
	                                <a href="<?php echo $backUrl; ?>"><i class="ti-arrow-left"></i></a>
	                            </div>
	                            <input type="hidden" id="attenSummary" value="<?php echo $attenSummary; ?>">
	                            <div class="table-responsive">
	                                <div class="row">
	                                    <div class="col-sm-12">
	                                        <table class="table text-nowrap text-md-nowrap table-striped table-bordered table-hover mg-b-0" id="reportAppearance">
	                                            <thead class="ami_tHeader">
	                                                <tr>
	                                                    <th>S.No.</th>
	                                                    <th>Date</th>
	                                                    <th>Status</th>
	                                                    <th>Clock-In</th>
	                                                    <th>Clock-Out</th>
	                                                    <th>Hours</th>
	                                                </tr>
	                                            </thead>
	                                        </table>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="tab-pane fade" id="changePass" role="tabpanel">
	                            <div class="d-flex mb-4 hedings">
	                                <label class="main-content-label my-auto"><i class="ti-save-alt"></i> Reset Your Password</label>
	                                <a href="<?php echo $backUrl; ?>"><i class="ti-arrow-left"></i></a>
	                            </div>
	                            <form id="resetYourPassword" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	                                <input type="hidden" id="avrActionTarget" value="<?php echo $avrActionTarget; ?>" />
	                                <input type="hidden" id="emp_id" name="emp_id" value="<?php echo $employee->id; ?>" />
	                                <div class="row row-sm">
	                                    <div class="col-md-12">
	                                        <label>Old Password:<span class="text-danger">*</span></label>
	                                        <div class="input-group mb-3">
	                                            <div class="input-group-prepend">
	                                                <span class="input-group-text"><i class="si si-settings"></i></span>
	                                            </div>
	                                            <input type="password" class="form-control" name="prePass" id="prePass" />
	                                        </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                        <label>New Password:<span class="text-danger">*</span></label>
	                                        <div class="input-group mb-3">
	                                            <div class="input-group-prepend">
	                                                <span class="input-group-text"><i class="si si-support"></i></span>
	                                            </div>
	                                            <input type="password" class="form-control" name="newPass" id="newPass">
	                                        </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                        <label>Confirm New Password:<span class="text-danger">*</span></label>
	                                        <div class="input-group mb-3">
	                                            <div class="input-group-prepend">
	                                                <span class="input-group-text"><i class="si si-support"></i></span>
	                                            </div>
	                                            <input type="password" name="cnfPass" id="cnfPass" class="form-control">
	                                        </div>
	                                    </div>
	                                    <div class="col-md-12">
	                                        <button class="btn ripple btn-outline-secondary pull-right amiStl" id="arvResetPassword">
	                                            <i class="ti-save"></i> Reset Password
	                                        </button>
	                                    </div>
	                                </div>
	                            </form>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<!--------------------------------------------------------------->
	<div id="trashEmpDetails" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style=" padding-left: 0px;" aria-modal="true" role="dialog">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-body">
	                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right;"><i class="si si-close"></i></button>
	                <div class="delMsg"><i class="ti-trash"></i> Delete Document Details</div>
	                <div class="actnData"><i class="si si-power"></i> Are you sure want to delete expense details of tnx ID #F33333</div>
	                <div id="mdlFtrBtn">
	                    <button type="button" class="btn btn-outline-secondary waves-effect waves-light pull-right viewEmpDocDetails" id="cnfChanges" data-id="@misingh143">
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
	<div id="empModalImgShw" class="miModal">
	    <span class="miClose viewEmpDocDetails" data-id="miClose"><i class="ti-close"></i></span>
	    <img class="miModal-content" id="empImgShwDet">
	    <div id="miCaption"></div>
	</div>
	<!-------------------------------------------------------------->
	<div id="profileChange" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style=" padding-left: 0px;" aria-modal="true" role="dialog">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-body">
	                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right;"><i class="si si-close"></i></button>

	                <style>
	                    input[type=file]::file-selector-button {
	                        margin-right: 20px !important;
	                        border: none;
	                        background: #dbe0ea !important;
	                        padding: 10px 20px;
	                        border-radius: 5px;
	                        color: #0D3E73;
	                        cursor: pointer;
	                        transition: background .2s ease-in-out;
	                    }

	                    input[type=file]::file-selector-button:hover {
	                        background: #D9E0EE;
	                    }

	                    #uploadMemberIMg {
	                        padding: 4rem;
	                    }

	                    #proImgErr {
	                        color: #c84c02;
	                        text-align: right;
	                        display: none;
	                        font-size: 12px;
	                    }
	                </style>
	                <div class="row row-sm">
	                    <div id="uploadMemberIMg">
	                        <div id="proImgErr"></div>
	                        <div class="input-group">
	                            <input type="file" class="form-control" name="file" id="file">
	                            <button type="button" class="memberImgUploadActn btn ripple btn-light" id="empProImgBtn" data-id="<?php echo base_url('admin/employee/profile_image/' . $employee->id); ?>"><i class="si si-picture"></i> Update</button>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

	<script src="<?php echo base_url('assets/js/admin/employee.js'); ?>"></script>
	<script>
	    /************************************08.03.2024 Start**********************************************/
	    $(function() {
	        $(document).on("click", '.viewEmpDocDetails', function() {

	            let actNbtn = $(this).attr('data-id');
	            let getData = actNbtn.split('===');
	            if (getData[0] == 'viewDetails') {
	                let imgLocDetails = $('#empDc--' + getData[1]).attr('src');
	                $('#empModalImgShw').show();
	                $('#empImgShwDet').attr('src', imgLocDetails);
	                $('#miCaption').html(getData[2]);
	            } else if (getData[0] == 'miClose') {
	                $('#empModalImgShw').hide();
	                $('#empImgShwDet').attr('src', '');
	                $('#miCaption').html('');
	            } else if (getData[0] == 'trashDocDetails') {
	                let cnfDelAction = 'cnfDeleteDoc===' + getData[1] + '===' + getData[2];
	                $('.actnData').html('<i class="si si-power"></i> Are you sure want to delete ' + getData[3] + ' document details');
	                $('#cnfChanges').attr('data-id', cnfDelAction);
	            } else if (getData[0] == 'cnfDeleteDoc') {
	                $('#cnfChanges').html('<i class="fe fe-settings bx-spin"></i> Please Wait');
	                let getResourceLoc = $('#base_url').val() + getData[1];
	                $.post(getResourceLoc, {
	                    id: getData[2],
	                    action: getData[0]
	                }, function(htmlAmi) {
	                    if (htmlAmi.addClas == 'success') {
	                        $.each(htmlAmi.srCnt, function(index, value) {
	                            sum = 1 + index;
	                            $("#smDocCnt-" + value).html(sum + '.');
	                        })
	                        $('.actnData').css('color', '#059B1B').html(htmlAmi.msg);
	                        $("#miDcSrl-" + getData[2]).remove();
	                        $('#trashEmpDetails').delay(3000).modal('hide');
	                    } else {
	                        $('.actnData').css('color', '#ca0000').html(htmlAmi.msg);
	                    }
	                }, 'json');
	            }

	        });

	        $(document).ready(function() {
	            $(".memberImgUploadActn").click(function() {
	                var imgFile = $('#file').val();
	                if (imgFile == "") {
	                    $('#proImgErr').html('Please provide employee image').fadeIn().delay(2000).fadeOut();
	                } else {
	                    $('#empProImgBtn').html('<i class="fe fe-settings bx-spin"></i> Please Wait');
	                    var name = document.getElementById("file").files[0].name;
	                    var form_data = new FormData();
	                    var ext = name.split('.').pop().toLowerCase();
	                    if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
	                        $('#proImgErr').html('Please provide valid image format').fadeIn().delay(2000).fadeOut();
	                    }
	                    var oFReader = new FileReader();
	                    oFReader.readAsDataURL(document.getElementById("file").files[0]);
	                    var f = document.getElementById("file").files[0];
	                    var fsize = f.size || f.fileSize;
	                    if (fsize > 2000000) {
	                        $('#proImgErr').html('Image File Size is very big').fadeIn().delay(2000).fadeOut();
	                    } else {
	                        form_data.append("file", document.getElementById('file').files[0]);
	                        $.ajax({
	                            url: $('#empProImgBtn').attr('data-id'),
	                            method: "POST",
	                            data: form_data,
	                            contentType: false,
	                            cache: false,
	                            processData: false,
	                            beforeSend: function() {
	                                $('#Update').html('Wait...');
	                            },
	                            success: function(data) {
	                                $('#empProImgBtn').html('<i class="si si-picture"></i> Update');
	                                var strng = data.split("====");
	                                if (strng[0] == '1') {
	                                    $('#empProfilePic').attr('src', base_url + "uploads/employee/" + strng[1]);
	                                    $('#proImgErr').html('successfully upload image').css('color', 'green').fadeIn().delay(2000).fadeOut();
	                                    setTimeout(function() {
	                                        window.location.reload(1);
	                                    }, 2500);
	                                } else {
	                                    $('#proImgErr').html('Some Error Occur Please Re-Update').fadeIn().delay(2000).fadeOut();
	                                }
	                            }
	                        });
	                    }
	                }
	            });
	        });

	    });
	    /************************************08.03.2024 End**********************************************/
	</script>

	<style>
	    #proBnkBck,
	    #proDetBck {
	        margin-right: 5px;
	    }

	    .miSlwdth {
	        width: 90%;
	        margin: -38px 0px 0px 35px !important;
	    }

	    .miSlctSpn {
	        padding: 11px 10px 11px 10px;
	    }

	    .eIcn {
	        color: #00A412;
	    }

	    .select2-container--default .select2-selection--single .select2-selection__rendered {
	        color: #1c2e6f !important;
	    }




	    .ami_tHeader {
	        background-color: #088;
	    }

	    .ami_tHeader>tr>th {
	        color: #FFFFFF !important;
	        border: 1px solid #088 !important;
	        padding: 12px 0px 12px 5px !important;
	    }

	    .ami_tHeader>tr {
	        border: 1px solid #088 !important;
	    }

	    .bgPrsnt {
	        background-color: #0dcd94;
	    }

	    .bgLat {
	        background-color: #f34932;
	    }

	    .bgAbsnt {
	        background-color: #f7284a;
	    }

	    .bgHoliDy {
	        background-color: #0073d9;
	    }

	    .bgHfDy {
	        background-color: #e3b113;
	    }



	    .icnClr i {
	        padding: 5px;
	        background-color: #4D43B0;
	        border-radius: 5px;
	        margin-right: 5px;
	        color: white;
	    }

	    .prodeRow {
	        padding: 8px 0px 8px 0px;
	        border-bottom: 1px dashed #454545;
	        margin: 0px 15px 0px 15px;
	    }

	    .detDrk {
	        font-weight: 900;
	        color: #0D3E73;
	    }


	    .prLst {
	        border-bottom: 0px solid #fff;
	    }

	    .rounded-circle {
	        height: 128px;
	        width: 128px
	    }

	    .miLbl span {
	        font-weight: bold;
	    }

	    .miPad {
	        padding-left: 1.7rem !important;
	    }


	    .item1-links li {
	        cursor: pointer !important;
	    }

	    .hedings {
	        border-bottom: 1px solid #f0f0f0;
	        padding: 15px 0px 15px 15px;
	        background-color: #318e3d;
	        border-top-left-radius: 10px;
	        border-top-right-radius: 10px;
	        margin: -26px -24.5px 0px -24.5px;
	    }

	    .hedings label {
	        color: #fff;
	    }

	    .hedings i {
	        padding: 8px;
	        background-color: #047713;
	        border-radius: 10px;
	        color: #fff;
	    }

	    .hedings a i {
	        padding: 8px;
	        background-color: #fff;
	        border-radius: 20px;
	        color: #047713;
	        margin-right: 15px;
	    }

	    .hedings a {
	        float: right;
	    }

	    #imgUpload {
	        margin-top: -25px;
	    }
	</style>