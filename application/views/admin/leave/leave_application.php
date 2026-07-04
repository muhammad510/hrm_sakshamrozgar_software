<?php
$leaveMatch = "Casual Sick Maternity Paternity Annual Paid Others Medical";
//echo $this->db->last_query();echo '<br>';
 //print_r($getData);echo '<br>';
$getString=explode(" ",$getData->leave_name);
   
   
   if (stripos($leaveMatch,$getString[0])!==false)
   {
       $leaveApp=$getString[0];
     }
	 else
	 {
	 	$leaveApp='normal';
		}
   //	echo $leaveApp.'<br>';
	//print_r($getData);

?>

<div class="row row-sm">
	<div style="font-weight:700;">
		To,<br />
		The Branch Manager,<br/>
		<?php echo $getData->name;?>,<br />
		<?php echo system_info('company_name'); ?><br />
	</div>
	<div style="padding-left:10px;margin: 20px auto 20px auto;">Dear Sir,</div>
		<p>
        	<?php if($getData->total_leave=='1')
			{
				if($leaveApp=='Casual')
				{	
					echo 'I hope you are doing well. I am writing to request a one-day leave on <strong>'.date('d-M-Y',strtotime($getData->from_date)).'</strong> due to personal reasons that require my immediate attention. My pending tasks are up to date, and I will ensure that they are completed within the prescribed timelines';
				}
				else if($leaveApp=='Medical' || $leaveApp=='Sick')
				{	
						echo 'I hope you are doing well. I am writing to request a one-day leave on <strong>'.date('d-M-Y',strtotime($getData->from_date)).'</strong> to attend a scheduled medical appointment. I will make sure to complete any pending work before my absence and will ensure that my colleagues are informed and can assist with any urgent matters.';
					}
				if($leaveApp=='Paid')
				{	
					echo 'I hope you are doing well. I am writing to request a one-day leave on <strong>'.date('d-M-Y',strtotime($getData->from_date)).'</strong> due to personal reasons that require my immediate attention. So, you can cut my salary for taking leave. You can My pending tasks are up to date, and I will ensure that they are completed within the prescribed timelines';
				}
				
			}else
			{
					if($leaveApp=='Casual')
					{	
					echo 'I hope you are doing well. I am writing to request a leave from <strong>'.date('d-M-Y',strtotime($getData->from_date)).'</strong> to <strong>'.date('d-M-Y',strtotime($getData->end_date)).'</strong> due to personal reasons that require my immediate attention. My pending tasks are up to date, and I will ensure that they are completed within the prescribed timelines';
				}
				else if($leaveApp=='Medical' || $leaveApp=='Sick')
				{	
						echo 'I hope you are doing well. I am writing to request a leave from <strong>'.date('d-M-Y',strtotime($getData->from_date)).'</strong> to <strong>'.date('d-M-Y',strtotime($getData->end_date)).'</strong> due to illness reasons that require my immediate attention.. I will make sure to complete any pending work before my absence and will ensure that my colleagues are informed and can assist with any urgent matters.';
					}
					else if($leaveApp=='Paid')
					{	
					echo 'I hope you are doing well. I am writing to request a leave from <strong>'.date('d-M-Y',strtotime($getData->from_date)).'</strong> to <strong>'.date('d-M-Y',strtotime($getData->end_date)).'</strong> due to personal reasons that require my immediate attention. So, you can cut my salary for taking leave. My pending tasks are up to date, and I will ensure that they are completed within the prescribed timelines';
				}
					else
					{	
					echo 'I hope you are doing well. I am writing to request a leave from <strong>'.date('d-M-Y',strtotime($getData->from_date)).'</strong> to <strong>'.date('d-M-Y',strtotime($getData->end_date)).'</strong> due to personal reasons that require my immediate attention. My pending tasks are up to date, and I will ensure that they are completed within the prescribed timelines';
						}
				}
				
					?>
        
      </p>
		<p>I believe it would not be feasible for me to come to the office or work during this period. Therefore, I kindly request you to accept my sick leave application and grant me leave <?php if($getData->total_leave=='1'){echo ' for one day on <strong>'.date('d-M-Y',strtotime($getData->from_date)).'</strong>';}else{ echo 'from <strong>'.date('d-M-Y',strtotime($getData->from_date)).'</strong> to <strong>'.date('d-M-Y',strtotime($getData->end_date)).'</strong> for '.$getData->total_leave .' days';}?>. Your understanding and support in this matter will be highly appreciated.</p>
		
		<div style="margin: 20px auto 10px auto;"> Thank you for considering my request,</div>
        <div style="margin: 0px auto 5px auto;"> Regards,</div>
		<div style="margin-bottom:10px;font-size:.9rem;">Name : <span style="font-weight:600;text-transform:uppercase;padding-left:5px;"><?php echo $getData->name;?></span></div>
        <div style="margin-bottom:10px;font-size:.9rem;">Designation : <span style="font-weight:600;padding-left:5px;"><?php echo $getData->name;?></span></div>
        <div style="margin-bottom:35px;font-size:.9rem;">Date : <span style="font-weight:600;padding-left:5px;"><?php echo date('d-M-Y',strtotime($getData->created_date));?></span></div>
 
        		<?php 
					 if($getData->status=='4'){$status='<div class="appResultMsg bg-warning">Your application is now pending. So,please keep be patient.</div>';} 
					else if($getData->status=='1'){$status='<div class="appResultMsg bg-success">Congratulations your application has been approved by authority.</div>';} 
					else if($getData->status=='2'){$status='<div class="appResultMsg bg-danger ">Sorry your application has been rejected by authority.</div>';}
					else if($getData->status=='3'){$status='<div class="appResultMsg bg-secondary">Oops it seems your application has been hold by authority</div>';} echo $status;
				?>
      
       <input type="text" id="appStsShow" value="<?php echo $getData->status;?>" /> 
        
</div>
<style>
.appResultMsg{padding:20px;padding-right:20px;padding-left:20px;margin:auto auto 35px auto;width:70%;border-radius:10px;text-align: center; }
</style>