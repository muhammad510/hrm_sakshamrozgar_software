  <!-- SIDEBAR -->
 <?php
 $isTeam=$this->common->get_data('mapped_team',array('status'=>'Active','head_id'=>$this->session->userdata('mim_id')),'*');
 $getCurrentLi=$this->router->fetch_class().$this->router->fetch_method();
 $getCurrentPranet=$this->router->fetch_class();
 ?>           
   <div class="sticky">
		<div class="main-menu main-sidebar main-sidebar-sticky side-menu">
			<div class="main-sidebar-header main-container-1 active">
				<div class="sidemenu-logo">
					<a class="main-logo" href="<?php echo base_url('employee/dashboard')?>">
						<img src="<?php echo base_url(system_info('logo'))?>" class="header-brand-img desktop-logo" alt="logo">
						<img src="<?php echo base_url('assets/img/brand/icon-light.png')?>" class="header-brand-img icon-logo" alt="logo">
						<img src="<?php echo base_url(system_info('logo'))?>" class="header-brand-img desktop-logo theme-logo" alt="logo">
						<img src="<?php echo base_url('assets/img/brand/icon.png')?>" class="header-brand-img icon-logo theme-logo" alt="logo">
					</a>
				</div>
				<div class="main-sidebar-body main-body-1">
					<div class="slide-left disabled" id="slide-left"><i class="fe fe-chevron-left"></i></div>
					<ul class="menu-nav nav">
						<li class="nav-header <?php if($getCurrentLi=='siteindex'){echo 'active';}?>"><span class="nav-label">Dashboard</span></li>
						<li class="nav-item <?php if($getCurrentLi=='dashboardindex'){echo 'active';}?>">
							<a class="nav-link <?php if($getCurrentLi=='dashboardindex'){echo 'active';}?>" href="<?php echo base_url('employee/dashboard');?>">
								<span class="shape1"></span>
								<span class="shape2"></span>
								<i class="ti-home sidemenu-icon menu-icon"></i>
								<span class="sidemenu-label">Dashboard</span>
							</a>
						</li>
						<li class="nav-item <?php if($getCurrentLi=='appearanceindex'){echo 'active';}?>">
							<a class="nav-link <?php if($getCurrentLi=='appearanceindex'){echo 'active';}?>" href="<?php echo base_url('employee/appearance');?>">
								<span class="shape1"></span>
								<span class="shape2"></span>
								<i class="ti-bell sidemenu-icon menu-icon"></i>
								<span class="sidemenu-label">Attendance</span>
							</a>
						</li>
                        <li class="nav-item">
							<a class="nav-link with-sub" href="javascript:void(0)">
								<span class="shape1"></span>
								<span class="shape2"></span>
								<i class="si si-speedometer sidemenu-icon menu-icon "></i>
								<span class="sidemenu-label">Performance</span>
								<i class="angle fe fe-chevron-right"></i>
							</a>
							<ul class="nav-sub">
								<li class="nav-sub-item <?php if($getCurrentLi=='performancecreate'){echo 'active';}?>">
									<a class="nav-sub-link <?php if($getCurrentLi=='performancecreate'){echo'active';}?>" href="<?php echo base_url('employee/performance/create');?>">
										Add Feedback
									</a>
								</li>
                                <li class="nav-sub-item <?php if($getCurrentLi=='performanceindex'){echo 'active';}?>">
									<a class="nav-sub-link <?php if($getCurrentLi=='performanceindex'){echo'active';}?>" href="<?php echo base_url('employee/performance');?>">
										Feedback List
									</a>
								</li>
								
                                
							</ul>
						</li>
                        <li class="nav-item <?php if($getCurrentLi=='leaveapply'){echo 'active';}?>">
							<a class="nav-link <?php if($getCurrentLi=='leaveapply'){echo 'active';}?>" href="<?php echo base_url('employee/leave/apply');?>">
								<span class="shape1"></span>
								<span class="shape2"></span>
								<i class="ti-rocket sidemenu-icon menu-icon"></i>
								<span class="sidemenu-label">Apply Leaves</span>
							</a>
						</li>
                        <li class="nav-item <?php if($getCurrentLi=='leavesummary'){echo 'active';}?>">
							<a class="nav-link <?php if($getCurrentLi=='leavesummary'){echo 'active';}?>" href="<?php echo base_url('employee/leave/summary');?>">
								<span class="shape1"></span>
								<span class="shape2"></span>
								<i class="ti-anchor sidemenu-icon menu-icon"></i>
								<span class="sidemenu-label">My Leaves</span>
							</a>
						</li>
                        <li class="nav-item <?php if($getCurrentLi=='payslipindex'){echo 'active';}?>">
							<a class="nav-link <?php if($getCurrentLi=='payslipindex'){echo 'active';}?>" href="<?php echo base_url('employee/payslip');?>">
								<span class="shape1"></span>
								<span class="shape2"></span>
								<i class="ti-wallet sidemenu-icon menu-icon"></i>
								<span class="sidemenu-label">Payslips</span>
							</a>
						</li>
                        <li class="nav-item">
                            <a class="nav-link with-sub" href="javascript:void(0)">
                                <span class="shape1"></span><span class="shape2"></span><i class="ti-user sidemenu-icon menu-icon "></i><span class="sidemenu-label">My Profile</span><i class="angle fe fe-chevron-right"></i>
                            </a>
							<ul class="nav-sub">
								<li class="nav-sub-item <?php if($getCurrentLi=='employeeprofile'){echo 'active';}?>">
									<a class="nav-sub-link <?php if($getCurrentLi=='employeeprofile'){echo'active';}?>" href="<?php echo base_url('employee/profile');?>">
										Personal Details
									</a>
								</li>
                                <li class="nav-sub-item <?php if($getCurrentLi=='loginsignout'){echo 'active';}?>">
									<a class="nav-sub-link <?php if($getCurrentLi=='loginsignout'){echo'active';}?>" href="<?php echo base_url('auth/login/signout');?>">
										Sign Out
									</a>
								</li>
							</ul>
						</li>
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
                            <li class="nav-sub-item <?php if($getCurrentLi=='ticketsarise'){echo 'active';}?>">
                                <a class="nav-sub-link <?php if($getCurrentLi=='ticketsarise'){echo 'active';}?>" href="<?php echo base_url('tickets/arise');?>">
                                    Create Tickets
                                </a>
                            </li>
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
