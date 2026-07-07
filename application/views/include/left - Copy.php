  <!-- SIDEBAR -->
 <?php
 $getCurrentLi=$this->router->fetch_class().$this->router->fetch_method();
 $getCurrentPranet=$this->router->fetch_class();
 ?>           
   <div class="sticky">
				<div class="main-menu main-sidebar main-sidebar-sticky side-menu">
					<div class="main-sidebar-header main-container-1 active">
						<div class="sidemenu-logo">
							<a class="main-logo" href="index.html">
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
									<a class="nav-link <?php if($getCurrentLi=='siteindex'){echo 'active';}?>" href="<?php echo base_url('staff/dashboard');?>">
										<span class="shape1"></span>
										<span class="shape2"></span>
										<i class="ti-home sidemenu-icon menu-icon"></i>
										<span class="sidemenu-label">Dashboard</span>
									</a>
								</li>
						  <!--  <li class="nav-item">
									<a class="nav-link with-sub" href="javascript:void(0)">
										<span class="shape1"></span>
										<span class="shape2"></span>
										<i  class="ti-wallet sidemenu-icon menu-icon "></i>
										<span class="sidemenu-label">Crypto
											<span class="sidemenu-label2">Currencies</span>
										</span>
										<i class="angle fe fe-chevron-right"></i>
									</a>
									<ul class="nav-sub">
										<li class="side-menu-label1"><a href="javascript:void(0)">Crypto Currencies</a></li>
										<li class="nav-sub-item"> <a class="nav-sub-link" href="crypto-dashbaord.html">Dashboard</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="crypto-market.html">Marketcap</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="crypto-currency-exchange.html">Currency Exchange</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="crypto-buysell.html">Buy & Sell</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="crypto-wallet.html">Wallet</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="crypto-transcations.html">Transcations</a></li>
									</ul>
								</li>-->
								<li class="nav-item">
									<a class="nav-link with-sub" href="javascript:void(0)">
										<span class="shape1"></span>
										<span class="shape2"></span>
										<i class="ti-user sidemenu-icon menu-icon "></i>
										<span class="sidemenu-label">Employees</span>
										<i class="angle fe fe-chevron-right"></i>
									</a>
									<ul class="nav-sub">
										<li class="nav-sub-item <?php if($getCurrentLi=='profilecreate'){echo 'active';}?>">
										   <a class="nav-sub-link <?php if($getCurrentLi=='profilecreate'){echo 'active';}?>" href="<?php echo base_url('staff/profile/create');?>">
												Create New
										   </a>
										</li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="ecommerce-products.html">Member List</a></li>
										
									</ul>
								</li>
							<!--	<li class="nav-header"><span class="nav-label">Landing</span></li>
								<li class="nav-item">
									<a class="nav-link" href="landing.html">
										<span class="shape1"></span>
										<span class="shape2"></span>
										<i class="ti-layout sidemenu-icon menu-icon "></i>
										<span class="sidemenu-label">LandingPage</span>
									</a>
								</li>
								<li class="nav-header"><span class="nav-label">Applications</span></li>
								<li class="nav-item">
									<a class="nav-link with-sub" href="javascript:void(0)">
										<span class="shape1"></span>
										<span class="shape2"></span>
										<i class="ti-write sidemenu-icon menu-icon "></i>
										<span class="sidemenu-label">Apps</span>
										<i class="angle fe fe-chevron-right"></i>
									</a>
									<ul class="nav-sub">
										<li class="side-menu-label1"><a href="javascript:void(0)">Apps</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="widgets.html">Widgets</a></li>
										<li class="nav-sub-item">
											<a class="nav-sub-link sub-with-sub" href="javascript:void(0)">
												<span class="sidemenu-label">Mail</span>
												<i class="angle fe fe-chevron-right"></i>
											</a>
											<ul class="sub-nav-sub">
												<li class="nav-sub-item"><a class="nav-sub-link" href="mail-inbox.html">Mail Inbox</a></li>
												<li class="nav-sub-item"><a class="nav-sub-link" href="viewmail.html">View Mail</a></li>
												<li class="nav-sub-item"><a class="nav-sub-link" href="mail-compose.html">Mail Compose</a></li>
											</ul>
										</li>
										<li class="nav-sub-item">
											<a class="nav-sub-link sub-with-sub" href="javascript:void(0)">
												<span class="sidemenu-label">Maps</span>
												<i class="angle fe fe-chevron-right"></i>
											</a>
											<ul class="sub-nav-sub">
												<li class="nav-sub-item"><a class="nav-sub-link" href="map-mapel.html">Mapel Maps</a></li>
												<li class="nav-sub-item"><a class="nav-sub-link" href="map-vector.html">Vector Maps</a></li>
											</ul>
										</li>
										<li class="nav-sub-item">
											<a class="nav-sub-link sub-with-sub" href="javascript:void(0)">
												<span class="sidemenu-label">Tables</span>
												<i class="angle fe fe-chevron-right"></i>
											</a>
											<ul class="sub-nav-sub">
												<li class="nav-sub-item"><a class="nav-sub-link" href="table-basic.html">Basic Tables</a></li>
												<li class="nav-sub-item"><a class="nav-sub-link" href="table-data.html">Data Tables</a></li>
											</ul>
										</li>
										<li class="nav-sub-item">
											<a class="nav-sub-link sub-with-sub" href="javascript:void(0)">
												<span class="sidemenu-label">Blog</span>
												<i class="angle fe fe-chevron-right"></i>
											</a>
											<ul class="sub-nav-sub">
												<li class="nav-sub-item"><a class="nav-sub-link" href="blog.html">Blog Page</a></li>
												<li class="nav-sub-item"><a class="nav-sub-link" href="blog-details.html">Blog Details</a></li>
												<li class="nav-sub-item"><a class="nav-sub-link" href="blog-post.html">Blog Post</a></li>
											</ul>
										</li>
										<li class="nav-sub-item">
											<a class="nav-sub-link sub-with-sub" href="javascript:void(0)">
												<span class="sidemenu-label">File Manager</span>
												<i class="angle fe fe-chevron-right"></i>
											</a>
											<ul class="sub-nav-sub">
												<li class="nav-sub-item"><a class="nav-sub-link" href="filemanager.html">File Manager</a></li>
												<li class="nav-sub-item"><a class="nav-sub-link" href="filemanager-list.html">File Manager List</a></li>
												<li class="nav-sub-item"><a class="nav-sub-link" href="file-details.html">File Details</a></li>
												<li class="nav-sub-item"><a class="nav-sub-link" href="file-attachments.html">File Attachments</a></li>
											</ul>
										</li>
										<li class="nav-sub-item">
											<a class="nav-sub-link sub-with-sub" href="javascript:void(0)">
												<span class="sidemenu-label">Icons</span>
												<i class="angle fe fe-chevron-right"></i>
											</a>
											<ul class="sub-nav-sub">
												<li class="nav-sub-item"><a class="nav-sub-link" href="icons.html">Font Awesome</a></li>
												<li class="nav-sub-item"><a class="nav-sub-link" href="icons2.html">Material Design Icons</a></li>
												<li class="nav-sub-item"><a class="nav-sub-link" href="icons3.html">Simple Line Icons</a></li>
												<li class="nav-sub-item"><a class="nav-sub-link" href="icons4.html">Feather Icons</a></li>
												<li class="nav-sub-item"><a class="nav-sub-link" href="icons5.html">Ionic Icons</a></li>
												<li class="nav-sub-item"><a class="nav-sub-link" href="icons6.html">Flag Icons</a></li>
												<li class="nav-sub-item"><a class="nav-sub-link" href="icons7.html">Pe7 Icons</a></li>
												<li class="nav-sub-item"><a class="nav-sub-link" href="icons8.html">Themify Icons</a></li>
												<li class="nav-sub-item"><a class="nav-sub-link" href="icons9.html">Typicons Icons</a></li>
												<li class="nav-sub-item"><a class="nav-sub-link" href="icons10.html">Weather Icons</a></li>
												<li class="nav-sub-item"><a class="nav-sub-link" href="icons11.html">Material Icons</a></li>
												<li class="nav-sub-item"><a class="nav-sub-link" href="icons12.html">Bootstrap Icons</a></li>
											</ul>
										</li>
									</ul>
								</li>
								<li class="nav-header"><span class="nav-label">Components</span></li>
								<li class="nav-item">
									<a class="nav-link with-sub" href="javascript:void(0)">
										<span class="shape1"></span>
										<span class="shape2"></span>
										<i class="ti-package sidemenu-icon menu-icon "></i>
										<span class="sidemenu-label">Elements</span>
										<i class="angle fe fe-chevron-right"></i>
									</a>
									<ul class="nav-sub">
										<li class="side-menu-label1"><a href="javascript:void(0)">Elements</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="accordions.html">Accordions</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="alerts.html">Alerts</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="avatars.html">Avatars</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="breadcrumbs.html">Breadcrumbs</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="buttons.html">Buttons</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="badges.html">Badges</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="dropdowns.html">Dropdowns</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="thumbnails.html">Thumbnails</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="list-groups.html">List Groups</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="navigations.html">Navigations</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="paginations.html">Paginations</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="popovers.html">Popovers</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="progress.html">Progress</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="spinners.html">Spinners</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="media-object.html">Media Objects</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="typography.html">Typography</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="tooltips.html">Tooltips</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="toast.html">Toast</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="tags.html">Tags</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="tabs.html">Tabs</a></li>
									</ul>
								</li>
								<li class="nav-item">
									<a class="nav-link with-sub" href="javascript:void(0)">
										<span class="shape1"></span>
										<span class="shape2"></span>
										<i class="ti-briefcase sidemenu-icon menu-icon "></i>
										<span class="sidemenu-label">AdvancedUI</span>
										<i class="angle fe fe-chevron-right"></i>
									</a>
									<ul class="nav-sub">
										<li class="side-menu-label1"><a href="javascript:void(0)">Advanced UI</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="carousel.html">Carousel</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="collapse.html">Collapse</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="chat.html">Chat</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="cards-page.html">Cards</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="calendar.html">Calendar</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="contacts.html">Contacts</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="modals.html">Modals</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="timeline.html">Timeline</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="draggablecards.html">Darggable Cards</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="sweet-alerts.html">Sweet Alerts</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="ratings.html">Ratings</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="search.html">Search</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="userlist.html">Userlist</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="notifications.html">Notifications</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="treeview.html">Treeview</a></li>
									</ul>
								</li>
								<li class="nav-header"><span class="nav-label">Other Pages</span></li>
								<li class="nav-item">
									<a class="nav-link with-sub" href="javascript:void(0)">
										<span class="shape1"></span>
										<span class="shape2"></span>
										<i class="ti-palette sidemenu-icon menu-icon "></i>
										<span class="sidemenu-label ">Pages</span>
										<i class="angle fe fe-chevron-right"></i>
									</a>
									<ul class="nav-sub">
										<li class="side-menu-label1"><a href="javascript:void(0)">Pages</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="profile.html">Profile</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="aboutus.html">About Us</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="settings.html">Settings</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="invoice.html">Invoice</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="pricing.html">Pricing</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="gallery.html">Gallery</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="notifications-list.html">Notifications List</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="faqs.html">Faqs</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="success-message.html">Success Message</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="danger-message.html">Danger Message</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="warning-message.html">Warning Message</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="emptypage.html">Empty Page</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="switcher.html">Switcher Page</a></li>
									</ul>
								</li>
								<li class="nav-item">
									<a class="nav-link with-sub" href="javascript:void(0)">
										<span class="shape1"></span>
										<span class="shape2"></span>
										<i class="ti-shield sidemenu-icon menu-icon "></i>
										<span class="sidemenu-label">Utilities</span>
										<i class="angle fe fe-chevron-right"></i>
									</a>
									<ul class="nav-sub">
										<li class="side-menu-label1"><a href="javascript:void(0)">Utilities</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="backgrounds.html">Backgrounds</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="borders.html">Borders</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="display.html">Display</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="flex.html">Flex</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="height.html">Height</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="margin.html">Margin</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="padding.html">Padding</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="position.html">Position</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="width.html">Width</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="extras.html">Extras</a></li>
									</ul>
								</li>
								<li class="nav-item">
									<a class="nav-link with-sub" href="javascript:void(0)">
										<span class="shape1"></span>
										<span class="shape2"></span>
										<i class="ti-menu sidemenu-icon menu-icon "></i>
										<span class="sidemenu-label">Submenu</span>
										<i class="angle fe fe-chevron-right"></i>
									</a>
									<ul class="nav-sub">
										<li class="side-menu-label1"><a href="javascript:void(0)">Submenu</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="javascript:void(0)">Submenu-01</a></li>
										<li class="nav-sub-item">
											<a class="nav-sub-link sub-with-sub" href="javascript:void(0)">
												<span class="sidemenu-label">Submenu-02</span>
												<i class="angle fe fe-chevron-right"></i>
											</a>
											<ul class="sub-nav-sub">
												<li class="nav-sub-item"><a class="nav-sub-link" href="javascript:void(0)">Level-01</a></li>
												<li class="nav-sub-item">
													<a class="nav-sub-link sub-with-sub" href="javascript:void(0)">
														<span class="sidemenu-label">Level-02</span>
														<i class="angle fe fe-chevron-right"></i>
													</a>
													<ul class="sub-nav-sub">
														<li class="nav-sub-item"><a class="nav-sub-link" href="javascript:void(0)">Level-11</a></li>
														<li class="nav-sub-item"><a class="nav-sub-link" href="javascript:void(0)">Level-12</a></li>
													</ul>
												</li>
											</ul>
										</li>
									</ul>
								</li>
								<li class="nav-item">
									<a class="nav-link with-sub" href="javascript:void(0)">
										<span class="shape1"></span>
										<span class="shape2"></span>
										<i class="ti-lock sidemenu-icon menu-icon"></i>
										<span class="sidemenu-label">Authentication</span>
										<i class="angle fe fe-chevron-right"></i>
									</a>
									<ul class="nav-sub">
										<li class="side-menu-label1"><a href="javascript:void(0)">Authentication</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="signin.html">Sign In</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="signup.html">Sign Up</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="forgot.html">Forgot Password</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="reset.html">Reset Password</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="lockscreen.html">Lockscreen</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="underconstruction.html">UnderConstruction</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="error404.html">404 Error</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="error500.html">500 Error</a></li>
									</ul>
								</li>
								<li class="nav-header"><span class="nav-label">Forms &amp; Charts</span></li>
								<li class="nav-item">
									<a class="nav-link with-sub" href="javascript:void(0)">
										<span class="shape1"></span>
										<span class="shape2"></span>
										<i class="ti-receipt sidemenu-icon menu-icon "></i>
										<span class="sidemenu-label">Forms</span>
										<span class="badge bg-info side-badge">7</span>
									</a>
									<ul class="nav-sub">
										<li class="side-menu-label1"><a href="javascript:void(0)">Forms</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="form-elements.html">Form Elements</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="form-advanced.html">Advanced Forms</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="form-layouts.html">Form Layouts</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="form-validations.html">Form Validations</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="form-wizards.html">Form Wizards</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="form-editor.html">WYSIWYG Editor</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="form-element-sizes.html">Form Element Sizes</a></li>
									</ul>
								</li>
								<li class="nav-item">
									<a class="nav-link with-sub" href="javascript:void(0)">
										<span class="shape1"></span>
										<span class="shape2"></span>
										<i class="ti-bar-chart-alt sidemenu-icon menu-icon "></i>
										<span class="sidemenu-label">Charts</span>
										<span class="badge bg-danger side-badge">5</span>
									</a>
									<ul class="nav-sub">
										<li class="side-menu-label1"><a href="javascript:void(0)">Charts</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="chart-morris.html">Morris Charts</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="chart-flot.html">Flot Charts</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="chart-chartjs.html">ChartJS</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="chart-spark-peity.html">Sparkline &amp; Peity</a></li>
										<li class="nav-sub-item"><a class="nav-sub-link" href="chart-echart.html">Echart</a></li>
									</ul>
								</li>-->
							</ul>
							<div class="slide-right" id="slide-right"><i class="fe fe-chevron-right"></i></div>
						</div>
					</div>
				</div>
			</div>
  <!-- END SIDEBAR -->