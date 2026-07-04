<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ledger extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('user_agent');
		$this->load->library(array('upload','image_lib'));
		$this->load->helper(array('form','email'));
		$this->load->model('admin/ledger_model', 'ledger');
        ($this->session->userdata('mim_id')== '') ? redirect(base_url(), 'refresh') : '';
	    $this->logID=$this->session->userdata('mim_id');
		$this->memCode=$this->session->userdata('memCode');
		$this->uCat=$this->session->userdata('user_cate');
		$this->logBranch=$this->session->userdata('mi_brID');
        error_reporting(0);	
		
	}
   public function index($actn=NULL)
   {
   		if($actn=='viewList')  	 
	    {
			$post_data = $this->input->post();
            $record = $this->ledger->account_list($post_data);
			$i=$post_data['start'] + 1;
            $return['data'] = array();
            foreach ($record as $row) {
			/*$row->tnx_id,*/
                $return['data'][] = array( '<strong>'.$i++.'.</strong>',
											'<strong>'.date('d-M-Y',strtotime($row->created_date)).'</strong> <sup class="spTxt">'.
											date('H:i:s a',strtotime($row->created_date)).'</sup>',
											$row->reason,
											$row->opening_balance,
											$row->credit_amt,
										    $row->debit_amt,
											$row->closing_balance);

            }
            $return['recordsTotal'] = $this->ledger->account_count();
            $return['recordsFiltered'] = $this->ledger->account_filter_count($post_data);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);
			
			}
		else if($actn=='addFund')
		{
			$post=$this->input->post();
			$this->form_validation->set_rules('accountTyp', 'account', 'trim|required|xss_clean');
			$this->form_validation->set_rules('tnxType', 'transaction type', 'trim|required|xss_clean');
			$this->form_validation->set_rules('fundAmt', 'tnx. amount', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('rmDscription', 'remarks', 'trim|required|xss_clean');
			if($this->form_validation->run()==TRUE) 
			{
				$post=$this->input->post();
				$getLastTnx=$this->ledger->getLastCompanyTnx();
				if($post['tnxType']=='credit')
				{
					$closing=($getLastTnx?$getLastTnx->closing_balance:'0.00')+$post['fundAmt'];
					$opening=($getLastTnx?$getLastTnx->closing_balance:'0.00');
					$tnxArr=array('account_id'=>$post['accountTyp'],'tnx_id'=>$post['fndNwiD'],'tnx_type'=>$this->uCat,'opening_balance'=>$opening,
								  'credit_amt'=>$post['fundAmt'],'closing_balance'=>$closing,'reason'=>$post['rmDscription'],'tnx_purpose'=>'3',
								  'created_by'=>$this->logID,'created_date'=>date('Y-m-d H:i:s'));
					$tnxFundResult=$this->common->save_data('company_income',$tnxArr);
					if($tnxFundResult){$data=array('addClas'=>'tst_success','msg'=>array('Thank You! you have successfully credited fund.'),'icon'=>'<i class="ti-check-box"></i>');}
					else{$data=array('addClas'=>'tst_danger','msg'=>array('Oops it seems some thing went wrong while cretaing salary tnx from company.','Please refresh page.'),'icon'=>'<i class="fe fe-sun bx-spin"></i>');}

					}
				else if($post['tnxType']=='debit')
				{
					
					if($post['fundAmt'] < $getLastTnx->opening_balance)
					{
						$closing=($getLastTnx?$getLastTnx->closing_balance:'0.00')-$post['fundAmt'];
						$opening=($getLastTnx?$getLastTnx->closing_balance:'0.00');
						$tnxArr=array('account_id'=>$post['accountTyp'],'tnx_id'=>$post['fndNwiD'],'tnx_type'=>$this->uCat,'opening_balance'=>$opening,'debit_amt'=>$post['fundAmt'],'closing_balance'=>$closing,
									  'reason'=>$post['rmDscription'],'tnx_purpose'=>'3',
									  'created_by'=>$this->logID,'created_date'=>date('Y-m-d H:i:s'));
						$tnxFundResult=$this->common->save_data('company_income',$tnxArr);
						if($tnxFundResult){$data=array('addClas'=>'tst_success','msg'=>array('Thank You! you have successfully debited fund.'),'icon'=>'<i class="ti-check-box"></i>');}
						else{$data=array('addClas'=>'tst_danger','msg'=>array('Oops it seems some thing went wrong while cretaing salary tnx from company.','Please refresh page.'),'icon'=>'<i class="fe fe-sun bx-spin"></i>');}
						}
						else{$data=array('addClas'=>'tst_danger','msg'=>array('Insufficient funds for debit to company account.'),'icon'=>'<i class="fe fe-sun bx-spin"></i>');}
				}
				else
				{
					$msg=array('Oops is seems you have wrong direction');
					$data=array('addClas'=>'tst_danger','msg'=>$msg,'icon'=>'<i class="fe fe-sun bx-spin"></i>');
					}	
				}
				else
				{
					$msg=array('accountTyp'=>form_error('accountTyp'),'tnxType'=>form_error('tnxType'),'fundAmt'=>form_error('fundAmt'),'rmDscription'=>form_error('rmDscription'));
					$data=array('addClas'=>'tst_danger','msg'=>$msg,'icon'=>'<i class="fe fe-sun bx-spin"></i>');
					}sleep(1);echo json_encode($data);	
			}	
			else
			{  			
				$data['account']=$this->common->all_data_con('account_manage',array('company_id'=>'1'),'*');
				$data['newAccID']=substr(str_shuffle('0123456789'),0,10);
				$data['addNwAcc']='admin/ledger/index/addFund';
				$data['tnxHistory']=$this->ledger->getLastCompanyTnx();
				$data['title']='Account Manage';
				$data['breadcrums'] = 'Account Manage';
				$data['target']='admin/ledger/index/viewList';
				$data['layout']= "admin/ledger/accounts.php";
				$this->load->view('base',$data);
				}	
		}	
   public function payroll($actn=NULL)
   {
		if($actn=='viewList')
		{
			
			 $post_data=$this->input->post();
			 $record=$this->ledger->payroll_list($post_data);
			 $i=$post_data['start'] + 1; $return['data'] = array();
             foreach($record as $row) 
			 { 
				if($row->paid_status=='0'){$status='<a class="badge bg-warning  miLvs" href="javascript:void(0)">Unpaid</a>';}
				else if($row->paid_status=='1'){$status='<a class="badge bg-success  miLvs" href="javascript:void(0)">Paid</a>';}
				else if($row->paid_status=='2'){$status='<a class="badge bg-primary  miLvs" href="javascript:void(0)">Hold</a>';}
				else{$status='<a class="badge bg-danger  miLvs" href="javascript:void(0)">Reject</a>';}
				$view = '<div style="text-align:center">
							<a href="javascript:void(0);" data-id="viewDetails===admin/ledger/payroll/viewDetails==='.$row->id.'" title="Click to View Salary Details" class="btn ripple miView btn-sm arvAction" id="vw0'.$row->id.'"><i class="ti-eye"></i></a>&emsp;
                <a href="javascript:void(0);" style="margin-left:-13px;" data-id="editDetails===admin/ledger/payroll/editDetails==='.$row->id.'" title="Click to Update Salary Details" class="btn ripple btn-secondary btn-sm arvAction"  id="upD0'.$row->id.'"><i class="ti-pencil-alt"></i></a>&emsp;
				<a href="javascript:void(0);" style="margin-left:-13px;" data-id="printSalSlip===admin/ledger/payroll/printSlip==='.$row->id.'" title="Click to Update Salary Details" class="btn ripple dnlod btn-sm arvAction" id="pr0'.$row->id.'"><i class="si si-printer"></i></a>
				</div>';
				$tGrossDeduction=$row->pfAmt+$row->advance_amt+$row->tdsAmt+$row->insurance_amt+$row->other_deduction;
				$getMonth=array('01'=>'Jan','02'=>'Feb','03'=>'Mar','04'=>'Apr','05'=>'May','06'=>'Jun','07'=>'Jul','08'=>'Aug','09'=>'Sep','10'=>'Oct','11'=>'Nov','12'=>'Dec');

                $return['data'][] = array( '<strong>'.$i++.'.</strong>',
											$row->tnx_id,
											$row->employee_id,
											$row->name,
											'<span class="inrBlue"><i class="si si-event" aria-hidden="true"></i></span> '.$getMonth[$row->month].'-'.$row->year,
											$row->designation_name,
											'<span class="inrGrn"><i class="fa fa-inr" aria-hidden="true"></i></span> '.$row->amount,
											'<strong>'.date('d-M-Y',strtotime($row->created_date)).'</strong>',
											$status,
											$view );

            }
            $return['recordsTotal'] = $this->ledger->payroll_count();
            $return['recordsFiltered'] = $this->ledger->payroll_filter_count($post_data);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);
			}
		else if($actn=='editDetails')
		{
			$post=$this->input->post('getWhere');
			$paySlipDetail=$this->ledger->getPaySlipDetails($post);sleep(2);
			$getMonth=array('01'=>'January','02'=>'February','03'=>'March','04'=>'April','05'=>'May','06'=>'June','07'=>'July','08'=>'August',
							 '09'=>'September','10'=>'October','11'=>'November','12'=>'December');
			$monthSal='<option value=""> Choose One </option>';	$select='selected="selected"';	$salYear=date('Y');$salaryYear='<option value=""> Choose One </option>';	
			foreach($getMonth as $keyD=>$selct){$monthSal.='<option value="'.$selct.'" '.(($paySlipDetail->month==$keyD)?$select:"").'>'.$selct.'</option>';} 		
			for($x=0;$x<5;$x++){$session=$salYear-$x;$salaryYear.='<option value="'.$session.'" '.(($paySlipDetail->year==$session)?$select:"").'>'.$session.'</option>';}
			
			$salaryDetails=$this->common->get_data('employee_salary_transaction', array('emp_sal_id'=>$paySlipDetail->id),'*');		
			if($salaryDetails)
			 {	
					$paySlipDetail->tTlPrsnt=$salaryDetails['totalPresent'];
					$paySlipDetail->slBasic=number_format($salaryDetails['basic_sal'],2,".","");
					$paySlipDetail->slHra=number_format($salaryDetails['hraAmt'],2,".","");
					$paySlipDetail->slTa=number_format($salaryDetails['taAmt'],2,".","");
					$paySlipDetail->slDa=number_format($salaryDetails['daAmt'],2,".","");
					$paySlipDetail->slPa=number_format($salaryDetails['paAmt'],2,".","");
					$paySlipDetail->slMedi=number_format($salaryDetails['medical'],2,".","");
					$paySlipDetail->slBonus=$salaryDetails['bonus'];
					$paySlipDetail->slInsent=$salaryDetails['insentive'];
					$paySlipDetail->slOthrInc=$salaryDetails['otherInc'];					
					$paySlipDetail->slGrsAmt=number_format(($salaryDetails['basic_sal']+$salaryDetails['hraAmt']+$salaryDetails['taAmt']+$salaryDetails['daAmt']+$salaryDetails['paAmt']+$salaryDetails['bonus']+$salaryDetails['medical']+$salaryDetails['insentive']+$salaryDetails['otherInc']),2,".","");
					$paySlipDetail->slPf=number_format($salaryDetails['pfAmt'],2,".","");
					$paySlipDetail->slTds=number_format($salaryDetails['tdsAmt'],2,".","");
					$paySlipDetail->slAdv=$salaryDetails['advance'];
					$paySlipDetail->slInsur=$salaryDetails['insurance'];
					$paySlipDetail->slOthrDed=$salaryDetails['othrDeduction'];
					$paySlipDetail->slDeduct=number_format(($salaryDetails['pfAmt']+$salaryDetails['tdsAmt']+$salaryDetails['insurance']+$salaryDetails['othrDeduction']+$salaryDetails['advance']),2,".","");
						}
				$paySlipDetail->pyMnth=$monthSal;$paySlipDetail->pyYear=$salaryYear;
			echo json_encode($paySlipDetail);
			}	
		else if($actn=='viewDetails')
		{
			$post=$this->input->post('getWhere');
			$paySlipDetail=$this->ledger->getPaySlipDetails($post);
			sleep(2);
			if($paySlipDetail)
			{
				$getMonth=array('01'=>'January','02'=>'February','03'=>'March','04'=>'April','05'=>'May','06'=>'June','07'=>'July','08'=>'August','09'=>'September','10'=>'October','11'=>'November','12'=>'December');
				$paySlipDetail->pyMnth=$getMonth[$paySlipDetail->month].' '.$paySlipDetail->year;
				$paySlipDetail->pyDt=$paySlipDetail->pay_date?date('d/m/Y',strtotime($paySlipDetail->pay_date)):'N/A';
				$salaryDetails=$this->common->get_data('employee_salary_transaction', array('emp_sal_id'=>$paySlipDetail->id),'*');
				if($salaryDetails)
				{	
					//print_r($salaryDetails);
					//echo getIndianCurrency('100000000009.90');
					$netPay=$paySlipDetail->net_pay;
					$paySlipDetail->tTlPrsnt=$salaryDetails['totalPresent'];
					$paySlipDetail->slBasic=number_format($salaryDetails['basic_sal'],2,".","");
					$paySlipDetail->slHra=number_format($salaryDetails['hraAmt'],2,".","");
					$paySlipDetail->slTa=number_format($salaryDetails['taAmt'],2,".","");
					$paySlipDetail->slDa=number_format($salaryDetails['daAmt'],2,".","");
					$paySlipDetail->slPa=number_format($salaryDetails['paAmt'],2,".","");
					$paySlipDetail->slMedi=number_format($salaryDetails['medical'],2,".","");
					$paySlipDetail->slBonus=$salaryDetails['bonus'];
					$paySlipDetail->slInsent=$salaryDetails['insentive'];
					$paySlipDetail->slOthrInc=$salaryDetails['otherInc'];					
$paySlipDetail->slGrsAmt=number_format(($paySlipDetail->slBasic+$paySlipDetail->slHra+$paySlipDetail->slTa+$paySlipDetail->slDa+$paySlipDetail->slPa+$paySlipDetail->slMedi+$paySlipDetail->slBonus+$paySlipDetail->slInsent+$paySlipDetail->slOthrInc),2,".","");
					$paySlipDetail->slPf=number_format($salaryDetails['pfAmt'],2,".","");
					$paySlipDetail->slTds=number_format($salaryDetails['tdsAmt'],2,".","");
					$paySlipDetail->slAdv=$salaryDetails['advance'];
					$paySlipDetail->slInsur=$salaryDetails['insurance'];
					$paySlipDetail->slOthrDed=$salaryDetails['othrDeduction'];
					$paySlipDetail->slDeduct=number_format(($paySlipDetail->slPf+$paySlipDetail->slTds+$paySlipDetail->slAdv+$paySlipDetail->slInsur+$paySlipDetail->slOthrDed),2,".","");
					$paySlipDetail->pay_in_word	=$this->common->getIndianCurrency($netPay);
					/*echo '<br><br>';print_r($paySlipDetail);*/
					}
				}
			echo json_encode($paySlipDetail);
			}
		else if($actn=='findEmployee')
		{
			$post=$this->input->post('oprType');
			$empDetail=$this->ledger->findEmployeeByNmID($post);
			if($empDetail)
			{
				foreach($empDetail as $emp)
				{
						$fndData='findEmployee===admin/ledger/payroll/setPyroll==='.$emp->id;
						$empNm=(strlen($emp->name) > 15)?(substr($emp->name, 0,20).' ...'):$emp->name;
				echo '<li class="getAction" data-id="'.$fndData.'"><i class="si si-user"></i> '.$empNm.' <span>('.$emp->employee_id.')</span></li>';
						}
					}
					else{echo '<li class="miNoEmp"><i class="si si-user"></i> No employee available</li>';}
				
		}
		else if($actn=='setPyroll')
		{
			$post=$this->input->post('id');
			$getDetails=$this->ledger->getEmployeeDetail($post);
			echo json_encode($getDetails);
			}	
		else if($actn=='searchEmployee')
		{
			$this->form_validation->set_rules('id', 'employee name/Id', 'trim|required|xss_clean');
			$this->form_validation->set_rules('salaryMonth', 'salary month', 'trim|required|xss_clean');
			$this->form_validation->set_rules('salaryYear', 'salary year', 'trim|required|xss_clean');
			if($this->form_validation->run()==TRUE) 
			{
					$post=$this->input->post();sleep(1);					
					$isNumericMonth=array('January'=>'01','February'=>'02','March'=>'03','April'=>'04','May'=>'05','June'=>'06','July'=>'07','August'=>'08','September'=>'09',
								   'October'=>'10','November'=>'11','December'=>'12');
					$whereConCheck=array('employee_id'=>$post['id'],'month'=>$isNumericMonth[$post['salaryMonth']],'year'=>$post['salaryYear']);			   	
					$isCheckSalaryGiven=$this->common->get_data('employee_salary',$whereConCheck,'*');
					//$dayInMonth=date("t",strtotime($post_data['yearSearch'].'-'.$post_data['monthSearch']));
					if(!$isCheckSalaryGiven)
					{
						
						$isMonth=array('January'=>'31','February'=>'28','March'=>'31','April'=>'30','May'=>'31','June'=>'30','July'=>'31','August'=>'31','September'=>'30',
									   'October'=>'31','November'=>'30','December'=>'31');			   
						$isLeapYear=(date('L', mktime(0, 0, 0, 1, 1, $post['salaryYear']))==1)?'Yes':'No';
						$isMonthLastDay=(($isLeapYear=='Yes')&&($post['salaryMonth']=='February'))?'29':$isMonth[$post['salaryMonth']];
						$salMonthYr=$post['salaryYear'].'-'.$isNumericMonth[$post['salaryMonth']].'-';
						$isWhereMonth=array('strtDt'=>$salMonthYr.'01','endDt'=>$salMonthYr.$isMonthLastDay,'id'=>$post['id'],'dayInMonth'=>$isMonthLastDay);
						$getAttendance=$this->ledger->getEmployeeAttendance($isWhereMonth);
						if($getAttendance)
						{
							if($post['salaryMonth']=='February'){$actPresent=(($getAttendance['actualPresent']=='24')?'26':($getAttendance['actualPresent']+2));}else{$actPresent=$getAttendance['actualPresent'];}
							 $getDetails=$this->ledger->getEmployeeForPayrol($post['id'],(($actPresent>26)?26:$actPresent));
								if($getAttendance['actualPresent'] >=$getAttendance['tWorking'])
								{
									$netSalary['net_salary']=$getDetails['net_payble_amt'];
									}
								else
								{
									$netSalary['net_salary']=round(($getDetails['net_payble_amt']*$actPresent/26),2);
									}
							}
						$getDetails['totalPresent']=$getAttendance['actualPresent'];
						$data=array('addClas'=>'tst_success','msg'=>array('Thank You! you have successfully create new expense.'),'icon'=>'<i class="ti-check-box"></i>');
						$data=array_merge($data,$getDetails,$netSalary);
						}
						else
						{
							$status=array('This salary has been processed and pending.','This salary has been already paid by authority.',
										  'This salary has been on hold by authority.','This salary has been already rejected by authority.');
							$msg=array($status[$isCheckSalaryGiven['paid_status']]);
							$data=array('addClas'=>'tst_warning','msg'=>$msg,'icon'=>'<i class="fe fe-sun bx-spin"></i>');
							}
				}
				else
				{
					$msg=array('id'=>form_error('id'),'salaryMonth'=>form_error('salaryMonth'),'salaryYear'=>form_error('salaryYear'));
					$data=array('addClas'=>'tst_danger','msg'=>$msg,'icon'=>'<i class="fe fe-sun bx-spin"></i>');
					}
					sleep(1);
			echo json_encode($data);
			}					
		else if($actn=='printSlip')
		{
			$post=$this->input->post('getWhere');sleep(2);
			$paySlipDetail=$this->ledger->getPaySlipDetails($post);
			$salaryDetails=$this->common->get_data('employee_salary_transaction', array('emp_sal_id'=>$paySlipDetail->id),'*');
			$data['salaryDetails']=$salaryDetails;
			$data['paySlipDetail']=$paySlipDetail;
			$this->load->view('admin/ledger/view_slip.php',$data);
			}
		else if($actn=='approvedPayment')
		{
			
			$this->form_validation->set_rules('empSrchdID', 'employee name/Id', 'trim|required|xss_clean');
			$this->form_validation->set_rules('salaryMonth', 'salary month', 'trim|required|xss_clean');
			$this->form_validation->set_rules('salaryYear', 'salary year', 'trim|required|xss_clean');
			$this->form_validation->set_rules('empNetSalary', 'net salary', 'trim|required|xss_clean');
			$this->form_validation->set_rules('paySalStatus', 'approval status', 'trim|required|xss_clean');
			if($this->form_validation->run()==TRUE) 
			{
					$post=$this->input->post();
					$tnxID=substr(str_shuffle('0123456789'),0,10);
					$isNumericMonth=array('January'=>'01','February'=>'02','March'=>'03','April'=>'04','May'=>'05','June'=>'06','July'=>'07','August'=>'08','September'=>'09',
								          'October'=>'10','November'=>'11','December'=>'12');
					$whereConCheck=array('employee_id'=>$post['empSrchdID'],'month'=>$isNumericMonth[$post['salaryMonth']],'year'=>$post['salaryYear']);			   	
					$isCheckSalaryGiven=$this->common->get_data('employee_salary',$whereConCheck,'*');
					if(!$isCheckSalaryGiven)
					{
						$month = date("m", strtotime($post['salaryMonth']."-".$post['salaryYear']));
						$empSalArr=array('tnx_id'=>$tnxID,'employee_id'=>$post['empSrchdID'],'month'=>$month,'year'=>$post['salaryYear'],'paid_status'=>$post['paySalStatus'],
										 'payment_mode'=>'Cash','description'=>'By Cash Payment Salary',
										 'amount'=>$post['empNetSalary'],'created_typ'=>$this->uCat,'created_by'=>$this->logID,'created_date'=>date('Y-m-d H:i:s')
										 );
						$createSl=$this->common->save_data('employee_salary',$empSalArr);//$createSl='1';
						if($createSl)
						{				 
							$crSalTnxArr=array('emp_sal_id'=>$createSl,'basic_sal'=>$post['empBasicSal'],'hraAmt'=>$post['empHra'],'taAmt'=>$post['empTA'],'daAmt'=>$post['empDA'],
											   'paAmt'=>$post['empPA'],'bonus'=>$post['empBonus'],'medical'=>$post['empMedical'],'insentive'=>$post['empInsentive'],
											   'otherInc'=>$post['empOthrInc'],'pfAmt'=>$post['empPF'],'tdsAmt'=>$post['empTDS'],'insurance'=>$post['empInsurance'],
											   'othrDeduction'=>$post['empOthrDeduction'],'grossAmt'=>$post['empGrossSalary'],'advance'=>$post['empAdvance'],
											   'totalPresent'=>$post['empTotalPresent']);
							$createSlDetails=$this->common->save_data('employee_salary_transaction',$crSalTnxArr);//$createSlDetails='1';
							if($createSlDetails)
							{
								  if($post['paySalStatus']=='1')
								  {								   
									$getLastTnx=$this->ledger->getLastCompanyTnx();
									if($getLastTnx){$opening=$getLastTnx->closing_balance;}else{$opening=0;}$closing=$opening-$post['empNetSalary'];
									$cExpense=array('tnx_id'=>$tnxID,'tnx_type'=>$this->uCat,'tnx_purpose'=>'1','benificiary_id'=>$post['empUserId'],'opening_balance'=>$opening,
													'debit_amt'=>$post['empNetSalary'],'closing_balance'=>$closing,'reason'=>'By Cash Payment Salary',
													'created_by'=>$this->logID,'created_date'=>date('Y-m-d H:i:s')
													);
									if($opening > $post['empNetSalary'])
									{
										$cmpnyExpnse=$this->common->save_data('company_income',$cExpense);
										if($cmpnyExpnse){$data=array('addClas'=>'tst_success','msg'=>array('Thank You! you have successfully credited salary.'),'icon'=>'<i class="ti-check-box"></i>');}
											else{$data=array('addClas'=>'tst_danger','msg'=>array('Oops it seems some thing went wrong while cretaing salary tnx from company.','Please refresh page.'),'icon'=>'<i class="fe fe-sun bx-spin"></i>');}
										}
									 else
									 {
										if($this->common->update_data('employee_salary',array('id'=>$createSl),array('paid_status'=>'2')))
						  				 {$data=array('addClas'=>'tst_warning','msg'=>array('Insufficient funds,please add funds to company account.'),'icon'=>'<i class="ti-check-box"></i>');}
										  else{$data=array('addClas'=>'tst_danger','msg'=>array('Oops it seems some thing went wrong while cretaing salary details.','Please refresh page.'),'icon'=>'<i class="fe fe-sun bx-spin"></i>');}
										}	
									}
								  else{$data=array('addClas'=>'tst_warning','msg'=>array('Thank You! Salary created but goes on hold'),'icon'=>'<i class="ti-check-box"></i>');}
								}
							   else{$data=array('addClas'=>'tst_danger','msg'=>array('Oops it seems some thing went wrong while cretaing salary details.','Please refresh page.'),'icon'=>'<i class="fe fe-sun bx-spin"></i>');}
							}
						 else{$data=array('addClas'=>'tst_danger','msg'=>array('Oops it seems some thing went wrong while cretaing salary.','Please refresh page.'),'icon'=>'<i class="fe fe-sun bx-spin"></i>');}
					  }
					  else
					  {
						  $month = date("m", strtotime($post['salaryMonth']."-".$post['salaryYear']));
						  $empSalArr=array('employee_id'=>$post['empSrchdID'],'month'=>$month,'year'=>$post['salaryYear'],'paid_status'=>$post['paySalStatus'],
										   'amount'=>$post['empNetSalary'],'modified_type'=>$this->uCat,'modified_by'=>$this->logID,'modified_date'=>date('Y-m-d H:i:s'));
						  $crSalTnxArr=array('basic_sal'=>$post['empBasicSal'],'hraAmt'=>$post['empHra'],'taAmt'=>$post['empTA'],'daAmt'=>$post['empDA'],
											 'paAmt'=>$post['empPA'],'bonus'=>$post['empBonus'],'medical'=>$post['empMedical'],'insentive'=>$post['empInsentive'],
											 'otherInc'=>$post['empOthrInc'],'pfAmt'=>$post['empPF'],'tdsAmt'=>$post['empTDS'],'insurance'=>$post['empInsurance'],
											 'othrDeduction'=>$post['empOthrDeduction'],'grossAmt'=>$post['empGrossSalary'],'advance'=>$post['empAdvance'],
											 'totalPresent'=>$post['empTotalPresent']);						   
						  if($this->common->update_data('employee_salary',array('id'=>$isCheckSalaryGiven['id']),$empSalArr))
						  {
								if($this->common->update_data('employee_salary_transaction',array('emp_sal_id'=>$isCheckSalaryGiven['id']),$crSalTnxArr))
								{											
									 $getCmpnyTnx=$this->common->get_data('company_income',array('tnx_id'=>$isCheckSalaryGiven['tnx_id'],'tnx_purpose'=>'1'),'*');		
									 if($getCmpnyTnx)
									 {
										 $newClosing=$getCmpnyTnx['opening_balance']-$post['empNetSalary'];
										 $upDateAr=array('debit_amt'=>$post['empNetSalary'],'closing_balance'=>$newClosing);
										 if($this->common->update_data('company_income',array('id'=>$getCmpnyTnx['id']),$upDateAr))
										 {
											  $sheetWhere=array('id'=>$getCmpnyTnx['id'],'amount'=>$post['empNetSalary']);
											  $sheetResult=$this->common->balance_sheet($sheetWhere); 
											  if($sheetResult=='1'){$data=array('addClas'=>'tst_success','msg'=>array('Thank you!You have successfully updated details'),'icon'=>'<i class="ti-check-box"></i>');}
											  else{$data=array('addClas'=>'tst_danger','msg'=>array('Oops it seems some thing went wrong while updating company tnx.','Please refresh page.'),'icon'=>'<i class="fe fe-sun bx-spin"></i>');}
											}
										else{$data=array('addClas'=>'tst_danger','msg'=>array('Oops it seems some thing went wrong while updating company tnx.','Please refresh page.'),'icon'=>'<i class="fe fe-sun bx-spin"></i>');}
									 }
									 else
									 {
										   $getLastTnx=$this->ledger->getLastCompanyTnx();
									       if($getLastTnx){$opening=$getLastTnx->closing_balance;}else{$opening=0;}$closing=$opening-$post['empNetSalary'];
										   if($opening > $post['empNetSalary'])
										   {
										   	  if($post['paySalStatus']=='1')
											  {	
													$cExpense=array('tnx_id'=>$isCheckSalaryGiven['tnx_id'],'tnx_type'=>$this->uCat,'tnx_purpose'=>'1','benificiary_id'=>$post['empUserId'],'opening_balance'=>$opening,
																	'debit_amt'=>$post['empNetSalary'],'closing_balance'=>$closing,'reason'=>'By Cash Payment Salary','created_by'=>$this->logID,'created_date'=>date('Y-m-d H:i:s'));
													$cmpnyExpnse=$this->common->save_data('company_income',$cExpense);
													if($cmpnyExpnse){$data=array('addClas'=>'tst_success','msg'=>array('Thank You! you have successfully credited salary.'),'icon'=>'<i class="ti-check-box"></i>');}
													else{$data=array('addClas'=>'tst_danger','msg'=>array('Oops it seems some thing went wrong while cretaing salary tnx from company.','Please refresh page.'),'icon'=>'<i class="fe fe-sun bx-spin"></i>');}
												}
												else
												{
													$message=($post['paySalStatus']=='0')?array('Thank You! Salary created but goes on pending'):array('Thank You! Salary created but goes on hold');
													$data=array('addClas'=>'tst_warning','msg'=>$message,'icon'=>'<i class="ti-check-box"></i>');
													}
										     }
											 else
											 {
											 	 if($this->common->update_data('employee_salary',array('id'=>$isCheckSalaryGiven['id']),array('paid_status'=>'2')))
												 {$data=array('addClas'=>'tst_warning','msg'=>array('Insufficient funds,please add funds to company account.'),'icon'=>'<i class="ti-check-box"></i>');}
												 else{$data=array('addClas'=>'tst_danger','msg'=>array('Oops it seems some thing went wrong while cretaing salary details.','Please refresh page.'),'icon'=>'<i class="fe fe-sun bx-spin"></i>');}
											} 
										}
									}
								  else{$data=array('addClas'=>'tst_danger','msg'=>array('Oops it seems some thing went wrong while updating salary details.','Please refresh page.'),'icon'=>'<i class="fe fe-sun bx-spin"></i>');}
						  		}
							else{$data=array('addClas'=>'tst_danger','msg'=>array('Oops it seems some thing went wrong while updating salary details.','Please refresh page.'),'icon'=>'<i class="fe fe-sun bx-spin"></i>');}
						}			
				}
				else
				{
		           $msg=array('empSrchdID'=>form_error('empSrchdID'),'salaryMonth'=>form_error('salaryMonth'),'salaryYear'=>form_error('salaryYear'),'empNetSalary'=>form_error('empNetSalary'),'paySalStatus'=>form_error('paySalStatus'));
					$data=array('addClas'=>'tst_danger','msg'=>$msg,'icon'=>'<i class="fe fe-sun bx-spin"></i>');
					}
					sleep(1);
				    echo json_encode($data);	
			}
/*		else if($actn=='generateMonthly')
		{
			$post=$this->input->post();
			print_r($post);
			}*/			
			else
			{
   				
				$data['payroList']=$this->common->all_data_con('staff',array('status'=>'1'),'id,name');
				$data['frSearchEmplyee']=base_url('admin/ledger/payroll/findEmployee');
				$data['empFrSearch']=base_url('admin/ledger/payroll/searchEmployee');
				$data['aprovedPayrol']=base_url('admin/ledger/payroll/approvedPayment');
				$data['title']='Employee Payrol List ';
       			$data['breadcrums'] = 'Employee Payrol List';
				$data['target']='admin/ledger/payroll/viewList';
				$data['layout']= "admin/ledger/payroll.php";
				$this->load->view('base',$data);
				}
	}  
   public function expense($actn=NULL)
   {
   		if($actn=='viewList')
		{
			 $post_data=$this->input->post();$record=$this->ledger->expense_list($post_data);
			 $i=$post_data['start'] + 1; $return['data'] = array();
             foreach($record as $row) 
			 {                
				if($row->status=='Pending'){$status='<a class="badge bg-warning  miLvs" href="javascript:void(0)">Pending</a>';}
				else if($row->status=='Approved'){$status='<a class="badge bg-success  miLvs" href="javascript:void(0)">Approved</a>';}
				else if($row->status=='Hold'){$status='<a class="badge bg-primary  miLvs" href="javascript:void(0)">Hold</a>';}
				else{$status='<a class="badge bg-danger  miLvs" href="javascript:void(0)">Rejected</a>';}
				
				if($row->status=='Approved' || $row->status=='Reject')
				{ $trashBtn='<a href="javascript:void(0);" class="btn btn-miOk btn-sm "><i class="ti-check-box"></i></a>';}	
			else
			{
				$trashBtn='<a href="javascript:void(0);" class="btn btn-outline-danger btn-sm getAction" data-id="miDelTnxDet===admin/ledger/expense/miDelTnxDet==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#trashTnxDetails" title="Delete transaction " id="arvs--'.$row->id.'"><i class="fe fe-trash-2"></i></a>';
				}
				$view = '<div style="text-align:center;padding: 0px 15px 0px 15px;"><a href="javascript:void(0);" data-id="miExpDetView===admin/ledger/expense/miExpDetView==='.$row->id.'" title="View Expense Details" id="arvVeiws--'.$row->id.'"  class="btn btn-outline-primary btn-sm getAction"><i class="ti-eye"></i></a>
							'.$trashBtn.'
				</div>';
				if(strlen($row->exp_description) >20){$description=substr($row->exp_description, 0, 16).'...';}else{$description=$row->exp_description;}	
				
				  $return['data'][] = array( '<strong>'.$i++.'.</strong>',
											$row->tnx_id,
											'EMP'.$row->emp_id,
											$row->name,
											$row->exp_title,
											'<span class="amtltip">'.$description.' <span class="tlptext">'.$row->exp_description.'</span></span>',
											'<div style="padding:0px 10px 0px 10px;"><span class="inrGrn"><i class="fa fa-inr" aria-hidden="true">
											</i></span> '.$row->exp_amt.'<div>',
											'<strong>'.date('d-M-Y',strtotime($row->exp_date)).'</strong>',
											$row->createdby,
											$status,
											$view );

            }
            $return['recordsTotal'] = $this->ledger->expense_count();
            $return['recordsFiltered'] = $this->ledger->expense_filter_count($post_data);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);
			}
		else if($actn=='addNew')
		{
			$this->form_validation->set_rules('expnseTitle', 'expense title', 'trim|required|xss_clean');
			$this->form_validation->set_rules('expnsePlace', 'expense place', 'trim|required|xss_clean');
			$this->form_validation->set_rules('expnseAmount', 'expense amount', array('trim','required','min_length[1]','regex_match[/(^\d+|^\d+[.]\d+)+$/]'));
			$this->form_validation->set_rules('expenseBy', 'expense by', 'trim|required|xss_clean');
			$this->form_validation->set_rules('datetimepicker', 'expense date', 'trim|required|xss_clean');
			$this->form_validation->set_rules('expnSlipInvoice', 'expense slip', 'trim|required|xss_clean');
			$this->form_validation->set_rules('expnsNote', 'expense details', 'trim|required|xss_clean');
			$this->form_validation->set_rules('expnStatus', 'expense status', 'trim|required|xss_clean');
			if($this->form_validation->run()==TRUE) 
		  	{
				$post=$this->input->post();	
				$config=array('upload_path'=>"uploads/transaction",'allowed_types'=>"jpg|png|jpeg|JPEG|JPG",'overwrite'=>FALSE,'encrypt_name'=>TRUE,'max_size'=>"10120000");
                $this->load->library('upload', $config);$this->upload->initialize($config);	
                if($this->upload->do_upload('expnSlip'))
				{
                    $tnxNu=date('dHis');$image['image_upload']=array('upload_data'=>$this->upload->data());$image_filename=$image['image_upload']['upload_data']['file_name'];
                    $createExpense=array('tnx_id'=>$tnxNu,'br_id'=>$this->logBranch,'emp_id'=>$post['expenseBy'],'exp_title'=>$post['expnseTitle'],'exp_amt'=>$post['expnseAmount'],
										 'expnse_place'=>$post['expnsePlace'],'exp_date'=>date('Y-m-d H:i:s a',strtotime($post['datetimepicker'])),
										 'exp_description'=>$post['expnsNote'],'expense_slip'=>'uploads/transaction/'.$image_filename,
										 'status'=>$post['expnStatus'],'create_date'=>date('Y-m-d H:i:s a'),'created_by'=>$this->logID);
			 	   $resultExpnse=$this->common->save_data('employee_expense',$createExpense);//	$resultExpnse=1;
			  if($resultExpnse)
			  {
			  		if($post['expnStatus']=='Approved')
					{
					 	$getLastTnx=$this->ledger->getLastCompanyTnx();
						if($getLastTnx){$opening=$getLastTnx->closing_balance;}else{$opening=0;}$closing=$opening-$post['expnseAmount'];
						$cExpense=array('tnx_id'=>$tnxNu,'tnx_type'=>$this->uCat,'tnx_purpose'=>'2','benificiary_id'=>$post['expenseBy'],'opening_balance'=>$opening,
										'debit_amt'=>$post['expnseAmount'],'closing_balance'=>$closing,'reason'=>$post['expnsNote'],
										'created_by'=>$this->logID,'created_date'=>date('Y-m-s H:i:s')
										);
						$this->common->save_data('company_income',$cExpense);
						/*print_r($post);exit;*/
						}
					
					$data=array('addClas'=>'tst_success','msg'=>array('Thank You! you have successfully create new expense.'),'icon'=>'<i class="ti-check-box"></i>');
					}
			  else{$data=array('addClas'=>'tst_warning','msg'=>array('Oops it seems something went wrong. Please refresh it.'),'icon'=>'<i class="fe fe-sun bx-spin"></i>');}
					 }
				else{
                		$msg=array($this->upload->display_errors(),'So please refresh or reload page.');
						$data=array('addClas'=>'tst_warning','msg'=>$msg,'icon'=>'<i class="fe fe-sun bx-spin"></i>');
               		 }
				}
				else
				{
					$msg=array('expnseTitle'=>form_error('expnseTitle'),'expnsePlace'=>form_error('expnsePlace'),'expnseAmount'=>form_error('expnseAmount'),
							   'expenseBy'=>form_error('expenseBy'),'datetimepicker'=>form_error('datetimepicker'),'expnSlipInvoice'=>form_error('expnSlipInvoice'),
							   'expnsNote'=>form_error('expnsNote'),'expnStatus'=>form_error('expnStatus'));	
						$data=array('addClas'=>'tst_danger','msg'=>$msg,'icon'=>'<i class="fe fe-sun bx-spin"></i>');
					}
			echo json_encode($data);
			}	
		else if($actn=='miDelTnxDet')
		{
			$post=$this->input->post();
			$getData=$this->common->getRowData('employee_expense','id',$post['id']);
			if($getData){$msg=array('msg'=>'<i class="si si-power"></i> Are you sure want to delete '.$getData->exp_title.' details of tnx ID#'.$getData->tnx_id,'action'=>'miConfirmDelTnxDet===admin/ledger/expense/confirmDelete==='.$getData->id);}
			else{$msg=array('msg'=>'<span class="text-danger">Oops it seems something went wrong</span>');}
			echo json_encode($msg);
			}	
		else if($actn=='confirmDelete')
		{
			sleep(2);$post=$this->input->post();$getData=$this->common->getRowData('employee_expense','id',$post['id']);
			if($getData)
			{
				$whereCon=array('id'=>$post['id'],'table'=>'employee_expense');$delDetails = $this->common->del_data($whereCon);
        		if($delDetails)
				{
					if($getData->expense_slip!='uploads/transaction/no_tnx.png'){unlink($getData->expense_slip);}
				    $msg=array('msg'=>'<span class="text-success"><i class="si si-emotsmile"></i> Thank you! You have successfully '.$getData->exp_title.' details of tnx ID#'.$getData->tnx_id.'</span>','tnxResult'=>'success');
					} 
				else
				{
					$return=array('icon'=>'2','text'=>'<i class="ph-duotone ph-mask-sad"></i> Oops it seems error while deleting #'.$post['name']);
					$msg=array('msg'=>'<span class="text-danger">Oops it seems error while deleting #'.$getData->exp_title.'</span>','tnxResult'=>'failed');
					}
				}
				else{$msg=array('msg'=>'<span class="text-danger">Oops it seems something went wrong</span>','tnxResult'=>'failed');}
			echo json_encode($msg);
			}
		else if($actn=='miExpDetView')
		{			
			$post=$this->input->post('id');
			$return=$this->ledger->getExpnseData($post);
			if($return)
			{
				$aprClr=array('Approved'=>'#19b159','Pending'=>'#ff9b21','Reject'=>'#f16d75','Hold'=>'#4C43AE');
				$empWithApr='<div class="card card-aside custom-card"><a href="javascript:void(0);" class="card-aside-column  cover-image rounded-start-11" data-image-src="'.base_url($return->empImg).'" style="background: url(&quot;'.base_url($return->empImg).'&quot;) center center;"></a><div class="card-body"><h5 class="main-content-label tx-danger tx-medium mg-b-10">Payment Receiver Details</h5><div class="amiRole">Emp. Id <span>'.$return->emp_id.'</span></div><div class="amiRole">Emp. Name <span>'.$return->empName.'</span></div><div class="amiRole">Mobile Number<span>'.$return->empMobile.'</span></div><div class="amiRole">Email <span>'.$return->empMail.'</span></div><div class="amiRole">Branch<span>'.$return->empBr.'</span></div><div class="amiRole">Designation <span>'.$return->empdesig.'</span></div></div></div><div class="card card-aside custom-card"><a href="javascript:void(0);" class="card-aside-column  cover-image rounded-start-11" data-image-src="'.base_url($return->crImg).'" style="background: url(&quot;'.base_url($return->crImg).'&quot;) center center;"></a><div class="card-body"><h5 class="main-content-label tx-success tx-medium mg-b-10">Expense Approved By</h5><div class="amiRole">Emp. Id <span>'.$return->cUser.'</span></div><div class="amiRole">Emp. Name <span>'.$return->createdby.'</span></div><div class="amiRole">Mobile Number<span>'.$return->cMobile.'</span></div><div class="amiRole">Email <span>'.$return->cEmail.'</span></div><div class="amiRole">Branch<span>'.$return->cBr.'</span></div><div class="amiRole">Designation <span>'.$return->cDesig.'</span></div></div></div>';
			
$status=($return->status=='Approved'||$return->status=='Reject')?'<li>Status <span style="color:'.$aprClr[$return->status].' !important;">'.$return->status.'</span></li>':'';	
				$tnxInfo='<li>Expense Title <span>'.$return->exp_title.'</span></li><li>Expense Place <span>'.$return->expnse_place.'</span></li>
                          <li>Expense Amount <span><i class="fa fa-inr"></i> '.$return->exp_amt.'</span></li><li>Expense Date <span>'.$return->dateExp.'</span></li>
                          <li style="height:90px;">Expense Note <div class="expNot" id="exNote">'.$return->exp_description.'</div></li>
                          '.$status;
				
				
				$data=array(
							'addClas'=>'tst_success','icon'=>'<i class="ti-check-box"></i>','empWithApr'=>$empWithApr,'tnxInfo'=>$tnxInfo,'status'=>$return->status,'usrType'=>$this->uCat,
							'aprBtn'=>'aprBtn===admin/ledger/expense/aprStatus==='.$return->id
							);
				}
				else
				{
					$msg=array('Oops it seems something went wrong.','Plaese refresh or reload page.');
					$data=array('addClas'=>'tst_warning','msg'=>$msg,'icon'=>'<i class="fe fe-sun bx-spin"></i>');
					}
			sleep(1);
			echo json_encode($data);
			}
			else if($actn=='aprStatus')
			{	
				$post=$this->input->post();$whereCon=array('id'=>$post['id']);
				$return=$this->common->getRowData('employee_expense','id',$post['id']);
				$aprArr=array('status'=>$post['status'],'modified_date'=>date('Y-m-d H:i:s'),'modified_by'=>$this->logID);
				if($this->common->update_data('employee_expense',$whereCon,$aprArr))
				{
						$aprClr=array('Approved'=>'#19b159','Reject'=>'#f16d75','Pending'=>'#ff9b21','Hold'=>'#4B42AC');
						$newStatus='<span class="aftSpn" style="color:'.$aprClr[$post['status']].'">'.$post['status'].'</span>';
						if($post['status']=='Approved')
						{
							$getLastTnx=$this->ledger->getLastCompanyTnx();
							if($getLastTnx){$opening=$getLastTnx->closing_balance;}else{$opening=0;}$closing=$opening-$return->exp_amt;
							if($opening > $return->exp_amt)
							{
								if($getLastTnx){$opening=$getLastTnx->closing_balance;}else{$opening=0;}$closing=$opening-$return->exp_amt;
								$cExpense=array('tnx_id'=>$return->tnx_id,'tnx_type'=>$this->uCat,'tnx_purpose'=>'2','benificiary_id'=>$return->emp_id,'opening_balance'=>$opening,'debit_amt'=>$return->exp_amt,
												'closing_balance'=>$closing,'reason'=>$return->exp_title,'created_by'=>$this->logID,'created_date'=>date('Y-m-s H:i:s'));
									if($this->common->save_data('company_income',$cExpense))
									{$data=array('addClas'=>'tst_success','icon'=>'<i class="ti-check-box"></i>','status'=>$newStatus,'msg'=>array('Thank You! you have successfully proceed your request'));}
									else{$data=array('addClas'=>'tst_warning','msg'=>array('Oops it seems something went wrong while updating.','Plaese refresh or reload page.'),'icon'=>'<i class="fe fe-sun bx-spin"></i>');}
								}
								else
								{
									 if($this->common->update_data('employee_expense',array('id'=>$return->id),array('status'=>'Pending')))
									 {$data=array('addClas'=>'tst_warning','msg'=>array('Insufficient funds,please add funds to company account.'),'icon'=>'<i class="ti-check-box"></i>');}
									 else{$data=array('addClas'=>'tst_danger','msg'=>array('Oops it seems some thing went wrong while cretaing salary details.','Please refresh page.'),'icon'=>'<i class="fe fe-sun bx-spin"></i>');}
									}	
							}
							else{$data=array('addClas'=>'tst_success','icon'=>'<i class="ti-check-box"></i>','status'=>$newStatus,'msg'=>array('Thank You! you have successfully proceed your request'));}					
					}
					else{$data=array('addClas'=>'tst_warning','msg'=>array('Oops it seems something went wrong.','Plaese refresh or reload page.'),'icon'=>'<i class="fe fe-sun bx-spin"></i>');}				
					sleep(1);
					echo json_encode($data);
				}
			else
			{
				$expenseByEmp=$this->common->getDataListByFilter();
				
				$data=array('expenseByEmp'=>$expenseByEmp,'addTarget'=>base_url('admin/ledger/expense/addNew'),'title'=>'Expenses ','breadcrums'=>'Expense Summary','target'=>'admin/ledger/expense/viewList','layout'=>"admin/ledger/expense.php");
				$this->load->view('base',$data);
				}
	}	
   
   public function payout_monthly($actn=NULL)
   {
   		if($actn=='generate')
		{
   			$this->form_validation->set_rules('month','Month', 'trim|required|xss_clean');
			$this->form_validation->set_rules('year','Year', 'trim|required|xss_clean');
			$this->form_validation->set_rules('tnxPassword','Transaction Password', 'trim|required|xss_clean');
			if($this->form_validation->run() == TRUE)
			{
				$post=$this->input->post();
				$isMatch=$this->common->get_data('staff',array('id'=>$this->logID,'tnx_password'=>$post['tnxPassword']),'*');
				if($isMatch)
				{
				
					$where=array('sMonth'=>$post['month'],'sYear'=>$post['year']);$ns=0;
					$isGenerate=$this->ledger->isPayroll($where);
					if($isGenerate)
				   {
				   
					foreach($isGenerate as $list)
					{
						++$ns;
						$whereCon=array('sMonth'=>$post['month'],'sYear'=>$post['year'],'emp_id'=>$list->id);
						$isPresent=$this->ledger->isCountAttendance($whereCon);
						//echo $this->db->last_query();
						if($isPresent > 0)
						{
							$isSalary=$this->db->select('ROUND((gross_sal_amt*'.$isPresent.'/ 26), 2) AS gross_sal_amt,ROUND((basic_sal*'.$isPresent.'/ 26), 2) AS basic_sal,ROUND((hraAmt*'.$isPresent.'/ 26), 2) AS hraAmt,
														 ROUND((advance*'.$isPresent.'/ 26), 2) AS advance,ROUND((taAmt*'.$isPresent.'/ 26), 2) AS taAmt,ROUND((daAmt*'.$isPresent.'/ 26), 2) AS daAmt,ROUND((paAmt*'.$isPresent.'/ 26), 2) AS paAmt,
														 ROUND((bonus*'.$isPresent.'/ 26), 2) AS bonus,ROUND((medical*'.$isPresent.'/ 26), 2) AS medical,ROUND((insentive*'.$isPresent.'/ 26), 2) AS insentive,
														 ROUND((otherInc*'.$isPresent.'/ 26), 2) AS otherInc,ROUND((pfAmt*'.$isPresent.'/ 26), 2) AS pfAmt,ROUND((tdsAmt*'.$isPresent.'/ 26), 2) AS tdsAmt,
														 ROUND((esicEmpAmt*'.$isPresent.'/ 26), 2) AS esicEmpAmt,ROUND((esicEmplyrAmt*'.$isPresent.'/ 26), 2) AS esicEmplyrAmt,ROUND((insurance*'.$isPresent.'/ 26), 2) AS insurance,
														 ROUND((othrDeduction*'.$isPresent.'/ 26), 2) AS othrDeduction,ROUND((esicEmpAmt*'.$isPresent.'/ 26), 2) AS esic_employee,
														 ROUND((esicEmplyrAmt*'.$isPresent.'/ 26), 2) AS esic_employer')->from('employee_salary_setup')->where('emp_id',$list->id)->where('br_id',$list->branch_id)->where('desig_id',$list->designation)->where('isPromoted','Current')->get()->row();//echo $this->db->last_query();
							//print_r($isSalary);echo '<br>';
							$getMonth=array('01'=>'Jan','02'=>'Feb','03'=>'Mar','04'=>'Apr','05'=>'May','06'=>'Jun','07'=>'Jul','08'=>'Aug','09'=>'Sep','10'=>'Oct','11'=>'Nov','12'=>'Dec');
							$tnxID=substr(str_shuffle('0123456789'),0,10);$mnthYr=$getMonth[$sMonth].'-'.$sYear;				
							$netGrsAmt=($isSalary->basic_sal+$isSalary->hraAmt+$isSalary->taAmt+$isSalary->daAmt+$isSalary->paAmt+$isSalary->bonus+$isSalary->medical+$isSalary->insentive);
							$netDeductAmt=($isSalary->pfAmt+$isSalary->tdsAmt+$isSalary->insurance+$isSalary->othrDeduction+$isSalary->esic_employee+$isSalary->advance+$isSalary->otherInc);
							$disburshAmt=($netGrsAmt-$netDeductAmt);
							if($disburshAmt > 0)
							{
								$genSalary=array('tnx_id'=>$tnxID,'employee_id'=>$list->id,'promotion_id'=>'0','month'=>$post['month'],'year'=>$post['year'],'paid_status'=>'0','payment_mode'=>'Draft',
												 'description'=>'System generated','amount'=>$disburshAmt,'created_typ'=>'0','created_by'=>'1','created_date'=>date('Y-m-d H:i:s'));
								$crtSalary=$this->common->save_data('employee_salary', $genSalary);
								//$crtSalary='1';
								if($crtSalary)
								{
									$salTnxArray=array('emp_sal_id'=>$crtSalary,'basic_sal'=>$isSalary->basic_sal,'hraAmt'=>$isSalary->hraAmt,'taAmt'=>$isSalary->taAmt,'daAmt'=>$isSalary->daAmt,'paAmt'=>$isSalary->paAmt,'bonus'=>$isSalary->bonus,
											 'medical'=>$isSalary->medical,'insentive'=>$isSalary->insentive,'otherInc'=>'0.00','pfAmt'=>$isSalary->pfAmt,'tdsAmt'=>$isSalary->tdsAmt,'insurance'=>$isSalary->insurance,
											 'othrDeduction'=>$isSalary->otherInc,'grossAmt'=>$netGrsAmt,
											 'esic_employee'=>$isSalary->esic_employee,'esic_employer'=>$isSalary->esicEmplyrAmt,'advance'=>$isSalary->advance,'totalPresent'=>$isPresent);
										$tnxArrCrt=$this->common->save_data('employee_salary_transaction', $salTnxArray);
										//$tnxArrCrt='1';
										if($tnxArrCrt){$result='1';}else{$result='3';}
									}				 
									else{$result='3';}
									//echo '<tr><td>'.$ns.'.</td><td>'.$tnxID.'</td><td>'.$list->employee_id.'</td><td>'.$list->empName.'</td><td>'.$mnthYr.'</td><td>'.$list->designation_name.'</td><td>'.$isPresent.'</td><td>'.$disburshAmt.'</td></tr>';
								}
						  }
						  else
						  {
						  	$result='3';
							}
						}
						$return=($result=='3')?array('addClas'=>'tst_warning','msg'=>array("I have finished processing the monthly payout."),'icon'=>'<i class="ti-check-box"></i>'):
								array('addClas'=>'tst_success','msg'=>array("You have successfully generate payout."),'icon'=>'<i class="ti-check-box"></i>');
					}
					else{$return=array('addClas'=>'tst_success','msg'=>array("I have finished processing the monthly payout."),'icon'=>'<i class="ti-check-box"></i>');}
					}
				  else{$return=array('addClas'=>'tst_danger','msg'=>array("Please provide valid transaction password"),'icon'=>'<i class="fe fe-sun bx-spin"></i>');}
				}
				else
				{
					$msg=array('month'=>form_error('month'),'year'=>form_error('year'),'tnxPassword'=>form_error('tnxPassword'));
					$return=array('addClas'=>'tst_danger','msg'=>$msg,'icon'=>'<i class="fe fe-sun bx-spin"></i>');
					}		
					echo json_encode($return);
			}
			else
			{
				$data['title']='Monthly Payout';
				$data['breadcrums'] = 'Monthly Payout';
				$data['target']='admin/ledger/payroll/viewList';
				$data['layout']= "admin/ledger/monthly_payout.php";
				$this->load->view('base',$data);
				}		
	}	
	
}
