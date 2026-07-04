var reportAppearance='';

$(document).ready(function(){
						   
						   

    let searchObj = {};
    var target = $('#target').val();
    reportAppearance={printTable: function(search_data) { getpaginate(search_data, '#reportAppearance', target, 'Only For Id, Name.'); } }
    reportAppearance.printTable(searchObj);
					   
						   
						   
  $(".arvActn").click(function()
  {
    let arAction=$(this).attr('id');
	if(arAction=='mrkPresentIn' || arAction=='mrkPresentOut')
	{
		$('#'+arAction).addClass('arvWidth').html('<i class="fe fe-settings bx-spin"></i> Wait..');
		let arvTarget=$('#markPresent').text();
		$.post(arvTarget,{arAction:arAction,miClock:$('#miClock').text()},function(htmlAmi)
	    {	  
			 if(htmlAmi.arvResult=='tst_success')
			  {
					$('#'+arAction).prop('id','complete').removeClass(htmlAmi.rmvCls+' arvWidth').addClass(htmlAmi.adCls).html(htmlAmi.actBtnTxt);
					$('#'+htmlAmi.othrBtn).addClass(htmlAmi.rmvCls).removeClass(htmlAmi.adCls).html(htmlAmi.actBtnTxt);  	
				}
				 else
				 {
					 $('#'+arAction).removeClass('arvWidth').html(htmlAmi.actBtnTxt);
					 }
					 toastMultiShow(htmlAmi.arvResult,htmlAmi.msg, htmlAmi.icon);
				},'json');
		}
  });
  
  $(".arvChange").change(function()
	{
       let arAction=$(this).attr('id');
	   if(arAction=='yrWise')
	  {
		   $('.dtClean').val(''); 
	  	}
  });
  
  
});