<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Synchronise extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->sql_db = $this->load->database('sql_db', TRUE);
        $this->load->model(array('setting/synchronise_model'=>'synchronise'));
        ($this->session->userdata('mim_id')== '') ? redirect(base_url(), 'refresh') : '';
		$this->logId=$this->session->userdata('mim_id');
        error_reporting(0);		
	}
	public function index()
	{
		 $post=$this->input->post('actn');
		 if($post=='isCnfrm')
		  {
		  		$isCheckLastAttendance=$this->common->getLastRecord('tran_machinerawpunch');
				$punchID=$isCheckLastAttendance?$isCheckLastAttendance->Tran_MachineRawPunchId:'';
				print_r($isCheckLastAttendance);exit;//if($isCheckLastAttendance)
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
										 'viewinfo'=>$punch['viewinfo'],'showData'=>$punch['showData'],'Remark'=>$punch['Remark'],'DeviceIp_SRNo'=>$punch['DeviceIp_SRNo'],
										 'temp'=>$punch['temp']
										 );
							if($this->common->save_data('tran_MachineRawPunch',$createArr)){$liveSync=1;}else{$liveSync=0;}
						}
						if($liveSync==1){$data=array('adClas'=>'tSuccess','msg'=>array('Thank You ! you have successfully submitted.'),'icon'=>'<i class="si si-check"></i>');}
						else{$data=array('adClas'=>'tDefault','msg'=>array('Please refresh page to fetch live attendance.'),'icon'=>'<div class="spinrGlow deflt"></div>');}	
					}
				else{$data=array('adClas'=>'tWarning','msg'=>array('Oh it looks like attendance has already synchronized.'),'icon'=>'<div class="spinrGlow wrng"></div>');}
		 	}
			else{$data=array('adClas'=>'tDanger','msg'=>array('Oops it seems you have wrong way.'),'icon'=>'<div class="spinrGlow dngr"></div>');}
		  echo json_encode($data);
		}
	
}
