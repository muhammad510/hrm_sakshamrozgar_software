<div class="inner-body">
<!-- Page Header -->
<div class="page-header">
  <div>
    <h2 class="main-content-title tx-24 mg-b-5">Camwell Solution LLP</h2>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="javascript:void(0);">All</a></li>
      <li class="breadcrumb-item active" aria-current="page">View</li>
    </ol>
  </div>
  <div class="d-flex">
    <div class="justify-content-center">
      <button type="button" class="btn btn-white btn-icon-text my-2 me-2"> <i class="fe fe-download me-2"></i> Import </button>
      <button type="button" class="btn btn-white btn-icon-text my-2 me-2"> <i class="fe fe-filter me-2"></i> Filter </button>
      <button type="button" class="btn btn-primary my-2 btn-icon-text"> <i class="fe fe-download-cloud me-2"></i> Download Report </button>
    </div>
  </div>
</div>
<!-- End Page Header -->
<style>
	.miBck a:hover{ background-color:#645bca; color:#fff;}
	.miBck{ font-weight:600;text-transform: uppercase; float:right;margin-right: 10px;padding-top: 7px;}
	.miBck a{ border:1px solid #645bca;padding: 8px 12px 8px 12px;border-radius: 5px;color: #645bca;font-weight: bold;}
	.miLst{ font-weight:600;text-transform: uppercase;}
	.miLst i{ background-color: #645bca;padding: 11px 11px 10px 10px ;margin-right: 10px;border-radius: 20px;color: #fff;font-weight: bold;}
.miHeader{padding:10px 15px 10px 15px;border-bottom: 1px solid #cccece;margin: 0px -10px 20px -10px;border-top-left-radius: 5px;border-top-right-radius: 5px;}
	.cardTtl{border:1px solid #fff;padding:0px 0px 40px 0px;margin-bottom: 20px;border-radius: 5px;background-color: #fff;}
	
.wrKng {color: white;background-color: rgb(4, 155, 215);padding: 3px 8px 3px 8px;font-size: .65rem;border-radius: 12px;}	
	
	</style>
<!-- Row -->
<div class="row row-sm">
  <div class="cardTtl">
    <div class="miHeader"> <span class="miLst"><i class="fe fe-sliders"></i><?php echo $title;?></span> </div>
    <div class="col-md-12 col-lg-12">
      <div class="row row-sm">
       <?php 
	   		/*$temp_all_row_punch = $this->sql_db->select('*')->where('MachineNo','101')->where('Tran_MachineRawPunchId >','90')->like('CAST(PunchDatetime as date)', date('Y-m-d'),'after')->order_by('Tran_MachineRawPunchId', 'ASC')->get('Tran_MachineRawPunch')->result_array();
	 echo $this->sql_db->last_query();
	   	echo '<pre>';
	   		print_r($temp_all_row_punch[0]);
	   	echo '</pre>';*/
		
		
		
//		$where=array('punchID'=>'100');
//		$getLiveRecord=$this->synchronise->getLiveRecordList($where);
//		print_r($testMode);
//		
	   ?>
       
        <!--<table class="table text-nowrap text-md-nowrap table-striped table-bordered table-hover mg-b-0" id="shift_list">
          <thead class="ami_tHeader">
            <tr>
              <th>S. No. </th>
              <th style="text-align:center">Row Punch ID</th>
              <th>Card No.</th>
              <th>Machine No.</th>
              <th>Send Type</th>
              <th>PunchDateTime</th>
              <th>Dateime1</th>
            </tr>
          </thead>
          <tbody>
             <?php 
			 	 if(!$getLiveRecord)
				 {$cnt=0;
					foreach($getLiveRecord as $punch)
					{$cnt++;
					?>
                    <tr>
                        <th><strong><?php //echo $cnt;?>.</strong></th>
                        <th style="text-align:center"><?php //echo $punch['Tran_MachineRawPunchId'];?></th>
                        <td><?php //echo $punch['CardNo'];?></td>
                        <td><?php //echo $punch['MachineNo'];?></td>
                        <td><?php //echo $punch['senddata'];?></td>
                        <td><?php //echo date('Y-m-d H:i:s',strtotime($punch['Dateime1']));?></td>
                        <td><?php //echo $punch['PunchDatetime'];?></td>
                    </tr>
            		<?php }}?>
                </tbody>
        </table>-->
        <?php 
				
		//print_r($getEmp[0]);
		print_r($were);
		?>
        
        
     <div class="table-responsive">   
        <table class="table text-nowrap text-md-nowrap table-striped table-bordered table-hover mg-b-0" id="shift_list">
          <thead class="ami_tHeader">
             <tr>
                  <th>S. No. </th>
                  <th>ID</th>
                  <th>Employee Name</th>
                  <th>In-Time</th>
                  <th>Out-Time</th>
                  <th>Duration</th>
                  <th>Status</th>
            </tr>
          </thead>
              <tbody>
            <?php
           	print_r($testMode);
			?>
            	
             </tbody>
        </table>
        
       </div> 
        
        
        
        
        
        
        
        
        
        
        
        
        
      </div>
    </div>
  </div>
  <!-- End Row -->
</div>
<style>
.mibdge{ padding:6px 0px 6px 0px;width:70px;}
.ami_tHeader{background-color:#088;}
.ami_tHeader >tr>th{ color:#fff;font-weight: 600;padding:13px 7px 13px 7px;}
</style>
