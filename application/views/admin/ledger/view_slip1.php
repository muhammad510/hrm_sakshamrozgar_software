 <!-------------------- @mit Code Changes Here Start -------------------->                     
    <div class="row row-sm" style="margin:15px -10px 15px -10px;">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header  border-0"> <h4 class="card-title">Payslip Summary</h4> </div> 
                <div class="card-body">   
                   <div class="row row-sm">
                   	   <div class="row">
                          <div class="col-md-3">
                                <div class="slipImg">
                                   <img src="<?php echo base_url('media/images/pySlipLogin.png');?>">
                           		</div>
                           </div>
                           <div class="col-md-9">
                               <address>
                                    <div class="cmpniHd"><?php echo config_item('company_name'); ?></div>
                                   <div class="text-center"> 
                                	
                                    <!--<div class="cmpniReg">REG. OFFICE : </div>-->
										<div class="cmpniAdr">
											<?php echo config_item('address'); ?>
										</div>
									
                                     <div class="cmpniOthr">
                               	        	<?php echo config_item('email'); ?><br />
                               		        <?php echo config_item('mobile_number'); ?>
                                    </div>
									</div>
                                </address>
                           </div>
						</div>                   			
<div class="col-md-12">
	<div class="text-center slfMnth"> Payment slip for the month of <strong>June 2021</strong> </div>
<div class="row">
<!---->
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-6">
				<div class="row empDet">
						<div class="col-md-6 "><span class="stTxt">Branch</span><span class="spn">:</span></div>
						<div class="col-md-6"><span class="stDet">ROHINI</span></div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-6">
				<div class="row empDet">
						<div class="col-md-6 "><span class="stTxt">Name</span><span class="spn">:</span></div>
						<div class="col-md-6"><span class="stDet">Amit Kumar</span></div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row empDet">
						<div class="col-md-6 "><span class="stTxt">Month</span><span class="spn">:</span></div>
						<div class="col-md-6"><span class="stDet">January 2024</span></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="row empDet">
						<div class="col-md-6 "><span class="stTxt">Employee ID</span><span class="spn">:</span></div>
						<div class="col-md-6"><span class="stDet">34895489</span></div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row empDet">
						<div class="col-md-6 "><span class="stTxt">Pay Date</span><span class="spn">:</span></div>
						<div class="col-md-6"><span class="stDet">10/01/2024</span></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="row empDet">
						<div class="col-md-6 "><span class="stTxt">Designation</span><span class="spn">:</span></div>
						<div class="col-md-6"><span class="stDet">Developer</span></div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row empDet">
						<div class="col-md-6 "><span class="stTxt">No. of days Worked</span><span class="spn">:</span></div>
						<div class="col-md-6"><span class="stDet">20</span></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="row empDet">
						<div class="col-md-6 "><span class="stTxt">Account Number</span><span class="spn">:</span></div>
						<div class="col-md-6"><span class="stDet">1804000100041861</span></div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row empDet">
						<div class="col-md-6 "><span class="stTxt">P.F Number</span><span class="spn">:</span></div>
						<div class="col-md-6"><span class="stDet">2983479380</span></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="row empDet">
						<div class="col-md-6 "><span class="stTxt">PAN No.</span><span class="spn">:</span></div>
						<div class="col-md-6"><span class="stDet">BKMPK$4221L</span></div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row empDet">
						<div class="col-md-6 "><span class="stTxt">Confirmed Salary</span><span class="spn">:</span></div>
						<div class="col-md-6"><span class="stDet">200000/-</span></div>
				</div>
			</div>
		</div>
		
		
	</div>

<div class="col-md-12">
 <div style="padding-left:10px;margin-top: 20px;">
  <div class="row"> 
  	<div class="table-responsive">	
	   <table class="table  text-nowrap text-md-nowrap table-bordered  mg-b-0"><!-- table-striped-->
		 <thead class="ami_tHeader">
			 <tr>
				<th>Earnings</th>
				<th>Amount</th>
				<th>Deductions</th>
				<th>Amount</th>
			  </tr>
		  </thead>
			   <tbody>
					<tr>
							<td><span class="miSpns">Basic</span></td><td><span class="miBld">29000</span></td><td><span class="miSpns">Provident Fund</span></td>
							<td><span class="miBld">1900</span></td>
					</tr>
					<tr><td><span class="miSpns">House Rent Allowance</span></td><td><span class="miBld">2000</span></td><td><span class="miSpns">Professional Tax</span></td>
					<td><span class="miBld">600</span></td></tr>
					<tr>
					     <td><span class="miSpns">Special Allowance</span></td><td><span class="miBld">400</span></td><td><span class="miSpns">Income Tax</span></td>
					     <td><span class="miBld">500</span></td>
					</tr>
					<tr><td><span class="miSpns">Conveyance</span></td><td colspan="3"><span class="miBld">3000</span></td></tr>
					<tr><td><span class="miSpns">Add Special Allowance</span></td><td colspan="3"><span class="miBld">2000</span></td></tr><tr>
					  <td><span class="miSpns">Shift Allowance</span></td><td colspan="3"><span class="miBld">1000</span></td></tr>
					<tr><td><span class="miSpns">Bonus</span></td><td colspan="3"><span class="miBld">500</span></td></tr>
					<tr><td><span class="miSpns">Medical Allowance</span></td><td colspan="3"><span class="miBld">600</span></td></tr>
					<tr><th>Gross Earnings</th><td><span class="miBld">Rs.38500</span></td><th>Gross Deductions</th><td><span class="miBld">Rs.3000</span></td></tr>
					<tr><td></td><td><strong>NET PAY</strong></td><td colspan="2"><span class="miBld">Rs.35500</span></td></tr>
				 </tbody>
			</table>
    </div>
  </div>
  </div>
</div>	
	
	
</div>
<div class="d-flex justify-content-end">
<div class="d-flex flex-column mt-2" style="margin:3rem 0px 3rem 0px;"> <span class="mt-4">Authorised Signatory</span> </div>
</div>
</div>
<div class="col-md-12">
<a href="<?php echo base_url('employee/payslip');?>" class="btn ripple btn-outline-primary"><i class="fe fe-arrow-left"></i> Back </a>
</div>
                   </div>  
                </div>
            </div>
        </div>
    </div>
    
    
<style>
.miSpns{font-weight:400;}.miBld{ font-weight:900 !important;}
.ami_tHeader > tr > th{ padding: 13px 0px 13px 15px !important;}
.slipImg{text-align:right;}
.slipImg img{ height:150px; width:180px;}
.cmpniHd{font-size:2rem;font-weight: bold;color: #004195; font-family: Tahoma, sans-serif;text-align: center;}
.cmpniAdr{width:50%;margin:-10px 0rem 5px 12rem;font-size:1rem;font-weight:500;text-align: center;}
.cmpniOthr{ font-size:.9rem;}
.slfMnth{border: 1px dashed #fff;padding: 10px;font-size: 1rem;background-color: #011b59;color: #fff;margin-bottom: 15px;}
.empDet{ color: #717171;font-weight: normal;padding: 2px 0px 2px 0px;}
.empDet .spn{ font-weight:900;float:right;color:#666666;}
.empDet .stTxt{ padding-left:20px;}
.empDet .stDet{ font-weight:900;color:#000;text-transform:uppercase;}
</style>
 <!-------------------- @mit Code Changes Here End ---------------------->
