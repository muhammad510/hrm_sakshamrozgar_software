var reportTeam='';let map;
$(document).ready(function()
{	
    let searchObj = {};
    reportTeam={printTable: function(search_data) { getpaginate(search_data, '#team_det', $('#team_det').attr("data-id"), 'Only For Team Name, Reporting manager.'); } }
    reportTeam.printTable(searchObj);
	$(".miKeyUp").keyup(function()
	{
		let actNbtn = $(this).attr('id');
		if((actNbtn=='gtEmpNmCode')||(actNbtn=='gtReptEmpNm'))
		{
			let visiTrgtID=(actNbtn=='gtEmpNmCode')?'#createTeamMember':'#createReportingMember';
			$(visiTrgtID).show();$(visiTrgtID+' ul').html('<li class="miPlease"><i class="fe fe-sun bx-spin"></i> Please wait...</li>');
			$.post($(this).attr('data-id'),{oprType:$('#'+actNbtn).val(),acType:actNbtn},function(htmlAmi){$(visiTrgtID+' ul').html(htmlAmi);});
			}
		});
});
$(function() 
 {
	$(document).unbind("click").on("click", '.getAction', function() 
	{
		let actNbtn = $(this).attr('data-id');
		let getData=actNbtn.split('===');	
		let target=$('#base_url').val()+getData[1];
		if(getData[0]=='setEmployee')
		{
			$.post(target,{id:getData[2]},function(htmlAmi)
			{
			 if(getData[3]=='temp'){$("#gtEmpNmID").val(htmlAmi.id);$('#gtEmpNmCode').val(htmlAmi.empName);$('#brNwName').html(htmlAmi.branch);$('#deptName').html(htmlAmi.department);$('#desigName').html(htmlAmi.desgination);}
			 else if(getData[3]=='assignRole'){$("#gtReptEmpID").val(htmlAmi.id);$('#gtReptEmpNm').val(htmlAmi.empName);}$('.mSrchPnl').hide();$('.mSrchPnl ul').html('<li>Er. Amit Kumar </li>');},'json');
			}	
			else if(getData[0]=='create')
			{
				let crID=$(this).attr('id');let txtDet='';let headID='';
				let empID='';$(this).html('<i class="fe fe-sun bx-spin"></i> Please wait...');
				if(getData[2]=='temp'){empID=$('#gtEmpNmID').val();txtDet='<i class="ti-save"></i> Add';headID='';}
				else if(getData[2]=='edit_team'){empID=$('#gtEmpNmID').val();headID=$('#gtReptEmpID').val();}
				else if(getData[2]=='reportting'){empID=$('#gtReptEmpID').val();txtDet='<i class="ti-save"></i> Assign Role';headID='';}
				else if(getData[2]=='upgrade'){empID=$('#gtReptEmpID').val();txtDet='<i class="ti-save"></i> Update';headID='';}else{empID='';headID='';}
				$.post(target,{oprType:getData[2],empID:empID,team_name:$('#teamReportingName').val(),headID:headID},function(htmlAmi)
				{
					if(getData[2]=='temp'){$('#gtEmpNmID,#gtEmpNmCode').val('');$('.mSpn').html('&nbsp;');if(htmlAmi.isCount=='1'){$('#tempAssign').html("");}$('#tempAssign').append(htmlAmi.lastEntry);}
					else if(getData[2]=='edit_team'){txtDet='<i class="ti-save"></i> Add';if(htmlAmi.isCount=='1'){$('#tempAssign').html("");}$('#tempAssign').append(htmlAmi.lastEntry);$('#gtEmpNmID,#gtEmpNmCode').val('');$('.mSpn').html('&nbsp;');}
					else if(getData[2]=='reportting'){if(htmlAmi.addClas=="tst_success"){setTimeout(function(){window.location.reload(1);},2500);}}
					$("#"+crID).html(txtDet);toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
					},'json');
				}
			else if(getData[0]=='miStatusView'){$.post(target,{id:getData[2],oprTyp:'remove'},function(htmlAmi){$('#remvMsg').html(htmlAmi.notify);$('#cnfRemoveEmp').attr('data-id',htmlAmi.cnfDelete);},'json');}	
			else if(getData[0]=='confDel')
			{
				$(this).html('<i class="fe fe-sun bx-spin"></i> Please wait...');
				$.post(target,{id:getData[2],oprTyp:'confirm',headID:$("#gtReptEmpID").val()},function(htmlAmi)
				{
					$('#cnfRemoveEmp').html('Confirm <i class="si si-check"></i>');
					if(htmlAmi.addClas=='tst_success')
					{
						let sum=0;
						$.each(htmlAmi.srCnt,function(index,value){sum=1+index;$("#serial-"+value).html(sum+'.');});
						if(sum==0)
						{
							 let loc=$('#base_url').val();
							 $("#tempAssign").html('<tr><th colspan="6" style="text-align:center;"><div style="color:#8a3b3b;text-transform:uppercase;font-weight:bold;">No data available in table</div><img src="'+loc+'uploads/addnewitem.svg"></th></tr>'); 
							}$("#delArv-"+getData[2]).remove();$('#trashTempEmployee').modal('hide');
						}
					else
					{
						$('#remvMsg').html(htmlAmi.notify).css("color","#ff4107");	
							}	
					},'json');
				}
			else if(getData[0]=='miTeamView')
			{
				$('#view'+getData[2]).html('<i class="fe fe-sun bx-spin"></i>');
				$.post(target,{id:getData[2],oprTyp:getData[0]},function(htmlAmi)
				{
					
					if(htmlAmi.addClas=='tst_success')
					{
						$('#view'+htmlAmi.id).html('<i class="ti-eye"></i>');
						$('#view_team_details').html(htmlAmi.teamData);
						 $('#all_team_list').hide();$('#view_team_details').show();
						}
						else{toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);}
					},'json');
				
			}
			else if(getData[0]=='miBack'){$('#view_team_details').hide();$('#all_team_list').show();}
			else if(getData[0]=='miBack_List')
			{
				let nTarget=actNbtn.replace("miBack_List===", "");
				$("#tempCreate").attr("data-id",nTarget+"temp");$("#assignRole").attr("data-id",nTarget+"reportting");
				$('#view_team_details,#createTeam').hide();$('#all_team_list,#amiResult').show();
				}
			else if(getData[0]=='create_team')
			{
				let nTarget=actNbtn.replace("create_team===", "");
				$("#tempCreate").attr("data-id",nTarget+"temp");$("#assignRole").attr("data-id",nTarget+"reportting");
				$('#view_team_details,#amiResult').hide();$('#createTeam,#all_team_list').show();
				}	
			else if(getData[0]=='miTeamEdt')
			{
				$('#editR'+getData[2]).html('<i class="fe fe-sun bx-spin"></i>');$("#assignRole").html('<i class="ti-save"></i> Update');
				$.post(target,{id:getData[2],oprTyp:getData[0]},function(htmlAmi)
				{
					$('#editR'+getData[2]).html('<i class="ti-pencil-alt"></i>');
					if(htmlAmi.addClas=='tst_success')
					{
						$("#tempCreate").attr("data-id",htmlAmi.editMember);$("#assignRole").attr("data-id",htmlAmi.assignRole).hide();
						$('#tempAssign').html(htmlAmi.teamData);
						$('#gtReptEmpNm').val(htmlAmi.headEmployee);$('#gtReptEmpID').val(htmlAmi.id);
						$('#teamReportingName').val(htmlAmi.team_name);
						$('#view_team_details,#amiResult').hide();$('#all_team_list,#createTeam').show();
						}
						else{toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);}
					},'json');
				}	
	});	
});		
	