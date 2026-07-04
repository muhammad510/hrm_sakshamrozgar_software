<?php

class Ledger_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->logCat=$this->session->userdata('user_cate');
	    $this->logBr=$this->session->userdata('mi_brID');
	}

/*-----------------------------Daily Attendance Start-------------------------------*/
        public function payroll_query($where = false)
        {
            
            $field = array('empSal.tnx_id','empSal.amount','empSal.month','empSal.year','empSal.status','s.employee_id');
            $i = 0;
            foreach ($field as $item) {
                if (!empty($where['search']['value']))
				{
                    if($i===0){$this->db->group_start();$this->db->like($item, $where['search']['value']);}else{$this->db->or_like($item, $where['search']['value']);}
                    if(count($field) - 1==$i){$this->db->group_end();}
                }
                $i++;
            }

			$this->db->select('empSal.id,tnx_id,s.employee_id,s.name,d.designation_name,month,empSal.year,paid_status,payment_mode,empSal.description,amount,empSal.created_date')->from('employee_salary as empSal')->join('staff as s','s.id=empSal.employee_id','left')->join('designation as d','d.id=s.designation','left');

        	
			
				if(!empty($where['empIdSrch'])){$this->db->where('s.employee_id',$where['empIdSrch']);}	
                if((!empty($where['searchTyp'])) && ($where['searchTyp']!="all"))
				{
					$searchTyp=array('Paid'=>'1','Hold'=>'2','Reject'=>'3','Unpaid'=>'0');
					$this->db->where('empSal.paid_status',$searchTyp[$where['searchTyp']]);
					}
			if(!(empty($where['strtDt']) && empty($where['endDt'])))
			{
				$this->db->where('created_date  >=',date('Y-m-d',strtotime(str_replace('/','-',$where['strtDt']))));
				$this->db->where('created_date <=',date('Y-m-d',strtotime(str_replace('/','-',$where['endDt']))));
				}
            if (isset($where['order']) && !empty($where['order'])) {
                $this->db->order_by($field[$where['order']['0']['column']], $where['order']['0']['dir']);
            } else {$this->db->order_by('id', 'desc');}

        }
        public function payroll_list($where = false)
		{$this->payroll_query($where);if($where['length']!=-1){$this->db->limit($where['length'],$where['start']);}return $this->db->get()->result();}
        public function payroll_count($where=false){$this->payroll_query();return $this->db->get()->num_rows();}
        public function payroll_filter_count($where = false){$this->payroll_query($where);return $this->db->get()->num_rows();}
	
	
  public function expense_query($where = false)
        {
            
            $field = array('empSal.tnx_id','empSal.amount','empSal.month','empSal.year','empSal.status');
            $i = 0;
            foreach ($field as $item) {
                if (!empty($where['search']['value']))
				{
                    if($i===0){$this->db->group_start();$this->db->like($item, $where['search']['value']);}else{$this->db->or_like($item, $where['search']['value']);}
                    if(count($field) - 1==$i){$this->db->group_end();}
                }
                $i++;
            }		
			$this->db->select('expns.id,expns.tnx_id,expns.emp_id,s.name,d.designation_name,exp_title,exp_amt,exp_date,exp_description,expns.status,emp.name as createdby')->from('employee_expense as expns')->join('staff as s','s.employee_id=expns.emp_id','left')->join('designation as d','d.id=s.designation','left')->join('staff as emp','emp.id=expns.created_by','left');

        	 if((!empty($where['searchTyp'])) && ($where['searchTyp']!="all"))
			{$this->db->where('expns.status',$where['searchTyp']);}
			if(!empty($where['empID'])){$this->db->where('expns.emp_id',substr($where['empID'],3,6));}	
			if(!(empty($where['frmDate']) && empty($where['toDate'])))
			{
				$this->db->where('expns.create_date  >=',date('Y-m-d',str_replace("/","-",$where['frmDate'])));
				$this->db->where('expns.create_date <=',date('Y-m-d',str_replace("/","-",$where['toDate'])));
			}
			//$this->db->order_by('empSal.id', 'desc');
				
          /*      if(!empty($where['searchTyp'])){$this->db->where('sm.desig_id',$where['searchTyp']);}
			if(!empty($where['grossAmt'])){$this->db->where('sm.gross_sal_amt',$where['grossAmt']);}
			if(!empty($where['brName'])){
                $this->db->where('branch_name',$where['brName']);
            }*/
			
			
            if (isset($where['order']) && !empty($where['order'])) {
                $this->db->order_by($field[$where['order']['0']['column']], $where['order']['0']['dir']);
            } else {
                
                $this->db->order_by('id', 'desc');
            }

        }
        public function expense_list($where = false)
		{$this->expense_query($where);if($where['length']!=-1){$this->db->limit($where['length'],$where['start']);}return $this->db->get()->result();}
        public function expense_count($where=false){$this->expense_query();return $this->db->get()->num_rows();}
        public function expense_filter_count($where = false){$this->expense_query($where);return $this->db->get()->num_rows();}
		
public function getPaySlipDetails($id)
{
	return $this->db->select('empSal.id,tnx_id,br.branch_name,s.employee_id,s.id as emp_id, s.name, d.designation_name,bank_account_no,pan_nu, month, empSal.year, paid_status, payment_mode, empSal.description, amount as net_pay, empSal.created_date as pay_date,branch_id,s.designation')->from('employee_salary as empSal')->where('empSal.id',$id)->join('staff as s','s.id=empSal.employee_id','left')->join('designation as d','d.id=s.designation','left')->join('branch_manage as br','br.id=s.branch_id','left')->get()->row();
	
	}
public function getSalaryDetails($brId,$desig)
{
		return $this->db->select('sm.id,sm.salary_code,sm.branch_id,bm.branch_name,sm.desig_id,designation_name,sm.gross_sal_amt,ROUND((sm.gross_sal_amt*sm.basic_percent)/100,2) as basic_pay,basic_percent,ROUND((sm.gross_sal_amt*sm.hra_percent)/100,2) as hraAmt,hra_percent,ROUND((sm.gross_sal_amt*sm.ta_percent)/100,2) as taAmt,ta_percent,ROUND((sm.gross_sal_amt*sm.da_percent)/100,2) as daAmt,da_percent,ROUND((sm.gross_sal_amt*sm.pa_percent)/100,2) as paAmt,pa_percent,sm.bonus,ROUND((sm.gross_sal_amt*sm.medical_percent)/100,2) as mediAmt,medical_percent,incentive,other_inc,ROUND((sm.gross_sal_amt*sm.pf_percent)/100,2) as pfAmt,pf_percent,advance_amt,ROUND((sm.gross_sal_amt*sm.tds_percent)/100,2) as tdsAmt,tds_percent,sm.insurance_amt,sm.other_deduction,sm.net_payble_amt')->from('salary_master as sm')->where('sm.branch_id',$brId)->where('sm.desig_id',$desig)->join('branch_manage as bm','bm.id=sm.branch_id','left')->join('designation as desig','desig.id=sm.desig_id','left')->get()->row();
	}
public function findEmployeeByNmID($id)
{
	if(!preg_match("/^[a-zA-Z\s, ]+$/",$id))
	{
		$this->db->select('id,employee_id,name,shift')->from('staff')->like('employee_id',$id);
		if($this->logCat=='5'){$this->db->where('branch_id',$this->logBr)->where('user_type','4');}
		return $this->get()->result();
		} 
		else
		{
			$this->db->select('id,employee_id,name,shift')->from('staff')->like('name',$id);
			if($this->logCat=='5'){$this->db->where('branch_id',$this->logBr)->where('user_type','4');}
			return $this->db->get()->result();
			}
	}	
public function getEmployeeDetail($id){return $this->db->select('id,employee_id,name,shift')->from('staff')->like('id',$id)->get()->row();}	
public function getEmployeeForPayrol($id,$actualPresent)
{
	$isStaff=$this->db->select('id,branch_id,department,designation,salary_id')->from('staff')->where('id',$id)->get()->row();	
	if($isStaff)
	{
		$dist=$actualPresent/26;
		if($isStaff->salary_id!='0')
		{
			
		return $this->db->select('ROUND((basic_sal*'.$dist.'),2) as basic_salary,advance as advance_amt,ROUND((hraAmt*'.$dist.'),2) as hraAmt,ROUND((taAmt*'.$dist.'),2) as taAmt,ROUND((daAmt*'.$dist.'),2) as daAmt,ROUND((paAmt*'.$dist.'),2) as paAmt,bonus,ROUND((medical*'.$dist.'),2) as mediAmt,ROUND((pfAmt*'.$dist.'),2) as pfAmt,ROUND((tdsAmt*'.$dist.'),2) as tdsAmt,insentive as incentive,otherInc as other_inc,insurance as insurance_amt,othrDeduction as other_deduction,net_payble as net_payble_amt,ROUND(gross_sal_amt*'.$dist.', 2) as grossAmt')->from('employee_salary_setup')->where('br_id',$isStaff->branch_id)->where('desig_id',$isStaff->designation)->where('emp_id',$id)->get()->row_array();
			
			}
		else
		{
			return $this->db->select('ROUND((sm.gross_sal_amt*sm.basic_percent*'.$dist.')/100,2) as basic_salary,advance_amt,ROUND((sm.basic_amt*sm.hra_percent*'.$dist.')/100,2) as hraAmt,ROUND((sm.basic_amt*sm.ta_percent*'.$dist.')/100,2) as taAmt,ROUND((sm.basic_amt*sm.da_percent*'.$dist.')/100,2) as daAmt,ROUND((sm.basic_amt*sm.pa_percent*'.$dist.')/100,2) as paAmt,sm.bonus,ROUND((sm.basic_amt*sm.medical_percent*'.$dist.')/100,2) as mediAmt,incentive,other_inc,ROUND((sm.basic_amt*sm.pf_percent*'.$dist.')/100,2) as pfAmt,ROUND((sm.gross_sal_amt*sm.tds_percent*'.$dist.')/100,2) as tdsAmt,sm.insurance_amt,sm.other_deduction,sm.net_payble_amt,ROUND(sm.gross_sal_amt*'.$dist.', 2) as grossAmt')->from('salary_master as sm')->where('sm.branch_id',$isStaff->branch_id)->where('sm.desig_id',$isStaff->designation)->get()->row_array();
			}
		}	
		else
		{
			return array('id'=>'0.00','username'=>'0.00','basic_salary'=>'0.00','advance_amt'=>'0.00','hraAmt'=>'0.00','taAmt'=>'0.00','daAmt'=>'0.00','paAmt'=>'0.00','bonus'=> '0.00','mediAmt'=>'0.00','incentive'=>'0.00','other_inc'=>'0.00','pfAmt'=>'0.00','tdsAmt'=>'0.00','insurance_amt'=>'0.00','other_deduction'=>'0.00','net_payble_amt'=>'0.00','grossAmt'=>'0.00');
			}

	
	
	
		
/*return $this->db->select("s.id,s.employee_id as username,CASE WHEN s.salary_id='1' and ess.br_id=s.branch_id and ess.desig_id=s.designation THEN ess.id ELSE sm.id END AS sm_id,CASE WHEN s.salary_id='1' and ess.br_id=s.branch_id and ess.desig_id=s.designation THEN ess.basic_sal ELSE ROUND((sm.gross_sal_amt*sm.basic_percent)/100, 2) END AS basic_salary,CASE WHEN s.salary_id='1' and ess.br_id=s.branch_id and ess.desig_id=s.designation THEN ess.advance ELSE sm.advance_amt END AS advance_amt,CASE WHEN s.salary_id='1' and ess.br_id=s.branch_id and ess.desig_id=s.designation THEN ess.hraAmt ELSE ROUND((sm.basic_amt*sm.hra_percent)/100, 2) END AS hraAmt,CASE WHEN s.salary_id='1' and ess.br_id=s.branch_id and ess.desig_id=s.designation THEN ess.taAmt ELSE ROUND((sm.basic_amt*sm.ta_percent)/100, 2) END AS taAmt,CASE WHEN s.salary_id='1' and ess.br_id=s.branch_id and ess.desig_id=s.designation THEN ess.daAmt ELSE ROUND((sm.basic_amt*sm.da_percent)/100, 2) END AS taAmt,CASE WHEN s.salary_id='1' and ess.br_id=s.branch_id and ess.desig_id=s.designation THEN ess.paAmt ELSE ROUND((sm.basic_amt*sm.pa_percent)/100, 2) END AS paAmt,CASE WHEN s.salary_id='1' and ess.br_id=s.branch_id and ess.desig_id=s.designation THEN ess.bonus ELSE sm.bonus END AS bonus,CASE WHEN s.salary_id='1' and ess.br_id=s.branch_id and ess.desig_id=s.designation THEN ess.medical ELSE ROUND((sm.basic_amt*sm.medical_percent)/100, 2) END AS mediAmt,CASE WHEN s.salary_id='1' and ess.br_id=s.branch_id and ess.desig_id=s.designation THEN ess.insentive ELSE sm.incentive END AS incentive,CASE WHEN s.salary_id='1' and ess.br_id=s.branch_id and ess.desig_id=s.designation THEN ess.otherInc ELSE sm.other_inc END AS other_inc,CASE WHEN s.salary_id='1' and ess.br_id=s.branch_id and ess.desig_id=s.designation THEN ess.pfAmt ELSE ROUND((sm.basic_amt*sm.pf_percent)/100, 2) END AS pfAmt,CASE WHEN s.salary_id='1' and ess.br_id=s.branch_id and ess.desig_id=s.designation THEN ess.tdsAmt ELSE ROUND((sm.basic_amt*sm.tds_percent)/100, 2) END AS tdsAmt,CASE WHEN s.salary_id='1' and ess.br_id=s.branch_id and ess.desig_id=s.designation THEN ess.insurance ELSE sm.insurance_amt END AS insurance_amt,CASE WHEN s.salary_id='1' and ess.br_id=s.branch_id and ess.desig_id=s.designation THEN ess.othrDeduction ELSE sm.other_deduction  END AS other_deduction,CASE WHEN s.salary_id='1' and ess.br_id=s.branch_id and ess.desig_id=s.designation THEN ess.net_payble ELSE sm.net_payble_amt END AS net_payble_amt,
CASE WHEN s.salary_id='1' and ess.br_id=s.branch_id and ess.desig_id=s.designation THEN ess.gross_sal_amt ELSE sm.gross_sal_amt END AS grossAmt")->from('staff s')->where('s.id',$id)->group_by('sm_id')->join('salary_master  sm','s.designation=sm.desig_id','inner')->join('employee_salary_setup  ess','ess.emp_id = s.id','inner')->get()->row_array();*/
	
	
	}
public function getEmployeeAttendance($where)
{
	$return=array();$num_sundays=''; 
	$isPresent=$this->db->select('count(id) as p')->from('staff_attendance')->where('staff_attendance_type_id','1')->where('employee_id',$where['id'])->where('attendance_date >=',$where['strtDt'])->where('attendance_date <=',$where['endDt'])->get()->row();
	$isLate=$this->db->select('count(id) as l')->from('staff_attendance')->where('staff_attendance_type_id','2')->where('employee_id',$where['id'])->where('attendance_date >=',$where['strtDt'])->where('attendance_date <=',$where['endDt'])->get()->row();	
	$isHfDy=$this->db->select('count(id) as hf')->from('staff_attendance')->where('staff_attendance_type_id','5')->where('employee_id',$where['id'])->where('attendance_date >=',$where['strtDt'])->where('attendance_date <=',$where['endDt'])->get()->row();
	$byCompanyLeave=$this->db->select('count(id) as byCmpnyLv')->from('holidays')->where('holiday_date >=',$where['strtDt'])->where('holiday_date <=',$where['endDt'])->get()->row();
	for($i=0;$i<((strtotime($where['endDt'])-strtotime($where['strtDt']))/86400);$i++){if(date('l',strtotime($where['strtDt'])+($i*86400))=='Sunday'){$num_sundays++;}}
	$present=$isPresent->p;$late=$isLate->l;$hfDy=$isHfDy->hf;$actualPresent=$isPresent->p+$isHfDy->hf*(0.5)-round($isLate->l*(0.3333333333333333));		
	$hfDyPresent=$isHfDy->hf*(0.5);$tLate=$isLate->l*(0.3333333333333333);$byCmpnyLv=$byCompanyLeave->byCmpnyLv;$tWorkingDay=$where['dayInMonth']-($byCmpnyLv+$num_sundays);
	$return=array('present'=>$present,'late'=>$late,'hfDy'=>$hfDy,'hfDyPresent'=>$hfDyPresent,'tLate'=>$tLate,'actualPresent'=>$actualPresent,'byCmpnyLv'=>$byCmpnyLv,'sunday'=>$num_sundays,'dayMonth'=>$where['dayInMonth'],'tWorking'=>$tWorkingDay);
	return $return;
	}
	
public function getLastCompanyTnx()
{
	return  $this->db->select('*')->from('company_income')->limit('1')->order_by('id','desc')->get()->row();
	}	
public function getExpnseData($id)
{	
	return $this->db->select('expns.id,expns.tnx_id,expns.emp_id,s.name as empName,s.image as empImg,emp.image as crImg,empBr.branch_name as empBr,d.designation_name as empdesig,s.email as empMail,s.contact_no as empMobile,emp.name as createdby,emp.employee_id as cUser,emp.email as cEmail,emp.contact_no as cMobile,cd.designation_name as cDesig,cBr.branch_name as cBr,exp_title,exp_amt,DATE_FORMAT(exp_date,"%d %b %Y") as dateExp,expnse_place,exp_description,expns.status')->from('employee_expense as expns')->where('expns.id',$id)->join('staff as s','s.employee_id=expns.emp_id','left')->join('designation as d','d.id=s.designation','left')->join('staff as emp','emp.id=expns.created_by','left')->join('branch_manage as empBr','empBr.id=s.branch_id','left')->join('designation as cd','cd.id=emp.designation','left')->join('branch_manage as cBr','cBr.id=emp.branch_id','left')->get()->row();
	}		


/*************************************Account start***********************************************/
    public function account_query($where = false)
        {
            
            $field = array('tnx_id','benificiary_id','created_date','opening_balance','debit_amt','credit_amt','closing_balance');
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
            $this->db->select('*')->from('company_income');
			 if((!empty($where['searchTyp'])) && ($where['searchTyp']!="all"))
			{
					$this->db->where($where['searchTyp'],$where['srchContent']);
			   }
			if(!(empty($where['strtDt']) && empty($where['endDt'])))
            {
				$this->db->where('created_date >=',date('Y-m-d',strtotime(str_replace("/","-",$where['strtDt']))));
                $this->db->where('created_date <=',date('Y-m-d',strtotime(str_replace("/","-",$where['endDt']))));
            }
			
			
			
            if (isset($where['order']) && !empty($where['order'])){$this->db->order_by($field[$where['order']['0']['column']], $where['order']['0']['dir']);}
			else {$this->db->order_by('id', 'desc');}
        }
        public function account_list($where = false)
        {$this->account_query($where);if($where['length']!= -1){$this->db->limit($where['length'], $where['start']);}return $this->db->get()->result();}
        public function account_count($where = false){$this->account_query();return $this->db->get()->num_rows();}
        public function account_filter_count($where = false){$this->account_query($where); return $this->db->get()->num_rows();}

/*************************************Account End***********************************************/
/*************************************Monthly Payout Start***********************************************/
 public function isPayroll($where)
  {
	 $this->db->select("s.id,s.employee_id,CONCAT(IF(s.surname != '',s.surname,''), IF(s.surname != '' AND s.name != '', ' ', ''),s.name) AS empName,s.designation,s.salary_id,d.designation_name,s.branch_id");
	 $this->db->from("staff s")->join("employee_salary es", "s.id = es.employee_id AND es.month='".$where['sMonth']."' AND es.year='".$where['sYear']."'", "LEFT")->join('designation as d', 'd.id=s.designation', 'left');
	 $this->db->where("es.employee_id IS NULL")->where("s.status", "1")->where_in("s.user_type", array("4", "5"))/*->limit('10')*//*->where("s.id",'129')*/;
	 $result = $this->db->get();
	 return $result->result();
	}
  public function isCountAttendance($where)
  {
	 $numDays=date('t', strtotime($where['sMonth'].'-'.$where['sYear']));
	 $frmDate=$where['sYear'].'-'.$where['sMonth'].'-01';
	 $lastDate=$where['sYear'].'-'.$where['sMonth'].'-'.$numDays;
	 $this->db->select("sf.employee_id,SUM(CASE WHEN sf.staff_attendance_type_id = '1' THEN 1 ELSE 0 END) AS tPresent,SUM(CASE WHEN sf.staff_attendance_type_id = '2' THEN 1 ELSE 0 END) AS tLate,SUM(CASE WHEN sf.staff_attendance_type_id = '5' THEN 1 ELSE 0 END) AS tHalf, SUM(CASE WHEN sf.staff_attendance_type_id = '3' THEN 1 ELSE 0 END) AS tAbsent");		 
	 $this->db->from("staff_attendance as sf")->where('sf.employee_id',$where['emp_id'])->where('sf.attendance_date >=',$frmDate)->where('sf.attendance_date <=',$lastDate);
	 $result = $this->db->get()->row();
	 if($result){$isPresent=$result?($result->tPresent+(.5*$result->tHalf)+(.5*$result->tLate)):0;}else{$isPresent=0;}
	 return $isPresent;
	}
/*************************************Monthly Payout  End***********************************************/



















	
}
