<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documents extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		($this->session->userdata('mim_id')== '') ? redirect(base_url(), 'refresh') : '';
		error_reporting(0);	

	}
/**********************************************************************************************************/
	public function index()
	{
	
		$data=array('layout'=>"software/official_documents.php",'title'=>'Basic Setting','breadcrumb'=>'Basic Setting');
		$this->load->view('base',$data);		
	}		

}
?>
