<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->load->model('setting/Shift_model', 'shift');
		($this->session->userdata('mim_id') == '') ? redirect(base_url(), 'refresh') : '';
		error_reporting(0);
	}
	/**********************************************************************************************************/
	public function basic()
	{
		$data['account'] = $this->common->getDataList('account_manage', 'company_id', '1');
		$data['getState'] = $this->common->getDataList('states_cities', 'parent_id', '729');
		$data['getDistrict'] = $this->common->getDataList('states_cities', 'parent_id', config_item('get_state'));
		$data['layout'] = "software/basic.php";
		$data['title'] = 'Basic Setting';
		$data['breadcrums'] = 'Basic Setting';
		$this->load->view('base', $data);
	}
	public function basic_data()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('owner_name', 'Owner Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|xss_clean|min_length[10]');
			$this->form_validation->set_rules('email', 'Email ID', 'trim|required|xss_clean|valid_email');
			$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('get_state', 'Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('district', 'Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('zipCode', 'Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('cPanNu', 'Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('compUrl', 'Address', 'trim|required|xss_clean');
			if ($this->form_validation->run() == TRUE) {
				$post = $this->input->post();
				/*print_r($post);
				exit;
				*/
				if ($post) {
					$targetFile = APPPATH . 'config/global.php';
					$this->validateKey('3', '    $config[\'owner_name\'] = "' . $post['owner_name'] . '";', $targetFile);
					$this->validateKey('4', '    $config[\'company_name\'] = "' . $post['company_name'] . '";', $targetFile);
					$this->validateKey('6', '    $config[\'mobile_number\'] = "' . $post['mobile'] . '";', $targetFile);
					$this->validateKey('7', '    $config[\'email\'] = "' . $post['email'] . '";', $targetFile);
					$this->validateKey('8', '    $config[\'address\'] = "' . $post['address'] . '";', $targetFile);

					$this->validateKey('19', '    $config[\'get_state\'] = "' . $post['get_state'] . '";', $targetFile);
					$this->validateKey('20', '    $config[\'district\'] = "' . $post['district'] . '";', $targetFile);
					$this->validateKey('21', '    $config[\'zipCode\'] = "' . $post['zipCode'] . '";', $targetFile);
					$this->validateKey('22', '    $config[\'cRegistration\'] = "' . $post['cRegistration'] . '";', $targetFile);
					$this->validateKey('23', '    $config[\'cPanNu\'] = "' . $post['cPanNu'] . '";', $targetFile);
					$this->validateKey('24', '    $config[\'cGstNu\'] = "' . $post['cGstNu'] . '";', $targetFile);
					$this->validateKey('25', '    $config[\'compUrl\'] = "' . $post['compUrl'] . '";', $targetFile);
					sleep(2);
					$data = array('adClass' => 'tst_success', 'msg' => array('Thank You! You have successfully change details'), 'icon' => '<i class="ti-check-box"></i>');
				}
			} else {
				$msg = array(
					form_error('owner_name'),
					form_error('company_name'),
					form_error('mobile'),
					form_error('email'),
					form_error('address'),
					form_error('get_state'),
					form_error('district'),
					form_error('zipCode'),
					form_error('cPanNu'),
					form_error('compUrl')
				);
				$data = array('adClass' => 'tst_danger', 'msg' => $msg, 'icon' => '<i class="fe fe-settings bx-spin"></i>');
			}
			echo json_encode($data);
		}
	}
	private function validateKey($targetLine, $dtArray, $targetFile)
	{
		$handle = fopen($targetFile, "r");
		$contents = fread($handle, filesize($targetFile));
		fclose($handle);
		$arrCont = explode("\n", $contents);
		$arrCont[$targetLine] = $dtArray;
		$handle = fopen($targetFile, "w+");
		fwrite($handle, implode("\n", $arrCont));
		fclose($handle);
	}
	public function cityList()
	{
		$id = $this->input->post('id');
		$getCity = $this->common->getDataList('states_cities', 'parent_id', $id);
		sleep(1);
		echo '<option value=" "> Choose one </option>';
		if ($getCity) {
			foreach ($getCity as $list) {
				echo '<option value="' . $list->id . '">' . $list->state_cities . '</option>';
			}
		}
	}
	/*-----------------------------------Image Uploade Start-------------------------------------------*/
	public function upload_image($path, $img)
	{

		$config['upload_path']          = 'uploads/' . $path;
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		// $config['max_size']             = 100;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload($img)) {
			$upload_data =  $this->upload->data();
			$image_path = "uploads/" . $path . '/' . $upload_data['file_name'];

			$a = array('photo' => $image_path);

			$val = array('imgPath' => $image_path, 'icon' => 'success');
		} else {
			$val = array('imgPath' => $this->upload->display_errors(), 'icon' => 'error');
		}
		return $val;
	}
	public function delete_file($photo)
	{

		if (file_exists($photo)) {
			unlink($photo);
			$dat = array('text' => "File Deleted", "icon" => "success");
		} else {
			$dat = array('text' => "File Not Deleted", "icon" => "error");
		}
	}

	public function upload_logo()
	{
		$con = ['id' => 1];
		$var =  $this->upload_image('company', 'logo');
		if ($var['icon'] == 'success') {
			$old_logo = $this->db_model->select('logo', 'system_config', $con);

			unlink($old_logo);
			$logoName = $var['imgPath'];
			$this->db->where($con)->update('system_config', ['logo' => $logoName]);

			$data = array('adClass' => 'tst_success', 'msg' => array('Thank You! You have successfully change image'), 'icon' => '<i class="ti-check-box"></i>');
		} else {
			$error = $var['imgPath'];
			$data = array('adClass' => 'tst_danger', 'msg' => $error, 'icon' => '<i class="fe fe-settings bx-spin"></i>');
		}
		echo json_encode($data);
	}

	public function upload_favicon()
	{
		$con = ['id' => 1];
		$var =  $this->upload_image('company', 'favicon');
		if ($var['icon'] == 'success') {
			$old_logo = $this->db_model->select('favicon', 'system_config', $con);

			unlink($old_logo);
			$logoName = $var['imgPath'];
			$this->db->where($con)->update('system_config', ['favicon' => $logoName]);

			$data = array('adClass' => 'tst_success', 'msg' => array('Thank You! You have successfully change image'), 'icon' => '<i class="ti-check-box"></i>');
		} else {
			$error = $var['imgPath'];
			$data = array('adClass' => 'tst_danger', 'msg' => $error, 'icon' => '<i class="fe fe-settings bx-spin"></i>');
		}
		echo json_encode($data);
	}

	public function update_basic_data()
	{
		$data = [
			'company_name'        => $this->input->post('company_name'),
			'company_address'     => $this->input->post('address'),
			'company_url'         => $this->input->post('compUrl'),
			'phone'               => $this->input->post('mobile'),
			'email'               => $this->input->post('email'),
			'state'               => $this->input->post('get_state'),
			'district'            => $this->input->post('district'),
			'zipCode'             => $this->input->post('zipCode'),
			'cRegistration'       => $this->input->post('cRegistration'),
			'cPanNu'              => $this->input->post('cPanNu'),
			'cGstNu'              => $this->input->post('cGstNu'),
		];

		$this->db->where('id', 1)->update('system_config', $data);

		echo json_encode([
			'adClass' => 'tst_success',
			'msg'     => array('Company details updated successfully.'),
			'icon'    => '<i class="ti-check"></i>'
		]);
	}



	/*-----------------------------------Image Uploade Start-------------------------------------------*/
	/**********************************************************************************************************/
}
