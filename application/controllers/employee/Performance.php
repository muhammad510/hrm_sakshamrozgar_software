<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Performance extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		($this->session->userdata('mim_id')== '') ? redirect(base_url(), 'refresh') : '';
		$this->logId=$this->session->userdata('mim_id');
		$this->load->model(array('employee/staff_model'=>'staff'));
		error_reporting(0);
		
	}
	
	public function index($actn=NULL)
	{
		if($actn=='viewList')
		{
			$post_data = $this->input->post();
            $record = $this->staff->feedback_list($post_data,$this->logId);
			$i=$post_data['start'] + 1;
            $return['data'] = array();
            foreach ($record as $row) {
			
			if(strlen($row->message)>30){$message='<div class="amtltip">'.substr($row->message, 0, 27).'...<div class="tlptext">'.$row->message.'</div></div>';}
			else{$message=$row->message;}
				
          $view='<div style="text-align:center">
				     <a href="javascript:void(0);" data-id="miLvView===employee/performance/index/getDetails==='.$row->id.'" id="prview'.$row->id.'" title="Click to view details" class="btn ripple miView btn-sm getAction"><i class="ti-eye"></i></a>
			     </div>';
                $return['data'][] = array( '<strong>'.$i++.'.</strong>',
											$row->heading,
										    $message,
											date('d M, Y',strtotime($row->created_date)),
											$view);
            }
            $return['recordsTotal'] = $this->staff->feedback_count($this->logId);
            $return['recordsFiltered'] = $this->staff->feedback_filter_count($post_data,$this->logId);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);
		}
		else if($actn=='getDetails')
		{	
			$post=$this->input->post('id');
			$getDetails=$this->staff->getFrPerformance($post);
			if($getDetails)
			{
				    $chatDetails=$this->staff->getPerformRemarks($getDetails['id']);
					$chatList='';
					if($chatDetails)
					{
						foreach($chatDetails as $lst)
						{
							$createDate=date('d M Y',strtotime($lst->created_date));
							$empName=($lst->surname?($lst->surname.' '.$lst->name):$lst->name);
						
						
						
							if($lst->created_type=='1')
							{
								$chatList.='<div class="direct-chat-msg"><div class="direct-chat-info"><span class="direct-chat-name pull-left">'.$empName.'</span><span class="direct-chat-timestamp">'.$createDate.'</span></div>
         										<img class="direct-chat-img" src="'.base_url($lst->image).'">
											    <div class="direct-chat-text">'.$lst->remarks.'</div>
											</div>';
								}
							else
							{
								$chatList.='<div class="direct-chat-msg right"><div class="direct-chat-info"><span class="direct-chat-name">'.$empName.'</span><span class="direct-chat-timestamp">'.$createDate.'</span></div>
											  <img class="direct-chat-img" src="'.base_url($lst->image).'">
											  <div class="direct-chat-text">'.$lst->remarks.'</div>
										   </div>';
								}
							}
						}
					$empName=$getDetails['surname']?($getDetails['surname']." ".$getDetails['name']):$getDetails['name'];
					$messagePc=$getDetails['message'].'<br><div class="timeDisplay"><i class="fe fe-calendar me-1"></i> '.date('d M Y',strtotime($getDetails['created_date'])).'</div>';
					$return=array('addClas'=>'success','empName'=>$empName,'empDesig'=>$getDetails['designation_name'],'empImage'=>base_url($getDetails['image']),'heading'=>$getDetails['heading'],'message'=>$messagePc,'chtMsg'=>$chatList,
								  'chtMsgSave'=>'saveRemarks===employee/performance/index/saveRemarks==='.$post);
				}
				else{$return=array('addClas'=>'tst_danger','msg'=>array('Unfortunately, there are no records available.'),'icon'=>'<i class="fe fe-sun bx-spin"></i>');}
			echo json_encode($return);
			}
		else if($actn=='saveRemarks')
		{
			$post=$this->input->post();
			if($post['remarks']=='<p><br></p>'){$return=array('addClas'=>'tst_danger','msg'=>array("Unfortunately, you haven't enter remarks."),'icon'=>'<i class="fe fe-sun bx-spin"></i>');}
			else
			{
				$insertArr=array('feedback_id'=>$post['id'],'remarks'=>$post['remarks'],'created_by'=>$this->logId,'created_type'=>'2','created_date'=>date('Y-m-d H:i:s'));
				if($this->common->save_data('employee_feedback_remark',$insertArr))
				{
					$return=array('addClas'=>'tst_success','msg'=>array("Thank You! You have successfully submitted your remakrs."),'icon'=>'<i class="ti-check-box"></i>');
					}
					else{$return=array('addClas'=>'tst_danger','msg'=>array("Unfortunately, something went wrong while submitting remarks."),'icon'=>'<i class="fe fe-sun bx-spin"></i>');}
				}	
			echo json_encode($return);
			}	
		else if($actn=='saveFeedBack')
		{
			$post=$this->input->post();
			if($post['heading']=='')
			{
				$return=array('addClas'=>'tst_danger','msg'=>array("Unfortunately, you haven't enter feedback heading."),'icon'=>'<i class="fe fe-sun bx-spin"></i>');
				}
			else if($post['remarks']=='<p><br></p>'){$return=array('addClas'=>'tst_danger','msg'=>array("Unfortunately, you haven't enter remarks."),'icon'=>'<i class="fe fe-sun bx-spin"></i>');}
			else
			{
				$insertArr=array('emp_id'=>$this->logId,'message'=>$post['remarks'],'heading'=>$post['heading'],'created_date'=>date('Y-m-d H:i:s'));
				if($this->common->save_data('employee_feedback',$insertArr))
				{
					$return=array('addClas'=>'tst_success','msg'=>array("Thank You! You have successfully submitted your remakrs."),'icon'=>'<i class="ti-check-box"></i>','reloadLoc'=>base_url('employee/performance'));
					}
					else{$return=array('addClas'=>'tst_danger','msg'=>array("Unfortunately, something went wrong while submitting remarks."),'icon'=>'<i class="fe fe-sun bx-spin"></i>');}
				}	
			echo json_encode($return);
			}	
		else
		{
			$data=array('title'=>'Performance Details','breadcrums'=>'Performance Details',
						'target'=>"employee/performance/index/viewList",'layout'=>"basic/performance.php",'bckUrl'=>base_url("staff/dashboard"));
			$this->load->view('employee/testing_base', $data);
			}
		}
	public function create()
	{
			$data=array('title'=>'Create Feedback','breadcrums'=>'Create Feedback',
						'remarkFeedback'=>'saveRemarks===employee/performance/index/saveFeedBack','layout'=>"basic/create_feedback.php");
			$this->load->view('employee/testing_base', $data);
		}
}
