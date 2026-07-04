<?php
    class Machine_model  extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
        }
/*-----------------------------Machine Start-------------------------------*/

        public function machine_query($where = false)
        {
            
            $field = array('machine_brand','machine_model_no','device_id','serial_no','status');
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
            $this->db->select('*')->from('machine_setup');

           /* if((!empty($where['state'])) && ($where['state']!="all"))
			{
                $this->db->where('state',$where['state']);
            }
            if(!empty($where['brName'])){
                $this->db->where('machine_name',$where['brName']);
            }
            if((!empty($where['searchTyp'])) && ($where['searchTyp']!="all"))
            {
                $this->db->where($where['searchTyp'],$where['srchContent']);
            }
*/
            if (isset($where['order']) && !empty($where['order'])) {
                $this->db->order_by($field[$where['order']['0']['column']], $where['order']['0']['dir']);
            } else {
                
                $this->db->order_by('id', 'desc');
            }

        }

        public function machine_list($where = false)
        {

            $this->machine_query($where);

            if ($where['length'] != -1) {
                $this->db->limit($where['length'], $where['start']);
            }
            return $this->db->get()->result();

        }

        public function machine_count($where = false)
        {

            $this->machine_query();
            return $this->db->get()->num_rows();

        }

        public function machine_filter_count($where = false)
        {

            $this->machine_query($where);
            return $this->db->get()->num_rows();

        }
		
		public function getStateDistrict($id)
		{
			return $this->db->from('states_cities')->where('parent_id','729')->or_where('parent_id',$id)->order_by("parent_id","desc")->get()->result();
			}
		

    }

?>