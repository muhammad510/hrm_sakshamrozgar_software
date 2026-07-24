<style>
  .noteHead span {
    font-weight: 700;
  }

  .noteHead {
    margin-bottom: 20px;
  }

  .ami_tHeader {
    background-color: #088 !important;
  }

  .ami_tHeader>tr>th {
    border: 1px solid #088 !important;
    color: #fff;
    padding-left: 5px !important;
  }

  #saveDocDet {
    margin-top: 29px;
  }

  .table-responsive,
  #uplDocDetails {
    min-height: 150px !important;
  }
</style>
<div class="inner-body">
  <div class="page-header">
    <div>
      <h2 class="main-content-title tx-24 mg-b-5">Employee Management</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('staff/dashboard'); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $breadcrums; ?></li>
      </ol>
    </div>
    <div class="d-flex">
      <div class="justify-content-center"><a href="<?php echo base_url('admin/employee/manages'); ?>" class="btn btn-white btn-icon-text my-2 me-2"> <i class="ti-arrow-left me-2"></i> Back</a></div>
    </div>
  </div>
  <div class="row row-sm" style="margin:15px -10px 15px -10px;">
    <div class="col-lg-12 col-md-12">
      <div class="card">
        <div class="card-header  border-0">
          <h4 class="card-title">Employee Import</h4>
        </div>
        <div class="card-body">
          <div class="row row-sm">
            <div class="col-md-12 col-lg-12">
              <div class="noteHead">
                <span>Note:-</span>
                Your CV data should be in the format below. The first line of your CSV file should be the column headers as in the table example. Also make sure that your file is UTF-8 to avoid unnecessary encoding problems.
              </div>
              <div class="table-responsive">
                <table class="table text-nowrap text-md-nowrap table-striped table-bordered table-hover mg-b-0">
                  <thead class="ami_tHeader">
                    <tr>
                      <th>S. No. </th>
                      <th>Employee Name</th>
                      <th>Gender</th>
                      <th>Date Of Birth</th>
                      <th>Mobile Number</th>
                      <th>Email Id</th>
                      <th>Address</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1. </td>
                      <td>Amit Kumar</td>
                      <td>Male</td>
                      <th>03/03/1991</th>
                      <th>878943434343044</th>
                      <th>anyposible@gmail.com</th>
                      <th>Deva ram ke chack marchi</th>
                    </tr>
                    </thead>
                </table>
              </div>
              <div id="uplDocDetails">
                <form method="post" id="manage_document" data-id="<?php echo $uploadTarget; ?>" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-6">
                      <label>Upload Document : <span class="text-danger">*</span></label>
                      <div class="input-group file-browser">
                        <input type="text" class="form-control border-end-0 browse-file" id="empDocFile" name="empDocFile" placeholder="Choose file" readonly="">
                        <label class="input-group-btn">
                          <span class="btn btn-outline-success">
                            Browse <input type="file" style="display:none;" id="empDocFileAdd" name="empDocFileAdd">
                          </span>
                        </label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <button class="btn ripple btn-outline-secondary  amiStl" id="saveDocDet"><i class="ti-save"></i> Upload</button>
                      <button type="button" class="btn ripple btn-outline-primary amiStl" data-id="<?php echo base_url("admin/employee/import/readDoc"); ?>" id="readDocDet" onclick="readDoc()" style="margin-top:29px;">
                        <i class="ti-save"></i> Preview
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    $('#manage_document').submit(function(e) {
      let target = $('#manage_document').attr('data-id');
      e.preventDefault();
      $.ajax({
        url: target,
        type: "POST",
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'json',
        beforeSend: function() {
          $('#saveDocDet').html('<i class="fe fe-settings bx-spin"></i> Please Wait');
        },
        complete: function() {
          $('#saveDocDet').html('<i class="ti-save"></i> Save');
        },
        success: function(htmlAmi) {
          toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
          /* if (htmlAmi.addClas == 'tst_success') {
                //setTimeout(function(){window.location.reload(1);},2000);
                $.each(htmlAmi.srCnt, function(index, value) {
                    sum = 1 + index;
                    $("#smDocCnt-" + value).html(sum + '.');
                });
                $(htmlAmi.tblRowDet).insertAfter($('#empDocTble tbody tr.miCenter:last'));
                $('#uplDocDetails').hide();
                $('#lstDocDet').show();
                $('#edtDocDet').html('List of documents');
                $('#AddNewDoc').show();
            }
*/
        }
      });
    });

    function readDoc() {
      let target = $('#readDocDet').attr('data-id');
      $.ajax({
        url: target,
        type: "POST",
        dataType: 'json',
        beforeSend: function() {
          $('#readDocDet').html('<i class="fe fe-settings bx-spin"></i> Please Wait');
        },
        complete: function() {
          $('#readDocDet').html('<i class="ti-save"></i> Preview');
        },
        success: function(htmlAmi) {
          toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
        },
      });
    }
  </script>