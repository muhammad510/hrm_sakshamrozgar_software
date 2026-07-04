<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Shift extends CI_Controller {
        
        public function __construct()
        {

            parent::__construct();
            $this->load->model('setting/Shift_model', 'shift');
            $this->load->model('setting/Common_model', 'common');
            ($this->session->userdata('mim_id')== '') ? redirect(base_url(), 'refresh') : '';
            error_reporting(0);	

        }

        public function manage_shift() {

            $data['title']='Shift Manage';
            $data['breadcrums'] = 'Shift Manage';
            $data['target']='software/shift/all_shift_data';
            $data['layout']= "software/shift/shift_manage.php";
            $this->load->view('base',$data);

        }
/***********************************Code by @mit Singh start***********************************************/
 	public function manage()
 	{
 		
		$post=$this->input->post();
		if($post['oprType']=='miStatusView')
		{
			$getData=$this->common->getRowData('shift_manage','id',$post['id']);
			if($getData)
			{
				if($getData->status=='1')
				{	
					$msg=array(
								'msg'=>'<i class="si si-power"></i> Are you sure want to deactivate '.$getData->shift_name.' of ID #'.$getData->id,
								'action'=>'miStatusChange===software/shift/manage==='.$getData->id
								);
					}
					else
					{
						$msg=array(
									'msg'=>'Are you sure want to activate '.$getData->shift_name.' of ID #'.$getData->id,
									'action'=>'miStatusChange===software/shift/manage==='.$getData->id
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
			$getData=$this->common->getRowData('shift_manage','id',$post['id']);
			if($getData->status=='1')
			{
				$change='2';$msg=array('msg'=>'<span class="text-success"><i class="si si-power"></i> You have successfully deactivate '.$getData->shift_name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Deactive','btnAdCls'=>'bg-danger ','btnRmvCls'=>'bg-success miLvs');
				}
				else
				{
					$change='1';$msg=array('msg'=>'<span class="text-success">You have successfully activate '.$getData->shift_name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Active','btnAdCls'=>'bg-success miLvs','btnRmvCls'=>'bg-danger');
					}
					$changeArr=array('status'=>$change);
					$result=$this->common->update_data('shift_manage',array('id'=>$post['id']),$changeArr);
					if($result){$msg=$msg;}else{$msg=array('msg'=>'<span class="text-danger">Oops it seems something went wrong while updating.</span>');}
				echo json_encode($msg);
			}
			}
/***********************************Code by @mit Singh end***********************************************/
        public function all_shift_data()
        {

            $post_data = $this->input->post();
            $record = $this->shift->shift_list($post_data);
            $i=$post_data['start'] + 1;
            $return['data'] = array();
            foreach ($record as $row) {

/*                $status = ($row->status == 1) ? '
                <a class="badge bg-success" href="javascript:void()" onClick="return changeStatus(\'' . $row->id . '\',\'0\',\'shift_manage\',\'Common/chageStatus\')" title="Click to Di-Active Shift Data" style=" padding:5px 12px 5px 12px;">Active</a>'
                :
                '<a href="javascript:void()"  onClick="return changeStatus(\'' . $row->id . '\',\'1\',\'shift_manage\',\'Common/chageStatus\')" title="Click to Active Shift Data" class="badge bg-danger">Deactive</a>';*/
				
			    $status=($row->status==1)?'
                <a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===software/shift/manage==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to De-Active " id="arvs--'.$row->id.'">Active</a>'
				:'<a href="javascript:void()" data-id="miStatusView===software/shift/manage==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-danger getAction" id="arvs--'.$row->id.'">Deactive</a>';
				

                $view = '<div style="text-align:center"><a href="javascript:void(0);"data-bs-target="#view_shift_modal" data-bs-toggle="modal" onclick="view_shift(' . $row->id . ')" title="Click to View Shift Details" class="btn ripple miView btn-sm"><i class="ti-eye"></i></a>&emsp;
                <a href="javascript:void(0);" data-bs-target="#update_shift_modal" data-bs-toggle="modal" style="margin-left:-13px;"  onclick="update_shift(' . $row->id . ')" title="Click to Update Shift Details" class="btn ripple btn-secondary btn-sm"><i class="ti-pencil-alt"></i></a></a></div>';

                $return['data'][] = array(

                    '<strong>'.$i++.'.</strong>',
                    "shift0".$row->id,
                    $row->shift_name,
                    $row->shift_duration,
                    $row->shift_start,
                    $row->shift_end,
                    $row->grace_periods."&nbsp;min",
                    $status,
                    $view,

                );

            }
            $return['recordsTotal'] = $this->shift->shift_count();
            $return['recordsFiltered'] = $this->shift->shift_filter_count($post_data);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);

        }

        public function add_shift() {

            $data['title']='Add Shift';
            $data['breadcrums'] = 'Add Shift';
            $data['layout']= "software/shift/add_shift.php";
            $this->load->view('base',$data);

        }

        public function add_shift_data() {

            $this->form_validation->set_rules('shift_name', 'Shift Name', 'required');
            $this->form_validation->set_rules('shift_duration', 'Shift Duration', 'required');
            $this->form_validation->set_rules('shift_start', 'Shift Start Time', 'required');
            $this->form_validation->set_rules('shift_end', 'Shift End Time', 'required');

            if($this->form_validation->run() == TRUE) {

                $add = $this->input->post();
                $shift_start = date('h:i a ', strtotime($add['shift_start']));
                $shift_end   = date('h:i a', strtotime($add['shift_end']));

                $shift = array(

                    'shift_name'              => $add['shift_name'],
                    'shift_duration'          => $add['shift_duration'],
                    'shift_start'             => $shift_start,
                    'shift_end'               => $shift_end,
                    'created_by_user_type_id' => $this->session->userdata('mim_id'),
                    'created_at'              => date('Y-m-d'),

                );

                $this->common->save_data('shift_manage', $shift);
                $data=array('addClas'=>'tst_success','msg'=>array('Shift Data Added Successfully'),'icon'=>'<i class="ti-check-box"></i>');

            } else {

                $msg = array(

                    'shift_name'     => form_error('shift_name'),
                    'shift_duration' => form_error('shift_duration'),
                    'shift_start'    => form_error('shift_start'),
                    'shift_end'      => form_error('shift_end'),
                    
                );
                $data=array('addClas' => 'tst_danger', 'msg' => $msg, 'icon' => '<i class="fe fe-settings bx-spin"></i>');
            }
            echo json_encode($data);
        }

        public function view_shift_data() {

            $view = $this->input->post();
            $data['view_shift'] = $this->common->get_data('shift_manage', array('id' => $view['id']), 'id, shift_name, shift_duration, shift_start, shift_end, status');
            $this->load->view('software/shift/view_shift',$data);

        }

        public function update_shift() {

            $update = $this->input->post();
            $data['update_shift'] = $this->common->get_data('shift_manage', array('id' => $update['id']), 'id, shift_name, shift_duration, shift_start, shift_end, status');
            $this->load->view('software/shift/update_shift',$data);

        }

        public function update_shift_data() {

            $this->form_validation->set_rules('shift_name', 'Shift Name', 'required');
            $this->form_validation->set_rules('shift_duration', 'Shift Duration', 'required');

            if($this->form_validation->run() == TRUE) {

                $post = $this->input->post();

                if(empty($post['shift_start'])) {
                    $shift_start_time = $post['previous_shift_start'];
                } else {
                    $shift_start_time = $post['shift_start'];
                }

                if(empty($post['shift_end'])) {
                    $shift_end_time = $post['previous_shift_end'];
                } else {
                    $shift_end_time = $post['shift_end'];
                }

                $shift_start = date('h:i a ', strtotime($shift_start_time));
                $shift_end   = date('h:i a', strtotime($shift_end_time));
 
                $shift_data = array(

                    'id'             => $post['id'],
                    'shift_name'     => $post['shift_name'],
                    'shift_duration' => $post['shift_duration'],
                    'shift_start'    => $shift_start,
                    'shift_end'      => $shift_end,

                );

                $this->common->update_data('shift_manage', array('id' => $post['id']), $shift_data);
                $data=array('addClas'=>'tst_success','msg'=>array('Shift Data Updated Successfully'),'icon'=>'<i class="ti-check-box"></i>'); 

            } else {

                $msg = array(

                    'shift_name'     => form_error('shift_name'),
                    'shift_duration' => form_error('shift_duration'),

                );
                $data=array('addClas' => 'tst_danger', 'msg' => $msg, 'icon' => '<i class="fe fe-settings bx-spin"></i>');
            }
            echo json_encode($data);

        }

    }
?>
