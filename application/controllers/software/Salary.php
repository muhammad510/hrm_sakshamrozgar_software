<?php defined('BASEPATH') or exit('No direct script access allowed');

class Salary extends CI_Controller
{
    public function __construct()
   {
            parent::__construct();
            $this->load->model('setting/salary_master', 'salary_master');
            ($this->session->userdata('mim_id')== '') ? redirect(base_url(), 'refresh') : '';
			$this->logId=$this->session->userdata('mim_id');
            error_reporting(0);	
        }
   public function index($actn=NULL)
   {
		if($actn=='view')  	 
	    {
			 $post_data=$this->input->post();
			 $record=$this->salary_master->salary_list($post_data);
			$i=$post_data['start'] + 1; $return['data'] = array();
            foreach ($record as $row) {
				 
				$status = ($row->status == 1) ? '
                <a class="badge bg-success arvAction miLvs" href="javascript:void(0)" data-id="miStatusView-software/salary/manage-'.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to De-Active " id="arvs--'.$row->id.'">Active</a>'
                :
                '<a href="javascript:void()" data-id="miStatusView-software/salary/manage-'.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-danger arvAction" id="arvs--'.$row->id.'">Deactive</a>';
				
                $view = '<div style="text-align:center">
							<a href="javascript:void(0);" data-id="viewDetails-software/salary/index/-'.$row->id.'" title="Click to View Salary Details" class="btn ripple miView btn-sm arvAction"><i class="ti-eye"></i></a>&emsp;
                <a href="javascript:void(0);" style="margin-left:-13px;" data-id="editDetails-software/salary/index/-'.$row->id.'" title="Click to Update Salary Details" class="btn ripple btn-secondary btn-sm arvAction"><i class="ti-pencil-alt"></i></a></a></div>';
				$tGrossDeduction=$row->pfAmt+$row->advance_amt+$row->tdsAmt+$row->insurance_amt+$row->other_deduction+$row->esicEmpAmt;

                $return['data'][] = array( '<strong>'.$i++.'.</strong>',
											$row->salary_code,
											$row->branch_name,
											$row->designation_name,
											'<span class="inrBlue"><i class="fa fa-inr" aria-hidden="true"></i></span> '.$row->gross_sal_amt,
											'<span class="inrRed"><i class="fa fa-inr" aria-hidden="true"></i></span> '.$tGrossDeduction,
											'<span class="inrGrn"><i class="fa fa-inr" aria-hidden="true"></i></span> '.$row->net_payble_amt,
											$status,
											$view );

            }
            $return['recordsTotal'] = $this->salary_master->salary_count();
            $return['recordsFiltered'] = $this->salary_master->salary_filter_count($post_data);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);
			}
		else if($actn=='createNew')
		{
			$this->form_validation->set_rules('brOffice', 'office branch', 'required');
			$this->form_validation->set_rules('designation', 'designation', 'required');
			$this->form_validation->set_rules('grsSalAmt', 'gross salary details', 'required');
			$this->form_validation->set_rules('basicPayPercent', 'basic salary details', 'required');
			if($this->form_validation->run()==TRUE)
			{
				$post=$this->input->post();
				if($post['grsSalAmt']==0){$data=array('addClas'=>'tst_danger','msg'=>array('Please input valid gross amount.'),'icon'=>'<i class="fe fe-settings bx-spin"></i>');}
				else if($post['basicPayPercent']==0)
				{$data=array('addClas'=>'tst_danger','msg'=>array('Please input valid basic pay amount.'),'icon'=>'<i class="fe fe-settings bx-spin"></i>');}
				else
				{
					$isDistribution=$post['basicPayPercent']+$post['hraPercent']+$post['taPercent']+$post['daPercent']+$post['paPercent']+$post['mediAllPercent'];
					if(number_format($isDistribution,2) > '100.00'){$data=array('addClas'=>'tst_warning','msg'=>array('Salary distribution limit exceeded !'),'icon' => '<i class="fe fe-settings bx-spin"></i>');}
					else if(number_format($isDistribution,2) < '100.00'){$data=array('addClas'=>'tst_warning','msg'=>array('Salary distribution less than 100% !'),'icon' => '<i class="fe fe-settings bx-spin"></i>');}
						else
						{
							$isExistSalary=$this->common->get_data('salary_master', array('branch_id'=>$post['brOffice'],'desig_id'=>$post['designation']), '*');
							if(!$isExistSalary)
							{
								$salID='S'.rand(10,100000);
								$basAmt=($post['grsSalAmt']*$post['basicPayPercent'])/100;
								$createArr=array(
											 'salary_code'     => $salID,
											 'branch_id'       => $post['brOffice'],
											 'desig_id'        => $post['designation'],
											 'gross_sal_amt'   => $post['grsSalAmt'],
											 'basic_percent'   => $post['basicPayPercent'],
											 'basic_amt'       => $basAmt,
											 'hra_percent'     => $post['hraPercent'],
											 'ta_percent'      => $post['taPercent'],
											 'da_percent'      => $post['daPercent'],
											 'pa_percent'      => $post['paPercent'],
											 'bonus'           => $post['bonusPayAmt'],
											 'medical_percent' => $post['mediAllPercent'],
											 'incentive'       => $post['basicInsentvAmt'],
											 'other_inc'       => $post['otherBsInc'],
											 'pf_percent'      => $post['pfPercent'],
											 'advance_amt'     => $post['advancePayAmt'],
											 'tds_percent'     => $post['tdsPercent'],
											 'esic_employee'   => $post['esicEmployee'],
											 'esic_employer'   => $post['esicEmployer'],
											 'insurance_amt'   => $post['insurancePayAmt'],
											 'other_deduction' => $post['otherDedPayAmt'],
											 'net_payble_amt'  => $post['netPayAmt'],
											 'created_id'      => $this->logId,
											 'created_date'    => date('Y-m-d')
											 );			 		 
								if($this->common->save_data('salary_master', $createArr))
								{$data=array('addClas'=>'tst_success','msg'=>array('Salary details added successfully!'),'icon'=>'<i class="ti-check-box"></i>');}
								else{$data=array('addClas'=>'tst_warning','msg'=>array('Oops there is an error while creating!'),'icon'=>'<i class="fe fe-settings bx-spin"></i>');}
								}
								else
								{$data=array('addClas'=>'tst_warning','msg'=>array('Oops it seems salary details is already exist!'),'icon'=>'<i class="fe fe-settings bx-spin"></i>');}
							}					
					}
				
				//print_r($post);
				//$data=array('addClas'=>'tst_warning','msg'=>$post,'icon'=>'<i class="ti-check-box"></i>');
				
				}
				else
				{
					$msg=array(
								'brOffice'=>form_error('brOffice'),'designation'=>form_error('designation'),'grsSalAmt'=>form_error('grsSalAmt'),
								'basicPayPercent'=>form_error('basicPayPercent'));
               		 $data=array('addClas'=>'tst_danger','msg'=>$msg,'icon'=>'<i class="fe fe-settings bx-spin"></i>');
					}
					 echo json_encode($data);

			}	
		else if($actn=='viewDetails' || $actn=='editDetails')
		{
			$id=$this->input->post('id');
			$getDetails=$this->salary_master->getSalaryDetailsData($id);
			if($getDetails)
			{
				$getBrDet=$this->common->get_data('branch_manage',array('id'=>$getDetails->branch_id),'designation');
				if($getBrDet['designation'])
			    { 
				  $department=explode(',',$getBrDet['designation']);
				  if($department)
				  {
					$dpList='<option value="">Select Department</option>';
					foreach($department as $dList)
					{
						$desigDet=$this->common->get_data('designation',array('id'=>$dList),'designation_name');
						if($desigDet)
						{
							$isSelect=($getDetails->desig_id==$dList)?'selected="selected"':'';
							$dpList.='<option value="'.$dList.'"  '.$isSelect.'>'.$desigDet['designation_name'].'</option>';
							}
						}$resultDesig=$dpList;
					}	
					else{$resultDesig='<option value="">Choose Department</option>';}
				}
				else{$resultDesig='<option value="">Choose Department</option>';}
				
				$getDetails->brDesignation=$resultDesig;
				
				$tGrossEarning=$getDetails->basic_pay+$getDetails->hraAmt+$getDetails->taAmt+$getDetails->daAmt+$getDetails->paAmt+$getDetails->bonus+$getDetails->mediAmt+$getDetails->incentive+$getDetails->other_inc;
				//$tGrossDeduction=(2*$getDetails->pfAmt)+$getDetails->advance_amt+$getDetails->tdsAmt+$getDetails->insurance_amt+$getDetails->other_deduction;
				$tDeduction=(2*$getDetails->pfAmt)+$getDetails->advance_amt+$getDetails->tdsAmt+$getDetails->insurance_amt+$getDetails->other_deduction+$getDetails->esicEmpLyrAmt+$getDetails->esicEmpAmt;
				$getDetails->empCtC=number_format(($getDetails->net_payble_amt+$tDeduction),2, '.', '');
				//$getDetails->tGrossDeduction=number_format($tGrossDeduction,2, '.', '');
				$getDetails->tGrossDeduction=number_format($tDeduction,2, '.', '');
				$getDetails->tGrossEarning=number_format($tGrossEarning,2, '.', '');
				$getDetails->target='software/salary/index/updtSalaryDetails';
				$return=$getDetails;
				}
			else{$return=array('addClas'=>'tst_danger','msg'=>array('Oops there is an error while fetching details!'),'icon'=>'<i class="fe fe-settings bx-spin"></i>');}
			 echo json_encode($return);
			//echo $this->db->last_query();
			}
		else if($actn=='updtSalaryDetails')
		{	
			$this->form_validation->set_rules('brOffice', 'office branch', 'required');
			$this->form_validation->set_rules('designation', 'designation', 'required');
			$this->form_validation->set_rules('grsSalAmt', 'gross salary details', 'required');
			$this->form_validation->set_rules('basicPayPercent', 'basic salary details', 'required');
			if($this->form_validation->run()==TRUE)
			{
				sleep(2);
				$post=$this->input->post();
				if($post['grsSalAmt']==0){$data=array('addClas'=>'tst_danger','msg'=>array('Please input valid gross amount.'),'icon'=>'<i class="fe fe-settings bx-spin"></i>');}
				else if($post['basicPayPercent']==0)
				{$data=array('addClas'=>'tst_danger','msg'=>array('Please input valid basic pay amount.'),'icon'=>'<i class="fe fe-settings bx-spin"></i>');}
				else
				{ 
						$basic_amt=($post['grsSalAmt']*$post['basicPayPercent'])/100;
					    $changeArr=array('branch_id'      => $post['brOffice'],
										 'desig_id'       => $post['designation'],
										 'gross_sal_amt'  => $post['grsSalAmt'],
										 'basic_percent'  => $post['basicPayPercent'],
										 'basic_amt'      => $basic_amt,
										 'hra_percent'    => $post['hraPercent'],
										 'ta_percent'     => $post['taPercent'],
										 'da_percent'     => $post['daPercent'],
										 'pa_percent'     => $post['paPercent'],
										 'bonus'          => $post['bonusPayAmt'],
										 'medical_percent'=> $post['mediAllPercent'],
										 'incentive'      => $post['basicInsentvAmt'],
										 'other_inc'      => $post['otherBsInc'],
										 'pf_percent'     => $post['pfPercent'],
										 'advance_amt'    => $post['advancePayAmt'],
										 'tds_percent'    => $post['tdsPercent'],
										 'insurance_amt'  => $post['insurancePayAmt'],
										 'other_deduction'=> $post['otherDedPayAmt'],
										 'net_payble_amt' => $post['netPayAmt'],
										 'modified_id'    => $this->logId,
										 'modified_date'  =>date('Y-m-d')
										 );				
					 $result=$this->common->update_data('salary_master',array('id'=>$post['basicUpdtID']),$changeArr);
					 if($result)
					 {$data=array('addClas'=>'tst_success','msg' => array('Thank you! You have successfully updated salary details!'),'icon' => '<i class="ti-check-box"></i>');}
					 else{$data=array('addClas'=>'tst_warning','msg'=>array('Oops there is an error while creating!'),'icon' => '<i class="fe fe-settings bx-spin"></i>');}
					}
				}
				else
				{
					$msg=array(
								'brOffice'=>form_error('brOffice'),'designation'=>form_error('designation'),'grsSalAmt'=>form_error('grsSalAmt'),
								'basicPayPercent' => form_error('basicPayPercent'));
               		 $data=array('addClas'=>'tst_danger','msg'=>$msg,'icon'=>'<i class="fe fe-settings bx-spin"></i>');
					}
			     echo json_encode($data);
			}
		else if($actn=='findDesignDetails')
		{
			  $post=$this->input->post();
			  $getDetails=$this->common->get_data('branch_manage',array('id'=>$post['brID']),'designation');
			  if($getDetails['designation'])
			  { 
				  $department=explode(',',$getDetails['designation']);
				  if($department)
				  {
					$dpList='<option value="">Select Designation</option>';
					foreach($department as $dList)
					{
						$desigDet=$this->common->get_data('designation',array('id'=>$dList),'designation_name');
						if($desigDet){$dpList.='<option value="'.$dList.'">'.$desigDet['designation_name'].'</option>';}
						}$result=$dpList;
					}	
					else{$result='<option value="">Choose Designation</option>';}
				}
				else{$result='<option value="">Choose Designation</option>';}
				sleep(.5);print_r($result);
			}	
		else
		{	
			$data['title']='Salary Manage';
        	$data['breadcrums'] = 'Salary Manage';
			//$data['desigList'] = $this->common->getDataList('designation','status','1');
			$data['branchList'] = $this->common->getDataList('branch_manage','status','1');
        	$data['target']='software/salary/index/view';
			$data['adBtnActn']='software/salary/index/createNew';
			$data['getDesignation']=base_url('software/salary/index/findDesignDetails');
			$data['layout']= "software/salary/manage.php";
			$this->load->view('base',$data);
			}
	 } 
	 
	public function manage()
 	{
		$post=$this->input->post();
		if($post['oprType']=='miStatusView')
		{
			$getData=$this->common->getRowData('salary_master','id',$post['id']);
			if($getData)
			{
				if($getData->status=='1')
				{	
					$msg=array(
								'msg'=>'<i class="si si-power"></i> Are you sure want to deactivate of salary ID #'.$getData->salary_code,
								'action'=>'miStatusChange-software/salary/manage-'.$getData->id
								);
					}
					else
					{
						$msg=array(
									'msg'=>'<i class="si si-refresh"></i> Are you sure want to activate of salary ID #'.$getData->salary_code,
									'action'=>'miStatusChange-software/salary/manage-'.$getData->id
								);
					}
				}
				else
				{
					$msg=array('msg'=>'<span class="text-danger">Oops it seems something went wrong</span>');
					}
			echo json_encode($msg);
			}
		elseif($post['oprType']=='miStatusChange')
		{
			sleep(2);
			
			
			$getData=$this->common->getRowData('salary_master','id',$post['id']);
			if($getData->status=='1')
			{
				$change='2';$msg=array('msg'=>'<span class="text-success"><i class="si si-power"></i> You have successfully deactivate of Salary ID #'.$getData->salary_code.'</span>','btnTxt'=>'Deactive','btnAdCls'=>'bg-danger ','btnRmvCls'=>'bg-success miLvs');
				}
				else
				{
					$change='1';$msg=array('msg'=>'<span class="text-success">You have successfully activate of Salary ID #'.$getData->salary_code.'</span>','btnTxt'=>'Active','btnAdCls'=>'bg-success miLvs','btnRmvCls'=>'bg-danger');
					}
					$changeArr=array('status'=>$change,'modified_date'=>date('Y-m-d'),'modified_id'=>$this->logID);
					$result=$this->common->update_data('salary_master',array('id'=>$post['id']),$changeArr);
					if($result){$msg=$msg;}else{$msg=array('msg'=>'<span class="text-danger">Oops it seems something went wrong while updating.</span>');}
				echo json_encode($msg);
				//echo '<br>';print_r($post);exit;
			}
		}
	 
 	/*public function manage($id)
 	{
 		$brID=base64_decode(urldecode($id));
		//print_r($brID);
		    $data['getBranch']=$this->common->getRowData('branch_manage','id',$brID);
			$data['getState']=$this->common->getDataList('states_cities','parent_id','729');
			$data['getDistrict']=$this->common->getDataList('states_cities','parent_id','63');
			$data['title']='View Branch Details';
        	$data['breadcrums'] = 'View Branch Details';
        	$data['target']='software/branch/index/view';
			$data['layout']= "software/branch/view.php";
			$this->load->view('base',$data);
		}	*/
}
