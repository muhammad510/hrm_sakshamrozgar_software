<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payslip extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		($this->session->userdata('mim_id')== '') ? redirect(base_url(), 'refresh') : '';
		$this->logId=$this->session->userdata('mim_id');
		$this->load->model(array('employee/payslips_model'=>'payslips'));
		error_reporting(0);
		
	}
	
	public function index($actn=NULL)
	{
		if($actn=='view')  	 
	    {
			$post_data = $this->input->post();
			$record = $this->payslips->paySlip_list($post_data,$this->logId);
			//print_r($record);exit;
			$i=$post_data['start'] + 1;$return['data'] = array();
            foreach($record as $row)
			{
			  
			  $payMonth=array('01'=>'January','02'=>'February','03'=>'March','04'=>'April','05'=>'May','06'=>'June','07'=>'July','08'=>'August','09'=>'September','10'=>'October','11'=>'November','12'=>'December');
			 // $viewID='viewSalSlip==='.base_url('').'==='.$row->id;
			  $printSlipID='printSalSlip==='.base_url('').'==='.$row->id;
			  $return['data'][] = array('<strong>'.$i++.'.</strong>',
			  							$row->tnx_id,
										$payMonth[$row->month],
										$row->year,
										$row->amount,
										$row->payment_mode,
										date('d-m-Y',strtotime($row->created_date)),
										'<div class="text-center">
                                              <a href="'.base_url('employee/payslip/view/'.urlencode(base64_encode($row->id))).'" class="btn btn-outline-secondary btn-sm">
											  	<i class="fe fe-eye"></i>
											  </a> 
											  <button type="button" class="btn btn-outline-success btn-sm arvActn" data-id="'.$printSlipID.'">
											  	<i class="fe fe-printer"></i>
											  </button>
									     </div>'
										);
            }
            $return['recordsTotal'] = $this->payslips->paySlip_count($this->logId);
            $return['recordsFiltered'] = $this->payslips->paySlip_filter_count($post_data,$this->logId);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);
			}
		else if($actn=='viewSalSlip')
		{
			echo 'You are about to view slip salary';
			}	
		else
		{
			$data['title']='My Payslip';
			$data['breadcrums'] = 'My Payslip';
			$data['target']='employee/payslip/index/view';  	
			$data['layout']= "basic/pay_slip.php";
			$this->load->view('employee/testing_base',$data);
			}
		}
		public function view($id)
		{
			$id=base64_decode(urldecode($id));
			$paySlipDetail=$this->payslips->getPaySlipDetails($id);
			if($paySlipDetail)
			{
				$getMonth=array('01'=>'January','02'=>'February','03'=>'March','04'=>'April','05'=>'May','06'=>'June','07'=>'July','08'=>'August','09'=>'September','10'=>'October','11'=>'November','12'=>'December');
				$paySlipDetail->pyMnth=$getMonth[$paySlipDetail->month].' '.$paySlipDetail->year;
				$paySlipDetail->pyDt=$paySlipDetail->pay_date?date('d/m/Y',strtotime($paySlipDetail->pay_date)):'N/A';
				$salaryDetails=$this->common->get_data('employee_salary_transaction', array('emp_sal_id'=>$paySlipDetail->id),'*');
				if($salaryDetails)
				{	
					//print_r($salaryDetails);
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
					/*echo '<br><br>';print_r($paySlipDetail);*/
					}
				}
			$data['paySlipDetail']=$paySlipDetail;
			$data['title']='View salary slip';
			$data['breadcrums'] = 'View salary slip'; 	
			$data['layout']= "basic/view_slip.php";
			$this->load->view('employee/testing_base',$data);
			
			}
}
