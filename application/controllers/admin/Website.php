<?php
defined('BASEPATH') or exit('No direct script access allowed');

class website extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('setting/leave_model', 'leave');
        ($this->session->userdata('mim_id') == '') ? redirect(base_url(), 'refresh') : '';
        $this->logID = $this->session->userdata('mim_id');
        error_reporting(0);
    }

    public function getcareer($actn = NULL)
    {


        if ($actn == 'list') {
            $post_data = $this->input->post();
            $record = $this->leave->website_list($post_data);
            //echo $this->db->last_query();die;
            // print_r($record);exit;
            $i = $post_data['start'] + 1;
            $return['data'] = array();
            $web_url = "https://sakshamrozgar.com/";
            foreach ($record as $row) {

                if (!empty($row->resume)) {
                    $resume = '<a href="' . $web_url . $row->resume . '" class="btn btn-sm btn-primary" target="_blank"><i class="fa pe-2 fa-download"></i>Download</a>';
                } else {
                    $resume = '<span class="text-danger">No Resume</span>';
                }

                $return['data'][] = array(
                    '<div style="font-weight:900;text-align:center;">' . $i++ . '.</div>',
                    $row->name,
                    $row->email,
                    $row->phone,
                    $row->position,
                    $resume,
                    '<a href="' . $web_url . $row->c_img . '" class="btn btn-sm btn-primary" target="_blank"><i class="fa pe-2 fa-download"></i>Image</a>'
                );
            }
            $return['recordsTotal'] = $this->leave->website_count();
            $return['recordsFiltered'] = $this->leave->website_filter_count($post_data);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);
        } else {
            $data['title'] = 'Career List';
            $data['breadcrums'] = 'Career List';
            $data['target'] = 'admin/website/getcareer/list';
            $data['layout'] = "admin/website/career_list.php";
            $this->load->view('adm_base', $data);
        }
    }

    public function enquiry_list($actn = NULL)
    {

        if ($actn == 'list') {
            $post_data = $this->input->post();
            $record = $this->leave->website_enquiry_list($post_data);
            //echo $this->db->last_query();die;
            // print_r($record);exit;
            $i = $post_data['start'] + 1;
            $return['data'] = array();
            foreach ($record as $row) {

                $message_words = explode(' ', strip_tags($row->message));
                $slide_word = implode(' ', array_slice($message_words, 0, 3));
                $view = '<div style="text-align:center">
				  <a href="view_enquiry/' . $row->id . '" title="Click to view details" class="btn ripple miView btn-sm getAction">				                    <i class="ti-eye"></i>
				  </a>&emsp;
    			  <a href="delete_enquiry/' . $row->id . '"  style="margin-left:-13px;"  title="Click to Delete Details"  onclick="return confirm(\'Are you sure you want to delete this enquiry?\');" class="btn ripple btn-secondary btn-sm getAction">
					<i class="fa fa-trash "></i>
				  </a>
					   </div>';

                $return['data'][] = array(
                    '<div style="font-weight:900;text-align:center;">' . $i++ . '.</div>',
                    $row->name,
                    $row->email,
                    $row->phone,
                    $slide_word . '...',
                    $view
                );
            }
            $return['recordsTotal'] = $this->leave->website_enquiry_count();
            $return['recordsFiltered'] = $this->leave->website_filter_enquiry_count($post_data);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);
        } else {
            $data['title'] = 'Enquiry List';
            $data['breadcrums'] = 'Enquiry List';
            $data['target'] = 'admin/website/enquiry_list/list';
            $data['layout'] = "admin/website/enquiry_list.php";
            $this->load->view('adm_base', $data);
        }
    }


    public function delete_enquiry($id)
    {
        if (!empty($id)) {
            $deleted =  $this->db->where('id', $id)->delete('enquiry');
            if ($deleted) {
                redirect('admin/website/enquiry_list');
            }
        }
    }

    public function view_enquiry($id)
    {
        $data['title'] = 'View Enquiry';
        $data['breadcrums'] = 'View Enquiry';
        $data['enquiry_data'] = $this->db->select('*')->from('enquiry')->where('id', $id)->get()->row();
        $data['layout'] = "admin/website/view_enquiry.php";
        $this->load->view('adm_base', $data);
    }
}
