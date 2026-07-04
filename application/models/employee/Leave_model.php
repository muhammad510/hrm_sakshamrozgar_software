<?php
class Leave_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

  public function leave_query($where=false,$empID=NULL)
  {
            
            $field = array('empLv.id','empLv.emp_id','empLv.leave_type');
            $i = 0;
            foreach ($field as $item) {
                if (!empty($where['search']['value'])) {
                    if ($i === 0) {$this->db->group_start();$this->db->like($item, $where['search']['value']);} else {$this->db->or_like($item, $where['search']['value']);}
                    if (count($field) - 1 == $i) {
                        $this->db->group_end();
                    }
                }
                $i++;
            }
            $this->db->select('empLv.*,leave_name')->from('employee_leave as empLv')->where('empLv.emp_id',$empID)->join('leave_manage as lvM', 'lvM.id=empLv.leave_type','left');

			if((!empty($where['leaveTp'])) && ($where['leaveTp']!="99"))
            {
                $this->db->where('empLv.leave_type',$where['leaveTp']);
            }
			 if(!(empty($where['strtDt'])&& empty($where['endDt'])))
			{

				$this->db->where('empLv.created_date >=',date('Y-m-d',strtotime(str_replace('/','-',$where['strtDt']))));
				$this->db->where('empLv.created_date <=',date('Y-m-d',strtotime(str_replace('/','-',$where['endDt']))));
				}

			if((!empty($where['applyStatus'])) && ($where['applyStatus']!="99"))
			{
				$this->db->where('empLv.status',$where['applyStatus']);
			}



            if (isset($where['order']) && !empty($where['order'])) {
                $this->db->order_by($field[$where['order']['0']['column']], $where['order']['0']['dir']);
            } else {
                
                $this->db->order_by('created_date', 'desc');
            }

        }

        public function leave_list($where=false,$empID=NULL)
        {
			$this->leave_query($where,$empID); if($where['length'] != -1){$this->db->limit($where['length'], $where['start']);}return $this->db->get()->result();
        }
        public function leave_count($empID=NULL)
		{
			$this->leave_query($where=false,$empID);
			return $this->db->get()->num_rows();
			}
        public function leave_filter_count($where=false,$empID=NULL){$this->leave_query($where,$empID);return $this->db->get()->num_rows();}
		
		public function getLeaveDetails($appID)
		{
			//return $this->db->select('empLv.*,leave_name')->from('employee_leave as empLv')->where('empLv.emp_id',$this->logId)->where('empLv.id',$appID)->join('leave_manage as lvM', 'lvM.id=empLv.leave_type','left')->get()->row();
			return $this->db->select('empLv.id,empLv.emp_id,empLv.leave_mode,empLv.leave_type,s.employee_id,s.name,desig.designation_name,leave_name,DATE_FORMAT(empLv.from_date,"%d-%b-%Y") as from_date,DATE_FORMAT(empLv.end_date,"%d-%b-%Y") as end_date,empLv.total_leave,empLv.reason,empLv.status,DATE_FORMAT(empLv.created_date,"%d-%b-%Y") as created_date')->from('employee_leave as empLv')->join('leave_manage as lvM', 'lvM.id=empLv.leave_type','left')->join('staff as s', 's.id=empLv.emp_id','left')->join('designation as desig', 'desig.id=s.designation','left')->where('empLv.id',$appID)->get()->row();
			}
		
	
}

