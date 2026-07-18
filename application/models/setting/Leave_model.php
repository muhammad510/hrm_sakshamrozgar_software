<?php

class Leave_model  extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->logCat = $this->session->userdata('user_cate');
        $this->logBr = $this->session->userdata('mi_brID');
    }

    /*-----------------------------leave Setting Start-------------------------------*/
    public function leave_query($where = false)
    {

        $field = array('leaveID', 'leave_name', 'credit_type', 'leave_credit', 'status');
        $i = 0;
        foreach ($field as $item) {
            if (!empty($where['search']['value'])) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $where['search']['value']);
                } else {
                    $this->db->or_like($item, $where['search']['value']);
                }
                if (count($field) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }
        $this->db->select('*')->from('leave_manage');


        if (!empty($where['leaveID'])) {
            $this->db->where('leaveID', $where['leaveID']);
        }
        if (!empty($where['leaveName'])) {
            $this->db->where('leave_name', $where['leaveName']);
        }
        if ((!empty($where['leaveSts'])) && ($where['leaveSts'] != "99")) {
            $this->db->where('status', $where['leaveSts']);
        }

        if (isset($where['order']) && !empty($where['order'])) {
            $this->db->order_by($field[$where['order']['0']['column']], $where['order']['0']['dir']);
        } else {

            $this->db->order_by('id', 'desc');
        }
    }
    public function leave_list($where = false)
    {

        $this->leave_query($where);

        if ($where['length'] != -1) {
            $this->db->limit($where['length'], $where['start']);
        }
        return $this->db->get()->result();
    }
    public function leave_count($where = false)
    {

        $this->leave_query();
        return $this->db->get()->num_rows();
    }
    public function leave_filter_count($where = false)
    {

        $this->leave_query($where);
        return $this->db->get()->num_rows();
    }
    /*-----------------------------leave Setting End-------------------------------*/
    /*-----------------------------leave Applied Start-------------------------------*/
    public function applied_leave($where = false, $apply = NULL)
    {

        $field = array('empLv.id', 'empLv.emp_id', 'empLv.leave_type');
        $i = 0;
        foreach ($field as $item) {
            if (!empty($where['search']['value'])) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $where['search']['value']);
                } else {
                    $this->db->or_like($item, $where['search']['value']);
                }
                if (count($field) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }
        $this->db->select('empLv.id,empLv.emp_id,empLv.leave_mode,empLv.leave_type,s.employee_id,s.name,leave_name,empLv.from_date,empLv.end_date,empLv.total_leave,empLv.reason,empLv.status,empLv.created_date')->from('employee_leave as empLv')->join('leave_manage as lvM', 'lvM.id=empLv.leave_type', 'left')->join('staff as s', 's.id=empLv.emp_id', 'left');
        if ($this->logCat == '5') {
            $this->db->where('s.branch_id', $this->logBr)->where('s.user_type', '4');
        }
        if ($apply == 'apply') {
            $this->db->where_in('empLv.status', array('3', '4'));
        }
        if ($apply == 'approved') {
            $this->db->where_in('empLv.status', array('1', '2'));
        }
        if ((!empty($where['leaveTp'])) && ($where['leaveTp'] != "99")) {
            $this->db->where('empLv.leave_type', $where['leaveTp']);
        }
        if (!(empty($where['strtDt']) && empty($where['endDt']))) {

            $this->db->where('empLv.created_date >=', date('Y-m-d', strtotime(str_replace('/', '-', $where['strtDt']))));
            $this->db->where('empLv.created_date <=', date('Y-m-d', strtotime(str_replace('/', '-', $where['endDt']))));
        }

        if ((!empty($where['applyStatus'])) && ($where['applyStatus'] != "99")) {
            $this->db->where('empLv.status', $where['applyStatus']);
        }



        if (isset($where['order']) && !empty($where['order'])) {
            $this->db->order_by($field[$where['order']['0']['column']], $where['order']['0']['dir']);
        } else {

            $this->db->order_by('empLv.id', 'desc');
        }
    }

    public function applied_list($where = false, $apply = NULL)
    {
        $this->applied_leave($where, $apply);
        if ($where['length'] != -1) {
            $this->db->limit($where['length'], $where['start']);
        }
        return $this->db->get()->result();
    }

    public function applied_leave_count($apply = NULL)
    {
        $this->applied_leave($where = false, $apply);
        return $this->db->get()->num_rows();
    }
    public function applied_leave_filter_count($where = false, $apply = NULL)
    {
        $this->applied_leave($where, $apply);
        return $this->db->get()->num_rows();
    }
    /*-----------------------------leave Applied End-------------------------------*/
    public function getLaeveApplication($id)
    {
        return $this->db->select('empLv.id,empLv.emp_id,empLv.leave_mode,empLv.leave_type,s.employee_id,s.name,desig.designation_name,leave_name,DATE_FORMAT(empLv.from_date,"%d-%b-%Y") as from_date,DATE_FORMAT(empLv.end_date,"%d-%b-%Y") as end_date,empLv.total_leave,empLv.reason,empLv.status,DATE_FORMAT(empLv.created_date,"%d-%b-%Y") as created_date')->from('employee_leave as empLv')->join('leave_manage as lvM', 'lvM.id=empLv.leave_type', 'left')->join('staff as s', 's.id=empLv.emp_id', 'left')->join('designation as desig', 'desig.id=s.designation', 'left')->where('empLv.id', $id)->get()->row();
    }

    public function getRestLeave($id)
    {
        return $this->db->select('empLv.emp_id,s.name,empLv.from_date,empLv.end_date,empLv.leave_type,empLv.total_leave,s.approved_leave,s.leave_in_between,sft.shift_start,sft.shift_end')->from('employee_leave as empLv')->join('staff as s', 's.id=empLv.emp_id', 'left')->join('shift_manage as sft', 'sft.id=s.shift', 'left')->where('empLv.id', $id)->get()->row();
    }


    public function is_leave($where = false, $type = NULL)
    {

        $field = array('empLv.id', 'empLv.emp_id', 'empLv.leave_type');
        $i = 0;
        foreach ($field as $item) {
            if (!empty($where['search']['value'])) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $where['search']['value']);
                } else {
                    $this->db->or_like($item, $where['search']['value']);
                }
                if (count($field) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }
        $this->db->select('empLv.id,empLv.emp_id,empLv.leave_mode,empLv.leave_type,s.employee_id,s.name,leave_name,empLv.from_date,empLv.end_date,empLv.total_leave,empLv.reason,empLv.status,empLv.created_date')->from('employee_leave as empLv')->join('leave_manage as lvM', 'lvM.id=empLv.leave_type', 'left')->join('staff as s', 's.id=empLv.emp_id', 'left');
        if ($type) {
            $this->db->where('empLv.status', $type);
        }


        if ((!empty($where['leaveTp'])) && ($where['leaveTp'] != "99")) {
            $this->db->where('empLv.leave_type', $where['leaveTp']);
        }
        if (!(empty($where['strtDt']) && empty($where['endDt']))) {

            $this->db->where('empLv.created_date >=', date('Y-m-d', strtotime(str_replace('/', '-', $where['strtDt']))));
            $this->db->where('empLv.created_date <=', date('Y-m-d', strtotime(str_replace('/', '-', $where['endDt']))));
        }

        /*if((!empty($where['applyStatus'])) && ($where['applyStatus']!="99"))
		{
			$this->db->where('empLv.status',$where['applyStatus']);
		}*/



        if (isset($where['order']) && !empty($where['order'])) {
            $this->db->order_by($field[$where['order']['0']['column']], $where['order']['0']['dir']);
        } else {

            $this->db->order_by('empLv.id', 'desc');
        }
    }

    public function applied_leave_list($where = false, $type = NULL)
    {
        $this->is_leave($where, $type);
        if ($where['length'] != -1) {
            $this->db->limit($where['length'], $where['start']);
        }
        return $this->db->get()->result();
    }
    public function leave_counter($type = NULL)
    {
        $this->is_leave($where = false, $type);
        return $this->db->get()->num_rows();
    }
    public function leave_filter_counter($where = false, $type = NULL)
    {
        $this->is_leave($where, $type);
        return $this->db->get()->num_rows();
    }






    // ============================================================================== Sunny Changes start



    public function website_data($where = false)
    {

        $field = array('name', 'email', 'phone', 'position');
        $i = 0;
        foreach ($field as $item) {
            if (!empty($where['search']['value'])) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $where['search']['value']);
                } else {
                    $this->db->or_like($item, $where['search']['value']);
                }
                if (count($field) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }
        $this->db->select('name,email,id,phone,position,resume,c_img')->from('career');

        if (isset($where['order']) && !empty($where['order'])) {
            $this->db->order_by($field[$where['order']['0']['column']], $where['order']['0']['dir']);
        } else {

            $this->db->order_by('id', 'desc');
        }
    }




    public function website_list($where = false,)
    {
        $this->website_data($where);
        if ($where['length'] != -1) {
            $this->db->limit($where['length'], $where['start']);
        }
        return $this->db->get()->result();
    }


    public function website_count()
    {
        $this->website_data($where = false,);
        return $this->db->get()->num_rows();
    }
    public function website_filter_count($where = false)
    {
        $this->website_data($where);
        return $this->db->get()->num_rows();
    }




    // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


    public function website_enquiry_data($where = false)
    {

        $field = array('name', 'email', 'phone');
        $i = 0;
        foreach ($field as $item) {
            if (!empty($where['search']['value'])) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $where['search']['value']);
                } else {
                    $this->db->or_like($item, $where['search']['value']);
                }
                if (count($field) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }
        $this->db->select('name,id,email,phone,message')->from('enquiry');

        if (isset($where['order']) && !empty($where['order'])) {
            $this->db->order_by($field[$where['order']['0']['column']], $where['order']['0']['dir']);
        } else {

            $this->db->order_by('id', 'desc');
        }
    }




    public function website_enquiry_list($where = false)
    {
        $this->website_enquiry_data($where);
        if ($where['length'] != -1) {
            $this->db->limit($where['length'], $where['start']);
        }
        return $this->db->get()->result();
    }


    public function website_enquiry_count()
    {
        $this->website_enquiry_data($where = false,);
        return $this->db->get()->num_rows();
    }
    public function website_filter_enquiry_count($where = false)
    {
        $this->website_enquiry_data($where);
        return $this->db->get()->num_rows();
    }









    public function gallery_data($where = false)
    {

        $field = array('name', 'designation');
        $i = 0;
        foreach ($field as $item) {
            if (!empty($where['search']['value'])) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $where['search']['value']);
                } else {
                    $this->db->or_like($item, $where['search']['value']);
                }
                if (count($field) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }
        $this->db->select('name,id,image,designation,status')->from('cms_gallery');

        if (isset($where['order']) && !empty($where['order'])) {
            $this->db->order_by($field[$where['order']['0']['column']], $where['order']['0']['dir']);
        } else {
            $this->db->order_by('id', 'desc');
        }
    }




    public function gallery_list($where = false)
    {
        $this->gallery_data($where);
        if ($where['length'] != -1) {
            $this->db->limit($where['length'], $where['start']);
        }
        return $this->db->get()->result();
    }


    public function gallery_count()
    {
        $this->gallery_data($where = false,);
        return $this->db->get()->num_rows();
    }
    public function gallery_filter_count($where = false)
    {
        $this->gallery_data($where);
        return $this->db->get()->num_rows();
    }




    // ============================================================================== Sunny Changes end


}
