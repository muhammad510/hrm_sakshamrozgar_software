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
#vCreateNew{ min-height:350px;}
#employeeSetPyroll{ display:none;}
#empSalWord{ text-transform:capitalize;}
</style>
	<div class="page-header">
		<div>
			<h2 class="main-content-title tx-24 mg-b-5">
				<?php echo $title; ?>
			</h2>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url('staff/dashboard'); ?>">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Salary Master</li>
			</ol>
		</div>
		<div class="d-flex">
            <div class="justify-content-center">
              <a href="<?php echo base_url('admin/employee/add_employee');?>" class="btn btn-success btn-icon-text my-2 me-2"  title="Join Employee">
              	 <i class="fe fe-plus"></i> Join Employee 
              </a>
              <button type="button" class="btn btn-primary btn-icon-text my-2 me-2" id="miArvClk"> <i class="fe fe-filter me-2"></i> Current Time </button>
              <a href="<?php echo base_url('auth/login/signout');?>" class="btn btn-danger btn-icon-text  my-2 me-2"> <i class="fe fe-power me-2"></i> Sign Out </a>
            </div>
          </div>
	</div>
<!---------------------------Search Panel Start------------------------------------------>
<div class="row row-sm" id="searchPayrolDetails">
<div class="cardTtl">
	<div class="miHeader"><span class="miLst"><i class="pe-7s-cash"></i>Search Salary Details</span></div>
		<form method="post" id="search_payroll"> 	            
            <div class="col-md-12 col-lg-12">
            	<?php //print_r($desigList);?>
                <div class="row row-sm">      
                    <div class="col-6">
                        <label>Employee Id:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-puzzle"></i></span>
                            </div>
                            <input type="text" class="form-control" name="empIdSrch" id="empIdSrch">
                        </div>
                    </div>
                     <div class="col-6">
                        <label>Paid Status:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                            </div>
                            <div class="miSlwdth" style="width:92.33%"> 
							   <select class="form-control select2-with-search arvOnChange" name="searchTyp" id="searchTyp">
                              		<option value=""> Choose one </option><option value="all"> All </option><option value="Paid"> Paid </option>
                                    <option value="Hold"> Hold</option><option value="Reject">Reject</option><option value="Unpaid"> Unpaid </option>
                            </select>  
                            </div>
                        </div>
                    </div>
                     <div class="col-6">
                        <label>Start Date:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-puzzle"></i></span>
                            </div>
                            <input type="text" class="form-control fc-datepicker" name="strtDt" id="strtDt"  placeholder="MM/DD/YYYY">
                        </div>
                    </div>
                     <div class="col-6">
                        <label>End Date:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-puzzle"></i></span>
                            </div>
                            <input type="text" class="form-control fc-datepicker" name="endDt" id="endDt"  placeholder="MM/DD/YYYY">
                        </div>
                    </div>
                     <div class="col-md-12">
                       <a href="javascript:void(0)"  class="btn ripple btn-outline-dark srchPanel" >
							<i class="fe fe-arrow-left"></i> Back</a>
                            <button class="btn ripple btn-outline-success pull-right" onclick="return get_search(reportExpns,'#search_payroll','#getReportMiDetails')">
                            	<i class="ti-search"></i> Search
                            </button>
                    </div>
                </div>
		    </div>
         </form>
	</div>
</div>

<!---------------------------Search Panel End-------------------------------------------->

	<!-- Row -->
	<div class="row row-sm">
		<div class="cardTtl">
			<div class="miHeader">
				<span class="miLst"><i class="pe-7s-cash"></i><span id="mstrTitle">
						<?php echo $title; ?>
					</span></span>
				<!-- <span class="miBck"><a href="<?php echo $bckUrl; ?>"><i class="ti-arrow-left"></i></a></span> -->
				<span class="miBck">
					<a href="javascript:void(0);" style="margin-left:-5px;" id="srchBtn" title="Click to search details"
						class="miDefault srchPanel">
						<i class="ti-search"></i>
					</a>
				</span>
				<span class="miBck" id="miAdMv">
					<a href="javascript:void(0);" style="margin-left:-5px;" data-id="Add New Salary " title="Click to add salary details" class="miAction" id="AddNew">
						<i class="ti-plus"></i>
					</a>
				</span>
			</div>
			<div class="row row-sm">
				
              
                
                
                <input type="hidden" id="target" value="<?php echo $target; ?>" />
                <div id="viewSalaryPaid">
                		<div class="col-md-12">
                        	<div class="row row-sm">
                   	  			<div class="row">
                                		<div class="slipImg">
                                 		  <img src="<?php echo base_url('uploads/company/payslip_heading.png');?>">
                           				</div>
								</div>                   			
                                <div class="col-md-12">
                                    <div class="text-center slfMnth"> Payslip for <strong><span class="payMnth">June 2021</span></strong> </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row empDet">
                                                            <div class="col-md-6 "><span class="stTxt">Branch</span><span class="spn">:</span></div>
                                                            <div class="col-md-6"><span class="stDet" id="bmShw">Hindustan Chemicals </span></div>
                                                    </div>
                                                </div>
                                            </div>   
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row empDet">
                                                            <div class="col-md-6 "><span class="stTxt">Name</span><span class="spn">:</span></div>
                                                            <div class="col-md-6"><span class="stDet" id="empNmShw">Amit Kumar</span></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row empDet">
                                                            <div class="col-md-6 "><span class="stTxt">Month</span><span class="spn">:</span></div>
                                                            <div class="col-md-6"><span class="stDet payMnth">&nbsp;</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row empDet">
                                                            <div class="col-md-6 "><span class="stTxt">Employee ID</span><span class="spn">:</span></div>
                                                            <div class="col-md-6"><span class="stDet" id="empIdShw">&nbsp;</span></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row empDet">
                                                            <div class="col-md-6 "><span class="stTxt">Pay Date</span><span class="spn">:</span></div>
                                                            <div class="col-md-6"><span class="stDet" id="pyDate">&nbsp;</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row empDet">
                                                            <div class="col-md-6 "><span class="stTxt">Designation</span><span class="spn">:</span></div>
                                                            <div class="col-md-6"><span class="stDet" id="empDesgShw">&nbsp;</span></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row empDet">
                                                            <div class="col-md-6 "><span class="stTxt">No. of days Worked</span><span class="spn">:</span></div>
                                                            <div class="col-md-6"><span class="stDet" id="wrkngDy">&nsub;</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row empDet">
                                                            <div class="col-md-6 "><span class="stTxt">Account Number</span><span class="spn">:</span></div>
                                                            <div class="col-md-6"><span class="stDet" id="empAcShw">&nbsp;</span></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row empDet">
                                                            <div class="col-md-6 "><span class="stTxt">P.F Number</span><span class="spn">:</span></div>
                                                            <div class="col-md-6"><span class="stDet">&nbsp;</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row empDet">
                                                            <div class="col-md-6 "><span class="stTxt">PAN No.</span><span class="spn">:</span></div>
                                                            <div class="col-md-6"><span class="stDet" id="empPanShw">&nbsp;</span></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row empDet">
                                                            <div class="col-md-6 "><span class="stTxt">Confirmed Salary</span><span class="spn">:</span></div>
                                                            <div class="col-md-6"><span class="stDet empSlAmtShw">&nbsp;</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="col-md-12">
                                         <div style="margin-top: 20px;">
                                          <div class="row"> 
                                            <div class="table-responsive">	
                                               <table class="table  text-nowrap text-md-nowrap table-bordered  mg-b-0">
                                                 <thead class="ami_tHeader">
                                                     <tr><th>Earnings</th><th>Amount</th><th>Deductions</th><th>Amount</th></tr>
                                                  </thead>
                                                       <tbody>
                                                            <tr>
                                                                <td><span class="miSpns">Basic</span></td><td><span class="miBld" id="slBasic">&nbsp;</span></td>
                                                                <td><span class="miSpns">Provident Fund</span></td><td><span class="miBld" id="slPf">&nbsp;</span></td>
                                                            </tr>
                                                            <tr><td><span class="miSpns">House Rent Allowance</span></td>
                                                            <td><span class="miBld" id="slHra">&nbsp;</span></td><td><span class="miSpns">Medical Allowance</span></td>
                                                            <td><span class="miBld" id="slAdv">&nbsp;</span></td></tr>
                                                            <tr>
                                                                 <td><span class="miSpns">Transportation Allowance</span></td><td><span class="miBld" id="slTa">&nbsp;</span> </td>
                                                                 <td><span class="miSpns">Tds</span></td><td><span class="miBld" id="slTds">&nbsp;</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td><span class="miSpns">Education Allowance</span></td><td><span class="miBld" id="slDa">&nbsp;</span></td>
                                                                <td>Mobile Allowance</td><td><span class="miBld" id="slInsur">&nbsp;</span></td>
                                                            </tr>
                                                            <tr>
                                                                 <td><span class="miSpns">Professional Development Allowance</span></td><td><span class="miBld" id="slPa">&nbsp;</span></td>
                                                                 <td>PT</td><td><span class="miBld" id="slOthrDed">&nbsp;</span></td>
                                                            </tr>
                                                            <tr><td><span class="miSpns">Bonus</span></td><td colspan="3"><span class="miBld" id="slBonus">&nbsp;</span></td></tr>
                                                            <tr><td>Special Allowance</td><td colspan="3"><span class="miBld" id="slMedi">&nbsp;</span></td></tr>
                                                            <tr><td>Insentive</td><td colspan="3"><span class="miBld" id="slInsent">&nbsp;</span></td></tr>
                                                            <tr><td>Other Income</td><td colspan="3"><span class="miBld" id="slOthrInc">&nbsp;</span></td></tr>
                                                            <tr><th>Gross Earnings</th><td><span class="miBld" id="slGrsAmt">&nbsp;</span></td>
                                                            <th>Gross Deductions</th><td><span class="miBld" id="gDeduct">&nbsp;</span></td></tr>
                                                            <tr><td></td><td><strong>NET PAY</strong></td><td colspan="2"><span class="miBld empSlAmtShw">&nbsp;</span></td></tr>
                                                             <tr><td></td><td colspan="3"><span class="miBld" id="empSalWord">&nbsp;</span></td></tr>
                                                         </tbody>
                                                    </table>
                                            </div>
                                          </div>
                                          </div>
                                        </div>	
                                    </div>
                                </div>
                                <div class="col-md-12">
                               		 <a href="javascript:void(0)" class="btn ripple btn-outline-primary miAction" id="viewMiBck"><i class="fe fe-arrow-left"></i> Back </a>
                                </div>
                  			 </div>
                        </div>     
				</div>
				<div id="vCreateNew">
					<span id="frSearchEmplyee"><?php echo $frSearchEmplyee; ?></span>
					<!----------------------------------------------------------------------------------------------->
                    	<div class="col-md-12">
                        <form method="post" id="approvedNow" data-id="<?php echo $aprovedPayrol;?>">	
                            <div class="row row-sm">
                              <div class="col-md-4">
                                    <label>Employee Name/Id : </label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="si si-user"></i></span></div>
										 <input type="text" id="fieldSrchIDorName" name="fieldSrchIDorName" class="form-control miKeyUp miClr" placeholder="Name Or ID" />
										 <input type="hidden" id="empSrchdID" name="empSrchdID"/>
                                    </div>
									<div class="mSrchPnl"><ul></ul></div>
                                </div>
                                <div class="col-md-3">
                                    <label>Month : </label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="si si-calendar"></i></span></div>
                                         <div class="miSlwdth" style="width:84%"> 
                                           <select class="form-control select2-with-search" id="salaryMonth" name="salaryMonth">
                                                <option value=""> Choose One </option>
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
                                    <label>Year : </label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="si si-event"></i></span></div>
                                         <div class="miSlwdth" style="width:84%"> 
                                           <select class="form-control select2-with-search" name="salaryYear" id="salaryYear" >
                                                <option value=""> Choose One </option>
										<?php 	
												$salYear=date('Y');
                                                for($x=0;$x<5;$x++)
                                        		{
                                        			$session=$salYear-$x;
													?>
                                                <option value="<?php echo $session;?>"><?php echo $session;?></option>
                                           <?php }?>
                                       	   </select>  
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                        <label>&nbsp;</label>
                                        <div class="input-group mb-3">
                                     <button class="btn ripple btn-outline-success miAction" style="float:right; margin-right:10px;" id="miSrchPyRl" data-id="<?php echo $empFrSearch;?>" type="button">
                                          <i class="ti-search"></i> Search
                                     </button>
                                     <button type="button" class="btn ripple btn-outline-danger miAction" id="clearDetails"><i class="ti-trash"></i></button>
                                        </div>
                                    </div> 
                            </div>
						 	
                            <div id="employeeSetPyroll">
							    <div class="miSalHeader">Salary Information</div> 
								 <div class="row row-sm">
                                    <div class="col-md-6">
                                        <label>Basic Salary : </label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-inr"></i></span></div>
                                             <input type="text" id="empBasicSal" readonly="readonly" name="empBasicSal" class="form-control miClr" />
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <label>Advance : </label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-inr"></i></span></div>
                                             <input type="text" id="empAdvance" name="empAdvance" class="form-control miClr" />
                                        </div>
                                    </div>
                                 </div>
                         	     <div class="miSalHeader">Allowances</div>  
                                            <div class="row row-sm">
                                                <div class="col-md-3">
                                                    <label>HRA : </label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-inr"></i></span></div>
                                                         <input type="text" id="empHra" name="empHra" class="form-control miClr" readonly="readonly" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>TA : </label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-inr"></i></span></div>
                                                         <input type="text" id="empTA" name="empTA" class="form-control miClr" readonly="readonly"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>EA : </label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-inr"></i></span></div>
                                                         <input type="text" id="empDA" name="empDA" class="form-control miClr" readonly="readonly"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>PDA : </label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-inr"></i></span></div>
                                                         <input type="text" id="empPA" name="empPA" class="form-control miClr" readonly="readonly"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Bonus : </label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-inr"></i></span></div>
                                                         <input type="text" id="empBonus" name="empBonus" class="form-control miClr" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Special Allowance : </label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-inr"></i></span></div>
                                                         <input type="text" id="empMedical" name="empMedical" class="form-control miClr" readonly="readonly"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Insentive : </label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-inr"></i></span></div>
                                                         <input type="text" id="empInsentive" name="empInsentive" class="form-control miClr" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Other Income : </label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-inr"></i></span></div>
                                                         <input type="text" id="empOthrInc" name="empOthrInc" class="form-control miClr" />
                                                    </div>
                                                </div>
                                             </div>
                                 <div class="miSalHeader">Deductions</div>   
                                         <div class="row row-sm">
                                            <div class="col-md-3">
                                                <label>Provident Fund : </label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-inr"></i></span></div>
                                                     <input type="text" id="empPF" name="empPF" class="form-control miClr" readonly="readonly"/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>TDS : </label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-inr"></i></span></div>
                                                     <input type="text" id="empTDS" name="empTDS" class="form-control miClr" readonly="readonly"/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Mobile Allowance : </label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-inr"></i></span></div>
                                                     <input type="text" id="empInsurance" name="empInsurance" class="form-control miClr" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>PT : </label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-inr"></i></span></div>
                                                     <input type="text" id="empOthrDeduction" name="empOthrDeduction" class="form-control miClr" />
                                                </div>
                                            </div>
                                          </div>   
                       			 <div class="miSalHeader">Gross Salary</div>   
                                        <div class="row row-sm">
                                            <div class="col-md-4">
                                                <label>Gross Salary : </label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-inr"></i></span></div>
                                                     <input type="text" id="empGrossSalary" name="empGrossSalary" class="form-control miClr" readonly="readonly"/>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Total Present : </label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="si si-event"></i></span></div>
                                                     <input type="text" id="empTotalPresent" name="empTotalPresent" class="form-control miClr" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Net Salary : </label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-inr"></i></span></div>
                                                     <input type="text" id="empNetSalary" name="empNetSalary" class="form-control miClr" />
                                                </div>
                                            </div>
                                         </div>   
                                    <div class="row row-sm">
                                        <div class="col-md-2"><label>Status :</label></div>
                                        <div class="col-md-2">
                                             <label class="colorinput">
                                                <input name="paySalStatus" type="radio" value="1" class="colorinput-input">
                                                <span class="colorinput-color bg-success"></span>
                                            </label>
                                            <div style="color:#19b159;margin: -37px 0px 0px 35px;">Paid</div>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="colorinput">
                                                <input name="paySalStatus" type="radio" value="0" class="colorinput-input">
                                                <span class="colorinput-color bg-orange"></span>
                                            </label>
                                            <div style="color:#ff9b21;margin: -37px 0px 0px 35px;">Pending</div>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="colorinput">
                                                <input name="paySalStatus" type="radio" value="2" class="colorinput-input">
                                                <span class="colorinput-color bg-primary"></span>
                                            </label>
                                            <div style="color:#4E45B3;margin: -37px 0px 0px 35px;">Hold</div>
                                        </div>
                                        <div class="col-md-4"> &nbsp;</div>
                                    </div> 	
                                  <div class="miFtrHdr">
                                        <a href="javascript:void(0)" class="btn ripple btn-outline-dark miAction" id="miBck" data-id="Salary Manage"> 
                                            <i class="ti-arrow-left"></i> Back
                                        </a>
                                        <button class="btn ripple btn-outline-success pull-right amiStl" id="aprSal"><i class="ti-save"></i> Submit</button>					
                                  </div>			
							</div>
                            <input name="empUserId" id="empUserId" type="hidden">
						 </form>	
                      </div>
					<!----------------------------------------------------------------------------------------------->
				</div>
				<div id="vTbleShw">
                					<div class="table-responsive">
						<table class="table text-nowrap text-md-nowrap table-striped table-bordered table-hover mg-b-0 " id="getReportMiDetails">
							<thead class="ami_tHeader">
								<tr>
									<th><div style="width:60px;">S.No.</div></th>
									<th>Tnx. ID</th>
									<th>Emp ID</th>
									<th>Employee Name</th>
									<th>Month-Year</th>
									<th>Designation.</th>
									<th>Salary</th>
									<th>Generated Date</th>
									<th>Status</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="<?php echo base_url('assets/js/admin/payroll.js'); ?>"></script>
