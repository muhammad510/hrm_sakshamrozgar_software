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
				<a href="<?php echo base_url('admin/employee/manages');?>" class="btn btn-success btn-icon-text my-2 me-2"  title="View Employees"> <i class="si si-list"></i> All Employee </a>
              <button type="button" class="btn btn-primary btn-icon-text my-2 me-2" id="miArvClk"  title="Current Time"> <i class="fe fe-filter me-2"></i> Current Time </button>
              <a href="<?php echo base_url('auth/login/signout');?>" class="btn btn-danger btn-icon-text  my-2 me-2"  title="Sign Out">
                  <i class="fe fe-power me-2"></i> Sign Out
              </a>
			</div>
		</div>
	</div>
<style>
.miBck a:hover{ background-color:#645bca; color:#fff;}.miBck{ font-weight:600;text-transform: uppercase; float:right;margin-right: 10px;}.miBck a{ border:1px solid #645bca;padding: 8px 12px 8px 12px;border-radius: 5px;color: #645bca;font-weight: bold;}
.miLst{ font-weight:600;text-transform: uppercase;}.miLst i{ background-color: #645bca;padding: 10px;margin-right: 10px;border-radius: 20px;color: #fff;font-weight: bold;}.miHeader{padding:20px 15px 15px 15px;border-bottom:1px solid #cccece;margin:0px -10px 0px -10px;border-top-left-radius:5px;border-top-right-radius:5px;background-color: #fff;}.cardTtl{border:1px solid #cccece;padding:0px 0px 5px 0px;margin-bottom: 6rem;border-radius: 5px;/*background-color: #fff;*/border-bottom-right-radius:10px !important;border-bottom-left-radius:10px !important;}.card{ border-top-left-radius:0px;border-top-right-radius:0px; margin-bottom:-5px}.miSecn{ background-color:#645bca;margin: -15px 0px 15px 0px;padding: 10px;font-weight: 900;border-bottom: 1px solid #483ebd; color:#fff;}.miSecn i{ background-color:#fff; padding:5px; color:#645bca;border-radius: 10px;font-size: 10px;}.msp{padding: 8px 0px 0px 10px;}.miSlwdth4w{ width:87.32%}#empRadd{ height:75px;}
</style>

	<!-- Row -->
	<div class="row row-sm" >
		<div class="cardTtl">		
			<div class="miHeader">
				<span class="miLst"><i class="si si-people"></i>Employees</span>
				<span class="miBck">
                    <a href="<?php echo base_url('admin/employee/manages');?>" class="amiStl" id="backToAddEmp" data-id="<?php echo base_url('admin/employee/manages');?>">
                        <i class="ti-arrow-left"></i>
                    </a>
                </span>
			</div>

			<!-- Row -->
			<div class="row row-sm">
				<div class="col-lg-12 col-md-12 card custom-card">
						<div class="card-body">
                        
                        <?php 
							/*	echo '<pre>';
								print_r($this->logCat);
					    		echo '</pre>';*/
						?>
                        
                        
                          <div id="frmRegister">
							  <form id="add_employee_data" method="post" accept-charset="utf-8" enctype="multipart/form-data">
								<input type="hidden" name="employee_id" id="employee_id" value="<?php echo $empID;?>">
								<div class="row row-sm">
                                    <div class="miSecn" style="margin-top:0px;"> <i class="si si-user-follow"></i> Personal Details</div>
									<div class="col-md-4">
										<label>Employee Name : <span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-user"></i></span>
											</div>
											<input type="text" class="form-control" name="name" id="name" placeholder="Enter Name Here.."  oninput="this.value=this.value.replace(/[^a-zA-Z\s]/g,'').replace(/\s+/g,' ')">
										</div>
									</div>
                                   
                                    <div class="col-md-4">
										<label>Gender : <span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-user"></i></span>
											</div>
										<div class="miSlwdth4w">	
                                            <select name="gender" id="gender" class="form-control select2-with-search">
                                                <option value=""> Choose One </option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                                <option value="3">Transgender</option>
                                            </select>
                                        </div>
										</div>
									</div>
									<div class="col-md-4">
										<label>Date of Birth: <span class="text-danger">*</span> </label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-clock"></i></span>
											</div>
											<input type="text" class="form-control fc-datepicker dtClean" placeholder="DD/MM/YYYY" name="dob" id="dob">
										</div>
									</div>
                                    <div class="col-md-4">
										<label>Mobile No. : <span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-mobile"></i></span>
											</div>
											<input type="text" class="form-control" name="contact_no" id="contact_no" placeholder="Enter Your Mobile No...." maxlength="10" oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')" >
										</div>
									</div>
									<div class="col-md-4">
										<label>Email Id : <span class="text-danger">*</span> </label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-envelope"></i></span>
											</div>
											<input type="text" name="email" id="email" class="form-control" placeholder="Enter Your Email Here.." onchange="return get_email(this.value)">
										</div>
									</div>
                                    <div class="col-md-4">
										<label>User Type : <span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-user"></i></span>
											</div>
										<div class="miSlwdth4w">	
                                            <select name="user_type" id="user_type" class="form-control select2-with-search">
												<option value=""> --- Select One --- </option>
												<?php if($this->logCat!='5'){?>
                                                <option value="2">Super Admin</option>
												<option value="3">Admin</option>
                                                <option value="5">Branch Admin</option>
                                                <?php }?>
                                                <option value="4">Employee</option>
                                                 
											</select>
                                        </div>    
										</div>
									</div>
                                                                       
                                    <div class="col-md-12">
										<label>Address : <span class="text-danger">*</span> </label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-map"></i></span>
											</div>
											<textarea type="text" name="address" id="address" class="form-control" rows="5" placeholder="Please Enter Your Address..."></textarea>
										</div>
									</div>
									<div class="miSecn" style="margin-top:20px;"> <i class="si si-event"></i> Company Details</div>									
                                    <div class="col-md-4">
										<label>Biometric ID(8 Digit) :<!-- <span class="text-danger">*</span>--></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-fingerprint"></i></span>
											</div>
											<input type="text" name="bioMtric" oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')" id="bioMtric" class="form-control" placeholder="00000000" maxlength="8">
										</div>
									</div>
                                    <div class="col-md-4">
										<label>Date of Joining : <span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-calendar-plus"></i></span>
											</div>
											<input type="text" name="date_of_joining" id="date_of_joining" class="form-control fc-datepicker dtClean" placeholder="DD/MM/YYYY">
										</div>
									</div>
                                    <div class="col-md-4">
										<label>Branch: <span class="text-danger">*</span> </label>
										<div class="input-group mb-3">
											<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-building"></i></span></div>
                                            <div class="miSlwdth4w">	
                                                <select name="branch" id="branch" class="form-control select2-with-search arvManage" data-id="department">
                                                    <option value=""> --- Select Branch --- </option>
                                                    <?php foreach($branch as $brnch){?>
                                                        <option value="<?php echo $brnch->id;?>"><?php echo $brnch->branch_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
										</div>
									</div>
									<div class="col-md-4">
										<label>Department : <span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-building"></i></span>
											</div>
									<div class="miSlwdth4w">	
                                        <select name="department" id="department" class="form-control select2-with-search arvManage"  data-id="designation">
                                            <option value=""> --- Select Department --- </option>
                                        </select>
                                    </div>
										</div>
									</div>
									<div class="col-md-4">
										<label>Designation : <span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-briefcase"></i></span>
											</div>
										<div class="miSlwdth4w">	
                                            <select name="designation" id="designation" class="form-control select2-with-search arvChange" data-id="salary_amount">
												<option value=""> --- Select Designation ---</option>
											</select>
                                       </div>
										</div>
									</div>
									<div class="col-md-4">
										<label>Shift : <span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-clock"></i></span>
											</div>
										<div class="miSlwdth4w">	
                                            <select name="shift" id="shift" class="form-control select2-with-search">
												<option value=""> --- Select Shift --- </option>
												<?php foreach($shift as $sft){ ?>
													<option value="<?php echo $sft->id; ?>">
														<?php echo $sft->shift_name."(".$sft->shift_start." - ".$sft->shift_end.")" ?></option>
												<?php } ?>
											</select>
                                       </div>     
										</div>
									</div>
									
                                    							
									<div class="miSecn" style="margin-top:20px;"><i class="fe fe-settings"></i> Account Login Details</div>
									<div class="col-md-6">
										<label>User Name :</label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-envelope"></i></span>
											</div>
											<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter User Name ..." readonly>
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
                              	<div class="col-lg-4 col-md-4">
                                	<div id="userPr" style="border-radius:1rem;">
                                      <div class="radhe_1">	
                                        <img src="<?php echo base_url('uploads/staff/profile/no_img.png');?>" id="nEmployerPic" alt="@mi Singh">
                                      </div>
                                      <ul>
                                      	<li>
                                        	<i class="fas fa-user radhe_2"></i></i>&nbsp;&nbsp;<span class="fontW">Employee Id</span>
                                             :-&nbsp;&nbsp;<span id="empRmemId" class="float-end">&nbsp;</span></li>
                                        <li>
                                        	<i class="fas fa-user radhe_2"></i>&nbsp;&nbsp;<span class="fontW">Employee Name</span> 
                                            :-&nbsp;&nbsp;<span  class="float-end" id="empRname">&nbsp;</span></li>
                                        <li>
                                        	<i class="fas fa-mobile radhe_2"></i>&nbsp;&nbsp;<span class="fontW">Mobile No </span> 
                                            :-&nbsp;&nbsp;<span  class="float-end" id="empRconNo">&nbsp;</span></li>
                                        <li>
                                        	<i class="fas fa-envelope radhe_2"></i>&nbsp;&nbsp;<span class="fontW">Email Id</span>
                                            :-&nbsp;&nbsp;<span  class="float-end" id="empRemail">&nbsp;</span></li>
                                        <li>
                                        	<i class="fas fa-key radhe_2"></i>&nbsp;&nbsp;<span class="fontW">Password</span> 
                                            :-&nbsp;&nbsp;<span  class="float-end" id="empRshowPass">&nbsp;</span></li>
                                      </ul>
                                    </div>
                            	</div>
                                <div class="col-lg-8 col-md-8 perDetaByRad">
                                  <div class="row">
									 <div class="miSecn_1" style="margin-top:0px;"> <i class="si si-user-follow"></i>&nbsp;&nbsp;Personal Details</div>
                                        
                                        <div class="col-md-4 mt-2">
                                            <label>Date of Birth: </label>
                                                <span  class="form-control msp" id="empRdob">&nbsp;</span>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Gender : </label>
                                            <span class="form-control msp" id="empRgen">&nbsp;</span>
                                        </div>                                 
                                        
                                        
                                        
                                        <div class="col-md-4 mt-2">
                                            <label>User Type : </label>
                                            <span class="form-control msp" id="empRuserType">&nbsp;</span>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <label>Address :  </label>
                                            <span class="form-control msp"  id="empRadd">&nbsp;</span>
                                        </div>   
								     </div>
								<!-- ************************* Personal Details end **********************  -->


								<!--*********************  company Details start  *********************  -->
								    <div class="row">
									     <div class="miSecn" style="margin-top:20px;"> <i class="si si-user-follow"></i>&nbsp;&nbsp;Company Details </div>
                                        <div class="col-md-6">
                                            <label>Biometric ID: </label>
                                            <span class="form-control msp" id="empRbioId">&nbsp;</span>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Date of Joining :  </label>
                                            <span class="form-control msp" id="empRdOj">&nbsp;</span>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <label>Branch: </label>
                                            <span class="form-control msp" id="empRbra">&nbsp;</span>
                                        </div>
                                        <div class="col-md-6  mt-2">
                                            <label>Department:  </label>
                                            <span class="form-control msp" id="empRdep">&nbsp;</span>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <label>Designation : </label>
                                            <span class="form-control msp" id="empRdesig">&nbsp;</span>
                                        </div>                                 
                                        <div class="col-md-6 mt-2">
                                            <label>Shift : </label>
                                            <span class="form-control msp" id="empRshif">&nbsp;</span>
                                        </div>
                                        <div class="col-md-12">
                               <a href="<?php echo base_url('admin/employee/create');?>" class="btn ripple btn-outline-success pull-right" style="margin:15px auto -10px auto;">
                                                <i class="ti-plus"></i> Add New
                                            </a>
                                        </div>
								    </div>
								<!--*********************  company Details end  *********************  -->
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
#userPr{ border:1px solid #e8e8e8;background-color: #f7f7f7;}#userPr div{ text-align:center;}#userPr img{ height:180px; width:180px; border-radius:10px;margin: 40px;}
#userPr ul{ list-style:none;margin-left: -30px;margin-bottom: 0px;}#userPr ul li{ padding:10px; border-bottom:1px dashed #ddd}#userPr ul li:last-child{ border-bottom:0px solid #000;}#amiResult{/*background-color:#f0f0f0;border: 1px solid #e3e2e3;*/margin-bottom:15px;padding:10px 0px 10px 0px;height: 64rem;}.testingAMi{background-color: #018888;padding: 10px;margin: 10px;text-align: center;color: bisque;font-weight: bold;}.amiProcess{ text-align:center;margin:auto;}.miSlwdth{width:92.20%;}/*.miSlwdthSml{ width:80%;}*/
.miSlcustomWdth{width:91.5%;}.radhe_1{ border-top: 5px solid #4f46b1;border-radius: 1rem;}.radhe_2{color:#4f46b1;font-size:13px;font-weight:800;}.heading-text{color:white;font-weight: 600;}
	@media (max-width: 768px){.miSlwdth{width:85.7%;}.miSlcustomWdth{width:83%;}}
	.fontW{font-weight:800;color:#645bca;}
	.miSecn_1{ background-color:#645bca;margin: -15px 0px 15px 0px;padding: 10px;font-weight: 900;border-bottom: 1px solid #483ebd; color:#fff;border-radius: 1rem 1rem 0rem 0rem;}
	.perDetaByRad{/*border:1px solid #ecebf5;*/border-radius:1rem 1rem 0rem 0rem;}
</style>
<script src="<?php echo base_url() ?>assets/js/admin/employee.js"></script>