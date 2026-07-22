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
        <a href="<?php echo base_url('attendance/reportList'); ?>" class="btn btn-success btn-icon-text my-2 me-2" title="Attendance Overview">
          <i class="fe fe-list"></i> Overview
        </a>
        <button type="button" class="btn btn-primary btn-icon-text my-2 me-2" id="miArvClk" title="Current Time"> <i class="fe fe-filter me-2"></i> Current Time </button>
        <a href="<?php echo base_url('auth/login/signout'); ?>" class="btn btn-danger btn-icon-text  my-2 me-2" title="Sign Out"> <i class="fe fe-power me-2"></i> Sign Out </a>
      </div>
    </div>
  </div>
  <!-- End Page Header -->
  <style>
    .card .card-header .main-content-label::before {
      content: "";
      position: absolute;
      left: 0px;
      padding: 2px;
      height: 35px;
      background: #6f42c1;
      top: 15px;
    }

    .main-content-label {
      font-size: 1.15rem;
      text-transform: capitalize !important;
    }

    .mbr {
      margin-bottom: 35px;
    }

    .countdowntimer {
      text-align: center;
      margin-top: 0.75rem;
    }

    .size_md {
      font-size: 30px;
      border-width: 5px;
      border-radius: 4px;
    }

    .mi-lebel {
      display: block;
      margin-bottom: 0.375rem;
      font-weight: 500;
      font-size: 0.875rem;
      color: rgb(29, 42, 87);
    }

    .fntMi {
      font-size: 12px;
      padding: 8px 10px 5px 10px;
    }

    .bg-working-mi {
      background: rgba(114, 155, 0, 0.25);
      color: #618400 !important;
    }

    .bg-success-mi {
      background: rgba(13, 205, 148, 0.25);
      color: #0dcd94 !important;
    }

    .bg-danger-mi {
      background: rgba(247, 40, 74, 0.25);
      color: #f7284a !important;
    }

    .bg-warning-mi {
      background: rgba(251, 197, 24, 0.25);
      color: #e3b113 !important;
    }

    .bg-orange-mi {
      background: rgba(243, 73, 50, 0.25);
      color: #f34932 !important;
    }

    .bg-holidy-mi {
      background: rgba(0, 115, 217, 0.25);
      color: #0073d9 !important;
    }

    .bgPrsnt {
      background-color: #17a602;
    }

    .bgLat {
      background-color: #f34932;
    }

    .bgAbsnt {
      background-color: #f7284a;
    }

    .bgHoliDy {
      background-color: #0073d9;
    }

    .bgHfDy {
      background-color: #e3b113;
    }

    .bgLvDy {
      background-color: #009EA6;
    }

    .avMi-md {
      width: 2.5rem;
      height: 2.5rem;
      line-height: 2.5rem;
      font-size: 1rem;
    }

    .bradius {
      border-radius: 15%;
    }

    .miBgs {
      width: 3.5rem;
      padding: 5px 0px 5px 0px;
    }

    .avMi {
      width: 3rem;
      height: 3rem;
      line-height: 3rem;
      position: relative;
      text-align: center;
      display: inline-block;
      color: #fff;
      font-weight: 600;
      vertical-align: bottom;
      font-size: 1.3rem;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    .bdrBottom {
      border-bottom: 1px solid #e6e6e6;
      margin: 0px -25px 30px -25px;
    }

    .ami_tHeader>tr>th {
      color: #FFFFFF !important;
      border: 1px solid #088 !important;
      border-top-width: 1px;
      border-bottom-width: 1px;
      border-bottom-style: solid;
      border-bottom-color: rgb(0, 136, 136);
      padding: 12px 0px 12px 5px !important;
    }

    .ami_tHeader {
      background-color: #088
    }

    .miBottom {
      margin-bottom: 75px;
    }

    .dark-theme .bdrBottom {
      border-bottom: 1px solid #2d2d48;
    }

    .dark-theme .ami_tHeader {
      background-color: #025959
    }

    .dark-theme .ami_tHeader>tr>th {
      border: 1px solid #027373 !important;
    }

    .mSrchPnl {
      margin: -1px 0px 0px 0px;
      position: absolute;
      width: 290px;
      z-index: 1;
      cursor: pointer;
      display: none;
    }

    .mSrchPnl ul {
      list-style: none;
      background-color: #fff;
      border: 1px solid #d9d9d9;
      border-bottom-left-radius: 6px;
      border-bottom-right-radius: 6px;
      -webkit-box-shadow: 0px 3px 5px 0px rgba(145, 145, 145, 1);
      -moz-box-shadow: 0px 3px 5px 0px rgba(145, 145, 145, 1);
      box-shadow: 0px 3px 5px 0px rgba(145, 145, 145, 1);
      max-height: 230px;
      overflow-x: hidden;
      overflow-y: scroll;
      scrollbar-width: thin;
      scrollbar-color: #24839f #fff;
    }

    .mSrchPnl ul li {
      padding: 8px 0px 8px 8px;
      border-bottom: 1px solid #d9d9d9;
      margin-left: -31px;
      color: #757575;
      font-weight: 600;
    }

    .mSrchPnl ul li:last-child {
      border-bottom: 0px solid #000;
    }

    .mSrchPnl ul li span {
      color: #c65d00;
      padding-left: 5px;
    }

    .mSrchPnl ul li i {
      color: #181;
      background: #e1e1e1;
      padding: 5px;
      border-radius: 12px;
      font-size: 10px;
      margin-right: 3px;
    }

    .miPlease {
      color: #0087ff !important;
      padding: 10px 0px 10px 10px !important;
    }

    .miPlease i {
      background-color: #0087ff !important;
      color: #fff !important;
      padding: 8px !important;
      border-radius: 20px !important
    }

    .miNoEmp {
      color: #d23d03 !important;
      padding: 10px 0px 10px 10px !important;
    }

    .miNoEmp i {
      background-color: #d23d03 !important;
      color: #fff !important;
      padding: 8px !important;
      border-radius: 20px !important
    }

    .miSalHeader {
      margin: 15px -26px 10px -26px;
      padding: 5px 0px 5px 15px;
      border-left: 3px solid #645bca;
      font-weight: bold;
      border-bottom: 1px solid #f9f9f9;
    }

    .miFtrHdr {
      margin-top: 20px;
      border-top: 1px solid #eee;
      padding-top: 20px;
    }

    #ovrOfEmpByMonth {
      display: none;
    }

    .miBlink {
      margin: 14px 5px 4px 5px;
      height: 1.25rem;
      width: 1.25rem;
      color: #46598847 !important;
    }


    .wrKng {
      color: white;
      background-color: rgb(4, 155, 215);
      padding: 3px 8px 3px 8px;
      font-size: .65rem;
      border-radius: 12px;
    }

    #loggedDate {
      color: #506ddb;
      margin: -10px 0px 10px 0px;
      text-transform: uppercase;
      font-weight: 600;
    }

    .locateNow {
      color: #fbf7f7;
      padding: 5px 10px 3px 10px;
      background-color: #0051b9;
      cursor: pointer;
      border-radius: 3px;
    }

    .locateNow:hover {
      background-color: #045fd5;
    }

    #traceMap {
      width: 100%;
      margin-top: -10px;
      display: none;
    }

    .trcSuccess {
      height: 350px;
    }

    .trcErr {
      padding: 10px 0px 10px 10px;
      background-color: #ff63475e;
      color: #d52000;
    }

    #mUser {
      margin: -48px 0px 5px 55px;
      font-size: 11px;
    }

    .mEmpID {
      font-weight: 700;
      color: #5b5b5a;
    }

    #memDetails {
      padding: 5px 0px 5px 0px;
    }

    .mEmpName {
      font-weight: 700;
      font-size: 12px;
      color: #005ec1;
    }

    #memDetails img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
    }

    .mEmpTime {
      font-weight: 600;
      color: #039b29;
    }

    .mEmpOutTime {
      font-weight: 600;
      color: #d06b00;
    }

    .wrkHr {
      color: #005462;
      font-weight: 700;
    }

    .customTitle {
      padding-bottom: 50px;
    }

    .thCl {
      padding: 0px 25px 0px 5px;
      margin: 0px;
      text-align: center;
    }

    .inOutDet div {
      float: left;
      text-align: center;
      width: 50%;
    }

    .inOutDet div:first-child {
      border-right: 1px solid #bdb0b0;
    }

    .inOutDet {
      width: 125px;
      text-align: center;
    }

    .ami_tHeader>tr:last-child>th {
      padding: 3px 10px 3px 8px !important;
    }

    .ami_tHeader>tr:first-child>th {
      padding: 3px 10px 3px 8px !important;
    }

    .myNaming {
      margin: 0px 0px 15px 0px;
    }

    .mbrPad {
      padding: 20px 0px 18px 15px !important;
    }

    .mbrPad:first-child {
      margin-top: -10px;
    }

    .mbrPad:last-child {
      margin-bottom: -8px;
    }

    .mbrPad:hover {
      color: #ffffff !important;
      background-color: var(--export-bg-color);
      border-color: var(--export-bg-color);
    }
  </style>
  <div class="row row-sm miBottom">
    <div class="col-sm-12 col-lg-12 col-xl-12">
      <div class="card">
        <div class="card-header custom-card-header border-bottom-0 mbr">
          <h5 class="main-content-label tx-dark my-auto tx-medium mb-0">Search Attendance</h5>
          <div class="card-options">
            <div class="dropdown">
              <button aria-expanded="false" aria-haspopup="true" class="btn btn-export btn-sm ms-2 dropdown-toggle" data-bs-toggle="dropdown" id="dropdownMenuButton" type="button">
                <i class="fe fe-upload-cloud"></i> Export <i class="fas fa-caret-down ms-1"></i>
              </button>
              <div class="dropdown-menu tx-13">
                <input type="hidden" name="" id="base_url" value="<?php echo base_url() ?>">
                <a class="dropdown-item getAction mbrPad" href="javascript:void(0);" id="excelExport" data-id="<?php echo $frExcelExport; ?>">Excel Export </a>
                <a class="dropdown-item getAction mbrPad" href="javascript:void(0);" id="pdfExport" data-id="<?php echo $frPdfExport; ?>">PDF Export </a>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body pt-3 pb-3">

          <span id="ovrOfEmpByMonth"><?php echo $attMonthwise; ?></span>
          <form method="post" id="searchAttendance">
            <div class="row row-sm">
              <div class="col-sm-4"><label class="">Employee ID:</label>
                <input type="text" id="fieldSrchIDorName" name="fieldSrchIDorName" class="form-control miKeyUp clear-input-box" placeholder="Employee ID" />
                <div class="mSrchPnl">
                  <ul></ul>
                </div>
              </div>
              <div class="col-sm-3"><label class="">From Date:</label><input type="text" id="fromDate" name="fromDate" class="form-control clear-input-box fc-datepicker" placeholder="DD/MM/YYYY" /></div>
              <div class="col-sm-3"><label class="">To Date:</label><input type="text" id="toDate" name="toDate" class="form-control clear-input-box fc-datepicker" placeholder="DD/MM/YYYY" /></div>
              <div class="col-sm-2">
                <div style="padding-top: 1.8rem;">
                  <button class="btn ripple btn-outline-success getAction mSch" id="searchDetails" type="submit" data-id="<?php echo $attMonthwise; ?>" onclick="return searchAttendance(reportAttendance,'#searchAttendance','#getReportMiDetails')">
                    <i class="ti-search"></i> Search
                  </button>
                  <!---->
                  <button type="button" id="clearDetails" class="btn ripple btn-outline-danger getAction" data-id="clearDetails"><i class="ti-trash"></i></button>
                </div>
              </div>
            </div>
          </form>
          <!--  <div style="padding: 10px;margin: 10px 0px 10px 0px;border: 1px solid #e4eac8;" id="resultShow">Result show here </div>-->
          <div class="bdrBottom">&nbsp;</div>
          <div class="table-responsive">
            <input type="hidden" id="target" value="<?php echo $target; ?>" />
            <table class="table text-nowrap text-md-nowrap table-bordered table-hover mg-b-0 " id="getReportMiDetails">
              <thead class="ami_tHeader" id="setMonthWise">
                <tr>
                  <th rowspan="2">
                    <div class="thCl myNaming">S.No.</div>
                  </th>
                  <th rowspan="2">
                    <div class="thCl myNaming">EMP. ID</div>
                  </th>
                  <th rowspan="2">
                    <div class="thCl myNaming">EMPLOYEE NAME</div>
                  </th>
                  <?php for ($i = 1; $i <= $dayInMonth; $i++) : ?><th>
                      <div class="thCl"><?php echo date((($i < 10) ? ('0' . $i) : $i) . '-m-Y'); ?></div>
                    </th><?php endfor; ?>
                  <th rowspan="2">
                    <div class="thCl myNaming">T. Present</div>
                  </th>
                  <th rowspan="2">
                    <div class="thCl myNaming">T. Absent</div>
                  </th>
                  <th rowspan="2">
                    <div class="thCl myNaming">T. Leave</div>
                  </th>
                </tr>
                <tr>
                  <?php for ($i = 1; $i <= $dayInMonth; $i++) : ?><th>
                      <div class="thCl">

                        <div class="inOutDet">
                          <div>In</div>
                          <div>Out</div>
                        </div>
                      </div>
                    </th><?php endfor; ?>
                </tr>
              </thead>
              <!-- <tbody>
               
                 <tr id="setMonthWise">
                  <td><div class="thCl">1.</div></td>
                    <td><div class="thCl">9004</div></td>
                    <td>Arav Singh</td>
                    <?php //for ($i = 1; $i <= $dayInMonth; $i++) : 
                    ?><td>
                    		<div class="thCl">
                                    <div class="inOutDet"><div>09:10:10</div><div>18:00:10</div></div>
                            </div>
                     </td><?php //endfor; 
                          ?>
                    <td><div class="thCl">T. Present</div></td>
                    <td><div class="thCl">T. Absent</div></td>
                    <td><div class="thCl">T. Leave</div></td>
                </tr>
            </tbody>-->
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    var reportAttendance = '';
    $(document).ready(function() {
      let searchObj = {};
      var target = $('#target').val();
      reportAttendance = {
        printTable: function(search_data) {
          getpaginate(search_data, '#getReportMiDetails', target, 'Only For Id, Name.');
        }
      }
      reportAttendance.printTable(searchObj);
    });

    $(function() {
      $(document).unbind("click").on("click", '.getAction', function() {
        let actNbtn = $(this).attr('id');
        //let getData=actNbtn.split('===');	
        if (actNbtn == 'searchDetails') {
          let targetUrl = $(this).attr('data-id');
          $('#getReportMiDetails tbody').empty();
          $.post(targetUrl, {
            fromDate: $('#fromDate').val(),
            toDate: $('#toDate').val()
          }, function(htmlAmi) {
            $('#setMonthWise').html(htmlAmi);
            setTimeout(function() {
              $('#getReportMiDetails tbody td,thead th').each(function() {
                if ($(this).html().trim() === '') {
                  $(this).remove();
                }
              });
            }, 4000);
          });
        } else if ((actNbtn == 'excelExport') || (actNbtn == 'pdfExport')) {
          let getData = $(this).attr('data-id');

          let target = getData.split('===');
          var activePage = $('.pagination .active a').text();

          $.post($('#base_url').val() + target[1], {
            action: target[0],
            fromDate: $('#fromDate').val(),
            id: $('#fieldSrchIDorName').val(),
            toDate: $('#toDate').val(),
            activePage: activePage
          }, function(htmlAmi) {
            if (htmlAmi.addClas == 'tst_success') {
              if (actNbtn == 'excelExport') {
                window.location.href = htmlAmi.downlink;
              }
              if (actNbtn == 'pdfExport') {
                window.open(htmlAmi.downlink, '_blank').focus();
              } else {
                toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
              }
            } else {
              toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
            }
          }, 'json');
        }
      });
    });





    function searchAttendance(tbactn, frmId, tbstorage) {
      $(frmId).unbind("click").submit(function(e) {
        e.preventDefault();
        $(tbstorage).DataTable().clear().destroy();
        let search = $(frmId).serializeArray();
        let searchObj = {};
        $.each(search, function(i, row) {
          searchObj[row.name] = row.value;
        });
        tbactn.printTable(searchObj);
      });

    }




    const clearBtn = document.getElementById('clearDetails');
    clearBtn.addEventListener("click", function() {
      const allInputs = document.querySelectorAll('.clear-input-box');
      allInputs.forEach(singleInput => {
        singleInput.value = "";
      })
    })
  </script>