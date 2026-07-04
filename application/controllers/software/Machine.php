<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Machine extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
             $this->load->model('setting/machine_model', 'machine');
			($this->session->userdata('mim_id')== '') ? redirect(base_url(), 'refresh') : '';
            error_reporting(0);	  
        }  
/***********************************Code by @mit Singh start***********************************************/
 public function index($actn=NULL)
 {
	if($actn=='view')  	 
	{
			$post_data = $this->input->post();
            $record = $this->machine->machine_list($post_data);
			$i=$post_data['start'] + 1;
            $return['data'] = array();
            foreach ($record as $row) {
				$status = ($row->status == 1) ? '
                <a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===software/machine/manage==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to De-Active " id="arvs--'.$row->id.'">Active</a>'
                :
                '<a href="javascript:void()" data-id="miStatusView===software/machine/manage==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-danger getAction" id="arvs--'.$row->id.'">Deactive</a>';
				
				$view = '<div style="text-align:center">
				<a href="javascript:void(0);" style="margin-left:-13px;" data-id="sinkLiveData===software/machine/manage==='.$row->id.'" title="Refresh Live Data" class="btn ripple btn-sm arvAction miRfr" id="snk0'.$row->id.'"><i class="si si-refresh header-icons"></i></a>
							<a href="javascript:void(0);" data-id="miMachineView===software/machine/manage==='.$row->id.'" title="Click to view machine details" class="btn ripple miView btn-sm getAction" id="vwM0'.$row->id.'"><i class="ti-eye"></i></a>&emsp;

                <a href="javascript:void(0);" data-id="miBrEdt===software/machine/manage==='.$row->id.'" style="margin-left:-13px;"  title="Click to Update Details" class="btn ripple btn-secondary btn-sm getAction" id="edM0'.$row->id.'"><i class="ti-pencil-alt"></i></a></div>';

				$color=($row->connection_mode=='LAN')?'#007480':'#eeb50a';
                $return['data'][]=array('<strong>'.$i++.'.</strong>',
										'<span style="font-weight:700;color:#b70092;">'.$row->code.'</span>',
										$row->machine_brand,
										$row->machine_model_no,
										'<span style="font-weight:700;color:#848484;">'.$row->machine_ip_address.'</span>',
										'<span style="font-weight:700;text-transform: capitalize;color:'.$color.'">'.$row->connection_mode.'</span>',
										$status,
										$view
										);

            }
            $return['recordsTotal'] = $this->machine->machine_count();
            $return['recordsFiltered'] = $this->machine->machine_filter_count($post_data);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);
			}
	else
	{		
	 	$getLast=$this->common->get_last('machine_setup','code');if($getLast){$lastID=str_replace("DV","",$getLast['code']);$lastID+=1;
	    if($lastID < 9){$newMachineID='DV000'.$lastID;}else if($lastID < 99){$newMachineID='DV00'.$lastID;}else if($lastID < 999){$newMachineID='DV0'.$lastID;}
		else{$newMachineID='DV'.$lastID;}}else{$newMachineID='L0001';}
		$data['branchLIst'] = $this->db->select('id,branch_name,status')->from(' branch_manage')->where('status',1)->get()->result_array();
		$data['getState']=$this->common->getDataList('states_cities','parent_id','729');
		$data['newMachineID']=$newMachineID;
		$data['addMachine'] = 'addNew';
	 	$data['title']      = 'Machine Setup';
	 	$data['breadcrumb'] = 'Machine Manage';
		$data['target']     = 'software/machine/index/view';
	 	$data['layout']     = "software/machine/setup.php";
	 	$this->load->view('base',$data);
 		}
	} 


 public function manage()
 {	 
	 $post=$this->input->post();
	 if($post['oprType']=='addNew')
	 {
	 	  $this->form_validation->set_rules('machineBrand', 'Machine Brand', 'trim|required|xss_clean');
		  $this->form_validation->set_rules('machineDeviceNo', 'Device Number', 'trim|required|xss_clean');
		  $this->form_validation->set_rules('machineModelNo', 'Device Number', 'trim|required|xss_clean');
		  $this->form_validation->set_rules('machineLocation', 'Location', 'trim|required|xss_clean');
		  $this->form_validation->set_rules('get_state', 'State', 'trim|required|xss_clean');
		  $this->form_validation->set_rules('zipCode', 'Zipcode', 'trim|required|xss_clean');
		  $this->form_validation->set_rules('machineRemarks', 'Remark', 'trim|required|xss_clean');
		  $this->form_validation->set_rules('machineIpAddr','Machine IP Address','trim|required|xss_clean|callback_valid_ip');
		  if($this->form_validation->run()==TRUE) 
		  {
		  		sleep(2);
				$machineArr=array(
								 'code'=>$post['gtMchneCode'],
								 'machine_brand '=>$post['machineBrand'],
								 'device_id'=>$post['machineDeviceNo'],
								 'machine_model_no'=>$post['machineModelNo'],
								 'machine_ip_address'=>$post['machineIpAddr'],
								 'machine_port_no '=>$post['machinePort'],
								 'machine_location '=>$post['machineLocation'],
								 'connection_mode'=>$post['con_mode'],
								 'serial_no'=>$post['machineSno'],
								 'branch_name'=>$post['branchName'],
								 'state'=>$post['get_state'],
								 'district '=>$post['district'],
								 'zipcode '=>$post['zipCode'],
								 'remark '=>$post['machineRemarks'],
								 'created_date'=>date('Y-m-d h:i:s'),
								 );

			  if($this->common->save_data('machine_setup',$machineArr))
			   {$data=array('addClas'=>'tst_success','msg'=>array('Thank You! you have successfully create new machine.'),'icon'=>'<i class="ti-check-box"></i>');}
			  else{$data=array('addClas'=>'tst_warning','msg'=>array('Oops it seems something went wrong. Please refresh it.'),'icon'=>'<i class="fe fe-settings bx-spin"></i>');}
	 		}
			else
			{
			$msg=array(
			'machineBrand'=>form_error('machineBrand'),'machineDeviceNo'=>form_error('machineDeviceNo'),'machineLocation'=>form_error('machineLocation'),'machineIpAddr'=>form_error('machineIpAddr'),'get_state'=>form_error('get_state'),'zipCode'=>form_error('zipCode'),'machineRemarks'=>form_error('machineRemarks'),);	
			$data=array('addClas'=>'tst_danger','msg'=>$msg,'icon'=>'<i class="fe fe-settings bx-spin"></i>');
			}
		}
	 else if($post['oprType']=='miStatusView')
	 {
			$getData=$this->common->getRowData('machine_setup','id',$post['id']);
			if($getData)
			{
				if($getData->status=='1')
				{	
					$data=array('msg'=>'<i class="si si-power"></i> Are you sure want to deactivate '.$getData->machine_brand.' of Leave ID #'.$getData->code,
								'action'=>'miStatusChange===software/machine/manage==='.$getData->id);
					}
					else
					{
						$data=array('msg'=>'Are you sure want to activate '.$getData->machine_brand.' of Leave ID #'.$getData->code,
									'action'=>'miStatusChange===software/machine/manage==='.$getData->id);
					}
				}
			  else{$data=array('msg'=>'<span class="text-danger">Oops it seems something went wrong</span>');}
			}
	 elseif($post['oprType']=='miStatusChange')
	 {
			sleep(.5);
			$getData=$this->common->getRowData('machine_setup','id',$post['id']);
			if($getData->status=='1')
			{
				$change='2';$data=array('msg'=>'<span class="text-success"><i class="si si-power"></i> You have successfully deactivate '.$getData->machine_brand.' of Leave ID #'.$getData->code.'</span>','btnTxt'=>'Deactive','btnAdCls'=>'bg-danger ','btnRmvCls'=>'bg-success miLvs');
				}
				else
				{
					$change='1';$data=array('msg'=>'<span class="text-success">You have successfully activate '.$getData->machine_brand.' of Leave ID #'.$getData->code.'</span>','btnTxt'=>'Active','btnAdCls'=>'bg-success miLvs','btnRmvCls'=>'bg-danger');
					}
					$changeArr=array('status'=>$change,'modified_date'=>date('Y-m-d'),'modified_by'=>$this->logID,'modified_typ'=>$this->cat);
					$result=$this->common->update_data('machine_setup',array('id'=>$post['id']),$changeArr);
					if($result){$data=$data;}else{$data=array('msg'=>'<span class="text-danger">Oops it seems something went wrong while updating.</span>');}
			}	
	 elseif($post['oprType']=='miMachineView' || $post['oprType']=='miBrEdt')
	 {
		$getData=$this->common->getRowData('machine_setup','id',$post['id']);
		if($getData)
		{
			$getDist=NULL;$getStat=NULL;$getData->addClas='tst_success';$data=$getData;
			$getParameter=$this->machine->getStateDistrict($getData->state);	
			if($getParameter)
			{
				$getStat='<option value=" "> Choose one </option>';	
				$getDist.='<option value=" "> Choose one </option>';
				foreach($getParameter as $list)
				{
					if($list->parent_id=='729')
					{
						if($list->id==$getData->state){$getStat.='<option value="'.$list->id.'" selected="selected">'.$list->state_cities.'</option>';}
						else{$getStat.='<option value="'.$list->id.'">'.$list->state_cities.'</option>';}
						}
						else
						{
							if($list->id==$getData->district){$getDist.='<option value="'.$list->id.'" selected="selected">'.$list->state_cities.'</option>';}
						    else{$getDist.='<option value="'.$list->id.'">'.$list->state_cities.'</option>';}
							}
					}
				}
				else{$getDist='<option value=" "> Choose one </option>';$getStat='<option value=" "> Choose one </option>';	}
				$getData->getDistrict=$getDist;$getData->getState=$getStat;	
			}
		else{$data=array('addClas'=>'tst_danger','msg'=>array('Oops it seems something went wrong while updating.'),'icon'=>'<i class="fe fe-settings bx-spin"></i>');}
		}
	 else if($post['oprType']=='updateBrDet')			
	 {
		$this->form_validation->set_rules('machineBrand', 'Machine Brand', 'trim|required|xss_clean');
		$this->form_validation->set_rules('machineDeviceNo', 'Device Number', 'trim|required|xss_clean');
		$this->form_validation->set_rules('machineLocation', 'Location', 'trim|required|xss_clean');
		$this->form_validation->set_rules('get_state', 'State', 'trim|required|xss_clean');
		$this->form_validation->set_rules('zipCode', 'Zipcode', 'trim|required|xss_clean');
		$this->form_validation->set_rules('machineRemarks', 'Remark', 'trim|required|xss_clean');
		$this->form_validation->set_rules('machineIpAddr','Machine IP Address','trim|required|xss_clean|callback_valid_ip');
		if($this->form_validation->run()==TRUE) 
		{
				sleep(2);
			  $machineArr=array(
							   'code'=>$post['gtMchneCode'],
							   'machine_brand '=>$post['machineBrand'],
							   'device_id'=>$post['machineDeviceNo'],
							   'machine_model_no'=>$post['machineModelNo'],
							   'machine_ip_address'=>$post['machineIpAddr'],
							   'machine_port_no '=>$post['machinePort'],
							   'machine_location '=>$post['machineLocation'],
							   'connection_mode'=>$post['con_mode'],
							   'serial_no'=>$post['machineSno'],
							   'branch_name'=>$post['branchName'],
							   'state'=>$post['get_state'],
							   'district '=>$post['district'],
							   'zipcode '=>$post['zipCode'],
							   'remark '=>$post['machineRemarks'],
							   'created_date'=>date('Y-m-d h:i:s'),
							   );
			    $result=$this->common->update_data('machine_manage',array('id'=>$post['target']),$machineArr);
			    if($result)
			   {$data=array('addClas'=>'tst_success','msg'=>array('Thank You! you have successfully updated machine details.'),'icon'=>'<i class="ti-check-box"></i>');}
			  else{$data=array('addClas'=>'tst_warning','msg'=>array('Oops it seems something went wrong. Please refresh it.'),'icon'=>'<i class="fe fe-settings bx-spin"></i>');}
	 		}
			else
			{
				$msg=array('brNwName'=>form_error('brNwName'),'contactName'=>form_error('contactName'),'contactNu'=>form_error('contactNu'),'mobileNu'=>form_error('mobileNu'),
						   'emailID'=>form_error('emailID'),'brAddress'=>form_error('brAddress'),
						   'get_state'=>form_error('get_state'),'district'=>form_error('district'),'zipCode'=>form_error('zipCode')
						   );	
				$data=array('addClas'=>'tst_danger','msg'=>$msg,'icon'=>'<i class="fe fe-settings bx-spin"></i>');
				}
		}		
	 else{$data=array('addClas'=>'tst_danger','msg'=>array('Oops it seems something went wrong. Please refresh it.'),'icon'=>'<i class="fe fe-settings bx-spin"></i>');}	
		sleep(.5);
		echo json_encode($data);
		
	}		


	public function valid_ip($ip) {
	if (preg_match('/^192\.168\.1\.(\d{3})$/', $ip, $matches)) {
	$lastOctet = (int) $matches[1]; if ($lastOctet >= 0 && $lastOctet <= 255) { return true;  } }
	$this->form_validation->set_message('valid_ip', 'The field must be in the format 192.168.1.xxx.');
	return false;
	}
	

/***********************************Code by @mit Singh end************************************************/
    }

?>