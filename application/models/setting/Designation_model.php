<?php

    class Designation_model  extends CI_Model
    {

        public function __construct()
        {

            parent::__construct();

        }

        /*----------------------------- Designation Start -------------------------------*/

        public function designation_query($where = false)
        {
            
            $field = array('desig.id', 'desig.designation_name', 'desig.description', 'desig.status', 'depart.department_name');
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
            $this->db->join('department as deprt', 'deprt.id = desig.department', 'left');
            $this->db->select('desig.id, desig.designation_name, desig.description, desig.status, deprt.department_name,desig.is_priority')->from('designation as desig');
            
            if (isset($where['order']) && !empty($where['order'])) {
                $this->db->order_by($field[$where['order']['0']['column']], $where['order']['0']['dir']);
            } else {
                
                $this->db->order_by('id', 'desc');
            }

        }

        public function designation_list($where = false)
        {

            $this->designation_query($where);

            if ($where['length'] != -1) {
                $this->db->limit($where['length'], $where['start']);
            }
            return $this->db->get()->result();

        }

        public function designation_count($where = false)
        {

            $this->designation_query();
            return $this->db->get()->num_rows();

        }

        public function designation_filter_count($where = false)
        {

            $this->designation_query($where);
            return $this->db->get()->num_rows();

        }

    }

?>