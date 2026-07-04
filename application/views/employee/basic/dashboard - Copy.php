<style>
.miCalTime{width:18.9rem;height: 2.3rem;}
.miCalTime span i{ color:#fff;background-color: #bd9700;padding: 10px 10px 13px 10px;margin-right: 10px;}
.miCalTime span{ background-color:#FFFFFF;width:48%;padding:.45rem 0px 0px 0px;font-weight:bold;color: #a26100}
:root{--success-rgb:13, 205, 148;--purple-rgb:170,76,242;--orange-rgb:243,73,50;--warning-rgb:227, 177, 19;--pink-rgb:	239,78,184;}
.comming_holidays.calendar-icon .date_time {display: block;height: 3.313rem;width: 3.313rem;}
.calendar-icon .date_time {display: block;height: 45px;width: 45px;border-radius: 8px;text-align: center;font-size: 13px;}
.mi-success-transparent {background-color: rgba(var(--success-rgb),.1) !important;color: rgb(var(--success-rgb)) !important;}
.mi-purple-transparent {background-color: rgba(var(--purple-rgb),.1) !important;color: rgb(var(--purple-rgb)) !important;}
.mi-orange-transparent {background-color: rgba(var(--orange-rgb),.1) !important;color: rgb(var(--orange-rgb)) !important;}
.mi-warning-transparent {background-color: rgba(var(--warning-rgb),.1) !important;color: rgb(var(--warning-rgb)) !important;}
.mi-pink-transparent {background-color: rgba(var(--pink-rgb),.1) !important;color: rgb(var(--pink-rgb)) !important;}
.fs20 {  font-size: 1.25rem !important;}.fs13 {font-size: .8125rem;}.calendar-icon span {display: block;font-weight: 500;}
.date{ margin:5px 0px 0px 0px;}.month{ margin:-8px 0px 0px 0px;}


.miCalendar{ height:200px; background-color: darkkhaki; margin: -10px -10px 0px -10px; }
.miMnth{ padding: .4rem .5rem .4rem .5rem; background-color:#4E45B0;text-align: center;color:#fff;
  text-transform: uppercase;
  font-size: .8rem;
  font-weight: bold;}
 
.mnTLft{float: left;
  background-color: beige;
  padding:1px 8px 2px 6px;
  margin-top: -2px;
  border-radius: 6px;}
.mnTLrt{float: right;
  background-color: beige;
  padding:1px 8px 2px 6px;
  margin-top: -2px;
  border-radius: 6px;}

.mnTLft:hover,.mnTLrt:hover{ background-color:#d2d2bf;}

.mnTLft i{ font-size:.5rem;font-weight:bold;color:#3c36ff;}
.mnTLrt i{ font-size:.5rem;font-weight:bold;color:#3c36ff;}

.miContainer div:first-child{border-left:0px solid green; }
.miContainer div:last-child{border-right:0px solid green; }

/*@media only screen and (min-width: 380px) {
.miMnth{ padding:.7rem .5rem .7rem 0.5rem; background-color:#4E45B0;text-align: center;color:#fff;text-transform: uppercase;font-size: 1rem;font-weight: bold;}
.mnTLft{float: left;background-color: beige;padding:1px 8px 2px 6px;margin-top: -2px;border-radius: 6px;}
.mnTLrt{float: right;background-color: beige;padding:1px 8px 2px 6px;margin-top: -2px;border-radius: 6px;}
.mnTLft i{ font-size:.7rem;font-weight:bold;color:#3c36ff;}.mnTLrt i{ font-size:.7rem;font-weight:bold;color:#3c36ff;}
.miContainer div{padding:6px .86rem 0px .86rem;border: 1px solid #979595;margin: 4px 4px 0px -5px;text-transform: uppercase;float:left;text-align:center;font-weight:900;color:black;font-size:.7rem;background-color:#a4bfff;height:30px;border-top: 0px;}
.miCalDt div{padding:6px 1.32rem 0px 1.32rem;border: 1px solid #d9d9d9;margin:0px 4px 0px -5px;text-transform: uppercase;float:left;text-align:center;font-weight:900;color:black;font-size:.7rem;background-color:#fff;height:30px;border-top: 0px;}
}
*/


@media only screen and (max-width: 400px) {
.miMnth{ padding:.7rem .5rem .7rem 0.5rem; background-color:#4E45B0;text-align: center;color:#fff;text-transform: uppercase;font-size: 1rem;font-weight: bold;}
.mnTLft{float: left;background-color: beige;padding:1px 8px 2px 6px;margin-top: -2px;border-radius: 6px;}
.mnTLrt{float: right;background-color: beige;padding:1px 8px 2px 6px;margin-top: -2px;border-radius: 6px;}
.mnTLft i{ font-size:.7rem;font-weight:bold;color:#3c36ff;}.mnTLrt i{ font-size:.7rem;font-weight:bold;color:#3c36ff;}
.miContainer div{padding:6px .86rem 0px .86rem;border: 1px solid #979595;margin: 4px 4px 0px -5px;text-transform: uppercase;float:left;text-align:center;font-weight:900;color:black;font-size:.7rem;background-color:#a4bfff;height:30px;border-top: 0px;}
.miCalDt div{padding:6px 1.32rem 0px 1.32rem;border: 1px solid #d9d9d9;margin:0px 4px 0px -5px;text-transform: uppercase;float:left;text-align:center;font-weight:900;color:black;font-size:.7rem;background-color:#fff;height:30px;border-top: 0px;}
}
@media only screen and (min-width: 500px) {
.miMnth{ padding:.7rem .5rem .7rem 0.5rem; background-color:#4E45B0;text-align: center;color:#fff;text-transform: uppercase;font-size: 1rem;font-weight: bold;}
.mnTLft{float: left;background-color: beige;padding:1px 8px 2px 6px;margin-top: -2px;border-radius: 6px;}
.mnTLrt{float: right;background-color: beige;padding:1px 8px 2px 6px;margin-top: -2px;border-radius: 6px;}
.mnTLft i{ font-size:.7rem;font-weight:bold;color:#3c36ff;}.mnTLrt i{ font-size:.7rem;font-weight:bold;color:#3c36ff;}
.miContainer div{padding:6px 1.33rem 0px 1.33rem;border: 1px solid #979595;margin: 4px 4px 0px -5px;text-transform: uppercase;float:left;text-align:center;font-weight:900;color:black;font-size:.7rem;background-color:#a4bfff;height:30px;border-top: 0px;}
.miCalDt div{padding:6px 1.795rem 0px 1.795rem;border: 1px solid #d9d9d9;margin:0px 4px 0px -5px;text-transform: uppercase;float:left;text-align:center;font-weight:900;color:black;font-size:.7rem;background-color:#fff;height:30px;border-top: 0px;}
}
@media only screen and (min-width: 900px) {
.miContainer div{padding:4px 7px 0px 7px;border: 1px solid #979595;margin: 4px 4px 0px -5px;text-transform: uppercase;float:left;text-align:center;font-weight:900;color:black;font-size:.7rem;background-color:#a4bfff;height:28px;border-top: 0px;}
.miCalDt div{padding:4px .905rem 0px .905rem;border: 1px solid #d9d9d9;margin:0px 4px 0px -5px;text-transform: uppercase;float:left;text-align:center;font-weight:900;color:black;font-size:.7rem;background-color:#fff;height:28px;border-top: 0px;}

}


</style>
<script>
function startTime() {
  const today = new Date();
  let h = today.getHours();
  let m = today.getMinutes();
  let s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('miClock').innerHTML =  '<i class="ti-timer"></i> '+h + ":" + m + ":" + s;
  setTimeout(startTime, 1000);
}
function checkTime(i){if(i< 10) {i="0"+i};return i;}
$(document).ready(function(){
startTime();
getBxWithTxt('',35,'dtCnt');

});

function getBxWithTxt(memName,strLength,txtContainer)
{let valid='';let cnt=0;for (let i = 0; i < strLength ; i++) {cnt=1+i;valid +="<div id="+cnt+">"+memName.substr(i, 1)+"</div>";}$('#'+txtContainer).html(valid);}



</script>

<div class="inner-body">                       
	<div class="page-header d-xxl-flex d-block">
  <div class="page-leftheader">
  	<div class="page-title">Employee<span class="fw-normal text-muted ms-2">Dashboard</span></div> 
  </div>
<div class="page-rightheader mt-0 mt-xxl-0">
   <div class="d-flex align-items-center flex-wrap my-auto end-content breadcrumb-end gap-1">
      <a href="javascript:void(0);" class="btn btn-primary me-2 my-md-0 my-1" data-bs-toggle="modal" data-bs-target="#applyleaves">
          <i class="si si-plane"></i> Apply Leaves
      </a> 
        <div class="d-flex flex-wrap gap-2 miCalTime">
              <span> <i class="ti-calendar"></i> 16-01-2024</span><span id="miClock"><i class="ti-timer"></i>  9:29 am</span>
        </div> 
        <div class="d-flex gap-2"> 
            <button class="btn ripple fntMi btn-outline-success " data-bs-toggle="modal" data-bs-target="#clockinmodal">
                <i class="fe fe-sunrise"></i> Clock In
             </button>
              <button class="btn ripple btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="E-mail" data-bs-original-title="E-mail">
                     <i class="fe fe-mail"></i>
              </button>
               <button class="btn ripple btn-outline-info" data-bs-placement="top" data-bs-toggle="tooltip" aria-label="Contact" data-bs-original-title="Contact">
                    <i class="fe fe-phone-call"></i>
               </button> 
               <button class="btn ripple btn-outline-dark" data-bs-placement="top" data-bs-toggle="tooltip" aria-label="Info" data-bs-original-title="Info">
                    <i class="fe fe-info"></i>
               </button>
            </div>
          </div>
       </div>
   </div>
<!--------------------------------------@mit Emp Dashboard Start------------------------------------------------->                        
      
<div class="row row-sm">
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card custom-card">
            <div class="card-body">
                <div class="card-item">
                    <div class="card-item-icon card-icon">
                        <svg class="text-primary" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24">
                            <g>
                                <rect height="14" opacity=".3" width="14" x="5" y="5"></rect>
                                <g>
                                    <rect fill="none" height="24" width="24"></rect>
                                    <g>
                                        <path d="M19,3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.1,3,19,3z M19,19H5V5h14V19z"></path>
                                        <rect height="5" width="2" x="7" y="12"></rect>
                                        <rect height="10" width="2" x="15" y="7"></rect>
                                        <rect height="3" width="2" x="11" y="14"></rect>
                                        <rect height="2" width="2" x="11" y="10"></rect>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="card-item-title mb-2">
                        <label class="main-content-label tx-13 font-weight-bold mb-1">Completed Project</label>
                     </div>
                    <div class="card-item-body">
                        <div class="card-item-stat">
                            <h4 class="font-weight-bold">99</h4>
                            <small><b class="text-success">55%</b> higher</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card custom-card">
            <div class="card-body">
                <div class="card-item">
                    <div class="card-item-icon card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                            <path d="M0 0h24v24H0V0z" fill="none"></path>
                            <path d="M12 4c-4.41 0-8 3.59-8 8 0 1.82.62 3.49 1.64 4.83 1.43-1.74 4.9-2.33 6.36-2.33s4.93.59 6.36 2.33C19.38 15.49 20 13.82 20 12c0-4.41-3.59-8-8-8zm0 9c-1.94 0-3.5-1.56-3.5-3.5S10.06 6 12 6s3.5 1.56 3.5 3.5S13.94 13 12 13z" opacity=".3"></path>
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM7.07 18.28c.43-.9 3.05-1.78 4.93-1.78s4.51.88 4.93 1.78C15.57 19.36 13.86 20 12 20s-3.57-.64-4.93-1.72zm11.29-1.45c-1.43-1.74-4.9-2.33-6.36-2.33s-4.93.59-6.36 2.33C4.62 15.49 4 13.82 4 12c0-4.41 3.59-8 8-8s8 3.59 8 8c0 1.82-.62 3.49-1.64 4.83zM12 6c-1.94 0-3.5 1.56-3.5 3.5S10.06 13 12 13s3.5-1.56 3.5-3.5S13.94 6 12 6zm0 5c-.83 0-1.5-.67-1.5-1.5S11.17 8 12 8s1.5.67 1.5 1.5S12.83 11 12 11z"></path>
                        </svg>
                    </div>
                    <div class="card-item-title mb-2">
                        <label class="main-content-label tx-13 font-weight-bold mb-1">On Going Project</label>
                    </div>
                    <div class="card-item-body">
                        <div class="card-item-stat">
                            <h4 class="font-weight-bold">15</h4>
                            <small><b class="text-success">5%</b> Increased</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3">
        <div class="card custom-card">
            <div class="card-body">
                <div class="card-item">
                    <div class="card-item-icon card-icon">
                        <svg class="text-primary" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                            <path d="M0 0h24v24H0V0z" fill="none"></path>
                            <path d="M12 4c-4.41 0-8 3.59-8 8s3.59 8 8 8 8-3.59 8-8-3.59-8-8-8zm1.23 13.33V19H10.9v-1.69c-1.5-.31-2.77-1.28-2.86-2.97h1.71c.09.92.72 1.64 2.32 1.64 1.71 0 2.1-.86 2.1-1.39 0-.73-.39-1.41-2.34-1.87-2.17-.53-3.66-1.42-3.66-3.21 0-1.51 1.22-2.48 2.72-2.81V5h2.34v1.71c1.63.39 2.44 1.63 2.49 2.97h-1.71c-.04-.97-.56-1.64-1.94-1.64-1.31 0-2.1.59-2.1 1.43 0 .73.57 1.22 2.34 1.67 1.77.46 3.66 1.22 3.66 3.42-.01 1.6-1.21 2.48-2.74 2.77z" opacity=".3"></path>
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.31-8.86c-1.77-.45-2.34-.94-2.34-1.67 0-.84.79-1.43 2.1-1.43 1.38 0 1.9.66 1.94 1.64h1.71c-.05-1.34-.87-2.57-2.49-2.97V5H10.9v1.69c-1.51.32-2.72 1.3-2.72 2.81 0 1.79 1.49 2.69 3.66 3.21 1.95.46 2.34 1.15 2.34 1.87 0 .53-.39 1.39-2.1 1.39-1.6 0-2.23-.72-2.32-1.64H8.04c.1 1.7 1.36 2.66 2.86 2.97V19h2.34v-1.67c1.52-.29 2.72-1.16 2.73-2.77-.01-2.2-1.9-2.96-3.66-3.42z"></path>
                        </svg>
                    </div>
                    <div class="card-item-title  mb-2">
                        <label class="main-content-label tx-13 font-weight-bold mb-1">Total Attendance</label>
                        
                    </div>
                    <div class="card-item-body">
                        <div class="card-item-stat">
                            <h4 class="font-weight-bold">$8,500</h4>
                            <small><b class="text-danger">12%</b> decrease</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3">
        <div class="card custom-card">
            <div class="card-body">
                <div class="card-item">
                    <div class="card-item-icon card-icon">
                        <svg class="text-primary" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                            <path d="M0 0h24v24H0V0z" fill="none"></path>
                            <path d="M12 4c-4.41 0-8 3.59-8 8s3.59 8 8 8 8-3.59 8-8-3.59-8-8-8zm1.23 13.33V19H10.9v-1.69c-1.5-.31-2.77-1.28-2.86-2.97h1.71c.09.92.72 1.64 2.32 1.64 1.71 0 2.1-.86 2.1-1.39 0-.73-.39-1.41-2.34-1.87-2.17-.53-3.66-1.42-3.66-3.21 0-1.51 1.22-2.48 2.72-2.81V5h2.34v1.71c1.63.39 2.44 1.63 2.49 2.97h-1.71c-.04-.97-.56-1.64-1.94-1.64-1.31 0-2.1.59-2.1 1.43 0 .73.57 1.22 2.34 1.67 1.77.46 3.66 1.22 3.66 3.42-.01 1.6-1.21 2.48-2.74 2.77z" opacity=".3"></path>
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.31-8.86c-1.77-.45-2.34-.94-2.34-1.67 0-.84.79-1.43 2.1-1.43 1.38 0 1.9.66 1.94 1.64h1.71c-.05-1.34-.87-2.57-2.49-2.97V5H10.9v1.69c-1.51.32-2.72 1.3-2.72 2.81 0 1.79 1.49 2.69 3.66 3.21 1.95.46 2.34 1.15 2.34 1.87 0 .53-.39 1.39-2.1 1.39-1.6 0-2.23-.72-2.32-1.64H8.04c.1 1.7 1.36 2.66 2.86 2.97V19h2.34v-1.67c1.52-.29 2.72-1.16 2.73-2.77-.01-2.2-1.9-2.96-3.66-3.42z"></path>
                        </svg>
                    </div>
                    <div class="card-item-title  mb-2">
                        <label class="main-content-label tx-13 font-weight-bold mb-1">Total Absent</label>
                       
                    </div>
                    <div class="card-item-body">
                        <div class="card-item-stat">
                            <h4 class="font-weight-bold">$8,500</h4>
                            <small><b class="text-danger">12%</b> decrease</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
     
 <div class="row"> 
 	<div class="col-xl-3 col-lg-12 col-md-12"> 
	   	<div class="card custom-card"> 
        	<div class="card-header border-0"> <h4 class="card-title">Calendar</h4> </div> 
             <div class="card-body">
             	<div class="miCalendar">
                	<div class="miMnth">
						<a href="javascript:void(0)" class="mnTLft"><i class="si si-arrow-left"></i></a>January 2024
						<a href="javascript:void(0)" class="mnTLrt"><i class="si si-arrow-right"></i></a>
					</div>
					<div style=" margin:-4px -5px 0px 5px;">
						<div class="miContainer">
							<div>SU</div>
                            <div>MO</div>
                            <div>TU</div>
                            <div>WE</div>
                            <div>TH</div>
                            <div>FR</div>
                            <div class="calNbdr">SA</div>
						</div>
					</div>
					<div style="margin:-4px -5px 0px 5px;">
						<div class="miCalDt" id="dtCnt">
						</div>
					</div>
					
                </div>
             
             
             
             </div>
          </div>
	</div> 
	<div class="col-xl-4 col-lg-12 col-md-12">
	 <div class="card custom-card">
	  <div class="card-header border-0"> <h4 class="card-title">Up Coming Holidays</h4> </div> 
	  <div class="card-body mt-1"> 
	  	<?php
				$existDay=array('01'=>'31','02'=>'28','03'=>'31','04'=>'30','05'=>'31','06'=>'30','07'=>'31','08'=>'30','09'=>'30','10'=>'31','11'=>'30','12'=>'31');
				$curMnth=date('m');
				$getFrstDy='01-'.date('m-Y');
				echo $existDay[$curMnth];echo '<br>';
				//echo date('l');
				echo date('l',strtotime($getFrstDy));
		?>
		
		
			<!--<div class="mb-4"> 
				<div class="d-flex comming_holidays calendar-icon icons"> 
					<span class="date_time mi-success-transparent rounded-3 me-3">
						<span class="date fs20">3</span> 
						<span class="month fs13">FEB</span> 
				    </span> 
					<div class="me-3 mt-0 mt-sm-1 d-block">
					 <h6 class="mb-1 fw-medium">Office Off</h6> 
					 	<span class="clearfix"></span> <small>Sunday</small> 
				    </div>
					 <p class="float-end text-muted  mb-0 fs13 ms-auto rounded-3 my-auto">3 days to left</p>
				</div>
		    </div> 
			<div class="mb-4"> 
				<div class="d-flex comming_holidays calendar-icon icons"> <span class="date_time mi-purple-transparent rounded-3 me-3"><span class="date fs20">10</span> <span class="month fs13">FEB</span> </span> <div class="me-3 mt-0 mt-sm-1 d-block"> <h6 class="mb-1 fw-medium">Public Holiday</h6> <span class="clearfix"></span> <small>Enjoy your day off</small> </div> <p class="float-end text-muted  mb-0 fs13 ms-auto rounded-3 my-auto">13 days to left</p></div> </div>
		    <div class="mb-4"> <div class="d-flex comming_holidays calendar-icon icons"> <span class="date_time mi-orange-transparent rounded-3 me-3"><span class="date fs20">20</span> <span class="month fs13">MAR</span> </span> <div class="me-3 mt-0 mt-sm-1 d-block"> <h6 class="mb-1 fw-medium">Office Off</h6> <span class="clearfix"></span> <small>Sunday</small> </div> <p class="float-end text-muted  mb-0 fs13 ms-auto rounded-3 my-auto">23 days to left</p></div> </div> 
			<div class="mb-4"> <div class="d-flex comming_holidays calendar-icon icons"> <span class="date_time mi-warning-transparent rounded-3 me-3"><span class="date fs20">17</span> <span class="month fs13">FEB</span> </span> <div class="me-3 mt-0 mt-sm-1 d-block"> <h6 class="mb-1 fw-medium">Optional Holiday</h6> <span class="clearfix"></span> <small>Sunday</small> </div> <p class="float-end text-muted  mb-0 fs13 ms-auto rounded-3 my-auto">20 days to left</p></div> </div> 
			<div class="mb-0"> <div class="d-flex comming_holidays calendar-icon icons"> <span class="date_time mi-pink-transparent rounded-3 me-3"><span class="date fs20">13</span> <span class="month fs13">MAR</span> </span> <div class="me-3 mt-0 mt-sm-1 d-block"> <h6 class="mb-1 fw-medium">Conference</h6> <span class="clearfix"></span> <small>Money Update</small> </div> <p class="float-end text-muted  mb-0 fs13 ms-auto rounded-3 my-auto">35 days to left</p></div> </div> -->
		</div> 
	 </div>
  </div> 
    <div class="col-xl-5 col-lg-12 col-md-12"> 
		<div class="card custom-card">
		 <div class="card-header justify-content-between border-0"> <h4 class="card-title">Leave Balance</h4> 
		 <div style="float:right;margin-top:-2.3rem;"> 
		 		<a href="javascript:void(0);" class="btn ripple btn-outline-primary">Apply For Leave</a>
	     </div>
      </div>
	   <div class="table-responsive leave_table fs13 mt-4">
	    <table class="table mb-0 text-nowrap">
			<thead class="border-top">
				<tr>
					<th class="text-start">Balance</th>
					<th class="text-start">Used</th>
					<th class="text-center">Available</th>
					<th class="text-center">Allowance</th>
			    </tr>
		    </thead>
		    <tbody>
				<tr class="fs-15">
				   <td class="text-center d-flex"><span class="bg-primary rounded-circle d-block me-3 mt-1 h-3 w-3"></span><span class="fw-medium fs-15">Vacation</span></td>
				   <td class="fw-medium fs-15">16.5</td><td class="text-center text-muted fs-15">3.5</td>
				   <td class="text-center text-muted">20</td>
				</tr>
				<tr class="fs-15">
					<td class="text-center d-flex"><span class="bg-orange rounded-circle d-block me-3 mt-1 h-3 w-3"></span><span class="fw-medium fs-15">Sick Leave</span></td>
					<td class="fw-medium">4.5</td><td class="text-center text-muted">16</td><td class="text-center text-muted">20</td>
			    </tr>
				<tr class="fs-15">
					<td class="text-center d-flex"><span class="bg-warning rounded-circle d-block me-3 mt-1 h-3 w-3"></span><span class="fw-medium fs-15">Unpaid leave</span></td>
					<td class="fw-medium">5</td><td class="text-center text-muted">360</td><td class="text-center text-muted">365</td></tr><tr class="fs-15">
					<td class="text-center d-flex"><span class="bg-info rounded-circle d-block me-3 mt-1 h-3 w-3"></span><span class="fw-medium fs-15">Work from Home</span></td>
					<td class="fw-medium">8</td><td class="text-center text-muted">22</td><td class="text-center text-muted">30</td>
			    </tr> 
		   </tbody>
		</table>
	 </div> 
	 <div class="row mb-0 pb-0"> 
	 	<div class="col-4 text-center py-4 border-end"> <h5>Vacation</h5> 
			<div class="justify-content-center text-center d-flex my-auto">
				<span class="text-primary fs20 fw-medium">8 <span class="my-auto fs-14 fw-normal text-muted op-5">/</span> 16</span>
			</div> 
		</div> 
		<div class="col-4 text-center py-4 border-end"> <h5>Sick leave</h5> 
			<div class="justify-content-center text-center d-flex my-auto">
				<span class="text-danger fs20 fw-medium">4.5 <span class="my-auto fs-14 fw-normal text-muted op-5">/</span> 10</span>
			</div> 
		</div> 
		<div class="col-4 text-center py-4"> 
			<h5>Unpaid leave</h5> 
			<div class="justify-content-center text-center d-flex my-auto">
				<span class="fs20 fw-medium">5 <span class="my-auto fs-14 fw-normal text-muted op-5">/</span> 365</span>
			</div>
		</div>
	</div>
  </div>
 </div>
</div>    
                        
<!--------------------------------------@mit Emp Dashboard End------------------------------------------------->  				

					
					
					
					