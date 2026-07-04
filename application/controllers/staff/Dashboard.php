<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->sql_db = $this->load->database('sql_db', TRUE);
		$this->load->model(array('admin/Attendance_model' => 'attendance_model', 'employee/Dashboard_model' => 'dashboard'));
		($this->session->userdata('mim_id') == '') ? redirect(base_url(), 'refresh') : '';
		$this->logId = $this->session->userdata('mim_id');
		$this->usrCat = $this->session->userdata('user_cate');
		error_reporting(0);
	}

	public function index()
	{


		/**************************************************************************/	
	/*$temp_all_row_punch = $this->sql_db->select('*')->where_in('MachineNo', $m_iid)->like('CAST(PunchDatetime as date)', date('Y-m-d'),'after')->order_by('Tran_MachineRawPunchId', 'ASC')->get('Tran_MachineRawPunch')->result_array();*/
	/*$temp_all_row_punch=NULL;
	
	$getLastRecord=$this->common->getLastRecord('tran_MachineRawPunch');
	$getLastID=$getLastRecord?$getLastRecord->id:'0';
	
	$temp_all_row_punch = $this->sql_db->select('*')->where('Tran_MachineRawPunchId >',$getLastID)->order_by('id', 'asc')->get('Tran_MachineRawPunch')->result_array();*/

		/**************************************************************************/


		/*-------------------------------Holiday Manage start----------------------------*/
		$getShift = $this->common->shift();
		$crShift = $getShift['curntShift'];
		$daysInMonth = array(
			'01' => '31',
			'02' => '28',
			'03' => '31',
			'04' => '30',
			'05' => '31',
			'06' => '30',
			'07' => '31',
			'08' => '31',
			'09' => '30',
			'10' => '31',
			'11' => '30',
			'12' => '31'
		);
		$frmDate = date('Y-m') . '-01';
		$endDate = date('Y-m') . '-' . $daysInMonth[date('m')];

		$findHolidays = $this->attendance_model->getHolidaysListInMonth($frmDate, $endDate);

		$isHolidaysSet = $this->attendance_model->isHolidaysListInMonth($frmDate, $endDate);


		if (count($findHolidays) != count($isHolidaysSet)) {

			foreach ($findHolidays as $hList) {
				$getEmpList = $this->attendance_model->getEmployeeWithShift();
				if ($getEmpList) {
					foreach ($getEmpList as $emp) {
						$isAlreadyExist = $this->common->get_data('staff_attendance', array('employee_id' => $emp->id, 'holiday_id' => $hList->id), '*');
						if (!$isAlreadyExist) {
							$createHoliday = array(
								'employee_id' => $emp->id,
								'staff_attendance_type_id' => '4',
								'attendance_date' => $hList->holiday_date,
								'holiday_id' => $hList->id,
								'log_in_time' => $emp->shift_start,
								'log_out_time' => $emp->shift_end,
								'created_at' => date('Y-m-d')
							);
							$createAttendance = $this->common->save_data('staff_attendance', $createHoliday);
						}
					}
				}
			}
		}
		/*-------------------------------Holiday Manage End----------------------------*/
		$curMnth = date('Y-m-');
		$dayInMonth = date("t", strtotime(date('Y-m')));
		$isWhereMonth = array('strtDt' => $curMnth . '01', 'endDt' => $curMnth . $dayInMonth, 'id' => $this->logId, 'dayInMonth' => $dayInMonth);
		$empUpComingBdy = $this->dashboard->upcoming_birthday($this->logId);

		$id = $this->session->userdata('mim_id');
		$loggedAtt = $this->dashboard->isLoggedAttendance($isWhereMonth);
		$alAttendance = $this->dashboard->allEmpAttendance($crShift, $frmDate, $endDate);
		$tEmpPresent = $alAttendance['present'] ? $alAttendance['present'] : '0';
		$tEmpLate = $alAttendance['late'] ? $alAttendance['late'] : '0';
		$tEmpAbsent = $alAttendance['absent'] ? $alAttendance['absent'] : '0';
		$tEmpHfDy = $alAttendance['hfDy'] ? $alAttendance['hfDy'] : '0';
		$tEmpLeave = $alAttendance['leave'] ? $alAttendance['leave'] : '0';
		$totalEmp = $alAttendance['totalEmp'] ? $alAttendance['totalEmp'] : '0';
		$totalSalary = $alAttendance['totalSalary'] ? $alAttendance['totalSalary'] : '0';
		$resigned = $alAttendance['resigned'] ? $alAttendance['resigned'] : '0';
		$isNewEmp = $alAttendance['isNewEmp'] ? $alAttendance['isNewEmp'] : '0';
		$thisMonthSalary = $alAttendance['currentMnthSalary'] ? $alAttendance['currentMnthSalary'] : '0';
		$thisMonthHoliday = $this->getHolidaysThisMonth();
		$employee = $this->common->employee_all_data($id);
		$recentJoinee = $this->dashboard->recentJoinee();
		$recentTurnover = $this->dashboard->empTurnOver();
		$todayAttendance = $this->dashboard->todayMrkAttendance(date('Y-m-d'));

		$expenseOverview = $this->dashboard->expenseOverview();
		$punchOverview = $this->dashboard->punchOverview();
		$workingAvg = $this->dashboard->workingAvg();

		$dailyWorkingGraph = $this->dashboard->dailyWorkingInMonth();
		$data = array(
			'tEmpPresent' => $tEmpPresent,
			'tEmpLate' => $tEmpLate,
			'tEmpAbsent' => $tEmpAbsent,
			'tEmpHfDy' => $tEmpHfDy,
			'tEmpLeave' => $tEmpLeave,
			'totalEmp' => $totalEmp,
			'prsntPr' => round((($tEmpPresent * 100) / $totalEmp), 2),
			'latePr' => round((($tEmpLate * 100) / $totalEmp), 2),
			'absntPr' => round((($tEmpAbsent * 100) / $totalEmp), 2),
			'halfDyPr' => round((($tEmpHfDy * 100) / $totalEmp), 2),
			'leavePr' => round((($tEmpLeave * 100) / $totalEmp), 2),
			'totalSalary' => $totalSalary,
			'resigned' => $resigned,
			'isNewEmp' => $isNewEmp,
			'employee' => $employee,
			'thisMonthSalary' => $thisMonthSalary,
			'recentJoinee' => $recentJoinee,
			'recentTurnover' => $recentTurnover,
			'todayAttendance' => $todayAttendance,
			'thisMonthHoliday' => $thisMonthHoliday,
			'empUpComingBdy' => $empUpComingBdy,
			'title' => 'Dashboard Panel',
			'breadcrums' => 'Dashboard Panel',
			'all_row_punch' => $temp_all_row_punch,
			'expenseOverview' => $expenseOverview,
			'punchOverview' => $punchOverview,
			'workingAvg' => $workingAvg,
			'dailyWorkingGraph' => $dailyWorkingGraph
		);

		$data['loggedAtt'] = $loggedAtt;
		$this->load->view('base', $data);
	}
	public function getHolidaysThisMonth()
	{
		$crntMnthYr = date('Y-m') . "-";
		$isHolidayThisMonth = $this->dashboard->upcoming_holiday('temp_holidays', $crntMnthYr);
		if (count($isHolidayThisMonth) == 0) {
			$this->common->del_data_multi_con('temp_holidays', array('holiday_date <' => $crntMnthYr . '01'));
			$upComingHoliday = $this->dashboard->upcoming_holiday('holidays', $crntMnthYr);
			$fDMonth = $crntMnthYr . '01';
			$first_day = date('N', strtotime($fDMonth));
			$first_day = 7 - $first_day + 1;
			$last_day = date('t', strtotime($fDMonth));
			$days = array();
			for ($i = $first_day; $i <= $last_day; $i = $i + 7) {
				if ($i <= 9) {
					$i = '0' . $i;
				} else {
					$i = $i;
				}
				$days[] = array('holiday_name' => 'Office Off', 'holiday_date' => $crntMnthYr . $i, 'description' => 'Sunday', 'created_at' => date('Y-m-d'));
			}
			$isResultExit = array_merge($upComingHoliday, $days);
			if ($isResultExit) {
				foreach ($isResultExit as $isHday) {
					$this->common->save_data('temp_holidays', $isHday);
				}
			}
		} else {
			$isResultExit = $isHolidayThisMonth;
		}
		return $isResultExit;
	}
	/*	public function ecommerce()
	{
		//echo'hello';
		$data['layout']= "ecomerce/home.php";
		$data['title']='Dashboard Panel';
		$data['breadcrums'] = 'Dashboard Panel';
		$this->load->view('base',$data);
		
		}*/
}
