<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Testing extends CI_Controller {
        
        public function __construct()
        {

            parent::__construct();
           //$this->sql_db = $this->load->database('sql_db', TRUE);
           $this->load->model(array('setting/synchronise_model'=>'synchronise','admin/Attendance_model'=>'attendance'));
		   ($this->session->userdata('mim_id')== '') ? redirect(base_url(), 'refresh') : '';
           error_reporting(0);	

        }
/**********************************************************************************************************/
	public function index()
	{
		$testMode=NULL;
		$dat=array('attendance_date'=>NULL,'attendance_status' =>'0','log_in_time'=>NULL,'log_out_time'=>NULL);
		$this->common->update_data('staff',array('attendance_date <'=>'2024-06-05'),$dat);
		$whereEmp=array('status'=>'1','attendance_status'=>'0');
		$getEmp=$this->common->all_data_con('staff',$whereEmp,'id,employee_id,biometric_id,name,log_in_time,log_out_time,attendance_date,attendance_status');
		//echo $this->db->last_query();
		if($getEmp)
		{
			$sno=0;
			foreach($getEmp as $emp)
			{
 					$sno++;
/*INSERT INTO `tran_machinerawpunch` (`id`, `Tran_MachineRawPunchId`, `CardNo`, `PunchDatetime`, `P_Day`, `ISManual`, `PayCode`, `MachineNo`, `Dateime1`, `id_m`, `empid`, `in_out`, `senddata`, `OutPunch`, `Checkin`, `Checkout`, `CheckinOut`, `viewinfo`, `showData`, `Remark`, `DeviceIp_SRNo`, `temp`) VALUES (NULL, '209', '11111111', '2024-06-02 09:53:14', 'N', 'N', NULL, '101', '2024-05-31', NULL, NULL, NULL, 'FP', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, NULL);*/

				
				//print_r($testModeArr);echo '<br>';
				$where=array('cardNo'=>$emp['biometric_id'],'curDate'=>'2024-06-03','order'=>'asc');
	   			$getFirstLogin=$this->attendance->getRowDataFromHardware($where);	
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
	private function markAttendanceByHardware($where)
	{
		$loginDt=date('Y-m-d',strtotime($where['log_in']));
		$isAlreadyExist=$this->common->get_data('staff_attendance',array('employee_id'=>$where['empID'],'attendance_date'=>$loginDt),'*');	
		if(!$isAlreadyExist)
		{
			$findShift=$this->attendance->shiftDetails($where['empID']);
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
						//if($this->common->save_data('staff_attendance', $mrkPresent)){return 1;}
					  	$return=array('msg'=>'1','attendance_type'=>$workingPeriod,'log_in_time'=>$loginTime,'id'=>$where['empID']);
					  }
					}
				//$msg='Your are eligible to make attendance';
			  }
			else{$return=array('msg'=>'2');}
		  }
		  else{$return=array('msg'=>'3');}
		return $return;	  		
	  }	

/**********************************************************************************************************/
 

    }
?>
