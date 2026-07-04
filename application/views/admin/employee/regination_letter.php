<style>
#getPrfrmList {min-height:350px;}
#find_emp_id {border:1px solid #5248B5 !important}
.letter-container {padding:30px 20px;font-size: 14px;td {padding:5px 10px;border: 1px solid #d9d9d9;}
th {background-color: #f2f2f2;padding:5px 10px;border: 1px solid #d9d9d9;}
table{width:100%}
}.myFontBg{ font-weight:700;}
</style>
<div class="inner-body">
<div class="page-header">
  <div>
    <h2 class="main-content-title tx-24 mg-b-5">Resignation Letter</h2>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('staff/dashboard');?>">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo $breadcrums; ?></li>
    </ol>
  </div>
  <div class="d-flex">
    <div class="justify-content-center"> <a href="<?php echo $bckUrl;?>" class="btn btn-primary btn-icon-text my-2 me-2"> <i class="ti-arrow-left me-2"></i> Back</a>
      <button type="button" class="btn btn-primary btn-icon-text my-2 me-2" id="miArvClk"><i class="ti-timer"></i> 12:31:33</button>
      <a href="javascript:void(0)" class="btn btn-primary btn-icon-text my-2 me-2"> <i class="fe fe-power"></i> Sign Out</a> </div>
  </div>
</div>
<div class="row row-sm" style="margin:15px -10px 75px -10px;">
  <div class="col-lg-12 col-md-12">
    <div class="card custom-card">
      <div class="card-header custom-card-header border-bottom-0 ">
        <h5 class="main-content-label tx-dark my-auto tx-medium mb-0">Resignation Letter</h5>
        <div class="card-options">
          <div class="input-group">
            <input type="text" class="form-control" id="find_emp_id" placeholder="Search ...">
            <span class="">
            <button class="btn ripple btn-outline-primary getAction" id="searchEmployee" data-id="<?php echo $target;?>" type="button"><i class="ti-search"></i> Search</button>
            </span> </div>
        </div>
      </div>
      <div class="card-body">
        <div class="row row-sm">
          <div class="col-md-12 col-lg-12">
            <div id="getPrfrmList">
             <div class="letter-container">
                 <p style="text-align: center;font-size:23px;font-weight: 700;">Private & Confidential</p>
                  <p>Employee Code: <span class="myFontBg empCode"> <span style="font-weight:400">_ _ _ _ _ _ _ _ _ _ _ _ _ _ _</span> </span> <br/>
                     Current Date: <span class="myFontBg" id="cmpDate"><span style="font-weight:400">_ _ _ _ _ _ _ _ _ _ _ _ _ _ _</span></span></p>
                  <p>Mr. / Ms. <span class="myFontBg empName"><span style="font-weight:400">_ _ _ _ _ _ _ _ _ _ _ _ _ _ _</span></span><br/>
                    <span class="myFontBg" id="empAddress"><span style="font-weight:400">_ _ _ _ _ _ _ _ _ _ _ _ _ _ _</span></span><br/>
                    <span class="myFontBg" id="empCity"><span style="font-weight:400">_ _ _ _ _ _ _ _ _ _ _ _ _ _ _</span></span></p>
                  <p>Dear <span class="myFontBg" id="cmpManager"> Manager</span>,</p>
                  <p>Subject: Resignation from the position of <span class="myFontBg empDesign"><span style="font-weight:400">_ _ _ _ _ _ _ _ _ _ _ _ _ _ _</span></span></p>
                 <div style="text-align:justify">
                  <p>I hope this letter finds you in good health. I am writing to formally announce my resignation from my position as <span class="myFontBg empDesign"><span style="font-weight:400">_ _ _ _ _ _ _ _ _ _ _ _ _ _ _</span> </span> at <span class="myFontBg"><?php echo config_item('company_name') ?></span>, effective from _ _ _ _ _ _ _ _ _ _ _ _ _ _ _. After careful consideration, I have decided to pursue new opportunities that will allow me to grow both professionally and personally.</p>
                  <p>I would like to take this opportunity to express my gratitude to you and the entire <span class="myFontBg"><?php echo config_item('company_name') ?></span> team for the valuable experience and support during my tenure here. It has been a rewarding journey, and I have enjoyed working with such a talented group of individuals. I am thankful for the opportunities for growth and the professional relationships I have built along the way.</p>
                  <p>As per the company policy, I am providing the required notice period of _ _ _ _ _ _ _ _ _ _ _ _ _ _ _. I will ensure a smooth transition of my duties and responsibilities and assist in any way possible to hand over my tasks to my successor. If there is anything further I can do during this transition, please feel free to let me know.</p>
                  <p>Once again, I am grateful for the opportunities provided to me at <span class="myFontBg"><?php echo config_item('company_name') ?></span>. I wish the organization continued success in the future, and I look forward to staying in touch.</p>
                  </div>
                  <p>Thank you for your understanding and support.</p>
                  <p>Warm regards,<br/>
                    <span class="myFontBg empName"><span style="font-weight:400">_ _ _ _ _ _ _ _ _ _ _ _ _ _ _</span></span><br/>
                    <span class="myFontBg empDesign"><span style="font-weight:400">_ _ _ _ _ _ _ _ _ _ _ _ _ _ _</span> </span><br/>
                    <span class="myFontBg empContact"><span style="font-weight:400">_ _ _ _ _ _ _ _ _ _ _ _ _ _ _</span> </span></p>
                  <div class="signature-section">
                    <p>I, <span class="myFontBg empName"><span style="font-weight:400">_ _ _ _ _ _ _ _ _ _ _ _ _ _ _</span></span>, hereby confirm the resignation request as mentioned above.<br/>
                      Signature: ______________________<br/>
                      Date: ________________________</p>
              </div>
                <table>
                    <tr><th>Employee Details</th><th>Information</th></tr>
                    <tr><td>Employee Name</td><td> <span class="myFontBg empName"><span style="font-weight:400">_ _ _ _ _ _ _ _ _ _ _ _ _ _ _</span></span></td></tr>
                    <tr><td>Employee Code</td><td><span class="myFontBg empCode"> <span style="font-weight:400">_ _ _ _ _ _ _ _ _ _ _ _ _ _ _</span> </span></td></tr>
                    <tr><td>Designation</td><td><span class="myFontBg empDesign"><span style="font-weight:400">_ _ _ _ _ _ _ _ _ _ _ _ _ _ _</span> </span></td></tr>
                    <tr><td>Department</td><td><span class="myFontBg empDepartment"><span style="font-weight:400">_ _ _ _ _ _ _ _ _ _ _ _ _ _ _</span> </span></td></tr>
                    <tr><td>Notice Period</td><td>_ _ _ _ _ _ _ _ _ _ _ _ _ _ _</td></tr>
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
<script src="<?php echo base_url("assets/js/html2pdf.bundle.js");?>"></script>
<script>
 const downloadButton = document.getElementById("downloadFrm");
        downloadButton.addEventListener('click', function()
		{
			const element = document.getElementById("getPrfrmList");
            const options = {
                margin:       [5,5,5,5],
                filename:     "download.pdf",
                image:        { type: "jpeg", quality: 0.98 },
                html2canvas:  { scale: 2,letterRendering: true },
                jsPDF:        { unit: "mm", format: "a4", orientation: "portrait" }
            };
		    html2pdf().from(element).set(options).save();
			 $("#downloadFrm").html('<i class="fe fe-download-cloud me-2"></i> Download');
        });
$(function() 
{
	$(document).on("click", ".getAction", function() 
	{
		let actNbtn=$(this).attr("data-id");
		let getData=actNbtn.split("===");
	    if(getData[0]=="searchEmployee")
		{	
			$("#searchEmployee").html('<i class="fe fe-sun bx-spin"></i> Please Wait');
			$.post(base_url+getData[1],{id:$('#find_emp_id').val()},function(htmlAmi)
			{
				if(htmlAmi.addClas=='tst_success')
				{
					//$('#nmOfEmplyee').html(htmlAmi.empName+"<br>"+htmlAmi.address);
					//$('#panOfEmplyee').html(htmlAmi.pan_nu);
					$('#empCity').html(htmlAmi.cityPin);	
					$('.empDepartment').html(htmlAmi.department);
					$('.empCode').html(htmlAmi.empCode);
					$('#empAddress').html(htmlAmi.address);
					$('.empContact').html(htmlAmi.empContact);
					$('.empDesign').html(htmlAmi.designation);
					$('.empName').html(htmlAmi.empName);
					}
				toastMultiShow(htmlAmi.addClas,htmlAmi.msg, htmlAmi.icon);
				$('#searchEmployee').html('<i class="ti-search"></i> Search');
				},'json');
		}			
	});
});

</script>
