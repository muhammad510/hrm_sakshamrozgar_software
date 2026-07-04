<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
<meta name="description" content="<?php echo system_info('company_name'); ?>">
<meta name="author" content="<?php echo system_info('company_name'); ?>">
<meta name="keywords" content="<?php echo system_info('company_name'); ?>">
<!-- TITLE -->
<title><?php echo $title; ?> | <?php echo system_info('company_name'); ?></title>
<link rel="shortcut icon" href="<?php echo base_url(config_item('logo_sm')); ?>">
<script src="<?php echo base_url('db/jquery.min.js');?>"></script>
<style>
.empTitle{width:95pt;white-space:nowrap !important;padding:1px 4px 1px 4px;color:black;font-family:"Courier New", monospace;font-style:normal;font-weight:bold;text-decoration:none;font-size:9pt;text-transform:uppercase;}.empHead{width:95pt;border-top-style:solid;border-top-width:1pt;white-space:nowrap !important;padding:1px 4px 1px 4px;color:black;font-family:"Courier New", monospace;font-style:normal;font-weight:bold;text-decoration:none;font-size:9pt;}.arvTtl{padding: 1px 4px 1px 4px;border-top:0px solid #000;}.arvTtl p{padding-top:2pt;text-indent: 0pt;text-align: left;font-size: 9pt;font-weight: bold;text-transform:uppercase;}	
.arvHdr{padding: 1px 4px 1px 4px;border-top: 1px solid #000;}.arvHdr p{padding-top:2pt;text-indent: 0pt;text-align: left;font-size: 9pt;font-weight: bold;}
.atDnce thead > tr:first-child {height: 10pt !important;}.atDnce thead > tr:nth-of-type(2) {height:23pt !important;}
* {margin:0; padding:0; text-indent:0; }
 .s1 { color: black; font-family:"Courier New", monospace; font-style: normal; font-weight: bold; text-decoration: none; font-size: 8.5pt; }
 .s2 { color: black; font-family:"Courier New", monospace; font-style: normal; font-weight: bold; text-decoration: none; font-size: 8pt; }
 .s3 { color: black; font-family:"Courier New", monospace; font-style: normal; font-weight: normal; text-decoration: none; font-size: 8.5pt; }
 .s4 { color: black; font-family:"Times New Roman", serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 8.5pt; }
 .s5 { color: black; font-family:"Courier New", monospace; font-style: normal; font-weight: normal; text-decoration: none; font-size: 9pt; }
 p { color: black; font-family:"Courier New", monospace; font-style: normal; font-weight: normal; text-decoration: none; font-size: 8.5pt; margin:0pt; }
 .s6 { color: black; font-family:"Times New Roman", serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 8.5pt; }
 .s7 { color: black; font-family:"Courier New", monospace; font-style: normal; font-weight: normal; text-decoration: none; font-size: 9pt; }
 .s8 { color: black; font-family:"Times New Roman", serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 9pt; }
 .s9 { color: black; font-family:"Courier New", monospace; font-style: normal; font-weight: normal; text-decoration: none; font-size: 8.5pt; vertical-align: 1pt; }
 .s10 { color: black; font-family:"Times New Roman", serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 8.5pt; vertical-align: 1pt; }
 .s11 { color: black; font-family:"Times New Roman", serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 8pt; }
 h1 { color: black; font-family:"Courier New", monospace; font-style: normal; font-weight: bold; text-decoration: none; font-size: 8pt; }
 table, tbody {vertical-align: top; overflow: visible; }
/*******************************************************************************************/
.atMembr {border-collapse:collapse; width:1011pt;}
.atMembr thead >tr{ height:14pt;}
.atMembr thead >tr >td{white-space: nowrap; }
.atMemSr{width: 63pt; background-color:#669966;}
.atMemSr p{padding-left: 4pt;}
.atMemSec{width: 32.5mm; background-color:#669966;border-top-style:solid;border-top-width:1pt;padding-left: 5px;}
.atMemSec p{padding-top: 8pt;text-indent: 0pt; text-align:left;padding-left: 5px;}
.atMemSec_alternt{width:33mm;background-color:#669966;padding-left: 5px;border-top: 1px dotted #939393;}
.atMemSec_alternt p{padding-top: 8pt;text-indent: 0pt; text-align:left;padding-left: 5px;}
/*******************************************************************************************/

.atDnce {border-collapse:collapse;/*margin-left:14.25pt*/ margin-bottom:20pt;}
.s3{text-indent: 0pt;line-height: 10pt;text-align: center;}
.sCmn{text-indent: 0pt;line-height: 9pt;text-align: center;}
.sFrth{padding-left: 2pt;text-indent: 0pt;line-height: 10pt;text-align: center;}
.sScnd{padding-right: 2pt;text-indent: 0pt;line-height: 10pt;text-align: center;}
.sFscnd{padding-left: 1pt;text-indent: 0pt;line-height: 10pt;text-align: center;}
.sFfth{padding-left: 3pt;text-indent: 0pt;line-height: 10pt;text-align: center;}
.sEght{padding-right: 1pt;text-indent: 0pt;line-height: 10pt;text-align: center;}
.sSvnth{padding-right: 1pt;text-indent: 0pt;line-height: 10pt;text-align: center;}
.sFrst{padding-left: 2pt;text-indent: 0pt;line-height: 10pt;text-align: left;}
.sAtFth{padding-left: 11pt;text-indent: 0pt;line-height: 10pt;text-align: left;}
.sAtFthW{padding-left: 9pt;text-indent: 0pt;line-height: 9pt;text-align: left;}
.sSxth{padding-left: 10pt;text-indent: 0pt;line-height: 10pt;text-align: left;}
.sTue{padding-left: 8pt;text-indent: 0pt;line-height: 9pt;text-align: left;}
.sMth{padding-left: 9pt;text-indent: 0pt;line-height: 10pt;text-align: left;}
.sSun{padding-left: 7pt;text-indent: 0pt;line-height: 9pt;text-align: left;}
.sBndn{padding-left: 2pt;padding-right: 1pt;text-indent: 0pt;line-height: 10pt;text-align: center;}
.sMnSvn{padding-left: 6pt;text-indent: 0pt;line-height: 9pt;text-align: left;}
.sFrtWk{padding-left: 12pt;text-indent: 0pt;line-height: 10pt;text-align: left;}
.s25W{padding-left: 8pt;text-indent: 0pt;line-height: 10pt;text-align: left;}.wFrth{text-indent: 0pt;line-height: 9pt;text-align: center;padding-left: 2pt;}
.wFscnd{text-indent: 0pt;line-height: 9pt;text-align: center;padding-left: 1pt;}
.wBndn{text-indent: 0pt;line-height: 9pt;text-align: center;padding-left: 2pt;padding-right: 1pt;}
.prg{text-indent: 0pt;text-align: left;}.atDnce thead >tr{ height:20pt;}.atDnce tbody > tr{ height:11pt}.atDnce tbody > tr:last-child{ height:12pt !important}
.atFirstC{width:95pt; border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt; white-space: nowrap !important;padding: 1px 4px 1px 4px; }
.attScndC{width:31pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt}
.atThrdC{width:35pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt}
.atFrth{width:34pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt}
.atFfth{width:32pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt}
.atSxth{width:30pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt}
.atSvnth{width:33pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt}
.atEgth{width:36pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt}


</style>
</head>
<body onLoad="generatePDF_2();">
<br />
	<div id="print_Attendance">
<br><br>
<?php
/*if($getRecord){foreach($getRecord as $det){print_r($det);echo '<br>';} }*/	//print_r($employeeList[1]);//echo '<br>'.$this->db->last_query();
	if($getRecord)
	{
		$counter=0;
		foreach($getRecord as $lst)
		{
			$counter++;			
			$isBorder=($counter=='1')?'atMemSec':'atMemSec_alternt';	
			$headerTitle='<tr><td class="empTitle">Sr. No</td> <td colspan="3" class="arvTtl"><p>User ID</p></td><td colspan="6" class="arvTtl"><p>Name</p></td><td colspan="6" class="arvTtl"><p>Department</p></td>
							   <td colspan="6" class="arvTtl"><p>Designation</p></td><td colspan="7" class="arvTtl"><p>Branch</p></td><td colspan="3" style="border-top:0px solid #000;"><p style="float:right;margin-right:25px;font-weight:bold;">OT</p></td>
						  </tr>';
			if($counter=='1'){$headers=$headerTitle;$onTop='border-top-style:solid;border-top-width:1pt';}
			else if($counter %6===0){$onTop='border-top-style:solid;border-top-width:1pt';$headers=$headerTitle;}
			else{$onTop='border-top: 1px dotted #939393;';$headers='';}			  			
			?>		

<table class="atDnce" cellspacing="0">
 <?php 
 	$firstColmn=array('','Shift','First IN','Last Out','WrkHrs','Net-Work Hours');$frstCnt=0;$tbody='';
  	foreach($firstColmn as $static)
	{
		$frstCnt++;
		 $whereFind=array('srNo'=>$frstCnt,'userId'=>$lst->id,'shift_timing'=>$lst->shift,'shift_start'=>$lst->shift_start,'shift_end'=>$lst->shift_end,'frmDate'=>$frmDate,'lastDate'=>$lastDate);
		 $trResult=$this->common->attendanceReport($whereFind);
		 if($frstCnt=='1')
		 {
		 	echo '<thead>'.$headers.'
					<tr>
					  <td class="empHead" style="'.$onTop.'">'.$counter.'</td>
					  <td colspan="3" class="arvHdr" style="'.$onTop.'"><p>'.$lst->empCode.'</p></td>
					  <td colspan="6" class="arvHdr" style="'.$onTop.'"><p>'.($lst->full_name?$lst->full_name.' ':'').'</p></td>   
					  <td colspan="6" class="arvHdr" style="'.$onTop.'"><p>'.$lst->department_name.'</p></td>
					  <td colspan="6" class="arvHdr" style="'.$onTop.'"><p>'.$lst->designation_name.'</p></td>
					  <td colspan="7" class="arvHdr" style="'.$onTop.'"><p>'.$lst->branch_name.'</p></td>
					  <td colspan="3" style="'.$onTop.'">
						<p class="s2" style="padding-left: 8pt;text-indent: 0pt;line-height: 9pt;text-align: right; padding-right: 10px;">WrkHrs</p>
						<p class="s3" style="padding-left: 5pt;text-indent: 0pt;text-align: right; padding-right:10px;">'.$trResult['tWrkHrs'].'</p>
					  </td>
				  </tr>
					<tr><td class="atFirstC"><p class="prg"><br/></p></td>'.$trResult['hrThead'].'</tr>
				  </thead>';
		 }
		 else
		 {
		 	 if($static=='Shift'){$tbody.='<tr><td class="atFirstC"><p class="sFrst">'.$static.'</p></td>'.$trResult['hrBody'].'</tr>';}
			else if($static=='First IN'){$tbody.='<tr><td class="atFirstC"><p class="sFrst">'.$static.'</p></td>'.$trResult['hrBody'].'</tr>';}
			else if($static=='Last Out'){$tbody.='<tr><td class="atFirstC"><p class="sFrst">'.$static.'</p></td>'.$trResult['hrOutBody'].'</tr>';}
			else if($static=='WrkHrs'){$tbody.='<tr><td class="atFirstC"><p class="sFrst">'.$static.'</p></td>'.$trResult['workHrs'].'</tr>';}
			else if($static=='Net-Work Hours'){$tbody.='<tr><td class="atFirstC"><p class="sFrst">'.$static.'</p></td>'.$trResult['hrNetWrk'].'</tr>';}
			else{$tbody.='<tr><td class="atFirstC"><p class="sFrst">'.$static.'</p></td></tr>';}
		  }
			
		}
	echo '<tbody>'.$tbody.'</tbody>';
  
  	?>
</table>
		<?php }}?>

</div>
<!-- html2canvas library -->
<script src="<?php echo base_url('db/html2canvas.min.js');?>"></script>
<!-- jsPDF library -->
<script src="<?php echo base_url('db/jspdf.umd.js');?>"></script>
<script>
window.jsPDF = window.jspdf.jsPDF;
function generatePDF_2()
 {
	var doc = new jsPDF({orientation: 'landscape'});var elementHTML = document.querySelector("#print_Attendance");
	doc.html(elementHTML,{callback:function(doc){doc.save('<?php echo $file_name?>.pdf');},margin:[5, 5, 5,5],autoPaging:'text',x:0,y:0,width:190,windowWidth:825});
	closeW();
}
function closeW()
{
	setInterval(function(){ window.close();},30000);
}
</script>
</body>
</html>
