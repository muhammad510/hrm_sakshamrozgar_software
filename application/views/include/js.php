<?php
$punch_in=($punchOverview->punch_in?$punchOverview->punch_in:"0");
$totalEmp=($punchOverview->punch_out?$punchOverview->punch_out:"0")+($punchOverview->punch_in?$punchOverview->punch_in:"0");
$totalPercentage = ($totalEmp != 0) ? number_format(($punch_in * 100 / $totalEmp), 2) : 0;

?>


 		<!-- BACK TO TOP -->
		<a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>
		<!-- JQUERY JS -->
		<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
		 
  		 <script src="<?php echo base_url('assets/plugins/datatable/js/jquery.dataTables.min.js')?>"></script>
		<script src="<?php echo base_url('assets/plugins/datatable/js/dataTables.bootstrap5.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatable/js/dataTables.buttons.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatable/js/buttons.bootstrap5.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatable/js/jszip.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatable/pdfmake/pdfmake.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatable/pdfmake/vfs_fonts.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatable/js/buttons.html5.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatable/js/buttons.print.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatable/js/buttons.colVis.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatable/dataTables.responsive.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatable/responsive.bootstrap5.min.js')?>"></script>
        <script src="<?php echo base_url('assets/js/table-data.js')?>"></script> 
  
        
        
        
        
        <!-- BOOTSTRAP JS -->
		<script src="<?php echo base_url('assets/plugins/bootstrap/js/popper.min.js');?>"></script>
		<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js');?>"></script>
		<!-- PERFECT SCROLLBAR JS -->
		<script src="<?php echo base_url('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js');?>"></script>
		<!-- SIDEMENU JS -->
		<script src="<?php echo base_url('assets/plugins/sidemenu/sidemenu.js');?>" id="leftmenu"></script>
		<!-- SIDEBAR JS -->
		<script src="<?php echo base_url('assets/plugins/sidebar/sidebar.js');?>"></script>
		<!-- SELECT2 JS -->
		<script src="<?php echo base_url('assets/plugins/select2/js/select2.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/select2.js');?>"></script>
 		<script src="<?php echo base_url();?>assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>
		<!--<script src="<?php //echo base_url('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js');?>"></script>-->
      		<!-- INTERNAL JQUERY-SIMPLE-DATETIMEPICKER JS -->
		<script src="<?php echo base_url();?>assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>
        <!-- STICKY JS -->  	   
	   <script src="<?php echo base_url();?>assets/js/form-elements.js"></script>
		<!-- BOOTSTRAP-DATEPICKER JS -->
		<script src="<?php echo base_url();?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    
        
        
        
        
		<!-- Internal Chart.Bundle js-->
		<script src="<?php echo base_url('assets/plugins/chart.js/Chart.bundle.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/apexcharts.js');?>"></script>
        <!-- Peity js-->
		<script src="<?php echo base_url('assets/plugins/peity/jquery.peity.min.js');?>"></script>
		<!-- Internal Morris js -->
		<script src="<?php echo base_url('assets/plugins/raphael/raphael.min.js');?>"></script>
		<script src="<?php echo base_url('assets/plugins/morris.js/morris.min.js');?>"></script>
		<!-- Circle Progress js-->
		<script src="<?php echo base_url('assets/plugins/circle-progress/circle-progress.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/chart-circle.js');?>"></script>
		<!-- Internal Dashboard js-->
		<script src="<?php echo base_url('assets/js/index.js');?>"></script>
        <!-- STICKY JS -->
		<script src="<?php echo base_url('assets/js/sticky.js');?>"></script>
     	
		<?php if($this->curent=='dashboard')
		{
			
			?>
		<script>
				
		
				
				
				
				var dataExpensepie = {labels: ['Approved Expense', 'Hold', 'Pending Expenses', 'Rejected Expenses'],
									  datasets:[{backgroundColor: ['#168400', '#5C10CC', '#FFAE01', '#f16d75'],
									  data: [<?php echo $expenseOverview->approved?$expenseOverview->approved:'0';?>, <?php echo $expenseOverview->hold?$expenseOverview->hold:'0';?>, <?php echo $expenseOverview->pending?$expenseOverview->pending:'0';?>, <?php echo $expenseOverview->reject?$expenseOverview->reject:'0';?>]}]};
				var optionExpensepie={maintainAspectRatio:false,responsive:true,legend:{display:false,},animation:{animateScale:true,animateRotate:true}};
				var expenseOverview = document.getElementById('expenseOverview');
				var myPieChart7 = new Chart(expenseOverview,{type: 'pie',data: dataExpensepie,options: optionExpensepie});	
				
				
				
														
/***************************************************************************************************************************/											
				var ctx = document.getElementById("dailyWorkingHrs").getContext("2d");
				// Create gradient
				var gradient = ctx.createLinearGradient(0, 0, 0, 400);
				gradient.addColorStop(0, "rgba(1, 143, 169, 0.3)");
				gradient.addColorStop(1, "rgba(1, 143, 169, 0)"); 
				const avgWorkingHrFrGrph = <?php echo json_encode($dailyWorkingGraph['avgWorkingHr']); ?>;
				// console.log(avgWorkingHrFrGrph);
				var myChart = new Chart(ctx,{type: 'line',
					data: {labels: getCurrentMonth(),datasets: [{label: "Working Details",borderColor: "rgba(1, 143, 169, 0.9)",borderWidth: 1,backgroundColor: gradient,
							data: avgWorkingHrFrGrph
						}]
					},
					options: {
						responsive: true,maintainAspectRatio: false,tooltips: {mode: 'index',intersect: false},hover: {mode: 'nearest',intersect: true},
						scales: {xAxes: [{ticks: {fontColor: "#006274",fontStyle: "bold"},gridLines: {color: 'rgba(119, 119, 142, 0.1)'}}],
							yAxes: [{ticks: {beginAtZero: true,min: 0,max: 10,stepSize: 1,fontColor: "#77778e",fontStyle: "bold"}, gridLines: {color: 'rgba(119, 119, 142, 0.1)'}}]},
						legend: {labels: {fontColor: "#006274"}}
					}
				});

/***************************************************************************************************************************/													
											
											
											
											
											
											
											
											
function getCurrentMonth() {
	let dates = [];
	let today = new Date();
	let year = today.getFullYear();
	let month = today.getMonth();
	let date = new Date(year, month, 1); 
	let endDate = new Date(year, month + 1, 0); 
	const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
	while (date <= endDate) {let dd = String(date.getDate()).padStart(2, '0');let mon = monthNames[date.getMonth()];dates.push(`${dd}-${mon}`);date.setDate(date.getDate() + 3); }
	let todayFormatted = String(today.getDate()).padStart(2, '0') + '-' +monthNames[today.getMonth()];
	if (!dates.includes(todayFormatted)) {dates.push(todayFormatted);}
	dates.sort((a, b) => {
		const [dayA, monthA] = a.split('-');
		const [dayB, monthB] = b.split('-');
		const monthIndexA = monthNames.indexOf(monthA);
		const monthIndexB = monthNames.indexOf(monthB);
		return new Date(year, monthIndexA, Number(dayA)) - new Date(year, monthIndexB, Number(dayB));
	});
	return dates;
}
				function panchGraph() 
				{
					
					let height = window.innerHeight;
					let grpHeight=0;grpHeight=(height> 900)?282:265;
					var options = {chart: {height: grpHeight,type: 'radialBar',offsetX: 0,offsetY: 0,},
						plotOptions:{
							radialBar:{startAngle: -135,endAngle: 135,size: 120,imageWidth: 50,imageHeight: 50,
								track:{strokeWidth: "80%",background: 'transparent',},
								dropShadow:{enabled: false,top: 0,left: 0,bottom: 0,blur: 3,opacity: 0.5},
								dataLabels:{name:{fontSize: '16px',color: undefined,offsetY: 30,},
									hollow:{size: "60%"},
									value:{offsetY: -10,fontSize: '22px',color: undefined,formatter: function (val) {return val + "%";}
									}
								}
							}
						},
						colors: ["#19b159"],
						fill: {type: "gradient",gradient: {shade: "dark",type: "horizontal",shadeIntensity: .5,gradientToColors: ["#19b159"],inverseColors: !0,opacityFrom: 1,opacityTo: 1,stops: [0, 100]}
						},stroke: {dashArray: 4},series: [<?php echo $totalPercentage;?>],
						labels:[""]
					};
				  document.querySelector('#panchGraphDetails').innerHTML ="";
					var chart = new ApexCharts(document.querySelector("#panchGraphDetails"), options);
					chart.render();
				/*--- Apex (#chart)closed ---*/
				}

</script>
      <?php }?>
      
      
        <!-- COLOR THEME JS -->
        <script src="<?php echo base_url('assets/js/themeColors.js');?>"></script>
        <!-- CUSTOM JS -->
        <script src="<?php echo base_url('assets/js/custom.js');?>"></script>
        <!-- SWITCHER JS -->
        <script src="<?php echo base_url('assets/switcher/js/switcher.js');?>"></script>
		<!--<script src="<?php //echo base_url('assets/js/software.min.js');?>"></script>   -->
        <script>
	  $('#changePassword').submit(function(e) {
	let target = $('#base_url').val()+"admin/profile/reset_password";
	e.preventDefault();
	$.ajax({url:target,type: "POST",data:$(this).serialize(),dataType: 'json',
			beforeSend: function() { $('#svChngePassword').html('<i class="fe fe-settings bx-spin"></i> Please Wait'); },
			complete: function() { $('#svChngePassword').html('<i class="ti-save"></i> Save changes'); },
			success: function(htmlAmi)
			{
				if(htmlAmi.addClas=='tst_success')
				{
				   $('#miRsltMessage').html(htmlAmi.msg).fadeIn();
					setTimeout(function(){window.location.reload(1);},3000);
					}
				else if(htmlAmi.addClas=='tst_warning'){$('#miRsltMessage').html(htmlAmi.msg).fadeIn()/*.fadeOut(4000)*/;}	
				else
				{
					if(htmlAmi.msg.prePass!=""){$('#ppass').html(htmlAmi.msg.prePass).fadeIn().fadeOut(4000);}
					if(htmlAmi.msg.newPass!=""){$('#nwPass').html(htmlAmi.msg.newPass).fadeIn().fadeOut(4000);}
					if(htmlAmi.msg.cnfPass!=""){$('#cnf_pass').html(htmlAmi.msg.cnfPass).fadeIn().fadeOut(4000);}
					}	
		}
	});

}); 
	
function toastMultiShow(adCls, msg, icon) {
    let valid = '';
    let myClass = "tst_success tst_warning tst_danger tst_default";
    let restCls = myClass.replace(adCls, " ");
    let addonMsg = '';
    $.each(msg, function(i, item) { valid += '<li>' + item + '</li>'; });
    $('.tst_danger') /*.addClass('ts_dan')*/ ;
    $('.tst_warning').addClass('ts_war');
    if (adCls == 'tst_success') { addonMsg = icon + ' <ul>' + valid + '</ul>'; } else if (adCls == 'tst_danger') { addonMsg = icon + ' <ul>' + valid + '</ul>'; } else if (adCls == 'tst_warning') { addonMsg = icon + ' <ul>' + valid + '</ul>'; }else { addonMsg = icon + ' <ul>' + valid + '</ul>'; }
    $('.ami_toast').css('visibility', 'visible').html(addonMsg).addClass(adCls).removeClass(restCls);
    setTimeout(function() { $('.ami_toast').css('visibility', 'hidden') }, 2000);
}

$(function()
{	
	$(document).on('click', '.amoliActn', function (e) {
		let clickBtn=$(this).attr('id');
		if(clickBtn=='syncAttendance')
		{
			let target=$(this).attr('data-id');
			let msg=['Welcome to show on ','Hello setting will'];
			$('#'+clickBtn).addClass('mSpin prTm');
			$.post(target,{actn:'isCnfrm'},function(htmlAmi)
			{
			   // toastNotify('tDefault', msg,'<i class="si si-check"></i>');
			    toastNotify(htmlAmi.adClas,htmlAmi.msg,htmlAmi.icon);
				window.setTimeout(function() {$('#'+clickBtn).removeClass('mSpin prTm');}, 2000); 	
				},'json');
			}
	});	
	
  });
  
function toastNotify(adCls, msg, icon) {
    let valid = '';
    let myClass = "tSuccess tWarning tDanger tDefault";
    let restCls = myClass.replace(adCls, " ");
    let addonMsg = '';let nIcn='';
    $.each(msg, function(i, item) { valid += '<li>'+ icon +" " + item + '</li>'; });
    if (adCls == 'tSuccess') { addonMsg =' <ul>' + valid + '</ul>'; } else if (adCls == 'tDanger') { addonMsg =' <ul>' + valid + '</ul>'; } else if (adCls == 'tWarning') { addonMsg =' <ul>' + valid + '</ul>'; }else if (adCls == 'tDanger') { addonMsg = ' <ul>' + valid + '</ul>'; } else if (adCls == 'tDefault') { addonMsg = ' <ul>'  +  valid +  '</ul>'; }else { addonMsg =  ' <ul>' + valid +  '</ul>'; }
    $('.rgt_notify').css('visibility', 'visible').html(addonMsg).addClass(adCls).removeClass(restCls);
    setTimeout(function() { $('.rgt_notify').css('visibility', 'hidden') }, 2000);
}  
  
</script>
