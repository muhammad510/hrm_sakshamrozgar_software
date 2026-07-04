function update_attendance(id) {
    $.ajax({
        url: base_url + 'admin/Attendance/update_attendance_status',
        type: "POST",
        data: {
            'id': id
        },
        success: function(data) {
            $('#up_attendance').html(data);
        },
    });
}

$('#attendance_updata').submit(function(e) {
    // let base_url = $('#base_url').val();
    e.preventDefault();
    $.ajax({
        url: base_url + 'admin/Attendance/update_attendance_status_data',
        type: "POST",
        data: $(this).serialize(),
        dataType: 'json',
        beforeSend: function() { $('#attendancedataupdate').html('<i class="fe fe-settings bx-spin"></i> Please Wait'); },
        complete: function() { $('#attendancedataupdate').html('<i class="ti-save"></i> Submit'); },
        success: function(htmlAmi) {
            toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
            if (htmlAmi.addClas == 'tst_success') {
                setTimeout(function() { window.location.reload(1); }, 2000);
            }
        }
    });
});
