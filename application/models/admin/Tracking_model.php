<?php

class Tracking_model extends CI_Model
{

	public function __construct()
	{

		parent::__construct();
		$this->logCat=$this->session->userdata('user_cate');
	    $this->logBr=$this->session->userdata('mi_brID');
	}

	/*-----------------------------Daily Attendance Start-------------------------------*/
public function findEmployeeByNmID($id)
{
	if(!preg_match("/^[a-zA-Z\s, ]+$/",$id))
	{
		$this->db->select('id,employee_id,name,shift')->from('staff')->where_not_in('user_type',array('1','2','3'))->like('employee_id',$id);
		if($this->logCat=='5'){$this->db->where('branch_id',$this->logBr)->where('user_type','4');}
		return $this->db->get()->result();
		} 
	else
	{
			$this->db->select('id,employee_id,name,shift')->from('staff')->where_not_in('user_type',array('1','2','3'))->like('name',$id);
			if($this->logCat=='5'){$this->db->where('branch_id',$this->logBr)->where('user_type','4');}
			return $this->db->get()->result();
		}
	}		
public function findLocationDetails($id)
{
	return $this->db->query("SELECT TRIM(SUBSTRING(location, 1, INSTR(location, ',') - 1)) AS lat, TRIM(SUBSTRING(location, INSTR(location, ',') + 1)) AS lng FROM location_tracking_daily WHERE staff_id = '".$id."' and create_date = '".date('Y-m-d')."'")->result();
	}

}
