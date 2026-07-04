<div class="inner-body">
	<!-- Page Header -->
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
	<!-- End Page Header -->

	<style>
		.miBck a:hover {
			background-color: #645bca;
			color: #fff;
		}

		.miBck {
			font-weight: 600;
			text-transform: uppercase;
			float: right;
			margin-right: 10px;
		}

		.miBck a {
			border: 1px solid #645bca;
			padding: 8px 12px 8px 12px;
			border-radius: 5px;
			color: #645bca;
			font-weight: bold;
		}

		.miLst {
			font-weight: 600;
			text-transform: uppercase;
		}

		.miLst i {
			background-color: #645bca;
			padding: 11px 11px 10px 10px;
			margin-right: 10px;
			border-radius: 20px;
			color: #fff;
			font-weight: bold;
		}

		.miHeader {
			padding: 20px 15px 15px 15px;
			border-bottom: 1px solid #cccece;
			margin: 0px -10px 20px -10px;
			border-top-left-radius: 5px;
			border-top-right-radius: 5px;
		}

		.cardTtl {
			border: 1px solid #fff;
			padding: 0px 0px 25px 0px;
			margin-bottom: 75px;
			border-radius: 5px;
			background-color: #fff;
		}
		
	.miClr i{ color:#068a3a;}
	#gtBrCode[readonly]{background-color:#fff !important;}	
	#brAddress::placeholder{ padding-top:10px;}	
	</style>

	<!-- Row -->
	<div class="row row-sm">
		<div class="cardTtl">
			<div class="miHeader">
				<span class="miLst"><i class="si si-plane"></i>Branch Details</span>
				<span class="miBck"><a href="<?php echo base_url('software/branch'); ?>"><i class="ti-arrow-left"></i></a></span>
			</div>
			<?php print_r($getBranch);?>
			<div class="col-md-12 col-lg-12">
				<input type="hidden" id="attendance_report" value="<?php echo $attendance_report; ?>" />
				<div class="row row-sm">
                	<?php //print_r($attendance);?>
                	<div class="col-6">
                        <label>Branch Code: <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text miClr"><i class="si si-grid"></i></span>
                            </div>
                            <input type="text" readonly="readonly" id="gtBrCode" class="form-control" value="<?php if($getBranch){echo $getBranch->code;}?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <label>Branch Name: <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text miClr"><i class="si si-layers"></i></span>
                            </div>
                            <input type="text" class="form-control" name="brName" id="brName" value="<?php if($getBranch){echo $getBranch->branch_name;}?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <label>Contact Name:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text miClr"><i class="si si-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="contactName" id="contactName" value="<?php if($getBranch){echo $getBranch->branch_name;}?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <label>Contact Number:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text miClr"><i class="si si-phone"></i></span>
                            </div>
                            <input type="text" class="form-control" name="contactNu" id="contactNu" value="<?php if($getBranch){echo $getBranch->branch_name;}?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <label>Mobile Number:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text miClr"><i class="si si-screen-smartphone"></i></span>
                            </div>
                            <input type="text" class="form-control" name="mobileNu" id="mobileNu" value="<?php if($getBranch){echo $getBranch->branch_name;}?>">
                        </div>
                    </div>
                    
                    <div class="col-6">
                        <label>Email Id:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text miClr"><i class="si si-envelope"></i></span>
                            </div>
                            <input type="text" class="form-control" name="emailID" id="emailID" value="<?php if($getBranch){echo $getBranch->branch_name;}?>">
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <label>Address:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text miClr"><i class="si si-home"></i></span>
                            </div>
                           <textarea class="form-control" name="brAddress" id="brAddress" rows="2" placeholder="Branch Address..."><?php if($getBranch){echo $getBranch->branch_name;}?></textarea>
                        </div>
                    </div>
                    
                    <div class="col-4">
                        <label>State:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text miClr"><i class="fas fa-briefcase"></i></span>
                            </div>
                           <select class="form-control empSelectR" name="state" id="state">
                              <option value=""> --- Select State --- </option>
                                <?php if($getState){foreach($getState as $state){?>   
                                  <option value="<?php echo $state->id;?>" <?php if($getBranch){if($state->id==$getBranch->state){ echo 'selected="selected"';}} ?>>
								  		<?php echo $state->state_cities;?>
                                   </option>
                                <?php }}?>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <label>District:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text miClr"><i class="fas fa-briefcase"></i></span>
                            </div>
                           <select class="form-control" name="district" id="district">
                              <option value=""> --- Select Dsitrict --- </option>
                                <?php if($getDistrict){foreach($getDistrict as $district){?>   
                                  <option value="<?php echo $district->id;?>" ><?php echo $district->state_cities;?></option>
                                <?php }}?>
                            </select>
                        </div>
                    </div>
                    
                      <div class="col-4">
                        <label>Zipcode:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text miClr"><i class="si si-pin"></i></span>
                            </div>
                            <input type="text" class="form-control" name="zipCode" id="zipCode" value="<?php if($getBranch){echo $getBranch->zipcode;}?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                       <a href="javascript:void(0)"  class="btn ripple btn-outline-dark branchSrch">
							<i class="fe fe-arrow-left"></i> Back</a>
                            <button class="btn ripple btn-outline-success pull-right" id="manage">
                            	<i class="ti-save"></i> Update
                            </button>
                    </div>
				</div>
			</div>
		</div>
		<!-- End Row -->
	</div>
<script>
$(document).ready(function() 
{
	$(".empSelectR").change(function() 
	{
			var actNbtn = $(this).attr('id');
			var getResource = $('#base_url').val();
			 if(actNbtn == 'state')
			 {
				 $('#district').html('<option>Please Wait.....</option>');$('#district').css('color', '#099b7e');
			  $.post(getResource+"software/setting/cityList",{id:$('#'+actNbtn).val()},function(htmlAmi){$('#district').html(htmlAmi);$('#district').css('color','rgb(13, 62, 115)')});
			} 
		});
});

</script>
