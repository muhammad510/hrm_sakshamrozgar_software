<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Cronos extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
        $this->load->model(array('setting/cronos_model'=>'cronos'));
		error_reporting(0);	
		date_default_timezone_set("Asia/Calcutta"); 
	}
 	public function index()
	{
		$testMode=NULL;$date=date('Y-m-d');
		$getShift=$this->common->shift();
		$dat=array('attendance_date'=>NULL,'attendance_status' =>'0','log_in_time'=>NULL,'log_out_time'=>NULL);
		//$this->common->update_data('staff',array('attendance_date <'=>$date,'shift'=>$getShift['curntShift']),$dat);
		$whereEmp=array('status'=>'1','attendance_status'=>'0','shift'=>'18'/*$getShift['curntShift']*/);
		$getEmp=$this->common->all_data_con('staff',$whereEmp,'id,employee_id,biometric_id,name,log_in_time,log_out_time,attendance_date,attendance_status');
		if($getEmp)
		{
			$sno=0;
			foreach($getEmp as $emp)
			{
				$sno++;
				$where=array('cardNo'=>$emp['biometric_id'],'curDate'=>$date,'order'=>'asc');
	   			$getFirstLogin=$this->cronos->getRowDataFromHardware($where);	
			//	echo $this->db->last_query().'<br>';
			//	print_r($getFirstLogin);echo '<br>';
				if($getFirstLogin)
				{	
					$whereForMarkAtndnc=array('empID'=>$emp['id'],'shift'=>'18','log_in'=>$getFirstLogin->PunchDatetime,'deviceNo'=>$getFirstLogin->MachineNo);
					$testModeArr=$this->markAttendanceByHardware($whereForMarkAtndnc);			
				  	print_r($testModeArr);echo '<br>';
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
					if($shiftStartWithGrace >= $attendanceTime)
					{
						$workingPeriod='1';
						}
					else if(($shiftStartWithGrace <= $attendanceTime) && ($attendanceTime <= $isCheckHalf))
					{
						$workingPeriod='2';
						}
						else
						{
							$workingPeriod='3';
							}
					$mrkAttArr=array('attendance_status'=>$workingPeriod,'attendance_date'=>$loginDt,'log_in_time'=>$loginTime);
					$sysIP=$this->input->ip_address();
					$mrkPresent=array('employee_id'=>$where['empID'],'staff_attendance_type_id'=>$workingPeriod,
									  'attendance_date'=>$loginDt,'log_in_time'=>$loginTime,'log_out_time'=>NULL,
									  'markIpAddress'=>$sysIP,'workFrm'=>'1','biometric_attendence'=>'1',
									  'biometric_device_data'=>$where['deviceNo'],
									  'remark'=>'Biometric Attendance','created_at'=>date('Y-m-d')
									  );
					//print_r($mrkAttArr);echo '<br>';
					if($this->common->update_data('staff',array('id'=>$where['empID']),$mrkAttArr))
					{
						if($this->common->save_data('staff_attendance', $mrkPresent))
						{
							$return=array(
										  'msg'=>'1','attendance_type'=>$workingPeriod,
										  'log_in_time'=>$loginTime,'id'=>$where['empID']
										  );
							}
					  }
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
	//$date='2024-09-12';
	//$whereEmp=array('status'=>'1','shift'=>'18');
	$getEmp=$this->common->all_data_con('staff',$whereEmp,'id,employee_id,biometric_id,name,log_in_time,log_out_time,attendance_date,attendance_status,shift');
	  if($getEmp)	
	  {
		$sno=0;
		foreach($getEmp as $emp)
		{	
			$logInTime=$emp['log_in_time']?date('H:i:s a',strtotime($emp['log_in_time'])):'';	
			$where=array('cardNo'=>$emp['biometric_id'],'curDate'=>$date,'order'=>'desc');
	   		$getFlgout=$this->cronos->getRowDataFromHardware($where);
			//print_r($getFlgout);echo '<br>';
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
				$attArr=array('employee_id'=>$emp['id'],'staff_attendance_type_id'=>'3','attendance_date'=>$date,'workFrm'=>'1',
							  'log_in_time'=>NULL,'log_out_time'=>NULL,'markIpAddress'=>$sysIP,'biometric_attendence'=>'1',
							  'biometric_device_data'=>$where['deviceNo'],'remark'=>'Automation setup','created_at'=>date('Y-m-d'));
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
			$apiKey = urlencode('NmQ2NDZmNGU1MjZiMzA3NzUwNTY2NjQ3NjY1YTY1NGE=');
			$mobile=urlencode('919921177888');
			$numbers = urlencode($mobile);
			$sender = urlencode('CAMWLS');	
			$userId='9276582798';
			$passw='96087384';	
/*			$message = rawurlencode('Dear distributor, we are happy to inform you that request for your distributor registration has been approved, your distributor ID is 9921177888 and passowrd is 89764942, Team - CAMWEL SOLUTION LLP');*/	
	 		/*$message=rawurlencode('Dear distributor, we are happy to inform you that request for your distributor registration has been approved, your distributor ID is '.$userId.'" and passowrd is '.$passw.'", Team - CAMWEL SOLUTION LLP');*/
			$message=rawurlencode('Dear distributor, we are happy to inform you that request for your distributor registration has been approved, your distributor ID is '.$userId.'" and passowrd is '.$passw.'", Team - CAMWEL SOLUTION LLP');
			
	/*


https://api.textlocal.in/send/?apiKey=NmQ2NDZmNGU1MjZiMzA3NzUwNTY2NjQ3NjY1YTY1NGE=&sender=CAMWLS&numbers=8789842044&message=Dear%20distributor,%20we%20are%20happy%20to%20inform%20you%20that%20request%20for%20your%20distributor%20registration%20has%20been%20approved,%20your%20distributor%20ID%20is%208798567534%22%20and%20password%20is%20644566%22,%20Team%20-%20CAMWEL%20SOLUTION%20LLP

https://api.textlocal.in/send/?apiKey=NmQ2NDZmNGU1MjZiMzA3NzUwNTY2NjQ3NjY1YTY1NGE=&sender=CAMWLS&numbers=9762237761&message=Dear distributor, we are happy to inform you that request for your distributor registration has been approved, your distributor ID is x" and password is x", Team - CAMWEL SOLUTION LLP


{"balance":86,"batch_id":3702741989,"cost":2,"num_messages":1,"message":{"num_parts":2,"sender":"CAMWLS","content":"Dear distributor, we are happy to inform you that request for your distributor registration has been approved, your distributor ID is 8798567534\\\" and password is 644566\\\", Team - CAMWEL SOLUTION LLP"},"receipt_url":"","custom":"","messages":[{"id":"15025682901","recipient":918789842044}],"status":"success"}
	https://api.textlocal.in/send/?apiKey=NmQ2NDZmNGU1MjZiMzA3NzUwNTY2NjQ3NjY1YTY1NGE=&sender=CAMWLS&numbers=8789842044&message=Dear%20distributor,%20we%20are%20happy%20to%20inform%20you%20that%20request%20for%20your%20distributor%20registration%20has%20been%20approved,%20your%20distributor%20ID%20is%208798567534%22%20and%20password%20is%20644566%22,%20Team%20-%20CAMWEL%20SOLUTION%20LLP
	
	*/		
			
			
			//$numbers = implode(',', $numbers);
			//$data = array('apikey'=>$apiKey,'numbers'=>$numbers,"sender"=>$sender,"message"=>$message);
			$data='apikey='.$apiKey."&sender=".$sender.'&numbers='.$numbers."&message=".$message;
			//$ch = curl_init('https://api.textlocal.in/send/?');
			$ch=curl_init('https://api.textlocal.in/send/?'.$data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);
			curl_close($ch);
/*			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);
			curl_close($ch);	*/
			// Process your response here
			echo $response;
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
	
/*****************************************************************************/		
		}


/*******************************************************************************************************************************/
public function logOff()
{
	$getEmployee=$this->db->select("s.id,s.employee_id,name,log_in_time,log_out_time,attendance_date,attendance_status,shift,sm.shift_start as shiftStart,sm.shift_end")->from("staff as s")->where("s.status", "1")->where("s.id!=", "1")->join('shift_manage as sm','sm.id=s.shift','inner')/*->limit('10')*/->get()->result();
	if($getEmployee)
	{
		$date=date('Y-m-d');
		foreach($getEmployee as $emp)
		{
			if($emp->log_in_time)
			{
				$logOff=date('H:i:s',strtotime($emp->shift_end));
				$mrkAttArr=array('log_out_time'=>$logOff);$mrkSignOff=array('log_out_time'=>$logOff);
				 if($this->common->update_data('staff',array('id'=>$emp->id),$mrkAttArr))
				 {
					if($this->common->update_data('staff_attendance',array('employee_id'=>$emp->id,'attendance_date'=>$date),$mrkSignOff))
					{
						$return='Success';
						}
					}	
				}
				else
				{
					$isExistAt=$this->common->get_data('staff_attendance',array('employee_id'=>$emp->id,'attendance_date'=>$date),'*');		
					if(!$isExistAt)
					{
						$mrkAttArr=array('attendance_status'=>'3','attendance_date'=>$date,'log_in_time'=>NULL,'log_out_time'=>NULL);
						$sysIP=$this->input->ip_address();
						$attArr=array('employee_id'=>$emp->id,'staff_attendance_type_id'=>'3','attendance_date'=>$date,'workFrm'=>'1','log_in_time'=>NULL,'log_out_time'=>NULL,'markIpAddress'=>$sysIP,'biometric_attendence'=>'0',
									  'biometric_device_data'=>'9999','remark'=>'Automation setup','created_at'=>$date);
						 if($this->common->update_data('staff',array('id'=>$emp->id),$mrkAttArr))
						 {
							if($this->common->save_data('staff_attendance',$attArr))
							{
								$return='Success';
								}
							}
						}
					}
			/*if(($emp->attendance_status!='0')&&($emp->attendance_status!=NULL))
			{
				$logOff=date('H:i:s',strtotime($emp->shift_end));
				$mrkAttArr=array('log_out_time'=>$logOff);
				print_r($list);
				echo '<br>';
				}
				else
				{
					$isExistAt=$this->common->get_data('staff_attendance',array('employee_id'=>$emp->id,'attendance_date'=>$date),'*');		
					if(!$isExistAt)
					{
						$mrkAttArr=array('attendance_status'=>'3','attendance_date'=>$date,'log_in_time'=>NULL,'log_out_time'=>NULL);
						$date=date('Y-m-d');$sysIP=$this->input->ip_address();
						$attArr=array('employee_id'=>$emp->id,'staff_attendance_type_id'=>'3','attendance_date'=>$date,'workFrm'=>'1','log_in_time'=>NULL,'log_out_time'=>NULL,'markIpAddress'=>$sysIP,'biometric_attendence'=>'0',
									  'biometric_device_data'=>'9999','remark'=>'Automation setup','created_at'=>date('Y-m-d'));
						 if($this->common->update_data('staff',array('id'=>$emp->id),$mrkAttArr))
						 {
							if($this->common->save_data('staff_attendance',$attArr))
							{
								$return='Success';
								}
							}
						}
					}*/
		  		}
				echo $return;
		}
	}

public function change_attendance_date()
{
	$getEmployee=$this->db->select("s.id,s.employee_id,name,log_in_time,log_out_time,attendance_date,attendance_status,shift,sm.shift_start as shiftStart,sm.shift_end")->from("staff as s")->where("s.status", "1")->where("s.id!=", "1")->join('shift_manage as sm','sm.id=s.shift','inner')/*->limit('10')*/->get()->result();
	if($getEmployee)
	{
		foreach($getEmployee as $emp)
		{
			$mrkAttArr=array('attendance_status'=>'0','attendance_date'=>NULL,'log_in_time'=>NULL,'log_out_time'=>NULL);
			 if($this->common->update_data('staff',array('id'=>$emp->id),$mrkAttArr))
			 {
					$return='Success';
					
				}
			
			}
			echo $return;
		}	
	}

public function generate_payroll()
{
	   //$sMonth=date('m');$sYear=date('Y');
	    $sMonth='02';$sYear='2025';$ns=0;
	    $where=array('sMonth'=>$sMonth,'sYear'=>$sYear);
	    $isGenerate=$this->cronos->isPayroll($where);
	    // echo $this->db->last_query().'<br>';exit;	   
	   	echo '<style>#customers {font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;}
#customers td, #customers th {border: 1px solid #ddd;padding: 8px;}#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:hover {background-color: #ddd;}#customers th {padding-top:12px;padding-bottom: 12px;text-align: left;background-color: #04AA6D;color: white;}
.noItem{color:#8a3b3b;text-transform:uppercase;font-weight:bold;text-align: center;}</style>';
	  echo '<table id="customers"><thead><tr><th>S No.</th><th>TNX. ID</th><th>Employee ID.</th><th>Employee Name</th><th>Month-Year</th><th>Desingantion</th><th>Present</th><th>Salary</th></tr></thead><tbody>';
	  if($isGenerate)
	  {
		foreach($isGenerate as $list)
		{
			++$ns;
			$whereCon=array('sMonth'=>$sMonth,'sYear'=>$sYear,'emp_id'=>$list->id/*,'salary_id'=>$list->salary_id*/);
			$isPresent=$this->cronos->isCountAttendance($whereCon);
			if($isPresent > 0)
			{
				$isSalary=$this->db->select('ROUND((gross_sal_amt*'.$isPresent.'/ 26), 2) AS gross_sal_amt,ROUND((basic_sal*'.$isPresent.'/ 26), 2) AS basic_sal,ROUND((hraAmt*'.$isPresent.'/ 26), 2) AS hraAmt,ROUND((advance*'.$isPresent.'/ 26), 2) AS advance,
											 ROUND((taAmt*'.$isPresent.'/ 26), 2) AS taAmt,ROUND((daAmt*'.$isPresent.'/ 26), 2) AS daAmt,ROUND((paAmt*'.$isPresent.'/ 26), 2) AS paAmt,ROUND((bonus*'.$isPresent.'/ 26), 2) AS bonus, 
											 ROUND((medical*'.$isPresent.'/ 26), 2) AS medical,ROUND((insentive*'.$isPresent.'/ 26), 2) AS insentive,ROUND((otherInc*'.$isPresent.'/ 26), 2) AS otherInc,
											 ROUND((pfAmt*'.$isPresent.'/ 26), 2) AS pfAmt,ROUND((tdsAmt*'.$isPresent.'/ 26), 2) AS tdsAmt,ROUND((esicEmpAmt*'.$isPresent.'/ 26), 2) AS esicEmpAmt,
											 ROUND((esicEmplyrAmt*'.$isPresent.'/ 26), 2) AS esicEmplyrAmt,ROUND((insurance*'.$isPresent.'/ 26), 2) AS insurance,ROUND((othrDeduction*'.$isPresent.'/ 26), 2) AS othrDeduction,
											 ROUND((esicEmpAmt*'.$isPresent.'/ 26), 2) AS esic_employee,ROUND((esicEmplyrAmt*'.$isPresent.'/ 26), 2) AS esic_employer')->from('employee_salary_setup')->where('emp_id',$list->id)->where('br_id',$list->branch_id)->where('desig_id',$list->designation)->where('isPromoted','Current')->get()->row();//echo $this->db->last_query();
				$getMonth=array('01'=>'Jan','02'=>'Feb','03'=>'Mar','04'=>'Apr','05'=>'May','06'=>'Jun','07'=>'Jul','08'=>'Aug','09'=>'Sep','10'=>'Oct','11'=>'Nov','12'=>'Dec');
				$tnxID=substr(str_shuffle('0123456789'),0,10);$mnthYr=$getMonth[$sMonth].'-'.$sYear;				
				$netGrsAmt=($isSalary->basic_sal+$isSalary->hraAmt+$isSalary->taAmt+$isSalary->daAmt+$isSalary->paAmt+$isSalary->bonus+$isSalary->medical+$isSalary->insentive+$isSalary->otherInc);
				$netDeductAmt=($isSalary->pfAmt+$isSalary->tdsAmt+$isSalary->insurance+$isSalary->othrDeduction+$isSalary->esic_employee+$isSalary->advance);
				$disburshAmt=($netGrsAmt-$netDeductAmt);
				
				if($disburshAmt > 0)
				{
					$genSalary=array('tnx_id'=>$tnxID,'employee_id'=>$list->id,'promotion_id'=>'0','month'=>$sMonth,'year'=>$sYear,'paid_status'=>'0','payment_mode'=>'Draft',
									 'description'=>'System generated','amount'=>$disburshAmt,'created_typ'=>'0','created_by'=>'1','created_date'=>date('Y-m-d H:i:s'));
					if($this->common->save_data('employee_salary', $genSalary))
					{
						$salTnxArray=array('emp_sal_id'=>$list->id,'basic_sal'=>$isSalary->basic_sal,'hraAmt'=>$isSalary->hraAmt,'taAmt'=>$isSalary->taAmt,'daAmt'=>$isSalary->daAmt,'paAmt'=>$isSalary->paAmt,'bonus'=>$isSalary->bonus,
								 'medical'=>$isSalary->medical,'insentive'=>$isSalary->insentive,'otherInc'=>$isSalary->otherInc,'pfAmt'=>$isSalary->pfAmt,'tdsAmt'=>$isSalary->tdsAmt,'insurance'=>$isSalary->insurance,
								 'othrDeduction'=>$isSalary->othrDeduction,'grossAmt'=>$netGrsAmt,
								 'esic_employee'=>$isSalary->esic_employee,'esic_employer'=>$isSalary->esicEmplyrAmt,'advance'=>$isSalary->advance,'totalPresent'=>$isPresent);
						if($this->common->save_data('employee_salary_transaction', $salTnxArray)){$result='1';}else{$result='3';}
						}				 
						else{$result='3';}
		
		
				
				
				
				
				
				//echo '<pre>';
				//print_r($result);
				//echo '<br>';//</pre>
				//print_r($isAttendance);echo'<br>';

				//print_r($list);echo '<br>';	
				echo '<tr><td>'.$ns.'.</td><td>'.$tnxID.'</td><td>'.$list->employee_id.'</td><td>'.$list->empName.'</td><td>'.$mnthYr.'</td><td>'.$list->designation_name.'</td><td>'.$isPresent.'</td><td>'.$disburshAmt.'</td></tr>';
			  		}
			  }
			}	
			  echo ' </tbody>';
		}
		else{echo '<tr><td colspan="8"><div class="noItem">No data available in table</div><div style="text-align:center;"><img src="'.base_url('uploads/addnewitem.svg').'"></div></td></tr></tbody>';}
	}

/*******************************************************************************************************************************/
public function softArenaCron()
{
	$attArr=array('staff_id'=>'45', 'create_date'=>'2025-01-01', 'tracking_info'=>'Tracking show', 'start_duration'=>'09:00:00', 'end_duration'=>'23:00:00');
	if($this->common->save_data('location_tracking_history',$attArr))
	{
		echo 'Success';
		}
	 file_put_contents("downloads/log.txt", date("Y-m-d H:i:s") . " - Cron ran\n", FILE_APPEND);
	}

}
