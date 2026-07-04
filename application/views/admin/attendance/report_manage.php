<div class="inner-body">                       
	<!-- Page Header -->
	<div class="page-header">
		<div>
			<h2 class="main-content-title tx-24 mg-b-5"><?php echo $title;?></h2>
			<ol class="breadcrumb"><li class="breadcrumb-item"><a href="javascript:void(0);">View</a></li><li class="breadcrumb-item active" aria-current="page">All</li></ol>
		</div>
		<div class="d-flex">
			<div class="justify-content-center">
				<button type="button" class="btn btn-white btn-icon-text my-2 me-2"><i class="fe fe-download me-2"></i> Import</button>
				<button type="button" class="btn btn-white btn-icon-text my-2 me-2 attenManage" id="attendanceSearch"><i class="ti-search"></i> Search </button>
				<a href="<?php echo base_url('admin/attendance/report');?>" class="btn btn-primary my-2 btn-icon-text"> 
                	<i class="fe fe-download-cloud me-2"></i> Download Report
                </a>
			</div>
		</div>
	</div>
	<!-- End Page Header -->
<div class="row row-sm" id="searchAttendanceDetails">
<div class="cardTtl">
	<div class="miHeader"><span class="miLst"><i class="si si-screen-desktop"></i>Search Employee Attendance Details</span></div>
		<form method="post" id="search_Attendance"> 	            
            <div class="col-md-12 col-lg-12">
            	<?php //print_r($getState);?>
                <div class="row row-sm">
                  
                    <div class="col-md-3">
                        <label>Departments:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                            </div>
                            <div class="miSlwdth"> 
							 <select class="form-control select select2-with-search">
                                    <option value="">Select</option>
                                     <option value="all">All</option>
                                    <?php if($designation){foreach($designation as $design){?>
                                          <option value="<?php echo $design->id;?>"><?php echo $design->designation_name;?></option>
                                	<?php }}else{?>
                                    	<option value="noAvailable">No Designation Available</option>
                                    <?php }?>
                                </select>
							</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Shift:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-puzzle"></i></span>
                            </div>
                           <div class="miSlwdth"> 
							 <select class="form-control select select2-with-search" id="shiftDet" name="shiftDet">
                                    <option value="">Select</option>
                                    <option value="all">All</option>
                                    <?php if($shiftMstr){foreach($shiftMstr as $shift){?>
                                          <option value="<?php echo $shift->id;?>"><?php echo $shift->shift_name;?></option>
                                	<?php }}else{?>
                                    	<option value="noAvailable">No Shift Available</option>
                                    <?php }?>
                                </select>
							</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Month:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-grid"></i></span>
                            </div>
                            <div class="miSlwdth"> 
							 <select class="form-control select select2-with-search" id="monthSearch" name="monthSearch">
                                    <option value="">Select</option>
                                    <option value="all">All</option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
							</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Year:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-grid"></i></span>
                            </div>
                            <div class="miSlwdth"> 
							 <select class="form-control select2-with-search"  id="yearSearch" name="yearSearch">
                                 <option value=""> Choose One </option>
                                    <?php $salYear=date('Y');for($x=0;$x<5;$x++){$session=$salYear-$x;?>
                                    <option value="<?php echo $session;?>"><?php echo $session;?></option>
                                   <?php }?>
                             </select> 
							</div>
                        </div>
                    </div>
                    <div class="col-md-12">
                       <a href="javascript:void(0)"  class="btn ripple btn-outline-dark attenManage" id="bkSrch">
							<i class="fe fe-arrow-left"></i> Back</a>
                            <button class="btn ripple btn-outline-success pull-right attenManage" onclick="return get_search(reportAttendance,'#search_Attendance','#attendance_details')" id="getMnth" data-id="<?php echo $attMonthwise;?>">
                            	<i class="ti-search"></i> Search
                            </button>
                    </div>
                </div>
		    </div>
         </form>
	</div>
</div>


<div class="row row-sm">
		<div class="cardTtl">
			<div class="miHeader">
				<span class="miLst"><i class="si si-screen-desktop"></i><span id="bxTitleNm"><?php echo $title;?></span></span>
				<!--<span class="miBck">
                	<a href="javascript:void(0);" style="margin-left:-5px;" title="Click to search attendance details" class="miDefault attenManage" id="attendanceSearch">
                    	<i class="ti-search"></i>
                    </a>
                </span>-->
			</div>
			<div class="col-md-12 col-lg-12"> 
            	<?php //?> 
                <div class="row row-sm" id="amiLeaveList">
                 	<div class="table-responsive">
                    <table class="table text-nowrap text-md-nowrap table-striped table-bordered table-hover mg-b-0" id="attendance_details">
                        <thead class="ami_tHeader">
                            <tr id="setMonthWise">
                                <th><div class="thCl">S.N.</div></th>
                                <th><div class="thCl">EMP. ID</div></th>
                                <th><div class="thCl">EMPLOYEE NAME</div></th>
                                <?php for ($i = 1; $i <= $dayInMonth; $i++) : ?><th><div class="thCl"><?php echo $i; ?></div></th><?php endfor; ?>
                                <th><div class="thCl">T. Present</div></th>
								<th><div class="thCl">T. Absent</div></th>
								<th><div class="thCl">T. Leave</div></th>
                            </tr>
                        </thead>
                    </table>
                    
                  <?php 
				  		/*$arr=array();
						for ($i = 1; $i <= $dayInMonth; $i++) : array_push($arr,$i);endfor;
						print_r($arr);*/
						
						 ?>
                    
                    
                  </div>
                 	<div class="listgroup-example">
						<ul class="list-group">
							<li><span style="font-weight:900;">Notes :-</span>
								<ul class="list-group checked">
									<li class="list-group-item">
										<i class="fe fe-check me-3 tx-13" aria-hidden="true"></i>
										You can mark attendance manually here.
									</li>
									<li class="list-group-item">
										<i class="fe fe-check me-3 tx-13" aria-hidden="true"></i>
										<div style="margin: -1.3rem 0px 0px 2rem;">Please select the date you want to mark attendance and click on "Get Employees".Shift start and end times will be autofilled in textbox. You can modify it according to you.</div>
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
                </div>
		</div>
	</div>
	<!-- End Row -->
</div>

<input type="hidden" id="target" value="<?php echo $target;?>" />




	<style>
	.tdClBlank{ background-color:#000000;}
	.tdCl{ padding: 8px 10px 8px 10px; margin: -11px -8px -10px -8px; text-align: center;}
	.thCl{ padding: 0px 25px 0px 5px; margin: 0px;}
.prsnt{color:#fff;background-color:green !important;text-align:center;font-weight: 600;}
.late{color:#fff;background-color:#CC7000 !important;text-align:center;font-weight: 600;}
.absnt{color:#fff !important;background-color:#F16D75 !important;text-align:center;font-weight: 600;}
.holDy{color:#fff;text-align:center;font-weight: 600;background-color:#0073d9 !important;}
.hfDy{color:#fff !important;text-align:center;font-weight: 600;background-color:#D9AD03 !important;}
.lve{color:#fff;text-align:center;font-weight: 600;background-color:#009EA6 !important;}
.snDy{color:#FDFDFD;text-align:center;background-color: #8c0303 !important;}
.n_aD{color:#535151;text-align:center;background-color: #e8ead9 !important;}	
.tSumry{ text-align:center;}	
	
	
	
	
	
	
	
	
	.miSlwdth{width:83.33%;/*width:92.33%*/}
		.miBck a:hover{ background-color:#645bca; color:#fff;}
		.miBck{ font-weight:600;text-transform: uppercase; float:right;margin-right: 10px;}
		.miBck a{ border:1px solid #645bca;padding: 8px 12px 8px 12px;border-radius: 5px;color: #645bca;font-weight: bold;}
		.miLst{ font-weight:600;text-transform: uppercase;}
		.miLst i{ background-color: #645bca;padding: 11px 11px 10px 10px ;margin-right: 10px;border-radius: 20px;color: #fff;font-weight: bold;}
		.miHeader{padding:14px 5px 14px 15px;border-bottom: 1px solid #cccece;margin: 5px -10px 20px -10px;border-top-left-radius: 5px;border-top-right-radius: 5px;}
		.cardTtl{border:1px solid #fff;padding:0px 0px 40px 0px;margin-bottom: 75px;border-radius: 5px;background-color: #fff;}
.ami_tHeader > tr > th{ color:#FFFFFF !important;border: 1px solid #088 !important;padding: 12px 0px 12px 5px !important;}
.ami_tHeader > tr{border: 1px solid #088 !important;  background-color: #088 !important;}
		/*,#newLeaveID,#amiLeaveAllChanges,#locTrgt{display:none;}*/
 #searchAttendanceDetails{ display:none; margin-bottom:-60px;}	   
	<!--#mnthWiseTReport{ display:none;}-->
	</style>
<div id="mnthWiseTReport">
dasdasdasdas
</div>

    
<script src="<?php echo base_url('db/html2canvas.min.js');?>"></script>

<!-- jsPDF library -->
<script src="<?php echo base_url('db/jspdf.umd.js');?>"></script>
<script>
	window.jsPDF = window.jspdf.jsPDF;
function downLoadPDF(targetUrl)
{
	
	$.post(targetUrl,{month:$('#monthSearch').val(),year:$('#yearSearch').val()},function(htmlAmi)
	{
		$('#mnthWiseTReport').html(htmlAmi);
		/*var doc = new jsPDF({orientation: 'landscape'});
		var elementHTML = document.querySelector("#mnthWiseTReport");
		doc.html(elementHTML,{callback:function(doc){doc.save('attendance-<?php echo date('F-Y')?>.pdf');},margin:[5,5,5,5],autoPaging:'text',x:0,y:0,width:190,windowWidth:825});*/
		});	
	/**/
}
</script>    
    
    
<script>
var reportAttendance = '';
$(document).ready(function() 
{
	 let searchObj = {};
    var target = $('#target').val();
	
    reportAttendance = {printTable: function(search_data) {getpaginate(search_data, '#attendance_details', target, 'Only For Id, Name.'); } }
	reportAttendance.printTable(searchObj);
	
	$(".attenManage").click(function()
	{
		let actNbtn = $(this).attr('id');
		if(actNbtn=='attendanceSearch' || actNbtn=='bkSrch')
		{
			$("i", "#attendanceSearch").toggleClass("ti-search ti-minus");
	  		$("#searchAttendanceDetails").toggle();
			}
			else if(actNbtn=='getMnth')
			{
				
				let targetUrl=$(this).attr('data-id');
				$.post(targetUrl,{month:$('#monthSearch').val(),year:$('#yearSearch').val()},function(htmlAmi)
				{
					$('#setMonthWise').html(htmlAmi);					
					setTimeout(function(){$('#attendance_details tbody td,thead th').each(function() {if ($(this).html().trim() === '') {$(this).remove();}});},2000);
					});
				}
		});
	});
</script>    
    
    
    
    