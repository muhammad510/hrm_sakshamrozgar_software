	<div class="inner-body">
        <!-- Page Header -->
        <div class="page-header" style="margin: 5px 0px 5px 0px;">
                <!--<h2 class="main-content-title tx-24 mg-b-5">Profile</h2>-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Profile</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $employee->name;?></li>
                </ol>
        </div>
        <!-- End Page Header -->
		<div class="row row-sm" style="margin-bottom:75px;">
			<div class="col-xl-3 col-lg-12 col-md-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <h3 class="main-content-label">My Account</h3>
                    </div>
                    <div class="card-body text-center item-user">
                        <div class="profile-pic">
                            <div class="profile-pic-img">
                                <span class="bg-success dots" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="online" aria-label="online"></span>
                                <img src="<?php echo base_url($employee->image);?>" class="rounded-circle" alt="user">
                             </div>
                            <a href="javascript:void(0);" class="text-dark"><h5 class="mt-3 mb-0 font-weight-semibold"><?php echo $employee->name;?> </h5></a>
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
                                <i class="ti-save-alt icon1"></i> Bank Account Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-bs-target="#leaveDetails" class="nav-link" data-bs-toggle="tab" role="tablist">
                                <i class="si si-plane icon1"></i> Leave Details
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a data-bs-target="#wallet" class="nav-link" data-bs-toggle="tab" role="tablist">
                                <i class="ti-wallet icon1"></i> Payslips
                            </a>
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
                        <li class="nav-item">
                            <a href="<?php echo base_url('auth/login/signout');?>" class="nav-link"><i class="ti-power-off icon1"></i> Log Out</a>
                        </li>
                    </ul>
                </div>
			</div>
            <div class="col-xl-9 col-lg-12 col-md-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="personalDetails" role="tabpanel">
                                <div class="d-flex mb-4 hedings">
                                    <label class="main-content-label my-auto"><i class="si si-user"></i> <span id="edtProDet">Personal Details</span></label>
                                </div>
                                <div id="viewProDet">
                                	<div class="row">
                                <?php 
                                        if($employee->gender=='1'){$genIcn='si si-user';}else if($employee->gender=='2'){$genIcn='si si-user-female';}
										else{$genIcn='si si-emotsmile';}
                                ?>
                                <div class="col-md-12">
                                    <div class="row prodeRow">
                                            <div class="col-md-4 icnClr"><i class="si si-support "></i>  User Id.</div>
                                             <div class="col-md-8 detDrk "><?php echo 'EMP'.$employee->employee_id;?> </div>
                                    </div>
                                 </div>   
                                   <div class="col-md-12">
                                    <div class="row prodeRow">
                                            <div class="col-md-4 icnClr"><i class="<?php echo $genIcn;?>"></i>  Name.</div>
                                             <div class="col-md-8 detDrk "><?php echo $employee->name;?> </div>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="row prodeRow">
                                            <div class="col-md-4 icnClr"><i class="si si-info"></i> Gender.</div>
                                             <div class="col-md-8 detDrk"> 
                                                <?php if($employee->gender=='1'){echo 'Male';}elseif($employee->gender=='2'){echo 'Female';}else { echo 'Others';}?> 
                                             </div>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="row prodeRow">
                                            <div class="col-md-4 icnClr"><i class="si si-user"></i> Father's Name.</div>
                                             <div class="col-md-8 detDrk"> <?php echo $employee->father_name;?> </div>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="row prodeRow">
                                         <div class="col-md-4 icnClr"><i class="si si-screen-smartphone"></i>  Contact Number.</div>
                                         <div class="col-md-8 detDrk"> <?php echo $employee->contact_no;?> </div>
                                    </div>
                                 </div>
                                   <div class="col-md-12">
                                    <div class="row prodeRow">
                                         <div class="col-md-4 icnClr"><i class="si si-envelope"></i>  Email Id.</div>
                                         <div class="col-md-8 detDrk"> <?php echo $employee->email;?> </div>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="row prodeRow">
                                            <div class="col-md-4 icnClr"><i class="si si-event"></i>  Date of birth.</div>
                                             <div class="col-md-8 detDrk"> <?php echo date('d-m-Y',strtotime($employee->dob));?> </div>
                                    </div>
                                 </div>    
                                  <div class="col-md-12">
                                    <div class="row prodeRow">
                                            <div class="col-md-4 icnClr"><i class="si si-badge"></i>  Marital Status.</div>
                                             <div class="col-md-8 detDrk"> <?php if($employee->marital_status=='1'){echo 'Married';}else{echo 'Un-Married';}?> </div>
                                    </div>
                                 </div>   
                                  <div class="col-md-12" >
                                    <div class="row prodeRow">
                                            <div class="col-md-4 icnClr"><i class="si si-flag"></i>  Nationality.</div>
                                             <div class="col-md-8 detDrk"> <?php echo $employee->nationality;?></div>
                                    </div>
                                 </div>      	
                                 <div class="col-md-12" >
                                    <div class="row prodeRow">
                                            <div class="col-md-4 icnClr"><i class="si si-user"></i>  Referred By.</div>
                                             <div class="col-md-8 detDrk"> <?php echo $employee->reference_person_name;?></div>
                                    </div>
                                 </div>
                                  <div class="col-md-12" >
                                    <div class="row prodeRow prLst">
                                            <div class="col-md-4 icnClr"><i class="si si-screen-smartphone"></i> Reference Contact Nu.</div>
                                             <div class="col-md-8 detDrk"> <?php echo $employee->reference_person_number;?></div>
                                    </div>
                                 </div>
                                    <div class="col-md-12">
                                        <button class="btn ripple btn-outline-secondary pull-right amiStl" id="employeedata"><i class="ti-save"></i> Edit</button>
                                    </div>
                                  </div>
                                </div> 
                                <div id="editProDetails"  style="display:none;">
                                  <form id="edProDetails" method="post">
                                	<div class="row row-sm">
                                        <div class="col-6">
                                          <label>Name:<span class="text-danger">*</span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ti-user eIcn"></i></span>
                                                </div>
                  <input type="text" class="form-control" name="name" id="name" value="<?php echo $employee->name;?>" placeholder="Enter Name Here..">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label>Father Name:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ti-user eIcn"></i></span>
                                                </div>
                 <input type="text" class="form-control" name="father_name" id="father_name" value="<?php echo $employee->father_name;?>"  placeholder="Enter Father Name Here..">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label>Date of Birth:<span class="text-danger">*</span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="si si-calendar eIcn"></i></span>
                                                </div>
                                 <input type="text" class="form-control fc-datepicker" name="dob" id="dob" value="<?php echo date('d/m/Y',strtotime($employee->dob));?>" >
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label>Gender:<span class="text-danger">*</span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text miSlctSpn"><i class="ti-medall eIcn"></i></span>
                                                </div>
                                               <div class="miSlwdth"> 
                                                  <select class="form-control custom-select select2 " name="gender" id="gender">
                                                    <option value=""> --- Select Gnder --- </option>
                                                    <option value="1" <?php if($employee->gender=='1'){echo 'selected="selected"';}?> >Male</option>
                                                    <option value="2" <?php if($employee->gender=='2'){echo 'selected="selected"';}?>>Female</option>
                                                  </select>
                                               </div>   
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label>Mobile No.:<span class="text-danger">*</span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ti-mobile eIcn"></i></span>
                                                </div>
         <input type="text" class="form-control" name="contact_no" id="contact_no" placeholder="Enter Your Mobile No...."  value="<?php echo $employee->contact_no;?>" >
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label>Email Id:<span class="text-danger">*</span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ti-email eIcn"></i></span>
                                                </div>
         <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email Here.." value="<?php echo $employee->email;?>" >
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label>Address:<span class="text-danger">*</span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ti-map eIcn"></i></span>
                                                </div>
         <textarea type="text" name="address" id="address" class="form-control" placeholder="Please Enter Your Address..."><?php echo $employee->address;?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-6">
                                            <label>State:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text miSlctSpn"><i class="si si-support eIcn"></i></span>
                                                </div>
                                                <div class="miSlwdth">
                                                  <select name="state" id="state" class="form-control custom-select select2 arvChange">
                                                  	  <option label="Select State"></option> 
													  <?php 
                                                            if($getState)
                                                            {
                                                                foreach($getState as $stD)
                                                                {
                                                            ?>
                                                              <option value="<?php echo $stD->id;?>" <?php if($employee->state==$stD->id){echo 'selected="selected"';}?> >
															  		<?php echo $stD->state_cities;?>
                                                              </option>  
                                                              <?php }}?>
                                                  </select>
                                                 </div> 
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label>District:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text miSlctSpn"><i class="si si-support eIcn"></i></span>
                                                </div>
                                                <div class="miSlwdth">
                                                  <select name="district" id="district" class="form-control custom-select select2 arvChange">
                                                      <option label="Select District"></option> 
                                                       <?php 
                                                            if($getCity)
                                                            {
                                                                foreach($getCity as $distrct)
                                                                {
                                                            ?>
                                                             <option value="<?php echo $distrct->id;?>"<?php if($employee->district==$distrct->id){echo 'selected="selected"';}?> >
															  		<?php echo $distrct->state_cities;?>
                                                             </option>  
                                                        <?php }}?>
                                                  </select>
                                                 </div> 
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label>Zipcode:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="si si-globe-alt eIcn"></i></span>
                                                </div>
                                  <input type="text" name="zipCode" id="zipCode" class="form-control" value="<?php echo $employee->zipcode;?>" placeholder="Enter Your Zipcode..">
                                            </div>
                                        </div>
                                   
                                        <div class="col-6">
                                            <label>Marital Status:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text miSlctSpn"><i class="si si-bell eIcn"></i></span>
                                                </div>
                                              <div class="miSlwdth">
                                                <select name="marital_status" id="marital_status" class="form-control  custom-select select2 ">
                                                    <option value=""> --- Select One --- </option>
                                                    <option value="1" <?php if($employee->marital_status=='1'){echo 'selected="selected"';}?>>Married</option>
                                                    <option value="2" <?php if($employee->marital_status=='2'){echo 'selected="selected"';}?>>UnMarried</option>
                                                </select>
                                              </div>
                                            </div>
                                        </div>
                                       <div class="col-md-12">
                                        	<button class="btn ripple btn-outline-primary pull-right amiStl" id="savePersnlDet"><i class="ti-save"></i> Save</button>
                                            <button class="btn ripple btn-outline-dark pull-right amiStl" id="proDetBck" type="button"><i class="ti-arrow-left"></i> Back</button>
                                   	   </div> 
                                        
                                    </div>
                                  </form>      
                                </div>
                            </div>
                            <div class="tab-pane fade" id="bankAcDet" role="tabpanel">
                                <div class="d-flex mb-4 hedings">
                                    <label class="main-content-label my-auto"><i class="ti-save-alt"></i> <span id="edtBnk">Bank Account Details</span></label>
                                </div>
                               <div id="viewBnkDetails">
                                	<div class="row">
                                    <div class="col-md-12">
                                        <div class="row prodeRow">
                                                <div class="col-md-4 icnClr"><i class="si si-user"></i> Account Holder's Name.</div>
                                                 <div class="col-md-8 detDrk "><?php echo $employee->holder_name;?>  </div>
                                        </div>
                                     </div>   
                                    <div class="col-md-12">
                                        <div class="row prodeRow">
                                                <div class="col-md-4 icnClr"><i class="pe-7s-culture"></i> Bank Name.</div>
                                                 <div class="col-md-8 detDrk "><?php echo $employee->bank_name;?>  </div>
                                        </div>
                                     </div>   
                                    <div class="col-md-12">
                                    <div class="row prodeRow">
                                            <div class="col-md-4 icnClr"><i class="si si-screen-desktop"></i> Account Number.</div>
                                             <div class="col-md-8 detDrk "><?php echo $employee->bank_account_no;?>  </div>
                                    </div>
                                 </div>
                                    <div class="col-md-12">
                                    <div class="row prodeRow">
                                            <div class="col-md-4 icnClr"><i class="si si-screen-desktop"></i> Branch Name.</div>
                                             <div class="col-md-8 detDrk"> 
                                                <?php echo $employee->bank_branch;?>
                                             </div>
                                    </div>
                                 </div>
                                    
                                    <div class="col-md-12">
                                    <div class="row prodeRow prLst">
                                         <div class="col-md-4 icnClr"><i class="si si-screen-desktop"></i> IFSC CODE.</div>
                                         <div class="col-md-8 detDrk"> <?php echo $employee->ifsc_code;?>  </div>
                                    </div>
                                 </div>
                                    <div class="col-md-12">
                                        <button class="btn ripple btn-outline-secondary pull-right amiStl" id="bnkDetBtn"><i class="ti-save"></i> Edit</button>
                                    </div>
                                </div>
                                </div>
                                <div id="edtBnkDetails" style="display:none;">
                                	<form id="edBnkDetails" method="post">
                                		<div class="row row-sm">
                                        <div class="col-6">
                                          <label>Account Holder's Name:<span class="text-danger">*</span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ti-user eIcn"></i></span>
                                                </div>
                  <input type="text" class="form-control" name="acHldrname" id="acHldrname" value="<?php echo $employee->holder_name;?>" placeholder="Enter Name Here..">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label>Bank Name:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="pe-7s-culture eIcn"></i></span>
                                                </div>
                 <input type="text" class="form-control" name="bnk_name" id="bnk_name" value="<?php echo $employee->bank_name;?>"  placeholder="Enter Father Name Here..">
                                            </div>
                                        </div>
                                        
                                        <div class="col-6">
                                            <label>Account Type:<span class="text-danger">*</span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text miSlctSpn"><i class="ti-medall eIcn"></i></span>
                                                </div>
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
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="si si-screen-desktop eIcn"></i></span>
                                                </div>
         <input type="text" class="form-control" name="bnkAcNumber" id="bnkAcNumber" placeholder="Enter your bank account number...."  value="<?php echo $employee->bank_account_no;?>" >
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label>Branch Name:<span class="text-danger">*</span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="si si-screen-desktop eIcn"></i></span>
                                                </div>
         <input type="text" name="brnchName" id="brnchName" class="form-control" placeholder="Enter your branch name.." value="<?php echo $employee->bank_branch;?>" >
                                            </div>
                                        </div>
                                         <div class="col-6">
                                            <label>IFSC Code:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="si si-screen-desktop eIcn"></i></span>
                                                </div>
                           <input type="text" name="ifsc_code" id="ifsc_code" class="form-control" value="<?php echo $employee->ifsc_code;?>" placeholder="Enter your ifsc code..">
                                            </div>
                                        </div>
                                      <div class="col-md-12">
                                            <button class="btn ripple btn-outline-primary pull-right amiStl" id="saveBnkDet"><i class="ti-save"></i> Save</button>
                                            <button class="btn ripple btn-outline-dark pull-right amiStl" id="proBnkBck" type="button"><i class="ti-arrow-left"></i> Back</button>
                                   	   </div> 
                                        
                                    </div>
                                    </form>   
                                </div>
                            </div>
                            <div class="tab-pane fade" id="leaveDetails" role="tabpanel">
                                <div class="d-flex mb-4 hedings">
                                    <label class="main-content-label my-auto"><i class="ti-save-alt"></i> Leaves Summary</label>
                                </div>
                                
                               <div class="table-responsive"> 
                                 <table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="emp-attendance"> 
                                    <thead class="ami_tHeader">
                                        <tr>
                                            <th class="border-bottom-0 text-center">#ID</th>
                                            <th class="border-bottom-0">Leave Type</th>
                                            <th class="border-bottom-0">From</th>
                                            <th class="border-bottom-0">TO</th>
                                            <th class="border-bottom-0">Days</th>
                                            <th class="border-bottom-0">Reason</th>
                                            <th class="border-bottom-0">Applied On</th>
                                            <th class="border-bottom-0">Status</th>
                                            <th class="border-bottom-0">Action</th>
                                       </tr> 
                                    </thead> 
                                <tbody>
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
                                </tbody>
                            </table> 
                         </div> 
                            </div>
                            
                            <div class="tab-pane fade" id="wallet" role="tabpanel">
                                <div class="d-flex mb-4 hedings">
                                    <label class="main-content-label my-auto"><i class="ti-wallet"></i> My Payslips Summary</label>
                                </div>
                                
                               <div class="table-responsive"> 
                                 <table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="emp-attendance"> 
                                    <thead class="ami_tHeader">
                                        <tr>
                                            <th class="border-bottom-0 text-center">#ID</th>
                                            <th class="border-bottom-0">Month</th>
                                            <th class="border-bottom-0">Year</th>
                                            <th class="border-bottom-0">$ Net Salary</th>
                                            <th class="border-bottom-0">Generated Date</th>
                                            <th class="border-bottom-0">Action</th>
                                       </tr>
                                    </thead> 
                                <tbody>
                                    <tr>
                                        <td class="text-center">#10029</td>
                                        <td>January</td>
                                        <td>2021</td>
                                        <td class="fw-semibold">$32,000</td>
                                        <td>01-02-2021</td>
                                        <td> 
                                             <a class="btn btn-primary  btn-sm" data-bs-toggle="tooltip" data-original-title="View">
                                                <i class="fe fe-eye"></i>
                                             </a> 
                                             <a class="btn btn-success  btn-sm" data-bs-toggle="tooltip" data-original-title="Download">
                                                <i class="fe fe-download"></i>
                                             </a> 
                                    <a class="btn btn-info  btn-sm" data-bs-toggle="tooltip" data-original-title="Print" onclick="javascript:window.print();">
                                        <i class="fe fe-printer"></i>
                                    </a> 
                                    <a class="btn btn-warning  btn-sm" data-bs-toggle="tooltip" data-original-title="Share">
                                        <i class="fe fe-share-2"></i>
                                    </a> 
                                    </td>
                                 </tr>
                                </tbody>
                            </table> 
                                </div>
                            </div>
                            <div class="tab-pane fade" id="attendanceDet" role="tabpanel">
                                <div class="d-flex mb-4 hedings">
                                    <label class="main-content-label my-auto"><i class="si si-bell"></i> My Attendance Summary</label>
                                </div>
                             
                                <input type="hidden" id="attenSummary" value="<?php echo $attenSummary;?>" > 
                                <div class="table-responsive">
            <div id="emp-attendance_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                
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
                                
                            </div>
                            
                            <div class="tab-pane fade" id="changePass" role="tabpanel">
                                <div class="d-flex mb-4 hedings">
                                    <label class="main-content-label my-auto"><i class="ti-save-alt"></i> Reset Your Password</label>
                                </div>
                               <form id="resetYourPassword" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                   <input type="hidden" id="avrActionTarget"  value="<?php echo $avrActionTarget;?>"/>
                                   <input type="hidden" id="emp_id" name="emp_id"  value="<?php echo $employee->id;?>"/>
                                   <div class="row row-sm">
                                    <div class="col-12">
                                        <label>Previous Password:<span class="text-danger">*</span></label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="si si-settings"></i></span>
                                            </div>
                                            <input type="password" class="form-control" name="prePass" id="prePass">
                                        </div>
                                    </div>
                                   <div class="col-6">
                                        <label>New Password:<span class="text-danger">*</span></label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="si si-support"></i></span>
                                            </div>
                                            <input type="password" class="form-control" name="newPass" id="newPass">
                                        </div>
                                    </div>
                                    <div class="col-6">
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
		
		

<script src="<?php echo base_url('assets/js/admin/employee.js');?>"></script>
<script>
 var reportAppearance = '';
var miUrl = $('#base_url').val();
$(document).ready(function(){
    let searchObj = {};
    var target = $('#attenSummary').val();
    reportAppearance={printTable: function(search_data) { getpaginate(search_data, '#reportAppearance', target, 'Only For Id, Name.'); } }
    reportAppearance.printTable(searchObj);
	
	 $(".amiStl").click(function()
	 {
	 	let actNbtn=$(this).attr('id');
			if(actNbtn=='bnkDetBtn'){$('#viewBnkDetails').hide();$('#edtBnkDetails').show();$('#edtBnk').html('Edit Bank Details');}
			else if(actNbtn=='employeedata'){$('#viewProDet').hide();$('#editProDetails').show();$('#edtProDet').html('Edit Profile');}
			else if(actNbtn=='proDetBck'){$('#editProDetails').hide();$('#viewProDet').show();$('#edtProDet').html('Profile Details');}
			else if(actNbtn=='proBnkBck'){$('#edtBnkDetails').hide();$('#viewBnkDetails').show();$('#edtBnk').html('Bank Details');}
			
	   });
	 $(".arvChange").change(function () 
	 {
        let actNbtn=$(this).attr('id');
        let getResourceLoc=$('#base_url').val()+"software/setting/cityList";
		if(actNbtn=='state')
		 {
		 	$('#district').html('<option>Please Wait.....</option>');
			$('#district').css('color', '#099b7e !important');
          	$.post(getResourceLoc,{id:$('#'+actNbtn).val()},function(htmlAmi){$('#district').html(htmlAmi);$('#district').css('color','rgb(62, 62, 62) !important')});
        }
    });
	
	
});
$('#edProDetails').submit(function(e) {
    let base_url = $('#base_url').val();
    e.preventDefault();
    $.ajax({
        url: base_url + 'employee/profile/update',
        type: "POST",
        data: $(this).serialize(),
        dataType: 'json',
        beforeSend: function() { $('#savePersnlDet').html('<i class="fe fe-settings bx-spin"></i> Please Wait'); },
        complete: function() { $('#savePersnlDet').html('<i class="ti-save"></i> Save'); },
        success: function(htmlAmi) {
            toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
            if (htmlAmi.addClas == 'tst_success') {
                setTimeout(function() { window.location.reload(1); }, 2000);
            }
        }
    });
});

$('#edBnkDetails').submit(function(e) {
    let base_url = $('#base_url').val();
    e.preventDefault();
    $.ajax({
        url: base_url + 'employee/profile/bank_update',
        type: "POST",
        data: $(this).serialize(),
        dataType: 'json',
        beforeSend: function() { $('#saveBnkDet').html('<i class="fe fe-settings bx-spin"></i> Please Wait'); },
        complete: function() { $('#saveBnkDet').html('<i class="ti-save"></i> Save'); },
        success: function(htmlAmi) {
            toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
            if (htmlAmi.addClas == 'tst_success') {
                setTimeout(function() { window.location.reload(1); }, 2000);
            }
        }
    });
});




</script>

<!-- INTERNAL JQUERY-UI JS -->
<script src="<?php echo base_url();?>assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>
<!-- INTERNAL JQUERY.MASKEDINPUT JS -->
<script src="<?php echo base_url();?>assets/plugins/jquery.maskedinput/jquery.maskedinput.js"></script>
<!-- INTERNAL SPECTURM-COLORPICKER JS -->
<script src="<?php echo base_url();?>assets/plugins/spectrum-colorpicker/spectrum.js"></script>

<script src="<?php echo base_url();?>assets/js/form-elements.js"></script>
<!-- BOOTSTRAP-DATEPICKER JS -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<!-- INTERNAL JQUERY-SIMPLE-DATETIMEPICKER JS -->
<script src="<?php echo base_url();?>assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>






<script src="<?php echo base_url('assets/plugins/datatable/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/datatable/js/dataTables.bootstrap5.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/datatable/js/dataTables.buttons.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/datatable/js/buttons.bootstrap5.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/datatable/js/jszip.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/datatable/pdfmake/pdfmake.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/datatable/pdfmake/vfs_fonts.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/datatable/js/buttons.html5.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/datatable/js/buttons.print.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/datatable/js/buttons.colVis.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/datatable/dataTables.responsive.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/datatable/responsive.bootstrap5.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/table-data.js')?>"></script>		
	<style>
	#proBnkBck,#proDetBck{ margin-right:5px;}
.miSlwdth{width:90%;margin:-38px 0px 0px 35px !important;}	
.miSlctSpn{padding:11px 10px 11px 10px;}	
.eIcn{ color:#00A412;}	
.select2-container--default .select2-selection--single .select2-selection__rendered{color: #1c2e6f !important;}	
	
	
	
	
	.ami_tHeader{ background-color:#088;}
	.ami_tHeader > tr > th{ color:#FFFFFF !important;border: 1px solid #088 !important;padding: 12px 0px 12px 5px !important;}.ami_tHeader > tr{border: 1px solid #088 !important;}
	.bgPrsnt{ background-color:#0dcd94;}
	.bgLat{ background-color:#f34932;}
	.bgAbsnt{ background-color:#f7284a;}
	.bgHoliDy{ background-color:#0073d9;}
	.bgHfDy{ background-color:#e3b113;}
	
	
	
	.icnClr i{ font-size:.75rem; color:#A67D00;}
	
	.prodeRow{padding:8px 0px 8px 0px;border-bottom: 1px dashed #454545;margin: 0px 15px 0px 15px;}
	.detDrk{ font-weight:900; color:#0D3E73;}
	
	
	.prLst{ border-bottom:0px solid #fff;}
	
	.rounded-circle{ height:128px; width:128px}
	.miLbl span{ font-weight: bold;}
	
	.miPad{padding-left: 1.7rem !important;}
	
	
	.item1-links li{ cursor:pointer !important;}
	.hedings{border-bottom: 1px solid #f0f0f0;
  padding: 15px 0px 15px 15px;
  background-color: #318e3d;border-top-left-radius: 10px;
  border-top-right-radius: 10px;
  margin:-26px -24.5px 0px -24.5px;}
	.hedings label{color:#fff;}
	.hedings i{ padding:8px; background-color:#047713;border-radius: 10px;color: #fff;}
	</style>