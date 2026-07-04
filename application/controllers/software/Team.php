<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('setting/team_model', 'team');
        ($this->session->userdata('mim_id')== '') ? redirect(base_url(), 'refresh') : '';
	    $this->logID=$this->session->userdata('mim_id');
        error_reporting(0);	
		
	}
    public function index($actn=NULL)
   {
   		
		
		if($actn=='view')  	 
	    {
			 $post_data = $this->input->post();
            $record = $this->team->team_list($post_data);
            $i=$post_data['start'] + 1;
            $return['data'] = array();
            foreach($record as $row)
			{
				$view = '<div style="text-align:center">
							<a href="javascript:void(0);" data-id="miTeamView===software/team/manage==='.$row->id.'" id="view'.$row->id.'" title="Click to view team details" class="btn ripple miView btn-sm getAction"><i class="ti-eye"></i></a>&emsp;
               <a href="javascript:void(0);" data-id="miTeamEdt===software/team/manage==='.$row->id.'" style="margin-left:-13px;" id="editR'.$row->id.'" title=" Update Details" class="btn ripple btn-secondary btn-sm edtPd getAction"><i class="ti-pencil-alt"></i></a></div>';

				$is_priority=($row->is_priority=='High')?'<span class="text-primary">High</span>':(($row->is_priority=='Low')?'<span class="text-warning">Low</span>':'<span class="text-success">Normal</span>');
				$status=($row->status=='Active')?'<span class="badge bg-pill bg-primary-light mgActive">Active</span>':(($row->status=='Deactive')?'<span class="badge bg-pill bg-danger-light cmnPadd">Deactive</span>':'<span class="badge bg-pill bg-warning-light cmnPadd">Suspend</span>');
				
				$isTeamId=explode(",",$row->team_member);
				$is_member=$this->team->getTeamMember($isTeamId);
				$is_member=$is_member?('<div class="demo-avatar-group my-auto">'.$is_member.'</div>'):'<span class="text-danger">No employees available</span>';
                $return['data'][]=array('<strong>'.$i++.'.</strong>',$row->team_name,$row->empName,$is_member,$is_priority,$status,$view);
            }
            $return['recordsTotal'] = $this->team->team_count();
            $return['recordsFiltered'] = $this->team->team_filter_count($post_data);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);
			}
		else if($actn=='findEmployee')
		{
			$post=$this->input->post();
			if($post['acType']=='gtEmpNmCode')
			{
				$empDetail=$this->team->findEmployeeByNmID($post['oprType']);
				if($empDetail)
				{
					foreach($empDetail as $emp)
					{
							$fndData='setEmployee===software/team/index/setEmployee==='.$emp->id.'===temp';
							$empNm=(strlen($emp->name) > 15)?(substr($emp->name, 0,20).' ...'):$emp->name;
							echo '<li class="getAction" data-id="'.$fndData.'"><i class="si si-user"></i> '.$empNm.' <span>('.$emp->employee_id.')</span></li>';
							}
						}
						else{echo '<li class="miNoEmp"><i class="si si-user"></i> No employee available</li>';}
				}	
				else if($post['acType']=='gtReptEmpNm')
				{
					$empDetail=$this->team->findReportingByNmID($post['oprType']);
					if($empDetail)
					{
						foreach($empDetail as $emp)
						{
								$fndData='setEmployee===software/team/index/setEmployee==='.$emp->id.'===assignRole';
								$empNm=(strlen($emp->name) > 15)?(substr($emp->name, 0,20).' ...'):$emp->name;
								echo '<li class="getAction" data-id="'.$fndData.'"><i class="si si-user"></i> '.$empNm.' <span>('.$emp->employee_id.')</span></li>';
								}
							}
							else{echo '<li class="miNoEmp"><i class="si si-user"></i> No employee available</li>';}
					
					}	
			}
		else if($actn=='setEmployee')
		{
			$post=$this->input->post();
			$getDetails=$this->team->getEmployeeDetail($post['id']);	
			echo json_encode($getDetails);
			}
			else if($actn=='create')
			{
				$post=$this->input->post();
				$errorMsg=($post['oprType']=='temp')?'Please provide employee detail to assigned in team':'Please provide employee detail to add reportting manager';	
				$this->form_validation->set_rules('empID',$errorMsg, 'required');
				if($this->form_validation->run() == TRUE)
				{
					if($post['oprType']=='temp')
					{	
						$table='mapped_temp_team';
						$isExist=$this->common->get_data($table,array('emp_id'=>$post['empID'],'created_by'=>$this->logID),'*');
						if(!$isExist)
						{
							$createArray=array('emp_id'=>$post['empID'],'created_by'=>$this->logID,'created_date'=>date('Y-m-d H:i:s'));
							$isCreate=$this->common->save_data($table,$createArray);
							if($isCreate)
							{
								  $lastEntry=$this->team->getTempData($isCreate);
								  $isTotal=$this->common->get_data($table,array('created_by'=>$this->logID),'count(*) as emp');
								  $count=$isTotal['emp']?$isTotal['emp']:'1';$isAction="miStatusView===software/team/index/remove===".$isCreate;
								  $lastInsert='<tr id="delArv-'.$isCreate.'"><th id="serial-'.$isCreate.'">'.$count.'.</th><th>'.$lastEntry->employee_id.'</th><td>'.$lastEntry->empName.'</td><td>'.$lastEntry->branch.'</td><td>'.$lastEntry->department.'</td>
											   <td>'.$lastEntry->desgination.'<span class="getAction tempDel" data-id="'.$isAction.'" data-bs-toggle="modal" data-bs-target="#trashTempEmployee" title="Click to remove" id="arvs--'.$isCreate.'">
											   <i class="fe fe-trash-2 text-danger"></i></span></td></tr> ';
								$return=array('addClas'=>'tst_success','msg'=>array("The employee has been successfully assigned to the team."),'icon'=>'<i class="ti-check-box"></i>','lastEntry'=>$lastInsert,'isCount'=>$count);
								}
								else{$return=array('addClas'=>'tst_danger','msg'=>array("There was an issue adding the employee to the team.","Please try again later."),'icon'=>'<i class="fe fe-sun bx-spin"></i>');}			
						  }
							else{$return=array('addClas'=>'tst_warning','msg'=>array("This employee has already been added to the team."),'icon'=>'<i class="fe fe-sun bx-spin"></i>');}
						}
					else if($post['oprType']=='reportting')
					{
						$getTeam=$this->team->getTempMappedTeam($this->logID);$team_member=str_replace(" ","",($getTeam->team_member?$getTeam->team_member:''));
						$teamName=$post['team_name']?$post['team_name']:('Team'.rand(100,999));
						$createTeam=array('team_name'=>$teamName,'head_id'=>$post['empID'],'team_member'=>$team_member,'created_by'=>$this->logID,'created_date'=>date('Y-m-d H:i:s'));
						$isCreate=$this->common->save_data('mapped_team',$createTeam);
						if($isCreate)
						{
							$cnfDelete=$this->common->del_data_con('mapped_temp_team','created_by',$this->logID);
							if($cnfDelete)
							{
								$return=array('addClas'=>'tst_success','msg'=>array("The employee has been successfully assigned to the team."),'icon'=>'<i class="ti-check-box"></i>');
								}
								else{$return=array('addClas'=>'tst_danger','notify'=>"There was an issue while creating team. Please try again.",'icon'=>'<i class="fe fe-sun bx-spin"></i>');}
							}
						}	
					else if($post['oprType']=='edit_team')
					{
						  $isAlreadyExist=$this->common->getRowData('mapped_team','id', $post['headID']);
						  $isEmployee=explode(",",$isAlreadyExist->team_member);
						  if(in_array($post['empID'],$isEmployee)){$return=array('addClas'=>'tst_warning','msg'=>array("The employee is already part of this team."),'icon'=>'<i class="fe fe-sun bx-spin"></i>');} 
						  else 
							{
							  $nTeam=$isAlreadyExist->team_member.','.$post['empID'];$count=count(explode(",",$nTeam));
							  $isArrCon=array('team_member'=>$nTeam,'modified_by'=>$this->logID,'modified_date'=>date('Y-m-d H:i:s'));
							  if($this->common->update_data('mapped_team',array('id'=>$post['headID']), $isArrCon))
							  {
								  $lastEntry=$this->team->getEmployeDataForTeam($post['empID']);
								  $isAction="miStatusView===software/team/index/delete===".$post['empID'];
								  $lastInsert='<tr id="delArv-'.$post['empID'].'"><th id="serial-'.$post['empID'].'">'.$count.'.</th><th>'.$lastEntry->employee_id.'</th><td>'.$lastEntry->memName.'</td><td>'.$lastEntry->branch.'</td>
											   <td>'.$lastEntry->department.'</td>
											   <td>'.$lastEntry->desgination.'<span class="getAction tempDel" data-id="'.$isAction.'" data-bs-toggle="modal" data-bs-target="#trashTempEmployee" title="Click to remove" id="arvs--'.$post['empID'].'">
											   <i class="fe fe-trash-2 text-danger"></i></span></td></tr> ';
								  $return=array('addClas'=>'tst_success','msg'=>array("The employee has been successfully assigned to the team."),'icon'=>'<i class="ti-check-box"></i>','lastEntry'=>$lastInsert,'isCount'=>$count);
								  }
							  else{$return=array('addClas'=>'tst_danger','notify'=>"There was an issue while creating team. Please try again.",'icon'=>'<i class="fe fe-sun bx-spin"></i>');}
						  }
						}	
				   }
					else{$return=array('addClas'=>'tst_danger','msg'=>array('empID'=>$errorMsg),'icon'=>'<i class="fe fe-sun bx-spin"></i>');}		
					echo json_encode($return);
				}
			else if($actn=='remove')
			{
				$post=$this->input->post();
				$getDetails=$this->team->getTempData($post['id']);
				if($getDetails)
				{
					if($post['oprTyp']=='remove')
					{$return=array('addClas'=>'tst_success','notify'=>'<i class="si si-power"></i> Do you really want to remove the employee with ID #.'.$getDetails->employee_id,'cnfDelete'=>'confDel===software/team/index/remove==='.$getDetails->id);}
					else if($post['oprTyp']=='confirm')
					{
							$cnfDelete=$this->common->del_data_con('mapped_temp_team','id',$post['id']);
							if($cnfDelete)
						 	{
								$isEmployee=$this->common->getDataList('mapped_temp_team','created_by',$getDetails->created);$idArr=array();	
								if($isEmployee){foreach($isEmployee as $miList){array_push($idArr,$miList->id);}}
								$return=array('addClas'=>'tst_success','notify'=>"You have successfully remove employee details.",'icon'=>'<i class="fe fe-sun bx-spin"></i>','srCnt'=>$idArr);
								}
							else{$return=array('addClas'=>'tst_danger','notify'=>"There was an issue while deleting the data. Please try again.",'icon'=>'<i class="fe fe-sun bx-spin"></i>');}
						}
					}
					else{$return=array('addClas'=>'tst_danger','notify'=>"No results were found in the database.<br>Refresh the page and search again.",'icon'=>'<i class="fe fe-sun bx-spin"></i>');}
				echo json_encode($return);
				}
			else if($actn=='delete')
			{
				$post=$this->input->post();
				$getDetails=$this->common->getRowData('staff','id',$post['id']);
				if($getDetails)
				{
					if($post['oprTyp']=='remove')
					{$return=array('addClas'=>'tst_success','notify'=>'<i class="si si-power"></i> Do you really want to remove the employee with ID #.'.$getDetails->employee_id,'cnfDelete'=>'confDel===software/team/index/delete==='.$getDetails->id);}
					else if($post['oprTyp']=='confirm')
					{
						 $isTeam=$this->common->getRowData('mapped_team','id',$post['headID']);
						 $isEmployee=explode(",",$isTeam->team_member);
						 if(count($isEmployee) > 1)
						 {
							 $isExistEmp=array_search($post['id'], $isEmployee);
							 if($isExistEmp!==false){unset($isEmployee[$isExistEmp]);}
							 $nTeam=implode(",",$isEmployee);$count=count(explode(",",$isEmployee));
							 $isArrCon=array('team_member'=>$nTeam,'modified_by'=>$this->logID,'modified_date'=>date('Y-m-d H:i:s'));
							 if($this->common->update_data('mapped_team',array('id'=>$post['headID']), $isArrCon))
							 {
								$idArr=array();if($isEmployee){foreach($isEmployee as $miList){array_push($idArr,$miList);}}
								$return=array('addClas'=>'tst_success','notify'=>"You have successfully remove employee details.",'icon'=>'<i class="fe fe-sun bx-spin"></i>','srCnt'=>$idArr);
								}
								else{$return=array('addClas'=>'tst_danger','notify'=>"There was an issue while deleting the data. Please try again.",'icon'=>'<i class="fe fe-sun bx-spin"></i>');}
								}
								else{$return=array('addClas'=>'tst_danger','notify'=>"It is essential to have at least one member in the employee group.",'icon'=>'<i class="fe fe-sun bx-spin"></i>');}
						}
					}
					else{$return=array('addClas'=>'tst_danger','notify'=>"No results were found in the database.<br>Refresh the page and search again.",'icon'=>'<i class="fe fe-sun bx-spin"></i>');}
				echo json_encode($return);
				
				}		
			else
			{
        		$data['title']='Team Manage';
				$data['breadcrums'] = 'Team Manage';
				$data['layout']= "software/team/manage.php";
				$data['alreadyAdded']=$this->team->getTempList($this->logID);
				$data['findEmployee']=base_url('software/team/index/findEmployee');
				$data['tempCreate']='create===software/team/index/create===';
				$this->load->view('base',$data);
				}
   	 }	 
	public function manage()
	{
		$post=$this->input->post();
		if($post['oprTyp']=='miTeamView')
		{
			$getDetails=$this->team->getTeamData($post['id']);
			if($getDetails)
			{
				$teamData=$this->get_team($getDetails);
				$return=array('addClas'=>'tst_success','notify'=>"You have successfully remove employee details.",'icon'=>'<i class="fe fe-sun bx-spin"></i>','id'=>$post['id'],'teamData'=>$teamData);
				}
			else{$return=array('addClas'=>'tst_danger','notify'=>"No results were found in the database.<br>Refresh the page and search again.",'icon'=>'<i class="fe fe-sun bx-spin"></i>');}	
			echo json_encode($return);
			}
		else if($post['oprTyp']=='miTeamEdt')
		{
			$getDetails=$this->team->getTeamData($post['id']);
			if($getDetails)
			{
				$teamData=$this->is_registerd_team($getDetails->team_member);
				$return=array('addClas'=>'tst_success','id'=>$post['id'],'headEmployee'=>$getDetails->empName,'team_name'=>$getDetails->team_name,
							  'editMember'=>'create===software/team/index/create===edit_team',
							  'assignRole'=>'create===software/team/index/create===upgrade',
							  'teamData'=>$teamData);
				}
			else{$return=array('addClas'=>'tst_danger','notify'=>"No results were found in the database.<br>Refresh the page and search again.",'icon'=>'<i class="fe fe-sun bx-spin"></i>');}	
			echo json_encode($return);
			}		
		} 
	private function get_team($where)
	{
	   $imgResource=base_url($where->image);
	   $return='<div class="row row-sm"><div class="col-xl-6 col-lg-6 col-md-6 col-sm-6"><div class="card card-aside custom-card">
				<a href="javascript:void(0);" class="card-aside-column  cover-image rounded-start-11" data-image-src="'.$imgResource.'" style="background: url(&quot;'.$imgResource.'&quot;) center center;"></a>
					<div class="card-body"><h5 class="main-content-label text-dark tx-medium mg-b-10">Reporting Manager</h5><div class="amiRole">Emp. Id <span>'.$where->employee_id.'</span></div>
					<div class="amiRole">Emp. Name <span>'.$where->empName.'</span></div><div class="amiRole">Mobile Number<span>'.$where->contact_no.'</span></div><div class="amiRole">Email <span>'.$where->email.'</span></div>
					<div class="amiRole">Branch<span>'.$where->branch.'</span></div><div class="amiRole">Designation <span>'.$where->desgination.'</span></div>
				</div></div></div><div class="col-xl-6 col-lg-6 col-md-6 col-sm-6"><button class="btn ripple btn-outline-dark pull-right miBck getAction" data-id="miBack===softArena"><i class="fe fe-arrow-left"></i> Back</button></div></div>';
		
		if($where->team_member)
		{
			$isMember=$this->team->getEmployeDetailsForTeam($where->team_member);
			if($isMember)
			{
				$return.='<div class="row row-sm"> ';
					foreach($isMember as $list)
					{
						$memName=(strlen($list->memName)>15)?substr($list->memName, 0, 15) . "...":$list->memName;
						$return.='<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
									<div class="card custom-card our-team">
										<div class="card-body"><div class="picture avatar-lg online text-center"><img alt="avatar" class="rounded-circle" src="'.base_url($list->image).'"></div>
											<div class="text-center mt-3">
												<a href="profile.html"><h5 class="pro-user-username text-dark mt-2 mb-0">'.$memName.'</h5></a>
												<p class="pro-user-desc text-muted mb-1">'.$list->desgination.'</p>
												<div class="text-center tx-14 mb-3">'.$list->employee_id.'</div>
											</div>
											<div class="text-center mt-3">
												<a href="https://www.facebook.com/" target="_blank" class="btn btn-sm ripple bg-primary-transparent text-primary rounded-circle me-1"><i class="mdi mdi-facebook"></i></a>
												<a href="https://myaccount.google.com/" target="_blank" class="btn btn-sm ripple bg-danger-transparent text-danger rounded-circle me-1"><i class="mdi mdi-google"></i></a>
												<a href="https://twitter.com/" target="_blank" class="btn btn-sm ripple bg-info-transparent text-info rounded-circle"><i class="mdi mdi-twitter"></i></a>
											</div>
										</div>
									</div>
								</div>';
						}				
				$return.='</div>';	
				}
			else{$return.='<div class="row row-sm"><div class="col-xl-12 col-lg-12 col-md-12 col-sm-12"><div class="alert alert-danger mg-b-0" role="alert">No data available for team members.</div></div></div>';}						
			}
			else{$return.='<div class="row row-sm"><div class="col-xl-12 col-lg-12 col-md-12 col-sm-12"><div class="alert alert-danger mg-b-0" role="alert">No data available for team members.</div></div></div>';}
			
			return $return;
		}	
	private function is_registerd_team($where)
	{
		$isMember=$this->team->getEmployeDetailsForTeam($where);
		if($isMember)
		{
			$return='';$count=0;
			foreach($isMember as $list)
			{
				$count++;
				$isAction="miStatusView===software/team/index/delete===".$list->id;
				$return.='<tr id="delArv-'.$list->id.'"><th id="serial-'.$list->id.'">'.$count.'.</th><th>'.$list->employee_id.'</th><td>'.$list->memName.'</td><td>'.$list->branch.'</td><td>'.$list->department.'</td>
						 <td>'.$list->desgination.'<span class="getAction tempDel" data-id="'.$isAction.'" data-bs-toggle="modal" data-bs-target="#trashTempEmployee" title="Click to remove" id="arvs--'.$list->id.'">
						 <i class="fe fe-trash-2 text-danger"></i></span></td></tr> ';
				}
			}
		else{$return='<tr><th colspan="6" style="text-align:center;"><div style="color:#8a3b3b;text-transform:uppercase;font-weight:bold;">No data available in table</div><img src="'.base_url('uploads/addnewitem.svg').'"></th></tr> ';} 	
			return $return;
		}
}
