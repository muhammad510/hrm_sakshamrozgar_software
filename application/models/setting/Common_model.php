<?php
class Common_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->logCat=$this->session->userdata('user_cate');
	    $this->logBr=$this->session->userdata('mi_brID');
	}

	function del_data_con($tblName, $con, $val)
	{
		if ($val) {
			$this->db->where($con, $val);
			$query = $this->db->delete($tblName);
			if ($query) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}


	function del_data_multi_con($tblName, $con)
	{
		if ($con) {
			$this->db->where($con);
			$query = $this->db->delete($tblName);
			if ($query) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	function save_data($table, $val)
	{
		if ($this->db->insert($table, $val)) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}

	function all_data($table, $sel)
	{
		return $this->db->select($sel)->order_by('id', 'ASC')->get($table)->result_array();
	}

	function all_data_con($table, $val, $sel)
	{
		return $this->db->select($sel)->where($val)->get($table)->result_array();
	}

	function get_data($table, $data, $sel)
	{
		return $this->db->select($sel)->where($data)->get($table)->row_array();
	}

	function get_last($table, $sel)
	{
		return $this->db->select($sel)->order_by('id', 'DESC')->get($table)->row_array();
	}
	function update_data($table, $con, $data)
	{
		$this->db->where($con);
		if ($this->db->update($table, $data)) {
			return true;
		} else {
			return false;
		}
	}

	// public function update_datas($table, $data)
	// {
	//     $this->db->where('id', $data['id']);
	//     $this->db->update($table, $data);
	// }

	function del_data($val)
	{
		if ($val) {
			$this->db->where('id', $val['id']);
			$query = $this->db->delete($val['table']);
			if ($query) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}


	function chageStatus($value)
	{
		$this->db->where('id', $value['id'])->update($value['table'], array('status' => $value['status']));
	}



	public function count_all($table, $where = "1=1")
	{
		$this->db->from($table);
		$this->db->where($where);

		return $this->db->count_all_results();
	}

	public function sum_all($sum, $table, $where = "1=1")
	{
		$this->db->select_sum($sum);
		$this->db->from($table);
		$this->db->where($where);
		$query = $this->db->get();
		return $query->row_array();
	}

	function getIndianCurrency(float $number)
	{
		$decimal=round($number-($no=floor($number)), 2) * 100;
		$hundred = null;
		$digits_length = strlen($no);
		$i = 0;
		$str = array();
		$words = array('0' => '', '1' => 'one', '2' => 'two','3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six','7' => 'seven', '8' => 'eight', '9' => 'nine','10' => 'ten', '11' => 'eleven', '12' => 'twelve',
						'13' => 'thirteen', '14' => 'fourteen', '15' => 'fifteen','16' => 'sixteen', '17' => 'seventeen', '18' => 'eighteen','19' => 'nineteen', '20' => 'twenty', '30' => 'thirty',
						'40' => 'Forty', '50' => 'Fifty', '60' => 'Sixty','70' => 'Seventy', '80' => 'Eighty', '90' => 'Ninety');
		$digits = array('', 'hundred', 'thousand', 'lakh', 'crore','arb','kharab','neel','padma');
		while ($i < $digits_length)
		{
			$divider = ($i == 2) ? 10 : 100;
			$number = floor($no % $divider);
			$no = floor($no / $divider);
			$i += $divider == 10 ? 1 : 2;
		if($number) 
		{
			$plural = (($counter = count($str)) && $number > 9) ? 's' : null;
			$hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
			$str[] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural . ' ' . $hundred : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural . ' ' . $hundred;
			} 
			else $str[] = null;
		}
		$rupees = implode('', array_reverse($str));
		$paise = ($decimal > 0) ? (($rupees >0)?'<span style="color:#949794"> and ':'<span style="color:#949794"> only ') . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' paise </span>' : '';
		return ($rupees ?'<span style="color:#393939">'.$rupees . 'rupees </span>' : '') . $paise;
	}

	function all_data_list($table, $sel)
	{
		return $this->db->select($sel)->order_by('id', 'ASC')->get($table)->result_array();
	}
	function recent_joint($tblName, $sel)
	{
		$this->db->select($sel);
		$this->db->from($tblName);
		$this->db->limit('5');
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get();
		return $result->result();
	}
	function get_first($table, $sel)
	{
		return $this->db->select($sel)->order_by('id', 'ASC')->get($table)->row();
	}
	public function get_state_district($tblName, $con, $id)
	{
		$this->db->select('s.state_cities as st_name,d.state_cities as dist_name');
		$this->db->from($tblName);
		$this->db->where($tblName . '.' . $con, $id);
		$this->db->join('states_cities as s', 'users.state=s.id', 'left');
		$this->db->join('states_cities d', 'users.district=d.id', 'left');
		$result = $this->db->get();
		return $result->row();
	}
	
		public function getDataListByLimitRecent($tblName,$cond,$id,$limit)
	{
		return $this->db->from($tblName)->where($cond,$id)->limit($limit)->order_by('id','DESC')->get()->result();
	}	

	public function getDataList($tblName, $cond, $id)
	{
		$this->db->from($tblName);
		$this->db->where($cond, $id);
		$result = $this->db->get();
		return $result->result();
	}
	public function getDataListByCon($tblName,$where,$sel)
	{
		return $this->db->select($sel)->from($tblName)->where($where)->get()->result();
	}
	public function getRowData($tblName, $cond, $id)
	{
		$this->db->from($tblName);
		$this->db->where($cond, $id);
		$result = $this->db->get();
		return $result->row();
	}
	public function system_config()
	{
		$this->db->select('*');
		$query = $this->db->get('system_config');
		$config = $query->result_array();
		return $config;
	}

	public function employee_all_data($id)
	{
		$this->db->select('id, employee_id, name, gender');
		$this->db->where('id', $id);
		$data = $this->db->get('staff');
		return $data->row_array();
	}
    public function getLastRecord($tblName)
	{
		return $this->db->select('*')->from($tblName)->limit('1')->order_by('id', 'desc')->get()->row();
	}
	
public function shift()
{
	$curTime=date('H:i:s');
	if(($curTime > '02:00:00')&&($curTime <'10:00:00')){$return=array('curntShift'=>'17','offShift'=>'18');}
	else if(($curTime >'10:00:00')&&($curTime <'18:00:00')){$return=array('curntShift'=>'18','offShift'=>'19');}
	else if(($curTime > '18:00:00')&&($curTime <'23:59:59')){$return=array('curntShift'=>'19','offShift'=>'18');}
	else{$return=array('curntShift'=>'17','offShift'=>'18');}
		return $return;
	}	 	
public function balance_sheet($where)
{
	$return=$this->db->select('*')->from('company_income')->where('id >',$where['id'])->get()->result();$result=false;
	if($return)
	{
		$cnt=0;
		foreach($return as $list)
		{
			$cnt++;
			$getRecord=$this->db->select('*')->from('company_income')->where('id <',$list->id)->limit('1')->order_by('id', 'desc')->get()->row();
			$changeClosing=$getRecord->closing_balance+$list->credit_amt-$list->debit_amt;
			$newOpening=array('opening_balance'=>$getRecord->closing_balance,'debit_amt'=>$list->debit_amt,'credit_amt'=>$list->credit_amt,'closing_balance'=>$changeClosing);
			$resultCnf=$this->update_data('company_income',array('id'=>$list->id),$newOpening);			
			$result=($resultCnf==1)?true:false;
			}
	 }
	 return $result;
  } 

	public function state_district($id)
	{
		return $this->db->select('d.id,d.state_cities as district,st.state_cities as state')->from('states_cities as d')->where('d.id', $id)->join('states_cities as st', 'd.parent_id=st.id', 'left')->get()->row();
	}
	public function getDataListByFilter()
	{
		$this->db->from('staff');
		$this->db->where('status','1');
		if($this->logCat=='5'){$this->db->where('branch_id',$this->logBr)->where('user_type','4');}
		$result = $this->db->get();
		return $result->result();
	}
	
	public function createMonhtlyReport($where)
	{
		$this->db->select($where['searchDt']);				   
		$this->db->from('staff as s')/*->where('employee_id',$where['empID'])*/->where('sf.attendance_date >=',$where['frmDate'])->where('sf.attendance_date <=',$where['lastDate'])->join('staff_attendance as sf', 'sf.employee_id=s.id', 'left')->join('designation as d', 'd.id=s.designation', 'left')->join('department as dept', 'dept.id=s.department', 'left')->join('branch_manage as br', 'br.id=s.branch_id', 'left')->join('shift_manage as sft', 'sft.id=s.shift', 'left')->group_by('sf.employee_id')->order_by('');
		$result = $this->db->get();
		return $result->result();	
		
		
		
	
		
		
		
		
/*	
		SELECT s.id,s.employee_id as empCode,CONCAT( IF(s.surname != '', s.surname, ''),IF(s.surname != '' AND s.name != '', ' ', ''), s.name) AS full_name,
MAX(CASE WHEN sf.attendance_date = '2024-12-01' THEN CONCAT(sf.log_in_time, '==', sf.log_out_time) END) AS '2024-12-01',MAX(CASE WHEN sf.attendance_date = '2024-12-02' THEN CONCAT(sf.log_in_time, '==', sf.log_out_time) END) AS '2024-12-02',
MAX(CASE WHEN sf.attendance_date = '2024-12-03' THEN CONCAT(sf.log_in_time, '==', sf.log_out_time) END) AS '2024-12-03',MAX(CASE WHEN sf.attendance_date = '2024-12-04' THEN CONCAT(sf.log_in_time, '==', sf.log_out_time) END) AS '2024-12-04',
        MAX(CASE WHEN sf.attendance_date = '2024-12-05' THEN CONCAT(sf.log_in_time, '==', sf.log_out_time) END) AS '2024-12-05',MAX(CASE WHEN sf.attendance_date = '2024-12-06' THEN CONCAT(sf.log_in_time, '==', sf.log_out_time) END) AS '2024-12-06',
        MAX(CASE WHEN sf.attendance_date = '2024-12-07' THEN CONCAT(sf.log_in_time, '==', sf.log_out_time) END) AS '2024-12-07',MAX(CASE WHEN sf.attendance_date = '2024-12-31' THEN CONCAT(sf.log_in_time, '==', sf.log_out_time) END) AS '2024-12-31'
From  staff as s left join staff_attendance as sf on sf.employee_id=s.id where s.status = '1'  group by sf.employee_id order by s.id asc			
		SELECT s.id,s.employee_id as empCode,CONCAT( IF(s.surname != '', s.surname, ''),IF(s.surname != '' AND s.name != '', ' ', ''), s.name) AS full_name From  staff as s left join staff_attendance as sf on sf.employee_id=s.id  WHERE  s.user_type = '4' AND s.status = '1' group by sf.employee_id order by s.id asc	
*/
	}
	public function createPdfReport($page)
	{
		$limit=10;$offset=($page?(($page-1)*$limit):0);
	    $this->db->select('s.id,s.employee_id,s.name,s.surname,designation_name,department_name,branch_name,shift,shift_start,shift_end')->from('staff as s')->where('s.status','1');
		$this->db->join('designation as d', 'd.id=s.designation', 'left')->join('department as dept', 'dept.id=s.department', 'left')->join('branch_manage as br', 'br.id=s.branch_id', 'left');
		$this->db->join('shift_manage as sft', 'sft.id=s.shift', 'left')->limit($limit, $offset);
		$result = $this->db->get();
		return $result->result();
	}
	
	public function attendanceReport($where)
	{
		$getTdCls=array('attScndC','atThrdC','atFrth','atFrth','atFrth','atFrth','atThrdC','atFrth','atFrth','atFrth','atFrth','atSvnth','atThrdC','atFrth','atFfth','attScndC','atFfth','attScndC','atFfth','atSxth','atFfth','atFfth','atFfth','atFfth','attScndC','atFfth','attScndC','atSxth','atSvnth','atSvnth','atEgth');
		$tDyCls=array('s3','s3','sFrth','s3','sFscnd','sBndn','s3','sFrth','sFscnd','sAtFth','sFrtWk','sSxth','s3','sSxth','sSxth','sMth','sMth','sMth','sMth','sSxth','sAtFth','s3','s3','sMth','s25W','sFrtWk','sSxth','sMth','s3','sSxth','sSxth'); 
		$tWeekCls=array('sCmn','sCmn','wFrth','sCmn','sFscnd','wBndn','sCmn','wFrth','wFscnd','sAtFthW','sAtFthW','sTue','sCmn','sTue','sTue','sSun','sMnSvn','sSun','sSun','sSun','sAtFthW','sCmn','sCmn','sSun','sMnSvn','sAtFthW','sTue','sSun','sCmn','sTue','sTue');	
		$tDyFrLoggCls=array('s3','s3','sFrth','s3','sFscnd','sBndn','s3','sFrth','sFscnd','sFfth','sFscnd','sSvnth','s3','sSvnth','s3','s3','sSvnth','sSvnth','s3','sFscnd','sFrth','s3','s3','s3','sScnd','sFfth','sFscnd','s3','s3','s3','prg'); 
		$durTime=floor(abs(strtotime($where['shift_end'])-strtotime($where['shift_start']))/3600);		
		$numDay=((strtotime($where['lastDate'])-strtotime($where['frmDate']))/ 86400)+1;
		$hrThead='';$hrBody='';
		 for($i=1;$i<=$numDay;$i++):// $numDay='31';
		  $getDayNm=date('D',strtotime($where['frmDate'].'+'.($i-1).' day'));
		  $dyAtt=date('Y-m-d',strtotime($where['frmDate'].'+'.($i-1).' day'));
		 // echo $getDayNm.'<br>'; $getDayNm=date('D',strtotime(date('Y-m-').$i));
		  if($where['srNo']=='1')
		  {
			$hrThead.='<td class="'.$getTdCls[($i-1)].'"><p class="'.(($numDay >= $i)?$tDyCls[($i-1)]:'prg').'">'.(($numDay >= $i)?$i:'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;').'</p>
						   <p class="'.(($numDay >= $i)?$tWeekCls[($i-1)]:'prg').'">'.(($numDay >= $i)?$getDayNm:'').'</p></td>';
			 $hrBody.='<td class="'.$getTdCls[($i-1)].'"><p class="'.(($numDay >= $i)?$tDyCls[($i-1)]:'prg').'">'.(($numDay >= $i)?$where['shift_timing']:'').'</p></td>';  
			 }
			 else
			 {
				if($where['srNo']=='2'){$hrBody.='<td class="'.$getTdCls[($i-1)].'"><p class="'.(($numDay >= $i)?$tDyCls[($i-1)]:'prg').'">'.(($numDay >= $i)?$where['shift_timing']:'').'</p></td>';}
				else
				{
						if($numDay >= $i)
						{
						  $getLogin=$this->db->select('*')->from('staff_attendance')->where('employee_id',$where['userId'])->where('attendance_date',$dyAtt)->get()->row();
							$inTiming=$getLogin->log_in_time?date('H:i',strtotime($getLogin->log_in_time)):'00:00';
							$outTiming=$getLogin->log_out_time?date('H:i',strtotime($getLogin->log_out_time)):'00:00';
							$wrkDuration=($durTime>9)?($durTime.'Hrs'):($durTime.' Hrs');
							if(($getLogin->log_out_time!=NULL)&&($getLogin->log_in_time!=NULL))
							{
								if($getLogin->log_in_time!=NULL){$getTotalMinute=round(abs(strtotime($getLogin->log_in_time) - strtotime($getLogin->log_out_time))/60,2);}
								else{$getTotalMinute=round(abs(strtotime($getLogin->log_in_time) - strtotime($where['shift_end']))/60,2);}
				  				}
								else
								{
									if($getLogin->log_in_time!=NULL){$getTotalMinute=round(abs(strtotime($getLogin->log_in_time) - strtotime($where['shift_end']))/60,2);}
								   else{$getTotalMinute='0';}
									}
							    $tHours=floor($getTotalMinute/60);
						        $tMinutes=round($getTotalMinute%60); 
								$totalWrk=(($tHours<10)?'0'.$tHours:$tHours).":".(($tMinutes<10)?'0'.$tMinutes:$tMinutes);
							}
						else{$inTiming='';$outTiming='';$wrkDuration='';$totalWrk='';}
						
						/*$isCls=($durTime>9)?'fntChng':'';*/
						
						$hrBody.='<td class="'.$getTdCls[($i-1)].'"><p class="'.(($numDay >= $i)?$tDyFrLoggCls[($i-1)]:'prg').'">'.$inTiming.'</p></td>';
						$hrOutBody.='<td class="'.$getTdCls[($i-1)].'"><p class="'.(($numDay >= $i)?$tDyFrLoggCls[($i-1)]:'prg').'">'.$outTiming.'</p></td>';	
						$hrWrkingBody.='<td class="'.$getTdCls[($i-1)].'"><p class="'.(($numDay >= $i)?$tDyFrLoggCls[($i-1)]:'prg')." ".$isCls.'">'.$wrkDuration.'</p></td>';
						$hrNetWrkBody.='<td class="'.$getTdCls[($i-1)].'"><p class="'.(($numDay >= $i)?$tDyFrLoggCls[($i-1)]:'prg').'">'.$totalWrk.'</p></td>';			  			  	  					} 
				}
			 endfor;		
			return array('hrThead'=>$hrThead,'hrBody'=>$hrBody,'hrOutBody'=>$hrOutBody,'workHrs'=>$hrWrkingBody,'hrNetWrk'=>$hrNetWrkBody);
		}	
	
}
