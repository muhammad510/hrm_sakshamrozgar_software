<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Department extends CI_Controller {
        
        public function __construct()
        {

            parent::__construct();
            $this->load->model('setting/Common_model', 'common');
            $this->load->model('setting/Department_model', 'department');
            ($this->session->userdata('mim_id')== '') ? redirect(base_url(), 'refresh') : '';
            error_reporting(0);	

        }

        public function manage_department() {

            $data['title']      = 'Manage Department';
            $data['breadcrumb'] = 'Manage Department';
            $data['department'] = 'software/Department/all_department_data';
            $data['layout']     = "software/department/manage_department.php";
            $this->load->view('base',$data);

        }

        public function add_department_data() {

            $this->form_validation->set_rules('department_name', 'Department Name', 'required');

            if($this->form_validation->run() == TRUE) {

                $post = $this->input->post();
                
                $depart = array(
                    
                    'department_name'         => $post['department_name'],
                    'description'             => $post['description'],
                    'created_by_user_type_id' => $this->session->userdata('mim_id'),
                    'created_at'              => date('Y-m-d'),
                    
                );
                $this->common->save_data('department', $depart);
                $data = array('addClas' => 'tst_success', 'msg' =>'Department Data Added Successfully', 'icon' => '<i class="ti-check-box"></i>');

            } else {

                $msg = array('department_name' => form_error('department_name'));
                $data=array('addClas' => 'tst_danger', 'msg' => $msg, 'icon' => '<li class="fe fe-setting bx-spin"></li>');

            }
            echo json_encode($data);

        }

        public function all_department_data()
        {

            $post_data = $this->input->post();
            $record = $this->department->department_list($post_data);
            $i=$post_data['start'] + 1;
            $return['data'] = array();
            foreach ($record as $row) {

              /*  $status = ($row->status == 1) ? '
                <a href="javascript:void()" onClick="return changeStatus(\'' . $row->id . '\',\'0\',\'department\',\'Common/chageStatus\')" title="Click to Di-Active Department" class="badge bg-primary" style=" padding:5px 12px 5px 12px;">Active</a>&emsp;'
                :
                '<a href="javascript:void()"  onClick="return changeStatus(\'' . $row->id . '\',\'1\',\'department\',\'Common/chageStatus\')" title="Click to Active Department" class="badge bg-danger">Deactive</a>&emsp;';*/
				
				
			    $status = ($row->status == 1)?'
                <a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===software/department/manage==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to De-Active " id="arvs--'.$row->id.'">Active</a>'
				:'<a href="javascript:void()" data-id="miStatusView===software/department/manage==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-danger getAction" id="arvs--'.$row->id.'">Deactive</a>';	

                $view = '<div style="text-align:center;"><a href="javascript:void(0);" data-bs-target="#update_department_modal" data-bs-toggle="modal" style="margin-left:-5px;"  onclick="update_department(' . $row->id . ')" title="Click to Update Department Details" class="btn ripple btn-secondary btn-sm"><i class="ti-pencil-alt"></i></a></div>';

                $return['data'][] = array(

                    '<strong>'.$i++.'.</strong>',
                    $row->department_name,
                    $row->description,
                    $status,
					$view,

                );

            }

            $return['recordsTotal']    = $this->department->department_count();
            $return['recordsFiltered'] = $this->department->department_filter_count($post_data);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);

        }
/***********************************Code by @mit Singh start***********************************************/
 	public function manage()
 	{
 		
		$post=$this->input->post();
		if($post['oprType']=='miStatusView')
		{
			$getData=$this->common->getRowData('department','id',$post['id']);
			if($getData)
			{
				if($getData->status=='1')
				{	
					$msg=array(
								'msg'=>'<i class="si si-power"></i> Are you sure want to deactivate '.$getData->department_name.' of ID #'.$getData->id,
								'action'=>'miStatusChange===software/department/manage==='.$getData->id
								);
					}
					else
					{
						$msg=array(
									'msg'=>'Are you sure want to activate '.$getData->department_name.' of ID #'.$getData->id,
									'action'=>'miStatusChange===software/department/manage==='.$getData->id
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
			$getData=$this->common->getRowData('department','id',$post['id']);
			if($getData->status=='1')
			{
				$change='2';$msg=array('msg'=>'<span class="text-success"><i class="si si-power"></i> You have successfully deactivate '.$getData->department_name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Deactive','btnAdCls'=>'bg-danger ','btnRmvCls'=>'bg-success miLvs');
				}
				else
				{
					$change='1';$msg=array('msg'=>'<span class="text-success">You have successfully activate '.$getData->department_name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Active','btnAdCls'=>'bg-success miLvs','btnRmvCls'=>'bg-danger');
					}
					$changeArr=array('status'=>$change);
					$result=$this->common->update_data('department',array('id'=>$post['id']),$changeArr);
					if($result){$msg=$msg;}else{$msg=array('msg'=>'<span class="text-danger">Oops it seems something went wrong while updating.</span>');}
				echo json_encode($msg);
			}
			}
/***********************************Code by @mit Singh end***********************************************/
        public function update_department() {

            $upd = $this->input->post();
            $data['update_department'] = $this->common->get_data('department', array('id' => $upd['id']), 'id, department_name, description');
            $this->load->view('software/department/update_department', $data);
        }

        public function update_department_data() {

            $this->form_validation->set_rules('department_name', 'Department Name', 'required');

            if($this->form_validation->run() == TRUE) {

                $upd = $this->input->post();

                $upd_dep = array(

                    'id'              => $upd['id'],
                    'department_name' => $upd['department_name'],
                    'description'     => $upd['description'],
                );
                $this->common->update_data('department', array('id' => $upd['id']), $upd_dep);
                $data = array('addClas' => 'tst_success', 'msg' => array('Department Data Updated Successfully!'), 'icon' => '<i class="ti-check-box"></i>');
                
            } else {

                $msg = array(

                    'department_name' => form_error('department_name'),

                );
                $data = array('addClas' => 'tst_danger', 'msg' => $msg, 'icon' => '<li class="fe fe-setting bx-spin"></li>');

            }
            echo json_encode($data);

        }

    }

?>