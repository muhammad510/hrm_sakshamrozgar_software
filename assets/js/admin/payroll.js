var reportExpns = '';

$(document).ready(function() {
    let searchObj = {};
    var target = $('#target').val();
    reportExpns = { printTable: function(search_data) { getpaginate(search_data, '#getReportMiDetails', target, 'Only For Id, Name.'); } }
    reportExpns.printTable(searchObj);
    $(".srchPanel").click(function() {
        $("i", "#srchBtn").toggleClass("ti-search ti-minus");
        $("#searchPayrolDetails").toggle();
    });

    $("#getReportMiDetails").on("click", ".arvAction", function() {
        let actNbtn = $(this).attr('data-id');
        let getData = actNbtn.split('===');
        if (getData[0] == 'viewDetails') {
            let targetUrl = $('#base_url').val() + getData[1];
            $('#vw0' + getData[2]).html('<i class="fe fe-sun bx-spin"></i>');
            $.post(targetUrl, { getWhere: getData[2] },
                function(htmlAmi) {
                    $('#vw0' + getData[2]).html('<i class="ti-eye"></i>');
                    $("#wrkngDy").html(htmlAmi.tTlPrsnt);

                    $("#bmShw").html(htmlAmi.branch_name);
                    $("#empNmShw").html(htmlAmi.name);
                    $(".payMnth").html(htmlAmi.pyMnth);
                    $("#empIdShw").html(htmlAmi.employee_id);
                    $("#empDesgShw").html(htmlAmi.designation_name);
                    $("#pyDate").html(htmlAmi.pyDt);
                    $("#empAcShw").html(htmlAmi.bank_account_no);
                    $("#empPanShw").html(htmlAmi.pan_nu);
                    $(".empSlAmtShw").html(htmlAmi.net_pay + "/-");
                    $("#slBasic").html(htmlAmi.slBasic);
                    $("#slHra").html(htmlAmi.slHra);
                    $("#slTa").html(htmlAmi.slTa);
                    $("#slDa").html(htmlAmi.slDa);
                    $("#slPa").html(htmlAmi.slPa);
                    $("#slBonus").html(htmlAmi.slBonus);
                    $("#slInsent").html(htmlAmi.slInsent);
                    $("#slOthrInc").html(htmlAmi.slOthrInc);
                    $("#slMedi").html(htmlAmi.slMedi);
                    $("#slGrsAmt").html(htmlAmi.slGrsAmt);
                    $("#slPf").html(htmlAmi.slPf);
                    $("#slAdv").html(htmlAmi.slAdv);
                    $("#slTds").html(htmlAmi.slTds);
                    $("#slInsur").html(htmlAmi.slInsur);
                    $("#slOthrDed").html(htmlAmi.slOthrDed);
                    $("#gDeduct").html(htmlAmi.slDeduct);
                    $("#empSalWord").html(htmlAmi.pay_in_word);


                    $("#vTbleShw").hide();
                    $("#mstrTitle").html('View Salary Slip');
                    $("#viewSalaryPaid").show();
                }, 'json');
        } else if (getData[0] == 'printSalSlip') {
            let targetUrl = $('#base_url').val() + getData[1];
            $('#pr0' + getData[2]).html('<i class="fe fe-sun bx-spin"></i>');
            $.post(targetUrl, { getWhere: getData[2] },
                function(htmlAmi) {
                    $('#pr0' + getData[2]).html('<i class="si si-printer"></i>');
                    var frame1 = $('<iframe />');
                    frame1[0].name = "frame1";
                    frame1.css({ "position": "absolute", "top": "-1000000px" });
                    $("body").append(frame1);
                    var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
                    frameDoc.document.open();
                    frameDoc.document.write(htmlAmi);
                    frameDoc.document.close();
                    setTimeout(function() {
                        window.frames["frame1"].focus();
                        window.frames["frame1"].print();
                        frame1.remove();
                    }, 500);
                });
        } else if (getData[0] == 'editDetails') {
            $('#upD0' + getData[2]).html('<i class="fe fe-sun bx-spin"></i>');
            let targetUrl = $('#base_url').val() + getData[1];
            $.post(targetUrl, { getWhere: getData[2] }, function(htmlAmi) {
                $('#upD0' + getData[2]).html('<i class="ti-pencil-alt"></i>');
                $("i", "#AddNew").addClass("ti-minus").removeClass("ti-plus");
                $("#vTbleShw,#searchPayrolDetails,.srchPanel,#expViewDetails").hide();
                $('#AddNew').attr('id', 'miBck');
                $("#vCreateNew,#employeeSetPyroll").show();
                $("#mstrTitle").html('Edit Payroll');
                $('#miAdMv').css('margin-right', '-10px');

                $("#empSrchdID").val(htmlAmi.emp_id);
                $("#fieldSrchIDorName").val(htmlAmi.name);
                $("#salaryMonth").html(htmlAmi.pyMnth);
                $("#salaryYear").html(htmlAmi.pyYear);
                $("#empBasicSal").val(htmlAmi.slBasic);
                $("#empAdvance").val(htmlAmi.slAdv);
                $("#empHra").val(htmlAmi.slHra);
                $("#empTA").val(htmlAmi.slTa);
                $("#empDA").val(htmlAmi.slDa);
                $("#empPA").val(htmlAmi.slPa);
                $("#empBonus").val(htmlAmi.slBonus);
                $("#empMedical").val(htmlAmi.slMedi);
                $("#empInsentive").val(htmlAmi.slInsent);
                $("#empOthrInc").val(htmlAmi.slOthrInc);

                $("#empPF").val(htmlAmi.slPf);
                $("#empTDS").val(htmlAmi.slTds);
                $("#empInsurance").val(htmlAmi.slInsur);
                $("#empOthrDeduction").val(htmlAmi.slOthrDed);
                $("#empGrossSalary").val(htmlAmi.slGrsAmt);
                $("#empTotalPresent").val(htmlAmi.tTlPrsnt);
                $("#empNetSalary").val(htmlAmi.net_pay);
                $("input[name='paySalStatus'][value='" + htmlAmi.paid_status + "']").prop("checked", true);
                if (htmlAmi.paid_status != '1') { $("#aprSal").show(); } else { $("#aprSal").hide(); }
            }, 'json');


        }
    });

    $(".miAction").click(function() {
        let actNbtn = $(this).attr('id');
        let getSumary = $(this).attr('data-id');
        if (actNbtn == 'AddNew') {
            $("i", "#AddNew").addClass("ti-minus").removeClass("ti-plus");
            $("#vTbleShw,#searchPayrolDetails,.srchPanel,#expViewDetails").hide();
            $('#AddNew').attr('id', 'miBck');
            $("#vCreateNew").show();
            $("#mstrTitle").html(getSumary);
            $('#miAdMv').css('margin-right', '-10px');
        } else if (actNbtn == 'miBck' || actNbtn == 'viewMiBck') {
            $("#vTbleShw,.srchPanel").show();
            $('#miAdMv').css('margin-right', '10px');
            $('#miBck').attr('id', 'AddNew');
            $("i", "#AddNew").addClass("ti-plus").removeClass("ti-minus");
            //$("#mstrTitle").html('Employee Payroll list');
            $("#mstrTitle").html(getSumary);
            $("#vCreateNew,#searchPayrolDetails,#viewSalaryPaid,#expViewDetails,#employeeSetPyroll").hide();
        } else if (actNbtn == 'miSrchPyRl') {
            let target = $(this).attr('data-id');
            $('#' + actNbtn).html('<i class="fe fe-sun bx-spin"></i> Wait ...');
            $.post(target, { id: $('#empSrchdID').val(), salaryMonth: $('#salaryMonth').val(), salaryYear: $('#salaryYear').val() }, function(htmlAmi) {
                $('#' + actNbtn).html('<i class="ti-search"></i> Search');
                if (htmlAmi.addClas == 'tst_success') {
                    $('#employeeSetPyroll').show();
                    $('#empBasicSal').val(htmlAmi.basic_salary);
                    $('#empAdvance').val(htmlAmi.advance_amt);
                    $('#empHra').val(htmlAmi.hraAmt);
                    $('#empTA').val(htmlAmi.taAmt);
                    $('#empDA').val(htmlAmi.daAmt);
                    $('#empPA').val(htmlAmi.paAmt);
                    $('#empBonus').val(htmlAmi.bonus);
                    $('#empMedical').val(htmlAmi.mediAmt);
                    $('#empInsentive').val(htmlAmi.incentive);
                    $('#empOthrInc').val(htmlAmi.other_inc);
                    $('#empPF').val(htmlAmi.pfAmt);
                    $('#empTDS').val(htmlAmi.tdsAmt);
                    $('#empInsurance').val(htmlAmi.insurance_amt);
                    $('#empOthrDeduction').val(htmlAmi.other_deduction);
                    $('#empGrossSalary').val(htmlAmi.grossAmt);
                    $('#empTotalPresent').val(htmlAmi.totalPresent);
                    $('#empNetSalary').val(htmlAmi.net_salary);
                    $('#empUserId').val(htmlAmi.username);
                    $('html,body').animate({ scrollTop: $('#aprSal').offset().top }, 'slow');
                } else { toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon); }
                //$('#arResultShw').html(htmlAmi); 
                //$('#fieldSrchIDorName').val(htmlAmi.name);$('#empSrchdID').html(htmlAmi.id);
            }, 'json');

        } else if (actNbtn == 'clearDetails') {
            $('.miClr').val('');
            $('#salaryMonth,#salaryYear').val(' ').trigger("change");
        }
    });

    $(".miKeyUp").keyup(function() {
        let actNbtn = $(this).attr('id');
        if (actNbtn == 'fieldSrchIDorName') {
            let fldVal = $('#' + actNbtn).val();
            let target = $('#frSearchEmplyee').html();
            $('.mSrchPnl').show();
            $('.mSrchPnl ul').html('<li class="miPlease"><i class="fe fe-sun bx-spin"></i> Please wait...</li>');
            $.post(target, { oprType: $('#' + actNbtn).val() }, function(htmlAmi) { $('.mSrchPnl ul').html(htmlAmi); });
        }
    });

});


$('#manage_expense').submit(function(e) {
    let target = $('#adBtnActn').html();
    e.preventDefault();
    $.ajax({
        url: target,
        type: "POST",
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'json',
        beforeSend: function() { $('#manage').html('<i class="fe fe-sun bx-spin"></i> Please Wait'); },
        complete: function() { $('#manage').html('<i class="ti-save"></i> Submit'); },
        success: function(htmlAmi) {
            toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
            if (htmlAmi.addClas == 'tst_success') { setTimeout(function() { window.location.reload(1); }, 2000); }
        }
    });

});

$('#approvedNow').submit(function(e) {
    let target = $(this).attr('data-id');
    e.preventDefault();
    $.ajax({
        url: target,
        type: "POST",
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'json',
        beforeSend: function() { $('#aprSal').html('<i class="fe fe-sun bx-spin"></i> Please Wait'); },
        complete: function() { $('#aprSal').html('<i class="ti-save"></i> Submit'); },
        success: function(htmlAmi) {
            //$('#arResultShw').html(htmlAmi);
            toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
            if (htmlAmi.addClas == 'tst_success') { setTimeout(function() { window.location.reload(1); }, 2000); }
        }
    });

});


$(function() {
    $(document).on("click", '.getAction', function() {
        let actNbtn = $(this).attr('data-id');
        let getData = actNbtn.split('===');
        let target = $('#base_url').val() + getData[1];
        if (getData[0] == 'miDelTnxDet') {
            $.post(target, { oprType: getData[0], id: getData[2] }, function(htmlAmi) {
                $('.actnData').html(htmlAmi.msg);
                $('#cnfChanges').attr('data-id', htmlAmi.action);
            }, 'json');
        } else if (getData[0] == 'miConfirmDelTnxDet') {
            $('#cnfChanges').html('<i class="fe fe-sun bx-spin"></i> Please Wait').removeClass('btn-outline-secondary').addClass('btn-outline-primary');
            $.post(target, { oprType: getData[0], id: getData[2] }, function(htmlAmi) {
                $('.actnData').html(htmlAmi.msg);
                $('#cnfChanges').html('Confirm <i class="si si-check"></i>').removeClass('btn-outline-primary').addClass('btn-outline-secondary');
                if (htmlAmi.tnxResult == 'success') { setTimeout(function() { window.location.reload(1); }, 2000); }
            }, 'json');

        } else if (getData[0] == 'miExpDetView') {
            $('#arvVeiws--' + getData[2]).html('<i class="fe fe-sun bx-spin"></i>');
            $.post(target, { id: getData[2] }, function(htmlAmi) {
                if (htmlAmi.addClas == 'tst_success') {
                    //$('#arResultShow').html(htmlAmi);
                    $('#vCreateNew,#vTbleShw,.srchPanel').hide();
                    $('#expViewDetails').show();
                    $("#mstrTitle").html('View Expense Details');
                    $("i", "#AddNew").addClass("ti-minus").removeClass("ti-plus");
                    $('#AddNew').attr('id', 'miBck');
                    $('#lftSdDetTnx').html(htmlAmi.empWithApr);
                    $('#tnxInfo').html(htmlAmi.tnxInfo);


                    if (htmlAmi.status == 'Approved' || htmlAmi.status == 'Reject') { $('#aprBtn,#exStsD').hide(); } else {
                        $('#exStsD').show();
                        if ((htmlAmi.usrType != '5') && (htmlAmi.usrType != '4')) { $('#aprBtn').show(); } else { $('#aprBtn').hide(); }
                        $("#updtStatus").val(htmlAmi.status).change();
                        $('#aprBtn').attr('data-id', htmlAmi.aprBtn);
                    }
                } else { toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon); }
                $('#arvVeiws--' + getData[2]).html('<i class="ti-eye"></i>');
            }, 'json');
        } else if (getData[0] == 'aprBtn') {
            let nStatus = $('#updtStatus').val();
            let target = $('#base_url').val() + getData[1];
            $('#aprBtn').html('<i class="fe fe-sun bx-spin"></i> Wait....');
            $.post(target, { id: getData[2], status: nStatus }, function(htmlAmi) {
                if (htmlAmi.addClas == 'tst_success') {
                    $('#stsSection').html(htmlAmi.status);
                    if (nStatus == 'Approved') { $('#aprBtn').attr('data-id', '').hide(); }
                    setTimeout(function() { window.location.reload(1); }, 2000);
                }
                toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
                $('#aprBtn').html('<i class="ti-save"></i> Submit');

            }, 'json');
        } else if (getData[0] == 'viewDetails') {
            alert('Hello');
        } else if (getData[0] == 'findEmployee') {
            let target = $('#base_url').val() + getData[1];
            $.post(target, { id: getData[2] }, function(htmlAmi) {
                $('.mSrchPnl').hide();
                $('.mSrchPnl ul').html('<li>Er. Amit Kumar </li>');
                $('#fieldSrchIDorName').val(htmlAmi.name);
                $('#empSrchdID').val(htmlAmi.id);
            }, 'json');
        }


    });
});