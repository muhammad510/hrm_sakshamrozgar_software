  <!-- SIDEBAR -->
 <?php
 $isTeam=$this->common->get_data('mapped_team',array('status'=>'Active','head_id'=>$this->session->userdata('mim_id')),'*');
 $getCurrentLi=$this->router->fetch_class().$this->router->fetch_method();
 $getCurrentPranet=$this->router->fetch_class();
 $getCurModeLi=$getCurrentLi.$this->uri->segment(4);
 $theusrCat=$this->session->userdata('user_cate');
 ?>           
   <div class="sticky">
		<div class="main-menu main-sidebar main-sidebar-sticky side-menu">
			<div class="main-sidebar-header main-container-1 active">
				<div class="sidemenu-logo">
					<a class="main-logo" href="<?php echo base_url('staff/dashboard');?>">
						<img src="<?php echo base_url(system_info('logo'))?>" class="header-brand-img desktop-logo" alt="logo">
						<img src="<?php echo base_url(system_info('logo'))?>" class="header-brand-img icon-logo" alt="logo">
						<img src="<?php echo base_url(system_info('logo'))?>" class="header-brand-img desktop-logo theme-logo" alt="logo">
						<img src="<?php echo base_url(system_info('logo'))?>" class="header-brand-img icon-logo theme-logo" alt="logo">
					</a>
				</div>
				<div class="main-sidebar-body main-body-1">
					<div class="slide-left disabled" id="slide-left"><i class="fe fe-chevron-left"></i></div>
					<ul class="menu-nav nav">
						<li class="nav-header <?php if($getCurrentLi=='siteindex'){echo 'active';}?>"><span class="nav-label">Dashboard</span></li>
						<li class="nav-item <?php if($getCurrentLi=='siteindex'){echo 'active';}?>">
							<a class="nav-link <?php if($getCurrentLi=='siteindex'){echo 'active';}?>" title="Dashboard" href="<?php echo base_url('staff/dashboard');?>">
								<span class="shape1"></span>
								<span class="shape2"></span>
								<i class="ti-home sidemenu-icon menu-icon"></i>
								<span class="sidemenu-label">Dashboard</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link with-sub" href="javascript:void(0)">
								<span class="shape1"></span>
								<span class="shape2"></span>
								<i class="ti-user sidemenu-icon menu-icon "></i>
								<span class="sidemenu-label">Employees</span>
								<i class="angle fe fe-chevron-right"></i>
							</a>
							<ul class="nav-sub">
								<li class="nav-sub-item <?php if($getCurrentLi=='employeecreate'){echo 'active';}?>">
								  <a class="nav-sub-link <?php if($getCurrentLi=='employeecreate'){echo 'active';}?>" href="<?php echo base_url('admin/employee/create');?>">
										Add Employee
								  </a>
								</li>
                                <li class="nav-sub-item <?php if($getCurrentLi=='employeegrid'){echo 'active';}?>">
                                	<a class="nav-sub-link  <?php if($getCurrentLi=='employeegrid'){echo 'active';}?>" href="<?php echo base_url('admin/employee/grid');?>">Employee List</a>
                                </li>
								<li class="nav-sub-item <?php if($getCurrentLi=='employeeactive'){echo 'active';}?>">
                                	<a class="nav-sub-link  <?php if($getCurrentLi=='employeeactive'){echo 'active';}?>" href="<?php echo base_url('admin/employee/active');?>">Active Employee</a>
                                </li>
								<li class="nav-sub-item <?php if($getCurrentLi=='employeeresigned'){echo 'active';}?>">
                                	<a class="nav-sub-link  <?php if($getCurrentLi=='employeeresigned'){echo 'active';}?>" href="<?php echo base_url('admin/employee/resigned');?>">Resigned Employee</a> 
                                </li>
								<li class="nav-sub-item <?php if($getCurrentLi=='employeeterminated'){echo 'active';}?>">
                                	<a class="nav-sub-link  <?php if($getCurrentLi=='employeeterminated'){echo 'active';}?>" href="<?php echo base_url('admin/employee/terminated');?>">Terminated Employee</a>
                                </li>
								<!--<li class="nav-sub-item <?php //if($getCurrentLi=='employeemanages'){echo 'active';}?>">
                                	<a class="nav-sub-link  <?php //if($getCurrentLi=='employeemanages'){echo 'active';}?>" href="<?php //echo base_url('admin/employee/manages');?>">Employee List</a>
                                </li>-->	
                                <li class="nav-sub-item <?php if($getCurrentLi=='employeeperformance'){echo 'active';}?>">
                                	<a class="nav-sub-link <?php if($getCurrentLi=='employeeperformance'){echo 'active';}?>" href="<?php echo base_url('admin/employee/performance');?>">Performance</a>
                                </li>
                                 <li class="nav-sub-item <?php if($getCurModeLi=='employeegenerate'){echo 'active';}?>">
                                	<a class="nav-sub-link <?php if($getCurModeLi=='employeegenerate'){echo 'active';}?>" href="<?php echo base_url('admin/employee/generate');?>">Employee Form 16</a>
                                </li>	
                                  <li class="nav-sub-item <?php if($getCurModeLi=='employeegenerateoffer_letter'){echo 'active';}?>">
                                	<a class="nav-sub-link <?php if($getCurModeLi=='employeegenerateoffer_letter'){echo 'active';}?>" href="<?php echo base_url('admin/employee/generate/offer_letter');?>">Offer Letter</a>
                                </li>
                                  <li class="nav-sub-item <?php if($getCurModeLi=='employeegenerateregination_letter'){echo 'active';}?>">
                                	<a class="nav-sub-link <?php if($getCurModeLi=='employeegenerateregination_letter'){echo 'active';}?>" href="<?php echo base_url('admin/employee/generate/regination_letter');?>">Regination Letter</a>
                                </li>
                                  <li class="nav-sub-item <?php if($getCurrentLi=='print_documentindex'){echo 'active';}?>">
                            <a class="nav-sub-link <?php if($getCurrentLi=='print_documentindex'){echo'active';}?>" href="<?php echo base_url('admin/print_document');?>">
                               Print Letter
                            </a>
                        </li>   	
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link with-sub" href="javascript:void(0)">
								<span class="shape1"></span><span class="shape2"></span><i class="si si-event sidemenu-icon menu-icon "></i>
								<span class="sidemenu-label">Attendance</span><i class="angle fe fe-chevron-right"></i>
							</a>
                    <ul class="nav-sub">
                        <li class="nav-sub-item <?php if($getCurrentLi=='attendancedaily'){echo 'active';}?>">
                            <a class="nav-sub-link <?php if($getCurrentLi=='attendancedaily'){echo 'active';}?>" href="<?php echo base_url('admin/attendance/daily');?>">
                                 View Attendance
                            </a>
                        </li>
                        <li class="nav-sub-item <?php if($getCurrentLi=='attendanceby_user'){echo 'active';}?>">
                            <a class="nav-sub-link <?php if($getCurrentLi=='attendanceby_user'){echo'active';}?>" href="<?php echo base_url('admin/attendance/by_user');?>">
                                 Attendance By User
                            </a>
                        </li>                               
                        <li class="nav-sub-item <?php if($getCurrentLi=='attendancereportList'){echo 'active';}?>">
                            <a class="nav-sub-link <?php if($getCurrentLi=='attendancereportList'){echo'active';}?>" href="<?php echo base_url('admin/attendance/reportList');?>">
                                Attendance Overview
                            </a>
                        </li>  
                        <li class="nav-sub-item <?php if($getCurrentLi=='attendancecustomize'){echo 'active';}?>">
                            <a class="nav-sub-link <?php if($getCurrentLi=='attendancecustomize'){echo'active';}?>" href="<?php echo base_url('admin/attendance/customize');?>">
                                Search Report
                            </a>
                        </li>  
                                                  
                    </ul>
						</li>
<!-------------------------------------------------------------------------------------------------------------------------------->                        
                        
                        <li class="nav-item">
                            <a class="nav-link with-sub" href="javascript:void(0)">
                                <span class="shape1"></span><span class="shape2"></span><i class="si si-location-pin sidemenu-icon menu-icon "></i>
                                <span class="sidemenu-label">Tracking</span><i class="angle fe fe-chevron-right"></i>
                            </a>
                            <ul class="nav-sub">
                                <li class="nav-sub-item <?php if($getCurrentLi=='trackingindex'){echo 'active';}?>">
                                     <a class="nav-sub-link <?php if($getCurrentLi=='trackingindex'){echo 'active';}?>" href="<?php echo base_url('admin/tracking');?>">Live Tracking</a>
                                </li>
                                  <li class="nav-sub-item <?php if($getCurrentLi=='trackinghistory'){echo 'active';}?>">
                                     <a class="nav-sub-link <?php if($getCurrentLi=='trackinghistory'){echo 'active';}?>" href="<?php echo base_url('admin/tracking/history');?>">Tracking Report</a>
                                </li>
                            </ul>
                        </li>
                        
<!-------------------------------------------------------------------------------------------------------------------------------->                        
                        
                        
                        <li class="nav-item">
                            <a class="nav-link with-sub" href="javascript:void(0)">
                                <span class="shape1"></span><span class="shape2"></span><i class="si si-notebook sidemenu-icon menu-icon "></i>
                                <span class="sidemenu-label">Leaves</span><i class="angle fe fe-chevron-right"></i>
                            </a>
                            <ul class="nav-sub">
                              <?php if(($theusrCat!='5')&&($theusrCat!='4')){?> 
                                   <li class="nav-sub-item <?php if($getCurrentLi=='leaveindex'){echo 'active';}?>">
                                        <a class="nav-sub-link <?php if($getCurrentLi=='leaveindex'){echo'active';}?>" href="<?php echo base_url('software/leave');?>">
                                            Leave Type
                                        </a>
                                    </li>
                                <?php }?>
                                <li class="nav-sub-item <?php if($getCurrentLi=='applyindex'){echo 'active';}?>">
                                     <a class="nav-sub-link <?php if($getCurrentLi=='applyindex'){echo 'active';}?>" href="<?php echo base_url('admin/apply');?>">Leave Request</a>
                                </li>
                                <!--<li class="nav-sub-item <?php //if($getCurrentLi=='leavebalance'){echo 'active';}?>">
                                     <a class="nav-sub-link <?php //if($getCurrentLi=='leavebalance'){echo 'active';}?>" href="<?php //echo base_url('admin/leave/balance');?>">Leave Balance</a>
                                </li>-->
                                  <li class="nav-sub-item <?php if($getCurrentLi=='leavereport'){echo 'active';}?>">
                                     <a class="nav-sub-link <?php if($getCurrentLi=='leavereport'){echo 'active';}?>" href="<?php echo base_url('admin/leave/reports');?>">Leave Report</a>
                                </li>
                            </ul>
                        </li>
						<li class="nav-item">
							<a class="nav-link with-sub" href="javascript:void(0)">
								<span class="shape1"></span>
								<span class="shape2"></span>
								<i class="si si-wallet sidemenu-icon menu-icon "></i>
								<span class="sidemenu-label">Ledger</span>
								<i class="angle fe fe-chevron-right"></i>
							</a>
							<ul class="nav-sub">
								<li class="nav-sub-item <?php if($getCurrentLi=='ledgerpayroll'){echo 'active';}?>">
									<a class="nav-sub-link <?php if($getCurrentLi=='ledgerpayroll'){echo 'active';}?>" href="<?php echo base_url('admin/ledger/payroll');?>">
										Payroll
									</a>
								</li>
								
                                <li class="nav-sub-item <?php if($getCurrentLi=='ledgerexpense'){echo 'active';}?>">
									<a class="nav-sub-link <?php if($getCurrentLi=='ledgerexpense'){echo 'active';}?>" href="<?php echo base_url('admin/ledger/expense');?>">
									Expense 
									</a>
								</li>
							 <?php if(($theusrCat!='5')&&($theusrCat!='4')){?> 
                               <li class="nav-sub-item <?php if($getCurrentLi=='ledgerindex'){echo 'active';}?>">
									<a class="nav-sub-link <?php if($getCurrentLi=='ledgerindex'){echo 'active';}?>" href="<?php echo base_url('admin/ledger');?>">
										Accounts
									</a>
							   </li>
                              <?php }?> 	
                            </ul>
						</li>
                        
                   <?php if(($theusrCat!='5')&&($theusrCat!='4')){?>   
                   
                        <li class="nav-item">
                            <a class="nav-link with-sub" href="javascript:void(0)">
                                <span class="shape1"></span>
                                <span class="shape2"></span>
                                <i class="ti-shopping-cart-full sidemenu-icon menu-icon "></i>
                                <span class="sidemenu-label">Inventory</span>
                                <i class="angle fe fe-chevron-right"></i>
                            </a>
                            <ul class="nav-sub">
                               <li class="nav-sub-item <?php if($getCurrentLi=='inventoryindex'){echo 'active';}?>">
									<a class="nav-sub-link <?php if($getCurrentLi=='inventoryindex'){echo'active';}?>" href="<?php echo base_url('admin/inventory/index');?>">
										Overview
									</a>
								</li>
                                <li class="nav-sub-item <?php if($getCurrentLi=='inventorysupplier'){echo 'active';}?>">
									<a class="nav-sub-link <?php if($getCurrentLi=='inventorysupplier'){echo'active';}?>" href="<?php echo base_url('admin/inventory/supplier');?>">
										Settings
									</a>
								</li>
                                <li class="nav-sub-item <?php if($getCurrentLi=='inventorysupplier'){echo 'active';}?>">
									<a class="nav-sub-link <?php if($getCurrentLi=='inventorysupplier'){echo'active';}?>" href="<?php echo base_url('admin/inventory/supplier');?>">
										Supplier
									</a>
								</li>
                                <li class="nav-sub-item <?php if($getCurrentLi=='inventorysupplier'){echo 'active';}?>">
									<a class="nav-sub-link <?php if($getCurrentLi=='inventorysupplier'){echo'active';}?>" href="<?php echo base_url('admin/inventory/supplier');?>">
										Products
									</a>
								</li>
                                <li class="nav-sub-item <?php if($getCurrentLi=='inventorysupplier'){echo 'active';}?>">
									<a class="nav-sub-link <?php if($getCurrentLi=='inventorysupplier'){echo'active';}?>" href="<?php echo base_url('admin/inventory/supplier');?>">
										Purchase
									</a>
								</li>
                                 <li class="nav-sub-item <?php if($getCurrentLi=='inventorysupplier'){echo 'active';}?>">
									<a class="nav-sub-link <?php if($getCurrentLi=='inventorysupplier'){echo'active';}?>" href="<?php echo base_url('admin/inventory/supplier');?>">
										Stock
									</a>
								</li>
                                 <li class="nav-sub-item <?php if($getCurrentLi=='inventorysupplier'){echo 'active';}?>">
									<a class="nav-sub-link <?php if($getCurrentLi=='inventorysupplier'){echo'active';}?>" href="<?php echo base_url('admin/inventory/supplier');?>">
										Supply
									</a>
								</li>
                            </ul>
                        </li>
                   
                   <?php
							if ($this->session->userdata('user_cate') == 2): ?>
  							<li class="nav-item">
  								<a class="nav-link with-sub" href="javascript:void(0)">
  									<span class="shape1"></span>
  									<span class="shape2"></span>
  									<i class="si si-wallet sidemenu-icon menu-icon "></i>
  									<span class="sidemenu-label">Front CMS</span>
  									<i class="angle fe fe-chevron-right"></i>
  								</a>
  								<ul class="nav-sub">
  									<li class="nav-sub-item <?php if ($getCurrentLi == 'ledgerpayroll') {
																	echo 'active';
																} ?>">
  										<a class="nav-sub-link <?php if ($getCurrentLi == 'ledgerpayroll') {
																		echo 'active';
																	} ?>" href="<?php echo base_url('admin/website/getcareer'); ?>">
  											Career
  										</a>
  									</li>

  									<li class="nav-sub-item <?php if ($getCurrentLi == 'ledgerexpense') {
																	echo 'active';
																} ?>">
  										<a class="nav-sub-link <?php if ($getCurrentLi == 'ledgerexpense') {
																		echo 'active';
																	} ?>" href="<?php echo base_url('admin/website/enquiry_list'); ?>">
  											Enquiry
  										</a>
  									</li>

									<li class="nav-sub-item <?php if ($getCurrentLi == 'ledgerexpense') {
																	echo 'active';
																} ?>">
  										<a class="nav-sub-link <?php if ($getCurrentLi == 'ledgerexpense') {
																		echo 'active';
																	} ?>" href="<?php echo base_url('admin/website/manage_gallery'); ?>">Gallery
  										</a>
  									</li>

  								</ul>
  							</li>

  						<?php endif	?>


                     
                        <li class="nav-item">
							<a class="nav-link with-sub" href="javascript:void(0)">
								<span class="shape1"></span>
								<span class="shape2"></span>
								<i class="si si-settings sidemenu-icon menu-icon "></i>
								<span class="sidemenu-label">Configuration</span>
								<i class="angle fe fe-chevron-right"></i>
							</a>
							<ul class="nav-sub">
                             <li class="nav-sub-item <?php if($getCurrentLi=='settingbasic'){echo 'active';}?>">
									<a class="nav-sub-link <?php if($getCurrentLi=='settingbasic'){echo'active';}?>" href="<?php echo base_url('software/setting/basic');?>">
										 Basic Software
									</a>
								</li>
                               
								<li class="nav-sub-item <?php if($getCurrentLi=='branchindex'){echo 'active';}?>">
									<a class="nav-sub-link <?php if($getCurrentLi=='branchindex'){echo'active';}?>" href="<?php echo base_url('software/branch');?>">
										Branch Manage
									</a>
								</li>
                                <li class="nav-sub-item <?php if($getCurrentLi=='departmentmanage_department'){echo 'active';}?>">
									<a class="nav-sub-link <?php if($getCurrentLi=='departmentmanage_department'){echo'active';}?>" href="<?php echo base_url('software/department/manage_department');?>">
										Department Manage
									</a>
								</li>
								<li class="nav-sub-item <?php if($getCurrentLi=='designationmanage_designation'){echo 'active';}?>">
									<a class="nav-sub-link <?php if($getCurrentLi=='designationmanage_designation'){echo'active';}?>" href="<?php echo base_url('software/designation/manage_designation');?>">
										Designation Manage
									</a>
								</li>
                                <li class="nav-sub-item <?php if($getCurrentLi=='holidaysmanage_holidays'){echo 'active';}?>">
									<a class="nav-sub-link <?php if($getCurrentLi=='holidaysmanage_holidays'){echo'active';}?>" href="<?php echo base_url('software/holidays/manage_holidays');?>">
										Holidays Manage
									</a>
								</li>
                            
                                <li class="nav-sub-item <?php if($getCurrentLi=='machineindex'){echo 'active';}?>">
									<a class="nav-sub-link <?php if($getCurrentLi=='machineindex'){echo'active';}?>" href="<?php echo base_url('software/machine');?>">
										Machine Manage
									</a>
								</li>
                            	<li class="nav-sub-item <?php if($getCurrentLi=='ledgerpayout_monthly'){echo 'active';}?>">
									<a class="nav-sub-link <?php if($getCurrentLi=='ledgerpayout_monthly'){echo'active';}?>" href="<?php echo base_url('admin/ledger/payout_monthly');?>">
										Monthly Payout 
									</a>
								</li>
								<li class="nav-sub-item <?php if($getCurrentLi=='shiftmanage_shift'){echo 'active';}?>">
									<a class="nav-sub-link <?php if($getCurrentLi=='shiftmanage_shift'){echo'active';}?>" href="<?php echo base_url('software/shift/manage_shift');?>">
										Shift & Schedule
									</a>
								</li>
                              
                                <li class="nav-sub-item <?php if($getCurrentLi=='salary'){echo 'active';}?>">
								 <a class="nav-sub-link <?php if($getCurrentLi=='salaryindex'){echo'active';}?>" href="<?php echo base_url('software/salary');?>">
										Salary Manage
									</a>
								</li>
                               
								<li class="nav-sub-item <?php if($getCurrentLi=='team'){echo 'active';}?>">
								 <a class="nav-sub-link <?php if($getCurrentLi=='teamindex'){echo'active';}?>" href="<?php echo base_url('software/team');?>">
										Team Mapping
									</a>
								</li>
                                
                               
                                
                                
                                 <!--<li class="nav-sub-item <?php //if($getCurrentLi=='rolesindex'){echo 'active';}?>">
									<a class="nav-sub-link <?php //if($getCurrentLi=='rolesindex'){echo'active';}?>" href="<?php //echo base_url('software/roles');?>">
										Roles
									</a>
								</li>
                                 <li class="nav-sub-item <?php //if($getCurrentLi=='documentsindex'){echo 'active';}?>">
									<a class="nav-sub-link <?php //if($getCurrentLi=='documentsindex'){echo'active';}?>" href="<?php //echo base_url('software/documents');?>">
										Official Documents
									</a>
								</li>-->
							</ul>
						</li>
                        <!--<li class="nav-item <?php //if($getCurrentLi=='testingModeindex'){echo 'active';}?>">
							<a class="nav-link <?php //if($getCurrentLi=='testingModeindex'){echo 'active';}?>" href="<?php //echo base_url('admin/testingMode');?>">
								<span class="shape1"></span>
								<span class="shape2"></span>
								<i class="ti-home sidemenu-icon menu-icon"></i>
								<span class="sidemenu-label">Testing Mode</span>
							</a>
						</li>-->
                   <?php }?> 
                    <?php if($isTeam){?>
                        <li class="nav-item">
							<a class="nav-link with-sub" href="javascript:void(0)">
								<span class="shape1"></span>
								<span class="shape2"></span>
								<i class="si si-organization sidemenu-icon menu-icon "></i>
								<span class="sidemenu-label">Team Overview</span>
								<i class="angle fe fe-chevron-right"></i>
							</a>
							<ul class="nav-sub">
								<li class="nav-sub-item <?php if($getCurrentLi=='teamindex'){echo 'active';}?>">
									<a class="nav-sub-link <?php if($getCurrentLi=='teamindex'){echo'active';}?>" href="<?php echo base_url('employee/team');?>">
										Attendance
									</a>
								</li>
                                <li class="nav-sub-item <?php if($getCurrentLi=='teamrequest_leave'){echo 'active';}?>">
									<a class="nav-sub-link <?php if($getCurrentLi=='teamrequest_leave'){echo'active';}?>" href="<?php echo base_url('employee/team/request_leave');?>">
										Leave
									</a>
								</li>
							</ul>
						</li>
                        <?php }?>
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="javascript:void(0)">
                            <span class="shape1"></span>
                            <span class="shape2"></span>
                            <i class="si si-earphones-alt sidemenu-icon menu-icon "></i>
                            <span class="sidemenu-label">Support System</span>
                            <i class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item <?php if($getCurrentLi=='ticketsactive'){echo 'active';}?>">
                                <a class="nav-sub-link <?php if($getCurrentLi=='ticketsactive'){echo 'active';}?>" href="<?php echo base_url('tickets/active');?>">
                                    Active Tickets
                                </a>
                            </li>
                             <li class="nav-sub-item <?php if($getCurrentLi=='ticketsclosed'){echo 'active';}?>">
                                <a class="nav-sub-link <?php if($getCurrentLi=='ticketsclosed'){echo 'active';}?>" href="<?php echo base_url('tickets/closed');?>">
                                    Closed Tickets
                                </a>
                            </li>	
                           <!-- <li class="nav-sub-item <?php //if($getCurrentLi=='ticketsarise'){echo 'active';}?>">
                                <a class="nav-sub-link <?php //if($getCurrentLi=='ticketsarise'){echo 'active';}?>" href="<?php //echo base_url('tickets/arise');?>">
                                    Create Tickets
                                </a>
                            </li>-->
                            <li class="nav-sub-item <?php if($getCurrentLi=='ticketsindex'){echo 'active';}?>">
                                <a class="nav-sub-link <?php if($getCurrentLi=='ticketsindex'){echo 'active';}?>" href="<?php echo base_url('tickets');?>">
                                    Ticket List
                                </a>
                            </li>
                        </ul>
                    </li>    
					</ul>
					<div class="slide-right" id="slide-right"><i class="fe fe-chevron-right"></i></div>
				</div>
			</div>
		</div>
	</div>
  <!-- END SIDEBAR -->
