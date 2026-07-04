<div class="inner-body">                       
	<!-- Page Header -->
	<div class="page-header">
		<div>
			<h2 class="main-content-title tx-24 mg-b-5">Department</h2>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">All</a></li>
				<li class="breadcrumb-item active" aria-current="page">View</li>
			</ol>
		</div>
		<div class="d-flex">
			<div class="justify-content-center">
				<a href="<?php echo base_url('staff/dashboard');?>" class="btn btn-success btn-icon-text my-2 me-2"  title="Dashboard"> <i class="ti-home"></i> Dashboard </a>
                <button type="button" class="btn btn-primary btn-icon-text my-2 me-2" id="miArvClk"> <i class="fe fe-filter me-2"></i> Current Time </button>
                <a href="<?php echo base_url('auth/login/signout');?>" class="btn btn-danger btn-icon-text  my-2 me-2"> <i class="fe fe-power me-2"></i> Sign Out </a>
			</div>
		</div>
	</div>
	<!-- End Page Header -->

	<style>
		.miBck a:hover{ background-color:#645bca; color:#fff;}
		.miBck{ font-weight:600;text-transform: uppercase; float:right;margin-right: 10px;padding-top: 7px;}
		.miBck a{ border:1px solid #645bca;padding: 6px 12px 6px 12px;border-radius: 5px;color: #645bca;font-weight: bold;}
		.miLst{ font-weight:600;text-transform: uppercase;}
		.miLst i{ background-color: #645bca;padding: 11px 11px 10px 10px ;margin-right: 10px;border-radius: 20px;color: #fff;font-weight: bold;}
		.miHeader{padding:10px 15px 10px 15px;border-bottom: 1px solid #cccece;margin: 0px -10px 20px -10px;border-top-left-radius: 5px;border-top-right-radius: 5px;}
		.cardTtl{border:1px solid #fff;padding:0px 0px 40px 0px;margin-bottom: 20px;border-radius: 5px;background-color: #fff;}
.ami_tHeader > tr > th{ color:#FFFFFF !important;border: 1px solid #088 !important;padding: 12px 0px 12px 5px !important;}.ami_tHeader > tr{border: 1px solid #088 !important;}
		.miLvs{ padding:5px 12px 5px 12px;}.delMsg {text-align: center;font-size: 20px;margin: 30px 0px 10px 0px;color: #00805c;}
	.actnData {text-align: center;margin: 0px 0px 20px 0px;color:#716c6c;font-size:.8rem;}
	.regiErr {float: right;display:none;color: #c84c02;font-size: 12px;}
	</style>

	<!-- Row -->
	<div class="row row-sm">
		<div class="cardTtl">
			<div class="miHeader">
				<span class="miLst"><i class="fe fe-sliders"></i><?php echo $title;?></span>
				<!-- <span class="miBck"><a href="<?php echo $bckUrl;?>"><i class="ti-arrow-left"></i></a></span> -->
				<span class="miBck"><a href="javascript:void(0);" data-bs-target="#add_department_modal" data-bs-toggle="modal" style="margin-left:-5px;" title="Click to Add Department Details" class="miDefault"><i class="ti-plus"></i></a></span>
			</div>
			<div class="col-md-12 col-lg-12">
			<input type="hidden" id="department" value="<?php echo $department;?>" />	
			<div class="row row-sm" id="amiResult">
				<table class="table text-nowrap text-md-nowrap table-striped table-bordered table-hover mg-b-0" id="department_list">
					<thead class="ami_tHeader">
						<tr>
							<th>S. No. </th>
							<th>Department Name</th>
							<th>Description</th>
							<th>Status</th>
                            <th style="text-align:center;">Action</th>
						</tr>
					</thead>
				</table>
			</div>

            <!-- Add Department Modal Start -->
			<div class="modal" id="add_department_modal"  data-bs-backdrop="static">
				<div class="modal-dialog modal-md" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Add New Department Details</h6>
							<button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">X</span></button>
						</div>
						<form id="add_department_data" method="post" accept-charset="utf-8" enctype="multipart/form-data">
							<div class="modal-body">
                               
                               
                                <div class="row row-sm">
                                	
                                    <div class="col-12">
                                      <span id="deptNm" class="regiErr">SoftArena</span>
                                        <label>Department Name:<span class="text-danger">*</span></label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="department_name" id="department_name"  oninput="this.value=this.value.replace(/[^a-zA-Z\s]/g,'').replace(/\s+/g,' ')" placeholder="Enter Department Name...">
                                             
                                        </div>
                                      
                                    </div>
                                    <div class="col-12">
                                         <label>Description : </label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-edit"></i></span>
                                            </div>
                                            <textarea class="form-control" name="description" id="description" placeholder="Enter Description Here..."></textarea>
                                        </div>
                                    </div>
                                </div>
							</div>
							<div class="modal-footer">
								
								<button class="btn ripple btn-outline-dark" data-bs-dismiss="modal" type="button"><i class="fe fe-arrow-left"></i> Back</button>
                                <button class="btn ripple btn-outline-success" type="submit" id="departmentdata"><i class="ti-save"></i> Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Add Department Modal End-->

            <!-- Update Department Modal Start -->
			<div class="modal" id="update_department_modal"  data-bs-backdrop="static">
				<div class="modal-dialog modal-md" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Update Department Details</h6>
							<button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">x</span></button>
						</div>
						<form id="department_updata" method="post" accept-charset="utf-8" enctype="multipart/form-data">
							<div class="modal-body">
								<div id="up_department"></div>
							</div>

							

							<div class="modal-footer">
    						<button class="btn ripple btn-outline-dark" data-bs-dismiss="modal" type="button"><i class="fe fe-arrow-left"></i> Back</button>
    						<button class="btn ripple btn-outline-success pull-right" type="submit" id="departmentupddata"><i class="ti-save"></i> Save changes</button>
    						</div>


						</form>
					</div>
				</div>
			</div>
			<!-- update Holidays Modal End-->
		</div>
	</div>
	<!-- End Row -->
</div>
					
<style>
	.mibdge{ padding:6px 0px 6px 0px;width:70px;}
	.ami_tHeader{background-color:#088;}
	.ami_tHeader >tr>th{ color:#fff;font-weight: 600;padding:13px 7px 13px 7px;}
	.miSuccess{padding:6px 10px 6px 10px;color:#19b159;border:1px solid #19b159;border-radius: 2px;}
	.miSuccess:hover{background-color:#19b159;color: #fff;}
	.miDefault{padding:6px 10px 6px 10px;color:#3b4863;border:1px solid #3b4863;border-radius: 2px;}
	.miDefault:hover{background-color:#3b4863;color: #fff;}
	.miDanger{padding:6px 10px 6px 10px;color:#f16d75;border:1px solid #f16d75;border-radius: 2px;}
	.miDanger:hover{background-color:#f16d75;color: #fff;}
	.miLvs{ padding:5px 12px 5px 12px;}.delMsg {text-align: center;font-size: 20px;margin: 30px 0px 10px 0px;color: #00805c;}
	.actnData {text-align: center;margin: 0px 0px 20px 0px;color:#716c6c;font-size:.8rem;}
</style>

<div id="statusChange" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style=" padding-left: 0px;" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right;"><i class="si si-close"></i></button>
                <div class="delMsg"><i class="fe fe-sliders"></i> Department Status</div>
                    <div class="actnData"><i class="si si-power"></i>  Are you sure want to activate of Department ID #F33333</div>
                    <div id="mdlFtrBtn">
                      <button type="button" class="btn btn-outline-secondary waves-effect waves-light pull-right getAction" id="cnfChanges" data-id="@misingh143">
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
<script src="<?php echo base_url('assets/js/setting/department.js'); ?>"></script>