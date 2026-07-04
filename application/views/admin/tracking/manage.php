<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<div class="inner-body">                       
	<!-- Page Header -->
	<div class="page-header">
		<div>
			<h2 class="main-content-title tx-24 mg-b-5">
				<?php echo $title; ?>
			</h2>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url('staff/dashboard'); ?>">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Employee Tracking Details</li>
			</ol>
		</div>
		<div class="d-flex">
            <div class="justify-content-center">
              <a href="<?php echo base_url('admin/employee/grid');?>" class="btn btn-success btn-icon-text my-2 me-2"  title="Join Employee">
              	 <i class="fe fe-grid"></i> Employees 
              </a>
              <button type="button" class="btn btn-primary btn-icon-text my-2 me-2" id="miArvClk"> <i class="fe fe-filter me-2"></i> Current Time </button>
              <a href="<?php echo base_url('auth/login/signout');?>" class="btn btn-danger btn-icon-text  my-2 me-2"> <i class="fe fe-power me-2"></i> Sign Out </a>
            </div>
          </div>
	</div>
	<!-- End Page Header -->

	<style>
		.miBck a:hover{ background-color:#645bca; color:#fff;}
		.miBck{ font-weight:600;text-transform: uppercase; float:right;margin-right: 10px;}
		.miBck a{ border:1px solid #645bca;padding: 8px 12px 8px 12px;border-radius: 5px;color: #645bca;font-weight: bold;}
		.miLst{ font-weight:600;text-transform: uppercase;}
		.miLst i{ background-color: #645bca;padding: 11px 11px 10px 10px ;margin-right: 10px;border-radius: 20px;color: #fff;font-weight: bold;}
		.miHeader{padding:14px 5px 14px 15px;border-bottom: 1px solid #cccece;margin: 5px -10px 20px -10px;border-top-left-radius: 5px;border-top-right-radius: 5px;}
		.cardTtl{border:1px solid #fff;padding:0px 0px 40px 0px;margin-bottom: 75px;border-radius: 5px;background-color: #fff;}
.miSlwdth{ width:88.12%;}
	@media (min-width:1400px) and (max-width:2100px){
	.miSlwdth{ width:92.5%;}
	}
	#searchDetails{ min-height:150px;padding:25px 0px 10px 0px;}
.titleHead{color: #645bca;font-weight: bold;text-transform: capitalize;padding-bottom: 5px;border-bottom:1px solid #e8e8e8;margin-bottom: 10px;}


.mSrchPnl{ margin:-17px 0px 0px 0px;position: absolute;width:calc(100% - 30px);z-index: 1;cursor: pointer; display:none;}
.mSrchPnl ul{ list-style:none;background-color:#fff; border: 1px solid #d9d9d9;border-bottom-left-radius: 6px;border-bottom-right-radius: 6px;-webkit-box-shadow: 0px 3px 5px 0px rgba(145,145,145,1);-moz-box-shadow: 0px 3px 5px 0px rgba(145,145,145,1);box-shadow: 0px 3px 5px 0px rgba(145,145,145,1);max-height: 230px;overflow-x: hidden;overflow-y: scroll;scrollbar-width: thin;scrollbar-color: #24839f #fff;}
.mSrchPnl ul li{ padding:8px 0px 8px 8px; border-bottom:1px solid #d9d9d9;margin-left: -31px; color: #757575;font-weight: 600;}
.mSrchPnl ul li:last-child{ border-bottom:0px solid #000;} 
.mSrchPnl ul li span{color: #c65d00;padding-left: 5px;}
.mSrchPnl ul li i{color:#181;background:#F6F6FF;padding:10px 12px 12.6px 12px;font-size:14px;margin:3px 9px 3px -9px;}
.miPlease{color: #0087ff !important;padding:2px 0px 2px 15px !important;}
.miPlease i{ background-color:#0087ff !important;color: #fff !important;padding:8px !important; border-radius: 20px !important}
.miNoEmp{color: #d23d03 !important;padding:10px 0px 10px 10px !important;}
.miNoEmp i{ background-color:#d23d03 !important;color: #fff !important;padding:8px !important; border-radius: 20px !important}
.empTraceHistory{ background-color:#fafbf5; min-height:458px;margin: 0px 0px 0px -30px;border-left: 1px solid #e7eadb;}
.empDetail_s{ background-color:#fafbfa; min-height:458px;}
.profile-pic{ text-align:center;padding:40px 0px 40px 0px;}
.profile-pic img {width: 160px;height: 160px;object-fit: cover;border-radius:100%;margin-bottom: -7px;}
.profile-pic h5{ text-transform:uppercase;}
.profile-pic h6{ color: #6c6c6c;margin:0px 0px 0px 0px !important;}
.empDetail_s ul{ list-style:none;margin: 0px 0px 0px -32px;}
.empDetail_s ul li{ padding:.75rem 1.25rem;font-weight: 400;font-size: .875rem;background-color: #fafbf5;border-bottom:1px solid #e7eadb;}
.empDetail_s ul li span{ float:right; font-weight:700;color: #ff7800bf;} 
.empDetail_s ul li:last-child{border-bottom:0px solid red;}
#memDetails img {width: 50px;height: 50px;border-radius:50%;}#mUser {margin:-48px 0px 5px 55px;font-size: 11px;}.mEmpName {font-weight: 700;font-size: 12px;color: #005ec1;}
.mEmpID {font-weight: 700;color: #5b5b5a;}.mEmpTime {font-weight: 600;color: #039b29;}

.historyMode{min-height: 516px !important;}
.viewHistoryLoc{ padding:5px 7px 5px 7px; color:#fff;background-color: #008ea6;border-radius: 5px; cursor:pointer;}
.viewHistoryLoc:hover{ color:#eee;background-color: #00788c;}
.errMode{display: flex;justify-content: center;align-items: center;min-height: 515px !important;background-color:antiquewhite;color: #794200;}
.errMode i{ padding:5px;}
#traceMap {height:516px;}
.distance-box{position:absolute;top:10px;right:30px;background:white;padding:10px;border-radius:8px;box-shadow:0 0 5px rgba(0,0,0,0.3);font-family:Arial, sans-serif;z-index:999;}
.pointCol{color:#00a429;font-weight:600;}
@media (min-width:300px) and (max-width:500px){
	.empTraceHistory{margin:0px;}
	}
.locHistory{ width:100%; border-collapse: collapse; }
.locHistory thead{ background-color:#d9d9d9;}
.locHistory thead tr th{ padding:10px;}
.locHistory tbody tr th{ padding:10px;}
.locHistory tbody tr td{ padding:10px;}
.locHistory  th, td {
  border-bottom: 1px solid #ddd;
}
#trackDate,#trackHistoryRecord{display:none;}
#trackDate{padding:10px;background-color: #d9d9d9;}
#trackDate span{font-weight:600;color:brown;}
#trackDate span.backView{font-weight:600;float:right;}



#trackHistoryRecord{ min-height:475px;}
	</style>


	<!-- Row -->
	<div class="row row-sm">
		<div class="cardTtl">
			<div class="miHeader">
				<span class="miLst"><i class="si si-graph"></i><span id="bxTitleNm"><?php echo $title;?></span></span>
				<span class="miBck">
                	<a href="<?php echo base_url('staff/dashboard');?>" style="margin-left:-5px;" title="Back to dashbiard" class="miDefault">
                    	<i class="fe fe-arrow-left"></i>
                    </a>
                </span>
			</div>
			<div class="col-md-12 col-lg-12">
             <div id="amAccAllChanges">
           		<form method="post" id="employee_traking" data-id="<?php echo $traceUrl;?>"> 	     		
                	<div class="row">
                    <div class="col-md-<?php echo (($trackingType=='history')?'4':'12'); ?>">
                        <label>Emplyee Name/ID: <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-user"></i></span>
                            </div>
                            <input type="text" class="form-control miKeyUp" name="employeeDet" id="employeeDet" data-id="<?php echo $frSearchEmplyee; ?>">
                             <input type="hidden" id="empSrchdID" name="empSrchdID"/><input type="hidden" id="empOprMode" name="empOprMode" value="<?php echo $trackingType;?>"/>
                        </div>
                        <div class="mSrchPnl"><ul></ul></div>
                    </div>
                     <?php if($trackingType=='history'){?>
                    <div class="col-md-4">
                        <label>Month : <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-calendar"></i></span>
                            </div>
							<div class="miSlwdth"> 
							    <select class="form-control select2-with-search" name="month" id="month">
								   <option value=""> --- Select One --- </option>
								    <?php  $monthName=array('January','February','March','April','May','June','July','August','September','October','November','December');
										   foreach($monthName as $nme){$selected=(date('F',strtotime(date('y-m-d')))==$nme)?'selected="selected"':'';
										   ?>
										<option value="<?php print_r(date('m',strtotime($nme)));?>" <?php echo $selected; ?> ><?php print_r($nme);?></option>
										<?php };?>
								</select> 
							</div>  
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Year: <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="si si-calendar"></i></span>
                            </div>
							<div class="miSlwdth"> 
							    <select class="form-control select2-with-search arvOnChange" name="year" id="year">
								   <option value=""> --- Select One --- </option>
								    <?php $salYear=date('Y');for($x=0;$x<5;$x++){$session=$salYear-$x;?>
                                        <option value="<?php echo $session;?>" <?php if($session==date('Y')){echo 'selected="selected"';}?>  ><?php echo $session;?></option>
                                        <?php }?>
								</select> 
							</div>  
                        </div>
                    </div>  
                    <?php }?>
                    <div class="col-md-12">
                         <a href="<?php echo base_url('staff/dashboard');?>"  class="btn ripple btn-outline-dark"><i class="fe fe-arrow-left"></i> Back</a>
                         <button type="submit" class="btn ripple btn-outline-success pull-right" id="manageAction"><i class="ti-save"></i> Submit</button>
                    </div>
                </div>
                </form>
            </div>
           <div id="searchDetails">&nbsp;</div>    
		</div>
	</div>
	<!-- End Row -->
</div>
<script>
let map;
$(document).ready(function()
{	
	$(".miKeyUp").keyup(function()
	{
		let actNbtn = $(this).attr('id');
		if(actNbtn=='employeeDet')
		{
			let target=$(this).attr("data-id");let fldVal=$('#'+actNbtn).val();
			$('.mSrchPnl').show();$('.mSrchPnl ul').html('<li class="miPlease"><i class="fe fe-settings bx-spin"></i> Please wait...</li>');
			$.post(target,{oprType:$('#'+actNbtn).val()},function(htmlAmi){$('.mSrchPnl ul').html(htmlAmi);});
			}
		});
});	
$(function() 
 {
	$(document).unbind("click").on("click", '.getAction', function() 
	{
		let actNbtn = $(this).attr('data-id');
		let getData=actNbtn.split('===');	
		if(getData[0]=='findEmployee')
		{
			let target=$('#base_url').val()+getData[1];$.post(target,{id:getData[2]},function(htmlAmi)
			{$('.mSrchPnl').hide();$('.mSrchPnl ul').html('<li>Er. Amit Kumar </li>');$('#employeeDet').val(htmlAmi.name);$('#empSrchdID').val(htmlAmi.id);},'json');
			}
		else if(getData[0]=='findLocationDetails')
		{	
			let target=$("#base_url").val()+getData[1];
			$.post(target,{actMode:"viewDateWise",id:getData[2]},function(htmlAmi)
			{
				//$("#trackHistoryRecord").show().html(htmlAmi);
				
				toastMultiShow(htmlAmi.addClas,htmlAmi.msg,htmlAmi.icon);
				if(htmlAmi.addClas=="tst_success")
				{
					$(".locHistory").hide();
					$("#trackHistoryRecord").show();
					$("#trackDate").show().html(htmlAmi.trackingDt);
					traceDetails(htmlAmi,'trackHistoryRecord')
					}	
				},"json");
			
			}	
	});
});				
			
			
$('#employee_traking').submit(function(e) {
    let target = $(this).attr('data-id');
    e.preventDefault();
    $.ajax({
        url: target,
        type: "POST",
        data: $(this).serialize(),
        dataType: 'json',
        beforeSend: function() { $('#manageAction').html('<i class="fe fe-sun bx-spin"></i> Please Wait'); },
        complete: function() { $('#manageAction').html('<i class="ti-save"></i> Submit'); },
        success: function(htmlAmi)
		{
		    if(htmlAmi.addClas=="tst_success")
			{
				$("#searchDetails").html(htmlAmi.details);
				if((htmlAmi.traceTyp!='history')&&(htmlAmi.inLoc!='unTrace')){$("#distanceBox").show();traceDetails(htmlAmi,'traceMap')}
				else if(htmlAmi.traceTyp=='history'){$('#traceMap').removeClass('errMode').addClass('historyMode').html(htmlAmi.inLoc).show();$("#distanceBox").hide();}
				  else{$('#traceMap').removeClass('historyMode').addClass('errMode').html('<i class="si si-exclamation"></i> Unfortunately, there are no records available.').show();$("#distanceBox").hide();}	
				}
				else{$("#searchDetails").html("&nbsp;");}
			toastMultiShow(htmlAmi.addClas,htmlAmi.msg,htmlAmi.icon);
        }
    });
});
function traceDetails(htmlAmi,targetID)
{
/***************************************************25.5923246,85.1799755***********************************************************************************/					
	  const locationData=htmlAmi.inLoc;
	  const map=L.map(targetID).setView([locationData[0].lat, locationData[0].lng], 16);
	  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {maxZoom: 19,attribution:'&copy; <a href="https://www.camwel.com">Camwel Solution</a> '}).addTo(map);
	  let endMarkerRef = null;
	  locationData.forEach((loc, index) => {let color = '#1717E2';
	   // let label = `Location ${index + 1}`;
		let label = 'Geo-point :<br><span class="pointCol">'+loc.lat+','+loc.lng+'</span>';
		let radius = 4;
		if(index===0){color='orange';label='Start Point';radius=7;}else if(index===locationData.length-1){color='#1717E2';label='End Point';radius = 7;}
		const marker=L.circleMarker([loc.lat, loc.lng], {radius:radius,color:color,fillColor:color,fillOpacity:1}).bindPopup(label).addTo(map);
		if(index===locationData.length-1){endMarkerRef=marker;}
	  });
	  const osrmBase = "https://router.project-osrm.org";
	  const coords = locationData.map(loc => `${loc.lng},${loc.lat}`).join(";");
	  fetch(osrmBase+"/trip/v1/driving/"+coords+"?source=first&roundtrip=false&overview=full&geometries=geojson").then(res=>res.json()).then(data=>{
		  const trip = data.trips[0];const route = trip.geometry.coordinates.map(c => [c[1], c[0]]);const distanceKm = (trip.distance / 1000).toFixed(2);
		  document.getElementById("distanceBox").innerHTML="Shortest Distance: <b>"+distanceKm+" km</b>";
		  L.polyline(route,{color:'#1717E2',weight:4,opacity:0.7}).addTo(map);
		  const movingMarker=L.circleMarker(route[0],{radius:8,color:'#FF4E00',fillColor:'#FF4E00',fillOpacity:1}).addTo(map);
		  setInterval(()=>{const currentOpacity=movingMarker.options.fillOpacity;movingMarker.setStyle({fillOpacity:currentOpacity===1?0.3:1,opacity:currentOpacity===1?0.3:1});},300);
		  let i = 0;
		  function moveMarker(){if(i>=route.length) return;movingMarker.setLatLng(route[i]);map.setView(route[i], 16);
			if (i === route.length - 1 && endMarkerRef) {map.removeLayer(endMarkerRef);}i++;setTimeout(moveMarker, 100);
		  }moveMarker();
		}).catch(err =>{document.getElementById("distanceBox").innerHTML=" Routing failed.";console.error("Routing error:", err);});
										
/**************************************************************************************************************************************/
	}



</script>
