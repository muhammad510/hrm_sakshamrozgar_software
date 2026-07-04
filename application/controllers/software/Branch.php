<?php defined('BASEPATH') or exit('No direct script access allowed');

class Branch extends CI_Controller
{
    public function __construct()
   {
            parent::__construct();
            $this->load->model('setting/branch_model', 'branch');
            ($this->session->userdata('mim_id')== '') ? redirect(base_url(),'refresh') : '';
			$this->logID=$this->session->userdata('mim_id');
			$this->cat=$this->session->userdata('user_cate');
            error_reporting(0);	
        }
   public function index($actn=NULL)
   {
 		if($actn=='view')  	 
	    {
			 $post_data = $this->input->post();
            $record = $this->branch->branch_list($post_data);
			// echo "<pre>"; print_r($record);exit;
			
            $i=$post_data['start'] + 1;
            $return['data'] = array();
            foreach ($record as $row) {
				$status = ($row->status == 1) ? '
                <a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===software/branch/manage==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to De-Active " id="arvs--'.$row->id.'">Active</a>'
                :
                '<a href="javascript:void()" data-id="miStatusView===software/branch/manage==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-danger getAction bgDng" id="arvs--'.$row->id.'">Deactive</a>';
				
				$view = '<div style="text-align:center">
							<a href="javascript:void(0);" data-id="miBrView===software/branch/manage==='.$row->id.'" title="Click to view branch details" class="btn ripple miView btn-sm getAction"><i class="ti-eye"></i></a>&emsp;
                <a href="javascript:void(0);" data-id="miBrEdt===software/branch/manage==='.$row->id.'" style="margin-left:-13px;"  title="Click to Update Details" class="btn ripple btn-secondary btn-sm edtPd getAction"><i class="ti-pencil-alt"></i></a></div>';

                $return['data'][]=array('<strong>'.$i++.'.</strong>',
										$row->code,
										$row->branch_name,
										/*$row->address,$row->contact_person_name,$row->phone_nu,*/
										$row->mobile_nu,
										$row->branch_email,
										/*$row->zipcode,*/
										$status,
										$view
										);

            }
            $return['recordsTotal'] = $this->branch->branch_count();
            $return['recordsFiltered'] = $this->branch->branch_filter_count($post_data);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);
			}
		else
		{	
			$getLast=$this->common->get_last('branch_manage','code');if($getLast){$lastID=str_replace("BR","",$getLast['code']);$lastID+=1;
			if($lastID < 9){$newBranchID='BR000'.$lastID;}else if($lastID < 99){$newBranchID='BR00'.$lastID;}else if($lastID < 999){$newBranchID='BR0'.$lastID;}
			else{$newBranchID='BR'.$lastID;}}else{$newBranchID='BR001';}
			$data['newBranchID']=$newBranchID;
			$data['getState']=$this->common->getDataList('states_cities','parent_id','729');
			$data['getDepartment']=$this->common->getDataList('department','status','1');
			$data['title']='Branch Manage';
        	$data['breadcrums'] = 'Branch Manage';
        	$data['target']='software/branch/index/view';
			$data['addBranch']='addNew';
			$data['layout']= "software/branch/manage.php";
			$data['oprLocTrgt']=base_url('software/branch/manage');
			$this->load->view('base',$data);
			}
	 } 
public function manage()
{	 
	 $post=$this->input->post();
	 if($post['oprType']=='addNew')
	 {
	 	  $this->form_validation->set_rules('brNwName', 'branch name', 'trim|required|xss_clean');
	 	  $this->form_validation->set_rules('brLatitude', 'Latitude', 'trim|required|xss_clean');
	 	  $this->form_validation->set_rules('brLongitude', 'Longitude', 'trim|required|xss_clean');
		  $this->form_validation->set_rules('contactName', 'contact person name', 'trim|required|xss_clean');
		  $this->form_validation->set_rules('contactNu', 'contact number', 'trim|required|xss_clean|numeric');
		  $this->form_validation->set_rules('mobileNu', 'mobile number', 'trim|required|xss_clean|numeric');
		  $this->form_validation->set_rules('emailID', 'branch email id', 'trim|required|xss_clean');
		  $this->form_validation->set_rules('brAddress', 'branch address', 'trim|required|xss_clean');
		  $this->form_validation->set_rules('get_state', 'state', 'trim|required|xss_clean');
		  $this->form_validation->set_rules('district', 'district', 'trim|required|xss_clean');
		  $this->form_validation->set_rules('zipCode', 'zipcode', 'trim|required|xss_clean|numeric');
		  if($this->form_validation->run()==TRUE) 
		  {
		  		sleep(1);
				$branchArr=array(
								 'code'=>$post['gtBrCode'],
								 'branch_name'=>$post['brNwName'],
								 'latitude'=>$post['brLatitude'],
								 'longitude'=>$post['brLongitude'],
								 'contact_person_name'=>$post['contactName'],
								 'branch_email'=>$post['emailID'],
								 'phone_nu'=>$post['contactNu'],
								 'mobile_nu'=>$post['mobileNu'],
								 'department'=>$post['getDepIdFr'],
								 'designation'=>$post['getDesigIdFr'],
								 'address'=>$post['brAddress'],
								 'state'=>$post['get_state'],
								 'district'=>$post['district'],
								 'zipcode'=>$post['zipCode'],
								 'create_date'=>date('Y-m-d h:i:s'),
								 'created_by'=>$this->logID,
								 'created_typ'=>$this->cat
								 );		 
			  if($this->common->save_data('branch_manage',$branchArr))
			   {$data=array('addClas'=>'tSuccess','msg'=>array('Thank You! you have successfully create new branch.'),'icon'=>'<i class="ti-check-box"></i>');}
			  else{$data=array('addClas'=>'tWarning','msg'=>array('Oops it seems something went wrong. Please refresh it.'),'icon'=>'<i class="pe-7s-sun bx-spin"></i>');}
	 		}
			else
			{
				$msg=array('brNwName'=>form_error('brNwName'),'contactName'=>form_error('contactName'),'brLatitude'=>form_error('brLatitude'),'brLongitude'=>form_error('brLongitude'),'contactNu'=>form_error('contactNu'),'mobileNu'=>form_error('mobileNu'),
						   'emailID'=>form_error('emailID'),'brAddress'=>form_error('brAddress'),
						   'get_state'=>form_error('get_state'),'district'=>form_error('district'),'zipCode'=>form_error('zipCode')
						   );	
				$data=array('addClas'=>'tDanger','msg'=>$msg,'icon'=>'<i class="pe-7s-sun bx-spin"></i>');
				}
		}
	 else if($post['oprType']=='miStatusView')
	 {
			$getData=$this->common->getRowData('branch_manage','id',$post['id']);
			if($getData)
			{
				if($getData->status=='1')
				{	
					$data=array('msg'=>'<i class="bx bx-power-off"></i> Are you sure want to deactivate '.$getData->branch_name.' of Branch ID #'.$getData->code,
								'action'=>'miStatusChange===software/branch/manage==='.$getData->id);
					}
					else
					{
						$data=array('msg'=>'Are you sure want to activate '.$getData->branch_name.' of Branch ID #'.$getData->code,
									'action'=>'miStatusChange===software/branch/manage==='.$getData->id);
					}
				}
			  else{$data=array('msg'=>'<span class="text-danger">Oops it seems something went wrong</span>');}
			}
	 elseif($post['oprType']=='miStatusChange')
	 {
			sleep(2);
			$getData=$this->common->getRowData('branch_manage','id',$post['id']);
			if($getData->status=='1')
			{
				$change='2';$data=array('msg'=>'<span class="text-success"><i class="bx bx-power-off"></i> You have successfully deactivate '.$getData->branch_name.' of Branch ID #'.$getData->code.'</span>','btnTxt'=>'Deactive','btnAdCls'=>'bg-danger bgDng','btnRmvCls'=>'bg-success miLvs');
				}
				else
				{
					$change='1';$data=array('msg'=>'<span class="text-success">You have successfully activate '.$getData->branch_name.' of Branch ID #'.$getData->code.'</span>','btnTxt'=>'Active','btnAdCls'=>'bg-success miLvs','btnRmvCls'=>'bg-danger bgDng');
					}
					$changeArr=array('status'=>$change,'modified_date'=>date('Y-m-d'),'modified_by'=>$this->logID,'modified_typ'=>$this->cat);
					$result=$this->common->update_data('branch_manage',array('id'=>$post['id']),$changeArr);
					if($result){$data=$data;}else{$data=array('msg'=>'<span class="text-danger">Oops it seems something went wrong while updating.</span>');}
			}	
	 elseif($post['oprType']=='miBrView' || $post['oprType']=='miBrEdt')
	 {
		$getData=$this->common->getRowData('branch_manage','id',$post['id']);
		
		if($getData)
		{
			$getDist=NULL;$getStat=NULL;$getData->addClas='tSuccess';$data=$getData;
			$getDepDesig=$this->depart_designation(array('depId'=>$getData->department,'desigId'=>$getData->designation));	
			$getData->shwDepart=$getDepDesig['depShow'];
			$getData->listDepart=$getDepDesig['departList'];
			
			$getData->shwDesig=$getDepDesig['desigShow'];
			$getData->listDesig=$getDepDesig['desigList'];
			
			
			
			$getParameter=$this->branch->getStateDistrict($getData->state);	
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
		else{$data=array('addClas'=>'tDanger','msg'=>array('Oops it seems something went wrong while updating.'),'icon'=>'<i class="pe-7s-sun bx-spin"></i>');}
		}
	 else if($post['oprType']=='updateBrDet')			
	 {
		  $this->form_validation->set_rules('brNwName', 'branch name', 'trim|required|xss_clean');
		  $this->form_validation->set_rules('brLatitude', 'Latitude', 'trim|required|xss_clean');
		  $this->form_validation->set_rules('brLongitude', 'Longitude', 'trim|required|xss_clean');
		  $this->form_validation->set_rules('getDepIdFr', 'department name', 'trim|required|xss_clean');
		  $this->form_validation->set_rules('getDesigIdFr', 'designation name', 'trim|required|xss_clean');
		  $this->form_validation->set_rules('contactName', 'contact person name', 'trim|required|xss_clean');
		  $this->form_validation->set_rules('contactNu', 'contact number', 'trim|required|xss_clean|numeric');
		  $this->form_validation->set_rules('mobileNu', 'mobile number', 'trim|required|xss_clean|numeric');
		  $this->form_validation->set_rules('emailID', 'branch email id', 'trim|required|xss_clean');
		  $this->form_validation->set_rules('brAddress', 'branch address', 'trim|required|xss_clean');
		  $this->form_validation->set_rules('get_state', 'state', 'trim|required|xss_clean');
		  $this->form_validation->set_rules('district', 'district', 'trim|required|xss_clean');
		  $this->form_validation->set_rules('zipCode', 'zipcode', 'trim|required|xss_clean|numeric');  
		  if($this->form_validation->run()==TRUE) 
		  {
				$branchArr=array(
								 'branch_name'=>$post['brNwName'],
								 'contact_person_name'=>$post['contactName'],
								 'latitude'=>$post['brLatitude'],
								 'longitude'=>$post['brLongitude'],
								 'branch_email'=>$post['emailID'],
								 'phone_nu'=>$post['contactNu'],
								 'mobile_nu'=>$post['mobileNu'],
								 'address'=>$post['brAddress'],
								 'state'=>$post['get_state'],
								 'district'=>$post['district'],
								 'zipcode'=>$post['zipCode'],
								 'department'=>$post['getDepIdFr'],
								 'designation'=>$post['getDesigIdFr'],
								 'modified_date'=>date('Y-m-d h:i:s'),
								 'modified_by'=>$this->logID,
								 'modified_typ'=>$this->cat
								 );
				/*print_r($branchArr);
				exit;	*/		 
			    $result=$this->common->update_data('branch_manage',array('id'=>$post['target']),$branchArr);
			    if($result)
			   {$data=array('addClas'=>'tSuccess','msg'=>array('Thank You! you have successfully updated branch details.'),'icon'=>'<i class="ti-check-box"></i>');}
			  else{$data=array('addClas'=>'tWarning','msg'=>array('Oops it seems something went wrong. Please refresh it.'),'icon'=>'<i class="pe-7s-sun bx-spin"></i>');}
	 		}
			else
			{
				$msg=array('brNwName'=>form_error('brNwName'),'contactName'=>form_error('contactName'),'brLatitude'=>form_error('brLatitude'),'brLongitude'=>form_error('brLongitude'),'contactNu'=>form_error('contactNu'),'mobileNu'=>form_error('mobileNu'),
						   'emailID'=>form_error('emailID'),'brAddress'=>form_error('brAddress'),'getDepIdFr'=>form_error('getDepIdFr'),'getDesigIdFr'=>form_error('getDesigIdFr'),
						   'get_state'=>form_error('get_state'),'district'=>form_error('district'),'zipCode'=>form_error('zipCode')
						   );	
				$data=array('addClas'=>'tDanger','msg'=>$msg,'icon'=>'<i class="pe-7s-sun bx-spin"></i>');
				}
		}
	 else if($post['oprType']=='department')			
	 {
		//print_r($post);			
	 	$data=array('addClas'=>'tSuccess','fDataResource'=>'<option>Trsting mode</option>');
		}
	 else{$data=array('addClas'=>'tDanger','msg'=>array('Oops it seems something went wrong. Please refresh it.'),'icon'=>'<i class="pe-7s-sun bx-spin"></i>');}	
		echo json_encode($data);
		
	}	 
public function administration($action)
{
	$post=$this->input->post('id');
	if($action=='department')
	{
		$getDpId=explode(',',$post);
		$setDepartment='';
		$setDesignation='';
		if($getDpId)
		{
			$getDesigList=$this->branch->getDesignationListByDepartment($getDpId);
			if($getDesigList)
			{
				$desigUrl=base_url('software/branch/administration/designation');
				foreach($getDesigList as $desigList)
				{
					$desigArr.='<li id="desig--'.$desigList->id.'" data-id="'.$desigUrl.'" class="depCollect">
                                  <span id="adDesigMrk--'.$desigList->id.'"></span>'.$desigList->designation_name.'</li>';
					$setDesignation.=$setDesignation?','.$desigList->designation_name:$desigList->designation_name;
					}
				}
			else
			{
				$desigArr='<li>There is no data available here</li>';$setDesignation='Select Designation';
				}	
			foreach($getDpId as $id)
			{
				$getDepartment=$this->common->getRowData('department','id', $id);
				if($getDepartment)
				{
					$setDepartment.=$setDepartment?','.$getDepartment->department_name:$getDepartment->department_name;
					}				
				}
			}
			else{$setDepartment='Select Department';$desigArr='<li>There is no data available here</li>';$setDesignation='Select Designation';}
		sleep(1.5);
		if(strlen($setDepartment) > 20){$department = substr($setDepartment, 0, 25) . '...';} else {$department = $setDepartment;}
		if(strlen($setDesignation) > 20){$setDesign = substr($setDesignation, 0, 25) . '...';} else {$setDesign = $setDesignation;}
		//$return=array('department'=>$department,'designation'=>$desigArr,'titleDesign'=>$setDesign);
		$return=array('department'=>$department,'designation'=>$desigArr,'titleDesign'=>'Select Department');
		 echo json_encode($return);
		
		
		}
	else if($action=='designation')
	{
		$getDpId=explode(',',$post);
		if($getDpId)
		{
			$getDesigList=$this->branch->getDesignationListGroupByDepartment($getDpId);
			if($getDesigList->designations)
			{
				if(strlen($getDesigList->designations) > 30){$titleDesign= substr($getDesigList->designations, 0, 30) . '...';} else {$titleDesign= $getDesigList->designations;}
				$resultAction='success';
				}
				else{$titleDesign='Select Designation';$resultAction='failed';}	
			}
		else{$titleDesign='Select Department';$resultAction='failed';}	
		$return=array('resultAction'=>$resultAction,'titleDesign'=>$titleDesign);	
		echo json_encode($return);	
		}	
  }	 
	 
private function depart_designation($where)
{
	$depArr=array();
	if($where['depId'])
	{	
		$getAlDepart=$this->common->getDataList('department','status','1');$deprt='';
		if($getAlDepart)
		{
			$getSelDep=explode(',',$where['depId']);$setDep='';$dpCnt=0;
			foreach($getAlDepart as $dep)
			{
				$depID=$dep->id.'--'.str_replace(" ","_",$dep->department_name);
				$liUrlActn=base_url('software/branch/administration/department');
			 		$matchDepart=(in_array($dep->id,$getSelDep))?'&#10003;':'';$mrkDepart=(in_array($dep->id,$getSelDep))?'mrkAdd':'';
					if(in_array($dep->id,$getSelDep)){$dpCnt++;$setDep.=($dpCnt=='1')?$dep->department_name:','.$dep->department_name;}
					$deprt.='<li id="dept--'.$depID.'" data-id="'.$liUrlActn.'" class="depCollect">
								<span id="adMrk--'.$dep->id.'" class="'.$mrkDepart.'">'.$matchDepart.'</span>'.$dep->department_name.'
							 </li>';
				}
			}
			$whereDep=explode(',',$where['depId']);
			$getDesigList=$this->branch->getDesignationListByDepartment($whereDep);$design='';		
			if($getDesigList)
			{
				$getSelDesig=explode(',',$where['desigId']);$setDesig='';$desigCnt=0;				
				$desigUrl=base_url('software/branch/administration/designation');
				foreach($getDesigList as $desigList)
				{
					$matchDesig=(in_array($desigList->id,$getSelDesig))?'&#10003;':'';$mrkDesig=(in_array($desigList->id,$getSelDesig))?'mrkAdd':'';
					if(in_array($desigList->id,$getSelDesig)){$desigCnt++;$setDesig.=($desigCnt=='1')?$desigList->designation_name:','.$desigList->designation_name;}
					$desigArr.='<li id="desig--'.$desigList->id.'" data-id="'.$desigUrl.'" class="depCollect">
                                  <span id="adDesigMrk--'.$desigList->id.'"  class="'.$mrkDesig.'">'.$matchDesig.'</span>'.$desigList->designation_name.'</li>';
					}			
				}
			$depArr=array(
						  'depShow'=>(strlen($setDep)>20)?(substr($setDep,0,25).'...'):$setDep,'departList'=>$deprt,
						  'desigShow'=>(strlen($setDesig)>20)?(substr($setDesig,0,25).'...'):$setDesig,'desigList'=>$desigArr
						  );	
		}
	return $depArr;
	}	 
	 
 /*	public function manage($id)
 	{
 		$brID=base64_decode(urldecode($id));
		//print_r($brID);
		    $getBranch=$this->common->getRowData('branch_manage','id',$brID);
			$data['getState']=$this->common->getDataList('states_cities','parent_id','729');
			$data['getDistrict']=$this->common->getDataList('states_cities','parent_id',$getBranch->state);
			$data['getBranch']=$getBranch;
			$data['title']='View Branch Details';
        	$data['breadcrums'] = 'View Branch Details';
        	$data['target']='software/branch/index/view';
			$data['layout']= "software/branch/view.php";
			$this->load->view('base',$data);
		}	*/
}
