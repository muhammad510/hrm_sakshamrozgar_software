<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		$this->load->model('setting/login_model', 'login');
		$this->load->library('form_validation');
		$this->load->library('user_agent');
		error_reporting(0);
	}

	public function index()
	{

		$post = $this->input->post();
		$hasErrorMsg = array();
		$miPrefix = 'Please input ';
		$isCheckNullArr = array("user email id." => "emailID", "password." => "usrPass");
		if ($post) {
			foreach ($post as $key => $list) {
				if (!$list) {
					$matchPost = array_search($key, $isCheckNullArr, true);
					array_push($hasErrorMsg, $miPrefix . $matchPost);
				}
			}
		}
		if ($hasErrorMsg) {
			$data = array(
				'adClass' => 'tst_danger',
				'msg' => $hasErrorMsg,
				'icon' => '<i class="fe fe-settings bx-spin"></i>'
			);
		} else {
			if (filter_var($post['emailID'], FILTER_VALIDATE_EMAIL) === false) {
				$msg = array('Please input valid user email id');
				$data = array('adClass' => 'tst_warning', 'msg' => $msg, 'icon' => '<i class="fe fe-settings bx-spin"></i>');
			} else {
				$result = $this->login->isValidate($post['emailID'], $post['usrPass']);
				if ($result) {

					$system_configs = $this->login->system_config();
					$this->setUserLog($result->id, $result->user_type);
					$sessiondata = array(
						'_USR_AGENT' => $_SERVER['HTTP_USER_AGENT'],
						'_USR_ACCEPT' => $_SERVER['HTTP_ACCEPT'],
						'_USR_ACCEPT_ENCODING' => $_SERVER['HTTP_ACCEPT_ENCODING'],
						'_USR_ACCEPT_LANG' => $_SERVER['HTTP_ACCEPT_LANGUAGE'],
						'_USR_LOOSE_IP' => long2ip(ip2long($_SERVER['REMOTE_ADDR']) & ip2long("255.255.0.0")),
						'RPO_SESSION' => TRUE,
						'SESSION_START_TIME' => time(),
						'_USER_LAST_ACTIVITY' => time(),
						'mim_id' => $result->id,
						'memCode' => $result->memCode,
						'mi_name' => $result->surname . ' ' . $result->name,
						'mi_email' => $result->email,
						'mi_brID' => $result->branch_id,
						'user_cate' => $result->user_type,
						'mi_image' => $result->image,
						'mi_role' => $result->role,
						'mi_company_name' => $system_configs[0]['company_name'],
						'mi_company_address' => $system_configs[0]['company_address'],
						'mi_company_url' => $system_configs[0]['company_url'],
						'system_session_timeout' => $system_configs[0]['session_timeout'],
						'system_inactive_timeout' => $system_configs[0]['inactive_timeout'],
						'system_max_filesize' => $system_configs[0]['max_file_size'],
						'system_allowed_file_types' => $system_configs[0]['allowed_file_types'],
						'system_error_reporting' => $system_configs[0]['error_reporting'],
						'is_logged_in' => true
					);
					/*echo '<pre>';
					print_r($result);//	print_r($sessiondata);
					echo '</pre>';
					exit;*/
					$this->session->set_userdata($sessiondata);
					//sleep(.5);

					$msg = array('Thank you have successfully logged in.');
					if ($sessiondata['mim_id'] != '' && ($sessiondata['user_cate'] == 1)) {
						$data = array(
							'adClass' => 'tst_success',
							'msg' => $msg,
							'icon' => '<i class="ti-check-box"></i>',
							'target' => base_url('staff/dashboard')
						);
					} elseif ($sessiondata['mim_id'] != '' && ($sessiondata['user_cate'] == 2)) {
						$data = array(
							'adClass' => 'tst_success',
							'msg' => $msg,
							'icon' => '<i class="ti-check-box"></i>',
							'target' => base_url('staff/dashboard')
						);
					} elseif ($sessiondata['mim_id'] != '' && ($sessiondata['user_cate'] == 3)) {
						$data = array(
							'adClass' => 'tst_success',
							'msg' => $msg,
							'icon' => '<i class="ti-check-box"></i>',
							'target' => base_url('staff/dashboard')
						);
					} elseif ($sessiondata['mim_id'] != '' && ($sessiondata['user_cate'] == 4)) {
						$data = array(
							'adClass' => 'tst_success',
							'msg' => $msg,
							'icon' => '<i class="ti-check-box"></i>',
							'target' => base_url('employee/dashboard')
						);
					} elseif ($sessiondata['mim_id'] != '' && ($sessiondata['user_cate'] == 5)) {
						$data = array(
							'adClass' => 'tst_success',
							'msg' => $msg,
							'icon' => '<i class="ti-check-box"></i>',
							'target' => base_url('staff/dashboard')
						);
					}
				} else {
					$msg = array('Invalid Login Details!! Please Check Username, Password');
					$data = array(
						'adClass' => 'tst_danger',
						'msg' => $msg,
						'icon' => '<i class="fe fe-settings bx-spin"></i>'
					);
				}
			}
		}
		echo json_encode($data);
	}

	function signout()
	{
		$sessiondata = array(
			'_USR_AGENT' => '',
			'_USR_ACCEPT' => '',
			'_USR_ACCEPT_ENCODING' => '',
			'_USR_ACCEPT_LANG' => '',
			'_USR_LOOSE_IP' => '',
			'RPO_SESSION' => false,
			'SESSION_START_TIME' => '',
			'_USER_LAST_ACTIVITY' => '',
			'mim_id' => '',
			'mi_name' => '',
			'mi_email' => '',
			'user_cate' => '',
			'mi_photo' => '',
			'mi_company_name' => '',
			'mi_company_address' => '',
			'mi_company_url' => '',
			'system_session_timeout' => '',
			'system_inactive_timeout' => '',
			'system_max_filesize' => '',
			'system_allowed_file_types' => '',
			'system_error_reporting' => '',
			'is_logged_in' => false
		);
		$this->session->sess_destroy($sessiondata);
		redirect(base_url());
	}
	public function setUserLog($username, $role)
	{
		if ($this->agent->is_browser()) {
			$agent = $this->agent->browser() . ' ' . $this->agent->version();
		} elseif ($this->agent->is_robot()) {
			$agent = $this->agent->robot();
		} elseif ($this->agent->is_mobile()) {
			$agent = $this->agent->mobile();
		} else {
			$agent = 'Unidentified User Agent';
		}
		$data = array('user_id' => $username, 'role' => $role, 'user_type' => $role, 'ipaddress' => $this->input->ip_address(), 'user_agent' => $agent . ", " . $this->agent->platform());
		//echo"<pre>";print_r($data);die;
		$this->login->log_add($data);
	}
}
