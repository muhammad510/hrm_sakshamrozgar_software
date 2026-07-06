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
defined('BASEPATH') or exit('No direct script access allowed');

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
function warning_letter($where)
{
	$printPage = '<div class="col-md-12">
			  <div class="row row-sm">
				<div class="slipImg">
				<div class="row">
				<div class="col-md-4">
				<img src="' . base_url(system_info('favicon')) . '" style="height:100px;width:auto;text-align:right">
				</div>
				<div class="col-md-8">
				<h3 style="text-align:center">'.system_info('company_name').'</h3>
				<h6 style="text-align:center">'.system_info('company_address').'</h6>
				</div>

				</div>				 
				 </div>
				<div class="parent">
					<div class="child child-1"><strong> Ref. No. - </strong>' . $where['refNo'] . '</div>
					<div class="child child-2">Warning Letter</div>
					<div class="child child-3"><p><strong>Date : </strong>' . date('d/m/Y') . '</p></div>
				</div>
				
				
				<div class="letter-content wrningLtr">
				  <p>Dear <strong>' . $where['empName'] . '</strong>,</p>
				  <p>This letter is to formally notify you that your recent behavior/performance has been found to be unsatisfactory and against the policies of the company. Specifically, <strong>' . $where['reason'] . '</strong>.</p>
				  <p>On <strong>' . date('d F Y') . '</strong>, you have <strong>' . $where['reason'] . '</strong>. This is a serious concern because it [mention the consequences of their actions on the team or <strong>' . system_info('company_name') . '</strong>.</p>
				  <p>We have already discussed this matter with you on [mention previous discussions, if any] and have provided you with an opportunity to improve. However, the situation has not improved, and it is now affecting the overall work environment.</p>
				  <p>This letter serves as an official warning. We expect you to [mention the expected behavior or improvement], and any further violation may lead to [mention possible consequences, like further disciplinary action or termination].</p>
				  <p>We sincerely hope that you will take this warning seriously and make necessary improvements to avoid any further consequences.</p>
				  <p>Kindly consider this as an opportunity to correct your behavior and improve your performance. If you need any assistance or clarification, please feel free to contact [mention HR or concerned authority].</p>
				  <p>Thank you for your attention to this matter.</p>
				  <div class="signature">
					<p>Regards,</p>
					<p><strong>' . $where['managerNm'] . '</strong></p>
					<p><em>Reporting Manager</em></p>
					<p>' . system_info('company_name') . ' | ' . config_item('address') . ' | ' . config_item('mobile_number') . '</p>
				  </div>
				</div>
			  </div>
			</div>';

	return $printPage;
}

function offer_letter($where)
{
	$printPage = '<div class="offrHdrImg">
				<img src="' . base_url('uploads/company/offer_letter.png') . '"> </div>
			  <div class="parent mrvPd">
				<div class="child child-1"><strong> Ref. No. - </strong>' . $where['jobReqNo'] . '</div>
				<div class="child child-2">Offer Letter</div>
				<div class="child child-3">
				  <p><strong>Date : </strong>' . date('d/m/Y') . '</p>
				</div>
			  </div>
			  <div id="getPrfrmList">
				<div class="appointment-letter">
				  <p>Mr./Ms. <span class="empFlName myFontBg">' . $where['empName'] . '</span> <br/>
					<span class="myFontBg" id="empAddr">' . $where['empAddr'] . '</span><br/>
					City-<span class="myFontBg" id="empCity">' . $where['distState'] . '</span> ,<br />
					PIN <span class="myFontBg" id="empZipCode">' . $where['zipcode'] . '</span></p>
				  <p> Dear <span class="empFlName myFontBg">' . $where['empName'] . '</span>, </p>
				  <p> It is our pleasure to extend the following offer of employment to you on behalf of <span class="myFontBg">' . system_info('company_name') . '</span>. </p>
				  <p>further to the interview and discussions you have had with us. You are appointed to the position of "<span class="myFontBg empDesign">' . $where['designation'] . '</span>" at  "<span class="myFontBg empDepartment">' . $where['branchNm'] . '</span>" and you are expected to join duty on <span class="myFontBg">' . $where['empJoining'] . '</span> under the following terms and conditions: </p>
				  <p>You will be on probation period (<strong>' . $where['empJoining'] . '</strong>) for 6 months and on satisfactory completion of the probation period you will be entitled for the confirmation. </p>
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
					Applicant Name <strong>' . $where['empName'] . '</strong><br/><br/>
					Employee Code <strong>' . $where['empCode'] . '</strong></div>
				 <div class="offrFtrImg"> <img src="' . base_url('uploads/company/offer_bottom.png') . '"> </div>
				  <p style="clear: both;">Encl: <span class="myFontBg"> 1) Service Agreement </span></p>
				  <table id="payFormat">
					<tr><td colspan="2"  style="text-align:center"><span class="myFontBg">ANNEXURE I</span></td></tr>
					<tr><td style="text-align:center" colspan="2"><span class="myFontBg">' . system_info('company_name') . '</span></td></tr>
					<tr><td style="width:40%">Employee No </td><td><span class="myFontBg">' . $where['empCode'] . '</span></td></tr>
					<tr><td style="width:40%">Name </td><td><span class="myFontBg" style="text-transform:uppercase;">' . $where['empName'] . '</span></td></tr>
					<tr><td style="width:40%">Designation </td><td><span class="myFontBg" style="text-transform:uppercase;">' . $where['designation'] . '</span></td></tr>
					<tr><td style="width:40%">Department </td><td><span class="myFontBg" style="text-transform:uppercase;">' . $where['department'] . '</span></td></tr>
					<tr><td style="width:40%">Date of Joining </td><td><span class="myFontBg">' . $where['empJoining'] . '</span></td></tr>
					<tr><td style="width:40%">Remarks </td><td></td></tr>
					<tr class="baComponent"><td style="width:40%">SALARY COMPONENTS </td><td>INR PER MONTH</td></tr>
					<tr><td style="width:40%">Basic </td><td><span class="myFontBg">' . $where['empBasic'] . '</span></td></tr>
					<tr><td style="width:40%">HRA </td><td><span class="myFontBg">' . $where['empHRA'] . '</span></td></tr>
					<tr><td style="width:40%">Transportation Allowance</td><td><span class="myFontBg">' . $where['empTA'] . '</span></td></tr>
					<tr><td style="width:40%">Professional Development Allowance </td><td><span class="myFontBg">' . $where['empPA'] . '</span></td></tr>
					<tr><td style="width:40%">Education Allowance </td><td><span class="myFontBg">' . $where['empEA'] . '</span></td></tr>
					<tr><td style="width:40%">INTERIM Bonus </td><td><span class="myFontBg">' . $where['empBonus'] . '</span></td></tr>
					<tr><td style="width:40%">Specical Allowance </td><td><span class="myFontBg">' . $where['empSpcialA'] . '</span></td></tr>
					<tr>
					  <td style="width:40%">GROSS SALARY</td><td><span class="myFontBg">' . $where['empGross'] . '</span></td></tr>
					<tr><td style="width:40%">PF-Contribution Employee</td><td><span class="myFontBg">' . $where['empPF'] . '</span></td></tr>
					<tr><td style="width:40%">PF-Contribution Employer</td><td><span class="myFontBg">' . $where['empPF'] . '</span></td></tr>
					<tr><td style="width:40%">PT </td><td><span class="myFontBg">' . $where['empPTA'] . '</span></td></tr>
					<tr><td style="width:40%">ESIC Employee </td><td><span class="myFontBg">' . $where['empESIC'] . '</span></td></tr>
					<tr><td style="width:40%">ESIC Employer </td><td><span class="myFontBg">' . $where['empLoyerESIC'] . '</span></td></tr>
					<tr><td style="width:40%">Income Tax</td><td><span class="myFontBg">0</span></td></tr>
					<tr><td style="width:40%">Net Pay</td><td><span class="myFontBg">' . $where['netPay'] . '</span></td></tr>
					<tr><td style="width:40%">CTC </td><td><span class="myFontBg">' . $where['empCTC'] . '</span></td></tr>
					<tr><td style="width:40%">&nbsp;</td><td><span class="myFontBg" style="text-transform:capitalize">' . $where['empCTCWord'] . '</span></td></tr>
				   </table>
				  <p style="padding-top: 15px;">We at <strong>' . system_info('company_name') . '</strong> would like to create an environment and culture committed to co-operation,quality and responsiveness that permits every activity.</p>
				  <p>We take this oppertunity to wish you the very best in your tenure with tenure of contact with <strong>' . system_info('company_name') . '</strong>.</p>
				  <p>Your sincerely,</p>
				  <p>  For <span class="myFontBg" style="text-transform:uppercase;">' . system_info('company_name') . '</span> </p>
				  <p>Name,<br/><br/><br/>
					Authorised Signatory</p>
				   <p>Please indicates your acceptance of the terms by signing and returning the duplicates copy hereof</p>
				   <p>NAME :-<span style="font-weight:700;">________________________________________</span></p>				   
				   <p>SIGNATURE WITH DATE :-<span style="font-weight:700;">________________________________________</span></p>
				</div>
			  </div>';

	return $printPage;
}


function testMode()
{
	$printPage = ' <div class="header">
        <h1>Warning Letter</h1>
        <p>Date: <span id="date"></span></p>
    </div>

    <div class="content">
        <p>Dear <strong id="employee-name">[Employee Name]</strong>,</p>

        <p>This letter is issued as a formal warning regarding your performance/conduct at work. We have noticed the following issue(s):</p>

        <ul>
            <li><strong>Issue/Violation: </strong><span id="violation-reason">[Describe the issue]</span></li>
            <li><strong>Date of Occurrence: </strong><span id="occurrence-date">[Date of the incident]</span></li>
        </ul>

        <p>We expect that you will improve your behavior/performance immediately and comply with company policies. Failure to do so will result in further disciplinary action, which may include suspension or termination of employment.</p>

        <p>We request that you acknowledge the receipt of this warning letter.</p>

        <p>If you have any concerns or questions, please feel free to contact your reporting manager.</p>
    </div>

    <div class="signature">
        <p>Regards,</p>
        <p><strong id="manager-name">[Manager Name]</strong></p>
        <p><em>Reporting Manager</em></p>
    </div>

    <div class="footer">
        <p>Company Name | Address | Contact Information</p>
    </div>
</div>

<script>
    // Populate the date dynamically
    document.getElementById("date").textContent = new Date().toLocaleDateString();

    // You can dynamically populate employee and manager details here
    document.getElementById("employee-name").textContent = "John Doe"; // Employee Name
    document.getElementById("violation-reason").textContent = "Frequent tardiness"; // Issue/Violation
    document.getElementById("occurrence-date").textContent = "January 15, 2025"; // Date of Occurrence
    document.getElementById("manager-name").textContent = "Jane Smith"; // Managers Name
</script>';

	return $printPage;
}
