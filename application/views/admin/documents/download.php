<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
<meta name="description" content="<?php echo system_info('company_name'); ?>">
<meta name="author" content="<?php echo system_info('company_name'); ?>">
<meta name="keywords" content="<?php echo system_info('company_name'); ?>">
<!-- TITLE -->
<title><?php echo $title; ?>|<?php echo system_info('company_name'); ?></title>
<link rel="shortcut icon" href="<?php echo base_url(system_info('favicon')) ?>">
<script src="<?php echo base_url('db/jquery.min.js');?>"></script>
<style>
#payFormat {font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;}
#payFormat td, #payFormat th {border: 1px solid #ddd;padding: 8px;}
#payFormat th {padding-top: 12px;padding-bottom: 12px;text-align: left;background-color: #04AA6D;color: white;}
.parent {display: flex;font-weight: 700;text-align: center;text-transform: uppercase;font-size: 1.25rem;border-top: 1px solid #e3e3e3;padding-top:0px;margin-bottom: -20px;}
.child {padding: 10px;text-align: center;}
.child-1 {width: 25%;text-align:left;font-weight: lighter;font-size: .75rem;padding-top: 17px;}
.child-2 {width: 50%;}
.child-3 {width: 25%;text-align:right;font-weight: lighter;font-size: .75rem;padding-top: 5px;}
#printDataArea {width: 100%;padding: 20px;background-color: #f4f4f4;border: 1px solid #ccc;}
.offrHdrImg {margin-top:0px;}
.offrHdrImg img {width:100%;padding-top:0px;}
.offrFtrImg { margin-bottom:30px;}
.offrFtrImg  img {width:100%;padding-top:0px; border-top:1px solid #e1e1e1;margin-top: 155px;}
#getPrfrmList {min-height:350px;}
#find_emp_id {border:1px solid #5248B5 !important}
.appointment-letter
{
	padding:30px 20px;font-size: 14px; td {padding:5px 10px;border: 1px solid #d9d9d9;font-size:11px;}
	table {width:100%;font-size: 12px;}
}
.myFontBg {font-weight:700;}
.page-break {page-break-before: always;}
.baComponent {background-color:#F2F2F2;font-weight: 700;}
.mrvPd{padding-left:10px;}
@media (max-width: 768px) {
 #printDataArea {font-size: 14px;}
}
@media (min-width: 769px)
{
 	#printDataArea {font-size: 18px; }
}
h1 {color: #333;}p {color: #666;}

@page {size: A4; margin:0mm}
#print_Attendance {width: 230mm;height: 100%;padding:0mm;box-sizing: border-box;overflow: hidden;}
@media print {
    body {margin: 0;padding: 0;}
    #print_Attendance {width: 230mm;height: 100%;padding: 15mm;box-sizing: border-box;}
}
@media (max-width: 768px)
{
    #print_Attendance { width: 100%;height: auto;padding: 10px;font-size: 14px;}
}

/*
onLoad="generatePDF_2();"
*/
</style>
</head>
<body onLoad="generatePDF_2();">
<br />
<div id="print_Attendance">
 <?php if($printData)
 		{
			echo $printData;
			}else{
 		?>
					Please try again 
 
  <!--<div class="offrHdrImg"> <img src="http://localhost/attendance/uploads/company/offer_letter.png"> </div>
  <div class="parent mrvPd">
    <div class="child child-1"><strong> Ref. No. - </strong>ASU_AAPL_18-19</div>
    <div class="child child-2">Offer Letter</div>
    <div class="child child-3">
      <p><strong>Date : </strong>'.date('d/m/Y').'</p>
    </div>
  </div>
  <div id="getPrfrmList">
    <div class="appointment-letter">
      <p>Mr./Ms. <span class="empFlName myFontBg">Akash Nareshbhai Chunara</span> <br/>
        <span class="myFontBg" id="empAddr">Tapasvinagar Soc, Khambhat,</span><br/>
        City-<span class="myFontBg" id="empCity">Anand, Gujarat</span> ,<br />
        PIN <span class="myFontBg" id="empZipCode">388620</span></p>
      <p> Dear <span class="empFlName myFontBg">Akash Nareshbhai Chunara</span>, </p>
      <p> It is our pleasure to extend the following offer of employment to you on behalf of <span class="myFontBg">'.system_info('company_name').'</span>. </p>
      <p>further to the interview and discussions you have had with us. You are appointed to the position of "<span class="myFontBg empDesign">Designation</span>" at  "<span class="myFontBg empDepartment">Department Name</span>" and you are expected to join duty on <span class="myFontBg">01.01.2025</span> under the following terms and conditions: </p>
      <p>You will be on probation period (<strong>from your date of joining</strong>) for 6 months and on satisfactory completion of the probation period you will be entitled for the confirmation. </p>
      <p>This offer will be subject to the standard terms and conditions of employment by <strong>ASHUTOSH</strong> and also will be governed by the policies, rules and guidelines of the Company.</p>
      <p  style="text-align:justify">Please note that this offer is valid subject to your signing (authentic signature Pl.) and returning the duplicate copy of this letter within 3 working days with your Date of Joining. You will be given a remuneration as per CTC structure attached.You will not be entitled for any kind of leave except one casual leave during Probation period.</p>
      <p  style="text-align:justify">That your appointment will be further subject to the verification of your credentials, testimonials and other particulars mentioned by you in your application at the time of your appointment. In case it comes to the notice of the Management that the particulars given by you in your appointment were wrong or concealed, your appointment shall be rendered void ab initio and will, therefore, be deemed cancelled automatically.You will be issued a detailed appointment letter after your confirmation at the concerned branch offices and upon completion of joining formalities.Further, during the course of your employment, if it is found that you have been indulging into any kind of irregularity, process lapse, fraud and misappropriation, the Company reserves the right to take appropriate action including immediate termination of your employment.
        Company retains right to transfer you at any other location at any point of time during the course of your employment.
        The notice period for resignation of services more than 6 months is 60 days and  less than 6 months  is 45 days.</p>
      <div style="text-align:justify">
        <p>In case of any dispute, the jurisdiction shall remain in Ahmedabad only.
          Kindly note that this offer is subject to positive reference check.
          This offer is valid subject to positive report of Reference check, Equifax, Employee bureau.</p>
        <p><strong>Declarations:</strong> This appointment is made on the basis of information provided by you. Should it prove untrue incorrect at any time, the Company reserves the rights to take appropriate action including forthwith termination of service. We shall be entitled to initiate necessary enquiries with the source of reference provided by you. In case of unfavorable report, we shall be entitled to take appropriate steps including forthwith terminating this agreement. Wish you a successful professional stint with us. We look forward to a mutually beneficial and enriching experience having you on board. All the best!</p>
      </div>
      <div class="page-break"></div>
      <div style="float:right;width:35%;"><span style="font-size:11px;">I have read the above terms and conditions of my appointment. I accept the same.</span><br/><br/><br/><br/>
        _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _<br/><br/><br/>
        Applicant Name Akash Nareshbhai Chunara<br/><br/>
        Employee Code EMP9001</div>
    
      <p style="clear: both;">Encl: <span class="myFontBg"> 1) Service Agreement </span></p>
      <table id="payFormat">
        <tr>
          <td colspan="2"  style="text-align:center"><span class="myFontBg">ANNEXURE I</span></td>
        </tr>
        <tr>
          <td style="text-align:center" colspan="2"><span class="myFontBg">'.system_info('company_name').'</span></td>
        </tr>
        <tr>
          <td style="width:40%">Employee No </td>
          <td><span class="myFontBg">EMP9001</span></td>
        </tr>
        <tr>
          <td style="width:40%">Name </td>
          <td><span class="myFontBg" style="text-transform:uppercase;"> Akash Nareshbhai Chunara</span></td>
        </tr>
        <tr>
          <td style="width:40%">Designation </td>
          <td><span class="myFontBg" style="text-transform:uppercase;">Designation</span></td>
        </tr>
        <tr>
          <td style="width:40%">Department </td>
          <td><span class="myFontBg" style="text-transform:uppercase;">Department Name</span></td>
        </tr>
        <tr>
          <td style="width:40%">Date of Joining </td>
          <td><span class="myFontBg">01.02.2024</span></td>
        </tr>
        <tr>
          <td style="width:40%">Remarks </td>
          <td></td>
        </tr>
        <tr class="baComponent">
          <td style="width:40%">SALARY COMPONENTS </td>
          <td>INR PER MONTH</td>
        </tr>
        <tr>
          <td style="width:40%">Basic </td>
          <td><span class="myFontBg">7060</span></td>
        </tr>
        <tr>
          <td style="width:40%">HRA </td>
          <td><span class="myFontBg">3530</span></td>
        </tr>
        <tr>
          <td style="width:40%">Transportation Allowance</td>
          <td><span class="myFontBg">2353</span></td>
        </tr>
        <tr>
          <td style="width:40%">Professional Development Allowance </td>
          <td><span class="myFontBg">2353</span></td>
        </tr>
        <tr>
          <td style="width:40%">Education Allowance </td>
          <td><span class="myFontBg">2353</span></td>
        </tr>
        <tr>
          <td style="width:40%">INTERIM Bonus </td>
          <td><span class="myFontBg">1800</span></td>
        </tr>
        <tr>
          <td style="width:40%">Specical Allowance </td>
          <td><span class="myFontBg">4080</span></td>
        </tr>
        <tr>
          <td style="width:40%">GROSS SALARY</td>
          <td><span class="myFontBg">23534</span></td>
        </tr>
        <tr>
          <td style="width:40%">PF-Contribution Employee</td>
          <td><span class="myFontBg">847</span></td>
        </tr>
        <tr>
          <td style="width:40%">PF-Contribution Employer</td>
          <td><span class="myFontBg">847</span></td>
        </tr>
        <tr>
          <td style="width:40%">PT </td>
          <td><span class="myFontBg">200</span></td>
        </tr>
        <tr>
          <td style="width:40%">ESIC Employee </td>
          <td><span class="myFontBg">177</span></td>
        </tr>
        <tr>
          <td style="width:40%">ESIC Employer </td>
          <td><span class="myFontBg">765</span></td>
        </tr>
        <tr>
          <td style="width:40%">Income Tax</td>
          <td><span class="myFontBg">0</span></td>
        </tr>
        <tr>
          <td style="width:40%">Net Pay</td>
          <td><span class="myFontBg">22310</span></td>
        </tr>
        <tr>
          <td style="width:40%">CTC </td>
          <td><span class="myFontBg">25146</span></td>
        </tr>
      </table>
      <p>We at <strong>Company Name</strong> would like to create an environment and culture committed to co-operation,quality and responsiveness that permits every activity.</p>
      <p>We take this oppertunity to wish you the very best in your tenure with tenure of contact with <strong>Company Name</strong>.</p>
      <p>Your sincerely,</p>
      <p>  For <span class="myFontBg" style="text-transform:uppercase;">'.system_info('company_name').'</span> </p>
      <p>Name,<br/><br/><br/>
        Authorised Signatory</p>
        
       <p>Please indicates your acceptance of the terms by signing and returning the duplicates copy hereof</p>
       
       <p>NAME :-<span style="font-weight:700;">________________________________________</span></p>
       
       <p>SIGNATURE WITH DATE :-<span style="font-weight:700;">________________________________________</span></p>
       
       
    </div>
  </div>-->
  <?php }?>
</div>
<!-- html2canvas library -->
<script src="<?php echo base_url('db/html2canvas.min.js');?>"></script>
<!-- jsPDF library -->
<script src="<?php echo base_url('db/jspdf.umd.js');?>"></script>
<script>
window.jsPDF = window.jspdf.jsPDF;
function generatePDF_2()
 {
	var doc = new jsPDF({orientation: 'portrait'});var elementHTML = document.querySelector("#print_Attendance");
	doc.html(elementHTML,{callback:function(doc){doc.save('<?php echo $docSaveNm;?>.pdf');},margin:[5, 5, 5,5],autoPaging:'text',x:0,y:0,width:190,windowWidth:825});
	closeW();
}


function closeW()
{
	setInterval(function(){ window.close();},3500);
}
</script>
</body>
</html>
