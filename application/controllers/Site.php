<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Site extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		error_reporting(0);
	}

	public function index()
	{


		if ($this->db->database) {
			$data['title'] = 'Attendance Management System';
			$data['breadcrums'] = 'Attendance Management System';
			$data['target'] = base_url('auth/login');
			$data['targetReset'] = base_url('site/forgetPassword');

			$this->load->view('auth/login', $data);
		} else {
			$data['config_path'] = APPPATH . 'config/config.php';
			$data['title'] = 'Software Installer';
			$data['breadcrums'] = 'Software Installer';
			$this->load->view('auth/installation', $data);
		}
	}


	public function forgetPassword()
	{
		$post = $this->input->post('emailID');
		if ($post == "") {
			$msg = array('Please input registered email id');
			$data = array('adClass' => 'tst_danger', 'msg' => $msg, 'icon' => '<i class="fe fe-settings bx-spin"></i>', 'inptErr' => 'parsley-error');
		} else if (filter_var($post, FILTER_VALIDATE_EMAIL) === false) {
			$msg = array('Please input valid registered email id');
			$data = array('adClass' => 'tst_warning', 'msg' => $msg, 'icon' => '<i class="fe fe-settings bx-spin"></i>', 'inptErr' => 'parsley-warning');
		} else {

			$isCheckUser = $this->common->getRowData('staff', 'email', $post);
			if ($isCheckUser) {
				$isCheckSentRequest = $this->common->getRowData('reset_password', 'userid', $isCheckUser->id);
				if (!$isCheckSentRequest) {
					$createArr = array('userid' => $isCheckUser->id, 'created_date' => date('Y-m-d H:i:s'));
					$this->common->save_data('reset_password', $createArr);
					$msg = array('Thank you your request has been submitted.', 'Please check your mail address.');
					$data = array(
						'adClass' => 'tst_success',
						'msg' => $msg,
						'icon' => '<i class="ti-check-box"></i>',
						'target' => base_url('site/reset_password/' . urlencode(base64_encode($isCheckUser->id)))
					);
				} else {
					$msg = array('You have already sent request to reset password.', ' &nbsp;Please check your email or spam');
					$data = array('adClass' => 'tst_danger', 'msg' => $msg, 'icon' => '<i class="fe fe-settings bx-spin"></i>', 'inptErr' => 'parsley-error');
				}
			} else {
				$msg = array('The email you have entered is incorrect. Please enter the correct email');
				$data = array('adClass' => 'tst_danger', 'msg' => $msg, 'icon' => '<i class="fe fe-settings bx-spin"></i>', 'inptErr' => 'parsley-error');
			}
		}
		sleep(2);
		echo json_encode($data);
	}


	public function reset_password($id)
	{
		$post = $this->input->post();
		if ($post) {
			$isCheckUser = $this->common->getRowData('reset_password', 'userid', base64_decode(urldecode($id)));
			if ($isCheckUser) {
				$isCheckLinkExpired = date('Y-m-d H:i:s', strtotime($isCheckUser->created_date) + 86400 * 1);
				$isCurrent = date('Y-m-d H:i:s');
				if ($isCurrent < $isCheckLinkExpired) {
					if ($post['password'] == "") {
						$msg = array('Please input new password.');
						$data = array('adClass' => 'tst_danger', 'msg' => $msg, 'icon' => '<i class="fe fe-settings bx-spin"></i>', 'inptErr' => 'parsley-error');
					} else if ($post['cnfPassword'] == "") {
						$msg = array('Please input confirm password.');
						$data = array('adClass' => 'tst_danger', 'msg' => $msg, 'icon' => '<i class="fe fe-settings bx-spin"></i>', 'inptErr' => 'parsley-error');
					} else if ($post['password'] != $post['cnfPassword']) {
						$msg = array('Oops confirm password is not match with new password.');
						$data = array('adClass' => 'tst_danger', 'msg' => $msg, 'icon' => '<i class="fe fe-settings bx-spin"></i>', 'inptErr' => 'parsley-error');
					} else {
						$updateArr = array('password' => md5($post['password']), 'show_pass' => $post['password']);
						$wherCon = array('id' => base64_decode(urldecode($id)));
						$isResult = $this->common->update_data('staff', $wherCon, $updateArr);
						if ($isResult) {
							$delCon = array('userid' => base64_decode(urldecode($id)));
							$this->common->del_data_multi_con('reset_password', $delCon);
							$msg = array('Thank you! You havesuccessfully changed your password.', ' &nbsp;Now enjoy to new journey for sign in.');
							$data = array('adClass' => 'tst_success', 'msg' => $msg, 'icon' => '<i class="ti-check-box"></i>', 'target' => base_url());
						} else {
							$msg = array('Oops it seems something went wrong please refresh.');
							$data = array('adClass' => 'tst_danger', 'msg' => $msg, 'icon' => '<i class="fe fe-settings bx-spin"></i>', 'inptErr' => 'parsley-error');
						}
					}
				} else {
					$msg = array('Oops it seems your reset password link is expired.', 'Please regenerate new link to reset Password.');
					$data = array('adClass' => 'tst_warning', 'msg' => $msg, 'icon' => '<i class="fe fe-settings bx-spin"></i>', 'inptErr' => 'parsley-warning');
				}
			} else {
				$msg = array('Oops it seems your reset password link is expired.');
				$data = array('adClass' => 'tst_warning', 'msg' => $msg, 'icon' => '<i class="fe fe-settings bx-spin"></i>', 'inptErr' => 'parsley-warning');
			}
			sleep(3);
			echo json_encode($data);
		} else {
			//echo 'Reset password =='.base64_decode(urldecode($id));
			$data['title'] = 'Create New Password';
			$data['target'] = base_url('site/reset_password/' . $id);
			$this->load->view('auth/create_password', $data);
		}
	}

	public function ecommerce()
	{
		//echo'hello';
		$data['layout'] = "ecomerce/home.php";
		$data['title'] = 'Dashboard Panel';
		$data['breadcrums'] = 'Dashboard Panel';
		$this->load->view('base', $data);
	}
}
