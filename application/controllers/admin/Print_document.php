<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Print_document extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('document'));
		($this->session->userdata('mim_id') == '') ? redirect(base_url(), 'refresh') : '';
		$this->load->model('admin/Employee_model', 'employee');
		$this->logId = $this->session->userdata('mim_id');
		$this->logName = $this->session->userdata('mi_name');
		error_reporting(0);
	}

	public function index()
	{
		$isBranch = $this->common->getDataList('branch_manage', 'status', '1');

		$data = array(
			'title' => 'Print Employee Letters',
			'breadcrums' => 'Print Employee Letters',
			'isBranch' => $isBranch,
			'offerBranch' => 'Offer Branch Letter',
			'branchFrOffer' => 'optedSelect===admin/print_document/findEmployee===joinginEmployee',
			'empFrOfrLetter' => 'ofrLtrSelect===admin/print_document/findEmployee===empDtJoining===offrSalary',
			'branchFrCnfrm' => 'optedSelect===admin/print_document/findEmployee===cnfrmEmployee',
			'branchFrForm16' => 'optedSelect===admin/print_document/findEmployee===frm16Employee',
			'branchFrWarn' => 'optedSelect===admin/print_document/findEmployee===warningEmployee',
			'branchFrPrePromo' => 'optedSelect===admin/print_document/findEmployee===preProEmployee',
			'empFrPrePromo' => 'prevSelect===admin/print_document/findEmployee===prevEmpDeparment===empPromoCtc===promoDesignation',
			'empFrPromoCtc' => 'prevDesign===admin/print_document/findDetails===empPromoCtc',
			'clickFrPromote' => 'getClickOptn===admin/print_document/findDetails===promoteEmployee',
			'clickFrWarning' => 'getClickOptn===admin/print_document/findDetails===warningEmployee',
			'clickFrNewJoining' => 'getClickOptn===admin/print_document/findDetails===joinNewEmployee',
			'layout' => "admin/documents/print_document.php"
		);
		$this->load->view('base', $data);
	}

	public function findEmployee()
	{
		$post = $this->input->post();
		$result = '';
		if ($post['actnMode'] == 'optedSelect') {

			$con = array(
				'branch_id' => $post['id'],
				// 'user_type' => '4'
			);

			$isEmployee = $this->common->all_data_con('staff', $con, '*');
			if ($isEmployee) {
				$dpList = '<option value="">Select Employee</option>';
				foreach ($isEmployee as $emp) {
					$empName = $emp['surname'] ? ($emp['surname'] . ' ' . $emp['name']) : $emp['name'];

					$dpList .= '<option value="' . $emp['employee_id'] . '">' . $empName . '(' . $emp['employee_id'] . ')</option>';
				}
				$result = $dpList;
			} else {
				$result = '<option value="">No employees available</option>';
			}
			sleep(.5);
			print_r($result);
		} else if (($post['actnMode'] == 'prevSelect') || ($post['actnMode'] == 'ofrLtrSelect')) {
			$getEmployee = $this->employee->getDetailsGenerateFrm($post['id']);
			if ($getEmployee) {
				$where = array('brID' => $getEmployee->branch_id, 'deptID' => $getEmployee->deptID, 'desgId' => $getEmployee->desgId);
				$isDesign = $this->employee->getDesignationByBranch($where);
				if ($post['actnMode'] == 'ofrLtrSelect') {
					$return = array('addClas' => 'tst_success', 'dtJoining' => date('d/m/Y', strtotime($getEmployee->date_of_joining)), 'ctc' => $getEmployee->salary_amount);
				} else {
					$return = array('addClas' => 'tst_success', 'department' => $getEmployee->department_name, 'ctc' => $getEmployee->salary_amount, 'isDesign' => $isDesign);
				}
			} else {
				$return = array('addClas' => 'tst_danger', 'msg' => array('Data unavailable. Please ensure your search parameters are correct.'), 'icon' => '<i class="pe-7s-sun bx-spin"></i>');
			}
			sleep(1);
			echo json_encode($return);
		}
		/*else if($post['actnMode']=='ofrLtrSelect')
			 	{
					$getEmployee=$this->employee->getDetailsGenerateFrm($post['id']);
					if($getEmployee)
					{
						$where=array('brID'=>$getEmployee->branch_id,'deptID'=>$getEmployee->deptID,'desgId'=>$getEmployee->desgId);
						$isDesign=$this->employee->getDesignationByBranch($where);
						$return=array('addClas'=>'tst_success','dtJoining'=>date('d/m/Y',strtotime($getEmployee->date_of_joining)),'ctc'=>$getEmployee->salary_amount);	
						}
						else{$return=array('addClas'=>'tst_danger','msg'=>array('Data unavailable. Please ensure your search parameters are correct.'), 'icon' => '<i class="pe-7s-sun bx-spin"></i>');}
						sleep(1);
						echo json_encode($return);
					}*/
	}

	public function findDetails()
	{
		$post = $this->input->post();
		if ($post['actn'] == 'warningEmployee') {
			$isCheckNullArr = array(
				"branch."            => "branch",
				"employee."          => "employeeID",
				"refrence number."   => "reportingManager",
				"regarding subject." => "regarding"
			);
			$hasErrorMsg = array();
			$miPrefix = 'Please provide valid ';
			if ($post['details']) {
				foreach ($post['details'] as $key => $list) {
					if (!$list) {
						$matchPost = array_search($key, $isCheckNullArr, true);
						array_push($hasErrorMsg, $miPrefix . $matchPost);
					}
				}
			}
			if ($hasErrorMsg) {
				$return = array(
					'addClas' => 'tst_danger',
					'msg' => $hasErrorMsg,
					'icon' => '<i class="pe-7s-sun bx-spin"></i>',
					'btnTxt' => '<i class="ti-save"></i> Create Warning Letter'
				);
			} else {
				$isEmpInfo = $this->employee->getDetailsGenerateFrm($post['details']['employeeID']);
				$empName = $isEmpInfo->surname ? ($isEmpInfo->surname . ' ' . $isEmpInfo->name) : $isEmpInfo->name;
				$empAddr = $isEmpInfo->address . '<br>' . ($isEmpInfo->district ? ($isEmpInfo->district . ' ' . $isEmpInfo->state . ' ' . $isEmpInfo->zipcode) : $isEmpInfo->zipcode);

				$where = array(
					'empName' => $empName,
					'empDesign' => $isEmpInfo->designation_name,
					'empDepart' => $isEmpInfo->department_name,
					'empAddr' => $empAddr,
					'reason' => $post['regarding'],
					'managerNm' => $this->logName,
					'refNo' => $post['details']['refNo']
				);

				$printData = warning_letter($where);

				$return = array(
					'addClas' => 'tst_success',
					'msg' => array('Thank you ! You have successfully complete personal details. '),
					'icon' => '<i class="ti-check-box"></i>',
					'btnTxt' => '<i class="ti-save"></i> Create Warning Letter',
					'printData' => $printData
				);
			}
		} else if ($post['actn'] == 'promoteEmployee') {
			$isCheckNullArr = array(
				"branch." => "branch",
				"employee." => "employeeID",
				"designation." => "designation",
				"annual ctc." => "ctc"
			);
			$hasErrorMsg = array();
			$miPrefix = 'Please provide valid ';
			if ($post['details']) {
				foreach ($post['details'] as $key => $list) {
					if (!$list) {
						$matchPost = array_search($key, $isCheckNullArr, true);
						array_push($hasErrorMsg, $miPrefix . $matchPost);
					}
				}
			}
			if ($hasErrorMsg) {
				$return = array(
					'addClas' => 'tst_danger',
					'msg' => $hasErrorMsg,
					'icon' => '<i class="pe-7s-sun bx-spin"></i>',
					'btnTxt' => '<i class="ti-save"></i> Create Warning Letter'
				);
			} else {
				$isPromotSl = $this->common->get_data('salary_master', array('branch_id' => $post['details']['branch'], 'desig_id' => $post['details']['designation']), '*');
				$isEmployee = $this->common->get_data('staff', array('employee_id' => $post['details']['employeeID']), 'id');
				$isExistSalary = $this->common->get_data('employee_salary_setup', array('br_id' => $post['details']['branch'], 'desig_id' => $post['details']['designation'], 'emp_id' => $isEmployee['id']), '*');
				if (!$isExistSalary) {


					$createArr = array(
						'sal_mstr_id'         => $isPromotSl['id'],
						'emp_id'              => $isEmployee['id'],
						'br_id'               => $post['details']['branch'],
						'desig_id'            => $post['details']['designation'],
						'gross_sal_amt'       => $isPromotSl['gross_sal_amt'],
						'basic_sal'           => $isPromotSl['basic_amt'],
						'hraAmt'              => (($isPromotSl['basic_amt'] * $isPromotSl['hra_percent']) / 100),
						'taAmt'               => (($isPromotSl['basic_amt'] * $isPromotSl['ta_percent']) / 100),
						'daAmt'               => (($isPromotSl['basic_amt'] * $isPromotSl['da_percent']) / 100),
						'paAmt'               => (($isPromotSl['basic_amt'] * $isPromotSl['pa_percent']) / 100),
						'bonus'               => $isPromotSl['bonus'],
						'medical'             => (($isPromotSl['basic_amt'] * $isPromotSl['medical_percent']) / 100),
						'insentive'           => $isPromotSl['incentive'],
						'otherInc'            => $isPromotSl['other_inc'],
						'pfAmt'               => (($isPromotSl['basic_amt'] * $isPromotSl['tds_percent']) / 100),
						'tdsAmt'              => (($isPromotSl['gross_sal_amt'] * $isPromotSl['tds_percent']) / 100),
						'insurance'           => $isPromotSl['insurance_amt'],
						'otherInc'            => $isPromotSl['other_deduction'],
						'advance'             => $isPromotSl['advance_amt'],
						'net_payble'          => $isPromotSl['net_payble_amt'],
						'created_by'          => $this->logId,
						'created_date'        => date('Y-m-d H:i:s')
					);
					$isCurrentSal = $this->common->save_data('employee_salary_setup', $createArr);
					if ($isCurrentSal) {
						$salryUpArr = array(
							'salary_id' => $isCurrentSal,
							'salary_amount' => $isPromotSl['net_payble_amt']
						);
						if ($this->common->update_data('staff', array('id' => $isEmployee['id']), $changeArr)) {
							$return = array(
								'addClas' => 'tst_success',
								'msg' => array('Salary details added successfully!'),
								'icon' => '<i class="ti-check-box"></i>'
							);
						} else {
							$return = array(
								'addClas' => 'tst_warning',
								'msg' => array('Oops there is an error while updating salary details!'),
								'icon' => '<i class="fe fe-settings bx-spin"></i>'
							);
						}
					} else {
						$return = array(
							'addClas' => 'tst_warning',
							'msg' => array('Oops there is an error while creating!'),
							'icon' => '<i class="fe fe-settings bx-spin"></i>'
						);
					}
				} else {
					$changeArr = array(
						'sal_mstr_id'          => $isPromotSl['id'],
						'emp_id'               => $isEmployee['id'],
						'br_id'                => $post['details']['branch'],
						'desig_id'             => $post['details']['designation'],
						'gross_sal_amt'        => $isPromotSl['gross_sal_amt'],
						'basic_sal'            => $isPromotSl['basic_amt'],
						'hraAmt'               => (($isPromotSl['basic_amt'] * $isPromotSl['hra_percent']) / 100),
						'taAmt'                => (($isPromotSl['basic_amt'] * $isPromotSl['ta_percent']) / 100),
						'daAmt'                => (($isPromotSl['basic_amt'] * $isPromotSl['da_percent']) / 100),
						'paAmt'                => (($isPromotSl['basic_amt'] * $isPromotSl['pa_percent']) / 100),
						'bonus'                => $isPromotSl['bonus'],
						'medical'              => (($isPromotSl['basic_amt'] * $isPromotSl['medical_percent']) / 100),
						'insentive'            => $isPromotSl['incentive'],
						'otherInc'             => $isPromotSl['other_inc'],
						'pfAmt'                => (($isPromotSl['basic_amt'] * $isPromotSl['tds_percent']) / 100),
						'tdsAmt'               => (($isPromotSl['gross_sal_amt'] * $isPromotSl['tds_percent']) / 100),
						'insurance'            => $isPromotSl['insurance_amt'],
						'otherInc'             => $isPromotSl['other_deduction'],
						'advance'              => $isPromotSl['advance_amt'],
						'net_payble'           => $isPromotSl['net_payble_amt'],
						'modify_id'            => $this->logId,
						'modify_date'          => date('Y-m-d H:i:s')
					);
					$result = $this->common->update_data('employee_salary_setup', array('id' => $isExistSalary['id']), $changeArr);
					if ($result) {
						$salryUpArr = array(
							'salary_id' => $isExistSalary['id'],
							'salary_amount' => $isPromotSl['net_payble_amt']
						);
						if ($this->common->update_data('staff', array('id' => $isEmployee['id']), $salryUpArr)) {
							$return = array(
								'addClas' => 'tst_success',
								'msg' => array('Thank you! You have successfully updated salary details!'),
								'icon' => '<i class="ti-check-box"></i>'
							);
						} else {
							$return = array(
								'addClas' => 'tst_warning',
								'msg' => array('Oops there is an error while updating salary details!'),
								'icon' => '<i class="fe fe-settings bx-spin"></i>'
							);
						}
					} else {
						$return = array(
							'addClas' => 'tst_warning',
							'msg' => array('Oops there is an error while updating!'),
							'icon' => '<i class="fe fe-settings bx-spin"></i>'
						);
					}
				}
			}

			///$return=array('addClas'=>'tst_danger','msg'=>array('Oops it seems there is no valid response.'), 'icon' => '<i class="pe-7s-sun bx-spin"></i>');
		} else if ($post['actn'] == 'prevDesign') {
			$isPromotedSal = $this->common->get_data('salary_master', array('branch_id' => $post['br_id'], 'desig_id' => $post['id']), '*');
			$ctc = $isPromotedSal ? $isPromotedSal['net_payble_amt'] : '0';
			$return = array('addClas' => 'tst_success', 'ctcEmp' => $ctc);
		} else if ($post['actn'] == 'joinNewEmployee') {
			$isCheckNullArr = array(
				"branch" => "branch",
				"employee" => "employeeID",
				"date of joining" => "dtJoining",
				"annual ctc" => "ctc"
			);
			$hasErrorMsg = array();
			$miPrefix = 'Please provide valid ';
			if ($post['details']) {
				foreach ($post['details'] as $key => $list) {
					if (!$list) {
						$matchPost = array_search($key, $isCheckNullArr, true);
						array_push($hasErrorMsg, $miPrefix . $matchPost . ' for offer letter.');
					}
				}
			}
			if ($hasErrorMsg) {
				$return = array('addClas' => 'tst_danger', 'msg' => $hasErrorMsg, 'icon' => '<i class="pe-7s-sun bx-spin"></i>', 'btnTxt' => '<i class="ti-save"></i> Create Warning Letter');
			} else {
				$getEmpDet = $this->employee->getDetailsGenerateFrm($post['details']['employeeID']);
				$isPromotedSal = $this->common->get_data('salary_master', array('branch_id' => $getEmpDet->branch_id, 'desig_id' => $getEmpDet->desgId), '*');
				$isIndvdul = $this->common->get_data('employee_salary_setup', array('sal_mstr_id' => $isPromotedSal['id'], 'emp_id' => $getEmpDet->id, 'br_id' => $getEmpDet->branch_id, 'desig_id' => $getEmpDet->desgId), '*');
				if ($isIndvdul) {
					$empBasic = $isIndvdul['basic_sal'];
					$empHRA = $isIndvdul['hraAmt'];
					$empTA = $isIndvdul['taAmt'];
					$empPA = $isIndvdul['paAmt'];
					$empEA = $isIndvdul['daAmt'];
					$empBonus = $isIndvdul['bonus'];
					$empSpcialA = $isIndvdul['medical'];
					$empGross = $isIndvdul['gross_sal_amt'];
					$empPF = $isIndvdul['pfAmt'];
					$empPTA = $isIndvdul['othrDeduction'];
					$empESIC = '0';
					$empLoyerESIC = '0';
					$netPay = $isIndvdul['net_payble'];
					$ctc = $isIndvdul ? $isIndvdul['net_payble'] : '0';
				} else {
					$empBasic = $isPromotedSal['basic_amt'];
					$empHRA = (($isPromotedSal['basic_amt'] * $isPromotedSal['hra_percent']) / 100);
					$empTA = (($isPromotedSal['basic_amt'] * $isPromotedSal['ta_percent']) / 100);
					$empPA = (($isPromotedSal['basic_amt'] * $isPromotedSal['pa_percent']) / 100);
					$empEA = (($isPromotedSal['basic_amt'] * $isPromotedSal['da_percent']) / 100);
					$empBonus = $isPromotedSal['bonus'];
					$empSpcialA = (($isPromotedSal['basic_amt'] * $isPromotedSal['medical_percent']) / 100);
					$empGross = $isPromotedSal['gross_sal_amt'];
					$empPF = (($isPromotedSal['basic_amt'] * $isPromotedSal['pf_percent']) / 100);
					$empPTA = $isPromotedSal['other_deduction'];
					$empESIC = '0';
					$empLoyerESIC = '0';
					$netPay = $isPromotedSal['net_payble_amt'];
					$ctc = $isPromotedSal ? $isPromotedSal['net_payble_amt'] : '0';
				}
				$where = array(
					'jobReqNo'      => 'ASU_AAPL_' . (date('y') - 1) . '-' . date('y'),
					'empCode'       => $getEmpDet->employee_id,
					'empName'       => $getEmpDet->name,
					'empAddr'       => $getEmpDet->address,
					'distState'     => $getEmpDet->district . ',' . $getEmpDet->state,
					'zipcode'       => $getEmpDet->zipcode,
					'empJoining'    => $post['details']['dtJoining'],
					'designation'   => $getEmpDet->designation_name,
					'department'    => $getEmpDet->department_name,
					'branchNm'      => $getEmpDet->branch_name,
					'empBasic'      => $empBasic,
					'empHRA'        => $empHRA,
					'empTA'         => $empTA,
					'empPA'         => $empPA,
					'empEA'         => $empEA,
					'empBonus'      => $empBonus,
					'empSpcialA'    => $empSpcialA,
					'empGross'      => $empGross,
					'empPF'         => $empPF,
					'empPTA'        => $empPTA,
					'empESIC'       => '0',
					'empLoyerESIC'  => '0',
					'netPay'        => $netPay,
					'empCTC'        => $ctc,
					'empCTCWord'    => $this->common->getIndianCurrency($ctc)
				);
				$printData = offer_letter($where);
				$return = array(
					'addClas' => 'tst_success',
					'msg' => array('Thank you ! You have successfully complete personal details. '),
					'icon' => '<i class="ti-check-box"></i>',
					'btnTxt' => '<i class="ti-save"></i> Create Offer Letter',
					'targetLink' => 'download===' . base_url('admin/print_document/download/' . urlencode(base64_encode(json_encode($post['details'])))),
					'printData' => $printData
				);
			}
		} else {
			$return = array(
				'addClas' => 'tst_danger',
				'msg' => array('Oops it seems there is no valid response.'),
				'icon' => '<i class="pe-7s-sun bx-spin"></i>'
			);
		}
		sleep(1);
		echo json_encode($return);
	}

	public function download($whereCon)
	{
		$whereCon = json_decode(base64_decode(urldecode($whereCon)));
		$getEmpDet = $this->employee->getDetailsGenerateFrm($whereCon->employeeID);
		$isPromotedSal = $this->common->get_data('salary_master', array('branch_id' => $getEmpDet->branch_id, 'desig_id' => $getEmpDet->desgId), '*');
		$isIndvdul = $this->common->get_data('employee_salary_setup', array('sal_mstr_id' => $isPromotedSal['id'], 'emp_id' => $getEmpDet->id, 'br_id' => $getEmpDet->branch_id, 'desig_id' => $getEmpDet->desgId), '*');
		if ($isIndvdul) {
			$empBasic = $isIndvdul['basic_sal'];
			$empHRA = $isIndvdul['hraAmt'];
			$empTA = $isIndvdul['taAmt'];
			$empPA = $isIndvdul['paAmt'];
			$empEA = $isIndvdul['daAmt'];
			$empBonus = $isIndvdul['bonus'];
			$empSpcialA = $isIndvdul['medical'];
			$empGross = $isIndvdul['gross_sal_amt'];
			$empPF = $isIndvdul['pfAmt'];
			$empPTA = $isIndvdul['othrDeduction'];
			$empESIC = '0';
			$empLoyerESIC = '0';
			$netPay = $isIndvdul['net_payble'];
			$ctc = $isIndvdul ? $isIndvdul['net_payble'] : '0';
		} else {
			$empBasic = $isPromotedSal['basic_amt'];
			$empHRA = (($isPromotedSal['basic_amt'] * $isPromotedSal['hra_percent']) / 100);
			$empTA = (($isPromotedSal['basic_amt'] * $isPromotedSal['ta_percent']) / 100);
			$empPA = (($isPromotedSal['basic_amt'] * $isPromotedSal['pa_percent']) / 100);
			$empEA = (($isPromotedSal['basic_amt'] * $isPromotedSal['da_percent']) / 100);
			$empBonus = $isPromotedSal['bonus'];
			$empSpcialA = (($isPromotedSal['basic_amt'] * $isPromotedSal['medical_percent']) / 100);
			$empGross = $isPromotedSal['gross_sal_amt'];
			$empPF = (($isPromotedSal['basic_amt'] * $isPromotedSal['pf_percent']) / 100);
			$empPTA = $isPromotedSal['other_deduction'];
			$empESIC = '0';
			$empLoyerESIC = '0';
			$netPay = $isPromotedSal['net_payble_amt'];
			$ctc = $isPromotedSal ? $isPromotedSal['net_payble_amt'] : '0';
		}
		$where = array(
			'jobReqNo' => 'ASU_AAPL_' . (date('y') - 1) . '-' . date('y'),
			'empCode' => $getEmpDet->employee_id,
			'empName' => $getEmpDet->name,
			'empAddr' => $getEmpDet->address,
			'distState' => $getEmpDet->district . ',' . $getEmpDet->state,
			'zipcode' => $getEmpDet->zipcode,
			'empJoining' => $whereCon->dtJoining,
			'designation' => $getEmpDet->designation_name,
			'department' => $getEmpDet->department_name,
			'branchNm' => $getEmpDet->branch_name,
			'empBasic' => $empBasic,
			'empHRA' => $empHRA,
			'empTA' => $empTA,
			'empPA' => $empPA,
			'empEA' => $empEA,
			'empBonus' => $empBonus,
			'empSpcialA' => $empSpcialA,
			'empGross' => $empGross,
			'empPF' => $empPF,
			'empPTA' => $empPTA,
			'empESIC' => '0',
			'empLoyerESIC' => '0',
			'netPay' => $netPay,
			'empCTC' => $ctc,
			'empCTCWord' => $this->common->getIndianCurrency($ctc)
		);
		$printData = offer_letter($where);
		$data = array('title' => 'Offer Letter', 'breadcrums' => 'Offer Letter', 'printData' => $printData, 'docSaveNm' => 'Offer-letter-' . $getEmpDet->employee_id . (date('y') - 1) . '-' . date('y'));
		$this->load->view('admin/documents/download', $data);
	}
}
