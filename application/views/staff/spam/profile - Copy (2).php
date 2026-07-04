	<div class="inner-body">

			
			<!-- Page Header -->
			<div class="page-header">
				<div>
					<h2 class="main-content-title tx-24 mg-b-5">Profile</h2>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
						<li class="breadcrumb-item active" aria-current="page">Profile</li>
					</ol>
				</div>
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
											<a data-bs-target="#trackorder" class="nav-link" data-bs-toggle="tab" role="tablist">
												<i class="si si-plane icon1"></i> Leave Details
											</a>
										</li>
										
										<li class="nav-item">
											<a data-bs-target="#wallet" class="nav-link" data-bs-toggle="tab" role="tablist">
												<i class="ti-wallet icon1"></i> Payroll Details
											</a>
										</li>
										<li class="nav-item">
											<a data-bs-target="#profile" class="nav-link" data-bs-toggle="tab" role="tablist">
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
													<label class="main-content-label my-auto"><i class="si si-user"></i> Personal Details</label>
												</div>
												<div class="row">
												<?php 
														if($employee->gender=='1'){$genIcn='si si-user';}else if($employee->gender=='2'){$genIcn='si si-user-female';}
														else{$genIcn='si si-emotsmile';}
												?>
												
													<div class="col-6">
														<div class="form-floating mb-3 miClr miLbl">
															<span class="form-control miPad"><?php echo 'EMP'.$employee->employee_id;?> </span>
															<label for="empId"><i class="si si-support "></i> Employee Id.</label>
														</div>
													</div>
													<div class="col-6">
														<div class="form-floating mb-3 miClr miLbl">
															<span class="form-control miPad"><?php echo date('d-m-Y',strtotime($employee->dob));?> </span>
															<label for="empName"><i class="si si-event"></i> Date of birth.</label>
														</div>
													</div>
													<div class="col-6">
														<div class="form-floating mb-3 miClr miLbl">
															<span class="form-control miPad"><?php echo $employee->name;?> </span>
															<label for="empName"><i class="<?php echo $genIcn;?>"></i> Employee Name.</label>
														</div>
													</div>
													<div class="col-6">
														<div class="form-floating mb-3 miClr miLbl">
															<span class="form-control miPad"><?php echo $employee->father_name;?> </span>
															<label for="empName"><i class="si si-user"></i> Father's Name.</label>
														</div>
													</div>
													<div class="col-6">
														<div class="form-floating mb-3 miClr miLbl">
															<span class="form-control miPad"><?php echo $employee->contact_no;?> </span>
															<label for="empName"><i class="si si-screen-smartphone"></i> Contact Number.</label>
														</div>
													</div>
													<div class="col-6">
														<div class="form-floating mb-3 miClr miLbl">
															<span class="form-control miPad"><?php echo $employee->email;?> </span>
															<label for="empName"><i class="si si-envelope"></i> Email Id.</label>
														</div>
													</div>
													<div class="col-6">
														<div class="form-floating mb-3 miClr miLbl">
															<span class="form-control miPad">
																<?php if($employee->marital_status=='1'){echo 'Married';}else{echo 'Un-Married';}?> 
															</span>
															<label for="empName"><i class="si si-badge"></i> Marital Status.</label>
														</div>
													</div>
													<div class="col-6">
														<div class="form-floating mb-3 miClr miLbl">
															<span class="form-control miPad"><?php echo $employee->nationality;?> </span>
															<label for="empName"><i class="si si-flag"></i> Nationality.</label>
														</div>
													</div>
												    <div class="col-md-12">
														<button class="btn ripple btn-outline-success pull-right amiStl" id="employeedata"><i class="ti-save"></i> Edit</button>
													</div>
												</div>
											</div>
											<div class="tab-pane fade" id="bankAcDet" role="tabpanel">
											    <div class="d-flex mb-4 hedings">
													<label class="main-content-label my-auto"><i class="ti-save-alt"></i> Bank Account Details</label>
												</div>
											
												
												<?php print_r($employee);?>
												<div class="row">
													<div class="col-6">
														<div class="form-floating mb-3 miClr miLbl">
															<span class="form-control miPad"><?php echo $employee->bank_name;?> </span>
															<label for="bnkNm"><i class="pe-7s-culture"></i> Bank Name.</label>
														</div>
													</div>
													<div class="col-6">
														<div class="form-floating mb-3 miClr miLbl">
															<span class="form-control miPad"><?php echo $employee->bank_account_no;?> </span>
															<label for="bnkAcc"><i class="si si-screen-desktop"></i> Account Number.</label>
														</div>
													</div>
													<div class="col-6">
														<div class="form-floating mb-3 miClr miLbl">
															<span class="form-control miPad"><?php echo $employee->bank_branch;?> </span>
															<label for="bnkAcc"><i class="si si-screen-desktop"></i> Branch Name.</label>
														</div>
													</div>
													<div class="col-6">
														<div class="form-floating mb-3 miClr miLbl">
															<span class="form-control miPad"><?php echo $employee->ifsc_code;?> </span>
															<label for="bnkAcc"><i class="si si-screen-desktop"></i> IFSC CODE.</label>
														</div>
													</div>
													
													 <div class="col-md-12">
														<button class="btn ripple btn-outline-success pull-right amiStl" id="employeedata"><i class="ti-save"></i> Edit</button>
													</div>
												</div>
											</div>
											<div class="tab-pane fade" id="trackorder" role="tabpanel">
												<h6 class="mb-4">ORDER ID: <b>OD45345345435</b></h6>
												<div class="card">
													<div class="card-body row">
														<div class="col-sm-12 col-md-3 mb-3 mb-md-0"> <strong>Estimated Delivery time:</strong> <br>29 Dec 2020 </div>
														<div class="col-sm-12 col-md-3 mb-3 mb-md-0"> <strong>Shipping BY:</strong> <br> BLUEDART, | <i class="fa fa-phone"></i> +1598675986 </div>
														<div class="col-sm-12 col-md-3 mb-3 mb-md-"> <strong>Status:</strong> <br> Picked by the courier </div>
														<div class="col-sm-12 col-md-3"> <strong>Tracking #:</strong> <br> BD045903594656 </div>
													</div>
												</div>
												<div class="track mb-5">
													<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text d-none d-md-block">Order confirmed</span> </div>
													<div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text d-none d-md-block"> Picked by courier</span> </div>
													<div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text d-none d-md-block"> On the way </span> </div>
													<div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text d-none d-md-block">Ready for pickup</span> </div>
												</div>
												<br>
												<div class="row mt-3">
													<div class="col-xl-4">
														<figure class="itemside mb-3">
															<div class="aside"><img src="../assets/img/pngs/19.png" class="img-sm product-image border" alt="product-img"></div>
															<figcaption class="info align-self-center">
																<p class="title mb-1">Apple iPhone(Black, 128 GB) <br> 8GB RAM</p> <span class="text-muted">$950 </span>
															</figcaption>
														</figure>
													</div>
													<div class="col-xl-4">
														<figure class="itemside mb-3">
															<div class="aside"><img src="../assets/img/pngs/16.png" class="img-sm product-image border" alt="product-img"></div>
															<figcaption class="info align-self-center">
																<p class="title mb-1">Designer Hand Decorative <br> flower Pot </p><span class="text-muted">$850 </span>
															</figcaption>
														</figure>
													</div>
													<div class="col-xl-4">
														<figure class="itemside mb-3">
															<div class="aside"><img src="../assets/img/pngs/14.png" class="img-sm product-image border" alt="product-img"></div>
															<figcaption class="info align-self-center">
																<p class="title mb-1">Regular waterproof <br>(24 L) Backpack</p> <span class="text-muted">$650 </span>
															</figcaption>
														</figure>
													</div>
												</div>
											</div>
											
											<div class="tab-pane fade" id="wallet" role="tabpanel">
												<div class="border p-4 text-center">
													<span class="text-uppercase tx-14 mt-4 text-muted">Available</span>
													<h1 class="my-3">$245465</h1>
													<a href="javascript:void(0);" class="btn btn-primary"><i class="fe fe-plus"></i> Add Money</a>
												</div>
												<ul class="list-group tx-13">
													<li class="list-group-item border-top-0 pd-x-5 pd-sm-x-0 d-flex justify-content-between">
														<div class="d-flex">
															<span class="crypto-icon bg-primary-transparent me-3"><i class="fe fe-arrow-down-left text-primary"></i></span>
															<span class="my-auto font-weight-semibold tx-15">Received</span>
														</div>
														<span class="font-weight-semibold my-auto text-success tx-15">+0.00004564</span>
													</li>
													<li class="list-group-item pd-x-5 pd-sm-x-0 d-flex justify-content-between">
														<div class="d-flex">
															<span class="crypto-icon bg-primary-transparent me-3"><i class="fe fe-arrow-up-right text-primary"></i></span>
															<span class="my-auto font-weight-semibold tx-15">Sent</span>
														</div>
														<span class="font-weight-semibold my-auto text-danger tx-15">-0.03445436</span>
													</li>
													<li class="list-group-item pd-x-5 pd-sm-x-0 d-flex justify-content-between">
														<div class="d-flex">
															<span class="crypto-icon bg-primary-transparent me-3"><i class="fe fe-arrow-down-left text-primary"></i></span>
															<span class="my-auto font-weight-semibold tx-15">Received</span>
														</div>
														<span class="font-weight-semibold my-auto text-success tx-15">+4.2543</span>
													</li>
													<li class="list-group-item pd-x-5 pd-sm-x-0 d-flex justify-content-between">
														<div class="d-flex">
															<span class="crypto-icon bg-primary-transparent me-3"><i class="fe fe-arrow-up-right text-primary"></i></span>
															<span class="my-auto font-weight-semibold tx-15">Sent</span>
														</div>
														<span class="font-weight-semibold my-auto text-danger tx-15">+0.00255423</span>
													</li>
													<li class="list-group-item pd-x-5 pd-sm-x-0 d-flex justify-content-between">
														<div class="d-flex">
															<span class="crypto-icon bg-primary-transparent me-3"><i class="fe fe-arrow-down-left text-primary"></i></span>
															<span class="my-auto font-weight-semibold tx-15">Received</span>
														</div>
														<span class="font-weight-semibold my-auto text-success tx-15">-0.02434525</span>
													</li>
												</ul>
											</div>
											<div class="tab-pane fade" id="profile" role="tabpanel">
												<div class="d-flex align-items-start pb-3 border-bottom"> <img src="../assets/img/users/1.jpg" class="img rounded-circle avatar-xl" alt="">
													<div class="ps-sm-4 ps-2" id="img-section"> <b>Profile Photo</b>
														<p class="mb-1">Accepted file type .png. Less than 1MB</p> <button class="btn button border btn-sm"><b>Upload</b></button>
													</div>
												</div>
												<div class="py-2">
													<div class="row py-2">
														<div class="col-md-6"> <label id="firstname">First Name</label> <input type="text" class="form-control" placeholder="Steve"> </div>
														<div class="col-md-6 pt-md-0"> <label id="last-name" class="mg-t-7 mg-md-t-0">Last Name</label> <input type="text" class="form-control" placeholder="Smith"> </div>
													</div>
													<div class="row py-2">
														<div class="col-md-6"> <label id="emailid">Email Address</label> <input type="text" class="form-control" placeholder="steve_@email.com"> </div>
														<div class="col-md-6 pt-md-0"> <label id="phoneno" class="mg-t-7 mg-md-t-0">Phone Number</label> <input type="number" class="form-control" placeholder="+1 213-548-6015"> </div>
													</div>
													<div class="row py-2">
														<div class="col-md-6">
															<label for="country">Country</label>
															<select name="country" id="country" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
																<option value="india" selected="">India</option>
																<option value="usa">USA</option>
																<option value="uk">UK</option>
																<option value="uae">UAE</option>
															</select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-country-container"><span class="select2-selection__rendered" id="select2-country-container" title="India">India</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
														</div>
														<div class="col-md-6 pt-md-0" id="lang"> <label for="language" class="mg-t-7 mg-md-t-0">Language</label>
															<div class="arrow">
																<select name="language" id="language" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
																	<option value="english" selected="">English</option>
																	<option value="english_us">English (United States)</option>
																	<option value="enguk">English UK</option>
																	<option value="arab">Arabic</option>
																</select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-language-container"><span class="select2-selection__rendered" id="select2-language-container" title="English">English</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
		</div>
	<style>
	.rounded-circle{ height:128px; width:128px}
	.miLbl span{ font-weight: bold;}
	
	.miPad{padding-left: 1.7rem !important;}
	
	
	.item1-links li{ cursor:pointer !important;}
	.hedings{border-bottom: 1px solid #f0f0f0;
  padding: 15px 0px 15px 15px;
  background-color: #f7f7f7;border-top-left-radius: 10px;
  border-top-right-radius: 10px;
  margin:-26px -24.5px 0px -24.5px;}
	.hedings label{color:#665dd0;}
	.hedings i{ padding:8px; background-color:#665dd0;border-radius: 10px;color: #fff;}
	</style>