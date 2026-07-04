<style>

@media(min-width:1320px ) and (max-width: 1900px )
{
.mail_icon{ height: 25px !important;}
.btn-regin img{ margin-top:-5px !important;width:19px !important;}
.btn-offer img{ margin-top:-1px !important;width:20px !important;}
.btn-warn img{ margin-top:-2px !important;width:20px !important;}
.btn-promote img{ margin-top:-4px !important;width:18px !important;}
}
.miBtmPd {margin-bottom:15px;}
.cardPdBtm {margin-bottom:50px;}
.myRightEnd{ margin-right:0px !important;}
.mail_icon{ height: 30px;padding:3px;}
.mail_icon img{ width:22px; padding:2px;}
.btn-regin{ background-color:#C400524A;}
.btn-offer{ background-color:#006F1C4D;}
.btn-warn{ background-color:#A86E005C;}
.btn-promote{ background-color:#0645BD3D;}
.notifyMsg {font-size: 20px;margin: 30px 0px 10px 0px;}
.actnData {margin: 0px 0px 20px 0px;color: #716c6c;font-size: .8rem;}
.actnData i{background-color: #d7d7d7;padding: 5px;border-radius: 15px;color: #222020;font-size: .6rem;}
</style>

<style>
.ami_tHeader {background-color: #088 !important;}.ami_tHeader > tr >th {border: 1px solid #088 !important;color: #fff !important;padding-left: 5px !important;}
.table-responsive{min-height: 420px !important;}
.amtltip {position: relative;display: inline-block;cursor: pointer;/*  border-bottom: 1px dotted black;*/}
.amtltip .tlptext{visibility:hidden;width: 180px; background-color: rgba(0, 18, 19, 0.99);color: #fff; text-align: center;border-radius: 6px;padding: 10px 10px 10px 10px;position: absolute;z-index: 1;  bottom: 110%;  left: 50%;  margin-left: -50%;white-space: pre-wrap;white-space: -moz-pre-wrap;white-space: -pre-wrap;white-space: -o-pre-wrap;word-wrap: break-word;}.amtltip .tlptext::after {content: ""; position: absolute;top: 100%; left: 50%;margin-left: -5px;border-width: 5px; border-style: solid;border-color: rgba(0, 18, 19, 0.99) transparent transparent transparent;}.amtltip:hover .tlptext {visibility:visible;}
#perfrmView{display:none;}.timeDisplay{float: right;font-size: 11px; color:#7b7b7b;}
.memMessageList{background-color: #ECF2EF;padding:15px;border:1px solid #e1e1e1;border-radius: 5px;}.memMessageList h6{ color:#4F46B1;font-size: 1rem;}

#tchatList{margin: 10px 0px 10px 0px;padding: 10px;border: 1px solid #8080801f;}
.direct-chat-name{ font-weight:600;}.direct-chat-timestamp{ color: #7b6f6f;font-weight: lighter;font-size: 11px;padding-left: 5px;}
.direct-chat-text {border-radius: 5px;position: relative;padding: 5px 10px;background: #e8f7d4;border: 1px solid #e0f4c5;margin: 5px 0 0 50px;color: #444;}.direct-chat-msg::after {content: " ";display: table;}
.direct-chat-msg::after {clear: both;}::after, ::before {-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;}.direct-chat-warning .right > .direct-chat-text { background: #f39c12;border-color: #f39c12;color: #fff;}.right .direct-chat-text {margin-right: 50px;margin-left: 0;background-color: #eaeaea;border: 1px solid #e1e0e0;
}.direct-chat-info { display: block;margin-bottom: 2px;font-size: 12px;}.direct-chat-msg, .direct-chat-text { display: block;}.right .direct-chat-img {float: right;}.direct-chat-msg{ margin:10px !important; }
.direct-chat-img {border-radius: 50%;float: left;width: 40px;height: 40px;}
.myChatCon{ color: #009bbf;font-weight: 600;text-transform: uppercase;border-bottom: 1px solid #3003;padding: 5px 0px 5px 0px;}
.myChatCon span{ border:1px solid #009bbf;padding:7px 5px 4px 5px;}
.myChatCon i{color: white;padding: 8px;background-color: #009bbf;}
#chtConversion{height: 350px;overflow: auto;}
#writeConversion{}
.pstRemarks{color: #4636EE;font-weight: 700;background-color: #4636EE33;padding: 10px 10px 10px 10px;border: 1px solid #4636EE26;}
</style>

    
<!-- manageListing    cardPdBtm -->


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
    <div class="justify-content-center"> <a href="javascript:void(0);" id="showEmployee" class="btn btn-white btn-icon-text my-2 me-2"> <i class="fe fe-list"></i> <span id="toggleText">Show List</span> </a>  <a href="<?php echo base_url('admin/employee/create');?>" class="btn btn-white btn-icon-text my-2 me-2"> <i class="fe fe-plus"></i> Join Employee </a> <a href="<?php echo base_url('admin/employee/import');?>"  class="btn btn-white btn-icon-text my-2 me-2"> <i class="fe fe-download me-2"></i> Import </a> <a href="<?php echo base_url('auth/login/signout');?>" class="btn btn-danger btn-icon-text  my-2 me-2"> <i class="fe fe-power me-2"></i> Sign Out </a> </div>
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

<!-- ---------------------------------------------------------------------------------------------------------------  -->
<!-- Employee listing start to shwo from here. -->
<div class="row row-sm manageListing mb-5" id="listView" style="margin-top:0rem; display: none;">
        <div class="col-lg-12 col-md-12">
        <div class="card">
        <div class="card-header  border-0"> <h5 class="card-title">Active Employee</h5></div> 
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
    <input type="hidden" id="target" name="target" value="<?php echo $target;?>" />
<!-- Employee listing end from here.   showEmployee   manageGrid   manageListing -->
<div id="statusChange" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style=" padding-left: 0px;" aria-modal="true" role="dialog">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right;"><i class="si si-close"></i></button>
            <div class="delMsg"><i class="fe fe-sliders"></i> Active Employee</div>
                <div class="actnData"><i class="si si-power"></i>  Are you sure want to activate of Branch ID #F33333</div>
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
.miLvs{ padding:5px 12px 5px 12px;}.delMsg {text-align: center;font-size: 20px;margin: 30px 0px 10px 0px;color :#00805c;}.actnData {text-align: center;margin: 0px 0px 20px 0px;color: #716c6c;font-size: .8rem;}.delMsg i{ background-color: #00805c;padding: .5rem;font-size: .75rem;border-radius: .5rem;color: #fff;}
.form-control[readonly] { background-color: #fff !important;}	
	.mibdge{ padding:6px 0px 6px 0px;width:70px;}
	.ami_tHeader{background-color:#088;}
	.ami_tHeader >tr>th{ color:#fff;font-weight: 600;padding:13px 7px 13px 7px;}
	.miSuccess{padding:6px 10px 6px 10px;color:#19b159;border:1px solid #19b159;border-radius: 2px;}
	.miSuccess:hover{background-color:#19b159;color: #fff;}
	.miDefault{padding:6px 10px 6px 10px;color:#3b4863;border:1px solid #3b4863;border-radius: 2px;}
	.miDefault:hover{background-color:#3b4863;color: #fff;}
	.miDanger{padding:6px 10px 6px 10px;color:#f16d75;border:1px solid #f16d75;border-radius: 2px;}
	.miDanger:hover{background-color:#f16d75;color: #fff;}
</style>

<script>
$(function()
{
	$(document).on("click", '.getAction', function()
	{
		 let getAction=$(this).attr("data-id");
		 let getData = getAction.split('===');
		 if(getData[0]=="sendMail")
		 {	 
			  $(this).html('<i class="fe fe-sun bx-spin"></i> Please Wait');
			  let targetUrl=$('#base_url').val()+getData[1];
			  $.post(targetUrl,{id:getData[2],action:getData[3]},function(htmlAmi)
				{
					$("#sendMailActn").html('<i class="si si-envelope"></i> Send Mail');
					//$(".actnData").html(htmlAmi);
					$(".notifyMsg").css("color",htmlAmi.notfyHeadClr);
					$(".actnData").css("color",htmlAmi.notfyClr).html(htmlAmi.msg);
					$("#sendMailActn").attr("data-id",htmlAmi.sendMail);
					},'json');
			}
			else if(getData[0]=="alreadyMail")
		 	{
				$(".notifyMsg").css("color","#373737");
				$(".actnData").css("color","#393333").html("The mail has already been successfully sent.");
				}
		});
	$(document).on("click", '.mail_icon', function()
	{
		   let getAction=$(this).attr("data-id");
		   let getData = getAction.split('===');
		   if(getData[0]=="sendNotify")
		   {
		   		let targetUrl=$('#base_url').val()+getData[1];
				$.post(targetUrl,{id:getData[2],action:getData[3]},function(htmlAmi)
				{
					$(".notifyMsg").css("color",htmlAmi.nofyHeadClr);
					$(".actnData").css("color",htmlAmi.nofyClr).html(htmlAmi.msg);
					$("#sendMailActn").attr("data-id",htmlAmi.sendMail);		
					},'json');
				}
		});

	$(document).ready(function()
	{
	loadEmployees(1);



    function loadEmployees(page)
	{
        $.ajax({
            url: '<?php echo base_url("admin/employee/active_employees"); ?>',
            type: 'POST',
            data: {page: page},
            dataType: 'json',
            success: function(response) {
                var employees = response.employees;
                var totalRows = response.total_rows;
                var limit =response.limit;
                var totalPages = Math.ceil(totalRows / limit);
                var cardHtml = '';
                $.each(employees, function(i, employee)
				{
                   var emp={id:employee.id,action:'editDetails'};
				   var jsonString = JSON.stringify({ id: emp.id, action: emp.action });
					var base64String = btoa(jsonString);
					var targetEdit = response.url_edit+encodeURIComponent(base64String);//
					var mailSend="sendNotify===admin/employee/notify==="+emp.id;
				    cardHtml +='<div class="col-md-3 col-xl-3">';
                    cardHtml +='<div class="card miBtmPd"><div class="card-body"><div class="dropdown float-end"><a class="text-muted dropdown-toggle font-size-16" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">';
                    cardHtml +='<i class="bx bx-dots-horizontal-rounded"></i> </a><div class="dropdown-menu dropdown-menu-end"> <a class="dropdown-item" href="'+targetEdit+'"><i class="fe fe-edit-2"></i> Edit Profile</a>';
                    cardHtml +='<a class="dropdown-item" href="'+response.url_view+employee.id+'"><i class="fe fe-eye"></i> View Profile</a></div></div>';
                    cardHtml +='<div class="d-flex align-items-center"><div><img src="'+response.urlLoc+employee.image+'" alt="" class="avatar-md rounded-circle img-thumbnail"> </div>';
                    cardHtml +='<div class="flex-1 ms-3"><h5 class="font-size-16 mb-1"><a href="#" class="text-body">' + employee.emp_name + '</a></h5><span class="badge bg-success-subtle text-success mb-0">'+employee.designation_name+'</span> </div></div>';
                    cardHtml +='<div class="mt-3 pt-1"><p class="text-muted mb-0"><i class="mdi mdi-phone font-size-15 align-middle pe-2 text-dark"></i> '+employee.contact_no+'</p>';
                    cardHtml +='<p class="text-muted mb-0 mt-2"><i class="mdi mdi-email font-size-15 align-middle pe-2 text-dark"></i> '+employee.email+'</p>';
                    cardHtml +='<p class="text-muted mb-0 mt-2"><i class="mdi mdi-google-maps font-size-15 align-middle pe-2 text-dark"></i> '+employee.address+'</p></div><div class="d-flex gap-2 pt-4">';
                    cardHtml +='<a href="javascript:void(0)" class="btn ripple btn-offer btn-sm w-25 mail_icon"  data-bs-toggle="modal" data-bs-target="#sendNotifyDetails" title="Offer Letter" data-id="'+mailSend+'===offer">'
					cardHtml +='<img src="'+response.urlLoc+'assets/img/send_offer_letter.png"></a>'
					cardHtml +='<a href="javascript:void(0)" class="btn ripple btn-warn btn-sm w-25 mail_icon" data-bs-toggle="modal" data-bs-target="#sendNotifyDetails" title="Warning Letter" data-id="'+mailSend+'===warning">'
					cardHtml +='<img src="'+response.urlLoc+'assets/img/send_warning_letter.png"></a>'
					cardHtml +='<a href="javascript:void(0)" class="btn ripple btn-promote btn-sm w-25 mail_icon" data-bs-toggle="modal" data-bs-target="#sendNotifyDetails" title="Promotion Letter" data-id="'+mailSend+'===promote">'
					cardHtml +='<img src="'+response.urlLoc+'assets/img/send_promotion_letter.png"></a>'
                    cardHtml +='<a href="javascript:void(0)" class="btn btn-regin btn-sm w-25 mail_icon" data-bs-toggle="modal" data-bs-target="#sendNotifyDetails" title="Regination Letter" data-id="'+mailSend+'===depart">'
					cardHtml +='<img src="'+response.urlLoc+'assets/img/send_regination_letter.png"></a></div></div></div></div>';
                });
          
                var paginationHtml = '<div class="row row-sm"><div class="col-sm-12 col-md-5"><div  class="dataTables_info" role="status" aria-live="polite">Showing ' + ((page - 1) * limit + 1) + ' to ' + ((page * limit) > totalRows ? totalRows : (page * limit)) + ' of ' + totalRows + ' entries</div></div>';
                paginationHtml += '<div class="col-sm-12 col-md-7"><div class="float-sm-end myRightEnd"><ul class="pagination">';
                paginationHtml += '<li class="page-item prev-btn" data-page="' + (page - 1) + '"> <a href="javascript:void(0);" class="page-link"> Previous </a> </li>';
                for (var i = 1; i <= totalPages; i++) {paginationHtml += '<li class="page-item page-btn" id="arm'+i+'" data-page="' + i + '"> <a href="javascript:void(0);" class="page-link">' + i + '</a> </li>';}
                paginationHtml += '<li class="page-item next-btn" data-page="' + (page + 1) + '"> <a href="javascript:void(0);" class="page-link"> Next </a> </li>';
                paginationHtml += '</ul></div></div></div>';
                $('#employee-grid').html(cardHtml);
                $('#pagination').html(paginationHtml);
                $('.page-btn').each(function(){if($(this).data('page')===page){$(this).addClass('active');}else{$(this).removeClass('active');}});
                $('.page-btn').click(function() {var page = $(this).data('page'); loadEmployees(page);/*console.log('Current Active Page: ' + page);*/});
                $('.prev-btn').click(function() { var page = $(this).data('page'); if (page >= 1) { loadEmployees(page); }});
                $('.next-btn').click(function() { var page = $(this).data('page');if (page <= totalPages) { loadEmployees(page);}});
                if (page == 1) {$('.prev-btn').addClass('disabled');} else {$('.prev-btn').removeClass('disabled'); }
                if (page == totalPages) {$('.next-btn').addClass('disabled');} else {$('.next-btn').removeClass('disabled');}
            }
        });
    }
    
	loadListEmployees(1);

      function loadListEmployees(page)
	    {
        $.ajax({
            url: '<?php echo base_url("admin/employee/active_employees"); ?>',
            type: 'POST',
            data: {page: page},
            dataType: 'json',
            success: function(response) {
            var employees = response.employees;
            var totalRows = response.total_rows;
            var limit =response.limit;
            var totalPages = Math.ceil(totalRows / limit);
            var listHtml = '';
            $.each(employees, function(i, employee)
				  {
          var emp={id:employee.id,action:'editDetails'};
				  var jsonString = JSON.stringify({ id: emp.id, action: emp.action });
					var base64String = btoa(jsonString);
					var targetEdit = response.url_edit+encodeURIComponent(base64String);//
					var mailSend="sendNotify===admin/employee/notify==="+emp.id;
					listHtml +='<tr>';
          listHtml += '<th>' + (i + 1) + '. </th>';
          listHtml += '<td>' + 'EMP'+employee.employee_id + '</td>';
          listHtml += '<td>' + employee.emp_name + '</td>';
          listHtml += '<td>' + employee.contact_no + '</td>';
          listHtml += '<td>' + employee.email + '</td>';
          // listHtml += '<td><a href="javascript:void(0)" data-id="miStatusView===software/branch/manage===2" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-success getAction bgDng" id="arvs--2">Active</a></td>';
          listHtml += '<td><a href="javascript:void(0)" title="Click to Active" class="badge bg-success getAction bgDng" id="arvs--2">Active</a></td>';
					listHtml +='<td><div>';
					listHtml +='<a href="'+response.url_view+employee.id+'" title="Click to view details" class="btn ripple miView btn-sm getAction"><i class="ti-eye"></i></a>';
          listHtml +='<a href="'+targetEdit+'" style="margin-left:-13px;" title="Click to Update Details" class="btn ripple btn-secondary btn-sm edtPd getAction mx-2">';
					listHtml +='<i class="ti-pencil-alt"></i></a></div></td>';
					listHtml +='</tr>';
          });
          var paginationHtml = '<div class="row row-sm"><div class="col-sm-12 col-md-5"><div  class="dataTables_info" role="status" aria-live="polite">Showing ' + ((page - 1) * limit + 1) + ' to ' + ((page * limit) > totalRows ? totalRows : (page * limit)) + ' of ' + totalRows + ' entries</div></div>';
          paginationHtml += '<div class="col-sm-12 col-md-7"><div class="float-sm-end myRightEnd"><ul class="pagination">';
          paginationHtml += '<li class="page-item prev-btn" data-page="' + (page - 1) + '"> <a href="javascript:void(0);" class="page-link"> Previous </a> </li>';
          for (var i = 1; i <= totalPages; i++) {paginationHtml += '<li class="page-item page-btn" id="arm'+i+'" data-page="' + i + '"> <a href="javascript:void(0);" class="page-link">' + i + '</a> </li>';}
          paginationHtml += '<li class="page-item next-btn" data-page="' + (page + 1) + '"> <a href="javascript:void(0);" class="page-link"> Next </a> </li>';
          paginationHtml += '</ul></div></div></div>';
          $('#list_employee').html(listHtml);
          $('#listPagination').html(paginationHtml);
          $('.page-btn').each(function(){if($(this).data('page')===page){$(this).addClass('active');}else{$(this).removeClass('active');}});
          $('.page-btn').click(function() {var page = $(this).data('page'); loadListEmployees(page);/*console.log('Current Active Page: ' + page);*/});
          $('.prev-btn').click(function() { var page = $(this).data('page'); if (page >= 1) { loadListEmployees(page); }});
          $('.next-btn').click(function() { var page = $(this).data('page');if (page <= totalPages) { loadListEmployees(page);}});
          if (page == 1) {$('.prev-btn').addClass('disabled');} else {$('.prev-btn').removeClass('disabled'); }
          if (page == totalPages) {$('.next-btn').addClass('disabled');} else {$('.next-btn').removeClass('disabled');}
          }
        });
    }
	});
  	});

  

$(document).ready(function () {
      let isListActive = false;
      $('#showEmployee').on('click', function () 
	  {
	   $("i", "#showEmployee").toggleClass("fe-grid fe-list");
        isListActive = !isListActive;
        if (isListActive)
		{
          $('#listView').show();$('#gridView').hide();
          $('#toggleText').text('Grid View');
        } else {
          $('#listView').hide();
          $('#gridView').show();
          $('#toggleText').text('List View');
        }
      });
    });
  </script>



