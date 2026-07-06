<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Employee extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('upload', 'image_lib', 'email'));
		$this->load->helper(array('amipage', 'form', 'email'));
		$this->load->model(array('admin/employee_model' => 'employee', 'employee/staff_model' => 'staff', 'employee/payslips_model' => 'payslip', 'employee/leave_model' => 'leaves'));
		($this->session->userdata('mim_id') == '') ? redirect(base_url(), 'refresh') : '';
		$this->logID = $this->session->userdata('mim_id');
		$this->logCat = $this->session->userdata('user_cate');
		$this->logBr = $this->session->userdata('mi_brID');

		error_reporting(0);
	}
	/*******************************@mit Singh Start 01-03-24 *****************************************/
	public function getCompanyDetails()
	{
		$post = $this->input->post();
		if ($post['action'] == 'designation') {
			if ($post['branch'] != '9999') {
				$return = $this->common->get_data('salary_master', array('status' => '1', 'branch_id' => $post['branch'], 'desig_id' => $post['id']), 'id,net_payble_amt');
			} else {
				$return = array('id' => '9999', 'net_payble_amt' => '50000');
			}
		} else if ($post['action'] == 'salary_type') {
			//$getDaysInMonth=array('01'=>'31','02'=>'28','03'=>'31','04'=>'30','05'=>'31','06'=>'30','07'=>'31','08'=>'31','09'=>'30','10'=>'31','11'=>'30','12'=>'31');
			if ($post['slID'] != '9999') {
				$getSalAmt = $this->common->getRowData('salary_master', 'id', $post['slID']);
			} else {
				$getSalAmt->net_payble_amt = '50000';
			}
			/*		if($post['id']=='1'){$netSalaryAmt=$getSalAmt->net_payble_amt/$getDaysInMonth[date('m')];}else if($post['id']=='3'){$netSalaryAmt=$getSalAmt->net_payble_amt;}
		else{$netSalaryAmt=($getSalAmt->net_payble_amt*7)/$getDaysInMonth[date('m')];}*/
			$getDaysInMonth = 26;
			if ($post['id'] == '1') {
				$netSalaryAmt = $getSalAmt->net_payble_amt / $getDaysInMonth;
			} else if ($post['id'] == '3') {
				$netSalaryAmt = $getSalAmt->net_payble_amt;
			} else {
				$netSalaryAmt = ($getSalAmt->net_payble_amt * 7) / $getDaysInMonth;
			}
			echo number_format((float)$netSalaryAmt, 2, '.', '');
			//print_r($getSalAmt->net_payble_amt);
			exit;
		}
		sleep(1);
		echo json_encode($return);
	}

	/*****************************************@mit Singh Start 01-03-24 ****************************************************/

	public function create()
	{
		$result = $this->db->select('id,employee_id')->from('staff')->order_by('id', 'DESC')->get()->row();
		if (!empty($result) && $result->id != 0) {
			$empID = $result->employee_id + 1;
		} else {
			$empID = 9900001;
		}
		$data['empID']       = $empID;
		$data['title']       = 'Add Employee Details';
		$data['breadcrums']  = 'Add Employee Details';
		if (($this->logCat != '5') && ($this->logCat != '4')) {
			$fieldDet = 'status';
			$fieldID = '1';
		} else {
			$fieldDet = 'id';
			$fieldID = $this->logBr;
		}
		$data['branch'] = $this->common->getDataList('branch_manage', $fieldDet, $fieldID);
		$data['shift']       = $this->common->getDataList('shift_manage', 'status', '1');
		$data['layout']      = "admin/employee/add_employee.php";
		$this->load->view('base', $data);
	}
	public function add_employee_data()
	{
		$this->form_validation->set_rules('name',            'Name',            'trim|required|xss_clean');
		$this->form_validation->set_rules('dob',             'Date of Birth',   'trim|required|xss_clean');
		$this->form_validation->set_rules('gender',          'Gender',          'trim|required|xss_clean');
		$this->form_validation->set_rules('contact_no',      'Mobile No.',      'trim|required|xss_clean|numeric|max_length[10]');
		$this->form_validation->set_rules('email',           'Email Id',        'trim|required|xss_clean|valid_email|is_unique[staff.email]');
		$this->form_validation->set_rules('address',         'Address',         'trim|required|xss_clean');
		$this->form_validation->set_rules('user_type',       'User Type',       'trim|required|xss_clean');
		$this->form_validation->set_rules('branch',          'Branch',          'trim|required|xss_clean');
		$this->form_validation->set_rules('department',      'Department',      'trim|required|xss_clean');
		$this->form_validation->set_rules('designation',     'Designation',     'trim|required|xss_clean');
		//  $this->form_validation->set_rules('bioMtric', 'Bio Metric ID', 'trim|required|xss_clean|numeric|max_length[8]');
		$this->form_validation->set_rules('date_of_joining', 'Date Of Joining', 'trim|required|xss_clean');
		$this->form_validation->set_rules('shift',           'Shift',           'trim|required|xss_clean');
		$this->form_validation->set_rules('password',        'Password',        'trim|required|xss_clean');
		if ($this->form_validation->run() == TRUE) {

			$inp = $this->input->post();
			$getYear = date('Y');
			$getLeaveDuration = '01-01-' . $getYear . '@@@@' . '01-12-' . $getYear;
			$getLeave = $this->employee->getApprovedLeave();
			if ($getLeave) {
				$allotedLeave = $getLeave->approvLeave;
			} else {
				$allotedLeave = NULL;
			}
			$employee = array(
				'name'                    => $inp['name'],
				'dob'                     => date('Y-m-d', strtotime(str_replace("/", "-", $inp['dob']))),
				'gender'                  => $inp['gender'],
				'contact_no'              => $inp['contact_no'],
				'email'                   => $inp['email'],
				'address'                 => $inp['address'],
				'user_type'               => $inp['user_type'],
				'employee_id'             => $inp['employee_id'],
				'branch_id'               => $inp['branch'],
				'department'              => $inp['department'],
				'designation'             => $inp['designation'],
				'biometric_id'            => $inp['bioMtric'],
				'date_of_joining'         => date('Y-m-d', strtotime(str_replace("/", "-", $inp['date_of_joining']))),
				'shift'                   => $inp['shift'],
				'approved_leave'          => str_replace(" ", "", $allotedLeave),
				'leave_in_between'        => $getLeaveDuration,
				'password'                => md5($inp['password']),
				'show_password'           => $inp['password'],
				'created_by_user_type_id' => $this->logID,
				'created_at'              => date('Y-m-d')
			);

			$data = $this->common->save_data('staff', $employee);
			$employee['gender'] = ($inp['gender'] == '1') ? 'Male' : (($inp['gender'] == '2') ? 'Female' : 'Transgender');
			$employee['user_type'] = ($inp['user_type'] == '2') ? 'Super Admin' : (($inp['user_type'] == '3') ? 'Admin' : 'Employee');
			$getBranch = $this->common->getRowData('branch_manage', 'id', $inp['branch_id']);
			$department = $this->common->getRowData('department', 'id', $inp['department']);
			$department = $this->common->getRowData('department', 'id', $inp['department']);
			$designation = $this->common->getRowData('designation', 'id', $inp['designation']);
			$shift = $this->common->getRowData('shift_manage', 'id', $inp['shift']);
			$employee['branch_id'] = ($getBranch) ? $getBranch->branch_name : 'Camwel Solution LLP';
			$employee['department'] = ($department) ? $department->department_name : 'Development';
			$employee['designation'] = ($designation) ? $designation->designation_name : 'Software Developer';
			$employee['shift_timing'] = ($shift) ? $shift->shift_name : 'Testing Time';
			$employee['image'] = 'uploads/employee/no_img.png';

			$data = array('addClas' => 'tst_success', 'msg' => array('Thank you! You have successfully created new ' . (($inp['user_type'] = '1') ? 'Admin' : 'Employee')), 'icon' => '<i class="ti-check-box"></i>', 'emp' => $employee);
		} else {

			$msg = array(

				'name'            => form_error('name'),
				'dob'             => form_error('dob'),
				'gender'          => form_error('gender'),
				'contact_no'      => form_error('contact_no'),
				'email'           => form_error('email'),
				'address'         => form_error('address'),
				'user_type'       => form_error('user_type'),
				'branch'          => form_error('branch'),
				'department'      => form_error('department'),
				'designation'     => form_error('designation'),
				//   'bioMtric'        => form_error('bioMtric'),
				'date_of_joining' => form_error('date_of_joining'),
				'shift'           => form_error('shift'),
				'password'        => form_error('password')
			);
			$data = array('addClas' => 'tst_danger', 'msg' => $msg, 'icon' => '<i class="pe-7s-sun bx-spin"></i>');
		}
		echo json_encode($data);
	}
	public function manages($where = NULL)
	{
		if ($where) {
			$where = json_decode(base64_decode(urldecode($where)));
			if ($where->action == 'editDetails') {
				$employee = $this->staff->getEmployeeDetails($where->id);
				if ($employee->salary_id != '0') {
					$values = 'id,gross_sal_amt as grSal,basic_sal as basic_pay,hraAmt,taAmt,daAmt,paAmt,ROUND((basic_sal*100)/gross_sal_amt,2) as basic_percent,hraAmt,ROUND((hraAmt*100)/gross_sal_amt,2) as hra_percent,taAmt,ROUND((taAmt*100)/gross_sal_amt,2) as ta_percent, daAmt,ROUND((daAmt*100)/gross_sal_amt,2) as da_percent,paAmt,ROUND((paAmt*100)/gross_sal_amt,2) as pa_percent,bonus,medical as mediAmt,ROUND((medical*100)/gross_sal_amt,2) as medical_percent,insentive,otherInc as  other_deduction ,ROUND((pfAmt*100)/basic_sal,2) as pf_percent,esicEmpAmt,esicEmplyrAmt as esicEmpLyrAmt,pfAmt,advance as advance_amt,tdsAmt,ROUND((tdsAmt*100)/gross_sal_amt,2) as tds_percent,insurance as insurance_amt,net_payble as net_payble_amt,
						ROUND((esicEmplyrAmt*100)/(net_payble+esicEmpAmt),2) as esic_employer,ROUND((esicEmpAmt*100)/(net_payble+esicEmpAmt),2) as esic_employee';
					$getSalarySumary = $this->common->get_data('employee_salary_setup', array('desig_id' => $employee->designation, 'br_id' => $employee->branch_id, 'emp_id' => $employee->id), $values);
				} else {
					$values = 'id,gross_sal_amt as grSal,ROUND((gross_sal_amt*basic_percent)/100,2) as basic_pay,basic_percent,ROUND((gross_sal_amt*hra_percent)/100,2) as hraAmt,hra_percent,ROUND((gross_sal_amt*ta_percent)/100,2) as taAmt,ta_percent,ROUND((gross_sal_amt*da_percent)/100,2) as daAmt,da_percent,ROUND((gross_sal_amt*pa_percent)/100,2) as paAmt,pa_percent,bonus,ROUND((gross_sal_amt*medical_percent)/100,2) as mediAmt,medical_percent,incentive,other_inc,ROUND((basic_amt*pf_percent)/100,2) as pfAmt,pf_percent,esic_employee,ROUND((gross_sal_amt*esic_employee)/100, 2) as esicEmpAmt,esic_employer,ROUND((gross_sal_amt*esic_employer)/100, 2) as esicEmpLyrAmt,advance_amt,ROUND((gross_sal_amt*tds_percent)/100,2) as tdsAmt,tds_percent,insurance_amt,other_deduction,net_payble_amt';
					$getSalarySumary = $this->common->get_data('salary_master', array('desig_id' => $employee->designation, 'branch_id' => $employee->branch_id), $values);
				}
				/*echo $this->db->last_query();	
					exit;*/
				$data['salarySumary'] = $getSalarySumary;
				$data['getState']	= $this->common->getDataList('states_cities', 'parent_id', '729');
				$data['getCity'] 	= $this->common->getDataList('states_cities', 'parent_id', $employee->state);
				$getBrList = $this->common->getDataList('branch_manage', 'status', '1');
				$data['leaveMaster'] = $this->common->getDataList('leave_manage', 'status', '1');
				$data['shiftMaster'] = $this->common->getDataList('shift_manage', 'status', '1');
				$department = $this->employee->getDepartmentDetails($employee->branch_id);
				$designation = $this->employee->getDesignationDetails($employee->branch_id, $employee->department);
				$data['designation'] = $designation;
				$data['department'] = $department;
				$data['getBrList'] = $getBrList;
				if ($employee->user_type == '1') {
					$data['salID'] = '9999';
				} else {
					$data['salID'] = $employee->salary_id;
				}
				if ($employee->approved_leave) {
					$leave = explode(',', $employee->approved_leave);
					$isAprLvID = array();
					foreach ($leave as $lvId) {
						$setLvID = explode('==', $lvId);
						array_push($isAprLvID, $setLvID[0]);
					}
					$getNewApprLeave = $this->staff->getNewAprovedLeave($isAprLvID);
					$approved_leave = $getNewApprLeave->aprLeave ? $getNewApprLeave->aprLeave : 'No leave Available';
				} else {
					$approved_leave = 'No leave Available';
				}
				$data['approved_leave'] = $approved_leave;
				$data['employee'] = $employee;
				$data['avrActionTarget'] = base_url('staff/profile/reset_password');
				$data['attenSummary'] = 'staff/profile/details/' . urlencode(base64_encode(json_encode(array('id' => $employee->id, 'action' => 'attendanceSummary'))));
				$data['paySlipSummary'] = 'staff/profile/details/' . urlencode(base64_encode(json_encode(array('id' => $employee->id, 'action' => 'payslipSummary'))));
				$data['leaveSummary'] = 'staff/profile/details/' . urlencode(base64_encode(json_encode(array('id' => $employee->id, 'action' => 'leaveSummary'))));
				$data['getEmpDocument'] = $this->common->getDataList('employee_document', 'emp_id', $employee->id);
				$data['targetDoc'] = base_url('staff/profile/details/' . urlencode(base64_encode(json_encode(array('id' => $employee->id, 'action' => 'document')))));
				$data['companySummary'] = base_url('staff/profile/details/' . urlencode(base64_encode(json_encode(array('id' => $employee->id, 'action' => 'companySummary')))));
				$data['backUrl'] = base_url('admin/employee/grid');
				$data['title'] = 'Profile';
				$data['breadcrums'] = 'Profile';
				$data['salarySetup'] = 'staff/profile.php';
				$data['layout'] = 'staff/profile.php';
				$this->load->view('base', $data);
			}
		} else {
			$data['title']       = 'Manage Employee Details';
			$data['breadcrums']  = 'Manage Employee Details';
			$data['employees']   = "admin/Employee/all_employee_data";
			$data['layout']      = "admin/employee/manage_employee.php";
			$data['bckUrl']      = base_url("admin/employee/create");
			$this->load->view('base', $data);
		}
	}
	/***********************************************************************************************/
	public function grid()
	{

		$data = array(
			'title' => 'Manage Employee Details',
			'breadcrums' => 'Manage Employee Details',
			'employees' => "admin/Employee/all_employee_data",
			'layout' => 'admin/employee/employee_grid.php'
		);
		$this->load->view('base', $data);
	}
	public function grid_employees()
	{
		$page = $this->input->post('page');
		if (!$page) $page = 1;
		$limit = 12;
		$offset = ($page - 1) * $limit;
		$where = array('limit' => $limit, 'offset' => $offset, 'logCat' => $this->logCat, 'logBr' => $this->logBr);
		$data['employees'] = $this->employee->get_employees($where);
		$total_rows = $this->employee->get_total_employees($where);
		$data['total_rows'] = $total_rows;
		$data['limit'] = $limit;
		$data['urlLoc'] = base_url();
		$data['url_view'] = base_url('admin/employee/view_employee_data/');
		$data['url_edit'] = base_url('admin/employee/manages/');
		echo json_encode($data);
	}
	/***********************************************************************************************/
	public function all_employee_data()
	{

		$getPg = $this->input->post();
		if ($getPg['pgLmt']) {
			$empList = '';
			sleep(2);
			$getResult = $this->employee->all_employee_data();
			if ($getResult) {
				foreach ($getResult as $emp) {
					$imgLoc = base_url($emp['image']);
					$empList .= '<div class="col-md-6 col-lg-6 col-xl-3 col-sm-6"><div class="card custom-card"><div class="p-0 ht-100p"><div class="product-grid"><div class="product-image"><a href="ecommerce-product-details.html" class="image"><img style="height: 230px;" class="pic-1" alt="product-image-1" src="' . $imgLoc . '"></a><div class="product-link"><a href="javascript:void(0);"data-bs-target="#view_employee_modal" data-bs-toggle="modal" style="margin-left:-5px;" onclick="view_employee(' . $emp['id'] . ')" title="Click to View Employee Details" class="miDefault"><i class="fas fa-eye"></i><span>Quick View</span></a><a href="javascript:void(0);"data-bs-target="#update_employee_modal" data-bs-toggle="modal" style="margin-left:-5px;" onclick="update_employee(' . $emp['id'] . ')" title="Click to Update Employee Details" class="miDefault"><i class="fa fa-pencil-square-o"></i><span>Edit Details</span></a></div></div><div class="product-content"><h3 class="title"><a href="javascript:void(0);">' . $emp['name'] . '<span>(' . $emp['employee_id'] . ') </span></a></h3><div class="price"><span class="text-danger">' . $emp['designation_name'] . '</span></div></div></div></div></div></div>';
				}
			}

			$return['draw'] = $empList;
			$no_of_per_page = 16;
			$targetUrl = base_url('admin/employee/all_employee_data');
			$total_pages = ceil(count($getResult) / $no_of_per_page);
			$pagination = pagination(1, $total_pages, $targetUrl);
			$return['miPg'] = $pagination;
			// $return['draw'] = $getResult;
		} else {

			$getResult = $this->employee->all_employee_data();

			$empList = '';
			if ($getResult) {
				foreach ($getResult as $emp) {
					$imgLoc = base_url($emp['image']);
					$editClick = base_url('admin/employee/manages/' . urlencode(base64_encode(json_encode(array('id' => $emp['id'], 'action' => 'editDetails')))));

					$empList .= '<div class="col-md-6 col-lg-6 col-xl-3 col-sm-6"><div class="card custom-card"><div class="p-0 ht-100p"><div class="product-grid"><div class="product-image"><a href="javascript:void(0)" class="image"><img style="height: 230px;" class="pic-1" alt="product-image-1" src="' . $imgLoc . '"></a><div class="product-link"><a href="view_employee_data/' . $emp['id'] . '" style="margin-left:-5px;" class="miDefault"><i class="fas fa-eye"></i><span>Quick View</span></a><a href="' . $editClick . '" title="Click to Update Employee Details" class="miDefault"><i class="fa fa-pencil-square-o"></i><span>Edit Details</span></a></div></div><div class="product-content"><h3 class="title"><a href="javascript:void(0);">' . $emp['name'] . '<span>(' . $emp['employee_id'] . ') </span></a></h3><div class="price"><span class="text-danger">' . $emp['designation_name'] . '</span></div></div></div></div></div></div>';
				}
			}
			$return['draw'] = $empList;
			//$return['draw'] = $getResult;
			$no_of_per_page = 16;
			$targetUrl = base_url('admin/employee/all_employee_data');
			$total_pages = ceil(count($getResult) / $no_of_per_page);
			$pagination = pagination(1, $total_pages, $targetUrl);
			$return['miPg'] = $pagination;
		}
		//$return=array('draw'=>$getResult,'miPg'=>$pagination);
		echo json_encode($return);
	}
	public function view_employee_data()
	{
		$data['title'] = 'Member Details';
		$inp = $this->uri->segment(4);
		$data['employee'] = $this->employee->get_employee_data($inp);
		$data['layout'] = "admin/employee/view_employee.php";
		$this->load->view('base', $data);
	}
	public function update_employee()
	{
		$inp = $this->input->post();
		$data['department']  = $this->common->all_data('department', 'id, department_name');
		$data['designation'] = $this->common->all_data('designation', 'id, designation_name');
		$data['shift']       = $this->common->all_data('shift_manage', 'id, shift_name, shift_start, shift_end');
		$data['upd_emp'] = $this->employee->get_employee_data($inp['id']);
		$this->load->view('admin/employee/update_employee.php', $data);
	}
	public function update_employee_data()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('dob', 'Date of Birth', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('contact_no', 'Mobile No.', 'required');
		$this->form_validation->set_rules('email', 'Email Id', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('department', 'Department', 'required');
		$this->form_validation->set_rules('designation', 'Designation', 'required');
		$this->form_validation->set_rules('date_of_joining', 'Date Of Joining', 'required');
		$this->form_validation->set_rules('shift', 'Shift', 'required');
		$this->form_validation->set_rules('qualification', 'Quakification', 'required');
		$this->form_validation->set_rules('work_exp', 'Work Exprience', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == TRUE) {

			$inp = $this->input->post();

			$employee = array(

				'id'                      => $inp['id'],
				'name'                    => $inp['name'],
				'father_name'             => $inp['father_name'],
				'dob'                     => $inp['dob'],
				'gender'                  => $inp['gender'],
				'contact_no'              => $inp['contact_no'],
				'email'                   => $inp['email'],
				'address'                 => $inp['address'],
				'nationality'             => $inp['nationality'],
				'reference_person_name'   => $inp['reference_person_name'],
				'reference_person_number' => $inp['reference_person_number'],
				'marital_status'          => $inp['marital_status'],
				'department'              => $inp['department'],
				'designation'             => $inp['designation'],
				'date_of_joining'         => $inp['date_of_joining'],
				'shift'                   => $inp['shift'],
				'qualification'           => $inp['qualification'],
				'work_exp'                => $inp['work_exp'],
				'status'                  => $inp['status'],
				'salary_type'             => $inp['salary_type'],
				'salary_amount'           => $inp['salary_amount'],
				'holder_name'             => $inp['holder_name'],
				'bank_account_no'         => $inp['bank_account_no'],
				'bank_name'               => $inp['bank_name'],
				'bank_branch'             => $inp['bank_branch'],
				'ifsc_code'               => $inp['ifsc_code'],
				'password'                => md5($inp['password']),
				'show_password'           => $inp['password'],

			);
			// print_r($employee);die;
			$this->common->update_data('staff', array('id' => $inp['id']), $employee);
			// echo $this->db->last_query();die; 
			$data = array('addClas' => 'tst_success', 'msg' => array('Employee Data Added Successfully!'), 'icon' => '<i class="ti-check-box"></i>');
		} else {

			$msg = array(

				'name'            => form_error('name'),
				'dob'             => form_error('dob'),
				'gender'          => form_error('gender'),
				'contact_no'      => form_error('contact_no'),
				'email'           => form_error('email'),
				'address'         => form_error('address'),
				'department'      => form_error('department'),
				'designation'     => form_error('designation'),
				'date_of_joining' => form_error('date_of_joining'),
				'shift'           => form_error('shift'),
				'qualification'   => form_error('qualification'),
				'work_exp'        => form_error('work_exp'),
				'status'          => form_error('status'),
				'password'        => form_error('password'),
			);
			$data = array('addClas' => 'tst_danger', 'msg' => $msg, 'icon' => '<i class="pe-7s-sun bx-spin"></i>');
		}
		echo json_encode($data);
	}
	/*******************************@mit Singh Start 01-03-24 ****************************************/
	public function findBranchDetails()
	{
		$post = $this->input->post();
		$result = '';
		if ($post['actnType'] == 'department') {
			$getDetails = $this->common->get_data('branch_manage', array('id' => $post['id']), 'department');
			if ($getDetails['department']) {
				$department = explode(',', $getDetails['department']);
				if ($department) {
					$dpList = '<option value="">Select Department</option>';
					foreach ($department as $dList) {
						$depDet = $this->common->get_data('department', array('id' => $dList), 'department_name');
						$dpList .= '<option value="' . $dList . '">' . $depDet['department_name'] . '</option>';
					}
					$result = $dpList;
				} else {
					$result = '<option value="">Choose Department</option>';
				}
			} else {
				$result = '<option value="">Choose Department</option>';
			}
		} else if ($post['actnType'] == 'designation') {
			$getDetails = $this->common->get_data('branch_manage', array('id' => $post['brID']), 'designation');
			if ($getDetails['designation']) {
				$department = explode(',', $getDetails['designation']);
				if ($department) {
					$dpList = '<option value="">Select Department</option>';
					foreach ($department as $dList) {
						$desigDet = $this->common->get_data('designation', array('id' => $dList, 'department' => $post['id']), 'designation_name');
						if ($desigDet) {
							$dpList .= '<option value="' . $dList . '">' . $desigDet['designation_name'] . '</option>';
						}
					}
					$result = $dpList;
				} else {
					$result = '<option value="">Choose Department</option>';
				}
			} else {
				$result = '<option value="">Choose Department</option>';
			}
		}
		sleep(.5);
		print_r($result);
	}
	/*******************************@mit Singh End 01-03-24 ****************************************/
	/*******************************@mit Singh Start 09-27-24 ****************************************/
	public function import($action = NULL)
	{
		if ($action == 'document') {
			$this->form_validation->set_rules('empDocFile', 'document image', 'trim|required|xss_clean');
			if ($this->form_validation->run() == TRUE) {
				$post = $this->input->post();
				$config = array('upload_path' => "uploads/csv", 'allowed_types' => "csv|CSV", 'overwrite' => FALSE, 'encrypt_name' => TRUE, 'max_size' => "1012000000");
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if ($this->upload->do_upload('empDocFileAdd')) {
					$image['image_upload'] = array('upload_data' => $this->upload->data());
					$image_filename = $image['image_upload']['upload_data']['file_name'];
					$msg = array('Thank You! you have successfully add new document.');
					$data = array('addClas' => 'tst_success', 'msg' => $msg, 'icon' => '<i class="ti-check-box"></i>');
				} else {
					$msg = array($this->upload->display_errors(), 'So please refresh or reload page.');
					$data = array('addClas' => 'tst_warning', 'msg' => $msg, 'icon' => '<i class="fe fe-settings bx-spin"></i>');
				}
			} else {
				$msg = array('empDocFile' => form_error('empDocFile'));
				$data = array('addClas' => 'tst_danger', 'msg' => $msg, 'icon' => '<i class="fe fe-settings bx-spin"></i>');
			}
			sleep(1);
			echo json_encode($data);
		} else if ($action == 'readDoc') {

			$result = $this->db->select('id,employee_id')->from('staff')->order_by('id', 'DESC')->get()->row();
			if (!empty($result) && $result->id != 0) {
				$empID = $result->employee_id + 1;
			} else {
				$empID = 9900001;
			}
			$getFile = 'uploads/csv/employee.csv'; //$getFile='uploads/csv/test_mode.csv';
			$file = fopen($getFile, "r");
			//print_r($file);echo '<br>';//if(file_exists($getFile)){echo 'File exist';}else{echo 'File does not exist';}exit;
			if (file_exists($getFile) == true) {
				$getFileSize = filesize($getFile);
				$lastId = '';
				if ($getFileSize > 2) {
					$file = fopen($getFile, "r");
					while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
						$empID += 1;
						$gender = ($emapData[2] == 'Male') ? '1' : (($emapData[2] == 'Female') ? '2' : '3');
						$dateOfBirth = date('Y-m-d', strtotime($emapData[3]));
						$resultArr = array(
							'employee_id' => $empID,
							'biometric_id' => $empID,
							'user_type' => '4',
							'name' => $emapData[1],
							'gender' => $gender,
							'dob' => $dateOfBirth,
							'contact_no' => $emapData[4],
							'email' => $emapData[5],
							'address' => $emapData[6],
							'password' => md5($empID),
							'show_password' => $empID
						);
						//print_r($resultArr);echo '<br>';
						$lastId = $this->common->save_data('temp_staff', $resultArr);
					}
					//exit;
					fclose($file);
					$delFile = '/' . $getFile;
					echo $delFile . '<br>';
					unlink($delFile);


					if ($lastId) {

						$msg = array('Thank You! you have successfully import employee details.');
						$data = array('addClas' => 'tst_success', 'msg' => $msg, 'icon' => '<i class="ti-check-box"></i>');
					} else {
						$msg = array('Oops it seems went wrong while importing details.');
						$data = array('addClas' => 'tst_warning', 'msg' => $msg, 'icon' => '<i class="fe fe-settings bx-spin"></i>');
					}
				} else {
					$msg = array('Oops it seems there is no data in this file.');
					$data = array('addClas' => 'tst_danger', 'msg' => $msg, 'icon' => '<i class="fe fe-settings bx-spin"></i>');
				}
			} else {
				$msg = array('Oops it seems there is not file exist.');
				$data = array('addClas' => 'tst_danger', 'msg' => $msg, 'icon' => '<i class="fe fe-settings bx-spin"></i>');
			}
			sleep(1);
			echo json_encode($data);
		} else {
			$data['title'] = 'Import Employee Details';
			$data['breadcrums'] = 'Import Details';
			$data['layout'] = "admin/employee/import.php";
			$data['uploadTarget'] = base_url("admin/employee/import/document");
			$this->load->view('base', $data);
		}
	}
	/*******************************@mit Singh End 09-27-24 ****************************************/

	public function performance($actn = NULL)
	{
		if ($actn == 'viewList') {
			$post_data = $this->input->post();
			$record = $this->employee->feedback_list($post_data);
			$i = $post_data['start'] + 1;
			$return['data'] = array();
			foreach ($record as $row) {

				if (strlen($row->message) > 30) {
					$message = '<div class="amtltip">' . substr($row->message, 0, 27) . '...<div class="tlptext">' . $row->message . '</div></div>';
				} else {
					$message = $row->message;
				}

				$view = '<div style="text-align:center">
				     <a href="javascript:void(0);" data-id="miLvView===admin/employee/performance/getDetails===' . $row->id . '" id="prview' . $row->id . '" title="Click to view details" class="btn ripple miView btn-sm getAction"><i class="ti-eye"></i></a>
			     </div>';
				$return['data'][] = array(
					'<strong>' . $i++ . '.</strong>',
					$row->employee_id,
					$row->name,
					$row->heading,
					$message,
					date('d M, Y', strtotime($row->created_date)),
					$view
				);
			}
			$return['recordsTotal'] = $this->employee->feedback_count();
			$return['recordsFiltered'] = $this->employee->feedback_filter_count($post_data);
			$return['draw'] = $post_data['draw'];
			echo json_encode($return);
		} else if ($actn == 'getDetails') {
			$post = $this->input->post('id');
			$getDetails = $this->employee->getFrPerformance($post);
			if ($getDetails) {
				$chatDetails = $this->employee->getPerformRemarks($getDetails['id']);
				$chatList = '';
				if ($chatDetails) {
					foreach ($chatDetails as $lst) {
						$createDate = date('d M Y', strtotime($lst->created_date));
						$empName = ($lst->surname ? ($lst->surname . ' ' . $lst->name) : $lst->name);



						if ($lst->created_type == '1') {
							$chatList .= '<div class="direct-chat-msg"><div class="direct-chat-info"><span class="direct-chat-name pull-left">' . $empName . '</span><span class="direct-chat-timestamp">' . $createDate . '</span></div>
         										<img class="direct-chat-img" src="' . base_url($lst->image) . '">
											    <div class="direct-chat-text">' . $lst->remarks . '</div>
											</div>';
						} else {
							$chatList .= '<div class="direct-chat-msg right"><div class="direct-chat-info"><span class="direct-chat-name">' . $empName . '</span><span class="direct-chat-timestamp">' . $createDate . '</span></div>
											  <img class="direct-chat-img" src="' . base_url($lst->image) . '">
											  <div class="direct-chat-text">' . $lst->remarks . '</div>
										   </div>';
						}
					}
				}
				$empName = $getDetails['surname'] ? ($getDetails['surname'] . " " . $getDetails['name']) : $getDetails['name'];
				$messagePc = $getDetails['message'] . '<br><div class="timeDisplay"><i class="fe fe-calendar me-1"></i> ' . date('d M Y', strtotime($getDetails['created_date'])) . '</div>';
				$return = array(
					'addClas' => 'success',
					'empName' => $empName,
					'empDesig' => $getDetails['designation_name'],
					'empImage' => base_url($getDetails['image']),
					'heading' => $getDetails['heading'],
					'message' => $messagePc,
					'chtMsg' => $chatList,
					'chtMsgSave' => 'saveRemarks===admin/employee/performance/saveRemarks===' . $post
				);
			} else {
				$return = array('addClas' => 'tst_danger', 'msg' => array('Unfortunately, there are no records available.'), 'icon' => '<i class="fe fe-sun bx-spin"></i>');
			}
			echo json_encode($return);
		} else if ($actn == 'saveRemarks') {
			$post = $this->input->post();
			if ($post['remarks'] == '<p><br></p>') {
				$return = array('addClas' => 'tst_danger', 'msg' => array("Unfortunately, you haven't enter remarks."), 'icon' => '<i class="fe fe-sun bx-spin"></i>');
			} else {
				$insertArr = array('feedback_id' => $post['id'], 'remarks' => $post['remarks'], 'created_by' => $this->logID, 'created_type' => '1', 'created_date' => date('Y-m-d H:i:s'));
				if ($this->common->save_data('employee_feedback_remark', $insertArr)) {
					$return = array('addClas' => 'tst_success', 'msg' => array("Thank You! You have successfully submitted your remakrs."), 'icon' => '<i class="ti-check-box"></i>');
				} else {
					$return = array('addClas' => 'tst_danger', 'msg' => array("Unfortunately, something went wrong while submitting remarks."), 'icon' => '<i class="fe fe-sun bx-spin"></i>');
				}
			}
			echo json_encode($return);
		} else {
			$data = array(
				'title' => 'Employee Performance Details',
				'breadcrums' => 'Employee Performance Details',
				'target' => "admin/employee/performance/viewList",
				'layout' => "admin/employee/performance.php",
				'bckUrl' => base_url("staff/dashboard")
			);
			$this->load->view('base', $data);
		}
	}

	public function generate($actn = NULL)
	{
		if ($actn == 'viewList') {
			$post = $this->input->post('id');
			if ($post) {
				$isExistEmp = $this->employee->getDetailsGenerateFrm($post);
				if ($isExistEmp) {
					$fullName = $isExistEmp->surname ? ($isExistEmp->surname . ' ' . $isExistEmp->name) : $isExistEmp->name;
					$address = $isExistEmp->district ? ($isExistEmp->address . ',<br>' . $isExistEmp->district . ',' . $isExistEmp->state) : $isExistEmp->address;
					$return = array(
						'addClas' => 'tst_success',
						'empName' => $fullName,
						'designation' => $isExistEmp->designation_name,
						'father_name' => $isExistEmp->father_name,
						'dob' => $isExistEmp->dob,
						'pan_nu' => $isExistEmp->pan_nu,
						'address' => $address,
						'zipcode' => $isExistEmp->zipcode,
						'msg' => array("Thank You! You have successfully submitted your remakrs."),
						'icon' => '<i class="ti-check-box"></i>'
					);
				} else {
					$return = array('addClas' => 'tst_danger', 'msg' => array("Details not available for this ID #" . $post), 'icon' => '<i class="fe fe-sun bx-spin"></i>');
				}
			} else {
				$return = array('addClas' => 'tst_danger', 'msg' => array("Please input employee id to get details."), 'icon' => '<i class="fe fe-sun bx-spin"></i>');
			}
			echo json_encode($return);
		} else if ($actn == 'offer_letter') {
			$data = array(
				'title' => 'Employee Offer Letter',
				'breadcrums' => 'Offer Letter',
				'target' => "searchEmployee===admin/employee/generate/forJoining===find_emp_id",
				'layout' => "admin/employee/offer_letter.php",
				'bckUrl' => base_url("staff/dashboard")
			);
			$this->load->view('base', $data);
		} else if ($actn == 'forJoining') {
			$post = $this->input->post('id');
			if ($post) {
				$isExistEmp = $this->employee->getDetailsGenerateFrm($post);
				if ($isExistEmp) {
					$isExistSal = $this->common->get_data('employee_salary_setup', array('emp_id' => $isExistEmp->id, 'br_id' => $isExistEmp->branch_id, 'desig_id' => $isExistEmp->desgId), '*');
					if ($isExistSal) {
						$basic = $isExistSal['basic_sal'] ? $isExistSal['basic_sal'] : '0.0';
						$hraAmt = $isExistSal['hraAmt'] ? $isExistSal['hraAmt'] : '0.00';
						$taAmt = $isExistSal['taAmt'] ? $isExistSal['taAmt'] : '0.00';
						$daAmt = $isExistSal['daAmt'] ? $isExistSal['daAmt'] : '0.00';
						$paAmt = $isExistSal['paAmt'] ? $isExistSal['paAmt'] : '0.00';
						$bouns = $isExistSal['bonus'] ? $isExistSal['bonus'] : '0.00';
						$medical = $isExistSal['medical'] ? $isExistSal['medical'] : '0.00';
						$insentive = $isExistSal['insentive'] ? $isExistSal['insentive'] : '0.00';
						$otherInc = $isExistSal['otherInc'] ? $isExistSal['otherInc'] : '0.00';
						$pfAmt = $isExistSal['pfAmt'] ? $isExistSal['pfAmt'] : '0.00';
						$tdsAmt = $isExistSal['tdsAmt'] ? $isExistSal['tdsAmt'] : '0.00';
						$insurance = $isExistSal['insurance'] ? $isExistSal['insurance'] : '0.00';
						$othrDeduction = $isExistSal['othrDeduction'] ? $isExistSal['othrDeduction'] : '0.00';
						$grossAmt = $isExistSal['grossAmt'] ? $isExistSal['grossAmt'] : '0.00';
						$advance = $isExistSal['advance'] ? $isExistSal['advance'] : '0.00';
					} else {
						$getPrm = 'gross_sal_amt as grossAmt,ROUND((gross_sal_amt*basic_percent)/100,2) as basic_sal,ROUND((gross_sal_amt*hra_percent)/100,2) as hraAmt,ROUND((gross_sal_amt*ta_percent)/100,2) as taAmt,
						         ROUND((gross_sal_amt*da_percent)/100,2) as daAmt,ROUND((gross_sal_amt*pa_percent)/100,2) as paAmt,bonus,ROUND((gross_sal_amt*medical_percent)/100,2) as medical,incentive as insentive,other_inc as otherInc,
								 ROUND((gross_sal_amt*medical_percent)/100,2) as medical,ROUND((gross_sal_amt*pf_percent)/100,2) as pfAmt,
								 ROUND((gross_sal_amt*tds_percent)/100,2) as tdsAmt,insurance_amt as insurance,other_deduction as othrDeduction,advance_amt as advance';
						$isExistOver = $this->common->get_data('salary_master', array('branch_id' => $isExistEmp->branch_id, 'desig_id' => $isExistEmp->desgId), $getPrm);
						$basic = $isExistOver['basic_sal'] ? $isExistOver['basic_sal'] : '0.0';
						$hraAmt = $isExistOver['hraAmt'] ? $isExistOver['hraAmt'] : '0.00';
						$taAmt = $isExistOver['taAmt'] ? $isExistOver['taAmt'] : '0.00';
						$daAmt = $isExistOver['daAmt'] ? $isExistOver['daAmt'] : '0.00';
						$paAmt = $isExistOver['paAmt'] ? $isExistOver['paAmt'] : '0.00';
						$bouns = $isExistOver['bonus'] ? $isExistOver['bonus'] : '0.00';
						$medical = $isExistOver['medical'] ? $isExistOver['medical'] : '0.00';
						$insentive = $isExistOver['insentive'] ? $isExistOver['insentive'] : '0.00';
						$otherInc = $isExistOver['otherInc'] ? $isExistOver['otherInc'] : '0.00';
						$pfAmt = $isExistOver['pfAmt'] ? $isExistOver['pfAmt'] : '0.00';
						$tdsAmt = $isExistOver['tdsAmt'] ? $isExistOver['tdsAmt'] : '0.00';
						$insurance = $isExistOver['insurance'] ? $isExistOver['insurance'] : '0.00';
						$othrDeduction = $isExistOver['othrDeduction'] ? $isExistOver['othrDeduction'] : '0.00';
						$grossAmt = $isExistOver['grossAmt'] ? $isExistOver['grossAmt'] : '0.00';
						$advance = $isExistOver['advance'] ? $isExistOver['advance'] : '0.00';
					}

					$fullName = $isExistEmp->surname ? ($isExistEmp->surname . ' ' . $isExistEmp->name) : $isExistEmp->name;
					$cityPin = $isExistEmp->district ? ($isExistEmp->district) : $isExistEmp->district;
					$return = array(
						'addClas' => 'tst_success',
						'empCode' => $isExistEmp->employee_id,
						'empName' => $fullName,
						'empContact' => $isExistEmp->contact_no,
						'designation' => $isExistEmp->designation_name,
						'department' => $isExistEmp->department_name,
						'address' => $isExistEmp->address,
						'cityPin' => $cityPin,
						'zipCode' => $isExistEmp->zipcode,
						'created_at' => date('d M,Y', strtotime($isExistEmp->created_at)),
						'basic_sal' => $basic,
						'hraAmt' => $hraAmt,
						'taAmt' => $taAmt,
						'daAmt' => $daAmt,
						'paAmt' => $paAmt,
						'bonus' => $bouns,
						'medical' => $medical,
						'insentive' => $insentive,
						'otherInc' => $otherInc,
						'pfAmt' => $pfAmt,
						'tdsAmt' => $tdsAmt,
						'insurance' => $insurance,
						'othrDeduction' => $othrDeduction,
						'grossAmt' => $grossAmt,
						'advance' => $advance,
						'msg' => array("Thank You! You have successfully submitted your remakrs."),
						'icon' => '<i class="ti-check-box"></i>'
					);
				} else {
					$return = array('addClas' => 'tst_danger', 'msg' => array("Details not available for this ID #" . $post), 'icon' => '<i class="fe fe-sun bx-spin"></i>');
				}
			} else {
				$return = array('addClas' => 'tst_danger', 'msg' => array("Please input employee id to get details."), 'icon' => '<i class="fe fe-sun bx-spin"></i>');
			}
			echo json_encode($return);
		} else if ($actn == 'regination_letter') {
			$data = array(
				'title' => 'Employee Resignation Letter',
				'breadcrums' => 'Resignation Letter',
				'layout' => "admin/employee/regination_letter.php",
				'target' => "searchEmployee===admin/employee/generate/forRegination===find_emp_id",
				'bckUrl' => base_url("staff/dashboard")
			);
			$this->load->view('base', $data);
		} else if ($actn == 'forRegination') {
			$post = $this->input->post('id');
			if ($post) {
				$isExistEmp = $this->employee->getDetailsGenerateFrm($post);
				if ($isExistEmp) {
					$fullName = $isExistEmp->surname ? ($isExistEmp->surname . ' ' . $isExistEmp->name) : $isExistEmp->name;
					$cityPin = $isExistEmp->district ? ($isExistEmp->district . ',' . $isExistEmp->zipcode) : $isExistEmp->district;
					$return = array(
						'addClas' => 'tst_success',
						'empCode' => $isExistEmp->employee_id,
						'empName' => $fullName,
						'empContact' => $isExistEmp->contact_no,
						'designation' => $isExistEmp->designation_name,
						'department' => $isExistEmp->department_name,
						'address' => $isExistEmp->address,
						'cityPin' => $cityPin,
						'msg' => array("Thank You! You have successfully submitted your remakrs."),
						'icon' => '<i class="ti-check-box"></i>'
					);
				} else {
					$return = array('addClas' => 'tst_danger', 'msg' => array("Details not available for this ID #" . $post), 'icon' => '<i class="fe fe-sun bx-spin"></i>');
				}
			} else {
				$return = array('addClas' => 'tst_danger', 'msg' => array("Please input employee id to get details."), 'icon' => '<i class="fe fe-sun bx-spin"></i>');
			}
			echo json_encode($return);
		} else {
			$getCompanySt = $this->common->state_district(csystem_info('district'));
			$data = array(
				'title' => 'Employee Form 16 generate',
				'breadcrums' => 'Employee Form 16 generate',
				'getCompanySt' => $getCompanySt,
				'target' => "searchEmployee===admin/employee/generate/viewList===find_emp_id",
				'layout' => "admin/employee/form16_generate.php",
				'bckUrl' => base_url("staff/dashboard")
			);
			$this->load->view('base', $data);
		}
	}

	public function profile_image($id)
	{
		$getImgFl = $this->input->post('file');
		$image_filename = NULL;
		$config = array('upload_path' => "uploads/employee/", 'allowed_types' => "jpg|png|jpeg|JPEG|JPG", 'overwrite' => FALSE, 'encrypt_name' => TRUE, 'max_size' => "10120000");
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload('file')) {
			$image['image_upload'] = array('upload_data' => $this->upload->data()); //Image Upload
			$image_filename = $image['image_upload']['upload_data']['file_name']; //Image Name
		}
		if ($image_filename) {
			$config = NULL;
			$config['image_library'] = 'gd2';
			$config['source_image']  = 'uploads/employee/' . $image_filename;
			//	$config['new_image']  = 'uploads/user/thumb_image/'.$image_filename;
			$config['width']	 = '150';
			$config['height']	= '150';
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			$updateDataArr = array('image' => 'uploads/employee/' . $image_filename);
			$isGetPrevImg = $this->common->getRowData('staff', 'id', $id);
			$getPreviousImage = ($isGetPrevImg->image != 'uploads/employee/no_img.png') ? $isGetPrevImg->image : '';
			$whereCon = array('id' => $id);
			$resltMsg = '';
			if ($getPreviousImage) {
				//$imgLocation='uploads/user/'.$getPreviousImage;
				unlink($getPreviousImage);
				//unlink('uploads/user/thumb_image/'.$getPreviousImage);
				$resltMsg = '1====' . $image_filename;
			} else {
				$resltMsg = '2';
			}
			$result = $this->common->update_data('staff', $whereCon, $updateDataArr);
			if ($result) {
				$resltMsg = '1====' . $image_filename;
			} else {
				$resltMsg = '2';
			}
			echo $resltMsg;
		} else {
			echo 'Only .jpg,.png,.jpeg are accepted';
		}
	}
	public function notify()
	{
		$post = $this->input->post();
		$isEmployee = $this->employee->get_detail($post['id']);
		$name = '<span style="font-weight:900;text-transform: uppercase;">' . $isEmployee->employee_name . '</span>';
		$empDet = ($isEmployee->designation_name ? (' for the <span style="font-weight:900;text-transform: uppercase;">' . $isEmployee->designation_name . '</span>') : '.');

		if ($post['action'] == 'offer') {
			$nofyClr = "#019927";
			$nofyHeadClr = "#004411";
			$msg = 'This is to confirm if you would like to proceed with sending the offer letter to ' . $name . $empDet;
		} else if ($post['action'] == 'warning') {
			$nofyClr = "#AE7200";
			$nofyHeadClr = "#603F00";
			$msg = 'This is to confirm if you would like to proceed with sending the warning letter to ' . $name . $empDet;
		} else if ($post['action'] == 'promote') {
			$nofyClr = "#1C5AD0";
			$nofyHeadClr = "#002468";
			$msg = 'This is to confirm if you would like to proceed with sending the promotation letter to ' . $name . $empDet;
		} else if ($post['action'] == 'depart') {
			$nofyClr = "#E13F83";
			$nofyHeadClr = "#990040";
			$msg = 'This is to confirm if you would like to proceed with sending the resignation letter to ' . $name . $empDet;
		} else {
			$nofyClr = "#d93d00";
			$nofyHeadClr = "#7d2300";
			$msg = "Oops! It looks like you've selected an invalid option. Please choose a valid option from the available list.";
		}
		$return = array('msg' => $msg, 'nofyClr' => $nofyClr, 'nofyHeadClr' => $nofyHeadClr, 'sendMail' => 'sendMail===admin/employee/send_mail===' . $post['id'] . '===' . $post['action']);
		echo json_encode($return);
	}



	public function send_mail()
	{
		$post = $this->input->post();

		if ($post['id'] != "") {
			$isEmployee = $this->employee->get_detail($post['id']);
			$name = '<span style="font-weight:900;text-transform: uppercase;">' . $isEmployee->employee_name . '</span>';
			$empDet = ($isEmployee->designation_name ? (' for the <span style="font-weight:900;text-transform: uppercase;">' . $isEmployee->designation_name . '.</span>') : '.');
			if ($post['action'] == 'depart') {
				$where = array(
					'name' => $isEmployee->employee_name,
					'your_position' => ($isEmployee->designation_name ? $isEmployee->designation_name : 'N/A'),
					'last_working_day' => date("d F Y"),
					'manager_name' => $isEmployee->contact_person_name,
					'managerContact' => $isEmployee->mobile_nu,
					'managerEmail' => $isEmployee->branch_email,
					'acceptLink' => base_url(),
					'rejectLink' => base_url()
				);
				$email_res = resignation_mail($where);
				$notfyClr = "#00668E";
				$notfyHeadClr = "#004966";
				$msg = 'I would like to confirm that the resignation letter has been successfully submitted to ' . $name . ' regarding the' . $empDet;
				$login_btn = base_url();
				$to_email  = $isEmployee->email;
				$headers   = "MIME-Version: 1.0" . "\r\n";
				$headers  .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
				$headers  .= 'From: ' . system_info('company_name') . '. <support@ashutoshautofin.in>';
				$isMailsent = mail($to_email, "Resignation Letter", $email_res, $headers);
			} else if ($post['action'] == 'offer') {
				$where = array('salary_id' => $isEmployee->salary_id, 'designation' => $isEmployee->designation, 'branch_id' => $isEmployee->branch_id, 'id' => $isEmployee->id);
				$getSalary = $this->employee->get_salary_details($where);
				$where = array(
					'empCode' => $isEmployee->employee_id,
					'name' => $isEmployee->employee_name,
					'address' => $isEmployee->address,
					'cityName' => ($isEmployee->district_name ? ($isEmployee->district_name . ' ,' . $isEmployee->state_name) : $isEmployee->state_name),
					'zipcode' => $isEmployee->zipcode,
					'designation' => ($isEmployee->designation_name ? $isEmployee->designation_name : 'N/A'),
					'department' => ($isEmployee->department_name ? $isEmployee->department_name : 'N/A'),
					'branchNm' => $isEmployee->branch_name,
					'empJoining' => date("d F Y"),
					'manager_name' => $isEmployee->contact_person_name,
					'managerContact' => $isEmployee->mobile_nu,
					'managerEmail' => $isEmployee->branch_email,
					'acceptLink' => base_url(),
					'rejectLink' => base_url(),
					'empBasic' => ($getSalary->basic_pay ? $getSalary->basic_pay : '0.00'),
					'empHRA' => ($getSalary->hraAmt ? $getSalary->hraAmt : '0.00'),
					'empTA' => ($getSalary->taAmt ? $getSalary->taAmt : '0.00'),
					'empPA' => ($getSalary->daAmt ? $getSalary->daAmt : '0.00'),
					'empEA' => ($getSalary->paAmt ? $getSalary->paAmt : '0.00'),
					'empBonus' => ($getSalary->bonus ? $getSalary->bonus : '0.00'),
					'empSpcialA' => ($getSalary->mediAmt ? $getSalary->mediAmt : '0.00'),
					'empGross' => ($getSalary->grSal ? $getSalary->grSal : '0.00'),
					'empPF' => ($getSalary->pfAmt ? $getSalary->pfAmt : '0.00'),
					'empPTA' => ($getSalary->tdsAmt ? $getSalary->tdsAmt : '0.00'),
					'empESIC' => ($getSalary->esicEmpAmt ? $getSalary->esicEmpAmt : '0.00'),
					'empLoyerESIC' => ($getSalary->esicEmpLyrAmt ? $getSalary->esicEmpLyrAmt : '0.00'),
					'netPay' => ($getSalary->net_payble_amt ? $getSalary->net_payble_amt : '0.00'),
					'empCTC' => ($getSalary->net_payble_amt ? $getSalary->net_payble_amt : '0.00'),
					'empCTCWord' => $this->common->getIndianCurrency(($getSalary->net_payble_amt ? $getSalary->net_payble_amt : '0.00'))
				);

				$email_res = offer_letter($where);
				$notfyClr = "#00668E";
				$notfyHeadClr = "#004966";
				$msg = 'I would like to confirm that the offer letter has been successfully submitted to ' . $name . ' regarding the' . $empDet;
				//print_r($isEmployee);
				//echo '<br>';
				//print_r($where);
				//print_r($email_res);
				//exit;
				//$login_btn=base_url();
				$to_email  = $isEmployee->email;
				$headers   = "MIME-Version: 1.0" . "\r\n";
				$headers  .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
				$headers  .= 'From: ' . system_info('company_name') . '. <support@ashutoshautofin.in>';
				$isMailsent = mail($to_email, "Offer Letter", $email_res, $headers);
			} else if ($post['action'] == 'promote') {
				$where = array(
					'name' => $isEmployee->employee_name,
					'your_position' => ($isEmployee->designation_name ? $isEmployee->designation_name : 'N/A'),
					'start_working' => date("d F Y"),
					'manager_name' => $isEmployee->contact_person_name,
					'managerContact' => $isEmployee->mobile_nu,
					'managerEmail' => $isEmployee->branch_email,
					'acceptLink' => base_url(),
					'rejectLink' => base_url()
				);
				$email_res = promote_mail($where);
				$notfyClr = "#00668E";
				$notfyHeadClr = "#004966";
				$msg = 'I would like to confirm that the promotion letter has been successfully issued to ' . $name . ' regarding the ' . $empDet . '.';
				$login_btn = base_url();
				$to_email  = $isEmployee->email;
				$headers   = "MIME-Version: 1.0" . "\r\n";
				$headers  .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
				$headers  .= 'From: ' . system_info('company_name') . '. <support@ashutoshautofin.in>';
				$isMailsent = mail($to_email, "promotion  Letter", $email_res, $headers);
			} else if ($post['action'] == 'warning') {
				$where = array('warning_message' => 'We have observed that you have consistently failed to report to the office on time for several days during the month. Regular punctuality is expected as part of your professional responsibilities. Continued lateness disrupts workflow and may result in disciplinary action. Please treat this as a formal warning and ensure timely attendance moving forward.');
				$where = array(
					'name' => $isEmployee->employee_name,
					'your_position' => ($isEmployee->designation_name ? $isEmployee->designation_name : 'N/A'),
					'start_working' => date("d F Y"),
					'manager_name' => $isEmployee->contact_person_name,
					'managerContact' => $isEmployee->mobile_nu,
					'managerEmail' => $isEmployee->branch_email,
					'acceptLink' => base_url(),
					'rejectLink' => base_url()
				);

				$email_res = warning_mail($where);
				$notfyClr = "#00668E";
				$notfyHeadClr = "#004966";
				$msg = 'I would like to confirm that the warning letter has been successfully issued to ' . $name . ' regarding the ' . $empDet . '.';
				$login_btn = base_url();
				$to_email  = $isEmployee->email;
				$headers   = "MIME-Version: 1.0" . "\r\n";
				$headers  .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
				$headers  .= 'From: ' . system_info('company_name') . '. <support@ashutoshautofin.in>';
				$isMailsent = mail($to_email, "Warning  Letter", $email_res, $headers);
			} else {
				$notfyClr = "#880026";
				$notfyHeadClr = "#880026";
				$msg = " Please be patient, updates are in progress for this section.<br>We'll share the latest information with you shortly. Thank you!";
			}
			$return = array('result' => 'tSuccess', 'msg' => $msg, 'notfyClr' => $notfyClr, 'notfyHeadClr' => $notfyHeadClr, 'sendMail' => 'alreadyMail');
		} else {
			$return = array('result' => 'tDanger', 'msg' => "I can't find any relevant data for the selected option.", 'notfyClr' => "#ff3000", 'notfyHeadClr' => "#ae2100");
		}
		echo json_encode($return);
	}

	public function testMode()
	{
		$data = array(
			'title' => 'Email Template Test Mode',
			'breadcrums' => 'Email Template Test Mode',
			'layout' => 'admin/employee/email_template.php'
		);
		$this->load->view('base', $data);
	}


	public function active()
	{
		$data = array(
			'title' => 'Active Employee',
			'breadcrums' => 'Active Employee Details',
			'btnName' => 'Show List',
			'showList' => "admin/employee/activeList",
			'layout' => 'admin/employee/active_employee.php'
		);
		$this->load->view('base', $data);
	}


	public function active_employees()
	{
		$page = $this->input->post('page');
		if (!$page) $page = 1;
		$limit = 12;
		$offset = ($page - 1) * $limit;
		$where = array('limit' => $limit, 'offset' => $offset, 'logCat' => $this->logCat, 'logBr' => $this->logBr);
		$data['employees'] = $this->employee->get_active_employees($where);
		$total_rows = $this->employee->get_total_employees($where);
		$data['total_rows'] = $total_rows;
		$data['limit'] = $limit;
		$data['urlLoc'] = base_url();
		$data['url_view'] = base_url('admin/employee/view_employee_data/');
		$data['url_edit'] = base_url('admin/employee/manages/');
		echo json_encode($data);
	}

	public function resigned()
	{
		$data = array(
			'title' => 'Resigned Employee',
			'btnName' => 'Show List',
			'showList' => "admin/employee/resignedList",
			'breadcrums' => 'Resigned Employee Details',
			'layout' => 'admin/employee/resigned_employees.php'
		);
		$this->load->view('base', $data);
	}

	public function resigned_employees()
	{
		$page = $this->input->post('page');
		if (!$page) $page = 1;
		$limit = 12;
		$offset = ($page - 1) * $limit;
		$where = array('limit' => $limit, 'offset' => $offset, 'logCat' => $this->logCat, 'logBr' => $this->logBr);
		$data['employees'] = $this->employee->get_rejected_employees($where);
		$total_rows = $this->employee->get_total_employees($where);
		$data['total_rows'] = $total_rows;
		$data['limit'] = $limit;
		$data['urlLoc'] = base_url();
		$data['url_view'] = base_url('admin/employee/view_employee_data/');
		$data['url_edit'] = base_url('admin/employee/manages/');
		echo json_encode($data);
	}


	public function terminated()
	{
		$data = array(
			'title' => 'Terminated Employee',
			'breadcrums' => 'Terminated Employee Details',
			'btnName' => 'Show List',
			'showList' => "admin/employee/terminatedList",
			'breadcrums' => 'Resigned Employee Details',
			'layout' => 'admin/employee/terminated_employee.php'
		);
		$this->load->view('base', $data);
	}

	public function terminated_employees()
	{
		$page = $this->input->post('page');
		if (!$page) $page = 1;
		$limit = 12;
		$offset = ($page - 1) * $limit;
		$where = array('limit' => $limit, 'offset' => $offset, 'logCat' => $this->logCat, 'logBr' => $this->logBr);
		$data['employees'] = $this->employee->get_terminated_employees($where);
		$total_rows = $this->employee->get_total_employees($where);
		$data['total_rows'] = $total_rows;
		$data['limit'] = $limit;
		$data['urlLoc'] = base_url();
		$data['url_view'] = base_url('admin/employee/view_employee_data/');
		$data['url_edit'] = base_url('admin/employee/manages/');
		echo json_encode($data);
	}
}
