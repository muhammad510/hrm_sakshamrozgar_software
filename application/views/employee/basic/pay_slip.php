<style>
.dataTables_processing{ background-color:#DCC392 !important; color:#805400;}
</style>

 <!-------------------- @mit Code Changes Here Start -------------------->                     
     <div class="row row-sm" style="margin:15px -10px 15px -10px;">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header  border-0"> <h4 class="card-title">My Payslips Summary </h4> </div> 
                <div class="card-body">   
                    <form method="post" id="search_details">
                    <div class="row row-sm">
                        <div class="col-lg-6 col-md-6">
                            <div class="row"> 
                              <div class="col-md-6"> 
                                  <div class="form-group"> 
                                    <label class="form-label">From:</label> 
                                     <div class="input-group">
                                        <div class="input-group-text border-end-0">
                                            <i class="fe fe-calendar lh--9 op-6"></i>
                                        </div>
                                        <input type="text"  id="strtDt" name="strtDt" class="form-control fc-datepicker dtClean" placeholder="MM/DD/YYYY" >
                                    </div> 
                                   </div> 
                              </div> 
                              <div class="col-md-6">
                               <div class="form-group">
                                <label class="form-label">To:</label> 
                                  <div class="input-group">
                                        <div class="input-group-text border-end-0">
                                            <i class="fe fe-calendar lh--9 op-6"></i>
                                        </div>
                                        <input type="text" id="endDt" name="endDt"  class="form-control fc-datepicker dtClean" placeholder="MM/DD/YYYY">
                                    </div>
                              </div>
                             </div>
                            </div>                                                                                            
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="row"> 
                              <div class="col-md-5"> 
                                  <div class="form-group"> 
                                    <label class="form-label">Month:</label> 
                                         <select name="attStatus" id="attStatus" class="form-control custom-select select2">
                                             <option label="Select Status"></option> 
                                             <option value=" ">All</option> 
                                             <option value="01">January</option> 
                                             <option value="02">February</option>
                                             <option value="03">March</option>
                                             <option value="04">April</option>
                                             <option value="05">May</option>
                                             <option value="06">June</option>
                                             <option value="07">July</option> 
                                             <option value="08">August</option>
                                             <option value="09">September</option>
                                             <option value="10">October</option>
                                             <option value="11">November</option>
                                             <option value="12">December</option>
                                           </select> 
                                   </div> 
                              </div> 
                              <div class="col-md-4">
                               <div class="form-group">
                                <label class="form-label">Year:</label> 
                                    <select name="yrWise" id="yrWise" class="form-control custom-select select2 arvChange">
                                        <option label="Select Year"></option> 
                                            <option value="1">2024</option> 
                                            <option value="2">2023</option>
                                            <option value="3">2022</option>
                                            <option value="4">2021</option>
                                            <option value="5">2020</option> 
                                        </select>
                              </div>
                             </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                     <label class="form-label">&nbsp;</label>  
                              <button class="btn ripple btn-outline-success" type="submit" onClick="return get_search(reportAppearance,'#search_details','#reportAppearance')">
                                     <i class="si si-magnifier"></i> Search
                              </button>
                                 </div>
                              </div>
                            </div>                                                                                            
                        </div>
                    </div>
                
                </form>
                </div>
               <input type="hidden" id="target" value="<?php echo $target;?>" > 
                  <div class="card-body">
                  <?php //echo date('M');?>
                    <div class="table-responsive">
                        <div class="row row-sm">
                            <table class="table text-nowrap text-md-nowrap table-striped table-bordered table-hover mg-b-0" id="reportAppearance">
                                <thead class="ami_tHeader">
                                     <tr>
                                        <th>S. No.</th>
                                        <th>Tnx. ID</th>
                                        <th>Month</th>
                                        <th>Year</th>
                                        <th>Net Salary</th>
                                         <th>Payment Mode</th>
                                        <th>Generated Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<tr>
                                    	<td  class="text-center">1.</td>
                                        <td  class="text-center">#10029</td>
                                        <td>January</td><td>2021</td>
										<td>$32,000</td>
										<td>01-02-2021</td>
                                        <td>
                                            <div class="text-center">
                                              <a class="btn btn-primary btn-sm btnIcn" data-bs-toggle="tooltip" data-original-title="View"><i class="fe fe-eye"></i></a> 
											  <a class="btn btn-success  btn-sm btnIcn" data-bs-toggle="tooltip" data-original-title="Download"><i class="fe fe-download"></i></a>
											  <a class="btn btn-info  btn-sm btnIcn" data-bs-toggle="tooltip" data-original-title="Print" onclick="javascript:window.print();">
											  	<i class="fe fe-printer"></i>
											  </a>
											  <a class="btn btn-warning  btn-sm btnIcn" data-bs-toggle="tooltip" data-original-title="Share"><i class="fe fe-share-2"></i></a> 
                                            </div>
                                        </td>
                                    </tr>
                                    
                                </tbody>   
                            </table>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
<!--  <div class="modal" id="viewSalSlipDetails">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Large Modal</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                <span aria-hidden="true"><i class="fe fe-x"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Modal Body</h6>
                 <div class="row">
        <div class="col-md-12">
            <div class="text-center lh-1 mb-2">
                <h6 class="fw-bold">Payslip</h6> <span class="fw-normal">Payment slip for the month of June 2021</span>
            </div>
            <div class="d-flex justify-content-end"> <span>Working Branch:ROHINI</span> </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-6">
                            <div> <span class="fw-bolder">EMP Code</span> <small class="ms-3">39124</small> </div>
                        </div>
                        <div class="col-md-6">
                            <div> <span class="fw-bolder">EMP Name</span> <small class="ms-3">Ashok</small> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div> <span class="fw-bolder">PF No.</span> <small class="ms-3">101523065714</small> </div>
                        </div>
                        <div class="col-md-6">
                            <div> <span class="fw-bolder">NOD</span> <small class="ms-3">28</small> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div> <span class="fw-bolder">ESI No.</span> <small class="ms-3"></small> </div>
                        </div>
                        <div class="col-md-6">
                            <div> <span class="fw-bolder">Mode of Pay</span> <small class="ms-3">SBI</small> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div> <span class="fw-bolder">Designation</span> <small class="ms-3">Marketing Staff (MK)</small> </div>
                        </div>
                        <div class="col-md-6">
                            <div> <span class="fw-bolder">Ac No.</span> <small class="ms-3">*******0701</small> </div>
                        </div>
                    </div>
                </div>
                <table class="mt-4 table table-bordered">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">Earnings</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Deductions</th>
                            <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Basic</th>
                            <td>16250.00</td>
                            <td>PF</td>
                            <td>1800.00</td>
                        </tr>
                        <tr>
                            <th scope="row">DA</th>
                            <td>550.00</td>
                            <td>ESI</td>
                            <td>142.00</td>
                        </tr>
                        <tr>
                            <th scope="row">HRA</th>
                            <td>1650.00 </td>
                            <td>TDS</td>
                            <td>0.00</td>
                        </tr>
                        <tr>
                            <th scope="row">WA</th>
                            <td>120.00 </td>
                            <td>LOP</td>
                            <td>0.00</td>
                        </tr>
                        <tr>
                            <th scope="row">CA</th>
                            <td>0.00 </td>
                            <td>PT</td>
                            <td>0.00</td>
                        </tr>
                        <tr>
                            <th scope="row">CCA</th>
                            <td>0.00 </td>
                            <td>SPL. Deduction</td>
                            <td>500.00</td>
                        </tr>
                        <tr>
                            <th scope="row">MA</th>
                            <td>3000.00</td>
                            <td>EWF</td>
                            <td>0.00</td>
                        </tr>
                        <tr>
                            <th scope="row">Sales Incentive</th>
                            <td>0.00</td>
                            <td>CD</td>
                            <td>0.00</td>
                        </tr>
                        <tr>
                            <th scope="row">Leave Encashment</th>
                            <td>0.00</td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <th scope="row">Holiday Wages</th>
                            <td>500.00</td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <th scope="row">Special Allowance</th>
                            <td>100.00</td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <th scope="row">Bonus</th>
                            <td>1400.00</td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <th scope="row">Individual Incentive</th>
                            <td>2400.00</td>
                            <td colspan="2"></td>
                        </tr>
                        <tr class="border-top">
                            <th scope="row">Total Earning</th>
                            <td>25970.00</td>
                            <td>Total Deductions</td>
                            <td>2442.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-4"> <br> <span class="fw-bold">Net Pay : 24528.00</span> </div>
                <div class="border col-md-8">
                    <div class="d-flex flex-column"> <span>In Words</span> <span>Twenty Five thousand nine hundred seventy only</span> </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <div class="d-flex flex-column mt-2"> <span class="fw-bolder">For Kalyan Jewellers</span> <span class="mt-4">Authorised Signatory</span> </div>
            </div>
        </div>
    </div>
            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-outline-secondary" data-bs-dismiss="modal" type="button"><i class="si si-close"></i> Close</button>
                <button class="btn ripple btn-outline-success" type="button"><i class="si si-printer"></i> Print Slip</button>
            </div>
        </div>
    </div>
</div>  
    -->
    
    
    
 <!-------------------- @mit Code Changes Here End ---------------------->
 <script src="<?php echo base_url('assets/js/employee/pay_slips.js');?>"></script>