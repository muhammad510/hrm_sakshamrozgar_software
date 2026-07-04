<div class="inner-body">
<!-- Page Header -->
<div class="page-header">
  <div>
    <h2 class="main-content-title tx-24 mg-b-5">Roles</h2>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="javascript:void(0);">All</a></li>
      <li class="breadcrumb-item active" aria-current="page">View</li>
    </ol>
  </div>
  <div class="d-flex">
    <div class="justify-content-center">
      <button type="button" class="btn btn-white btn-icon-text my-2 me-2"> <i class="fe fe-download me-2"></i> Import </button>
      <button type="button" class="btn btn-white btn-icon-text my-2 me-2"> <i class="fe fe-filter me-2"></i> Filter </button>
      <button type="button" class="btn btn-primary my-2 btn-icon-text"> <i class="fe fe-download-cloud me-2"></i> Download Report </button>
    </div>
  </div>
</div>
<!-- End Page Header -->
<style>
#searchMachineDetails,#amiMachineAllChanges,#newMachineID{display:none;}
		.miBck a:hover{ background-color:#645bca; color:#fff;}
		.miBck{ font-weight:600;text-transform: uppercase; float:right;margin-right: 10px;padding-top: 7px;}
		.miBck a{ border:1px solid #645bca;padding:6px 12px 6px 12px;border-radius: 5px;color: #645bca;font-weight: bold;}
		.miLst{ font-weight:600;text-transform: uppercase;}
		.miLst i{ background-color: #645bca;padding: 11px 11px 10px 10px ;margin-right: 10px;border-radius: 20px;color: #fff;font-weight: bold;}
		.miHeader{padding:10px 15px 10px 15px;border-bottom: 1px solid #cccece;margin: 0px -10px 20px -10px;border-top-left-radius: 5px;border-top-right-radius: 5px;}
		.cardTtl{border:1px solid #fff;padding:0px 0px 40px 0px;margin-bottom: 20px;border-radius: 5px;background-color: #fff;}
	    .ami_tHeader{ background-color:#088 !important }
		.ami_tHeader > tr > th{ color:#FFFFFF !important;border: 1px solid #088 !important;padding: 12px 0px 12px 5px !important;}
		.ami_tHeader > tr{border: 1px solid #088 !important;}
		.miRfr i{ font-size:12px;}
	.miRfr{padding:4px 8px 2px 8px;color:#ffffff;background-color:#0077AF;border-color:#0077AF;margin-right:1.5px;}	
	.miRfr:hover{ background-color:#0089C9;color:#fff;border-color:#0089C9;}
	.delMsg {text-align: center;font-size: 20px;margin: 30px 0px 10px 0px;color: #00805c;}
.actnData {text-align: center;margin: 0px 0px 20px 0px;color: #716c6c;font-size: .8rem;}    .miLvs {
  padding: 5px 12px 5px 12px;
}
    </style>
<!-- Row -->
<div class="row row-sm">
  <div class="cardTtl">
    <div class="miHeader"> <span class="miLst"><i class="fe fe-sliders"></i><span id="bxTitleNm"><?php echo $breadcrumb;?></span></span> <span class="miBck"> <a href="javascript:void(0);" style="margin-left:-5px;" title="Search machine details" class="miDefault machineManage" id="machineSrch"> <i class="ti-search"></i> </a> </span> <span class="miBck"> <a href="javascript:void(0);" style="margin-left:-5px;" title="Add Machine" class="miDefault machineManage" id="addNewMachineDetails" data-id="<?php echo $addMachine;?>"> <i class="ti-plus"></i> </a> </span> </div>
    <div class="row row-sm">
      <div id="amiResult">
        <div class="table-responsive">
          <table class="table text-nowrap text-md-nowrap table-striped table-bordered table-hover mg-b-0" id="machine_det">
            <thead class="ami_tHeader">
              <tr>
                <th><div style="width:50px;">S.No.</div></th>
                <th>Name </th>
                <th>Status</th>
                <th>Web Login</th>
                <th>App Login</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody class="tbody">
              <tr>
               
                <td>1</td>
                <td>Role3</td>
                <td><small class="badge bg-success">Active</small></td>
                <td><div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" onchange="changeLoginStatus(`https://demo.24hourworx.com/hrm/roles/change-login`,7,`web_login`)" role="switch" id="web_login_7" checked="">
                    <label class="form-check-label" for="web_login_7"></label>
                  </div></td>
                <td><div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" onchange="changeLoginStatus(`https://demo.24hourworx.com/hrm/roles/change-login`,7,`app_login`)" role="switch" id="app_login_7" checked="">
                    <label class="form-check-label" for="app_login_7"></label>
                  </div></td>
                <td><div class="dropdown dropdown-action">
                    <button type="button" class="btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-solid fa-ellipsis"></i> </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <a href="https://demo.24hourworx.com/hrm/roles/edit/7" class="dropdown-item"> Edit</a><a href="javascript:;" class="dropdown-item" onclick="__globalDelete(7,`hrm/roles/delete/`)"> Delete </a>
                    </ul>
                  </div></td>
              </tr>
              <tr>
               
                <td>2</td>
                <td>Trainer</td>
                <td><small class="badge bg-success">Active</small></td>
                <td><div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" onchange="changeLoginStatus(`https://demo.24hourworx.com/hrm/roles/change-login`,6,`web_login`)" role="switch" id="web_login_6" checked="">
                    <label class="form-check-label" for="web_login_6"></label>
                  </div></td>
                <td><div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" onchange="changeLoginStatus(`https://demo.24hourworx.com/hrm/roles/change-login`,6,`app_login`)" role="switch" id="app_login_6" checked="">
                    <label class="form-check-label" for="app_login_6"></label>
                  </div></td>
                <td><div class="dropdown dropdown-action">
                    <button type="button" class="btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-solid fa-ellipsis"></i> </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <a href="https://demo.24hourworx.com/hrm/roles/edit/6" class="dropdown-item"> Edit</a><a href="javascript:;" class="dropdown-item" onclick="__globalDelete(6,`hrm/roles/delete/`)"> Delete </a>
                    </ul>
                  </div></td>
              </tr>
              <tr>
               
                <td>3</td>
                <td>Terter</td>
                <td><small class="badge bg-success">Active</small></td>
                <td><div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" onchange="changeLoginStatus(`https://demo.24hourworx.com/hrm/roles/change-login`,5,`web_login`)" role="switch" id="web_login_5" checked="">
                    <label class="form-check-label" for="web_login_5"></label>
                  </div></td>
                <td><div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" onchange="changeLoginStatus(`https://demo.24hourworx.com/hrm/roles/change-login`,5,`app_login`)" role="switch" id="app_login_5" checked="">
                    <label class="form-check-label" for="app_login_5"></label>
                  </div></td>
                <td><div class="dropdown dropdown-action">
                    <button type="button" class="btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-solid fa-ellipsis"></i> </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <a href="https://demo.24hourworx.com/hrm/roles/edit/5" class="dropdown-item"> Edit</a><a href="javascript:;" class="dropdown-item" onclick="__globalDelete(5,`hrm/roles/delete/`)"> Delete </a>
                    </ul>
                  </div></td>
              </tr>
              <tr>
               
                <td>4</td>
                <td>Staff</td>
                <td><small class="badge bg-success">Active</small></td>
                <td><div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" onchange="changeLoginStatus(`https://demo.24hourworx.com/hrm/roles/change-login`,4,`web_login`)" role="switch" id="web_login_4" checked="">
                    <label class="form-check-label" for="web_login_4"></label>
                  </div></td>
                <td><div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" onchange="changeLoginStatus(`https://demo.24hourworx.com/hrm/roles/change-login`,4,`app_login`)" role="switch" id="app_login_4" checked="">
                    <label class="form-check-label" for="app_login_4"></label>
                  </div></td>
                <td><div class="dropdown dropdown-action">
                    <button type="button" class="btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-solid fa-ellipsis"></i> </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <a href="https://demo.24hourworx.com/hrm/roles/edit/4" class="dropdown-item"> Edit</a>
                    </ul>
                  </div></td>
              </tr>
              <tr>
               
                <td>5</td>
                <td>HR</td>
                <td><small class="badge bg-success">Active</small></td>
                <td><div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" onchange="changeLoginStatus(`https://demo.24hourworx.com/hrm/roles/change-login`,3,`web_login`)" role="switch" id="web_login_3" checked="">
                    <label class="form-check-label" for="web_login_3"></label>
                  </div></td>
                <td><div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" onchange="changeLoginStatus(`https://demo.24hourworx.com/hrm/roles/change-login`,3,`app_login`)" role="switch" id="app_login_3" checked="">
                    <label class="form-check-label" for="app_login_3"></label>
                  </div></td>
                <td><div class="dropdown dropdown-action">
                    <button type="button" class="btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-solid fa-ellipsis"></i> </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <a href="https://demo.24hourworx.com/hrm/roles/edit/3" class="dropdown-item"> Edit</a>
                    </ul>
                  </div></td>
              </tr>
              <tr>
               
                <td>6</td>
                <td>Admin</td>
                <td><small class="badge bg-success">Active</small></td>
                <td><div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" onchange="changeLoginStatus(`https://demo.24hourworx.com/hrm/roles/change-login`,2,`web_login`)" role="switch" id="web_login_2" checked="">
                    <label class="form-check-label" for="web_login_2"></label>
                  </div></td>
                <td><div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" onchange="changeLoginStatus(`https://demo.24hourworx.com/hrm/roles/change-login`,2,`app_login`)" role="switch" id="app_login_2" checked="">
                    <label class="form-check-label" for="app_login_2"></label>
                  </div></td>
                <td><div class="dropdown dropdown-action">
                    <button type="button" class="btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-solid fa-ellipsis"></i> </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <a href="https://demo.24hourworx.com/hrm/roles/edit/2" class="dropdown-item"> Edit</a>
                    </ul>
                  </div></td>
              </tr>
              <tr>
               
                <td>7</td>
                <td>Super admin</td>
                <td><small class="badge bg-success">Active</small></td>
                <td><div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" onchange="changeLoginStatus(`https://demo.24hourworx.com/hrm/roles/change-login`,1,`web_login`)" role="switch" id="web_login_1" checked="">
                    <label class="form-check-label" for="web_login_1"></label>
                  </div></td>
                <td><div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" onchange="changeLoginStatus(`https://demo.24hourworx.com/hrm/roles/change-login`,1,`app_login`)" role="switch" id="app_login_1" checked="">
                    <label class="form-check-label" for="app_login_1"></label>
                  </div></td>
                <td><div class="dropdown dropdown-action">
                    <button type="button" class="btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-solid fa-ellipsis"></i> </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <a href="https://demo.24hourworx.com/hrm/roles/edit/1" class="dropdown-item"> Edit</a><a href="javascript:;" class="dropdown-item" onclick="__globalDelete(1,`hrm/roles/delete/`)"> Delete </a>
                    </ul>
                  </div></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <input type="hidden" id="target" name="target" value="<?php echo $target;?>" />
  </div>
  <!-- End Row -->
</div>
