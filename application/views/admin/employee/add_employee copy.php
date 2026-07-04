<div class="inner-body">
<div class="page-header">
		<div>
			<h2 class="main-content-title tx-24 mg-b-5">Staff</h2>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Profile</a></li>
				<li class="breadcrumb-item active" aria-current="page">Create New</li>
			</ol>
		</div>
		<div class="d-flex">
			<div class="justify-content-center">
				<button type="button" class="btn btn-white btn-icon-text my-2 me-2">
					<i class="fe fe-download me-2"></i> Import
				</button>
				<button type="button" class="btn btn-white btn-icon-text my-2 me-2">
					<i class="fe fe-filter me-2"></i> Filter
				</button>
				<button type="button" class="btn btn-primary my-2 btn-icon-text">
					<i class="fe fe-download-cloud me-2"></i> Download Report
				</button>
			</div>
		</div>
	</div>
	<style>
	.miBck a:hover{ background-color:#645bca; color:#fff;}
	.miBck{ font-weight:600;text-transform: uppercase; float:right;margin-right: 10px;}
	.miBck a{ border:1px solid #645bca;padding: 8px 12px 8px 12px;border-radius: 5px;color: #645bca;font-weight: bold;}
	.miLst{ font-weight:600;text-transform: uppercase;}
	.miLst i{ background-color: #645bca;padding: 10px;margin-right: 10px;border-radius: 20px;color: #fff;font-weight: bold;}
	.miHeader{padding:20px 15px 15px 15px;border-bottom:1px solid #cccece;margin:0px -10px 0px -10px;border-top-left-radius:5px;border-top-right-radius:5px;background-color: #fff;}
	.cardTtl{border:1px solid #cccece;padding:0px 0px 5px 0px;margin-bottom: 6rem;border-radius: 5px;/*background-color: #fff;*/border-bottom-right-radius:10px !important;border-bottom-left-radius:10px !important;}
	.card{ border-top-left-radius:0px;border-top-right-radius:0px; margin-bottom:-5px}
	.miSecn{ background-color:#645bca;margin: -15px 0px 15px 0px;padding: 10px;font-weight: 900;border-bottom: 1px solid #483ebd; color:#fff;}

	.miSecn i{ background-color:#fff; padding:5px; color:#645bca;border-radius: 10px;font-size: 10px;}
	
	</style>

	<!-- Row -->
	<div class="row row-sm">
		<div class="cardTtl">		
			<div class="miHeader">
				<span class="miLst"><i class="si si-people"></i>Employees</span>
				<span class="miBck"><a href="<?php echo base_url('admin/employee/manage_employee'); ?>"><i class="ti-arrow-left"></i></a></span>
			</div>

			<!-- Row -->
			<div class="row row-sm">
				<div class="col-lg-12 col-md-12 card custom-card">
						<div class="card-body">
                          <div id="frmRegister" style="">
							  <form id="add_employee_data" method="post" accept-charset="utf-8" enctype="multipart/form-data">
								<div class="row row-sm">
                                    <div class="miSecn" style="margin-top:0px;"> <i class="si si-user-follow"></i> Personal Details</div>
									<div class="col-md-6">
										<label>Employee Name : <span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-user"></i></span>
											</div>
											<input type="text" class="form-control" name="name" id="name" placeholder="Enter Name Here..">
										</div>
									</div>
                                    <div class="col-md-6">
										<label>Father Name : </label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-user"></i></span>
											</div>
											<input type="text" class="form-control" name="father_name" id="father_name" placeholder="Enter Father Name Here..">
										</div>
									</div>
                                    <div class="col-md-6">
										<label>Gender : <span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-user"></i></span>
											</div>
										<div class="miSlwdth">	
                                            <select name="gender" id="gender" class="form-control select2-with-search">
                                                <option value=""> Choose One </option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                            </select>
                                        </div>
										</div>
									</div>
									<div class="col-md-6">
										<label>Date of Birth: <span class="text-danger">*</span> </label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-clock"></i></span>
											</div>
											<input type="text" class="form-control fc-datepicker dtClean" placeholder="MM/DD/YYYY" name="dob" id="dob">
										</div>
									</div>
                                    <div class="col-md-6">
										<label>Mobile No. : <span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-mobile"></i></span>
											</div>
											<input type="text" class="form-control" name="contact_no" id="contact_no" placeholder="Enter Your Mobile No...." maxlength="10">
										</div>
									</div>
									<div class="col-md-6">
										<label>Email Id : <span class="text-danger">*</span> </label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-envelope"></i></span>
											</div>
											<input type="text" name="email" id="email" class="form-control" placeholder="Enter Your Email Here.." onchange="return get_email(this.value)">
										</div>
									</div>
                                    <div class="col-md-12">
										<label>Address : <span class="text-danger">*</span> </label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-map"></i></span>
											</div>
											<textarea type="text" name="address" id="address" class="form-control" placeholder="Please Enter Your Address..."></textarea>
										</div>
									</div>
                                    <div class="col-md-6">
										<label>Nationality : </label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-flag"></i></span>
											</div>
											<input type="text" name="nationality" id="nationality" class="form-control" placeholder="Enter Your Nationality Here..">
										</div>
									</div>
                                    <div class="col-md-6">
										<label>Refrence Person Name : </label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-user"></i></span>
											</div>
											<input type="text" name="reference_person_name" id="reference_person_name" class="form-control" placeholder="Enter Reference Person Name..">
										</div>
									</div>
                                    <div class="col-md-6">
										<label>Reference Person Mobile No. : </label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-mobile"></i></span>
											</div>
											<input type="text" name="reference_person_number" id="reference_person_number" class="form-control" maxlength="10">
										</div>
									</div>
									<div class="col-md-6">
										<label>Marital Status : </label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-user"></i></span>
											</div>
										<div class="miSlwdth">
                                        	<select name="marital_status" id="marital_status" class="form-control select2-with-search">
												<option value=""> --- Select One --- </option>
												<option value="1">Married</option>
												<option value="2">UnMarried</option>
											</select>
                                        </div>
										</div>
									</div>
									<div class="col-md-6">
										<label>Profile Photo : </label>
                                        <div class="input-group file-browser">
                                            <input type="text" class="form-control border-end-0 browse-file" id="empImgSrc" name="empImgSrc" placeholder="Choose file" readonly="">
                                            <label class="input-group-btn">
                                                <span class="btn btn-outline-success">
                                                 <i class="fas fa-image"></i>   Browse <input type="file" style="display:none;" name="image" id="image"> 
                                                </span>
                                            </label>
                                        </div>
                                     </div>
									<div class="col-md-6">
										<label>User Type : <span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-user"></i></span>
											</div>
										<div class="miSlwdth">	
                                            <select name="user_type" id="user_type" class="form-control select2-with-search">
												<option value=""> --- Select One --- </option>
												<option value="1">Admin</option>
												<option value="2">Employee</option>
											</select>
                                        </div>    
										</div>
									</div>
									<div class="miSecn" style="margin-top:20px;"> <i class="si si-event"></i> company Details</div>
									<div class="col-md-6">
										<label>Employee ID:</label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-hashtag"></i></span>
											</div>
											<input type="text" name="employee_id" id="employee_id" class="form-control" placeholder="Auto Generated" value="<?php echo $empID;?>" readonly>
										</div>
									</div>
                                    <div class="col-md-3">
										<label>Biometric ID(8 Digit) : <span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-fingerprint"></i></span>
											</div>
											<input type="text" name="bioMtric" id="bioMtric" class="form-control" placeholder="00000000">
										</div>
									</div>
                                    <div class="col-md-3">
										<label>Date of Joining : <span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-calendar-plus"></i></span>
											</div>
											<input type="text" name="date_of_joining" id="date_of_joining" class="form-control fc-datepicker dtClean" placeholder="MM/DD/YYYY">
										</div>
									</div>
                                    <div class="col-md-6">
										<label>Branch: <span class="text-danger">*</span> </label>
										<div class="input-group mb-3">
											<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-building"></i></span></div>
                                            <div class="miSlwdth">	
                                                <select name="branch" id="branch" class="form-control select2-with-search">
                                                    <option value=""> --- Select Branch --- </option>
                                                    <?php foreach($branch as $brnch){?>
                                                        <option value="<?php echo $brnch->id;?>"><?php echo $brnch->branch_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
										</div>
									</div>
									<div class="col-md-6">
										<label>Department : <span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-building"></i></span>
											</div>
									<div class="miSlwdth">	
                                        <select name="department" id="department" class="form-control select2-with-search">
                                            <option value=""> --- Select Department --- </option>
                                            <?php foreach($department as $deprt){  ?>
                                                <option value="<?php echo $deprt['id']; ?>"><?php echo $deprt['department_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
										</div>
									</div>
									<div class="col-md-6">
										<label>Designation : <span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-briefcase"></i></span>
											</div>
										<div class="miSlwdth">	
                                            <select name="designation" id="designation" class="form-control select2-with-search arvChange" data-id="salary_amount">
												<option value=""> --- Select Department First ---</option>
												<?php foreach($designation as $desig) { ?>
													<option value="<?php echo $desig['id'] ?>"><?php echo $desig['designation_name'] ?></option>
												<?php } ?>
											</select>
                                       </div>
										</div>
									</div>
									<div class="col-md-6">
										<label>Shift : <span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-clock"></i></span>
											</div>
										<div class="miSlwdth">	
                                            <select name="shift" id="shift" class="form-control select2-with-search">
												<option value=""> --- Select Shift --- </option>
												<?php foreach($shift as $sft){ ?>
													<option value="<?php echo $sft['id']; ?>">
														<?php echo $sft['shift_name']."(".$sft['shift_start']." - ".$sft['shift_end'].")" ?></option>
												<?php } ?>
											</select>
                                       </div>     
										</div>
									</div>
									<div class="col-md-6">
										<label>Status : <span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-smile"></i></span>
											</div>
										 <div class="miSlwdth">	
                                            <select name="status" id="status" class="form-control select2-with-search">
												<option value="1">Active</option>
												<option value="2">De-active</option>
											</select>
                                         </div>
										</div>
									</div>
                                    <div class="col-md-3">
										<label>Qualification : <span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="si si-book-open"></i></span>
											</div>
											<input type="text" name="qualification" id="qualification" class="form-control">
										</div>
									</div>
									<div class="col-md-3">
										<label>Work Exprience (In Month) : <span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="si si-equalizer"></i></span>
											</div>
											<input type="text" name="work_exp" id="work_exp" class="form-control">
										</div>
									</div>
									<div class="miSecn" style="margin-top:20px;"><i class="si si-wallet"></i> Financial Details</div>
									<div class="col-md-6">
										<label>Salary Type : </label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-money-bill"></i></span>
											</div>
										<div class="miSlcustomWdth">	
                                            <select name="salary_type" id="salary_type" class="form-control select2-with-search arvChange" data-id="salary_amount">
												<option value=""> --- Select One --- </option>
												<option value="1">Daily</option>
												<option value="2">Weekly</option>
												<option value="3">Monthly</option>
											</select>
                                        </div>
										</div>
									</div>
									<div class="col-md-6">
										<label>Salary Amount : </label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-money-bill"></i></span>
											</div>
											<input type="text" name="salary_amount" id="salary_amount" class="form-control">
                                            <input type="hidden" name="salID" id="salID">
										</div>
									</div>
									<div class="miSecn" style="margin-top:20px;"><i class="pe-7s-culture"></i> Bank Account Details</div>
									<div class="col-md-4">
										<label>Account Holder Name : </label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-user"></i></span>
											</div>
											<input type="text" name="holder_name" id="holder_name" class="form-control" placeholder="Enter Account Holder Name Here..">
										</div>
									</div>
									<div class="col-md-4">
										<label>Account Number :</label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-hashtag"></i></span>
											</div>
											<input type="text" name="bank_account_no" id="bank_account_no" class="form-control" placeholder="Enter Account No. Here..">
										</div>
									</div>
									<div class="col-md-4">
										<label>IFSC Code :</label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-hashtag"></i></span>
											</div>
											<input type="text" name="ifsc_code" id="ifsc_code" class="form-control" placeholder="Enter IFSC Code Here..">
										</div>
									</div>
									<div class="col-md-6">
										<label>Bank Name :</label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-building"></i></span>
											</div>
											<input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Enter Bank Name Here..">
										</div>
									</div>
									<div class="col-md-6">
										<label>Branch :</label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-building"></i></span>
											</div>
											<input type="text" name="bank_branch" id="bank_branch" class="form-control" placeholder="Enter Branch Name Here..">
										</div>
									</div>									
									<div class="miSecn" style="margin-top:20px;"><i class="fe fe-settings"></i> Account Login Details</div>
									<div class="col-md-6">
										<label>User Name :</label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-envelope"></i></span>
											</div>
											<input type="text" name="user_name" id="user_name" class="form-control" readonly>
										</div>
									</div>
									<div class="col-md-6">
										<label>Password : <span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-key"></i></span>
											</div>
											<input type="password" name="password" id="password" class="form-control" placeholder="Enter Password Here..">
										</div>
									</div>
									<div class="col-md-12">
										<button class="btn ripple btn-outline-success pull-right amiStl" id="adEmployeeDetails" type="submit">
                                        	<i class="ti-save"></i> Submit
                                        </button>
									</div>
								</div>
							  </form>
                          </div>  
                          <div id="fnlSuccess" style="display:none;">
                          	  <div class="row">
                              	<div class="col-lg-3 col-md-4">
                                	<div id="userPr"style="border-radius:1rem;">
                                      <div class="radhe_1">	
                                        <img src="http://localhost/attendance/uploads/employee/admin.jpg" alt="@mi Singh">
                                      </div>
                                      <ul>
                                      	<li class="radhe"><i class="ti-user icon1 radhe_2"></i>&nbsp;&nbsp;Member Id</li>
                                        <li class="radhe"><i class="ti-user icon1 radhe_2"></i>&nbsp;&nbsp;Member Name <span id="#empName">&nbsp;</span></li>
                                        <li class="radhe"><i class="ti-user icon1 radhe_2"></i>&nbsp;&nbsp;Mobile Number</li>
                                        <li class="radhe"><i class="ti-user icon1 radhe_2"></i>&nbsp;&nbsp;Email Id</li>
                                        <li class="radhe"><i class="ti-user icon1 radhe_2"></i>&nbsp;&nbsp;Password</li>
                                      </ul>
                                    </div>
                            	</div>
                                <div class="col-lg-9 col-md-8">
                                   <!-- *******************************************************************  -->
							       <div class="" style="border:2px solid #24e374;border-radius: 0.5rem;background-color:#19b159;">
								   <p style="margin-top:1rem;"><span class="float-left heading-icon"><i class="si si-user"></i></span><span class="heading-text">&nbsp;&nbsp;&nbsp;Personal Details</span></p>
								   </div>

								   <div class="miSecn" style="margin-top:0px;"> <i class="si si-user-follow"></i> Personal Details</div>


								   <div class="row"style="padding:0.5rem;">
								   <div class="col-md-6 mt-2">
										<label>Employee Name : <span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<!-- <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name Here.."> -->
											<span type="text" class="form-control" name="name" id="name"placeholder="Enter Name Here..">&nbsp;</span>
										</div>
									</div>
                                    <div class="col-md-6 mt-2">
										<label>Father Name : </label>
										<div class="input-group mb-3">
											<input type="text" class="form-control" name="father_name" id="father_name" placeholder="Enter Father Name Here..">
										</div>
									</div>
									<div class="col-md-6 mt-2">
										<label>Date of Birth: <span class="text-danger">*</span> </label>
										<div class="input-group mb-3">
											<input type="text" class="form-control fc-datepicker dtClean hasDatepicker" placeholder="MM/DD/YYYY" name="dob" id="dob">
										</div>
									</div>
                                    <div class="col-md-6 mt-2">
										<label>Mobile No. : <span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<input type="text" class="form-control" name="contact_no" id="contact_no" placeholder="Enter Your Mobile No...." maxlength="10">
										</div>
									</div>
									<div class="col-md-6 mt-2">
										<label>Email Id : <span class="text-danger">*</span> </label>
										<div class="input-group mb-3">
											<input type="text" name="email" id="email" class="form-control" placeholder="Enter Your Email Here.." onchange="return get_email(this.value)">
										</div>
									</div>

									<div class="col-md-6 mt-2">
										<label>Gender : <span class="text-danger">*</span></label>
										<div class="input-group mb-3">
										<div class="miSlwdth">	
                                            <select name="user_type" id="user_type" class="form-control select2-with-search select2-hidden-accessible" tabindex="-1" aria-hidden="true">
											<option value=""> Choose One </option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
											</select>
                                        </div>    
										</div>
									</div>

									
                                 
                                    <div class="col-md-6 mt-2">
										<label>Nationality : </label>
										<div class="input-group mb-3">
											<input type="text" name="nationality" id="nationality" class="form-control" placeholder="Enter Your Nationality Here..">
										</div>
									</div>
                                    <div class="col-md-6 mt-2">
										<label>Refrence Person Name : </label>
										<div class="input-group mb-3">
											<input type="text" name="reference_person_name" id="reference_person_name" class="form-control" placeholder="Enter Reference Person Name..">
										</div>
									</div>
                                    <div class="col-md-6 mt-2">
										<label>Reference Person Mobile No. : </label>
										<div class="input-group mb-3">
											<input type="text" name="reference_person_number" id="reference_person_number" class="form-control" maxlength="10">
										</div>
									</div>
								
								
									<div class="col-md-6 mt-2">
										<label>User Type : <span class="text-danger">*</span></label>
										<div class="input-group mb-3">
										<div class="miSlwdth">	
                                            <select name="user_type" id="user_type" class="form-control select2-with-search select2-hidden-accessible" tabindex="-1" aria-hidden="true">
												<option value=""> --- Select One --- </option>
												<option value="1">Admin</option>
												<option value="2">Employee</option>
											</select>
                                        </div>    
										</div>
									</div>

									<div class="col-md-12 mt-2">
										<label>Address : <span class="text-danger">*</span> </label>
										<div class="input-group mb-3">
											<textarea type="text" name="address" id="address" class="form-control" placeholder="Please Enter Your Address..."></textarea>
										</div>
									</div>
									
									
									<div class="col-md-12">
										<button class="btn ripple btn-outline-success pull-right amiStl" id="adEmployeeDetails" type="submit">
                                        	<i class="ti-save"></i> Submit
                                        </button>
									</div>
								   </div>
								   
                                   <!-- *******************************************************************  -->
                                </div>
                              </div>
                          </div>
						</div>
					</div>
			</div>
			<!-- End Row -->
		</div>
	</div>
	<!-- End Row -->
</div>
					
<style>
#userPr{ border:1px solid #e8e8e8;background-color: #f7f7f7;}
#userPr div{ text-align:center;}
#userPr img{ height:180px; width:180px; border-radius:10px;margin: 40px;}
#userPr ul{ list-style:none;margin-left: -30px;margin-bottom: 0px;}
#userPr ul li{ padding:10px; border-bottom:1px dashed #ddd}
#userPr ul li:last-child{ border-bottom:0px solid #000;}
	#amiResult{/*background-color:#f0f0f0;border: 1px solid #e3e2e3;*/margin-bottom:15px;padding:10px 0px 10px 0px;height: 64rem;}
	.testingAMi{background-color: #018888;padding: 10px;margin: 10px;text-align: center;color: bisque;font-weight: bold;}
	.amiProcess{ text-align:center;margin:auto;}
	.miSlwdth{width:92.20%;}
	/*.miSlwdthSml{ width:80%;}*/
	.miSlcustomWdth{width:91.5%;}
	.radhe:hover{border-left: 3px solid #7e77d1;color:#4f46b1;border-bottom:3px solid #7e77d1;border-radius: 0.5rem;margin-top: 0.3rem;}
	.radhe_1{ border-top: 5px solid #4f46b1;border-radius: 1rem;}
	.radhe_2{color:#4f46b1;font-size:13px;}
	 .heading-text{color:white;font-weight: 600;}
	 .heading-icon{border:1px solid #8cd98c;border-radius: 20%;padding: 0.5rem;margin-top: 12rem;margin-left: 1rem;background-color: #66dd66;}
	 .heading-r-icon{padding: 0.5rem;margin-right:1.5rem;background-color: #66dd66;border:1px solid #8cd98c;border-radius: 20%;}
	@media (max-width: 768px){.miSlwdth{width:85.7%;}.miSlcustomWdth{width:83%;}}
	
	
	
	
	
	
</style>
<script src="<?php echo base_url() ?>assets/js/admin/employee.js"></script>





					
					
					
					
					
					