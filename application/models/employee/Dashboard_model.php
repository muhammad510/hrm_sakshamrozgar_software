<?php
class Dashboard_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->mCat=$this->session->userdata('user_cate');
		$this->mRole=$this->session->userdata('mi_brID');
		//$this->arvDB = $this->load->database('mi_db_con', TRUE); ###############Second DB CONECTION#############
	}


/*
###############Second DB CONECTION#############	
public function liveDbCheck()
	{
		$this->arvDB->select('*');
		$data = $this->arvDB->get('camwel_testing');
		return $data->result();
	}

*/






	public function employee_all_data($id)
	{
		$this->db->select('id, employee_id, name, gender, attendance_status');
		$this->db->where('id', $id);
		$data = $this->db->get('staff');
		if($this->mCat=='5'){$this->db->where('branch_id',$this->mRole);}
		return $data->row_array();
	}
	public function employee_shift($emp_id)
	{
		$this->db->where('s.id', $emp_id);
		$this->db->select('sm.*');
		$this->db->from('staff as s');
		$this->db->join('shift_manage as sm', 'sm.id=s.shift','left');
		return $this->db->get()->row();
	}
	public function upcoming_birthday($logID)
	{
		$this->db->where('id!=',$logID);
		$this->db->like('dob', "-".date('m')."-");
		$this->db->select('id,name,dob,image');
		$this->db->from('staff')->limit('4');
		if($this->mCat=='5'){$this->db->where('branch_id',$this->mRole);}
		return $this->db->get()->result();
	}
	public function upcoming_holiday($tblName,$yrMonth)
	{
		$this->db->like('holiday_date',$yrMonth);
		$this->db->select('holiday_name,holiday_date,description,created_at');
		$this->db->from($tblName);
		$this->db->order_by('holiday_date','ASC');
		return $this->db->get()->result_array();
	}
	public function shiftOff($table, $con, $data)
	{
		$this->db->where($con);
		if ($this->db->update($table, $data)) {
			return true;
		} else {
			return false;
		}
	}
	public function isLoggedAttendance($where)
	{
		$return=array();
	$isPresent=$this->db->select('count(id) as p')->from('staff_attendance')->where('staff_attendance_type_id','1')->where('employee_id',$where['id'])->where('attendance_date >=',$where['strtDt'])->where('attendance_date <=',$where['endDt'])->get()->row();
		$isLate=$this->db->select('count(id) as l')->from('staff_attendance')->where('staff_attendance_type_id','2')->where('employee_id',$where['id'])->where('attendance_date >=',$where['strtDt'])->where('attendance_date <=',$where['endDt'])->get()->row();	
	    $isHfDy=$this->db->select('count(id) as hf')->from('staff_attendance')->where('staff_attendance_type_id','5')->where('employee_id',$where['id'])->where('attendance_date >=',$where['strtDt'])->where('attendance_date <=',$where['endDt'])->get()->row();
	$isLeave=$this->db->select('count(id) as lve')->from('staff_attendance')->where('staff_attendance_type_id','6')->where('employee_id',$where['id'])->where('attendance_date >=',$where['strtDt'])->where('attendance_date <=',$where['endDt'])->get()->row();
		$isAbsent=$this->db->select('count(id) as a')->from('staff_attendance')->where('staff_attendance_type_id','3')->where('employee_id',$where['id'])->where('attendance_date >=',$where['strtDt'])->where('attendance_date <=',$where['endDt'])->get()->row();
		$isJoinee=$this->db->select('count(id) as newEmp')->from('staff')->where('status','1')->where('date_of_joining >=',$where['strtDt'])->where('date_of_joining <=',$where['endDt'])->get()->row();
		$return=array('present'=>$isPresent->p,'absent'=>$isAbsent->a,'hfDy'=>$isHfDy->hf,'late'=>$isLate->l,'leave'=>$isLeave->lve,'newJoinee'=>$isJoinee->newEmp);
		return $return;
		}
	public function allEmpAttendance($shift,$frmDate,$endDate)
	{
		$return=array();$toDay=date('Y-m-d');$tblName='staff_attendance as sAtt';$attType='sAtt.staff_attendance_type_id';$crDate='sAtt.attendance_date';
		$this->db->select('count(sAtt.id) as p')->from($tblName)->join('staff as s','sAtt.employee_id=s.id','left')->where($attType,'1')->where($crDate,$toDay);
		if($this->mCat=='5'){$this->db->where('s.branch_id',$this->mRole);}
		$isPresent=$this->db/*->where('s.shift',$shift)*/->get()->row();
		$this->db->select('count(sAtt.id) as l')->from($tblName)->join('staff as s','sAtt.employee_id=s.id','left')->where($attType,'2')->where($crDate,$toDay);
		if($this->mCat=='5'){$this->db->where('s.branch_id',$this->mRole);}	
		$isLate=$this->db->get()->row();
		$this->db->select('count(sAtt.id) as hf')->from($tblName)->join('staff as s','sAtt.employee_id=s.id','left')->where($attType,'5')->where($crDate,$toDay);
		if($this->mCat=='5'){$this->db->where('s.branch_id',$this->mRole);}	
		$isHfDy=$this->db->get()->row();
		$this->db->select('count(sAtt.id) as lve')->from($tblName)->join('staff as s','sAtt.employee_id=s.id','left')->where($attType,'6')->where($crDate,$toDay);
		if($this->mCat=='5'){$this->db->where('s.branch_id',$this->mRole);}	
		$isLeave=$this->db->get()->row();
		$this->db->select('count(sAtt.id) as a')->from($tblName)->join('staff as s','sAtt.employee_id=s.id','left')->where($attType,'3')->where($crDate,$toDay);
		if($this->mCat=='5'){$this->db->where('s.branch_id',$this->mRole);}	
		$isAbsent=$this->db->get()->row();
		$this->db->select('count(id) as total')->from('staff')->where('status','1');
		if($this->mCat=='5'){$this->db->where('branch_id',$this->mRole);}	
		$isAlEmp=$this->db->get()->row();
		$this->db->select('count(id) as terminate')->from('staff')->where('status','3');
		if($this->mCat=='5'){$this->db->where('branch_id',$this->mRole);}	
		$isAlResignEmp=$this->db->get()->row();
		$this->db->select('count(id) as total')->from('staff')->where('status','1')->where('created_at >=',$frmDate)->where('created_at <=',$endDate);
		if($this->mCat=='5'){$this->db->where('branch_id',$this->mRole);}	
		$isNewEmp=$this->db->get()->row();
		$this->db->select('sum(es.amount) as totalSalary')->from('employee_salary as es')->join('staff as s','es.employee_id=s.id','left')->where('paid_status','1');
		if($this->mCat=='5'){$this->db->where('s.branch_id',$this->mRole);}	
		$isAlSal=$this->db->get()->row();
		
		$this->db->select('sum(es.amount) as mnthSlry')->from('employee_salary as es')->where('paid_status','1')->join('staff as s','es.employee_id=s.id','left')->where('es.month',date('m'))->where('es.year',date('Y'));
		if($this->mCat=='5'){$this->db->where('s.branch_id',$this->mRole);}	
		$thisMnthSlry=$this->db->get()->row();
			$return=array('present'=>$isPresent->p,'absent'=>$isAbsent->a,'hfDy'=>$isHfDy->hf,'late'=>$isLate->l,'leave'=>$isLeave->lve,'totalEmp'=>$isAlEmp->total,
					      'totalSalary'=>$isAlSal->totalSalary,'currentMnthSalary'=>$thisMnthSlry->mnthSlry,'resigned'=>$isAlResignEmp->terminate,'isNewEmp'=>$isNewEmp->total);
		return $return;
		}
	public function recentJoinee()
	{	
		 	$this->db->select('s.id,s.name,s.image,s.created_at,s.salary_type,s.salary_amount,d.designation_name')->from('staff as s')->join('designation as d','d.id=s.designation','left')->where('s.status','1');
			if($this->mCat=='5'){$this->db->where('s.branch_id',$this->mRole);}
			return $this->db->limit('5')->order_by("s.id", "desc")->get()->result();
		}
		
	public function empTurnOver()
	{	
		$this->db->select('s.id,s.name,s.image,s.termination_date,s.salary_type,s.salary_amount,d.designation_name')->from('staff as s')->join('designation as d','d.id=s.designation','left')->where('s.status','1')->limit('5')->order_by("s.id", "desc")->where('termination_date !=',NULL);
		if($this->mCat=='5'){$this->db->where('s.branch_id',$this->mRole);}	
		 return $this->db->get()->result();
		}		
	public function todayMrkAttendance($cDate)
	{	
		$this->db->select('s.id,s.name,s.image,d.designation_name,attendance_status,log_in_time,log_out_time,attendance_date')->from('staff as s')->where('attendance_date',$cDate)->where('attendance_status!=','0');
		if($this->mCat=='5'){$this->db->where('s.branch_id',$this->mRole);}	
		return $this->db->join('designation as d','s.designation=d.id','left')->limit('4')->order_by("s.log_in_time", "desc")->get()->result();		
		}		
	public function expenseOverview()
	{	
		return $this->db->select("SUM(CASE WHEN status = 'Pending' THEN exp_amt ELSE 0 END) AS pending,SUM(CASE WHEN status = 'Approved' THEN exp_amt ELSE 0 END) AS approved,SUM(CASE WHEN status = 'Reject' THEN exp_amt ELSE 0 END) AS reject,
    SUM(CASE WHEN status = 'Hold' THEN exp_amt ELSE 0 END) AS hold")->from('employee_expense')->get()->row();
		}
	//SELECT COUNT(CASE WHEN attendance_date = '2025-05-12' THEN 1 ELSE NULL END) AS punch_in, COUNT(CASE WHEN attendance_date != '2025-05-12' THEN 1 ELSE NULL END) AS punch_out FROM staff		
	public function punchOverview()
	{	
		return $this->db->select("COUNT(CASE WHEN attendance_date = '".date('Y-m-d')."' && log_in_time!='' THEN 1 ELSE NULL END) AS punch_in, COUNT(CASE WHEN attendance_date = '".date('Y-m-d')."' && log_out_time!='' THEN 1 ELSE NULL END) AS punch_out")->from('staff')->get()->row();
		}
	public function workingAvg()
	{
		$dates=[];
		$date=new DateTime('first day of this month');
		$today=new DateTime();
		while($date<=$today)
		{
			$dates[]=$date->format('Y-m-d');
			$date->modify('+3 days');
		}
		if (end($dates) !== $today->format('Y-m-d'))
		{
			$dates[] = $today->format('Y-m-d');
			}						
		return $dates;
		}	
	public function dailyWorkingInMonth()
	{
		$datesArr=[];$dgDetails=[];$actReturn=[];
		$date = new DateTime('first day of this month');$today = new DateTime();
		while($date <= $today){$datesArr[] = $date->format('Y-m-d');$date->modify('+3 days');}
		if(end($datesArr) !== $today->format('Y-m-d')){$datesArr[] = $today->format('Y-m-d');}
		if($datesArr)
		{
			foreach($datesArr as $dtArr)
			{
				$getWorking= $this->db->select("employee_id, log_in_time, IF(log_out_time IS NULL, CURTIME(), log_out_time) AS log_out_time, TIME_FORMAT(TIMEDIFF(IF(log_out_time IS NULL, CURTIME(), log_out_time), log_in_time), '%H:%i:%s') AS workingHr, '08:00:00' as workDuration")->from('staff_attendance')->where('attendance_date',$dtArr)->where('log_in_time!=',NULL)->get()->result();
				if($getWorking)
				{
					$totalSeconds = 0;
					$validCount = 0;
					foreach ($getWorking as $time)
					{
							if ($time->workingHr && $time->workingHr !== "00:00:00")
							{
								list($hours, $minutes, $seconds) = explode(":", $time->workingHr);
								$secondsTotal = ($hours * 3600) + ($minutes * 60) + $seconds;
								$totalSeconds += $secondsTotal;
								$validCount++;
							}
						}
						if ($validCount > 0)
						{
							$averageSeconds=$totalSeconds/$validCount;
							$decimalHours = $averageSeconds/3600;
							$dgDetails[]=round($decimalHours, 2);
						} 
						else{$dgDetails[]=1;}
					}
				else{$dgDetails[]=0;}	
				}
			$actReturn['avgWorkingHr']=$dgDetails;
			return $actReturn;
			
			}
			else
			{
				$actReturn['avgWorkingHr']=[];
				return $dgDetails;
				}
		}
			
}

