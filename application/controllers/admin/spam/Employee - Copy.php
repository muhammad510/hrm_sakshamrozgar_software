<?php
defined('BASEPATH') or exit('No direct script access allowed');

    class Employee extends CI_Controller
    {

        public function __construct()
        {

            parent::__construct();
			$this->load->library(array('upload','image_lib'));         
		    $this->load->helper(array('amiPage'));
            $this->load->model('setting/Common_model', 'common');
            $this->load->model('admin/Employee_model', 'employee');
            ($this->session->userdata('mim_id') == '') ? redirect(base_url(), 'refresh') : '';
            error_reporting(0);

        }

/*        public function add_employee()
        {
           $result = $this->db->select('id,employee_id')->from('staff')->order_by('id', 'DESC')->get()->row();		
			if(!empty($result) && $result->id!=0){$empID=$result->employee_id+1;}else{$empID=9900001;}	
		    $data['empID']       = $empID;
			$data['title']       = 'Add Employee Details';
            $data['breadcrums']  = 'Add Employee Details';
            $data['department']  = $this->common->all_data('department', 'id, department_name');
            $data['designation'] = $this->common->all_data('designation', 'id, designation_name');
            $data['shift']       = $this->common->all_data('shift_manage', 'id, shift_name, shift_start, shift_end');
            $data['layout']      = "admin/employee/add_employee.php";
            $this->load->view('base', $data);
        }
*/

/*****************************************@mit Singh Start 01-03-24 ****************************************************/
public function getCompanyDetails()
{
	$post=$this->input->post();
	if($post['action']=='designation')
	{
		if($post['branch']!='9999')
		{$return=$this->common->get_data('salary_master',array('status'=>'1','branch_id'=>$post['branch'],'desig_id'=>$post['id']),'id,net_payble_amt');}
		else{$return=array('id'=>'9999','net_payble_amt'=>'50000');}
		}
	else if($post['action']=='salary_type')
	{
		
		
		//$getDaysInMonth=array('01'=>'31','02'=>'28','03'=>'31','04'=>'30','05'=>'31','06'=>'30','07'=>'31','08'=>'31','09'=>'30','10'=>'31','11'=>'30','12'=>'31');
		if($post['slID']!='9999')
		{
			$getSalAmt=$this->common->getRowData('salary_master','id',$post['slID']);
			}
			else
			{
				$getSalAmt->net_payble_amt='50000';
				}
/*		if($post['id']=='1'){$netSalaryAmt=$getSalAmt->net_payble_amt/$getDaysInMonth[date('m')];}else if($post['id']=='3'){$netSalaryAmt=$getSalAmt->net_payble_amt;}
		else{$netSalaryAmt=($getSalAmt->net_payble_amt*7)/$getDaysInMonth[date('m')];}*/
		$getDaysInMonth=26;
		if($post['id']=='1'){$netSalaryAmt=$getSalAmt->net_payble_amt/$getDaysInMonth;}
		else if($post['id']=='3'){$netSalaryAmt=$getSalAmt->net_payble_amt;}
		else{$netSalaryAmt=($getSalAmt->net_payble_amt*7)/$getDaysInMonth;}
		echo number_format((float)$netSalaryAmt, 2, '.', '');
		//print_r($getSalAmt->net_payble_amt);
		exit;
		 }
		sleep(1);
		echo json_encode($return);
	}

/*****************************************@mit Singh Start 01-03-24 ****************************************************/

        public function add_employee()
        {
           $result = $this->db->select('id,employee_id')->from('staff')->order_by('id', 'DESC')->get()->row();		
			if(!empty($result) && $result->id!=0){$empID=$result->employee_id+1;}else{$empID=9900001;}	
		    $data['empID']       = $empID;
			$data['title']       = 'Add Employee Details';
            $data['breadcrums']  = 'Add Employee Details';
            $data['branch']      = $this->common->getDataList('branch_manage','status','1');			
			$data['department']  = $this->common->all_data('department','id,department_name');
            $data['designation'] = $this->common->all_data('designation','id,designation_name');
            $data['shift']       = $this->common->all_data('shift_manage','id,shift_name,shift_start,shift_end');
            $data['layout']      = "admin/employee/add_employee.php";
            $this->load->view('base', $data);
        }
















        public function add_employee_data()
        {

            $this->form_validation->set_rules('name',            'Name',            'trim|required|xss_clean');
            $this->form_validation->set_rules('dob',             'Date of Birth',   'trim|required|xss_clean');
            $this->form_validation->set_rules('gender',          'Gender',          'trim|required|xss_clean');
            $this->form_validation->set_rules('contact_no',      'Mobile No.',      'trim|required|xss_clean|numeric|max_length[10]');
            $this->form_validation->set_rules('email',           'Email Id',        'trim|required|xss_clean|valid_email');
            $this->form_validation->set_rules('address',         'Address',         'trim|required|xss_clean');
            $this->form_validation->set_rules('user_type',       'User Type',       'trim|required|xss_clean');
            $this->form_validation->set_rules('branch',          'Branch',          'trim|required|xss_clean');
			$this->form_validation->set_rules('department',      'Department',      'trim|required|xss_clean');
            $this->form_validation->set_rules('designation',     'Designation',     'trim|required|xss_clean');
            $this->form_validation->set_rules('date_of_joining', 'Date Of Joining', 'trim|required|xss_clean');
            $this->form_validation->set_rules('shift',           'Shift',           'trim|required|xss_clean');
            $this->form_validation->set_rules('qualification',   'Quakification',   'trim|required|xss_clean');
            $this->form_validation->set_rules('work_exp',        'Work Exprience',  'trim|required|xss_clean|numeric');
            $this->form_validation->set_rules('status',          'Status',          'trim|required|xss_clean');
            $this->form_validation->set_rules('password',        'Password',        'trim|required|xss_clean');

            if ($this->form_validation->run() == TRUE) {

                $inp = $this->input->post();
		        $config=array('upload_path'=>"uploads/employee",'allowed_types'=>"gif|jpg|png|jpeg|JPEG|JPG",'overwrite'=>FALSE,'encrypt_name'=>TRUE,'max_size' =>"10120000",'max_width'=>'2000','max_height'=>'2000');

                $this->load->library('upload', $config);
				$this->upload->initialize($config);	
                if ($this->upload->do_upload('image')) {
                    $image['image_upload']=array('upload_data' => $this->upload->data()); //Image Upload
			        $image_filename=$image['image_upload']['upload_data']['file_name']; 
					$image_path = "uploads/employee/".$image_filename;


                    // $a = array('photo' => $image_path);
                    // $this->session->set_userdata($a);
					$getYear=date('Y');
			  		$getLeaveDuration='01-01-'.$getYear.'@@@@'.'01-12-'.$getYear; 
			   		$getLeave=$this->employee->getApprovedLeave();
			        if($getLeave){$allotedLeave=$getLeave->approvLeave;}else{$allotedLeave=NULL;}
                    $employee = array(
                    'name'                    => $inp['name'],
                    'father_name'             => $inp['father_name'],
                    'dob'                     => date('Y-m-d',strtotime(str_replace("/","-",$inp['dob']))),
                    'gender'                  => $inp['gender'],
                    'contact_no'              => $inp['contact_no'],
                    'email'                   => $inp['email'],
                    'address'                 => $inp['address'],
                    'nationality'             => $inp['nationality'],
                    'reference_person_name'   => $inp['reference_person_name'],
                    'reference_person_number' => $inp['reference_person_number'],
                    'marital_status'          => $inp['marital_status'],
                    'image'                   => $image_path,
                    'user_type'               => $inp['user_type'],
                    'employee_id'             => $inp['employee_id'],
                    'branch_id'               => $inp['branch'],
					'department'              => $inp['department'],
                    'designation'             => $inp['designation'],
                    'date_of_joining'         => date('Y-m-d',strtotime(str_replace("/","-",$inp['date_of_joining']))),
                    'shift'                   => $inp['shift'],
                    'qualification'           => $inp['qualification'],
                    'work_exp'                => $inp['work_exp'],
                    'status'                  => $inp['status'],
                    'salary_type'             => $inp['salary_type'],
                    'salary_id'               => $inp['salID'],
					'salary_amount'           => $inp['salary_amount'],
                    'holder_name'             => $inp['holder_name'],
                    'bank_account_no'         => $inp['bank_account_no'],
                    'bank_name'               => $inp['bank_name'],
                    'bank_branch'             => $inp['bank_branch'],
                    'ifsc_code'               => $inp['ifsc_code'],
					'approved_leave'          => $allotedLeave,
					'leave_in_between'        => $getLeaveDuration,
                    'password'                => md5($inp['password']),
                    'show_password'           => $inp['password'],
                    'created_by_user_type_id' => $this->session->userdata('mim_id'),
                    'created_at'              => date('Y-m-d'),
                    
                );
			     $this->common->save_data('staff', $employee);
                $data = array('addClas' => 'tst_success', 'msg' => array('Employee Data Added Successfully!'), 'icon' => '<i class="ti-check-box"></i>');
                } 
				else 
				{
                    $data = array('addClas' => 'tst_danger', 'msg' => $this->upload->display_errors(), 'icon' => '<i class="fe fe-setting bx-spin"></i>');
                }
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
                    'date_of_joining' => form_error('date_of_joining'),
                    'shift'           => form_error('shift'),
                    'qualification'   => form_error('qualification'),
                    'work_exp'        => form_error('work_exp'),
                    'status'          => form_error('status'),
                    'password'        => form_error('password'),
                );
                $data = array('addClas' => 'tst_danger', 'msg' => $msg, 'icon' => '<i class="fe fe-settings bx-spin"></i>');

            }
            echo json_encode($data);

        }

        public function manage_employee() {

            $data['title']       = 'Manage Employee Details';
            $data['breadcrums']  = 'Manage Employee Details';
            $data['employees']   = "admin/Employee/all_employee_data";
            $data['layout']      = "admin/employee/manage_employee.php";
            $this->load->view('base', $data);

        }

        public function all_employee_data()
        {

            $getPg=$this->input->post();
            if($getPg['pgLmt'])
            {
                //$return['draw'] ='Here value will show :: '.$getPg['id'];
                sleep(2);
                $getResult=$this->employee->all_employee_data();
				$empList='';
				/*if($getResult)
				{
					foreach($getResult as $emp)
					{
						$imgLoc=base_url($emp['image']);
						$empList.='<div class="col-md-6 col-lg-6 col-xl-3 col-sm-6"><div class="card custom-card"><div class="p-0 ht-100p"><div class="product-grid"><div class="product-image"><a href="ecommerce-product-details.html" class="image"><img style="height: 230px;" class="pic-1" alt="product-image-1" src="'.$imgLoc.'"></a><div class="product-link"><a href="javascript:void(0);"data-bs-target="#view_employee_modal" data-bs-toggle="modal" style="margin-left:-5px;" onclick="view_employee('.$emp['id'].')" title="Click to View Employee Details" class="miDefault"><i class="fas fa-eye"></i><span>Quick View</span></a><a href="javascript:void(0);"data-bs-target="#update_employee_modal" data-bs-toggle="modal" style="margin-left:-5px;" onclick="update_employee('.$emp['id'].')" title="Click to Update Employee Details" class="miDefault"><i class="fa fa-pencil-square-o"></i><span>Edit Details</span></a></div></div><div class="product-content"><h3 class="title"><a href="javascript:void(0);">'.$emp['name'].'<span>('.$emp['employee_id'].') </span></a></h3><div class="price"><span class="text-danger">'.$emp['designation_name'].'</span></div></div></div></div></div></div>';
						}
					}
				
                $return['draw'] = $empList;*/
               $return['draw'] = $getResult;
            } else {

                $getResult=$this->employee->all_employee_data();
               
			    $empList='';
				if($getResult)
				{
					foreach($getResult as $emp)
					{
						$imgLoc=base_url($emp['image']);
						$empList.='<div class="col-md-6 col-lg-6 col-xl-3 col-sm-6"><div class="card custom-card"><div class="p-0 ht-100p"><div class="product-grid"><div class="product-image"><a href="javascript:void(0)" class="image"><img style="height: 230px;" class="pic-1" alt="product-image-1" src="'.$imgLoc.'"></a><div class="product-link"><a href="javascript:void(0);"data-bs-target="#view_employee_modal" data-bs-toggle="modal" style="margin-left:-5px;" onclick="view_employee('.$emp['id'].')" title="Click to View Employee Details" class="miDefault"><i class="fas fa-eye"></i><span>Quick View</span></a><a href="javascript:void(0);"data-bs-target="#update_employee_modal" data-bs-toggle="modal" style="margin-left:-5px;" onclick="update_employee('.$emp['id'].')" title="Click to Update Employee Details" class="miDefault"><i class="fa fa-pencil-square-o"></i><span>Edit Details</span></a></div></div><div class="product-content"><h3 class="title"><a href="javascript:void(0);">'.$emp['name'].'<span>('.$emp['employee_id'].') </span></a></h3><div class="price"><span class="text-danger">'.$emp['designation_name'].'</span></div></div></div></div></div></div>';
						}
					}
				$return['draw'] = $empList;
				//$return['draw'] = $getResult;
                $no_of_per_page=4;
                $targetUrl=base_url('admin/employee/all_employee_data');
                $total_pages = ceil(count($getResult)/$no_of_per_page);
                $pagination =pagination(1,$total_pages,$targetUrl);
                $return['miPg']=$pagination;
            }
            //$return=array('draw'=>$getResult,'miPg'=>$pagination);
            echo json_encode($return);

        }

        public function view_employee_data() {

            $inp = $this->input->post();
            $data['employee'] = $this->employee->get_employee_data($inp['id']);
            $this->load->view('admin/employee/view_employee.php', $data);

        }

        public function update_employee() {

            $inp = $this->input->post();
            $data['department']  = $this->common->all_data('department', 'id, department_name');
            $data['designation'] = $this->common->all_data('designation', 'id, designation_name');
            $data['shift']       = $this->common->all_data('shift_manage', 'id, shift_name, shift_start, shift_end');
            $data['upd_emp'] = $this->employee->get_employee_data($inp['id']);
            $this->load->view('admin/employee/update_employee.php', $data);

        }

        public function update_employee_data() {

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
                $data = array('addClas' => 'tst_danger', 'msg' => $msg, 'icon' => '<i class="fe fe-setting bx-spin"></i>');

            }
            echo json_encode($data);

        }

    }

?>