<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public function __construct()
    {
         parent::__construct();
         error_reporting(0);
     }
	public function index()
	{
		$data=array('title'=>'Home','msg'=>'');
		$this->load->view('front_end/base',$data);
	}
	
}
