<div class="inner-body">
	<!-- Page Header -->
	<div class="page-header">
		<div>
			<h2 class="main-content-title tx-24 mg-b-5">Employee Attendance List</h2>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo $breadcrums; ?></a></li>
				<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
			padding: 0px 0px 5px 0px;
			margin-bottom: 20px;
			border-radius: 5px;
			background-color: #fff;
		}
	</style>

	<!-- Row -->
	<div class="row row-sm">
		<div class="cardTtl">
			<div class="miHeader">
			<span class="miLst"><i class="fe fe-sliders"></i><?php echo $title;?></span>

				<!-- <span class="miBck"><a href="<?php echo $bckUrl; ?>"><i class="ti-arrow-left"></i></a></span> -->
			</div>

			<div class="col-md-12 col-lg-12">

				<div class="row row-sm amiCrd">
					<div class="col-sm-3">
						<label class="">Daily Attendance</label>
						<select class="form-control select select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
							<option value="">All Departments</option>
							<option value="HR">HR</option>
							<option value="Clerk">Clerk</option>
							<option value="Accounts">Accounts</option>
						</select>
					</div>
					<div class="col-sm-3">
						<label class="">Shift</label>
						<select class="form-control select select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
							<option value="">All Shift</option>
							<option value="HR">Day Shift</option>
							<option value="Clerk">Evening Shift</option>
							<option value="Accounts">Morning Shift</option>
						</select>
					</div>
					<div class="col-sm-3">
						<label class="">Date</label>
						<input type="text" class="form-control" id="date" name="date">
					</div>
					<div class="col-sm-3">
						<div style="padding-top: 1.8rem;">
							<button class="btn ripple btn-outline-success">Get Employes</button>
						</div>
					</div>
				</div>

				<input type="hidden" id="daily_attendance" value="<?php echo $daily_attendance; ?>" />
				<div class="row row-sm" id="amiResult">
					<table class="table text-nowrap text-md-nowrap table-striped table-bordered table-hover mg-b-0" id="daily_attendance_list">
						<thead class="ami_tHeader">
							<tr>
								<th style="color: #fff;">S. No. </th>
								<th style="color: #fff;">ID</th>
								<th style="color: #fff;">Employee Name</th>
								<th style="color: #fff;">Attendance By </th>
								<th style="color: #fff;">Shift</th>
								<th style="color: #fff;">In-Time</th>
								<th style="color: #fff;">Out-Time</th>
								<th style="color: #fff;">Status</th>
								<th style="color: #fff;">Mark Attendance</th>
							</tr>
						</thead>
					</table>
				</div>

				<!-- <div class="row row-sm" id="amiResult">

					<table class="table text-nowrap text-md-nowrap table-hover mg-b-0">
						<thead class="ami_tHeader">
							<tr>
								<th>S. No. </th>
								<th>ID</th>
								<th>Employee Name</th>
								<th>Attendance By </th>
								<th>Shift</th>
								<th>In-Time</th>
								<th>Out-Time</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">1</th>
								<th scope="row">Emp1</th>
								<td>Joan Powell</td>
								<td>Joan Powell</td>
								<td>Evening Shift </td>
								<td>2:00Pm</td>
								<td>10:00Am</td>
								<td><span class="badge bg-dark mibdge">On Leave</span></td>
							</tr>
							<tr>
								<th scope="row">2</th>
								<th scope="row">Emp2</th>
								<td>Gavin Gibson</td>
								<td>Gavin Gibson</td>
								<td>Day</td>
								<td>10:00Am</td>
								<td>6:00Pm</td>
								<td><span class="badge bg-danger mibdge">Absent</span></td>
							</tr>
							<tr>
								<th scope="row">3</th>
								<th scope="row">Emp3</th>
								<td>Julian Kerr</td>
								<td>Julian Kerr</td>
								<td>Morining Shift </td>
								<td>2:00Am</td>
								<td>10:00Am</td>
								<td><span class="badge bg-success mibdge">Present</span></td>
							</tr>
							<tr>
								<th scope="row">4</th>
								<th scope="row">Emp4</th>
								<td>Cedric Kelly</td>
								<td>Cedric Kelly</td>
								<td>Morining Shift</td>
								<td>2:00Am</td>
								<td>10:00Am</td>
								<td><span class="badge bg-secondary mibdge">Late</span></td>
							</tr>
							<tr>
								<th scope="row">5</th>
								<th scope="row">Emp5</th>
								<td>Samantha May</td>
								<td>Samantha May</td>
								<td>Morining Shift</td>
								<td>2:00Am</td>
								<td>10:00Am</td>
								<td><span class="badge bg-success mibdge">Present</span></td>
							</tr>
						</tbody>
					</table>


					<div class="listgroup-example">
						<ul class="list-group">
							<li>Notes :-
								<ul class="list-group checked">
									<li class="list-group-item">
										<i class="fe fe-check me-3 tx-13" aria-hidden="true"></i>
										You can mark attendance manually here.
									</li>
									<li class="list-group-item">
										<i class="fe fe-check me-3 tx-13" aria-hidden="true"></i>
										<div style="margin: -1.3rem 0px 0px 2rem;">Please select the date you want to
											mark attendance and click on "Get Employees".Shift start and end times will
											be autofilled in textbox. You can modify it according to you.</div>
									</li>
									<li class="list-group-item">
										<i class="fe fe-check me-3 tx-13" aria-hidden="true"></i>
										Once done your changes - please click on submit.
									</li>
									<li class="list-group-item">
										<i class="fe fe-check me-3 tx-13" aria-hidden="true"></i>
										You can get attendance reports in "Attendance Report" Menu.
									</li>


								</ul>
							</li>
						</ul>
					</div>



				</div> -->

			</div>
		</div>
		<!-- End Row -->
	</div>

	<style>
		.amiCrd {
			background-color: #f0f0f0;
			margin-bottom: 15px;
			padding: 10px 0px 10px 0px;
			border: 1px solid #e3e2e3;
		}

		.listgroup-example {
			height: 20rem;
		}

		.mibdge {
			padding: 6px 0px 6px 0px;
			width: 70px;
		}

		.ami_tHeader {
			background-color: #088;
		}

		.ami_tHeader>tr>th {
			color: #fff
		}
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
<script src="<?php echo base_url() ?>assets/js/setting/daily_attendance.js"></script>
