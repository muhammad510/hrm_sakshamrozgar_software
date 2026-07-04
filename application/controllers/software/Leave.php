<?php defined('BASEPATH') or exit('No direct script access allowed');

class Leave extends CI_Controller
{
    public function __construct()
   {
            parent::__construct();
            $this->load->model('setting/leave_model', 'leave');
            ($this->session->userdata('mim_id')== '') ? redirect(base_url(), 'refresh') : '';
			$this->logID=$this->session->userdata('mim_id');
            error_reporting(0);	
        }
   public function index($actn=NULL)
   {
 		if($actn=='view')  	 
	    {
			$post_data = $this->input->post();
            $record = $this->leave->leave_list($post_data);
			$i=$post_data['start'] + 1;
            $return['data'] = array();
            foreach ($record as $row) {
				$status = ($row->status == 1)?'
                <a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===software/leave/manage==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to De-Active " id="arvs--'.$row->id.'">Active</a>'
				:'<a href="javascript:void()" data-id="miStatusView===software/leave/manage==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-danger getAction" id="arvs--'.$row->id.'">Deactive</a>';

          $view='<div style="text-align:center">
				  <a href="javascript:void(0);" data-id="miLvView===software/leave/manage==='.$row->id.'" title="Click to view details" class="btn ripple miView btn-sm getAction">				                    <i class="ti-eye"></i>
				  </a>&emsp;
    			  <a href="javascript:void(0);" data-id="miLvEdt===software/leave/manage==='.$row->id.'" style="margin-left:-13px;"  title="Click to Update Details" class="btn ripple btn-secondary btn-sm getAction">
					<i class="ti-pencil-alt"></i>
				  </a>
					   </div>';
				$leaveType=array('1'=>'Yearly','2'=>'Quarterly','3'=>'Monthly','4'=>'Weekly');
				if($row->leave_credit==1){ $leaves='1 Day';}else{ $leaves=$row->leave_credit.' Days';}
                $return['data'][] = array( '<strong>'.$i++.'.</strong>',
											$row->leaveID,
											$row->leave_name,
											$leaveType[$row->credit_type],
											$leaves,
										    $status,
											$view);

            }
            $return['recordsTotal'] = $this->leave->leave_count();
            $return['recordsFiltered'] = $this->leave->leave_filter_count($post_data);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);
			}
		else
		{	
			$getLast=$this->common->get_last('leave_manage','leaveID');if($getLast){$lastID=str_replace("L","",$getLast['leaveID']);$lastID+=1;
			if($lastID < 9){$newLeaveID='L000'.$lastID;}else if($lastID < 99){$newLeaveID='L00'.$lastID;}else if($lastID < 999){$newLeaveID='L0'.$lastID;}
			else{$newLeaveID='L'.$lastID;}}else{$newLeaveID='L0001';}
			$data['newLeaveID']=$newLeaveID;
			$data['title']='Leave Manage';
        	$data['breadcrums'] = 'Leave Manage';
        	$data['target']='software/leave/index/view';
			$data['addNewLeave']='software/leave/manage';
			$data['layout']= "software/leave/manage.php";
			$this->load->view('base',$data);
			}
	 } 
 	public function manage()
 	{
 		
		$post=$this->input->post();
		if($post['oprType']=='miStatusView')
		{
			$getData=$this->common->getRowData('leave_manage','id',$post['id']);
			if($getData)
			{
				if($getData->status=='1')
				{	
					$msg=array(
								'msg'=>'<i class="si si-power"></i> Are you sure want to deactivate '.$getData->leave_name.' of Leave ID #'.$getData->leaveID,
								'action'=>'miStatusChange===software/leave/manage==='.$getData->id
								);
					}
					else
					{
						$msg=array(
									'msg'=>'Are you sure want to activate '.$getData->leave_name.' of Leave ID #'.$getData->leaveID,
									'action'=>'miStatusChange===software/leave/manage==='.$getData->id
								);
					}
				}
				else
				{
					$msg=array('msg'=>'<span class="text-danger">Oops it seems something went wrong</span>');
					}
			echo json_encode($msg);
			}
		elseif($post['oprType']=='miStatusChange')
		{
			sleep(2);
			$getData=$this->common->getRowData('leave_manage','id',$post['id']);
			if($getData->status=='1')
			{
				$change='2';$msg=array('msg'=>'<span class="text-success"><i class="si si-power"></i> You have successfully deactivate '.$getData->leave_name.' of Leave ID #'.$getData->leaveID.'</span>','btnTxt'=>'Deactive','btnAdCls'=>'bg-danger ','btnRmvCls'=>'bg-success miLvs');
				}
				else
				{
					$change='1';$msg=array('msg'=>'<span class="text-success">You have successfully activate '.$getData->leave_name.' of Leave ID #'.$getData->leaveID.'</span>','btnTxt'=>'Active','btnAdCls'=>'bg-success miLvs','btnRmvCls'=>'bg-danger');
					}
					$changeArr=array('status'=>$change,'modify_date'=>date('Y-m-d'),'modified_by'=>$this->logID);
					$result=$this->common->update_data('leave_manage',array('id'=>$post['id']),$changeArr);
					if($result){$msg=$msg;}else{$msg=array('msg'=>'<span class="text-danger">Oops it seems something went wrong while updating.</span>');}
				echo json_encode($msg);
			}
		elseif($post['oprType']=='miAddNewDetails')
		{
			$this->form_validation->set_rules('leaveNwName', 'leave name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('leaveType', 'leave type', 'trim|required|xss_clean');
			$this->form_validation->set_rules('leaveNoDays', 'number of days', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('lvDscription', 'leave description', 'trim|required|xss_clean');
			if($this->form_validation->run()==TRUE) 
			{
				sleep(1);
				$leaveArr=array(
								 'leaveID'=>$post['leaveNwiD'],
								 'leave_name'=>$post['leaveNwName'],
								 'credit_type'=>$post['leaveType'],
								 'leave_credit'=>$post['leaveNoDays'],
								 'description'=>$post['lvDscription'],
								 'create_date'=>date('Y-m-d h:i:s'),
								 'created_by'=>$this->logID
								 );
				
			    if($this->common->save_data('leave_manage',$leaveArr))
			   {$data=array('addClas'=>'tst_success','msg'=>array('Thank You! you have successfully create new leave.'),'icon'=>'<i class="ti-check-box"></i>');}
			  else{$data=array('addClas'=>'tst_warning','msg'=>array('Oops it seems something went wrong. Please refresh it.'),'icon'=>'<i class="fe fe-settings bx-spin"></i>');}
				}
			else
			{
				$msg=array('leaveNwName'=>form_error('leaveNwName'),'leaveType'=>form_error('leaveType'),'leaveNoDays'=>form_error('leaveNoDays'),'lvDscription'=>form_error('lvDscription'));	
				$data=array('addClas'=>'tst_danger','msg'=>$msg,'icon'=>'<i class="fe fe-settings bx-spin"></i>');
				}	
			echo json_encode($data);
			}
		elseif($post['oprType']=='miUpdateDetails')
		{
			$this->form_validation->set_rules('leaveNwName', 'leave name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('leaveType', 'leave type', 'trim|required|xss_clean');
			$this->form_validation->set_rules('leaveNoDays', 'number of days', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('lvDscription', 'leave description', 'trim|required|xss_clean');
			if($this->form_validation->run()==TRUE) 
			{
				sleep(1);
				$changeArr=array(
								 'leave_name'=>$post['leaveNwName'],
								 'credit_type'=>$post['leaveType'],
								 'leave_credit'=>$post['leaveNoDays'],
								 'description'=>$post['lvDscription'],
								 'modify_date'=>date('Y-m-d h:i:s'),
								 'modified_by'=>$this->logID
								 );
				$result=$this->common->update_data('leave_manage',array('id'=>$post['target']),$changeArr);
			    if($result)
			   {$data=array('addClas'=>'tst_success','msg'=>array('Thank You! you have successfully updated leave details.'),'icon'=>'<i class="ti-check-box"></i>');}
			  else{$data=array('addClas'=>'tst_warning','msg'=>array('Oops it seems something went wrong. Please refresh it.'),'icon'=>'<i class="fe fe-settings bx-spin"></i>');}
				}
			else
			{
				$msg=array('leaveNwName'=>form_error('leaveNwName'),'leaveType'=>form_error('leaveType'),'leaveNoDays'=>form_error('leaveNoDays'),'lvDscription'=>form_error('lvDscription'));	
				$data=array('addClas'=>'tst_danger','msg'=>$msg,'icon'=>'<i class="fe fe-settings bx-spin"></i>');
				}	
			echo json_encode($data);
			}	
		elseif($post['oprType']=='miLvView' || $post['oprType']=='miLvEdt')
		{
			$getData=$this->common->getRowData('leave_manage','id',$post['id']);if($getData){$getData->addClas='tst_success';$data=$getData;}
			else{$data=array('addClas'=>'tst_danger','msg'=>array('Oops it seems something went wrong while updating.'),'icon'=>'<i class="fe fe-settings bx-spin"></i>');}
			echo json_encode($data);
			}
			
		//print_r($post);
		
		/*$brID=base64_decode(urldecode($id));
		//print_r($brID);
		    $data['getleave']=$this->common->getRowData('leave_manage','id',$brID);
			$data['getState']=$this->common->getDataList('states_cities','parent_id','729');
			$data['getDistrict']=$this->common->getDataList('states_cities','parent_id','63');
			$data['title']='View leave Details';
        	$data['breadcrums'] = 'View leave Details';
        	$data['target']='software/leave/index/view';
			$data['layout']= "software/leave/view.php";
			$this->load->view('base',$data);*/
		}	
	/*public function applied($action=NULL)
	{
			if($action=="viewApplied")
			{
				$post_data = $this->input->post();
				$record = $this->leave->applied_list($post_data);
				//echo $this->db->last_query();die;
				//print_r($record);exit;
				$i=$post_data['start'] + 1;$return['data'] = array();
				foreach($record as $row)
				{
					if($row->leave_mode=='1'){$endDt=date('d-m-Y',strtotime($row->from_date));}else{$endDt=date('d-m-Y',strtotime($row->end_date));}
					if($row->total_leave=='1'){$leaveDate='1 Day';}else{$leaveDate=$row->total_leave.' Days';}	 
					if($row->created_date==date('Y-m-d')){$status='<span class="badge bg-primary miWdth"> New</span>';} 
					else if($row->status=='4'){$status='<span class="badge bg-warning miWdth">Pending</span>';} 
					else if($row->status=='1'){$status='<span class="badge bg-success miWdth">Approved</span>';} 
					else if($row->status=='2'){$status='<span class="badge bg-danger miWdth">Rejected</span>';}
					else if($row->status=='3'){$status='<span class="badge bg-secondary miWdth">Hold</span>';} 	
					$delBtn='Hello';
					
					if($row->status=='1')
					{ $trashBtn='<button type="button" class="btn btn-miOk btn-sm "><i class="ti-check-box"></i></button>';}	
					else{$trashBtn='<button type="button" class="btn btn-outline-danger btn-sm miAction" data-id="delOperation=='.$delBtn.'"><i class="fe fe-trash-2"></i></button>';}
						
				  $printSlipID='printSalSlip==='.base_url('').'==='.$row->id;
				  $return['data'][] = array('<div style="font-weight:900;text-align:center;">'.$i++.'.</div>',
											$row->employee_id,
											$row->name,
											//$row->leave_name,
											date('d-m-Y',strtotime($row->from_date)),
											$endDt,
											$leaveDate,
										//	$row->reason,
											date('d-m-Y',strtotime($row->created_date)),
											$status,
											'<div class="text-center">
												  <button type="button" class="btn btn-outline-success btn-sm arvActn" data-id="'.$printSlipID.'">
													<i class="fe fe-edit"></i>
												  </button>
			<button type="button" class="btn btn-outline-primary btn-sm miAction" data-id="watchLeaveDetails===/employee/leave/view==='.$row->id.'"><i class="fe fe-eye"></i></button> 
												  '.$trashBtn.'
											 </div>'
											);
				}
					$return['recordsTotal'] = $this->leave->applied_leave_count();
					$return['recordsFiltered'] = $this->leave->applied_leave_filter_count($post_data);
					$return['draw'] = $post_data['draw'];
					echo json_encode($return);
				}
				else
				{
					$data['title']='Leave Appliations';
        			$data['breadcrums'] = 'Leave Appliations';
        			$data['target']='software/leave/applied/viewApplied';
					$data['addNewLeave']='admin/leave/manage';
					$data['layout']= "admin/leave/applied.php";
					$this->load->view('adm_base',$data);
			}
				
	 }*/	

}
