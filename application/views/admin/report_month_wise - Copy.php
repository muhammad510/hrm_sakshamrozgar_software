<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
<meta name="description" content="<?php echo config_item('company_name'); ?>">
<meta name="author" content="<?php echo config_item('company_name'); ?>">
<meta name="keywords" content="<?php echo config_item('company_name'); ?>">
<!-- TITLE -->
<title><?php echo $title; ?> | <?php echo config_item('company_name'); ?></title>
<link rel="icon" href="<?php echo base_url('assets/img/fbicon.ico'); ?>">
<script src="<?php echo base_url('db/jquery.min.js');?>"></script>
<style>

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

.atMembr {border-collapse:collapse;}
.atMembr thead >tr{ height:10pt;}
.atMembr thead >tr >td{white-space: nowrap; }
.atMemSr{width: 115pt;}
.atMemSr p{padding-left: 4pt;}
.atMemSec{width: 115pt;border-top-style:solid;border-top-width:1pt}
.atMemSec p{padding-top: 8pt;text-indent: 0pt; text-align:left;padding-left: 5px;}
/*******************************************************************************************/

.atDnce {border-collapse:collapse;/*margin-left:14.25pt*/}
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
.s25W{padding-left: 8pt;text-indent: 0pt;line-height: 10pt;text-align: left;}

   .wFrth{text-indent: 0pt;line-height: 9pt;text-align: center;padding-left: 2pt;}
   .wFscnd{text-indent: 0pt;line-height: 9pt;text-align: center;padding-left: 1pt;}
   .wBndn{text-indent: 0pt;line-height: 9pt;text-align: center;padding-left: 2pt;padding-right: 1pt;}


.prg{text-indent: 0pt;text-align: left;}
.atDnce thead >tr{ height:20pt;}
.atDnce tbody > tr{ height:11pt}
.atDnce tbody > tr:last-child{ height:12pt !important}

.atFirstC{width:95pt; border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt; white-space: nowrap !important; }
.attScndC{width:31pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt}
.atThrdC{width:35pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt}
.atFrth{width:34pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt}
.atFfth{width:32pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt}
.atSxth{width:30pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt}
.atSvnth{width:33pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt}
.atEgth{width:36pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt}

/*
onLoad="generatePDF_2();"
*/</style>
</head>
<body >

<br />
<?php 
	$getTdCls=array('attScndC','atThrdC','atFrth','atFrth','atFrth','atFrth','atThrdC','atFrth','atFrth','atFrth','atFrth','atSvnth','atThrdC','atFrth','atFfth','attScndC','atFfth','attScndC','atFfth','atSxth','atFfth','atFfth','atFfth','atFfth','attScndC','atFfth','attScndC','atSxth','atSvnth','atSvnth','atEgth');
	$tDyCls=array('s3','s3','sFrth','s3','sFscnd','sBndn','s3','sFrth','sFscnd','sAtFth','sFrtWk','sSxth','s3','sSxth','sSxth','sMth','sMth','sMth','sMth','sSxth','sAtFth','s3','s3','sMth','s25W','sFrtWk','sSxth','sMth','s3','sSxth','sSxth'); 
	$tWeekCls=array('sCmn','sCmn','wFrth','sCmn','sFscnd','wBndn','sCmn','wFrth','wFscnd','sAtFthW','sAtFthW','sTue','sCmn','sTue','sTue','sSun','sMnSvn','sSun','sSun','sSun','sAtFthW','sCmn','sCmn','sSun','sMnSvn','sAtFthW','sTue','sSun','sCmn','sTue','sTue');
?>
<div id="print_Attendance">
<table class="atMembr" cellspacing="0">
  <tbody>
    <tr>
      <td class="atMemSr"><p class="s1">Sr No</p></td>
      <td style="width:55pt;border-bottom-style:solid;border-bottom-width:1pt;"><p class="s1">User ID</p></td>
      <td style="width:103pt;border-bottom-style:solid;border-bottom-width:1pt"><p class="s2" style="padding-left: 33pt;text-indent: 0pt;line-height: 9pt;text-align: left;">Name</p></td>
      <td style="width:169pt;border-bottom-style:solid;border-bottom-width:1pt"><p class="s2" style="padding-left: 102pt;text-indent: 0pt;line-height: 9pt;text-align: left;">Department</p></td>
      <td style="width:99pt;border-bottom-style:solid;border-bottom-width:1pt"><p class="s2" style="padding-left: 31pt;text-indent: 0pt;line-height: 9pt;text-align: left;">Designation</p></td>
      <td style="width:69pt;border-bottom-style:solid;border-bottom-width:1pt"><p class="s2" style="padding-left: 31pt;text-indent: 0pt;line-height: 9pt;text-align: left;">Branch</p></td>
      <td style="width:94pt;border-bottom-style:solid;border-bottom-width:1pt"><p class="s2" style="padding-right: 2pt;text-indent: 0pt;line-height: 9pt;text-align: right;">PR</p></td>
      <td style="width:32pt;border-bottom-style:solid;border-bottom-width:1pt"><p class="s2" style="padding-right: 1pt;text-indent: 0pt;line-height: 9pt;text-align: right;">WO</p></td>
      <td style="width:32pt;border-bottom-style:solid;border-bottom-width:1pt"><p class="s2" style="text-indent: 0pt;line-height: 9pt;text-align: right;">PH</p></td>
      <td style="width:30pt;border-bottom-style:solid;border-bottom-width:1pt"><p class="s2" style="padding-right: 1pt;text-indent: 0pt;line-height: 9pt;text-align: right;">PL</p></td>
      <td style="width:32pt;border-bottom-style:solid;border-bottom-width:1pt"><p class="s2" style="padding-right: 5pt;text-indent: 0pt;line-height: 9pt;text-align: right;">TR</p></td>
      <td style="width:32pt;border-bottom-style:solid;border-bottom-width:1pt"><p class="s2" style="padding-right: 3pt;text-indent: 0pt;line-height: 9pt;text-align: right;">AB</p></td>
      <td style="width:32pt;border-bottom-style:solid;border-bottom-width:1pt"><p class="s2" style="padding-right: 2pt;text-indent: 0pt;line-height: 9pt;text-align: right;">UL</p></td>
      <td style="width:31pt;border-bottom-style:solid;border-bottom-width:1pt"><p style="text-indent: 0pt;text-align: left;"><br>
        </p></td>
      <td style="width:32pt;border-bottom-style:solid;border-bottom-width:1pt"><p class="s2" style="padding-left: 9pt;text-indent: 0pt;line-height: 9pt;text-align: left;">LI</p></td>
      <td style="width:32pt;border-bottom-style:solid;border-bottom-width:1pt"><p style="text-indent: 0pt;text-align: left;"><br>
        </p></td>
      <td style="width:31pt;border-bottom-style:solid;border-bottom-width:1pt"><p style="text-indent: 0pt;text-align: left;"><br>
        </p></td>
      <td style="width:30pt;border-bottom-style:solid;border-bottom-width:1pt"><p class="s2" style="text-indent: 0pt;line-height: 9pt;text-align: center;">EO</p></td>
      <td style="width:32pt;border-bottom-style:solid;border-bottom-width:1pt"><p style="text-indent: 0pt;text-align: left;"><br>
        </p></td>
      <td style="width:33pt;border-bottom-style:solid;border-bottom-width:1pt"><p class="s2" style="text-indent: 0pt;line-height: 9pt;text-align: right;">OT</p></td>
      <td style="width:45pt;border-bottom-style:solid;border-bottom-width:1pt"><p style="text-indent: 0pt;text-align: left;"><br>
        </p></td>
    </tr>
    <tr style="height:23pt">
      <td class="atMemSec"><p class="s3">1</p></td>
      <td style="width:55pt;border-top-style:solid;border-top-width:1pt"><p class="s3" style="padding-top: 8pt;text-indent: 0pt;text-align: left;">1054</p></td>
      <td style="width:103pt;border-top-style:solid;border-top-width:1pt"><p class="s3" style="padding-top: 8pt;padding-left: 33pt;text-indent: 0pt;text-align: left;">DEV<span class="s4"> </span>KUMAR</p></td>
      <td style="width:169pt;border-top-style:solid;border-top-width:1pt"><p class="s3" style="padding-top: 9pt;padding-left: 103pt;text-indent: 0pt;text-align: left;">SOFTWARE</p></td>
      <td style="width:99pt;border-top-style:solid;border-top-width:1pt"><p class="s3" style="padding-top: 9pt;padding-left: 31pt;text-indent: 0pt;text-align: left;">Designation-1</p></td>
      <td style="width:69pt;border-top-style:solid;border-top-width:1pt"><p class="s3" style="padding-top: 8pt;padding-left: 32pt;text-indent: 0pt;text-align: left;">CAMWEL</p></td>
      <td style="width:94pt;border-top-style:solid;border-top-width:1pt"><p class="s3" style="padding-top: 8pt;padding-right: 1pt;text-indent: 0pt;text-align: right;">8.0</p></td>
      <td style="width:32pt;border-top-style:solid;border-top-width:1pt"><p class="s3" style="padding-top: 8pt;padding-right: 1pt;text-indent: 0pt;text-align: right;">4</p></td>
      <td style="width:32pt;border-top-style:solid;border-top-width:1pt"><p class="s3" style="padding-top: 8pt;text-indent: 0pt;text-align: right;">0</p></td>
      <td style="width:30pt;border-top-style:solid;border-top-width:1pt"><p class="s3" style="padding-top: 8pt;padding-right: 1pt;text-indent: 0pt;text-align: right;">0.0</p></td>
      <td style="width:32pt;border-top-style:solid;border-top-width:1pt"><p class="s3" style="padding-top: 8pt;padding-right: 4pt;text-indent: 0pt;text-align: right;">0.0</p></td>
      <td style="width:32pt;border-top-style:solid;border-top-width:1pt"><p class="s3" style="padding-top: 8pt;padding-right: 2pt;text-indent: 0pt;text-align: right;">18.0</p></td>
      <td style="width:32pt;border-top-style:solid;border-top-width:1pt"><p class="s3" style="padding-top: 9pt;padding-right: 2pt;text-indent: 0pt;text-align: right;">0.0</p></td>
      <td style="width:31pt;border-top-style:solid;border-top-width:1pt"><p class="s5" style="padding-top: 9pt;padding-right: 1pt;text-indent: 0pt;text-align: right;">0</p></td>
      <td style="width:32pt;border-top-style:solid;border-top-width:1pt"><p class="s3" style="padding-top: 8pt;padding-left: 12pt;text-indent: 0pt;text-align: left;">-</p></td>
      <td style="width:32pt;border-top-style:solid;border-top-width:1pt"><p class="s3" style="padding-top: 8pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">00:00</p></td>
      <td style="width:31pt;border-top-style:solid;border-top-width:1pt"><p class="s3" style="padding-top: 8pt;padding-right: 2pt;text-indent: 0pt;text-align: right;">0</p></td>
      <td style="width:30pt;border-top-style:solid;border-top-width:1pt"><p class="s3" style="padding-top: 8pt;text-indent: 0pt;text-align: center;">-</p></td>
      <td style="width:32pt;border-top-style:solid;border-top-width:1pt"><p class="s3" style="padding-top: 9pt;padding-left: 5pt;text-indent: 0pt;text-align: left;">00:00</p></td>
      <td style="width:33pt;border-top-style:solid;border-top-width:1pt"><p class="s3" style="padding-top: 8pt;text-indent: 0pt;text-align: right;">00:00</p></td>
      <td style="width:45pt;border-top-style:solid;border-top-width:1pt"><p class="s2" style="padding-left: 8pt;text-indent: 0pt;line-height: 9pt;text-align: left;">WrkHrs</p>
        <p class="s3" style="padding-left: 5pt;text-indent: 0pt;text-align: left;">121:12</p></td>
    </tr>
  </tbody>
</table>




<table class="atDnce" cellspacing="0">
   <thead>
   		 <tr>
         	<td class="atFirstC"><p class="prg"><br/></p></td> 
			<?php 
				  for($i=1;$i<=31;$i++) :
				  $noDayInMnth='31'/*date("t",strtotime(date('Y-m')))*/;
			 	  $getDayNm=date('D',strtotime(date('Y-m-').$i));
			 ?>
            	<td class="<?php echo $getTdCls[($i-1)];?>">
                	<p class="<?php echo ($noDayInMnth >= $i)?$tDyCls[($i-1)]:'prg';?>"><?php echo ($noDayInMnth >= $i)?$i:''; ?></p>
                    <p class="<?php echo ($noDayInMnth >= $i)?$tWeekCls[($i-1)]:'prg';?>"><?php echo ($noDayInMnth >= $i)?$getDayNm:'';?></p>
                    
                </td>
		    <?php endfor; ?>
   		</tr>
   </thead>
   <tbody>
   
  <tr>
    <td  class="atFirstC"><p class="sFrst">Shift</p></td>
    <td class="attScndC"><p class="s3">A</p></td>
    <td class="atThrdC"><p class="s3">A</p></td>
    <td class="atFrth"><p class="sFrth">A</p></td>
    <td class="atFrth"><p class="s3">A</p></td>
    <td class="atFrth"><p class="sFscnd">A</p></td>
    <td class="atFrth"><p class="sBndn">A</p></td>
    <td class="atThrdC"><p class="s3">A</p></td>
    <td class="atFfth"><p class="sFrth">A</p></td>
    <td class="atFrth"><p class="sFscnd">A</p></td>
    <td class="atFfth"><p class="sFfth">A</p></td>
    <td class="atFrth"><p class="sFscnd">A</p></td>
    <td class="atSvnth"><p class="sSvnth">A</p></td>
    <td class="atThrdC"><p class="s3">A</p></td>
    <td class="atFrth"><p class="sSvnth">A</p></td>
    <td class="atFfth"><p class="s3">A</p></td>
    <td class="attScndC"><p class="s3">A</p></td>
    <td class="atFfth"><p class="sSvnth">A</p></td>
    <td class="attScndC"><p class="sSvnth">A</p></td>
    <td class="atFfth"><p class="s3">A</p></td>
    <td class="atSxth"><p class="sFscnd">A</p></td>
    <td class="atFfth"><p class="sFrth">A</p></td>
    <td class="atFfth"><p class="s3">A</p></td>
    <td class="atFfth"><p class="s3">A</p></td>
    <td class="atFfth"><p class="s3">A</p></td>
    <td class="attScndC"><p class="sScnd">A</p></td>
    <td class="atFfth"><p class="sFfth">A</p></td>
    <td class="attScndC"><p class="sFscnd">A</p></td>
    <td class="atSxth"><p class="s3">A</p></td>
    <td class="atSvnth"><p class="s3">A</p></td>
    <td class="atSvnth"><p class="s3">A</p></td>
    <td class="atEgth"><p class="prg"><br/></p></td>
  </tr>
  <tr>
    <td  class="atFirstC"><p class="sFrst">First<span class="s4"></span>IN</p></td>
    <td class="attScndC"><p class="prg"><br/> </p></td>
    <td class="atThrdC"><p class="prg"><br/></p></td>
    <td class="atFrth"><p class="prg"><br/></p></td>
    <td class="atFrth"><p class="prg"><br/></p></td>
    <td class="atFrth"><p class="prg"><br/></p></td>
    <td class="atFrth"><p class="prg"><br/></p></td>
    <td class="atThrdC"><p class="prg"><br/></p></td>
    <td class="atFfth"><p class="prg"><br/></p></td>
    <td class="atFrth"><p class="prg"><br/></p></td>
    <td class="atFfth"><p class="prg"><br/></p></td>
    <td class="atFrth"><p class="sFscnd">09:53</p></td>
    <td class="atSvnth"><p class="sSvnth">10:07</p></td>
    <td class="atThrdC"><p class="s3">09:26</p></td>
    <td class="atFrth"><p class="prg"><br/></p></td>
    <td class="atFfth"><p class="s3">10:04</p></td>
    <td class="attScndC"><p class="s3">09:52</p></td>
    <td class="atFfth"><p class="sSvnth">09:59</p></td>
    <td class="attScndC"><p class="sSvnth">10:00</p></td>
    <td class="atFfth"><p class="s3">09:50</p></td>
    <td class="atSxth"><p class="sFscnd">10:04</p></td>
    <td class="atFfth"><p class="prg"><br/></p></td>
    <td class="atFfth"><p class="s3">10:08</p></td>
    <td class="atFfth"><p class="s3">10:12</p></td>
    <td class="atFfth"><p class="s3">10:08</p></td>
    <td class="attScndC"><p class="sScnd">10:06</p></td>
    <td class="atFfth"><p class="sFfth">10:06</p></td>
    <td class="attScndC"><p class="sFscnd">10:09</p></td>
    <td class="atSxth"><p class="prg"><br/></p></td>
    <td class="atSvnth"><p class="s3">10:13</p></td>
    <td class="atSvnth"><p class="s3">10:13</p></td>
    <td class="atEgth "><p class="prg"><br/></p></td>
  </tr>
  <tr>
    <td  class="atFirstC"><p class="sFrst">Last<span class="s4"></span>OUT</p></td>
    <td class="attScndC"><p class="prg"><br/></p></td>
    <td class="atThrdC"><p class="prg"><br/></p></td>
    <td class="atFrth"><p class="prg"><br/></p></td>
    <td class="atFrth"><p class="prg"><br/></p></td>
    <td class="atFrth"><p class="prg"><br/></p></td>
    <td class="atFrth"><p class="prg"><br/></p></td>
    <td class="atThrdC"><p class="prg"><br/></p></td>
    <td class="atFfth"><p class="prg"><br/></p></td>
    <td class="atFrth"><p class="prg"><br/></p></td>
    <td class="atFfth"><p class="prg"><br/></p></td>
    <td class="atFrth"><p class="sFscnd">18:16</p></td>
    <td class="atSvnth"><p class="sSvnth">18:20</p></td>
    <td class="atThrdC"><p class="s3">18:14</p></td>
    <td class="atFrth"><p class="prg"><br/></p></td>
    <td class="atFfth"><p class="s3">18:21</p></td>
    <td class="attScndC"><p class="s3">18:35</p></td>
    <td class="atFfth"><p class="sSvnth">18:14</p></td>
    <td class="attScndC"><p class="sSvnth">18:18</p></td>
    <td class="atFfth"><p class="s3">18:11</p></td>
    <td class="atSxth"><p class="sFscnd">18:18</p></td>
    <td class="atFfth"><p class="prg"><br/></p></td>
    <td class="atFfth"><p class="s3">18:20</p></td>
    <td class="atFfth"><p class="s3">18:15</p></td>
    <td class="atFfth"><p class="s3">18:18</p></td>
    <td class="attScndC"><p class="sScnd">18:17</p></td>
    <td class="atFfth"><p class="sFfth">18:18</p></td>
    <td class="attScndC"><p class="sFscnd">18:13</p></td>
    <td class="atSxth"><p class="prg"><br/></p></td>
    <td class="atSvnth"><p class="s3">18:19</p></td>
    <td class="atSvnth"><p class="s3">18:17</p></td>
    <td class="atEgth"><p class="prg"><br/></p></td>
  </tr>
  <tr>
    <td  class="atFirstC"><p class="sFrst">Late-IN</p></td>
    <td class="attScndC"><p class="s3">00:00</p></td>
    <td class="atThrdC"><p class="s3">00:00</p></td>
    <td class="atFrth"><p class="sFrth">00:00</p></td>
    <td class="atFrth"><p class="s3">00:00</p></td>
    <td class="atFrth"><p class="sFscnd">00:00</p></td>
    <td class="atFrth"><p class="sBndn">00:00</p></td>
    <td class="atThrdC"><p class="s3">00:00</p></td>
    <td class="atFfth"><p class="sFrth">00:00</p></td>
    <td class="atFrth"><p class="sFscnd">00:00</p></td>
    <td class="atFfth"><p class="sFfth">00:00</p></td>
    <td class="atFrth"><p class="sFscnd">00:00</p></td>
    <td class="atSvnth"><p class="sSvnth">00:00</p></td>
    <td class="atThrdC"><p class="s3">00:00</p></td>
    <td class="atFrth"><p class="sSvnth">00:00</p></td>
    <td class="atFfth"><p class="s3">00:00</p></td>
    <td class="attScndC"><p class="s3">00:00</p></td>
    <td class="atFfth"><p class="sSvnth">00:00</p></td>
    <td class="attScndC"><p class="sSvnth">00:00</p></td>
    <td class="atFfth"><p class="s3">00:00</p></td>
    <td class="atSxth"><p class="sFscnd">00:00</p></td>
    <td class="atFfth"><p class="sFrth">00:00</p></td>
    <td class="atFfth"><p class="s3">00:00</p></td>
    <td class="atFfth"><p class="s3">00:00</p></td>
    <td class="atFfth"><p class="s3">00:00</p></td>
    <td class="attScndC"><p class="sScnd">00:00</p></td>
    <td class="atFfth"><p class="sFfth">00:00</p></td>
    <td class="attScndC"><p class="sFscnd">00:00</p></td>
    <td class="atSxth"><p class="s3">00:00</p></td>
    <td class="atSvnth"><p class="s3">00:00</p></td>
    <td class="atSvnth"><p class="s3">00:00</p></td>
    <td class="atEgth"><p class="prg"><br/></p></td>
  </tr>
  <tr>
    <td  class="atFirstC"><p class="sFrst">Early-OUT</p></td>
    <td class="attScndC"><p class="s3">00:00</p></td>
    <td class="atThrdC"><p class="s3">00:00</p></td>
    <td class="atFrth"><p class="sFrth">00:00</p></td>
    <td class="atFrth"><p class="s3">00:00</p></td>
    <td class="atFrth"><p class="sFscnd">00:00</p></td>
    <td class="atFrth"><p class="sBndn">00:00</p></td>
    <td class="atThrdC"><p class="s3">00:00</p></td>
    <td class="atFfth"><p class="sFrth">00:00</p></td>
    <td class="atFrth"><p class="sFscnd">00:00</p></td>
    <td class="atFfth"><p class="sFfth">00:00</p></td>
    <td class="atFrth"><p class="sFscnd">00:00</p></td>
    <td class="atSvnth"><p class="sSvnth">00:00</p></td>
    <td class="atThrdC"><p class="s3">00:00</p></td>
    <td class="atFrth"><p class="sSvnth">00:00</p></td>
    <td class="atFfth"><p class="s3">00:00</p></td>
    <td class="attScndC"><p class="s3">00:00</p></td>
    <td class="atFfth"><p class="sSvnth">00:00</p></td>
    <td class="attScndC"><p class="sSvnth">00:00</p></td>
    <td class="atFfth"><p class="s3">00:00</p></td>
    <td class="atSxth"><p class="sFscnd">00:00</p></td>
    <td class="atFfth"><p class="sFrth">00:00</p></td>
    <td class="atFfth"><p class="s3">00:00</p></td>
    <td class="atFfth"><p class="s3">00:00</p></td>
    <td class="atFfth"><p class="s3">00:00</p></td>
    <td class="attScndC"><p class="sScnd">00:00</p></td>
    <td class="atFfth"><p class="sFfth">00:00</p></td>
    <td class="attScndC"><p class="sFscnd">00:00</p></td>
    <td class="atSxth"><p class="s3">00:00</p></td>
    <td class="atSvnth"><p class="s3">00:00</p></td>
    <td class="atSvnth"><p class="s3">00:00</p></td>
    <td class="atEgth"><p class="prg"><br/></p></td>
  </tr>
  <tr>
    <td  class="atFirstC"><p class="sFrst">WrkHrs</p></td>
    <td class="attScndC"><p class="s3">00:00</p></td>
    <td class="atThrdC"><p class="s3">00:00</p></td>
    <td class="atFrth"><p class="sFrth">00:00</p></td>
    <td class="atFrth"><p class="s3">00:00</p></td>
    <td class="atFrth"><p class="sFscnd">00:00</p></td>
    <td class="atFrth"><p class="sBndn">00:00</p></td>
    <td class="atThrdC"><p class="s3">00:00</p></td>
    <td class="atFfth"><p class="sFrth">00:00</p></td>
    <td class="atFrth"><p class="sFscnd">00:00</p></td>
    <td class="atFfth"><p class="sFfth">00:00</p></td>
    <td class="atFrth"><p class="sFscnd">08:23</p></td>
    <td class="atSvnth"><p class="sSvnth">08:13</p></td>
    <td class="atThrdC"><p class="s3">04:58</p></td>
    <td class="atFrth"><p class="sSvnth">00:00</p></td>
    <td class="atFfth"><p class="s3">04:29</p></td>
    <td class="attScndC"><p class="s3">06:28</p></td>
    <td class="atFfth"><p class="sSvnth">05:00</p></td>
    <td class="attScndC"><p class="sSvnth">08:18</p></td>
    <td class="atFfth"><p class="s3">08:21</p></td>
    <td class="atSxth"><p class="sFscnd">08:14</p></td>
    <td class="atFfth"><p class="sFrth">00:00</p></td>
    <td class="atFfth"><p class="s3">07:34</p></td>
    <td class="atFfth"><p class="s3">08:03</p></td>
    <td class="atFfth"><p class="s3">08:10</p></td>
    <td class="attScndC"><p class="sScnd">07:21</p></td>
    <td class="atFfth"><p class="sFfth">08:12</p></td>
    <td class="attScndC"><p class="sFscnd">08:04</p></td>
    <td class="atSxth"><p class="s3">00:00</p></td>
    <td class="atSvnth"><p class="s3">03:20</p></td>
    <td class="atSvnth"><p class="s3">08:04</p></td>
    <td class="atEgth"><p class="prg"><br/></p></td>
  </tr>
  <tr>
    <td  class="atFirstC"><p class="sFrst">Net-work<span class="s4"> </span>Hours</p></td>
    <td class="attScndC"><p class="s3">00:00</p></td>
    <td class="atThrdC"><p class="s3">00:00</p></td>
    <td class="atFrth"><p class="sFrth">00:00</p></td>
    <td class="atFrth"><p class="s3">00:00</p></td>
    <td class="atFrth"><p class="sFscnd">00:00</p></td>
    <td class="atFrth"><p class="sBndn">00:00</p></td>
    <td class="atThrdC"><p class="s3">00:00</p></td>
    <td class="atFfth"><p class="sFrth">00:00</p></td>
    <td class="atFrth"><p class="sFscnd">00:00</p></td>
    <td class="atFfth"><p class="sFfth">00:00</p></td>
    <td class="atFrth"><p class="sFscnd">00:00</p></td>
    <td class="atSvnth"><p class="sSvnth">00:00</p></td>
    <td class="atThrdC"><p class="s3">00:00</p></td>
    <td class="atFrth"><p class="sSvnth">00:00</p></td>
    <td class="atFfth"><p class="s3">00:00</p></td>
    <td class="attScndC"><p class="s3">00:00</p></td>
    <td class="atFfth"><p class="sSvnth">00:00</p></td>
    <td class="attScndC"><p class="sSvnth">00:00</p></td>
    <td class="atFfth"><p class="s3">00:00</p></td>
    <td class="atSxth"><p class="sFscnd">00:00</p></td>
    <td class="atFfth"><p class="sFrth">00:00</p></td>
    <td class="atFfth"><p class="s3">00:00</p></td>
    <td class="atFfth"><p class="s3">00:00</p></td>
    <td class="atFfth"><p class="s3">00:00</p></td>
    <td class="attScndC"><p class="sScnd">00:00</p></td>
    <td class="atFfth"><p class="sFfth">00:00</p></td>
    <td class="attScndC"><p class="sFscnd">00:00</p></td>
    <td class="atSxth"><p class="s3">00:00</p></td>
    <td class="atSvnth"><p class="s3">00:00</p></td>
    <td class="atSvnth"><p class="s3">00:00</p></td>
    <td class="atEgth"><p class="prg"><br/></p></td>
  </tr>
  <tr>
    <td  class="atFirstC"><p class="sFrst">Adj.<span class="s4"> </span>Hours</p></td>
    <td class="attScndC"><p class="s3">00:00</p></td>
    <td class="atThrdC"><p class="s3">00:00</p></td>
    <td class="atFrth"><p class="sFrth">00:00</p></td>
    <td class="atFrth"><p class="s3">00:00</p></td>
    <td class="atFrth"><p class="sFscnd">00:00</p></td>
    <td class="atFrth"><p class="sBndn">00:00</p></td>
    <td class="atThrdC"><p class="s3">00:00</p></td>
    <td class="atFfth"><p class="sFrth">00:00</p></td>
    <td class="atFrth"><p class="sFscnd">00:00</p></td>
    <td class="atFfth"><p class="sFfth">00:00</p></td>
    <td class="atFrth"><p class="sFscnd">00:00</p></td>
    <td class="atSvnth"><p class="sSvnth">00:00</p></td>
    <td class="atThrdC"><p class="s3">00:00</p></td>
    <td class="atFrth"><p class="sSvnth">00:00</p></td>
    <td class="atFfth"><p class="s3">00:00</p></td>
    <td class="attScndC"><p class="s3">00:00</p></td>
    <td class="atFfth"><p class="sSvnth">00:00</p></td>
    <td class="attScndC"><p class="sSvnth">00:00</p></td>
    <td class="atFfth"><p class="s3">00:00</p></td>
    <td class="atSxth"><p class="sFscnd">00:00</p></td>
    <td class="atFfth"><p class="sFrth">00:00</p></td>
    <td class="atFfth"><p class="s3">00:00</p></td>
    <td class="atFfth"><p class="s3">00:00</p></td>
    <td class="atFfth"><p class="s3">00:00</p></td>
    <td class="attScndC"><p class="sScnd">00:00</p></td>
    <td class="atFfth"><p class="sFfth">00:00</p></td>
    <td class="attScndC"><p class="sFscnd">00:00</p></td>
    <td class="atSxth"><p class="s3">00:00</p></td>
    <td class="atSvnth"><p class="s3">00:00</p></td>
    <td class="atSvnth"><p class="s3">00:00</p></td>
    <td class="atEgth"><p class="prg"><br/></p></td>
  </tr>
  <tr>
    <td  class="atFirstC"><p class="sFrst">Gross<span class="s4"> </span>Time</p></td>
    <td class="attScndC"><p class="prg"><br/></p></td>
    <td class="atThrdC"><p class="prg"><br/></p></td>
    <td class="atFrth"><p class="prg"><br/></p></td>
    <td class="atFrth"><p class="prg"><br/></p></td>
    <td class="atFrth"><p class="prg"><br/></p></td>
    <td class="atFrth"><p class="prg"><br/></p></td>
    <td class="atThrdC"><p class="prg"><br/></p></td>
    <td class="atFfth"><p class="prg"><br/></p></td>
    <td class="atFrth"><p class="prg"><br/></p></td>
    <td class="atFfth"><p class="prg"><br/></p></td>
    <td class="atFrth"><p class="sFscnd">08:22</p></td>
    <td class="atSvnth"><p class="sSvnth">08:12</p></td>
    <td class="atThrdC"><p class="s3">08:48</p></td>
    <td class="atFrth"><p class="prg"><br/> </p></td>
    <td class="atFfth"><p class="s3">08:17</p></td>
    <td class="attScndC"><p class="s3">08:42</p></td>
    <td class="atFfth"><p class="sSvnth">08:14</p></td>
    <td class="attScndC"><p class="sSvnth">08:17</p></td>
    <td class="atFfth"><p class="s3">08:21</p></td>
    <td class="atSxth"><p class="sFscnd">08:14</p></td>
    <td class="atFfth"><p class="prg"><br/></p></td>
    <td class="atFfth"><p class="s3">08:12</p></td>
    <td class="atFfth"><p class="s3">08:02</p></td>
    <td class="atFfth"><p class="s3">08:09</p></td>
    <td class="attScndC"><p class="sScnd">08:10</p></td>
    <td class="atFfth"><p class="sFfth">08:12</p></td>
    <td class="attScndC"><p class="sFscnd">08:04</p></td>
    <td class="atSxth"><p class="prg"><br/></p></td>
    <td class="atSvnth"><p class="s3">08:05</p></td>
    <td class="atSvnth"><p class="s3">08:04</p></td>
    <td class="atEgth"><p class="prg"><br/></p></td>
  </tr>
  <tr>
    <td  class="atFirstC"><p class="sFrst">Overtime</p></td>
    <td class="attScndC"><p class="s3">00:00</p></td>
    <td class="atThrdC"><p class="s3">00:00</p></td>
    <td class="atFrth"><p class="sFrth">00:00</p></td>
    <td class="atFrth"><p class="s3">00:00</p></td>
    <td class="atFrth"><p class="sFscnd">00:00</p></td>
    <td class="atFrth"><p class="sBndn">00:00</p></td>
    <td class="atThrdC"><p class="s3">00:00</p></td>
    <td class="atFfth"><p class="sFrth">00:00</p></td>
    <td class="atFrth"><p class="sFscnd">00:00</p></td>
    <td class="atFfth"><p class="sFfth">00:00</p></td>
    <td class="atFrth"><p class="sFscnd">00:00</p></td>
    <td class="atSvnth"><p class="sSvnth">00:00</p></td>
    <td class="atThrdC"><p class="s3">00:00</p></td>
    <td class="atFrth"><p class="sSvnth">00:00</p></td>
    <td class="atFfth"><p class="s3">00:00</p></td>
    <td class="attScndC"><p class="s3">00:00</p></td>
    <td class="atFfth"><p class="sSvnth">00:00</p></td>
    <td class="attScndC"><p class="sSvnth">00:00</p></td>
    <td class="atFfth"><p class="s3">00:00</p></td>
    <td class="atSxth"><p class="sFscnd">00:00</p></td>
    <td class="atFfth"><p class="sFrth">00:00</p></td>
    <td class="atFfth"><p class="s3">00:00</p></td>
    <td class="atFfth"><p class="s3">00:00</p></td>
    <td class="atFfth"><p class="s3">00:00</p></td>
    <td class="attScndC"><p class="sScnd">00:00</p></td>
    <td class="atFfth"><p class="sFfth">00:00</p></td>
    <td class="attScndC"><p class="sFscnd">00:00</p></td>
    <td class="atSxth"><p class="s3">00:00</p></td>
    <td class="atSvnth"><p class="s3">00:00</p></td>
    <td class="atSvnth"><p class="s3">00:00</p></td>
    <td class="atEgth"><p class="prg"><br/></p></td>
  </tr>
  <tr>
    <td  class="atFirstC"><p class="sFrst">Stat1</p></td>
    <td class="attScndC"><p class="s3">AB</p></td>
    <td class="atThrdC"><p class="s3">AB</p></td>
    <td class="atFrth"><p class="sFrth">AB</p></td>
    <td class="atFrth"><p class="s3">AB</p></td>
    <td class="atFrth"><p class="sFscnd">AB</p></td>
    <td class="atFrth"><p class="sBndn">AB</p></td>
    <td class="atThrdC"><p class="s3">WO</p></td>
    <td class="atFfth"><p class="sFrth">AB</p></td>
    <td class="atFrth"><p class="sFscnd">AB</p></td>
    <td class="atFfth"><p class="sFfth">AB</p></td>
    <td class="atFrth"><p class="sFscnd">PR</p></td>
    <td class="atSvnth"><p class="sSvnth">PR</p></td>
    <td class="atThrdC"><p class="s3">PR</p></td>
    <td class="atFrth"><p class="sSvnth">WO</p></td>
    <td class="atFfth"><p class="s3">PR</p></td>
    <td class="attScndC"><p class="s3">PR</p></td>
    <td class="atFfth"><p class="sSvnth">PR</p></td>
    <td class="attScndC"><p class="sSvnth">PR</p></td>
    <td class="atFfth"><p class="s3">PR</p></td>
    <td class="atSxth"><p class="sFscnd">PR</p></td>
    <td class="atFfth"><p class="sFrth">WO</p></td>
    <td class="atFfth"><p class="s3">PR</p></td>
    <td class="atFfth"><p class="s3">PR</p></td>
    <td class="atFfth"><p class="s3">PR</p></td>
    <td class="attScndC"><p class="sScnd">PR</p></td>
    <td class="atFfth"><p class="sFfth">PR</p></td>
    <td class="attScndC"><p class="sFscnd">PR</p></td>
    <td class="atSxth"><p class="s3">WO</p></td>
    <td class="atSvnth"><p class="s3">AB</p></td>
    <td class="atSvnth"><p class="s3">PR</p></td>
    <td class="atEgth"><p class="prg"><br/></p></td>
  </tr>
  <tr>
    <td  class="atFirstC"><p class="sFrst">Stat2</p></td>
    <td class="attScndC"><p class="s3">AB</p></td>
    <td class="atThrdC"><p class="s3">AB</p></td>
    <td class="atFrth"><p class="sFrth">AB</p></td>
    <td class="atFrth"><p class="s3">AB</p></td>
    <td class="atFrth"><p class="sFscnd">AB</p></td>
    <td class="atFrth"><p class="sBndn">AB</p></td>
    <td class="atThrdC"><p class="s3">WO</p></td>
    <td class="atFfth"><p class="sFrth">AB</p></td>
    <td class="atFrth"><p class="sFscnd">AB</p></td>
    <td class="atFfth"><p class="sFfth">AB</p></td>
    <td class="atFrth"><p class="sFscnd">AB</p></td>
    <td class="atSvnth"><p class="sSvnth">AB</p></td>
    <td class="atThrdC"><p class="s3">AB</p></td>
    <td class="atFrth"><p class="sSvnth">WO</p></td>
    <td class="atFfth"><p class="s3">AB</p></td>
    <td class="attScndC"><p class="s3">AB</p></td>
    <td class="atFfth"><p class="sSvnth">AB</p></td>
    <td class="attScndC"><p class="sSvnth">AB</p></td>
    <td class="atFfth"><p class="s3">AB</p></td>
    <td class="atSxth"><p class="sFscnd">AB</p></td>
    <td class="atFfth"><p class="sFrth">WO</p></td>
    <td class="atFfth"><p class="s3">AB</p></td>
    <td class="atFfth"><p class="s3">AB</p></td>
    <td class="atFfth"><p class="s3">AB</p></td>
    <td class="attScndC"><p class="sScnd">AB</p></td>
    <td class="atFfth"><p class="sFfth">AB</p></td>
    <td class="attScndC"><p class="sFscnd">AB</p></td>
    <td class="atSxth"><p class="s3">WO</p></td>
    <td class="atSvnth"><p class="s3">AB</p></td>
    <td class="atSvnth"><p class="s3">AB</p></td>
    <td class="atEgth"><p class="prg"><br/></p></td>
  </tr>
  </tbody>
</table>
</div>
<!-- html2canvas library -->
<script src="<?php echo base_url('db/html2canvas.min.js');?>"></script>

<!-- jsPDF library -->
<script src="<?php echo base_url('db/jspdf.umd.js');?>"></script>
<script>
		window.jsPDF = window.jspdf.jsPDF;
		// Generate PDF document with landscape orientation
function generatePDF_2()
 {
	
	var doc = new jsPDF({orientation: 'landscape'});
		// Source HTMLElement or a string containing HTML.
	var elementHTML = document.querySelector("#print_Attendance");

	doc.html(elementHTML, {callback: function(doc){doc.save('document-html.pdf');},
		margin: [5, 5, 5,5],
		autoPaging: 'text',
		x: 0,
		y: 0,
		width: 190, // Target width in the PDF document
		windowWidth: 825 // Window width in CSS pixels
	});
}
</script>
</body>
</html>
