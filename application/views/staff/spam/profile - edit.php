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
												<img src="../assets/img/users/1.jpg" class="rounded-circle" alt="user">
											</div>
											<a href="javascript:void(0);" class="text-dark"><h5 class="mt-3 mb-0 font-weight-semibold">Sonia Taylor</h5></a>
										</div>
									</div>
									<ul class="item1-links nav nav-tabs  mb-0">
										<li class="nav-item">
											<a data-bs-target="#personalDetails" class="nav-link active" data-bs-toggle="tab" role="tablist">
												<i class="ti-user icon1"></i> Personal Details
											</a>
										</li>
										<li class="nav-item">
											<a data-bs-target="#myaddres" class="nav-link" data-bs-toggle="tab" role="tablist">
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
													<div class="col-6">
                            <label>Name:<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $upd_emp['id']; ?>">
                                <input type="text" class="form-control" name="name" id="name" value="<?php echo $upd_emp['name'] ?>">
                            </div>
                        </div>
													<div class="col-6">
														<label>Father Name:</label>
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="fas fa-user"></i></span>
															</div>
															<input type="text" class="form-control" name="father_name" id="father_name" value="<?php echo $upd_emp['father_name'] ?>">
														</div>
													</div>
													<div class="col-6">
														<label>Date of Birth:<span class="text-danger">*</span></label>
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="fas fa-clock"></i></span>
															</div>
															<input type="date" class="form-control" name="dob" id="dob" value="<?php echo $upd_emp['dob'] ?>">
														</div>
													</div>
													<div class="col-6">
														<label>Gender:<span class="text-danger">*</span></label>
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="fas fa-user"></i></span>
															</div>
															<select class="form-control" name="gender" id="gender">
																<option value=""> --- Select Gnder --- </option>
																<option value="1" <?php echo ($upd_emp['gender'] == 1) ? "Selected" : ""; ?>>Male</option>
																<option value="2" <?php echo ($upd_emp['gender'] == 2) ? "Selected" : ""; ?>>Female</option>
															</select>
														</div>
													</div>
													<div class="col-6">
														<label>Mobile No.:<span class="text-danger">*</span></label>
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="fas fa-mobile"></i></span>
															</div>
															<input type="number" class="form-control" name="contact_no" id="contact_no" value="<?php echo $upd_emp['contact_no'] ?>">
														</div>
													</div>
													<div class="col-6">
														<label>Email Id:<span class="text-danger">*</span></label>
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="fas fa-envelope"></i></span>
															</div>
															<input type="email" name="email" id="email" class="form-control" value="<?php echo $upd_emp['email'] ?>" onchange="return get_email(this.value)">
														</div>
													</div>
													<div class="col-6">
														<label>Address:<span class="text-danger">*</span></label>
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="fas fa-map"></i></span>
															</div>
															<textarea type="text" name="address" id="address" class="form-control"><?php echo $upd_emp['address'] ?></textarea>
														</div>
													</div>
													<div class="col-6">
														<label>Nationality:</label>
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="fas fa-flag"></i></span>
															</div>
															<input type="text" name="nationality" id="nationality" class="form-control" value="<?php echo $upd_emp['nationality'] ?>">
														</div>
													</div>
													<div class="col-6">
														<label>Refrence Person Name:</label>
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="fas fa-user"></i></span>
															</div>
															<input type="text" name="reference_person_name" id="reference_person_name" class="form-control" value="<?php echo $upd_emp['reference_person_name'] ?>">
														</div>
													</div>
													<div class="col-6">
														<label>Reference Person Mobile No.:</label>
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="fas fa-mobile"></i></span>
															</div>
															<input type="number" name="reference_person_number" id="reference_person_number" class="form-control" value="<?php echo $upd_emp['reference_person_number'] ?>">
														</div>
													</div>
													<div class="col-6">
														<label>Marital Status:</label>
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="fas fa-user"></i></span>
															</div>
															<select name="marital_status" id="marital_status" class="form-control">
																<option value=""> --- Select One --- </option>
																<option value="1" <?php echo ($upd_emp['marital_status'] == 1) ? "Selected" : "" ; ?>>Married</option>
																<option value="2" <?php echo ($upd_emp['marital_status'] == 2) ? "Selected" : ""; ?>>UnMarried</option>
															</select>
														</div>
													</div>
												</div>
											</div>
											<div class="tab-pane fade" id="myaddres" role="tabpanel">
												<button type="button" class="btn btn-round btn-success mb-3"><i class="fe fe-plus-circle mt-1 me-2"></i>Add New Address</button>
												<div class="row">
													<div class="col-lg-12 col-xl-6">
														<div class="card custom-card border mb-lg-0">
															<div class="card-header pb-3">
																<h6 class="mb-0"><i class="ti-home me-2"></i>Default Address</h6>
															</div>
															<div class="card-body">
																<p>+91 08023310451</p>
																<p>3-15/10/403 Newark, Street no 5, Next To Pizza Hut,  Bangalore,  Karnataka, 560003, India.</p>
																<p class="mb-0">soniataylor344@example.com</p>
															</div>
															<div class="card-footer">
																<div class="row">
																	<div class="col-6">
																		<button type="button" class="btn btn-block btn-primary mb-1"><i class="ti ti-pencil"></i></button>
																	</div>
																	<div class="col-6">
																		<button type="button" class="btn btn-block btn-outline-primary mb-1"><i class="ti ti-trash"></i></button>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-lg-12 col-xl-6">
														<div class="card custom-card border mb-0">
															<div class="card-header pb-3">
																<h6 class="mb-0"><i class="ti-home me-2"></i>Office Address</h6>
															</div>
															<div class="card-body">
																<p>+91 02228346362</p>
																<p>2-15A-12  , Steriling Chambers, S Radhakrishnana Marg, J B Nagar, Andheri (west), Mumbai , Maharashtra</p>
																<p class="mb-0">john54@gmail.com</p>
															</div>
															<div class="card-footer">
																<div class="row">
																	<div class="col-6">
																		<button type="button" class="btn btn-block btn-primary mb-1"><i class="ti ti-pencil"></i></button>
																	</div>
																	<div class="col-6">
																		<button type="button" class="btn btn-block btn-outline-primary mb-1"><i class="ti ti-trash"></i></button>
																	</div>
																</div>
															</div>
														</div>
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
	.item1-links li{ cursor:pointer !important;}
	.hedings{border-bottom: 1px solid #f0f0f0;
  padding: 15px 0px 15px 15px;
  background-color: #f7f7f7;border-top-left-radius: 10px;
  border-top-right-radius: 10px;
  margin:-26px -24.5px 0px -24.5px;}
	.hedings label{color:#665dd0;}
	.hedings i{ padding:8px; background-color:#665dd0;border-radius: 10px;color: #fff;}
	</style>