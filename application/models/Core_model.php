<?php

class Core_model  extends CI_Model
{



    function  salary_set_acording_to_master_salary($employee_id)
    {
        $employee = $this->db_model->select_multi("*", 'staff', ['employee_id' => $employee_id]);

        $con = array(
            'br_id' => $employee->branch_id,
            'desig_id' => $employee->designation,
            'emp_id'   => $employee->id
        );
        $isExistSalary = $this->common->get_data('employee_salary_setup', $con, '*');
        $con1 = array(
            'branch_id' => $employee->branch_id,
            'desig_id' => $employee->designation
        );
        $masterSalary = $this->db_model->select_multi('*', 'salary_master', $con1);
        if (!$isExistSalary && !empty($masterSalary)) {
            $createArr = array(
                'sal_mstr_id'          => $masterSalary->id,
                'emp_id'               => $employee->id,
                'br_id'                => $masterSalary->branch_id,
                'desig_id'             => $masterSalary->desig_id,
                'esicEmpAmt'           => $masterSalary->esic_employee,
                'esicEmplyrAmt'        => $masterSalary->esic_employer,
                'gross_sal_amt'        => $masterSalary->gross_sal_amt,
                'basic_sal'            => $masterSalary->basic_amt,
                'hraAmt'               => $masterSalary->hra_percent,
                'taAmt'                => $masterSalary->ta_percent,
                'daAmt'                => $masterSalary->da_percent,
                'paAmt'                => $masterSalary->pa_percent,
                'bonus'                => $masterSalary->bonus,
                'medical'              => $masterSalary->medical_percent,
                'insentive'            => $masterSalary->incentive,
                'otherInc'             => $masterSalary->other_inc,
                'pfAmt'                => $masterSalary->pf_percent,
                'tdsAmt'               => $masterSalary->advance_amt,
                'insurance'            => $masterSalary->insurance_amt,
                'otherInc'             => $masterSalary->other_deduction,
                'net_payble'           => $masterSalary->net_payble_amt,
                'created_by'           => $this->session->mim_id,
                'created_date'         => date('Y-m-d H:i:s')
            );
            $isCurrentSal = $this->common->save_data('employee_salary_setup', $createArr);


            $salryUpArr = array(
                'salary_id' => $isCurrentSal,
                'salary_amount' => $masterSalary->net_payble_amt
            );
            $this->db->where(array('id' => $employee->id))->update('staff', $salryUpArr);
        }

        return true;
    }
}
