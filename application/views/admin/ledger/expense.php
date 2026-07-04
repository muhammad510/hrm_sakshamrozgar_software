<div class="inner-body">
<style>
#searchExpenseDetails,#vCreateNew,#adBtnActn,#expViewDetails{ display:none;}
.btn-miOk {color:#10c1b1  !important;border-color:#10c1b1 ;}.btn-miOk:hover{border-color:#10c1b1;background-color:#10c1b1; color:#fff !important }.miBck a:hover {background-color: #645bca;color: #fff;}.miBck {font-weight: 600;text-transform: uppercase;float: right;margin-right: 10px;padding-top: 7px;}
.miBck a{border: 1px solid #645bca;padding: 8px 12px 8px 12px;border-radius: 5px;color: #645bca;font-weight: bold;}.miLst {font-weight: 600;text-transform: uppercase;}.miLst i {background-color: #645bca;padding: 11px 11px 10px 10px;margin-right: 10px;border-radius: 20px;color: #fff;font-weight: bold;}.miHeader {padding: 10px 15px 10px 15px;border-bottom:1px solid #cccece; margin: 0px -10px 20px -10px; border-top-left-radius: 5px; border-top-right-radius: 5px;}.cardTtl {border: 1px solid #fff;padding: 0px 0px 40px 0px;margin-bottom: 75px; border-radius: 5px;background-color: #fff;}.ami_tHeader>tr>th {color: #FFFFFF !important;border: 1px solid #088 !important;padding: 12px 0px 12px 5px !important; }.ami_tHeader>tr { border: 1px solid #088 !important;background-color: #088 !important;}.inrGrn i { font-size: .75rem;color: #02aa73;}.inrBlue i {font-size: .75rem; color: #0283aa;}.miLvs{width: 65px;margin-left: 10px; margin-right: 10px;}


.amtltip {position: relative;display: inline-block;cursor: pointer; }.amtltip .tlptext{ visibility:hidden;width: 180px;background-color: rgba(0, 18, 19, 0.99);color: #fff;text-align: center;border-radius: 6px;padding: 10px 10px 10px 10px;position: absolute;
  z-index: 1; top: 150%; left: 50%; margin-left: -70%;white-space: pre-wrap;white-space: -moz-pre-wrap;white-space: -pre-wrap;white-space: -o-pre-wrap;word-wrap: break-word; 
   }.amtltip .tlptext::after { content: "";position: absolute;bottom: 100%;left: 50%;margin-left: -5px;border-width: 5px;border-style: solid;border-color: transparent transparent black transparent;}.amtltip:hover .tlptext {visibility:visible;}

.delMsg {
  text-align: center;
  font-size: 20px;
  margin: 30px 0px 10px 0px;
  color: #00805c;
}.actnData {
  text-align: center;
  margin: 0px 0px 20px 0px;
  color: #716c6c;
  font-size: .8rem;
}


.expHdr{ padding:10px; background-color:#645bce; color:#fff;}
.expHdr i{ padding:5px;background-color:#fff; color:#645bce;margin-right:5px;border-radius: 5px;}
.amiRole span {float: right;font-weight: bold;color: #7870d5;}
.miTnxdt{ background-color:#fff;padding: 10px;border: 1px solid rgba(51, 50, 62, 0.09);border-radius: 11px;min-height: 425px;
}
.tnxHdr{ text-transform:uppercase;color: #d73698;padding: 10px;font-weight: 500;}
.tnxExpDt ul{ list-style:none;margin-left: -15px !important;}
.tnxExpDt ul li{ border-bottom:1px solid #eeebeb;padding:10px 10px 10px 0px;}
.tnxExpDt ul li:last-child{ border-bottom:0px solid #fff;}
.tnxExpDt ul li span{ float:right;font-weight:700;color:brown;}
.aprG{ color:#19b159 !important;}
.expNot{float: right;max-width: 75%;padding: 0px 5px 0px 5px;max-height: 60px;overflow-y: scroll;overflow-x: hidden;scrollbar-width: thin;scrollbar-color:#0e0e23 var(--mi-bar_color) ;}
#exAmt i{font-size: 11px;padding-right: 3px; color:#02aa73;}
#exNote{ color:brown}
#exStsD{display:none;padding: 10px 10px 10px 15px;margin: 0px 0px 5px 10px;}
#exStsD div{ width:181px;right: 0;position: absolute;margin: -30px 21px 0px 0px;}
.dark-theme .miTnxdt{ background-color: var(--dark-theme);border-color: var(--dark-border);}

.dark-theme .tnxExpDt ul li{ border-bottom: 1px solid #33353c;}
.dark-theme .bg-primary { background-color:#3D33B5 !important;}
.aftSpn{ float:right !important;margin-right: 5px;font-weight: 500;}

  </style>
 <div class="inner-body">
	<!-- Page Header -->
	<div class="page-header">
		<div>
            <h2 class="main-content-title tx-24 mg-b-5"><?php echo $title;?></h2>
            <ol class="breadcrumb"><li class="breadcrumb-item active" aria-current="page"><?php print_r($this->session->userdata('mi_name'));?></li></ol>
        </div>
		<div class="d-flex">
			<div class="justify-content-center">
			  <a href="<?php echo base_url('staff/dashboard');?>" class="btn btn-success btn-icon-text my-2 me-2"  title="Dashboard"> <i class="ti-home"></i> Dashboard </a>
              <button type="button" class="btn btn-primary btn-icon-text my-2 me-2" id="miArvClk"> <i class="fe fe-filter me-2"></i> Current Time </button>
              <a href="<?php echo base_url('auth/login/signout');?>" class="btn btn-danger btn-icon-text  my-2 me-2"> <i class="fe fe-power me-2"></i> Sign Out </a>
			</div>
		</div>
	</div>
<!-- End Page Header  @mi Search panel--> 
    <div id="searchExpenseDetails">
        <div class="row row-sm">
            <div class="cardTtl marB">
                <div class="miHeader"><span class="miLst"><i class="pe-7s-cash"></i>Search Salary Details</span></div>
                    <form method="post" id="search_branch"> 	            
                        <div class="col-md-12 col-lg-12">
                            <div class="row row-sm"> 
                                <div class="col-6">
                                    <label>Employee ID:</label>
                                    <div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text"><i class="si si-puzzle"></i></span> </div>
                                        <input type="text" class="form-control" name="frmDate" id="frmDate">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label>Expense Status:</label> <div class="input-group mb-3">
                                     <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-briefcase"></i></span></div>
                                        <div class="miSlwdth" style="width:92.33%"> 
                                           <select class="form-control select2-with-search" name="searchTyp" id="searchTyp">
                                                 <option value=""> Choose One </option>
                                                 <option value="all"> All </option>
                                                 <option value="Approved">Approved</option>
                                                 <option value="Pending">Pending</option>
                                                 <option value="Reject">Reject</option>
                                          </select> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label>From Date:</label>
                                    <div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text"><i class="si si-calendar"></i></span> </div>
                                        <input type="text" class="form-control fc-datepicker" name="toDate" id="toDate">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label>To date:</label>
                                    <div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text"><i class="si si-calendar"></i></span> </div>
                                        <input type="text" class="form-control fc-datepicker" name="empID" id="empID">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                   <a href="javascript:void(0)" class="btn ripple btn-outline-dark srchPanel"><i class="fe fe-arrow-left"></i> Back</a>
    <button class="btn ripple btn-outline-success pull-right" onclick="return get_search(reportExpns,'#search_branch','#getReportMiDetails')"><i class="ti-search"></i> Search</button>
                                </div>
                            </div>
                        </div>
                   </form>
            </div>
        </div>
    </div>
  <!-- Row -->
  <div class="row row-sm">
    <div class="cardTtl">
      <div class="miHeader">
        <span class="miLst"><i class="pe-7s-cash"></i><span id="mstrTitle">
            <?php echo $breadcrums;?>
          </span></span>
         <!--<span class="miBck"><a href="<?php echo $bckUrl; ?>" style="margin-left:-5px;"><i class="ti-arrow-left"></i></a></span> -->
        <span class="miBck">
          <a href="javascript:void(0);" style="margin-left:-5px;" id="srchBtn" title="Search Details" class="miDefault srchPanel">
            <i class="ti-search"></i>
          </a>
        </span>
        <span class="miBck">
          <a href="javascript:void(0);" style="margin-left:-5px;" data-id="Add New Expense " title="Expense Details" class="miAction" id="AddNew">
            <i class="ti-plus"></i> 
          </a>
        </span>
      </div>
      <div class="row row-sm">    
    <form method="post" id="manage_expense" enctype="multipart/form-data"> 	            
        <input type="hidden" id="target" value="<?php echo $target; ?>" />
        <span id="adBtnActn"><?php echo $addTarget;?></span>
        <div id="vCreateNew">
         	<div class="col-md-12">	
                 <div class="row row-sm">
                    <div class="col-md-12">
                        <label>Expense Title : <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-book-open"></i></span>
                            </div>
                          <input type="text" class="form-control" name="expnseTitle" id="expnseTitle">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Expense Place : <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-location-pin"></i></span>
                            </div>
                            <input type="text" class="form-control" name="expnsePlace" id="expnsePlace">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Expense Amount : <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            </div>
                            <input type="text" class="form-control" name="expnseAmount" id="expnseAmount" oninput="this.value = this.value.replace(/[^0-9 .]/g, '').replace(/(\  *?)\  */g, '$1')" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Expenses By : <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-user"></i></span>
                            </div>
                             <div class="miSlwdth" style="width:88.31%"> 
							   <select  name="expenseBy" id="expenseBy" class="form-control select2-with-search">
                              		<option value=""> Choose One </option>
									<?php 
									if($expenseByEmp)
									{
										foreach($expenseByEmp as $emp)
										{?>
                                     <option value="<?php echo $emp->employee_id;?>"><?php echo $emp->name;?></option>
                                    <?php }}else{?> <option value="">No data available</option><?php }?>
                            </select>  
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Expense Date : <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-event"></i></span>
                            </div>
                             <input type="text" class="form-control" name="datetimepicker" id="datetimepicker" readonly="readonly">
                        </div>
                    </div>                    
                    <div class="col-md-4">
                        <label>Upload Invoice : <span class="text-danger">*</span></label>
                        <div class="input-group file-browser">
                            <input type="text" class="form-control border-end-0 browse-file" id="expnSlipInvoice" name="expnSlipInvoice" placeholder="Choose file" readonly="">
                            <label class="input-group-btn">
                                <span class="btn btn-outline-success">
                                    Browse <input type="file" style="display:none;" id="expnSlip" name="expnSlip">
                                </span>
                            </label>
                        </div>
                     </div>
                    <div class="col-md-12">
                        <label>Note : </label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-book-open"></i></span>
                            </div>
                             <textarea class="form-control" rows="3" id="expnsNote" name="expnsNote" placeholder="Some text here..."></textarea>
                        </div>
                     </div> 
                    <div style="margin-bottom: 20px;padding:10px;">
                            <div class="row row-sm">
                               <div class="col-md-2"><label>Status :</label></div>
                               <div class="col-md-2">
                                     <label class="colorinput">
                                        <input name="expnStatus" type="radio" value="Approved" class="colorinput-input" <?php if(!(($this->uCat!='5')&&($this->uCat!='4'))){echo 'disabled';} ?>>
                                        <span class="colorinput-color bg-success"></span>
                                    </label>
                                    <div style="color:#19b159;margin: -37px 0px 0px 35px;">Approved</div>
                                 </div>
                               <div class="col-md-2">
                                     <label class="colorinput">
                                        <input name="expnStatus" type="radio" value="Pending" class="colorinput-input" <?php if(!(($this->uCat!='5')&&($this->uCat!='4'))){echo 'checked';} ?>>
                                        <span class="colorinput-color bg-orange"></span>
                                    </label>
                                    <div style="color:#ff9b21;margin: -37px 0px 0px 35px;">Pending</div>
                                </div>
                               <div class="col-md-2">
                                    <label class="colorinput">
                                        <input name="expnStatus" type="radio" value="Reject" class="colorinput-input" <?php if(!(($this->uCat!='5')&&($this->uCat!='4'))){echo 'disabled';} ?>>
                                        <span class="colorinput-color bg-pink"></span>
                                    </label>
                                    <div style="color:#f1388b;margin: -37px 0px 0px 35px;">Rejected</div>
                                </div>
                                <div class="col-md-4"> &nbsp;</div>
                            </div>
                     </div>
                    <div class="col-md-12" style="margin-bottom:20px;">
                        <button class="btn ripple btn-outline-success pull-right amiStl" id="manage" type="submit"><i class="ti-save"></i> Submit</button>
						<a href="javascript:void(0)" class="btn ripple btn-outline-dark miAction" id="miBck" data-id="Expense Summary"><i class="ti-arrow-left"></i> Back </a>
                    </div>
                 </div>
             </div>    
        </div>
    </form>
  <!-----------------------------------View Section will start---------------------------------------->    
  		<div id="expViewDetails">
        	 <div class="col-md-12">
                 <div class="row row-sm">
            		<div class="col-md-6"> <div id="lftSdDetTnx"></div></div>
                    <div class="col-md-6">
                      <div class="custom-card miTnxdt">	
                    	 <div class="tnxHdr">Transaction Information</div>
                         <div class="tnxExpDt"><ul id="tnxInfo"></ul></div>
                         
                          <div id="exStsD">Status <div id="stsSection"><select class="form-control select2-with-search" id="updtStatus"  <?php if(!(($this->uCat!='5')&&($this->uCat!='4'))){ echo ' disabled="disabled"';}?> >
                              		    <option value=""> Choose One </option>
										<option value="Approved">Approved</option>
										<option value="Reject">Reject</option>
										<option value="Pending">Pending</option>
										<option value="Hold">Hold</option>
                            	      </select></div></div>
                          <button class="btn ripple btn-outline-success pull-right getAction" id="aprBtn" type="button" style="margin-left:5px; <?php //if(!(($this->uCat!='5')&&($this->uCat!='4'))){ echo 'display:none;';}?>">
                          	  <i class="ti-save"></i> Submit
                          </button>
                          
                          <a href="javascript:void(0)" class="btn ripple btn-outline-dark miAction pull-right" id="miBck" data-id="Expense Summary">
                            <i class="ti-arrow-left"></i> Back 
                          </a>
                      </div>
                    </div>
                 </div>
             </div>
        </div>
  <!-----------------------------------View Section will End---------------------------------------->    
		 <div id="vTbleShw">
          <div class="table-responsive">
            <table class="table text-nowrap text-md-nowrap table-striped table-bordered table-hover mg-b-0"
              id="getReportMiDetails">
              <thead class="ami_tHeader">
                <tr>
                  <th><div style="width:60px;">S.No.</div></th>
                  <th>Tnx. ID</th>
                  <th class="text-center">Emp ID</th>
                  <th>Employee Name</th>
                  <th class="text-center">Title</th>
                  <th>Descreption.</th>
                  <th>Amount</th>
                  <th>Date</th>
                  <th>Paid By</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

<div id="trashTnxDetails" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style=" padding-left: 0px;" aria-modal="true" role="dialog">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right;"><i class="si si-close"></i></button>
            <div class="delMsg"><i class="ti-trash"></i> Delete Expense</div>
                <div class="actnData"><i class="si si-power"></i>  Are you sure want to delete expense details of tnx ID #F33333</div>
                <div id="mdlFtrBtn">
                  <button type="button" class="btn btn-outline-secondary waves-effect waves-light pull-right getAction" id="cnfChanges" data-id="@misingh143">
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




  <script src="<?php echo base_url('assets/js/admin/payroll.js'); ?>"></script>
 
