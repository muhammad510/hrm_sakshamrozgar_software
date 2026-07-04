<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2019 - 2022, CodeIgniter Foundation
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2019, British Columbia Institute of Technology (https://bcit.ca/)
 * @copyright	Copyright (c) 2019 - 2022, CodeIgniter Foundation (https://codeigniter.com/)
 * @license	https://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Email Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/userguide3/helpers/email_helper.html
 */

// ------------------------------------------------------------------------

if ( ! function_exists('valid_email'))
{
	/**
	 * Validate email address
	 *
	 * @deprecated	3.0.0	Use PHP's filter_var() instead
	 * @param	string	$email
	 * @return	bool
	 */
	function valid_email($email)
	{
		return (bool) filter_var($email, FILTER_VALIDATE_EMAIL);
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('send_email'))
{
	/**
	 * Send an email
	 *
	 * @deprecated	3.0.0	Use PHP's mail() instead
	 * @param	string	$recipient
	 * @param	string	$subject
	 * @param	string	$message
	 * @return	bool
	 */
	function send_email($recipient, $subject, $message)
	{
		return mail($recipient, $subject, $message);
	}
	
	function reset_password_mail($name=NULL,$company=NULL,$resetLink=NULL)
	{

$restCnt="For security, please don't share your reset password link. If you did not request a password reset, please ignore this email or contact support if you have questions.";


$mailsec=
'<table width="500" border="0" cellpadding="0" cellspacing="0" style="background-color: #f9f9f9; border:1px solid #f9f9f9;">
  	<tr><td style=" height:90px;" ><table width="100%" border="0"><tr>
   <td style="font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 24px;color: #FFFFFF;text-align: center;padding: 1rem;" colspan="2">
			<img src="'.base_url().'assets/img/brand/logo.png" width="200" height="80">
	</td>
  </tr>
</table></td>
  	</tr>
  	<tr><td style="background-color:#fff; height:2px;"></td></tr>
  	<tr>
    	<td style="background-color:#003E8E;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; color:#FFFFFF; padding-left:5px; text-align:center; height:50px;">Reset Password !</td>
  	</tr>
  	<tr><td style="font-family:Arial, Helvetica, sans-serif; font-size:15px; color:#606060; padding:15px;font-family:Tahoma, sans-serif; line-height: 1.7;">
        <span style="font-size:1rem;font-weight: bold; color:#373730;">  Dear  <span style="text-transform:capitalize; font-weight:600;">'.$name.'</span></span>,<br>
		You recently requested to reset your password for your <span style="font-weight:600; color:#373730;">'.$company.'</span> <br />account. Use the button below to reset it. <span style="font-weight:600; color:#373730;">This password reset is only valid for the next 24 hours.</span>
		<br />
		<br />
		 
		<div align="center" style="margin-top:20px;">  
			<a class="login" href="'.$resetLink.'" target="_blank" style="">Reset my password</a>
		</div><br /><br />
		<div style="">'.$restCnt.'</div>
		<hr style="border:dashed 1px #CCCCCC;" /><br />
If the above link doesnt work , kindly copy and paste the same into browsser URL , and press enter !<br />
Best wishes for continued success in your career.<br /><br />
Thanks <br />
Team ,<br />
<span style="text-transform:uppercase; font-weight:bold;">'.$company.'</span><br /><br />
 </td></tr>
  	<tr><td style="background-color:#003E8E;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; color:#FFFFFF; padding-left:5px; text-align:center; height:30px;"> This is an auto generated mail , hence no need to reply.</td>
  	</tr>
    <tr><td style="background-color:#fff; height:0px;"></td></tr>
    <tr><td style="background-color:#318E3D; height:15px;"></td></tr> 	
</table>
<style>
.login{color: #FFF;text-decoration: none;padding: 12px 15px 12px 14px;background-color: #0dae54;font-weight: bold;text-transform: uppercase;border-radius: 5px;}
.login:hover{background-color: #0e9b4c;}
</style>
';				

	return $mailsec;

	}
	
	
	
	function resignation_mail($where=NULL)
	{
$mailsec=
'<table width="500" border="0" cellpadding="0" cellspacing="0" style="background-color: #f9f9f9; border:1px solid #f9f9f9;">
  <tr>
    <td style=" height:90px;" ><table width="100%" border="0">
        <tr>
          <td style="font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 24px;color: #FFFFFF;text-align: center;padding: 1rem;" colspan="2"><img src="'.base_url('uploads/company/offer_letter.png').'" style="width:600px; height:100px"> </td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td style="background-color:#f9f9f9; height:2px;"></td>
  </tr>
  <tr>
    <td style="border-bottom: 1px solid #003E8E;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; color:#003E8E; padding-left:5px; text-align:center; height:35px;font-weight: 700;
  text-transform: uppercase;">Resignation Letter</td>
  </tr>
  <tr>
    <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#606060; padding:15px;font-family:Tahoma, sans-serif; line-height: 1.7;"><span style="font-size:1rem;font-weight: bold; color:#373730;"> Dear <span style="text-transform:capitalize; font-weight:600;">'.$where['name'].'</span></span>,<br>
      I hope this email finds you well. This is to formally inform you that we have received your resignation request for the position of <span style="text-transform:capitalize; font-weight:600;">'.$where['your_position'].'</span> at <span style="text-transform:capitalize; font-weight:600;">'.system_info('company_name').'</span>, with your last working day being <span style="text-transform:capitalize; font-weight:600;">'.$where['last_working_day'].'</span>. <br>
      We sincerely appreciate your contributions to the company and would like to know your decision on accepting or rejecting this resignation request. Please click the respective button below to proceed. <br />
      We would be happy to discuss any concerns you may have regarding your decision.<br />
      <br />
      <div>Best regards,<br />
        <span style="text-transform:capitalize; font-weight:600;">'.$where['manager_name'].'</span><br>
        <span style="text-transform:capitalize; font-weight:600;">'.system_info('company_name').'</span><br>
        <span style="text-transform:capitalize; font-weight:600;">'.$where['managerContact'].'</span></div>
      <br />
      <br />
      <div style="text-align:center;"> 
	  		<a href="'.$where['acceptLink'].'" target="_blank" style="color: #FFF;text-decoration: none;padding:10px 12px 10px 15px;background-color: #0dae54;font-weight: bold;border-radius: 5px;margin-right: 5px;"> Accept </a>
	  		<a href="'.$where['rejectLink'].'" style="color: #FFF;text-decoration: none;padding:10px 14px 10px 15px;background-color: #f44336;font-weight: bold;border-radius: 5px;margin-left: 5px;"> Reject </a>
	  </div>
      <br />
      <br />
      <hr style="border:dashed 1px #CCCCCC;" />
      <br />
      <span style="font-size:14px;"> If the above link doesnt work , kindly copy and paste the same into browsser URL , and press enter !<br />
      Best wishes for continued success in your career. </span> <br />
      <br />
    </td>
  </tr>
  <tr>
    <td style="background-color:#3223CC;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#FFFFFF; padding-left:5px; text-align:center; height:30px;"> This is an auto generated mail , hence no need to reply.</td>
  </tr>
  <tr>
    <td style="background-color:#fff; height:0px;"></td>
  </tr>
  <tr>
    <td style="background-color:#7023CC7A; height:15px;"></td>
  </tr>
</table>

';				

	return $mailsec;

	}
	
	function offer_letter($where=NULL)
	{
		$mailsec='<table width="600" border="0" cellpadding="0" cellspacing="0" style="background-color: #f9f9f9; border:1px solid #f9f9f9;margin: 20px auto;">
                          <tr>
                            <td style="height:90px;" >
							  <table style="max-width:580px"  border="0">
                                <tr>
                                  <td style="font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 24px;color: #FFFFFF;text-align: center;padding: 1rem;" colspan="2">
								  	<img src="'.base_url('uploads/company/offer_letter.png').'" style="width:600px; height:100px"> 
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
                                Mr./Ms. <span class="empFlName myFontBg">'.$where['name'].'</span> <br>
                                        <span class="myFontBg" id="empAddr">'.$where['address'].'</span><br>
                                  City -<span class="myFontBg" id="empCity">'.$where['cityName'].'</span><br>
                                  PIN   <span class="myFontBg" id="empZipCode">'.$where['zipcode'].'</span>
                             </p>
                             <span style="font-weight: bold; color:#373730;"> Dear <span style="text-transform:capitalize; font-weight:600;">'.$where['name'].'</span></span>,
                             <p style="margin-top:-10px;"> It is our pleasure to extend the following offer of employment to you on behalf of <span class="myFontBg">'.system_info('company_name').'</span>. </p>
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
                                            Applicant Name <strong>'.$where['name'].'</strong><br/>
                                            Employee Code <strong>'.$where['empCode'].'</strong></div>
                                         <div class="offrFtrImg"> <img src="'.base_url('uploads/company/offer_bottom.png').'" style="width:600px;"> </div>
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
                                                 <td style="border:1px solid #e3e3e3;border-top:0px;padding:2px 0px 2px 5px;font-size:12px;font-weight:700;border-left:0px;text-transform:uppercase;">'.$where['name'].'</td>
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
                              <div style="text-align:center;"> 
							  		<a href="'.$where['acceptLink'].'" target="_blank" style="color: #FFF;text-decoration: none;padding:10px 12px 10px 15px;background-color: #0dae54;font-weight: bold;border-radius: 5px;margin-right: 5px;"> Accept </a>
									<a href="'.$where['rejectLink'].'" style="color: #FFF;text-decoration: none;padding:10px 14px 10px 15px;background-color: #f44336;font-weight: bold;border-radius: 5px;margin-left: 5px;"> Reject </a> 
							 </div>
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
                        </table>
		
		';				

	return $mailsec;

	}	
	
	function promote_mail($where=NULL)
	{
		$mailsec='<table width="500" border="0" cellpadding="0" cellspacing="0" style="background-color: #f9f9f9; border:1px solid #f9f9f9;">
  <tr>
    <td style=" height:90px;" ><table width="100%" border="0">
        <tr>
          <td style="font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 24px;color: #FFFFFF;text-align: center;padding: 1rem;" colspan="2"><img src="'.base_url(config_item('logo_dark')).'"style="width:600px; height:100px"> </td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td style="background-color:#f9f9f9; height:2px;"></td>
  </tr>
  <tr>
    <td style="border-bottom: 1px solid #003E8E;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; color:#003E8E; padding-left:5px; text-align:center; height:35px;font-weight: 700;
  text-transform: uppercase;">Congratulations on Your Promotion!</td>
  </tr>
  <tr>
    <td style="font-family:Arial, Helvetica, sans-serif; font-size:15px; color:#606060; padding:15px;font-family:Tahoma, sans-serif; line-height: 1.7;"><span style="font-size:1rem;font-weight: bold; color:#373730;"> Dear <span style="text-transform:capitalize; font-weight:600;">'.$where['name'].'</span></span>,<br>
     We are pleased to inform you that you have been promoted to the position of <span style="text-transform:capitalize; font-weight:600;">'.$where['your_position'].'</span> at <span style="text-transform:capitalize; font-weight:600;">'.system_info('company_name').'</span>, with your effective working day from <span style="text-transform:capitalize; font-weight:600;">'.$where['start_working'].'</span>. <br>
     This promotion comes as a recognition of your consistent hard work, dedication, and the outstanding contributions you have made to the '.$where['department'].'. <br />
      In your new role, we are confident that you will continue to exceed expectations and help drive our team towards greater success. Your updated compensation and responsibilities will be discussed with you by the HR team shortly.<br />
      Please accept our heartfelt congratulations on this well-deserved promotion!.<br>
      <br />
      <div>Best regards,<br />
        <span style="text-transform:capitalize; font-weight:600;">'.$where['manager_name'].'</span><br>
        <span style="text-transform:capitalize; font-weight:600;">'.system_info('company_name').'</span><br>
        <span style="text-transform:capitalize; font-weight:600;">'.$where['managerContact'].'</span></div>
      <br />
      <br />
      <div class="nBtn"> <a href="'.$where['acceptLink'].'" target="_blank" class="accept"> Accept </a> <a href="'.$where['rejectLink'].'" class="reject"> Reject </a> </div>
      <br />
      <br />
      <hr style="border:dashed 1px #CCCCCC;" />
      <br />
      <span style="font-size:14px;"> If the above link doesnt work , kindly copy and paste the same into browsser URL , and press enter !<br />
      Best wishes for continued success in your career. </span> <br />
      <br />
    </td>
  </tr>
  <tr>
    <td style="background-color:#3223CC;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#FFFFFF; padding-left:5px; text-align:center; height:30px;"> This is an auto generated mail , hence no need to reply.</td>
  </tr>
  <tr>
    <td style="background-color:#fff; height:0px;"></td>
  </tr>
  <tr>
    <td style="background-color:#7023CC7A; height:15px;"></td>
  </tr>
</table>';				
		return $mailsec;
	}
	



  function warning_mail($where = NULL)
{
    $mailsec = '<table width="500" border="0" cellpadding="0" cellspacing="0" style="background-color: #f9f9f9; border:1px solid #f9f9f9;">
  <tr>
    <td style=" height:90px;" >
      <table width="100%" border="0">
        <tr>
          <td style="font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 24px;color: #FFFFFF;text-align: center;padding: 1rem;" colspan="2">
            <img src="' . base_url(config_item('logo_dark')) . '" style="width:600px; height:100px">
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td style="background-color:#f9f9f9; height:2px;"></td>
  </tr>
  <tr>
    <td style="border-bottom: 1px solid #d9534f;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; color:#d9534f; padding-left:5px; text-align:center; height:35px;font-weight: 700; text-transform: uppercase;">
      Official Warning Regarding Attendance
    </td>
  </tr>
  <tr>
    <td style="font-family:Arial, Helvetica, sans-serif; font-size:15px; color:#606060; padding:15px; font-family:Tahoma, sans-serif; line-height: 1.7;">
      <span style="font-size:1rem;font-weight: bold; color:#373730;">
        Dear <span style="text-transform:capitalize; font-weight:600;">' . $where['name'] . '</span>,
      </span>
      <br><br>
      We have noticed consistent irregularities in your attendance during the period of <span style="font-weight:600;">' . $where['date_range'] . '</span>. This includes the following issues:
      <ul style="margin-top: 10px; margin-bottom: 10px;">
        <li>' . $where['warning_message'] . '</li>
      </ul>
      Please be advised that this behavior violates the attendance policies of <span style="text-transform:capitalize; font-weight:600;">' . system_info('company_name') . '</span>. Continued non-compliance may result in further disciplinary action, up to and including termination of employment.
      <br><br>
      We expect immediate and sustained improvement in your attendance. If there are any personal or professional challenges affecting your punctuality or availability, we encourage you to speak with your manager or HR representative.
      <br><br>
      <div>Best regards,<br />
        <span style="text-transform:capitalize; font-weight:600;">' . $where['manager_name'] . '</span><br>
        <span style="text-transform:capitalize; font-weight:600;">' . system_info('company_name') . '</span><br>
        <span style="text-transform:capitalize; font-weight:600;">' . $where['managerContact'] . '</span>
      </div>
      <br /><br />
      <hr style="border:dashed 1px #CCCCCC;" />
      <br />
      <span style="font-size:14px;">
        If you believe this warning has been issued in error, please contact HR immediately to clarify. This is an official HR communication and will be recorded in your personnel file.
      </span>
      <br /><br />
    </td>
  </tr>
  <tr>
    <td style="background-color:#d9534f;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#FFFFFF; padding-left:5px; text-align:center; height:30px;">
      This is an auto-generated mail, please do not reply.
    </td>
  </tr>
  <tr>
    <td style="background-color:#fff; height:0px;"></td>
  </tr>
  <tr>
    <td style="background-color:#d9534f1a; height:15px;"></td>
  </tr>
</table>';
    return $mailsec;
}

	
}
