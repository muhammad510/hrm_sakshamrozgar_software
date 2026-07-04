<div id="viewSalarySetup">
	<?php $grosAmt=($salarySumary)?((2*$salarySumary['pfAmt'])+$salarySumary['advance_amt']+$salarySumary['tdsAmt']+$salarySumary['insurance_amt']+$salarySumary['other_deduction']+$salarySumary['esicEmpAmt']+$salarySumary['esicEmpLyrAmt']):'0.00';
		  $ctcEmp=$grosAmt+$salarySumary['net_payble_amt'];
		?>												
    <div class="row">
       <div class="col-md-6">    
            <div class="pyDet">
             <div class="pyHdr">Payment Details</div>
                 <ul class="pyListDet">
                    <li>Basic Pay<span class="mStrong" id="vBasPay"><?php echo ($salarySumary['basic_pay']?$salarySumary['basic_pay']:'0.00');?></span></li>
                    <li>HRA<span class="mStrong" id="vHRAPay"><?php echo ($salarySumary['hraAmt']?$salarySumary['hraAmt']:'0.00');?></span></li>
                    <li>TA<span class="mStrong" id="vTAPay"><?php echo ($salarySumary['taAmt']?$salarySumary['taAmt']:'0.00');?></span></li>
                    <li>EA<span class="mStrong" id="vDAPay"><?php echo ($salarySumary['daAmt']?$salarySumary['daAmt']:'0.00');?></span></li>
                    <li>PDA<span class="mStrong" id="vPAPay"><?php echo ($salarySumary['paAmt']?$salarySumary['paAmt']:'0.00');?></span></li>
                    <li>Bonus<span class="mStrong" id="vBonusPay"><?php echo ($salarySumary['bonus']?$salarySumary['bonus']:'0.00');?></span></li>
                    <li>Special  Allowance<span class="mStrong" id="vMediAllPay"><?php echo ($salarySumary['mediAmt']?$salarySumary['mediAmt']:'0.00');?></span></li>
                    <li>Insentive<span class="mStrong" id="vInstvPay"><?php echo ($salarySumary['incentive']?$salarySumary['incentive']:'0.00');?></span></li>
                    <li>Other Income<span class="mStrong" id="vOthrIncPay"><?php echo ($salarySumary['other_inc']?$salarySumary['other_inc']:'0.00');?></span></li>
                    <li>Gross Salary Amount<span class="mStrong" id="vTgrsPay"><?php echo ($salarySumary['grSal']?$salarySumary['grSal']:'0.00');?></span></li>
                 </ul>
          </div>
        </div>
        <div class="col-md-6">
          <div class="pyDed">	
            <div class="pyDeduHdr">Deduction Details</div>
             <ul class="pyListDeduDet">
                <li>Provident Fund Employee<span class="mDedStrong" id="vPfPay"><?php echo ($salarySumary['pfAmt']?$salarySumary['pfAmt']:'0.00');?></span></li>
                <li>Provident Fund Employer<span class="mDedStrong" id="vPfPayEmplyr"><?php echo ($salarySumary['pfAmt']?$salarySumary['pfAmt']:'0.00');?></span></li>
                <li>Medical Allowance<span class="mDedStrong" id="vAdvncPay"><?php echo ($salarySumary['advance_amt']?$salarySumary['advance_amt']:'0.00');?></span></li>
                <li>TDS<span class="mDedStrong" id="vTdsPay"><?php echo ($salarySumary['tdsAmt']?$salarySumary['tdsAmt']:'0.00');?></span></li>
                <li>Mobile Allowance<span class="mDedStrong" id="vInsurncPay"><?php echo ($salarySumary['insurance_amt']?$salarySumary['insurance_amt']:'0.00');?></span></li>
               
                
                <li>ESIC Employee<span class="mDedStrong" id="esicEmp"><?php echo ($salarySumary['esicEmpAmt']?$salarySumary['esicEmpAmt']:'0.00');?></span></li>
                <li>ESIC Employer<span class="mDedStrong" id="esicEmpLyr"><?php echo ($salarySumary['esicEmpLyrAmt']?$salarySumary['esicEmpLyrAmt']:'0.00');?></span></li>
                <li>PT<span class="mDedStrong" id="vOthrDeduPay"><?php echo ($salarySumary['other_deduction']?$salarySumary['other_deduction']:'0.00');?></span></li>
                
                
                <li>Gross Deductions<span class="mDedStrong" id="tGrossDeduction"><?php echo $grosAmt;?></span></li>
              </ul>
             </div>
        </div>                                                           
<div class="col-md-12">
<div class="netPyble">NET Payable : 
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-currency-rupee" viewBox="0 0 16 16">
<path d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4z"></path></svg><span id="netPaybleSalAmt"><?php echo ($salarySumary['net_payble_amt']?$salarySumary['net_payble_amt']:'0.00');?></span></div>
</div> 
<div class="col-md-12">
<div class="netPyble" style="margin-top:-10px;border-top: 0px;">CTC : 
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-currency-rupee" viewBox="0 0 16 16">
<path d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4z"></path></svg>
<span id="empCtC" style="color:green"><?php echo ($ctcEmp?$ctcEmp:'0.00');?></span></div>
</div>
<div class="col-md-12">
            <button class="btn ripple btn-outline-secondary pull-right amiStl" id="SalStpDetBtn"><i class="ti-save"></i> Edit </button>
        </div>
        
    </div>
</div>
<div id="edtSalStpDetails" style="display:none;">


<?php //print_r($salarySumary);?>



  <form id="edSalDetails" method="post" data-id="<?php echo base_url('staff/profile/salary_setup/'.urlencode(base64_encode(json_encode(array('id'=>$employee->id,'branch_id'=>$employee->branch_id,'designation'=>$employee->designation)))));?>">
    <div class="row row-sm">
        <div class="col-12">
          <div class="pyDetails">
            <div class="row"><div class="col-12"> <div class="alert alert-solid-success"><strong>Payment Details</strong></div></div></div>
            <div class="row">
                 <div class="col-6"><label>Gross Salary:<span class="text-danger">*</span></label><div class="input-group mb-3">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="ti-wallet"></i></span></div>
                        <input type="text" class="form-control" name="grsSalAmt" id="grsSalAmt" value="<?php echo ($salarySumary['grSal']?$salarySumary['grSal']:'0.00');?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\  *?)\  */g, '$1')" >
                    </div>
                </div>
                <div class="col-6">
                    <label>Bonus:</label>
                        <div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text"><i class="si si-wallet"></i></span></div>
                          <input type="text" class="form-control setZeroInpt" name="bonusPayAmt" id="bonusPayAmt" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\  *?)\  */g, '$1')" value="<?php echo($salarySumary['bonus']?$salarySumary['bonus']:'0.00');?>">
                        </div>
                </div>
                 <div class="col-6">
                    <label>Basic Pay:<span class="text-danger">*</span></label>
                        <div class="input-group mb-3"> <div class="input-group-prepend"><span class="input-group-text"><i class="fe fe-percent"></i></span></div>
                            <input type="text" class="miForm-control setZeroInpt" name="basicPayPercent" id="basicPayPercent" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\  *?)\  */g, '$1')"  value="<?php echo ($salarySumary['basic_percent']?$salarySumary['basic_percent']:'0.00');?>">
                            <input type="text" class="form-control setZeroInpt" name="basicPayAmt" id="basicPayAmt" readonly="readonly"  value="<?php echo ($salarySumary['basic_pay']?$salarySumary['basic_pay']:'0.00');?>">
                        </div>
                </div>
                 <div class="col-6">
                    <label>HRA:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fe fe-percent"></i></span>
                            </div>
    <input type="text" class="miForm-control setZeroInpt" name="hraPercent" id="hraPercent" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\  *?)\  */g, '$1')"  value="<?php echo ($salarySumary['hra_percent']?$salarySumary['hra_percent']:'0.00');?>">
                            <input type="text" class="form-control setZeroInpt" name="hraPayAmt" id="hraPayAmt" readonly="readonly"  value="<?php echo($salarySumary['hraAmt']?$salarySumary['hraAmt']:'0.00');?>">
                        </div>
                </div>
                 <div class="col-6">
                    <label>TA:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fe fe-percent"></i></span>
                            </div>
                            <input type="text" class="miForm-control setZeroInpt" name="taPercent" id="taPercent" oninput="this.value=this.value.replace(/[^0-9.]/g, '').replace(/(\  *?)\  */g, '$1')" value="<?php echo($salarySumary['ta_percent']?$salarySumary['ta_percent']:'0.00');?>">
                            <input type="text" class="form-control setZeroInpt" name="taPayAmt" id="taPayAmt" readonly="readonly" value="<?php echo($salarySumary['taAmt']?$salarySumary['taAmt']:'0.00');?>">
                        </div>
                </div>
                 <div class="col-6">
                    <label>EA:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fe fe-percent"></i></span>
                            </div>
                            <input type="text" class="miForm-control setZeroInpt" name="daPercent" id="daPercent" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\  *?)\  */g, '$1')" value="<?php echo($salarySumary['da_percent']?$salarySumary['da_percent']:'0.00');?>">
                            <input type="text" class="form-control setZeroInpt" name="daPayAmt" id="daPayAmt" readonly="readonly" value="<?php echo($salarySumary['daAmt']?$salarySumary['daAmt']:'0.00');?>">
                        </div>
                </div>
                 <div class="col-6">
                    <label>PDA:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fe fe-percent"></i></span>
                            </div>
                            <input type="text" class="miForm-control setZeroInpt" name="paPercent" id="paPercent" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\  *?)\  */g, '$1')" value="<?php echo($salarySumary['pa_percent']?$salarySumary['pa_percent']:'0.00');?>">
                            <input type="text" class="form-control setZeroInpt" name="paPayAmt" id="paPayAmt" readonly="readonly" value="<?php echo($salarySumary['paAmt']?$salarySumary['paAmt']:'0.00');?>">
                        </div>
                </div>
                 
                 <div class="col-6">
                    <label>Special Allowance:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fe fe-percent"></i></span>
                            </div>
                            <input type="text" class="miForm-control setZeroInpt" name="mediAllPercent" id="mediAllPercent" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\  *?)\  */g, '$1')" value="<?php echo($salarySumary['medical_percent']?$salarySumary['medical_percent']:'0.00');?>">
                            <input type="text" class="form-control setZeroInpt" name="mediAllPayAmt" id="mediAllPayAmt" readonly="readonly" value="<?php echo($salarySumary['mediAmt']?$salarySumary['mediAmt']:'0.00');?>">
                        </div>
                </div>
                
                 <div class="col-6">
                    <label>Insentive:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="si si-wallet"></i></span></div>
                             <input type="text" class="form-control setZeroInpt" name="basicInsentvAmt" id="basicInsentvAmt"oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\  *?)\  */g, '$1')" value="<?php echo($salarySumary['incentive']?$salarySumary['incentive']:'0.00');?>" >
                        </div>
                </div>
                 <div class="col-6">
                    <label>Other Income:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-wallet"></i></span>
                            </div>
                            <input type="text" class="form-control setZeroInpt" name="otherBsInc" id="otherBsInc" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\  *?)\  */g, '$1')" value="<?php echo($salarySumary['other_inc']?$salarySumary['other_inc']:'0.00');?>">
                        </div>
                </div>
         </div>
           </div>
        </div>
         <?php //print_r($salarySumary);?>
        <div class="col-12">
         <div class="miDeduction">                  
           <div class="row"><div class="col-12"> <div class="alert alert-solid-warning"><strong>Deduction Details</strong></div></div></div>
           <div class="row">
                <div class="col-6">
                    <label>Provident Fund:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fe fe-percent"></i></span>
                        </div>
                        <input type="text" class="miForm-control setZeroInpt" name="pfPercent" id="pfPercent" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\  *?)\  */g, '$1')"  value="<?php echo($salarySumary['pf_percent']?$salarySumary['pf_percent']:'0.00');?>">
                        <input type="text" class="form-control setZeroInpt" name="pfPayAmt" id="pfPayAmt" readonly="readonly"  value="<?php echo($salarySumary['pfAmt']?$salarySumary['pfAmt']:'0.00');?>">
                    </div>
                </div>
                <div class="col-6">
                    <label>TDS:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fe fe-percent"></i></span>
                        </div>
                        <input type="text" class="miForm-control setZeroInpt" name="tdsPercent" id="tdsPercent" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\  *?)\  */g, '$1')"  value="<?php echo($salarySumary['tds_percent']?$salarySumary['tds_percent']:'0.00');?>">
                        <input type="text" class="form-control setZeroInpt" name="tdsPayAmt" id="tdsPayAmt" readonly="readonly"  value="<?php echo($salarySumary['tdsAmt']?$salarySumary['tdsAmt']:'0.00');?>">
                    </div>
                </div>
                <div class="col-4">
                    <label>Medical Allowance :</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="si si-wallet"></i></span>
                        </div>
                        <input type="text" class="form-control setZeroInpt" name="advancePayAmt" id="advancePayAmt" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\  *?)\  */g, '$1')"  value="<?php echo($salarySumary['advance_amt']?$salarySumary['advance_amt']:'0.00');?>">
                    </div>
                </div>
                <div class="col-4">
                    <label>Mobile Allowance :</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="si si-wallet"></i></span>
                        </div>
                        
                        <input type="text" class="form-control setZeroInpt" name="insurancePayAmt" id="insurancePayAmt" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\  *?)\  */g, '$1')"  value="<?php echo($salarySumary['insurance_amt']?$salarySumary['insurance_amt']:'0.00');?>">
                    </div>
                </div>
                <div class="col-4">
                    <label>PT :</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="si si-wallet"></i></span>
                        </div>
                       <input type="text" class="form-control setZeroInpt" name="otherDedPayAmt" id="otherDedPayAmt" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\  *?)\  */g, '$1')"  value="<?php echo($salarySumary['other_deduction']?$salarySumary['other_deduction']:'0.00');?>">
                    </div>
                </div>
                <div class="col-6">
                    <label>ESIC Employee :</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fe fe-percent"></i></span>
                        </div>
                        <input type="text" class="miForm-control setZeroInpt" name="esicEmployee" id="esicEmployee" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\  *?)\  */g, '$1')"  value="<?php echo($salarySumary['esic_employee']?$salarySumary['esic_employee']:'0.00');?>">
                        <input type="text" class="form-control setZeroInpt" name="esicEmpPayAmt" id="esicEmpPayAmt" readonly="readonly"  value="<?php echo($salarySumary['esicEmpAmt']?$salarySumary['esicEmpAmt']:'0.00');?>">
                    </div>
                </div>
                <div class="col-6">
                    <label>ESIC Employer :</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fe fe-percent"></i></span>
                        </div>
                        <input type="text" class="miForm-control setZeroInpt" name="esicEmployer" id="esicEmployer" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\  *?)\  */g, '$1')"  value="<?php echo($salarySumary['esic_employer']?$salarySumary['esic_employer']:'0.00');?>">
                        <input type="text" class="form-control setZeroInpt" name="esicEmpAmt" id="esicEmpAmt" readonly="readonly"  value="<?php echo($salarySumary['esicEmpLyrAmt']?$salarySumary['esicEmpLyrAmt']:'0.00');?>">
                    </div>
                </div>
           </div>
          </div>
      </div>
        <div class="col-12">
        <div class="ntPyble">
          <div class="row"> 
           <div class="col-6">
            <label>Net Payble:</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="mdi mdi-cash"></i></span>
                </div>
              <input type="text" class="form-control setZeroInpt" name="netPayAmt" id="netPayAmt" readonly="readonly"  value="<?php echo($salarySumary['net_payble_amt']?$salarySumary['net_payble_amt']:'0.00');?>">
            </div>
        </div>
           <div class="col-6">
                <label>CTC:</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="mdi mdi-cash"></i></span>
                    </div>
                  <input type="text" class="form-control setZeroInpt" name="empCTC" id="empCTC" readonly="readonly"  value="<?php echo ($ctcEmp?$ctcEmp:'0.00');?>">
                </div>
            </div>
          </div>  
        </div>
      </div>  
      <div class="col-md-12">
        <button class="btn ripple btn-outline-secondary pull-right amiStl" id="saveSalStpkDet"><i class="ti-save"></i> Save</button>
        <button class="btn ripple btn-outline-dark pull-right amiStl" id="proSalStpBck" type="button"><i class="ti-arrow-left"></i> Back</button>
      </div>
    </div>
  </form>
</div>