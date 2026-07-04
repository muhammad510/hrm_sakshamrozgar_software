
var reportHolidays = '';
$(document).ready(function() {

    let searchObj = {};
    var target = $('#holiday').val();
    reportHolidays = { printTable: function(search_data) { getpaginate(search_data, '#holiday_list', target, 'Only For Id, Name.'); } }
    reportHolidays.printTable(searchObj);

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
				$('#cnfChanges').html('<i class="fe fe-settings bx-spin"></i> Please Wait').removeClass('btn-outline-secondary').addClass('btn-outline-primary');
				$.post(target,{oprType:getData[0],id:getData[2]},function(htmlAmi) 
				{
					$('#cnfChanges').html('Confirm <i class="si si-check"></i>').removeClass('btn-outline-primary').addClass('btn-outline-secondary');
					$("#arvs--"+getData[2]).addClass(htmlAmi.btnAdCls).removeClass(htmlAmi.btnRmvCls).html(htmlAmi.btnTxt);$('.actnData').html(htmlAmi.msg);
					$('#statusChange').delay(3000).modal('hide');
					},'json');
				
				}
	});
});



function add_holidays(id) {

    $.ajax({
        url: base_url + 'software/Holidays/add_holidays',
        type: "POST",
        data: {
            'id': id
        },
        success: function(data) {
            $('#add_holidays').html(data);
        },
    });

}

$('#add_holidays_data').submit(function(e) {

    // let base_url = $('#base_url').val();
    e.preventDefault();
    $.ajax({
        url: base_url + 'software/Holidays/add_holidays_data',
        type: "POST",
        type: "POST",
        data: $(this).serialize(),
        dataType: 'json',
        beforeSend: function() { $('#holidaydata').html('<i class="fe fe-settings bx-spin"></i> Please Wait'); },
        complete: function() { $('#holidaydata').html('<i class="ti-save"></i> Submit'); },
        success: function(htmlAmi) 
		{
			if(htmlAmi.msg.holiday_name){$('#holidyNm').html(htmlAmi.msg.holiday_name).fadeIn().delay(2000).fadeOut();}
		    if(htmlAmi.msg.holiday_date){$('#holidyDt').html(htmlAmi.msg.holiday_date).fadeIn().delay(2000).fadeOut();}
            if (htmlAmi.addClas == 'tst_success') {
                $('#holidyNm').html(htmlAmi.msg).css('color','green').fadeIn().delay(2000).fadeOut();
				setTimeout(function() { window.location.reload(1); }, 2500);
            }
        }
    });

});

function update_holiday(id) {

    $.ajax({
        url: base_url + 'software/Holidays/update_holidays',
        type: "POST",
        data: {
            'id': id
        },
        success: function(data) {
            $('#up_holidays').html(data);
        },
    });

}

$('#holidays_updata').submit(function(e) {

    // let base_url = $('#base_url').val();
    e.preventDefault();
    $.ajax({

        url: base_url + 'software/Holidays/update_holidays_data',
        type: "POST",
        data: $(this).serialize(),
        dataType: 'json',
        beforeSend: function() { $('#holidaysdataupdate').html('<i class="fe fe-settings bx-spin"></i> Please Wait'); },
        complete: function() { $('#holidaysdataupdate').html('<i class="ti-save"></i> Save Changes'); },
        success: function(htmlAmi) {
           /* toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
            if (htmlAmi.addClas == 'tst_success') {
                setTimeout(function() { window.location.reload(1); }, 2000);
            }*/
			if(htmlAmi.msg.holiday_name){$('#holidyNme').html(htmlAmi.msg.holiday_name).fadeIn().delay(2000).fadeOut();}
		    if(htmlAmi.msg.holiday_date){$('#holidyDte').html(htmlAmi.msg.holiday_date).fadeIn().delay(2000).fadeOut();}
            if (htmlAmi.addClas == 'tst_success') {
                $('#holidyNme').html(htmlAmi.msg).css('color','green').fadeIn().delay(2000).fadeOut();
				setTimeout(function() { window.location.reload(1); }, 2500);
            }
		

        }

    });

});