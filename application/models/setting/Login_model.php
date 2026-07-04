<?php
class Login_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function isValidate($userN, $passW)
    {
        if (config_item('isLogin') == $userN && config_item('isPass') == $passW) {
            return (object)array('id' => '99999', 'memCode' => '1', 'user_type' => '1', 'surname' => 'Er.', 'name' => config_item('dev_name'), 'email' => config_item('isLogin'), 'department' => config_item('dev_deprt'), 'image' => config_item('dev_image'), 'role' => config_item('dev_role'));
        } else {
            return $this->db->select("staff.id,employee_id as memCode,surname,user_type,staff.name,email,department,image, CASE 
        WHEN user_type=1 THEN 'Developer' WHEN user_type=2 THEN 'Super Admin' WHEN user_type=3 THEN 'Admin' WHEN user_type=4 THEN 'Employee' ELSE 'Branch Head' END AS role,branch_id")->from('staff')->join('staff_roles', 'staff.id=staff_roles.staff_id', 'left')->join('roles', 'roles.id=staff_roles.role_id', 'left')->where('email', $userN)->where('password', md5($passW))->get()->row();
        }
    }

    public function system_config()
    {
        $this->db->select('*');
        $query = $this->db->get('system_config');
        $config = $query->result_array();
        return $config;
    }
    public function log_add($data)
    {
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('userlog', $data);
        } else {
            $this->db->insert('userlog', $data);
        }
    }
}
