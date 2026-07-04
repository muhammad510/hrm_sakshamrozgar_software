<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apply extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('setting/leave_model', 'leave');
        ($this->session->userdata('mim_id')== '') ? redirect(base_url(), 'refresh') : '';
	    $this->logID=$this->session->userdata('mim_id');
        error_reporting(0);	
		
	}

	public function index($action=NULL)
	{
		
			if($action=="viewApplied")
			{
				$post_data = $this->input->post();
				$apply='apply';
				$record = $this->leave->applied_list($post_data,$apply);
				//echo $this->db->last_query();die;//print_r($record);exit;
				$i=$post_data['start'] + 1;$return['data'] = array();
				foreach($record as $row)
				{
					if($row->total_leave=='1'){$endDt=date('d-m-Y',strtotime($row->from_date));}else{$endDt=date('d-m-Y',strtotime($row->end_date));}
					if($row->total_leave=='1'){$leaveDate='1 Day';}else{$leaveDate=$row->total_leave.' Days';}	 
					if($row->created_date==date('Y-m-d')){$status='<span class="badge bg-primary miWdth"> New</span>';} 
					else if($row->status=='4'){$status='<span class="badge bg-warning miWdth">Pending</span>';} 
					else if($row->status=='1'){$status='<span class="badge bg-success miWdth">Approved</span>';} 
					else if($row->status=='2'){$status='<span class="badge bg-danger miWdth">Rejected</span>';}
					else if($row->status=='3'){$status='<span class="badge bg-secondary miWdth">Hold</span>';} 	
					$delBtn='delOperation===admin/apply/index/trashApp==='.$row->id;
					
					/*if($row->status=='1' || $row->status=='2'){ $trashBtn='<button type="button" class="btn btn-miOk btn-sm "><i class="ti-check-box"></i></button>';}	
					else{$trashBtn='<button type="button" class="btn btn-outline-danger btn-sm miAction" data-bs-toggle="modal" data-bs-target="#deleteLeave"  data-id="delOperation=='.$delBtn.'"><i class="fe fe-trash-2"></i></button>';}*/
					$trashBtn=($row->status=='1' || $row->status=='2')?'<button type="button" class="btn btn-miOk btn-sm "><i class="ti-check-box"></i></button>':'<button type="button" class="btn btn-outline-danger btn-sm miAction" data-bs-toggle="modal" data-bs-target="#deleteLeave" data-id="'.$delBtn.'"><i class="fe fe-trash-2"></i></button>';	
						
				 $return['data'][] = array('<div style="font-weight:900;text-align:center;">'.$i++.'.</div>',
											$row->employee_id,
											$row->name,
											/*$row->leave_name,*/
											date('d-m-Y',strtotime($row->from_date)),
											$endDt,
											$leaveDate,
										/*	$row->reason,*/
											date('d-m-Y',strtotime($row->created_date)),
											$status,
											'<div class="text-center">
			<button type="button" class="btn btn-outline-primary btn-sm miAction" data-id="watchLeaveDetails===admin/apply/view==='.$row->id.'"><i class="fe fe-eye"></i></button>
												  '.$trashBtn.'
											 </div>'
											);
				}
					$return['recordsTotal'] = $this->leave->applied_leave_count($apply);
					$return['recordsFiltered'] = $this->leave->applied_leave_filter_count($post_data,$apply);
					$return['draw'] = $post_data['draw'];
					echo json_encode($return);
				}
			else if($action=="trashApp")
			{
				$post=$this->input->post();$getLeaveDetails=$this->leave->getLaeveApplication($post['oprType']);
				if($getLeaveDetails)
				{
					$msg=array('msg'=>'<i class="si si-power"></i> Are you sure want to delete '.$getLeaveDetails->leave_name.' of '.$getLeaveDetails->name.'('.$getLeaveDetails->employee_id.')','action'=>'miConfirmDel===admin/apply/index/confirmDelete==='.$getLeaveDetails->id);
					}
				else{$msg=array('msg'=>'<span class="text-danger">Oops it seems something went wrong</span>');}
				echo json_encode($msg);
				}	
			else if($action=="confirmDelete")
			{
				$post=$this->input->post('oprType');
				$getLeaveDetails=$this->leave->getLaeveApplication($post);
			
				if($getLeaveDetails)
				{
						//print_r($getData);exit;
					
					$whereCon=array('id'=>$post,'table'=>'employee_leave');
					$delDetails=$this->common->del_data($whereCon);
					if($delDetails)
					{
					   $msg=array('msg'=>'<span class="text-success"><i class="si si-emotsmile"></i> Thank you! You have successfully '.$getLeaveDetails->leave_name.' of '.$getLeaveDetails->name.'('.$getLeaveDetails->employee_id.')</span>',
					   			  'tnxResult'=>'success');
						} 
					else
					{
						$return=array('icon'=>'2','text'=>'<i class="ph-duotone ph-mask-sad"></i> Oops it seems error while deleting #'.$getLeaveDetails->leave_name.' of '.$getLeaveDetails->name.'('.$getLeaveDetails->employee_id.')');
						$msg=array('msg'=>'<span class="text-danger">Oops it seems error while deleting #'.$getLeaveDetails->leave_name.' of '.$getLeaveDetails->name.'('.$getLeaveDetails->employee_id.')</span>','tnxResult'=>'failed');
						}
					}
					else{$msg=array('msg'=>'<span class="text-danger">Oops it seems something went wrong</span>','tnxResult'=>'failed');}
					echo json_encode($msg);
				
				
				
				
				
				//print_r($getData);
				}	
				else
				{
					$leaveManage=$this->common->all_data_con('leave_manage',array('status'=>'1'),'*');
			        $data['leaveManage']=$leaveManage;
					$data['reportTyp']='requested';
					$data['title']='Leave Appliations';
        			$data['breadcrums'] = 'Leave Appliations';
        			$data['target']='admin/Apply/index/viewApplied';
					$data['addNewLeave']='admin/leave/manage';
					$data['layout']= "admin/leave/applied.php";
					$data['appManage']=base_url('admin/apply/manage');
					
					//$data['isLeaveApproved']=$this->isLeaveApproved('1');
					$this->load->view('adm_base',$data);
			}
		}
	public function view()
	{
		$post=$this->input->post();
		$getLeaveDetails=$this->leave->getLaeveApplication($post['oprType']);
		/*echo $this->db->last_query();
		exit;*/
		//echo '<br>';
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
		$data['getData']=$getLeaveDetails;
		echo json_encode($getLeaveDetails);
		//SELECT id,DATE_FORMAT(end_date,'%d-%M-%Y') as end_date FROM `employee_leave` 
		//$this->load->view('admin/leave/leave_application',$data);
		}
	public function manage()
	{
		$post=$this->input->post();$leaveOpration=NULL;
		$isLeaveApproved=array();
		if($post['oprType']=='acceptApp')
		{
			$leaveOpration='1';$isLeaveApproved=$this->isLeaveApproved($post['id']);
			$updateArr=array('status'=>'1','modified_by'=>$this->logID,'modified_date'=>date("Y-m-d H:i:s"));
			$isLeaveApproved['result']='<div class="appResultMsg bg-success">Congratulations your application has been approved by authority.</div>';
			}
		elseif($post['oprType']=='rejectApp')
		{
			$message='<div class="appResultMsg bg-danger ">Sorry your application has been rejected by authority.</div>';
			$msg=array('Thank You! you have successfully mark your appearance.');$leaveOpration='1';
			$updateArr=array('status'=>'2','modified_by'=>$this->logID,'modified_date'=>date("Y-m-d H:i:s"));
			$isLeaveApproved=array('addClas'=>'tst_warning','msg'=>$msg,'result'=>$message,'icon'=>'<i class="ti-check-box"></i>');
			}
			else{$leaveOpration=NULL;$msg=array("Oh it's looks like the option you have chosen wrong option");}
		if($leaveOpration)
		 {
		 	//$resultUp='1';
			$resultUp=$this->common->update_data('employee_leave',array('id'=>$post['id']),$updateArr);
		 	if($resultUp){$data=$isLeaveApproved;}
			else{$msg=array('Oops it seems somethinge went wrong refresh it.');$data=array('addClas'=>'tst_danger','msg'=>$msg,'icon'=>'<i class="fe fe-settings bx-spin"></i>');}
		 }
		 else{$data=array('addClas'=>'tst_danger','msg'=>$msg,'icon'=>'<i class="fe fe-settings bx-spin"></i>');}
		sleep(2);echo json_encode($data);//print_r($post);
		}
	private function isLeaveApproved($id)
	{
		$getEmployeeLeave=$this->leave->getRestLeave($id);
		$sysIP=$this->input->ip_address();
		if($getEmployeeLeave)
		{
			$isLeaveYr=explode('@@@@',$getEmployeeLeave->leave_in_between);
			$getCurrentDate=strtotime(date('d-m-Y'));
			if((strtotime($isLeaveYr[0]) < $getCurrentDate) && ($getCurrentDate < strtotime($isLeaveYr[1])))
			{
				$isRestLeaveYr=explode(',',$getEmployeeLeave->approved_leave);
				$isRemainingLvYr=NULL;$getAllParameter=array();
				 if($isRestLeaveYr)	
				 {	
					foreach($isRestLeaveYr as $rest)
					{
						$restLv=explode('==',$rest);
						if($restLv[0]==$getEmployeeLeave->leave_type)
						{
							$restLeaveDay=$restLv[2]-$getEmployeeLeave->total_leave;
							if($restLeaveDay < 0){$absentDay=abs($restLeaveDay);$remainLeave=$restLv[0].'=='.$restLv[1].'==0=='.$restLv[3];}
							else{$absentDay=0;$remainLeave=$restLv[0].'=='.$restLv[1].'=='.$restLeaveDay.'=='.$restLv[3];}
							if($isRemainingLvYr){$isRemainingLvYr.=','.$remainLeave;}else{$isRemainingLvYr.=$remainLeave;}
							}
						 else{if($isRemainingLvYr){$isRemainingLvYr.=','.$rest;}else{$isRemainingLvYr.=$rest;}}}
						$getAllParameter=array('absentDay'=>$absentDay,'totalLeave'=>$getEmployeeLeave->total_leave);										
					}
				else{$getAllParameter=array();$getAllParameter=array('absentDay'=>$getEmployeeLeave->total_leave,'totalLeave'=>$getEmployeeLeave->total_leave);}	
				$afterAprovEmpLeave=array('approved_leave'=>$isRemainingLvYr);
				$resultEmpLeave=$this->common->update_data('staff',array('id'=>$getEmployeeLeave->emp_id),$afterAprovEmpLeave);//$resultEmpLeave=1;
				 if($resultEmpLeave)
				 { 
//$testingArr=array();
					if($getAllParameter['totalLeave'])
					{
						  $aprLeave=$getAllParameter['totalLeave']-$getAllParameter['absentDay'];$logInTym=date('H:i:s',strtotime($getEmployeeLeave->shift_start));
						  $logOutTym=date('H:i:s',strtotime($getEmployeeLeave->shift_end));
						  for($crAprLeave=0;$crAprLeave < $getAllParameter['totalLeave'];$crAprLeave++)
						  {
								$attenDate=date('Y-m-d', strtotime($getEmployeeLeave->from_date.' + '.$crAprLeave.' day'));
								if($crAprLeave < $aprLeave)
								{
//$getTesting=array('remark'=>'<span style="color:green">Leave is apporved and not salary will deduct '.$crAprLeave.'</span>','attendance_date'=>$attenDate);
								   $mrkApporved=array('employee_id'=>$getEmployeeLeave->emp_id,'staff_attendance_type_id'=>'6','attendance_date'=>$attenDate,
													  'log_in_time'=>$logInTym,'log_out_time'=>$logOutTym,'markIpAddress'=>$sysIP,'workFrm'=>'1',
													  'remark'=>'<span style="color:green">Leave is apporved and not salary will deduct</span>','created_at'=>date('Y-m-d'));
									}
									else
									{		
								   $mrkApporved=array('employee_id'=>$getEmployeeLeave->emp_id,'staff_attendance_type_id'=>'3','attendance_date'=>$attenDate,
													  'log_in_time'=>$logInTym,'log_out_time'=>$logOutTym,'markIpAddress'=>$sysIP,'workFrm'=>'1',
													  'remark'=>'<span style="color:red">Leave is apporved but it will mark as absent.</span>','created_at'=>date('Y-m-d'));	
									
//$getTesting=array('remark'=>'<span style="color:red">Leave is apporved but it will mark as absent '.$crAprLeave.'.</span>','attendance_date'=>$attenDate);	
									}
//array_push($testingArr,$getTesting);
								   $createResult=$this->common->save_data('staff_attendance',$mrkApporved);//if($createResult){$success='1';}else{$success=NULL;}
								}
//$data=$testingArr;
						     $msg=array('You have suucessfully approved leave.');
						     $data=array('addClas'=>'tst_success','msg'=>$msg,'icon'=>'<i class="ti-check-box"></i>');
						}
						else
						{
						   $msg=array('Oops it seems something went wrong while submit details.','Please reload page to access it.','Because total leave is over');
						   $data=array('addClas'=>'tst_danger','msg'=>$msg,'icon'=>'<i class="fe fe-settings bx-spin"></i>');
						   }
					}
					else
						{
							$msg=array('Oops it seems something went wrong while submit details.','Please reload page to access it.');
							$data=array('addClas'=>'tst_danger','msg'=>$msg,'icon'=>'<i class="fe fe-settings bx-spin"></i>');
							}
				}
			else
			{
				$msg=array("Oh looks like you've finished the leave you've been given.","please contact the administrator.");
				$data=array('addClas'=>'tst_danger','msg'=>$msg,'icon'=>'<i class="fe fe-settings bx-spin"></i>');	
				}
			}
			return $data;
		}			
}
