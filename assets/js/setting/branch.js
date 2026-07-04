var reportBranch = '';
$(document).ready(function() {

    let searchObj = {};
    var target = $('#target').val();
    reportBranch = { printTable: function(search_data) { getpaginate(search_data, '#branch_det', target, 'Only For Id, Name.'); } }
    reportBranch.printTable(searchObj);
    $(".branchManage").click(function() {
        let actNbtn = $(this).attr('id');
        if (actNbtn == 'branchSrch' || actNbtn == 'bkSrch') {
            $("i", "#branchSrch").toggleClass("bx-search bx-minus");
            $("#searchBranchDetails").toggle();
            $('.miSlwdth').css('width', '92.33% !important');
        } else if (actNbtn == 'addNewBranchDetails') {
            $('#gtBrCode').val($('#newBranchID').text());
            $("#searchBranchDetails,#branchSrch,#amiResult").hide();
            $("i", '#addNewBranchDetails').toggleClass("ti-plus ti-minus");
            $("#amiBranchAllChanges").show();
            $('#addNewBranchDetails').attr('id', 'backToListShow');
            $('#bxTitleNm').html('Add Branch');
            $('#oprType').val($(this).attr('data-id'));
            $('#manage').html('<i class="ti-save"></i> Submit');
        } else if (actNbtn == 'backToListShow' || actNbtn == "bkSrch_01") {
            $("i", '#backToListShow').toggleClass("ti-plus ti-minus");
            $('#backToListShow').attr('id', 'addNewBranchDetails');
            $('#bxTitleNm').html('Branch Manage');
            $("#amiBranchAllChanges").hide();
            $("#amiResult,#branchSrch").show();
        }
    });
    $(".empSelectR").change(function() {
        var actNbtn = $(this).attr('id');
        var getResource = $('#base_url').val();
        if (actNbtn == 'get_state') {
            $('#district').html('<option>Please Wait.....</option>');
            $('#district').css('color', '#099b7e');
            $.post(getResource + "software/setting/cityList", { id: $('#' + actNbtn).val() }, function(htmlAmi) {
                $('#district').html(htmlAmi);
                $('#district').css('color', 'rgb(13, 62, 115)')
            });
        } else if (actNbtn == 'department') {
            let department = $('#department').val();
            //$('#gtDeisgnation').val(department);
            $('#gtDeisgnation').html('<option>Please Wait.....</option>');
            $('#gtDeisgnation').css('color', '#099b7e');
            $.post(getResource + "software/branch/manage", { id: $('#' + actNbtn).val(), 'oprType': 'department' }, function(htmlAmi) {
                $('#district').html(htmlAmi);
                $('#gtDeisgnation').css('color', 'rgb(13, 62, 115)')
            });



        }
    });


});

$(function() {
    $(document).on("click", '.getAction', function() {
        let actNbtn = $(this).attr('data-id');
        let getData = actNbtn.split('===');
        if (getData[0] == 'miStatusView') {
            let target = $('#base_url').val() + getData[1];
            $.post(target, { oprType: getData[0], id: getData[2] }, function(htmlAmi) {
                $('.actnData').html(htmlAmi.msg);
                $('#cnfChanges').attr('data-id', htmlAmi.action);
            }, 'json');
        } else if (getData[0] == 'miStatusChange') {
            let target = $('#base_url').val() + getData[1];
            $('#cnfChanges').html('<i class="fe fe-setting bx-spin"></i> Please Wait').removeClass('btn-outline-primary').addClass('btn-outline-dark');
            $.post(target, { oprType: getData[0], id: getData[2] }, function(htmlAmi) {
                $('#cnfChanges').html('Confirm <i class="bx bx-check-circle"></i>').removeClass('btn-outline-dark').addClass('btn-outline-primary');
                $("#arvs--" + getData[2]).addClass(htmlAmi.btnAdCls).removeClass(htmlAmi.btnRmvCls).html(htmlAmi.btnTxt);
                $('.actnData').html(htmlAmi.msg);
                $('#statusChange').delay(3000).modal('hide');
            }, 'json');

        } else if (getData[0] == 'miBrView' || getData[0] == "miBrEdt") {
            let target = $('#base_url').val() + getData[1];
            $.post(target, { oprType: getData[0], id: getData[2] }, function(htmlAmi) {
                //$('#bxTitleNm').html(htmlAmi);
                if (htmlAmi.addClas == "tSuccess") {
                    $('#oprType').val(getData[0]);
                    $('#target').val(htmlAmi.id);
                    $('#gtBrCode').val(htmlAmi.code);
                    $('#brNwName').val(htmlAmi.branch_name);
                    $('#brLatitude').val(htmlAmi.latitude);
                    $('#brLongitude').val(htmlAmi.longitude);

                    //$('#getDepIdFr').val(htmlAmi.department);$('#getDesigIdFr').val(htmlAmi.designation);
                    $('#depSelct').html(htmlAmi.shwDepart);
                    $("#opn--department ul").html(htmlAmi.listDepart);
                    $('#desigSelct').html(htmlAmi.shwDesig);
                    $("#opn--gtDeisgnation ul").html(htmlAmi.listDesig);

                    $('#contactName').val(htmlAmi.contact_person_name);
                    $("#contactNu").val(htmlAmi.phone_nu);
                    $("#mobileNu").val(htmlAmi.mobile_nu);
                    $("#emailID").val(htmlAmi.branch_email);
                    $("#brAddress").val(htmlAmi.address);
                    $('#get_state').html(htmlAmi.getState);
                    $('#district').html(htmlAmi.getDistrict);
                    $("#zipCode").val(htmlAmi.zipcode);
                    $("#searchBranchDetails,#branchSrch,#amiResult").hide();
                    $("i", '#addNewBranchDetails').toggleClass("ti-plus ti-minus");
                    $("#amiBranchAllChanges").show();
                    $('#addNewBranchDetails').attr('id', 'backToListShow');
                    if (getData[0] == "miBrView") {
                        $('#manage').hide();
                        $('#bxTitleNm').html('View Branch Details');
                    } else if (getData[0] == "miBrEdt") {
                        $('#manage').html('<i class="ti-save"></i> Update').show();
                        $('#bxTitleNm').html('Edit Branch Details');
                    }
                } else { toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon); }



            }, 'json');

        }


    });

});



$('#manage_branch').submit(function(e) {
    let target = $(this).attr('data-id');
    let action = $('#oprType').val();
    let manage = '';
    if (action == 'addNew') { manage = "Submit"; } else if (action == 'miBrEdt') {
        manage = "Update";
        $('#oprType').val('updateBrDet');
    } else if (action == 'updateBrDet') {
        manage = "Update";
        $('#oprType').val('updateBrDet');
    } else { manage = "Arv Action"; }
    e.preventDefault();
    $.ajax({
        url: target,
        type: "POST",
        data: $(this).serialize(),
        dataType: 'json',
        beforeSend: function() { $('#manage').html('<i class="fe fe-sun bx-spin"></i> Please Wait'); },
        complete: function() { $('#manage').html('<i class="ti-save"></i> ' + manage); },
        success: function(htmlAmi) {
            toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
            if (htmlAmi.addClas == 'tSuccess') { setTimeout(function() { window.location.reload(1); }, 2000); }
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
        beforeSend: function() { $('#designationupddata').html('<i class="bx bx-loader bx-spin"></i> Please Wait'); },
        complete: function() { $('#designationupddata').html('<i class="bx bx-save"></i> Submit'); },
        success: function(htmlAmi) {

            toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
            if (htmlAmi.addClas == 'tSuccess') {
                setTimeout(function() { window.location.reload(1); }, 2000);
            }

        }

    });

});