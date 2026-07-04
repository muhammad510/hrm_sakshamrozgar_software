<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
class AutoSynchronise extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//$this->sql_db = $this->load->database('sql_db', TRUE);
        $this->load->model(array('setting/synchronise_model'=>'synchronise'));
        error_reporting(0);		
	}
	public function index()
	{
		$isCheckLastAttendance=$this->common->getLastRecord('tran_machinerawpunch');
		$punchID=$isCheckLastAttendance?$isCheckLastAttendance->Tran_MachineRawPunchId:'';
		$getLiveRecord=NULL;$where=array('punchID'=>$punchID);
		$getLiveRecord=$this->synchronise->getLiveRecordList($where);
		if($getLiveRecord)
		{	
			$liveSync=0;
			foreach($getLiveRecord as $punch)
			{
				$createArr=array('Tran_MachineRawPunchId'=>$punch['Tran_MachineRawPunchId'],'CardNo'=>$punch['CardNo'],'PunchDatetime'=>$punch['PunchDatetime'],
								 'P_Day'=>$punch['P_Day'],'ISManual'=>$punch['ISManual'],'PayCode'=>$punch['PayCode'],'MachineNo'=>$punch['MachineNo'],
								 'Dateime1'=>$punch['Dateime1'],'id_m'=>$punch['id'],'empid'=>$punch['empid'],'in_out'=>$punch['inout'],'senddata'=>$punch['senddata'],
								 'OutPunch'=>$punch['OutPunch'],'Checkin'=>$punch['Checkin'],'Checkout'=>$punch['Checkout'],'CheckinOut'=>$punch['CheckinOut'],
								 'viewinfo'=>$punch['viewinfo'],'showData'=>$punch['showData'],'Remark'=>$punch['Remark'],'DeviceIp_SRNo'=>$punch['DeviceIp_SRNo'],'temp'=>$punch['temp']);
				 if($this->common->save_data('tran_MachineRawPunch',$createArr)){$liveSync=1;}else{$liveSync=0;}
				}
				if($liveSync==1){$this->daily();$data=array('adClas'=>'tSuccess','msg'=>array('Thank You ! you have successfully submitted.'),'icon'=>'<i class="si si-check"></i>');}
				else{$data=array('adClas'=>'tDefault','msg'=>array('Please refresh page to fetch live attendance.'),'icon'=>'<div class="spinrGlow deflt"></div>');}	
			}
		else{$data=array('adClas'=>'tWarning','msg'=>array('Oh it looks like attendance has already synchronized.'),'icon'=>'<div class="spinrGlow wrng"></div>');}
		echo json_encode($data);
		}
	public function daily()
	{
		$testMode=NULL;$date=date('Y-m-d');
		$getShift=$this->common->shift();
		$currentShift='1';
		$dat=array('attendance_date'=>NULL,'attendance_status' =>'0','log_in_time'=>NULL,'log_out_time'=>NULL);
		$whereEmp=array('status'=>'1','attendance_status'=>'0','shift'=>$currentShift/*$getShift['curntShift']*/);
		$getEmp=$this->common->all_data_con('staff',$whereEmp,'id,employee_id,biometric_id,name,log_in_time,log_out_time,attendance_date,attendance_status');
		if($getEmp)
		{
			$sno=0;
			foreach($getEmp as $emp)
			{
				$sno++;
				$where=array('cardNo'=>$emp['biometric_id'],'curDate'=>$date,'order'=>'asc');
	   			$getFirstLogin=$this->synchronise->getRowDataFromHardware($where);	
			//	echo $this->db->last_query().'<br>';//	print_r($getFirstLogin);echo '<br>';
				if($getFirstLogin)
				{	
					$whereForMarkAtndnc=array('empID'=>$emp['id'],'shift'=>$currentShift,'log_in'=>$getFirstLogin->PunchDatetime,'deviceNo'=>$getFirstLogin->MachineNo);
					$testModeArr=$this->markAttendanceByHardware($whereForMarkAtndnc);			
				  //  print_r($testModeArr);echo '<br>';
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
			$findShift=$this->synchronise->shiftDetails($where['empID']);
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
					//print_r($mrkPresent);
					//$return=array('msg'=>'1','attendance_type'=>$workingPeriod,'log_in_time'=>$loginTime,'id'=>$where['empID']);
					if($this->common->update_data('staff',array('id'=>$where['empID']),$mrkAttArr))
					{
						if($this->common->save_data('staff_attendance', $mrkPresent)){$return=array('msg'=>'1','attendance_type'=>$workingPeriod,'log_in_time'=>$loginTime,'id'=>$where['empID']);}
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
		$nowDate = date('Y-m-d');
		//$date = '2025-05-08';
		$date = date('Y-m-d', strtotime('-1 day', strtotime($nowDate)));
		$getShift=$this->common->shift();
		$whereEmp=array('status'=>'1','shift'=>'1');//'shift'=>$getShift['offShift']
		$getEmp=$this->common->all_data_con('staff',$whereEmp,'id,employee_id,biometric_id,name,log_in_time,log_out_time,attendance_date,attendance_status,shift');
		  if($getEmp)	
		  {
			$sno=0;
			foreach($getEmp as $emp)
			{	
				$logInTime=$emp['log_in_time']?date('H:i:s a',strtotime($emp['log_in_time'])):'';	
				$where=array('cardNo'=>$emp['biometric_id'],'curDate'=>$date,'order'=>'desc');
				$getFlgout=$this->synchronise->getRowDataFromHardware($where);
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
}
