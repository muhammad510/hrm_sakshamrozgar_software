<style>

</style>
<div class="inner-body">
    <div class="page-header">
      <div>
        <h2 class="main-content-title tx-24 mg-b-5">Performance</h2>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('staff/dashboard');?>">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page"><?php echo $breadcrums; ?></li>
        </ol>
      </div>
      <div class="d-flex">
        <div class="justify-content-center">
            <a href="<?php echo $bckUrl;?>" class="btn btn-white btn-icon-text my-2 me-2"> <i class="ti-arrow-left me-2"></i> Back</a>
            <a href="javascript:void(0)" class="btn btn-primary btn-icon-text my-2 me-2"> <i class="ti-search me-2"></i> Search</a>
        </div>
      </div>
    </div>      
<div class="row row-sm" style="margin:15px -10px 75px -10px;">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header  border-0"> <h5 class="card-title">Employee Performance</h5></div> 
              <div class="card-body">
                <div class="row row-sm">
                    <div class="col-md-12 col-lg-12">
<!------------------------------------------------------------------------------------------------------------------------------>
                       
                       
                        <?php
						$where=array('name'=>'Mr. Amit Kumar','your_position'=>'Sr. Software Developer','last_working_day'=>'23 February 2025','manager_name'=>'Shudhanshu Ranjan','managerContact'=>'8789842044');
						
						 $return='<table width="600" border="0" cellpadding="0" cellspacing="0" style="background-color: #f9f9f9; border:1px solid #f9f9f9;margin: 20px auto;">
                          <tr>
                            <td style=" height:90px;" ><table width="100%" border="0">
                                <tr>
                                  <td style="font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 24px;color: #FFFFFF;text-align: center;padding: 1rem;" colspan="2">
								  	<img src="'.base_url('uploads/company/offer_letter.png').'" style="580px;" > 
							      </td>
                                </tr>
                              </table></td>
                          </tr>
                          <tr>
                            <td style="background-color:#f9f9f9; height:2px;"></td>
                          </tr>
                          <tr>
                            <td style="border-bottom: 1px solid #003E8E;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; color:#003E8E; padding-left:5px; text-align:center; height:35px;font-weight: 700;
                          text-transform: uppercase;">Offer Letter</td>
                          </tr>
                          <tr>
                            <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#606060; padding:15px;font-family:Tahoma, sans-serif; line-height: 1.7;">
                            <p>
                                Mr./Ms. <span class="empFlName myFontBg">Alok Sharma</span> <br>
                                        <span class="myFontBg" id="empAddr">Bhagwat Nagar</span><br>
                                  City -<span class="myFontBg" id="empCity">,</span> ,<br>
                                  PIN   <span class="myFontBg" id="empZipCode"></span>
                             </p>
                             <span style="font-weight: bold; color:#373730;"> Dear <span style="text-transform:capitalize; font-weight:600;">'.$where['name'].'</span></span>,<br>
                             
                             
                             
                        <p> Dear <span class="empFlName myFontBg">'.$where['empName'].'</span>, </p>
                                          <p> It is our pleasure to extend the following offer of employment to you on behalf of <span class="myFontBg">'.system_info('company_name').'</span>. </p>
                                          <p>further to the interview and discussions you have had with us. You are appointed to the position of "<span class="myFontBg empDesign">'.$where['designation'].'</span>" at  "<span class="myFontBg empDepartment">'.$where['branchNm'].'</span>" and you are expected to join duty on <span class="myFontBg">'.$where['empJoining'].'</span> under the following terms and conditions: </p>
                                          <p>You will be on probation period (<strong>'.$where['empJoining'].'</strong>) for 6 months and on satisfactory completion of the probation period you will be entitled for the confirmation. </p>
                                          <p>This offer will be subject to the standard terms and conditions of employment by <strong>ASHUTOSH</strong> and also will be governed by the policies, rules and guidelines of the Company.</p>
                                          <p style="text-align:justify;">Please note that this offer is valid subject to your signing (authentic signature Pl.) and returning the duplicate copy of this letter within 3 working days with your Date of Joining. You will be given a remuneration as per CTC structure attached.You will not be entitled for any kind of leave except one casual leave during Probation period.</p>
                                          <p  style="text-align:justify;">That your appointment will be further subject to the verification of your credentials, testimonials and other particulars mentioned by you in your application at the time of your appointment. In case it comes to the notice of the Management that the particulars given by you in your appointment were wrong or concealed, your appointment shall be rendered void ab initio and will, therefore, be deemed cancelled automatically.You will be issued a detailed appointment letter after your confirmation at the concerned branch offices and upon completion of joining formalities.Further, during the course of your employment, if it is found that you have been indulging into any kind of irregularity, process lapse, fraud and misappropriation, the Company reserves the right to take appropriate action including immediate termination of your employment.
                                            Company retains right to transfer you at any other location at any point of time during the course of your employment.
                                            The notice period for resignation of services more than 6 months is 60 days and  less than 6 months  is 45 days.</p>
                                          <div style="text-align:justify;">
                                            <p>In case of any dispute, the jurisdiction shall remain in Ahmedabad only.
                                              Kindly note that this offer is subject to positive reference check.
                                              This offer is valid subject to positive report of Reference check, Equifax, Employee bureau.</p>
                                            <p><strong>Declarations:</strong> This appointment is made on the basis of information provided by you. Should it prove untrue incorrect at any time, the Company reserves the rights to take appropriate action including forthwith termination of service. We shall be entitled to initiate necessary enquiries with the source of reference provided by you. In case of unfavorable report, we shall be entitled to take appropriate steps including forthwith terminating this agreement. Wish you a successful professional stint with us. We look forward to a mutually beneficial and enriching experience having you on board. All the best!</p>
                                          </div>
                                          <div class="page-break"></div>
                                          <div style="float:right;width:45%;padding-bottom:80px;"><span style="font-size:11px;">I have read the above terms and conditions of my appointment. I accept the same.</span><br/><br/><br/><br/>
                                            _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _<br/><br/>
                                            Applicant Name <strong>'.$where['empName'].'</strong><br/>
                                            Employee Code <strong>'.$where['empCode'].'</strong></div>
                                         <div class="offrFtrImg"> <img src="'.base_url('uploads/company/offer_bottom.png').'"> </div>
                                          <p style="clear: both;font-size:13px;padding-top:10px;border-top:1px solid #4f4f4f;margin-top: 15px;">
										  		Encl: <span class="myFontBg"> 1) Service Agreement </span>
									       </p>
                                          <table width="600" border="0" cellpadding="0" cellspacing="0">
                                            <tr><td colspan="2" style="text-align:center;border:1px solid #e3e3e3;"><span class="myFontBg">ANNEXURE I</span></td></tr>
                                            <tr><td style="text-align:center;border: 1px solid #e3e3e3;border-top: 0px;" colspan="2"><span class="myFontBg">'.system_info('company_name').'</span></td></tr>
                                            <tr>
                                                 <td style="width:40%;border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">Employee No </td>
                                                 <td style="border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px; font-weight:700;border-left: 0px;">'.$where['empCode'].'</td>
                                            </tr>
                                            <tr>
                                                 <td style="width:40%;border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">Name </td>
                                                 <td style="border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;font-weight:700;border-left:0px;text-transform:uppercase;">'.$where['empName'].'</td>
                                            </tr>
                                            <tr>
                                                 <td style="width:40%;border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">Designation </td>
                                                 <td style="border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;font-weight:700;border-left:0px;text-transform:uppercase;">'.$where['designation'].'</td></tr>
                                            <tr>
                                                 <td style="width:40%;border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">Department </td>
                                                 <td style="border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;font-weight:700;border-left:0px;text-transform:uppercase;">'.$where['department'].'</td>
                                            </tr>
                                            <tr>
                                                 <td style="width:40%;border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">Date of Joining </td>
                                                 <td style="border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;font-weight:700;border-left:0px;text-transform:uppercase;">'.$where['empJoining'].'</td>
                                            </tr>
                                            <tr><td style="width:40%;border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">Remarks </td><td style="border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;font-weight:700;border-left:0px;text-transform:uppercase;"></td></tr>
                                            <tr style="background-color: #5248BD;font-weight: 700; color:#fff;">
                                                <td style="width:40%; font-size:13px;padding: 5px;">SALARY COMPONENTS </td><td style="font-size:13px;padding: 5px;">INR PER MONTH</td></tr>
                                            <tr>
                                                <td style="width:40%;border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">Basic </td>
                                                <td style="border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">'.$where['empBasic'].'</td>
                                            </tr>
                                            <tr>
                                                <td style="width:40%;border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">HRA </td>
                                                <td style="border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">'.$where['empHRA'].'</td></tr>
                                            <tr>
                                                <td style="width:40%;border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">Transportation Allowance</td>
                                                <td style="border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">'.$where['empTA'].'</td>
                                            </tr>
                                            <tr>
                                                <td style="width:40%;border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">Professional Development Allowance </td>
                                                <td style="border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">'.$where['empPA'].'</td>
                                            </tr>
                                            <tr>
                                                <td style="width:40%;border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">Education Allowance </td>
                                                <td style="border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">'.$where['empEA'].'</td>
                                            </tr>
                                            <tr>
                                                <td style="width:40%;border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">INTERIM Bonus </td>
                                                <td style="border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">'.$where['empBonus'].'</td>
                                            </tr>
                                            <tr>
                                                <td style="width:40%;border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">Specical Allowance </td>
                                                <td style="border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">'.$where['empSpcialA'].'</td>
                                            </tr>
                                            <tr>
                                                <td style="width:40%;border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">GROSS SALARY</td>
                                                <td style="border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">'.$where['empGross'].'</td>
                                            </tr>
                                            <tr>
                                                <td style="width:40%;border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">PF-Contribution Employee</td>
                                                <td style="border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">'.$where['empPF'].'</td>
                                            </tr>
                                            <tr>
                                                <td style="width:40%;border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">PF-Contribution Employer</td>
                                                <td style="border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">'.$where['empPF'].'</td>
                                            </tr>
                                            <tr>
                                                <td style="width:40%;border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">PT </td>
                                                <td style="border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">'.$where['empPTA'].'</td>
                                            </tr>
                                            <tr>
                                                <td style="width:40%;border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">ESIC Employee </td>
                                                <td style="border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">'.$where['empESIC'].'</td>
                                            </tr>
                                            <tr>
                                                <td style="width:40%;border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">ESIC Employer </td>
                                                <td style="border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">'.$where['empLoyerESIC'].'</td>
                                            </tr>
                                            <tr>
                                                <td style="width:40%;border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">Income Tax</td>
                                                <td style="border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">0</td>
                                            </tr>
                                            <tr>
                                                <td style="width:40%;border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">Net Pay</td>
                                                <td style="border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">'.$where['netPay'].'</td>
                                            </tr>
                                            <tr>
                                                <td style="width:40%;border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">CTC </td>
                                                <td style="border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">'.$where['empCTC'].'</td>
                                            </tr>
                                            <tr>
                                                <td style="width:40%;border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;">&nbsp;</td>
                                                <td style="border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;text-transform:capitalize">'.$where['empCTCWord'].'</td></tr>
                                           </table>
                                          <p style="padding-top:15px;font-size:12px;">We at <strong>'.system_info('company_name').'</strong> would like to create an environment and culture committed to co-operation,quality and responsiveness that permits every activity.</p>
                                          <p style="font-size:12px;">
										  	We take this oppertunity to wish you the very best in your tenure with tenure of contact with 
											<strong>'.system_info('company_name').'</strong>.
										  </p>
                              <div style="font-size:12px;">Your sincerely,<br />
                                <span style="text-transform:capitalize; font-weight:600;font-size:12px;">'.$where['manager_name'].'</span><br>
                                <span style="text-transform:capitalize; font-weight:600;font-size:12px;">'.system_info('company_name').'</span><br>
                                <span style="text-transform:capitalize; font-weight:600;font-size:12px;">'.$where['managerContact'].'</span></div>
                              <br />
                              <br />
                              <div class="nBtn"> <a href="'.$where['acceptLink'].'" target="_blank" class="accept"> Accept </a> <a href="'.$where['rejectLink'].'" class="reject"> Reject </a> </div>
                              <br />
                              <br />
                              <hr style="border:dashed 1px #CCCCCC;" />
                              <br />
                              <span style="font-size:12px;"> If the above link doesnt work , kindly copy and paste the same into browsser URL , and press enter !<br />
                              Best wishes for continued success in your career. </span> <br />
                              <br />
                            </td>
                          </tr>
                          <tr>
                            <td style="background-color:#1d212f;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#FFFFFF; padding-left:5px; text-align:center; height:30px;"> This is an auto generated mail , hence no need to reply.</td>
                          </tr>
                          <tr>
                            <td style="background-color:#fff; height:0px;"></td>
                          </tr>
                          <tr>
                            <td style="background-color:#1d212f96; height:15px;"></td>
                          </tr>
                        </table>';   
                        	print_r($return);
                        	?>
                        
                        
   <style>
.appointment-letter {
  & table {
    width: 100%;
    font-size: 12px;
  }
}
.appointment-letter {
  & td {
    padding:5px 10px;
    border:1px solid #d9d9d9;
    font-size: 11px;
  }
}.baComponent {
  background-color: #F2F2F2;
  font-weight: 700;
}
.myFontBg {font-weight: 700;}
.accept{color: #FFF;text-decoration: none;padding:10px 12px 10px 15px;background-color: #0dae54;font-weight: bold;border-radius: 5px;margin-right: 5px;}
.accept:hover{background-color: #0e9b4c;}
.reject{color: #FFF;text-decoration: none;padding:10px 14px 10px 15px;background-color: #f44336;font-weight: bold;border-radius: 5px;margin-left: 5px;}
.reject:hover{background-color: #e8281a;}.nBtn{text-align: center;margin-top: 20px;}
</style>                     
                        
                        
                        
                        
                        
                        
<!------------------------------------------------------------------------------------------------------------------------------>                                                                      
                    </div>
                </div>       
            </div>
        </div>
    </div>
</div>

