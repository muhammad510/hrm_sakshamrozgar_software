<div class="inner-body">                       
	<!-- Page Header -->
	<div class="page-header">
		<div>
			<h2 class="main-content-title tx-24 mg-b-5"><?php echo $title;?></h2>
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
    <?php 
		 /* print_r($mrkAttendance);
	      echo '<br>';
		  if($mrkAttendance['log_in_time']==''){echo 'Green';}else{ echo 'Danger'; }*/
	?>	
<style>
.arvWidth{width:5rem;}
.miMrgn{margin:15px 0px 15px 0px;}
</style>    
<div id="markPresent" style="display:none;"><?php echo $markPresentAction;?></div>        
    <div class="row row-sm">
        <div class="col-sm-12 col-lg-12 col-xl-3">
              <div class="card custom-card card-body micrd">
                   <div class="countdowntimer mt-0"> 
                        <span id="miClock" class="border-0 style size_md" style="background: transparent; color:#4268c1; border-color: transparent; font-weight:600;">
                        	13:54:13</span> <label class="mi-lebel">Current Time</label> 
                        </div>
                 <div class="btn-list text-center mt-3"> 
                    <a href="javascript:void(0);" class="btn arvActn ripple fntMi <?php if($mrkAttendance['log_in_time']==''){echo 'btn-outline-success';}else{ echo 'btn-outline-dark disabled';}?>" id="mrkPresentIn"><i class="fe fe-sunrise"></i> Clock In</a>  
                    <a href="javascript:void(0);" id="mrkPresentOut" class="btn arvActn ripple fntMi <?php if($mrkAttendance['log_out_time']==''){if($mrkAttendance['log_in_time']==''){echo 'btn-outline-dark disabled';}else{ echo 'btn-outline-success'; }}else{ echo 'btn-outline-dark disabled'; }?>"><i class="fe fe-sunset"></i> Clock Out</a> 
                 </div>
            </div>
        </div>
                            
                            <div class="col-sm-12 col-lg-12 col-xl-9">
                         	   <div class="card"> 
                                  <div class="card-header  border-0"> <h4 class="card-title">Days Overview This Month</h4> </div> 
                                  <div class="card-body pt-0 pb-3"> 
                                  	<div class="row mb-0 pb-0"> 
                                    	<div class="col-md-6 col-xl-2 text-center py-3"> 
                                        	<span class="avMi avMi-md bradius fs-20 bg-primary-mi">31</span> 
                                            <h5 class="mb-0 mt-3 miFntSz">Total Working Days</h5> 
                                         </div> 
                                         <div class="col-md-6 col-xl-2 text-center py-3 "> 
                                         	<span class="avMi avMi-md bradius fs-20 bg-success-mi">24</span> 
                                            <h5 class="mb-0 mt-3 miFntSz">Present Days</h5>
                                         </div> 
                                         <div class="col-md-6 col-xl-2 text-center py-3"> 
                                         	<span class="avMi avMi-md bradius fs-20 bg-danger-mi">2</span> 
                                            <h5 class="mb-0 mt-3 miFntSz">Absent Days</h5> 
                                          </div> 
                                          <div class="col-md-6 col-xl-2 text-center py-3"> 
                                          		<span class="avMi avMi-md bradius fs-20 bg-warning-mi">0</span> 
                                                <h5 class="mb-0 mt-3 miFntSz">Half Days</h5> 
                                          </div> 
                                          <div class="col-md-6 col-xl-2 text-center py-3 "> 
                                          	<span class="avMi avMi-md bradius fs-20 bg-orange-mi">2</span> 
                                            <h5 class="mb-0 mt-3 miFntSz">Late Days</h5> 
                                          </div> 
                                          <div class="col-md-6 col-xl-2 text-center py-3"> 
                                          		<span class="avMi avMi-md bradius fs-20 bg-pink-mi">5</span> 
                                                <h5 class="mb-0 mt-3 miFntSz">Holidays</h5>
                                           </div> 
                                       </div> 
                                   </div> 
                                </div>
                        	</div>
                            
                            
                        </div>
<!------------------------------------Changing Here Start-------------------------------------------->


<div class="row row-sm"  style="margin:15px -10px 0px -10px;">
        <div class="col-lg-12 col-md-12">
            
            <div class="card custom-card overflow-hidden">
                <div class="card-body">
                    <div>
                        <h6 class="main-content-label mb-1">JQuery UI Date Picker</h6>
                        <p class="text-muted card-sub-title">The datepicker is tied to a standard form input field. Click on the input to open an interactive calendar in a small overlay. If a date is chosen, feedback is shown as the input's value.Set the numberOfMonths option to an integer of 2 or more to show multiple months in a single datepicker.</p>
                    </div>
                    <div class="row row-sm">
                        <div class="col-lg-6">
                            <div class="mg-b-20">
                                <div class="input-group">
                                    <div class="input-group-text border-end-0">
                                        <i class="fe fe-calendar lh--9 op-6"></i>
                                    </div>
                                    <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mg-b-20">
                                <div class="input-group">
                                    <div class="input-group-text border-end-0">
                                        <i class="fe fe-calendar lh--9 op-6"></i>
                                    </div>
                                    <input class="form-control" id="datepickerNoOfMonths" placeholder="MM/DD/YYYY" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>











    <div class="row row-sm" style="margin:15px -10px 0px -10px;">                              
        <div class="col-sm-12 col-lg-12 col-xl-12">
           <div class="card"> 
              <div class="card-header  border-0"> <h4 class="card-title">Attendance Overview</h4> </div> 
              <div class="card-body pt-0 pb-3"> 
<!---------########################################################################--------------------->
               <div class="row row-sm">
                   <div class="col-lg-6">
                    <div class="mg-b-20">
                        <div class="input-group">
                            <div class="input-group-text border-end-0">
                                <i class="fe fe-calendar lh--9 op-6"></i>
                            </div>
                            <input class="form-control fc-datepicker hasDatepicker" placeholder="MM/DD/YYYY" type="text" id="dp1705052356126">
                        </div>
                    </div>
                </div>
                   <div class="col-lg-6">
                    <div class="mg-b-20">
                        <div class="input-group">
                            <div class="input-group-text border-end-0">
                                <i class="fe fe-calendar lh--9 op-6"></i>
                            </div>
                            <input class="form-control fc-datepicker hasDatepicker" placeholder="MM/DD/YYYY" type="text" id="dp1705052356126">
                        </div>
                    </div>
                </div>
               </div>
<!---------########################################################################--------------------->             
                
                
               <!-- -->
                
                
                
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
                
                
                
                 
               </div> 
            </div>
        </div>
    </div>    
<!------------------------------------Changing Here End-------------------------------------------->   
    
    <div class="row miMrgn">
       <div class="card custom-card">
            <div class="card-header custom-card-header border-bottom-0 ">
                <h5 class="main-content-label tx-dark my-auto tx-medium mb-0">Basic Card</h5>
                <div class="card-options">
                    <a href="javascript:void(0);" class="btn btn-primary btn-sm">Action 1</a>
                    <a href="javascript:void(0);" class="btn btn-secondary btn-sm ms-2">Action 2</a>
                </div>
            </div>
            <div class="card-body">
                    <div id="arvResultSection"> hEWEEJKRHWERJWERKH</div>
					
	<?php 
					
					
		/*	$findShift=$this->staff->isCheckShift($this->logId);			
			print_r($findShift);echo'hello <br>';*/
			
			/*if($findShift)
			{
				if($findShift->log_in_time)
				{
					//echo 'Elegible to Shift Out<br>';
					//echo 'Current Time :: '.strtotime(date("h:i:s a"));echo '<br>';
					//echo 'Shift Time :: '.strtotime($findShift->shift_end);echo '<br>';
					if(strtotime(date("h:i:s a")) >strtotime($findShift->shift_end))
					{
						
						//echo 'Shift Time has changed<br>';
						$whereCon=array('employee_id'=>$this->logId,'attendance_date'=>date('Y-m-d'));
						 $logOut_time=strtotime(date("H:i:s"));
						 $logIn_time = strtotime($findShift->log_in_time);
						 $getTotalMinute=round(abs($logIn_time - $logOut_time)/60,2);
						 $workingHrs=round(($getTotalMinute/60),2);
							$current_shift=explode(' ',$findShift->shift_duration);
							$duration=$current_shift[0];
							
							//echo $duration;
							if(($workingHrs > $duration/2) &&($workingHrs < $duration))
							{
								if(($workingHrs > $duration/2) &&($workingHrs > $duration*0.9)){$workingPeriod='1';}
								else if(($workingHrs > $duration*.75) &&($workingHrs < $duration*0.9)){$workingPeriod='2';}	else{$workingPeriod='5';}
								}
							else if($workingHrs > $duration){$workingPeriod='1';}else{$workingPeriod='3';}
							 $toWorkingPreiodArr=array('log_out_time'=>date("H:i:s"),'staff_attendance_type_id'=>$workingPeriod);
							 $mrkAttArr=array('log_out_time'=>date("H:i:s"),'attendance_status'=>$workingPeriod);
							 if($this->common->update_data('staff_attendance',$whereCon,$toWorkingPreiodArr))
							 { 
								$this->common->update_data('staff',array('id'=>$this->logId),$mrkAttArr);
								}
						
						
						
						}
					}
					//print_r($findShift);		
				}	*/
					
	?>
					
					
										
             </div>
            <div class="card-footer">
                This is Basic card footer
            </div>
        </div>
    
    
		<div class="cardTtl">
			<div class="miHeader">
				<span class="miLst"><i class="fe fe-sliders"></i><?php echo $title;?></span>
				<!-- <span class="miBck"><a href="<?php echo $bckUrl;?>"><i class="ti-arrow-left"></i></a></span> -->
				<span class="miBck"><a href="javascript:void(0);"data-bs-target="#add_holidays_modal" data-bs-toggle="modal" style="margin-left:-5px;" title="Click to Add Holidays Details" class="miDefault"><i class="ti-plus"></i></a></span>
			</div>
			<div class="col-md-12 col-lg-12">
			<input type="hidden" id="holiday" value="<?php echo $holiday;?>" />	
			<div class="row row-sm" id="amiResult">
				<table class="table text-nowrap text-md-nowrap table-striped table-bordered table-hover mg-b-0" id="holiday_list">
					<thead class="ami_tHeader">
						<tr>
							<th>S. No. </th>
							<th>Holidays Name</th>
							<th>Holidays Date</th>
							<th>Description</th>
                            <th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>


			

