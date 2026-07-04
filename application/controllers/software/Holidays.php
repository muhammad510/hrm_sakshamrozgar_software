<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Holidays extends CI_Controller {
        
        public function __construct()
        {

            parent::__construct();
            $this->load->model('setting/Holidays_model', 'holidays');
            $this->load->model('setting/Common_model', 'common');
            ($this->session->userdata('mim_id')== '') ? redirect(base_url(), 'refresh') : '';
			$this->loggedID=$this->session->userdata('mim_id');
            error_reporting(0);	

        }

        public function manage_holidays() {

            $data['title']      = 'Manage Holidays';
            $data['breadcrumb'] = 'Manage Holidays';
            $data['holiday']    = 'software/Holidays/all_holiday_data';
            $data['layout']     = "software/holidays/manage_holidays.php";
            $this->load->view('base',$data);

        }

        public function add_holidays() {

            $this->load->view('software/holidays/add_holidays');

        }

        public function add_holidays_data() {

            $this->form_validation->set_rules('holiday_name', 'Holiday Name', 'required');
            $this->form_validation->set_rules('holiday_date', 'Holiday Date', 'required');

            if($this->form_validation->run() == TRUE) {

                $data = $this->input->post();

                $holidays = array(

                    'holiday_name'            => $data['holiday_name'],
                    'holiday_date'            => date('Y-m-d',strtotime(str_replace("/","-",$data['holiday_date']))),
                    'description'             => $data['description'],
                    'created_by_user_type_id' => $this->session->userdata('mim_id'),
                    'created_at'              => date('Y-m-d'),

                );
				//print_r($holidays);exit;
				
                $this->common->save_data('holidays', $holidays);
                $data = array('addClas' => 'tst_success', 'msg' => array('Holidays Data Added Successfully'), 'icon' => '<i class="ti-check-box"></i>');

            } else {

                $msg = array(

                    'holiday_name'  => form_error('holiday_name'),
                    'holiday_date'  => form_error('holiday_name'),

                );
                $data = array('addClas' => 'tst_danger', 'msg' => $msg, 'icon' => '<i class="fe fe-setting bx-spin"></i>');
            }
            echo json_encode($data);

        }

        public function all_holiday_data()
        {

            $post_data = $this->input->post();
            $record = $this->holidays->holiday_list($post_data);
            $i=$post_data['start'] + 1;
            $return['data'] = array();
            foreach ($record as $row) {

/*                $status = ($row->status == 1) ? '
                <a class="badge bg-primary" href="javascript:void()" onClick="return changeStatus(\'' . $row->id . '\',\'0\',\'holidays\',\'Common/chageStatus\')" title="Click to Di-Active Holidays Data" style="padding:5px 12px 5px 12px;">Active</a>'
                :'<a href="javascript:void()" onClick="return changeStatus(\'' . $row->id . '\',\'1\',\'holidays\',\'Common/chageStatus\')" title="Click to Active Holidays Data" class="badge bg-danger">Deactive</a>';*/
			$status = ($row->status == 1)?'
                <a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===software/holidays/manage==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to De-Active " id="arvs--'.$row->id.'">Active</a>'
				:'<a href="javascript:void()" data-id="miStatusView===software/holidays/manage==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-danger getAction" id="arvs--'.$row->id.'">Deactive</a>';	

                $view = '<a href="javascript:void(0);" data-bs-target="#update_holidays_modal" data-bs-toggle="modal" onclick="update_holiday(' . $row->id . ')" title="Click to Update Holidays Details" class="btn ripple btn-secondary btn-sm"><i class="ti-pencil-alt"></i></a>';

                $return['data'][] = array(

                    '<strong>'.$i++.'.</strong>',
                    $row->holiday_name,
                    $row->holiday_date,
                    $row->description,
					$status,
                    $view

                );

            }

            $return['recordsTotal'] = $this->holidays->holiday_count();
            $return['recordsFiltered'] = $this->holidays->holiday_filter_count($post_data);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);

        }

        public function update_holidays() {

            $update = $this->input->post();
            $data['update_holiday'] = $this->common->get_data('holidays', array('id' => $update['id']), 'id, holiday_name, holiday_date, description,status');
            $this->load->view('software/holidays/update_holiday', $data);

        }

        public function update_holidays_data() {

            $this->form_validation->set_rules('holiday_name', 'Holiday Name', 'required');
            $this->form_validation->set_rules('holiday_date', 'Holiday Date', 'required');

            if($this->form_validation->run() ==TRUE) {

                $upd = $this->input->post();

                $holiday = array(
									'holiday_name'            => $upd['holiday_name'],
									'holiday_date'            => $upd['holiday_date'],
									'description'             => $upd['description'],
									'created_by_user_type_id' => $this->loggedID,
									'updated_at'              => date('Y-m-d H:i:s')
                					);
                $this->common->update_data('holidays', array('id' => $upd['id']), $holiday);
                $data = array('addClas' => 'tst_success', 'msg' => array('Holidays Data Updated Successfully!'), 'icon' => '<i class="ti-check-box"></i>');

            } else {

                $msg = array(

                    'holiday_name' => form_error('holiday_name'),
                    'holiday_date' => form_error('holiday_date'),

                );
                $data = array('addClas' => 'tst_danger', 'msg' => $msg, 'icon' => '<li fa-fa-setting bx-spin></li>');
            }
            echo json_encode($data);

        }
/***********************************Code by @mit Singh start***********************************************/
 	public function manage()
 	{
 		
		$post=$this->input->post();
		if($post['oprType']=='miStatusView')
		{
			$getData=$this->common->getRowData('holidays','id',$post['id']);
			if($getData)
			{
				if($getData->status=='1')
				{	
					$msg=array(
								'msg'=>'<i class="si si-power"></i> Are you sure want to deactivate '.$getData->holiday_name.' of ID #'.$getData->id,
								'action'=>'miStatusChange===software/holidays/manage==='.$getData->id
								);
					}
					else
					{
						$msg=array(
									'msg'=>'Are you sure want to activate '.$getData->holiday_name.' of ID #'.$getData->id,
									'action'=>'miStatusChange===software/holidays/manage==='.$getData->id
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
			$getData=$this->common->getRowData('holidays','id',$post['id']);
			if($getData->status=='1')
			{
				$change='2';$msg=array('msg'=>'<span class="text-success"><i class="si si-power"></i> You have successfully deactivate '.$getData->holiday_name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Deactive','btnAdCls'=>'bg-danger ','btnRmvCls'=>'bg-success miLvs');
				}
				else
				{
					$change='1';$msg=array('msg'=>'<span class="text-success">You have successfully activate '.$getData->holiday_name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Active','btnAdCls'=>'bg-success miLvs','btnRmvCls'=>'bg-danger');
					}
					$changeArr=array('status'=>$change);
					$result=$this->common->update_data('holidays',array('id'=>$post['id']),$changeArr);
					if($result){$msg=$msg;}else{$msg=array('msg'=>'<span class="text-danger">Oops it seems something went wrong while updating.</span>');}
				echo json_encode($msg);
			}
			}
/***********************************Code by @mit Singh end***********************************************/

    }

?>