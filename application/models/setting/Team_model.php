<?php

    class Team_model  extends CI_Model
    {

        public function __construct()
        {

            parent::__construct();

        }

public function findEmployeeByNmID($id)
{
	if(!preg_match("/^[a-zA-Z\s, ]+$/",$id)){return $this->db->select('id,employee_id,name,shift')->from('staff')->where('employee_id',$id)->where('user_type','4')->get()->result();} 
	else{return $this->db->select('id,employee_id,name,shift')->from('staff')->like('name',$id)->where('user_type','4')->get()->result();}
	}
public function findReportingByNmID($id)
{
	if(!preg_match("/^[a-zA-Z\s, ]+$/",$id))
	{return $this->db->select("s.id,s.employee_id,CONCAT(IF(s.surname!='',s.surname,''),IF(s.surname!='' AND s.name !='',' ',''),s.name) AS name,s.shift")->from('staff as s')->where('s.employee_id',$id)->where('s.user_type','4')->where('d.is_priority','Highest')->join('designation as d','d.id=s.designation','left')->get()->result();} 
		else{return $this->db->select("s.id,s.employee_id,CONCAT(IF(s.surname!='',s.surname,''),IF(s.surname!='' AND s.name !='',' ',''),s.name) AS name,s.shift")->from('staff as s')->like('name',$id)->where('user_type','4')->where('d.is_priority','Highest')->join('designation as d','d.id=s.designation','left')->get()->result();}
	}
public function getTempMappedTeam($id){return $this->db->select("GROUP_CONCAT(emp_id SEPARATOR ',') AS team_member")->from('mapped_temp_team')->where('created_by',$id)->group_by('created_by')->get()->row();}	
public function getEmployeeDetail($id)
{
	    $this->db->select("s.id,s.employee_id,CONCAT(IF(s.surname!='',s.surname,''),IF(s.surname!='' AND s.name !='',' ',''),s.name) AS empName,designation_name as desgination,department_name as department,branch_name as branch")->from('staff as s');
		$this->db->where('s.status','1')->where('s.id',$id)->join('designation as d','d.id=s.designation','left')->join('department as dept','dept.id=s.department','left')->join('branch_manage as br','br.id=s.branch_id','left');
		$result = $this->db->get();
		return $result->row();
	}	
public function getTempList($id)
{
        $this->db->select("mtt.id,s.employee_id,CONCAT(IF(s.surname!='',s.surname,''),IF(s.surname!='' AND s.name !='',' ',''),s.name) AS empName,designation_name as desgination,department_name as department,branch_name as branch")->from('staff as s');
		$this->db->where('s.status','1')->where('mtt.created_by',$id)->join('designation as d','d.id=s.designation','left')->join('department as dept','dept.id=s.department','left')->join('branch_manage as br','br.id=s.branch_id','left');
		$result = $this->db->join('mapped_temp_team as mtt','s.id=mtt.emp_id','left')->get();
		return $result->result();

	}     
public function getTempData($id)
{
        $this->db->select("mtt.id,mtt.created_by as created,s.employee_id,CONCAT(IF(s.surname!='',s.surname,''),IF(s.surname!='' AND s.name !='',' ',''),s.name) AS empName,designation_name as desgination,department_name as department,branch_name as branch");
		$this->db->from('staff as s')->where('s.status','1')->where('mtt.id',$id)->join('designation as d','d.id=s.designation','left')->join('department as dept','dept.id=s.department','left')->join('branch_manage as br','br.id=s.branch_id','left');
		$result = $this->db->join('mapped_temp_team as mtt','s.id=mtt.emp_id','left')->get();
		return $result->row();

	} 
public function getTeamMember($where)
{
   $isTeamMate=$this->db->select("id,CONCAT(IF(surname!='',surname,''),IF(surname!='' AND name !='',' ',''),name) AS memName,image")->from('staff')->where('status','1')->where_in('id',$where)->limit('4')->get()->result();
   $is_member='';
	if($isTeamMate)
	{	
		foreach($isTeamMate as $member)
		{
			//$is_member.=$is_member?(','.$member->memName):$member->memName;
			$is_member.='<div class="main-img-user avatar-sm"><img alt="avatar" class="rounded-circle" src="'.base_url($member->image).'"></div>';
			}
		}
		return $is_member;
	} 
	
public function getTeamData($id)
{
        $this->db->select("mtt.id,mtt.head_id,mtt.created_by as created,s.employee_id,CONCAT(IF(s.surname!='',s.surname,''),IF(s.surname!='' AND s.name !='',' ',''),s.name) AS empName,designation_name as desgination,department_name as department,branch_name as branch,team_member,contact_no,email,image,team_name");
		$this->db->from('staff as s')->where('s.status','1')->where('mtt.id',$id)->join('designation as d','d.id=s.designation','left')->join('department as dept','dept.id=s.department','left')->join('branch_manage as br','br.id=s.branch_id','left');
		$result = $this->db->join('mapped_team as mtt','s.id=mtt.head_id','left')->get();
		return $result->row();
	} 	
public function getEmployeDetailsForTeam($where)
{
	$isWhere=explode(",",$where);
	return $this->db->select("s.id,CONCAT(IF(surname!='',surname,''),IF(surname!='' AND name !='',' ',''),name) AS memName,image,designation_name as desgination,s.employee_id,department_name as department,branch_name as branch")->from('staff as s')->where('s.status','1')->where_in('s.id',$isWhere)->join('designation as d','d.id=s.designation','left')->join('department as dept','dept.id=s.department','left')->join('branch_manage as br','br.id=s.branch_id','left')->get()->result();
	}	
public function getEmployeDataForTeam($where)
{
	$isWhere=explode(",",$where);
	return $this->db->select("s.id,CONCAT(IF(surname!='',surname,''),IF(surname!='' AND name !='',' ',''),name) AS memName,image,designation_name as desgination,s.employee_id,department_name as department,branch_name as branch")->from('staff as s')->where('s.status','1')->where_in('s.id',$isWhere)->join('designation as d','d.id=s.designation','left')->join('department as dept','dept.id=s.department','left')->join('branch_manage as br','br.id=s.branch_id','left')->get()->row();
	}	
	
				 
	    /*-----------------------------Branch Start-------------------------------*/

        public function team_query($where = false)
        {
            
            $field = array('mt.id','team_name','mt.satus');
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
            $this->db->select("mt.id,mt.team_name,CONCAT(IF(s.surname!='',s.surname,''),IF(s.surname!='' AND s.name !='',' ',''),s.name) AS empName,team_member,mt.status,is_priority")->from("mapped_team as mt")->join("staff as s","s.id=mt.head_id","inner");

          /*  if((!empty($where['state'])) && ($where['state']!="all"))
			{
                $this->db->where('state',$where['state']);
            }
            if(!empty($where['brName'])){
                $this->db->where('branch_name',$where['brName']);
            }
            if((!empty($where['searchTyp'])) && ($where['searchTyp']!="all"))
            {
                $this->db->where($where['searchTyp'],$where['srchContent']);
            }*/

            if (isset($where['order']) && !empty($where['order'])) {
                $this->db->order_by($field[$where['order']['0']['column']], $where['order']['0']['dir']);
            } else {
                
                $this->db->order_by('id', 'desc');
            }

        }

        public function team_list($where = false){$this->team_query($where);if ($where['length'] != -1) {$this->db->limit($where['length'], $where['start']);} return $this->db->get()->result();}
        public function team_count($where = false){$this->team_query();return $this->db->get()->num_rows();}
        public function team_filter_count($where = false){$this->team_query($where);return $this->db->get()->num_rows();}
	
	
    }

?>