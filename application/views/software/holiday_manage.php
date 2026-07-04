<div class="inner-body">                       
	<!-- Page Header -->
	<div class="page-header">
		<div>
			<h2 class="main-content-title tx-24 mg-b-5">Shift</h2>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">All</a></li>
				<li class="breadcrumb-item active" aria-current="page">View</li>
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
	.miBck{ font-weight:600;text-transform: uppercase; float:right;margin-right: 10px;padding-top: 7px;}
	.miBck a{ border:1px solid #645bca;padding: 8px 12px 8px 12px;border-radius: 5px;color: #645bca;font-weight: bold;}
	.miLst{ font-weight:600;text-transform: uppercase;}
	.miLst i{ background-color: #645bca;padding: 11px 11px 10px 10px ;margin-right: 10px;border-radius: 20px;color: #fff;font-weight: bold;}
.miHeader{padding:10px 15px 10px 15px;border-bottom: 1px solid #cccece;margin: 0px -10px 20px -10px;border-top-left-radius: 5px;border-top-right-radius: 5px;}
	.cardTtl{border:1px solid #fff;padding:0px 0px 40px 0px;margin-bottom: 20px;border-radius: 5px;background-color: #fff;}
	</style>

						<!-- Row -->
						<div class="row row-sm">
							<div class="cardTtl">		
								<div class="miHeader">
									<span class="miLst"><i class="fe fe-sliders"></i><?php echo $title;?></span>
									
									<span class="miBck"><a href="<?php echo $bckUrl;?>"><i class="ti-arrow-left"></i></a></span>
									
									<span class="miBck"><a href="<?php echo base_url('software/setting/shift/add');?>"><i class="ti-plus"></i></a></span>
									
								</div>
								
								<div class="col-md-12 col-lg-12">
								<input type="hidden" id="target" value="<?php echo $target;?>" />	
								<div class="row row-sm" id="amiResult">	
									
									<table class="table text-nowrap text-md-nowrap table-striped table-bordered table-hover mg-b-0" id="shift_list">
										<thead class="ami_tHeader">
											<tr>
											  <th>S. No. </th>
												<th style="text-align:center">ID</th>
												<th>Name</th>
												<th>Duration</th>
												<th>Start Time </th>
												<th>End Time</th>
												<th>Status</th>
												<th style="text-align:center">Action</th>
											</tr>
										</thead>
										<!--<tbody>
											<tr>
											  <th><strong>1.</strong></th>
											  <th style="text-align:center">Shift001</th>
												<td>Morning Shift </td>
												<td>Joan Powell</td>
												<td>Evening Shift </td>
												<td>2:00Pm</td>
												<td><span class="badge bg-dark mibdge">On Leave</span></td>
												<td>
													<div style="text-align:center">	
														<a href="javascript:void(0);" class="miDefault"><i class="ti-eye"></i></a>
														<a href="javascript:void(0);"  class="miSuccess"><i class="ti-pencil-alt"></i></a>
														<a href="javascript:void(0);"  class="miDanger"><i class="ti-trash"></i></a>
													</div>												
												</td>
											</tr>
										<tr>
											  <th scope="row"><strong>2.</strong></th>
											  <th scope="row" style="text-align:center">Shift002</th>
												<td>Day Shift </td>
												<td>Gavin Gibson</td>
												<td>Day</td>
												<td>10:00Am</td>
												<td><span class="badge bg-danger mibdge">Absent</span></td>
												<td>
													<div style="text-align:center">	
														<a href="javascript:void(0);" class="miDefault"><i class="ti-eye"></i></a>
														<a href="javascript:void(0);"  class="miSuccess"><i class="ti-pencil-alt"></i></a>
														<a href="javascript:void(0);"  class="miDanger"><i class="ti-trash"></i></a>
													</div>														</td>
											</tr>
											<tr>
											  <th scope="row"><strong>3.</strong></th>
											  <th scope="row" style="text-align:center">Shift003</th>
												<td>Evening Shift </td>
												<td>Julian Kerr</td>
												<td>Morining Shift </td>
												<td>2:00Am</td>
												<td><span class="badge bg-success mibdge">Present</span></td>
												<td>
													<div style="text-align:center">	  
													  <a href="javascript:void(0);" class="miDefault"><i class="ti-eye"></i></a>
													  <a href="javascript:void(0);"  class="miSuccess"><i class="ti-pencil-alt"></i></a>
													  <a href="javascript:void(0);"  class="miDanger"><i class="ti-trash"></i></a>
													</div>
												</td>
											</tr>
										</tbody>-->
									</table>
								</div>	

	
									
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



</style>


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



					
					
					
					
					
					