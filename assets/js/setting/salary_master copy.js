$(document).ready(function() {
    $('.setZeroInpt').val('0');
    $(".setZeroInpt").keyup(function() {
        let basicPer = 0;
        let basicHra = 0;
        let basicTa = 0;
        let basicDa = 0;
        let basicPa = 0;
        let basicBonus = 0;
        let basicMedicl = 0;
        let basicInsentvAmt = 0;
        let otherBsInc = 0;
        let grsSalAmt = parseFloat($('#grsSalAmt').val());
        let basicPayPercent = parseFloat($('#basicPayPercent').val());
        if ($('#basicPayPercent').val() == '') { basicPer = 0; } else { basicPer = basicPayPercent; }
        if ($('#hraPercent').val() == '') { basicHra = 0; } else { basicHra = parseFloat($('#hraPercent').val()); }
        if ($('#taPercent').val() == '') { basicTa = 0; } else { basicTa = parseFloat($('#taPercent').val()); }
        if ($('#daPercent').val() == '') { basicDa = 0; } else { basicDa = parseFloat($('#daPercent').val()); }
        if ($('#paPercent').val() == '') { basicPa = 0; } else { basicPa = parseFloat($('#paPercent').val()); }
        if ($('#bonusPayAmt').val() == '') { basicBonus = 0; } else { basicBonus = parseFloat($('#bonusPayAmt').val()); }
        if ($('#mediAllPercent').val() == '') { basicMedicl = 0; } else { basicMedicl = parseFloat($('#mediAllPercent').val()); }
        if ($('#basicInsentvAmt').val() == '') { basicInsentvAmt = 0; } else { basicInsentvAmt = parseFloat($('#basicInsentvAmt').val()); }
        if ($('#otherBsInc').val() == '') { otherBsInc = 0; } else { otherBsInc = parseFloat($('#otherBsInc').val()); }

        let basicPayAmt = grsSalAmt * (basicPer / 100);
        let basicHraAmt = grsSalAmt * (basicHra / 100);
        let basicTaAmt = grsSalAmt * (basicTa / 100);
        let basicDaAmt = grsSalAmt * (basicDa / 100);
        let basicPaAmt = grsSalAmt * (basicPa / 100);
        let mediAllPayAmt = grsSalAmt * (basicMedicl / 100);
        let netPayAmt = basicPayAmt + basicHraAmt + basicTaAmt + basicDaAmt + basicPaAmt + basicBonus + mediAllPayAmt + otherBsInc + basicInsentvAmt;

        let pfPercent = 0;
        let advancePayAmt = 0;
        let tdsPercent = 0;
        let insurancePayAmt = 0;
        let otherDedPayAmt = 0;
        if ($('#pfPercent').val() == '') { pfPercent = 0; } else { pfPercent = parseFloat($('#pfPercent').val()); }
        if ($('#advancePayAmt').val() == '') { advancePayAmt = 0; } else { advancePayAmt = parseFloat($('#advancePayAmt').val()); }
        if ($('#tdsPercent').val() == '') { tdsPercent = 0; } else { tdsPercent = parseFloat($('#tdsPercent').val()); }
        if ($('#insurancePayAmt').val() == '') { insurancePayAmt = 0; } else { insurancePayAmt = parseFloat($('#insurancePayAmt').val()); }
        if ($('#otherDedPayAmt').val() == '') { otherDedPayAmt = 0; } else { otherDedPayAmt = parseFloat($('#otherDedPayAmt').val()); }

        let pfPayAmt = basicPayAmt * (pfPercent / 100);
        let tdsPayAmt = grsSalAmt * (tdsPercent / 100);
        let netDeductionAmt = pfPayAmt + advancePayAmt + tdsPayAmt + insurancePayAmt + otherDedPayAmt
        let netPableAmt = netPayAmt - netDeductionAmt;

        $('#basicPayAmt').val(basicPayAmt);
        $('#hraPayAmt').val(basicHraAmt);
        $('#taPayAmt').val(basicTaAmt);
        $('#daPayAmt').val(basicDaAmt);
        $('#paPayAmt').val(basicPaAmt);
        $('#mediAllPayAmt').val(mediAllPayAmt);
        $('#pfPayAmt').val(pfPayAmt);
        $('#tdsPayAmt').val(tdsPayAmt);


        $('#netPayAmt').val(netPableAmt);
    });
});



/*############################################################################*/
var reportBranch = '';
$(document).ready(function() {

    let searchObj = {};
    var target = $('#target').val();
    reportBranch = { printTable: function(search_data) { getpaginate(search_data, '#branch_det', target, 'Only For Id, Name.'); } }
    reportBranch.printTable(searchObj);
    $(".srchPanel").click(function() { $("i", "#srchBtn").toggleClass("ti-search ti-minus");
        $("#searchBranchDetails").toggle(); });
    $(".miAction").click(function() {
        let actNbtn = $(this).attr('id');
        if (actNbtn == 'AddNew') {
            $("#target").val($('#adBtnActn').text());
            $("#vTbleShw,.miBck,#searchBranchDetails").hide();
            $("#vCreateNew").show();
            $("#mstrTitle").html($(this).attr('data-id'));
            $('.setZeroInpt,#grsSalAmt').val(0);
            $('#salaryManage').html('<i class="ti-save"></i> Submit');
            $("#designation,#brOffice").val('').trigger('change');
        } else if (actNbtn == 'miBck' || actNbtn == 'viewMiBck') {
            //$("#AddNew").hide();$("#miniMize").show();$(".miCln").val('');
            $("#vCreateNew,#getSalaryDet,#searchBranchDetails").hide();
            $("#vTbleShw,.miBck").show();
            $("#mstrTitle").html($(this).attr('data-id'));
            $("i", "#AddNew").addClass("ti-plus").removeClass("ti-minus");
            //$(".mIsCode").val($('#nCreateCode').text());
            //$("#locTrgt").val($('#adBtnActn').text());
        }
    });
    $("#branch_det,#statusChange").on("click", ".arvAction", function() {
        let actNbtn = $(this).attr('data-id');
        let actnstr = actNbtn.split('-');
        if (actnstr[0] == 'viewDetails' || actnstr[0] == 'editDetails') {
            let target = $('#base_url').val() + actnstr[1] + actnstr[0];
            $.post(target, { id: actnstr[2] }, function(htmlAmi) {
                if (htmlAmi.addClas != 'tst_danger') {
                    if (actnstr[0] == 'viewDetails') {
                        $('#vSalCode').html(htmlAmi.salary_code);
                        $('#vBrnOffice').html(htmlAmi.branch_name);
                        $('#vDesignation').html(htmlAmi.designation_name);
                        $('#vGrsAmt').html(htmlAmi.gross_sal_amt);
                        $('#vBasPay').html(htmlAmi.basic_pay);
                        $('#vHRAPay').html(htmlAmi.hraAmt);
                        $('#vTAPay').html(htmlAmi.taAmt);
                        $('#vDAPay').html(htmlAmi.daAmt);
                        $('#vPAPay').html(htmlAmi.paAmt);
                        $('#vBonusPay').html(htmlAmi.bonus);
                        $('#vMediAllPay').html(htmlAmi.mediAmt);
                        $('#vInstvPay').html(htmlAmi.incentive);
                        $('#vOthrIncPay').html(htmlAmi.other_inc);
                        $('#vTgrsPay').html(htmlAmi.tGrossEarning);
                        $('#vPfPay').html(htmlAmi.pfAmt);
                        $('#vAdvncPay').html(htmlAmi.advance_amt);
                        $('#vTdsPay').html(htmlAmi.tdsAmt);
                        $('#vInsurncPay').html(htmlAmi.insurance_amt);
                        $('#vOthrDeduPay').html(htmlAmi.other_deduction);
                        $('#tGrossDeduction').html(htmlAmi.tGrossDeduction);
                        $('#netPaybleSalAmt').html(htmlAmi.net_payble_amt);
                        $('#vTbleShw,.miBck,#searchBranchDetails').hide();
                        $('#getSalaryDet').show();


                    } else if (actnstr[0] == 'editDetails') {
                        //$('#add_salary_master').prop('id', 'edit_salary_master');
                        $('#target').val(htmlAmi.target);
                        $("#brOffice").select2('val', htmlAmi.branch_id);
                        $("#designation").select2('val', htmlAmi.desig_id);

                        $('#basicUpdtID').val(htmlAmi.id);
                        $('#grsSalAmt').val(htmlAmi.gross_sal_amt);
                        $('#basicPayAmt').val(htmlAmi.basic_pay);
                        $('#basicPayPercent').val(htmlAmi.basic_percent);
                        $('#hraPayAmt').val(htmlAmi.hraAmt);
                        $('#hraPercent').val(htmlAmi.hra_percent);
                        $('#taPercent').val(htmlAmi.ta_percent);
                        $('#taPayAmt').val(htmlAmi.taAmt);
                        $('#daPercent').val(htmlAmi.da_percent);
                        $('#daPayAmt').val(htmlAmi.daAmt);
                        $('#paPercent').val(htmlAmi.pa_percent);
                        $('#paPayAmt').val(htmlAmi.paAmt);
                        $('#basicInsentvAmt').val(htmlAmi.incentive);
                        $('#mediAllPercent').val(htmlAmi.medical_percent);
                        $('#mediAllPayAmt').val(htmlAmi.mediAmt);
                        $('#bonusPayAmt').val(htmlAmi.bonus);
                        $('#otherBsInc').val(htmlAmi.other_inc);
                        $('#pfPercent').val(htmlAmi.pf_percent);
                        $('#pfPayAmt').val(htmlAmi.pfAmt);
                        $('#advancePayAmt').val(htmlAmi.advance_amt);
                        $('#tdsPercent').val(htmlAmi.tds_percent);
                        $('#tdsPayAmt').val(htmlAmi.tdsAmt);
                        $('#insurancePayAmt').val(htmlAmi.insurance_amt);
                        $('#otherDedPayAmt').val(htmlAmi.other_deduction);


                        $('#netPayAmt').val(htmlAmi.net_payble_amt);
                        $('#vTbleShw,.miBck,#searchBranchDetails').hide();
                        $('#vCreateNew').show();
                        $('#salaryManage').html('<i class="ti-save"></i> Update');
                    }
                } else { toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon); }

            }, 'json');

        } else if (actnstr[0] == 'miStatusView') {
            let target = $('#base_url').val() + actnstr[1];
            $.post(target, { oprType: actnstr[0], id: actnstr[2] }, function(htmlAmi) { $('.actnData').html(htmlAmi.msg);
                $('#cnfChanges').attr('data-id', htmlAmi.action); }, 'json');
        } else if (actnstr[0] == 'miStatusChange') {
            let target = $('#base_url').val() + actnstr[1];
            $('#cnfChanges').html('<i class="fe fe-settings bx-spin"></i> Please Wait').removeClass('btn-outline-secondary').addClass('btn-outline-primary');
            $.post(target, { oprType: actnstr[0], id: actnstr[2] }, function(htmlAmi) {
                $('#cnfChanges').html('Confirm <i class="si si-check"></i>').removeClass('btn-outline-primary').addClass('btn-outline-secondary');
                $("#arvs--" + actnstr[2]).addClass(htmlAmi.btnAdCls).removeClass(htmlAmi.btnRmvCls).html(htmlAmi.btnTxt);
                $('.actnData').html(htmlAmi.msg);
                $('#statusChange').delay(3000).modal('hide');
            }, 'json');

        }
    });

});


/*$(function() 
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

});*/


















$('#add_salary_master').submit(function(e) {

    let target = $('#base_url').val() + $('#target').val();
    e.preventDefault();
    $.ajax({
        url: target,
        type: "POST",
        data: $(this).serialize(),
        dataType: 'json',
        beforeSend: function() { $('#salaryManage').html('<i class="fe fe-settings bx-spin"></i> Please Wait'); },
        complete: function() { $('#salaryManage').html('<i class="ti-save"></i> Submit'); },
        success: function(htmlAmi) {
            toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
            if (htmlAmi.addClas == 'tst_success') {
                setTimeout(function() { window.location.reload(1); }, 2000);
            }
        }
    });

});

/*

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

            toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
            if (htmlAmi.addClas == 'tst_success') {
                setTimeout(function() { window.location.reload(1); }, 2000);
            }

        }

    });

});*/