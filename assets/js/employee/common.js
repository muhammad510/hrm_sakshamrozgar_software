  $('#changePassword').submit(function(e) {
	let target = $('#base_url').val()+"staff/profile/reset_password";
	e.preventDefault();
	$.ajax({url:target,type: "POST",data:$(this).serialize(),dataType: 'json',
			beforeSend: function() { $('#svChngePassword').html('<i class="fe fe-settings bx-spin"></i> Please Wait'); },
			complete: function() { $('#svChngePassword').html('<i class="ti-save"></i> Save changes'); },
			success: function(htmlAmi)
			{
				if(htmlAmi.addClas=='tst_success')
				{
				   $('#miRsltMessage').html(htmlAmi.msg).fadeIn();
					setTimeout(function(){window.location.reload(1);},3000);
					}
				else if(htmlAmi.addClas=='tst_warning'){$('#miRsltMessage').html(htmlAmi.msg).fadeIn()/*.fadeOut(4000)*/;}	
				else
				{
					if(htmlAmi.msg.prePass!=""){$('#ppass').html(htmlAmi.msg.prePass).fadeIn().fadeOut(4000);}
					if(htmlAmi.msg.newPass!=""){$('#nwPass').html(htmlAmi.msg.newPass).fadeIn().fadeOut(4000);}
					if(htmlAmi.msg.cnfPass!=""){$('#cnf_pass').html(htmlAmi.msg.cnfPass).fadeIn().fadeOut(4000);}
					}	
		}
	});

}); 
	