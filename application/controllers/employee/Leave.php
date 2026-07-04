<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		($this->session->userdata('mim_id')== '') ? redirect(base_url(), 'refresh') : '';
		$this->logId=$this->session->userdata('mim_id');
		$this->load->model(array('employee/leave_model'=>'leaves'));
		error_reporting(0);
		
	}
	
	public function summary($actn=NULL)
	{
		if($actn=='view')  	 
	    {
			$post_data = $this->input->post();
			$record = $this->leaves->leave_list($post_data,$this->logId);
			
			//echo $this->db->last_query();die;
			//print_r($record);exit;
			$i=$post_data['start'] + 1;$return['data'] = array();
            foreach($record as $row)
			{
			 	if($row->leave_mode=='1'){$endDt=date('d-m-Y',strtotime($row->from_date));}else{$endDt=date('d-m-Y',strtotime($row->end_date));}
			    if($row->total_leave=='1'){$leaveDate='1 Day';}else{$leaveDate=$row->total_leave.' Days';}	 
				if($row->created_date==date('Y-m-d')){$status='<span class="badge bg-primary miWdth"> New</span>';} 
			 	else if($row->status=='4'){$status='<span class="badge bg-warning miWdth">Pending</span>';} 
			    else if($row->status=='1'){$status='<span class="badge bg-success miWdth">Approved</span>';} 
				else if($row->status=='2'){$status='<span class="badge bg-danger miWdth">Rejected</span>';}
				else if($row->status=='3'){$status='<span class="badge bg-secondary miWdth">Hold</span>';} 	
				$delBtn='Hello';
				
				/*if($row->status=='1')
				{ $trashBtn='<button type="button" class="btn btn-miOk btn-sm "><i class="ti-check-box"></i></button>';}	
				else{$trashBtn='<button type="button" class="btn btn-outline-danger btn-sm miAction" data-id="delOperation=='.$delBtn.'"><i class="fe fe-trash-2"></i></button>';}*/
					
			 /* $printSlipID='printSalSlip==='.base_url('').'==='.$row->id;
			    <button type="button" class="btn btn-outline-success btn-sm arvActn" data-id="'.$printSlipID.'"><i class="fe fe-edit"></i></button>*/
			  
			  
			  
			  
			  
			  $return['data'][] = array('<strong>'.$i++.'.</strong>',
			  							$row->leave_name,
										date('d-m-Y',strtotime($row->from_date)),
										$endDt,
										$leaveDate,
										$row->reason,
										date('d-m-Y',strtotime($row->created_date)),
										$status,
										'<div class="text-center">
                                             <button type="button" class="btn btn-outline-primary btn-sm miAction" data-id="watchLeaveDetails===employee/leave/view==='.$row->id.'===own"><i class="fe fe-eye"></i></button> 
										 </div>'
										);
            }
            $return['recordsTotal'] = $this->leaves->leave_count($this->logId);
            $return['recordsFiltered'] = $this->leaves->leave_filter_count($post_data,$this->logId);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);
			}
		else if($actn=='viewSalSlip')
		{
			echo 'You are about to view slip salary';
			}	
		else
		{
			$leaveManage=$this->common->all_data_con('leave_manage',array('status'=>'1'),'*');
			$data['leaveManage']=$leaveManage;
			$data['title']='My Leave';
			$data['breadcrums'] = 'My Leave';
			$data['target']='employee/leave/summary/view';  	
			$data['layout']= "basic/myleaves.php";
			$this->load->view('employee/testing_base',$data);
			}
		
		}
	public function apply($add=NULL)
	{
	   if($add=='addNew')
	   {	   
		$post = $this->input->post();
		$this->form_validation->set_rules('leavePattern', 'leave mode', 'required');
		$this->form_validation->set_rules('leaveType', 'leave type', 'required');
		$this->form_validation->set_rules('frmDate', 'leave date', 'required');
		if($post['leavePattern']=='2'){$this->form_validation->set_rules('toDate', 'to date', 'required');}
		$this->form_validation->set_rules('reasonFrLeave', 'reason for leave', 'required');
		if($this->form_validation->run()==TRUE) 
		{
		  		
			$frmDate=strtotime(str_replace("/","-",$post['frmDate']));
			$toDay=strtotime(date('d-m-Y'));	
			$endDate=$post['toDate']?strtotime(str_replace("/","-",$post['toDate'])):'';
			
			
			
			
			if($frmDate < strtotime(date('d-m-Y')))
			{$data=array('addClas'=>'tst_warning','msg'=>array('Please input valid leave date'),'icon'=>'<i class="fe fe-settings bx-spin"></i>');}
			else if(($post['leavePattern']=='2') && ($endDate < $toDay))
			{
				$data=array('addClas'=>'tst_warning','msg'=>array('Please input valid to date'),'icon'=>'<i class="fe fe-settings bx-spin"></i>');
					  }
			else if(($post['leavePattern']=='2') && ($endDate < $frmDate))
			{
				$msg=array('Please input valid to date and greater than leave date');
				$data=array('addClas'=>'tst_warning','msg'=>$msg,'icon'=>'<i class="fe fe-settings bx-spin"></i>');
					  }
				else
				{
					if($post['leavePattern']=='1'){$end_date=NULL;$total_leave=1;}
					else
					{
						$end_date=date('Y-m-d',strtotime(str_replace('/','-',$post['toDate'])));
						$dayCount = strtotime(str_replace('/','-',$post['toDate'])) - strtotime(str_replace('/','-',$post['frmDate']));  
  						$total_leave=abs(round($dayCount/86400));
						//print_r($post);echo '<br>';print_r($total_leave);exit;						
						}
						$leaveArr=array(
										'emp_id'       => $this->logId,
										'leave_mode'   => $post['leavePattern'],
										'leave_type'   => $post['leaveType'],
										'from_date'    => date('Y-m-d',strtotime(str_replace('/','-',$post['frmDate']))),
										'end_date' 	   => $end_date,
										'total_leave'  => $total_leave,
										'reason'       => $post['reasonFrLeave'],
										'created_type' => '1',
										'created_by'   => $this->logId,
										'created_date' => date('Y-m-d'),
										);		
				if($this->common->save_data('employee_leave',$leaveArr))
				{
					$msg=array('Thank You! you have successfully appllied for leave.');	
					$data=array('addClas'=>'tst_success','msg'=>$msg,'icon'=>'<i class="ti-check-box"></i>');
					}
					else
					{
						$msg=array('Oops it seems something went wrong. Please refresh it.');
						$data=array('addClas'=>'tst_warning','msg'=>$msg,'icon'=>'<i class="fe fe-settings bx-spin"></i>');
							}
				}	
			} 
			else{
			$msg = array(
			             'leavePattern'=>form_error('leavePattern'),'leaveType'=>form_error('leaveType'),'frmDate'=>form_error('frmDate'),
						 'reasonFrLeave'=>form_error('reasonFrLeave')
						 );
			if($post['leavePattern']=='2'){$msg['toDate']=form_error('toDate');}			  
			$data=array('addClas' => 'tst_danger', 'msg' => $msg, 'icon' => '<i class="fe fe-settings bx-spin"></i>');
		}
		echo json_encode($data);
 				}
		   	else
			{
		    	$data['title']='Apply Leave';
				$data['breadcrums'] = 'Apply Leave';
				$leaveManage=$this->common->all_data_con('leave_manage',array('status'=>'1'),'*');
				$data['leaveManage']=$leaveManage;
				$data['aplyForLeave']=base_url('employee/leave/apply/addNew');
				$data['layout']= "basic/applyleaves.php";
				$this->load->view('employee/testing_base',$data);
				}
		}
	public function view()
	{
		$post=$this->input->post();
		$getLeaveDetails=$this->leaves->getLeaveDetails($post['oprType']);
		/*echo $this->db->last_query();echo '<br>';print_r($getLeaveDetails);exit;*/
		if($getLeaveDetails)
		{
			
			if($getLeaveDetails->status=='4'){$status='<div class="appResultMsg bg-warning">Your application is now pending. So,please keep be patient.</div>';} 
			else if($getLeaveDetails->status=='1'){$status='<div class="appResultMsg bg-success">Congratulations your application has been approved by authority.</div>';} 
			else if($getLeaveDetails->status=='2'){$status='<div class="appResultMsg bg-danger ">Sorry your application has been rejected by authority.</div>';}
			else if($getLeaveDetails->status=='3'){$status='<div class="appResultMsg bg-secondary">Oops it seems your application has been hold by authority</div>';}
			}
			else{$status='<div class="appResultMsg bg-secondary">Oops it seems you are going to wrong way.</div>';}
			$getLeaveDetails->apStatus=$status;
			$leaveMatch = "Casual Sick Maternity Paternity Annual Paid Others Medical";
			$getString=explode(" ",$getLeaveDetails->leave_name);  
			if(stripos($leaveMatch,$getString[0])!==false){$leaveApp=$getString[0];}else{$leaveApp='normal';}		
		
		
		if($getLeaveDetails->total_leave=='1')
			{
				if($leaveApp=='Casual')
				{	
					$uprAppMsg='I hope you are doing well. I am writing to request a one-day leave on <strong>'.date('d-M-Y',strtotime($getLeaveDetails->from_date)).'</strong> due to personal reasons that require my immediate attention. My pending tasks are up to date, and I will ensure that they are completed within the prescribed timelines';
				}
				else if($leaveApp=='Medical' || $leaveApp=='Sick')
				{	
						$uprAppMsg='I hope you are doing well. I am writing to request a one-day leave on <strong>'.date('d-M-Y',strtotime($getLeaveDetails->from_date)).'</strong> to attend a scheduled medical appointment. I will make sure to complete any pending work before my absence and will ensure that my colleagues are informed and can assist with any urgent matters.';
					}
				if($leaveApp=='Paid')
				{	
					$uprAppMsg='I hope you are doing well. I am writing to request a one-day leave on <strong>'.date('d-M-Y',strtotime($getLeaveDetails->from_date)).'</strong> due to personal reasons that require my immediate attention. So, you can cut my salary for taking leave. You can My pending tasks are up to date, and I will ensure that they are completed within the prescribed timelines';
				}
				
			}else
			{
					if($leaveApp=='Casual')
					{	
					$uprAppMsg='I hope you are doing well. I am writing to request a leave from <strong>'.date('d-M-Y',strtotime($getLeaveDetails->from_date)).'</strong> to <strong>'.date('d-M-Y',strtotime($getLeaveDetails->end_date)).'</strong> due to personal reasons that require my immediate attention. My pending tasks are up to date, and I will ensure that they are completed within the prescribed timelines';
				}
				else if($leaveApp=='Medical' || $leaveApp=='Sick')
				{	
						$uprAppMsg='I hope you are doing well. I am writing to request a leave from <strong>'.date('d-M-Y',strtotime($getLeaveDetails->from_date)).'</strong> to <strong>'.date('d-M-Y',strtotime($getLeaveDetails->end_date)).'</strong> due to illness reasons that require my immediate attention.. I will make sure to complete any pending work before my absence and will ensure that my colleagues are informed and can assist with any urgent matters.';
					}
					else if($leaveApp=='Paid')
					{	
					$uprAppMsg='I hope you are doing well. I am writing to request a leave from <strong>'.date('d-M-Y',strtotime($getLeaveDetails->from_date)).'</strong> to <strong>'.date('d-M-Y',strtotime($getLeaveDetails->end_date)).'</strong> due to personal reasons that require my immediate attention. So, you can cut my salary for taking leave. My pending tasks are up to date, and I will ensure that they are completed within the prescribed timelines';
				}
					else
					{	
					$uprAppMsg='I hope you are doing well. I am writing to request a leave from <strong>'.date('d-M-Y',strtotime($getLeaveDetails->from_date)).'</strong> to <strong>'.date('d-M-Y',strtotime($getLeaveDetails->end_date)).'</strong> due to personal reasons that require my immediate attention. My pending tasks are up to date, and I will ensure that they are completed within the prescribed timelines';
						}
				}	
	$lwrMsg='I believe it would not be feasible for me to come to the office or work during this period. Therefore, I kindly request you to accept my sick leave application and grant me leave'; if($getLeaveDetails->total_leave=='1'){$lwrMsg.=' for one day on <strong>'.$getLeaveDetails->from_date.'</strong>';}else{ $lwrMsg.='from <strong>'.$getLeaveDetails->from_date.'</strong> to <strong>'.$getLeaveDetails->end_date.'</strong> for '.$getLeaveDetails->total_leave .' days';}
	 $lwrMsg.='. Your understanding and support in this matter will be highly appreciated';	
		
		$getLeaveDetails->uprAppMsg=$uprAppMsg;	
		$getLeaveDetails->lwrAppMsg=$lwrMsg;	
		$getLeaveDetails->isActn=$post['action'];
		$teamApproval='leaveAppr===employee/team/request_leave/appr==='.$post['oprType'];
		$getLeaveDetails->actionBtn='<button type="button" class="btn ripple btn-outline-danger pull-right miAction" style="margin-left:5px;" id="rejectApp" data-id="'.$teamApproval.'"><i class="fe fe-x"></i> Reject</button>
                                     <button type="button" class="btn ripple btn-outline-success pull-right miAction" id="acceptApp" data-id="'.$teamApproval.'"><i class="fe fe-check"></i> Accept</button>';
		
			
		$data['getData']=$getLeaveDetails;
		echo json_encode($getLeaveDetails);
			/*else
			{
				$ndt="<h1>Oops.The Page you are looking  for doesn't  exit..</h1>";
				$dataResult='<div class="construction1 text-center details"><div class=""><div class="col-lg-12"><h1 class="tx-140 mb-0">500</h1></div><div class="col-lg-12 ">
							'.$ndt.'
							<h6 class="tx-15 mt-3 mb-4 text-muted">You may have mistyped the address or the page may have moved. Try searching below.</h6>
							<a class="btn ripple btn-success text-center mb-2" href="index.html">Back to Home</a>
						</div>
					</div>
				</div>';
				echo $dataResult;
				}*/
		//print_r($getApplication);
		}		
}
