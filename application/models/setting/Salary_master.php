<?php

    class Salary_master  extends CI_Model
    {

        public function __construct()
        {

            parent::__construct();

        }

public function getSalaryDetailsData($id)
{
			/*	SELECT sm.id,sm.salary_code,bm.branch_name,designation_name,sm.gross_sal_amt,ROUND((sm.gross_sal_amt*sm.basic_percent)/100,2) as basic_pay,ROUND((sm.gross_sal_amt*sm.hra_percent)/100,2) as hraAmt,ROUND((sm.gross_sal_amt*sm.ta_percent)/100,2) as taAmt,ROUND((sm.gross_sal_amt*sm.da_percent)/100,2) as daAmt,ROUND((sm.gross_sal_amt*sm.pa_percent)/100,2) as paAmt,sm.bonus,ROUND((sm.gross_sal_amt*sm.medical_percent)/100,2) as mediAmt,incentive,other_inc,ROUND((sm.gross_sal_amt*sm.pf_percent)/100,2) as pfAmt,advance_amt,ROUND((sm.gross_sal_amt*sm.tds_percent)/100,2) as tdsAmt,sm.insurance_amt,sm.other_deduction,sm.net_payble_amt FROM salary_master as sm left join branch_manage as bm on bm.id=sm.branch_id left join designation as desig on desig.id=sm.desig_id */
	
	return $this->db->select('sm.id,sm.salary_code,sm.branch_id,bm.branch_name,sm.desig_id,designation_name,sm.gross_sal_amt,ROUND((sm.gross_sal_amt*sm.basic_percent)/100,2) as basic_pay,basic_percent,ROUND((sm.gross_sal_amt*sm.hra_percent)/100,2) as hraAmt,hra_percent,ROUND((sm.gross_sal_amt*sm.ta_percent)/100,2) as taAmt,ta_percent,ROUND((sm.gross_sal_amt*sm.da_percent)/100,2) as daAmt,da_percent,ROUND((sm.gross_sal_amt*sm.pa_percent)/100,2) as paAmt,pa_percent,sm.bonus,ROUND((sm.gross_sal_amt*sm.medical_percent)/100,2) as mediAmt,medical_percent,incentive,other_inc,ROUND((sm.basic_amt*sm.pf_percent)/100,2) as pfAmt,pf_percent,advance_amt,ROUND((sm.gross_sal_amt*sm.tds_percent)/100,2) as tdsAmt,tds_percent,esic_employee,ROUND((sm.gross_sal_amt*sm.esic_employee)/100, 2) as esicEmpAmt,esic_employer,ROUND((sm.gross_sal_amt*sm.esic_employer)/100, 2) as esicEmpLyrAmt,sm.insurance_amt,sm.other_deduction,sm.net_payble_amt')->from('salary_master as sm')->where('sm.id',$id)->join('branch_manage as bm','bm.id=sm.branch_id','left')->join('designation as desig','desig.id=sm.desig_id','left')->get()->row();
	
	}
        /*-----------------------------salary Start-------------------------------*/

        public function salary_query($where = false)
        {
            
            $field = array('sm.salary_code','sm.gross_sal_amt','sm.net_payble_amt','sm.status');
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
            //$this->db->select('d.designation_name,sm.*')->from('salary_master as sm')->join('designation as d', 'd.id=sm.desig_id','left');
			
			$this->db->select('sm.id,sm.salary_code,sm.branch_id,bm.branch_name,sm.desig_id,designation_name,sm.gross_sal_amt,ROUND((sm.gross_sal_amt*sm.basic_percent)/100,2) as basic_pay,basic_percent,ROUND((sm.basic_amt*sm.hra_percent)/100,2) as hraAmt,hra_percent,ROUND((sm.basic_amt*sm.ta_percent)/100,2) as taAmt,ta_percent,ROUND((sm.basic_amt*sm.da_percent)/100,2) as daAmt,da_percent,ROUND((sm.basic_amt*sm.pa_percent)/100,2) as paAmt,pa_percent,sm.bonus,ROUND((sm.basic_amt*sm.medical_percent)/100,2) as mediAmt,medical_percent,incentive,other_inc,ROUND((sm.basic_amt*sm.pf_percent)/100,2) as pfAmt,pf_percent,advance_amt,ROUND((sm.gross_sal_amt*sm.tds_percent)/100,2) as tdsAmt,tds_percent,esic_employee,ROUND((sm.gross_sal_amt*sm.esic_employee)/100, 2) as esicEmpAmt,esic_employer,ROUND((sm.gross_sal_amt*sm.esic_employer)/100, 2) as esicEmpLyrAmt,sm.insurance_amt,sm.other_deduction,sm.net_payble_amt,sm.status')->from('salary_master as sm')->join('branch_manage as bm','bm.id=sm.branch_id','left')->join('designation as desig','desig.id=sm.desig_id','left');

            if((!empty($where['searchTyp'])) && ($where['searchTyp']!="all"))
			{$this->db->where('sm.desig_id',$where['searchTyp']);}
			if(!empty($where['grossAmt'])){$this->db->where('sm.gross_sal_amt',$where['grossAmt']);}
			
          /*  if(!empty($where['brName'])){
                $this->db->where('branch_name',$where['brName']);
            }
           

            if (isset($where['order']) && !empty($where['order'])) {
                $this->db->order_by($field[$where['order']['0']['column']], $where['order']['0']['dir']);
            } else {
                
                $this->db->order_by('id', 'desc');
            }*/

        }

        public function salary_list($where = false)
        {

            $this->salary_query($where);

            if ($where['length'] != -1) {
                $this->db->limit($where['length'], $where['start']);
            }
            return $this->db->get()->result();

        }

        public function salary_count($where = false)
        {

            $this->salary_query();
            return $this->db->get()->num_rows();

        }

        public function salary_filter_count($where = false)
        {

            $this->salary_query($where);
            return $this->db->get()->num_rows();

        }

    }

?>