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
				$where=array('cardNo'=>$emp['biometric_id'],'curDate'=>$date,'order'=>'asc');
	   			$getFirstLogin=$this->cronos->getRowDataFromHardware($where);	
				if($getFirstLogin)
				{	
					$whereForMarkAtndnc=array('empID'=>$emp['id'],'shift'=>'18','log_in'=>$getFirstLogin->PunchDatetime,'deviceNo'=>$getFirstLogin->MachineNo);
					$testModeArr=$this->markAttendanceByHardware($whereForMarkAtndnc);			
				  }
               }
			 }
	}	


	
	
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
public function signOff()
{
	$getShift=$this->common->shift();
	//$getShift=$this->shift();
	$date=date('Y-m-d');
	$whereEmp=array('status'=>'1','shift'=>$getShift['offShift']);
	$getEmp=$this->common->all_data_con('staff',$whereEmp,'id,employee_id,biometric_id,name,log_in_time,log_out_time,attendance_date,attendance_status,shift');
	// echo $this->db->last_query().'<br>';
	  if($getEmp)	
	  {
		$sno=0;
		foreach($getEmp as $emp)
		{
####################################################Testing Visuals##########################################################################
			/*$sno++;
			if($emp['attendance_status']==1){$attendance_status='<span class="badge mibdge" style="background-color:green;">Present</span>&emsp;';}
			elseif($emp['attendance_status']==2){$attendance_status='<span class="badge mibdge" style="background-color:#CC7000;">Late</span>&emsp;';}
			elseif($emp['attendance_status']==3){$attendance_status='<span class="badge mibdge" style="background-color:#F16D75;">Absent</span>&emsp;';} 
			elseif($emp['attendance_status']==4){$attendance_status='<span class="badge mibdge" style="background-color:#0073d9;">Holiday</span>&emsp;';} 
			elseif ($emp['attendance_status']==5){$attendance_status='<span class="badge mibdge" style="background-color:#D9AD03;">Half Day</span>&emsp;';} 
			elseif ($emp['attendance_status']==6){$attendance_status='<span class="badge mibdge" style="background-color:#009EA6;">On Leave</span>&emsp;';}
			else {$attendance_status = '&emsp;';}		*/	
####################################################Testing Visuals##########################################################################			
			
			
			$logInTime=$emp['log_in_time']?date('H:i:s a',strtotime($emp['log_in_time'])):'';	
			$where=array('cardNo'=>$emp['biometric_id'],'curDate'=>$date,'order'=>'desc');
	   		$getFlgout=$this->cronos->getRowDataFromHardware($where);
			if($getFlgout)
			{
####################################################Testing Visuals##########################################################################			
			//	$logOut=($getFlgout->PunchDatetime!="")?date('H:i:s',strtotime($getFlgout->PunchDatetime)):NULL;
				
####################################################Testing Visuals##########################################################################			
			
				$lastPunchTime=($getFlgout->PunchDatetime!="")?date('H:i:s',strtotime($getFlgout->PunchDatetime)):NULL;
				if($lastPunchTime!=$emp['log_in_time'])
				{
					if($lastPunchTime)
					{
							$mrkAttArr=array('log_out_time'=>$lastPunchTime);
							$mrkSignOff=array('log_out_time'=>$lastPunchTime);
						//	
						//	$logOut=$lastPunchTime;	
						//	
							}	
						
					}
					else
					{
						$logDet=$this->common->getRowData('shift_manage','id',$emp['shift']);
								$mrkAttArr=array('log_out_time'=>$logDet->shift_end);
								$mrkSignOff=array('log_out_time'=>$logDet->shift_end);
						//
						//		$logOut=$logDet->shift_end;
						//
						}
				if($this->common->update_data('staff',array('id'=>$emp['id']),$mrkAttArr))
				 {
					if($this->common->update_data('staff_attendance',array('employee_id'=>$emp['id'],'attendance_date'=>$date),$mrkSignOff))
					{
						$return='Success';//array('msg'=>'1','attendance_type'=>$emp['attendance_status']);
						}
					}		
				
				//print_r($mrkSignOff);echo '<br>';	
				
				//print_r($mrkAttArr);echo '<br>';
				}
			else
			{				
				$mrkAttArr=array('attendance_status'=>'3','attendance_date'=>$date,'log_in_time'=>NULL,'log_out_time'=>NULL);
				$sysIP=$this->input->ip_address();
				$attArr=array(
							  'employee_id'=>$emp['id'],'staff_attendance_type_id'=>'3','attendance_date'=>$date,'log_in_time'=>NULL,'log_out_time'=>NULL,'markIpAddress'=>$sysIP,
							  'workFrm'=>'1','biometric_attendence'=>'1','biometric_device_data'=>$where['deviceNo'],'remark'=>'Automation setup','created_at'=>date('Y-m-d')
							  );
				$isExistAt=$this->common->get_data('staff_attendance',array('employee_id'=>$emp['id'],'attendance_date'=>$date),'*');		  
				if(!$isExistAt)
				{
					 if($this->common->update_data('staff',array('id'=>$where['empID']),$mrkAttArr))
					 {
					 	if($this->common->save_data('staff_attendance',$attArr))
						{
							$return='Success';//array('msg'=>'1','attendance_type'=>'3');
							}
						}
					}
				
####################################################Testing Visuals##########################################################################				
				/*$logOut='';
				$attendance_status='<span class="badge mibdge" style="background-color:#F16D75;">Absent</span>&emsp;';
				$emp['attendance_status']='3';*/
####################################################Testing Visuals##########################################################################
			 }
			//json_encode($getFlgout)
			
			
			
####################################################Testing Visuals##########################################################################			
	/*		$logOut_time=strtotime($logInTime);
			$logIn_time = strtotime($logOut);
			$getTotalMinute=round(abs($logIn_time - $logOut_time)/60,2);
			$workingHrs=round(($getTotalMinute/60),2);
			if($logOut)
			{
				$punchTime=($getFlgout->PunchDatetime!="")?date('H:i:s',strtotime($getFlgout->PunchDatetime)):NULL;
				if($punchTime!=$emp['log_in_time'])
				{
					$workingHrs=$workingHrs.' Hours';
				 	$logOut=($getFlgout->PunchDatetime!="")?date('h:i:s A',strtotime($getFlgout->PunchDatetime)):'';
					}
					else
					{
						if($emp['log_out_time']==NULL)
						{
							
							$workingHrs='<span class="wrKng">Still working99...</span>';
							}
							else
							{
								$workingHrs=$workingHrs.' Hours';
								}
						$logOut='';
						}
					
				 }
			else{$workingHrs=($emp['attendance_status']=='6')?'':(($emp['attendance_status']=='3')?'':'<span class="wrKng">Still working...</span>');}
			$testMode.='<tr>
							<th>'.$sno.'.</th><td>'.$emp['biometric_id'].'</td><td>'.$emp['name'].'</td><td>'.$logInTime.'</td>
							<td>'.$logOut.'</td><td>'.$workingHrs.'</td><td>'.$attendance_status.'</td>
					    </tr>';*/
####################################################Testing Visuals##########################################################################
			}
		 }
		print_r($return);
####################################################Testing Visuals##########################################################################	    
		//exit;
	/*	$data['testMode']=$testMode;		
		$data['layout']= "software/testing.php";
		$data['title']='Software Testing';
		$data['breadcrums'] = 'Software Testing';
		$this->load->view('base',$data);	 */
####################################################Testing Visuals##########################################################################		
		 
	}

public function shift()
{
	$curTime=date('H:i:s');
	//$curTime='09:00:00';
	if(($curTime > '02:00:00')&&($curTime <'10:00:00')){$return=array('curntShift'=>'17','offShift'=>'18');}
	else if(($curTime >'10:00:00')&&($curTime <'18:00:00')){$return=array('curntShift'=>'18','offShift'=>'19');}
	else if(($curTime > '18:00:00')&&($curTime <'23:59:59')){$return=array('curntShift'=>'17','offShift'=>'18');}
	else{$return=array('curntShift'=>'17','offShift'=>'18');}
		return $return;
	}




//SELECT id,employee_id,biometric_id,name,attendance_status,log_in_time,log_out_time FROM `staff` 


/*
INSERT INTO `tran_machinerawpunch` (`id`, `Tran_MachineRawPunchId`, `CardNo`, `PunchDatetime`, `P_Day`, `ISManual`, `PayCode`, `MachineNo`, `Dateime1`, `id_m`, `empid`, `in_out`, `senddata`, `OutPunch`, `Checkin`, `Checkout`, `CheckinOut`, `viewinfo`, `showData`, `Remark`, `DeviceIp_SRNo`, `temp`) VALUES (NULL, '207', '00100004', '2024-06-04 10:05:14', 'N', 'N', NULL, '101', '2024-06-04', NULL, NULL, NULL, 'FP', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, NULL),(NULL, '207', '00100005', '2024-06-04 10:05:14', 'N', 'N', NULL, '101', '2024-06-04', NULL, NULL, NULL, 'FP', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, NULL),(NULL, '207', '00005626', '2024-06-04 10:05:14', 'N', 'N', NULL, '101', '2024-06-04', NULL, NULL, NULL, 'FP', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, NULL),(NULL, '207', '00100000', '2024-06-04 10:05:14', 'N', 'N', NULL, '101', '2024-06-04', NULL, NULL, NULL, 'FP', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, NULL),(NULL, '207', '00100002', '2024-06-04 10:05:14', 'N', 'N', NULL, '101', '2024-06-04', NULL, NULL, NULL, 'FP', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, NULL),(NULL, '207', '00100007', '2024-06-04 10:05:14', 'N', 'N', NULL, '101', '2024-06-04', NULL, NULL, NULL, 'FP', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, NULL),(NULL, '207', '00000003', '2024-06-04 10:05:14', 'N', 'N', NULL, '101', '2024-06-04', NULL, NULL, NULL, 'FP', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, NULL),(NULL, '207', '00100001', '2024-06-04 10:05:14', 'N', 'N', NULL, '101', '2024-06-04', NULL, NULL, NULL, 'FP', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, NULL),(NULL, '207', '00100003', '2024-06-04 10:05:14', 'N', 'N', NULL, '101', '2024-06-04', NULL, NULL, NULL, 'FP', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, NULL)
*/


	public function sendSms()
	{
			// Account details
			$apiKey = urlencode('NmQ2NDZmNGU1MjZiMzA3NzUwNTY2NjQ3NjY1YTY1NGE=');
			//// Message details
			$numbers = array('919921177888');
			$sender = urlencode('CAMWLS');
			
/*
Dear distributor, we are happy to inform you that request for your distributor registration has been approved, your distributor ID is %%|text^{"inputtype" : "text", "maxlength" : "10"}%%" and passowrd is %%|text^{"inputtype" : "text", "maxlength" : "8"}%%", Team - CAMWEL SOLUTION LLP




*/				
			$message = rawurlencode('Dear distributor, we are happy to inform you that request for your distributor registration has been approved, your distributor ID is 9921177888 and passowrd is 89764942, Team - CAMWEL SOLUTION LLP');		 
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
