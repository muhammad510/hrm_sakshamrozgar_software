<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dummy extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		($this->session->userdata('mim_id')== '') ? redirect(base_url(), 'refresh') : '';
		error_reporting(0);
		
	}
	
	public function index()
	{
		$data['title']='Testing Panel';
		$data['breadcrums'] = 'Testing Panel';
		$this->load->view('employee/attendance/dummy',$data);
		
		}
}
