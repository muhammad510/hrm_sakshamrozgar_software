<div class="inner-body">
	<!-- Page Header -->
	<div class="page-header">
		<div>
			<h2 class="main-content-title tx-24 mg-b-5"><?php echo $title; ?></h2>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
				<li class="breadcrumb-item active" aria-current="page"><?php echo $breadcrums; ?></li>
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
	.miBck a:hover{ background-color:#645bca; color:#fff;}
	.miBck{ font-weight:600;text-transform: uppercase; float:right;margin-right: 10px;}
	.miBck a{ border:1px solid #645bca;padding: 8px 12px 8px 12px;border-radius: 5px;color: #645bca;font-weight: bold;}
	.miLst{ font-weight:600;text-transform: uppercase;}
	.miLst i{ background-color: #645bca;padding: 10px;margin-right: 10px;border-radius: 20px;color: #fff;font-weight: bold;}
	.miHeader{padding:20px 15px 15px 15px;border-bottom:1px solid #cccece;margin:0px -10px 20px -10px;border-top-left-radius:5px;border-top-right-radius:5px;background-color: #fff;}
	.cardTtl{border:1px solid #fff;padding:0px 0px 40px 0px;margin-bottom: 20px;border-radius: 5px;background-color: #fff;}
	#add_shift_data{ padding:10px 15px 0px 15px;}
    </style>

	<!-- Row -->
	<div class="row row-sm">
		<div class="cardTtl">		
			<div class="miHeader">
				<span class="miLst"><i class="si si-people"></i>Shifts</span>
				<span class="miBck"><a href="<?php echo base_url('software/shift/manage_shift'); ?>"><i class="ti-arrow-left"></i></a></span>
			</div>

			<!-- Row -->
			<div class="row row-sm">
				<div class="col-lg-12 col-md-12">
					<form id="add_shift_data" method="post" accept-charset="utf-8" enctype="multipart/form-data">
								<div class="row row-sm">
									<div class="col-4">
										<label>Shift Name:<span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-briefcase"></i></span>
											</div>
											<input type="text" class="form-control" name="shift_name" id="shift_name">
										</div>
									</div>
									<div class="col-4">
										<label>Shift duration: (Hours)<span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-business-time"></i></span>
											</div>
											<input type="text" class="form-control" name="shift_duration" id="shift_duration" oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')" maxlength="2">
										</div>
									</div>
                                    <div class="col-4">
										<label>Grace Period: (Minutes)</label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-business-time"></i></span>
											</div>
											<input type="text" class="form-control" name="graceP" id="graceP" oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')" maxlength="2">
										</div>
									</div>
									<div class="col-6">
										<label>Shift Start Time:<span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-clock"></i></span>
											</div>
											<input type="time" class="form-control" name="shift_start" id="shift_start">
										</div>
									</div>
									<div class="col-6">
										<label>Shift End Time:<span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-clock"></i></span>
											</div>
											<input type="time" name="shift_end" id="shift_end" class="form-control">
										</div>
									</div>
									<div class="col-md-12">
										<button class="btn ripple btn-outline-success pull-right amiStl" id="shiftdata"><i class="ti-save"></i> Submit</button>
									</div>
								</div>
							</form>
				</div>
			</div>
			<!-- End Row -->
		</div>
	</div>
	<!-- End Row -->
</div>
					
<style>
	#amiResult{/*background-color:#f0f0f0;border: 1px solid #e3e2e3;*/margin-bottom:15px;padding:10px 0px 10px 0px;height: 64rem;}
	.testingAMi{background-color: #018888;padding: 10px;margin: 10px;text-align: center;color: bisque;font-weight: bold;}
	.amiProcess{ text-align:center;margin:auto;}
</style>

<script src="<?php echo base_url() ?>assets/js/setting/shift.js"></script>





					
					
					
					
					
					