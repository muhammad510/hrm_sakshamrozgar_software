<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('employee/Dashboard_model'=>'dashboard','employee/staff_model'=>'staff'));
		($this->session->userdata('mim_id') == '') ? redirect(base_url(), 'refresh') : '';
		$this->logId=$this->session->userdata('mim_id');
		 error_reporting(0);
		// ==========start=================================
		# cheking today attendance taken or not if not taken then this piece of code run 
		###########################################################################
		$at_date=$this->db->select('attendance_date')->from('staff')->where('attendance_date <',date('Y-m-d'))->get()->result();  
		if($at_date)
		{
			$dat=array('attendance_date' =>NULL,'attendance_status' =>0,'log_in_time'=>'','log_out_time'=>'');
			$this->common->update_data('staff',array('attendance_date <'=>date('Y-m-d')),$dat);
			$findShift=$this->staff->shiftDetails($this->logId);
			if($findShift)
			{
				$whereCnFrEmp=array('employee_id'=>$this->logId,'attendance_date <'=>date('Y-m-d'),'log_out_time'=>'');
				$prevShiftOff=array('log_out_time'=>date('h:i:s a',strtotime($findShift->shift_end)));
				$this->dashboard->shiftOff('staff_attendance',$whereCnFrEmp,$prevShiftOff);
				}
			
		  }
		// =========================end=======================================

		
	}

	public function index()
	{
		$empUpComingBdy=NULL;
		$data['title']         = 'Dashboard Panel';
		$data['breadcrums']    = 'Dashboard Panel';
		$data['markPresentAction']=base_url('employee/dashboard/markAttendance');
		$getAttendance=$this->common->get_data('staff',array('id'=>$this->logId),'log_in_time,log_out_time');
		
		
		$empUpComingBdy=$this->dashboard->upcoming_birthday($this->logId);
		$leaveManage=$this->common->all_data_con('leave_manage',array('status'=>'1'),'*');
		$data['thisMonthHoliday']=$this->getHolidaysThisMonth();
		$data['empUpComingBdy']=$empUpComingBdy;
		$data['aplyForLeave']=base_url('employee/dashboard/applyForLeave');
		$data['leaveManage']=$leaveManage;
		$data['getAttendance']=$getAttendance;
		//$data['layout'] = "basic/dashboard.php";
		$id = $this->session->userdata('mim_id');
		$data['employee'] = $this->dashboard->employee_all_data($id);
		$this->load->view('employee/dashboard', $data);
	}
/**************************************@mit Start********************************************************/
public function applyForLeave()
{
		$post = $this->input->post();
		
		$this->form_validation->set_rules('leavePattern', 'leave mode', 'required');
		$this->form_validation->set_rules('leaveType', 'leave type', 'required');
		$this->form_validation->set_rules('frmDate', 'leave date', 'required');
		if($post['leavePattern']=='2')
		{
			$this->form_validation->set_rules('toDate', 'to date', 'required');
			}
		
		$this->form_validation->set_rules('reasonFrLeave', 'reason for leave', 'required');
		if($this->form_validation->run() == TRUE) {
		  
		  		$leaveArr = array(
								'shift_name'              => $add['shift_name'],
								'shift_duration'          => $add['shift_duration'],
								'shift_start'             => $shift_start,
								'shift_end'               => $shift_end,
								'created_by_user_type_id' => $this->session->userdata('mim_id'),
								'created_at'              => date('Y-m-d'),
							);

				
				
				 /*
			
			$this->common->save_data('shift_manage', $shift);*/
			$data=array('addClas'=>'tst_success','msg'=>'Thank You! you have successfully appllied for leave ','icon'=>'<i class="ti-check-box"></i>');

		} else {

			
				
			$msg = array(
						  'leavePattern'=>form_error('leavePattern'),
						  'leaveType'=>form_error('leaveType'),
						  'frmDate'=>form_error('frmDate'),
						  'reasonFrLeave'=>form_error('reasonFrLeave')
						  );
			if($post['leavePattern']=='2'){$msg['toDate']=form_error('toDate');}			  
			$data=array('addClas' => 'tst_danger', 'msg' => $msg, 'icon' => '<i class="fe fe-settings bx-spin"></i>');
		}
		echo json_encode($data);
        
	
	
	}


public function getHolidaysThisMonth()
{ 
    $crntMnthYr=date('Y-m')."-";
	$isHolidayThisMonth=$this->dashboard->upcoming_holiday('temp_holidays',$crntMnthYr);
	if(count($isHolidayThisMonth)==0)
	{
		   $this->common->del_data_multi_con('temp_holidays',array('holiday_date <'=>$crntMnthYr.'01'));
		   $upComingHoliday=$this->dashboard->upcoming_holiday('holidays',$crntMnthYr);
		   $fDMonth=$crntMnthYr.'01';
		   $first_day=date('N',strtotime($fDMonth));
		   $first_day=7 - $first_day + 1;
		   $last_day=date('t',strtotime($fDMonth));
		   $days=array();
		   for($i=$first_day; $i<=$last_day;$i=$i+7)
		   {if($i<=9){$i='0'.$i;}else{$i=$i;}$days[] = array('holiday_name'=>'Office Off','holiday_date'=>$crntMnthYr.$i,'description'=>'Sunday','created_at'=>date('Y-m-d'));}
			$isResultExit=array_merge($upComingHoliday,$days);if($isResultExit){foreach($isResultExit as $isHday){$this->common->save_data('temp_holidays',$isHday);}}
		}
		else{$isResultExit=$isHolidayThisMonth;}
      return $isResultExit;
   
}



public function markAttendance()
{
	    //echo $this->input->ip_address();echo'<br>';
		$post=$this->input->post();$findShift=NULL;$btnChngeArr=array();
		$findShift=$this->staff->shiftDetails($this->logId);
		//print_r($findShift);exit;
		if($findShift)
		{
			if($post['arAction']=='mrkPresentIn')
			{
				if(strtotime('- 30 minutes',strtotime($findShift->shift_start)) < strtotime(date("h:i:s a")))
			    {	
					$shiftDuration=explode(' ',$findShift->shift_duration);
					$halfDay=$shiftDuration[0]/2 .' '.$shiftDuration[1];
					$shiftStartWithGrace=strtotime('+ 20 minutes',strtotime($findShift->shift_start));
					$attendanceTime=strtotime($post['miClock']);
					$isCheckHalf=strtotime('+ '.$halfDay,strtotime($findShift->shift_start));
					if($shiftStartWithGrace >= $attendanceTime){$workingPeriod='1';}
					else if(($shiftStartWithGrace <= $attendanceTime) && ($attendanceTime <= $isCheckHalf)){$workingPeriod='2';}else{$workingPeriod='3';}
					if($post['arAction']=='mrkPresentIn')
					{
						$mrkAttArr=array('attendance_status'=>$workingPeriod,'attendance_date'=>date('Y-m-d'),'log_in_time'=>$post['miClock'],'in_location'=>$post['getPosition']);
						}
					if($post['arAction']=='mrkPresentOut')
					{
						$mrkAttArr=array('log_out_time'=>$post['miClock'],'out_location'=>$post['getPosition']);
						}	
					$sysIP=$this->input->ip_address();if($post['workFrm']){$wrkFrm=$post['workFrm'];}else{$wrkFrm='1';}
					if($post['attRemarks']){$remark=$post['attRemarks'];}else{$remark=NULL;}
					$mrkPresent=array('employee_id'=>$this->logId,'staff_attendance_type_id'=>$workingPeriod,'attendance_date'=>date('Y-m-d'),
									  'log_in_time'=>$post['miClock'],'markIpAddress'=>$sysIP,'workFrm'=>$wrkFrm,'remark'=>$remark,
									  'in_location'=>$post['getPosition'],'created_at'=>date('Y-m-d'));
						
						
						if($post['workFrm']=='0')
						{
							$nBtnID='mrkPresentIn';$nBtnTxt='<i class="fe fe-sunrise"></i> Clock In';
							$resultCls='alert-warning';$icon='<i class="fe fe-settings bx-spin"></i>';
							$msg='Please input details for working place';
							$rmvCls='alert-success alert-danger';
							}
							/*else if(($post['workFrm']=='0') && ($post['attRemarks']==NULL)) 
							{
								$nBtnID='mrkPresentIn';$nBtnTxt='<i class="fe fe-sunrise"></i> Clock In';
								$resultCls='alert-warning';$icon='<i class="fe fe-settings bx-spin"></i>';
								if($post['workFrm']=='0'){$errMsg='Please input details for working';}else{$errMsg='Please input remarks details';}
								
								$msg=array($errMsg);
								}*/
							else
							{
							/*print_r($shiftStartWithGrace);
							echo '<br><br><br>';
							print_r($mrkPresent);
							exit;*/
							$isAlreadyExist=$this->common->get_data('staff_attendance',array('employee_id'=>$this->logId,'attendance_date'=>date('Y-m-d')),'*');
							if(!$isAlreadyExist)
							{
								
								
								$sftResult=$this->common->update_data('staff',array('id'=>$this->logId),$mrkAttArr);
								//$sftResult=1;
								if($sftResult)
								{
									/*print_r($mrkPresent);
									exit;*/
								
									$stfAttenResult=$this->common->save_data('staff_attendance',$mrkPresent);
									//$stfAttenResult=1;
									if($stfAttenResult)
									{
										$nBtnID='mrkPresentOut';$nBtnTxt='<i class="fe fe-sunset"></i> Punch Out';
										$msg='Thank You! you have successfully make you appearance.';
										$resultCls='alert-success';$icon='<i class="ti-check-box"></i>';
										$rmvCls='alert-warning alert-danger';
									}
								}
							 }
							 else
							  {
								$nBtnID='mrkPresentIn';$nBtnTxt='<i class="fe fe-sunrise"></i> Punch In';
								$resultCls='alert-danger';$icon='<i class="fe fe-settings bx-spin"></i>';
								$rmvCls='alert-success alert-warning';
								$msg='You have already mark your attendance'; 
								
								}	
						}			
					}
					else
					{
						$nBtnID='mrkPresentIn';$nBtnTxt='<i class="fe fe-sunrise"></i> Punch In';
						$resultCls='alert-warning';$icon='<i class="fe fe-settings bx-spin"></i>';$rmvCls='alert-success alert-danger';
						$msg='Oops your shift in between '.$findShift->shift_start.' to '.$findShift->shift_end;
						
						}
						array_push($btnChngeArr['arvResult']=$resultCls,$btnChngeArr['msg']=$msg,$btnChngeArr['icon']=$icon,$btnChngeArr['rmvCls']=$rmvCls);	
					}
								
			}
			else
			{
				$nBtnID='mrkPresentIn';$nBtnTxt='<i class="fe fe-sunrise"></i> Punch In';
				$msg='Oops it seems you are not eligible for making attendance. Please contact to Super Admin.';
				$resultCls='alert-danger';$rmvCls='alert-success alert-warning';
				$icon='<i class="fe fe-settings bx-spin"></i>';
				}
	 		 array_push($btnChngeArr['nBtnID']=$nBtnID,$btnChngeArr['nBtnTxt']=$nBtnTxt);
		     echo json_encode($btnChngeArr);
	}

/**************************************@mit End********************************************************/
public function shiftOff()
{
	$ifShifExist=$this->staff->shiftDetails($this->logId);
	if($ifShifExist)
	{		
		if(strtotime($ifShifExist->shift_end) < strtotime(date("h:i:s a")))
		{
			$whereCon=array('employee_id'=>$this->logId,'attendance_date'=>date('Y-m-d'));
			$getTodayAttendance=$this->common->get_data('staff_attendance',$whereCon,'log_in_time,log_out_time,staff_attendance_type_id,attendance_date');
			$logOut_time=strtotime($ifShifExist->shift_end);
			$logIn_time = strtotime($getTodayAttendance['log_in_time']);
			$getTotalMinute=round(abs($logIn_time - $logOut_time)/60,2);
			$workingHrs=round(($getTotalMinute/60),2);
			if($ifShifExist)
			{
				$duration=$ifShifExist->shift_duration;
				if(($workingHrs > $duration/2) &&($workingHrs < $duration))
				{
					if(($workingHrs > $duration/2) &&($workingHrs > $duration*0.9)){$workingPeriod='1';}
					else if(($workingHrs > $duration*.75) &&($workingHrs < $duration*0.9)){$workingPeriod='2';}	else{$workingPeriod='5';}
					}
				else if($workingHrs > $duration){$workingPeriod='1';}	
				else if($workingHrs==$duration){$workingPeriod='1';}	
				else{$workingPeriod='3';}
				}	
				 $toWorkingPreiodArr=array('log_out_time'=>$ifShifExist->shift_end,'staff_attendance_type_id'=>$workingPeriod);
				 $mrkAttArr=array('log_out_time'=>$ifShifExist->shift_end,'attendance_status'=>$workingPeriod);
				 if($this->common->update_data('staff_attendance',$whereCon,$toWorkingPreiodArr)) 
				 {$this->common->update_data('staff',array('id'=>$this->logId),$mrkAttArr);}
			}
		}
	
	}






	public function mark_attendence()
	{

		$inp = $this->input->post();
		$emp_shift = $this->dashboard->employee_shift($inp['id']);
		$shift_start = $emp_shift->shift_start;
		$grace_period=$emp_shift->grace_periods;
		$shift_duration = $emp_shift->shift_duration;
		if ($this->input->post('attendance_status') == 1) {
			$log_in          = "";
			$attendance_date = "";
		} else {
			$attendance_date = date('Y-m-d', strtotime($inp['attendance_date_time']));
			$log_in  = date('h:i a ', strtotime($inp['attendance_date_time']));
		}

		// my function start
		$log_inn = $log_in;
		$logtime = date('H:i:s', strtotime($log_inn));
		$working = $shift_duration;                        //in houres
		$grace_minute = $grace_period;                               //in minutes
		$shift_start = date('H:i:s', strtotime($shift_start));

		// Calculate the time difference in seconds
		$timeDifferenceInSeconds = strtotime($logtime) - strtotime($shift_start);
		$p_s =  ($timeDifferenceInSeconds / ($working * 3600)) * 100;

		if ($logtime <= date('H:i:s', strtotime($shift_start) + $grace_minute * 60)) {
			$attendance_status = 1;
			echo "ontime<br>";
			echo " shift_start " . $shift_start . " log_in " . $log_inn . " <br> ";
		} elseif ($logtime > strtotime($shift_start + $grace_minute * 60) && $p_s <= 25) {
			$attendance_status = 2;
			echo date('H:i', strtotime($shift_start) + 1 * 60 * 60) . "<br>";
			echo "late<br>";
			echo " shift_start " . $shift_start . " log_in " . $log_inn . " <br> ";
		} elseif ($p_s > 25 && $p_s <= 50) {
			$attendance_status = 5;
			echo date('H:i', strtotime($shift_start) + 1 * 60 * 60) . "<br>";
			echo "half day<br>";
			echo "shift_start" . $shift_start . "log_in" . $log_inn . "<br>";
		} else {
			$attendance_status = 3;
			echo "absent<br>";
			echo "shift_start " . $shift_start . " log_in " . $log_inn . " <br> ";
		}
		// my function end

		// updating staff table in database start
		$mark = array(
			'attendance_status' => $attendance_status,
			'attendance_date'   => $attendance_date,
			'log_in_time'       => $log_in,

		);

		$this->common->update_data('staff', array('id' => $inp['id']), $mark);
		// updating staff table in database end

		// cheking today attendance record exist in table or not start
		$att = $this->common->get_data('staff_attendance', array('employee_id' => $inp['id'], 'attendance_date' => $attendance_date), '*');

		if (empty($att)) {
			$attendance = array(
				'employee_id'        => $inp['id'],
				'staff_attendance_type_id'  => $attendance_status,
				'attendance_date'    => $attendance_date,
				'log_in_time'        => $log_in,
				'created_at'         => date('Y-m-d'),
			);
			$this->common->save_data('staff_attendance', $attendance);
		} else {
			$attendance = array(
				'staff_attendance_type_id'  => $attendance_status,
				'attendance_date'    => $attendance_date,
				'log_in_time'        => $log_in,
			);
			$this->common->update_data('staff_attendance', array('employee_id' => $inp['id']), $attendance);
		}

		// cheking today attendance record exist in table or not start


		$data = array('addClas' => 'tst_success', 'msg' => array('Attendance Marked Successfully!'), 'icon' => '<i class="ti-check-box"></i>');
		echo json_encode($data);
	}




	public function logout_attendence()
	{

		$inp = $this->input->post();


		$log_out  = date('h:i a ', strtotime($inp['attendance_date_time']));

		$mark = array(
			'log_out_time'      => $log_out,
		);
		$this->common->update_data('staff', array('id' => $inp['id']), $mark);

		$emp = $this->common->get_data('staff', array('id' => $inp['id']), 'id,log_in_time,log_out_time');


		// my code start here
		$emp_shift = $this->dashboard->employee_shift($inp['id']);
		$shift_duration = $emp_shift->shift_duration;
		$login = date("H:i:s", strtotime($emp['log_in_time']));
		$logout = date("H:i:s", strtotime($emp['log_out_time']));
		$working = $shift_duration * 3600;
		$loginTimestamp = strtotime($login);
		$logoutTimestamp = strtotime($logout);
		$actualWorkingHour = $logoutTimestamp - $loginTimestamp;
		// Calculate work percentage
		$workPercentage = ($actualWorkingHour / $working) * 100;


		if ($workPercentage > 99) {
			$attendance_status = 1;
			echo "present";
		} elseif ($workPercentage > 48) {
			$attendance_status = 5;
			echo "half Day";
		} elseif ($workPercentage > 25) {
			$attendance_status = 2;
			echo "late";
		} else {
			$attendance_status = 3;
			echo "Absent";
		}

		$da = array(
			'attendance_status' => $attendance_status,
		);
		$this->common->update_data('staff', array('id' => $inp['id']), $da);

		$atta = array(
			'staff_attendance_type_id' => $attendance_status,
			'log_out_time'             => $emp['log_out_time']
		);
		$this->common->update_data('staff_attendance', array('employee_id' => $inp['id']), $atta);


		// my code end here

		$data = array('addClas' => 'tst_success', 'msg' => array('Log Out Successfully!'), 'icon' => '<i class="ti-check-box"></i>');
		echo json_encode($data);
	}











}
