<?php
class Staff_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}
	/*-------------------------------------------------------------*/
	public function staff_query($where = false, $empID = NULL)
	{

		$field = array('id', 'employee_id', 'staff_attendance_type_id');
		$i = 0;
		foreach ($field as $item) {
			if (!empty($where['search']['value'])) {
				if ($i === 0) {
					$this->db->group_start();
					$this->db->like($item, $where['search']['value']);
				} else {
					$this->db->or_like($item, $where['search']['value']);
				}
				if (count($field) - 1 == $i) {
					$this->db->group_end();
				}
			}
			$i++;
		}
		$this->db->select('*')->from('staff_attendance')->where('employee_id', $empID)->where('attendance_date <=', date('Y-m-d'));

		/*  if(!empty($where['state'])){
                $this->db->where('state',$where['state']);
            }
            if(!empty($where['brName'])){
                $this->db->where('staff_name',$where['brName']);
            }
            
*/
		if (!empty($where['attStatus'])) {
			$this->db->where('staff_attendance_type_id', $where['attStatus']);
		}
		if (!(empty($where['strtDt']) && empty($where['endDt']))) {
			$this->db->where('attendance_date >=', date('Y-m-d', strtotime($where['strtDt'])));
			$this->db->where('attendance_date <=', date('Y-m-d', strtotime($where['endDt'])));
		}

		if (!empty($where['yrWise'])) {
			$this->db->where('attendance_date >=', date('Y-m-d', strtotime($where['yrWise'] . '-01-01')));
			$this->db->where('attendance_date <=', date('Y-m-d', strtotime($where['yrWise'] . '-12-01')));
		}



		if (isset($where['order']) && !empty($where['order'])) {
			$this->db->order_by($field[$where['order']['0']['column']], $where['order']['0']['dir']);
		} else {

			$this->db->order_by('attendance_date', 'desc');
		}
	}

	public function staff_list($where = false, $empID = NULL)
	{

		$this->staff_query($where, $empID);

		if ($where['length'] != -1) {
			$this->db->limit($where['length'], $where['start']);
		}
		return $this->db->get()->result();
	}

	public function staff_count($empID = NULL)
	{

		$this->staff_query($where = false, $empID);
		return $this->db->get()->num_rows();
	}

	public function staff_filter_count($where = false, $empID = NULL)
	{

		$this->staff_query($where, $empID);
		return $this->db->get()->num_rows();
	}

	/*-------------------------------------------------------------*/

	public function shiftDetails($emp_id)
	{
		return $this->db->where('s.id', $emp_id)->select('sm.*')->from('staff as s')->join('shift_manage as sm', 'sm.id=s.shift', 'left')->get()->row();
	}

	public function isCheckShift($id)
	{
		$findShift = $this->db->where('s.id', $id)->where('attendance_date', date('Y-m-d'))->select('s.id,shift_duration,shift_start,shift_end,log_in_time,log_out_time,attendance_date,attendance_status')->from('shift_manage')->join('staff as s', 's.shift=shift_manage.id', 'left')->get()->row();
		if ($findShift) {
			if ($findShift->log_in_time) {
				if ($findShift->log_out_time == '') {

					if (strtotime(date("h:i:s a")) > strtotime($findShift->shift_end)) {
						$whereCon = array('employee_id' => $this->logId, 'attendance_date' => date('Y-m-d'));
						$logOut_time = strtotime(date("H:i:s"));
						$logIn_time = strtotime($findShift->log_in_time);
						$getTotalMinute = round(abs($logIn_time - $logOut_time) / 60, 2);
						$workingHrs = round(($getTotalMinute / 60), 2);
						$current_shift = explode(' ', $findShift->shift_duration);
						$duration = $current_shift[0];
						if (($workingHrs > $duration / 2) && ($workingHrs < $duration)) {
							if (($workingHrs > $duration / 2) && ($workingHrs > $duration * 0.9)) {
								$workingPeriod = '1';
							} else if (($workingHrs > $duration * .75) && ($workingHrs < $duration * 0.9)) {
								$workingPeriod = '2';
							} else {
								$workingPeriod = '5';
							}
						} else if ($workingHrs > $duration) {
							$workingPeriod = '1';
						} else {
							$workingPeriod = '3';
						}
						$toWorkingPreiodArr = array('log_out_time' => date("H:i:s"), 'staff_attendance_type_id' => $workingPeriod);
						$mrkAttArr = array('log_out_time' => date("H:i:s"), 'attendance_status' => $workingPeriod);
						if ($this->update_record('staff_attendance', $whereCon, $toWorkingPreiodArr)) {
							$this->update_record('staff', array('id' => $this->logId), $mrkAttArr);
						}
					}
				}
			}
		}
	}
	private function update_record($table, $con, $data)
	{
		$this->db->where($con);
		if ($this->db->update($table, $data)) {
			return true;
		} else {
			return false;
		}
	}
	public function overViewThisMonth($empId)
	{
		$getDetails = array();
		$lastDyInMnth = date("Y-m-t");
		$nHolidy = $this->db->where('holiday_date >=', date('Y-m') . '-01')->where('holiday_date <=', $lastDyInMnth)->select('count(*) as feast')->from('temp_holidays')->get()->row();
		if ($nHolidy) {
			$getDetails['dayOff'] = $nHolidy->feast;
			$getTdays = array('01' => '31', '02' => '28', '03' => '31', '04' => '30', '05' => '31', '06' => '30', '07' => '31', '08' => '31', '09' => '30', '10' => '31', '11' => '30', '12' => '31');
			if ($nHolidy->feast) {
				$wrkngDy = (int)$getTdays[date('m')];
				$getDetails['wrkngDy'] = $wrkngDy - $nHolidy->feast;
			} else {
				$getDetails['wrkngDy'] = '0';
			}
		}
		$nPresent = $this->db->where('employee_id', $empId)->where('staff_attendance_type_id', '1')->where('attendance_date >=', date('Y-m') . '-01')->where('attendance_date <=', $lastDyInMnth)->select('count(*) as p')->from('staff_attendance')->get()->row();
		if ($nPresent) {
			$getDetails['present'] = $nPresent->p;
		} else {
			$getDetails['present'] = '0';
		}
		$nAbsent = $this->db->where('employee_id', $empId)->where('staff_attendance_type_id', '3')->where('attendance_date >=', date('Y-m') . '-01')->where('attendance_date <=', $lastDyInMnth)->select('count(*) as a')->from('staff_attendance')->get()->row();
		if ($nAbsent) {
			$getDetails['absent'] = $nAbsent->a;
		} else {
			$getDetails['absent'] = '0';
		}
		$nHalfDy = $this->db->where('employee_id', $empId)->where('staff_attendance_type_id', '5')->where('attendance_date >=', date('Y-m') . '-01')->where('attendance_date <=', $lastDyInMnth)->select('count(*) as hfdy')->from('staff_attendance')->get()->row();
		if ($nHalfDy) {
			$getDetails['halfDy'] = $nHalfDy->hfdy;
		} else {
			$getDetails['halfDy'] = '0';
		}
		$nLateDy = $this->db->where('employee_id', $empId)->where('staff_attendance_type_id', '2')->where('attendance_date >=', date('Y-m') . '-01')->where('attendance_date <=', $lastDyInMnth)->select('count(*) as ltdy')->from('staff_attendance')->get()->row();
		if ($nLateDy) {
			$getDetails['lateDy'] = $nLateDy->ltdy;
		} else {
			$getDetails['lateDy'] = '0';
		}
		return $getDetails;
	}
	public function getRowCount($id)
	{
		return $this->db->where('emp_id', $id)->select('GROUP_CONCAT(id SEPARATOR "----") as id')->from('employee_document')->get()->row();
	}
	public function getEmployeeDetails($id)
	{
		return $this->db->select('branch_name,department_name,designation_name,s.*,blood.name as blood_group')
		->from('staff as s')
		->where('s.id', $id)
		->join('branch_manage as br', 's.branch_id=br.id', 'left')
		->join('department as dep', 'dep.id=s.department', 'left')
		->join('designation as desig', 'desig.id=s.designation', 'left')
		->join('blood_group as blood', 'blood.id=s.blood_group_id',"left")
		->get()->row();
	}
	public function getCreditLeaveData($id)
	{
		return $this->db->select('group_concat(concat(id,"==",credit_type,"==",leave_credit,"==",CASE credit_type WHEN "1" THEN "Yearly" WHEN "2" THEN "Quarterly" WHEN "3" THEN "Monthly" WHEN "4" THEN "Weekly" ELSE "NO" END) SEPARATOR ",") as approvLeave')->from('leave_manage')->where('id', $id)->get()->row();
	}
	public function getCreditLeaveDataByArr($id)
	{
		return $this->db->select('group_concat(concat(id,"==",credit_type,"==",leave_credit,"==",CASE credit_type WHEN "1" THEN "Yearly" WHEN "2" THEN "Quarterly" WHEN "3" THEN "Monthly" WHEN "4" THEN "Weekly" ELSE "NO" END) SEPARATOR ",") as approvLeave')->from('leave_manage')->where_in('id', $id)->get()->row();
	}
	public function getNewAprovedLeave($id)
	{
		return $this->db->select('group_concat(leave_name separator "," ) as aprLeave')->from('leave_manage')->where_in('id', $id)->get()->row();
	}

	public function feedback_query($where = false, $empID = NULL)
	{

		$field = array('ef.emp_id', 'ef.heading', 'ef.message', 'ef.created_date');
		$i = 0;
		foreach ($field as $item) {
			if (!empty($where['search']['value'])) {
				if ($i === 0) {
					$this->db->group_start();
					$this->db->like($item, $where['search']['value']);
				} else {
					$this->db->or_like($item, $where['search']['value']);
				}
				if (count($field) - 1 == $i) {
					$this->db->group_end();
				}
			}
			$i++;
		}
		$this->db->select('ef.*,employee_id,name,surname')->from('employee_feedback as ef')->join('staff as s', 's.id = ef.emp_id', 'left')->where('ef.emp_id', $empID);


		/*            if(!empty($where['leaveID'])){ $this->db->where('leaveID',$where['leaveID']);}
      		if(!empty($where['leaveName'])){$this->db->where('leave_name',$where['leaveName']);}
            if((!empty($where['leaveSts'])) && ($where['leaveSts']!="99")){$this->db->where('status',$where['leaveSts']);}*/

		if (isset($where['order']) && !empty($where['order'])) {
			$this->db->order_by($field[$where['order']['0']['column']], $where['order']['0']['dir']);
		} else {

			$this->db->order_by('ef.id', 'desc');
		}
	}
	public function feedback_list($where = false, $empID = NULL)
	{
		$this->feedback_query($where, $empID);
		if ($where['length'] != -1) {
			$this->db->limit($where['length'], $where['start']);
		}
		return $this->db->get()->result();
	}
	public function feedback_count($empID = NULL)
	{
		$this->feedback_query($where = false, $empID);
		return $this->db->get()->num_rows();
	}
	public function feedback_filter_count($where = false, $empID = NULL)
	{
		$this->feedback_query($where, $empID);
		return $this->db->get()->num_rows();
	}


	public function getFrPerformance($id)
	{
		$this->db->select('emp_fd.id,emp_fd.emp_id,s.name,s.surname,d.designation_name,s.image,emp_fd.heading,emp_fd.message,emp_fd.created_date');
		$this->db->where('emp_fd.id', $id)->join('staff as s', 's.id=emp_fd.emp_id', 'inner')->join('designation as d', 'd.id = s.designation', 'left');
		$value = $this->db->get('employee_feedback as emp_fd');
		return $value->row_array();
	}
	/*SELECT  FROM employee_feedback_remark as empFr inner join staff as s on s.id=empFr.created_by */
	public function getPerformRemarks($id)
	{
		$this->db->select('empFr.id,empFr.remarks,empFr.created_by,empFr.created_type,empFr.created_date,s.surname,s.name,s.image');
		$this->db->where('empFr.feedback_id', $id)->join('staff as s', 's.id=empFr.created_by', 'inner');
		$value = $this->db->get('employee_feedback_remark as empFr');
		return $value->result();
	}
}
