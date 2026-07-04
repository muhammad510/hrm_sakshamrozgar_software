                   
	
<style>
.ami_tHeader{background-color:#088;}
.ami_tHeader tr th{ border:1px solid #088; color:#fff;}
.btnIcn i{ color:#FFFFFF;}
</style>    
      
    
<!------------------------------------Changing Here Start-------------------------------------------->

    <div class="row row-sm" style="margin:15px -10px 0px -10px;">                              
        <div class="col-sm-12 col-lg-12 col-xl-12">
           <div class="card"> 
              <div class="card-header  border-0"> <h4 class="card-title">My Payslips Summary</h4> </div> 
              <div class="card-body pt-0 pb-3"> 
                <div class="row"> 
                      <div class="col-md-12 col-lg-12 col-xl-5"> 
                          <div class="row"> 
                              <div class="col-md-6"> 
                                  <div class="form-group"> 
                                    <label class="form-label">From:</label> 
                                     <div class="input-group"> 
                                        <div class="input-group-prepend"> 
                                            <div class="input-group-text"> 
                                                <i class="feather feather-calendar"></i> 
                                             </div> 
                                        </div>
                                        <input class="form-control fc-datepicker hasDatepicker" placeholder="19 Feb 2020" type="text" id="dp1705050872414"> 
                                      </div> 
                                   </div> 
                              </div> 
                              <div class="col-md-6">
                               <div class="form-group">
                                <label class="form-label">To:</label> 
                                  <div class="input-group">
                                   <div class="input-group-prepend">
                                    <div class="input-group-text">
                                         <i class="feather feather-calendar"></i> 
                                    </div> 
                                  </div>
                                  <input class="form-control fc-datepicker hasDatepicker" placeholder="19 Feb 2020" type="text" id="dp1705050872415">
                                </div>
                              </div>
                           </div>
                         </div>
                      </div> 
                      <div class="col-md-12 col-lg-12 col-xl-3">
                        <div class="form-group">
                          <label class="form-label">Month:</label>
                             <select name="attendance" class="form-control custom-select" data-placeholder="Select Month" tabindex="-1" aria-hidden="true">
                            	 <option label="Select Month"></option> 
                                 <option value="1">January</option> 
                                 <option value="2">February</option> 
                                 <option value="3">March</option>
                                 <option value="4">April</option>
                                 <option value="5">May</option>
                                 <option value="6">June</option>
                                 <option value="7">July</option>
                                 <option value="8">August</option>
                                 <option value="9">September</option>
                                 <option value="10">October</option>
                                 <option value="11">November</option>
                                 <option value="12">December</option> 
                             </select>
                           </div>
                         </div>
                         <div class="col-md-12 col-lg-12 col-xl-2">
                           <div class="form-group"> 
                             <label class="form-label">Year:</label> 
                             <select name="attendance" class="form-control custom-select select2 select2-hidden-accessible" data-placeholder="Select Year" tabindex="-1" aria-hidden="true"><option label="Select Year"></option> <option value="1">2024</option> <option value="2">2023</option> <option value="3">2022</option> <option value="4">2021</option> <option value="5">2020</option> <option value="6">2019</option> <option value="7">2018</option> <option value="8">2017</option> <option value="9">2016</option> <option value="10">2015</option> <option value="11">2014</option> <option value="12">2013</option> <option value="13">2012</option> <option value="14">2011</option> <option value="15">2019</option> <option value="16">2010</option> </select>
                           </div> 
                         </div>
                         <div class="col-md-12 col-lg-12 col-xl-2"> 
                         	<div class="form-group mt-5"> 
                            	<a href="javascript:void(0);" class="btn btn-primary btn-block">Search</a> 
                             </div>
                         </div>
                      </div>
					<div class="row">
						<div class="col-sm-12">
							<table class="table text-nowrap text-md-nowrap table-striped table-bordered table-hover mg-b-0" id="reportAppearance">
								<thead class="ami_tHeader">
									<tr>
										  <th>#ID</th>
										  <th>Month</th>
										  <th>Year</th>
										  <th>$ Net Salary</th>
										  <th>Generated Date</th>
										  <th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="text-center">#10029</td>
										<td>January</td><td>2021</td>
										<td class="fw-semibold">$32,000</td>
										<td>01-02-2021</td>
										<td> 
											  <a class="btn btn-primary  btn-sm " data-bs-toggle="tooltip" data-original-title="View"><i class="fe fe-eye"></i></a> 
											  <a class="btn btn-success  btn-sm" data-bs-toggle="tooltip" data-original-title="Download"><i class="fe fe-download"></i></a>
											  <a class="btn btn-info  btn-sm" data-bs-toggle="tooltip" data-original-title="Print" onclick="javascript:window.print();">
											  	<i class="fe fe-printer"></i>
											  </a>
											  <a class="btn btn-warning  btn-sm" data-bs-toggle="tooltip" data-original-title="Share"><i class="fe fe-share-2"></i></a> 
										</td>
									</tr>
										
									<tr>
										<td class="text-center">#10321</td>
										<td>December</td>
										<td>2020</td>
										<td class="fw-semibold">$28,000</td>
										<td>01-01-2021</td>
										<td>
											    <!--<div class="btn-icon-list">
													<button class="btn ripple btn-sm btn-primary btn-icon"><i class="fe fe-eye"></i></button>
													<button class="btn ripple btn-secondary btn-icon"><i class="fe fe-download"></i></button>
													<button class="btn ripple btn-success btn-icon"><i class="fe fe-printer"></i></button>
													<button class="btn ripple btn-info btn-icon"><i class="fe fe-share-2"></i></button>
												</div>
											-->
											
											 <a class="btn btn-primary  btn-sm" data-bs-toggle="tooltip" data-original-title="View"><i class="fe fe-eye"></i></a> 
											 <a class="btn btn-success  btn-sm" data-bs-toggle="tooltip" data-original-title="Download"><i class="fe fe-download"></i></a>
											 <a class="btn btn-info  btn-sm" data-bs-toggle="tooltip" data-original-title="Print" onclick="javascript:window.print();">
											 	<i class="fe fe-printer"></i>
											 </a> 
											<a class="btn btn-warning  btn-sm" data-bs-toggle="tooltip" data-original-title="Share"><i class="fe fe-share-2"></i></a> 
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
<!------------------------------------Changing Here End-------------------------------------------->   
    

		
			

