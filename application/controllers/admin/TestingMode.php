<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class TestingMode extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		 $this->load->library('excel');
		 $this->load->model('excel_import_model');
       // ($this->session->userdata('mim_id')== '') ? redirect(base_url(), 'refresh') : '';
		//$this->logId=$this->session->userdata('mim_id');
        error_reporting(0);		
	}
	public function index()
	{
		$data['title']='Testing Mode';
		$data['breadcrums'] = 'Testing Mode';
		$data['layout']= "testing/mode.php";
		$this->load->view('base',$data);
		}
		
		
function fetch()
 {
  $data = $this->excel_import_model->select();
  $output = '
  <h3 align="center">Total Data - '.$data->num_rows().'</h3>
  <table class="table table-striped table-bordered">
   <tr>
    <th>Customer Name</th>
    <th>Address</th>
    <th>City</th>
    <th>Postal Code</th>
    <th>Country</th>
   </tr>
  ';
  foreach($data->result() as $row)
  {
   $output .= '
   <tr>
    <td>'.$row->CustomerName.'</td>
    <td>'.$row->Address.'</td>
    <td>'.$row->City.'</td>
    <td>'.$row->PostalCode.'</td>
    <td>'.$row->Country.'</td>
   </tr>
   ';
  }
  $output .= '</table>';
  echo $output;
 }
 function import()
 {
  if(isset($_FILES["file"]["name"]))
  {
   $path = $_FILES["file"]["tmp_name"];
   $object = PHPExcel_IOFactory::load($path);
   foreach($object->getWorksheetIterator() as $worksheet)
   {
    $highestRow = $worksheet->getHighestRow();
    $highestColumn = $worksheet->getHighestColumn();
    for($row=2; $row<=$highestRow; $row++)
    {
     $customer_name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
     $address = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
     $city = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
     $postal_code = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
     $country = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
     $data[] = array(
      'CustomerName'  => $customer_name,
      'Address'   => $address,
      'City'    => $city,
      'PostalCode'  => $postal_code,
      'Country'   => $country
     );
    }
   }
   $this->excel_import_model->insert($data);
   echo 'Data Imported successfully';
  } 
 }
 
public function export()
{
        $file_name=date('F-Y');
		/*$numDay=date('t');$frmDate=date('Y-m-01');$lastDate=date('Y-m-t');*/
		$numDay='31';$frmDate='2024-12-01';$lastDate='2024-12-31';$queryPart='';
		$headers=['S. No.', 'Emp. Id', 'Employee Name','Present', 'Half Day', 'Absent'];
		for($mi=1;$mi<=$numDay;$mi++)
		{
			//$cDate=date('Y-m-d', strtotime((date('Y-m-00')) . ' +'.$mi.' day'));
			$cDate=date('Y-m-d', strtotime(('2024-12-00') . ' +'.$mi.' day'));
			$queryPart.=($mi==$numDay)?(" MAX(CASE WHEN sf.attendance_date = '".$cDate."' THEN CONCAT(sf.log_in_time, '|', sf.log_out_time) END) AS '".$cDate."' "):(" MAX(CASE WHEN sf.attendance_date = '".$cDate."' THEN CONCAT(sf.log_in_time, '|', sf.log_out_time) END) AS '".$cDate."',");
			$headers[]=date('d-m-Y',strtotime($cDate));
			
			}
		$searchDt=($queryPart?("s.id,s.employee_id as empCode,CONCAT(IF(s.surname!='',s.surname,''),IF(s.surname!='' AND s.name!= '', ' ', ''),s.name) AS full_name,SUM(CASE WHEN sf.staff_attendance_type_id = '1' THEN 1 ELSE 0 END) AS total_present,SUM(CASE WHEN sf.staff_attendance_type_id = '5' THEN 1 ELSE 0 END) AS total_half, SUM(CASE WHEN sf.staff_attendance_type_id = '3' THEN 1 ELSE 0 END) AS total_absent,".$queryPart):
				  "s.id,s.employee_id as empCode,CONCAT(IF(s.surname!='',s.surname,''),IF(s.surname!='' AND s.name!= '', ' ', ''),s.name) AS full_name,
				  SUM(CASE WHEN sf.staff_attendance_type_id = '1' THEN 1 ELSE 0 END) AS total_present,SUM(CASE WHEN sf.staff_attendance_type_id = '5' THEN 1 ELSE 0 END) AS total_half,
				  SUM(CASE WHEN sf.staff_attendance_type_id = '3' THEN 1 ELSE 0 END) AS total_absent");	
		$whereCon=array('searchDt'=>$searchDt,'frmDate'=>$frmDate,'lastDate'=>$lastDate);
		$getRecord=$this->common->createMonhtlyReport($whereCon);//echo $this->db->last_query().'<br>';
		//echo $this->db->last_query();//print_r($headers);
		//print_r($getRecord);
		
		
		
		$objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Your Name")->setLastModifiedBy("Your Name")->setTitle("Excel Export")->setSubject("Excel Export")->setDescription("Generated Excel file.");
        $column = 'A';
        $row = 1;  
		foreach ($headers as $index => $header) {
           $objPHPExcel->setActiveSheetIndex(0)->setCellValue($column . $row, $header);
             $column++;
        }
        $row = 2;
        foreach($getRecord as $data_row)
		{
		            $column = 'A';
             foreach($data_row as $value){$objPHPExcel->setActiveSheetIndex(0)->setCellValue($column . $row, $value);
                $column++;
            }
            $row++;
        }
		
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$file_name.'-attendance-report.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
	} 
 
 
#####################################################Android Login Start################################################################ 
public function isLoggedIn()
{
	$post=$this->input->post();
	//print_r($post);
	echo json_encode(array("response"=>"Successfully Back Again"));
	}
#####################################################Android Login End################################################################## 
 	public function location()
	{
		$data['title']='Location Tracking';
		$data['breadcrums'] = 'Location Tracking';
		$data['layout']= "testing/location.php";
		$this->load->view('base',$data);
		}
		
 
 
 	
}
