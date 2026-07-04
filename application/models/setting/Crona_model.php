<?php
class Crona_model  extends CI_Model
{
		public function __construct()
		{
			parent::__construct();
		}
		public function getRowDataFromHardware($where)
		{
			return $this->db->select('CardNo,,PunchDatetime,MachineNo,Dateime1')->from('tran_machinerawpunch')->where('CardNo',$where['cardNo'])->where('Dateime1',$where['curDate'])->limit('1')->order_by('id',$where['order'])->get()->row();
			
			}
		public function shiftDetails($emp_id)
		{
				return $this->db->where('s.id',$emp_id)->select('sm.id,sm.shift_name,sm.shift_duration,sm.shift_start as shiftStart,sm.shift_end,sm.grace_periods')->from('staff as s')->join('shift_manage as sm', 'sm.id=s.shift','inner')->get()->row();
			}	
}

?>
