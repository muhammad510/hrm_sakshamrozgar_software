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
.miSlwdth{ width:92.1%;}
	@media (min-width:1400px) and (max-width:2100px){
	.miSlwdth{ width:95.1%;}
	}
	</style>


	<!-- Row -->
	<div class="row row-sm">
		<div class="cardTtl">
			<div class="miHeader">
				<span class="miLst"><i class="si si-briefcase"></i><span id="bxTitleNm"><?php echo $title;?></span></span>
				<span class="miBck">
                	<a href="<?php echo base_url('staff/dashboard');?>" style="margin-left:-5px;" title="Back to dashbiard" class="miDefault">
                    	<i class="fe fe-arrow-left"></i>
                    </a>
                </span>
			</div>
			<div class="col-md-12 col-lg-12">
             <div id="amAccAllChanges">
           		<form method="post" id="payout_generate" data-id="<?php echo base_url("admin/ledger/payout_monthly/generate");?>"> 	     		
                	<div class="row">
                    <div class="col-md-6">
                        <label>Month : <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-grid"></i></span>
                            </div>
							<div class="miSlwdth"> 
							    <select class="form-control select2-with-search" name="month" id="month">
								   <option value=""> --- Select One --- </option>
								    <?php  $monthName=array('January','February','March','April','May','June','July','August','September','October','November','December');
										   foreach($monthName as $nme){$selected=(date('F',strtotime(date('y-m-d')))==$nme)?'selected="selected"':'';
										   ?>
										<option value="<?php print_r(date('m',strtotime($nme)));?>" <?php echo $selected; ?> ><?php print_r($nme);?></option>
										<?php };?>
								</select> 
							</div>  
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Year: <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-grid"></i></span>
                            </div>
							<div class="miSlwdth"> 
							    <select class="form-control select2-with-search arvOnChange" name="year" id="year">
								   <option value=""> --- Select One --- </option>
								    <?php $salYear=date('Y');for($x=0;$x<5;$x++){$session=$salYear-$x;?>
                                        <option value="<?php echo $session;?>" <?php if($session==date('Y')){echo 'selected="selected"';}?>  ><?php echo $session;?></option>
                                        <?php }?>
								</select> 
							</div>  
                        </div>
                    </div>  
                    <div class="col-md-12">
                        <label>Transaction Password: <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-key"></i></span>
                            </div>
                            <input type="password" class="form-control" name="tnxPassword" id="tnxPassword">
                        </div>
                    </div>
                    <div class="col-md-12">
                         <a href="<?php echo base_url('staff/dashboard');?>"  class="btn ripple btn-outline-dark"><i class="fe fe-arrow-left"></i> Back</a>
                         <button type="submit" class="btn ripple btn-outline-success pull-right" id="manageAction"><i class="ti-save"></i> Submit</button>
                    </div>
                </div>
                </form>
            </div>
            
            
		</div>
	</div>
	<!-- End Row -->
</div>
<script>
$('#payout_generate').submit(function(e) {
    let target = $(this).attr('data-id');
    e.preventDefault();
    $.ajax({
        url: target,
        type: "POST",
        data: $(this).serialize(),
        dataType: 'json',
        beforeSend: function() { $('#manageAction').html('<i class="fe fe-sun bx-spin"></i> Please Wait'); },
        complete: function() { $('#manageAction').html('<i class="ti-save"></i> Submit'); },
        success: function(htmlAmi)
		{
		    toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
        }
    });
});
</script>
