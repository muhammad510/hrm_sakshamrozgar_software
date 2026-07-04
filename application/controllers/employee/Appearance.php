<?php defined('BASEPATH') or exit('No direct script access allowed');

class Appearance extends CI_Controller
{
    public function __construct()
   {
            parent::__construct();
            $this->load->model('employee/staff_model', 'staff');
            ($this->session->userdata('mim_id')== '') ? redirect(base_url(), 'refresh') : '';
            $this->logId=$this->session->userdata('mim_id');
			error_reporting(0);	
        }
   public function index($actn=NULL)
   {
 		if($actn=='view')  	 
	    {
			$post_data = $this->input->post();
			$record = $this->staff->staff_list($post_data,$this->logId);
			$i=$post_data['start'] + 1;$return['data'] = array();
            foreach($record as $row)
			{
				  $atStatus=array('1'=>'<span class="badge bgPrsnt miBgs">Present</span>','2'=>'<span class="badge bgLat miBgs">Late</span>',
				  				  '3'=>'<span class="badge bgAbsnt miBgs">Absent</span>','4'=>'<span class="badge bgHoliDy miBgs">Holiday</span>',
								  '5'=>'<span class="badge bgHfDy miBgs">Half Day</span>','6'=>'<span class="badge bgLvDy miBgs">Leave</span>');
				  $logOut_time=strtotime($row->log_out_time);
				  $logIn_time = strtotime($row->log_in_time);
				  $getTotalMinute=round(abs($logIn_time - $logOut_time)/60,2);
				  $workingHrs=round(($getTotalMinute/60),2);
				  if($row->log_out_time)
				  {
					 $tHours=floor($getTotalMinute/60);$tMinutes=round($getTotalMinute%60); 
					 $tSec=round(($getTotalMinute - floor($getTotalMinute)) * 60);
					 $workingHrs='<span class="wrkHr">'.(($tHours<10)?'0'.$tHours:$tHours).':'.(($tMinutes<10)?'0'.$tMinutes:$tMinutes).':'.(($tSec<10)?'0'.$tSec:$tSec).'</span>'; 
					}  
				 else{$workingHrs=(($row->staff_attendance_type_id=='6')||($row->staff_attendance_type_id=='3'))?'':'<span class="wrKng">Still working...</span>';}
	
				  $return['data'][] = array( '<strong>'.$i++.'.</strong>',
											date('d-m-Y',strtotime($row->attendance_date)),
											$atStatus[$row->staff_attendance_type_id],
											date('h:i:s a',strtotime($row->log_in_time)),
											$logOutTiming,
											$workingHrs,
											date('d-m-Y',strtotime($row->created_at)),
											$row->remark
											);

            }
            $return['recordsTotal'] = $this->staff->staff_count($this->logId);
            $return['recordsFiltered'] = $this->staff->staff_filter_count($post_data,$this->logId);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);
			}
		else if($actn=='markAttendance')
		{
			//sleep(2);
			$post=$this->input->post();$findShift=NULL;
			$classArr=array('adCls'=>'btn-outline-dark disabled','rmvCls'=>'btn-outline-success');
			$arBtn=array('mrkPresentIn'=>'<i class="fe fe-sunrise"></i> Clock In','mrkPresentOut'=>'<i class="fe fe-sunset"></i> Clock Out');
			$findShift=$this->staff->shiftDetails($this->logId);
			if($post['arAction']=='mrkPresentIn')
			{
				$othrBtn='mrkPresentOut';
				if($findShift)
				 {
					if((strtotime('- 30 minutes',$findShift->shift_start) < strtotime(date("h:i:s a"))) && (strtotime(date("h:i:s a")) < strtotime($findShift->shift_end)))
					{
					    $shiftDuration=explode(' ',$findShift->shift_duration);
						$halfDay=$shiftDuration[0]/2 .' '.$shiftDuration[1];
						$shiftStartWithGrace=strtotime('+ 20 minutes',strtotime($findShift->shift_start));
						$attendanceTime=strtotime($post['miClock']);
						$isCheckHalf=strtotime('+ '.$halfDay,strtotime($findShift->shift_start));
						if($shiftStartWithGrace >= $attendanceTime){$workingPeriod='1';}
						else if(($shiftStartWithGrace <= $attendanceTime) && ($attendanceTime <= $isCheckHalf)){$workingPeriod='2';}else{$workingPeriod='3';}
						$mrkAttArr=array('attendance_status'=>$workingPeriod,'attendance_date'=>date('Y-m-d'),'log_in_time'=>$post['miClock']);
						$sysIP=$this->input->ip_address();if($post['workFrm']){$wrkFrm=$post['workFrm'];}else{$wrkFrm='1';}
						if($post['remark']){$remark=$post['remark'];}else{$remark=NULL;}
		                $mrkPresent=array('employee_id'=>$this->logId,'staff_attendance_type_id'=>$workingPeriod,'attendance_date'=>date('Y-m-d'),'log_in_time'=>$post['miClock'],'markIpAddress'=>$sysIP,'workFrm'=>$wrkFrm,'remark'=>$remark,'created_at'=>date('Y-m-d'));
						
						$isAlreadyExist=$this->common->get_data('staff_attendance',array('employee_id'=>$this->logId,'attendance_date'=>date('Y-m-d')),'*');
						if(!$isAlreadyExist)
						{
							
							
							if($this->common->update_data('staff',array('id'=>$this->logId),$mrkAttArr))
					    	{
								//print_r($mrkAttArr);exit;
								if($this->common->save_data('staff_attendance', $mrkPresent))
								{
									$msg=array('Thank You! you have successfully make you appearance.');
									$resultCls='tst_success';$icon='<i class="ti-check-box"></i>';
									}
							}
						 }
						 else
					   	  {
					   		
							if($isAlreadyExist['staff_attendance_type_id']=='6')
							{
								$resultCls='tst_default';$icon='<i class="fe fe-settings bx-spin"></i>';
								$msg=array("You have taken leave so, you can't make attendance");
									
								}
								else
								{
									$resultCls='tst_warning';$icon='<i class="fe fe-settings bx-spin"></i>';
									$msg=array('You have already mark your attendance');
									}
							}
						}
					   else
					   {
					   		$resultCls='tst_warning';$icon='<i class="fe fe-settings bx-spin"></i>';
							$msg=array('Oops your shift in between '.$findShift->shift_start.' to '.$findShift->shift_end);
							}
					}
				  else
				  	  {
					  	  $msg=array('Oops it seems you are not eligible for making attendance.','Please contact to Super Admin.');
						  $resultCls='tst_danger';
						  $icon='<i class="fe fe-settings bx-spin"></i>';
						  
						  }
				  array_push($classArr['arvResult']=$resultCls,$classArr['msg']=$msg,$classArr['icon']=$icon);	
				}
			 else if($post['arAction']=='mrkPresentOut')
			 {
			 	$othrBtn='mrkPresentIn';
				$whereCon=array('employee_id'=>$this->logId,'attendance_date'=>date('Y-m-d'));
				$getTodayAttendance=$this->common->get_data('staff_attendance',$whereCon,'log_in_time,log_out_time,staff_attendance_type_id,attendance_date');
				 $logOut_time=strtotime($post['miClock']);
				 $logIn_time = strtotime($getTodayAttendance['log_in_time']);
				 $getTotalMinute=round(abs($logIn_time - $logOut_time)/60,2);
				 $workingHrs=round(($getTotalMinute/60),2);
				 if($findShift)
				 {
				 	$duration=$findShift->shift_duration;
					if(($workingHrs > $duration/2) &&($workingHrs < $duration))
					{
						if(($workingHrs > $duration/2) &&($workingHrs > $duration*0.9)){$workingPeriod='1';}
						else if(($workingHrs > $duration*.75) &&($workingHrs < $duration*0.9)){$workingPeriod='2';}	else{$workingPeriod='5';}
						}
					else if($workingHrs > $duration){$workingPeriod='1';}	
					else{$workingPeriod='3';}
					}
				 $toWorkingPreiodArr=array('log_out_time'=>$post['miClock'],'staff_attendance_type_id'=>$workingPeriod);
				 $mrkAttArr=array('log_out_time'=>$post['miClock'],'attendance_status'=>$workingPeriod);
				 if($this->common->update_data('staff_attendance',$whereCon,$toWorkingPreiodArr)) 
				 {
						$this->common->update_data('staff',array('id'=>$this->logId),$mrkAttArr);
				 	}
				}
		     array_push($classArr['actBtnTxt']=$arBtn[$post['arAction']],$classArr['othrBtn']=$othrBtn);
		     echo json_encode($classArr);
			}	
		else
		{	
			$mrkAttendance=NULL;
			$mrkAttendance=$this->common->get_data('staff',array('id'=>$this->logId),'log_in_time,log_out_time,attendance_status,attendance_date');
			if($mrkAttendance)
			{
				if($mrkAttendance['attendance_date']!=date('Y-m-d'))
				{
					$attToMarkNewArr=array('attendance_status'=>'0','attendance_date'=>NULL,'log_in_time'=>'','log_out_time'=>'');
					$this->common->update_data('staff',array('id'=>$this->logId),$attToMarkNewArr);
					}
				}
			
			$data['markPresentAction']=base_url('employee/appearance/index/markAttendance');
			$data['mrkAttendance']=$mrkAttendance;
			$ovrVthisMonth=$this->staff->overViewThisMonth($this->logId);
			$data['ovrVthisMonth']=$ovrVthisMonth;
			$data['title']='My Appearance History';
        	$data['breadcrums'] = 'My Appearance History';
			$data['target']='employee/appearance/index/view';
        	/*
				$data['layout']= "attendance/manage.php";
				$this->load->view('employee/base',$data);
				*/
			$this->load->view('employee/appreance',$data);
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
