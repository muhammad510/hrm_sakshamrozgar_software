<?php

    class Branch_model  extends CI_Model
    {

        public function __construct()
        {

            parent::__construct();

        }

        /*-----------------------------Branch Start-------------------------------*/

        public function branch_query($where = false)
        {
            
            $field = array('code','branch_name','contact_person_name','phone_nu','mobile_nu','branch_email','status');
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
            $this->db->select('*')->from('branch_manage');

            if((!empty($where['state'])) && ($where['state']!="all"))
			{
                $this->db->where('state',$where['state']);
            }
            if(!empty($where['brName'])){
                $this->db->where('branch_name',$where['brName']);
            }
            if((!empty($where['searchTyp'])) && ($where['searchTyp']!="all"))
            {
                $this->db->where($where['searchTyp'],$where['srchContent']);
            }

            if (isset($where['order']) && !empty($where['order'])) {
                $this->db->order_by($field[$where['order']['0']['column']], $where['order']['0']['dir']);
            } else {
                
                $this->db->order_by('id', 'desc');
            }

        }

        public function branch_list($where = false)
        {

            $this->branch_query($where);

            if ($where['length'] != -1) {
                $this->db->limit($where['length'], $where['start']);
            }
            return $this->db->get()->result();

        }

        public function branch_count($where = false)
        {

            $this->branch_query();
            return $this->db->get()->num_rows();

        }

        public function branch_filter_count($where = false)
        {

            $this->branch_query($where);
            return $this->db->get()->num_rows();

        }
		
		public function getStateDistrict($id)
		{
			return $this->db->from('states_cities')->where('parent_id','729')->or_where('parent_id',$id)->order_by("parent_id","desc")->get()->result();
			}
		public function getDesignationListByDepartment($id)
		{
			return $this->db->from('designation')->where_in('department',$id)->get()->result();
			}
	  public function getDesignationListGroupByDepartment($where)
	  {
			return $this->db->select('GROUP_CONCAT( DISTINCT designation_name) as "designations"')->from('designation')->where_in('id',$where)->get()->row();
		}
	
    }

?>