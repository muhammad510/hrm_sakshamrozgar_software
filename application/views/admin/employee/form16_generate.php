 <style>
#getPrfrmList{ min-height:350px; font-size:12px;}.myTable{ & td, & th { height:35px;border:1px solid #d9d9d9;font-weight:400;padding-left:10px; }width : 100%;}.tac {text-align:center;font-weight:600 !important;}.myFontBg{ font-weight:700;}
.fstTbl{width:9.86972%;}.fst2Tbl{width:10.4485%;}.fst1Tbl{width:55.0218%;}.fst3Tbl{width:14.6455%;}.fst4Tbl{width:10.0145%;}.myListDet {padding: 0px 10px 2px 20px;text-align: justify;}.myListDet li{padding:2px 4px 2px 4px;margin-left: 5px;}.myListDet li::marker {font-weight: bold;}#find_emp_id{ border:1px solid #5248B5 !important }
.ntYet{ color:#cc3c04;}
.empDesgin,.empFlName{ padding-left: 5px;color: #665f5f;text-transform: uppercase;}
.page-break{page-break-before: always;}
</style>
<div class="inner-body">
    <div class="page-header">
      <div>
        <h2 class="main-content-title tx-24 mg-b-5">Form 16 generate</h2>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('staff/dashboard');?>">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page"><?php echo $breadcrums; ?></li>
        </ol>
      </div>
      <div class="d-flex">
        <div class="justify-content-center">
            <a href="<?php echo $bckUrl;?>" class="btn btn-primary btn-icon-text my-2 me-2"> <i class="ti-arrow-left me-2"></i> Back</a>
            <button type="button" class="btn btn-primary btn-icon-text my-2 me-2" id="miArvClk"><i class="ti-timer"></i> 12:31:33</button>
            <a href="javascript:void(0)" class="btn btn-primary btn-icon-text my-2 me-2"> <i class="fe fe-power"></i> Sign Out</a>
        </div>
      </div>
    </div>      
<div class="row row-sm" style="margin:15px -10px 75px -10px;">
    <div class="col-lg-12 col-md-12">
       <div class="card custom-card">
        <div class="card-header custom-card-header border-bottom-0 ">
            <h5 class="main-content-label tx-dark my-auto tx-medium mb-0">Employee Form 16</h5>
            <div class="card-options">
               <div class="input-group">
                    <input type="text" class="form-control" id="find_emp_id" placeholder="Search ...">
                    <span class="">
                        <button class="btn ripple btn-outline-primary getAction" id="searchEmployee" data-id="<?php echo $target;?>" type="button"><i class="ti-search"></i> Search</button>
                    </span>
                </div>
            </div>
        </div>
        <div class="card-body">
         <div class="row row-sm">
            <div class="col-md-12 col-lg-12">
               <div id="getPrfrmList">
                    <div class="form16">
                      <p style="text-align: center;"><strong>FORM NO. 16</strong><br />[See rule 31(1)(a)]<br />
                        <strong>PART A
                        </strong>
                      </p>
                      <table class="myTable" cellspacing="0">
                        <tr><th class="tac" colspan="6"> Certificate under section 203 of the Income-tax Act, 1961 for tax deducted at source on salary</th></tr>
                        <tr><th colspan="3">Certificate No.</th><th colspan="3">Last updated on</th></tr>
                        <tr><th colspan="3"> <span class="myFontBg" id="crtfctNo">XXXXXXXXXXX</span></th><td colspan="3"> <span class="myFontBg" id="lstDate">XXXXXXXXXX</span></td></tr>
                        <tr><th colspan="3">Name and address of the Employer</th> <th colspan="3">Name and address of the Deductee </th></tr>
                        <tr><th colspan="3"><span class="myFontBg" id="nameAdrEmployer"> <?php echo system_info('company_name') ?></span></th><th colspan="3"><span class="myFontBg" id="nmOfEmplyee"> XXXXXXXXXXXXXXXX</span></th></tr>
                        <tr><th>PAN of the Employer</th><th colspan="2"> TAN of the Employer</th> <th>PAN of the Employee</th><th colspan="2"> Employee Reference No. provided by the Employer (If available)</th> </tr>
                        <tr>
                        	<th><span class="myFontBg"><?php echo system_info('zipCode');?></span></th><th colspan="2"><span class="myFontBg" id="tanOfEmplyee">XXXXXXXXX</span></th>
                        	<th><span class="myFontBg" id="panOfEmplyee">XXXXXXXXXXXXXX</span></th><th colspan="2">XXXXXXXXXXXX</th>
                        </tr>
                        <tr><th colspan="3">CIT (TDS)</th><th colspan="1"> Assessment Year</th><th colspan="2"> Period</th></tr>
                        <tr>
                          <td colspan="3" style="border-bottom:none;"> Address <div class="myFontBg"><?php echo system_info('company_address');?></div></td>
                          <td colspan="1" style="border-bottom:none;"></td><th colspan="1" style="border-bottom:none;">From</th><th colspan="1" style="border-bottom:none;">To</th>
                        </tr>
                        <tr><td colspan="3" style="border-bottom:none;border-top:none;"></td><td rowspan="2" style="border-top:none;">XXXXXXXXXXX</td><th rowspan="2"></th><th rowspan="2"></th>
                        </tr>
                        <tr>
                        	<td colspan="3" style="border-top:none;">
                            	City : <span class="myFontBg" id="myAddrCity"><?php echo ($getCompanySt)?$getCompanySt->district:'<span class="ntYet">N/A</span>';?></span> 
                                <br />Phone : <span class="myFontBg"><?php echo system_info('phone');?></span>
                                <br />Pin : <span class="myFontBg"><?php echo system_info('zipCode');?></span>
                             </td>
                        </tr>
                        <tr><th class="tac" colspan="6"> Summary of amount paid/credited and tax deducted at source thereon in respect of the employee </th>  </tr>
                        <tr>
                          <th>Quarter(s)</th>
                          <th>Receipt Numbers of original quarterly statements of TDS  under sub-section (3) of section 200</th>
                          <th>Amount paid/credited</th><th colspan="2"> Amount of tax deducted(Rs. )</th>
                          <th>Amount of tax deposited/remitted(Rs. )</th>
                        </tr>
                        <tr>
                        	<th><span class="myFontBg" id="qutrRecpt">XXXXXXXXXXXX</span></th><th>XXXXXXXXXXXX</th><th><span class="myFontBg" id="amtPaid">XXXXXXXXXXXX</span></th>
                        	<th colspan="2"><span class="myFontBg" id="txDeductAmt">XXXXXXXXXXXX</span></th><th>XXXXXXXXXXXX</th>
                        </tr>
                        <tr><th>Total (Rs.)</th><th></th><th></th> <th colspan="2"></th><th></th></tr>
                        <tr><th class="tal" colspan="6">Summary of tax deducted at source in respect of Deductee</th></tr>
                    
                        <tr>
                          <th colspan="6">
                            <p>
                              I. DETAILS OF TAX DEDUCTED AND DEPOSITED IN<br />
                              THE CENTRAL GOVERNMENT ACCOUNT THROUGH BOOK ADJUSTMENT<br />
                              (The Employer to provide payment wise details of tax deducted
                              and deposited with respect to the deductee)
                            </p>
                          </th>
                        </tr>
                        <tr><th rowspan="2">Sl. No.</th><th rowspan="2"> Tax deposited in respect of the deductee (Rs.)</th><th colspan="4"> Book Identification Number (BIN)</th></tr>
                        <tr><th>Receipt numbers of Form No. 24G</th><th>DDO serial number in Form No. 24G</th><th>Date of Transfer voucher (dd/mm/yyyy)</th><th>Status of Matching with Form No.24G </th></tr>
                        <tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                        <tr><th>Total(Rs)</th><td></td><td colspan="4"></td></tr>
                        <tr>
                          <th colspan="6">
                          <p> I. DETAILS OF TAX DEDUCTED AND DEPOSITED IN<br />THE CENTRAL GOVERNMENT ACCOUNT THROUGH CHALLAN <br />
                              (The Employer to provide payment wise details of tax deducted and deposited with respect to the deductee)</p></th>
                        </tr>
                        <tr>
                          <th rowspan="2">Sl. No.</th>
                          <th rowspan="2"> Tax deposited in respect of the deductee (Rs.) </th>
                          <th colspan="4"> Challan Identification Number (CIN)</th>
                        </tr>
                        <tr>
                          <th> BSR Code of the Bank Branch</th>
                          <th> Date on which tax deposited (dd/mm/yyyy)</th>
                          <th>Challan Serial Number</th><th>Status of matching with OLTAS</th>
                        </tr>
                        <tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                        <tr><th>Total(Rs)</th><td></td><td colspan="4"></td></tr>
                        <tr><th colspan="6">Verification</th></tr>
                        <tr>
                          <td colspan="6">
                            I,_ _ _ _ _ _ _ _ _ _ _ _., son/daughter of _ _ _ _ _ _ _ _ _ _ _ _. working in the capacity of _ _ _ _ _ _ _ _ _ _ _ _. (designation) do hereby certify that a
                            sum of Rs. _ _ _ _ _ _ _ _ _ _ _ _.. [Rs. _ _ _ _ _ _ _ _ _ _ _ _. (in words)] has been deducted and deposited to the credit of the Central
                            Government. I further certify that the information given above is true, complete and correct and is based on the
                            books of account, documents, TDS statements, TDS deposited and other available records.
                          </td>
                        </tr>
                        <tr><th> Place </th><td colspan="2"></td><th colspan="3">(Signature of person responsible for deduction of tax)</th></tr>
                        <tr><th>Date</th><td colspan="2"></td><th colspan="3"></th></tr>
                        <tr><td colspan="3"><b>Designation: </b><span class="empDesgin myFontBg">&nbsp;</span></td><td colspan="3"><b>Full Name:</b> <span class="empFlName myFontBg">&nbsp;</span></td></tr>
                      </table>
                      <br />
                      <hr style="width:30%;float:left" /><br />
                      <br /><p> 1. <span class="myFontBg">Omitted by Income-tax (3rd Amendment) Rules, 2019, w.e.f. 12-5-2019. Prior to its omissionfollowing notes read as  under :</span></p>
                      <p><strong>Notes:</strong><br />
                          
<ol class="myListDet">
    <li>Government deductors to fill information in item I if tax is paid without production of an income-tax challan and in item II if tax is paid accompanied by an income-tax challan.</li>
    <li>Non-Government deductors to fill information in item II.</li>
    <li>The deductor shall furnish the address of the Commissioner of Income-tax (TDS) having jurisdiction as regards TDS statements of the assessee.</li>
    <li>If an assessee is employed under one employer only during the year, certificate in Form No.16 issued for the quarter ending on 31st March of the financial year shall contain the detailsof tax deducted and deposited for all the quarters of the financial year.</li>
    <li>If an assessee is employed under more than one employer during the year, each of the employers shall issue Part A of the certificate in Form No. 16 pertaining to the period for which such assessee was employed with each of the employers. Part B (Annexure) of the certificate in Form No.16 may be issued by each of the employers or the last employer at the option of the assessee.</li>
    <li> In items I and II, in column for tax deposited in respect of deductee, furnish total amount of TDS, surcharge (if applicable) and education cess (if applicable);</li>
    
</ol>
</p>
                         <div class="page-break"></div>
                          <br />
                        <p style="text-align: center;">
                            <strong>PART B  (Annexure)
                            </strong>
                          </p>
                           <table class="myTable" border="1" cellspacing="0" cellpadding="0">
                                <tbody>
                                  <tr><td colspan="5"><strong> Details of Salary Paid and any other income and tax deducted</strong></td></tr>
                                  <tr><td class="fstTbl"><span class="myFontBg">(1)</span></td><td class="fst1Tbl" colspan="4">Gross Salary</td></tr>
                                  <tr>
                                    <td class="fstTbl"><span class="myFontBg">(a)</span></td><td class="fst1Tbl">Salary as per provisions contained in section 17(1)</td>
                                    <td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">Rs</td><td class="fst4Tbl">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td class="fstTbl"><span class="myFontBg">(b)</span></td><td class="fst1Tbl">Value of perquisites under section 17(2) (as per Form No. 12BA, wherever applicable)</td><td class="fst2Tbl">&nbsp;</td>
                                    <td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td>
                                  </tr>
                                <tr>
                                	<td class="fstTbl"><span class="myFontBg">(c)</span></td><td class="fst1Tbl">Profits in lieu of salary under section 17(3) (as per Form No. 12BA,wherever applicable)</td>
                                    <td class="fst3Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td>
                                </tr>
                                <tr><td class="fstTbl"><span class="myFontBg">(d)</span></td><td class="fst1Tbl">Total</td><td class="fst3Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td></tr>
                                <tr>
                                	<td class="fstTbl"><span class="myFontBg">(e)</span></td><td class="fst1Tbl">Reported total amount of salary received from other employer(s)</td><td class="fst3Tbl">&nbsp;</td>
                                    <td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td></tr>
                                <tr><td class="fstTbl"><span class="myFontBg">2.</span></td><td class="fst1Tbl">Less: Allowances to the extent exempt under section 10</td>
                                	<td class="fst3Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td></tr>
                                <tr><td class="fstTbl"><span class="myFontBg">(a)</span></td><td class="fst1Tbl">Travel concession or assistance under section 10(5)</td>
                                	<td class="fst3Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td></tr>
                                <tr>
                                	<td class="fstTbl"><span class="myFontBg">(b)</span></td><td class="fst1Tbl">Death-cum-retirement gratuity under section 10(10)</td>
                                    <td class="fst3Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td></tr>
                                <tr><td class="fstTbl"><span class="myFontBg">(c)</span></td><td class="fst1Tbl">Commuted value of pension under section 10(10A)</td>
                                    <td class="fst3Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td></tr>
                                <tr>
                                	<td class="fstTbl"><span class="myFontBg">(d)</span></td><td class="fst1Tbl">Cash equivalent of leave salary encashment under section 10(10AA)</td>
                                    <td class="fst3Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td>
                                </tr>
                                <tr>
                                	<td class="fstTbl"><span class="myFontBg">(e)</span></td><td class="fst1Tbl">House rent allowance under section 10(13A)</td>
                                    <td class="fst3Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td>
                                </tr>
                                <tr>
                                	<td class="fstTbl"><span class="myFontBg">(f)</span></td><td class="fst1Tbl">Amount of any other exemption under section 10</td>
                                    <td class="fst3Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td>
                                </tr>
                                <tr><td class="fstTbl">&nbsp;</td><td class="fst1Tbl">clause &hellip;</td><td class="fst3Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td></tr>
                                <tr><td class="fstTbl">&nbsp;</td><td class="fst1Tbl">clause &hellip;</td><td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td></tr>
                                <tr><td class="fstTbl">&nbsp;</td><td class="fst1Tbl">clause &hellip;</td><td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td></tr>
                                <tr><td class="fstTbl">&nbsp;</td><td class="fst1Tbl">clause &hellip;</td><td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td></tr>
                                <tr><td class="fstTbl">&nbsp;</td><td class="fst1Tbl">clause &hellip;</td><td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td></tr>
                                <tr><td class="fstTbl">&nbsp;</td><td class="fst1Tbl">...</td><td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td></tr>
                                <tr><td class="fstTbl"><span class="myFontBg">(g)</span></td><td class="fst1Tbl">Total amount of any other exemption under section 10</td>
                                	<td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td></tr>
                                <tr>
                                	<td class="fstTbl"><span class="myFontBg">(h)</span></td><td class="fst1Tbl">Total amount of exemption claimed under section 10 [2(a)+2(b)+2(c)+2(d)+2(e)+2(g)]</td>
                                    <td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td>
                                </tr>
                                <tr><td class="fstTbl"><span class="myFontBg">3.</span></td><td class="fst1Tbl">Total amount of salary received from current employer [1(d)-2(h)]</td>
                                	<td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td></tr>
                                <tr><td class="fstTbl"><span class="myFontBg">4.</span></td><td class="fst1Tbl">Less : Deductions under section 16</td><td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td>
                                    <td class="fst4Tbl">&nbsp;</td></tr>
                                <tr>
                                	<td class="fstTbl"><span class="myFontBg">(a)</span></td><td style="width:55.0218%; ">Standard deduction under section 16(ia)</td><td style="width:10.4485%; ">&nbsp;</td>
                                    <td style="width:14.6455%; ">&nbsp;</td><td style="width:10.0145%; ">&nbsp;</td>
                                </tr>
                                <tr><td class="fstTbl"><span class="myFontBg">(b)&nbsp;</span></td><td class="fst1Tbl">Entertainment allowance under section 16(ii)</td>
                                	<td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td></tr>
                                <tr><td class="fstTbl"><span class="myFontBg">(c)</span></td><td class="fst1Tbl">Tax on employment under section 16(iii)</td><td class="fst2Tbl">&nbsp;</td>
                                	<td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td></tr>
                                <tr><td class="fstTbl"><span class="myFontBg">5.</span></td><td class="fst1Tbl">Total amount of deductions under section 16 [4(a)+4(b)+4(c)]</td>
                                	<td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td></tr>
                                <tr>
                                	<td class="fstTbl"><span class="myFontBg">6.</span></td><td class="fst1Tbl">Income chargeable under the head 'Salaries' [(3+1(e)-5]</td>
                                	<td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td>
                                </tr>
                                <tr>
                                	<td class="fstTbl"><span class="myFontBg">7.</span></td><td class="fst1Tbl">Add : Any other income reported by the employee under as per section 192 (2B)</td><td class="fst2Tbl">&nbsp;</td>
                                    <td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td>
                                 </tr>
                                  <tr><td class="fstTbl"><span class="myFontBg">(a)</span></td>
                                    <td class="fst1Tbl">Income (or admissible loss) from house property reported by employee offered for TDS</td><td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td>
                                  </tr>
                                  <tr><td class="fstTbl"><span class="myFontBg">(b)</span></td><td class="fst1Tbl">Income under the head Other Sources offered for TDS</td>
                                  	  <td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td></tr>
                                  <tr>
                                      <td class="fstTbl"><span class="myFontBg">8.</span></td><td class="fst1Tbl">Total amount of other income reported by the employee [7(a)+7(b)]</td>
                                  	  <td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td>
                                  </tr>
                                  <tr><td class="fstTbl"><span class="myFontBg">9.</span></td><td class="fst1Tbl">Gross total income (6+8)</td><td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td></tr>
                                  <tr><td class="fstTbl"><span class="myFontBg">10.</span></td><td class="fst1Tbl">Deductions under Chapter VI-A</td><td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td></tr>
                                </tbody>
                              </table>
						<br/>
                        <table class="myTable" style="border-collapse: collapse; " border="1"  cellpadding="0">
                            <tbody>
                              <tr><td colspan="3"></td><td><span class="myFontBg">Gross Amount</span></td><td><span class="myFontBg">Deductible Amount</span></td></tr>
                              <tr>
                                  <td class="fstTbl"><span class="myFontBg">(a)</span></td><td class="fst1Tbl">Deduction in respect of life insurance premia, contributions to provident fund etc. under section 80C </td>
                                  <td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">Rs</td><td class="fst4Tbl">&nbsp;</td>
                              </tr>
                              <tr>
                                  <td class="fstTbl"><span class="myFontBg">(b)</span></td><td class="fst1Tbl">Deduction in respect of contribution to certain pension funds under section 80CCC </td>
                                  <td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">Rs</td><td class="fst4Tbl">&nbsp;</td>
                              </tr>
                              <tr>
                                    <td class="fstTbl"><span class="myFontBg">(c)</span></td><td class="fst1Tbl">Deduction in respect of contribution by taxpayer to pension scheme under section 80CCD (1)</td>
                                    <td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td>
                              </tr>
                              <tr>
                                  <td class="fstTbl"><span class="myFontBg">(d)</span></td><td class="fst1Tbl">Total deduction under section 80C, 80CCC and 80CCD(1)</td>
                                  <td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td>
                              </tr>
                              <tr>
                                  <td class="fstTbl"><span class="myFontBg">(e)</span></td><td class="fst1Tbl">Deductions in respect of amount paid/deposited to notified pension scheme under section 80CCD (1B)</td>
                                  <td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td>
                              </tr>
                              <tr>
                                  <td class="fstTbl"><span class="myFontBg">(f)</span></td><td class="fst1Tbl">Deduction in respect of contribution by Employer to pension scheme under section 80CCD (2) </td>
                                  <td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td>
                              </tr>
                              <tr>
                                  <td class="fstTbl"><span class="myFontBg">(g)</span></td><td class="fst1Tbl">Deduction in respect of health insurance premia under section 80D </td>
                                  <td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td>
                              </tr>
                              <tr>
                                    <td class="fstTbl"><span class="myFontBg">(h)</span></td><td class="fst1Tbl">Deduction in respect of interest on loan taken for higher education under section 80E </td>
                                    <td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td>
                              </tr>
                                <tr><td colspan='2'></td><td><span class="myFontBg">Gross Amount</span></td><td><span class="myFontBg">Qualifying Amount</span></td><td><span class="myFontBg">Deductible Amount</span></td></tr>
                                <tr>
                                    <td class="fstTbl"><span class="myFontBg">(i)</span></td><td class="fst1Tbl">Total Deduction in respect of donations to certain funds, charitable institutions, etc. under section 80G</td>
                                    <td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="fstTbl"><span class="myFontBg">(j)</span></td><td class="fst1Tbl">Deduction in respect of interest on deposits in savings account under section 80TTA </td><td class="fst2Tbl">&nbsp;</td>
                                    <td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td>
                                </tr>
                                <tr>
                                	<td class="fstTbl"><span class="myFontBg">(k)</span></td><td class="fst1Tbl">Amount deductible under any other provision(s) of Chapter VI-A</td>
                                    <td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td>
                                </tr>
                                <tr><td class="fstTbl">&nbsp;</td><td class="fst1Tbl">section &hellip;</td><td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td></tr>
                                <tr><td class="fstTbl">&nbsp;</td><td class="fst1Tbl">section &hellip;</td><td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td></tr>
                                <tr><td class="fstTbl">&nbsp;</td><td class="fst1Tbl">section &hellip;</td><td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td></tr>
                                <tr><td class="fstTbl">&nbsp;</td><td class="fst1Tbl">section &hellip;</td><td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td></tr>
                                <tr><td class="fstTbl">&nbsp;</td><td class="fst1Tbl">section &hellip;</td><td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td></tr>
                                <tr><td class="fstTbl">&nbsp;</td><td class="fst1Tbl">...</td><td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td></tr>
                                <tr>
                                    <td class="fstTbl"><span class="myFontBg">(l)</span></td><td class="fst1Tbl">Total of amount deductible under any other provision(s) of Chapter VI-A </td>
                                    <td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td>
                                </tr>
                                <tr> 
                                     <td class="fstTbl"><span class="myFontBg">11.</span></td>
                                     <td class="fst1Tbl">Aggregate of deductible amount under Chapter VI-A [10(a)+10(b)+10(c)+10(d)+10(e)+10(f)+10(g)+10(h)+10(i) 10(j)+10(l)]</td>
                                     <td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td>
                                </tr>
                                <tr><td class="fstTbl"><span class="myFontBg">12.</span></td><td class="fst1Tbl">Total taxable income (9-11)</td><td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td></tr>
                                <tr><td class="fstTbl"><span class="myFontBg">13.</span></td><td class="fst1Tbl">Tax on total income</td><td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td></tr>
                                <tr><td class="fstTbl"><span class="myFontBg">14.</span></td><td class="fst1Tbl">Rebate under section 87A, if applicable</td><td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td></tr>
                                <tr><td class="fstTbl"><span class="myFontBg">15.</span></td><td class="fst1Tbl">Surcharge, wherever applicable</td><td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td></tr>
                                <tr><td class="fstTbl"><span class="myFontBg">16.</span></td><td class="fst1Tbl">Health and education cess</td><td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td></tr>
                                <tr><td class="fstTbl"><span class="myFontBg">17.</span></td><td class="fst1Tbl">Tax payable (13+15+16-14)</td><td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td></tr>
                                <tr>
                                	<td class="fstTbl"><span class="myFontBg">18.</span></td><td class="fst1Tbl">Less: Relief under section 89 (attach details)</td>
                                    <td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td>
                                </tr>
                                <tr><td class="fstTbl"><span class="myFontBg">19.</span></td><td class="fst1Tbl">Net tax payable (17-18)</td><td class="fst2Tbl">&nbsp;</td><td class="fst3Tbl">&nbsp;</td><td class="fst4Tbl">&nbsp;</td></tr>
                                <tr><th class="fstTbl" colspan="5">Verification</th></tr>
                               <tr>
                                <td  colspan="5"> I, _ _ _ _ _ _ _ _ _ _ _ _., son/daughter of _ _ _ _ _ _ _ _ _ _ _ _.working in the capacity of _ _ _ _ _ _ _ _ _ _ _ _. (designation) do hereby certify that the information given above is true, complete and correct and is based on the books of account, documents, TDS statements, and other available records.
                                 </td>
                              </tr>
                              <tr>
                                <td class="fstTbl" colspan="2">Place _ _ _ _ _ _ _ _ _ _ _ _</td><td colspan="3">(Signature of person responsible for deduction of tax) </td>
                              </tr>
                              <tr> <td class="fstTbl" colspan="2">Date _ _ _ _ _ _ _ _ _ _ _ _</td> <td colspan="3">Full Name : _ _ _ _ _ _ _ _ _ _ _ _ </td></tr>
                            </tbody>
                          </table>
                        <br/>
                        <p><strong>Notes:</strong><br/>
<ol class="myListDet">
    <li>Government deductors to fill information in item I of Part A if tax is paid without production of an income-tax challan and in item II of Part A if tax is paid accompanied by an income-tax challan.</li>
    <li>Non-Government deductors to fill information in item II of Part A.</li>
    <li>The deductor shall furnish the address of the Commissioner of Income-tax (TDS) having jurisdiction as regards TDS statements of the assessee.</li>
    <li>If an assessee is employed under one employer only during the year, certificate in Form No. 16 issued for the quarter ending on 31st March of the financial year shall contain the details of tax deducted and deposited for all the quarters of the financial year.</li>
    <li>(i) If an assessee is employed under more than one employer during the year, each of the employers shall issue Part A of the certificate in Form No. 16 pertaining to the period for which such assessee was employed with each of the employers. (ii) Part B (Annexure) of the certificate in Form No.16 may be issued by each of the employers or the last employer at the option of the assessee.</li>
    <li>In Part A, in items I and II, in the column for tax deposited in respect of deductee, furnish total amount of tax, surcharge and health and education cess.</li>
    <li>Deductor shall duly fill details, where available, in item numbers 2(f) and 10(k) before furnishing of Part B (Annexure) to the employee.]</li>
</ol>
                       </p>
                        <br/>
                        <table class="myTable" style="border-collapse:collapse;" cellpadding="0">
                            <tbody>
                                <tr><th colspan="5"><span class="myFontBg">Details of Salary paid and any other income and tax deducted</span></th></tr>
                                <tr><td><span class="myFontBg">1.</span></td><td>Gross Salary</td><td>Rs...</td><td></td><td></td></tr>
                                <tr><td></td><td>(a) Salary as per provisions contained in sec.17(1)</td><td>Rs...</td><td></td><td></td></tr>
                                <tr><td></td><td>(b) Value of perquisites u/s 17(2) (as per Form No.12BA, wherever applicable)</td><td>Rs...</td><td></td><td></td></tr>
                                <tr><td></td><td>(c) Profits in lieu of salary under section 17(3)(as per Form No.12BA, wherever applicable)</td><td>Rs...</td><td></td><td></td></tr>
                                <tr><td></td><td>(d) Total</td><td></td><td>Rs... </td><td></td></tr>
                                <tr><td><span class="myFontBg">2.</span></td><td>Less: Allowance to the extent exempt u/s 10</td><td>Rs...</td><td></td><td></td></tr>
                                <tr><td></td><td><div class="first-half"> Allowance </div><div class="second-half"> Rs </div></td><td></td><td></td><td></td></tr>
                                <tr><td></td><td><div class="first-half"> </div><div class="second-half"> </div></td><td>Rs.</td><td></td><td></td></tr>
                                <tr><td></td><td><div class="first-half"> </div><div class="second-half"> </div></td><td></td><td> Rs.</td><td></td></tr>
                                <tr><td><span class="myFontBg">3.</span></td><td>Balance (1-2)</td><td>Rs...</td><td></td><td></td></tr>
                                <!--<tr><td>3</td><td>Balance (1-2)</td><td>Rs...</td><td></td><td></td></tr>-->
                                <tr><td><span class="myFontBg">4.</span></td><td>Deductions :</td><td>Rs...</td><td></td><td></td></tr>
                                <tr><td></td><td>(a) Entertainment allowance</td><td>Rs...</td><td></td><td></td></tr>
                                <tr><td></td><td>(b) Tax on employment</td><td>Rs...</td><td></td><td></td></tr>
                                <tr><td><span class="myFontBg">5.</span></td><td>Aggregate of 4(a) and (b)</td><td>Rs...</td><td></td><td></td></tr>
                                <tr><td><span class="myFontBg">6.</span></td><td>Income chargeable under the head 'Salaries' (3-5)</td><td></td><td> Rs...</td><td></td></tr>
                                <tr><td><span class="myFontBg">7.</span></td><td>Add: Any other income reported by the employee</td><td></td><td></td><td></td></tr>
                                <tr><td></td><td><div class="first-half"> Income </div><div class="second-half"> Rs </div></td><td></td><td></td><td></td></tr>
                                <tr><td></td><td><div class="first-half"></div><div class="second-half"></div></td><td></td><td></td><td></td></tr>
                                <tr><td></td><td><div class="first-half"></div><div class="second-half"></div></td><td></td><td> Rs.</td><td></td></tr>
                                <tr><td><span class="myFontBg">8.</span></td><td>Gross total income (6+7) </td><td></td><td>Rs. </td><td></td></tr>
                                <tr><td><span class="myFontBg">9.</span></td><td>Deductions under Chapter VI-A</td><td></td><td></td><td></td></tr>
                                <tr><td></td><td>(A) sections 80C, 80CCC and 80CCD </td><td></td><td></td><td></td></tr></tr>
                                <tr><td></td><td>(a) section 80C </td><td></td><td><span class="myFontBg"> Gross Amount</span></td><td><span class="myFontBg"> Deductible Amount</span> </td></tr>
                                <tr><td></td><td>(i)</td><td></td><td> Rs.</td><td></td></tr>
                                <tr><td></td><td>(ii)</td><td></td><td> Rs.</td><td></td></tr>
                                <tr><td></td><td>(b) section 80CCC </td><td></td><td> Rs.</td><td> Rs.</td></tr>
                                <tr><td></td><td>(c) section 80CCD </td><td></td><td></td><td></td></tr>
                                <tr><td></td><td><span class="myFontBg">Note :</span> 1. Aggregate amount deductible under sections 80C, 80CCC and 80CCD(1) shall notexceed one lakh rupees.</td><td></td><td></td><td></td></tr>
                                <tr><td></td><td>(B) Other sections (e.g. 80E, 80G, 80TTA, etc.)under Chapter VI-A. </td><td></td><td></td><td></td></tr>
                                <tr><td></td><td></td><td><span class="myFontBg">Gross Amount</span></td><td><span class="myFontBg">Qualifying Amount</span></td><td><span class="myFontBg">Deductible Amount</span></td></tr>
                                <tr><td></td><td>(i) section </td><td>Rs</td><td>Rs</td><td>Rs</td></tr>
                                <tr><td></td><td>(ii) section </td><td>Rs</td><td>Rs</td><td>Rs</td></tr>
                                <tr><td></td><td>(iii) section </td><td>Rs</td><td>Rs</td><td>Rs</td></tr>
                                <tr><td></td><td>(iv) section </td><td>Rs</td><td>Rs</td><td>Rs</td></tr>
                                <tr><td><span class="myFontBg">10.</span></td><td>Aggregate of deductible amount under Chapter VI-A </td><td></td><td>Rs</td><td></td></tr>
                                <tr><td><span class="myFontBg">11.</span></td><td>Total Income (8-10) </td><td></td><td>Rs</td><td></td></tr>
                                <tr><td><span class="myFontBg">12.</span></td><td>Tax on total income </td><td></td><td>Rs</td><td></td></tr>
                                <tr><td><span class="myFontBg">13.</span></td><td>Education cess @ 3% (on tax computed at S. No. 12) </td><td></td><td>Rs</td><td></td></tr>
                                <tr><td><span class="myFontBg">14.</span></td><td>Tax Payable (12+13) </td><td></td><td>Rs</td><td></td></tr>
                                <tr><td><span class="myFontBg">15.</span></td><td>Less: Relief under section 89 (attach details) </td><td></td><td>Rs</td><td></td></tr>
                                <tr><td><span class="myFontBg">16.</span></td><td>Tax payable (14-15) </td><td></td><td>Rs</td><td></td></tr>
                                <tr><th colspan="6">Verification</th></tr>
                            <tr>
                              <td colspan="6">
                                I,_ _ _ _ _ _ _ _ _ _ _ _., son/daughter of _ _ _ _ _ _ _ _ _ _ _ _. working in the capacity of _ _ _ _ _ _ _ _ _ _ _ _. (designation) do hereby certify that a
                                sum of Rs. _ _ _ _ _ _ _ _ _ _ _ _.. [Rs. _ _ _ _ _ _ _ _ _ _ _ _. (in words)] has been deducted and deposited to the credit of the Central
                                Government. I further certify that the information given above is true, complete and correct and is based on the
                                books of account, documents, TDS statements, TDS deposited and other available records.
                              </td>
                            </tr>
                            <tr><th>Place</th><td colspan="2"></td><th colspan="3">(Signature of person responsible for deduction of tax)</th></tr>
                            <tr><th>Date</th><td colspan="2"></td><th colspan="3"></th></tr>
                            <tr><td colspan="3"><b>Designation: </b> <span class="empDesgin myFontBg">&nbsp;</span></td><td colspan="3"><b>Full Name:</b><span class="empFlName myFontBg">&nbsp;</span></td></tr>
                            </tbody>
                          </table>  
                    </div>
               </div>
            </div>
        </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-outline-primary pull-right getAction" id="downloadFrm" data-id="downloadForm16===thecodex"><i class="fe fe-download-cloud me-2"></i> Download</button>
           <!-- <button class="btn btn-outline-danger pull-right" style="margin-right:5px;"><i class="fe fe-trash fs-16"></i> Cancel</button>-->
        </div>
        </div>   
    </div>
</div>
<script src="<?php echo base_url("assets/js/html2pdf.bundle.js");?>"></script>
<script>

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
					$('#nmOfEmplyee').html(htmlAmi.empName+"<br>"+htmlAmi.address);
					$('#panOfEmplyee').html(htmlAmi.pan_nu);$('.empDesgin').html(htmlAmi.designation);$('.empFlName').html(htmlAmi.empName);
					}
				toastMultiShow(htmlAmi.addClas,htmlAmi.msg, htmlAmi.icon);
				$('#searchEmployee').html('<i class="ti-search"></i> Search');
				},'json');
		}
		/*else if(getData[0]=="downloadForm16")
		{
			$("#downloadFrm").html('<i class="fe fe-sun bx-spin"></i> Please Wait');
			}	*/				
	});
});
 const downloadButton = document.getElementById("downloadFrm");
        downloadButton.addEventListener('click', function()
		{
			const element = document.getElementById("getPrfrmList");
            const options = {
                margin:       [6,6,6,6],
                filename:     "download.pdf",
                image:        { type: "jpeg", quality: 0.98 },
                html2canvas:  { scale: 2,letterRendering: true },
                jsPDF:        { unit: "mm", format: "a4", orientation: "portrait" }
            };
		    html2pdf().from(element).set(options).save();
			 $("#downloadFrm").html('<i class="fe fe-download-cloud me-2"></i> Download');
        });
</script>
