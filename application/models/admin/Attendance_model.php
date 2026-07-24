<?php

class Attendance_model extends CI_Model
{

	public function __construct()
	{

		parent::__construct();
		$this->logCat = $this->session->userdata('user_cate');
		$this->logBr = $this->session->userdata('mi_brID');
	}

	/*-----------------------------Daily Attendance Start-------------------------------*/

	public function daily_attendance_query($where = false, $cShift = NULL)
	{

		$field = array(
			's.id',
			's.employee_id',
			's.name',
			's.status',
			's.attendance_status',
			's.log_in_time',
			's.log_out_time',
			'sm.shift_name',
			'sm.shift_start',
			'sm.shift_end'
		);
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

		$this->db->join('shift_manage as sm', 'sm.id = s.shift', 'left');
		$this->db->select('s.id,s.biometric_id,s.employee_id, s.name, s.status, s.attendance_status, s.log_in_time, s.log_out_time,s.shift, sm.shift_name,sm.shift_start, sm.shift_end')->from('staff as s');
		if (($this->logCat != '5') && ($this->logCat != '4')) {
			$this->db->where_in('s.user_type', array('4', '5'));
		} else {
			$this->db->where('s.branch_id', $this->logBr)->where('s.user_type', '4');
		}

		if ((!empty($where['shiftDet'])) && ($where['shiftDet'] != "all")) {
			$this->db->where('shift', $where['shiftDet']);
		} else {
			if ($cShift) {
				$this->db->where('shift', $cShift);
			}
		}


		if (!empty($where['employID'])) {
			$this->db->where('employee_id', substr($where['employID'], 3, 6));
		}
		if (!empty($where['employName'])) {
			$this->db->where('name', $where['employName']);
		}
		/*    if(!(empty($where['strtDt']) && empty($where['endDt'])))
            {
                $this->db->where('created_at >=',$where['strtDt']);
                $this->db->where('created_at <=',$where['endDt']);
            }*/

		if (isset($where['order']) && !empty($where['order'])) {
			$this->db->order_by($field[$where['order']['0']['column']], $where['order']['0']['dir']);
		} else {

			$this->db->order_by('id', 'desc');
		}
	}

	public function daily_attendance_list($where = false, $cShift = NULL)
	{

		$this->daily_attendance_query($where, $cShift);

		if ($where['length'] != -1) {
			$this->db->limit($where['length'], $where['start']);
		}
		return $this->db->get()->result();
	}

	public function daily_attendance_count($cShift = NULL)
	{

		$this->daily_attendance_query($where = false, $cShift);
		return $this->db->get()->num_rows();
	}

	public function daily_attendance_filter_count($where = false, $cShift = NULL)
	{

		$this->daily_attendance_query($where, $cShift = NULL);
		return $this->db->get()->num_rows();
	}

	public function get_employee_data($id)
	{
		return $this->db->select('emp.id,emp.biometric_id,emp.employee_id,emp.name,emp.attendance_status,emp.attendance_date,emp.log_in_time,emp.log_out_time,sf.shift_start,sf.shift_end')->from('staff as emp')->where('emp.id', $id)->join('shift_manage as sf', 'sf.id=emp.shift', 'left')->get()->row_array();
	}

	public function getHolidaysListInMonth($startDate = NULL, $endDate = NULL)
	{
		return $this->db
			->select('id, from_date, to_date')
			->from('holidays')
			->where('from_date >=', $startDate)
			->where('to_date <=', $endDate)
			->where('status', '1')
			->get()
			->result();
	}


	public function isHolidaysListInMonth($startDate = NULL, $endDate = NULL)
	{
		return $this->db->select('id,holiday_id,attendance_date')->where('attendance_date >=', $startDate)->where('attendance_date <=', $endDate)->where('holiday_id !=', 'NULL')->group_by('holiday_id')->get('staff_attendance')->result();
	}
	public function getHolidaysDataInMonth($today)
	{
		return $this->db
			->select('id, from_date, to_date')
			->where('from_date <=', $today)
			->where('to_date >=', $today)
			->where('status', '1')
			->get('holidays')
			->result();
	}

	public function isHolidaysDataSetInMonth($today)
	{
		return $this->db
			->select('holiday_id,attendance_date')
			->where('attendance_date', $today)
			->where('holiday_id !=', NULL)
			->group_by('holiday_id')
			->get('staff_attendance')
			->result();
	}

	public function getEmployeeWithShift()
	{
		//SELECT emp.id,sm.shift_name,sm.shift_start,sm.shift_end FROM staff as emp left join shift_manage as sm on sm.id=emp.shift where emp.status='1' 
		return $this->db->select('emp.id,sm.shift_name,sm.shift_start,sm.shift_end')->from('staff as emp')->where('emp.status', '1')->join('shift_manage as sm', 'sm.id=emp.shift', 'left')->get()->result();
	}

	public function get_attendance_last($where)
	{
		return $this->db->select('id,log_in_time,staff_attendance_type_id,log_out_time')->where($where)->get('staff_attendance')->row();
	}
	// ===========================Attendance Report List Start @mit Singh============================


	public function employeeAttendance_query($where = false, $cShift = NULL)
	{

		$field = array('id', 's.employee_id', 's.name', 's.status', 's.attendance_status', 's.log_in_time', 's.log_out_time');
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
		$this->db->select('s.id,s.employee_id,s.name,s.status,s.attendance_status,s.log_in_time,s.log_out_time')->from('staff as s');
		if ($this->logCat == '5') {
			$this->db->where('s.branch_id', $this->logBr)->where('s.user_type', '4');
		}
		if ((!empty($where['shiftDet'])) && ($where['shiftDet'] != "all")) {
			$this->db->where('shift', $where['shiftDet']);
		}/*else {$this->db->where('shift',$cShift);}*/
		/*	if(!empty($where['employID'])){
                $this->db->where('employee_id',substr($where['employID'],3,6));
            }
            if(!empty($where['employName'])){
                $this->db->where('name',$where['employName']);
            }
            if(!(empty($where['strtDt']) && empty($where['endDt'])))
            {
                $this->db->where('created_at >=',$where['strtDt']);
                $this->db->where('created_at <=',$where['endDt']);
            }*/

		if (isset($where['order']) && !empty($where['order'])) {
			$this->db->order_by($field[$where['order']['0']['column']], $where['order']['0']['dir']);
		} else {

			$this->db->order_by('id', 'desc');
		}
	}

	public function employeeAttendanceList($where = false, $cShift = NULL)
	{

		$this->employeeAttendance_query($where, $cShift);

		if ($where['length'] != -1) {
			$this->db->limit($where['length'], $where['start']);
		}
		return $this->db->get()->result();
	}

	public function employeeAttendance_count($cShift = NULL)
	{

		$this->employeeAttendance_query($where = false, $cShift);
		return $this->db->get()->num_rows();
	}

	public function employeeAttendance_filter_count($where = false, $cShift = NULL)
	{

		$this->employeeAttendance_query($where, $cShift);
		return $this->db->get()->num_rows();
	}

	public function get_empWorking($where)
	{
		return $this->db->select('id,staff_attendance_type_id,log_in_time,log_out_time')->where('employee_id', $where['emp_id'])->where('attendance_date', $where['attendanceDate'])->get('staff_attendance')->row();
	}


	public function empAttendance($where)
	{
		return $this->db->select('count(id) as total')->where('employee_id', $where['emp_id'])->where('staff_attendance_type_id', $where['typeID'])->where('attendance_date >=', $where['strtDt'])->where('attendance_date <=', $where['endDt'])->get('staff_attendance')->row();
	}



	// ===========================Attendance Report List End @mit Singh============================	
	public function empWiseAttendance_query($where = false)
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
		$this->db->select('*')->from('staff_attendance')->where('employee_id', $where['empId']); //->where('attendance_date <=',date('Y-m-d'))
		if (empty($where['empAttDate']) && empty($where['attMonth']) && empty($where['attYear'])) {
			$curentMonthYear = date('Y-m');
			$dayInMonth = date("t", strtotime($curentMonthYear));
			$this->db->where('attendance_date >=', $curentMonthYear . '-01')->where('attendance_date <=', $curentMonthYear . '-' . $dayInMonth);
		}
		if (!empty($where['empAttDate'])) {
			$this->db->where('attendance_date', date('Y-m-d', strtotime(str_replace("/", "-", $where['empAttDate']))));
		}
		if (!(empty($where['attMonth']) && empty($where['attYear']))) {
			$selectMnthYear = date("Y-m-", strtotime($where['attYear'] . '-' . $where['attMonth']));
			$dayInMonth = date("t", strtotime($where['attYear'] . '-' . $where['attMonth']));
			$this->db->where('attendance_date >=', $selectMnthYear . '01')->where('attendance_date <=', $selectMnthYear . $dayInMonth);
		}

		/*	
            if(!empty($where['employName'])){
                $this->db->where('name',$where['employName']);
            }
            if(!(empty($where['strtDt']) && empty($where['endDt'])))
            {
                $this->db->where('created_at >=',$where['strtDt']);
                $this->db->where('created_at <=',$where['endDt']);
            }*/

		if (isset($where['order']) && !empty($where['order'])) {
			$this->db->order_by($field[$where['order']['0']['column']], $where['order']['0']['dir']);
		} else {
			$this->db->order_by('attendance_date', 'desc');
		}
	}

	public function empWiseAttendanceList($where = false)
	{
		$this->empWiseAttendance_query($where);
		if ($where['length'] != -1) {
			$this->db->limit($where['length'], $where['start']);
		}
		return $this->db->get()->result();
	}

	public function empWiseAttendance_count($where = false)
	{
		$this->empWiseAttendance_query($where);
		return $this->db->get()->num_rows();
	}

	public function empWiseAttendance_filter_count($where = false)
	{
		$this->empWiseAttendance_query($where);
		return $this->db->get()->num_rows();
	}
	public function findEmployeeByNmID($id)
	{
		if (!preg_match("/^[a-zA-Z\s, ]+$/", $id)) {
			$this->db->select('id,employee_id,name,shift')->from('staff')->like('employee_id', $id)->where('user_type', '4');
			if ($this->logCat == '5') {
				$this->db->where('branch_id', $this->logBr)->where('user_type', '4');
			}
			return $this->db->get()->result();
		} else {
			$this->db->select('id,employee_id,name,shift')->from('staff')->like('name', $id);
			if ($this->logCat == '5') {
				$this->db->where('branch_id', $this->logBr)->where('user_type', '4');
			}
			return $this->db->get()->result();
		}
	}
	public function getEmployeeDetail($id)
	{
		return $this->db->select('id,employee_id,name,shift')->from('staff')->like('id', $id)->get()->row();
	}

	public function getEmployeeAttendance($where)
	{
		$return = array();
		$num_sundays = '';

		$isPresent = $this->db->select('count(id) as p')->from('staff_attendance')->where('staff_attendance_type_id', '1')->where('employee_id', $where['id'])->where('attendance_date >=', $where['strtDt'])->where('attendance_date <=', $where['endDt'])->get()->row();

		$isLate = $this->db->select('count(id) as l')->from('staff_attendance')->where('staff_attendance_type_id', '2')->where('employee_id', $where['id'])->where('attendance_date >=', $where['strtDt'])->where('attendance_date <=', $where['endDt'])->get()->row();

		$isHfDy = $this->db->select('count(id) as hf')->from('staff_attendance')->where('staff_attendance_type_id', '5')->where('employee_id', $where['id'])->where('attendance_date >=', $where['strtDt'])->where('attendance_date <=', $where['endDt'])->get()->row();

		$isAbsent = $this->db->select('count(id) as ab')->from('staff_attendance')->where('staff_attendance_type_id', '3')->where('employee_id', $where['id'])->where('attendance_date >=', $where['strtDt'])->where('attendance_date <=', $where['endDt'])->get()->row();

		$byCompanyLeave = $this->db
			->select('COUNT(id) AS byCmpnyLv')
			->from('holidays')
			->where('status', '1')
			->where('from_date >=', $where['strtDt'])
			->where('from_date <=', $where['endDt'])
			->where('DAYOFWEEK(from_date) !=', 1) // Exclude Sundays
			->get()
			->row();


		for ($i = 0; $i < ((strtotime($where['endDt']) - strtotime($where['strtDt'])) / 86400); $i++) {
			if (date('l', strtotime($where['strtDt']) + ($i * 86400)) == 'Sunday') {
				$num_sundays++;
			}
		}
		$present = $isPresent->p;
		$late = $isLate->l;
		$hfDy = $isHfDy->hf;
		$absent = $isAbsent->ab;
		$byCmpnyLv = $byCompanyLeave->byCmpnyLv;
		$tWorkingDay = $where['dayInMonth'] - ($byCmpnyLv + $num_sundays);
		$return = array('tWorking' => $tWorkingDay, 'present' => $present, 'absent' => $absent, 'hfDy' => $hfDy, 'late' => $late, 'holiday' => ($byCmpnyLv + $num_sundays));
		return $return;
	}
	/****************************************************************************************************/
	public function getRowDataFromHardware($where)
	{
		return $this->db->select('CardNo,,PunchDatetime,MachineNo,Dateime1')->from('tran_machinerawpunch')->where('CardNo', $where['cardNo'])->where('Dateime1', $where['curDate'])->limit('1')->order_by('id', $where['order'])->get()->row();
	}
	public function shiftDetails($emp_id)
	{
		return $this->db->where('s.id', $emp_id)->select('sm.*')->from('staff as s')->join('shift_manage as sm', 'sm.id=s.shift', 'left')->get()->row();
	}
	/***************************************************************************************************/
	public function custom_attendance_query($where = false)
	{

		$field = array('id', 's.employee_id', 's.name', 's.status', 's.attendance_status', 's.log_in_time', 's.log_out_time');
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
		$this->db->select('s.id,s.employee_id,s.name,s.status,s.attendance_status,s.log_in_time,s.log_out_time')->from('staff as s');
		if ($this->logCat == '5') {
			$this->db->where('s.branch_id', $this->logBr)->where('s.user_type', '4');
		}
		//if((!empty($where['shiftDet'])) && ($where['shiftDet']!="all")){$this->db->where('shift',$where['shiftDet']);}else {$this->db->where('shift',$cShift);}

		if (!empty($where['fieldSrchIDorName'])) {
			$this->db->where('employee_id', $where['fieldSrchIDorName']);
		}

		/*	
            if(!empty($where['employName'])){
                $this->db->where('name',$where['employName']);
            }
            if(!(empty($where['strtDt']) && empty($where['endDt'])))
            {
                $this->db->where('created_at >=',$where['strtDt']);
                $this->db->where('created_at <=',$where['endDt']);
            }*/

		if (isset($where['order']) && !empty($where['order'])) {
			$this->db->order_by($field[$where['order']['0']['column']], $where['order']['0']['dir']);
		} else {

			$this->db->order_by('id', 'desc');
		}
	}

	public function customAttendanceList($where = false, $cShift = NULL)
	{

		$this->custom_attendance_query($where, $cShift);

		if ($where['length'] != -1) {
			$this->db->limit($where['length'], $where['start']);
		}
		return $this->db->get()->result();
	}

	public function custom_attendance_count()
	{

		$this->custom_attendance_query($where = false);
		return $this->db->get()->num_rows();
	}

	public function custom_attendance_filter_count($where = false)
	{
		$this->custom_attendance_query($where);
		return $this->db->get()->num_rows();
	}
}
