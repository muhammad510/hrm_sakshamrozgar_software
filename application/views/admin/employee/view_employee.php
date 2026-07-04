<div class="inner-body">
	<style>
.miBck a:hover {background-color: #645bca;color: #fff;}.miBck {font-weight: 600;text-transform: uppercase;float: right;margin-right: 10px;padding-top: 7px;}.miBck a {border: 1px solid #645bca;padding: 8px 12px 8px 12px;border-radius: 5px;color: #645bca;font-weight: bold;}.miLst {font-weight: 600;text-transform: uppercase;}.miLst i {background-color: #645bca;padding: 11px 11px 10px 10px;margin-right: 10px;border-radius: 20px;color: #fff;font-weight: bold;}.miHeader {padding: 10px 15px 10px 15px;border-bottom: 1px solid #cccece;margin: 0px -10px 20px -10px;border-top-left-radius: 5px;border-top-right-radius: 5px;}
.cardTtl {border: 1px solid #fff;padding: 0px 0px 40px 0px;margin-bottom: 75px;border-radius: 5px;background-color: #fff;}.ami_tHeader>tr>th {color: #FFFFFF !important;border: 1px solid #088 !important;padding: 12px 0px 12px 5px !important;}
.ami_tHeader>tr {border: 1px solid #088 !important;background-color: #088 !important;}
.inrGrn i {font-size: .75rem;color: #02aa73;}.inrBlue i {font-size: .75rem;color: #0283aa;}.miLvs{width:60px;}#viewSalaryPaid,#searchPayrolDetails,#vCreateNew,#frSearchEmplyee{ display:none;}
#searchPayrolDetails{margin-bottom: -50px; margin-top:40px;}.miSpns{font-weight:400;}.miBld{ font-weight:900 !important;}.slipImg{text-align:right;}.slipImg img{ width:100%;}
.cmpniHd{font-size:2rem;font-weight: bold;color: #004195; font-family: Tahoma, sans-serif;text-align: center;}.cmpniAdr{width:50%;margin:-10px 0rem 5px 12rem;font-size:1rem;font-weight:500;text-align: center;}.cmpniOthr{ font-size:.9rem;}.slfMnth{border: 1px dashed #fff;padding: 10px;font-size: 1rem;background-color: #011b59;color: #fff;margin-bottom: 15px;}.empDet{ color: #717171;font-weight: normal;padding: 2px 0px 2px 0px;}.empDet .spn{ font-weight:900;float:right;color:#666666;}.empDet .stTxt{ padding-left:20px;}.empDet .stDet{ font-weight:900;color:#000;text-transform:uppercase;}

.mSrchPnl{ margin:-15px 0px 0px 38px;position: absolute;width: 290px;z-index: 1;cursor: pointer; display:none;}
.mSrchPnl ul{ list-style:none;background-color:#fff; border: 1px solid #d9d9d9;
  border-bottom-left-radius: 6px;border-bottom-right-radius: 6px;-webkit-box-shadow: 0px 3px 5px 0px rgba(145,145,145,1);
-moz-box-shadow: 0px 3px 5px 0px rgba(145,145,145,1);
box-shadow: 0px 3px 5px 0px rgba(145,145,145,1);
max-height: 230px;overflow-x: hidden;overflow-y: scroll;scrollbar-width: thin;scrollbar-color: #24839f #fff;
}

.mSrchPnl ul li{ padding:8px 0px 8px 8px; border-bottom:1px solid #d9d9d9;margin-left: -31px; color: #757575;font-weight: 600;}
.mSrchPnl ul li:last-child{ border-bottom:0px solid #000;} 

.mSrchPnl ul li span{color: #c65d00;padding-left: 5px;}
.mSrchPnl ul li i{color:#181;background:#e1e1e1;padding:5px;border-radius:12px;font-size:10px;margin-right: 3px;}
.miPlease{color: #0087ff !important;padding:10px 0px 10px 10px !important;}
.miPlease i{ background-color:#0087ff !important;color: #fff !important;padding:8px !important; border-radius: 20px !important}
.miNoEmp{color: #d23d03 !important;padding:10px 0px 10px 10px !important;}
.miNoEmp i{ background-color:#d23d03 !important;color: #fff !important;padding:8px !important; border-radius: 20px !important}
.miSalHeader{margin:15px -26px 10px -26px;padding:5px 0px 5px 15px;border-left:3px solid #645bca;font-weight:bold;border-bottom:1px solid #f4f4f4;}
.miFtrHdr{margin-top: 20px;border-top: 1px solid #eee;padding-top: 20px;}
.viewDet{padding: 6px;font-size: 1rem;background-color: #4f46b1;color: #fff;margin-bottom: 15px;margin-top: 1rem;}
#vCreateNew{ min-height:350px;}
.textMan{color:#918d8d;}
</style>
	<div class="page-header">
		<div>
			<h2 class="main-content-title tx-24 mg-b-5">
				<?php echo $title; ?>
			</h2>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url('staff/dashboard'); ?>">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Member Data</li>
			</ol>
		</div>
		<div class="d-flex">
			<div class="justify-content-center">
			  <a href="<?php echo base_url('admin/employee/grid');?>" class="btn btn-success btn-icon-text my-2 me-2"  title="View Employees">
                <i class="fe fe-arrow-left"></i> Back To List </a>
              <button type="button" class="btn btn-primary btn-icon-text my-2 me-2" id="miArvClk"  title="Current Time"> <i class="fe fe-filter me-2"></i> Current Time </button>
              <a href="<?php echo base_url('auth/login/signout');?>" class="btn btn-danger btn-icon-text  my-2 me-2"  title="Sign Out">
                  <i class="fe fe-power me-2"></i> Sign Out
              </a>
			</div>
		</div>
	</div>
<!---------------------------Search Panel Start------------------------------------------>
	<!-- Row -->
	<div class="row row-sm">
		<div class="cardTtl">
            <!-- -----------------------------------------------  -->
            <div class="miHeader">
                <span class="miLst"><i class="pe-7s-cash"></i><span id="mstrTitle">
                <?php echo $title; ?>
				</span></span>
                <div class="row">
                    <div class="viewDet text-center">Personal Details</div>

                     <div class="row">
                     <div class="col-md-6">
                       <div class="row"style="display:flex;">
                        <div class="col-md-5 textMan"><h6>employee Name</h6></div>
                        <div class="col-md-7"> <?php echo $employee['name'] ."(". $employee['employee_id'] . ")" ;?></div>
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="row"style="display:flex;">
                        <div class="col-md-5"><h6 class="textMan">Father Name</h6></div>
                        <div class="col-md-7"><?php echo $employee['father_name'];?></div>
                       </div>
                    </div>
                     </div>

                     <div class="row">
                     <div class="col-md-6">
                       <div class="row"style="display:flex;">
                        <div class="col-md-5"><h6 class="textMan">Date Of Birth</h6></div>
                        <div class="col-md-7"><?php echo date('d/m/Y',strtotime($employee['dob'])); ?></div>
                       </div>
                     </div>
                     <div class="col-md-6">
                       <div class="row"style="display:flex;">
                        <div class="col-md-5"><h6 class="textMan">Gender</h6></div>
                        <div class="col-md-7"> <?php if($employee['gender'] == 1) { echo "Male"; } elseif($employee['gender'] == 2) { echo "Female";} ?></div>
                       </div>
                    </div>
                     </div>

                     <div class="row">
                     <div class="col-md-6">
                       <div class="row"style="display:flex;">
                        <div class="col-md-5"><h6 class="textMan">Mobile No.</h6></div>
                        <div class="col-md-7"><?php echo $employee['contact_no'];?></div>
                       </div>
                    </div>
                     <div class="col-md-6">
                       <div class="row"style="display:flex;">
                        <div class="col-md-5"><h6 class="textMan">Email Id:</h6></div>
                        <div class="col-md-7"><?php echo $employee['email'];?></div>
                       </div>
                    </div>
                     </div>

                     <div class="row">
                     <div class="col-md-6">
                       <div class="row"style="display:flex;">
                        <div class="col-md-5"><h6 class="textMan">Address:</h6></div>
                        <div class="col-md-7"> <?php echo $employee['address'];?></div>
                       </div>
                    </div>
                     <div class="col-md-6">
                       <div class="row"style="display:flex;">
                        <div class="col-md-5"><h6 class="textMan">Nationality</h6></div>
                        <div class="col-md-7"><?php echo $employee['nationality'];?></div>
                       </div>
                    </div>
                     </div>

                     <div class="row">
                     <div class="col-md-6">
                       <div class="row"style="display:flex;">
                        <div class="col-md-5"><h6 class="textMan">Refrence Person Name:</h6></div>
                        <div class="col-md-7"><?php echo $employee['reference_person_name'];?></div>
                       </div>
                    </div>
                     <div class="col-md-6">
                       <div class="row"style="display:flex;">
                        <div class="col-md-5"><h6 class="textMan">Ref Person Mobile No.</h6></div>
                        <div class="col-md-7">  <?php echo $employee['reference_person_number'];?></div>
                       </div>
                    </div>
                     </div>

                     <div class="row">
                     <div class="col-md-6">
                       <div class="row"style="display:flex;">
                        <div class="col-md-5"><h6 class="textMan">Marital Status:</h6></div>
                        <div class="col-md-7"> <?php if($employee['marital_status'] == 1) { echo "Maried";} elseif($employee['marital_status'] == 2) { echo "Un-married";} ;?></div>
                       </div>
                    </div>
                     </div>


                </div>

                <div class="row">
                    <div class="viewDet text-center">Company Details</div>

                    <div class="row">
                     <div class="col-md-6">
                       <div class="row"style="display:flex;">
                        <div class="col-md-5"><h6 class="textMan">Department</h6></div>
                        <div class="col-md-7"> <?php echo $employee['department_name'];?></div>
                       </div>
                    </div>
                     <div class="col-md-6">
                       <div class="row"style="display:flex;">
                        <div class="col-md-5"><h6 class="textMan">Designation</h6></div>
                        <div class="col-md-7"> <?php echo $employee['designation_name'];?></div>
                       </div>
                    </div>
                     </div>


                     <div class="row">
                     <div class="col-md-6">
                       <div class="row"style="display:flex;">
                        <div class="col-md-5"><h6 class="textMan">Date of Joining:</h6></div>
                        <div class="col-md-7"><?php echo date('d/m/Y',strtotime($employee['date_of_joining'])); ?></div>
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="row"style="display:flex;">
                        <div class="col-md-5"><h6 class="textMan">Shift</h6></div>
                        <div class="col-md-7"> <?php echo $employee['shift_name'] ."(". $employee['shift_start'] . " - ". $employee['shift_end']. ")" ;?></div>
                       </div>
                    </div>
                     </div>

                     <div class="row">
                     <div class="col-md-6">
                       <div class="row"style="display:flex;">
                        <div class="col-md-5"><h6 class="textMan">Qualification</h6></div>
                        <div class="col-md-7">  <?php echo $employee['qualification'];?></div>
                       </div>
                    </div>
                     <div class="col-md-6">
                       <div class="row"style="display:flex;">
                        <div class="col-md-5"><h6 class="textMan">Work Exp(In Month):</h6></div>
                        <div class="col-md-7"> <?php echo $employee['work_exp'];?></div>
                       </div>
                    </div>
                     </div>

                </div>


                <div class="row">
                    <div class="viewDet text-center">Finance Details</div>
                    <div class="row">
                     <div class="col-md-6">
                       <div class="row"style="display:flex;">
                        <div class="col-md-5"><h6 class="textMan">Salary Type:</h6></div>
                        <div class="col-md-7"> <?php if($employee['salary_type'] == 1) { echo "Daily"; }elseif($employee['salary_type'] == 2) { echo "Weekly"; }elseif($employee['salary_type'] == 3) { echo "Monthly"; } ;?></div>
                       </div>
                    </div>
                     <div class="col-md-6">
                       <div class="row"style="display:flex;">
                        <div class="col-md-5"><h6 class="textMan">Salary Amount:</h6></div>
                        <div class="col-md-7"> <?php echo $employee['salary_amount'];?></div>
                       </div>
                    </div>
                     </div>
                </div>


                <div class="row">
                    <div class="viewDet text-center">Bank Account Details</div>
                    <div class="row">
                     <div class="col-md-6">
                       <div class="row"style="display:flex;">
                        <div class="col-md-5"><h6 class="textMan">Account Holder Name:</h6></div>
                        <div class="col-md-7"> <?php echo $employee['holder_name'];?></div>
                       </div>
                    </div>
                     <div class="col-md-6">
                       <div class="row"style="display:flex;">
                        <div class="col-md-5"><h6 class="textMan">Account Number:</h6></div>
                        <div class="col-md-7"> <?php echo $employee['bank_account_no'];?></div>
                       </div>
                    </div>
                     </div>
                     <div class="row">
                     <div class="col-md-6">
                       <div class="row"style="display:flex;">
                        <div class="col-md-5"><h6 class="textMan">Bank Name:</h6></div>
                        <div class="col-md-7"> <?php echo $employee['bank_name'];?></div>
                       </div>
                    </div>
                     <div class="col-md-6">
                       <div class="row"style="display:flex;">
                        <div class="col-md-5"><h6 class="textMan">Branch:</h6></div>
                        <div class="col-md-7"> <?php echo $employee['bank_branch'];?></div>
                       </div>
                    </div>
                     </div>
                     <div class="row">
                     <div class="col-md-6">
                       <div class="row"style="display:flex;">
                        <div class="col-md-5"><h6 class="textMan">IFSC Code:</h6></div>
                        <div class="col-md-7"><?php echo $employee['ifsc_code'];?></div>
                       </div>
                    </div>
                     </div>
                </div>

                <div class="row">
                    <div class="viewDet text-center">Account Login Details</div>
                    <div class="row">
                     <div class="col-md-6">
                       <div class="row"style="display:flex;">
                        <div class="col-md-5"><h6 class="textMan">User Email:</h6></div>
                        <div class="col-md-7"><?php echo $employee['email'];?></div>
                       </div>
                    </div>
                     <div class="col-md-6">
                       <div class="row"style="display:flex;">
                        <div class="col-md-5"><h6 class="textMan">Password</h6></div>
                        <div class="col-md-7"><?php echo $employee['show_password'];?></div>
                       </div>
                    </div>
                     </div>
                </div>
                   
		 </div>
            <!-- -----------------------------------------------  -->
	  </div>
	</div>

