<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
        ($this->session->userdata('mim_id')== '') ? redirect(base_url(), 'refresh') : '';
	    $this->logID=$this->session->userdata('mim_id');
        error_reporting(0);	
		
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
                	$data=array('addClas'=>'tst_success','msg'=>$msg);
					}
					else
					{
						$msg=array('<div class="col-md-12 alert alert-warning"><i class="fe fe-settings bx-spin"></i> Your previous password is not matching</div>');
                		$data=array('addClas'=>'tst_warning','msg'=>$msg);
						}

            } else 
			{
                $msg = array('prePass'=>form_error('prePass'),'newPass'=>form_error('newPass'),'cnfPass'=>form_error('cnfPass'));
                $data=array('addClas' =>'tst_danger','msg'=>$msg);
            }
            echo json_encode($data);
        
		
   	 }	 
	
}
