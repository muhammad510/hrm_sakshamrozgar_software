<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		($this->session->userdata('mim_id')== '') ? redirect(base_url(), 'refresh') : '';
		$this->load->model(array('employee/team_model'=>'team','setting/leave_model'=>'leave'));
		$this->logId=$this->session->userdata('mim_id');
		error_reporting(0);
		
	}
	
	public function index($actn=NULL)
	{
		if($actn=='view')
		{
			$post_data=$this->input->post();$mnthDt=array();//$post_data['fromDate']='2025-01-01';$post_data['toDate']='2025-01-31';
			if(($post_data['fromDate']!='')&&($post_data['toDate']!=''))
			{$frmDt=date('Y-m-d',strtotime(str_replace("/","-",$post_data['fromDate'].' -1 day')));$endDate=date('Y-m-d',strtotime(str_replace("/","-",$post_data['toDate'])));$numDay=abs(strtotime($endDate)-strtotime($frmDt))/86400;}
			else{$numDay=date("t",strtotime(date('Y-m')));$searchDateMonth=date('Y-m-');$frmDt=date('Y-m-01');$endDate=date('Y-m-d', strtotime((date('Y-m-').'00') . ' +'.$numDay.' day'));}
			for($mi=1;$mi<=$numDay;$mi++){$markDate=date('d-m-Y',strtotime($frmDt.' +'.$mi.' day'));$isWeekend=date('D',strtotime($markDate));array_push($mnthDt,$markDate);}
			$page=$post_data['page'];
       		if (!$page) $page = 1; 
			$limit = 12; 
            $offset=($page-1)*$limit;
			$record= $this->team->employee($limit,$offset);/* echo $this->db->last_query().'<br>'; //print_r($employees);exit;*/
			$total_rows=$this->team->total_employees();
			$limit=$limit; 	
			if($record)
			{
				foreach ($record as $row)
				{
					$mnthArr=array();$ds=NULL;
					for($mi=1;$mi<=$numDay;$mi++):
					if($mi<=$numDay)
					{
						$markDate=date('Y-m-d', strtotime($frmDt . ' +'.$mi.' day'));
						$isWeekend=date('D',strtotime($markDate));
						$whereConEmp=array('attendanceDate'=>$markDate,'emp_id'=>$row->id);
						$isWorked=$this->team->get_empWorking($whereConEmp);
						if($isWorked)
						{	$log_in_time=$isWorked->log_in_time?('<div>'.date('H:i:s',strtotime($isWorked->log_in_time)).'</div>'):'<div>N/A</div>';
							$log_out_time=$isWorked->log_out_time?('<div>'.date('H:i:s',strtotime($isWorked->log_out_time)).'</div>'):'<div>N/A</div>';
							if($isWorked->staff_attendance_type_id=='3'){$timing='<span style="color:#F16D75">Absent</span>';}
							else if($isWorked->staff_attendance_type_id=='4'){$timing='<span style="color:#0073d9">Holiday</span>';}
							else if($isWorked->staff_attendance_type_id=='6'){$timing='<span style="color:#009EA6">On Leave</span>';}
							else{$timing=$log_in_time.$log_out_time;}
							}
						else{if($isWeekend=='Sun'){$timing="<span style='color:#8c0303'>Sun</span>";}else{$timing='N/A';}}
							array_push($mnthArr,'<div class="tdCl"><div class="inOutDet">'.$timing.'</div></div>');
						}
					else{array_push($mnthArr,'');}
					endfor;	
					 $tPresent=$this->team->empAttendance(array('emp_id'=>$row->id,'typeID'=>'1','strtDt'=>$frmDt,'endDt'=>$endDate));
					 $tAbsent=$this->team->empAttendance(array('emp_id'=>$row->id,'typeID'=>'3','strtDt'=>$frmDt,'endDt'=>$endDate));
					 $tLeave=$this->team->empAttendance(array('emp_id'=>$row->id,'typeID'=>'6','strtDt'=>$frmDt,'endDt'=>$endDate));
					 $tLate=$this->team->empAttendance(array('emp_id'=>$row->id,'typeID'=>'2','strtDt'=>$frmDt,'endDt'=>$endDate));
					 $tHalfDy=$this->team->empAttendance(array('emp_id'=>$row->id,'typeID'=>'5','strtDt'=>$frmDt,'endDt'=>$endDate));
					 $totalHalfDy=$tHalfDy->total?$tHalfDy->total:'0';
					 $totalLate=$tLate->total?$tLate->total:'0';
					 $totalPresent=$tPresent->total?($tPresent->total+$totalHalfDy*(0.5)-round($totalLate*(0.3333333333333333))):'0';
					 $totalAbsent=$tAbsent->total?($tAbsent->total+round($totalLate*(0.3333333333333333))):'0';
					 $totalLeave=$tLeave->total?$tLeave->total:'0';
					  $empDetails= array($row->employee_id,$row->empName);
					 $empSummary=array('<div class="tSumry">'.$totalPresent.'</div>','<div class="tSumry">'.$totalAbsent.'</div>','<div class="tSumry">'.$totalLeave.'</div>');
					 $attendance[]=array_merge($empDetails,$mnthArr,$empSummary);
					}
				}				
			$return=array('dayInMonth'=>$mnthDt,'limit'=>$limit,'total_rows'=>$total_rows,'empDetails'=>$attendance);	
			echo json_encode($return);
			}
			else
			{
				$dayInMonth= date("t",strtotime(date('Y-m')));
				$data['dayInMonth']=$dayInMonth;
				$data['title']='Team Attendance';
				$data['breadcrums'] = 'Team Attendance';
				$data['target']=base_url('employee/team/index/view');
    			$this->load->view('employee/team/attendance',$data);
				}
		}
	public function request_leave($actn=NULL)
	{
		if($actn=='view')  	 
	    {
			$isTeam=$this->team->is_team_employee();
			$post_data = $this->input->post();
			$record = $this->team->leave_list($post_data,$isTeam);
			/*echo $this->db->last_query().'<br>';
			print_r($record);
			exit;*/	
			/*SELECT `empLv`.*, `leave_name` FROM `employee_leave` as `empLv` LEFT JOIN `leave_manage` as `lvM` ON `lvM`.`id`=`empLv`.`leave_type` WHERE `empLv`.`emp_id` IN('19', '28', '34', '58', '20', '21', '33', '66', '45') ORDER BY `created_date` DESC*/
			
			
			
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
                                             <button type="button" class="btn btn-outline-primary btn-sm miAction" data-id="watchLeaveDetails===employee/leave/view==='.$row->id.'===team"><i class="fe fe-eye"></i></button> 
										 </div>'
										);
            }
            $return['recordsTotal'] = $this->team->leave_count($isTeam);
            $return['recordsFiltered'] = $this->team->leave_filter_count($post_data,$isTeam);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);
			}
		else if($actn=='appr')
		{
			$post=$this->input->post();$leaveOpration=NULL;
			$isLeaveApproved=array();
			if($post['oprType']=='acceptApp')
			{
				$leaveOpration='1';$isLeaveApproved=$this->isLeaveApproved($post['id']);
				$updateArr=array('status'=>'1','modified_by'=>$this->logId,'modified_date'=>date("Y-m-d H:i:s"));
				$isLeaveApproved['result']='<div class="appResultMsg bg-success">Congratulations your application has been approved by authority.</div>';
				}
			elseif($post['oprType']=='rejectApp')
			{
				$message='<div class="appResultMsg bg-danger ">Sorry your application has been rejected by authority.</div>';
				$msg=array('Thank You! you have successfully mark your appearance.');$leaveOpration='1';
				$updateArr=array('status'=>'2','modified_by'=>$this->logId,'modified_date'=>date("Y-m-d H:i:s"));
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
			else 
			{
				$leaveManage=$this->common->all_data_con('leave_manage',array('status'=>'1'),'*');
				$data['leaveManage']=$leaveManage;
				$data['title']='Team Leave Request';
				$data['breadcrums'] = 'Team Leave Request';
				$data['target']='employee/team/request_leave/view';  	
				$data['layout']= "basic/myleaves.php";
				$this->load->view('employee/testing_base',$data);
				}
		
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
