$(function () {
	$(document)
		.unbind("change")
		.on("change", ".getSelection", function () {
			let actNbtn = $(this).attr("data-id");
			let curID = $(this).attr("id");
			let getData = actNbtn.split("===");
			if (getData[0] == "optedSelect") {
				let target = $("#base_url").val() + getData[1];
				$("#" + getData[2])
					.css("color", "#099b7e !important")
					.html("<option>Please Wait.....</option>");
				$.post(
					target,
					{ id: $("#" + curID).val(), actnMode: getData[0] },
					function (htmlAmi) {
						$("#" + getData[2])
							.html(htmlAmi)
							.css("color", "rgb(62, 62, 62) !important");
					},
				);
			} else if (getData[0] == "prevSelect" || getData[0] == "ofrLtrSelect") {
				let target = $("#base_url").val() + getData[1];
				$.post(
					target,
					{ id: $("#" + curID).val(), actnMode: getData[0] },
					function (htmlAmi) {
						if (htmlAmi.addClas == "tst_success") {
							if (getData[0] == "prevSelect") {
								$("#" + getData[2]).val(htmlAmi.department);
								$("#" + getData[3]).val(htmlAmi.ctc);
								$("#" + getData[4]).html(htmlAmi.isDesign);
							} else if (getData[0] == "ofrLtrSelect") {
								$("#" + getData[2]).val(htmlAmi.dtJoining);
								$("#" + getData[3]).val(htmlAmi.ctc);
							}
						} else {
							toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
						}
					},
					"json",
				);
			} else if (getData[0] == "prevDesign") {
				let target = $("#base_url").val() + getData[1];
				$.post(
					target,
					{
						id: $("#" + curID).val(),
						actn: getData[0],
						br_id: $("#branchFrPromo").val(),
					},
					function (htmlAmi) {
						if (htmlAmi.addClas == "tst_success") {
							$("#" + getData[2]).val(htmlAmi.ctcEmp);
						} else {
							toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
						}
					},
					"json",
				);
			}
		});
	$(document)
		.unbind("click")
		.on("click", ".getClickOptn", function () {
			let actNbtn = $(this).attr("data-id");
			let curID = $(this).attr("id");
			let getData = actNbtn.split("===");
			if (getData[0] == "getClickOptn") {
				let frmDetails = "";
				let frmBtn = "";
				if (getData[2] == "warningEmployee") {
					let branchFrWarn = $("#branchFrWarn").val();
					let warningEmployee = $("#warningEmployee").val();
					let rptManager = $("#reportingManager").val();
					let warningRegarding = $("#warningRegarding").val();
					frmDetails = {
						branch: branchFrWarn,
						employeeID: warningEmployee,
						refNo: rptManager,
						regarding: warningRegarding,
					};
					frmBtn = '<i class="ti-save"></i> Create Warning Letter';
					$("#downloadForOffrFrm").hide();
					$("#downloadFrm").show();
					$("#typLetter").html("Warning Letter");
				} else if (getData[2] == "promoteEmployee") {
					frmDetails = {
						branch: $("#branchFrPromo").val(),
						employeeID: $("#preProEmployee").val(),
						designation: $("#promoDesignation").val(),
						ctc: $("#empPromoCtc").val(),
					};
					frmBtn = '<i class="ti-save"></i> Create Promotion Letter';
					$("#downloadForOffrFrm").hide();
					$("#downloadFrm").show();
				} else if (getData[2] == "joinNewEmployee") {
					frmDetails = {
						branch: $("#offrBranch").val(),
						employeeID: $("#joinginEmployee").val(),
						dtJoining: $("#empDtJoining").val(),
						ctc: $("#offrSalary").val(),
					};
					frmBtn = '<i class="ti-save"></i> Create Offer Letter';
					$("#downloadFrm").hide();
					$("#downloadForOffrFrm").show();
					$("#typLetter").html("Offer Letter");
				}
				let target = $("#base_url").val() + getData[1];
				$("#" + curID).html(
					'<i class="fe fe-sun bx-spin"></i> Please Wait.....',
				);				
				$.post(
					target,
					{ actn: getData[2], details: frmDetails },
					function (htmlAmi) {
						$("#" + curID).html(htmlAmi.btnTxt);
						if (htmlAmi.addClas == "tst_success") {
							if (getData[2] == "joinNewEmployee") {
								$("#downloadForOffrFrm").attr("data-id", htmlAmi.targetLink);
							}

							if (getData[2] == "promoteEmployee") {
								toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
							} else {
								$("#document_printArea").modal("show");
								$("#printDataArea").html(htmlAmi.printData);
							}
						} else {
							toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
						}
						$("#" + curID).html(frmBtn);
					},
					"json",
				);
			} else if (getData[0] == "download") {
				$("#" + curID).html(
					'<i class="fe fe-sun bx-spin"></i> Please Wait.....',
				);
				setTimeout(function () {
					$("#" + curID).html('<i class="si si-printer"></i> Print ');
					window.open(getData[1], "_blank");
				}, 3000);
			}
		});
});
