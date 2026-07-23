<style>
  #getPrfrmList {
    min-height: 350px;
  }

  #find_emp_id {
    border: 1px solid #5248B5 !important
  }

  .appointment-letter {
    padding: 30px 20px;
    font-size: 12px;

    td {
      padding: 5px 10px;
      border: 1px solid #d9d9d9;
      font-size: 11px;
    }

    table {
      width: 100%
    }
  }

  .myFontBg {
    font-weight: 700;
  }

  .page-break {
    page-break-before: always;
  }

  .baComponent {
    background-color: #F2F2F2;
    font-weight: 700;
  }
</style>
<div class="inner-body">
  <div class="page-header">
    <div>
      <h2 class="main-content-title tx-24 mg-b-5">Form 16 generate</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('staff/dashboard'); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $breadcrums; ?></li>
      </ol>
    </div>
    <div class="d-flex">
      <div class="justify-content-center"> <a href="<?php echo $bckUrl; ?>" class="btn btn-primary btn-icon-text my-2 me-2"> <i class="ti-arrow-left me-2"></i> Back</a>
        <button type="button" class="btn btn-primary btn-icon-text my-2 me-2" id="miArvClk"><i class="ti-timer"></i> 12:31:33</button>
        <a href="javascript:void(0)" class="btn btn-primary btn-icon-text my-2 me-2"> <i class="fe fe-power"></i> Sign Out</a>
      </div>
    </div>
  </div>
  <div class="row row-sm" style="margin:15px -10px 75px -10px;">
    <div class="col-lg-12 col-md-12">
      <div class="card custom-card">
        <div class="card-header custom-card-header border-bottom-0 ">
          <h5 class="main-content-label tx-dark my-auto tx-medium mb-0">Offer Letter</h5>
          <div class="card-options">
            <div class="input-group">
              <input type="text" class="form-control" id="find_emp_id" placeholder="Search ...">
              <span class="">
                <button class="btn ripple btn-outline-primary getAction" id="searchEmployee" data-id="<?php echo $target; ?>" type="button"><i class="ti-search"></i> Search</button>
              </span>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row row-sm">
            <div class="col-md-12 col-lg-12">
              <div id="getPrfrmList">
                <div class="appointment-letter">
                  <p style="text-align: center;font-size:23px;font-weight: 700;">PRIVATE AND CONFIDENTIAL </p>
                  <p> Employee Code :<span class="empCd"></span><br />
                    Current Date </p>
                  <p>Mr./Ms. <span class="empFlName myFontBg">_ _ _ _ _ _ _ _ _ _</span> <br />
                    <span class="myFontBg" id="empAddr">_ _ _ _ _ _ _ _ _ _</span><br />
                    City-<span class="myFontBg" id="empCity">_ _ _ _ _ _ _ _ _ _</span> ,<br />PIN <span class="myFontBg" id="empZipCode">_ _ _ _ _ _ _ _</span>
                  </p>
                  <p> Dear <span class="empFlName myFontBg">_ _ _ _ _ _ _ _ _ _</span>, </p>
                  <p> We thank you for deciding to be a part of the <span class="myFontBg"><?php echo system_info('company_name') ?></span> family. </p>
                  <p> <span class="myFontBg">Congratulations</span> and welcome onboard a dynamic and winning team! </p>
                  <p>Further to your acceptance of the offer letter dated Date of Offer Letter, we are pleased to confirm your appointment as <span class="myFontBg empDesign">Designation</span> for our <span class="myFontBg empDepartment">Department Name</span> at Location in <span class="myFontBg"><?php echo system_info('company_name') ?></span> . </p>
                  <p> Please make note of the following important terms and conditions of your employment: </p>
                  <p>Commencement of employment: You have joined our services on date of joining and the said date has been recorded as your Date of Joining and will be considered as such for all future purposes pertaining to your employment association with us.</p>
                  <p>Compensation & Benefits: Please refer to Annexure I, for details of your remuneration and benefits as applicable to you. The aforesaid CTC is subject to applicable taxes and statutory deductions that may prevail from time to time.</p>
                  <ul style="padding-left:15px">
                    Transfer:
                    <li> While your current posting is in Location with Department, the company reserves the right to transfer you to another location, unit, department or company, associate company, subsidiary company, group company based on its requirements.</li>
                    <li>In the event of such transfer you will be required to abide by the rules and regulations, service conditions and benefits of the department, store and location where you are transferred to.</li>
                  </ul>
                  <div style="text-align:justify">
                    <p>Retirement: Your retirement from the services of the company will be on attainment of the age of 60 years.</p>
                    <p>Governing Terms & Conditions: You will be governed by the clauses mentioned in your Service Agreement, TCOC (Tata Code of Conduct), company HR policies and POSH (Prevention of Sexual Harassment) at all points of time during your tenure of employment with the company. Please note that the appointment is subject to the background document verification. Please note that failure to adhere to these norms, may lead to immediate termination from the services of the company. </p>
                    <p>Declarations: This appointment is made on the basis of information provided by you. Should it prove untrue incorrect at any time, the Company reserves the rights to take appropriate action including forthwith termination of service. We shall be entitled to initiate necessary enquiries with the source of reference provided by you. In case of unfavorable report, we shall be entitled to take appropriate steps including forthwith terminating this agreement</p>
                  </div>

                  <p>Wish you a successful professional stint with us. We look forward to a mutually beneficial and enriching experience having you on board. All the best!</p>
                  <p>Warm Regards,<br />
                    For <span class="myFontBg" style="text-transform:uppercase;"><?php echo system_info('company_name') ?></span> </p>
                  <p>Name,<br />
                    Authorised Signatory Designation </p>
                  <p>
                  <div class="page-break"></div>
                  <div style="float:right;width:35%;"><span style="font-size:11px;">I have read the above terms and conditions of my appointment. I accept the same.</span><br />
                    _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _<br />
                    Applicant Name<br />
                    Employee Code </div>
                  </p>
                  <p style="clear: both;">Encl:<br />
                    <span class="myFontBg"> 1) Service Agreement </span>
                  </p>
                  <table>
                    <tr>
                      <td colspan="3" style="text-align:center"><span class="myFontBg">ANNEXURE I</span></td>
                    </tr>
                    <tr>
                      <td colspan="3" style="text-align:center"><span class="myFontBg"><?php echo system_info('company_name') ?></span></td>
                    </tr>
                    <tr>
                      <td style="width:40%">Employee No </td>
                      <td colspan="2"><span class="myFontBg empCd"></span></td>
                    </tr>
                    <tr>
                      <td style="width:40%">Name </td>
                      <td colspan="2"><span class="myFontBg empFlName" style="text-transform:uppercase;"></span></td>
                    </tr>
                    <tr>
                      <td style="width:40%">Designation </td>
                      <td colspan="2"><span class="myFontBg empDesign" style="text-transform:uppercase;"></span></td>
                    </tr>
                    <tr>
                      <td style="width:40%">Department </td>
                      <td colspan="2"><span class="myFontBg empDepartment" style="text-transform:uppercase;"></span></td>
                    </tr>
                    <tr>
                      <td style="width:40%">Date of Joining </td>
                      <td colspan="2"><span class="myFontBg dtEmpJoin"></span></td>
                    </tr>
                    <tr>
                      <td style="width:40%">Remarks </td>
                      <td colspan="2"></td>
                    </tr>
                    <tr class="baComponent">
                      <td style="width:40%">SALARY COMPONENTS </td>
                      <td>INR PER MONTH</td>
                      <td>INR PER ANNUM</td>
                    </tr>
                    <tr>
                      <td style="width:40%">Basic </td>
                      <td><span class="myFontBg" id="basicSl"></span></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td style="width:40%">HRA </td>
                      <td><span class="myFontBg" id="hraAmt"></span></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td style="width:40%">Travelling Allowance</td>
                      <td><span class="myFontBg" id="taAmt"></span></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td style="width:40%">Dearness Allowance </td>
                      <td><span class="myFontBg" id="daAmt"></span></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td style="width:40%">Personal Assistant </td>
                      <td><span class="myFontBg" id="paAmt"></span></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td style="width:40%">Bonus </td>
                      <td><span class="myFontBg" id="bonus"></span></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td style="width:40%">Medical Allowance </td>
                      <td><span class="myFontBg" id="medical"></span></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td style="width:40%">Insentive </td>
                      <td><span class="myFontBg" id="insentive"></span></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td style="width:40%">Other Income </td>
                      <td><span class="myFontBg" id="otherInc"></span></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td style="width:40%">Provident Fund</td>
                      <td><span class="myFontBg" id="pfAmt"></span></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td style="width:40%">Advance </td>
                      <td><span class="myFontBg" id="tdsAmt"></span></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td style="width:40%">Insurance </td>
                      <td><span class="myFontBg" id="insurance"></span></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td style="width:40%">Other Deduction </td>
                      <td><span class="myFontBg" id="othrDeduction"></span></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td style="width:40%">CTC </td>
                      <td><span class="myFontBg" id="grsAmt"></span></td>
                      <td></td>
                    </tr>
                    <!--<tr>
                    <td colspan="3" style="width:40%">Remarks: With ref to FY FY pro-rata Performance Linked Award will be RS.
                      PRO RATED VARIABLE AMOUNT :-. </td>
                  </tr>-->
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <button class="btn btn-outline-primary pull-right getAction" id="downloadFrm" data-id="downloadForm16===thecodex"><i class="fe fe-download-cloud me-2"></i> Download</button>

        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo base_url("assets/js/html2pdf.bundle.js"); ?>"></script>
  <script>
    const downloadButton = document.getElementById("downloadFrm");
    downloadButton.addEventListener('click', function() {
      const element = document.getElementById("getPrfrmList");
      const options = {
        margin: [5, 5, 5, 5],
        filename: "download.pdf",
        image: {
          type: "jpeg",
          quality: 0.98
        },
        html2canvas: {
          scale: 2,
          letterRendering: true
        },
        jsPDF: {
          unit: "mm",
          format: "a4",
          orientation: "portrait"
        }
      };
      html2pdf().from(element).set(options).save();
      $("#downloadFrm").html('<i class="fe fe-download-cloud me-2"></i> Download');
    });
    $(function() {
      $(document).on("click", ".getAction", function() {
        let actNbtn = $(this).attr("data-id");
        let getData = actNbtn.split("===");
        if (getData[0] == "searchEmployee") {
          $("#searchEmployee").html('<i class="fe fe-sun bx-spin"></i> Please Wait');
          $.post(base_url + getData[1], {
            id: $('#find_emp_id').val()
          }, function(htmlAmi) {
            //console.log(htmlAmi);
            if (htmlAmi.addClas == 'tst_success') {
              $('.empFlName').html(htmlAmi.empName);
              $('#empAddr').html(htmlAmi.address);
              $('.empCd').html(htmlAmi.empCode);
              $('#empCity').html(htmlAmi.cityPin);
              $('#empZipCode').html(htmlAmi.zipCode);
              $('.empDepartment').html(htmlAmi.department);
              $('.empDesign').html(htmlAmi.designation);
              $('.dtEmpJoin').html(htmlAmi.created_at);

              $('#basicSl').html(htmlAmi.basic_sal);
              $('#hraAmt').html(htmlAmi.hraAmt);
              $('#taAmt').html(htmlAmi.taAmt);
              $('#daAmt').html(htmlAmi.daAmt);
              $('#paAmt').html(htmlAmi.paAmt);

              $('#bonus').html(htmlAmi.bonus);
              $('#medical').html(htmlAmi.medical);
              $('#insentive').html(htmlAmi.insentive);
              $('#otherInc').html(htmlAmi.otherInc);
              $('#pfAmt').html(htmlAmi.pfAmt);
              $('#tdsAmt').html(htmlAmi.tdsAmt);
              $('#insurance').html(htmlAmi.insurance);
              $('#othrDeduction').html(htmlAmi.othrDeduction);
              $('#grsAmt').html(htmlAmi.grossAmt);


            }
            toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
            $('#searchEmployee').html('<i class="ti-search"></i> Search');
          }, 'json');
        }
      });
    });
  </script>