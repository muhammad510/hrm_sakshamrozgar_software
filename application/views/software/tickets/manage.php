<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<div class="inner-body">
<!-- Page Header -->
<div class="page-header">
  <div>
    <h2 class="main-content-title tx-24 mg-b-5"><?php echo $title; ?></h2>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="javascript:void(0);">View</a></li>
      <li class="breadcrumb-item active" aria-current="page">All</li>
    </ol>
  </div>
  <div class="d-flex">
    <div class="justify-content-center">
       <a href="<?php echo base_url('attendance/reportList');?>" class="btn btn-success btn-icon-text my-2 me-2" title="Attendance Overview">
       		 <i class="fe fe-list"></i> Overview 
       </a>
       <button type="button" class="btn btn-primary btn-icon-text my-2 me-2" id="miArvClk" title="Current Time"> <i class="fe fe-filter me-2"></i> Current Time </button>
       <a href="<?php echo base_url('auth/login/signout');?>" class="btn btn-danger btn-icon-text  my-2 me-2"  title="Sign Out"> <i class="fe fe-power me-2"></i> Sign Out </a>
    </div>
  </div>
</div>
<!-- End Page Header -->
<style>
.card .card-header .card-title::before {content:"";position:absolute;left:0px;padding:2px;height:30px;background:#6f42c1;}


.bdrBottom{ border-bottom:1px solid #e6e6e6;margin:0px -25px 30px -25px;}
.ami_tHeader > tr > th {color: #FFFFFF !important;border: 1px solid #088 !important;border-top-width: 1px;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: rgb(0, 136, 136);padding: 12px 0px 12px 5px !important;}
.ami_tHeader{ background-color:#088 }
.miBottom{margin-bottom: 75px;}
.dark-theme .bdrBottom{ border-bottom:1px solid #2d2d48;}
.dark-theme .ami_tHeader{ background-color:#025959}
.dark-theme .ami_tHeader > tr > th{border: 1px solid #027373 !important;}
#searchAttendance{ margin-top:20px;}
.bg-success-mi{background:rgba(13, 205, 148, 0.25);color: #009367 !important;padding: 6px 9px 6px 9px;}
.bg-warning-mi {background: rgba(251, 197, 24, 0.25);color: #aa8100 !important;padding: 6px 9px 6px 9px;}
.bg-danger-mi {background: rgba(247, 40, 74, 0.25);color: #f7284a !important;padding: 6px 9px 6px 9px;}
.bg-info-mi {background:rgba(137, 226, 253, 0.25);color: #0c5460 !important;padding: 6px 9px 6px 9px;}
.bgSpn{padding: 6px 9px 6px 9px;}
.fs-12 {font-size: 0.7rem !important;}
.delMsg {text-align: center;font-size: 20px;margin: 30px 0px 10px 0px;color: #595959;}
.actnData{text-align:center;margin:0px 0px 20px 0px;color:green;font-size:.8rem;}
</style>
<div class="row row-sm miBottom">
  <div class="col-sm-12 col-lg-12 col-xl-12">
    <div class="card">
      <div class="card-header  border-0">
        <h4 class="card-title">Tickets</h4>
      </div>
      <div class="card-body pt-3 pb-3">
        <form method="post" id="searchAttendance">
          <div class="row row-sm">
           <?php if($this->lgCat!="4"){?>
           
            <div class="col-sm-4">
              <label class="">Employee Name/ID:</label>
              <input type="text" id="fieldSrchIDorName" name="fieldSrchIDorName" class="form-control miKeyUp" placeholder="Employee Name Or ID" value="<?php echo $this->logName; ?>"/>
         
              <input type="hidden" id="empSrchdID" name="empSrchdID" value="<?php echo $this->logId; ?>"/>
            </div>
            <?php } $curDiv=(($this->lgCat!="4")?"col-sm-2 col-xl-2":"col-sm-4 col-xl-4");?>
            <div class="<?php echo $curDiv;?>">
              <label class="">From :</label>
              <input type="text" id="fromDate" name="fromDate" class="form-control fc-datepicker" placeholder="DD/MM/YYYY" />
            </div>
            <div class="<?php echo $curDiv;?>">
              <label class="">To :</label>
              <input type="text" id="toDate" name="toDate" class="form-control fc-datepicker" placeholder="DD/MM/YYYY" />
            </div>
            <div class="col-sm-2 col-xl-2">
              <label class="">Select Priority:</label>
              <select class="form-control select  select2-with-search" id="priority" name="priority">
                <option value="">Select</option>
                <option value="High">High</option>
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
              </select>
            </div>
            <div class="col-sm-2 col-xl-2">
              <div style="padding-top: 1.8rem;">
                <button class="btn ripple btn-outline-success getAction mSch" onclick="return searchAttendance(reportAttendance,'#searchAttendance','#getReportMiDetails')" data-id="overViewThis"> <i class="ti-search"></i> Search </button>
                <button type="button" class="btn ripple btn-outline-danger getAction" data-id="clearDetails"><i class="ti-trash"></i></button>
              </div>
            </div>
          </div>
        </form>
        <div class="bdrBottom">&nbsp;</div>
        <div class="table-responsive">
          <table class="table text-nowrap text-md-nowrap table-bordered table-hover mg-b-0 " id="getReportTickets" data-id="<?php echo $target;?>">
            <thead class="ami_tHeader">
              <tr>
                <th>S No.</th>
                <th>Subject</th>
                <th>Priority</th>
                <th>Category</th>
                <th>Status</th>
                <th>Last Replied</th>
                <th>Action</th>
              </tr>
            </thead>
<!---------------------------------------------------------------------------------------------------------------------->
<!--<tbody>
  <tr>
    <td>#289</td>
    <td><div><a href="javascript:void(0);" class="h6">Sed ut perspiciatis</a></div>
      <small class="fs-12 text-muted"><i class="fe fe-clock me-1 text-muted"></i>Opened: <span class="font-weight-normal1">12-01-2021 12:10AM</span></small> </td>
    <td><span class="badge bg-success-mi">Low</span></td>
    <td>Support</td>
    <td><span class="badge bg-success">Open</span></td>
    <td><span class="fs-13 text-muted"><i class="fe fe-clock me-2"></i>5 hours ago</span></td>
    <td><div class="d-flex"> <a href="javascript:void(0);" class="action-btns1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical text-primary"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" role="menu" style="">
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-send me-2"></i>Reply Ticket</a></li>
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-eye me-2"></i>View Ticket</a></li>
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-trash-2 me-2"></i>Delete Ticket</a></li>
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-settings me-2"></i>More</a> </li>
        </ul>
      </div></td>
  </tr>
  <tr>
    <td>#320</td>
    <td><div><a href="javascript:void(0);" class="h6">Excepteur occaecat</a></div>
      <small class="fs-12 text-muted"><i class="fe fe-clock me-1 text-muted"></i>Opened: <span class="font-weight-normal1">05-02-2021 10:00AM</span></small> </td>
    <td><span class="badge bg-success-mi">Low</span></td>
    <td>Services</td>
    <td><span class="badge bg-danger">Closed</span></td>
    <td><span class="fs-13 text-muted"><i class="fe fe-clock me-2"></i>12 hours ago</span> </td>
    <td><div class="d-flex"> <a href="javascript:void(0);" class="action-btns1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical text-primary"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" role="menu">
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-send me-2"></i>Reply Ticket</a></li>
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-eye me-2"></i>View Ticket</a></li>
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-trash-2 me-2"></i>Delete Ticket</a></li>
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-settings me-2"></i>More</a> </li>
        </ul>
      </div></td>
  </tr>
  <tr>
    <td>#837</td>
    <td><div><a href="javascript:void(0);" class="h6">Sample Test1</a></div>
      <small class="fs-12 text-muted"><i class="fe fe-clock me-1 text-muted"></i>Opened: <span class="font-weight-normal1">05-02-2021 05:30PM</span></small> </td>
    <td><span class="badge bg-danger-mi">High</span></td>
    <td>Customization</td>
    <td><span class="badge bg-success">open</span></td>
    <td><span class="fs-13 text-muted"><i class="fe fe-clock me-2"></i>1 week ago</span></td>
    <td><div class="d-flex"> <a href="javascript:void(0);" class="action-btns1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical text-primary"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" role="menu">
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-send me-2"></i>Reply Ticket</a></li>
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-eye me-2"></i>View Ticket</a></li>
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-trash-2 me-2"></i>Delete Ticket</a></li>
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-settings me-2"></i>More</a> </li>
        </ul>
      </div></td>
  </tr>
  <tr>
    <td>#124</td>
    <td><div><a href="javascript:void(0);" class="h6">Sample Test2</a></div>
      <small class="fs-12 text-muted"><i class="fe fe-clock me-1 text-muted"></i>Opened: <span class="font-weight-normal1">05-02-2021 10:45AM</span></small> </td>
    <td><span class="badge bg-warning-mi">Medium</span> </td>
    <td>Support</td>
    <td><span class="badge bg-danger">Closed</span></td>
    <td><span class="fs-13 text-muted"><i class="fe fe-clock me-2"></i>3 weeks ago</span></td>
    <td><div class="d-flex"> <a href="javascript:void(0);" class="action-btns1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical text-primary"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" role="menu">
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-send me-2"></i>Reply Ticket</a></li>
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-eye me-2"></i>View Ticket</a></li>
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-trash-2 me-2"></i>Delete Ticket</a></li>
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-settings me-2"></i>More</a> </li>
        </ul>
      </div></td>
  </tr>
  <tr>
    <td>#309</td>
    <td><div><a href="javascript:void(0);" class="h6">Ut aut reiciendi</a></div>
      <small class="fs-12 text-muted"><i class="fe fe-clock me-1 text-muted"></i>Opened: <span class="font-weight-normal1">21-04-2021 11:50AM</span></small> </td>
    <td><span class="badge bg-success-mi">Low</span></td>
    <td>Services</td>
    <td><span class="badge bg-success">Open</span></td>
    <td><span class="fs-13 text-muted"><i class="fe fe-clock me-2"></i>4 weeks ago</span></td>
    <td><div class="d-flex"> <a href="javascript:void(0);" class="action-btns1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical text-primary"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" role="menu">
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-send me-2"></i>Reply Ticket</a></li>
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-eye me-2"></i>View Ticket</a></li>
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-trash-2 me-2"></i>Delete Ticket</a></li>
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-settings me-2"></i>More</a> </li>
        </ul>
      </div></td>
  </tr>
  <tr>
    <td>#117</td>
    <td><div><a href="javascript:void(0);" class="h6">Unde omnis iste natus</a></div>
      <small class="fs-12 text-muted"><i class="fe fe-clock me-1 text-muted"></i>Opened: <span class="font-weight-normal1">11-03-2021 12:50PM</span></small> </td>
    <td><span class="badge bg-success-mi">Low</span></td>
    <td>Services</td>
    <td><span class="badge bg-success">Open</span></td>
    <td><span class="fs-13 text-muted"><i class="fe fe-clock me-2"></i>1 month ago</span></td>
    <td><div class="d-flex"> <a href="javascript:void(0);" class="action-btns1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical text-primary"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" role="menu">
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-send me-2"></i>Reply Ticket</a></li>
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-eye me-2"></i>View Ticket</a></li>
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-trash-2 me-2"></i>Delete Ticket</a></li>
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-settings me-2"></i>More</a> </li>
        </ul>
      </div></td>
  </tr>
  <tr>
    <td>#276</td>
    <td><div><a href="javascript:void(0);" class="h6">Et harum quidem</a></div>
      <small class="fs-12 text-muted"><i class="fe fe-clock me-1 text-muted"></i>Opened: <span class="font-weight-normal1">11-04-2021 03:50PM</span></small> </td>
    <td><span class="badge bg-warning-mi">Medium</span> </td>
    <td>Support</td>
    <td><span class="badge bg-success">Open</span></td>
    <td><span class="fs-13 text-muted"><i class="fe fe-clock me-2"></i>3 months ago</span> </td>
    <td><div class="d-flex"> <a href="javascript:void(0);" class="action-btns1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical text-primary"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" role="menu">
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-send me-2"></i>Reply Ticket</a></li>
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-eye me-2"></i>View Ticket</a></li>
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-trash-2 me-2"></i>Delete Ticket</a></li>
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-settings me-2"></i>More</a> </li>
        </ul>
      </div></td>
  </tr>
  <tr>
    <td>#738</td>
    <td><div><a href="javascript:void(0);" class="h6">Maiores alias aut</a></div>
      <small class="fs-12 text-muted"><i class="fe fe-clock me-1 text-muted"></i>Opened: <span class="font-weight-normal1">17-03-2021 12:05AM</span></small> </td>
    <td><span class="badge bg-success-mi">Low</span></td>
    <td>Services</td>
    <td><span class="badge bg-success">Open</span></td>
    <td><span class="fs-13 text-muted"><i class="fe fe-clock me-2"></i>4 months ago</span> </td>
    <td><div class="d-flex"> <a href="javascript:void(0);" class="action-btns1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical text-primary"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" role="menu">
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-send me-2"></i>Reply Ticket</a></li>
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-eye me-2"></i>View Ticket</a></li>
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-trash-2 me-2"></i>Delete Ticket</a></li>
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-settings me-2"></i>More</a> </li>
        </ul>
      </div></td>
  </tr>
  <tr>
    <td>#498</td>
    <td><div><a href="javascript:void(0);" class="h6">Quis autem vel</a></div>
      <small class="fs-12 text-muted"><i class="fe fe-clock me-1 text-muted"></i>Opened: <span class="font-weight-normal1">17-02-2021 10:00AM</span></small> </td>
    <td><span class="badge bg-danger-mi">High</span></td>
    <td>Support</td>
    <td><span class="badge bg-success">Open</span></td>
    <td><span class="fs-13 text-muted"><i class="fe fe-clock me-2"></i>6 months ago</span> </td>
    <td><div class="d-flex"> <a href="javascript:void(0);" class="action-btns1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical text-primary"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" role="menu">
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-send me-2"></i>Reply Ticket</a></li>
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-eye me-2"></i>View Ticket</a></li>
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-trash-2 me-2"></i>Delete Ticket</a></li>
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-settings me-2"></i>More</a> </li>
        </ul>
      </div></td>
  </tr>
  <tr>
    <td>#298</td>
    <td><div><a href="javascript:void(0);" class="h6">Ut aut reiciendi</a></div>
      <small class="fs-12 text-muted"><i class="fe fe-clock me-1 text-muted"></i>Opened: <span class="font-weight-normal1">11-03-2021 02:10PM</span></small> </td>
    <td><span class="badge bg-danger-mi">High</span></td>
    <td>Services</td>
    <td><span class="badge bg-danger">closed</span></td>
    <td><span class="fs-13 text-muted"><i class="fe fe-clock me-2"></i>1 year ago</span></td>
    <td><div class="d-flex"> <a href="javascript:void(0);" class="action-btns1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical text-primary"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" role="menu">
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-send me-2"></i>Reply Ticket</a></li>
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-eye me-2"></i>View Ticket</a></li>
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-trash-2 me-2"></i>Delete Ticket</a></li>
          <li><a href="javascript:void(0);" class="dropdown-item"><i class="fe fe-settings me-2"></i>More</a> </li>
        </ul>
      </div></td>
  </tr>
</tbody> -->           
<!---------------------------------------------------------------------------------------------------------------------->
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="trashTicket" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style=" padding-left: 0px;" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right;"><i class="si si-close"></i></button>
            <div class="delMsg"><i class="ti-trash"></i> Remove Ticket</div>
                <div class="actnData" id="remvMsg"><i class="si si-power"></i> Do you really want to remove the ticket with ID #F33333.</div>
                <div id="mdlFtrBtn">
                  <button type="button" class="btn btn-outline-secondary waves-effect waves-light pull-right getAction" id="cnfRemoveEmp" data-id="@misingh143">
                        Confirm <i class="si si-check"></i>
                  </button>
                  <button type="button" class="btn btn-outline-dark pull-right miIcn " data-bs-dismiss="modal" style="margin-right:10px;">
                    <i class="fa fa-arrow-left"></i> Back 
                  </button>   
               </div>		
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/js/setting/tickets.js'); ?>"></script>



