<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tickets extends CI_Controller 
{
	public function __construct()
    {
         parent::__construct();
		 $this->load->library(array('upload','image_lib')); 
	    ($this->session->userdata('mim_id')== '') ? redirect(base_url(), 'refresh') : '';
		 $this->load->model('setting/tickets_model', 'tickets');
	     $this->logID=$this->session->userdata('mim_id');
		 $this->lgCat=$this->session->userdata('user_cate');
         error_reporting(0);
     }
	public function index($act=NULL)
	{
	    if($act=='delete')
		{	
			
				$post=$this->input->post();
				$getDetails=$this->common->getRowData('tickets','id',$post['id']);
				if($getDetails)
				{
					if($post['oprTyp']=='remove')
					{$return=array('addClas'=>'tst_success','notify'=>'<i class="si si-power"></i> Do you really want to remove the ticket with ID #.'.$getDetails->ticket_id,'cnfDelete'=>'confDel===tickets/index/delete==='.$getDetails->id);}
					else if($post['oprTyp']=='confirm')
					{
							$whereCon=array('id'=>$post['id'],'table'=>'tickets');$delDetails = $this->common->del_data($whereCon);
							if($delDetails)
							{
								$reloadLoc=base_url('tickets');
								$return=array('notify'=>'<span class="text-success"><i class="si si-emotsmile"></i> Thank you! You have successfully remove ID#'.$getData->ticket_id.'</span>','addClas'=>'tst_success','reloadLoc'=>$reloadLoc);
								} 
							else{$return=array('addClas'=>'tst_danger','notify'=>'<span class="text-danger">Oops it seems something went wrong.<br>Refresh the page and search again.</span>','tnxResult'=>'failed');}
						}
					  else{$return=array('addClas'=>'tst_danger','notify'=>"Oops it seems something went wrong.<br>Refresh the page and search again.",'icon'=>'<i class="fe fe-sun bx-spin"></i>');}	
					}
					else{$return=array('addClas'=>'tst_danger','notify'=>"Oops it seems something went wrong.<br>Refresh the page and search again.",'icon'=>'<i class="fe fe-sun bx-spin"></i>');}
				echo json_encode($return);
			}	
			else
			{
				$data['title']='TicketList';
				$data['breadcrums'] = 'Tickets Manage';
				$data['target']= "tickets/request/view";
				$data['layout']= "software/tickets/manage.php";
				$this->load->view('base',$data);
				}
	}

	public function request($actn=NULL)
	{
		$post_data = $this->input->post();
		$record = $this->tickets->tickets_list($post_data,$actn);
		//echo $this->db->last_query();exit;
		$i=$post_data['start'] + 1;
		$return['data'] = array();
		foreach($record as $row)
		{
			$id_view=urlencode(base64_encode(json_encode(array('id'=>$row->id,'action'=>'view'))));	
			$id_edit=urlencode(base64_encode(json_encode(array('id'=>$row->id,'action'=>'reply'))));	
			
			$isDeleted=($row->status!='Closed')?'<li><a href="javascript:void(0);" class="dropdown-item getAction" data-id="miTicketView===tickets/index/delete==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#trashTicket">
													 <i class="fe fe-trash-2 me-2"></i>Delete Ticket </a></li>':'';
			
						
			$view = '<div class="d-flex"> <a href="javascript:void(0);" class="action-btns1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical text-primary"></i></a>
						<ul class="dropdown-menu dropdown-menu-end" role="menu" style="">
						  <li><a href="'.base_url('tickets/details/'.$id_edit).'" class="dropdown-item"><i class="fe fe-send me-2"></i>Reply Ticket</a></li>
						  <li><a href="'.base_url('tickets/details/'.$id_view).'" class="dropdown-item"><i class="fe fe-eye me-2"></i>View Ticket</a></li>
						  '.$isDeleted.'
						</ul>
					  </div>';
			$is_priority=($row->priority=='High')?'<span class="badge bg-danger-mi">High</span>':(($row->priority=='Low')?'<span class="badge bg-success-mi">Low</span>':'<span class="badge bg-warning-mi">Medium</span>');
			$status=($row->status=='Open')?'<span class="badge bg-primary bgSpn">Open</span>':(($row->status=='In Progress')?'<span class="badge bg-info bgSpn">In Progress</span>':(($row->status=='Resolved')?'<span class="badge bg-success bgSpn">Resolved</span>':'<span class="badge bg-danger bgSpn">Closed</span>'));
			
			$last_replied=$this->tickets->getLastReplied($row->id);
			if($last_replied)
			{
				$timeDiffr=floor((strtotime(date('Y-m-d H:i:s'))-strtotime($last_replied->created_date))/3600);
				$latestReplied=($timeDiffr < 24)?(($timeDiffr==1)?'1 hour ago':$timeDiffr.' hours ago'):date('h:i a d-m-Y',strtotime($last_replied->created_date));
				}
				else{$latestReplied='';}
			$replied=$latestReplied?'<span class="fs-13 text-muted"><i class="fe fe-clock me-2"></i>'.$latestReplied.'</span>':'<span class="badge bg-info-mi">N/A</span>';
			$tDate=date('h:i a d-m-Y',strtotime($row->created_date));
			$subject='<div><a href="javascript:void(0);" class="h6">'.$row->subject.'</a></div><small class="fs-12 text-muted"><i class="fe fe-clock me-1 text-muted"></i>Opened: <span class="font-weight-normal1">'.$tDate.'</span></small>';
			$return['data'][]=array(
									 '<strong>'.$row->ticket_id.'</strong>',
									 $subject,
									 $is_priority,
									 $row->category,
									 $status,
									 $replied,
									 $view
									 );
		}
		$return['recordsTotal'] = $this->tickets->tickets_count($actn);
		$return['recordsFiltered'] = $this->tickets->tickets_filter_count($post_data,$actn);
		$return['draw'] = $post_data['draw'];
		echo json_encode($return);
	}
	public function active()
	{
		$data['title']='Active Ticket List';
		$data['breadcrums'] = 'Active Ticket ';
		$data['target']= "tickets/request/active";
		$data['layout']= "software/tickets/manage.php";
		$this->load->view('base',$data);
	}
	public function closed()
	{
		$data['title']='Active Ticket List';
		$data['breadcrums'] = 'Active Ticket ';
		$data['target']= "tickets/request/closed";
		$data['layout']= "software/tickets/manage.php";
		$this->load->view('base',$data);
	}
	public function arise($actn=NULL)
	{
		if($actn=='news')
		{
			$post=$this->input->post();
			$this->form_validation->set_rules('ticket_subject','Subject', 'required');
			$this->form_validation->set_rules('ticket_email','Email', 'required');
			$this->form_validation->set_rules('tiCat','category', 'required');
			$this->form_validation->set_rules('ticComment','Description', 'required');
			if($this->form_validation->run() == TRUE)
			{
				if(empty(trim(strip_tags($post['ticComment'])))){$return=array('addClas'=>'tst_danger','msg'=>array("Please input value in description"),'icon'=>'<i class="fe fe-sun bx-spin"></i>');} 
				else
				{
					$config=array('upload_path'=>"uploads/comment",'allowed_types'=>"jpg|png|jpeg|JPEG|JPG",'overwrite' => FALSE,'encrypt_name' => TRUE,'max_size' =>"10120000");
					$this->load->library('upload',$config);$this->upload->initialize($config);	
					if($this->upload->do_upload('chtFile')){$image['image_upload']=array('upload_data'=>$this->upload->data());$isFile=$image['image_upload']['upload_data']['file_name'];}
				    $isFile=$isFile?("uploads/comment/".$isFile):NULL;
					$ticket_id="TIC".(date("Ymd").rand(1000, 9999));
					$creArr=array('ticket_id'=>$ticket_id,'category_id'=>$post['tiCat'],'subject'=>$post['ticket_subject'],'description'=>$post['ticComment'],'ticket_img'=>$isFile,
								  'priority'=>$post['priority'],'status'=>'Open','created_by'=>$this->logID,'created_date'=>date('Y-m-d H:i:s'));
					$isCreate=$this->common->save_data('tickets',$creArr);
					if($isCreate){$return=array('addClas'=>'tst_success','msg'=>array("Ticket created successfully! Your Ticket ID is: ".$ticket_id),'icon'=>'<i class="ti-check-box"></i>','reloadLoc'=>base_url('tickets'));}
					 else{$return=array('addClas'=>'tst_danger','notify'=>"There was an issue while creating ticket. Please try again.",'icon'=>'<i class="fe fe-sun bx-spin"></i>');}
					}
				}
				else
				{
					$msg=array('ticket_subject'=>form_error('ticket_subject'),'ticket_email'=>form_error('ticket_email'),'tiCat'=>form_error('tiCat'),'ticComment'=>form_error('ticComment'));
					$return=array('addClas'=>'tst_danger','msg'=>$msg,'icon'=>'<i class="fe fe-sun bx-spin"></i>');
					}		
				echo json_encode($return);
			}
		else if($actn=='chatAgain')
		{
			
			$this->form_validation->set_rules('ticComment', 'Comment', 'trim|required|xss_clean');
			if($this->form_validation->run()==TRUE) 
		  	{
				$post=$this->input->post();
				$config=array('upload_path'=>"uploads/comment",'allowed_types'=>"jpg|png|jpeg|JPEG|JPG",'overwrite' => FALSE,'encrypt_name' => TRUE,'max_size' =>"10120000");
				$this->load->library('upload',$config);$this->upload->initialize($config);	
				if($this->upload->do_upload('chtFile')){$image['image_upload']=array('upload_data'=>$this->upload->data());$isFile=$image['image_upload']['upload_data']['file_name'];}
				 $isTicket=$this->common->getRowData('tickets','id',$post['ticID']);	
				 if($isTicket)
				 {
				 	$isFile=$isFile?("uploads/comment/".$isFile):NULL;$reloadLoc=base_url('tickets/details/'.urlencode(base64_encode(json_encode(array('id'=>$post['ticID'],'action'=>'reply')))));
					$staffType=(($isTicket->created_by==$this->logID)?"Raised":"Replied");
					$createComment=array('ticket_id'=>$post['ticID'],'comment'=>$post['ticComment'],'staff_type'=>$staffType,'staff_id'=>$this->logID,'isfile'=>$isFile,'created_date'=>date('Y-m-d H:i:s'));
					$isCreate=$this->common->save_data('tickets_comment',$createComment);
					if($isCreate)
					{
						if($isTicket->status!=$post['ticStatus'])
						{
							$updateDataArr=array('status'=>$post['ticStatus'],'modify_date'=>date('Y-m-d H:i:s'),'modified_by'=>$this->logID);
							$this->common->update_data('tickets',array("id"=>$post['ticID']),$updateDataArr);
							$return=array('addClas'=>'tst_success','msg'=>array("You have successfully submitted your query."," Your Ticket ID is: ".$isTicket->ticket_id),'icon'=>'<i class="ti-check-box"></i>','reloadLoc'=>$reloadLoc);
							}
							else{$return=array('addClas'=>'tst_success','msg'=>array("You have successfully submitted your query."," Your Ticket ID is: ".$isTicket->ticket_id),'icon'=>'<i class="ti-check-box"></i>','reloadLoc'=>$reloadLoc);}
						}
					 else{$return=array('addClas'=>'tst_danger','notify'=>"There was an issue while creating ticket. Please try again.",'icon'=>'<i class="fe fe-sun bx-spin"></i>');}
				 	}	
				  else{$return=array('addClas'=>'tst_danger','msg'=>array("Please provide valid ticket details."),'icon'=>'<i class="fe fe-settings bx-spin"></i>');}										
				}
				else{$msg=array('ticComment'=>form_error('ticComment'));$return=array('addClas'=>'tst_danger','msg'=>$msg,'icon'=>'<i class="fe fe-settings bx-spin"></i>');}
			echo json_encode($return);
			}	
			else
			{
				$data['title']='Create Ticket';
				$data['breadcrums'] = 'Create Ticket';
				$data['tiCat'] = $this->common->getDataList('tickets_category','status','Active');
				$data['nCreate']=base_url('tickets/arise/news');
				$data['layout']= "software/tickets/create.php";
				$this->load->view('base',$data);
				}
	}
	public function details($id)
	{
		$isAction=json_decode(base64_decode(urldecode($id)));//print_r($isAction);echo '<br><br>';
	    $isRaised=$this->tickets->getRaisedTicket($isAction->id);
		if($isRaised)
		{
			$isLastReplied=$this->tickets->getLastReplied($isRaised->id);
			$isRaised->lastReplied=$isLastReplied?date('H:i A d-m-Y',strtotime($isLastReplied->created_date)):'N/A';
			$isRaised->openDt=$isRaised?date('H:i A d-m-Y',strtotime($isRaised->openDt)):'N/A';
			$isConversation=$this->tickets->getChat($isRaised->id);
			/*echo $this->db->last_query();
			exit;*/
			
			}
		else{$isRaised=NULL;$isConversation=NULL;}
		
		$data['isReplied']=base_url('tickets/arise/chatAgain');						
		$data['isConversation']=$isConversation;
		$data['isAction']=$isAction;
		$data['isRaised']=$isRaised;
		$data['title']='TicketList';
		$data['breadcrums'] = 'Tickets Manage';
		$data['target']= "tickets/index/view";
		$data['layout']= "software/tickets/view.php";
		$this->load->view('base',$data);
		}
}
