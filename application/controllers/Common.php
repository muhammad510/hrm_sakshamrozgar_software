<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Common extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('setting/Common_model', 'common');
        ($this->session->userdata('mim_id') == '') ? redirect(base_url(), 'refresh') : '';
        error_reporting(0);
    }

    function chageStatus()
    {
        if ($this->input->is_ajax_request()) {
            $data = $this->input->post();
            //print_r($data);die;
            $this->common->chageStatus($data);
            echo ($data['status'] == 1) ? "
				  <a style='color:green' href='javascript:void()'onClick='return changeStatus(\"" . $data['id'] . "\",\"0\",\"" . $data['table'] . "\",\"" . $data['loader'] . "\")'title='click to block user'><b><i class='fa fa-check'></i> </b></a>" : "
				  <a style='color:red'   href='javascript:void()'onClick='return changeStatus(\"" . $data['id'] . "\",\"1\",\"" . $data['table'] . "\",\"" . $data['loader'] . "\")'title='click to active user'><b><i class='fa fa-times'></i></b></a>";
        }
    }

    function idcard($employee_id)
    {
        $this->db->select('s.*,d.department_name as department,de.designation_name as designation')->from('staff as s')->where('s.employee_id', $employee_id);
        $this->db->join('department as d', 'd.id=s.department');
        $this->db->join('designation as de', 'de.id=s.designation');
        $data['employee'] = $this->db->get()->row();
        // print_r($data);
        // die;


        // $data['employee'] = $this->db_model->select_multi('*', 'staff', ['employee_id' => $employee_id]);
        $this->load->view('id_card', $data);
    }
}
