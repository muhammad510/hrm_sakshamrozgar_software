<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Start extends CI_Controller {
		 public function __construct()
			{
				parent::__construct();
				error_reporting(0);
			}

	public function index()
	{
		
		$post=$this->input->post();$hasErrorMsg=array();$miPrefix='Please provide ';
		$isCheckNullArr=array("mysql host name"=>"mysqlHost","database name."=>"databaseName","database username."=>"databaseUser","database password."=>"databasePass");
		if($post){foreach($post as $key=>$list){if(!$list){$matchPost=array_search($key,$isCheckNullArr,true);array_push($hasErrorMsg,$miPrefix.$matchPost);}}}
		if($hasErrorMsg){$data=array('adClass'=>'tst_danger','msg'=>$hasErrorMsg,'icon'=>'<i class="fe fe-settings bx-spin"></i>');}
		else
		{
			$conn = new mysqli($post['mysqlHost'], $post['databaseUser'], '');
			$sql = "CREATE DATABASE ".$post['databaseName'];
			if ($conn->connect_error)
			{      
			    $msg=array("Connection failed: ".$conn->connect_error);
				$data=array('adClass'=>'tst_success','msg'=>$msg,'icon'=>'<i class="fe fe-settings bx-spin"></i>','stepUp'=>'2');
			  
			  } 
			if ($conn->query($sql) === TRUE)
			{
				$msg=array('Thank You! You have successfully create database '.$post['database'].'.');
				$data=array('adClass'=>'tst_success','msg'=>$msg,'icon'=>'<i class="ti-check-box"></i>','stepUp'=>'3');
				$this->write_db_config();
				} 
			else 
			{
					if($conn->error){$errorMsg=$conn->error;}else{$errorMsg='Error :: Connection for creating database '.$post['databaseName'];}
				    $msg=array($errorMsg);
					$data=array('adClass'=>'tst_warning','msg'=>$msg,'icon'=>'<i class="fe fe-settings bx-spin"></i>');
				 }
			$conn->close();
		/*	$msg=array('Success: Connection to '.$post['database'].' database is done successfully.');
			$data=array('adClass'=>'tst_success','msg'=>$msg,'icon'=>'<i class="ti-check-box"></i>','stepUp'=>'3');*/
		}
	echo json_encode($data);
	}
	
	
	public function create()
	{
			$post=$this->input->post();
			$hasErrorMsg=array();$miPrefix='Please provide ';
			$isCheckNullArr=array("admin user email id."=>"adminUsr","password."=>"pass","confirm password."=>"cnfPass");
			if($post){foreach($post as $key=>$list){if(!$list){$matchPost=array_search($key,$isCheckNullArr,true);array_push($hasErrorMsg,$miPrefix.$matchPost);}}}
			if($hasErrorMsg){$data=array('adClass'=>'tst_danger','msg'=>$hasErrorMsg,'icon'=>'<i class="fe fe-settings bx-spin"></i>');}
			else
			{
				   if (filter_var($post['adminUsr'], FILTER_VALIDATE_EMAIL) === false) 
				   {
				   	    $msg=array('Please provide valid administrator email id');
					    $data=array('adClass'=>'tst_warning','msg'=>$msg,'icon'=>'<i class="fe fe-settings bx-spin"></i>');
				   		} 
						else if ($post['pass']!=$post['cnfPass']) 
						{
						 	  $msg=array("Password and confirm password doesn't match");
					  		  $data=array('adClass'=>'tst_warning','msg'=>$msg,'icon'=>'<i class="fe fe-settings bx-spin"></i>');
							}
				   		else
						{
							$database = file_get_contents(APPPATH . 'controllers/install/database.sql');
							$this->load->database();
							if (mysqli_multi_query($this->db->conn_id, $database)) {
									$this->clean_up_db_query();
									$data = array(
													'employee_id' => '9000',
													'name' => 'Super Admin',
													'dob' => '2020-01-01',
													'gender' => 'Male',
													'image'=>'uploads/staff/profile/no_img.png',
													'email' => $post['adminUsr'],
													'password' =>$post['pass'],
													'is_active' => 1
												);
									$this->db->insert('staff', $data);
									$insert_id = $this->db->insert_id();
									$role_data = array('staff_id' =>$insert_id,'role_id'=>7);
							        if($this->db->insert('staff_roles', $role_data)) 
									{
										 $msg=array('Thank you have successfully create admin login details');
							$data=array('adClass'=>'tst_success','msg'=>$msg,'icon'=>'<i class="ti-check-box"></i>','stepUp'=>'4');
                    					}
							}
				   		/* $msg=array('Thank you have successfully create login details');
						 $data=array('adClass'=>'tst_success','msg'=>$msg,'icon'=>'<i class="ti-check-box"></i>','stepUp'=>'4','target'=>base_url());*/
				   }
				}
			
			echo json_encode($data);
			
		}
    private function clean_up_db_query() {
        $CI = &get_instance();
        while (mysqli_more_results($CI->db->conn_id) && mysqli_next_result($CI->db->conn_id)) {
            $dummyResult = mysqli_use_result($CI->db->conn_id);
            if ($dummyResult instanceof mysqli_result) {
                mysqli_free_result($CI->db->conn_id);
            }
        }
    }
		
private function write_db_config() {
        $hostname = $this->input->post('mysqlHost');
        $database = $this->input->post('databaseName');
        $username = $this->input->post('databaseUser');
        $password = ''/*$this->input->post('databasePass')*/;
        $new_database_file = '<?php 
	 defined(\'BASEPATH\') or exit(\'No direct script access allowed\');
$query_builder = TRUE;
$active_group = \'default\';
$db[\'default\'] = array(
    \'dsn\'          => \'\',
    \'hostname\' => \'' . $hostname . '\',
    \'username\' => \'' . $username . '\',
    \'password\' => \'' . $password . '\',
    \'database\' => \'' . $database . '\',
    \'dbdriver\'     => \'mysqli\',
    \'dbprefix\'     => \'\',
    \'pconnect\'     => FALSE,
    \'db_debug\'     => (ENVIRONMENT !== \'production\'),
    \'cache_on\'     => FALSE,
    \'cachedir\'     => \'\',
    \'char_set\'     => \'utf8\',
    \'dbcollat\'     => \'utf8_general_ci\',
    \'swap_pre\'     => \'\',
    \'encrypt\'      => FALSE,
    \'compress\'     => FALSE,
    \'stricton\'     => FALSE,
    \'failover\'     => array(),
    \'save_queries\' => TRUE,
    \'multi_branch\' => FALSE,
);';
	$fp=fopen(APPPATH.'config/database.php','w+');
	if($fp){if(fwrite($fp, $new_database_file)){return true;}fclose($fp);}return false;
    }	
####---------------------For Licence Key Generator-------------------------####				
public function generateLicenceKey(){$keyPattern='9X9X-X99X-9X9X-99XX-9XX9';$k=strlen($keyPattern);$setkey='';for($i=0;$i<$k;$i++){switch($keyPattern[$i]){case 'X':$setkey.=chr(rand(65,90));break;case'9':$setkey.=rand(0,9);break;case '-':$setkey.= '-';break;}}return $setkey;}		
		
		
public function isCheckKey(){$post=$this->input->post('liKey');if($post){if(md5(base64_encode($post))==config_item('license_key')){$targetFile=APPPATH . 'config/global.php';$this->validateKey('14','$config[\'is_valid\'] = "validate";',$targetFile);$msg=array('Thank you! You have successfully activate your software.');$data=array('adClass'=>'tst_success','msg'=>$msg,'icon'=>'<i class="ti-check-box"></i>','target'=>base_url());}else{$data=array('adClass'=>'tst_warning','msg'=>array('Please input valid license key to unlock'),'icon'=>'<i class="fe fe-settings bx-spin"></i>');}}else{$data=array('adClass'=>'tst_danger','msg'=>array('Please input license key to unlock'),'icon'=>'<i class="fe fe-settings bx-spin"></i>');}sleep(3);echo json_encode($data);}		
		
private function validateKey($targetLine,$dtArray,$targetFile){$handle = fopen($targetFile, "r");$contents = fread($handle, filesize($targetFile));fclose($handle);$arrCont = explode("\n", $contents);$arrCont[$targetLine] = $dtArray;$handle = fopen($targetFile, "w+");fwrite($handle, implode("\n", $arrCont));fclose($handle);}		
		
		
}
