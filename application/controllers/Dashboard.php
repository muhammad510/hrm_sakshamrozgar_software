<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
	  public function __construct()
    {
        parent::__construct();
        ($this->session->userdata('user_id')=='') ? redirect(base_url(),'refresh') : '';
	    $this->logID=$this->session->userdata['user_id'];
		$this->lgCat=$this->session->userdata['user_cate'];
	    error_reporting(0);
    }
	
	
	
	public function index()
	{
		echo $this->lgCat;exit;
		$data=array('title'=>'Dashboard Panel');
		$this->load->view('base',$data);
	}
}
