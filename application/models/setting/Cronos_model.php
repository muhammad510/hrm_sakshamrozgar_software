<?php
class Cronos_model  extends CI_Model
{
		public function __construct()
		{
			parent::__construct();
		}
		public function getRowDataFromHardware($where)
		{
			$dateFrm=$where['curDate'].' 00:00:00';$dateTo=$where['curDate'].' 23:59:59';
			return $this->db->select('CardNo,PunchDatetime,MachineNo')->from('tran_machinerawpunch')->where('CardNo',$where['cardNo'])->where('PunchDatetime >=',$dateFrm)->where('PunchDatetime <=',$dateTo)->limit('1')->order_by('id',$where['order'])->get()->row();
			
			}
		public function shiftDetails($emp_id)
		{
				return $this->db->where('s.id',$emp_id)->select('sm.id,sm.shift_name,sm.shift_duration,sm.shift_start as shiftStart,sm.shift_end,sm.grace_periods')->from('staff as s')->join('shift_manage as sm', 'sm.id=s.shift','inner')->get()->row();
			}	
  public function isPayroll($where)
  {
	 $this->db->select("s.id,s.employee_id,CONCAT(IF(s.surname != '',s.surname,''), IF(s.surname != '' AND s.name != '', ' ', ''),s.name) AS empName,s.designation,s.salary_id,d.designation_name,s.branch_id");
	 $this->db->from("staff s")->join("employee_salary es", "s.id = es.employee_id AND es.month='".$where['sMonth']."' AND es.year='".$where['sYear']."'", "LEFT")->join('designation as d', 'd.id=s.designation', 'left');
	 $this->db->where("es.employee_id IS NULL")->where("s.status", "1")->where_in("s.user_type", array("4", "5"))/*->limit('10')*/;
	 $result = $this->db->get();
	 return $result->result();
	}
  public function isCountAttendance($where)
  {
	 $numDays=date('t', strtotime($where['sMonth'].'-'.$where['sYear']));
	 $frmDate=$where['sYear'].'-'.$where['sMonth'].'-01';
	 $lastDate=$where['sYear'].'-'.$where['sMonth'].'-'.$numDays;
	 $this->db->select("sf.employee_id,SUM(CASE WHEN sf.staff_attendance_type_id = '1' THEN 1 ELSE 0 END) AS tPresent,SUM(CASE WHEN sf.staff_attendance_type_id = '2' THEN 1 ELSE 0 END) AS tLate,SUM(CASE WHEN sf.staff_attendance_type_id = '5' THEN 1 ELSE 0 END) AS tHalf, SUM(CASE WHEN sf.staff_attendance_type_id = '3' THEN 1 ELSE 0 END) AS tAbsent");		 
	 $this->db->from("staff_attendance as sf")->where('sf.employee_id',$where['emp_id'])->where('sf.attendance_date >=',$frmDate)->where('sf.attendance_date <=',$lastDate);
	 $result = $this->db->get()->row();
	 if($result){$isPresent=$result?($result->tPresent+(.5*$result->tHalf)+(.5*$result->tLate)):0;}else{$isPresent=0;}
	 return $isPresent;
	}
}

?>
