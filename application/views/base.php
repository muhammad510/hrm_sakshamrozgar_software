<?php defined('BASEPATH') or exit('No direct script access allowed');
$isExpired = base64_decode(config_item('is_expiry'));
$isCheck = config_item('is_check');
$userCt = $this->session->userdata('user_cate');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="description" content="<?php echo system_info('company_name'); ?>">
  <meta name="author" content="<?php echo system_info('company_name'); ?>">
  <meta name="keywords" content="<?php echo system_info('company_name'); ?>">
  <!-- TITLE -->
  <title><?php echo $title; ?> | <?php echo system_info('company_name'); ?></title>
  <!-- FAVICON -->
  <style>
    #miArvClk {
      font-weight: 500;
    }

    .expApproved {
      background-color: #168400 !important;
      color: #ffffff !important;
    }

    .expPaidOut {
      background-color: #5C10CC !important;
      color: #ffffff !important;
    }

    .expReject {
      background-color: #f16d75 !important;
      color: #ffffff !important;
    }

    .expPending {
      background-color: #FFAE01 !important;
      color: #ffffff !important;
    }

    /*@media (min-width: 1361px) and (max-width: 1900px) {
.expWrkD{ height:800px !important;}
}
@media (min-width: 560px) and (max-width: 1360px) {
.expWrkD{ height:350px !important;}
}
*/
  </style>
  <link rel="icon" href="<?php echo base_url(system_info('favicon')); ?>">
  <?php $this->load->view('include/css'); ?>

  <script>
    var miUrl = '<?php echo base_url(); ?>';

    function startTime() {
      const today = new Date();
      let h = today.getHours();
      let m = today.getMinutes();
      let s = today.getSeconds();
      m = checkTime(m);
      s = checkTime(s);
      //document.getElementById('miClock').innerHTML =  h + ":" + m + ":" + s;
      document.getElementById('miArvClk').innerHTML = '<i class="ti-timer"></i> ' + h + ":" + m + ":" + s;

      setTimeout(startTime, 1000);
    }

    function checkTime(i) {
      if (i < 10) {
        i = "0" + i
      };
      return i;
    }
    $(document).ready(function() {
      startTime();
    });
  </script>
</head>

<body class="ltr main-body leftmenu">
  <input type="hidden" value="<?php echo base_url(); ?>" id="base_url">
  <?php //if(!$userCt=='dev'){
  ?>
  <!-- SWITCHER -->
  <div class="switcher-wrapper">
    <div class="demo_changer">
      <div class="form_holder sidebar-right1">
        <div class="row">
          <div class="predefined_styles">
            <div class="swichermainleft">
              <h4>LTR and RTL Versions</h4>
              <div class="skin-body">
                <div class="switch_section">
                  <div class="switch-toggle d-flex"> <span class="me-auto">LTR</span>
                    <p class="onoffswitch2">
                      <input type="radio" name="onoffswitch7" id="myonoffswitch19" class="onoffswitch2-checkbox" checked>
                      <label for="myonoffswitch19" class="onoffswitch2-label"></label>
                    </p>
                  </div>
                  <div class="switch-toggle d-flex mt-2"> <span class="me-auto">RTL</span>
                    <p class="onoffswitch2">
                      <input type="radio" name="onoffswitch7"
                        id="myonoffswitch20" class="onoffswitch2-checkbox">
                      <label for="myonoffswitch20" class="onoffswitch2-label"></label>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="swichermainleft menu-styles">
              <h4>Navigation Style</h4>
              <div class="skin-body">
                <div class="switch_section">
                  <div class="switch-toggle d-flex"> <span class="me-auto">Vertical Menu</span>
                    <p class="onoffswitch2">
                      <input type="radio" name="onoffswitch01"
                        id="myonoffswitch01" class="onoffswitch2-checkbox" checked>
                      <label for="myonoffswitch01" class="onoffswitch2-label"></label>
                    </p>
                  </div>
                  <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Horizontal Click Menu</span>
                    <p class="onoffswitch2">
                      <input type="radio" name="onoffswitch01"
                        id="myonoffswitch02" class="onoffswitch2-checkbox">
                      <label for="myonoffswitch02" class="onoffswitch2-label"></label>
                    </p>
                  </div>
                  <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Horizontal Hover Menu</span>
                    <p class="onoffswitch2">
                      <input type="radio" name="onoffswitch01"
                        id="myonoffswitch03" class="onoffswitch2-checkbox">
                      <label for="myonoffswitch03" class="onoffswitch2-label"></label>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="swichermainleft">
              <h4>Light Theme Style</h4>
              <div class="skin-body">
                <div class="switch_section">
                  <div class="switch-toggle d-flex"> <span class="me-auto">Light Theme</span>
                    <p class="onoffswitch2">
                      <input type="radio" name="onoffswitch1"
                        id="myonoffswitch1" class="onoffswitch2-checkbox" checked>
                      <label for="myonoffswitch1" class="onoffswitch2-label"></label>
                    </p>
                  </div>
                  <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Light Primary</span>
                    <div class="">
                      <input class="wd-30 ht-30 input-color-picker color-primary-light"
                        value="#6259ca" id="colorID" oninput="changePrimaryColor()" type="color"
                        data-id="bg-color" data-id1="bg-hover" data-id2="bg-border"
                        data-id7="transparentcolor" name="lightPrimary">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swichermainleft">
              <h4>Dark Theme Style</h4>
              <div class="skin-body">
                <div class="switch_section">
                  <div class="switch-toggle d-flex"> <span class="me-auto">Dark Theme</span>
                    <p class="onoffswitch2">
                      <input type="radio" name="onoffswitch1"
                        id="myonoffswitch2" class="onoffswitch2-checkbox">
                      <label for="myonoffswitch2" class="onoffswitch2-label"></label>
                    </p>
                  </div>
                  <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Dark Primary</span>
                    <div class="">
                      <input class="wd-30 ht-30 input-dark-color-picker color-primary-dark"
                        value="#6259ca" id="darkPrimaryColorID" oninput="darkPrimaryColor()"
                        type="color" data-id="bg-color" data-id1="bg-hover" data-id2="bg-border"
                        data-id3="primary" data-id8="transparentcolor" name="darkPrimary">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swichermainleft menu-colors">
              <h4>Menu Styles</h4>
              <div class="skin-body">
                <div class="switch_section">
                  <div class="switch-toggle lightMenu d-flex"> <span class="me-auto">Light Menu</span>
                    <p class="onoffswitch2">
                      <input type="radio" name="onoffswitch2"
                        id="myonoffswitch3" class="onoffswitch2-checkbox">
                      <label for="myonoffswitch3" class="onoffswitch2-label"></label>
                    </p>
                  </div>
                  <div class="switch-toggle colorMenu d-flex mt-2"> <span class="me-auto">Color Menu</span>
                    <p class="onoffswitch2">
                      <input type="radio" name="onoffswitch2"
                        id="myonoffswitch4" class="onoffswitch2-checkbox">
                      <label for="myonoffswitch4" class="onoffswitch2-label"></label>
                    </p>
                  </div>
                  <div class="switch-toggle darkMenu d-flex mt-2"> <span class="me-auto">Dark Menu</span>
                    <p class="onoffswitch2">
                      <input type="radio" name="onoffswitch2"
                        id="myonoffswitch5" class="onoffswitch2-checkbox" checked>
                      <label for="myonoffswitch5" class="onoffswitch2-label"></label>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="swichermainleft header-colors">
              <h4>Header Styles</h4>
              <div class="skin-body">
                <div class="switch_section">
                  <div class="switch-toggle lightHeader d-flex"> <span class="me-auto">Light Header</span>
                    <p class="onoffswitch2">
                      <input type="radio" name="onoffswitch3"
                        id="myonoffswitch6" class="onoffswitch2-checkbox" checked>
                      <label for="myonoffswitch6" class="onoffswitch2-label"></label>
                    </p>
                  </div>
                  <div class="switch-toggle  colorHeader d-flex mt-2"> <span class="me-auto">Color Header</span>
                    <p class="onoffswitch2">
                      <input type="radio" name="onoffswitch3"
                        id="myonoffswitch7" class="onoffswitch2-checkbox">
                      <label for="myonoffswitch7" class="onoffswitch2-label"></label>
                    </p>
                  </div>
                  <div class="switch-toggle darkHeader d-flex mt-2"> <span class="me-auto">Dark Header</span>
                    <p class="onoffswitch2">
                      <input type="radio" name="onoffswitch3"
                        id="myonoffswitch8" class="onoffswitch2-checkbox">
                      <label for="myonoffswitch8" class="onoffswitch2-label"></label>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="swichermainleft layout-width-style">
              <h4>Layout Width Styles</h4>
              <div class="skin-body">
                <div class="switch_section">
                  <div class="switch-toggle d-flex"> <span class="me-auto">Full Width</span>
                    <p class="onoffswitch2">
                      <input type="radio" name="onoffswitch4"
                        id="myonoffswitch9" class="onoffswitch2-checkbox" checked>
                      <label for="myonoffswitch9" class="onoffswitch2-label"></label>
                    </p>
                  </div>
                  <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Boxed</span>
                    <p class="onoffswitch2">
                      <input type="radio" name="onoffswitch4"
                        id="myonoffswitch10" class="onoffswitch2-checkbox">
                      <label for="myonoffswitch10" class="onoffswitch2-label"></label>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="swichermainleft layout-positions">
              <h4>Layout Positions</h4>
              <div class="skin-body">
                <div class="switch_section">
                  <div class="switch-toggle d-flex"> <span class="me-auto">Fixed</span>
                    <p class="onoffswitch2">
                      <input type="radio" name="onoffswitch5"
                        id="myonoffswitch11" class="onoffswitch2-checkbox" checked>
                      <label for="myonoffswitch11" class="onoffswitch2-label"></label>
                    </p>
                  </div>
                  <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Scrollable</span>
                    <p class="onoffswitch2">
                      <input type="radio" name="onoffswitch5"
                        id="myonoffswitch12" class="onoffswitch2-checkbox">
                      <label for="myonoffswitch12" class="onoffswitch2-label"></label>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="swichermainleft vertical-switcher">
              <h4>Sidemenu layout Styles</h4>
              <div class="skin-body">
                <div class="switch_section">
                  <div class="switch-toggle d-flex"> <span class="me-auto">Default Menu</span>
                    <p class="onoffswitch2">
                      <input type="radio" name="onoffswitch6"
                        id="myonoffswitch13" class="onoffswitch2-checkbox default-menu" checked>
                      <label for="myonoffswitch13" class="onoffswitch2-label"></label>
                    </p>
                  </div>
                  <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Icon with Text</span>
                    <p class="onoffswitch2">
                      <input type="radio" name="onoffswitch6"
                        id="myonoffswitch14" class="onoffswitch2-checkbox">
                      <label for="myonoffswitch14" class="onoffswitch2-label"></label>
                    </p>
                  </div>
                  <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Icon Overlay</span>
                    <p class="onoffswitch2">
                      <input type="radio" name="onoffswitch6"
                        id="myonoffswitch15" class="onoffswitch2-checkbox">
                      <label for="myonoffswitch15" class="onoffswitch2-label"></label>
                    </p>
                  </div>
                  <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Closed Sidemenu</span>
                    <p class="onoffswitch2">
                      <input type="radio" name="onoffswitch6"
                        id="myonoffswitch16" class="onoffswitch2-checkbox">
                      <label for="myonoffswitch16" class="onoffswitch2-label"></label>
                    </p>
                  </div>
                  <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Hover Submenu</span>
                    <p class="onoffswitch2">
                      <input type="radio" name="onoffswitch6"
                        id="myonoffswitch17" class="onoffswitch2-checkbox">
                      <label for="myonoffswitch17" class="onoffswitch2-label"></label>
                    </p>
                  </div>
                  <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Hover Submenu Style 1</span>
                    <p class="onoffswitch2">
                      <input type="radio" name="onoffswitch6"
                        id="myonoffswitch18" class="onoffswitch2-checkbox">
                      <label for="myonoffswitch18" class="onoffswitch2-label"></label>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="swichermainleft">
              <h4>Reset All Styles</h4>
              <div class="skin-body">
                <div class="switch_section my-4">
                  <button class="btn btn-danger btn-block" onClick="localStorage.clear();
											document.querySelector('html').style = '';
											names() ;
											resetData();" type="button">Reset All </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END SWITCHER -->
  <?php //}
  ?>
  <!-- LOADEAR -->
  <div id="global-loader"> <img src="<?php echo base_url('assets/img/loader.svg'); ?>" class="loader-img" alt="Er. Amit Kumar"> </div>
  <!-- END LOADEAR -->
  <!-- PAGE -->
  <div class="page">
    <?php $this->load->view('include/header'); ?>
    <?php $this->load->view('include/left'); ?>
    <!-- MAIN-CONTENT -->
    <div class="main-content side-content pt-0">
      <div class="main-container container-fluid">
        <div class="inner-body">
          <div class="ami_toast tst_warning" style="top:72px;"><i class="bx bx-error"></i> ami popup notification</div>
          <div class="rgt_notify tSuccess">
            <ul>
              <li><i class="si si-check"></i> @mi notify on right top corner</li>
              <li>
                <div class="spinrGlow dngr"></div> @mi notify on right top corner
              </li>
              <li>
                <div class="spinrGlow deflt"></div> @mi notify on right top corner
              </li>
              <li>
                <div class="spinrGlow wrng"></div> @mi notify on right top corner
              </li>
            </ul>
          </div>
          <?php
          if ($isCheck <= $isExpired) {



            if (!empty($layout) && trim($layout) !== "") {
              require_once($layout);
            } else {
              //print_r($this->session->userdata('user_cate'));

          ?>
              <!-- Page Header -->
              <div class="page-header">
                <div>
                  <h2 class="main-content-title tx-24 mg-b-5">Welcome To Dashboard </h2>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>


                  </ol>
                </div>
                <div class="d-flex">
                  <div class="justify-content-center">
                    <a href="<?php echo base_url('admin/employee/create'); ?>" class="btn btn-success btn-icon-text my-2 me-2" title="Join Employee">
                      <i class="fe fe-plus"></i> Join Employee
                    </a>
                    <button type="button" class="btn btn-primary btn-icon-text my-2 me-2" id="miArvClk"> <i class="fe fe-filter me-2"></i> Current Time </button>
                    <a href="<?php echo base_url('auth/login/signout'); ?>" class="btn btn-danger btn-icon-text  my-2 me-2"> <i class="fe fe-power me-2"></i> Sign Out </a>
                  </div>
                </div>
              </div>
              <!-- End Page Header -->
              <!--Row-->
              <div class="row row-sm miBottom">
                <div class="col-sm-12 col-lg-12 col-xl-8">
                  <!--Row-->
                  <?php
                  if ($this->usrCat == '4') {
                  ?>
                    <div class="row row-sm  mt-lg-4">
                      <div class="col-sm-12 col-lg-12 col-xl-12">
                        <div class="card bg-primary custom-card card-box">
                          <div class="card-body p-4">
                            <div class="row align-items-center">
                              <div class="offset-xl-3 offset-sm-6 col-xl-8 col-sm-6 col-12 img-bg ">
                                <h4 class="d-flex  mb-3"> <span class="font-weight-bold text-white "><?php echo $employee['name']; ?>!</span> </h4>
                                <p class="tx-white-7 mb-1">You have two projects to finish, you had
                                  completed <b class="text-warning">57%</b> from your montly level,
                                  Keep going to your level
                              </div>
                              <?php if ($employee['gender'] == 1) { ?>
                                <img src="<?php echo base_url(); ?>assets/img/pngs/boy.png" alt="user-img" style="height: 195px;">
                              <?php } elseif ($employee['gender'] == 2) { ?>
                                <div class="miImgs"><img src="<?php echo base_url(); ?>assets/img/pngs/work2.png" alt="user-img"></div>
                              <?php } ?>
                            </div>
                          </div>
                          <div class="miLoggedOverview">
                            <ul>
                              <li>Present<span><?php echo $loggedAtt['present'] ? (($loggedAtt['present'] > 9) ? $loggedAtt['present'] : '0' . $loggedAtt['present']) : '00'; ?></span></li>
                              <li class="absnt">Absent<span><?php echo $loggedAtt['absent'] ? (($loggedAtt['absent'] > 9) ? $loggedAtt['absent'] : '0' . $loggedAtt['absent']) : '00'; ?></span></li>
                              <li class="hfDy">Half Day<span><?php echo $loggedAtt['hfDy'] ? (($loggedAtt['hfDy'] > 9) ? $loggedAtt['hfDy'] : '0' . $loggedAtt['hfDy']) : '00'; ?></span></li>
                              <li class="lateDy">Late<span><?php echo $loggedAtt['late'] ? (($loggedAtt['late'] > 9) ? $loggedAtt['late'] : '0' . $loggedAtt['late']) : '00'; ?></span></li>
                              <li>Leave<span><?php echo $loggedAtt['leave'] ? (($loggedAtt['leave'] > 9) ? $loggedAtt['leave'] : '0' . $loggedAtt['leave']) : '00'; ?></span></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row row-sm">
                      <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="card custom-card">
                          <div class="card-body">
                            <div class="card-order">
                              <label class="main-content-label mb-3 pt-1 text-primary">Employees</label>
                              <h2 class="text-end card-item-icon card-icon"> <i class="mdi mdi-account-multiple icon-size float-start bg-primary"></i> <span class="font-weight-bold text-primary"><?php echo $totalEmp; ?></span> </h2>
                              <p class="mb-0 mt-4 text-primary">
                                New Employees
                                <sup class="spInc">March</sup>
                                <span class="float-end">
                                  <?php $thisMonthEmp = $loggedAtt['newJoinee'] ? round(($loggedAtt['newJoinee'] * 100 / $totalEmp), 2) : '0';
                                  echo $thisMonthEmp; ?>%
                                </span>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="card custom-card">
                          <div class="card-body">
                            <div class="card-order">
                              <label class="main-content-label mb-3 pt-1 text-success">Total Salary</label>
                              <h2 class="text-end"> <i class="si si-wallet icon-size float-start bg-success"></i>
                                <span class="font-weight-bold text-success miInrC"><i class="fa fa-inr"></i> <?php echo $totalSalary; ?></span>
                              </h2>
                              <p class="mb-0 mt-4 text-success">
                                Monthly Salary <sup class="spInc">March</sup>
                                <span class="float-end slInr"><i class="fa fa-inr"></i> <?php echo $thisMonthSalary; ?> </span>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php } else {


                  ?>
                    <!--------------------------------------------------------------------------------------------------------------------->
                    <div style="margin-top:25px;">
                      <div class="row row-sm">
                        <div class="col-sm-6 col-md-6 col-xl-4">
                          <div class="card custom-card bg-primary text-white">
                            <div class="card-body">
                              <a href="<?php echo base_url('admin/employee/grid'); ?>" class="text-white">
                                <div class="d-flex no-block align-items-center">
                                  <div><span class="tx-13 mb-3">Total Staff</span>
                                    <h3 class="m-0 mt-2"><?php echo $totalEmp; ?></h3>
                                  </div>
                                  <div class="ms-auto mt-auto">
                                    <div class="icon-service bg-white rounded-circle text-primary show-wave"><i class="si si-people"></i></div>
                                  </div>
                                </div>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-xl-4">
                          <div class="card custom-card bg-success text-white">
                            <div class="card-body ">
                              <a href="<?php echo base_url('admin/employee/active'); ?>" class="text-white">
                                <div class="d-flex no-block align-items-center">
                                  <div><span class="tx-13 mb-3">Working Staff </span>
                                    <h3 class="m-0 mt-2"><?php echo $isNewEmp; ?></h3>
                                  </div>
                                  <div class="ms-auto mt-auto">
                                    <div class="icon-service bg-white rounded-circle text-success show-wave"><i class="si si-people"></i></div>
                                  </div>
                                </div>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-xl-4">
                          <div class="card custom-card bg-secondary">
                            <div class="card-body">
                              <a href="<?php echo base_url('admin/employee/rejected'); ?>" class="text-white">
                                <div class="d-flex no-block align-items-center">
                                  <div><span class="tx-13 mb-3">Resigned Staff</span>
                                    <h3 class="m-0 mt-2"><?php echo $resigned; ?></h3>
                                  </div>
                                  <div class="ms-auto mt-auto">
                                    <div class="icon-service bg-white rounded-circle text-secondary show-wave"><i class="si si-people"></i></div>
                                  </div>
                                </div>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>




                      <style>
                        .item {
                          width: 248px;
                        }

                        .text-hfDy {
                          color: #D9AD03;
                        }

                        .text-absnt {
                          color: #F16D75;
                        }

                        .text-leave {
                          color: #009EA6;
                        }

                        .text-late {
                          color: #CC7000;
                        }
                      </style>
                      <div class="row row-sm">
                        <div class="owl-carousel  owl-theme">
                          <div class="item">
                            <div class="card custom-card">
                              <div class="card-body">
                                <a href="<?php echo base_url('admin/attendance/daily'); ?>" class="text-white">
                                  <div class="d-flex no-block align-items-center">
                                    <div><span class="text-muted tx-13 mb-3">Present Employees</span>
                                      <h3 class="m-0 mt-2 text-success"><?php echo $tEmpPresent; ?></h3>
                                    </div>
                                    <div class="ms-auto mt-auto">
                                      <img src="<?php echo base_url('media/images/present.png'); ?>" class="wd-40 hd-40 me-2" alt="">
                                    </div>
                                  </div>
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="item">
                            <div class="card custom-card">
                              <div class="card-body">
                                <a href="<?php echo base_url('admin/attendance/daily'); ?>" class="text-white">
                                  <div class="d-flex no-block align-items-center">
                                    <div>
                                      <span class="text-muted tx-13 mb-3">Absent Employees</span>
                                      <h3 class="m-0 mt-2 text-absnt"><?php echo $tEmpAbsent; ?></h3>
                                    </div>
                                    <div class="ms-auto mt-auto">
                                      <img src="<?php echo base_url('media/images/absent.png'); ?>" class="wd-40 hd-40 me-2" alt="">
                                    </div>
                                  </div>
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="item">
                            <div class="card custom-card">
                              <div class="card-body">
                                <a href="<?php echo base_url('admin/attendance/daily'); ?>" class="text-white">
                                  <div class="d-flex no-block align-items-center">
                                    <div>
                                      <span class="text-muted tx-13 mb-3">Late Employees</span>
                                      <h3 class="m-0 mt-2 text-late"><?php echo $tEmpLate; ?></h3>
                                    </div>
                                    <div class="ms-auto mt-auto">
                                      <img src="<?php echo base_url('media/images/late.png'); ?>" class="wd-40 hd-40 me-2" alt="">
                                    </div>
                                  </div>
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="item">
                            <div class="card custom-card">
                              <div class="card-body">
                                <a href="<?php echo base_url('admin/attendance/daily'); ?>" class="text-white">
                                  <div class="d-flex no-block align-items-center">
                                    <div>
                                      <span class="text-muted tx-13 mb-3">Half Day Employees</span>
                                      <h3 class="m-0 mt-2 text-hfDy"><?php echo $tEmpHfDy; ?></h3>
                                    </div>
                                    <div class="ms-auto mt-auto">
                                      <img src="<?php echo base_url('media/images/half_day.png'); ?>" class="wd-40 hd-40 me-2" alt="">
                                    </div>
                                  </div>
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="item">
                            <div class="card custom-card">
                              <div class="card-body">
                                <a href="<?php echo base_url('admin/attendance/daily'); ?>" class="text-white">
                                  <div class="d-flex no-block align-items-center">
                                    <div>
                                      <span class="text-muted tx-13 mb-3">Leave Employees</span>
                                      <h3 class="m-0 mt-2 text-leave"><?php echo $tEmpLeave; ?></h3>
                                    </div>
                                    <div class="ms-auto mt-auto">
                                      <img src="<?php echo base_url('media/images/leave.png'); ?>" class="wd-40 hd-40 me-2" alt="">
                                    </div>
                                  </div>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row row-sm">
                        <div class="col-sm-6 col-md-6 col-xl-4">
                          <div class="card custom-card">
                            <div class="card-body">
                              <a href="<?php echo base_url('admin/leave/requested'); ?>" class="text-white">
                                <div class="d-flex no-block align-items-center">
                                  <div>
                                    <span class="tx-13 mb-3 text-hfDy">Requested Leave</span>
                                    <h3 class="m-0 mt-2 text-hfDy"><?php echo $tEmpPresent; ?></h3>
                                  </div>
                                  <div class="ms-auto mt-auto">
                                    <img src="<?php echo base_url('media/images/leave_request.png'); ?>" class="wd-40 hd-40 me-2" alt="">
                                  </div>
                                </div>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-xl-4">
                          <div class="card custom-card">
                            <div class="card-body">
                              <a href="<?php echo base_url('admin/leave/approved'); ?>" class="text-white">
                                <div class="d-flex no-block align-items-center">
                                  <div>
                                    <span class="tx-13 mb-3 text-success">Approved Leave</span>
                                    <h3 class="m-0 mt-2 text-success"><?php echo $tEmpPresent; ?></h3>
                                  </div>
                                  <div class="ms-auto mt-auto">
                                    <img src="<?php echo base_url('media/images/leave_apr.png'); ?>" class="wd-40 hd-40 me-2" alt="">
                                  </div>
                                </div>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-xl-4">
                          <div class="card custom-card">
                            <div class="card-body">
                              <a href="<?php echo base_url('admin/leave/rejected'); ?>" class="text-white">
                                <div class="d-flex no-block align-items-center">
                                  <div>
                                    <span class="tx-13 mb-3 text-danger">Rejected Leave</span>
                                    <h3 class="m-0 mt-2 text-danger"><?php echo $tEmpPresent; ?></h3>
                                  </div>
                                  <div class="ms-auto mt-auto">
                                    <img src="<?php echo base_url('media/images/leave_reject.png'); ?>" class="wd-40 hd-40 me-2" alt="">
                                  </div>
                                </div>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                    <!--------------------------------------------------------------------------------------------------------------------->
                  <?php } ?>
                </div>
                <div class="col-sm-12 col-lg-12 col-xl-4 mt-xl-4">
                  <div class="card custom-card card-dashboard-calendar pb-0" style="min-height:375px">
                    <label class="main-content-label mb-2 pt-1">Today's Attendance</label>
                    <span class="d-block tx-11 mb-2 text-muted">Be present, be engaged, and watch your knowledge grow</span>

                    <?php //print_r($this->session->userdata('user_cate'));
                    ?>
                    <table class="table table-hover m-b-0 transcations mt-2">
                      <tbody>
                        <?php
                        //	print_r($todayAttendance);
                        //	exit;
                        if ($todayAttendance) {
                          foreach ($todayAttendance as $att) {
                            if ($att->attendance_status == '1') {
                              $attSign = 'fas fa-level-up-alt ms-2 text-success m-l-10';
                            } else if ($att->attendance_status == '2') {
                              $attSign = 'fas fa-level-down-alt ms-2 text-danger m-l-10';
                            } else {
                              $attSign = 'fas fa-level-down-alt ms-2 text-danger m-l-10';
                            }

                            $employeeNm = (strlen($att->name) <= 20) ? $att->name : substr($att->name, 0, 15) . '...';
                            /*$lastPart = substr($att->name, -10);
						$employeeNm = $firstPart . "..." . $lastPart;*/

                        ?>
                            <tr>
                              <td class="wd-5p">
                                <div class="main-img-user avatar-md"><img alt="avatar" class="rounded-circle me-3" src="<?php echo base_url($att->image); ?>"></div>
                              </td>
                              <td>
                                <div class="d-flex align-middle ms-3">
                                  <div class="d-inline-block">
                                    <h6 class="mb-1"><?php echo $employeeNm; ?></h6>
                                    <p class="mb-0 tx-13 text-muted"><?php echo $att->designation_name; ?></p>
                                  </div>
                                </div>
                              </td>
                              <td class="text-end">
                                <div class="d-inline-block">
                                  <h6 class="mb-2 tx-12 font-weight-semibold">
                                    <?php echo date('d M Y', strtotime($att->attendance_date)); ?><i class="<?php echo $attSign; ?>"></i>
                                  </h6>
                                  <p class="mb-0 tx-11 text-muted"><?php echo date('H:i:s a', strtotime($att->log_in_time)); ?></p>
                                </div>
                              </td>
                            </tr>
                          <?php }
                        } else { ?>
                          <tr>
                            <td colspan="3" class="wd-5p">
                              <div style="padding:5px 10px 11px 10px;border-radius:3px;border:1px solid #e8bca7;background-color:#ffdbc9;">
                                <div class="product-img">
                                  <img src="<?php echo base_url('uploads/staff/no_img.png'); ?>" style="border-radius:4px;">
                                </div>
                                <div style="margin:-38px auto auto 50px">
                                  <div class="d-inline-block">
                                    <h6 class="mb-1 efRr">Oops there is no attendance</h6>
                                    <p class="mb-0 tx-13 efRr" style=" margin-top:-8px">by employee</p>
                                  </div>
                                </div>
                              </div>
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!------------------------------------------------------------------------------------->
                <div class="col-md-12 col-lg-12 col-xl-4">
                  <div class="card custom-card">
                    <div class="card-header border-bottom-0 pb-0">
                      <label class="main-content-label mb-2 pt-1">Real Time Status</label>
                      <p class="tx-12 mb-0 text-muted">Because every second counts — monitor attendance live.
                        <!--<span id="screenHgt">Screen Height :: 0px</span>-->
                      </p>
                    </div>
                    <div class="card-body sales-product-info ot-0 pt-0 pb-0">
                      <div id="panchGraphDetails" class="ht-150"></div>
                      <div class="row sales-product-infomation pb-0 mb-0 mx-auto wd-100p">
                        <div class="col-md-6 col justify-content-center text-center">
                          <p class="mb-0 d-flex justify-content-center tx-success"><span class="legend bg-success brround"></span>Punched In</p>
                          <h6 class="mb-4 font-weight-bold text-muted"><?php echo ($punchOverview->punch_in ? $punchOverview->punch_in : "0"); ?></h6>
                        </div>
                        <div class="col-md-6 col text-center float-end">
                          <p class="mb-0 d-flex justify-content-center tx-danger"><span class="legend bg-danger brround"></span>Punched Out</p>
                          <h6 class="mb-4 font-weight-bold text-muted"> <?php echo ($punchOverview->punch_out ? $punchOverview->punch_out : "0"); ?></h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 col-lg-12 col-xl-8">
                  <div class="card custom-card">
                    <div class="card-header border-bottom-0 pb-0">
                      <label class="main-content-label mb-2 pt-1">Daily Average Working Hours</label>
                      <p class="tx-12 mb-0 text-muted">Consistency today builds mastery tomorrow — every hour counts</p>

                    </div>
                    <div class="card-body sales-product-info ot-0 pt-0 pb-0">
                      <div class="ht-350">
                        <canvas id="dailyWorkingHrs"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 col-lg-12 col-xl-4">
                  <div class="card custom-card">
                    <div class="card-header border-bottom-0 pb-0">
                      <label class="main-content-label mb-2 pt-1">Expense Overview</label>
                      <p class="tx-12 mb-0 text-muted">Smart spending is the first step to smart saving.</p>
                    </div>
                    <div class="card-body sales-product-info ot-0 pt-0 pb-0">
                      <div class="chartjs-wrapper-demo mb-4 ht-250 mrvScale" style="padding-top:14px;">
                        <canvas id="expenseOverview"></canvas>

                      </div>
                      <div style="padding:0px 0px 11px 0px;">
                        <div class="pb-0 mb-4 mx-auto wd-100p text-center">
                          <span class="badge expApproved">Approved</span>
                          <span class="badge expPaidOut">Hold</span>
                          <span class="badge expReject">Rejected</span>
                          <span class="badge expPending">Pending</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>







                <div class="col-md-12 col-lg-12 col-xl-4">
                  <div class="card flex-fill dash-statistics">
                    <div class="card-body">
                      <h5 class="card-title mb-btm">Today's Statistics</h5>
                      <div class="stats-list">
                        <div class="stats-info">
                          <p> Present <strong><?php echo $tEmpPresent; ?> <small>/ <?php echo $totalEmp; ?></small></strong></p>
                          <div class="progress">
                            <div style="width:<?php echo $prsntPr; ?>%; background-color:#17a602;"> &nbsp;</div>
                          </div>
                        </div>
                        <div class="stats-info">
                          <p> Late <strong><?php echo $tEmpLate; ?> <small>/ <?php echo $totalEmp; ?></small></strong></p>
                          <div class="progress">
                            <div style="width:<?php echo $latePr; ?>%; background-color:#e1680f;"> &nbsp;</div>
                          </div>
                        </div>
                        <div class="stats-info">
                          <p> Absent <strong><?php echo $tEmpAbsent; ?> <small>/ <?php echo $totalEmp; ?></small></strong></p>
                          <div class="progress">
                            <div style="width:<?php echo $absntPr; ?>%; background-color:#e7183a;"> &nbsp;</div>
                          </div>
                        </div>
                        <div class="stats-info">
                          <p> Half Day <strong><?php echo $tEmpHfDy; ?> <small>/ <?php echo $totalEmp; ?></small></strong></p>
                          <div class="progress">
                            <div style="width:<?php echo $halfDyPr; ?>%; background-color:#e3b113;"> &nbsp;</div>
                          </div>
                        </div>
                        <div class="stats-info">
                          <p> Leave <strong><?php echo $tEmpLeave; ?> <small>/ <?php echo $totalEmp; ?></small></strong></p>
                          <div class="progress">
                            <div style="width:<?php echo $leavePr; ?>%; background-color:#009EA6;"> &nbsp;</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-4">
                  <div class="card flex-fill">
                    <div class="card-body">
                      <h5 class="card-title mb-btm">Up Coming Birthdays</h5>
                      <div class="birthdy">
                        <?php
                        if ($empUpComingBdy) {

                          foreach ($empUpComingBdy as $bdy) {
                            $dob = new DateTime($bdy->dob);
                            $today = new DateTime('today');
                            $year = $dob->diff($today)->y;
                            $month = $dob->diff($today)->m;
                            $day = $dob->diff($today)->d;
                            if ($year == '1') {
                              $year = $year . ' Year old';
                            } else {
                              $year = $year . ' Years old';
                            }
                            $nDy = date('Y') . '-' . date('m-d', strtotime($bdy->dob));
                            if ($nDy > date('Y-m-d')) {
                              $dayDiff = abs(round((strtotime($nDy) - strtotime(date('Y-m-d'))) / 86400));
                              if ($dayDiff == '1') {
                                $ndyLeft = '<span>' . $dayDiff . ' day to left</span>';
                              } else {
                                $ndyLeft = '<span>' . $dayDiff . ' days to left</span>';
                              }
                            } else {
                              $ndyLeft = '<span style="color:#d0c301;font-size:11px;padding-right:5px;">Birthday gone</span>';
                            }

                            if (date('m-d', strtotime($bdy->dob)) == date('m-d')) {
                              $bdyBtn = '<span class="badge bg-inverse-success pull-right"><i class="ti-gift"></i> Wish Now</span>';
                            } else {
                              $bdyBtn = '<span class="badge bg-yr pull-right">' . $year . '</span>';
                            }
                            if ($bdy->image) {
                              $bdyImg = base_url($bdy->image);
                            } else {
                              $bdyImg = base_url('uploads/staff/profile/developer.png');
                            }
                        ?>
                            <div class="leave-info-box">
                              <div class="media d-flex align-items-center mBrdy">
                                <a href="profile.html" class="avatar"> <img src="<?php echo $bdyImg; ?>" alt="User Image"></a>
                                <div class="media-body flex-grow-1">
                                  <div class="text-sm myB"><?php echo $bdy->name; ?> <?php echo $bdyBtn; ?>
                                    <div class="mbDte"><?php echo date('d M', strtotime($bdy->dob)) . ' ' . date('Y'); ?> <?php echo $ndyLeft; ?></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <?php }
                        } else { ?>
                          <div class="alert alert-danger">
                            <span class="bdNotify"><i class="ti-gift"></i> Oops it seems there is no recent birthday</span>
                          </div>
                        <?php } ?>
                      </div>
                      <div class="load-more text-center"> <a class="text-dark" href="javascript:void(0);"><i class="si si-refresh"></i>Load More</a> </div>
                    </div>
                  </div>
                </div>
                <div class="col-xxl-3 col-xl-4 col-md-12 col-lg-4">
                  <div class="card flex-fill">
                    <div class="card-body">
                      <h5 class="card-title mb-btm">This Month Holiday </h5>
                      <div <?php if (count($thisMonthHoliday) > 4) { ?> class="hldy" <?php } else {
                                                                                      echo 'class="thisMonthH"';
                                                                                    } ?>>
                        <?php
                        if ($thisMonthHoliday) {
                          $noClrCnt = 0;
                          $clrNotifyArr = array('mi-success-transparent', 'mi-purple-transparent', 'mi-warning-transparent', 'mi-pink-transparent');
                          foreach ($thisMonthHoliday as $isHday) {
                            $nHoliDy = date('Y') . '-' . date('m-d', strtotime($isHday['holiday_date']));
                            if ($nHoliDy > date('Y-m-d')) {
                              $holidayDiff = abs(round((strtotime($nHoliDy) - strtotime(date('Y-m-d'))) / 86400));
                              if ($holidayDiff == '1') {
                                $nHdyLeft = $holidayDiff . ' day to left';
                              } else {
                                $nHdyLeft = $holidayDiff . ' days to left';
                              }
                            } else {
                              $nHdyLeft = '<label style="color:#ca4c00">Completed</label>';
                            }

                            if ($isHday['holiday_name'] == 'Office Off') {
                              $hdEfct = 'mi-orange-transparent';
                            } else {
                              $noClrCnt++;
                              $chosClr = rand(1, 4) - $noClrCnt;
                              if ($chosClr < 0) {
                                $chosClr = 1;
                              } else {
                                $chosClr = $chosClr;
                              }
                              $hdEfct = $clrNotifyArr[$chosClr];
                            }
                        ?>
                            <div class="mb-4">
                              <div class="d-flex comming_holidays calendar-icon icons">
                                <span class="date_time <?php echo $hdEfct; ?> rounded-3 me-3">
                                  <span class="date fs20"><?php echo date('d', strtotime($isHday['holiday_date'])); ?></span>
                                  <span class="month fs13" style="text-transform:uppercase"><?php echo date('M', strtotime($isHday['holiday_date'])); ?></span>
                                </span>
                                <div class="me-3 mt-0 mt-sm-1 d-block">
                                  <h6 class="mb-1 fw-medium"><?php echo $isHday['description']; ?></h6>
                                  <span class="clearfix"></span> <small><?php echo $isHday['holiday_name']; ?></small>
                                </div>
                                <p class="float-end text-muted  mb-0 fs13 ms-auto rounded-3 my-auto"><?php echo $nHdyLeft; ?></p>
                              </div>
                            </div>
                          <?php }
                        } else { ?>
                          <div class="mb-4 mi-orange-transparent rounded-3">
                            <div class="d-flex comming_holidays calendar-icon icons">
                              <span class="date_time mi-orange-transparent rounded-3 me-3"><span class="date fs20">X</span>
                                <span class="month fs13"><?php echo date('M'); ?></span>
                              </span>
                              <div>
                                <h6 class="mb-1 fw-medium" style="padding-top:5px;">Ooops</h6>
                                <span class="clearfix"></span> <small>There is no holiday this month</small>
                              </div>
                            </div>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xxl-3 col-xl-4 col-md-12 col-lg-4">
                  <div class="card custom-card">
                    <div class="card-header border-bottom-0 pb-1">
                      <label class="main-content-label mb-2 pt-1">New Joinee</label>
                      <p class="tx-12 mb-0 text-muted">Who joined to work here to explore his new journey.</p>
                    </div>
                    <div class="card-body pt-0 miHt">
                      <?php //print_r(count($recentJoinee));
                      ?>
                      <ul class="top-selling-products pb-0 mb-0 px-0">
                        <?php
                        if ($recentJoinee) {
                          foreach ($recentJoinee as $recent) {
                            if ($recent->salary_type == '1') {
                              $salary = $recent->salary_amount * 26;
                            } else if ($recent->salary_type == '2') {
                              $salary = $recent->salary_amount * 26 / 7;
                            } else {
                              $salary = $recent->salary_amount;
                            }
                            $recentEmpNm = (strlen($recent->name) <= 20) ? $recent->name : substr($recent->name, 0, 15) . '...';
                        ?>
                            <li class="product-item">
                              <div class="product-img"><img src="<?php echo base_url($recent->image); ?>" alt=""></div>
                              <div class="product-info">
                                <div class="product-name"><?php echo $recentEmpNm; ?></div>
                                <div class="price mPrce"><?php echo $recent->designation_name; ?></div>
                              </div>
                              <div class="product-amount">
                                <div class="product-price miAmt"><i class="fa fa-inr"></i> <?php echo $salary; ?></div>
                                <div class="items-sold">Joined Date :- <?php echo date('d/m/Y', strtotime($recent->created_at)); ?></div>
                              </div>
                            </li>
                          <?php }
                        } else { ?>
                          <li class="product-item" style="background-color:#ffdbc9 !important;padding:5px 10px 5px 10px;border:1px solid #e8bca7;">
                            <div class="product-img"><img src="<?php echo base_url('uploads/staff/no_img.png'); ?>" alt=""></div>
                            <div class="product-info">
                              <div class="product-name" style="color:#b75600;">XXXXX XXXXXX </div>
                              <div class="price" style="color:#b75600;">xxxxxxxxxx</div>
                            </div>
                            <div class="product-amount">

                              <div class="items-sold efRr">Oops there is no recent employee here</div>
                            </div>
                          </li>
                        <?php } ?>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-xxl-3 col-xl-4 col-md-12 col-lg-4">
                  <div class="card custom-card">
                    <div class="card-header border-bottom-0 pb-1">
                      <label class="main-content-label mb-2 pt-1">Recent Employee Turnover</label>
                      <p class="tx-12 mb-0 text-muted">Who left this company to end work here to explore his new journey.</p>
                    </div>
                    <div class="card-body pt-0 miHt">
                      <ul class="top-selling-products pb-0 mb-0 px-0">
                        <?php
                        if ($recentTurnover) {
                          foreach ($recentTurnover as $recent) {
                            if ($recent->salary_type == '1') {
                              $salary = $recent->salary_amount * 26;
                            } else if ($recent->salary_type == '2') {
                              $salary = $recent->salary_amount * 26 / 7;
                            } else {
                              $salary = $recent->salary_amount;
                            }
                        ?>
                            <li class="product-item">
                              <div class="product-img"><img src="<?php echo base_url($recent->image); ?>" alt=""></div>
                              <div class="product-info">
                                <div class="product-name"><?php echo $recent->name; ?></div>
                                <div class="price mPrce"><?php echo $recent->designation_name; ?></div>
                              </div>
                              <div class="product-amount">
                                <div class="product-price miAmt"><i class="fa fa-inr"></i> <?php echo $salary; ?></div>
                                <div class="items-sold">Termination Date :- <?php echo date('d/m/Y', strtotime($recent->termination_date)); ?></div>
                              </div>
                            </li>
                          <?php }
                        } else { ?>
                          <li class="product-item" style="background-color:#ffdbc9 !important;padding:5px 10px 5px 10px;border:1px solid #e8bca7;">
                            <div class="product-img"><img src="<?php echo base_url('uploads/staff/no_img.png'); ?>" alt=""></div>
                            <div class="product-info">
                              <div class="product-name" style="color:#b75600;">XXXXX XXXXXX </div>
                              <div class="price" style="color:#b75600;">xxxxxxxxxx</div>
                            </div>
                            <div class="product-amount">

                              <div class="items-sold efRr">Oops there is no recent employee here</div>
                            </div>
                          </li>
                        <?php } ?>


                        <!-- <li class="product-item">
                    <div class="product-img"><img src="../assets/img/pngs/14.png" alt=""></div>
                    <div class="product-info">
                        <div class="product-name">College Bag</div>
                        <div class="price">Fashion</div>
                    </div>
                    <div class="product-amount">
                        <div class="product-price">$990.00</div>
                        <div class="items-sold">10 Sold</div>
                    </div>
                </li>
                <li class="product-item">
                    <div class="product-img"><img src="../assets/img/pngs/18.png" alt=""></div>
                    <div class="product-info">
                        <div class="product-name">Smartwatch</div>
                        <div class="price">Electronics</div>
                    </div>
                    <div class="product-amount">
                        <div class="product-price">$990.00</div>
                        <div class="items-sold">10 Sold</div>
                    </div>
                </li>
                <li class="product-item">
                    <div class="product-img"><img src="../assets/img/pngs/17.png" alt=""></div>
                    <div class="product-info">
                        <div class="product-name">Chair</div>
                        <div class="price">Furniture</div>
                    </div>
                    <div class="product-amount">
                        <div class="product-price">$990.00</div>
                        <div class="items-sold">10 Sold</div>
                    </div>
                </li>
                <li class="product-item">
                    <div class="product-img"><img src="../assets/img/pngs/16.png" alt=""></div>
                    <div class="product-info">
                        <div class="product-name">Flowers Pot</div>
                        <div class="price">Gardening</div>
                    </div>
                    <div class="product-amount">
                        <div class="product-price">$990.00</div>
                        <div class="items-sold">10 Sold</div>
                    </div>
                </li>
                <li class="product-item pb-0">
                    <div class="product-img"><img src="../assets/img/pngs/19.png" alt=""></div>
                    <div class="product-info">
                        <div class="product-name">iPhone Mobile</div>
                        <div class="price">Electronics</div>
                    </div>
                    <div class="product-amount">
                        <div class="product-price">$990.00</div>
                        <div class="items-sold">10 Sold</div>
                    </div>
                </li>-->
                      </ul>
                    </div>
                  </div>
                </div>

                <!-------------------------------------------------------------------------------------->
              </div>
              <!-- Row end -->
            <?php }
          } else { ?>
            <!--<div class="row row-sm">
							<div class="col-sm-12 col-lg-12 col-xl-8">
								<div class="mt-lg-4">	
									
									
									
									<div class="card custom-card">
										<div class="card-header p-3 tx-medium my-auto tx-white bg-secondary">
											Time to Renew License
										</div>
										<div class="card-body">
											<p class="mg-b-0">
											
											<p>Subject: Time to Renew Your <strong>[<?php //echo config_item('software'); 
                                                              ?>]</strong> License</p>
	<p>Hello [Customer Name],</p>
	<p>We hope you’ve been enjoying your experience with <strong><?php //echo config_item('software'); 
                                                                ?></strong>. We wanted to send you a friendly reminder that your software license subscription is due to expire on [Expiration Date].</p>
	<p>To ensure uninterrupted access to all the features and benefits you’ve come to rely on, please renew your subscription before the expiration date.</p>
	<p>To renew your subscription, simply follow these steps:</p>
	<p>Step 1<br> Step 2<br> Step 3</p>
	<p>If you have any questions or need assistance, please don’t hesitate to contact our support team at [Support Email Address] or visit our [Support Page].</p>
	<p>Keep Enjoying [Your Software Name],<br> [Your Company Name]</p>
											
											</p>
										</div>
									</div>
									
									</div>
							</div>	
						</div>-->
            <div class="modal" id="isCheckLicence" data-bs-backdrop="static" data-bs-keyboard="false">
              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content tx-size-sm">
                  <div class="modal-body tx-center pd-y-20 pd-x-20">
                    <div id="renwMsg"> <i class="icon ion-ios-power tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                      <h4 class="tx-danger tx-semibold mg-b-20">Warning !!!</h4>
                      <p class="mg-b-0">
                      <p>Subject: Time to Renew Your <strong>[ <?php echo config_item('software'); ?>] </strong> software.</p>
                      <p style=" text-align:justify;">Dear <?php echo $this->session->userdata('mi_name'); ?>,<br>
                        We hope you’ve been
                        enjoying your experience with <strong> <?php echo config_item('software'); ?> </strong>. We wanted to send you a friendly reminder that your software
                        license subscription is due to expire on <strong>[ <?php echo date('d-m-Y', $isExpired); ?>] </strong>.To ensure uninterrupted access to all the features and benefits
                        you’ve come to reply on,please renew your subscription before the expiration
                        date. </p>
                      </p>
                      <a href="<?php echo base_url('auth/login/signout'); ?>" id="renwContinue"
                        class="btn ripple btn-success amiBtnActn"> Continue <i class="si si-arrow-right-circle"></i> </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <!-- END MAIN-CONTENT -->
    <?php //$this->load->view('include/side_bar') 
    ?>
    <!-- FOOTER -->
    <div class="main-footer text-center" style="position:fixed;left:0;bottom:0;width:100%;">
      <div class="container">
        <div class="row row-sm">
          <div class="col-md-12"> <span>Copyright © 2023 <a href="#"> <?php echo system_info('company_name'); ?> </a>. Designed by <a href="http://www.facebook.com/amisingh143"> <?php echo config_item('dev_name'); ?> </a> All rights reserved.</span> </div>
        </div>
      </div>
    </div>
    <!-- END FOOTER -->
  </div>
  <!-- END PAGE -->
  <!-- SCRIPTS -->


  <?php
  $this->curent = $this->router->fetch_class();
  $this->load->view('include/js');
  if (!($isCheck <= $isExpired)) { ?>
    <style>
      #renwContinue i {
        font-size: 12px;
      }

      #target {
        display: none;
      }

      .licnce {
        margin: -20px;
      }

      #errKey {
        display: none;
        color: #cc4300;
        float: right;
        margin-top: -60px;
      }
    </style>
    <script>
      $(document).ready(function() {
        $(".form-control").keyup(function() {
          let actNbtn = $(this).attr('id');
          $('#' + actNbtn).addClass('parsley-success').removeClass('parsley-error');
          $('#errKey').fadeOut('slow');

        });



        $("#isCheckLicence").modal('show');
        $(".amiBtnActn").click(function() {
          let actNbtn = $(this).attr('id');
          /*if(actNbtn=='renwContinue')
			{
				$("#renwMsg").hide();
				$("#renwProcess").show();
					}
				else if(actNbtn=='unlock_period')
				{
					$("#isCheckLicence").modal('hide');
					if(!isCheck('liKey')){isNull('liKey');$("#errKey").show();}
					else
					{$('#unlock_period').html('<i class="fe fe-settings bx-spin"></i> Please Wait...');}
					}*/

        });

      });
    </script>
  <?php }
  if ($this->curent == 'dashboard') { ?>
    <script src="<?php echo base_url('assets/plugins/owl-carousel/owl.carousel.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/crypto-dashboard.js'); ?>"></script>
  <?php } ?>
</body>

</html>