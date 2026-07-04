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
                <th><div style="width:50px;">SL.</div></th>
                <th>Name </th>
                <th>Leave </th>
                <th>Days</th>
                <th>From</th>
                <th>To</th>
                <th class="text-center">Approvals</th>
              </tr>
            </thead>
           <tbody class="tbody"><tr>
               <td>1</td><td>Super Admin</td><td><b class="highlight">Sick Leave</b></td><td>1</td><td>2024-12-10</td><td>2024-12-10</td><td>HR Approved</td></tr><tr>
               <td>2</td><td>HR</td><td><b class="highlight">Sick Leave</b></td><td>1</td><td>2024-11-28</td><td>2024-11-28</td><td>HR Approved</td></tr><tr>
               <td>3</td><td>shinta</td><td><b class="highlight">Sick Leave</b></td><td>2</td><td>2024-11-27</td><td>2024-11-28</td><td>HR Approved</td></tr><tr>
               <td>4</td><td>shinta</td><td><b class="highlight">Sick Leave</b></td><td>2</td><td>2024-11-25</td><td>2024-11-26</td><td>HR Approved</td></tr>
           </tbody> 
          </table>
        </div>
      </div>
    </div>
    <input type="hidden" id="target" name="target" value="<?php echo $target;?>" />
  </div>
  <!-- End Row -->
</div>
