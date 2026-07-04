<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
class Tracking extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('admin/Tracking_model'=>'tracking','admin/Employee_model'=>'employee'));
        ($this->session->userdata('mim_id')== '')?redirect(base_url(), 'refresh') : '';
	    $this->logID=$this->session->userdata('mim_id');
        error_reporting(0);	
	}
   public function index()
   {
		$data=array('title'=>'Live Tracking','breadcrumb'=>'Live Tracking','layout'=>"admin/tracking/manage.php","trackingType"=>"daily",
					"traceUrl"=>base_url('admin/tracking/findDetails'),'frSearchEmplyee'=>base_url('admin/tracking/getEmployee'));
		$this->load->view('base',$data);
	}	 
    public function history()
   {
		$data=array('title'=>'Tracking Report','breadcrumb'=>'Tracking Report','layout'=>"admin/tracking/manage.php","trackingType"=>"history","traceUrl"=>base_url('admin/tracking/findDetails'),'frSearchEmplyee'=>base_url('admin/tracking/getEmployee'));
		$this->load->view('base',$data);
	}	
	public function findDetails()
	{
	
		$this->form_validation->set_rules('employeeDet','Employee Name/ID', 'trim|required|xss_clean');
		if($this->form_validation->run() == TRUE)
		{
			$post=$this->input->post();
			$getEmployee=$this->employee->get_detail($post['empSrchdID']);
			
			if($post['empOprMode']=='history')
			{
				$fromMnthYr=$post['year'].'-'.$post['month'];
				$endDate=$fromMnthYr.'-'.date('t',strtotime($fromMnthYr));
				
/*
INSERT INTO location_tracking_history (staff_id, create_date, tracking_info,start_duration,end_duration)
SELECT staff_id,create_date,CONCAT('[', GROUP_CONCAT(CONCAT('{"lat":"', TRIM(SUBSTRING_INDEX(location, ',', 1)),'","lng":"', TRIM(SUBSTRING_INDEX(location, ',', -1)),'"}')),']') AS location_json, MIN(timing) AS start_duration,MAX(timing) AS end_duration  
FROM location_tracking_dailyWHERE staff_id = '5' AND create_date = '2025-05-01'GROUP BY staff_id, create_date

*/
				$whereCon=array('staff_id'=>$post['empSrchdID'],'create_date >='=>$fromMnthYr.'-01','create_date <='=>$endDate);
				$getTraceHistory=$this->common->all_data_con('location_tracking_history',$whereCon,'id,create_date,start_duration,end_duration');
				$inLoc='<table class="locHistory"><thead><tr><th>Sr. No.</th><th>Date</th><th>Start Duration</th><th>End Duration</th><th>Map</th></tr></thead><tbody>';
				if($getTraceHistory)
				{
					$cnt=0;
					foreach($getTraceHistory as $list)
					{
					    $cnt++;
						$targetUrl='findLocationDetails===admin/tracking/getEmployee==='.$list['id'];
						$inLoc.='<tr><th>'.$cnt.'.</th><td>'.date('d M Y',strtotime($list['create_date'])).'</td><td>'.date('h:i:s a',strtotime($list['start_duration'])).'</td><td>'.date('h:i:s a',strtotime($list['end_duration'])).'</td><td><span class="viewHistoryLoc getAction" data-id="'.$targetUrl.'"><i class="si si-eye"></i></span></td></tr>';
						}
					}
					else{$inLoc.='<tr><td colspan="5" style="color:#cc6f00;text-align: center;background-color:antiquewhite;"><i class="si si-exclamation"></i> Unfortunately, there are no records available.</td></tr>';}
					$inLoc.='</tbody></table><div id="viewLocHistory"><div id="trackDate">03/02/2025</div><div id="trackHistoryRecord"></div></div>';
				}
			else
			{
				$getLocation=$this->tracking->findLocationDetails($post['empSrchdID']);
				$inLoc=($getLocation?$getLocation:"unTrace");
				}
			$msg=array('Details found successfully!');
			$details='<div class="row">
						<div class="col-md-12"><div class="titleHead">Employee Location History Report</div></div>
						<div class="col-md-4">
							<div class="empDetail_s">
								<div class="profile-pic"> 
									<img src="'.base_url(($getEmployee->image?$getEmployee->image:"uploads/employee/no_img.png")).'" class="rounded-circle" alt="user"> 
								    <h5 class="mt-3 mb-0 fw-medium text-dark">'.($getEmployee->employee_name?$getEmployee->employee_name:"N/A").'</h5>
									<h6 class="mt-3 mb-0 fw-medium">'.($getEmployee->employee_id?$getEmployee->employee_id:"N/A").'</h6>
								</div>
								<ul>
									<li>Branch <span>'.($getEmployee->branch_name?$getEmployee->branch_name:"N/A").'</span></li>
									<li>Department <span>'.($getEmployee->department_name?$getEmployee->department_name:"N/A").'</span></li>
									<li>Designation <span>'.($getEmployee->designation_name?$getEmployee->designation_name:"N/A").'</span></li>
									<li>Email Id <span>'.($getEmployee->email?$getEmployee->email:"N/A").'</span></li>
									<li>Contact Number <span>+91 '.($getEmployee->mobile_nu?$getEmployee->mobile_nu:"N/A").'</span></li>
								</ul>
							</div>
						</div>
						<div class="col-md-8"><div class="empTraceHistory" id="traceMap">This is the last trading company here to show details.</div><div class="distance-box" id="distanceBox">Calculating route...</div></div>
					</div>';
				$return=array('addClas'=>'tst_success','msg'=>$msg,'icon'=>'<i class="ti-check-box"></i>','details'=>$details,'inLoc'=>$inLoc,'traceTyp'=>$post['empOprMode']);
			}
		else
		{
			//$msg=array("Sorry, we couldn't retrieve the details.","Please try again later");
			$msg=array('employeeDet'=>form_error('employeeDet'));
			$return=array('addClas'=>'tst_danger','msg'=>$msg,'icon'=>'<i class="fe fe-sun bx-spin"></i>');
			}
		echo json_encode($return);
		}
	public function getEmployee()
	{
		$post=$this->input->post();
		if($post['oprType'])
		{
			$empDetail=$this->tracking->findEmployeeByNmID($post['oprType']);
			if($empDetail)
			{
				foreach($empDetail as $emp)
				{
					$fndData='findEmployee===admin/attendance/by_user/setEmployeeFrAttendance==='.$emp->id;
					$empNm=(strlen($emp->name) > 15)?(substr($emp->name, 0,20).' ...'):$emp->name;
					echo '<li class="getAction" data-id="'.$fndData.'"><i class="si si-user"></i> '.$empNm.' <span>('.$emp->employee_id.')</span></li>';
					}
				}
				else{echo '<li class="miNoEmp"><i class="si si-user"></i> No employee available</li>';}
			}
		else if($post['actMode']=="viewDateWise")
		{
			$traceHistory=$this->common->getRowData('location_tracking_history','id',$post['id']);
			if($traceHistory)
			{
				$msg=array('Details found successfully!');
				$return=array('addClas'=>'tst_success','msg'=>$msg,'icon'=>'<i class="ti-check-box"></i>',
							  'trackingDt'=>'Tracking Date : <span>'.date('d-m-Y',strtotime($traceHistory->create_date)).'</span> <span class="backView"> <i class="fe fe-arrow-left"></i></span>',
							  'inLoc'=>json_decode($traceHistory->tracking_info,true));
				}
				else{$return=array('addClas'=>'tst_danger','msg'=>array("Unfortunately, there are no records available."),'icon'=>'<i class="fe fe-sun bx-spin"></i>');}
				//print_r($return);
				  echo json_encode($return);
			}	
		else{echo '<li class="miNoEmp"><i class="si si-user"></i> Please input employee details.</li>';}	
		}
}
