<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Crona extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
        $this->load->model(array('setting/crona_model'=>'crona'));
		error_reporting(0);	
		date_default_timezone_set("Asia/Calcutta"); 
	}
 	public function index()
	{
	
		
		/*$testMode=NULL;$date=date('Y-m-d');
		$getShift=$this->common->shift();
		$dat=array('attendance_date'=>NULL,'attendance_status' =>'0','log_in_time'=>NULL,'log_out_time'=>NULL);
		//$this->common->update_data('staff',array('attendance_date <'=>$date,'shift'=>$getShift['curntShift']),$dat);
		$whereEmp=array('status'=>'1','attendance_status'=>'0','shift'=>'18');//$getShift['curntShift']
		$getEmp=$this->common->all_data_con('staff',$whereEmp,'id,employee_id,biometric_id,name,log_in_time,log_out_time,attendance_date,attendance_status');
		
		if($getEmp)
		{
			$sno=0;
			foreach($getEmp as $emp)
			{
				$sno++;
				$where=array('cardNo'=>$emp['biometric_id'],'curDate'=>$date,'order'=>'asc');
	   			$getFirstLogin=$this->crona->getRowDataFromHardware($where);	
				if($getFirstLogin)
				{	
					$whereForMarkAtndnc=array('empID'=>$emp['id'],'shift'=>'18','log_in'=>$getFirstLogin->PunchDatetime,'deviceNo'=>$getFirstLogin->MachineNo);
					$testModeArr=$this->markAttendanceByHardware($whereForMarkAtndnc);			
				  	print_r($testModeArr);echo '<br>';
				  }
               }
			 }*/
	
	/*
	
	INSERT INTO temp_machinerawpunch (Tran_MachineRawPunchId, CardNo, PunchDatetime, MachineNo, Dateime1) SELECT Tran_MachineRawPunchId,CardNo,PunchDatetime,MachineNo,DATE_FORMAT(PunchDatetime, '%Y-%m-%d') as date_t FROM tran_machinerawpunch ORDER BY id ASC
	SELECT id,CardNo,PunchDatetime,MachineNo,DATE_FORMAT(PunchDatetime, '%Y-%m-%d') as date_t FROM temp_machinerawpunch where DATE_FORMAT(PunchDatetime, '%Y-%m-%d')='2024-08-22' group by CardNo order by id asc 
	
	
	SELECT tmpAtt.id,CardNo,PunchDatetime,MachineNo,Dateime1 FROM temp_machinerawpunch as tmpAtt inner join staff as s on tmpAtt.CardNo=s.biometric_id where Dateime1='2024-08-22' group by CardNo order by tmpAtt.id asc 
	*/
	
	echo '<style>#customers {font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;}
#customers td, #customers th {border: 1px solid #ddd;padding: 8px;}#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:hover {background-color: #ddd;}#customers th {padding-top:12px;padding-bottom: 12px;text-align: left;background-color: #04AA6D;color: white;}
		  </style>';
		$attDate='2024-09-12';	 
		$getAttendance=$this->db->select("tmpAtt.id,CardNo,PunchDatetime,MachineNo,Dateime1,s.name,s.id as employee_id")->from('temp_machinerawpunch as tmpAtt')->where("Dateime1",$attDate)->join('staff as s', 'tmpAtt.CardNo=s.biometric_id', 'inner')->group_by('CardNo')->order_by('tmpAtt.id', 'asc')->get()->result(); 
		echo '<table id="customers"><thead><tr><th>S No.</th><th>Card No.</th><th>Employee Name</th><th>In Time</th><th>Out Time</th><th>Status</th></tr></thead><tbody>';
		if($getAttendance)
		{
			$resultAttr='';$cnt=0;
			foreach($getAttendance as $val)
			{
				$cnt++;
				$getLogOut=$this->db->select("tmpAtt.id,CardNo,PunchDatetime,MachineNo,Dateime1,s.name")->from('temp_machinerawpunch as tmpAtt')->where("Dateime1",$val->Dateime1)->where("CardNo",$val->CardNo)->join('staff as s', 'tmpAtt.CardNo=s.biometric_id', 'inner')->order_by('tmpAtt.id', 'DESC')->get()->row();
				//echo $this->db->last_query().'<br>';
					$logOutTime=date('H:i:s',strtotime($getLogOut->PunchDatetime));
				    $whereForMarkAtndnc=array('empID'=>$val->employee_id,'shift'=>'18','log_in'=>$val->PunchDatetime,'log_out'=>$logOutTime,
											  'deviceNo'=>$val->MachineNo,'attDate'=>$val->Dateime1);
					$testModeArr=$this->markAttendanceByHardware($whereForMarkAtndnc);
					
					//print_r($testModeArr);
				    //print_r($getLogOut->PunchDatetime);echo '<br>';
					$resultAttr.='<tr>
									  <td>'.$cnt.'.</td><td>'.$val->CardNo.'</td><td>'.$val->name.'</td>
									  <td>'.$val->PunchDatetime.'</td><td>'.$getLogOut->PunchDatetime.'</td><td>'.$testModeArr['attendance_type'].'</td>
								  </tr>';
				}
				echo $resultAttr;
			}
			else
			{
				echo '<tr><td colspan="6" style="text-align:center;text-transform:uppercase;color:#c60d0d;font-weight:700;"> Oops there is no attendance data available</td></tr>';
				}
			 
			echo '</tbody></table>'; 
			 
			 
			 
			 
			 
	}	
	private function markAttendanceByHardware($where)
	{
		$loginDt=date('Y-m-d',strtotime($where['log_in']));
		$isAlreadyExist=$this->common->get_data('staff_attendance',array('employee_id'=>$where['empID'],'attendance_date'=>$loginDt),'*');	
		if(!$isAlreadyExist)
		{
			$findShift=$this->crona->shiftDetails($where['empID']);//print_r($findShift);echo '<br>';
			if($findShift)
			{
				$getLogged=strtotime('- 59 minutes',strtotime($findShift->shiftStart));
				if(($getLogged < strtotime(date("h:i:s a"))) && (strtotime(date("h:i:s a")) < strtotime($findShift->shift_end)))
				{
					$shiftDuration=explode(' ',$findShift->shift_duration);
					$halfDay=$shiftDuration[0]/2 .' '.$shiftDuration[1];
					$shiftStartWithGrace=strtotime('+ '.$findShift->grace_periods.' minutes',strtotime($findShift->shiftStart));
					//print_r('Grace Time :: '.date('h:i:s a',$findShift->shiftStart));	
					$attendanceTime=strtotime(date('H:i:s',strtotime($where['log_in'])));
					$loginTime=date('H:i:s',strtotime($where['log_in']));
					$isCheckHalf=strtotime('+ '.$halfDay,strtotime($findShift->shiftStart));
					if($shiftStartWithGrace >= $attendanceTime){$workingPeriod='1';}
					else if(($shiftStartWithGrace <= $attendanceTime) && ($attendanceTime <= $isCheckHalf)){$workingPeriod='2';}
					else{$workingPeriod='3';}
					$sysIP=$this->input->ip_address();
					$mrkPresent=array('employee_id'=>$where['empID'],'staff_attendance_type_id'=>$workingPeriod,'attendance_date'=>$loginDt,
									  'log_in_time'=>$loginTime,'log_out_time'=>$where['log_out'],'markIpAddress'=>$sysIP,'workFrm'=>'1','biometric_attendence'=>'1',
									  'biometric_device_data'=>$where['deviceNo'],'remark'=>'Biometric Attendance','created_at'=>$where['attDate']);
					//echo '<pre>';
					//print_r($mrkPresent);
					//echo '<br>';
					//echo '</pre>';
				
						if($this->common->save_data('staff_attendance', $mrkPresent))
						{
							$return=array('msg'=>'1','attendance_type'=>$workingPeriod,'log_in_time'=>$loginTime,'id'=>$where['empID']);
							}
							//$return=array('msg'=>'1','attendance_type'=>$workingPeriod,'log_in_time'=>$loginTime,'id'=>$where['empID']);
					}
			  }
			else{$return=array('msg'=>'2');}
		  }
		  else{$return=array('msg'=>'3');}
		return $return;	  		
	  }	  
public function signOff()
{
	$getShift=$this->common->shift();
	$date=date('Y-m-d');
	$whereEmp=array('status'=>'1','shift'=>$getShift['offShift']);
	$getEmp=$this->common->all_data_con('staff',$whereEmp,'id,employee_id,biometric_id,name,log_in_time,log_out_time,attendance_date,attendance_status,shift');
	  if($getEmp)	
	  {
		$sno=0;
		foreach($getEmp as $emp)
		{	
			$logInTime=$emp['log_in_time']?date('H:i:s a',strtotime($emp['log_in_time'])):'';	
			$where=array('cardNo'=>$emp['biometric_id'],'curDate'=>$date,'order'=>'desc');
	   		$getFlgout=$this->crona->getRowDataFromHardware($where);
			if($getFlgout)
			{
				$lastPunchTime=($getFlgout->PunchDatetime!="")?date('H:i:s',strtotime($getFlgout->PunchDatetime)):NULL;
				if($lastPunchTime!=$emp['log_in_time']){if($lastPunchTime){$mrkAttArr=array('log_out_time'=>$lastPunchTime);$mrkSignOff=array('log_out_time'=>$lastPunchTime);}}
				else
				{
					$logDet=$this->common->getRowData('shift_manage','id',$emp['shift']);
					$mrkAttArr=array('log_out_time'=>$logDet->shift_end);$mrkSignOff=array('log_out_time'=>$logDet->shift_end);
					}
				if($this->common->update_data('staff',array('id'=>$emp['id']),$mrkAttArr))
				 {
					if($this->common->update_data('staff_attendance',array('employee_id'=>$emp['id'],'attendance_date'=>$date),$mrkSignOff))
					{
						$return='Success';
						}
					}		
				}
			else
			{				
				$mrkAttArr=array('attendance_status'=>'3','attendance_date'=>$date,'log_in_time'=>NULL,'log_out_time'=>NULL);
				$sysIP=$this->input->ip_address();
				$attArr=array(
							  'employee_id'=>$emp['id'],'staff_attendance_type_id'=>'3','attendance_date'=>$date,'workFrm'=>'1',
							  'log_in_time'=>NULL,'log_out_time'=>NULL,'markIpAddress'=>$sysIP,'biometric_attendence'=>'1',
							  'biometric_device_data'=>$where['deviceNo'],'remark'=>'Automation setup','created_at'=>date('Y-m-d')
							  );
			$isExistAt=$this->common->get_data('staff_attendance',array('employee_id'=>$emp['id'],'attendance_date'=>$date),'*');		
				if(!$isExistAt)
				{
					 if($this->common->update_data('staff',array('id'=>$where['empID']),$mrkAttArr))
					 {
					 	if($this->common->save_data('staff_attendance',$attArr))
						{
							$return='Success';
							}
						}
					}
			 	}
			}
		 }
		return $return;
	}
	public function sendSms()
	{
		ini_set('display_errors', 1);
		error_reporting(E_ALL);	
			
/*			$apiKey = urlencode('NmQ2NDZmNGU1MjZiMzA3NzUwNTY2NjQ3NjY1YTY1NGE=');
			$mobile=urlencode('919921177888');
			$numbers = urlencode($mobile);
			$sender = urlencode('CAMWLS');	*/
			
			$apiKey='NmQ2NDZmNGU1MjZiMzA3NzUwNTY2NjQ3NjY1YTY1NGE=';
			$mobile='918789842044';
			$numbers=$mobile;
			$sender='CAMWLS';
			
			$userId='9276582798';
			$passw='96087384';	
/*			$message = rawurlencode('Dear distributor, we are happy to inform you that request for your distributor registration has been approved, your distributor ID is 9921177888 and passowrd is 89764942, Team - CAMWEL SOLUTION LLP');*/	
	 		/*$message=rawurlencode('Dear distributor, we are happy to inform you that request for your distributor registration has been approved, your distributor ID is '.$userId.'" and passowrd is '.$passw.'", Team - CAMWEL SOLUTION LLP');*/
			$message=rawurlencode('Dear distributor, we are happy to inform you that request for your distributor registration has been approved, your distributor ID is '.$userId.'" and passowrd is '.$passw.'", Team - CAMWEL SOLUTION LLP');
			
	/*


https://api.textlocal.in/send/?apiKey=NmQ2NDZmNGU1MjZiMzA3NzUwNTY2NjQ3NjY1YTY1NGE=&sender=CAMWLS&numbers=8789842044&message=Dear%20distributor,%20we%20are%20happy%20to%20inform%20you%20that%20request%20for%20your%20distributor%20registration%20has%20been%20approved,%20your%20distributor%20ID%20is%208798567534%22%20and%20password%20is%20644566%22,%20Team%20-%20CAMWEL%20SOLUTION%20LLP

https://api.textlocal.in/send/?apiKey=NmQ2NDZmNGU1MjZiMzA3NzUwNTY2NjQ3NjY1YTY1NGE=&sender=CAMWLS&numbers=9762237761&message=Dear distributor, we are happy to inform you that request for your distributor registration has been approved, your distributor ID is x" and password is x", Team - CAMWEL SOLUTION LLP



Y1NGE=&sender=CAMWLS&numbers=8789842044&message=Dear distributor, we are happy to inform you that request for your distributor registration has been approved, your distributor ID is 8798567534" and password is 644566", Team - CAMWEL SOLUTION LLP



https://api.textlocal.in/send/?apiKey=NmQ2NDZmNGU1MjZiMzA3NzUwNTY2NjQ3NjY1YTY1NGE=&sender=CAMWLS&numbers=8789842044&message=Dear%20distributor,%20we%20are%20happy%20to%20inform%20you%20that%20request%20for%20your%20distributor%20registration%20has%20been%20approved,%20your%20distributor%20ID%20is%208798567534%22%20and%20password%20is%20644566%22,%20Team%20-%20CAMWEL%20SOLUTION%20LLP



https://api.textlocal.in/send/?apikey=NmQ2NDZmNGU1MjZiMzA3NzUwNTY2NjQ3NjY1YTY1NGE=&sender=CAMWLS&numbers=919921177888&message=Dear%20distributor%2C%20we%20are%20happy%20to%20inform%20you%20that%20request%20for%20your%20distributor%20registration%20has%20been%20approved%2C%20your%20distributor%20ID%20is%209276582798%22%20and%20passowrd%20is%2096087384%22%2C%20Team%20-%20CAMWEL%20SOLUTION%20LLP





{"balance":86,"batch_id":3702741989,"cost":2,"num_messages":1,"message":{"num_parts":2,"sender":"CAMWLS","content":"Dear distributor, we are happy to inform you that request for your distributor registration has been approved, your distributor ID is 8798567534\\\" and password is 644566\\\", Team - CAMWEL SOLUTION LLP"},"receipt_url":"","custom":"","messages":[{"id":"15025682901","recipient":918789842044}],"status":"success"}
	https://api.textlocal.in/send/?apiKey=NmQ2NDZmNGU1MjZiMzA3NzUwNTY2NjQ3NjY1YTY1NGE=&sender=CAMWLS&numbers=8789842044&message=Dear%20distributor,%20we%20are%20happy%20to%20inform%20you%20that%20request%20for%20your%20distributor%20registration%20has%20been%20approved,%20your%20distributor%20ID%20is%208798567534%22%20and%20password%20is%20644566%22,%20Team%20-%20CAMWEL%20SOLUTION%20LLP
	
	*/		
			
			
			//$numbers = implode(',', $numbers);
			//$data = array('apikey'=>$apiKey,'numbers'=>$numbers,"sender"=>$sender,"message"=>$message);
			$data='apikey='.$apiKey.'&sender='.$sender.'&numbers='.$numbers.'&message='.$message;
		    echo ('https://api.textlocal.in/send/?'.$data);
			
/*			
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);
			curl_close($ch);*/
			
			/*$ch=curl_init('https://api.textlocal.in/send/?');
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);
			curl_close($ch);*/	
			// Process your response here
			
			
			
			//echo $response;
		} 
	public function getInbox()
	{
	
	   /* $apiKey = urlencode('NmQ2NDZmNGU1MjZiMzA3NzUwNTY2NjQ3NjY1YTY1NGE=');
		$data = array('apikey' => $apiKey);
		$ch = curl_init('https://api.textlocal.in/get_inboxes/');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
		echo $response;*/
/*	$apiKey = urlencode('NmQ2NDZmNGU1MjZiMzA3NzUwNTY2NjQ3NjY1YTY1NGE=');
	$inbox_id = 'T3L39';
	$data = 'apikey=' . $apiKey . '&inbox_id=' . $inbox_id;
	$ch = curl_init('https://api.textlocal.in/get_messages/?' . $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	echo $response;*/
/**************************************************************************/		
$apiKey = urlencode('NmQ2NDZmNGU1MjZiMzA3NzUwNTY2NjQ3NjY1YTY1NGE=');
// Message details
$numbers = urlencode('919921177888');
$sender = urlencode('CAMWLS');
$userId='7643003225';
$passw='96087198';
/*$message = rawurlencode('Dear distributor, we are happy to inform you that request for your distributor registration has been approved, your distributor ID is '.$userId.'" and passowrd is '.$passw.'", Team - CAMWEL SOLUTION LLP');


{"balance":84,"batch_id":3702780568,"cost":2,"num_messages":1,"message":{"num_parts":2,"sender":"CAMWLS","content":"Dear distributor, we are happy to inform you that request for your distributor registration has been approved, your distributor ID is 7643003225\\\" and password is 96087198\\\", Team - CAMWEL SOLUTION LLP"},"receipt_url":"","custom":"","messages":[{"id":"15025724995","recipient":919921177888}],"status":"success"}








*/
$message = rawurlencode('Dear distributor, we are happy to inform you that request for your distributor registration has been approved, your distributor ID is '.$userId.'" and password is '.$passw.'", Team - CAMWEL SOLUTION LLP');
// Prepare data for POST request
$data = 'apikey=' . $apiKey . '&numbers=' . $numbers . '&sender=' . $sender . '&message=' . $message;
$ch = curl_init('https://api.textlocal.in/send/?' . $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
echo $response;
/**************************************************************************/		
		
		
		}
	
public function getHistory()
{
	$apiKey = urlencode('NmQ2NDZmNGU1MjZiMzA3NzUwNTY2NjQ3NjY1YTY1NGE=');
	$data = array('apikey' => $apiKey);
	$ch = curl_init('https://api.textlocal.in/get_history_single/');//get_history_group
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	$getResponse=json_decode($response);	
	print_r($getResponse);
	}	
		
	public function testingMsg()
	{
/*****************************************************************************/	
	// Authorisation details.
	$username = "info@camwel.com";
	$hash = "d59c553c9af92036b8bb9137acf46d4d04a91bfa633685c60c2cd8aa51eb5acc";
	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";
	// Data for text message. This is the text message data.
	$sender = "CAMWLS"; // This is who the message appears to be from.
	$numbers = "918789842044"; // A single number or a comma-seperated list of numbers
	$message = "This is a test message from the PHP API script.";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
	echo $result;
	
/*****************************************************************************/		
		}

public function textMsg()
{
	// Authorisation details.
	$username = "info@camwel.com";
	$hash = "d59c553c9af92036b8bb9137acf46d4d04a91bfa633685c60c2cd8aa51eb5acc";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "CAMWLS"; // This is who the message appears to be from.
	$numbers = "910000000000"; // A single number or a comma-seperated list of numbers
	$message = "This is a test message from the PHP API script.";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
	
	}

public function camSend()
{
	// Define API Key, Sender, and Phone Number
$apiKey = 'NmQ2NDZmNGU1MjZiMzA3NzUwNTY2NjQ3NjY1YTY1NGE=';
$sender = 'CAMWLS';
$numbers = '8789842044';

// Define the dynamic values for distributor ID and password
$distributorId = '8798567534';  // Example distributor ID
$password = '644566';           // Example password

// Construct the message
$message = 'Dear distributor, we are happy to inform you that request for your distributor registration has been approved, your distributor ID is $distributorId" and password is $password", Team - CAMWEL SOLUTION LLP';

// URL to send the SMS
$url = 'https://api.textlocal.in/send/';

// Prepare the data to be sent
$data = array(
    'apiKey' => $apiKey,
    'sender' => $sender,
    'numbers' => $numbers,
    'message' => $message
);

echo $url.$data;

/*// Use cURL to send the request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); // Send POST data
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute cURL request and capture the response
$response = curl_exec($ch);

// Close cURL session
curl_close($ch);

// Output the response for debugging purposes
echo $response;*/
	
	}


}
