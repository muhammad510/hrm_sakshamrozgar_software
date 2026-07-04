<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Attendance extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->load->helper(array('amipage'));
		$this->load->model('admin/Attendance_model', 'attendance');
		$this->load->model('admin/Attendance_report_model', 'attendance_report');
		// ==========start=================================
		# cheking today attendance taken or not if not taken then this piece of code run 
		###########################################################################
		$at_date=$this->db->select('attendance_date')->from('staff')->where('attendance_date <',date('Y-m-d'))->get()->result();  
		if($at_date)
		{
			$dat=array('attendance_date'=>NULL,'attendance_status' =>'0','log_in_time'=>NULL,'log_out_time'=>NULL,'in_location'=>NULL,'out_location'=>NULL);
			$this->common->update_data('staff',array('attendance_date <'=>date('Y-m-d')),$dat);
			}
		// =========================end=======================================
		($this->session->userdata('mim_id') == '') ? redirect(base_url(), 'refresh') : '';
		 $this->logId=$this->session->userdata('mim_id');
		 $this->logName=$this->session->userdata('mi_name');
		 error_reporting(0);
	}

	public function daily($actn=NULL)
	{
		if($actn=='viewList')
		{
			/*********************************Holidays Start*************************************/
				//$getShift=$this->common->shift();$cShift=$getShift['curntShift'];
				$cShift=NULL;
				
				$findHolidays=$this->attendance->getHolidaysDataInMonth(date('Y-m-d'));
				
				$isHolidaysSet=$this->attendance->isHolidaysDataSetInMonth(date('Y-m-d'));
				if(count($findHolidays)!=count($isHolidaysSet))
				{
					/*$getEmpList=$this->attendance->getEmployeeWithShift();		
					if($getEmpList)
					{
						foreach($getEmpList as $emp)
						{
						$createHoliday=array('employee_id'=>$emp->id,'staff_attendance_type_id'=>'4','attendance_date'=>$findHolidays->holiday_date,
											 'holiday_id'=>$findHolidays->id,'log_in_time'=>$emp->shift_start,'log_out_time'=>$emp->shift_end,'created_at'=>date('Y-m-d'));
							$empAtndncUpdt=array('attendance_status'=>'4','log_in_time'=>$emp->shift_start,'log_out_time'=>$emp->shift_end);
							$updtAttendance=$this->common->update_data('staff',array('id'=>$emp->id),$empAtndncUpdt);
							if($updtAttendance){$createAttendance=$this->common->save_data('staff_attendance',$createHoliday);}	
							}
					   }*/
					}
				/*********************************Holidays End*************************************/
				$post_data = $this->input->post();
				$record = $this->attendance->daily_attendance_list($post_data,$cShift);
				//echo $this->db->last_query();exit;echo '<br>';
				//print_r($record);die;
				$i = $post_data['start'] + 1;
				$return['data'] = array();
				foreach ($record as $row)
				{
					/*if($getAttnStatus->log_in_time=='')
					{
						$whereForHardware=array('cardNo'=>$row->biometric_id,'curDate'=>date('Y-m-d'),'order'=>'asc');
						$getFirstLogin=$this->attendance->getRowDataFromHardware($whereForHardware);				
						if($getFirstLogin)
						{	
							$whereForMarkAtndnc=array('empID'=>$row->id,'shift'=>$row->shift,'log_in'=>$getFirstLogin->PunchDatetime,'deviceNo'=>$getFirstLogin->MachineNo);
							$testMode=$this->markAttendanceByHardware($whereForMarkAtndnc);			
							}
						}*/
					$where=array('employee_id'=>$row->id,'attendance_date'=>date('Y-m-d'));
					$getAttnStatus = $this->attendance->get_attendance_last($where);
							
					
					if($getAttnStatus->staff_attendance_type_id==1){$attendance_status='<span class="badge mibdge" style="background-color:green;">Present</span>&emsp;';}
					elseif($getAttnStatus->staff_attendance_type_id==2){$attendance_status='<span class="badge mibdge" style="background-color:#CC7000;">Late</span>&emsp;';}
					elseif($getAttnStatus->staff_attendance_type_id==3){$attendance_status='<span class="badge mibdge" style="background-color:#F16D75;">Absent</span>&emsp;';} 
					elseif($getAttnStatus->staff_attendance_type_id==4){$attendance_status='<span class="badge mibdge" style="background-color:#0073d9;">Holiday</span>&emsp;';} 
					elseif ($getAttnStatus->staff_attendance_type_id==5){$attendance_status='<span class="badge mibdge" style="background-color:#D9AD03;">Half Day</span>&emsp;';} 
					elseif ($getAttnStatus->staff_attendance_type_id==6){$attendance_status='<span class="badge mibdge" style="background-color:#009EA6;">On Leave</span>&emsp;';}
					else {$attendance_status = '&emsp;';}
					if($findHolidays->holiday_date==date('Y-m-d'))
					{
						$view ='<div style="text-align:center"><a href="javascript:void(0);" style="margin:-5px 0px -5px 0px;" title="Today is holiday" class="btn ripple btn-success btn-sm"><i class="fe fe-check"></i></a></div>';
							$empAtndncUpdt=array('attendance_status'=>'4','log_in_time'=>$row->shift_start,'log_out_time'=>$row->shift_end);
							$updtAttendance=$this->common->update_data('staff',array('id'=>$row->id),$empAtndncUpdt);
							if($updtAttendance)
							{
								$attendance_status = '<span class="badge mibdge" style="background-color:#0073d9;">Holiday</span>&emsp;';
								}
						}
					else
					{
					//data-bs-target="#update_attendance_modal" data-bs-toggle="modal" 
					$dTarget='checkLogged---admin/attendance/logged_user---'.$row->id;
					$view = '<div style="text-align:center">
					<a href="javascript:void(0);" id="mkAt-'.$row->id.'" data-id="'.$dTarget.'" style="margin-left:-5px 0px -5px 0px;" data-bs-target="#veiwLoggedInOut" data-bs-toggle="modal" class="btn ripple btn-dark btn-sm getAction"><i class="ti-alarm-clock"></i></a>
					<a href="javascript:void(0);" id="mkAt'.$row->id.'" style="margin-left:-5px 0px -5px 0px;"  onclick="update_attendance('.$row->id.')" title="Click to Update Shift Details" class="btn ripple btn-secondary btn-sm"><i class="ti-pencil-alt"></i></a></div>';
					}
					
					
			  if($getAttnStatus->log_in_time){$log_in_time=date('h:i:s a',strtotime($getAttnStatus->log_in_time));}else{$log_in_time='';}
			  if($getAttnStatus->log_out_time){$log_out_time=date('h:i:s a',strtotime($getAttnStatus->log_out_time));}else{$log_out_time='';}	
	
			  $logOut_time=strtotime($getAttnStatus->log_in_time);
			  $logIn_time = strtotime($getAttnStatus->log_out_time);
			  $getTotalMinute=round(abs($logIn_time - $logOut_time)/60,2);
			  $workingHrs=round(($getTotalMinute/60),2);
			  if($getAttnStatus->log_out_time)
			  {
			  	 $tHours=floor($getTotalMinute/60);$tMinutes=round($getTotalMinute%60); 
				 $tSec=round(($getTotalMinute - floor($getTotalMinute)) * 60);
				 $workingHrs='<span class="wrkHr">'.(($tHours<10)?'0'.$tHours:$tHours).':'.(($tMinutes<10)?'0'.$tMinutes:$tMinutes).':'.(($tSec<10)?'0'.$tSec:$tSec).'</span>'; 
				}  
			 else{$workingHrs=(($getAttnStatus->staff_attendance_type_id=='6')||($getAttnStatus->staff_attendance_type_id=='3'))?'':'<span class="wrKng">Still working...</span>';}
	
	
			 if(!$getAttnStatus->log_in_time)
			 {
			 	$workingHrs='';
				}				
					$return['data'][] = array(
						'<div style="font-weight:700;padding-left:15px;">' . $i++ . '.</div>',
						"EMP" . $row->employee_id,
						$row->name,
						$row->shift_name,
						$log_in_time,
						$log_out_time,
						$workingHrs,
						$attendance_status,
						$view
					);
				}
				$return['recordsTotal'] = $this->attendance->daily_attendance_count($cShift);
				$return['recordsFiltered'] = $this->attendance->daily_attendance_filter_count($post_data,$cShift);
				$return['draw'] = $post_data['draw'];
				echo json_encode($return);
			
			}
		else if($actn=='viewToday')
		{
			$post=$this->input->post();
			print_r($post);
			}	
			else
			{
######################################################################################################
/*		$where=array('cardNo'=>'00100000','curDate'=>'2024-05-30','order'=>'asc');
	    $getFirstLogin=$this->attendance->getRowDataFromHardware($where);				
		if($getFirstLogin)
		{	
			$whereForMarkAtndnc=array('empID'=>'9','shift'=>'18','log_in'=>$getFirstLogin->PunchDatetime,'deviceNo'=>$getFirstLogin->MachineNo);
			$testMode=$this->markAttendanceByHardware($whereForMarkAtndnc);			
			
			}
			$data['testMode']=$testMode;*/
######################################################################################################
	
				$data['title']     = 'Mark Employee Attendance';
				$data['breadcrums']='Employee Attendance List';
				$data['target']='admin/attendance/daily/viewList';
				$data['markTarget']=base_url('admin/attendance/update_attendance_status_data');
				$data['bckUrl']=base_url('staff/dashboard');
				$data['shiftDet'] = $this->common->getDataList('shift_manage','status','1');
				$data['attendance_type'] = $this->common->all_data('attendence_type', 'id, type');
				$data['layout']="admin/attendance/manage_daily_attendance.php";
				$this->load->view('base', $data);
		}
	}
	public function update_attendance_status()
	{

		$inp=$this->input->post('id');//$currentTime=date('h:i a');
		$employee_data=$this->attendance->get_employee_data($inp);
		if($employee_data['attendance_date'])
		{
			$logStatus=$this->common->get_data('staff_attendance',array('employee_id'=>$inp,'attendance_date'=>$employee_data['attendance_date']),'*');
			$logOutTime=$logStatus['log_out_time']?$logStatus['log_out_time']:date('H:i:s',strtotime($employee_data['shift_end']));
			$mrkAttendance=$logStatus['staff_attendance_type_id'];
			}
			else
			{
				$logOutTime=date('H:i:s',strtotime($employee_data['shift_end']));$mrkAttendance=NULL;
				}
		$currentTime=$employee_data['shift_start']?date('H:i:s',strtotime($employee_data['shift_start'])):date('H:i:s');
		if($employee_data)
		{
$loginDateTime=$employee_data['attendance_status']?($employee_data['log_in_time'].' '.date('d-m-Y',strtotime($employee_data['attendance_date']))):$currentTime.' '.date('d-m-Y');
$logOutDateTime=$logOutTime.' '.date('d-m-Y');

			$details=array('id'=>$employee_data['id'],'empNmWithID'=>$employee_data['name'].' ('.$employee_data['employee_id'].')',
						   'attendance_status'=>$employee_data['attendance_status'],'loginDt'=>$loginDateTime,'logOutDt'=>$logOutDateTime,'attStatus'=>$mrkAttendance);
							sleep(1);echo json_encode($details);
			}
	}
	public function update_attendance_status_data()
	{

		$this->form_validation->set_rules('attendance_status', 'Mark Ateendance Status', 'required');
		$this->form_validation->set_rules('atLogIn', 'Logged time', 'required');
		if ($this->form_validation->run() == TRUE)
		{
			$post=$this->input->post();
			$attendance_date=$post['atLogIn']?date('Y-m-d',strtotime($post['atLogIn'])):date('Y-m-d');
			if ($post['attendance_status'] == 1 || $post['attendance_status'] == 2 || $post['attendance_status'] == 4 || $post['attendance_status'] == 5) {
				$log_in=$post['atLogIn'] ? date('H:i:s ',strtotime($post['atLogIn'])):date('H:i:s');
				$log_out=$post['atlogOut']? date('H:i:s ',strtotime($post['atlogOut'])):NULL;
			}
			else{$log_in = "";$log_out = "";}
			
			$out_location=$log_out?$post['getPosition']:'';
			$attendance = array('attendance_status'=>$post['attendance_status'],'attendance_date'=>$attendance_date,'log_in_time'=>$log_in,'log_out_time'=>$log_out,'in_location'=>$post['getPosition'],'out_location'=>$out_location);
			$this->common->update_data('staff', array('id' => $post['id']), $attendance);
			// cheking today attendance record exist in table or not start
			$att = $this->common->get_data('staff_attendance', array('employee_id'=>$post['id'],'attendance_date'=>$attendance_date),'*');
			if (empty($att)) {
				$attendance=array('employee_id'=>$post['id'],'staff_attendance_type_id'=>$post['attendance_status'],'attendance_date'=>$attendance_date,'log_in_time'=> $log_in,'in_location'=>$post['getPosition'],
								  'out_location'=>$out_location,'log_out_time'=>$log_out,'created_at'=>date('Y-m-d')
								   );
				$this->common->save_data('staff_attendance', $attendance);
			} 
			else 
			{
				$attendance = array('staff_attendance_type_id'=>$post['attendance_status'],'attendance_date'=>$attendance_date,'log_in_time'=>$log_in,'log_out_time'=>$log_out,'in_location'=>$post['getPosition'],'out_location'=>$out_location);
				$this->common->update_data('staff_attendance', array('id' => $att['id']), $attendance);
			}
		 $data=array('addClas'=>'alert-success','msg'=>array('Attendance Marked Successfully!'),'icon'=>'<i class="ti-check-box"></i>','removeCls'=>'alert-danger alert-warning');
		} else {

			$msg = array(form_error('attendance_status'),form_error('atLogIn'));
			$data = array('addClas'=>'alert-danger','msg'=>$msg,'icon'=>'<i class="fe fe-settings bx-spin"></i>','removeCls'=>'alert-success alert-warning');
		}
		echo json_encode($data);
	}
	// ===========================Attendance Report List Start @mit Singh============================
	public function reportList($getActn=NULL)
	{
		if($getActn=='viewList')
		{
			$post_data=$this->input->post();$getShift=$this->common->shift();$cShift=$getShift['curntShift'];
			$record=$this->attendance->employeeAttendanceList($post_data,$cShift);
			//echo $this->db->last_query().'<br>';
			//print_r($record);
			
			$i=$post_data['start']+1;$return['data']=array();
			if(($post_data['monthSearch']!='')&&($post_data['yearSearch']!=''))
			{
				$dayInMonth=date("t",strtotime($post_data['yearSearch'].'-'.$post_data['monthSearch']));
				$monthInNumeric=array('January'=>'01','February'=>'02','March'=>'03','April'=>'04','May'=>'05','June'=>'06','July'=>'07','August'=>'08','September'=>'09','October'=>'10','November'=>'11','December'=>'12');
				$searchDateMonth=$post_data['yearSearch'].'-'.$monthInNumeric[$post_data['monthSearch']].'-';
				}
				else{
						$dayInMonth=date("t",strtotime(date('Y-m')));$searchDateMonth=date('Y-m-');//$dayInMonth='29';
						}
            
			
			foreach ($record as $row)
			{
				$mnthArr=array();$ds=NULL;
				for($mi=1;$mi<=31;$mi++):
				if($mi<=$dayInMonth)
				{
					$isWeekend=date('D',strtotime($searchDateMonth.$mi));
					$whereConEmp=array('attendanceDate'=>$searchDateMonth.$mi,'emp_id'=>$row->id);
					$isWorked=$this->attendance->get_empWorking($whereConEmp);
					if($isWorked)
					{	$attMrk=array('1'=>'P','2'=>'Late','3'=>'A','4'=>'H','5'=>'HF','6'=>'Leave');
						$attCls=array('1'=>'prsnt','2'=>'late','3'=>'absnt','4'=>'holDy','5'=>'hfDy','6'=>'lve');
						$ds=$attMrk[$isWorked->staff_attendance_type_id];$bgClr=$attCls[$isWorked->staff_attendance_type_id];
						}
					else{if($isWeekend=='Sun'){$ds="Sun";$bgClr='snDy';}else{$ds="N/A";$bgClr='n_aD';}}
						array_push($mnthArr,'<div class="tdCl '.$bgClr.'">'.$ds.'</div>');//'.$mi.'
					}
				else{array_push($mnthArr,'');}
				endfor;
				
				 $tPresent=$this->attendance->empAttendance(array('emp_id'=>$row->id,'typeID'=>'1','strtDt'=>$searchDateMonth.'01','endDt'=>$searchDateMonth.$dayInMonth));
				 $tAbsent=$this->attendance->empAttendance(array('emp_id'=>$row->id,'typeID'=>'3','strtDt'=>$searchDateMonth.'01','endDt'=>$searchDateMonth.$dayInMonth));
				 $tLeave=$this->attendance->empAttendance(array('emp_id'=>$row->id,'typeID'=>'6','strtDt'=>$searchDateMonth.'01','endDt'=>$searchDateMonth.$dayInMonth));
				 $tLate=$this->attendance->empAttendance(array('emp_id'=>$row->id,'typeID'=>'2','strtDt'=>$searchDateMonth.'01','endDt'=>$searchDateMonth.$dayInMonth));
				 $tHalfDy=$this->attendance->empAttendance(array('emp_id'=>$row->id,'typeID'=>'5','strtDt'=>$searchDateMonth.'01','endDt'=>$searchDateMonth.$dayInMonth));
				 $totalHalfDy=$tHalfDy->total?$tHalfDy->total:'0';
				 $totalLate=$tLate->total?$tLate->total:'0';
				 
				 
				 
				 $totalPresent=$tPresent->total?($tPresent->total+$totalHalfDy*(0.5)-round($totalLate*(0.3333333333333333))):'0';
				 $totalAbsent=$tAbsent->total?($tAbsent->total+round($totalLate*(0.3333333333333333))):'0';
				 $totalLeave=$tLeave->total?$tLeave->total:'0';
				 $empDetails= array( '<span style="padding-left:10px;font-weight:900">'.$i++.'.</span>',$row->employee_id,$row->name);
				 $empSummary= array('<div class="tSumry">'.$totalPresent.'</div>','<div class="tSumry">'.$totalAbsent.'</div>','<div class="tSumry">'.$totalLeave.'</div>');											
				 $return['data'][]=array_merge($empDetails,$mnthArr,$empSummary);	
				  //print_r($totalAbsent);echo '<br>';						
            }
			//print_r($return['data']);exit;
            $return['recordsTotal'] = $this->attendance->employeeAttendance_count($cShift);
            $return['recordsFiltered'] = $this->attendance->employeeAttendance_filter_count($post_data,$cShift);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);
			}
		else if($getActn=='monthwise')
		{	
			   $post=$this->input->post();
			   if((($post['month']!='')&&($post['year']!=''))&&($post['month']!='all'))
			   {
			   
			   		$dayInMonth=date("t",strtotime($post['year'].'-'.$post['month']));
			  		$lstTdShw='<th>S.N.</th><th>EMP. ID</th><th>EMPLOYEE NAME</th>';
                    for($i=1;$i<=31;$i++):if($i<=$dayInMonth){$lstTdShw.='<th><div class="thCl">'.$i.'</div></th>';}else{$lstTdShw.='<th></th>';}endfor;
					}
					else
					{
						$dayInMonth=date("t",strtotime(date('Y-m')));
			  			$lstTdShw='<th>S.N.</th><th>EMP. ID</th><th>EMPLOYEE NAME</th>';
                    	for($i=1;$i<=$dayInMonth;$i++):$lstTdShw.='<th><div class="thCl">'.$i.'</div></th>';endfor;
						//for($i=1;$i<=31;$i++):if($i<=$dayInMonth){$lstTdShw.='<th><div class="thCl">'.$i.'</div></th>';}else{$lstTdShw.='<th></th>';}endfor;
						}
			$lstTdShw.='<th>T. Present</th><th>T. Absent</th><th>T. Leave</th>';
			print_r($lstTdShw);
			}	
			else
			{
				$dayInMonth          = date("t",strtotime(date('Y-m')));
				$data['dayInMonth']  = $dayInMonth; 
				$data['designation'] = $this->common->getDataList('designation','status','1');
            	$data['shiftMstr']   = $this->common->getDataList('shift_manage','status','1');
				$data['title']       = 'Employee Attendance List';
				$data['breadcrums']  = 'Employee Attendance List';
				$data['target']      = 'admin/attendance/reportList/viewList';
				$data['attMonthwise']= base_url('admin/attendance/reportList/monthwise');
				$data['layout']      = "admin/attendance/report_manage.php";
				$this->load->view('base', $data);
				}
		}
	public function by_user($getActn=NULL)
	{
		if($getActn=='viewList')
		{
			 $post_data=$this->input->post();
			 if($post_data['empSrchdID']){$post_data['empId']=$post_data['empSrchdID'];}else{$post_data['empId']=$this->logId;}
			 $record=$this->attendance->empWiseAttendanceList($post_data);
			/* echo $this->db->last_query().'<br>';
			exit;*/
			 $i=$post_data['start'] + 1; $return['data'] = array();
             foreach($record as $row) 
			 { 
				
				  $atStatus=array('1'=>'<span class="badge bgPrsnt miBgs">Present</span>','2'=>'<span class="badge bgLat miBgs">Late</span>',
				  				  '3'=>'<span class="badge bgAbsnt miBgs">Absent</span>','4'=>'<span class="badge bgHoliDy miBgs">Holiday</span>',
								  '5'=>'<span class="badge bgHfDy miBgs">Half Day</span>','6'=>'<span class="badge bgLvDy miBgs">Leave</span>');
				  $logOut_time=strtotime($row->log_out_time);
				  $logIn_time = strtotime($row->log_in_time);
				  $getTotalMinute=round(abs($logIn_time - $logOut_time)/60,2);
				  $workingHrs=round(($getTotalMinute/60),2);
				 if($row->log_out_time)
				 {
				 	//$workingHrs=$workingHrs.' Hours';
					$tHours=floor($getTotalMinute/60);$tMinutes=round($getTotalMinute%60); 
					$tSec=round(($getTotalMinute - floor($getTotalMinute)) * 60);
				 	$workingHrs='<span class="wrkHr">'.(($tHours<10)?'0'.$tHours:$tHours).':'.(($tMinutes<10)?'0'.$tMinutes:$tMinutes).':'.(($tSec<10)?'0'.$tSec:$tSec).'</span>'; 
					
					
					$logOutTiming=date('h:i:s a',strtotime($row->log_out_time));
					}
				 else{
				 		$workingHrs=(($row->staff_attendance_type_id=='6')||($row->staff_attendance_type_id=='3'))?'':'<span class="wrKng">Still working...</span>';
						$logOutTiming=NULL;}
				 $log_in_time=($row->staff_attendance_type_id=='3')?' ':date('h:i:s a',strtotime($row->log_in_time));
				 $logOutTiming=($row->staff_attendance_type_id=='3')?' ':date('h:i:s a',strtotime($row->log_out_time));
				 $workingHrs=($row->staff_attendance_type_id=='3')?' ':$workingHrs;
				 
				  $dTarget='checkLogged===admin/attendance/entry_details==='.$row->id;
				 
				 
				  $return['data'][] = array('<strong>'.$i++.'.</strong>',date('d-m-Y',strtotime($row->attendance_date)),date('l', strtotime($row->attendance_date)),
											'<div class="text-center">'.$atStatus[$row->staff_attendance_type_id].'</div>',$log_in_time,$logOutTiming,$workingHrs,
											'<a class="btn ripple miView btn-sm getAction" id="mkAt-'.$row->id.'" data-id="'.$dTarget.'"  data-bs-target="#veiwLoggedInOut" data-bs-toggle="modal" href="javascript:void(0);"><i class="fe fe-eye"></i></a>');
            }
            $return['recordsTotal'] = $this->attendance->empWiseAttendance_count($post_data);
            $return['recordsFiltered'] = $this->attendance->empWiseAttendance_filter_count($post_data);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);
			
			}
	    else if($getActn=='findEmployee')
		{
			$post=$this->input->post('oprType');
			$empDetail=$this->attendance->findEmployeeByNmID($post);
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
		else if($getActn=='monthwise')
		{
				$post=$this->input->post();/*$post=array('id'=>'118','attMonth'=>'January','attYear'=>'2025');*/
				sleep(1);
				if($post['attMonth']!='' && $post['attYear']!='')
         		{
					 $selectMnthYear=date("Y-m-",strtotime($post['attYear'].'-'.$post['attMonth']));$dayInMonth=date("t",strtotime($post['attYear'].'-'.$post['attMonth']));
					 $where=array('id'=>$post['id'],'strtDt'=>$selectMnthYear.'01','endDt'=>$selectMnthYear.$dayInMonth,'dayInMonth'=>$dayInMonth);
					}
					else
					{
						$dayInMonth=date("t",strtotime(date('Y-m')));
						$where=array('id'=>$post['id'],'strtDt'=>date('Y-m-').'01','endDt'=>date('Y-m-').$dayInMonth,'dayInMonth'=>$dayInMonth);}
						$getAttendance=$this->attendance->getEmployeeAttendance($where);
						$return=$getAttendance?$getAttendance:array('tWorking'=>'A','present'=>'A','absent'=>'A','hfDy'=>'A','late'=>'A','holiday'=>'A');
						echo json_encode($return);
					
			}
		else if($getActn=='setEmployeeFrAttendance')
		{
			$post=$this->input->post('id');
			$getDetails=$this->attendance->getEmployeeDetail($post);
			echo json_encode($getDetails);
			//print_r($getDetails);
			}
			else
			{
				
				$dayInMonth=date("t",strtotime(date('Y-m')));
				$where=array('id'=>$this->logId,'strtDt'=>date('Y-m-').'01','endDt'=>date('Y-m-').$dayInMonth,'dayInMonth'=>$dayInMonth);
				$empAttendance=$this->attendance->getEmployeeAttendance($where);
				$data=array(
							'title'=>'Attendance By User','breadcrums'=>'Attendance By User','target'=>'admin/attendance/by_user/viewList',
							'attMonthwise'=>base_url('admin/attendance/by_user/monthwise'),'frSearchEmplyee'=>base_url('admin/attendance/by_user/findEmployee'),
							'layout'=> "admin/attendance/report_byuser.php",'empAttendance'=>$empAttendance
							);
				$this->load->view('base', $data);
				}
		}
	private function markAttendanceByHardware($where)
	{
		$loginDt=date('Y-m-d',strtotime($where['log_in']));
		$isAlreadyExist=$this->common->get_data('staff_attendance',array('employee_id'=>$where['empID'],'attendance_date'=>$loginDt),'*');
		if(!$isAlreadyExist)
		{
			$findShift=$this->attendance->shiftDetails($where['empID']);
			if($findShift)
			{
				if((strtotime('- 30 minutes',$findShift->shift_start) < strtotime(date("h:i:s a"))) && (strtotime(date("h:i:s a")) < strtotime($findShift->shift_end)))
				{
					$shiftDuration=explode(' ',$findShift->shift_duration);
					$halfDay=$shiftDuration[0]/2 .' '.$shiftDuration[1];
					$shiftStartWithGrace=strtotime('+ 20 minutes',strtotime($findShift->shift_start));
					$attendanceTime=strtotime(date('H:i:s',strtotime($where['log_in'])));
					$loginTime=date('H:i:s',strtotime($where['log_in']));
					$isCheckHalf=strtotime('+ '.$halfDay,strtotime($findShift->shift_start));
					if($shiftStartWithGrace >= $attendanceTime){$workingPeriod='1';}
					else if(($shiftStartWithGrace <= $attendanceTime) && ($attendanceTime <= $isCheckHalf)){$workingPeriod='2';}else{$workingPeriod='3';}
					$mrkAttArr=array('attendance_status'=>$workingPeriod,'attendance_date'=>$loginDt,'log_in_time'=>$loginTime);
					$sysIP=$this->input->ip_address();
					$mrkPresent=array(
									  'employee_id'=>$where['empID'],'staff_attendance_type_id'=>$workingPeriod,'attendance_date'=>$loginDt,'log_in_time'=>$loginTime,
									  'markIpAddress'=>$sysIP,'workFrm'=>'1','biometric_attendence'=>'1','biometric_device_data'=>$where['deviceNo'],
									  'remark'=>'Biometric Attendance','created_at'=>date('Y-m-d')
									  );		
					//$msg=$mrkPresent;
					if($this->common->update_data('staff',array('id'=>$where['empID']),$mrkAttArr))
					{
						if($this->common->save_data('staff_attendance', $mrkPresent)){return 1;}
					  }
					}
				//$reason='Your are eligible to make attendance';
				}
				//else{$msg=array('You have already mark your attendance');}
		  }
		//return $msg;		  		
		}	

	public function report()
	{
			$employeeList=$this->attendance_report->employeAtt_report();
		    $data=array('title'=>'Mark Employee Attendance','breadcrums'=>'Employee Attendance List','employeeList'=>$employeeList);
			$this->load->view('admin/report_month_wise', $data);
		}	
	public function logged_user()
	{
		$user=$this->input->post('id');$optDate=date('Y-m-d');
		$getUser=$this->attendance_report->day_wise_logged_details($user,$optDate);
		echo json_encode($getUser);
		} 
	public function entry_details()
	{
		$post=$this->input->post('id');
		$getDetails=$this->common->getRowData('staff_attendance','id',$post);
		$getUser=$this->attendance_report->day_wise_logged_details($getDetails->employee_id,$getDetails->attendance_date);
		echo json_encode($getUser);
	  }
	// ===========================Attendance Report List End @mit Singh============================
	public function traceLocation()
	{
		$post=$this->input->post();
		if($post['dtType']!='custom')
		{
			$userDetail=$this->common->get_data('staff',array('id'=>$post['id']),'employee_id,name,surname,image,log_in_time,log_out_time,in_location,out_location');
			if($userDetail)
			{	
				//SELECT id,employee_id,name,in_location,out_location FROM staff ORDER BY id DESC
				$empName=$userDetail['surname']?($userDetail['surname'].' '.$userDetail['name']):$userDetail['name'];
				$empInDetails='<div id="memDetails"><img src="'.base_url($userDetail['image']).'" alt="'.$empName.'"/><div id="mUser"><div><span class="mEmpName">'.$empName.'</span></div><div>Emp ID :: <span class="mEmpID">'.$userDetail['employee_id'].'</span></div><div>In Time :: <span class="mEmpTime">'.$userDetail['log_in_time'].'</span></div></div></div>';
				$empOutDetails='<div id="memDetails"><img src="'.base_url($userDetail['image']).'" alt="'.$empName.'"/><div id="mUser"><div><span class="mEmpName">'.$empName.'</span></div><div>Emp ID :: <span class="mEmpID">'.$userDetail['employee_id'].'</span></div><div>Out Time :: <span class="mEmpOutTime">'.$userDetail['log_out_time'].'</span></div></div></div>';
				$empInDetails=$userDetail['in_location']?$empInDetails:'Untraceable';$empOutDetails=$userDetail['out_location']?$empOutDetails:'Untraceable';
				$inLoc=$userDetail['in_location']?$userDetail['in_location']:'unTrace';$outLoc=$userDetail['out_location']?$userDetail['out_location']:'unTrace';
				$return=array('actnCls'=>'success','empInTime'=>$empInDetails,'inLoc'=>$inLoc,'empOutTime'=>$empOutDetails,'outLoc'=>$outLoc);
				}
				else{$return=array('actnCls'=>'error','msg'=>'<i class="si si-exclamation"></i> Unfortunately, there are no records available.');}
				}
				else
				{
					$customDetail=$this->attendance_report->traceLocation($post['id'],$post['customDt']);
					if($customDetail)
					{	
						$empName=$customDetail['surname']?($customDetail['surname'].' '.$customDetail['name']):$customDetail['name'];
						$empInDetails='<div id="memDetails"><img src="'.base_url($customDetail['image']).'" alt="'.$empName.'"/><div id="mUser"><div><span class="mEmpName">'.$empName.'</span></div><div>Emp ID :: <span class="mEmpID">'.$customDetail['employee_id'].'</span></div><div>In Time :: <span class="mEmpTime">'.$customDetail['log_in_time'].'</span></div></div></div>';
						$empOutDetails='<div id="memDetails"><img src="'.base_url($customDetail['image']).'" alt="'.$empName.'"/><div id="mUser"><div><span class="mEmpName">'.$empName.'</span></div><div>Emp ID :: <span class="mEmpID">'.$customDetail['employee_id'].'</span></div><div>Out Time :: <span class="mEmpOutTime">'.$customDetail['log_out_time'].'</span></div></div></div>';
						$empInDetails=$customDetail['in_location']?$empInDetails:'Untraceable';$empOutDetails=$customDetail['out_location']?$empOutDetails:'Untraceable';
						$inLoc=$customDetail['in_location']?$customDetail['in_location']:'unTrace';$outLoc=$customDetail['out_location']?$customDetail['out_location']:'unTrace';
						$return=array('actnCls'=>'success','empInTime'=>$empInDetails,'inLoc'=>$inLoc,'empOutTime'=>$empOutDetails,'outLoc'=>$outLoc);
						}
						else{$return=array('actnCls'=>'error','msg'=>'<i class="si si-exclamation"></i> Unfortunately, there are no records available.');}
							
					}			
			
		
			
			
		echo json_encode($return);
		}
	public function customize($getActn=NULL)
	{
		if($getActn=='viewList')
		{
			$post_data=$this->input->post();
			$record=$this->attendance->customAttendanceList($post_data);
			$i=$post_data['start']+1;$return['data']=array();
			if(($post_data['fromDate']!='')&&($post_data['toDate']!=''))
			{
				$frmDt=date('Y-m-d',strtotime(str_replace("/","-",$post_data['fromDate'].' -1 day')));
				$endDate=date('Y-m-d',strtotime(str_replace("/","-",$post_data['toDate'])));
				$numDay=abs(strtotime($endDate)-strtotime($frmDt))/86400;
				}
				else
				{
					$numDay=date("t",strtotime(date('Y-m')));
					$searchDateMonth=date('Y-m-');
					$frmDt=date('Y-m-').'01';
					$endDate=date('Y-m-d', strtotime((date('Y-m-').'00') . ' +'.$numDay.' day'));
					 }
			//echo 'From Date :: '.$frmDt.' To Date ::'.$endDate.' Total Number of days '.$numDay;exit;	 
			foreach ($record as $row)
			{
				$mnthArr=array();$ds=NULL;
				for($mi=1;$mi<=$numDay;$mi++):
				if($mi<=$numDay)
				{
				    $markDate=date('Y-m-d', strtotime($frmDt . ' +'.$mi.' day'));
					$isWeekend=date('D',strtotime($markDate));
					$whereConEmp=array('attendanceDate'=>$markDate,'emp_id'=>$row->id);
					$isWorked=$this->attendance->get_empWorking($whereConEmp);
					if($isWorked)
					{	$log_in_time=$isWorked->log_in_time?('<div>'.date('H:i:s',strtotime($isWorked->log_in_time)).'</div>'):'<div>N/A</div>';
						$log_out_time=$isWorked->log_out_time?('<div>'.date('H:i:s',strtotime($isWorked->log_out_time)).'</div>'):'<div>N/A</div>';
						if($isWorked->staff_attendance_type_id=='3'){$timing='<span style="color:#F16D75">Absent</span>';}
						else if($isWorked->staff_attendance_type_id=='4'){$timing='<span style="color:#0073d9">Holiday</span>';}
						else if($isWorked->staff_attendance_type_id=='6'){$timing='<span style="color:#009EA6">On Leave</span>';}
						else{$timing=$log_in_time.$log_out_time;}
						}
					else{if($isWeekend=='Sun'){$timing="<span style='color:#8c0303'>Sun</span>";}else{$timing='N/A';}}
						array_push($mnthArr,'<div class="tdCl"><div class="inOutDet">'.$timing.'</div></div>');
					}
				else{array_push($mnthArr,'');}
				endfor;				
				 $tPresent=$this->attendance->empAttendance(array('emp_id'=>$row->id,'typeID'=>'1','strtDt'=>$frmDt,'endDt'=>$endDate));
				 $tAbsent=$this->attendance->empAttendance(array('emp_id'=>$row->id,'typeID'=>'3','strtDt'=>$frmDt,'endDt'=>$endDate));
				 $tLeave=$this->attendance->empAttendance(array('emp_id'=>$row->id,'typeID'=>'6','strtDt'=>$frmDt,'endDt'=>$endDate));
				 $tLate=$this->attendance->empAttendance(array('emp_id'=>$row->id,'typeID'=>'2','strtDt'=>$frmDt,'endDt'=>$endDate));
				 $tHalfDy=$this->attendance->empAttendance(array('emp_id'=>$row->id,'typeID'=>'5','strtDt'=>$frmDt,'endDt'=>$endDate));
				 $totalHalfDy=$tHalfDy->total?$tHalfDy->total:'0';
				 $totalLate=$tLate->total?$tLate->total:'0';
				 
				 $totalPresent=$tPresent->total?($tPresent->total+$totalHalfDy*(0.5)-round($totalLate*(0.3333333333333333))):'0';
				 $totalAbsent=$tAbsent->total?($tAbsent->total+round($totalLate*(0.3333333333333333))):'0';
				 $totalLeave=$tLeave->total?$tLeave->total:'0';
				 $empDetails= array( '<span style="padding-left:10px;font-weight:900">'.$i++.'.</span>',$row->employee_id,$row->name);
				 $empSummary= array('<div class="tSumry">'.$totalPresent.'</div>','<div class="tSumry">'.$totalAbsent.'</div>','<div class="tSumry">'.$totalLeave.'</div>');											
				 $return['data'][]=array_merge($empDetails,$mnthArr,$empSummary);	
				  //print_r($totalAbsent);echo '<br>';						
            }
			
            $return['recordsTotal'] = $this->attendance->custom_attendance_count();
            $return['recordsFiltered'] = $this->attendance->custom_attendance_filter_count($post_data);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);
			}
/*	    else if($getActn=='findEmployee')
		{
			$post=$this->input->post('oprType');
			$empDetail=$this->attendance->findEmployeeByNmID($post);
			if($empDetail)
			{
				foreach($empDetail as $emp)
				{
						$fndData='findEmployee===admin/attendance/by_user/setEmployeeFrAttendance==='.$emp->id;
				echo '<li class="getAction" data-id="'.$fndData.'"><i class="si si-user"></i> '.$emp->name.' <span>('.$emp->employee_id.')</span></li>';
						}
					}
					else{echo '<li class="miNoEmp"><i class="si si-user"></i> No employee available</li>';}
				
		}*/
		else if($getActn=='monthwise')
		{
				$post=$this->input->post();
				if($post['fromDate']!='' && $post['toDate']!='')
         		{
			  		$frmDt=date('Y-m-d',strtotime(str_replace("/","-",$post['fromDate'])));
					$endDate=date('Y-m-d',strtotime(str_replace("/","-",$post['toDate'])));
					$numDay=1+(abs(strtotime($endDate)-strtotime($frmDt))/86400);
					}
					else
					{
						$numDay=date("t",strtotime(date('Y-m')));
			  			}
						
				$lstTdShw='<tr><th rowspan="2"><div class="thCl myNaming">S.No.</div></th><th rowspan="2"><div class="thCl myNaming">EMP. ID</div></th><th rowspan="2"><div class="thCl myNaming">EMPLOYEE NAME</div></th>';
                $timeStr='<tr>';
				for($i=1;$i<=$numDay;++$i):
				if($i<=$numDay)
				{
					$lstTdShw.='<th><div class="thCl">'.$i.'</div></th>';
					 $timeStr.='<th><div class="thCl"><div class="inOutDet"><div>In</div><div>Out</div></div></div></th>';
					}
					else
					{
						$lstTdShw.='<th></th>';
						 $timeStr.='<th></th>';
						}endfor;			
				$lstTdShw.='<th rowspan="2"><div class="thCl myNaming">T. Present</div></th><th rowspan="2"><div class="thCl myNaming">T. Absent</div></th><th rowspan="2"><div class="thCl myNaming">T. Leave</div></th></tr>';
				$timeStr.='</tr>';
				print_r($lstTdShw.$timeStr);
					
			}
	/*	else if($getActn=='setEmployeeFrAttendance')
		{
			$post=$this->input->post('id');
			$getDetails=$this->attendance->getEmployeeDetail($post);
			echo json_encode($getDetails);
			//print_r($getDetails);
			}*/
			else
			{
				
				$dayInMonth=date("t",strtotime(date('Y-m')));
				$where=array('id'=>$this->logId,'strtDt'=>date('Y-m-').'01','endDt'=>date('Y-m-').$dayInMonth,'dayInMonth'=>$dayInMonth);
				$empAttendance=$this->attendance->getEmployeeAttendance($where);
				$dayInMonth= date("t",strtotime(date('Y-m')));
				$data=array(
							'title'=>'Search Attendance ','breadcrums'=>'Attendance Search By Custom','target'=>'admin/attendance/customize/viewList','dayInMonth'=>$dayInMonth,
							'attMonthwise'=>base_url('admin/attendance/customize/monthwise'),
							'frExcelExport'=>'excelExport===admin/report/export','frPdfExport'=>'pdfExport===admin/report/export',
							'layout'=> "admin/attendance/report_customize.php",/*'empAttendance'=>$empAttendance*/
							);
				$this->load->view('base', $data);
				}
		}
	public function customSearch()
	{
		$post=$this->input->post();
		$record=$this->attendance->customAttendanceList($post);
		$i=$post_data['start']+1;$return['data']=array();
		if(($post['fromDate']!='')&&($post['toDate']!=''))
		{
			$frmDt=date('Y-m-d',strtotime(str_replace("/","-",$post['fromDate'])));
			$endDt=date('Y-m-d',strtotime(str_replace("/","-",$post['toDate'])));
			$numDay=1+ (abs(strtotime($endDt)-strtotime($frmDt))/86400);
			}
		else
		{
			$numDay=date("t",strtotime(date('Y-m')));
			$searchDateMonth=date('Y-m-');
			$frmDt=date('Y-m-').'01';
			$endDt=date('Y-m-d', strtotime((date('Y-m-').'00') . ' +'.$numDay.' day'));
			 }
	        
/****************************************************************************************************/
			foreach($record as $row)
			{
				$mnthArr=array();$ds=NULL;
				for($mi=1;$mi<=$numDay;$mi++):
				if($mi<=$numDay)
				{
					echo $mi;
					$markDate=date('Y-m-d', strtotime(str_replace("/","-",$post['fromDate']) . ' +'.$mi.' day'));
					$isWeekend=date('D',strtotime($markDate));
					$whereConEmp=array('attendanceDate'=>$markDate,'emp_id'=>$row->id);
					$isWorked=$this->attendance->get_empWorking($whereConEmp);
					//print_r($isWorked);echo '<br>';
					if($isWorked)
					{	$log_in_time=$isWorked->log_in_time?('<div>'.date('H:i:s',strtotime($isWorked->log_in_time)).'</div>'):'<div>N/A</div>';
						$log_out_time=$isWorked->log_out_time?('<div>'.date('H:i:s',strtotime($isWorked->log_out_time)).'</div>'):'<div>N/A</div>';
						$timing=$log_in_time.$log_out_time;
						}
					else
					{
						if($isWeekend=='Sun')
						{
							$ds="Sun";
							}
							else
							{
								$timing='N/A';
								
								}}
						array_push($mnthArr,'<div class="tdCl"><div class="inOutDet">'.$timing.'</div></div>');//'.$mi.'
					}
				else{array_push($mnthArr,'');}
				endfor;
				  echo '<br>From Date :: '.$frmDt.' To Date ::'.$endDt.' Total Number of days '.$numDay;		 
				exit;	 
				 $tPresent=$this->attendance->empAttendance(array('emp_id'=>$row->id,'typeID'=>'1','strtDt'=>$frmDt,'endDt'=>$endDt));
				 $tAbsent=$this->attendance->empAttendance(array('emp_id'=>$row->id,'typeID'=>'3','strtDt'=>$frmDt,'endDt'=>$endDt));
				 $tLeave=$this->attendance->empAttendance(array('emp_id'=>$row->id,'typeID'=>'6','strtDt'=>$frmDt,'endDt'=>$endDt));
				 $tLate=$this->attendance->empAttendance(array('emp_id'=>$row->id,'typeID'=>'2','strtDt'=>$frmDt,'endDt'=>$endDt));
				 $tHalfDy=$this->attendance->empAttendance(array('emp_id'=>$row->id,'typeID'=>'5','strtDt'=>$frmDt,'endDt'=>$endDt));
				 $totalHalfDy=$tHalfDy->total?$tHalfDy->total:'0';
				 $totalLate=$tLate->total?$tLate->total:'0';
				 
				 
				 
				 $totalPresent=$tPresent->total?($tPresent->total+$totalHalfDy*(0.5)-round($totalLate*(0.3333333333333333))):'0';
				 $totalAbsent=$tAbsent->total?($tAbsent->total+round($totalLate*(0.3333333333333333))):'0';
				 $totalLeave=$tLeave->total?$tLeave->total:'0';
				 $empDetails= array( '<span style="padding-left:10px;font-weight:900">'.$i++.'.</span>',$row->employee_id,$row->name);
				 $empSummary= array('<div class="tSumry">'.$totalPresent.'</div>','<div class="tSumry">'.$totalAbsent.'</div>','<div class="tSumry">'.$totalLeave.'</div>');											
				 $return['data'][]=array_merge($empDetails,$mnthArr,$empSummary);	
				  //print_r($totalAbsent);echo '<br>';						
            }
			print_r($return['data']);			  
/****************************************************************************************************/			  
		}	
}
