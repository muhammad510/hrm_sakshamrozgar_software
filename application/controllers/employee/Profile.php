<?php defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->helper(array('amiPage'));
		//$this->load->model(array('employee/staff_model'=>'staff'));
		($this->session->userdata('mim_id')== '') ? redirect(base_url(), 'refresh') : '';
		$this->logId=$this->session->userdata('mim_id');
		error_reporting(0);
    }
   public function index()
    {
		$employee=$this->common->getRowData('staff','id',$this->logId);
		$data['getState'] =$this->common->getDataList('states_cities','parent_id','729');
		$data['getCity'] =$this->common->getDataList('states_cities','parent_id',$employee->state);
		$data['employee']=$employee;
		$data['avrActionTarget']=base_url('employee/profile/reset_password');
		$data['attenSummary']='employee/appearance/index/view';
		$data['title'] = 'Profile';
    	$data['breadcrums'] = 'Profile';
    	$data['layout'] = 'basic/profile.php';
		$this->load->view('employee/base',$data);
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
		 	$targetUrl=base_url('employee/profile/view');
		 	$total_pages = ceil(count($getResult)/$no_of_per_page);
		 	$pagination =pagination(1,$total_pages,$targetUrl);
		 	$return['miPg']=$pagination;
		 	}
		 	//$return=array('draw'=>$getResult,'miPg'=>$pagination);
		 echo json_encode($return);	
		} 
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
                $isCheckPreviousPassword=$this->common->getRowData('staff','password',md5($post['prePass']));
				if($isCheckPreviousPassword)
				{
					$password_data=array('password'=>md5($post['newPass']),'show_password'=>$post['newPass']);
                    $this->common->update_data('staff',array('id'=>$this->logID),$password_data);
					$msg=array('<div class="col-md-12 alert alert-success"><i class="ti-check-box"></i> Thank you! You have successfully reset your passowrd</div>');
                	$data=array('addClas'=>'tst_success','msg'=>$msg,'icon'=>'<i class="ti-check-box"></i>');
					}
					else
					{
						$msg=array('<div class="col-md-12 alert alert-warning"><i class="fe fe-settings bx-spin"></i> Your previous password is not matching</div>');
                		$data=array('addClas'=>'tst_warning','msg'=>$msg,'icon'=>'<i class="fe fe-settings bx-spin"></i>');
						}

            } else 
			{
                $msg = array('prePass'=>form_error('prePass'),'newPass'=>form_error('newPass'),'cnfPass'=>form_error('cnfPass'));
                $data=array('addClas' =>'tst_danger','msg'=>$msg,'icon'=>'<i class="fe fe-settings bx-spin"></i>');
            }
            echo json_encode($data);
        
		
   	 }	 
   public function update()
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
								'name'=>$post['name'],'father_name'=>$post['father_name'],'dob'=>$post['dob'],'gender'=>$post['gender'],'contact_no'=>$post['contact_no'],
								'email'=>$post['email'],'address'=>$post['address'],'state'=>$post['state'],'district'=>$post['district'],
								'zipCode'=>$post['zipCode'],'marital_status'=>$post['marital_status'],'updated_at'  =>date('Y-m-d')
								);
			if($this->common->update_data('staff',array('id'=>$this->logId),$proDetails))
			{
				$data=array('addClas'=>'tst_success','msg'=>array('Thank You! you have successfully make you appearance.'),'icon'=>'<i class="ti-check-box"></i>');
				}
		} else {

			$msg = array('name'=>form_error('name'),'father_name'=>form_error('father_name'),'dob'=>form_error('dob'),'gender'=>form_error('gender'),
						 'contact_no'=>form_error('contact_no'),'email'=>form_error('email'),'address'=>form_error('address'),'state'=>form_error('state'),
						 'district'=>form_error('district'),'zipCode'=>form_error('zipCode'),'marital_status'=>form_error('marital_status'));
			$data=array('addClas' => 'tst_danger', 'msg' => $msg, 'icon' => '<i class="fe fe-settings bx-spin"></i>');
		}
		echo json_encode($data);
        
		}	 
   public function bank_update()
   {
		sleep(2);
		$this->form_validation->set_rules('acHldrname',"account holder's name",'trim|required|xss_clean');
		$this->form_validation->set_rules('bnk_name',"bank name",'trim|required|xss_clean');
		$this->form_validation->set_rules('acType','bank account type','trim|required|xss_clean');
		$this->form_validation->set_rules('bnkAcNumber','bank account number','trim|required|xss_clean');
		$this->form_validation->set_rules('brnchName','branch name','trim|required|xss_clean');
		$this->form_validation->set_rules('ifsc_code',"IFSC Code",'trim|required|xss_clean');
		if($this->form_validation->run() == TRUE) 
		{
			$post = $this->input->post();
			$proDetails=array('holder_name'=>$post['acHldrname'],'bank_name'=>$post['bnk_name'],'acc_typ'=>$post['acType'],'bank_account_no'=>$post['bnkAcNumber'],
							  'bank_branch'=>$post['brnchName'],'ifsc_code'=>$post['ifsc_code'],'updated_at'=>date('Y-m-d'));
			if($this->common->update_data('staff',array('id'=>$post['empID']),$proDetails))
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
}
