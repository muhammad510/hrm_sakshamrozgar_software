

var reportDesignation = '';
$(document).ready(function() {

    let searchObj = {};
    var target = $('#designation').val();
    reportDesignation = { printTable: function(search_data) { getpaginate(search_data, '#designation_list', target, 'Only For Id, Name.'); } }
    reportDesignation.printTable(searchObj);

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






$('#add_designation_data').submit(function(e) {

    // let base_url = $('#base_url').val();
    e.preventDefault();
    $.ajax({
        url: base_url + 'software/designation/add_designation_data',
        type: "POST",
        data: $(this).serialize(),
        dataType: 'json',
        beforeSend: function() { $('#designationdata').html('<i class="fe fe-settings bx-spin"></i> Please Wait'); },
        complete: function() { $('#designationdata').html('<i class="ti-save"></i> Submit'); },
        success: function(htmlAmi) 
		{
           //console.log(htmlAmi);
		   if(htmlAmi.msg.department){$('#deptNm').html(htmlAmi.msg.department).fadeIn().delay(2000).fadeOut();}
		    if(htmlAmi.msg.designation){$('#desigNm').html(htmlAmi.msg.designation).fadeIn().delay(2000).fadeOut();}
		  
		  // toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
            if (htmlAmi.addClas == 'tst_success')
			{
                $('#deptNm').html(htmlAmi.msg).css('color','green').fadeIn().delay(2000).fadeOut();
				setTimeout(function() { window.location.reload(1); }, 2500);
            }
        }
    });

});

function update_designation(id) {

    $.ajax({
        url: base_url + 'software/Designation/update_designation',
        type: "POST",
        data: {
            'id': id
        },
        success: function(data) {
            $('#up_designation').html(data);
        },
    });

}

$('#designation_updata').submit(function(e) {

    // let base_url = $('#base_url').val();
    e.preventDefault();
    $.ajax({

        url: base_url + 'software/Designation/update_designation_data',
        type: "POST",
        data: $(this).serialize(),
        dataType: 'json',
        beforeSend: function() { $('#designationupddata').html('<i class="fe fe-settings bx-spin"></i> Please Wait'); },
        complete: function() { $('#designationupddata').html('<i class="ti-save"></i> Submit'); },
        success: function(htmlAmi) {
			if(htmlAmi.msg.department){$('#deptNme').html(htmlAmi.msg.department).fadeIn().delay(2000).fadeOut();}
		    if(htmlAmi.msg.designation){$('#desigNme').html(htmlAmi.msg.designation).fadeIn().delay(2000).fadeOut();}

            //toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
            if (htmlAmi.addClas == 'tst_success') {
                $('#deptNme').html(htmlAmi.msg).css('color','green').fadeIn().delay(2000).fadeOut();
				setTimeout(function() { window.location.reload(1); }, 2500);
            }

        }

    });

});