var reportTicket='';
$(document).ready(function()
{	
    let searchObj = {};
    reportTicket={printTable: function(search_data) { getpaginate(search_data, '#getReportTickets', $('#getReportTickets').attr("data-id"), 'Only For Team Name, Reporting manager.'); } }
    reportTicket.printTable(searchObj);
	$('#createTick').submit(function(e)
	{
		e.preventDefault();
		$('#chatAgain').html('<i class="fe fe-sun bx-spin"></i> Please Wait');
		let curTarget=$(this).attr("data-id");
		$.ajax({url:curTarget,type:'POST',data:new FormData(this),dataType:'json',contentType:false,processData:false,
				success:function(htmlAmi)
				{
					$('#chatAgain').html('<i class="ti-save"></i> Submit Reply');
					if(htmlAmi.addClas=='tst_success'){setTimeout(function(){window.location.href=htmlAmi.reloadLoc;},2000);}
					toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
					},
				error:function(){toastMultiShow('tst_danger',["An error occurred"],'<i class="fe fe-settings bx-spin"></i>');}
			});
		});
	});


$(function() 
{
	$(document).on("click", '.getAction', function() 
	{
		let actNbtn=$(this).attr('data-id');
		let getData=actNbtn.split('===');
		let target=$('#base_url').val()+getData[1];
		/*if(getData[0]=='create')
		{	
			$('#nCreate').html('<i class="fe fe-sun bx-spin"></i> Please Wait');
			$.post(target,{subject:$('#tickect_subject').val(),email:$('#tickect_email').val(),priority:$('#priority').val(),tiCat:$('#tiCat').val(),descript:$('.ql-editor').html()},function(htmlAmi)
			{
				if(htmlAmi.addClas=='tst_success'){setTimeout(function(){window.location.href=htmlAmi.reloadLoc;},2000);}
				toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
				$('#nCreate').html('<i class="ti-save"></i> Create Ticket');
				},'json');
		}
		else*/ if(getData[0]=='miTicketView'){$.post(target,{id:getData[2],oprTyp:'remove'},function(htmlAmi){$('#remvMsg').html(htmlAmi.notify);$('#cnfRemoveEmp').attr('data-id',htmlAmi.cnfDelete);},'json');}	
	    else if(getData[0]=='confDel')
		{
				$(this).html('<i class="fe fe-sun bx-spin"></i> Please wait...');
				$.post(target,{id:getData[2],oprTyp:'confirm'},function(htmlAmi)
				{
					$('#cnfRemoveEmp').html('Confirm <i class="si si-check"></i>');
					if(htmlAmi.addClas=='tst_success'){setTimeout(function(){window.location.href=htmlAmi.reloadLoc;},2000);}
					else{$('#remvMsg').html(htmlAmi.notify).css("color","#ff4107");}	
					},'json');
				}
		/*if(getData[0]=='chatAgain')
		{
			console.log(getData);	
			}*/
		});
});


var getComment = document.getElementById('quillEditor');
getComment.addEventListener('keyup', function()
{
	$("#ticComment").val($('.ql-editor').html());
	
	//ticComment.textContent = inputBox.value;  
});