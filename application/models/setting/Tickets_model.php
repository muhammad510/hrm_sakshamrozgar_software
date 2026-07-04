<?php

    class Tickets_model  extends CI_Model
    {

        public function __construct()
        {
            parent::__construct();
			$this->logID=$this->session->userdata('mim_id');
			$this->logCat=$this->session->userdata('user_cate');
        	/*print_r($this->logCat);
			exit;*/	
		}

        /*----------------------------- tickets Start -------------------------------*/

        public function tickets_query($where = false,$actn=NULL)
        {
            
            $field = array('tic.id', 'tic.ticket_id', 'tic.description', 'tic.status', 'depart.subject');
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
				$this->db->select("tic.id,tic.ticket_id, CASE WHEN LENGTH(tic.subject) > 20 THEN CONCAT(SUBSTRING(tic.subject, 1, 24), '...')
        ELSE tic.subject END AS subject,tic.priority,cat.name as category,tic.status,tic.description,tic.created_date")->from('tickets as tic')->join('tickets_category as cat', 'cat.id = tic.category_id', 'left');
		if($this->logCat=='4'){$this->db->where('tic.created_by',$this->logID);}
		
		if($actn=='active'){ $this->db->where_in('tic.status',array('Open','In Progress','Resolved'));}
		if($actn=='closed'){ $this->db->where('tic.status','Closed');}
            
            if (isset($where['order']) && !empty($where['order'])) {
                $this->db->order_by($field[$where['order']['0']['column']], $where['order']['0']['dir']);
            } else {
                
                $this->db->order_by('id', 'desc');
            }

        }

        public function tickets_list($where = false,$actn=NULL)
        {

            $this->tickets_query($where,$actn);

            if ($where['length'] != -1) {
                $this->db->limit($where['length'], $where['start']);
            }
            return $this->db->get()->result();

        }

        public function tickets_count($where = false,$actn=NULL)
        {

            $this->tickets_query($actn);
            return $this->db->get()->num_rows();

        }

        public function tickets_filter_count($where = false,$actn=NULL){$this->tickets_query($where,$actn);return $this->db->get()->num_rows();}
		public function getLastReplied($id){return $this->db->select('created_date')->from('tickets_comment')->where('ticket_id',$id)->order_by('id','DESC')->get()->row();}	
		public function getRaisedTicket($id)
		{
		/*
			SELECT tic.id,tic.ticket_id as tID,CONCAT(IF(s.surname != '', s.surname, ''), IF(s.surname != '' AND s.name != '', ' ', ''), s.name) AS tUser,t_cat.name as category,
			tic.priority,CASE WHEN tic.priority = 'low' THEN 'proLow' WHEN tic.priority = 'high' THEN 'priHigh'ELSE 'priMedi' END as priority_status,
			CONCAT(IF(asignT.surname != '', asignT.surname, ''), IF(asignT.surname != '' AND asignT.name != '', ' ', ''), asignT.name) AS tAssign,tic.created_date as openDt,
			tic.status,CASE WHEN tic.status = 'Open' THEN 'prOpn'WHEN tic.status = 'In Progress' THEN 'proHigh'ELSE 'Resolved' END as status_status, tlog.created_date as tLastReplied,
			tic.subject,tic.description FROM tickets as tic LEFT JOIN tickets_category as t_cat ON t_cat.id = tic.category_id LEFT JOIN staff as s ON s.id = tic.created_by LEFT JOIN staff as asignT ON asignT.id = tic.assign_id
			LEFT JOIN (SELECT ticket_id, MAX(created_date) as created_date FROM tickets_comment GROUP BY ticket_id) as tlog ON tic.id = tlog.ticket_id 
			WHERE tic.id = '5'
		*/
			return $this->db->select("tic.id,tic.ticket_id as tID,CONCAT(IF(s.surname!='',s.surname,''),IF(s.surname!='' AND s.name !='',' ',''),s.name) AS tUser,desig.designation_name as designation,t_cat.name as category,tic.priority, CASE WHEN tic.priority = 'low' THEN 'proLow' WHEN tic.priority = 'high' THEN 'priHigh'ELSE 'priMedi' END as priSts,CONCAT(IF(asignT.surname!='',asignT.surname,''),IF(asignT.surname!='' AND asignT.name !='',' ',''),asignT.name) AS tAssign,tic.created_date as openDt,tic.status
,CASE WHEN tic.priority = 'Low' THEN 'priLow' WHEN tic.priority = 'High' THEN 'priHigh' ELSE 'priMedi' END as priSts,CASE WHEN tic.status = 'Open' THEN 'ticOpen' WHEN tic.status = 'In Progress' THEN 'ticPrgrs' WHEN tic.status = 'Closed' THEN 'ticClsd' ELSE 'ticRslv' END as ticSts,tic.subject,tic.description,tic.subject,tic.created_by")->from('tickets as tic')->join('tickets_category as t_cat', 't_cat.id=tic.category_id', 'left')->join('staff as s', 's.id=tic.created_by', 'left')->join('staff as asignT', 'asignT.id=tic.assign_id', 'left')->join('designation as desig', 'desig.id=s.designation', 'left')->where('tic.id',$id)->get()->row();
			}
		public function getChat($id)
		{
			return $this->db->select('tCom.*,s.image')->from('tickets_comment as tCom')->join('staff as s', 's.id=tCom.staff_id', 'left')->where('tCom.ticket_id',$id)->order_by('tCom.id','DESC')->get()->result();
			}		
				

    }

?>