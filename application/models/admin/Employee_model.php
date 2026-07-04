



<?php

class Employee_model extends CI_Model
{

    public function __construct()
    {

        parent::__construct();

    }

    public function all_employee_data() {

        $this->db->select('s.id, s.employee_id, s.name, s.image, s.contact_no, s.email, d.designation_name');
        $this->db->where('s.user_type','4')->join('designation as d', 'd.id = s.designation', 'left');
        $val = $this->db->get('staff as s');
        return $val->result_array();

    }

    public function get_employee_data($id) {

        $this->db->select('s.*, deg.designation_name, dep.department_name, sm.shift_name, sm.shift_start, sm.shift_end');
        $this->db->where('s.id', $id);
        $this->db->join('designation as deg', 'deg.id = s.designation', 'left');
        $this->db->join('department as dep', 'dep.id = s.department', 'left');
        $this->db->join('shift_manage as sm', 'sm.id = s.shift', 'left');
        $value = $this->db->get('staff as s');
        return $value->row_array();
    }


	public function get_salary_details($where)
	{
		if($where['salary_id']!=0)
		{
			$values='id,gross_sal_amt as grSal,basic_sal as basic_pay,hraAmt,taAmt,daAmt,paAmt,ROUND((basic_sal*100)/gross_sal_amt,2) as basic_percent,hraAmt,ROUND((hraAmt*100)/gross_sal_amt,2) as hra_percent,taAmt,ROUND((taAmt*100)/gross_sal_amt,2) as ta_percent, daAmt,ROUND((daAmt*100)/gross_sal_amt,2) as da_percent,paAmt,ROUND((paAmt*100)/gross_sal_amt,2) as pa_percent,bonus,medical as mediAmt,ROUND((medical*100)/gross_sal_amt,2) as medical_percent,insentive,otherInc as  other_deduction ,ROUND((pfAmt*100)/basic_sal,2) as pf_percent,esicEmpAmt,esicEmplyrAmt as esicEmpLyrAmt,pfAmt,advance as advance_amt,tdsAmt,ROUND((tdsAmt*100)/gross_sal_amt,2) as tds_percent,insurance as insurance_amt,net_payble as net_payble_amt';							
			return $this->db->select($values)->from('employee_salary_setup')->where('desig_id',$where['designation'])->where('br_id',$where['branch_id'])->where('emp_id',$where['id'])->get()->row();
			//return $this->common->get_data('employee_salary_setup',array('desig_id'=>$where['designation'],'br_id'=>$where['branch_id'],'emp_id'=>$where['id']),$values);
			}
			else
			{
				$values='id,gross_sal_amt as grSal,ROUND((gross_sal_amt*basic_percent)/100,2) as basic_pay,basic_percent,ROUND((gross_sal_amt*hra_percent)/100,2) as hraAmt,hra_percent,ROUND((gross_sal_amt*ta_percent)/100,2) as taAmt,ta_percent,ROUND((gross_sal_amt*da_percent)/100,2) as daAmt,da_percent,ROUND((gross_sal_amt*pa_percent)/100,2) as paAmt,pa_percent,bonus,ROUND((gross_sal_amt*medical_percent)/100,2) as mediAmt,medical_percent,incentive,other_inc,ROUND((basic_amt*pf_percent)/100,2) as pfAmt,pf_percent,esic_employee,ROUND((gross_sal_amt*esic_employee)/100, 2) as esicEmpAmt,esic_employer,ROUND((gross_sal_amt*esic_employer)/100, 2) as esicEmpLyrAmt,advance_amt,ROUND((gross_sal_amt*tds_percent)/100,2) as tdsAmt,tds_percent,insurance_amt,other_deduction,net_payble_amt';
					//	return $this->common->get_data('salary_master',array('desig_id'=>$where['designation'],'branch_id'=>$where['branch_id']),$values);
					return $this->db->select($values)->from('salary_master')->where('desig_id',$where['designation'])->where('branch_id',$where['branch_id'])->get()->row();
				}
	}
	public function get_detail($id)
	{
		$this->db->select("e.id,e.email,e.image,e.employee_id,CASE WHEN e.surname IS NOT NULL AND e.surname != '' THEN CONCAT(e.name, ' ', e.surname) ELSE name END AS employee_name,d.designation_name,contact_person_name,branch_email,mobile_nu,branch_name,employee_id,stt.state_cities as state_name,dst.state_cities as district_name,e.zipcode,e.address,dpt.department_name,e.salary_id,e.branch_id,e.designation");
		$this->db->where('e.id', $id);
		$this->db->join('designation as d', 'd.id=e.designation', 'left');
		$this->db->join('department as dpt', 'dpt.id=e.department', 'left');
		$this->db->join('branch_manage as b', 'b.id=e.branch_id', 'left');
		$this->db->join('states_cities as stt', 'stt.id=e.state', 'left');
		$this->db->join('states_cities as dst', 'dst.id=e.district', 'left');
		$value = $this->db->get('staff as e');
		return $value->row();
	}	
	
    public function getApprovedLeave()
	{

      return $this->db->select('group_concat(concat(id,"==",credit_type,"==",leave_credit,"==",CASE credit_type WHEN "1" THEN "Yearly" WHEN "2" THEN "Quarterly" WHEN "3" THEN "Monthly" WHEN "4" THEN "Weekly" ELSE "NO" END) SEPARATOR ",") as approvLeave')->from('leave_manage')->where('status','1')->get()->row();
 
    }
	public function getDepartmentDetails($id)
	{
		$getBrId=$this->db->select('department')->from('branch_manage')->where('id',$id)->get()->row();
		if($getBrId){return $this->db->select('*')->from('department')->where_in('id',explode(",",$getBrId->department))->get()->result();}else{return false;}	
		}
	public function getDesignationDetails($id,$deptID)
	{
		$getBrId=$this->db->select('designation')->from('branch_manage')->where('id',$id)->get()->row();
		if($getBrId){return $this->db->select('*')->from('designation')->where('department',$deptID)->where_in('id',explode(",",$getBrId->designation))->get()->result();}else{return false;}	
		}
/********************************************************************************************************************************/
  public function feedback_query($where = false)
        {
            
            $field = array('ef.emp_id','ef.heading','ef.message','ef.created_date');
            $i = 0;
            foreach($field as $item){
                if(!empty($where['search']['value'])) {if ($i === 0) {$this->db->group_start();$this->db->like($item, $where['search']['value']);} else {$this->db->or_like($item, $where['search']['value']);}
                    if(count($field)-1==$i){$this->db->group_end();}}
                $i++;
            }
            $this->db->select('ef.*,employee_id,name,surname')->from('employee_feedback as ef')->join('staff as s', 's.id = ef.emp_id', 'left');

			
/*            if(!empty($where['leaveID'])){ $this->db->where('leaveID',$where['leaveID']);}
      		if(!empty($where['leaveName'])){$this->db->where('leave_name',$where['leaveName']);}
            if((!empty($where['leaveSts'])) && ($where['leaveSts']!="99")){$this->db->where('status',$where['leaveSts']);}*/

            if (isset($where['order']) && !empty($where['order'])) {
                $this->db->order_by($field[$where['order']['0']['column']], $where['order']['0']['dir']);
            } else {
                
                $this->db->order_by('ef.id', 'desc');
            }

        }
        public function feedback_list($where = false){$this->feedback_query($where);if ($where['length'] != -1) {$this->db->limit($where['length'], $where['start']);}return $this->db->get()->result();}
        public function feedback_count($where = false){$this->feedback_query();return $this->db->get()->num_rows(); }
        public function feedback_filter_count($where = false){$this->feedback_query($where);return $this->db->get()->num_rows();}			


   public function getFrPerformance($id) 
   {
        $this->db->select('emp_fd.id,emp_fd.emp_id,s.name,s.surname,d.designation_name,s.image,emp_fd.heading,emp_fd.message,emp_fd.created_date');
        $this->db->where('emp_fd.id', $id)->join('staff as s', 's.id=emp_fd.emp_id', 'inner')->join('designation as d', 'd.id = s.designation', 'left');
	    $value=$this->db->get('employee_feedback as emp_fd');
        return $value->row_array();
    }
/*SELECT  FROM employee_feedback_remark as empFr inner join staff as s on s.id=empFr.created_by */	
  public function getPerformRemarks($id) 
   {
        $this->db->select('empFr.id,empFr.remarks,empFr.created_by,empFr.created_type,empFr.created_date,s.surname,s.name,s.image');
        $this->db->where('empFr.feedback_id', $id)->join('staff as s', 's.id=empFr.created_by', 'inner');
	    $value=$this->db->get('employee_feedback_remark as empFr');
        return $value->result();
    }	
  public function getDetailsGenerateFrm($id) 
   {
        $this->db->select('sf.id,sf.employee_id,sf.surname,sf.name,dg.designation_name,dept.department_name,sf.father_name,sf.dob,sf.contact_no,sf.pan_nu,sf.address,stt.state_cities as state,dst.state_cities as district,sf.zipcode,sf.designation as desgId,sf.department as deptID,sf.branch_id,sf.created_at,sf.salary_amount,sf.date_of_joining,branch_name')->from('staff as sf');
        $this->db->where('sf.employee_id', $id)->join('designation as dg', 'dg.id=sf.designation', 'left')->join('department as dept', 'dept.id=sf.department', 'left')->join('branch_manage as br', 'br.id=sf.branch_id', 'left')->join('states_cities as stt', 'stt.id=sf.state', 'left')->join('states_cities as dst', 'dst.id=sf.district', 'left');
	    $value=$this->db->get();
        return $value->row();
    }		
  public function getDesignationByBranch($where)
  {
 	  $isBranch=$this->db->select('id,department,designation')->from('branch_manage')->where('id',$where['brID'])->get()->row();
      if($isBranch)
	  {
	  	$getDesgId=explode(',',$isBranch->designation);
		if($getDesgId)
		{
			$isBrDesignation='<option value="">Select Employee</option>';
			foreach($getDesgId as $id)
			{
				$isDesignation=$this->db->select('id,designation_name as name')->from('designation')->where('department',$where['deptID'])->where('id',$id)->get()->row();
				if($isDesignation)
				{
					$isSelected=($where['desgId']==$isDesignation->id)?('selected="selected"'):'';
					$isBrDesignation.='<option value="'.$isDesignation->id.'" '.$isSelected.'>'.$isDesignation->name.'</option>';
					}
				}
				return $isBrDesignation;
			}
			else{return false;}
		}
		else{return false;}
	}	
	
	/*
	SELECT sf.id,sf.surname,sf.name,dg.designation_name,sf.father_name,sf.dob,sf.pan_nu,sf.address,stt.state_cities as state,dst.state_cities as district,sf.zipcode FROM staff as sf left join designation as dg on dg.id=sf.designation left join states_cities as stt on stt.id=sf.state left join states_cities as dst on dst.id=sf.district where sf.employee_id='9015' 
	*/
	
public function get_employees($where)
{
$this->db->select("s.id, s.employee_id, s.user_type, CASE WHEN CHAR_LENGTH(s.email) > 20 THEN CONCAT(SUBSTRING(s.email, 1, 20), '...') ELSE s.email END AS email, CASE WHEN CHAR_LENGTH(CONCAT(s.surname, IF(s.surname != '', ' ', ''), s.name)) > 10 THEN CONCAT(SUBSTRING(CONCAT(s.surname, IF(s.surname != '', ' ', ''), s.name), 1, 10), '...') ELSE CONCAT(s.surname, IF(s.surname != '', ' ', ''), s.name) END AS emp_name, s.contact_no, CASE WHEN CHAR_LENGTH(s.address) > 20 THEN CONCAT(SUBSTRING(s.address, 1, 20), '...') ELSE s.address END AS address,s.image,d.designation_name")->from('staff as s');
if($where['logCat']=='5'){$this->db->where('s.branch_id',$where['logBr']);}
$this->db->join('designation as d', 'd.id = s.designation', 'left');
$this->db->limit($where['limit'], $where['offset']);
$query = $this->db->get();
return $query->result();
}

public function get_active_employees($where)
{
$this->db->select("s.id, s.employee_id, s.user_type, CASE WHEN CHAR_LENGTH(s.email) > 20 THEN CONCAT(SUBSTRING(s.email, 1, 20), '...') ELSE s.email END AS email, CASE WHEN CHAR_LENGTH(CONCAT(s.surname, IF(s.surname != '', ' ', ''), s.name)) > 10 THEN CONCAT(SUBSTRING(CONCAT(s.surname, IF(s.surname != '', ' ', ''), s.name), 1, 10), '...') ELSE CONCAT(s.surname, IF(s.surname != '', ' ', ''), s.name) END AS emp_name, s.contact_no, CASE WHEN CHAR_LENGTH(s.address) > 20 THEN CONCAT(SUBSTRING(s.address, 1, 20), '...') ELSE s.address END AS address,s.image,d.designation_name")->from('staff as s')->where('s.status', 1);
if($where['logCat']=='5'){$this->db->where('s.branch_id',$where['logBr']);}
$this->db->join('designation as d', 'd.id = s.designation', 'left');
$this->db->limit($where['limit'], $where['offset']);
$query = $this->db->get();
return $query->result();
}


public function get_rejected_employees($where)
{
$this->db->select("s.id, s.employee_id, s.user_type, CASE WHEN CHAR_LENGTH(s.email) > 20 THEN CONCAT(SUBSTRING(s.email, 1, 20), '...') ELSE s.email END AS email, CASE WHEN CHAR_LENGTH(CONCAT(s.surname, IF(s.surname != '', ' ', ''), s.name)) > 10 THEN CONCAT(SUBSTRING(CONCAT(s.surname, IF(s.surname != '', ' ', ''), s.name), 1, 10), '...') ELSE CONCAT(s.surname, IF(s.surname != '', ' ', ''), s.name) END AS emp_name, s.contact_no, CASE WHEN CHAR_LENGTH(s.address) > 20 THEN CONCAT(SUBSTRING(s.address, 1, 20), '...') ELSE s.address END AS address,s.image,d.designation_name")->from('staff as s')->where('s.status', 5);
if($where['logCat']=='5'){$this->db->where('s.branch_id',$where['logBr']);}
$this->db->join('designation as d', 'd.id = s.designation', 'left');
$this->db->limit($where['limit'], $where['offset']);
$query = $this->db->get();
return $query->result();
}


public function get_terminated_employees($where)
{
$this->db->select("s.id, s.employee_id, s.user_type, CASE WHEN CHAR_LENGTH(s.email) > 20 THEN CONCAT(SUBSTRING(s.email, 1, 20), '...') ELSE s.email END AS email, CASE WHEN CHAR_LENGTH(CONCAT(s.surname, IF(s.surname != '', ' ', ''), s.name)) > 10 THEN CONCAT(SUBSTRING(CONCAT(s.surname, IF(s.surname != '', ' ', ''), s.name), 1, 10), '...') ELSE CONCAT(s.surname, IF(s.surname != '', ' ', ''), s.name) END AS emp_name, s.contact_no, CASE WHEN CHAR_LENGTH(s.address) > 20 THEN CONCAT(SUBSTRING(s.address, 1, 20), '...') ELSE s.address END AS address,s.image,d.designation_name")->from('staff as s')->where('s.status', 3);
if($where['logCat']=='5'){$this->db->where('s.branch_id',$where['logBr']);}
$this->db->join('designation as d', 'd.id = s.designation', 'left');
$this->db->limit($where['limit'], $where['offset']);
$query = $this->db->get();
return $query->result();
}


public function get_total_employees($where)
{ 
 $this->db->from('staff');
if($where['logCat']=='5'){$this->db->where('branch_id',$where['logBr'])->where('user_type','4');}
return $this->db->count_all_results();

}


// Active Employee section start form here.
public function actEmpList_query(){
    $field = array('employee_id,name,contact_no,email');
    $i = 0;
    foreach($field as $item){
    if(!empty($where['search']['value'])) {if ($i === 0) {$this->db->group_start();$this->db->like($item, $where['search']['value']);} else {$this->db->or_like($item, $where['search']['value']);}
    if(count($field)-1==$i){$this->db->group_end();}}
    $i++;
    }
    $this->db->select('id,employee_id,name,contact_no,email,status')->from('staff')->where('status',1);
    if (isset($where['order']) && !empty($where['order'])) {
    $this->db->order_by($field[$where['order']['0']['column']], $where['order']['0']['dir']);
    } 
}
public function actEmpList_model($where = false){$this->actEmpList_query($where);if ($where['length'] != -1) {$this->db->limit($where['length'], $where['start']);}return $this->db->get()->result();}
public function actEmpList_count($where = false){$this->actEmpList_query();return $this->db->get()->num_rows(); }
public function actEmpList_filter_count($where = false){$this->actEmpList_query($where);return $this->db->get()->num_rows();

}
// Active Employee section end here.
	
	
	
}

?>