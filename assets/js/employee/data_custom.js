/******************************************For Pagination ************************************************/
function isCheck(str){ var inputBx = $('#' + str).val(); if(inputBx==""){ return '';} else {return inputBx;}}
function toastMultiShow(adCls, msg, icon){
    let valid = "";
    let myClass = "tst_success tst_warning tst_danger tst_default";
    let restCls = myClass.replace(adCls, " ");
    let addonMsg = "";
    $.each(msg, function(i, item) { valid += "<li>" + item + "</li>"; });
    $(".tst_danger") /*.addClass("ts_dan")*/ ;
    $(".tst_warning").addClass("ts_war");
    if (adCls == "tst_success") { addonMsg = icon + " <ul>" + valid + "</ul>"; } else if (adCls == "tst_danger") { addonMsg = icon + " <ul>" + valid + "</ul>"; } else if (adCls == "tst_warning") { addonMsg = icon + " <ul>" + valid + "</ul>"; }else{ addonMsg = icon + " <ul>" + valid + "</ul>"; }
    $(".ami_toast").css("visibility", "visible").html(addonMsg).addClass(adCls).removeClass(restCls);
    setTimeout(function() { $(".ami_toast").css("visibility", "hidden") }, 2000);
	}
function isNull(str){ let inputBx = $('#' + str).val(); if (inputBx == "") { $('#' + str).addClass('parsley-error').removeClass('parsley-success').focus(); } else { $('#' + str).addClass('parsley-success').removeClass('parsley-error').focus(); } }
function isError(str, id){ if (str == "1") { $('#' + id).addClass('parsley-error').removeClass('parsley-success parsley-warning').focus(); } else if (str == "2") { $('#' + id).addClass('parsley-warning').removeClass('parsley-success parsley-error').focus(); } else { $('#' + id).addClass('parsley-success').removeClass('parsley-error parsley-warning').focus(); } }
function btnOutClass(crntCls, crntBtn){
    let myClass = "btn-outline-primary btn-outline-secondary btn-outline-light btn-outline-dark btn-outline-success btn-outline-danger btn-outline-info btn-outline-warning";
    let restCls = myClass.replace(crntCls, " ");
    $('#' + crntBtn).addClass(crntCls).removeClass(restCls);}

/************************************@mi Start********************************************/
function startTime() {
  const today = new Date();
  let h = today.getHours();
  let m = today.getMinutes();
  let s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('miClock').innerHTML =  h + ":" + m + ":" + s;
  setTimeout(startTime, 1000);
}
function checkTime(i){if(i< 10) {i="0"+i};return i;}

var miUrl = $('#base_url').val();
$(document).ready(function(){
						   
						   

				   
						   
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





/************************************@mi End********************************************/

 


















