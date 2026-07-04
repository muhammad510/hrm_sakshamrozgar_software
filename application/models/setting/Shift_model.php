<?php

    class Shift_model  extends CI_Model
    {

        public function __construct()
        {

            parent::__construct();

        }

        /*-----------------------------Shifts Start-------------------------------*/

        public function shift_query($where = false)
        {
            
            $field = array('shift_id', 'shift_name', 'shift_start','status');
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
            $this->db->select('*')->from('shift_manage');

            /*if(!empty($where['designation'])){
                $this->db->where('des_title',$where['designation']);
            }
            if(!empty($where['payscale'])){
                $this->db->where('payscale',$where['payscale']);
            }
            if(!(empty($where['strtDt']) && empty($where['endDt'])))
            {
                $this->db->where('created_at >=',$where['strtDt']);
                $this->db->where('created_at <=',$where['endDt']);
            }*/

            if (isset($where['order']) && !empty($where['order'])) {
                $this->db->order_by($field[$where['order']['0']['column']], $where['order']['0']['dir']);
            } else {
                
                $this->db->order_by('id', 'desc');
            }

        }

        public function shift_list($where = false)
        {

            $this->shift_query($where);

            if ($where['length'] != -1) {
                $this->db->limit($where['length'], $where['start']);
            }
            return $this->db->get()->result();

        }

        public function shift_count($where = false)
        {

            $this->shift_query();
            return $this->db->get()->num_rows();

        }

        public function shift_filter_count($where = false)
        {

            $this->shift_query($where);
            return $this->db->get()->num_rows();

        }

    }

?>