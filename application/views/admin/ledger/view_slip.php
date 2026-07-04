<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Member Name</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Philosopher:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
<style>
.body {
	font-family: Arial, sans-serif;
}
@media print {
body {
	-webkit-print-color-adjust: exact;
}
.miTrBck {
	background-color:#088;
	text-align:left;
	color:#fff;
	text-transform:uppercase;
}
table {
	border-collapse: collapse;
}
table, tbody tr, td {
	border: 1px solid rgba(0, 0, 0, 0.2);
}
table thead tr, th {
	border: 1px solid rgba(0, 0, 0, 0.2);
}
@page {
size: A4;
margin: 0;
}
.page {
	height: 288mm;
	margin:15px;
	border: 0px solid rgba(0, 0, 0, 0.1);
}
.table2 {
	width:100%;
}
.miBld {
	font-weight:bolder !important;
}
.table2 {
	font-family: "Philosopher", sans-serif;
}
.table2 tr td, th {
	font-size: 12px;
	padding:10px;
}
.left {
	float: left;
	font-size: 8px;
}
.right {
	float: right;
	font-size: 8px;
}
.cmpnyHd {
	font-size: 14px;
	font-weight: 600;
	text-align: left;
	width:100%;
}
h5, h6 {
	margin: 0;
}
td p {line-height: 1;margin: 2px;font-size: 10px;}
.company {text-align: center;padding: 10px 10px;}
}
.company img {
	width:100%;
}
.slfMnth {
	padding: 10px;
	font-size: 1rem;
	background-color: #011b59;
	color: #fff;
	margin-bottom: 15px;
	text-align:center;
}
.miEmpDet {
	width:100%;
	border:0PX SOLID #000 !important
}
.miEmpDet {
	font-size:14px;
	margin:-10px 0px 20px 0px;
}
.miEmpDet tbody tr {
	border:0px solid #000 !important;
}
.miEmpDet tbody tr td {
	border: 0px solid #000 !important;
}
.miEmpDet thead tr th {
	border: 0px solid #000 !important;
}
.miEmpDet tr td {
	padding: 5px;
	border:0px solid #000;
}
.stTxt {
	color: #717171;
	font-weight: normal;
}
.stDet {
	font-weight:900 !important;
}
.miDot {
	float:right;
	font-weight:900;
	padding-right:10px;
}
</style>
</head>
<body>
 <?php //print_r($salaryDetails);
		$getMonth=array('01'=>'January','02'=>'February','03'=>'March','04'=>'April','05'=>'May','06'=>'June','07'=>'July','08'=>'August','09'=>'September','10'=>'October','11'=>'November','12'=>'December');
		$salarySlipMnth=$getMonth[$paySlipDetail->month].' '.$paySlipDetail->year;
		
		
		?>
<div class="body">
  <div class="page">
    <div class="company"><img src="<?php echo base_url('uploads/company/payslip_heading.png');?>" alt="logo"></div>
    <div class="slfMnth">  Salary Slip for the month of <strong><?php echo $salarySlipMnth;?></strong> </div>
    <div style="padding:5px;">
     
      <table class="miEmpDet">
        <tr>
          <td><span class="stTxt">Branch</span> <span class="miDot">:</span></td>
          <td colspan="3"><span class="stDet"><?php echo $paySlipDetail->branch_name;?></span></td>
        </tr>
        <tr>
          <td><span class="stTxt">Name</span> <span class="miDot">:</span></td>
          <td><span class="stDet"><?php echo $paySlipDetail->name;?></span></td>
          <td><span class="stTxt">Month</span><span class="miDot">:</span></td>
          <td><span class="stDet"><?php echo $getMonth[$paySlipDetail->month].' '.$paySlipDetail->year;?></span></td>
        </tr>
        <tr>
          <td><span class="stTxt">Employee ID</span><span class="miDot">:</span></td>
          <td><span class="stDet"><?php echo $paySlipDetail->employee_id;?></span></td>
          <td><span class="stTxt">Pay Date</span><span class="miDot">:</span></td>
          <td><span class="stDet"><?php echo $paySlipDetail->pay_date?date('d/m/Y',strtotime($paySlipDetail->pay_date)):'N/A';?></span></td>
        </tr>
        <tr>
          <td><span class="stTxt">Designation</span><span class="miDot">:</span></td>
          <td><span class="stDet"><?php echo $paySlipDetail->designation_name;?></span></td>
          <td><span class="stTxt">No. of days Worked</span><span class="miDot">:</span></td>
          <td><span class="stDet" id="wrkngDy"><?php echo $salaryDetails['totalPresent'];?></span></td>
        </tr>
        <tr>
          <td><span class="stTxt">Account Number</span><span class="miDot">:</span></td>
          <td><span class="stDet"><?php echo $paySlipDetail->bank_account_no;?></span></td>
          <td><span class="stTxt">UAN Number</span><span class="miDot">:</span></td>
          <td><span class="stDet">&nbsp</span></td>
        </tr>
         <tr>
          <td><span class="stTxt">Date of Joining.</span><span class="miDot">:</span></td>
          <td><span class="stDet"><?php echo $paySlipDetail->pan_nu?$paySlipDetail->pan_nu:'N/A';?></span></td>
          <td><span class="stTxt">ESIC Number</span><span class="miDot">:</span></td>
          <td><span class="stDet"><?php echo $paySlipDetail->net_pay;?>/-</span></td>
        </tr> 
        <tr>
          <td><span class="stTxt">PAN No.</span><span class="miDot">:</span></td>
          <td><span class="stDet"><?php echo $paySlipDetail->pan_nu?$paySlipDetail->pan_nu:'N/A';?></span></td>
          <td><span class="stTxt">Confirmed Salary</span><span class="miDot">:</span></td>
          <td><span class="stDet"><?php echo $paySlipDetail->net_pay;?>/-</span></td>
        </tr>
      
        
      </table>
    </div>
    <div style="padding:5px; margin-top:-20px;">
      <table class="table2" align="center">
        <thead class="miTrBck" >
          <tr>
            <th>Earnings</th>
            <th>Amount</th>
            <th>Deductions</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><span class="miSpns">Basic</span></td>
            <td><span class="miBld"><?php echo $salaryDetails['basic_sal'];?></span></td>
            <td><span class="miSpns">Provident Fund</span></td>
            <td><span class="miBld"><?php echo $salaryDetails['pfAmt'];?></span></td>
          </tr>
          <tr>
            <td><span class="miSpns">House Rent Allowance</span></td>
            <td><span class="miBld"><?php echo $salaryDetails['hraAmt'];?></span></td>
            <td><span class="miSpns">Advance</span></td>
            <td><span class="miBld"><?php echo $salaryDetails['advance'];?></span></td>
          </tr>
          <tr>
            <td><span class="miSpns">Travelling Allowance</span></td>
            <td><span class="miBld"><?php echo $salaryDetails['taAmt'];?></span></td>
            <td><span class="miSpns"> Tds</span></td>
            <td><span class="miBld"><?php echo $salaryDetails['tdsAmt'];?></span></td>
          </tr>
          <tr>
            <td><span class="miSpns">Transportation Allowance</span></td>
            <td><span class="miBld"><?php echo $salaryDetails['daAmt'];?></span></td>
            <td>Insurance</td>
            <td><span class="miBld"><?php echo $salaryDetails['insurance'];?></span></td>
          </tr>
          <tr>
            <td><span class="miSpns">Education Allowance</span></td>
            <td><span class="miBld"><?php echo $salaryDetails['paAmt'];?></span></td>
            <td>Other Deduction</td>
            <td><span class="miBld"><?php echo $salaryDetails['othrDeduction'];?></span></td>
          </tr>
          <tr>
            <td><span class="miSpns">Bonus</span></td>
            <td colspan="3"><span class="miBld"><?php echo $salaryDetails['bonus'];?></span></td>
          </tr>
          <tr>
            <td>Special Allowance</td>
            <td colspan="3"><span class="miBld"><?php echo $salaryDetails['medical'];?></span></td>
          </tr>
          <tr>
            <td>Insentive</td>
            <td colspan="3"><span class="miBld"><?php echo $salaryDetails['insentive'];?></span></td>
          </tr>
          <tr>
            <td>Other Income</td>
            <td colspan="3"><span class="miBld"><?php echo $salaryDetails['otherInc'];?></span></td>
          </tr>
          <tr>
            <th>Gross Earnings</th>
            <td><?php $getGross=$salaryDetails['basic_sal']+$salaryDetails['hraAmt']+$salaryDetails['taAmt']+$salaryDetails['daAmt']+$salaryDetails['paAmt']+$salaryDetails['bonus']+$salaryDetails['medical']+$salaryDetails['insentive']+$salaryDetails['otherInc'];
						$netGrossDesuction=$salaryDetails['pfAmt']+$salaryDetails['tdsAmt']+$salaryDetails['advance']+$salaryDetails['insurance']+$salaryDetails['othrDeduction'];
						?>
              <span class="miBld"> Rs.<?php echo $getGross;?></span> </td>
            <th>Gross Deductions</th>
            <td><span class="miBld">Rs.<?php echo $netGrossDesuction;?></span></td>
          </tr>
          <tr>
            <td></td>
            <td><strong>NET PAY</strong></td>
            <td colspan="2"><span class="miBld">Rs.<?php echo $paySlipDetail->net_pay;?>/-</span></td>
          </tr>
           <tr>
            <td></td>
            <td colspan="3"><span class="miBld">Rs.<?php echo $this->common->getIndianCurrency($paySlipDetail->net_pay);?>/-</span></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div style="text-align: right; margin-top:100px;margin-right:20px;"> <strong>Auth. Signature</strong> </div>
    <div style="text-align:left; margin-top:50px; font-size:11px; color:#666666;"><strong>Note:</strong> This is the computer-generated pay slip hence signature is not required.  </div>
  </div>
</div>
</body>
</html>
