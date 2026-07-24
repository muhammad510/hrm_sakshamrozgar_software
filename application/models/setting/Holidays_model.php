<?php

    class Holidays_model  extends CI_Model
    {

        public function __construct()
        {

            parent::__construct();

        }

        /*-----------------------------Holidays Start-------------------------------*/

        public function holiday_query($where = false)
        {
            
            $field = array('id', 'holiday_name', 'from_date','to_date','description', 'status');
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
            $this->db->select('id, holiday_name, from_date,to_date, description, status')->from('holidays');
            
            if (isset($where['order']) && !empty($where['order'])) {
                $this->db->order_by($field[$where['order']['0']['column']], $where['order']['0']['dir']);
            } else {
                
                $this->db->order_by('id', 'desc');
            }

        }

        public function holiday_list($where = false)
        {

            $this->holiday_query($where);

            if ($where['length'] != -1) {
                $this->db->limit($where['length'], $where['start']);
            }
            return $this->db->get()->result();

        }

        public function holiday_count($where = false)
        {

            $this->holiday_query();
            return $this->db->get()->num_rows();

        }

        public function holiday_filter_count($where = false)
        {

            $this->holiday_query($where);
            return $this->db->get()->num_rows();

        }

    }

?>