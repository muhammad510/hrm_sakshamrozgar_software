<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Designation extends CI_Controller {
        
        public function __construct()
        {

            parent::__construct();
            $this->load->model('setting/Common_model', 'common');
            $this->load->model('setting/Designation_model', 'designation');
            ($this->session->userdata('mim_id')== '') ? redirect(base_url(), 'refresh') : '';
            error_reporting(0);	

        }

        public function manage_designation() {

            $data['title']       = 'Manage Designation';
            $data['breadcrumb']  = 'Manage Designation';
            $data['designation'] = 'software/Designation/all_designation_data';
            $data['department']  = $this->common->all_data('department', 'id, department_name');
            $data['layout']      = "software/designation/manage_designation.php";
            $this->load->view('base',$data);

        }

        public function add_designation_data() {

            $this->form_validation->set_rules('department', 'Department Name', 'required');
			$this->form_validation->set_rules('designation_name', 'Designation Name', 'required');

            if($this->form_validation->run() == TRUE) {

                $post = $this->input->post();
                
                $desig = array(
                    
                    'department'              => $post['department'],
                    'designation_name'        => $post['designation_name'],
					'is_priority'		      => $post['priority'],			
                    'description'             => $post['description'],
                    'created_by_user_type_id' => $this->session->userdata('mim_id'),
                    'created_at'              => date('Y-m-d'),
                    
                );
                $this->common->save_data('designation', $desig);
                $data = array('addClas' => 'tst_success', 'msg' =>'Designation Data Added Successfully', 'icon' => '<i class="ti-check-box"></i>');

            } else {

                $msg = array('department' => form_error('department'),'designation' => form_error('designation_name'));
                $data=array('addClas' => 'tst_danger', 'msg' => $msg, 'icon' => '<li class="fe fe-setting bx-spin"></li>');

            }
            echo json_encode($data);

        }

        public function all_designation_data()
        {

            $post_data = $this->input->post();
            $record = $this->designation->designation_list($post_data);
            $i=$post_data['start'] + 1;
            $return['data'] = array();
            foreach ($record as $row) {

/*                $status = ($row->status == 1) ? '
                <a href="javascript:void()" onClick="return changeStatus(\'' . $row->id . '\',\'0\',\'designation\',\'Common/chageStatus\')" title="Click to Di-Active Designation" class="badge bg-primary" style=" padding:5px 12px 5px 12px;">Active</a>&emsp;'
                :
                '<a href="javascript:void()" onClick="return changeStatus(\'' . $row->id . '\',\'1\',\'designation\',\'Common/chageStatus\')" title="Click to Active Designation" class="badge bg-danger">Deactive</a>&emsp;';*/
				
			    $status = ($row->status == 1)?'
                <a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===software/designation/manage==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to De-Active " id="arvs--'.$row->id.'">Active</a>'
				:'<a href="javascript:void()" data-id="miStatusView===software/designation/manage==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-danger getAction" id="arvs--'.$row->id.'">Deactive</a>';	
				

                $view = '<a href="javascript:void(0);" data-bs-target="#update_designation_modal" data-bs-toggle="modal"  onclick="update_designation(' . $row->id . ')" title="Click to Update Designation Details" class="btn ripple btn-secondary btn-sm"><i class="ti-pencil-alt"></i></a>';
				$isPriority=($row->is_priority=='Highest')?'Yes':'';			
	
                $return['data'][] = array(

                    '<strong>'.$i++.'.</strong>',
                    $row->department_name,
                    $row->designation_name,
					$isPriority,
                    $row->description,
					$status,
                    $view

                );

            }

            $return['recordsTotal']    = $this->designation->designation_count();
            $return['recordsFiltered'] = $this->designation->designation_filter_count($post_data);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);

        }

        public function update_designation() {

            $upd = $this->input->post();
            $data['update_designation'] = $this->common->get_data('designation', array('id' => $upd['id']), 'id, designation_name, department, description,is_priority');
            $data['department']  = $this->common->all_data('department', 'id, department_name');

            $this->load->view('software/designation/update_designation', $data);

        }

    public function update_designation_data()
	{

             $this->form_validation->set_rules('department', 'Department Name', 'required');
			$this->form_validation->set_rules('designation_name', 'Designation Name', 'required');

            if($this->form_validation->run() == TRUE) {

                $upd = $this->input->post();
                
                $upd_desig =  array('id'               => $upd['id'],
									'department'       => $upd['department'],
									'designation_name' => $upd['designation_name'],
									'is_priority'	   => $upd['priority'],	
									'description'      => $upd['description']);
                $this->common->update_data('designation', array('id' => $upd['id']), $upd_desig);
                $data = array('addClas' => 'tst_success', 'msg' => array('Designation Data Updated Successfully!'), 'icon' => '<i class="ti-check-box"></i>');

            } else {

  
				  $msg = array('department' => form_error('department'),'designation' => form_error('designation_name'));
                $data = array('addClas' => 'tst_danger', 'msg' => $msg, 'icon' => '<li class="class="fe fe-setting bx-spin""></li>');

            }
            echo json_encode($data);

        }

/***********************************Code by @mit Singh start***********************************************/
 	public function manage()
 	{
 		
		$post=$this->input->post();
		if($post['oprType']=='miStatusView')
		{
			$getData=$this->common->getRowData('designation','id',$post['id']);
			if($getData)
			{
				if($getData->status=='1')
				{	
					$msg=array(
								'msg'=>'<i class="si si-power"></i> Are you sure want to deactivate '.$getData->designation_name.' of ID #'.$getData->id,
								'action'=>'miStatusChange===software/designation/manage==='.$getData->id
								);
					}
					else
					{
						$msg=array(
									'msg'=>'Are you sure want to activate '.$getData->designation_name.' of ID #'.$getData->id,
									'action'=>'miStatusChange===software/designation/manage==='.$getData->id
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
			$getData=$this->common->getRowData('designation','id',$post['id']);
			if($getData->status=='1')
			{
				$change='2';$msg=array('msg'=>'<span class="text-success"><i class="si si-power"></i> You have successfully deactivate '.$getData->designation_name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Deactive','btnAdCls'=>'bg-danger ','btnRmvCls'=>'bg-success miLvs');
				}
				else
				{
					$change='1';$msg=array('msg'=>'<span class="text-success">You have successfully activate '.$getData->designation_name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Active','btnAdCls'=>'bg-success miLvs','btnRmvCls'=>'bg-danger');
					}
					$changeArr=array('status'=>$change);
					$result=$this->common->update_data('designation',array('id'=>$post['id']),$changeArr);
					if($result){$msg=$msg;}else{$msg=array('msg'=>'<span class="text-danger">Oops it seems something went wrong while updating.</span>');}
				echo json_encode($msg);
			}
			}
/***********************************Code by @mit Singh end***********************************************/









    }

?>