var reportDAttendnce = '';
var reportDWebsite = '';
$(document).ready(function () {

    let searchObj = {};
    var target = $('#target').val();
    reportDAttendnce = { printTable: function (search_data) { getpaginate(search_data, '#daily_attendance_list', target, 'Only For Id, Name.'); } }
    reportDAttendnce.printTable(searchObj);
    $(".srchPanel").click(function () {
        $("i", "#srchBtn").toggleClass("ti-search ti-minus");
        $("#searchBranchDetails").toggle();
    });
});


$(document).ready(function () {

    let searchObj = {};
    var target = $('#target').val();
    reportDWebsite = { printTable: function (search_data) { getpaginate(search_data, '#enquiry_list', target, 'Only For Id, Name.'); } }
    reportDWebsite.printTable(searchObj);
    $(".srchPanel").click(function () {
        $("i", "#srchBtn").toggleClass("ti-search ti-minus");
        $("#searchBranchDetails").toggle();
    });
});