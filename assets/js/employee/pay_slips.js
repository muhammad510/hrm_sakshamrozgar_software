/******************************************For Pagination ************************************************/
function get_search(tbactn, frmId, tbstorage) {

    $(frmId).submit(function(e) {

        e.preventDefault();
        $(tbstorage).DataTable().clear().destroy();
        let search = $(frmId).serializeArray();
        let searchObj = {};
        $.each(search, function(i, row) { searchObj[row.name] = row.value; });
        tbactn.printTable(searchObj);
        $('html,body').animate({ scrollTop: $(tbstorage).offset().top }, 'slow');

    });

}

function getpaginate(search_data, id, page, plchldr) //id,page,placehldr
{

    var base_url = $('#base_url').val(); //"responsive": true,
    $(id).DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "bDestroy": true,
        'columnDefs': [{ 'targets': [1, 2, 3], 'orderable': true }],
        "ajax": { "url": base_url + page, "type": "POST", "dataSrc": "data", "data": search_data },
        language: { searchPlaceholder: plchldr },
        // dom: 'Bfrtip',
        dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        "lengthMenu": [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        "buttons": ["excel", "pdf", "print"]
    });

}

function isCheck(str){ var inputBx = $('#' + str).val(); if(inputBx==""){ return '';} else {return inputBx;}}
function toastMultiShow(adCls, msg, icon){
    let valid = '';
    let myClass = "tst_success tst_warning tst_danger";
    let restCls = myClass.replace(adCls, " ");
    let addonMsg = '';
    $.each(msg, function(i, item) { valid += '<li>' + item + '</li>'; });
    $('.tst_danger') /*.addClass('ts_dan')*/ ;
    $('.tst_warning').addClass('ts_war');
    if (adCls == 'tst_success') { addonMsg = icon + ' <ul>' + valid + '</ul>'; } else if (adCls == 'tst_danger') { addonMsg = icon + ' <ul>' + valid + '</ul>'; } else if (adCls == 'tst_warning') { addonMsg = icon + ' <ul>' + valid + '</ul>'; }
    $('.ami_toast').css('visibility', 'visible').html(addonMsg).addClass(adCls).removeClass(restCls);
    setTimeout(function() { $('.ami_toast').css('visibility', 'hidden') }, 2000);}
function isNull(str){ let inputBx = $('#' + str).val(); if (inputBx == "") { $('#' + str).addClass('parsley-error').removeClass('parsley-success').focus(); } else { $('#' + str).addClass('parsley-success').removeClass('parsley-error').focus(); } }
function isError(str, id){ if (str == "1") { $('#' + id).addClass('parsley-error').removeClass('parsley-success parsley-warning').focus(); } else if (str == "2") { $('#' + id).addClass('parsley-warning').removeClass('parsley-success parsley-error').focus(); } else { $('#' + id).addClass('parsley-success').removeClass('parsley-error parsley-warning').focus(); } }
function btnOutClass(crntCls, crntBtn){
    let myClass = "btn-outline-primary btn-outline-secondary btn-outline-light btn-outline-dark btn-outline-success btn-outline-danger btn-outline-info btn-outline-warning";
    let restCls = myClass.replace(crntCls, " ");
    $('#' + crntBtn).addClass(crntCls).removeClass(restCls);}

/************************************@mi Start********************************************/
var reportAppearance = '';
var miUrl = $('#base_url').val();
$(document).ready(function(){
						   
						   

    let searchObj = {};
    var target = $('#target').val();
    reportAppearance={printTable: function(search_data) { getpaginate(search_data, '#reportAppearance', target, 'Only For Tnx id, Month.'); } }
    reportAppearance.printTable(searchObj);
					   
   $("#reportAppearance").on("click", ".arvActn", function()
  {
    let arAction=$(this).attr('data-id');
		//alert(arAction);
	/*if(actNbtn=='miPrintReports')
	{
			 //let uriActn=$('#uriPrintActn').text();
			 let uriActn=$('#uriActn').text();
			 $('#'+actNbtn).html('<i class="bx bx-cog bx-spin"></i> Please Wait...').removeClass('btn-outline-dark').addClass('btn-outline-warning');
			 $.post(uriActn,{miCode:$('#miCode').val(),miActn:actNbtn},
			 function(htmlAmi)
			 {
				
				$('#'+actNbtn).html('<i class="bx bx-printer"></i> Print ').removeClass('btn-outline-warning').addClass('btn-outline-dark');
				var frame1 = $('<iframe />');
					frame1[0].name = "frame1";
					frame1.css({ "position": "absolute", "top": "-1000000px" });
					$("body").append(frame1);
					var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
					frameDoc.document.open();
					frameDoc.document.write(htmlAmi);
					frameDoc.document.close();
					setTimeout(function(){ window.frames["frame1"].focus();window.frames["frame1"].print();frame1.remove();},500);
				});
			}*/
  });					   
						   
  /*
  
  $(".arvChange").change(function()
	{
       let arAction=$(this).attr('id');
	   if(arAction=='yrWise')
	  {
		   $('.dtClean').val(''); 
	  	}
  });*/
  
  
});





/************************************@mi End********************************************/



















