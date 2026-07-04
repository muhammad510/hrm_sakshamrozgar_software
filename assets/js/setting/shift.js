var reportShift = '';
$(document).ready(function() {

    let searchObj = {};
    var target = $('#target').val();
    reportShift = { printTable: function(search_data) { getpaginate(search_data, '#shift_list', target, 'Only For Id, Name.'); } }
    reportShift.printTable(searchObj);

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
            $('#cnfChanges').html('<i class="fe fe-settings bx-spin"></i> Please Wait').removeClass('btn-outline-secondary').addClass('btn-outline-primary');
            $.post(target, { oprType: getData[0], id: getData[2] }, function(htmlAmi) {
                $('#cnfChanges').html('Confirm <i class="si si-check"></i>').removeClass('btn-outline-primary').addClass('btn-outline-secondary');
                $("#arvs--" + getData[2]).addClass(htmlAmi.btnAdCls).removeClass(htmlAmi.btnRmvCls).html(htmlAmi.btnTxt);
                $('.actnData').html(htmlAmi.msg);
                $('#statusChange').delay(3000).modal('hide');
            }, 'json');

        }
    });
});
$('#add_shift_data').submit(function(e) {
    // let base_url = $('#base_url').val();
    e.preventDefault();
    $.ajax({
        url: base_url + 'software/Shift/add_shift_data',
        type: "POST",
        data: $(this).serialize(),
        dataType: 'json',
        beforeSend: function() { $('#shiftdata').html('<i class="fe fe-settings bx-spin"></i> Please Wait'); },
        complete: function() { $('#shiftdata').html('<i class="ti-save"></i> Submit'); },
        success: function(htmlAmi) {
            toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
            if (htmlAmi.addClas == 'tst_success') {
                setTimeout(function() { window.location.reload(1); }, 2000);
            }
        }
    });
});

function view_shift(id) {
    $.ajax({
        url: base_url + 'software/Shift/view_shift_data',
        type: "POST",
        data: {
            'id': id
        },
        success: function(data) {
            $('#show_shift').html(data);
        },
    });
}

function update_shift(id) {
    $.ajax({
        url: base_url + 'software/Shift/update_shift',
        type: "POST",
        data: {
            'id': id
        },
        success: function(data) {
            $('#up_shift').html(data);
        },
    });
}

$('#shift_updata').submit(function(e) {
    // let base_url = $('#base_url').val();
    e.preventDefault();
    $.ajax({
        url: base_url + 'software/Shift/update_shift_data',
        type: "POST",
        data: $(this).serialize(),
        dataType: 'json',
        beforeSend: function() { $('#shiftdataupdate').html('<i class="fe fe-settings bx-spin"></i> Please Wait'); },
        complete: function() { $('#shiftdataupdate').html('<i class="ti-save"></i> Submit'); },
        success: function(htmlAmi) {
            toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
            if (htmlAmi.addClas == 'tst_success') {
                setTimeout(function() { window.location.reload(1); }, 2000);
            }
        }
    });
});