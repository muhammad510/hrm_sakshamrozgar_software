<div class="inner-body">                       
	<!-- Page Header -->
	<div class="page-header">
		<div>
			<h2 class="main-content-title tx-24 mg-b-5">
				<?php echo $title; ?>
			</h2>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url('staff/dashboard'); ?>">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Accounts</li>
			</ol>
		</div>
		<div class="d-flex">
            <div class="justify-content-center">
              <a href="<?php echo base_url('admin/employee/create');?>" class="btn btn-success btn-icon-text my-2 me-2"  title="Join Employee">
              	 <i class="fe fe-plus"></i> Join Employee 
              </a>
              <button type="button" class="btn btn-primary btn-icon-text my-2 me-2" id="miArvClk"> <i class="fe fe-filter me-2"></i> Current Time </button>
              <a href="<?php echo base_url('auth/login/signout');?>" class="btn btn-danger btn-icon-text  my-2 me-2"> <i class="fe fe-power me-2"></i> Sign Out </a>
            </div>
          </div>
	</div>
	<!-- End Page Header -->

	<style>
		.miBck a:hover{ background-color:#645bca; color:#fff;}
		.miBck{ font-weight:600;text-transform: uppercase; float:right;margin-right: 10px;}
		.miBck a{ border:1px solid #645bca;padding: 8px 12px 8px 12px;border-radius: 5px;color: #645bca;font-weight: bold;}
		.miLst{ font-weight:600;text-transform: uppercase;}
		.miLst i{ background-color: #645bca;padding: 11px 11px 10px 10px ;margin-right: 10px;border-radius: 20px;color: #fff;font-weight: bold;}
		.miHeader{padding:14px 5px 14px 15px;border-bottom: 1px solid #cccece;margin: 5px -10px 20px -10px;border-top-left-radius: 5px;border-top-right-radius: 5px;}
		.cardTtl{border:1px solid #fff;padding:0px 0px 40px 0px;margin-bottom: 75px;border-radius: 5px;background-color: #fff;}
.ami_tHeader > tr > th{ color:#FFFFFF !important;border: 1px solid #088 !important;padding: 12px 0px 12px 5px !important;}
.ami_tHeader > tr{border: 1px solid #088 !important;}
		#searchLeaveDetails,#newAccID,#amAccAllChanges,#locTrgt{display:none;}
 	   
	.text-right{ text-align:right;}
	#reportAccounts tfoot{ font-weight:800;}
	.spTxt{ color:#ac3a02;}
	.miSlwdth{ width:92.1%;}
	@media (min-width:1400px) and (max-width:2100px){
	.miSlwdth{ width:95.1%;}
	}
	</style>

<div class="row row-sm" id="searchLeaveDetails">
<div class="cardTtl">
	<div class="miHeader"><span class="miLst"><i class="si si-plane"></i>Search Transaction</span></div>
		<form method="post" id="search_branch"> 	            
            <div class="col-md-12 col-lg-12">
                <div class="row row-sm">
                  
                    <div class="col-md-6">
                        <label>Search By:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-grid"></i></span>
                            </div>
                            <div class="miSlwdth"> 
							 <select class="form-control select2-with-search" name="searchTyp" id="searchTyp">
                                <option value=""> --- Select Status --- </option>
                              	<option value="all">All</option>
								<option value="opening_balance">Opening</option>
                                <option value="credit_amt">Credit</option>
                                <option value="debit_amt">Debit</option>
                                <option value="closing_balance">Closing</option>
                             </select> 
							</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Search Value:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-puzzle"></i></span>
                            </div>
                            <input type="text" class="form-control" name="srchContent" id="srchContent">
                        </div>
                    </div>
                    <div class="col-6">
                        <label>Start Date:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-puzzle"></i></span>
                            </div>
                            <input type="text" class="form-control fc-datepicker" name="strtDt" id="strtDt"  placeholder="MM/DD/YYYY">
                        </div>
                    </div>
                    <div class="col-6">
                        <label>End Date:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-puzzle"></i></span>
                            </div>
                            <input type="text" class="form-control fc-datepicker" name="endDt" id="endDt"  placeholder="MM/DD/YYYY">
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                       <a href="javascript:void(0)"  class="btn ripple btn-outline-dark accountManage" id="bkSrch">
							<i class="fe fe-arrow-left"></i> Back</a>
                            <button class="btn ripple btn-outline-success pull-right" onclick="return get_search(reportAccounts,'#search_branch','#reportAccounts')">
                            	<i class="ti-search"></i> Search
                            </button>
                    </div>
                </div>
		    </div>
         </form>
	</div>
</div>
	<!-- Row -->
	<div class="row row-sm">
		<div class="cardTtl">
			<div class="miHeader">
				<span class="miLst"><i class="si si-briefcase"></i><span id="bxTitleNm"><?php echo $title;?></span></span>
				<span class="miBck">
                	<a href="javascript:void(0);" style="margin-left:-5px;" title="Click to search leave details" class="miDefault accountManage" id="accountSrch">
                    	<i class="ti-search"></i>
                    </a>
                </span>
                <span class="miBck">
                	<a href="javascript:void(0);" style="margin-left:-5px;" title="Click to add leave details" id="addNwAccDetails" class="miDefault accountManage">
                    	<i class="ti-plus"></i>
                    </a>
                </span>
			</div>
			<div class="col-md-12 col-lg-12">
			
            <span id="newAccID"><?php echo $newAccID;?></span>
            <span id="locTrgt"><?php echo $addNwAcc;?></span>
             <div id="amAccAllChanges">
           		<form method="post" id="add_fundDetails"> 
                    <input type="hidden" id="target" name="target" value="<?php echo $target;?>" />
                    <input type="hidden" id="oprType" name="oprType" />		     		
                	<div class="row">
                    <div class="col-md-6">
                        <label>Account : <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-grid"></i></span>
                            </div>
							<div class="miSlwdth"> 
							    <select class="form-control select2-with-search arvOnChange" name="accountTyp" id="accountTyp">
								   <option value=""> --- Select One --- </option>
								    <?php 
									if($account)
									{
										foreach($account as $acc)
										{
									?>
                                   <option value="<?php echo $acc['id'];?>"><?php echo $acc['account_no'].'('.$acc['bank_name'];?>)</option>
                                   <?php	}}else{?><option value="">No Account Available</option>
                                   <?php }?>
								</select> 
							</div>  
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Transaction Type: <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-grid"></i></span>
                            </div>
							<div class="miSlwdth"> 
							    <select class="form-control select2-with-search arvOnChange" name="tnxType" id="tnxType">
								   <option value=""> --- Select One --- </option>
								   <option value="debit">Debit</option>
								   <option value="credit">Credit</option>
								</select> 
							</div>  
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Transaction ID:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                            </div>
                           <input type="text" class="form-control" name="fndNwiD" readonly="readonly" id="fndNwiD" value="<?php echo $newAccID;?>">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <label>Amount: <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-puzzle"></i></span>
                            </div>
                            <input type="text" class="form-control ojArv" name="fundAmt" id="fundAmt" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\  *?)\  */g, '$1')">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label>Description: <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-grid"></i></span>
                            </div>
                            <textarea class="form-control" id="rmDscription" name="rmDscription" placeholder="Remarks ..." rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                         <a href="javascript:void(0)"  class="btn ripple btn-outline-dark accountManage" id="bkSrch_01"><i class="fe fe-arrow-left"></i> Back</a>
                         <button type="submit" class="btn ripple btn-outline-success pull-right" id="manageAction"><i class="ti-save"></i> Submit</button>
                    </div>
                </div>
                </form>
            </div>
            
            <div class="row row-sm" id="amiAccountList">
			 <div class="table-responsive">
            	<table class="table text-nowrap text-md-nowrap table-striped table-bordered table-hover" id="reportAccounts">
					<thead class="ami_tHeader">
						<tr>
                          <th>S.N.</th>
                            <th>DATE</th>
                           <!-- <th>Tnx Id.</th>-->
                            <th>Particulars</th>
                            <th>Opening</th>
                            <th>Credit</th>
                            <th>Debit</th>
                            <th>Closing</th>
                        </tr>
					</thead>
                    <tfoot>
                    <tr>
                    	<td colspan="6" class="text-right">Opening Balance</td>
                    	<td style="color:#7f7f7f;"> <?php if($tnxHistory){echo $tnxHistory->opening_balance;}?></td>
                    </tr>
                        <tr><td colspan="6" class="text-right">Debit </td><td style="color:#a83001;"><?php if($tnxHistory){echo $tnxHistory->debit_amt;}?></td></tr>
                        <tr><td colspan="6" class="text-right">Credit </td><td  style="color:#006623;"><?php if($tnxHistory){echo $tnxHistory->credit_amt;}?></td></tr>
                        <tr><td colspan="6" class="text-right">Closing Balance </td><td><?php if($tnxHistory){echo $tnxHistory->closing_balance;}?></td></tr>
                    </tfoot>
				</table>
              </div>
			</div>
		</div>
	</div>
	<!-- End Row -->
</div>
	
<div id="statusChange" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style=" padding-left: 0px;" aria-modal="true" role="dialog">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right;"><i class="si si-close"></i></button>
            <div class="delMsg"><i class="si si-plane"></i> Leave Status</div>
                <div class="actnData"><i class="si si-power"></i>  Are you sure want to activate of Leave ID #F33333</div>
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
    				
<style>
.miLvs{ padding:5px 12px 5px 12px;}.delMsg {text-align: center;font-size: 20px;margin: 30px 0px 10px 0px;color :#00805c;}.actnData {text-align: center;margin: 0px 0px 20px 0px;color: #716c6c;font-size: .8rem;}.delMsg i{ background-color: #00805c;padding: .5rem;font-size: .75rem;border-radius: .5rem;color: #fff;}.mibdge{ padding:6px 0px 6px 0px;width:70px;}.ami_tHeader{background-color:#088;}.ami_tHeader >tr>th{ color:#fff;font-weight: 600;padding:13px 7px 13px 7px;}.miSuccess{padding:6px 10px 6px 10px;color:#19b159;border:1px solid #19b159;border-radius: 2px;}.miSuccess:hover{background-color:#19b159;color: #fff;}.miDefault{padding:6px 10px 6px 10px;color:#3b4863;border:1px solid #3b4863;border-radius: 2px;}.miDefault:hover{background-color:#3b4863;color: #fff;}.miDanger{padding:6px 10px 6px 10px;color:#f16d75;border:1px solid #f16d75;border-radius: 2px;}.miDanger:hover{background-color:#f16d75;color: #fff;}
</style>
<script src="<?php echo base_url('assets/js/admin/accounts.js'); ?>"></script>
