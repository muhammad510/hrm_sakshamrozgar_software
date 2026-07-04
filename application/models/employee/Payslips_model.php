<?php
class Payslips_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	  public function paySlip_query($where=false,$empID=NULL)
  {
            
            $field = array('id','employee_id','month');
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
            $this->db->select('*')->from('employee_salary')->where('employee_id',$empID);

			/*if(!empty($where['attStatus']))
            {
                $this->db->where('staff_attendance_type_id',$where['attStatus']);
            }
			 if(!(empty($where['strtDt'])&& empty($where['endDt'])))
			{
				$this->db->where('attendance_date >=',date('Y-m-d',strtotime($where['strtDt'])));
				$this->db->where('attendance_date <=',date('Y-m-d',strtotime($where['endDt'])));
			}

			 if(!empty($where['yrWise']))
			{
				$this->db->where('attendance_date >=',date('Y-m-d',strtotime($where['yrWise'].'-01-01')));
				$this->db->where('attendance_date <=',date('Y-m-d',strtotime($where['yrWise'].'-12-01')));
			}*/



            if (isset($where['order']) && !empty($where['order'])) {
                $this->db->order_by($field[$where['order']['0']['column']], $where['order']['0']['dir']);
            } else {
                
                $this->db->order_by('created_date', 'desc');
            }

        }

        public function paySlip_list($where=false,$empID=NULL)
        {
            $this->paySlip_query($where,$empID);
            if ($where['length'] != -1) {$this->db->limit($where['length'], $where['start']);}return $this->db->get()->result();
        }

        public function paySlip_count($empID=NULL){$this->paySlip_query($where=false,$empID);return $this->db->get()->num_rows();}
        public function paySlip_filter_count($where=false,$empID=NULL){$this->paySlip_query($where,$empID);return $this->db->get()->num_rows();}
	public function getPaySlipDetails($id)
	{
		return $this->db->select('empSal.id,tnx_id,br.branch_name,s.employee_id,s.id as emp_id, s.name, d.designation_name,bank_account_no,pan_nu, month, empSal.year, paid_status, payment_mode, empSal.description, amount as net_pay, empSal.created_date as pay_date,branch_id,s.designation')->from('employee_salary as empSal')->where('empSal.id',$id)->join('staff as s','s.id=empSal.employee_id','left')->join('designation as d','d.id=s.designation','left')->join('branch_manage as br','br.id=s.branch_id','left')->get()->row();
		
		}
}

