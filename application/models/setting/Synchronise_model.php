<?php
    class Synchronise_model  extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
        }
/*-----------------------------Hardware Synchronisation Start-------------------------------*/
	public function getLiveRecordList($where)
	{
		
		/*INSERT INTO tran_machinerawpunch(Tran_MachineRawPunchId, CardNo, PunchDatetime, P_Day, ISManual, PayCode, MachineNo, Dateime1, id_m, empid, in_out, senddata, OutPunch, Checkin, Checkout, CheckinOut, viewinfo, showData, Remark, DeviceIp_SRNo, temp) SELECT Tran_MachineRawPunchId, CardNo, PunchDatetime, P_Day, ISManual, PayCode, MachineNo, Dateime1, id_m, empid, in_out, senddata, OutPunch, Checkin, Checkout, CheckinOut, viewinfo, showData, Remark, DeviceIp_SRNo, temp FROM dummy_machinerawpunch*/
		$this->db->select('*')->from('dummy_machinerawpunch');
		if($where['punchID']){$this->db->where('Tran_MachineRawPunchId >',$where['punchID'])->where('MachineNo','1');}
		$this->db->order_by('Tran_MachineRawPunchId', 'ASC');
		$data = $this->db->get();
		return $data->result_array();
		/*
		$this->sql_db->select('*')->from('Tran_MachineRawPunch');
		if($where['punchID']){$this->sql_db->where('Tran_MachineRawPunchId >',$where['punchID'])->where('MachineNo','1');}
		$this->sql_db->order_by('Tran_MachineRawPunchId', 'ASC');
		$data = $this->sql_db->get();
		return $data->result_array();
		*/
		
		}
/*-----------------------------Hardware Synchronisation Start-------------------------------*/
    public function getRowDataFromHardware($where)
	{
		$dateFrm=$where['curDate'].' 00:00:00';$dateTo=$where['curDate'].' 23:59:59';
	return $this->db->select('CardNo,PunchDatetime,MachineNo')->from('tran_machinerawpunch')->where('CardNo',$where['cardNo'])->where('PunchDatetime >=',$dateFrm)->where('PunchDatetime <=',$dateTo)->limit('1')->order_by('id',$where['order'])->get()->row();
		}
	public function shiftDetails($emp_id)
	{
		return $this->db->where('s.id',$emp_id)->select('sm.id,sm.shift_name,sm.shift_duration,sm.shift_start as shiftStart,sm.shift_end,sm.grace_periods')->from('staff as s')->join('shift_manage as sm', 'sm.id=s.shift','inner')->get()->row();
		}		
		
		
    }

?>