var reportAppearance = "";
var reportPayslip = "";
var reportEmpLeave = "";
var miUrl = $("#base_url").val();

$(document).ready(function () {
	let searchObj = {};
	var target = $("#attenSummary").val();
	reportAppearance = {
		printTable: function (search_data) {
			getpaginate(
				search_data,
				"#reportAppearance",
				target,
				"Only For Id, Name.",
			);
		},
	};
	reportAppearance.printTable(searchObj);
	reportPayslip = {
		printTable: function (search_data) {
			getpaginate(
				search_data,
				"#empPayslip",
				$("#paySlipSummary").val(),
				"Only For Id, Name.",
			);
		},
	};
	reportPayslip.printTable(searchObj);

	reportEmpLeave = {
		printTable: function (search_data) {
			getpaginate(
				search_data,
				"#empLeaveSummary",
				$("#leaveSummary").val(),
				"Only For Id, Name.",
			);
		},
	};
	reportEmpLeave.printTable(searchObj);

	$(".setZeroInpt").keyup(function () {
		let basicPer = 0;
		let basicHra = 0;
		let basicTa = 0;
		let basicDa = 0;
		let basicPa = 0;
		let basicBonus = 0;
		let basicMedicl = 0;
		let basicInsentvAmt = 0;
		let otherBsInc = 0;
		let grsSalAmt = parseFloat($("#grsSalAmt").val());
		let basicPayPercent = parseFloat($("#basicPayPercent").val());
		if ($("#basicPayPercent").val() == "") {
			basicPer = 0;
		} else {
			basicPer = basicPayPercent;
		}
		if ($("#hraPercent").val() == "") {
			basicHra = 0;
		} else {
			basicHra = parseFloat($("#hraPercent").val());
		}
		if ($("#taPercent").val() == "") {
			basicTa = 0;
		} else {
			basicTa = parseFloat($("#taPercent").val());
		}
		if ($("#daPercent").val() == "") {
			basicDa = 0;
		} else {
			basicDa = parseFloat($("#daPercent").val());
		}
		if ($("#paPercent").val() == "") {
			basicPa = 0;
		} else {
			basicPa = parseFloat($("#paPercent").val());
		}
		if ($("#bonusPayAmt").val() == "") {
			basicBonus = 0;
		} else {
			basicBonus = parseFloat($("#bonusPayAmt").val());
		}
		if ($("#mediAllPercent").val() == "") {
			basicMedicl = 0;
		} else {
			basicMedicl = parseFloat($("#mediAllPercent").val());
		}
		if ($("#basicInsentvAmt").val() == "") {
			basicInsentvAmt = 0;
		} else {
			basicInsentvAmt = parseFloat($("#basicInsentvAmt").val());
		}
		if ($("#otherBsInc").val() == "") {
			otherBsInc = 0;
		} else {
			otherBsInc = parseFloat($("#otherBsInc").val());
		}

		let basicPayAmt = grsSalAmt * (basicPer / 100);
		let basicHraAmt = grsSalAmt * (basicHra / 100);
		let basicTaAmt = grsSalAmt * (basicTa / 100);
		let basicDaAmt = grsSalAmt * (basicDa / 100);
		let basicPaAmt = grsSalAmt * (basicPa / 100);
		let mediAllPayAmt = grsSalAmt * (basicMedicl / 100);
		let netPayAmt =
			basicPayAmt +
			basicHraAmt +
			basicTaAmt +
			basicDaAmt +
			basicPaAmt +
			basicBonus +
			mediAllPayAmt +
			otherBsInc +
			basicInsentvAmt;

		let pfPercent = 0;
		let advancePayAmt = 0;
		let tdsPercent = 0;
		let insurancePayAmt = 0;
		let otherDedPayAmt = 0;
		if ($("#pfPercent").val() == "") {
			pfPercent = 0;
		} else {
			pfPercent = parseFloat($("#pfPercent").val());
		}
		if ($("#advancePayAmt").val() == "") {
			advancePayAmt = 0;
		} else {
			advancePayAmt = parseFloat($("#advancePayAmt").val());
		}
		if ($("#tdsPercent").val() == "") {
			tdsPercent = 0;
		} else {
			tdsPercent = parseFloat($("#tdsPercent").val());
		}
		if ($("#insurancePayAmt").val() == "") {
			insurancePayAmt = 0;
		} else {
			insurancePayAmt = parseFloat($("#insurancePayAmt").val());
		}
		if ($("#otherDedPayAmt").val() == "") {
			otherDedPayAmt = 0;
		} else {
			otherDedPayAmt = parseFloat($("#otherDedPayAmt").val());
		}

		let esicEmpLyr = 0;
		let esicEmpLyee = 0;
		if ($("#esicEmployee").val() == "") {
			esicEmpLyee = 0;
		} else {
			esicEmpLyee = parseFloat($("#esicEmployee").val());
		}
		if ($("#esicEmployer").val() == "") {
			esicEmpLyr = 0;
		} else {
			esicEmpLyr = parseFloat($("#esicEmployer").val());
		}

		let pfPayAmt = basicPayAmt * (pfPercent / 100);
		let tdsPayAmt = grsSalAmt * (tdsPercent / 100);
		let netDeductionAmt =
			pfPayAmt + advancePayAmt + tdsPayAmt + insurancePayAmt + otherDedPayAmt;
		let netPableAmt = netPayAmt - netDeductionAmt;
		let esicEmpAmt = grsSalAmt * (esicEmpLyr / 100);
		let esicEmpPayAmt = grsSalAmt * (esicEmpLyee / 100);
		let afterEsicNetPay = netPableAmt - esicEmpPayAmt;

		$("#basicPayAmt").val(basicPayAmt.toFixed(3));
		$("#hraPayAmt").val(basicHraAmt.toFixed(3));
		$("#taPayAmt").val(basicTaAmt.toFixed(3));
		$("#daPayAmt").val(basicDaAmt.toFixed(3));
		$("#paPayAmt").val(basicPaAmt.toFixed(3));
		$("#mediAllPayAmt").val(mediAllPayAmt.toFixed(3));
		$("#pfPayAmt").val(pfPayAmt.toFixed(3));
		$("#tdsPayAmt").val(tdsPayAmt.toFixed(3));
		$("#esicEmpPayAmt").val(esicEmpPayAmt.toFixed(3));
		$("#esicEmpAmt").val(esicEmpAmt.toFixed(3));
		$("#netPayAmt").val(afterEsicNetPay.toFixed(3));
	});

	/*********************************************************************/
	$(".arvManage").change(function () {
		let actNbtn = $(this).attr("id");
		let getTrgtId = $(this).attr("data-id");
		let getResourceLoc =
			$("#base_url").val() + "admin/employee/findBranchDetails";
		$("#" + getTrgtId)
			.css("color", "#099b7e !important")
			.html("<option>Please Wait.....</option>");
		$.post(
			getResourceLoc,
			{
				id: $("#" + actNbtn).val(),
				actnType: getTrgtId,
				brID: $("#branch").val(),
			},
			function (htmlAmi) {
				$("#" + getTrgtId).html(htmlAmi);
				$("#" + getTrgtId).css("color", "rgb(62, 62, 62) !important");
			},
		);
	});
	/*********************************************************************/

	$(".arvChange").change(function () {
		let actNbtn = $(this).attr("id");
		let getTrgtId = $(this).attr("data-id");
		if (actNbtn == "designation") {
			let getResourceLoc =
				$("#base_url").val() + "admin/employee/getCompanyDetails";
			$.post(
				getResourceLoc,
				{
					id: $("#" + actNbtn).val(),
					action: actNbtn,
					branch: $("#branch").val(),
				},
				function (htmlAmi) {
					$("#" + getTrgtId).val(htmlAmi.net_payble_amt);
					$("#salID").val(htmlAmi.id);
				},
				"json",
			);
		}
		/*else if(actNbtn=='salary_type')
		{
            let getResourceLoc = $('#base_url').val() + "admin/employee/getCompanyDetails";
            $.post(getResourceLoc, { id: $('#' + actNbtn).val(), action: actNbtn, slID: $('#salID').val() },
                function(htmlAmi) { $('#' + getTrgtId).val(htmlAmi); });
        } else
		*/ if (actNbtn == "state") {
			let getResourceLoc = $("#base_url").val() + "software/setting/cityList";
			$("#district")
				.css("color", "#099b7e !important")
				.html("<option>Please Wait.....</option>");
			$.post(
				getResourceLoc,
				{ id: $("#" + actNbtn).val() },
				function (htmlAmi) {
					$("#district").html(htmlAmi);
					$("#district").css("color", "rgb(62, 62, 62) !important");
				},
			);
		}
	});

	$(".amiStl").click(function () {
		let actNbtn = $(this).attr("id");
		if (actNbtn == "bnkDetBtn") {
			$("#viewBnkDetails").hide();
			$("#edtBnkDetails").show();
			$("#edtBnk").html("Edit Bank Details");
		} else if (actNbtn == "employeedata") {
			$("#viewProDet").hide();
			$("#editProDetails").show();
			$("#edtProDet").html("Edit Profile");
		} else if (actNbtn == "proDetBck") {
			$("#editProDetails").hide();
			$("#viewProDet").show();
			$("#edtProDet").html("Profile Details");
		} else if (actNbtn == "proBnkBck") {
			$("#edtBnkDetails").hide();
			$("#viewBnkDetails").show();
			$("#edtBnk").html("Bank Details");
		} else if (actNbtn == "AddNewDoc") {
			$("#lstDocDet").hide();
			$("#uplDocDetails").show();
			$("#edtDocDet").html("Add New Document");
			$("#AddNewDoc").hide();
		} else if (actNbtn == "bckToDoclist") {
			$("#uplDocDetails").hide();
			$("#lstDocDet").show();
			$("#edtDocDet").html("List of documents");
			$("#AddNewDoc").show();
		} else if (actNbtn == "compnyDetBtn") {
			$("#viewCmpnyDetails").hide();
			$("#edtCmpnyDetails").show();
			$("#edtCmpDet").html("Edit Company Details");
		} else if (actNbtn == "proCompBck") {
			$("#edtCmpnyDetails").hide();
			$("#viewCmpnyDetails").show();
			$("#edtCmpDet").html(" Company Details");
		} else if (actNbtn == "backToAddEmp") {
			$("#fnlSuccess").hide();
			$("#frmRegister").show();
		} else if (actNbtn == "SalStpDetBtn") {
			$("#viewSalarySetup").hide();
			$("#edtSalStpDetails").show();
			$("#edtSsl").html("Edit Salary Details");
		} else if (actNbtn == "proSalStpBck") {
			$("#edtSalStpDetails").hide();
			$("#viewSalarySetup").show();
		}
	});

	/*	 $(".arvChange").change(function () 
    	 {
            let actNbtn=$(this).attr('id');
            let getResourceLoc=$('#base_url').val()+"software/setting/cityList";
    		if(actNbtn=='state')
    		 {
    		 	$('#district').html('<option>Please Wait.....</option>');
    			$('#district').css('color', '#099b7e !important');
              	$.post(getResourceLoc,{id:$('#'+actNbtn).val()},function(htmlAmi){$('#district').html(htmlAmi);$('#district').css('color','rgb(62, 62, 62) !important')});
            }
        });*/
});

$("#manage_document").submit(function (e) {
	let target = $("#targetDoc").val();
	e.preventDefault();
	$.ajax({
		url: target,
		type: "POST",
		data: new FormData(this),
		processData: false,
		contentType: false,
		cache: false,
		dataType: "json",
		beforeSend: function () {
			$("#saveDocDet").html(
				'<i class="fe fe-settings bx-spin"></i> Please Wait',
			);
		},
		complete: function () {
			$("#saveDocDet").html('<i class="ti-save"></i> Save');
		},
		success: function (htmlAmi) {
			toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
			if (htmlAmi.addClas == "tst_success") {
				//setTimeout(function(){window.location.reload(1);},2000);
				$.each(htmlAmi.srCnt, function (index, value) {
					sum = 1 + index;
					$("#smDocCnt-" + value).html(sum + ".");
				});
				$(htmlAmi.tblRowDet).insertAfter(
					$("#empDocTble tbody tr.miCenter:last"),
				);
				$("#uplDocDetails").hide();
				$("#lstDocDet").show();
				$("#edtDocDet").html("List of documents");
				$("#AddNewDoc").show();
			}
		},
	});
});

$("#edSalDetails").submit(function (e) {
	let target = $(this).attr("data-id");
	e.preventDefault();
	$.ajax({
		url: target,
		type: "POST",
		data: $(this).serialize(),
		dataType: "json",
		beforeSend: function () {
			$("#saveSalStpkDet").html(
				'<i class="fe fe-settings bx-spin"></i> Please Wait',
			);
		},
		complete: function () {
			$("#saveSalStpkDet").html('<i class="ti-save"></i> Save');
		},
		success: function (htmlAmi) {
			toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
		},
	});
});

$("#edProDetails").submit(function (e) {
	let target = $(this).attr("data-id");
	e.preventDefault();
	$.ajax({
		url: target,
		type: "POST",
		data: $(this).serialize(),
		dataType: "json",
		beforeSend: function () {
			$("#savePersnlDet").html(
				'<i class="fe fe-settings bx-spin"></i> Please Wait',
			);
		},
		complete: function () {
			$("#savePersnlDet").html('<i class="ti-save"></i> Save');
		},
		success: function (htmlAmi) {
			toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
			/* if (htmlAmi.addClas == 'tst_success') {
                 setTimeout(function() { window.location.reload(1); }, 2000);
             }*/
		},
	});
});
$("#edBnkDetails").submit(function (e) {
	let base_url = $("#base_url").val();
	e.preventDefault();
	$.ajax({
		url: base_url + "employee/profile/bank_update",
		type: "POST",
		data: $(this).serialize(),
		dataType: "json",
		beforeSend: function () {
			$("#saveBnkDet").html(
				'<i class="fe fe-settings bx-spin"></i> Please Wait',
			);
		},
		complete: function () {
			$("#saveBnkDet").html('<i class="ti-save"></i> Save');
		},
		success: function (htmlAmi) {
			toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
			if (htmlAmi.addClas == "tst_success") {
				setTimeout(function () {
					window.location.reload(1);
				}, 2000);
			}
		},
	});
});

$("#edCmpnyDetails").submit(function (e) {
	let target = $(this).attr("data-id");
	e.preventDefault();
	$.ajax({
		url: target,
		type: "POST",
		data: $(this).serialize(),
		dataType: "json",
		beforeSend: function () {
			$("#saveCompnyDet").html(
				'<i class="fe fe-settings bx-spin"></i> Please Wait',
			);
		},
		complete: function () {
			$("#saveCompnyDet").html('<i class="ti-save"></i> Save');
		},
		success: function (htmlAmi) {
			toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
			$("#salary_amount").val(htmlAmi.salAmt);
			$("#slAmount").html(htmlAmi.salAmt);
			$("#slTyp").html(htmlAmi.slTyp);
			$("#regisnDate").html(htmlAmi.resignDate);
			$("#terminDate").html(htmlAmi.terminateDate);
			$("#joinDate").html(htmlAmi.joinDate);
			$("#branch_name").html(htmlAmi.branch_name);
			$("#department_name").html(htmlAmi.department_name);
			$("#designation_name").html(htmlAmi.designation_name);
			$("#creditLv").html(htmlAmi.creditLv);
			$("#notiFyRmrks").html(htmlAmi.notiFyRmrks);
			$("#noticeDt").html(htmlAmi.noticeDt);
			$("#edtCmpnyDetails").hide();
			$("#viewCmpnyDetails").show();
			$("#edtCmpDet").html("Company Details");

			if (htmlAmi.addClas == "tst_success") {
				setTimeout(function () {
					window.location.reload(1);
				}, 2000);
			}
		},
	});
});

function get_email(value) {
	var eml = value;
	$("#user_name").val(eml);
}

$("#add_employee_data").submit(function (e) {
	// let base_url = $('#base_url').val();
	e.preventDefault();
	$.ajax({
		url: base_url + "admin/employee/add_employee_data",
		type: "POST",
		data: new FormData(this),
		processData: false,
		contentType: false,
		cache: false,
		dataType: "json",
		beforeSend: function () {
			$("#adEmployeeDetails").html(
				'<i class="fe fe-settings bx-spin"></i> Please Wait',
			);
		},
		complete: function () {
			$("#adEmployeeDetails").html('<i class="ti-save"></i> Submit');
		},
		success: function (htmlAmi) {
			toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
			if (htmlAmi.addClas == "tst_success") {
				$("#backToAddEmp").attr("href", "javascript:void(0)");
				$("#frmRegister").hide();
				$("#backToAddEmp").attr("href", "javascript:void(0)");
				$("#fnlSuccess").html(htmlAmi.tst_success).show();
				// setTimeout(function() { window.location.reload(1); }, 2000);  frmRegister
				$("#empRmemId").html(htmlAmi.emp.employee_id);
				$("#nEmployerPic").attr("src", base_url + htmlAmi.emp.image);
				$("#empRname").html(htmlAmi.emp.name);
				$("#empRconNo").html(htmlAmi.emp.contact_no);
				$("#empRemail").html(htmlAmi.emp.email);
				$("#empRshowPass").html(htmlAmi.emp.show_password);

				$("#empRdob").html(htmlAmi.emp.dob);
				$("#empRgen").html(htmlAmi.emp.gender);
				$("#empRadd").html(htmlAmi.emp.address);
				$("#empRuserType").html(htmlAmi.emp.user_type);

				$("#empRbioId").html(htmlAmi.emp.biometric_id);
				$("#empRdOj").html(htmlAmi.emp.date_of_joining);
				$("#empRbra").html(htmlAmi.emp.branch_id);
				$("#empRdep").html(htmlAmi.emp.department);
				$("#empRdesig").html(htmlAmi.emp.designation);
				$("#empRshif").html(htmlAmi.emp.shift_timing);
			}
		},
	});
});

function view_employee(id) {
	alert("hello con");
	$.ajax({
		url: base_url + "admin/Employee/view_employee_data",
		type: "POST",
		data: {
			id: id,
		},
		success: function (data) {
			console.log(data);
			// $('#show_employee').html(data);
		},
	});
}

function update_employee(id) {
	$.ajax({
		url: base_url + "admin/Employee/update_employee",
		type: "POST",
		data: {
			id: id,
		},
		success: function (data) {
			$("#up_employee").html(data);
		},
	});
}

$("#employee_updata").submit(function (e) {
	// let base_url = $('#base_url').val();
	e.preventDefault();
	$.ajax({
		url: base_url + "admin/Employee/update_employee_data",
		type: "POST",
		data: $(this).serialize(),
		dataType: "json",
		beforeSend: function () {
			$("#employeedataupdate").html(
				'<i class="fe fe-settings bx-spin"></i> Please Wait',
			);
		},
		complete: function () {
			$("#employeedataupdate").html('<i class="ti-save"></i> Submit');
		},
		success: function (htmlAmi) {
			toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
			if (htmlAmi.addClas == "tst_success") {
				setTimeout(function () {
					window.location.reload(1);
				}, 2000);
			}
		},
	});
});

$("#resetYourPassword").submit(function (e) {
	let target = $("#avrActionTarget").val();
	e.preventDefault();
	$.ajax({
		url: target,
		type: "POST",
		data: $(this).serialize(),
		dataType: "json",
		beforeSend: function () {
			$("#arvResetPassword").html(
				'<i class="fe fe-settings bx-spin"></i> Please Wait',
			);
		},
		complete: function () {
			$("#arvResetPassword").html('<i class="ti-save"></i> Reset Password');
		},
		success: function (htmlAmi) {
			toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
			//if(htmlAmi.addClas=='tst_success'){setTimeout(function(){window.location.reload(1);},2000);}
		},
	});
});
