<?php

class Attendance_report_model extends CI_Model
{

	public function __construct()
	{

		parent::__construct();

		


	}

	/*-----------------------------Daily Attendance Start-------------------------------*/

	public function attendance_report_query($where = false)
	{

		$field = array('s.id', 's.employee_id', 's.name', 's.status', 's.attendance_status', 's.log_in_time', 's.log_out_time', 'sm.shift_name', 'sm.shift_start', 'sm.shift_end');
		$i = 0;
		foreach ($field as $item) {

			if (!empty($where['search']['value'])) {
				if ($i === 0) {
					$this->db->group_start();
					$this->db->like($item, $where['search']['value']);
				} else {
					$this->db->or_like($item, $where['search']['value']);
				}
				if (count($field) - 1 == $i) {
					$this->db->group_end();
				}
			}
			$i++;
		}

		$this->db->join('shift_manage as sm', 'sm.id = s.shift', 'left');
		$this->db->select('s.id, s.employee_id, s.name, s.status, s.attendance_status, s.log_in_time, s.log_out_time, sm.shift_name, sm.shift_start, sm.shift_end')->from('staff as s');

		/*if(!empty($where['designation'])){
                $this->db->where('des_title',$where['designation']);
            }
            if(!empty($where['payscale'])){
                $this->db->where('payscale',$where['payscale']);
            }
            if(!(empty($where['strtDt']) && empty($where['endDt'])))
            {
                $this->db->where('created_at >=',$where['strtDt']);
                $this->db->where('created_at <=',$where['endDt']);
            }*/

		if (isset($where['order']) && !empty($where['order'])) {
			$this->db->order_by($field[$where['order']['0']['column']], $where['order']['0']['dir']);
		} else {

			$this->db->order_by('id', 'desc');
		}
	}

	public function attendance_report($where = false)
	{

		$this->attendance_report_query($where);

		if ($where['length'] != -1) {
			$this->db->limit($where['length'], $where['start']);
		}
		return $this->db->get()->result();
	}

	public function attendance_report_count($where = false)
	{

		$this->attendance_report_query();
		return $this->db->get()->num_rows();
	}

	public function attendance_report_filter_count($where = false)
	{

		$this->attendance_report_query($where);
		return $this->db->get()->num_rows();
	}


	// #################################################################################

	function get_employee()
	{
		$this->db->select('*');
		$this->db->from('staff');
		return $this->db->get()->result();
	}

	function attendance_day_wise($month=0,$year=0,$last_date_of_month=NULL,$emp_id=NULL)	
	{
		$this->db->select('*');
		$this->db->from('staff_attendance');
		$this->db->where('employee_id',$emp_id);
		$this->db->where('attendance_date>=',$year.'-'.$month.'-1');
		$this->db->where('attendance_date<=',$year.'-'.$month.'-'.$last_date_of_month)->order_by('attendance_date','asc');		
		return $this->db->get()->result_array();
		

	}
	public function day_wise_logged_details($emp_id,$optDate)	
	{
		$getUser=$this->db->select('name,biometric_id')->from('staff')->where('id',$emp_id)->get()->row();
		$dateFrm=$optDate.' 00:00:00';$dateTo=$optDate.' 23:59:59';
		if($getUser)
		{
			$this->db->where(array('staff_id'=>$getUser->biometric_id))->delete('temp_logged_user');
			$loggedDet=$this->db->select('id,PunchDatetime')->from('tran_machinerawpunch')->where('CardNo',$getUser->biometric_id)->where('PunchDatetime >=',$dateFrm)->where('PunchDatetime <=',$dateTo)->order_by('PunchDatetime', 'ASC')->get()->result();
			 if($loggedDet)
			 {
				$cnt=0;
				foreach($loggedDet as $logd)
				{
					$cnt++;
					if($cnt % 2==0)
					{
						$getLstRecord=$this->db->select('*')->from('temp_logged_user')->where('staff_id',$getUser->biometric_id)->limit('1')->order_by('id', 'DESC')->get()->row();
						if($getLstRecord->out_time=='')
						{
							$logOut=array('out_time'=>$logd->PunchDatetime);
							 if($this->db->where('id',$getLstRecord->id)->update('temp_logged_user',$logOut)){$retrunR='1';}else{$retrunR='0';}
							}
						}
						else
						{
							$logCreate=array('staff_id'=>$getUser->biometric_id,'in_time'=>$logd->PunchDatetime);
							if($this->db->insert('temp_logged_user',$logCreate)){$retrunR='1';}else{$retrunR='0';}
							}
					
					}
				if($retrunR=='1')
				{
					$lgDet='';$sno=0;$getLogged=$this->db->select('*')->from('temp_logged_user')->where('staff_id',$getUser->biometric_id)->get()->result();
					if($getLogged)
					{
						foreach($getLogged as $lgd)
						{
							$logIn=$lgd->in_time?date('h:i:s a',strtotime($lgd->in_time)):'N/A';
							if(date('Y-m-d',strtotime($lgd->in_time))==date('Y-m-d',strtotime($lgd->out_time))){$logOut=date('h:i:s a',strtotime($lgd->out_time));}
							else{$logOut='<span style="font-weight:700;color: #ea4200;">N/A</span>';}						
							$traceLoc='traceUserLoc---admin/attendance/traceLocation---'.$emp_id.'---opted';
//	SELECT * FROM `staff_attendance` where attendance_date='2024-09-07' ORDER BY `employee_id` ASC 
//	SELECT tm.id,s.id as empId,s.name,tm.CardNo,tm.PunchDatetime FROM tran_machinerawpunch as tm left join staff as s on s.biometric_id=tm.CardNo where tm.PunchDatetime >'2024-09-04 12:00:00' and tm.PunchDatetime <'2024-09-04 23:59:59' ORDER BY s.id DESC 
							$sno++;
							$lgDet.='<tr><td><span style="color:#131313;font-weight: 700;">'.$sno.'.</span></td><td>'.$logIn.'</td><td>'.$logOut.'</td><td  style="text-align:center"><span class="locateNow getAction" data-id="'.$traceLoc.'" id="softArena'.$emp_id.'"><i class="si si-location-pin"></i></span></td></tr>';
							}
						}
						else{$lgDet='<tr><td colspan="4"><div class="noRcrd"> No Record Found</div></td></tr>';}
					}else{$lgDet='<tr><td colspan="4"><div class="noRcrd"><div class="noRcrd"> No Record Found</div></div></td></tr>';}	
					$getUser->loggedHistory=$lgDet;	
					$getUser->loggeDate=$optDate;		
				}
				else
				{
						$getAtdnc=$this->db->select('*')->from('staff_attendance')->where('employee_id',$emp_id)->where('attendance_date',date('Y-m-d'))->get()->row();
						if($getAtdnc)
						{	
							$logIn=$getAtdnc->log_in_time?date('h:i:s a',strtotime($getAtdnc->log_in_time)):'N/A';
							$logOut=$getAtdnc->log_out_time?date('h:i:s a',strtotime($getAtdnc->log_out_time)):'<span class="wrKng">Still working...</span>';
							$getAtcnMode=(($optDate==date('Y-m-d'))?'---today':'---custom');
							
							$traceLoc='traceUserLoc---admin/attendance/traceLocation---'.$emp_id.$getAtcnMode;
						$getUser->loggedHistory='<tr><td><span style="color:#131313;font-weight:700;">1.</span></td><td>'.$logIn.'</td><td>'.$logOut.'</td><td style="text-align:center"><span class="locateNow getAction" data-id="'.$traceLoc.'"  id="softArena'.$emp_id.'"><i class="si si-location-pin"></i></span></td></tr>';	
							}
							else
							{
								$getUser->loggedHistory='<tr><td colspan="4"><div class="noRcrd"> No Record Found</div></td></tr>';	
								
								}
								$getUser->loggeDate=date('d M,Y',strtotime($optDate));	
					}
			}
		return $getUser;
	}
	public function traceLocation($empId,$optDate)
	{		
		$getUser=$this->db->select('employee_id,name,surname,image')->from('staff')->where('id',$empId)->get()->row_array();
		if($getUser)
		{
			  $getCustom=explode("::",$optDate);$customDate=date('Y-m-d',strtotime($getCustom[1]));
			  $getAttendance=$this->db->select('log_in_time,log_out_time,in_location,out_location')->from('staff_attendance')->where('employee_id',$empId)->where('attendance_date',$customDate)->get()->row(); 
			  if($getAttendance)
			  {
			  	$getUser['log_in_time']=$getAttendance->log_in_time;$getUser['log_out_time']=$getAttendance->log_out_time;
				$getUser['in_location']=$getAttendance->in_location;$getUser['out_location']=$getAttendance->out_location;
				}
				else{$getUser['log_in_time']=NULL;$getUser['log_out_time']=NULL;$getUser['in_location']=NULL;$getUser['out_location']=NULL;}
				return $getUser;
			}
			else{return false;}
		}
	public function employeAtt_report()
	{
	  $this->db->select('s.id,s.employee_id,s.name,s.surname,designation_name,department_name,branch_name,shift,shift_start,shift_end')->from('staff as s')->where('s.status','1');
		$this->db->join('designation as d', 'd.id=s.designation', 'left')->join('department as dept', 'dept.id=s.department', 'left');
		$this->db->join('branch_manage as br', 'br.id=s.branch_id', 'left');
		$this->db->join('shift_manage as sft', 'sft.id=s.shift', 'left');
		$result = $this->db->get();
		return $result->result();
	}
	public function monthlyReport($where)
	{
		$getTdCls=array('attScndC','atThrdC','atFrth','atFrth','atFrth','atFrth','atThrdC','atFrth','atFrth','atFrth','atFrth','atSvnth','atThrdC','atFrth','atFfth','attScndC','atFfth','attScndC','atFfth','atSxth','atFfth','atFfth','atFfth','atFfth','attScndC','atFfth','attScndC','atSxth','atSvnth','atSvnth','atEgth');
		$tDyCls=array('s3','s3','sFrth','s3','sFscnd','sBndn','s3','sFrth','sFscnd','sAtFth','sFrtWk','sSxth','s3','sSxth','sSxth','sMth','sMth','sMth','sMth','sSxth','sAtFth','s3','s3','sMth','s25W','sFrtWk','sSxth','sMth','s3','sSxth','sSxth'); 
		$tWeekCls=array('sCmn','sCmn','wFrth','sCmn','sFscnd','wBndn','sCmn','wFrth','wFscnd','sAtFthW','sAtFthW','sTue','sCmn','sTue','sTue','sSun','sMnSvn','sSun','sSun','sSun','sAtFthW','sCmn','sCmn','sSun','sMnSvn','sAtFthW','sTue','sSun','sCmn','sTue','sTue');	
		$tDyFrLoggCls=array('s3','s3','sFrth','s3','sFscnd','sBndn','s3','sFrth','sFscnd','sFfth','sFscnd','sSvnth','s3','sSvnth','s3','s3','sSvnth','sSvnth','s3','sFscnd','sFrth','s3','s3','s3','sScnd','sFfth','sFscnd','s3','s3','s3','prg'); 
		
		$durTime=floor(abs(strtotime($where['shift_end'])-strtotime($where['shift_start']))/3600);
		
		
		
		
		 $hrThead='';$hrBody='';
		 for($i=1;$i<=31;$i++):
		 $noDayInMnth='30';
		 $getDayNm=date('D',strtotime(date('Y-m-').$i));
		  if($where['srNo']=='1')
		  {
			$hrThead.='<td class="'.$getTdCls[($i-1)].'">
						   <p class="'.(($noDayInMnth >= $i)?$tDyCls[($i-1)]:'prg').'">'.(($noDayInMnth >= $i)?$i:'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;').'</p>
						   <p class="'.(($noDayInMnth >= $i)?$tWeekCls[($i-1)]:'prg').'">'.(($noDayInMnth >= $i)?$getDayNm:'').'</p>
					   </td>';
			 $hrBody.='<td class="'.$getTdCls[($i-1)].'"><p class="'.(($noDayInMnth >= $i)?$tDyCls[($i-1)]:'prg').'">'.(($noDayInMnth >= $i)?$where['shift_timing']:'').'</p></td>';  
			 }
			 else
			 {
				if($where['srNo']=='2')
				{
					$hrBody.='<td class="'.$getTdCls[($i-1)].'">
								<p class="'.(($noDayInMnth >= $i)?$tDyCls[($i-1)]:'prg').'">'.(($noDayInMnth >= $i)?$where['shift_timing']:'').'</p>
							  </td>';
					}
					else
					{
						if($noDayInMnth >= $i)
						{
						  $getLogin=$this->db->select('*')->from('staff_attendance')->where('employee_id',$where['userId'])->where('attendance_date',date('Y-m-').$i)->get()->row();
							$inTiming=$getLogin->log_in_time?date('H:i',strtotime($getLogin->log_in_time)):'00:00';
							$outTiming=$getLogin->log_out_time?date('H:i',strtotime($getLogin->log_out_time)):'00:00';
							$wrkDuration=$durTime.' Hrs';
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
								$totalWrk=round(($getTotalMinute/60),2);
							}
							else{$inTiming='';$outTiming='';$wrkDuration='';$totalWrk='';}
						
						$hrBody.='<td class="'.$getTdCls[($i-1)].'"><p class="'.(($noDayInMnth >= $i)?$tDyFrLoggCls[($i-1)]:'prg').'">'.$inTiming.'</p></td>';
						$hrOutBody.='<td class="'.$getTdCls[($i-1)].'"><p class="'.(($noDayInMnth >= $i)?$tDyFrLoggCls[($i-1)]:'prg').'">'.$outTiming.'</p></td>';	
						$hrWrkingBody.='<td class="'.$getTdCls[($i-1)].'"><p class="'.(($noDayInMnth >= $i)?$tDyFrLoggCls[($i-1)]:'prg').'">'.$wrkDuration.'</p></td>';
						$hrNetWrkBody.='<td class="'.$getTdCls[($i-1)].'"><p class="'.(($noDayInMnth >= $i)?$tDyFrLoggCls[($i-1)]:'prg').'">'.$totalWrk.'</p></td>';			  			  	  					} 
				}
			 endfor;		
			return array('hrThead'=>$hrThead,'hrBody'=>$hrBody,'hrOutBody'=>$hrOutBody,'workHrs'=>$hrWrkingBody,'hrNetWrk'=>$hrNetWrkBody);
		}

	
}
