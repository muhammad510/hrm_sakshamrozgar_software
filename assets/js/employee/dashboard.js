




















$('#mark_attendance').submit(function(e) {
    // let base_url = $('#base_url').val();

    e.preventDefault();
    $.ajax({

        url: base_url + 'employee/Dashboard/mark_attendence',
        type: "POST",
        data: $(this).serialize(),
        dataType: 'json',
        beforeSend: function() { $('#attendancedata').html('<i class="fe fe-settings bx-spin"></i> Please Wait'); },
        complete: function() { $('#attendancedata').html('<i class="ti-save"></i> Submit'); },
        success: function(htmlAmi) {
            toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
            if (htmlAmi.addClas == 'tst_success') {
                setTimeout(function() { window.location.reload(1); }, 2000);
            }
        }

    });

});

$('#logout_attendance').submit(function(e) {
    // let base_url = $('#base_url').val();

    e.preventDefault();
    $.ajax({

        url: base_url + 'employee/Dashboard/logout_attendence',
        type: "POST",
        data: $(this).serialize(),
        dataType: 'json',
        beforeSend: function() { $('#logoutattendancedata').html('<i class="fe fe-settings bx-spin"></i> Please Wait'); },
        complete: function() { $('#logoutattendancedata').html('<i class="ti-save"></i> Submit'); },
        success: function(htmlAmi) {
            
            toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
            if (htmlAmi.addClas == 'tst_success') {
                setTimeout(function() { window.location.reload(1); }, 2000);
            }

        }

    });

});
