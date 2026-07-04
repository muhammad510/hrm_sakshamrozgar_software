<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Api extends CI_Controller 
{
	 public function __construct()
	 {
	 	parent::__construct();error_reporting(0);
		$this->load->helper(array('form', 'url'));
        $this->load->library('upload');
		$this->load->model('admin/Attendance_model', 'attendance');
		}

	public function login($userMail,$userpass)
	{
		$isCheckUser=$this->common->get_data('staff',array('email'=>$userMail,'password'=>md5($userpass)),'*');
		if($isCheckUser)
		{
			$findShift=$this->attendance->shiftDetails($isCheckUser['id']);	
			$dateFrm=date('Y-m-01');$dateTo=date('Y-m-t');
		    $isAtndnc=$this->db->select('count(*) as total')->from('staff_attendance')->where('employee_id',$isCheckUser['id'])->where('staff_attendance_type_id','1')->where('attendance_date >=',$dateFrm)->where('attendance_date <=',$dateTo)->get()->row();
			$tPresent=$isAtndnc->total?$isAtndnc->total:'0 Day';
			$todayCheckIn=$isCheckUser['log_in_time']?(date('d M Y',strtotime($isCheckUser['attendance_date'])).' | '.$isCheckUser['log_in_time']):'XX:XX:XX';
			$btnTyp=$isCheckUser['log_in_time']?($isCheckUser['log_out_time']?'alreadyMarked':'outClock'):'inClock';
			if($isCheckUser['log_in_time'] && $isCheckUser['log_out_time']){$logOut_time=strtotime($isCheckUser['log_out_time']);$logIn_time = strtotime($isCheckUser['log_in_time']);}
			else if($isCheckUser['log_in_time']){$logOut_time=strtotime(date('H:i:s'));$logIn_time = strtotime($isCheckUser['log_in_time']);}
			else{$logOut_time=0;$logIn_time=0;}
			$getTotalMinute=round(abs($logIn_time - $logOut_time)/60,2);
			$workingHrs=round(($getTotalMinute/60),2);
			$tHours=floor($getTotalMinute/60);
			$tMinutes=round($getTotalMinute%60); 
			$tSec=round(($getTotalMinute - floor($getTotalMinute)) * 60); 
			$workDuration=$tHours.' Hrs '.$tMinutes.' Min '.$tSec.' Sec';
			$workPercent=($workingHrs*100)/$findShift->shift_duration;
			//print_r($isCheckUser);exit;
			$return=array('adClass'=>'success','memName'=>(($isCheckUser['surname']!="")?($isCheckUser['surname'].' '.$isCheckUser['name']):$isCheckUser['name']),
						  'memUserId'=>$isCheckUser['id'],'memEmailId'=>$isCheckUser['email'],'loggedImg'=>base_url($isCheckUser['image']),'curTime'=>date('H:i:s'),
						  'location'=>'Pancicura Hotel Behind Town Hall','workPercent'=>$workPercent,'totalPresent'=>$tPresent,'wrkFrm'=>'XXXX XXXXX XXXXX',
						  'workDur'=>$workDuration,'clockInTime'=>($isCheckUser['log_in_time']?$isCheckUser['log_in_time']:'XX:XX:XX'),
						  'workingDay'=>date("jS F Y"),'todayCheckIn'=>$todayCheckIn,'btnTyp'=>$btnTyp);
			}
		else{$return=array('adClass'=>'error');}
		//echo json_encode($return);	
		
		$this->output->set_content_type('application/json')->set_output(json_encode($return));
			
	}
public function isAttendance($id)
{
	$isCheckUser=$this->common->get_data('staff',array('id'=>$id),'*');
	if($isCheckUser)
	{
		$findShift=$this->attendance->shiftDetails($isCheckUser['id']);	
		$dateFrm=date('Y-m-01');$dateTo=date('Y-m-t');
		$isTraceOff=$findShift->shift_end?$findShift->shift_end:'19:00:00';
		$isAtndnc=$this->db->select('count(*) as total')->from('staff_attendance')->where('employee_id',$isCheckUser['id'])->where('staff_attendance_type_id','1')->where('attendance_date >=',$dateFrm)->where('attendance_date <=',$dateTo)->get()->row();
		$tPresent=$isAtndnc->total?$isAtndnc->total:'0 Day';
		if($isCheckUser['attendance_date']!=date('Y-m-d'))
		{
			  $mrkAttArr=array('attendance_status'=>'0','attendance_date'=>NULL,'log_in_time'=>NULL,'in_location'=>NULL,'log_out_time'=>NULL,'out_location'=>NULL);
			  if($this->common->update_data('staff',array('id'=>$id),$mrkAttArr))
			  {
			  		$return=array('adClass'=>'success','memName'=>(($isCheckUser['surname']!="")?($isCheckUser['surname'].' '.$isCheckUser['name']):$isCheckUser['name']),
								  'memUserId'=>$id,'memEmailId'=>$isCheckUser['email'],'loggedImg'=>base_url($isCheckUser['image']),
								  'curTime'=>date('H:i:s'),'location'=>'XXXXX XXXXX,XXXXX','workPercent'=>'0',
								  'totalPresent'=>$tPresent,'wrkFrm'=>'XXXX XXXXX XXXXX','workDur'=>'00 Hrs 00 Min 00 Sec',
								  'clockInTime'=>($isCheckUser['log_in_time']?$isCheckUser['log_in_time']:'XX:XX:XX'),
								  'workingDay'=>date("jS F Y"),'todayCheckIn'=>'XX:XX:XX',
								  'isTraceOff'=>$isTraceOff,'btnTyp'=>'inClock');
					}
				else{$return=array('adClass'=>'error','msg'=>'Please try agian to fetch detail.');}
			}
			else
			{
				$isWorked=$this->common->get_data('staff_attendance',array('employee_id'=>$id,'attendance_date'=>date('Y-m-d')),'*');
				$btnTyp=$isCheckUser['log_out_time']?'alreadyMarked':'outClock';
				$clockOut=date('H:i:s');
				$logOut_time=strtotime($clockOut);
			    $logIn_time = strtotime(($isCheckUser['log_in_time']?$isCheckUser['log_in_time']:date('H:i:s')));
			    $getTotalMinute=round(abs($logIn_time - $logOut_time)/60,2);
			    $workingHrs=round(($getTotalMinute/60),2);
			    $tHours=floor($getTotalMinute/60);
			    $tMinutes=round($getTotalMinute%60); 
			    $tSec=round(($getTotalMinute - floor($getTotalMinute)) * 60); 
			    $workDuration=$tHours.' Hrs '.$tMinutes.' Min '.$tSec.' Sec';
			    $todayCheckIn=$isCheckUser['log_in_time']?(date('d M Y',strtotime($isCheckUser['attendance_date'])).' | '.$isCheckUser['log_in_time']):'XX:XX:XX';
				$workPercent=($workingHrs*100)/$findShift->shift_duration;
				$work=array('1'=>'Work From Office','2'=>'Work From Home','3'=>'Others');
				$wrkFrm=$isWorked?$work[$isWorked['workFrm']]:'Work From Office';
				$return=array('adClass'=>'success','curTime'=>date('H:i:s'),'location'=>'Pancicura Hotel Behind Town Hall',
							  'workPercent'=>$workPercent,'totalPresent'=>$tPresent,'wrkFrm'=>$wrkFrm,'workDur'=>$workDuration,
							  'clockInTime'=>($isCheckUser['log_in_time']?$isCheckUser['log_in_time']:'XX:XX:XX'),
							  'workingDay'=>date("jS F Y"),'todayCheckIn'=>$todayCheckIn,
							  'isTraceOff'=>$isTraceOff,'btnTyp'=>$btnTyp);	
				}
		}
		else{$return=array('adClass'=>'error','msg'=>'The login ID does not exist.');}
	    $this->output->set_content_type('application/json')->set_output(json_encode($return));		  
	}		
	
	public function reset_password($userMail)
	{
		$isCheckUser=$this->common->get_data('staff',array('email'=>$userMail),'*');
		if($isCheckUser)
		{
			//$return=array('adClass'=>'success','msg'=>'Welcome to dashboard.','memName'=>$isCheckUser['name'],'memUserId'=>$isCheckUser['employee_id']);
			echo 'found';
			}
			else
			{
				//$return=array('adClass'=>'error','msg'=>'Oops there is no valid user details');
				 echo 'Please input valid details.';
				}
		//echo json_encode($return);		
	}
	
	public function mini_statement($id)
	{
		$isStatement=$this->common->getDataListByLimitRecent('temp_mini_statement', 'agent_id', $id,'10');
		if($isStatement)
		{
			$isCheckUser=$this->common->get_data('staff',array('id'=>$id),'name,image,contact_no');
			$dataReturn=array();
			foreach($isStatement as $details)
			{
				$dataReturn[]=array('tnx_details'=>$details->tnx_details,'tnx_date'=>date('H:ia d,M Y',strtotime($details->tnx_date)),
									'tnx_amount'=>$details->tnx_amount,'tnx_type'=>$details->tnx_type);
				}
					$return=array('adClass'=>'success','memName'=>(($isCheckUser['surname']!="")?($isCheckUser['surname'].' '.$isCheckUser['name']):$isCheckUser['name']),
								  'loggedImg'=>base_url($isCheckUser['image']),
								  'memPhone'=>$isCheckUser['contact_no'],
								  'memAvailBal'=>'5499.00',
								  'todayTnxAmt'=>'1199.00',
								  'weeklyTnxAmt'=>'1499.00',
								  'statement'=>$dataReturn);
			}
			else
			{
				$return=array('adClass'=>'error');
				}
			/*	echo '<pre>';
				print_r($return);
				echo '</pre>';*/
			echo json_encode($return);
		} 
	public function agent_statement($id)
	{
		$isStatement=$this->common->getDataListByLimitRecent('agent_statement', 'agent_id', $id,'10');
		if($isStatement)
		{
			$isCheckUser=$this->common->get_data('staff',array('id'=>$id),'name,image,contact_no');
			$dataReturn=array();
			foreach($isStatement as $details)
			{
				$dataReturn[]=array('tnx_details'=>$details->tnx_details,'tnx_date'=>date('H:ia d,M Y',strtotime($details->tnx_date)),
									'tnx_amount'=>$details->tnx_amount,'tnx_type'=>$details->tnx_type);
				}
					$return=array('adClass'=>'success','memName'=>(($isCheckUser['surname']!="")?($isCheckUser['surname'].' '.$isCheckUser['name']):$isCheckUser['name']),
								  'loggedImg'=>base_url($isCheckUser['image']),
								  'memPhone'=>$isCheckUser['contact_no'],
								  'memAvailBal'=>'5499.00',
								  'todayTnxAmt'=>'1199.00',
								  'weeklyTnxAmt'=>'1499.00',
								  'statement'=>$dataReturn);
			}
			else
			{
				$return=array('adClass'=>'error');
				}
				/*echo '<pre>';
				print_r($return);
				echo '</pre>';*/
			echo json_encode($return);
		} 	
	
	public function getAttendance($logged,$location,$mrkType)
	{		
		$isCheckUser=$this->common->get_data('staff',array('id'=>$logged),'*');
		$getCurrentTym=date("H:i:s");//$getCurrentTym='14:00:00';
		if($isCheckUser)
		{
			$findShift=$this->attendance->shiftDetails($isCheckUser['id']);	
			if(($isCheckUser['attendance_date']!=date('Y-m-d'))&&($isCheckUser['log_in_time']==''))
			{
			//	echo 'if condition';exit;
				if($findShift)
				{
					if((strtotime('- 30 minutes',strtotime($findShift->shift_start)) < strtotime($getCurrentTym)) && (strtotime($getCurrentTym) < strtotime($findShift->shift_end)))
					{
						$clockIn=date('H:i:s');
						//$clockIn='14:00:00';
						$loginDt=date('Y-m-d');
						$halfDay=(($findShift->shift_duration/2)+1).' Hour';
						$shiftStartWithGrace=strtotime('+ 20 minutes',strtotime($findShift->shift_start));
						$attendanceTime=strtotime(date('H:i:s',strtotime($clockIn)));
						$loginTime=date('H:i:s',strtotime($clockIn));
						$isCheckHalf=strtotime('+ '.$halfDay,strtotime($findShift->shift_start));
						if($shiftStartWithGrace >= $attendanceTime){$workingPeriod='1';}
						else if(($shiftStartWithGrace <= $attendanceTime) && ($attendanceTime <= $isCheckHalf))
						{$workingPeriod='5';}else{$workingPeriod='3';}	
						$mrkAttArr=array('attendance_status'=>$workingPeriod,'attendance_date'=>$loginDt,'log_in_time'=>$loginTime,'in_location'=>$location);
						$sysIP=$this->input->ip_address();
						$mrkPresent=array('employee_id'=>$logged,'staff_attendance_type_id'=>$workingPeriod,'attendance_date'=>$loginDt,'log_in_time'=>$loginTime,'in_location'=>$location,
										  'markIpAddress'=>$sysIP,'workFrm'=>'3','biometric_attendence'=>'0','biometric_device_data'=>'9999','remark'=>'Live Track Attendance','created_at'=>$loginDt);
						if($this->common->update_data('staff',array('id'=>$logged),$mrkAttArr))
						{
							$isAttendance=$this->common->get_data('staff_attendance',array('id'=>$logged,'attendance_date'=>date('Y-m-d')),'*');
							if(!$isAttendance)
							{
								if($this->common->save_data('staff_attendance', $mrkPresent))
								{
									$dateFrm=date('Y-m-01');$dateTo=date('Y-m-t');
		$isAtndnc=$this->db->select('count(*) as total')->from('staff_attendance')->where('employee_id',$isCheckUser['id'])->where('staff_attendance_type_id','1')->where('attendance_date >=',$dateFrm)->where('attendance_date <=',$dateTo)->get()->row();
		$tPresent=$isAtndnc->total?$isAtndnc->total:'0 Day';
										
										$workDuration='0 Hrs 0 Min 0 Sec';
										$todayCheckIn=date('d M Y',strtotime(date('Y-m-d'))).' | '.$loginTime;
										$return=array('adClass'=>'success','msg'=>'You have clock in successfully.',
													  'curTime'=>date('H:i:s'),
													  'location'=>'Pancicura Hotel Behind Town Hall',
													  'workPercent'=>'0',
													  'totalPresent'=>$tPresent,
													  'wrkFrm'=>'Others',
													  'workDur'=>$workDuration,
													  'clockInTime'=>$loginTime,
													  'workingDay'=>date("jS F Y"),
													  'todayCheckIn'=>$todayCheckIn,
													  'btnTyp'=>'outClock'
													  );
									
									}
								else{$return=array('adClass'=>'noLogged','msg'=>'Clock in process invalid');}
								}
								else{$return=array('adClass'=>'noLogged','msg'=>'Clock in process invalid');}
						  }else{$return=array('adClass'=>'noLogged','msg'=>'Clock in process invalid');}
						}
					}
				//	else{echo 'This Section will check';exit;}
				}
				else if(($isCheckUser['attendance_date']!=date('Y-m-d'))&&($isCheckUser['log_in_time']!=''))
				{			
					if($findShift)
					{
					//	$statrShift=date('h:i:s',strtotime($findShift->shift_start));
				     //   echo strtotime('- 30 minutes',strtotime($findShift->shift_start)) ;
				      //  exit;
						if((strtotime('- 30 minutes',strtotime($findShift->shift_start)) < strtotime(date("h:i:s a"))) && (strtotime(date("h:i:s a")) < strtotime($findShift->shift_end)))
						{
							
						//	echo 'else if condition';exit;
							$clockIn=date('H:i:s');///$clockIn='14:10:10';
							$loginDt=date('Y-m-d');
							$halfDay=$findShift->shift_duration/2 .' Hour';
							$shiftStartWithGrace=strtotime('+ 20 minutes',strtotime($findShift->shift_start));
							$attendanceTime=strtotime(date('H:i:s',strtotime($clockIn)));
							$loginTime=date('H:i:s',strtotime($clockIn));
							$isCheckHalf=strtotime('+ '.$halfDay,strtotime($findShift->shift_start));
							if($shiftStartWithGrace >= $attendanceTime){$workingPeriod='1';}
							else if(($shiftStartWithGrace <= $attendanceTime) && ($attendanceTime <= $isCheckHalf)){$workingPeriod='2';}else{$workingPeriod='3';}
							$mrkAttArr=array('attendance_status'=>$workingPeriod,'attendance_date'=>$loginDt,'log_in_time'=>$loginTime,'in_location'=>$location);
							$sysIP=$this->input->ip_address();
							$mrkPresent=array('employee_id'=>$logged,'staff_attendance_type_id'=>$workingPeriod,'attendance_date'=>$loginDt,'log_in_time'=>$loginTime,'in_location'=>$location,
											  'markIpAddress'=>$sysIP,'workFrm'=>'3','biometric_attendence'=>'0','biometric_device_data'=>'9999','remark'=>'Live Track Attendance','created_at'=>$loginDt);
						//	echo '<pre>';print_r($mrkAttArr);echo '<br>';print_r($mrkPresent);echo '</pre>';exit;				  		
							if($this->common->update_data('staff',array('id'=>$logged),$mrkAttArr))
							{
								$isAttendance=$this->common->get_data('staff_attendance',array('id'=>$logged,'attendance_date'=>date('Y-m-d')),'*');
								if(!$isAttendance)
								{
									if($this->common->save_data('staff_attendance', $mrkPresent))
									{
										$dateFrm=date('Y-m-01');$dateTo=date('Y-m-t');
		$isAtndnc=$this->db->select('count(*) as total')->from('staff_attendance')->where('employee_id',$isCheckUser['id'])->where('staff_attendance_type_id','1')->where('attendance_date >=',$dateFrm)->where('attendance_date <=',$dateTo)->get()->row();
		$tPresent=$isAtndnc->total?$isAtndnc->total:'0 Day';
										
										$workDuration='0 Hrs 0 Min 0 Sec';
										$todayCheckIn=date('d M Y',strtotime(date('Y-m-d'))).' | '.$loginTime;
										$return=array(
													  'adClass'=>'success','msg'=>'You have clock in successfully.',
													  'curTime'=>date('H:i:s'),
													  'location'=>'Pancicura Hotel Behind Town Hall',
													  'workPercent'=>'0',
													  'totalPresent'=>$tPresent,
													  'wrkFrm'=>'Others',
													  'workDur'=>$workDuration,
													  'clockInTime'=>$loginTime,
													  'workingDay'=>date("jS F Y"),
													  'todayCheckIn'=>$todayCheckIn,
													  'btnTyp'=>'outClock'
													  );
										}
									else{$return=array('adClass'=>'noLogged','msg'=>'Clock in process invalid');}
									}
									else{$return=array('adClass'=>'noLogged','msg'=>'Clock in process invalid');}
									
							  }else{$return=array('adClass'=>'noLogged','msg'=>'Clock in process invalid');}
							}
						}
					}
				else if($isCheckUser['attendance_date']==date('Y-m-d'))
				{
						 $clockOut=date('H:i:s');// $clockOut='01:00:00';
						 $logOut_time=($isCheckUser['log_in_time']?strtotime($clockOut):'0');
						 $logIn_time=($isCheckUser['log_in_time']?strtotime($isCheckUser['log_in_time']):'0');
						 $getTotalMinute=round(abs($logIn_time - $logOut_time)/60,2);
						 $workingHrs=round(($getTotalMinute/60),2);
						 $tHours=floor($getTotalMinute/60);
						 $tMinutes=round($getTotalMinute%60); 
						 $tSec=round(($getTotalMinute - floor($getTotalMinute)) * 60); 
						 $workDuration=$tHours.' Hrs '.$tMinutes.' Min '.$tSec.' Sec';
						 $todayCheckIn=$isCheckUser['log_in_time']?(date('d M Y',strtotime($isCheckUser['attendance_date'])).' | '.$isCheckUser['log_in_time']):'XX:XX:XX';
						 $workPercent=($workingHrs*100)/$findShift->shift_duration;
						 $btnTyp=$isCheckUser['log_in_time']?($isCheckUser['log_out_time']?'alreadyMarked':'outClock'):'inClock';
						 
						// echo $workingHrs.'<br>'; echo 'Total Hour ::'.$tHours.' Minutes ::'.$tMinutes.' Second ::'.$tSec; exit; 
					if(($mrkType=='outClock')&&($isCheckUser['log_out_time']==''))
					{
						 //$totalHours=floor($workingHrs);$totalMinutes=round(($workingHrs - $totalHours) * 60);  echo 'Total Hour ::'.$totalHours.' Minutes ::'.$totalMinutes;
						 // echo "Time ::".date('H:i:s')."  StrtTime ::".$logOut_time.'<br>';//echo "Time ::".$isCheckUser['log_in_time']."  StrtTime ::".$logIn_time.'<br>';
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
						 $toWorkingPreiodArr=array('log_out_time'=>$clockOut,'staff_attendance_type_id'=>$workingPeriod,'out_location'=>$location);
						 $mrkAttArr=array('log_out_time'=>$clockOut,'attendance_status'=>$workingPeriod,'out_location'=>$location);
						 if($this->common->update_data('staff_attendance',array('employee_id'=>$logged,'attendance_date'=>date('Y-m-d')),$toWorkingPreiodArr)) 
						 {
								if($this->common->update_data('staff',array('id'=>$logged),$mrkAttArr)) 
						 		{
									$return=array('adClass'=>'success','msg'=>'You have clock out successfully.','curTime'=>date('H:i:s'),'location'=>'Bhagwat Nagar, Patna','workPercent'=>$workPercent,'totalPresent'=>'6 Days',
									  			  'wrkFrm'=>'Work From Office','workDur'=>$workDuration,'clockInTime'=>$isCheckUser['log_in_time'],'workingDay'=>date("jS F Y"),'todayCheckIn'=>$todayCheckIn,'btnTyp'=>'alreadyMarked');
									}
									else{$return=array('adClass'=>'noLogged','msg'=>'Clock out process invalid');}
							}
							else{$return=array('adClass'=>'noLogged','msg'=>'Clock out process invalid');}
						}
					else if($mrkType=='inClock')
					{
							$return=array('adClass'=>'noLogged','msg'=>'No action will be taken.','curTime'=>date('H:i:s'),'location'=>'Bhagwat Nagar, Patna','workPercent'=>$workPercent,'totalPresent'=>'6 Days',
									      'wrkFrm'=>'Work From Office','workDur'=>$workDuration,'clockInTime'=>$isCheckUser['log_in_time'],'workingDay'=>date("jS F Y"),'todayCheckIn'=>$todayCheckIn,'btnTyp'=>$btnTyp);
						}	
					else
					{
						$return=array('adClass'=>'noLogged','msg'=>'Attendance completed. Logged out successfully.','curTime'=>date('H:i:s'),'location'=>'Bhagwat Nagar, Patna','workPercent'=>$workPercent,'totalPresent'=>'6 Days',
									  'wrkFrm'=>'Work From Office','workDur'=>$workDuration,'clockInTime'=>$isCheckUser['log_in_time'],'workingDay'=>date("jS F Y"),'todayCheckIn'=>$todayCheckIn,'btnTyp'=>'alreadyMarked');
					   }
					}
				else{$return=array('adClass'=>'error','msg'=>'Attendance has already been marked.');}
			}
			else{$return=array('adClass'=>'noLogged','msg'=>'The login ID does not exist.');}
          // echo json_encode($return);
			$this->output->set_content_type('application/json')->set_output(json_encode($return));
		}		
/*
		http://192.168.1.213/attendance/admin/api/getAttendance/5/37.4219983,-122.084/inClock
		http://192.168.1.213/attendance/admin/api/login/nik@gmail.com/111
*/
	public function more()
	{
		$data['title']='More';
		$this->load->view('admin/more_section',$data);
		}		
	public function holidays()
	{
		$return=array('holiday_name' => 'Christmas','holiday_date' => '2025-12-25','description'  => 'Celebration of Christmas.');
		echo json_encode($return);
		}
		
public function holiday_list($id)
{
	$isStatement=$this->db->select('*')->from('holidays')->where('status','1')->order_by('holiday_date', 'ASC')->get()->result();
	if($isStatement)
	{
		$isCheckUser=$this->common->get_data('staff',array('id'=>$id),'name,image,contact_no');
		$dataReturn=array();
		foreach($isStatement as $details)
		{
			$nHoliDy=date('Y').'-'.date('m-d',strtotime($details->holiday_date));
			if($nHoliDy >date('Y-m-d'))
			{
				$holidayDiff=abs(round((strtotime($details->holiday_date)-strtotime(date('Y-m-d')))/86400)); 
				if($holidayDiff=='1'){$nHdyLeft=$holidayDiff. ' day to left';}else{$nHdyLeft=$holidayDiff. ' days to left';}
			}else{$nHdyLeft='Completed';}
			$dataReturn[]=array('nday_left'=>$nHdyLeft,'holiday_title'=>$details->holiday_name,
								'holiday_date'=>date('d,F Y',strtotime($details->holiday_date)),
								'holiday_num'=>date('d',strtotime($details->holiday_date)),
								'holiday_mnth'=>date('M',strtotime($details->holiday_date)),
								'tnx_type'=>'credit');
			}
				$return=array('adClass'=>'success','statement'=>$dataReturn);
		}
		else{$return=array('adClass'=>'error');}
		echo json_encode($return);
	}
public function pay_slip($id)
{
	$prevMonth=date('m',strtotime('first day of last month'));
	$session=($prevMonth=='12')?(date('Y')-1):date('Y');
	$isStatement=$this->db->select('s.name,s.surname,designation_name,date_of_joining,empSl.month,year,bank_account_no,bank_name,amount,basic_sal,(hraAmt + taAmt + daAmt + paAmt) AS allowance,bonus,pfAmt,tdsAmt,grossAmt,empSl.created_date')->from('employee_salary as empSl')->where('empSl.employee_id',$id)->where('empSl.month',$prevMonth)->where('empSl.year',$session)->join('staff as s','s.id=empSl.employee_id','left')->join('designation as d','d.id=s.designation','left')->join('employee_salary_transaction as est','empSl.id=est.emp_sal_id','left')->get()->row();
	if(!$isStatement)
	{
		$memName=(($isStatement->surname!="")?($isStatement->surname.' '.$isStatement->name):$isStatement->name);
		$designation=$isStatement->designation_name;
		$date_of_join=($isStatement->date_of_joining?date('d F Y',strtotime($isStatement->date_of_joining)):'N/A');
		$pay_period=date('M', mktime(0, 0, 0,$isStatement->month, 1)).' '.$isStatement->year;
		$toBnk='Bank';
		$bnkName=$isStatement->bank_name;
		$accountNo=$isStatement->bank_account_no;
		$pay_date=($isStatement->created_date?date('d F Y',strtotime($isStatement->created_date)):'N/A');
		$basic_pay=$isStatement->basic_sal;
		$allowance=$isStatement->allowance;
		$bonus=$isStatement->bonus;
		$empPf=$isStatement->pfAmt;
		$empTds=$isStatement->tdsAmt;
		$grossWages=$isStatement->grossAmt;
		$grossDeduc=($isStatement->tdsAmt+$isStatement->pfAmt);
		$netPayble=$isStatement->amount;
		}
		else
		{
			$isStatement=$this->db->select('s.name,s.surname,designation_name,date_of_joining,bank_account_no,bank_name')->from('staff as s')->where('s.id',$id)->join('designation as d','d.id=s.designation','left')->get()->row();
			if(!$isStatement)
			{
				$memName=(($isStatement->surname!="")?($isStatement->surname.' '.$isStatement->name):$isStatement->name);
				$designation=$isStatement->designation_name;
				$date_of_join=($isStatement->date_of_joining?date('d F Y',strtotime($isStatement->date_of_joining)):'N/A');
				$pay_period=date('M', mktime(0, 0, 0,$isStatement->month, 1)).' '.$isStatement->year;
				$toBnk='';$bnkName='';$accountNo='';
				$pay_date='';$basic_pay='';$allowance='';$bonus='';
				$empPf='';$empTds='';$grossWages='';$grossDeduc='';$netPayble='';
				}
				else
				{
					$memName='';$designation='';$date_of_join='';$pay_period='';$toBnk='';$bnkName='';$accountNo='';
					$pay_date='';$basic_pay='';$allowance='';$bonus='';$empPf='';$empTds='';$grossWages='';$grossDeduc='';$netPayble='';
					}
			}
		
$return=array('adClass'=>'success',
		  'cmp_logo'=>base_url(config_item('logo_sm_light')),
		  'cmp_name'=>config_item('company_name'),
		  'cmp_addr'=>config_item('address'),
		  'memName'=>$memName,
		  'designation'=>$designation,
		  'date_of_join'=>$date_of_join,
		  'pay_period'=>$pay_period,
		  'creditedTo'=>$toBnk,
		  'bnkName'=>$bnkName,
		  'accountNo'=>$accountNo,
		  'pay_date'=>$pay_date,
		  'basic_pay'=>$basic_pay,
		  'allowance'=>$allowance,
		  'bonus'=>$bonus,
		  'empPf'=>$empPf,
		  'empTds'=>$empTds,
		  'grossWages'=>$grossWages,
		  'grossDeduc'=>$grossDeduc,
		  'netWadges'=>$netPayble,
		  'netPayble'=>'Total Net Payable: '.$netPayble);
		
		//echo '<pre>';print_r($return);echo '</pre>';
			
		echo json_encode($return);
	} 		 			
public function attendance_report($id)
{
	$dateFrm='2025-03-01';$dateTo='2025-03-31';
	$attYear=date('Y',strtotime($dateFrm));
		$isAttendance=$this->db->select('*')->from('staff_attendance')->where('employee_id',$id)->where('attendance_date >=',$dateFrm)->where('attendance_date <=',$dateTo)->order_by('attendance_date', 'ASC')->get()->result();
		/*echo $this->db->last_query();exit;*/
		if($isAttendance)
		{
			$dataReturn=array();
			foreach($isAttendance as $details)
			{
				if($details->staff_attendance_type_id==1){$attendance_status='Present';}
				elseif($details->staff_attendance_type_id==2){$attendance_status='Late';}
				elseif($details->staff_attendance_type_id==3){$attendance_status='Absent';} 
				elseif($details->staff_attendance_type_id==4){$attendance_status='Holiday';} 
				elseif ($details->staff_attendance_type_id==5){$attendance_status='Half Day';} 
				elseif ($details->staff_attendance_type_id==6){$attendance_status='On Leave';}
				else {$attendance_status = 'N/A';}	
				$logout=$details->log_out_time?$details->log_out_time:'N/A';
				$dataReturn[]=array('dateNum'=>date('d',strtotime($details->attendance_date)),'dateMnth'=>date('M',strtotime($details->attendance_date)),'punchIn'=>$details->log_in_time,'punchOut'=>$logout,'attType'=>$attendance_status);
				}
					$return=array('adClass'=>'success','attYear'=>$attYear,'attendance'=>$dataReturn);
			}
			else{$return=array('adClass'=>'error');}
				//echo '<pre>';print_r($return);echo '</pre>';				
			echo json_encode($return);
		} 
public function leave_request($id)
{
		$isLeaveRequest=$this->db->select("empLv.*,lvM.leave_name,CONCAT(IF(s.surname!='',s.surname,''),IF(s.surname!='' AND s.name !='',' ',''),s.name) AS empName")->from('employee_leave as empLv')->join('leave_manage as lvM', 'lvM.id=empLv.leave_type','left')->join('staff as s', 's.id=empLv.modified_by','left')->where('emp_id',$id)->get()->result();
		if($isLeaveRequest)
		{
			$dataReturn=array();
			foreach($isLeaveRequest as $details)
			{				
				$isAppr=($details->status=='1')?(($details->modified_by!=NULL)?$details->empName:'N/A'):'Processing...';
				
				$leaveDate=($details->total_leave!='1')?(date('M d',strtotime($details->from_date)).'-'.date('M d Y',strtotime($details->end_date))):date('d m Y',strtotime($details->from_date));
				$dataReturn[]=array(
									 'leaveStatus'=>$details->status,
									 'reason'=>$details->reason,
									 'leaveDate'=>$leaveDate,
									 'leave_type'=>$details->leave_name,
									 'isApprove'=>$isAppr
									 );
				}
			$return=array('adClass'=>'success','leave'=>$dataReturn);	
		/*	echo '<pre>';
			print_r($dataReturn);
			echo '</pre>';	
			exit;*/
		}	
	else
	{
		$return=array('adClass'=>'error');
		}		
	echo json_encode($return);
	}	
public function apply_leave($id,$leave_heading,$leave_reason,$leave_DtFrom,$leave_DtTo)
{
	$leave_heading=urldecode($leave_heading);
	$leave_reason=urldecode($leave_reason);
	$leave_DtFrom=urldecode($leave_DtFrom);
	$leave_DtTo=urldecode($leave_DtTo);
	$dateFrom=new DateTime($leave_DtFrom);
	$dateFrom=new DateTime($leave_DtFrom);
	$curDate=new DateTime(date('d-m-Y'));
	if($curDate >= $dateFrom)
	{
		 $return=array('adClass'=>'error','message'=>'Please provide valid date1');
		 } 
	else if($dateFrom<= $dateTo)
	{
		 $return=array('adClass'=>'error','message'=>'Please provide valid date');
		 } 
	else 
	{
		$isLeaveDetails=$this->db->select('id')->from('leave_manage')->where('leave_name',$leave_heading)->get()->row();
		$leaveTyp=$isLeaveDetails->id?$isLeaveDetails->id:'99';
		$totalLvDy=(abs(strtotime($leave_DtTo) - strtotime($leave_DtFrom)))/86400;
		$createLeaveArr=array('emp_id'=>$id,'leave_type'=>$leaveTyp,'total_leave'=>$totalLvDy,
							  'from_date'=>date('Y-m-d',strtotime($leave_DtFrom)),'end_date'=>date('Y-m-d',strtotime($leave_DtTo)),'reason'=>$leave_reason,'created_date'=>date('Y-m-d'),'created_by'=>$id);
		
		/*print_r($createLeaveArr);
		exit;
		
	*/	if($this->common->save_data('employee_leave', $createLeaveArr))
		{
			$return=array('adClass'=>'success','message'=>'Thank you successfully applied');
			}
			else
			{
				$return=array('adClass'=>'error','message'=>'while creating get an error');
				}
	}
	echo json_encode($return);	
	}	
public function apply_performance($id,$titleHead,$workDescription)
{
	$titleHead=urldecode($titleHead);
	$workDescription=urldecode($workDescription);
	$isFeedback=$this->db->select('*')->from('employee_feedback')->where('emp_id',$id)->where('created_date',date('Y-m-d'))->get()->row();
	if(!$isFeedback)
	{
		$createFeedback=array('emp_id'=>$id,'heading'=>$titleHead,'message'=>$workDescription,'created_date'=>date('Y-m-d'),'create_time'=>date('H:i:s'));
		if($this->common->save_data('employee_feedback', $createFeedback))
		{
			$return=array('adClass'=>'success','message'=>'Thank you successfully applied');
			}
			else
			{
				$return=array('adClass'=>'error','message'=>'while creating get an error');
				}
		}
	else
	{
		$return=array('adClass'=>'error','message'=>'You already applied feedback');
		}
	
	echo json_encode($return);	
	}
public function performance($id)
{
		$isPerforamnce=$this->db->select('*')->from('employee_feedback')->where('emp_id',$id)->get()->result();
		if($isPerforamnce)
		{
			$dataReturn=array();
			foreach($isPerforamnce as $details){$dataReturn[]=array('numDy'=>date('d',strtotime($details->created_date)),'dyMonth'=>date('M',strtotime($details->created_date)),'title'=>$details->heading,'description'=>$details->message);}
			$return=array('adClass'=>'success','perform'=>$dataReturn);	
		}	
	else
	{
		$return=array('adClass'=>'error');
		}		
	echo json_encode($return);
	}		
public function check_update()
{
	$response=array("latest_version"=>"2","apk_url" => base_url('downloads/attendance.apk'));
	$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}		
public function tickets($id)
{
		$isTickets=$this->db->select("tic.*,CONCAT(IF(s.surname!='',s.surname,''),IF(tl.surname!='' AND tl.name !='',' ',''),tl.name) AS tLeader")->from('tickets as tic')->where('tic.created_by',$id)->join('staff as s','tic.created_by=s.id','left')->join('staff as tl','s.is_team_leader=tl.id','left')->get()->result();//echo $this->db->last_query().'<br>';
		if($isTickets)
		{
			$dataReturn=array();
			foreach($isTickets as $details)
			{
				$conDesc=strip_tags($details->description);
				$desc=((strlen($conDesc)>20)?(substr($conDesc, 0, 20) . "..."):$conDesc);
				$dataReturn[]=array('ticketStatus'=>$details->status,'ticket_id'=>$details->ticket_id,'ticket_date'=>date('H:i a d-m-Y',strtotime($details->created_date)),
									'title'=>$details->subject,'description'=>$desc,'tLeader'=>($details->tLeader?$details->tLeader:"N/A"),'id'=>$details->id);
				}
			/*echo '<pre>'; print_r($dataReturn); echo '</pre>'; exit;*/
			$return=array('adClass'=>'success','message'=>'result is available','ticketList'=>$dataReturn);	
		}	
		else{$return=array('adClass'=>'error','message'=>"Oops! No Ticket Found.");}
		$this->output->set_content_type('application/json')->set_output(json_encode($return));		
	}	
public function create_ticket()
{
	if($this->input->server('REQUEST_METHOD')=='POST')
	{
		$config=array('upload_path'=>"uploads/ticket",'allowed_types'=>"gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF",'overwrite'=>FALSE,'encrypt_name'=>TRUE,'max_size'=>"10120000");
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('image'))
		{
			$response=array('status'=>'error','message'=>$this->upload->display_errors());
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
			return;
		} 
		else
		{
			$file_data = $this->upload->data();
			$image_path = 'uploads/ticket/' . $file_data['file_name'];
			$getCat=$this->common->getRowData('tickets_category','name',$this->input->post('tCategory'));
			$catID=$getCat?$getCat->id:'1';
			$ticket_id="TIC".(date("Ymd").rand(1000, 9999));
			$ticketData = array('ticket_id'=>$ticket_id,'subject' => $this->input->post('subject'),'description' => $this->input->post('tDescription'),
								'priority' => $this->input->post('tPriority'),'category_id' => $catID,'status'=>'Open','created_by'=>$this->input->post('memberID'),
								'ticket_img' => $image_path,'created_date'=>date('Y-m-d H:i:s'));
		    if($this->common->save_data('tickets', $ticketData)){$response=array('status'=>'success','message'=>'Ticket submitted successfully.');}
		    else{$response=array('status'=>'error','message'=>'Facing issue while creating ticket, please try again');}
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}
  }
public function track_location()
{
	//$getToken=base64_encode(json_encode(array('isAccessToken'=>'softArena','isGetCompany'=>'Camwel Solution LLP','isGetDeveloper'=>'Er. Amit Kumar')));
	//print_r($getToken);
	 $access_token = $this->input->get_request_header('X-Access-Token', TRUE);
     if(!$access_token)
	 {
	 	$response=array('status'=>'error','message'=>'Missing access token.');
		$this->output->set_status_header(400)->set_output(json_encode($response));
		return;
		}
	
	 $jsonDetails = file_get_contents('php://input');
     $post = json_decode($jsonDetails, true);
     if(json_last_error() !== JSON_ERROR_NONE)
	 {
		 $response=array('status'=>'error','message'=>'Invalid JSON.');
		 $this->output->set_status_header(400)->set_output(json_encode($response));
		 return;
        }

	$isAccess=array('tokenDetails'=>json_decode(base64_decode($access_token)));
	if($isAccess)
	{
		if($isAccess['tokenDetails']->isAccessToken=="softArena")
		{
			$location=$post['latitude'].','.$post['longitude'];
			$createArr=array('staff_id'=>$post['loggedId'],'location'=>$location,'timing'=>date('H:i:s'),'create_date'=>date('Y-m-d'));
			if($this->common->save_data('location_tracking_daily', $createArr)){$response=array('status'=>'success','message'=>'Data inserted successfully.');}
				else{$response=array('status'=>'error','message'=>'Data insert failed. Please try again.');}
			}
		    else{$response=array('status'=>'error','message'=>'Authentication failed. The access token is invalid or has expired.');}	
		}
		else{$response=array('status'=>'error','message'=>'Missing access token details.');}	
	  $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}  
  
  		 		
}









