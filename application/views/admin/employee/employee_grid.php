<style>
  @media(min-width:1320px) and (max-width: 1900px) {
    .mail_icon {
      height: 25px !important;
    }

    .btn-regin img {
      margin-top: -5px !important;
      width: 19px !important;
    }

    .btn-offer img {
      margin-top: -1px !important;
      width: 20px !important;
    }

    .btn-warn img {
      margin-top: -2px !important;
      width: 20px !important;
    }

    .btn-promote img {
      margin-top: -4px !important;
      width: 18px !important;
    }
  }

  .ami_tHeader {
    background-color: #088;
  }

  .ami_tHeader>tr>th {
    color: #fff;
    font-weight: 600;
    padding: 13px 7px 13px 7px;
  }

  .miBtmPd {
    margin-bottom: 15px;
  }

  .cardPdBtm {
    margin-bottom: 50px;
  }

  .myRightEnd {
    margin-right: 0px !important;
  }

  .mail_icon {
    height: 30px;
    padding: 3px;
  }

  .mail_icon img {
    width: 22px;
    padding: 2px;
  }

  .btn-regin {
    background-color: #C400524A;
  }

  .btn-offer {
    background-color: #006F1C4D;
  }

  .btn-warn {
    background-color: #A86E005C;
  }

  .btn-promote {
    background-color: #0645BD3D;
  }

  .notifyMsg {
    font-size: 20px;
    margin: 30px 0px 10px 0px;
  }

  .actnData {
    margin: 0px 0px 20px 0px;
    color: #716c6c;
    font-size: .8rem;
  }

  .actnData i {
    background-color: #d7d7d7;
    padding: 5px;
    border-radius: 15px;
    color: #222020;
    font-size: .6rem;
  }
</style>
<div class="inner-body">
  <!-- Page Header -->
  <div class="page-header">
    <div>
      <h2 class="main-content-title tx-24 mg-b-5">Staff</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Profile</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create New</li>
      </ol>
    </div>
    <div class="d-flex">
      <div class="justify-content-center"> <a href="javascript:void(0);" id="showEmployee" class="btn btn-white btn-icon-text my-2 me-2"> <i class="fe fe-list"></i> <span id="toggleText">List View</span> </a> <a href="<?php echo base_url('admin/employee/create'); ?>" class="btn btn-white btn-icon-text my-2 me-2"> <i class="fe fe-plus"></i> Join Employee </a> <a href="<?php echo base_url('admin/employee/import'); ?>" class="btn btn-white btn-icon-text my-2 me-2"> <i class="fe fe-download me-2"></i> Import </a> <a href="<?php echo base_url('auth/login/signout'); ?>" class="btn btn-danger btn-icon-text  my-2 me-2"> <i class="fe fe-power me-2"></i> Sign Out </a> </div>
    </div>
  </div>
  <!-- End Page Header -->
  <!---------------------------------------------------------------------------------------------------------------------------->
  <div class="cardPdBtm" id="gridView">
    <div class="row row-sm manageGrid" id="employee-grid"></div>
    <div class="row row-sm">
      <div id="pagination">Pagination link here</div>
    </div>
  </div>
  <!----------------------------------------------------------------------------------------------------------------------------->
  <div id="sendNotifyDetails" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style=" padding-left: 0px;" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right;"><i class="si si-close"></i></button>
          <div class="notifyMsg"><i class="si si-envelope-letter"></i> Send Notifiaction</div>
          <div class="actnData">Please wait...</div>
          <div id="mdlFtrBtn">
            <button type="button" class="btn btn-outline-success waves-effect waves-light pull-right getAction" id="sendMailActn" data-id="@misingh143">
              <i class="si si-envelope"></i> Send Mail
            </button>
            <button type="button" class="btn btn-outline-dark pull-right miIcn " data-bs-dismiss="modal" style="margin-right:10px;">
              <i class="fa fa-arrow-left"></i> Back
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>



  <div class="row row-sm manageListing mb-5" id="listView" style="margin-top:0rem; display: none;">
    <div class="col-lg-12 col-md-12">
      <div class="card">
        <div class="card-header  border-0">
          <h5 class="card-title">Rejected Employee</h5>
        </div>
        <div class="card-body">
          <div class="row row-sm">
            <div class="col-md-12 col-lg-12">
              <div id="getPrfrmList">
                <div class="table-responsive">
                  <table class="table text-nowrap text-md-nowrap table-striped table-bordered table-hover mg-b-0">
                    <thead class="ami_tHeader">
                      <tr>
                        <th>SL. </th>
                        <th>Employee Id</th>
                        <th>Employee Name</th>
                        <th>Mobile Number</th>
                        <th>Email-Id</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="list_employee">
                    </tbody>
                  </table>
                  <div class="row row-sm">
                    <div id="listPagination">Pagination link here</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <input type="hidden" id="target" name="target" value="<?php echo $target; ?>" />


  <script>
    $(function() {
      $(document).on("click", '.getAction', function() {
        let getAction = $(this).attr("data-id");
        let getData = getAction.split('===');
        if (getData[0] == "sendMail") {
          $(this).html('<i class="fe fe-sun bx-spin"></i> Please Wait');
          let targetUrl = $('#base_url').val() + getData[1];
          $.post(targetUrl, {
            id: getData[2],
            action: getData[3]
          }, function(htmlAmi) {
            $("#sendMailActn").html('<i class="si si-envelope"></i> Send Mail');
            //$(".actnData").html(htmlAmi);
            $(".notifyMsg").css("color", htmlAmi.notfyHeadClr);
            $(".actnData").css("color", htmlAmi.notfyClr).html(htmlAmi.msg);
            $("#sendMailActn").attr("data-id", htmlAmi.sendMail);
          }, 'json');
        } else if (getData[0] == "alreadyMail") {
          $(".notifyMsg").css("color", "#373737");
          $(".actnData").css("color", "#393333").html("The mail has already been successfully sent.");
        }
      });
      $(document).on("click", '.mail_icon', function() {
        let getAction = $(this).attr("data-id");
        let getData = getAction.split('===');
        if (getData[0] == "sendNotify") {
          let targetUrl = $('#base_url').val() + getData[1];
          $.post(targetUrl, {
            id: getData[2],
            action: getData[3]
          }, function(htmlAmi) {
            $(".notifyMsg").css("color", htmlAmi.nofyHeadClr);
            $(".actnData").css("color", htmlAmi.nofyClr).html(htmlAmi.msg);
            $("#sendMailActn").attr("data-id", htmlAmi.sendMail);
          }, 'json');
        }
      });

      $(document).ready(function() {
        loadEmployees(1);

        function loadEmployees(page) {
          $.ajax({
            url: '<?php echo base_url("admin/employee/grid_employees"); ?>',
            type: 'POST',
            data: {
              page: page
            },
            dataType: 'json',
            success: function(response) {
              var employees = response.employees;
              var totalRows = response.total_rows;
              var limit = response.limit;
              var totalPages = Math.ceil(totalRows / limit);
              var cardHtml = '';
              $.each(employees, function(i, employee) {
                var emp = {
                  id: employee.id,
                  action: 'editDetails'
                };
                var jsonString = JSON.stringify({
                  id: emp.id,
                  action: emp.action
                });
                var base64String = btoa(jsonString);
                var targetEdit = response.url_edit + encodeURIComponent(base64String); //
                var mailSend = "sendNotify===admin/employee/notify===" + emp.id;
                cardHtml += '<div class="col-md-3 col-xl-3">';
                cardHtml += '<div class="card miBtmPd"><div class="card-body"><div class="dropdown float-end"><a class="text-muted dropdown-toggle font-size-16" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">';
                cardHtml += '<i class="bx bx-dots-horizontal-rounded"></i> </a><div class="dropdown-menu dropdown-menu-end"> <a class="dropdown-item" href="' + targetEdit + '"><i class="fe fe-edit-2"></i> Edit Profile</a>';
                cardHtml += '<a class="dropdown-item" href="' + response.url_view + employee.id + '"><i class="fe fe-eye"></i> View Profile</a></div></div>';
                cardHtml += '<div class="d-flex align-items-center"><div><img src="' + response.urlLoc + employee.image + '" alt="" class="avatar-md rounded-circle img-thumbnail"> </div>';
                cardHtml += '<div class="flex-1 ms-3"><h5 class="font-size-16 mb-1"><a href="#" class="text-body">' + employee.emp_name + '</a></h5><span class="badge bg-success-subtle text-success mb-0">' + employee.designation_name + '</span> </div></div>';
                cardHtml += '<div class="mt-3 pt-1"><p class="text-muted mb-0"><i class="mdi mdi-phone font-size-15 align-middle pe-2 text-dark"></i> ' + employee.contact_no + '</p>';
                cardHtml += '<p class="text-muted mb-0 mt-2"><i class="mdi mdi-email font-size-15 align-middle pe-2 text-dark"></i> ' + employee.email + '</p>';
                cardHtml += '<p class="text-muted mb-0 mt-2"><i class="mdi mdi-google-maps font-size-15 align-middle pe-2 text-dark"></i> ' + employee.address + '</p></div><div class="d-flex gap-2 pt-4">';
                cardHtml += '<a href="javascript:void(0)" class="btn ripple btn-offer btn-sm w-25 mail_icon"  data-bs-toggle="modal" data-bs-target="#sendNotifyDetails" title="Offer Letter" data-id="' + mailSend + '===offer">'
                cardHtml += '<img src="' + response.urlLoc + 'assets/img/send_offer_letter.png"></a>'

                cardHtml += '<a href="javascript:void(0)" class="btn ripple btn-warn btn-sm w-25 mail_icon" data-bs-toggle="modal" data-bs-target="#sendNotifyDetails" title="Warning Letter" data-id="' + mailSend + '===warning">'
                cardHtml += '<img src="' + response.urlLoc + 'assets/img/send_warning_letter.png"></a>'

                cardHtml += '<a href="javascript:void(0)" class="btn ripple btn-promote btn-sm w-25 mail_icon" data-bs-toggle="modal" data-bs-target="#sendNotifyDetails" title="Promotion Letter" data-id="' + mailSend + '===promote">'
                cardHtml += '<img src="' + response.urlLoc + 'assets/img/send_promotion_letter.png"></a>'

                cardHtml += '<a href="javascript:void(0)" class="btn btn-regin btn-sm w-25 mail_icon" data-bs-toggle="modal" data-bs-target="#sendNotifyDetails" title="Regination Letter" data-id="' + mailSend + '===depart">'
                cardHtml += '<img src="' + response.urlLoc + 'assets/img/send_regination_letter.png"></a>'

                cardHtml += '<a href="<?= base_url("common/idcard/") ?>' + employee.employee_id + '" class="btn btn-regin btn-sm w-25 mail_icon" target="_blank" title="Print Id Card"><i class="fa fa-user"></i></a></div></div></div></div>';
              });

              var paginationHtml = '<div class="row row-sm"><div class="col-sm-12 col-md-5"><div  class="dataTables_info" role="status" aria-live="polite">Showing ' + ((page - 1) * limit + 1) + ' to ' + ((page * limit) > totalRows ? totalRows : (page * limit)) + ' of ' + totalRows + ' entries</div></div>';
              paginationHtml += '<div class="col-sm-12 col-md-7"><div class="float-sm-end myRightEnd"><ul class="pagination">';
              paginationHtml += '<li class="page-item prev-btn" data-page="' + (page - 1) + '"> <a href="javascript:void(0);" class="page-link"> Previous </a> </li>';
              for (var i = 1; i <= totalPages; i++) {
                paginationHtml += '<li class="page-item page-btn" id="arm' + i + '" data-page="' + i + '"> <a href="javascript:void(0);" class="page-link">' + i + '</a> </li>';
              }
              paginationHtml += '<li class="page-item next-btn" data-page="' + (page + 1) + '"> <a href="javascript:void(0);" class="page-link"> Next </a> </li>';
              paginationHtml += '</ul></div></div></div>';
              $('#employee-grid').html(cardHtml);
              $('#pagination').html(paginationHtml);
              $('.page-btn').each(function() {
                if ($(this).data('page') === page) {
                  $(this).addClass('active');
                } else {
                  $(this).removeClass('active');
                }
              });
              $('.page-btn').click(function() {
                var page = $(this).data('page');
                loadEmployees(page); /*console.log('Current Active Page: ' + page);*/
              });
              $('.prev-btn').click(function() {
                var page = $(this).data('page');
                if (page >= 1) {
                  loadEmployees(page);
                }
              });
              $('.next-btn').click(function() {
                var page = $(this).data('page');
                if (page <= totalPages) {
                  loadEmployees(page);
                }
              });
              if (page == 1) {
                $('.prev-btn').addClass('disabled');
              } else {
                $('.prev-btn').removeClass('disabled');
              }
              if (page == totalPages) {
                $('.next-btn').addClass('disabled');
              } else {
                $('.next-btn').removeClass('disabled');
              }
            }
          });
        }

        loadListEmployees(1);

        function loadListEmployees(page) {
          $.ajax({
            url: '<?php echo base_url("admin/employee/grid_employees"); ?>',
            type: 'POST',
            data: {
              page: page
            },
            dataType: 'json',
            success: function(response) {
              var employees = response.employees;
              var totalRows = response.total_rows;
              var limit = response.limit;
              var totalPages = Math.ceil(totalRows / limit);
              var listHtml = '';
              $.each(employees, function(i, employee) {
                var emp = {
                  id: employee.id,
                  action: 'editDetails'
                };
                var jsonString = JSON.stringify({
                  id: emp.id,
                  action: emp.action
                });
                var base64String = btoa(jsonString);
                var targetEdit = response.url_edit + encodeURIComponent(base64String); //
                var mailSend = "sendNotify===admin/employee/notify===" + emp.id;
                listHtml += '<tr>';
                listHtml += '<th>' + (i + 1) + '. </th>';
                listHtml += '<td>' + 'EMP' + employee.employee_id + '</td>';
                listHtml += '<td>' + employee.emp_name + '</td>';
                listHtml += '<td>' + employee.contact_no + '</td>';
                listHtml += '<td>' + employee.email + '</td>';
                // listHtml += '<td><a href="javascript:void(0)" data-id="miStatusView===software/branch/manage===2" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-success getAction bgDng" id="arvs--2">Active</a></td>';
                listHtml += '<td><a href="javascript:void(0)" title="Click to Active" class="badge bg-success getAction bgDng" id="arvs--2">Active</a></td>';
                listHtml += '<td><div>';
                listHtml += '<a href="' + response.url_view + employee.id + '" title="Click to view details" class="btn ripple miView btn-sm getAction"><i class="ti-eye"></i></a>';
                listHtml += '<a href="' + targetEdit + '" style="margin-left:-13px;" title="Click to Update Details" class="btn ripple btn-secondary btn-sm edtPd getAction mx-2">';
                listHtml += '<i class="ti-pencil-alt"></i></a>';
                listHtml += '<a href="' + base_url + 'common/idcard/'+employee.employee_id + '" target="_blank" style="margin-left:-13px;" title="Click to Print Id Card" class="btn ripple btn-secondary btn-sm edtPd getAction mx-2">';
                listHtml += 'Id Card</a></div></td>';
                listHtml += '</tr>';
              });
              var paginationHtml = '<div class="row row-sm"><div class="col-sm-12 col-md-5"><div  class="dataTables_info" role="status" aria-live="polite">Showing ' + ((page - 1) * limit + 1) + ' to ' + ((page * limit) > totalRows ? totalRows : (page * limit)) + ' of ' + totalRows + ' entries</div></div>';
              paginationHtml += '<div class="col-sm-12 col-md-7"><div class="float-sm-end myRightEnd"><ul class="pagination">';
              paginationHtml += '<li class="page-item prev-btn" data-page="' + (page - 1) + '"> <a href="javascript:void(0);" class="page-link"> Previous </a> </li>';
              for (var i = 1; i <= totalPages; i++) {
                paginationHtml += '<li class="page-item page-btn" id="arm' + i + '" data-page="' + i + '"> <a href="javascript:void(0);" class="page-link">' + i + '</a> </li>';
              }
              paginationHtml += '<li class="page-item next-btn" data-page="' + (page + 1) + '"> <a href="javascript:void(0);" class="page-link"> Next </a> </li>';
              paginationHtml += '</ul></div></div></div>';
              $('#list_employee').html(listHtml);
              $('#listPagination').html(paginationHtml);
              $('.page-btn').each(function() {
                if ($(this).data('page') === page) {
                  $(this).addClass('active');
                } else {
                  $(this).removeClass('active');
                }
              });
              $('.page-btn').click(function() {
                var page = $(this).data('page');
                loadListEmployees(page); /*console.log('Current Active Page: ' + page);*/
              });
              $('.prev-btn').click(function() {
                var page = $(this).data('page');
                if (page >= 1) {
                  loadListEmployees(page);
                }
              });
              $('.next-btn').click(function() {
                var page = $(this).data('page');
                if (page <= totalPages) {
                  loadListEmployees(page);
                }
              });
              if (page == 1) {
                $('.prev-btn').addClass('disabled');
              } else {
                $('.prev-btn').removeClass('disabled');
              }
              if (page == totalPages) {
                $('.next-btn').addClass('disabled');
              } else {
                $('.next-btn').removeClass('disabled');
              }
            }
          });
        }
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      let isListActive = false;
      $('#showEmployee').on('click', function() {
        $("i", "#showEmployee").toggleClass("fe-grid fe-list");
        isListActive = !isListActive;
        if (isListActive) {
          $('#listView').show();
          $('#gridView').hide();
          $('#toggleText').text('Grid View');
        } else {
          $('#listView').hide();
          $('#gridView').show();
          $('#toggleText').text('List View');
        }
      });
    });
  </script>