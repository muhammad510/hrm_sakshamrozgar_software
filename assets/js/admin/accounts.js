
var reportAccounts = '';
$(document).ready(function() {
    let searchObj = {};
    var target = $('#target').val();
    reportAccounts = { printTable: function(search_data) {getpaginate(search_data, '#reportAccounts', target, 'Only For Id, Name.'); } }
    reportAccounts.printTable(searchObj);
	$(".accountManage").click(function()
	{
		let actNbtn = $(this).attr('id');
		if(actNbtn=='accountSrch' || actNbtn=='bkSrch')
		{
			$("i", "#accountSrch").toggleClass("ti-search ti-minus");
	  		$("#searchLeaveDetails").toggle();
			}
			else if(actNbtn=='addNwAccDetails')
			{
	  			$('.ojArv').val("");$('#leaveNwiD').val($('#newAccID').text());
				$('#oprType').val('miAddNewDetails');
				$("i",'#addNwAccDetails').toggleClass("ti-plus ti-minus");
				$('#addNwAccDetails').attr('id','backToListShow');
				$("#searchLeaveDetails,#amiAccountList,#accountSrch").hide();
				$("#amAccAllChanges").show();$('#bxTitleNm').html('Add Fund');
				$('#manageAction').html('<i class="ti-save"></i> Submit').show();
				//$("#amAccAllChanges").html('You are here to change');
				}
				else if(actNbtn=='backToListShow' || actNbtn=="bkSrch_01")
				{
					$("i",'#backToListShow').toggleClass("ti-plus ti-minus");
					$('#backToListShow').attr('id','addNwAccDetails');$('#bxTitleNm').html('Account Manage');
					$("#amAccAllChanges").hide();$("#amiAccountList,#accountSrch").show();
					/*$("#amAccAllChanges").html('You are back to list manage');*/
					}
	});
});


$(function() 
 {
	$(document).on("click", '.getAction', function() 
	{
		let actNbtn = $(this).attr('data-id');
		let getData=actNbtn.split('===');		
		if(getData[0]=='miStatusView')
		{
			let target=$('#base_url').val()+getData[1];$.post(target,{oprType:getData[0],id:getData[2]},function(htmlAmi) 
			{$('.actnData').html(htmlAmi.msg);$('#cnfChanges').attr('data-id', htmlAmi.action);},'json');
			}
			else if(getData[0]=='miStatusChange')
			{
				let target=$('#base_url').val()+getData[1];
				$('#cnfChanges').html('<i class="fe fe-sun bx-spin"></i> Please Wait').removeClass('btn-outline-secondary').addClass('btn-outline-primary');
				$.post(target,{oprType:getData[0],id:getData[2]},function(htmlAmi) 
				{
					$('#cnfChanges').html('Confirm <i class="si si-check"></i>').removeClass('btn-outline-primary').addClass('btn-outline-secondary');
					$("#arvs--"+getData[2]).addClass(htmlAmi.btnAdCls).removeClass(htmlAmi.btnRmvCls).html(htmlAmi.btnTxt);$('.actnData').html(htmlAmi.msg);
					$('#statusChange').delay(3000).modal('hide');
					},'json');
				
				}
				else if(getData[0]=='miLvView' || getData[0]=="miLvEdt")
				{
					let target=$('#base_url').val()+getData[1];
					$.post(target,{oprType:getData[0],id:getData[2]},function(htmlAmi) 
			    	{
							//$('#bxTitleNm').html(htmlAmi);
						if(htmlAmi.addClas=="tst_success")
						{
							 
							 $('#oprType').val('miUpdateDetails');
							 $('#target').val(htmlAmi.id);
							 $('#leaveNwiD').val(htmlAmi.leaveID);
							 $('#leaveNwName').val(htmlAmi.leave_name);
							 $('#leaveNoDays').val(htmlAmi.leave_credit);
							 $("#leaveType").select2('val',htmlAmi.credit_type);
							 $("#lvDscription").val(htmlAmi.description);
							 
							 $("i",'#addNwAccDetails').toggleClass("ti-plus ti-minus");$('#addNwAccDetails').attr('id','backToListShow');
							 $("#searchLeaveDetails,#amiAccountList,#accountSrch").hide();$("#amAccAllChanges").show();
							if(getData[0]=="miLvView"){$('#manageAction').hide();$('#bxTitleNm').html('View Fund Detail');}
							else if(getData[0]=="miLvEdt"){$('#manageAction').html('<i class="ti-save"></i> Update').show();$('#bxTitleNm').html('Edit Fund Details');}
							
							}else{toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);}
							
							
							
						},'json');
					
					}
		
		
 	});

});
$('#add_fundDetails').submit(function(e) 
{  
   let target=$('#base_url').val()+$("#locTrgt").text();
   e.preventDefault();
    $.ajax({
        	 url: target,
        	 type: "POST",
        	 data: $(this).serialize(),
        	 dataType: 'json',
        	 beforeSend: function() { $('#manageAction').html('<i class="fe fe-sun bx-spin"></i> Please Wait'); },
        	 complete: function() { $('#manageAction').html('<i class="ti-save"></i> Submit'); },
        	 success: function(htmlAmi) {
              toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
              if (htmlAmi.addClas == 'tst_success') {
                setTimeout(function() { window.location.reload(1); }, 2000);
             }
        }
    });

});
