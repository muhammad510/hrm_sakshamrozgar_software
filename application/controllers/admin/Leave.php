<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave extends CI_Controller {
public function __construct()
{
	parent::__construct();
	($this->session->userdata('mim_id')== '') ? redirect(base_url(), 'refresh') : '';
	$this->load->model('setting/leave_model', 'leave');
	$this->logID=$this->session->userdata('mim_id');
	error_reporting(0);	
 }
  public function rejected()
  {
		$leaveManage=$this->common->all_data_con('leave_manage',array('status'=>'1'),'*');
		$data['leaveManage']=$leaveManage;
		$data['title']='Leave Appliations';
		$data['breadcrums'] = 'Leave Appliations';
		$data['target']='admin/leave/applied/rejected';
		$data['addNewLeave']='admin/leave/manage';
		$data['layout']= "admin/leave/applied_leave.php";
		$data['appManage']=base_url('admin/apply/manage');
		$this->load->view('adm_base',$data);
	} 
     public function approved()
    {
  	  
		$leaveManage=$this->common->all_data_con('leave_manage',array('status'=>'1'),'*');
		$data['leaveManage']=$leaveManage;
		$data['title']='Leave Appliations';
		$data['breadcrums'] = 'Leave Appliations';
		$data['target']='admin/leave/applied/approved';
		$data['addNewLeave']='admin/leave/manage';
		$data['layout']= "admin/leave/applied_leave.php";
		$data['appManage']=base_url('admin/apply/manage');
		$this->load->view('adm_base',$data);
	  } 
	 public function requested()
    {
  	    $leaveManage=$this->common->all_data_con('leave_manage',array('status'=>'1'),'*');
		$data['leaveManage']=$leaveManage;
		$data['title']='Leave Appliations';
		$data['breadcrums'] = 'Leave Appliations';
		$data['target']='admin/leave/applied/requested';
		$data['addNewLeave']='admin/leave/manage';
		$data['layout']= "admin/leave/applied_leave.php";
		$data['appManage']=base_url('admin/apply/manage');
		$this->load->view('adm_base',$data);
	  }
	 public function applied($actn)
	 {
		$getActnType=array('rejected'=>'2','approved'=>'1','requested'=>'4');
		
				$post_data = $this->input->post();
				$record = $this->leave->applied_leave_list($post_data,$getActnType[$actn]);
				/*echo $this->db->last_query().'<br>';
				print_r($record);
				exit;*/
				
				
				$i=$post_data['start'] + 1;$return['data'] = array();
				foreach($record as $row)
				{
					if($row->total_leave=='1'){$endDt=date('d-m-Y',strtotime($row->from_date));}else{$endDt=date('d-m-Y',strtotime($row->end_date));}
					if($row->total_leave=='1'){$leaveDate='1 Day';}else{$leaveDate=$row->total_leave.' Days';}	 
					if($row->created_date==date('Y-m-d')){$status='<span class="badge bg-primary miWdth"> New</span>';} 
					else if($row->status=='4'){$status='<span class="badge bg-warning miWdth">Pending</span>';} 
					else if($row->status=='1'){$status='<span class="badge bg-success miWdth">Approved</span>';} 
					else if($row->status=='2'){$status='<span class="badge bg-danger miWdth">Rejected</span>';}
					else if($row->status=='3'){$status='<span class="badge bg-secondary miWdth">Hold</span>';} 	
					$delBtn='delOperation===admin/apply/index/trashApp==='.$row->id;
					$trashBtn=($row->status=='1' || $row->status=='2')?'<button type="button" class="btn btn-miOk btn-sm "><i class="ti-check-box"></i></button>':'<button type="button" class="btn btn-outline-danger btn-sm miAction" data-bs-toggle="modal" data-bs-target="#deleteLeave" data-id="'.$delBtn.'"><i class="fe fe-trash-2"></i></button>';	
						
				 $return['data'][] = array('<div style="font-weight:900;text-align:center;">'.$i++.'.</div>',
											$row->employee_id,
											$row->name,
									        date('d-m-Y',strtotime($row->from_date)),
											$endDt,
											$leaveDate,
										    date('d-m-Y',strtotime($row->created_date)),
											$status,
											'<div class="text-center">
			<button type="button" class="btn btn-outline-primary btn-sm miAction" data-id="watchLeaveDetails===/admin/apply/view==='.$row->id.'"><i class="fe fe-eye"></i></button>
												  '.$trashBtn.'
											 </div>'
											);
				}
					$return['recordsTotal'] = $this->leave->leave_counter($getActnType[$actn]);
					$return['recordsFiltered'] = $this->leave->leave_filter_counter($post_data,$getActnType[$actn]);
					$return['draw'] = $post_data['draw'];
					echo json_encode($return);
				
		} 
    	public function reports($actn=NULL)
		{
				
				if($actn=="view")
				{
						$post_data = $this->input->post();
						$apply='approved';
						$record = $this->leave->applied_list($post_data,$apply);
						//echo $this->db->last_query();die;
						//print_r($record);exit;
						$i=$post_data['start'] + 1;$return['data'] = array();
						foreach($record as $row)
						{
							if($row->total_leave=='1'){$endDt=date('d-m-Y',strtotime($row->from_date));}else{$endDt=date('d-m-Y',strtotime($row->end_date));}
							if($row->total_leave=='1'){$leaveDate='1 Day';}else{$leaveDate=$row->total_leave.' Days';}	 
							if($row->created_date==date('Y-m-d')){$status='<span class="badge bg-primary miWdth"> New</span>';} 
							else if($row->status=='4'){$status='<span class="badge bg-warning miWdth">Pending</span>';} 
							else if($row->status=='1'){$status='<span class="badge bg-success miWdth">Approved</span>';} 
							else if($row->status=='2'){$status='<span class="badge bg-danger miWdth">Rejected</span>';}
							else if($row->status=='3'){$status='<span class="badge bg-secondary miWdth">Hold</span>';} 	
							$delBtn='delOperation===admin/apply/index/trashApp==='.$row->id;
							
							/*if($row->status=='1' || $row->status=='2'){ $trashBtn='<button type="button" class="btn btn-miOk btn-sm "><i class="ti-check-box"></i></button>';}	
							else{$trashBtn='<button type="button" class="btn btn-outline-danger btn-sm miAction" data-bs-toggle="modal" data-bs-target="#deleteLeave"  data-id="delOperation=='.$delBtn.'"><i class="fe fe-trash-2"></i></button>';}*/
							$trashBtn=($row->status=='1' || $row->status=='2')?'<button type="button" class="btn btn-miOk btn-sm "><i class="ti-check-box"></i></button>':'<button type="button" class="btn btn-outline-danger btn-sm miAction" data-bs-toggle="modal" data-bs-target="#deleteLeave" data-id="'.$delBtn.'"><i class="fe fe-trash-2"></i></button>';	
								
						 $return['data'][] = array('<div style="font-weight:900;text-align:center;">'.$i++.'.</div>',
													$row->employee_id,
													$row->name,
													/*$row->leave_name,*/
													date('d-m-Y',strtotime($row->from_date)),
													$endDt,
													$leaveDate,
												/*	$row->reason,*/
													date('d-m-Y',strtotime($row->created_date)),
													$status,
													'<div class="text-center">
					<button type="button" class="btn btn-outline-primary btn-sm miAction" data-id="watchLeaveDetails===/admin/apply/view==='.$row->id.'"><i class="fe fe-eye"></i></button>
														  '.$trashBtn.'
													 </div>'
													);
						}
							$return['recordsTotal'] = $this->leave->applied_leave_count($apply);
							$return['recordsFiltered'] = $this->leave->applied_leave_filter_count($post_data,$apply);
							$return['draw'] = $post_data['draw'];
							echo json_encode($return);
				}
				else
				{
					$leaveManage=$this->common->all_data_con('leave_manage',array('status'=>'1'),'*');
			        $data['leaveManage']=$leaveManage;
					$data['reportTyp']='approved';
					$data['title']='Leave Reports';
					$data['breadcrums'] = 'Leave Reports';
					$data['target']='admin/leave/reports/view';
					$data['addNewLeave']='software/leave/manage';
					$data['layout']= "admin/leave/applied.php";
					$this->load->view('adm_base',$data);
				}
			} 	  
		 
}
