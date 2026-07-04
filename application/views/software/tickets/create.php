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
    <div class="justify-content-center"> <a href="<?php echo base_url('attendance/reportList');?>" class="btn btn-success btn-icon-text my-2 me-2" title="Attendance Overview"> <i class="fe fe-list"></i> Overview </a>
      <button type="button" class="btn btn-primary btn-icon-text my-2 me-2" id="miArvClk" title="Current Time"> <i class="fe fe-filter me-2"></i> Current Time </button>
      <a href="<?php echo base_url('auth/login/signout');?>" class="btn btn-danger btn-icon-text  my-2 me-2"  title="Sign Out"> <i class="fe fe-power me-2"></i> Sign Out </a> </div>
  </div>
</div>
<!-- End Page Header -->
<style>
.card .card-header .card-title::before {content:"";position:absolute;left:0px;padding:2px;height:30px;background:#6f42c1;}.card-footer{ margin-top:30px;}#quillEditor{min-height: 220px;}
input.form-control::file-selector-button{padding: 0.625rem .75rem !important;}
</style>
<div class="row row-sm miBottom">
  <div class="col-sm-12 col-lg-12 col-xl-12">
  <form  method="post" id="createTick" data-id="<?php echo $nCreate;?>"  enctype="multipart/form-data">
  <input id="ticComment" name="ticComment" type="hidden">
    <div class="card">
      <div class="card-header  border-0">
        <h4 class="card-title">New Tickets</h4>
      </div>
      <div class="card-body pt-3 pb-3">
          <div class="form-group">
            <div class="row align-items-center">
              <label class="col-sm-3 col-xl-2 form-label tx-semibold">Ticket Subject <span class="text-danger">*</span></label>
              <div class="col-sm-9 col-xl-10">
                <input type="text" class="form-control" id="ticket_subject" name="ticket_subject">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row align-items-center">
              <label class="col-sm-3 col-xl-2 form-label tx-semibold">Email Address <span class="text-danger">*</span></label>
              <div class="col-sm-9 col-xl-10">
                <input type="text" class="form-control"  id="ticket_email" name="ticket_email" value="suppoert@ashutoshautofin.in">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row align-items-center">
              <label class="col-sm-3 col-xl-2 form-label tx-semibold">Priority <span class="text-danger">*</span></label>
              <div class="col-sm-9 col-xl-10">
                <select class="form-control select  select2-with-search" id="priority" name="priority">
                <option value="">Select</option>
                <option value="High">High</option>
                <option value="Low" selected="selected">Low</option>
                <option value="Medium">Medium</option>
              </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row align-items-center">
              <label class="col-sm-3 col-xl-2 form-label tx-semibold">Ticket Category <span class="text-danger">*</span></label>
              <div class="col-sm-9 col-xl-10">
                <select class="form-control select  select2-with-search" id="tiCat" name="tiCat">
                    <option value="">Select</option>
                    <?php if($tiCat){foreach($tiCat as $cat){?>
                        <option value="<?php echo $cat->id;?>"><?php echo $cat->name;?></option>
                    <?php }}?>
              	</select>
              </div>
            </div>
          </div>
          <div class="form-group"> 
            <div class="row">
              <label class="col-sm-3 col-xl-2 form-label tx-semibold">Upload Image : </label>
              <div class="col-sm-9 col-xl-10">
                  <input class="form-control" type="file" id="chtFile" name="chtFile">
              </div>
            </div> 
          </div>         
          <div class="form-group">
            <div class="row">
              <label class="col-sm-3 col-xl-2 form-label tx-semibold">Ticket Description <span class="text-danger">*</span></label>
              <div class="col-sm-9 col-xl-10">
                 <div id="quillEditor"></div>
              </div>
            </div>
          </div>
      </div>
     	  <div class="card-footer d-sm-flex rounded-0">
        <div class="btn-list ms-auto">
            <button class="btn ripple btn-outline-success pull-right amiStl" id="chatAgain" type="submit"> <i class="ti-save"></i> Create Ticket </button>
            <a class="btn ripple btn-outline-dark pull-right amiStl getAction" href="<?php echo base_url("tickets");?>" style="margin-right:5px;"> <i class="ti-arrow-left"></i> Back </a>
        </div>
    </div>
    </div>
     </form>
  </div>
</div>
   <script src="<?php echo base_url('assets/plugins/quill/quill.min.js');?>"></script>
<script>
$(function() {
	'use strict'
	var toolbarOptions = [[{'header': [1, 2, 3, 4, 5, 6, false]}],['bold', 'italic', 'underline', 'strike'],[{'list': 'ordered'}, {'list': 'bullet'}],['link', 'image', 'video']];
	var quill = new Quill('#quillEditor', {modules: {toolbar: toolbarOptions},theme: 'snow'});
	var toolbarInlineOptions = [['bold', 'italic', 'underline'],[{'header': 1}, {'header': 2}, 'blockquote'],['link', 'image', 'code-block'],];
	
});

</script>
<script src="<?php echo base_url('assets/js/setting/tickets.js'); ?>"></script>