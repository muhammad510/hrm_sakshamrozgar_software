<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Report extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->library('Excel');
		($this->session->userdata('mim_id') == '') ? redirect(base_url(), 'refresh') : '';
		$this->logId = $this->session->userdata('mim_id');
		$this->load->model('admin/Attendance_report_model', 'attendance_report');
		error_reporting(0);
		// error_reporting(E_ALL);
		// ini_set('display_errors', 1);
	}
	public function export()
	{

		$post = $this->input->post();

		if (($post['action'] == 'excelExport') || ($post['action'] == 'pdfExport')) {
			$frmDate = $post['fromDate'] ? date('Y-m-d', strtotime(str_replace("/", "-", $post['fromDate']))) : date('Y-m-01');
			$lastDate = $post['toDate'] ? date('Y-m-d', strtotime(str_replace("/", "-", $post['toDate']))) : date('Y-m-t');
			$eId = $post['id'] ? $post['id'] : '';
			$whereCon = array('attendance_date >=' => $frmDate, 'attendance_date <=' => $lastDate);
			$getData = $this->common->get_data('staff_attendance', $whereCon, '*');
			if ($getData) {
				$downlink = base_url('admin/report/download/' . urlencode(base64_encode(json_encode(array('fromDate' => $post['fromDate'], 'toDate' => $post['toDate'], 'id' => $eId, 'aPage' => $post['activePage'], 'actn' => $post['action'])))));
				$return = array('addClas' => 'tst_success', 'msg' => array('Thank you! You have successfully find details'), 'icon' => '<i class="ti-check-box"></i>', 'downlink' => $downlink);
			} else {
				$return = array('addClas' => 'tst_warning', 'msg' => array(' Unfortunately, there are no records available.'), 'icon' => '<i class="fe fe-settings bx-spin"></i>');
			}
		} else {
			$return = array('addClas' => 'tst_warning', 'msg' => array(' Unfortunately, there are no records available.'), 'icon' => '<i class="fe fe-settings bx-spin"></i>');
		}
		echo json_encode($return);
	}

	public function download($where)
	{
		$where = json_decode(base64_decode(urldecode($where)));


		// echo "<pre>";
		// print_r($where);
		// die;

		if ($where->actn == 'excelExport') {
			$file_name = $where->fromDate ? date('F-Y', strtotime(str_replace("/", "-", $where->fromDate))) : date('F-Y');

			$frmDate = $where->fromDate ? date('Y-m-d', strtotime(str_replace("/", "-", $where->fromDate) . ' -1 day')) : date('Y-m-01');
			$eId = $where->id ? $where->id : '';
			$lastDate = $where->toDate ? date('Y-m-d', strtotime(str_replace("/", "-", $where->toDate))) : date('Y-m-t');
			$fromTimestamp = strtotime($frmDate);
			$toTimestamp = strtotime($lastDate);
			$diffInSeconds = $toTimestamp - $fromTimestamp;
			$numDay = $diffInSeconds / 86400;
			$queryPart = '';
			//$numDay=date('t');$frmDate=date('Y-m-01');$lastDate=date('Y-m-t');
			//$numDay='31';$frmDate='2024-12-01';$lastDate='2024-12-31';
			//print_r($where);echo '<br>';echo $frmDate.'==='.$lastDate.'==='.$numDay.'<br>';
			$headers = ['S. No.', 'Emp. Id', 'Employee Name', 'Branch Name', 'Present', 'Half Day', 'Absent'];
			for ($mi = 1; $mi <= $numDay; $mi++) {
				//$cDate=date('Y-m-d', strtotime((date('Y-m-00')) . ' +'.$mi.' day'));
				$cDate = date('Y-m-d', strtotime($frmDate . ' +' . $mi . ' day'));
				$queryPart .= ($mi == $numDay) ? (" MAX(CASE WHEN sf.attendance_date = '" . $cDate . "' THEN CONCAT(sf.log_in_time, '|', sf.log_out_time) END) AS '" . $cDate . "' ") : (" MAX(CASE WHEN sf.attendance_date = '" . $cDate . "' THEN CONCAT(sf.log_in_time, '|', sf.log_out_time) END) AS '" . $cDate . "',");
				$headers[] = date('d-m-Y', strtotime($cDate));
			}

			$searchDt = ($queryPart ? ("s.id,s.employee_id as empCode,CONCAT(IF(s.surname!='',s.surname,''),IF(s.surname!='' AND s.name!= '', ' ', ''),s.name) AS full_name,br.branch_name,SUM(CASE WHEN sf.staff_attendance_type_id = '1' THEN 1 ELSE 0 END) AS total_present,SUM(CASE WHEN sf.staff_attendance_type_id = '5' THEN 1 ELSE 0 END) AS total_half, SUM(CASE WHEN sf.staff_attendance_type_id = '3' THEN 1 ELSE 0 END) AS total_absent," . $queryPart) :
				"s.id,s.employee_id as empCode,CONCAT(IF(s.surname!='',s.surname,''),IF(s.surname!='' AND s.name!= '', ' ', ''),s.name) AS full_name,
				  SUM(CASE WHEN sf.staff_attendance_type_id = '1' THEN 1 ELSE 0 END) AS total_present,SUM(CASE WHEN sf.staff_attendance_type_id = '5' THEN 1 ELSE 0 END) AS total_half,
				  SUM(CASE WHEN sf.staff_attendance_type_id = '3' THEN 1 ELSE 0 END) AS total_absent");



			$whereCon = array('searchDt' => $searchDt, 'frmDate' => $frmDate, 'lastDate' => $lastDate, 'id' => $eId);

			$getRecord = $this->common->createMonhtlyReport($whereCon);
			// echo $this->db->last_query();



			require_once('system/libraries/PHPExcel.php');
			require_once('system/libraries/PHPExcel/IOFactory.php');
			$objPHPExcel = new PHPExcel(); //creating Object of Excel

			$objPHPExcel->getProperties()->setCreator("Your Name")->setLastModifiedBy("Your Name")->setTitle("Excel Export")->setSubject("Excel Export")->setDescription("Generated Excel file.");

			$column = 'A';
			$row = 1;

			foreach ($headers as $index => $header) {
				$objPHPExcel->getActiveSheet()
					->setCellValue($column . $row, $header);
				$column++;
			}


			$row = 2;

			foreach ($getRecord as $data_row) {
				$column = 'A';
				$data_row = (array)$data_row;

				foreach ($data_row as $value) {
					$objPHPExcel->getActiveSheet()->setCellValue($column . $row, $value);
					$column++;
				}

				$row++;
			}

			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="' . $file_name . '-attendance-report.xlsx"');
			header('Cache-Control: max-age=0');

			ob_clean();
			flush();

			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objWriter->save('php://output');
			exit;
		} else if ($where->actn == 'pdfExport') {
			$file_name = $where->fromDate ? date('F-Y', strtotime(str_replace("/", "-", $where->fromDate))) : date('F-Y');
			$frmDate = $where->fromDate ? date('Y-m-d', strtotime(str_replace("/", "-", $where->fromDate)/*.' -1 day'*/)) : date('Y-m-01');
			$lastDate = $where->toDate ? date('Y-m-d', strtotime(str_replace("/", "-", $where->toDate))) : date('Y-m-t');
			$searchDt = "s.id,s.employee_id as empCode,CONCAT(IF(s.surname!='',s.surname,''),IF(s.surname!='' AND s.name!= '', ' ', ''),s.name) AS full_name,designation_name,department_name,branch_name,shift,shift_start,shift_end,
				   SUM(CASE WHEN sf.staff_attendance_type_id = '1' THEN 1 ELSE 0 END) AS total_present,
				   SUM(CASE WHEN sf.staff_attendance_type_id = '5' THEN 1 ELSE 0 END) AS total_half,SUM(CASE WHEN sf.staff_attendance_type_id = '3' THEN 1 ELSE 0 END) AS total_absent";
			$whereCon = array('searchDt' => $searchDt, 'frmDate' => $frmDate, 'lastDate' => $lastDate);
			$getRecord = $this->common->createMonhtlyReport($whereCon);
			$data = array('title' => 'Employee Attendance Report', 'breadcrums' => 'Employee Attendance List', 'file_name' => $file_name, 'frmDate' => $frmDate, 'lastDate' => $lastDate, 'getRecord' => $getRecord);
			$this->load->view('admin/attendance/report_pdf', $data);
		} else {
			$return = array('addClas' => 'tst_success', 'msg' => array('Oops! It seems you�ve selected an invalid option.', 'Please check your choice and try again.'), 'icon' => '<i class="fe fe-settings bx-spin"></i>');
			echo json_encode($return);
		}
	}

	#####################################################Android Login Start################################################################ 


}
