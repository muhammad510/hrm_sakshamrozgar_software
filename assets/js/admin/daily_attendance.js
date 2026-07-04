var reportDAttendnce='';let map;
$(document).ready(function() {

   
   getAxisPosition();
   
   
   let searchObj = {};
    var target = $('#target').val();
    reportDAttendnce = { printTable: function(search_data) { getpaginate(search_data, '#daily_attendance_list', target, 'Only For Id, Name.'); } }
    reportDAttendnce.printTable(searchObj);
    $(".srchPanel").click(function() {
        $("i", "#srchBtn").toggleClass("ti-search ti-minus");
        $("#searchBranchDetails").toggle();
    });
});

function getAxisPosition(){if(navigator.geolocation){navigator.geolocation.getCurrentPosition(function(position){$('#getPosition').val(position.coords.latitude+","+position.coords.longitude);});}
else{$('#notifyMe').html('<i class="fe fe-settings bx-spin"></i> Geolocation is not supported by this browser.').removeClass(htmlAmi.removeCls).addClass(htmlAmi.addClas).fadeIn().delay(5000).fadeOut(800);}}


 $(function()
{
     $(document).unbind("click",'.ActnCmdByAmiPdf').on("click",'.ActnCmdByAmiPdf',function()
	{
		 let actNbtn=$(this).attr('id');
		 let uriActn=$(this).attr('data-id');
		 $.post(uriActn,{endDt:'confirm'},
		 function(htmlAmi)
		 {
			 	
				console.log(htmlAmi);
				
				
		/*	var frame1 = $('<iframe />');
				frame1[0].name = "frame1";
				$("body").append(frame1);
		var frameDoc=frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
				frameDoc.document.open();
				frameDoc.document.write(htmlAmi);
				frameDoc.document.close();
				setTimeout(function(){ window.frames["frame1"].focus();window.frames["frame1"].print();frame1.remove();},500);*/
			});
	});
});
  
  




function update_attendance(id) {
    //let acBtn=$(this).attr('id');alert(acBtn);
    $('#mkAt' + id).html('<i class="fe fe-sun bx-spin"></i>');
    $.ajax({
        url: base_url+'admin/attendance/update_attendance_status',
        type: "POST",
        data: { 'id': id },
        dataType: 'json',
        success: function(dataAmi) {
            if (dataAmi.id != "") {
                $('#amiResult').hide();
                $('#mkAttendance').show();
            }
            $('#mkAt' + id).html('<i class="ti-pencil-alt"></i>');
            $('#empNameAs').val(dataAmi.empNmWithID);
            $('#id').val(dataAmi.id);
            $('#atLogIn').val(dataAmi.loginDt);
			$('#atlogOut').val(dataAmi.logOutDt);
			if(dataAmi.attStatus){$("#attendance_status").select2('val', dataAmi.attStatus);}else{$("#attendance_status").select2('val','');}
        }
    });
}

$('#attendance_updata').submit(function(e)
{
	let markTarget=$(this).attr('data-id');
	e.preventDefault();
	$.ajax({url:markTarget,type: "POST",data: $(this).serialize(),dataType: 'json',
        beforeSend: function() { $('#attendancedataupdate').html('<i class="fe fe-settings bx-spin"></i> Please Wait'); },
        complete: function() { $('#attendancedataupdate').html('<i class="ti-save"></i> Save changes'); },
        success: function(htmlAmi) { $('#notifyMe').html(htmlAmi.icon + ' ' + htmlAmi.msg).removeClass(htmlAmi.removeCls).addClass(htmlAmi.addClas).fadeIn().delay(5000).fadeOut(800);
            if(htmlAmi.addClas=='alert-success'){setTimeout(function(){window.location.reload(1);},2000);}
			}
		});		
});
$(function() {
    $(document).on("click", '.getAction', function() {
        let actNbtn = $(this).attr('id');
        if(actNbtn=="bkSrch_01"){
            $("#mkAttendance").hide();
            $("#amiResult").show();
        }
		 let isCheckDt=$(this).attr('data-id');
		 let urtActn=isCheckDt.split('---');
		 if(urtActn[0]=='checkLogged')
		 {
			 $.post(base_url+urtActn[1],{id:urtActn[2],actnTyp:urtActn[3]},
					function(htmlAmi)
					{
						$('#attUser').html(htmlAmi.name);
						$('#log_history_list').html(htmlAmi.loggedHistory);
						$('#loggedDate').html('Working Date :: '+htmlAmi.loggeDate);
						$('#traceMap').html('Please wait..').css('text-align','center').hide();
						//console.log(htmlAmi);
						}, 'json');
			}
		else if(urtActn[0]=='traceUserLoc'){let target=base_url+urtActn[1];traceOutDetails(urtActn[2],target,urtActn[3]);}
		//else if(urtActn[0]=='reloadTraceLoc'){console.log('Reload page to load map');}
    });
});
function traceOutDetails(empID,resource,dtType)
{
	$.post(resource,{id:empID,dtType:dtType},function(htmlAmi)
	{
		//console.log(htmlAmi);
		if(htmlAmi.actnCls=='success')
		{
 			if(htmlAmi.inLoc!='unTrace')
			{
				if(map){map.remove();}
				$('#traceMap').removeClass('trcErr').addClass('trcSuccess').show();
				let inLoctnCordinate=htmlAmi.inLoc;let inCordnts=inLoctnCordinate.split(',');map = L.map('traceMap').setView([inCordnts[0],inCordnts[1]],8);
  				L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{attribution: '&copy; <a href="https://www.camwel.com">Camwel Solution</a> ',}).addTo(map);
		   		L.marker([inCordnts[0],inCordnts[1]]).addTo(map).bindPopup(htmlAmi.empInTime).openPopup();
				if(htmlAmi.outLoc!='unTrace'){let outLoctnCordinate=htmlAmi.outLoc;let outCordnts=outLoctnCordinate.split(',');L.marker([outCordnts[0],outCordnts[1]]).addTo(map).bindPopup(htmlAmi.empOutTime).openPopup();}
				}
			else{$('#traceMap').removeClass('trcSuccess').addClass('trcErr').html('<i class="si si-exclamation"></i> Unfortunately, there are no records available.').show();}	
			}
			else{$('#traceMap').removeClass('trcSuccess').addClass('trcErr').html(htmlAmi.msg).show();}
		},'json');
 }
