<?php 
$current_time=time();
if($isRaised)
{
  if($isRaised->lastReplied)
  {
		$reply_time = strtotime($isRaised->lastReplied);
		$time_diff = $current_time - $reply_time;
		if ($time_diff < 3600){$lstReply=floor($time_diff / 60) . " minutes ago";} 
		elseif($time_diff < 86400){$lstReply=floor($time_diff / 3600) . " hours ago";}
		elseif($time_diff < 172800){$lstReply="1 day ago";} 
		else{$lstReply=floor($time_diff / 86400) . " days ago";}
		}
		else{$lstReply="";}
	}
	else{$lstReply="";}
?>
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
.card .card-header .card-title::before {content:"";position:absolute;left:0px;padding:2px;height:30px;background:#6f42c1;}
.tickInfo{ display: flex;width: 100%;padding: 5px 0px 5px 0px;}
.ticInLft {width:40%;height:100%;}
.ticInRht {width:60%;height:100%; font-weight:700;}
.ticInRht span{ padding-left:8px;color: #7870d5;}
.ticInRht span.deflt{color:#171f48;}
.ticInRht span.priLow{ background: rgba(13, 205, 148, 0.25);color: #009367 !important;padding:3px 9px 3px 9px;font-size: 75%;margin-left: 8px;}
.ticInRht span.priHigh{ background: rgba(247, 40, 74, 0.25);color: #f7284a !important;padding:3px 9px 3px 9px;font-size: 75%;margin-left: 8px;}
.ticInRht span.priMedi{background:rgba(251, 197, 24, 0.25);color:#aa8100 !important;padding:3px 9px 3px 9px;font-size: 75%;margin-left: 8px;}
.ticStatus span.ticOpen,.ticInRht span.ticOpen{ background:var(--primary-bg-color) !important;color: #fff !important;padding:3px 9px 3px 9px;font-size: 75%;margin-left: 8px;border-radius: 3px;}
.ticStatus span.ticRslv,.ticInRht span.ticRslv{ background:#19b159 !important;color: #fff !important;padding:3px 9px 3px 9px;font-size: 75%;margin-left: 8px;border-radius: 3px;}
.ticStatus span.ticPrgrs,.ticInRht span.ticPrgrs{ background:#009EFB !important;color: #fff !important;padding:3px 9px 3px 9px;font-size: 75%;margin-left: 8px;border-radius: 3px;}
.ticStatus span.ticClsd,.ticInRht span.ticClsd{ background:#f16d75 !important;color: #fff !important;padding:3px 9px 3px 9px;font-size: 75%;margin-left: 8px;border-radius: 3px;}
.subClr{ color:#263871;}#ticketConversion{max-height: 490px !important;overflow-y: scroll;-ms-overflow-style: none;scrollbar-width: none;margin-bottom: 25px; }
#ticketConversion::-webkit-scrollbar {display: none;}#quillEditor{min-height: 120px;}
input.form-control::file-selector-button{padding: 0.625rem .75rem !important;}
.miTicSts{ width:100%;}	#chatAgain{ margin-right:-5px; margin-left:10px;}
.delMsg {text-align: center;font-size: 20px;margin: 30px 0px 10px 0px;color: #595959;}
.actnData{text-align:center;margin:0px 0px 20px 0px;color:green;font-size:.8rem;}
</style>
<div class="row row-sm miBottom">
	

  <div class="col-xl-4 col-lg-12 col-md-12">
    <div class="card custom-card">
      <div class="card-header border-0">
        <h4 class="card-title">Ticket Details</h4>
      </div>
      <div class="card-body text-center item-user">
        <div class="profile-pic">
          <div class="profile-pic-img"> 
          		<span class="bg-success dots" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="online" aria-label="online"></span> 
                <img src="http://localhost/attendance/uploads/employee/3b52a2cdba8ad4bedf998462e4b4a7a9.png" class="rounded-circle" alt="user">
           </div>
          <a href="javascript:void(0);" class="text-dark">
        	  <h5 class="mt-3 mb-0 font-weight-semibold"><?php echo ($isRaised?$isRaised->tUser:'N/A'); ?></h5>
          </a> 
          <a href="javascript:void(0);" class="text-muted">
        	  <h6 class="mt-1 mb-0"><?php echo ($isRaised?$isRaised->designation:'N/A'); ?></h6>
          </a>
        </div>
      </div>
   <?php if($isRaised->status!="Closed"){?>   
     	<div class="col-lg-12 col-md-12">
      	<div style="margin:-10px 10px 15px 10px;">
     		 <a href="javascript:void(0);" class="btn ripple btn-light btn-block getAction" data-id="miTicketView===tickets/index/delete===<?php echo $isRaised->id;?>" data-bs-toggle="modal" data-bs-target="#trashTicket">Closed Ticket</a>
      	</div>
      </div>
   <?php }?>   
    </div>
    <div class="card custom-card">
      <div class="card-header border-0">
        <h4 class="card-title">Ticket Information</h4>
      </div>
        <div class="card-body">
            <div class="tickInfo"><div class="ticInLft">Ticket ID</div><div class="ticInRht">:<span class="deflt"><?php echo ($isRaised?$isRaised->tID:'N/A'); ?></span></div></div>
            <div class="tickInfo"><div class="ticInLft">Ticket User</div><div class="ticInRht">:<span class="deflt">User</span></div></div>
            <div class="tickInfo"><div class="ticInLft">Ticket Category</div><div class="ticInRht">:<span class="deflt"><?php echo ($isRaised?$isRaised->category:'N/A'); ?></span></div></div>
            <div class="tickInfo"><div class="ticInLft">Ticket Priority</div><div class="ticInRht">: <span class="<?php echo ($isRaised?$isRaised->priSts:''); ?>"><?php echo ($isRaised?$isRaised->priority:'N/A'); ?></span></div></div>
            <div class="tickInfo"><div class="ticInLft">Assigned To</div><div class="ticInRht">:<span class="deflt"><?php echo ($isRaised?$isRaised->tAssign:'N/A'); ?></span></div></div>
            <div class="tickInfo"><div class="ticInLft">Open Date</div><div class="ticInRht">:<span class="deflt"><?php echo ($isRaised?$isRaised->openDt:'N/A'); ?></span></div></div>
            <div class="tickInfo"><div class="ticInLft">Replied Date</div><div class="ticInRht">:<span class="deflt"><?php echo ($isRaised?$isRaised->lastReplied:'N/A'); ?></span></div></div>
            <div class="tickInfo"><div class="ticInLft">Status</div><div class="ticInRht">:<span class="<?php echo ($isRaised?$isRaised->ticSts:''); ?>"><?php echo ($isRaised?$isRaised->status:'N/A'); ?></span></div></div>
        </div>
     
    </div>
  </div>
  <div class="col-xl-8 col-lg-12 col-md-12">
     <?php //print_r($isRaised);?>
    <div class="card custom-card">
        <div class="card-header justify-content-between border-0 ticStatus">
            <div> 
                <h4 class="card-title mb-1 fs-22"><?php echo ($isRaised?$isRaised->subject:'N/A');/* print_r($isRaised->lastReplied);*/ ?></h4>
                <small class="fs-13"><i class="fe fe-clock text-muted me-1"></i>Last Updated on <span class="text-muted"><?php echo $lstReply; ?></span></small>
                <span class="<?php echo ($isRaised?$isRaised->ticSts:''); ?> fs-10 pull-right"><?php echo ($isRaised?$isRaised->status:'N/A'); ?></span>
             </div>
        </div>
        <div class="card-body">
            <p class="mg-b-0 subClr"><?php echo ($isRaised?$isRaised->description:'N/A'); ?></p>
        </div>
    </div>
   <?php  if($isRaised->status!="Closed"){?>
     <form  method="post" id="createTick" data-id="<?php echo $isReplied;?>" enctype="multipart/form-data">
     <input id="ticID" name="ticID" type="hidden" value="<?php echo ($isRaised?$isRaised->id:''); ?>">
      <input id="ticComment" name="ticComment" type="hidden">
 		   <div class="card custom-card">
      <div class="card-header border-0">
        <h4 class="card-title">Reply Ticket</h4>
      </div>
      <div class="card-body pt-3 pb-2">
          <div class="form-group mt-3">
            <div class="row row-sm">
              <div class="col-sm-12 col-xl-12">
                 <div id="quillEditor"></div>
              </div>
            </div>
          </div>
          <div class="row row-sm">
            <div class="col-lg-12 form-group " style="margin-top:45px;">
                <label class="form-label">Upload Image : </label>
                <input class="form-control" type="file" id="chtFile" name="chtFile">
            </div>
            <div class="col-lg-12">
               <div class="form-group">
                <div class="row align-items-center">
                  <label class="form-label">Status</label>
                  <div class="miTicSts">
                    <select class="form-control select  select2-with-search" id="ticStatus" name="ticStatus">
                    <option value="">Select</option>
                  <?php if($isRaised->created_by!=$this->logID){?>
                    <option value="Open" <?php if($isRaised->status=="Open"){ echo 'selected="selected"';}?>>Open</option>
                    <option value="In Progress" <?php if($isRaised->status=="In Progress"){ echo 'selected="selected"';}?>>In Progress</option>
                    <option value="Resolved" <?php if($isRaised->status=="Resolved"){ echo 'selected="selected"';}?>>Resolved</option>
                    <?php }?>
                    <option value="Closed" <?php if($isRaised->status=="Closed"){ echo 'selected="selected"';}?>>Closed</option>
                  </select>
                </div>  
                </div>
              </div>
            </div>
        </div>
      </div>
      <div class="card-footer d-sm-flex rounded-0">
        <div class="btn-list ms-auto">
        <button class="btn ripple btn-outline-success pull-right amiStl" id="chatAgain" type="submit"> <i class="ti-save"></i> Submit Reply </button>
       		 <a class="btn ripple btn-outline-dark pull-right amiStl getAction" href="<?php echo base_url("tickets");?>"> <i class="ti-arrow-left"></i> Back </a>
        </div>
    </div>
     
    </div>  
     </form>
     <?php }?>
    <div class="card custom-card">
        <div class="card-header justify-content-between border-0">
            <div> <h4 class="card-title mb-1 fs-22">Conversions</h4></div>
        </div>
        <div class="main-chat-body">
       		 <div class="content-inner" id="ticketConversion">        
				<?php 
                   if($isConversation)
                   {   
                     foreach($isConversation as $dt)
                     {	                         
                        if($dt)
                        {
                          if($dt->created_date)
                          {
                                $conTime = strtotime($dt->created_date);
                                $time_diff = $current_time - $conTime;
                                if ($time_diff < 3600){$conReply=floor($time_diff / 60) . " minutes ago";} 
                                elseif($time_diff < 86400){$conReply=floor($time_diff / 3600) . " hours ago";}
                                elseif($time_diff < 172800){$conReply="1 day ago";} 
                                else{$conReply=floor($time_diff / 86400) . " days ago";}
                                $getTime=floor($time_diff/86400);
                                }
                                else{$conReply="";$getTime="";}
                            }
                            else{$conReply="";$getTime="";}                          
                            $isRepliedBy=($dt->staff_type=='Replied')?'flex-row-reverse':'';
						
                   ?>
   		    <label class="main-chat-time"><span><?php echo ($getTime <8)?$conReply:date("d/m/Y",strtotime($dt->created_date));?></span></label>
            <div class="media <?php echo $isRepliedBy;?>">
                <div class="main-img-user online"><img alt="avatar" src="<?php echo base_url($dt->image);?>"></div>
                <div class="media-body">
                    <div class="main-msg-wrapper">
                        <?php echo ($dt->comment?$dt->comment:'');?>
                    </div>
                     <?php if($dt->isfile){?>
                    <div class="pd-0"><img alt="avatar" class="wd-150 mb-1" src="<?php echo base_url($dt->isfile);?>"></div>
                    <?php }?>
                     <div><span><?php echo ($dt->created_date?date('H:i a',strtotime($dt->created_date)):'');?></span> <a href="javascript:void(0);"><i class="icon ion-android-more-horizontal"></i></a></div>
                </div>
            </div>
           <?php }}else{?><div class="alert alert-danger">There are no conversations happening here at the moment.</div><?php }?>
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



   <script src="<?php echo base_url('assets/plugins/quill/quill.min.js');?>"></script>
<script>
$(function()
{
	'use strict'
	var toolbarOptions = [[{'header': [1, 2, 3, 4, 5, 6, false]}],['bold', 'italic', 'underline', 'strike'],[{'list': 'ordered'}, {'list': 'bullet'}],['link', 'image', 'video']];
	var quill = new Quill('#quillEditor', {modules: {toolbar: toolbarOptions},theme: 'snow'});
	var toolbarInlineOptions = [['bold', 'italic', 'underline'],[{'header': 1}, {'header': 2}, 'blockquote'],['link', 'image', 'code-block'],];	
});

</script>	
<script src="<?php echo base_url('assets/js/setting/tickets.js'); ?>"></script>
