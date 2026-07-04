<?php defined('BASEPATH') OR exit('No direct script access allowed');
class SmsApi extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		error_reporting(0);	
		date_default_timezone_set("Asia/Calcutta"); 
	}
	public function index()
	{
		
		$post=$this->input->post();
		print_r($post);
		
		
		
		/*// Account details
		   $apiKey = urlencode('NmQ2NDZmNGU1MjZiMzA3NzUwNTY2NjQ3NjY1YTY1NGE=');
		// Message details
		   $numbers = urlencode('8789842044');
		   $sender = urlencode('CAMWLS');
		   $passw = urlencode('87654321');
		   $userId = urlencode('7643001725');
		   $message = rawurlencode('Dear distributor, we are happy to inform you that request for your distributor registration has been approved, your distributor ID is '.$userId.'" and passowrd is '.$passw.'", Team - CAMWEL SOLUTION LLP');
		// Prepare data for POST request
		   $data = 'apikey=' . $apiKey .  "&sender=" . $sender .'&numbers=' . $numbers . "&message=" . $message;
		// Send the GET request with cURL
		  
		  $resourceLoc=('https://api.textlocal.in/send/?'.$data);
		   $ch = curl_init($resourceLoc);
		   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		   curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
		   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		   $response = curl_exec($ch);
		   curl_close($ch);
		
		// Process your response here
		   echo $response;*/
		   }	
	public function sendRegister()
	{			
			$post=$this->input->post();
			// Account details
			$apiKey = urlencode('NmQ2NDZmNGU1MjZiMzA3NzUwNTY2NjQ3NjY1YTY1NGE=');		
			// Message details
			//$numbers = array($post['mobileNumber']);
			$numbers ='91'. $post['mobileNumber'];
			$sender = urlencode('CAMWLS');
			//$message=rawurlencode('Dear distributor, we are happy to inform you that request for your distributor registration has been approved, your distributor ID is '.$post['userID'].'" and passowrd is '.$post['password'].'", Team - CAMWEL SOLUTION LLP');
			$message=rawurlencode('Dear '.$post['userID'].'", please log in by '.$post['password'].'" to start your workday. Ensure your attendance is recorded. - Camwel Solution LLP');
			/*
			
			
			
			*/
			//$numbers = implode(',', $numbers);
			// Prepare data for POST request
			$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
			// Send the POST request with cURL
			$ch = curl_init('https://api.textlocal.in/send/');
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);
			curl_close($ch);
			// Process your response here
			echo $response;	
		   }
	public function sendSms()
	{
		
		$this->load->view('testing/smsMode');
		}
	public function dsnlSms()
	{
	
		ini_set('display_errors', 1);
		error_reporting(E_ALL);	
			
/*			$apiKey = urlencode('NmQ2NDZmNGU1MjZiMzA3NzUwNTY2NjQ3NjY1YTY1NGE=');
			$mobile=urlencode('919921177888');
			$numbers = urlencode($mobile);
			$sender = urlencode('CAMWLS');	*/
			
			$apiKey='NGQzNzQxNDUzMzZhNDU1ODRmMzk1NTUyNTQ0ZTc5NDQ=';
			$mobile='918789842044';
			$numbers=$mobile;
			$sender='DSNLTM';
			
			$userId='9276582798';
			$passw='96087384';	
			$message=rawurlencode('Dear distributor, we are happy to inform you that request for your distributor registration has been approved, your distributor ID is '.$userId.'" and passowrd is '.$passw.'", Team - DSNL Marketing Private Limited');
	
			
			
			//$numbers = implode(',', $numbers);
			//$data = array('apikey'=>$apiKey,'numbers'=>$numbers,"sender"=>$sender,"message"=>$message);
			$data='apikey='.$apiKey.'&sender='.$sender.'&numbers='.$numbers.'&message='.$message;
		    echo ('https://api.textlocal.in/send/?'.$data);
			
/*	

https://api.textlocal.in/send/?apikey=NGQzNzQxNDUzMzZhNDU1ODRmMzk1NTUyNTQ0ZTc5NDQ=&sender=DSNLTM&numbers=918789842044&message=Dear distributor, we are happy to inform you that request for your distributor registration has been approved, your distributor ID is 9276582798" and passowrd is 96087384". Team - DSNL Marketing Private Limited


https://api.textlocal.in/send/?apikey=NGQzNzQxNDUzMzZhNDU1ODRmMzk1NTUyNTQ0ZTc5NDQ=&sender=DSNLTM&numbers=918789842044&message=Dear Partner, we are happy to inform that request for your Service Centre has been Approved, Your user id 9276582798" and Passowrd is 96087384".Team - DSNL Marketing Private Limited

		
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);
			curl_close($ch);*/
			
			/*$ch=curl_init('https://api.textlocal.in/send/?');
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);
			curl_close($ch);*/	
			// Process your response here
			
			
			
			//echo $response;
	
	
		}
		   
		   
 	public function LogApi()
	{
	
/*


https://api.textlocal.in/send/?apikey=NmQ2NDZmNGU1MjZiMzA3NzUwNTY2NjQ3NjY1YTY1NGE=&numbers=918789842044&sender=CAMWLS&message=Dear%20distributor%2C%20we%20are%20happy%20to%20inform%20you%20that%20request%20for%20your%20distributor%20registration%20has%20been%20approved%2C%20your%20distributor%20ID%20is%207643001725%22%20and%20passowrd%20is%2087654321%22%2C%20Team%20-%20CAMWEL%20SOLUTION%20LLP



https://api.textlocal.in/send/?apiKey=NmQ2NDZmNGU1MjZiMzA3NzUwNTY2NjQ3NjY1YTY1NGE=&sender=CAMWLS&numbers=8789842044&message=Dear%20distributor,%20we%20are%20happy%20to%20inform%20you%20that%20request%20for%20your%20distributor%20registration%20has%20been%20approved,%20your%20distributor%20ID%20is%208798567534%22%20and%20password%20is%20644566%22,%20Team%20-%20CAMWEL%20SOLUTION%20LLP

https://api.textlocal.in/send/?apikey=NmQ2NDZmNGU1MjZiMzA3NzUwNTY2NjQ3NjY1YTY1NGE=&sender=CAMWLS&numbers=8789842044&message=Dear%20distributor%2C%20we%20are%20happy%20to%20inform%20you%20that%20request%20for%20your%20distributor%20registration%20has%20been%20approved%2C%20your%20distributor%20ID%20is%207643001725%22%20and%20passowrd%20is%2087654321%22%2C%20Team%20-%20CAMWEL%20SOLUTION%20LLP


*/	
/*	$encodedMessage='https://api.textlocal.in/send/?apiKey=NmQ2NDZmNGU1MjZiMzA3NzUwNTY2NjQ3NjY1YTY1NGE=&sender=CAMWLS&numbers=8789842044&message=Dear%20distributor,%20we%20are%20happy%20to%20inform%20you%20that%20request%20for%20your%20distributor%20registration%20has%20been%20approved,%20your%20distributor%20ID%20is%208798567534%22%20and%20password%20is%20644566%22,%20Team%20-%20CAMWEL%20SOLUTION%20LLP';
	
	$decodedMessage = urldecode($encodedMessage);
	print_r($decodedMessage);
	echo '<br><br>';*/
	
		// Account details
		   $apiKey = urlencode('NmQ2NDZmNGU1MjZiMzA3NzUwNTY2NjQ3NjY1YTY1NGE=');
		// Message details
		   $numbers = urlencode('8789842044');
		   $sender = urlencode('CAMWLS');
		   $passw = urlencode('87654321');
		   $userId = urlencode('7643001725');
		   $message = rawurlencode('Dear distributor, we are happy to inform you that request for your distributor registration has been approved, your distributor ID is '.$userId.'" and passowrd is '.$passw.'", Team - CAMWEL SOLUTION LLP');
		// Prepare data for POST request
		   $data = 'apikey=' . $apiKey .  "&sender=" . $sender .'&numbers=' . $numbers . "&message=" . $message;
		// Send the GET request with cURL
		  
		  $resourceLoc=('https://api.textlocal.in/send/?'.$data);
/*		  echo $resourceLoc.'<br><br>';
		  echo(urldecode($resourceLoc)).'<br><br>';*/
		   $ch = curl_init($resourceLoc);
		   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		   curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
		   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		   $response = curl_exec($ch);
		   curl_close($ch);
		
		// Process your response here
		   echo $response;
	}	
}
