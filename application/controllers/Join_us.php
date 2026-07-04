<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Join_us extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		error_reporting(0);
	}
	public function index()
	{
		$data = array('title' => 'Contact us/Join us', 'msg' => '', 'layout' => 'join_us.php');
		$this->load->view('front_end/base', $data);
	}
}
