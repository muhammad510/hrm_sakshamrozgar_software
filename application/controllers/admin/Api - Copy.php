<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		error_reporting(0);
		$this->load->helper('url');
		$this->load->model('admin/Attendance_model', 'attendance');
	}

	public function login($userMail, $userpass)
	{
		$isCheckUser = $this->common->get_data('staff', array('email' => $userMail, 'password' => md5($userpass)), '*');
		if ($isCheckUser) {
			$dateFrm = '2025-02-01';
			$dateTo = '2025-02-28';
			$isAtndnc = $this->db->select('count(*) as total')->from('staff_attendance')->where('employee_id', $isCheckUser['id'])->where('staff_attendance_type_id', '1')->where('attendance_date >=', $dateFrm)->where('attendance_date <=', $dateTo)->get()->row();
			$tPresent = $isAtndnc->total ? $isAtndnc->total : '0 Day';
			//print_r($tPresent);exit;
			$return = array(
				'adClass' => 'success',
				'memName' => (($isCheckUser['surname'] != "") ? ($isCheckUser['surname'] . ' ' . $isCheckUser['name']) : $isCheckUser['name']),
				'memUserId' => $isCheckUser['id'],
				'memEmailId' => $isCheckUser['email'],
				'loggedImg' => base_url($isCheckUser['image']),
				'curTime' => date('H:i:s'),
				'location' => 'XXXXX XXXXX,XXXXX',
				'workPercent' => '0',
				'totalPresent' => $tPresent,
				'wrkFrm' => 'XXXX XXXXX XXXXX',
				'workDur' => '00 Hrs 00 Min 00 Sec',
				'clockInTime' => ($isCheckUser['log_in_time'] ? $isCheckUser['log_in_time'] : 'XX:XX:XX'),
				'workingDay' => date("jS F Y"),
				'todayCheckIn' => 'XX:XX:XX',
				'btnTyp' => 'inClock'
			);
		} else {
			$return = array('adClass' => 'error');
		}
		//echo json_encode($return);	

		$this->output->set_content_type('application/json')->set_output(json_encode($return));
	}
	public function reset_password($userMail)
	{
		$isCheckUser = $this->common->get_data('staff', array('email' => $userMail), '*');
		if ($isCheckUser) {
			//$return=array('adClass'=>'success','msg'=>'Welcome to dashboard.','memName'=>$isCheckUser['name'],'memUserId'=>$isCheckUser['employee_id']);
			echo 'found';
		} else {
			//$return=array('adClass'=>'error','msg'=>'Oops there is no valid user details');
			echo 'Please input valid details.';
		}
		//echo json_encode($return);		
	}

	public function mini_statement($id)
	{
		$isStatement = $this->common->getDataListByLimitRecent('temp_mini_statement', 'agent_id', $id, '10');
		if ($isStatement) {
			$isCheckUser = $this->common->get_data('staff', array('id' => $id), 'name,image,contact_no');
			$dataReturn = array();
			foreach ($isStatement as $details) {
				$dataReturn[] = array(
					'tnx_details' => $details->tnx_details,
					'tnx_date' => date('H:ia d,M Y', strtotime($details->tnx_date)),
					'tnx_amount' => $details->tnx_amount,
					'tnx_type' => $details->tnx_type
				);
			}
			$return = array(
				'adClass' => 'success',
				'memName' => (($isCheckUser['surname'] != "") ? ($isCheckUser['surname'] . ' ' . $isCheckUser['name']) : $isCheckUser['name']),
				'loggedImg' => base_url($isCheckUser['image']),
				'memPhone' => $isCheckUser['contact_no'],
				'memAvailBal' => '5499.00',
				'todayTnxAmt' => '1199.00',
				'weeklyTnxAmt' => '1499.00',
				'statement' => $dataReturn
			);
		} else {
			$return = array('adClass' => 'error');
		}
		/*	echo '<pre>';
				print_r($return);
				echo '</pre>';*/
		echo json_encode($return);
	}
	public function agent_statement($id)
	{
		$isStatement = $this->common->getDataListByLimitRecent('agent_statement', 'agent_id', $id, '10');
		if ($isStatement) {
			$isCheckUser = $this->common->get_data('staff', array('id' => $id), 'name,image,contact_no');
			$dataReturn = array();
			foreach ($isStatement as $details) {
				$dataReturn[] = array(
					'tnx_details' => $details->tnx_details,
					'tnx_date' => date('H:ia d,M Y', strtotime($details->tnx_date)),
					'tnx_amount' => $details->tnx_amount,
					'tnx_type' => $details->tnx_type
				);
			}
			$return = array(
				'adClass' => 'success',
				'memName' => (($isCheckUser['surname'] != "") ? ($isCheckUser['surname'] . ' ' . $isCheckUser['name']) : $isCheckUser['name']),
				'loggedImg' => base_url($isCheckUser['image']),
				'memPhone' => $isCheckUser['contact_no'],
				'memAvailBal' => '5499.00',
				'todayTnxAmt' => '1199.00',
				'weeklyTnxAmt' => '1499.00',
				'statement' => $dataReturn
			);
		} else {
			$return = array('adClass' => 'error');
		}
		/*echo '<pre>';
				print_r($return);
				echo '</pre>';*/
		echo json_encode($return);
	}


	/*	public function getAttendance($logged,$location,$mrkType)
	{		
		$isCheckUser=$this->common->get_data('staff',array('id'=>$logged),'*');
		$getCurrentTym=date("h:i:s");//$getCurrentTym='14:00:00';
		if($isCheckUser)
		{
			$findShift=$this->attendance->shiftDetails($isCheckUser['id']);	
			if(($isCheckUser['attendance_date']!=date('Y-m-d'))&&($isCheckUser['log_in_time']==''))
			{
				//echo 'if condition';exit;
				if($findShift)
				{
					if((strtotime('- 30 minutes',$findShift->shift_start) < strtotime($getCurrentTym)) && (strtotime($getCurrentTym) < strtotime($findShift->shift_end)))
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
									$dateFrm='2025-02-01';$dateTo='2025-02-28';
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
				}
				else if(($isCheckUser['attendance_date']!=date('Y-m-d'))&&($isCheckUser['log_in_time']!=''))
				{
					//echo 'else if condition';exit;
					if($findShift)
					{
						if((strtotime('- 30 minutes',$findShift->shift_start) < strtotime(date("h:i:s a"))) && (strtotime(date("h:i:s a")) < strtotime($findShift->shift_end)))
						{
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
										$dateFrm='2025-02-01';$dateTo='2025-02-28';
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
						 $clockOut=date('H:i:s');
						// $clockOut='01:00:00';
						 $logOut_time=strtotime($clockOut);
						 $logIn_time = strtotime($isCheckUser['log_in_time']);
						 $getTotalMinute=round(abs($logIn_time - $logOut_time)/60,2);
						 $workingHrs=round(($getTotalMinute/60),2);
						 $tHours=floor($getTotalMinute/60);
						 $tMinutes=round($getTotalMinute%60); 
						 $tSec=round(($getTotalMinute - floor($getTotalMinute)) * 60); 
						 $workDuration=$tHours.' Hrs '.$tMinutes.' Min '.$tSec.' Sec';
						 $todayCheckIn=date('d M Y',strtotime($isCheckUser['attendance_date'])).' | '.$isCheckUser['log_in_time'];
						 $workPercent=($workingHrs*100)/$findShift->shift_duration;
						 
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
									  'wrkFrm'=>'Work From Office','workDur'=>$workDuration,'clockInTime'=>$isCheckUser['log_in_time'],'workingDay'=>date("jS F Y"),'todayCheckIn'=>$todayCheckIn,'btnTyp'=>'outClock');
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
        echo json_encode($return);
		}	*/

	/*
		http://192.168.1.213/attendance/admin/api/getAttendance/5/37.4219983,-122.084/inClock
		http://192.168.1.213/attendance/admin/api/login/nik@gmail.com/111
*/
	public function more()
	{
		$data['title'] = 'More';
		$this->load->view('admin/more_section', $data);
	}
	public function holidays()
	{
		$return = array('holiday_name' => 'Christmas', 'holiday_date' => '2025-12-25', 'description'  => 'Celebration of Christmas.');
		echo json_encode($return);
	}

	public function holiday_list($id)
	{
		$isStatement = $this->db->select('*')->from('holidays')->where('status', '1')->order_by('holiday_date', 'ASC')->get()->result();
		if ($isStatement) {
			$isCheckUser = $this->common->get_data('staff', array('id' => $id), 'name,image,contact_no');
			$dataReturn = array();
			foreach ($isStatement as $details) {
				$nHoliDy = date('Y') . '-' . date('m-d', strtotime($details->holiday_date));
				if ($nHoliDy > date('Y-m-d')) {
					$holidayDiff = abs(round((strtotime($details->holiday_date) - strtotime(date('Y-m-d'))) / 86400));
					if ($holidayDiff == '1') {
						$nHdyLeft = $holidayDiff . ' day to left';
					} else {
						$nHdyLeft = $holidayDiff . ' days to left';
					}
				} else {
					$nHdyLeft = 'Completed';
				}
				$dataReturn[] = array(
					'nday_left' => $nHdyLeft,
					'holiday_title' => $details->holiday_name,
					'holiday_date' => date('d,F Y', strtotime($details->holiday_date)),
					'holiday_num' => date('d', strtotime($details->holiday_date)),
					'holiday_mnth' => date('M', strtotime($details->holiday_date)),
					'tnx_type' => 'credit'
				);
			}
			$return = array('adClass' => 'success', 'statement' => $dataReturn);
		} else {
			$return = array('adClass' => 'error');
		}
		echo json_encode($return);
	}
	public function pay_slip($id)
	{
		$prevMonth = date('m', strtotime('first day of last month'));
		$session = ($prevMonth == '12') ? (date('Y') - 1) : date('Y');
		$isStatement = $this->db->select('s.name,s.surname,designation_name,date_of_joining,empSl.month,year,bank_account_no,bank_name,amount,basic_sal,(hraAmt + taAmt + daAmt + paAmt) AS allowance,bonus,pfAmt,tdsAmt,grossAmt,empSl.created_date')->from('employee_salary as empSl')->where('empSl.employee_id', $id)->where('empSl.month', $prevMonth)->where('empSl.year', $session)->join('staff as s', 's.id=empSl.employee_id', 'left')->join('designation as d', 'd.id=s.designation', 'left')->join('employee_salary_transaction as est', 'empSl.id=est.emp_sal_id', 'left')->get()->row();
		if (!$isStatement) {
			$memName = (($isStatement->surname != "") ? ($isStatement->surname . ' ' . $isStatement->name) : $isStatement->name);
			$designation = $isStatement->designation_name;
			$date_of_join = ($isStatement->date_of_joining ? date('d F Y', strtotime($isStatement->date_of_joining)) : 'N/A');
			$pay_period = date('M', mktime(0, 0, 0, $isStatement->month, 1)) . ' ' . $isStatement->year;
			$toBnk = 'Bank';
			$bnkName = $isStatement->bank_name;
			$accountNo = $isStatement->bank_account_no;
			$pay_date = ($isStatement->created_date ? date('d F Y', strtotime($isStatement->created_date)) : 'N/A');
			$basic_pay = $isStatement->basic_sal;
			$allowance = $isStatement->allowance;
			$bonus = $isStatement->bonus;
			$empPf = $isStatement->pfAmt;
			$empTds = $isStatement->tdsAmt;
			$grossWages = $isStatement->grossAmt;
			$grossDeduc = ($isStatement->tdsAmt + $isStatement->pfAmt);
			$netPayble = $isStatement->amount;
		} else {
			$isStatement = $this->db->select('s.name,s.surname,designation_name,date_of_joining,bank_account_no,bank_name')->from('staff as s')->where('s.id', $id)->join('designation as d', 'd.id=s.designation', 'left')->get()->row();
			if (!$isStatement) {
				$memName = (($isStatement->surname != "") ? ($isStatement->surname . ' ' . $isStatement->name) : $isStatement->name);
				$designation = $isStatement->designation_name;
				$date_of_join = ($isStatement->date_of_joining ? date('d F Y', strtotime($isStatement->date_of_joining)) : 'N/A');
				$pay_period = date('M', mktime(0, 0, 0, $isStatement->month, 1)) . ' ' . $isStatement->year;
				$toBnk = '';
				$bnkName = '';
				$accountNo = '';
				$pay_date = '';
				$basic_pay = '';
				$allowance = '';
				$bonus = '';
				$empPf = '';
				$empTds = '';
				$grossWages = '';
				$grossDeduc = '';
				$netPayble = '';
			} else {
				$memName = '';
				$designation = '';
				$date_of_join = '';
				$pay_period = '';
				$toBnk = '';
				$bnkName = '';
				$accountNo = '';
				$pay_date = '';
				$basic_pay = '';
				$allowance = '';
				$bonus = '';
				$empPf = '';
				$empTds = '';
				$grossWages = '';
				$grossDeduc = '';
				$netPayble = '';
			}
		}

		$return = array(
			'adClass' => 'success',
			'cmp_logo' => base_url(system_info('logo')),
			'cmp_name' => system_info('company_name'),
			'cmp_addr' => system_info('company_address'),
			'memName' => $memName,
			'designation' => $designation,
			'date_of_join' => $date_of_join,
			'pay_period' => $pay_period,
			'creditedTo' => $toBnk,
			'bnkName' => $bnkName,
			'accountNo' => $accountNo,
			'pay_date' => $pay_date,
			'basic_pay' => $basic_pay,
			'allowance' => $allowance,
			'bonus' => $bonus,
			'empPf' => $empPf,
			'empTds' => $empTds,
			'grossWages' => $grossWages,
			'grossDeduc' => $grossDeduc,
			'netWadges' => $netPayble,
			'netPayble' => 'Total Net Payable: ' . $netPayble
		);

		//echo '<pre>';print_r($return);echo '</pre>';

		echo json_encode($return);
	}
	public function attendance_report($id)
	{
		$dateFrm = '2025-01-01';
		$dateTo = '2025-01-31';
		$attYear = date('Y', strtotime($dateFrm));
		$isAttendance = $this->db->select('*')->from('staff_attendance')->where('employee_id', $id)->where('attendance_date >=', $dateFrm)->where('attendance_date <=', $dateTo)->order_by('attendance_date', 'ASC')->get()->result();
		/*echo $this->db->last_query();exit;*/
		if ($isAttendance) {
			$dataReturn = array();
			foreach ($isAttendance as $details) {
				if ($details->staff_attendance_type_id == 1) {
					$attendance_status = 'Present';
				} elseif ($details->staff_attendance_type_id == 2) {
					$attendance_status = 'Late';
				} elseif ($details->staff_attendance_type_id == 3) {
					$attendance_status = 'Absent';
				} elseif ($details->staff_attendance_type_id == 4) {
					$attendance_status = 'Holiday';
				} elseif ($details->staff_attendance_type_id == 5) {
					$attendance_status = 'Half Day';
				} elseif ($details->staff_attendance_type_id == 6) {
					$attendance_status = 'On Leave';
				} else {
					$attendance_status = 'N/A';
				}
				$logout = $details->log_out_time ? $details->log_out_time : 'N/A';
				$dataReturn[] = array('dateNum' => date('d', strtotime($details->attendance_date)), 'dateMnth' => date('M', strtotime($details->attendance_date)), 'punchIn' => $details->log_in_time, 'punchOut' => $logout, 'attType' => $attendance_status);
			}
			$return = array('adClass' => 'success', 'attYear' => $attYear, 'attendance' => $dataReturn);
		} else {
			$return = array('adClass' => 'error');
		}
		//echo '<pre>';print_r($return);echo '</pre>';				
		echo json_encode($return);
	}
	public function leave_request($id)
	{
		$isLeaveRequest = $this->db->select('*')->from('employee_leave')->where('emp_id', $id)->get()->result();
		if ($isLeaveRequest) {
			$dataReturn = array();
			foreach ($isLeaveRequest as $details) {

				$dataReturn[] = array(
					'leaveStatus' => $details->status,
					'reason' => $details->reason,
					'leaveDate' => 'Jan 2- Jan 10 2025',
					'isApprove' => 'Pending Approval',
					'leave_type' => 'Sick Leave',
					'isApprove' => 'Arav Singh'
				);
			}
			$return = array('adClass' => 'success', 'leave' => $dataReturn);
			/*echo '<pre>';
			print_r($dataReturn);
			echo '</pre>';	*/
		} else {
			$return = array('adClass' => 'error');
		}
		echo json_encode($return);
	}
	public function apply_leave($id, $leave_heading, $leave_reason, $leave_DtFrom, $leave_DtTo)
	{
		$leave_heading = urldecode($leave_heading);
		$leave_reason = urldecode($leave_reason);
		$leave_DtFrom = urldecode($leave_DtFrom);
		$leave_DtTo = urldecode($leave_DtTo);
		$dateFrom = new DateTime($leave_DtFrom);
		$dateFrom = new DateTime($leave_DtFrom);
		$curDate = new DateTime(date('d-m-Y'));
		if ($curDate >= $dateFrom) {
			$return = array('adClass' => 'error', 'message' => 'Please provide valid date1');
		} else if ($dateFrom <= $dateTo) {
			$return = array('adClass' => 'error', 'message' => 'Please provide valid date');
		} else {
			$isLeaveDetails = $this->db->select('id')->from('leave_manage')->where('leave_name', $leave_heading)->get()->row();
			$leaveTyp = $isLeaveDetails->id ? $isLeaveDetails->id : '99';
			$createLeaveArr = array('emp_id' => $id, 'leave_type' => $leaveTyp, 'from_date' => $leave_DtFrom, 'end_date' => $leave_DtTo, 'reason' => $leave_reason);
			if ($this->common->save_data('employee_leave', $createLeaveArr)) {
				$return = array('adClass' => 'success', 'message' => 'Thank you successfully applied');
			} else {
				$return = array('adClass' => 'error', 'message' => 'while creating get an error');
			}
		}
		echo json_encode($return);
	}
	public function apply_performance($id, $titleHead, $workDescription)
	{
		$titleHead = urldecode($titleHead);
		$workDescription = urldecode($workDescription);
		$isFeedback = $this->db->select('*')->from('employee_feedback')->where('emp_id', $id)->where('created_date', date('Y-m-d'))->get()->row();
		if (!$isFeedback) {
			$createFeedback = array('emp_id' => $id, 'heading' => $titleHead, 'message' => $workDescription, 'created_date' => date('Y-m-d'), 'create_time' => date('H:i:s'));
			if ($this->common->save_data('employee_feedback', $createFeedback)) {
				$return = array('adClass' => 'success', 'message' => 'Thank you successfully applied');
			} else {
				$return = array('adClass' => 'error', 'message' => 'while creating get an error');
			}
		} else {
			$return = array('adClass' => 'error', 'message' => 'You already applied feedback');
		}

		echo json_encode($return);
	}
	public function performance($id)
	{
		$isPerforamnce = $this->db->select('*')->from('employee_feedback')->where('emp_id', $id)->get()->result();
		if ($isPerforamnce) {
			$dataReturn = array();
			foreach ($isPerforamnce as $details) {
				$dataReturn[] = array('numDy' => date('d', strtotime($details->created_date)), 'dyMonth' => date('M', strtotime($details->created_date)), 'title' => $details->heading, 'description' => $details->message);
			}
			$return = array('adClass' => 'success', 'perform' => $dataReturn);
		} else {
			$return = array('adClass' => 'error');
		}
		echo json_encode($return);
	}
	public function check_update()
	{
		$response = array("latest_version" => "1.0", "apk_url" => base_url('downloads/attendance.apk'));
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	public function isAttendance($id)
	{
		$isCheckUser = $this->common->get_data('staff', array('id' => $id), '*');
		if ($isCheckUser) {
			$findShift = $this->attendance->shiftDetails($isCheckUser['id']);
			$dateFrm = '2025-02-01';
			$dateTo = '2025-02-28';
			$isAtndnc = $this->db->select('count(*) as total')->from('staff_attendance')->where('employee_id', $isCheckUser['id'])->where('staff_attendance_type_id', '1')->where('attendance_date >=', $dateFrm)->where('attendance_date <=', $dateTo)->get()->row();
			$tPresent = $isAtndnc->total ? $isAtndnc->total : '0 Day';
			if ($isCheckUser['attendance_date'] != date('Y-m-d')) {
				$mrkAttArr = array('attendance_status' => '0', 'attendance_date' => NULL, 'log_in_time' => NULL, 'in_location' => NULL, 'log_out_time' => NULL, 'out_location' => NULL);
				if ($this->common->update_data('staff', array('id' => $id), $mrkAttArr)) {
					$return = array(
						'adClass' => 'success',
						'memName' => (($isCheckUser['surname'] != "") ? ($isCheckUser['surname'] . ' ' . $isCheckUser['name']) : $isCheckUser['name']),
						'memUserId' => $id,
						'memEmailId' => $isCheckUser['email'],
						'loggedImg' => base_url($isCheckUser['image']),
						'curTime' => date('H:i:s'),
						'location' => 'XXXXX XXXXX,XXXXX',
						'workPercent' => '0',
						'totalPresent' => $tPresent,
						'wrkFrm' => 'XXXX XXXXX XXXXX',
						'workDur' => '00 Hrs 00 Min 00 Sec',
						'clockInTime' => ($isCheckUser['log_in_time'] ? $isCheckUser['log_in_time'] : 'XX:XX:XX'),
						'workingDay' => date("jS F Y"),
						'todayCheckIn' => 'XX:XX:XX',
						'btnTyp' => 'inClock'
					);
				} else {
					$return = array('adClass' => 'error', 'msg' => 'Please try agian to fetch detail.');
				}
			} else {
				$isWorked = $this->common->get_data('staff_attendance', array('employee_id' => $id, 'attendance_date' => date('Y-m-d')), '*');
				$btnTyp = $isCheckUser['log_out_time'] ? 'alreadyMarked' : 'outClock';
				$clockOut = date('H:i:s');
				$logOut_time = strtotime($clockOut);
				$logIn_time = strtotime($isCheckUser['log_in_time']);
				$getTotalMinute = round(abs($logIn_time - $logOut_time) / 60, 2);
				$workingHrs = round(($getTotalMinute / 60), 2);
				$tHours = floor($getTotalMinute / 60);
				$tMinutes = round($getTotalMinute % 60);
				$tSec = round(($getTotalMinute - floor($getTotalMinute)) * 60);
				$workDuration = $tHours . ' Hrs ' . $tMinutes . ' Min ' . $tSec . ' Sec';
				$todayCheckIn = date('d M Y', strtotime($isCheckUser['attendance_date'])) . ' | ' . $isCheckUser['log_in_time'];
				$workPercent = ($workingHrs * 100) / $findShift->shift_duration;
				$work = array('1' => 'Work From Office', '2' => 'Work From Home', '3' => 'Others');
				$wrkFrm = $isWorked ? $work[$isWorked['workFrm']] : 'Work From Office';
				$return = array(
					'adClass' => 'success',
					'curTime' => date('H:i:s'),
					'location' => 'Pancicura Hotel Behind Town Hall',
					'workPercent' => $workPercent,
					'totalPresent' => $tPresent,
					'wrkFrm' => $wrkFrm,
					'workDur' => $workDuration,
					'clockInTime' => $isCheckUser['log_in_time'],
					'workingDay' => date("jS F Y"),
					'todayCheckIn' => $todayCheckIn,
					'btnTyp' => $btnTyp
				);
			}
		} else {
			$return = array('adClass' => 'error', 'msg' => 'The login ID does not exist.');
		}
		// print_r($return);
		$this->output->set_content_type('application/json')->set_output(json_encode($return));
	}
}
