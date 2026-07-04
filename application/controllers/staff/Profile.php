<?php defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->library(array('upload','image_lib','user_agent'));
		$this->load->helper(array('form','email','amiPage'));
		
		$this->load->model(array('employee/staff_model'=>'staff','employee/payslips_model'=>'payslip','employee/leave_model'=>'leaves'));
		($this->session->userdata('mim_id')== '') ? redirect(base_url(), 'refresh') : '';
		$this->logId=$this->session->userdata('mim_id');
		$this->u_cate=$this->session->userdata('user_cate');
		error_reporting(0);
    }
/****************************************************@mi Start********************************************/	
   public function reset_password()
   {
		   sleep(1);
		    $this->form_validation->set_message('matches', 'New passowrd is not match with confirm password');
		    $this->form_validation->set_rules('prePass','Previous Password','trim|required|xss_clean');
            $this->form_validation->set_rules('newPass','New Password','trim|required|xss_clean');
            $this->form_validation->set_rules('cnfPass','Confirm Password', 'trim|required|xss_clean|matches[newPass]');
            if($this->form_validation->run()==TRUE) 
			{
                $post=$this->input->post();
				$isCheckPreviousPassword=$this->common->getRowData('staff','id',$post['emp_id']);
				if($isCheckPreviousPassword->password==md5($post['prePass']))
				{
					$password_data=array('password'=>md5($post['newPass']),'show_password'=>$post['newPass']);
                    $this->common->update_data('staff',array('id'=>$isCheckPreviousPassword->id),$password_data);
					$msg=array('Thank you! You have successfully reset your passowrd');
                	$data=array('addClas'=>'tst_success','msg'=>$msg,'icon'=>'<i class="ti-check-box"></i>');
					}
					else
					{
						$msg=array('Your previous password is not matching with old password.');
                		$data=array('addClas'=>'tst_warning','msg'=>$msg,'icon'=>'<i class="fe fe-settings bx-spin"></i>');
						}

            } else 
			{
                $msg = array('prePass'=>form_error('prePass'),'newPass'=>form_error('newPass'),'cnfPass'=>form_error('cnfPass'));
                $data=array('addClas' =>'tst_danger','msg'=>$msg,'icon'=>'<i class="fe fe-settings bx-spin"></i>');
            }
            echo json_encode($data);
        
		
   	 }	
/****************************************************@mi END ********************************************/		
   public function index()
    {
		$employee=$this->staff->getEmployeeDetails($this->logId);
		$data['getState'] =$this->common->getDataList('states_cities','parent_id','729');
		$data['getCity'] =$this->common->getDataList('states_cities','parent_id',$employee->state);
		$data['getBrList'] =$this->common->getDataList('branch_manage','status','1');
		$data['department'] =$this->common->getDataList('department','status','1');
		$data['designation'] =$this->common->getDataList('designation','status','1');
		$data['leaveMaster'] =$this->common->getDataList('leave_manage','status','1');
		$data['shiftMaster'] =$this->common->getDataList('shift_manage','status','1');
		if($this->u_cate=='1'){$data['salID']='9999';}else{$data['salID']=$employee->salary_id;}		
		
		
		if($employee->approved_leave)
		{
			$leave=explode(',',$employee->approved_leave);$isAprLvID=array();
			foreach($leave as $lvId){$setLvID=explode('==',$lvId);array_push($isAprLvID,$setLvID[0]);}
			$getNewApprLeave=$this->staff->getNewAprovedLeave($isAprLvID);
			$approved_leave=$getNewApprLeave->aprLeave?$getNewApprLeave->aprLeave:'No leave Available';
			}else{$approved_leave='No leave Available';}
		$data['approved_leave']=$approved_leave;
		$data['employee']=$employee;
		
		$data['avrActionTarget']=base_url('staff/profile/reset_password');
		$data['attenSummary']='staff/profile/details/'.urlencode(base64_encode(json_encode(array('id'=>$this->logId,'action'=>'attendanceSummary'))));
		$data['paySlipSummary']='staff/profile/details/'.urlencode(base64_encode(json_encode(array('id'=>$this->logId,'action'=>'payslipSummary'))));
		$data['leaveSummary']='staff/profile/details/'.urlencode(base64_encode(json_encode(array('id'=>$this->logId,'action'=>'leaveSummary'))));
		$data['getEmpDocument'] =$this->common->getDataList('employee_document','emp_id',$this->logId);
		$data['targetDoc']=base_url('staff/profile/details/'.urlencode(base64_encode(json_encode(array('id'=>$this->logId,'action'=>'document')))));
		$data['companySummary']=base_url('staff/profile/details/'.urlencode(base64_encode(json_encode(array('id'=>$this->logId,'action'=>'companySummary')))));
		$data['backUrl'] = base_url('staff/dashboard');
		$data['title'] = 'Profile';
    	$data['breadcrums'] = 'Profile';
    	$data['layout'] = 'staff/profile.php';
		$this->load->view('base',$data);
   	 } 
	public function create()
	{
		$data['layout']= "staff/create.php";
		$data['title']='Create New Profile';
		$data['breadcrums'] = 'Create New Profile';
		$data['bckUrl']= base_url("staff/profile/create");
		
	   /* $getResult=$this->common->all_data('staff','id,employee_id,designation,name,surname,email');
		$no_of_per_page=2;
		$total_pages = ceil(count($getResult)/$no_of_per_page);
		$pagination =pagination(6,$total_pages);
		print_r($total_pages);
		$data['pagination']=$pagination;
		$data['tno_page']=NULL;*/
		
		
		
		$this->load->view('base',$data);
		} 
	public function view()
	{
		 $getPg=$this->input->post();
		 if($getPg['pgLmt'])
		 {
		 	//$return['draw'] ='Here value will show :: '.$getPg['id'];
			sleep(2);
			$getResult=$this->common->all_data('staff','id,employee_id,designation,name,surname,email');
		 	$return['draw'] = $getResult;
			
			
				}
		else
		{		
		 	$getResult=$this->common->all_data('staff','id,employee_id,designation,name,surname,email');
		 	$return['draw'] = $getResult;
		 	$no_of_per_page=2;
		 	$targetUrl=base_url('staff/profile/view');
		 	$total_pages = ceil(count($getResult)/$no_of_per_page);
		 	$pagination =pagination(1,$total_pages,$targetUrl);
		 	$return['miPg']=$pagination;
		 	}
		 	//$return=array('draw'=>$getResult,'miPg'=>$pagination);
		 echo json_encode($return);	
		} 
	
public function dummy()
{
	$data['layout']= "attendance/report.php";
	$data['title']='Attendance Report';
	$data['breadcrums'] = 'Attendance Report';
	$data['bckUrl']= base_url("staff/profile/create");
	$this->load->view('base',$data);
	}  
/*##########################################################################################*/	 
   public function update($getId)
   {
		$this->form_validation->set_rules('name','profile name','trim|required|xss_clean');
		$this->form_validation->set_rules('father_name',"father's name",'trim|required|xss_clean');
		$this->form_validation->set_rules('dob','date of birth','trim|required|xss_clean');
		$this->form_validation->set_rules('gender','gender','trim|required|xss_clean');
		$this->form_validation->set_rules('contact_no','contact number','trim|required|xss_clean|numeric|max_length[10]');
		$this->form_validation->set_rules('email',"email",'trim|required|xss_clean|valid_email');
		$this->form_validation->set_rules('address','address','trim|required|xss_clean');
		$this->form_validation->set_rules('state','state','trim|required|xss_clean');
		$this->form_validation->set_rules('district',"district",'trim|required|xss_clean');
		$this->form_validation->set_rules('zipCode','zipcode','trim|required|xss_clean|numeric');
		$this->form_validation->set_rules('marital_status','marital status','trim|required|xss_clean');
		if($this->form_validation->run() == TRUE) 
		{
			$post = $this->input->post();
			$proDetails=array(
								'name'=>$post['name'],'father_name'=>$post['father_name'],'dob'=>date('Y-m-d',strtotime(str_replace("/","-",$post['dob']))),'gender'=>$post['gender'],'contact_no'=>$post['contact_no'],
								'email'=>$post['email'],'address'=>$post['address'],'state'=>$post['state'],'district'=>$post['district'],
								'zipCode'=>$post['zipCode'],'marital_status'=>$post['marital_status'],'updated_at'=>date('Y-m-d')
								);
			if($this->common->update_data('staff',array('id'=>base64_decode(urldecode($getId))),$proDetails))
			{
				$data=array('addClas'=>'tst_success','msg'=>array('Thank You! you have successfully make you appearance.'),'icon'=>'<i class="ti-check-box"></i>');
				}
		} else {

			$msg = array('name'=>form_error('name'),'father_name'=>form_error('father_name'),'dob'=>form_error('dob'),'gender'=>form_error('gender'),
						 'contact_no'=>form_error('contact_no'),'email'=>form_error('email'),'address'=>form_error('address'),'state'=>form_error('state'),
						 'district'=>form_error('district'),'zipCode'=>form_error('zipCode'),'marital_status'=>form_error('marital_status'));
			$data=array('addClas' => 'tst_danger', 'msg' => $msg, 'icon' => '<i class="fe fe-settings bx-spin"></i>');
		}
		sleep(1);
		echo json_encode($data);
        
		}	
   public function bank_update($getId)
   {
		sleep(2);
		$this->form_validation->set_rules('acHldrname',"account holder's name",'trim|required|xss_clean');
		$this->form_validation->set_rules('bnk_name',"bank name",'trim|required|xss_clean');
		$this->form_validation->set_rules('acType','bank account type','trim|required|xss_clean');
		$this->form_validation->set_rules('bnkAcNumber','bank account number','trim|required|xss_clean|numeric');
		$this->form_validation->set_rules('brnchName','branch name','trim|required|xss_clean');
		$this->form_validation->set_rules('ifsc_code',"IFSC Code",'trim|required|xss_clean');
		if($this->form_validation->run() == TRUE) 
		{
			$post = $this->input->post();
			$proDetails=array('holder_name'=>$post['acHldrname'],'bank_name'=>$post['bnk_name'],'acc_typ'=>$post['acType'],'bank_account_no'=>$post['bnkAcNumber'],
							  'bank_branch'=>$post['brnchName'],'ifsc_code'=>$post['ifsc_code'],'updated_at'=>date('Y-m-d'));
			if($this->common->update_data('staff',array('id'=>base64_decode(urldecode($getId))),$proDetails))
			{
				$data=array('addClas'=>'tst_success','msg'=>array('Thank You! you have successfully make you appearance.'),'icon'=>'<i class="ti-check-box"></i>');
				}
		} else {

			$msg = array('acHldrname'=>form_error('acHldrname'),'bnk_name'=>form_error('bnk_name'),'acType'=>form_error('acType'),'bnkAcNumber'=>form_error('bnkAcNumber'),
						 'brnchName'=>form_error('brnchName'),'ifsc_code'=>form_error('ifsc_code'));
			$data=array('addClas'=>'tst_danger','msg'=>$msg,'icon'=>'<i class="fe fe-settings bx-spin"></i>');
		}
		echo json_encode($data);
        
		}	 		 	 
/*##########################################################################################*/	 
 public function details($where)
 {
 	$where=json_decode(base64_decode(urldecode($where)));
	if($where->action=='attendanceSummary')
	{
		$post_data = $this->input->post();
			$record = $this->staff->staff_list($post_data,$where->id);
			$i=$post_data['start'] + 1;$return['data'] = array();
            foreach($record as $row)
			{
				  $atStatus=array('1'=>'<span class="badge bgPrsnt miBgs">Present</span>','2'=>'<span class="badge bgLat miBgs">Late</span>',
				  				  '3'=>'<span class="badge bgAbsnt miBgs">Absent</span>','4'=>'<span class="badge bgHoliDy miBgs">Holiday</span>',
								  '5'=>'<span class="badge bgHfDy miBgs">Half Day</span>','6'=>'<span class="badge bgLvDy miBgs">Leave</span>');
				  $logOut_time=strtotime($row->log_out_time);
				  $logIn_time = strtotime($row->log_in_time);
				  $getTotalMinute=round(abs($logIn_time - $logOut_time)/60,2);
				  $workingHrs=round(($getTotalMinute/60),2);
				 if($row->log_out_time){$workingHrs=$workingHrs.' Hours'; $logOutTiming=date('h:i:s a',strtotime($row->log_out_time));}
				 else{$workingHrs='<span class="wrKng">Still working...</span>';$logOutTiming=NULL;}
				 
				 
				  $return['data'][] = array( '<strong>'.$i++.'.</strong>',
											date('d-m-Y',strtotime($row->attendance_date)),
											$atStatus[$row->staff_attendance_type_id],
											date('h:i:s a',strtotime($row->log_in_time)),
											$logOutTiming,
											$workingHrs
											);

            }
            $return['recordsTotal'] = $this->staff->staff_count($where->id);
            $return['recordsFiltered'] = $this->staff->staff_filter_count($post_data,$where->id);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);
		}
		elseif($where->action=='payslipSummary')
		{
 			$post_data = $this->input->post();
			$record = $this->payslip->paySlip_list($post_data,$where->id);
			//print_r($record);exit;
			$i=$post_data['start'] + 1;$return['data'] = array();
            foreach($record as $row)
			{
			  
			  $payMonth=array('01'=>'January','02'=>'February','03'=>'March','04'=>'April','05'=>'May','06'=>'June','07'=>'July','08'=>'August','09'=>'September','10'=>'October','11'=>'November','12'=>'December');
			 // $viewID='viewSalSlip==='.base_url('').'==='.$row->id;
			  $printSlipID='printSalSlip==='.base_url('').'==='.$row->id;
			  $return['data'][] = array(
			  							'<div style="text-align:center;font-weight: 500;">'.$row->tnx_id.'</div>',
										$payMonth[$row->month],
										$row->year,
										'<span style="font-weight:600;color:#262424;">'.date('d-m-Y',strtotime($row->created_date)).'</span>',
										$row->amount,
										'<div class="text-center">
                                              <a href="'.base_url('employee/payslip/view/'.urlencode(base64_encode($row->id))).'" class="btn btn-outline-secondary btn-sm">
											  	<i class="fe fe-eye"></i>
											  </a> 
											  <button type="button" class="btn btn-outline-success btn-sm arvActn" data-id="'.$printSlipID.'">
											  	<i class="fe fe-printer"></i>
											  </button>
									     </div>'
										);
            }
            $return['recordsTotal'] = $this->payslip->paySlip_count($where->id);
            $return['recordsFiltered'] = $this->payslip->paySlip_filter_count($post_data,$where->id);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);
			}
		else if($where->action=='leaveSummary')
		{
		    $post_data = $this->input->post();
			$record = $this->leaves->leave_list($post_data,$where->id);
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
			  $return['data'][] = array('<strong>'.$i++.'.</strong>',
			  							$row->leave_name,
										date('d-m-Y',strtotime($row->from_date)),
										$endDt,
										$leaveDate,
										$row->reason,
										date('d-m-Y',strtotime($row->created_date)),
										$status,
										'<div class="text-center">
		<button type="button" class="btn btn-outline-primary btn-sm miAction" data-id="watchLeaveDetails===/employee/leave/view==='.$row->id.'"><i class="fe fe-eye"></i></button> 
											  '.$trashBtn.'
									     </div>'
										);
            }
            $return['recordsTotal'] = $this->leaves->leave_count($where->id);
            $return['recordsFiltered'] = $this->leaves->leave_filter_count($post_data,$where->id);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);
		
			
			}
		else if($where->action=='document')
		{		
			$this->form_validation->set_rules('docuType', 'document title', 'trim|required|xss_clean');
			$this->form_validation->set_rules('empDocFile', 'document image', 'trim|required|xss_clean');
			if($this->form_validation->run()==TRUE) 
		  	{
				$post=$this->input->post();	
				$isDocument=$this->common->get_data('employee_document',array('emp_id'=>$where->id,'doc_type'=>$post['docuType']),'id');
				$docTypArr=array('1'=>'Aadhaar Card','2'=>'Pan Card','3'=>'Experiance Letter','4'=>'Resume','5'=>'Joining letter','6'=>'Driving Licence');
			  if(!$isDocument)
			  {	
				$config=array('upload_path'=>"uploads/employee/documents",'allowed_types'=>"jpg|png|jpeg|JPEG|JPG",'overwrite'=>FALSE,'encrypt_name'=>TRUE,'max_size'=>"10120000");
                $this->load->library('upload',$config);$this->upload->initialize($config);	
			    if($this->upload->do_upload('empDocFileAdd'))
				{
                    $image['image_upload']=array('upload_data'=>$this->upload->data());
					$image_filename=$image['image_upload']['upload_data']['file_name']; 
					$createNewDocument=array(
											  'emp_id'=>$where->id,'doc_type'=>$post['docuType'],'doc_image'=>'uploads/employee/documents/'.$image_filename,
										      'created_date'=>date('Y-m-d H:i:s a'),'created_id'=>$this->logId
											  );
				  $srCnt=$this->staff->getRowCount($where->id);$nwRoCnt=count(explode('----',$srCnt->id))+1;
				  $lastID=$this->common->save_data('employee_document',$createNewDocument);
				  if($lastID)
				  {
					$tblRowDet='<tr class="border-bottom miCenter" id="miDcSrl-'.$lastID.'"><td id="smDocCnt-'.$lastID.'">'.$nwRoCnt.'</td><td>'.$docTypArr[$post['docuType']].'</td><td><img src="'.base_url('uploads/employee/documents/'.$image_filename).'" id="empDc--'.$lastID.'" class="img-sm product-image border arvImg" alt="product-img"></td><td>'.date('d-m-Y').'</td><td><a href="javascript:void(0);" data-id="viewDetails==='.$lastID.'==='.$docTypArr[$post['docuType']].'" title="View" class="btn btn-outline-primary btn-sm viewEmpDocDetails"><i class="ti-eye"></i></a>
              <a href="javascript:void(0);" class="btn btn-outline-danger btn-sm viewEmpDocDetails" data-id="trashDocDetails===staff/profile/trashDetails==='.$lastID.'==='.$docTypArr[$empD->doc_type].'" data-bs-toggle="modal" data-bs-target="#trashEmpDetails" title="Delete document"><i class="fe fe-trash-2"></i></a></td></tr>';
					$msg=array('Thank You! you have successfully add new document.');
					$data=array('addClas'=>'tst_success','msg'=>$msg,'icon'=>'<i class="ti-check-box"></i>','srCnt'=>explode('----',$srCnt->id),'tblRowDet'=>$tblRowDet);
					}
				  else
				  {     $msg=array('Oops it seems something went wrong. Please refresh it.');
				  		$data=array('addClas'=>'tst_warning','msg'=>$msg,'icon'=>'<i class="fe fe-settings bx-spin"></i>');}
						 }
						else{
							$msg=array($this->upload->display_errors(),'So please refresh or reload page.');
							$data=array('addClas'=>'tst_warning','msg'=>$msg,'icon'=>'<i class="fe fe-settings bx-spin"></i>');
						 }
						}
						else
						{
							/*$docTypArr=array('1'=>'Aadhaar Card','2'=>'Pan Card','3'=>'Experiance Letter','4'=>'Resume','5'=>'Joining letter','6'=>'Driving Licence');*/
							$msg=array('Oops is seems you have already uploaded '.$docTypArr[$post['docuType']].'.','So please check it and delete previous file.');
							$data=array('addClas'=>'tst_warning','msg'=>$msg,'icon'=>'<i class="fe fe-settings bx-spin"></i>');
							}
				
				}
				else
				{
					$msg=array('docuType'=>form_error('docuType'),'empDocFile'=>form_error('empDocFile'));	
					$data=array('addClas'=>'tst_danger','msg'=>$msg,'icon'=>'<i class="fe fe-settings bx-spin"></i>');
					}
					sleep(1);
			echo json_encode($data);
		  }
		else if($where->action=='companySummary')
		{
				
			   $this->form_validation->set_rules('branch', 'branch name', 'trim|required|xss_clean');
			   $this->form_validation->set_rules('department_nm', 'department name', 'trim|required|xss_clean');
			   $this->form_validation->set_rules('designation', 'designation name', 'trim|required|xss_clean');
			   $this->form_validation->set_rules('dateOfJoin', 'date of joining', 'trim|required|xss_clean');
			  // $this->form_validation->set_rules('salary_type', 'salary type', 'trim|required|xss_clean');
			 //  $this->form_validation->set_rules('salary_amount', 'salary amount', 'trim|required|xss_clean|numeric');			  
			   if($this->form_validation->run()==TRUE) 
		  	  {	
				$post=$this->input->post();
				//print_r($where);echo '<br>';print_r($post);exit;
				//$post['lvDet']='1==1==12==Yearly,6==1==10==Yearly,3==2==12==Quarterly,7==1==12==Yearly';// 
				 $getLvArr=explode(',',$post['lvDet']);
				 $lvDet=count($getLvArr); $newLvDet='';
				 if($lvDet > count($post['current_leave']))
				 { 
					 for($x=0;$x < $lvDet;$x++)
					 {
							if($x < count($post['current_leave']))
							{
								$preLvArr=explode('==',$getLvArr[$x]);
								if($preLvArr[0]==$post['current_leave'][$x]){$newLvDet=$newLvDet?($newLvDet.=','.trim($getLvArr[$x])):trim($getLvArr[$x]);}
									else
									{	
										$getCurrentLv=$this->staff->getCreditLeaveData($post['current_leave'][$x]);
										$newLvDet=$newLvDet?($newLvDet.=','.trim($getCurrentLv->approvLeave)):trim($getCurrentLv->approvLeave);
										}
								}
						}
					}
				 else
				 {
					 for($x=0;$x < count($post['current_leave']);$x++)
					 {
							$preLvArr=explode('==',$getLvArr[$x]);
							if(in_array($preLvArr[0],$post['current_leave']))
							{	
								$newLvDet=$newLvDet?($newLvDet.=','.trim($getLvArr[$x])):trim($getLvArr[$x]);unset($post['current_leave'][$x]);
								}
						}
			 			if($post['current_leave'])
						{	
							$getCurrentLv=$this->staff->getCreditLeaveDataByArr($post['current_leave']);$nwOptedLeave=str_replace(" ","",$getCurrentLv->approvLeave);
							}
						$newLvDet=$newLvDet?($newLvDet.','.trim($nwOptedLeave)):trim($nwOptedLeave);	
					} 
				$joinDate=date('Y-m-d',strtotime(str_replace("/","-",$post['dateOfJoin'])));
				$notify_period=$post['noticeDate'] ? date('Y-m-d',strtotime(str_replace("/","-",$post['noticeDate']))):NULL;
				$resignDate=$post['resignDate'] ? date('Y-m-d',strtotime(str_replace("/","-",$post['resignDate']))) :NULL;
				$terminateDate=$post['terminationDate'] ? date('Y-m-d',strtotime(str_replace("/","-",$post['terminationDate']))) :NULL;		
				if($post['salID']!='9999'){$getSalAmt=$this->common->getRowData('salary_master','id',$post['salID']);}else{$getSalAmt->net_payble_amt='50000';}
				################################################################################################################################################				
				/*$getDaysInMonth=array('01'=>'31','02'=>'28','03'=>'31','04'=>'30','05'=>'31','06'=>'30','07'=>'31','08'=>'31','09'=>'30','10'=>'31','11'=>'30','12'=>'31');
				if($post['salary_type']=='1'){$netSalaryAmt=$getSalAmt->net_payble_amt/$getDaysInMonth[date('m')]; $slTyp='Daily';}
				else if($post['salary_type']=='3'){$netSalaryAmt=$getSalAmt->net_payble_amt;$slTyp='Weekly';}
				else{$netSalaryAmt=($getSalAmt->net_payble_amt*7)/$getDaysInMonth[date('m')];$slTyp='Monthly';}*/
				################################################################################################################################################	
				$getDaysInMonth=26;
				if($post['salary_type']=='1'){$netSalaryAmt=$getSalAmt->net_payble_amt/$getDaysInMonth; $slTyp='Daily';}
				else if($post['salary_type']=='3'){$netSalaryAmt=$getSalAmt->net_payble_amt;$slTyp='Monthly';}
				else{$netSalaryAmt=($getSalAmt->net_payble_amt*7)/$getDaysInMonth;$slTyp='Weekly';}
				$salaryAmt=number_format((float)$getSalAmt->gross_sal_amt, 2, '.', '');
				//print_r($where);echo '<br>';
			    $updateArr=array(
								 'user_type'=>$post['empRole'],'branch_id'=>$post['branch'],'department'=>$post['department_nm'],'designation'=>$post['designation'],'date_of_joining'=>$joinDate,
								 'resignation_date'=>$resignDate,'termination_date'=>$terminateDate,'salary_type'=>$post['salary_type'],'salary_id'=>$post['salID'],
								 'salary_amount'=>$salaryAmt,'updated_type'=>$this->u_cate,'updated_by'=>$this->logId,'updated_at'=>date('Y-m-d H:i:s'),
								 'approved_leave'=>$newLvDet,'notify_period'=>$notify_period,'notify_remarks'=>$post['noticeRemarks'],'shift'=>$post['empShift']
								 );
				//print_r($updateArr);exit;				 
				 $getNewApprLeave=$this->staff->getNewAprovedLeave($post['current_leave']);			 
			     $updateResult=$this->common->update_data('staff',array('id'=>$where->id),$updateArr);			 
			  //  $updateResult='1';	
			    if($updateResult)
				{
					$emp=$this->staff->getEmployeeDetails($where->id);
					$joinDate=$joinDate ? date('d-M-Y',strtotime($joinDate)) : 'Not joined Yet';
					$resignDate=$resignDate ? date('d-M-Y',strtotime($resignDate)) : 'Currently Working';
					$terminateDate=$terminateDate ? date('d-M-Y',strtotime($terminateDate)) : 'Currently Working';
					$notify_period=$notify_period ? date('d-M-Y',strtotime($notify_period)) : 'Currently Working';
					$notiFyRmrks=$post['noticeRemarks'] ? $post['noticeRemarks'] : 'Currently Working';
					$msg=array('Thank You! you have successfully update company details.');
					$data=array(
								'addClas'=>'tst_success','msg'=>$msg,'icon'=>'<i class="ti-check-box"></i>','salAmt'=>$salaryAmt,'slTyp'=>$slTyp,'resignDate'=>$resignDate,
								'terminateDate'=>$terminateDate,'joinDate'=>$joinDate,'branch_name'=>($emp->branch_name?$emp->branch_name:'Super Admin'),
								'department_name'=>$emp->department_name,'designation_name'=>$emp->designation_name,'creditLv'=>$getNewApprLeave->aprLeave,
								'noticeDt'=>$notify_period,'notiFyRmrks'=>$notiFyRmrks  
								);
					
					//print_r($data);exit;
					}
					else
					{
						    $msg=array('Oops is seems you have gone wrong way.','So, please refresh this page.');
							$data=array('addClas'=>'tst_danger','msg'=>$msg,'icon'=>'<i class="fe fe-settings bx-spin"></i>');
						}
				}
				else
				{
					$msg=array(
								'branch'=>form_error('branch'),'department_nm'=>form_error('department_nm'),'designation'=>form_error('designation'),
								'dateOfJoin'=>form_error('dateOfJoin')/*,'salary_type'=>form_error('salary_type'),'salary_amount'=>form_error('salary_amount')*/
							  );	
					$data=array('addClas'=>'tst_danger','msg'=>$msg,'icon'=>'<i class="fe fe-settings bx-spin"></i>');
					}
			sleep(1);		
			echo json_encode($data);	
			} 
		/*else if($where->action=='companySummary')
		{
			}	*/ 
		//print_r($where);
	} 
  
 public function trashDetails()
 { 	
 		$post=$this->input->post();
		if($post['action']=='cnfDeleteDoc')
		{
			$isExistDocument=$this->common->getRowData('employee_document','id',$post['id']);
			if($isExistDocument)
			{
				$isDeleteDoc=$this->common->del_data(array('id'=>$post['id'],'table'=>'employee_document'));  
				if($isDeleteDoc)
				{  
				  if($isExistDocument->doc_image!='uploads/employee/documents/no_doc.png'){ unlink($isExistDocument->doc_image);}
				   $docTypArr=array('1'=>'Driving Licence','2'=>'Pan Card','3'=>'Aadhaar Card','4'=>'Resume','5'=>'Joining letter','6'=>'Driving Licence');
				   $srCnt=$this->staff->getRowCount($isExistDocument->emp_id);
				   $data=array('addClas'=>'success','msg'=>'Thank you! you have successfully delete #'.$docTypArr[$isExistDocument->doc_type],'srCnt'=>explode('----',$srCnt->id));
					}
					else{$data=array('addClas'=>'danger','msg'=>'Oops it seems something went wrong please refresh it');}
				}
				else{$data=array('addClas'=>'danger','msg'=>'Oops it seems there is no document available here');}
		}
		//print_r($data);
		echo json_encode($data);
	}		 
public function salary_setup($where)
{
	$where=json_decode(base64_decode(urldecode($where)));
	$this->form_validation->set_rules('grsSalAmt', 'gross salary details', 'required');
	$this->form_validation->set_rules('basicPayPercent', 'basic salary details', 'required');
	if($this->form_validation->run()==TRUE)
	{
		$post=$this->input->post();
		if($post['grsSalAmt']==0){$data=array('addClas'=>'tst_danger','msg'=>array('Please input valid gross amount.'),'icon'=>'<i class="fe fe-settings bx-spin"></i>');}
		else if($post['basicPayPercent']==0)
		{$data=array('addClas'=>'tst_danger','msg'=>array('Please input valid basic pay amount.'),'icon'=>'<i class="fe fe-settings bx-spin"></i>');}
		else
		{
			$isExistSalary=$this->common->get_data('employee_salary_setup', array('br_id'=>$where->branch_id,'desig_id'=>$where->designation,'emp_id'=>$where->id), '*');
			$isSalaryId=$this->common->get_data('salary_master', array('branch_id'=>$where->branch_id,'desig_id'=>$where->designation), '*');
			if(!$isExistSalary)
			{
				$createArr=array('sal_mstr_id'=>$isSalaryId['id'],'emp_id'=>$where->id,'br_id'=>$where->branch_id,'desig_id'=>$where->designation,'esicEmpAmt'=>$post['esicEmpPayAmt'],'esicEmplyrAmt'=>$post['esicEmpAmt'],
								 'gross_sal_amt'=>$post['grsSalAmt'],'basic_sal'=>$post['basicPayAmt'],'hraAmt'=>$post['hraPayAmt'],'taAmt'=> $post['taPayAmt'],'daAmt'=>$post['daPayAmt'],
								 'paAmt'=>$post['paPayAmt'],'bonus'=>$post['bonusPayAmt'],'medical'=> $post['mediAllPayAmt'],'insentive'=>$post['basicInsentvAmt'],'otherInc'=>$post['otherBsInc'],'pfAmt'=>$post['pfPayAmt'],
								 'tdsAmt'=>$post['tdsPayAmt'],'insurance'=>$post['insurancePayAmt'],'otherInc'=>$post['otherDedPayAmt'],'net_payble'=>$post['netPayAmt'],'created_by'=>$this->logId,'created_date'=> date('Y-m-d H:i:s'));									
				$isCurrentSal=$this->common->save_data('employee_salary_setup', $createArr);
				if($isCurrentSal)
				{
					 $salryUpArr=array('salary_id'=>$isCurrentSal,'salary_amount'=>$post['netPayAmt']);
					 if($this->common->update_data('staff',array('id'=>$where->id),$salryUpArr)){$data=array('addClas'=>'tst_success','msg' => array('Salary details added successfully!'),'icon' => '<i class="ti-check-box"></i>');}
					 else{$data=array('addClas'=>'tst_warning','msg'=>array('Oops there is an error while updating salary details!'),'icon' => '<i class="fe fe-settings bx-spin"></i>');}
					}
					else{$data=array('addClas'=>'tst_warning','msg'=>array('Oops there is an error while creating!'),'icon' => '<i class="fe fe-settings bx-spin"></i>');}
				}
				else
				{
					$changeArr=array('sal_mstr_id'=>$isSalaryId['id'],'br_id'=>$where->branch_id,'desig_id'=>$where->designation,'gross_sal_amt'=>$post['grsSalAmt'],'basic_sal'=>$post['basicPayAmt'],'hraAmt'=>$post['hraPayAmt'],'taAmt'=> $post['taPayAmt'],
									 'daAmt'=>$post['daPayAmt'],'paAmt'=>$post['paPayAmt'],'bonus'=>$post['bonusPayAmt'],'medical'=> $post['mediAllPayAmt'],'insentive'=>$post['basicInsentvAmt'],'pfAmt'=>$post['pfPayAmt'],'otherInc'=>$post['otherBsInc'],
									 'esicEmpAmt'=>$post['esicEmpPayAmt'],'esicEmplyrAmt'=>$post['esicEmpAmt'],
									 'tdsAmt'=>$post['tdsPayAmt'],'insurance'=>$post['insurancePayAmt'],'otherInc'=>$post['otherDedPayAmt'],'net_payble'=>$post['netPayAmt'],'modify_id'=>$this->logId,'modify_date'=> date('Y-m-d H:i:s'));
					
					 $result=$this->common->update_data('employee_salary_setup',array('id'=>$isExistSalary['id']),$changeArr);
					 if($result)
					 {
						 $salryUpArr=array('salary_id'=>$isExistSalary['id'],'salary_amount'=>$post['netPayAmt']);
						 if($this->common->update_data('staff',array('id'=>$where->id),$salryUpArr))
						 {	
							$data=array('addClas'=>'tst_success','msg' => array('Thank you! You have successfully updated salary details!'),'icon' => '<i class="ti-check-box"></i>');
							}
							else
							{
								$data=array('addClas'=>'tst_warning','msg'=>array('Oops there is an error while updating salary details!'),'icon' => '<i class="fe fe-settings bx-spin"></i>');
								}
						}
					 else{$data=array('addClas'=>'tst_warning','msg'=>array('Oops there is an error while updating!'),'icon' => '<i class="fe fe-settings bx-spin"></i>');}
					}
			}
		}
		else
		{
			$msg=array('grsSalAmt'=>form_error('grsSalAmt'),'basicPayPercent' => form_error('basicPayPercent'));
			 $data=array('addClas'=>'tst_danger','msg'=>$msg,'icon'=>'<i class="fe fe-settings bx-spin"></i>');
			}
			 echo json_encode($data);
	}	
	
		
}
