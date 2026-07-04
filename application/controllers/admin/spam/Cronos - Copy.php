<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Cronos extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
        //($this->session->userdata('mim_id')== '') ? redirect(base_url(), 'refresh') : '';
	    //$this->logID=$this->session->userdata('mim_id');
        $this->load->model(array('setting/cronos_model'=>'cronos'));
		error_reporting(0);	
	}
 	public function index()
	{
		$testMode=NULL;$date=date('Y-m-d');
		$getShift=$this->common->shift();
		$dat=array('attendance_date'=>NULL,'attendance_status' =>'0','log_in_time'=>NULL,'log_out_time'=>NULL);
		$this->common->update_data('staff',array('attendance_date <'=>$date,'shift'=>$getShift['curntShift']),$dat);
		$whereEmp=array('status'=>'1','attendance_status'=>'0','shift'=>$getShift['curntShift']);
		$getEmp=$this->common->all_data_con('staff',$whereEmp,'id,employee_id,biometric_id,name,log_in_time,log_out_time,attendance_date,attendance_status');
		if($getEmp)
		{
			$sno=0;
			foreach($getEmp as $emp)
			{
 				$sno++;
			//	print_r($testModeArr);echo '<br>';
				$where=array('cardNo'=>$emp['biometric_id'],'curDate'=>$date,'order'=>'asc');
	   			$getFirstLogin=$this->cronos->getRowDataFromHardware($where);	
				if($getFirstLogin)
				{	
					$whereForMarkAtndnc=array('empID'=>$emp['id'],'shift'=>'18','log_in'=>$getFirstLogin->PunchDatetime,'deviceNo'=>$getFirstLogin->MachineNo);
					$testModeArr=$this->markAttendanceByHardware($whereForMarkAtndnc);			
					/*$logInTime=($testModeArr['msg']==1)?date('h:i:s A',strtotime($testModeArr['log_in_time'])):'';
					$logOutTime='';
					if($testModeArr['msg']==1)
					{
						
								if($testModeArr['attendance_type']==1){$attendance_status='<span class="badge mibdge" style="background-color:green;">Present</span>&emsp;';}
							elseif($testModeArr['attendance_type']==2){$attendance_status='<span class="badge mibdge" style="background-color:#CC7000;">Late</span>&emsp;';}
							elseif($testModeArr['attendance_type']==3){$attendance_status='<span class="badge mibdge" style="background-color:#F16D75;">Absent</span>&emsp;';} 
							elseif($testModeArr['attendance_type']==4){$attendance_status='<span class="badge mibdge" style="background-color:#0073d9;">Holiday</span>&emsp;';} 
							elseif ($testModeArr['attendance_type']==5){$attendance_status='<span class="badge mibdge" style="background-color:#D9AD03;">Half Day</span>&emsp;';} 
							elseif ($testModeArr['attendance_type']==6){$attendance_status='<span class="badge mibdge" style="background-color:#009EA6;">On Leave</span>&emsp;';}
							else {$attendance_status = '&emsp;';}
							}
							else {$attendance_status = '&emsp;';}*/
				  }
/*				  if($emp['id']==$testModeArr['id'])
				  {
				  	$attendance_status = $attendance_status;
					$logInTime=$logInTime;
				  	}
					else
					{
						$attendance_status = '&emsp;';
						$logInTime='';
						}*/
				//print_r($testModeArr);echo '<br>';json_encode($testModeArr)
				/*$testMode.='<tr>
								<th>'.$sno.'.</th><td>'.$emp['biometric_id'].'</td><td>'.$emp['name'].'</td><td>'.$logInTime.'</td>
                 				<td>'.$logOutTime.'</td>
                 				<td>'.$attendance_status.'</td>
                 		   </tr>';*/
                }}
		/*$data['testMode']=$testMode;		
		$data['layout']= "software/testing.php";
		$data['title']='Software Testing';
		$data['breadcrums'] = 'Software Testing';
		$this->load->view('base',$data);	*/	
	}	

/* 	public function index()
	{
		$testMode=NULL;$date=date('Y-m-d');
		$getShift=$this->common->shift();
		$dat=array('attendance_date'=>NULL,'attendance_status' =>'0','log_in_time'=>NULL,'log_out_time'=>NULL);
		$this->common->update_data('staff',array('attendance_date <'=>$date,'shift'=>$getShift['curntShift']),$dat);
		$whereEmp=array('status'=>'1','attendance_status'=>'0','shift'=>$getShift['curntShift']);
		$getEmp=$this->common->all_data_con('staff',$whereEmp,'id,employee_id,biometric_id,name,log_in_time,log_out_time,attendance_date,attendance_status');
		if($getEmp)
		{
			$sno=0;
			foreach($getEmp as $emp)
			{
 				$sno++;
			//	print_r($testModeArr);echo '<br>';
				$where=array('cardNo'=>$emp['biometric_id'],'curDate'=>$date,'order'=>'asc');
	   			$getFirstLogin=$this->cronos->getRowDataFromHardware($where);	
				if($getFirstLogin)
				{	
					$whereForMarkAtndnc=array('empID'=>$emp['id'],'shift'=>'18','log_in'=>$getFirstLogin->PunchDatetime,'deviceNo'=>$getFirstLogin->MachineNo);
					$testModeArr=$this->markAttendanceByHardware($whereForMarkAtndnc);			
					$logInTime=($testModeArr['msg']==1)?date('h:i:s A',strtotime($testModeArr['log_in_time'])):'';
					$logOutTime='';
					if($testModeArr['msg']==1)
					{
						
								if($testModeArr['attendance_type']==1){$attendance_status='<span class="badge mibdge" style="background-color:green;">Present</span>&emsp;';}
							elseif($testModeArr['attendance_type']==2){$attendance_status='<span class="badge mibdge" style="background-color:#CC7000;">Late</span>&emsp;';}
							elseif($testModeArr['attendance_type']==3){$attendance_status='<span class="badge mibdge" style="background-color:#F16D75;">Absent</span>&emsp;';} 
							elseif($testModeArr['attendance_type']==4){$attendance_status='<span class="badge mibdge" style="background-color:#0073d9;">Holiday</span>&emsp;';} 
							elseif ($testModeArr['attendance_type']==5){$attendance_status='<span class="badge mibdge" style="background-color:#D9AD03;">Half Day</span>&emsp;';} 
							elseif ($testModeArr['attendance_type']==6){$attendance_status='<span class="badge mibdge" style="background-color:#009EA6;">On Leave</span>&emsp;';}
							else {$attendance_status = '&emsp;';}
							}
							else {$attendance_status = '&emsp;';}
				  }
				  if($emp['id']==$testModeArr['id'])
				  {
				  	$attendance_status = $attendance_status;
					$logInTime=$logInTime;
				  	}
					else
					{
						$attendance_status = '&emsp;';
						$logInTime='';
						}
				//print_r($testModeArr);echo '<br>';json_encode($testModeArr)
				$testMode.='<tr>
								<th>'.$sno.'.</th><td>'.$emp['biometric_id'].'</td><td>'.$emp['name'].'</td><td>'.$logInTime.'</td>
                 				<td>'.$logOutTime.'</td>
                 				<td>'.$attendance_status.'</td>
                 		   </tr>';
                }}
		$data['testMode']=$testMode;		
		$data['layout']= "software/testing.php";
		$data['title']='Software Testing';
		$data['breadcrums'] = 'Software Testing';
		$this->load->view('base',$data);		
	}	
*/	
	
	
	
	private function markAttendanceByHardware($where)
	{
		$loginDt=date('Y-m-d',strtotime($where['log_in']));
		$isAlreadyExist=$this->common->get_data('staff_attendance',array('employee_id'=>$where['empID'],'attendance_date'=>$loginDt),'*');	
		if(!$isAlreadyExist)
		{
			$findShift=$this->cronos->shiftDetails($where['empID']);
			if($findShift)
			{
				if((strtotime('- 59 minutes',$findShift->shift_start) < strtotime(date("h:i:s a"))) && (strtotime(date("h:i:s a")) < strtotime($findShift->shift_end)))
				{
					$shiftDuration=explode(' ',$findShift->shift_duration);
					$halfDay=$shiftDuration[0]/2 .' '.$shiftDuration[1];
					$shiftStartWithGrace=strtotime('+ '.$findShift->grace_periods.' minutes',strtotime($findShift->shift_start));
					$attendanceTime=strtotime(date('H:i:s',strtotime($where['log_in'])));
					$loginTime=date('H:i:s',strtotime($where['log_in']));
					$isCheckHalf=strtotime('+ '.$halfDay,strtotime($findShift->shift_start));
					if($shiftStartWithGrace >= $attendanceTime){$workingPeriod='1';}
					else if(($shiftStartWithGrace <= $attendanceTime) && ($attendanceTime <= $isCheckHalf)){$workingPeriod='2';}else{$workingPeriod='3';}
					$mrkAttArr=array('attendance_status'=>$workingPeriod,'attendance_date'=>$loginDt,'log_in_time'=>$loginTime);
					$sysIP=$this->input->ip_address();
					$mrkPresent=array(
									  'employee_id'=>$where['empID'],'staff_attendance_type_id'=>$workingPeriod,'attendance_date'=>$loginDt,'log_in_time'=>$loginTime,
									  'log_out_time'=>NULL,'markIpAddress'=>$sysIP,'workFrm'=>'1','biometric_attendence'=>'1','biometric_device_data'=>$where['deviceNo'],
									  'remark'=>'Biometric Attendance','created_at'=>date('Y-m-d')
									  );		
					//$return=array('msg'=>'1','attendance_type'=>$workingPeriod,'log_in_time'=>$loginTime,'id'=>$where['empID']);
					if($this->common->update_data('staff',array('id'=>$where['empID']),$mrkAttArr))
					{
						if($this->common->save_data('staff_attendance', $mrkPresent))
						{
							$return=array('msg'=>'1','attendance_type'=>$workingPeriod,'log_in_time'=>$loginTime,'id'=>$where['empID']);
							}
					  	//else{$return=array('msg'=>'2');}
					  }
					}
				//$msg='Your are eligible to make attendance';
			  }
			else{$return=array('msg'=>'2');}
		  }
		  else{$return=array('msg'=>'3');}
		return $return;	  		
	  }
 
##################################################SMS API START##########################################################################	  







//SELECT id,employee_id,biometric_id,name,attendance_status,log_in_time,log_out_time FROM staff 


/*
INSERT INTO staff_attendance(id, employee_id, staff_attendance_type_id, attendance_date, holiday_id, log_in_time, log_out_time, biometric_attendence, biometric_device_data, remark, workFrm, markIpAddress, is_active, created_at, updated_at) VALUES 
(NULL, '4', '1', '2024-06-03', NULL, '10:03:14', '18:13:14', '1', '101', 'Biometric Attendance', '1', '127.0.0.1', '0', '2024-06-03', NULL),
(NULL, '5', '1', '2024-06-03', NULL, '10:03:14', '18:13:14', '1', '101', 'Biometric Attendance', '1', '127.0.0.1', '0', '2024-06-03', NULL),
(NULL, '6', '1', '2024-06-03', NULL, '10:03:14', '18:13:14', '1', '101', 'Biometric Attendance', '1', '127.0.0.1', '0', '2024-06-03', NULL),
(NULL, '7', '1', '2024-06-03', NULL, '10:03:14', '18:13:14', '1', '101', 'Biometric Attendance', '1', '127.0.0.1', '0', '2024-06-03', NULL),
(NULL, '8', '1', '2024-06-03', NULL, '10:03:14', '18:13:14', '1', '101', 'Biometric Attendance', '1', '127.0.0.1', '0', '2024-06-03', NULL),
(NULL, '9', '1', '2024-06-03', NULL, '10:03:14', '18:13:14', '1', '101', 'Biometric Attendance', '1', '127.0.0.1', '0', '2024-06-03', NULL),
(NULL, '10', '1', '2024-06-03', NULL, '10:03:14', '18:13:14', '1', '101', 'Biometric Attendance', '1', '127.0.0.1', '0', '2024-06-03', NULL),
(NULL, '13', '1', '2024-06-03', NULL, '10:03:14', '18:13:14', '1', '101', 'Biometric Attendance', '1', '127.0.0.1', '0', '2024-06-03', NULL),
(NULL, '17', '1', '2024-06-03', NULL, '10:03:14', '18:13:14', '1', '101', 'Biometric Attendance', '1', '127.0.0.1', '0', '2024-06-03', NULL),
(NULL, '18', '1', '2024-06-03', NULL, '10:03:14', '18:13:14', '1', '101', 'Biometric Attendance', '1', '127.0.0.1', '0', '2024-06-03', NULL),
(NULL, '19', '1', '2024-06-03', NULL, '10:03:14', '18:13:14', '1', '101', 'Biometric Attendance', '1', '127.0.0.1', '0', '2024-06-03', NULL);
*/





/*
INSERT INTO tran_machinerawpunch (id, Tran_MachineRawPunchId, CardNo, PunchDatetime, P_Day, ISManual, PayCode, MachineNo, Dateime1, id_m, empid, in_out, senddata, OutPunch, Checkin, Checkout, CheckinOut, viewinfo, showData, Remark, DeviceIp_SRNo, temp) VALUES (NULL, '207', '00100004', '2024-06-04 10:05:14', 'N', 'N', NULL, '101', '2024-06-04', NULL, NULL, NULL, 'FP', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, NULL),(NULL, '207', '00100005', '2024-06-04 10:05:14', 'N', 'N', NULL, '101', '2024-06-04', NULL, NULL, NULL, 'FP', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, NULL),(NULL, '207', '00005626', '2024-06-04 10:05:14', 'N', 'N', NULL, '101', '2024-06-04', NULL, NULL, NULL, 'FP', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, NULL),(NULL, '207', '00100000', '2024-06-04 10:05:14', 'N', 'N', NULL, '101', '2024-06-04', NULL, NULL, NULL, 'FP', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, NULL),(NULL, '207', '00100002', '2024-06-04 10:05:14', 'N', 'N', NULL, '101', '2024-06-04', NULL, NULL, NULL, 'FP', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, NULL),(NULL, '207', '00100007', '2024-06-04 10:05:14', 'N', 'N', NULL, '101', '2024-06-04', NULL, NULL, NULL, 'FP', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, NULL),(NULL, '207', '00000003', '2024-06-04 10:05:14', 'N', 'N', NULL, '101', '2024-06-04', NULL, NULL, NULL, 'FP', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, NULL),(NULL, '207', '00100001', '2024-06-04 10:05:14', 'N', 'N', NULL, '101', '2024-06-04', NULL, NULL, NULL, 'FP', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, NULL),(NULL, '207', '00100003', '2024-06-04 10:05:14', 'N', 'N', NULL, '101', '2024-06-04', NULL, NULL, NULL, 'FP', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, NULL)
*/


	public function sendSms()
	{
			// Account details
			$apiKey = urlencode('NmQ2NDZmNGU1MjZiMzA3NzUwNTY2NjQ3NjY1YTY1NGE=');
			//// Message details
			$numbers = array('919921177888','918789842044');
			$sender = urlencode('CAMWLS');
			$message = rawurlencode('This is your message.');		 
			$numbers = implode(',', $numbers);
			// Prepare data for POST request
			$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
//			// Send the POST request with cURL
			$ch = curl_init('https://api.textlocal.in/send/');
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);
			curl_close($ch);	
			// Process your response here
			print_r($response);
		}  
	public function curShift()
	{
		$c_time=/*'20:01:00';*/date('H:i:s');
		$isShift=$this->common->get_data('shift_manage',array('status'=>'1'),'count(*) as noShift,shift_start,shift_duration');
		if($isShift['noShift']=='4')
		{
			$hrs=explode(' ',$isShift['shift_duration']);$nDura=2*$hrs[0];$dura=date('H:i:s',strtotime('+ '.$nDura.' '.$hrs[1],strtotime($isShift['shift_start'])));
			$newTime=date('H:i:s a',strtotime('+ '.$nDura.' '.$hrs[1],strtotime($c_time)));
			}
			else{$dura='18:00:00';$newTime=date('H:i:s a',strtotime('+ 8 Hours',strtotime($c_time)));}
		if($c_time >=$dura){$con=array('shift_start <='=>$c_time,'shift_end < '=>$newTime);}else{$con=array('shift_start <='=>$c_time,'shift_end > '=>$c_time);}
		$result=$this->db->select('*')->where($con)->get('shift_manage')->row();
		if($result){$return=$result->id;}else{$return=NULL;}
		echo $return;
	}	
	public function preShift()
	{
		$c_time='02:59:59';/*date('H:i:s');*/
		$isShift=$this->common->get_data('shift_manage',array('status'=>'1'),'count(*) as noShift,shift_start,shift_duration');
		if($isShift['noShift']=='4')
		{
			$hrs=explode(' ',$isShift['shift_duration']);$nDura=2*$hrs[0];
			$dura=date('H:i:s',strtotime('- '.$nDura.' '.$hrs[1],strtotime($isShift['shift_start'])));
			$newTime=date('H:i:s',strtotime('- '.$hrs[0].' '.$hrs[1],strtotime($c_time)));
			}else{$dura='18:00:00';$newTime=date('H:i:s',strtotime('- 8 Hours',strtotime($c_time)));}
		if($c_time <=$dura)
		{
			 if($newTime >=$dura)
			  {
				  $con=array('shift_start <='=>$newTime,'shift_end < '=>$c_time);
				  echo 'New Time is greater from duration :: '.$dura.'<br>';
				}
				else
				{
					$con=array('shift_start <='=>$newTime,'shift_end > '=>$newTime);
					}
			}
			else
			{
				//echo 'else condition will appear :: '.$dura.'<br>';
				$con=array('shift_start <='=>$newTime,'shift_end > '=>$newTime);
				}
		echo 'Current Time :: '.$c_time.'<br>';
		echo 'New Time :: '.$newTime.'<br>';		
				$result=$this->db->select('*')->where($con)->get('shift_manage')->result();
				echo $this->db->last_query().'<br>';
				echo'<pre>';
					print_r($result);
				echo'</pre>';
				/*if($result)
				{
					$return=$result->id;
					}
					else
					{
						$return=NULL;
						}
		echo $return;*/
	}		 
##################################################SMS API END##########################################################################
}
