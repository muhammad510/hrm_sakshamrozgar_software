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
    
    
<!---------------------------------------------------------------------------------------------->    
    
    
    <form action="https://demo.24hourworx.com/documents/types/update/5" method="POST" enctype="multipart/form-data" data-select2-id="select2-data-[object HTMLInputElement]">
                    <input type="hidden" name="_token" value="RQfCMlkeGkY9K8GNQnvM6GJwceyboBgXhdhbGYQz">                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id" value="5">


                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Document Type -->
                            <div class="form-group mb-3">
                                <label class="form-label" for="document_type">Document Type</label>
                                <input type="text" class="form-control ot-form-control ot-input" id="name" name="name" value="test">

                                                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mb-3 mt-2">
                            
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Document Type -->
                            <div class="form-group mb-3">
                                <label class="form-label" for="document_type">Request Template</label>
                                <textarea name="request_template" class="form-control text-area-height-unset" rows="10">yesy</textarea>

                                                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Document Type -->
                            <div class="form-group mb-3">
                                <label class="form-label" for="document_type">Response Template</label>
                                <textarea name="response_template" class="form-control text-area-height-unset" rows="10">fsfafaz</textarea>

                                                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group mb-3" data-select2-id="select2-data-8-zmch">
                                <label class="form-label" for="document_type">Choose Status</label>
                                <select name="status_id" id="status_id" class="form-control ot-form-control ot-input select2 select2-hidden-accessible" required="" data-select2-id="select2-data-status_id" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="select2-data-11-4o51">Choose A Status</option>
                                    <option value="1" selected="" data-select2-id="select2-data-2-9w35">Active</option>
                                    <option value="4" data-select2-id="select2-data-12-xz9o">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-gradian mr-3">Submit</button>
                        </div>
                    </div>

                </form>
    
<!---------------------------------------------------------------------------------------------->    
    
    
    
    
    
    
    
    
      <div id="amiResult">
        <div class="table-responsive">
          <table class="table text-nowrap text-md-nowrap table-striped table-bordered table-hover mg-b-0" id="machine_det">
            <thead class="ami_tHeader">
              <tr>
                <th><div style="width:50px;">SL.</div></th>
                <th>Name </th>
                <th>Status</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody class="tbody ">
                                    <tr>
                                        <td>1</td>
                    <td>test</td>
                    <td>
                        <small class="badge bg-success">Active</small>
                    </td>
                    <td>
                        <div style="text-align:center">
                            <a href="javascript:void(0);" style="margin-left:-13px;" data-id="sinkLiveData===software/machine/manage===3" title="Refresh Live Data" class="btn ripple btn-sm arvAction miRfr" id="snk03"><i class="ti-pencil-alt"></i></a>
                            <a href="javascript:void(0);" data-id="miMachineView===software/machine/manage===3" title="Click to view machine details" class="btn ripple btn-secondary btn-sm getAction" id="vwM03"><i class="ti-trash"></i></a>
                        </div>
                    </td>
                </tr>
                            <tr>
                                        <td>2</td>
                    <td>No Objection Certificate (NOC)</td>
                    <td>
                        <small class="badge bg-success">Active</small>
                    </td>
                    <td>
                        <div class="dropdown dropdown-action">
                            <button type="button" class="btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                                                    <a class="dropdown-item" href="https://demo.24hourworx.com/documents/types/edit/1">Edit</a>
                                                                                                    <a class="dropdown-item" href="https://demo.24hourworx.com/documents/types/delete/1">Delete</a>
                                                            </ul>
                        </div>
                    </td>
                </tr>
                            <tr>
                                        <td>3</td>
                    <td>Appointment Letter</td>
                    <td>
                        <small class="badge bg-success">Active</small>
                    </td>
                    <td>
                        <div class="dropdown dropdown-action">
                            <button type="button" class="btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                                                    <a class="dropdown-item" href="https://demo.24hourworx.com/documents/types/edit/2">Edit</a>
                                                                                                    <a class="dropdown-item" href="https://demo.24hourworx.com/documents/types/delete/2">Delete</a>
                                                            </ul>
                        </div>
                    </td>
                </tr>
                            <tr>
                                        <td>4</td>
                    <td>Testimonial</td>
                    <td>
                        <small class="badge bg-success">Active</small>
                    </td>
                    <td>
                        <div class="dropdown dropdown-action">
                            <button type="button" class="btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                                                    <a class="dropdown-item" href="https://demo.24hourworx.com/documents/types/edit/3">Edit</a>
                                                                                                    <a class="dropdown-item" href="https://demo.24hourworx.com/documents/types/delete/3">Delete</a>
                                                            </ul>
                        </div>
                    </td>
                </tr>
                            <tr>
                                        <td>5</td>
                    <td>Experience Certificate</td>
                    <td>
                        <small class="badge bg-success">Active</small>
                    </td>
                    <td>
                        <div class="dropdown dropdown-action">
                            <button type="button" class="btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                                                    <a class="dropdown-item" href="https://demo.24hourworx.com/documents/types/edit/4">Edit</a>
                                                                                                    <a class="dropdown-item" href="https://demo.24hourworx.com/documents/types/delete/4">Delete</a>
                                                            </ul>
                        </div>
                    </td>
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
