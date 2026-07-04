<?php
class Team_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->logID=$this->session->userdata('mim_id');
	}


	public function employee($limit,$offset)
	{
		$isTeam=$this->db->select('team_member')->from('mapped_team')->where('head_id',$this->logID)->get()->result();
		if($isTeam)
		{
			$getTeam='';foreach($isTeam as $teamID){$getTeam=($getTeam?($getTeam.','.$teamID->team_member):$teamID->team_member);}
			$getTeamID=array_unique(explode(",",$getTeam));
		     return $this->db->select("id,employee_id,CONCAT(IF(surname!='',surname,''),IF(surname!='' AND name !='',' ',''),name) AS empName")->from("staff")->where_in("id",$getTeamID)->limit($limit, $offset)->get()->result();

			}
		}
	public function total_employees()
	{
	    $isTeam=$this->db->select('team_member')->from('mapped_team')->where('head_id',$this->logID)->get()->result();
		if($isTeam)
		{
			$getTeam='';foreach($isTeam as $teamID){$getTeam=($getTeam?($getTeam.','.$teamID->team_member):$teamID->team_member);}
			$getTeamID=array_unique(explode(",",$getTeam));
		    $return=(count($getTeamID)>0)?$this->db->select("id,employee_id,CONCAT(IF(surname!='',surname,''),IF(surname!='' AND name !='',' ',''),name) AS empName")->from("staff")->where_in("id",$getTeamID)->get()->result():array();
			return count($return);
			}
		 }	
	public function get_empWorking($where)
	{
		return $this->db->select('id,staff_attendance_type_id,log_in_time,log_out_time')->where('employee_id',$where['emp_id'])->where('attendance_date',$where['attendanceDate'])->get('staff_attendance')->row();
	}
	public function empAttendance($where)
	{
		return $this->db->select('count(id) as total')->where('employee_id',$where['emp_id'])->where('staff_attendance_type_id',$where['typeID'])->where('attendance_date >=',$where['strtDt'])->where('attendance_date <=',$where['endDt'])->get('staff_attendance')->row();
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
            $this->db->select('empLv.*,leave_name')->from('employee_leave as empLv')->where_in('empLv.emp_id',$empID)->join('leave_manage as lvM', 'lvM.id=empLv.leave_type','left');

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
			
	public function is_team_employee()
	{
	    $isTeam=$this->db->select('team_member')->from('mapped_team')->where('head_id',$this->logID)->get()->result();
		if($isTeam)
		{
			$getTeam='';foreach($isTeam as $teamID){$getTeam=($getTeam?($getTeam.','.$teamID->team_member):$teamID->team_member);}
			$getTeamID=array_unique(explode(",",$getTeam));
			return $getTeamID;
			}
		 }		
		
		
		
		
		
}

