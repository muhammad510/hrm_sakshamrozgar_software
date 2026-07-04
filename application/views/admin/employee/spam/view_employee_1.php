<?php if ($employee['status'] == 1) {
    echo "<span class='text-success'><b> Active <i class='fa fa-check'></i> </b></span>";
} else {
    echo "<span class='text-danger'><b> De-Active <i class='fa fa-times'></i> </b></span>";
}  ?>
<div class="card-body">

<div class="row"style="border:1px solid #d2d2d2;border-radius:1rem 1rem 0rem">
<div class="miSecn_1 pointer" id="perDetPar" style="margin-top:0px;"> <i class="si si-user-follow"></i>&nbsp;&nbsp;Personal Details</div>
<div class="row" id="perDet"style="display:none;">

<div class="col-md-12">
<div class="row">
<div class="col-md-1"></div><div class="col-md-4 styVlist"><p><span class="float-left textVcolM"> employee Name </span></p></div><div class="col-md-1 styVlist">-</div>
<div class="col-md-5 styVlist"><span class="float-right"><?php echo $employee['name'] ."(". $employee['employee_id'] . ")" ;?></span></div><div class="col-md-2"></div>
</div>
</div>  

<div class="col-md-12">
<div class="row">
<div class="col-md-1"></div><div class="col-md-4 styVlist"><p><span class="float-left textVcolM">Father Name</span></p></div><div class="col-md-1 styVlist">-</div>
<div class="col-md-5 styVlist"><span class="float-right"><?php echo $employee['father_name'];?></span></div><div class="col-md-2"></div>
</div>
</div>

<div class="col-md-12">
<div class="row">
<div class="col-md-1"></div><div class="col-md-4 styVlist"><p><span class="float-left textVcolM">Date Of Birth</span></p></div><div class="col-md-1 styVlist">-</div>
<div class="col-md-5 styVlist"><span class="float-right"><?php echo $employee['dob'] ?></span></div><div class="col-md-2"></div>
</div>
</div>

<div class="col-md-12">
<div class="row">
<div class="col-md-1"></div><div class="col-md-4 styVlist"><p><span class="float-left textVcolM">Gender</span></p></div><div class="col-md-1 styVlist">-</div>
<div class="col-md-5 styVlist"><span class="float-right"><?php if($employee['gender'] == 1) { echo "Male"; } elseif($employee['gender'] == 2) { echo "Female";} ?></span></div><div class="col-md-2"></div>
</div>
</div>

<div class="col-md-12">
<div class="row">
<div class="col-md-1"></div><div class="col-md-4 styVlist"><p><span class="float-left textVcolM">Mobile No.</span></p></div><div class="col-md-1 styVlist">-</div>
<div class="col-md-5 styVlist"><span class="float-right"><?php echo $employee['contact_no'];?></span></div><div class="col-md-2"></div>
</div>
</div>

<div class="col-md-12">
<div class="row">
<div class="col-md-1"></div><div class="col-md-4 styVlist"><p><span class="float-left textVcolM">Email Id:</span></p></div><div class="col-md-1 styVlist">-</div>
<div class="col-md-5 styVlist"><span class="float-right"><?php echo $employee['email'];?></span></div><div class="col-md-2"></div>
</div>
</div>

<div class="col-md-12">
<div class="row">
<div class="col-md-1"></div><div class="col-md-4 styVlist"><p><span class="float-left textVcolM">Address:</span></p></div><div class="col-md-1 styVlist">-</div>
<div class="col-md-5 styVlist"><span class="float-right"><?php echo $employee['address'];?></span></div><div class="col-md-2"></div>
</div>
</div>

<div class="col-md-12">
<div class="row">
<div class="col-md-1"></div><div class="col-md-4 styVlist"><p><span class="float-left textVcolM">Nationality</span></p></div><div class="col-md-1 styVlist">-</div>
<div class="col-md-5 styVlist"><span class="float-right"><?php echo $employee['nationality'];?></span></div><div class="col-md-2"></div>
</div>
</div>

<div class="col-md-12">
<div class="row">
<div class="col-md-1"></div><div class="col-md-4 styVlist"><p><span class="float-left textVcolM">Refrence Person Name:</span></p></div><div class="col-md-1 styVlist">-</div>
<div class="col-md-5 styVlist"><span class="float-right"><?php echo $employee['reference_person_name'];?></span></div><div class="col-md-2"></div>
</div>
</div>

<div class="col-md-12">
<div class="row">
<div class="col-md-1"></div><div class="col-md-4 styVlist"><p><span class="float-left textVcolM">Reference Person Mobile No.</span></p></div><div class="col-md-1 styVlist">-</div>
<div class="col-md-5 styVlist"><span class="float-right"> <?php echo $employee['reference_person_number'];?></span></div><div class="col-md-2"></div>
</div>
</div>

<div class="col-md-12"style="margin-bottom:1rem;">
<div class="row">
<div class="col-md-1"></div><div class="col-md-4 styVlist"><p><span class="float-left textVcolM">Marital Status:</span></p></div><div class="col-md-1 styVlist">-</div>
<div class="col-md-5 styVlist"><span class="float-right"> <?php if($employee['marital_status'] == 1) { echo "Maried";} elseif($employee['marital_status'] == 2) { echo "Un-married";} ;?></span></div><div class="col-md-2"></div>
</div>
</div>

</div>


<!-- ****************************************** company Details sec start **************************************************  -->
<div class="miSecn pointer" id="comDetPar" style="margin-top:0px;"> <i class="si si-user-follow"></i>&nbsp;&nbsp;company Details</div>
<div class="row" id="comDet"style="display:none;">
<div class="col-md-12">
    <div class="row">
<div class="col-md-1"></div><div class="col-md-4 styVlist"><p><span class="float-left textVcolM">Department</span></p></div><div class="col-md-1 styVlist">-</div>
<div class="col-md-5 styVlist"><span class="float-right"> <?php echo $employee['department_name'];?></span></div><div class="col-md-2"></div>
</div>
</div>      


<div class="col-md-12">
    <div class="row">
        <div class="col-md-1"></div><div class="col-md-4 styVlist"><p><span class="float-left textVcolM">Designation</span></p></div><div class="col-md-1 styVlist">-</div>
        <div class="col-md-5 styVlist"><span class="float-right"> <?php echo $employee['designation_name'];?></span></div><div class="col-md-2"></div>
</div>
</div> 

<div class="col-md-12">
<div class="row">
<div class="col-md-1"></div><div class="col-md-4 styVlist"><p><span class="float-left textVcolM">Date of Joining:</span></p></div><div class="col-md-1 styVlist">-</div>
<div class="col-md-5 styVlist"><span class="float-right"><?php echo $employee['date_of_joining'];?></span></div><div class="col-md-2"></div>
</div>
</div> 

<div class="col-md-12">
<div class="row">
<div class="col-md-1"></div><div class="col-md-4 styVlist"><p><span class="float-left textVcolM">Shift</span></p></div><div class="col-md-1 styVlist">-</div>
<div class="col-md-5 styVlist"><span class="float-right"><?php echo $employee['shift_name'] ."(". $employee['shift_start'] . " - ". $employee['shift_end']. ")" ;?></span></div><div class="col-md-2"></div>
</div>
</div> 

<div class="col-md-12">
<div class="row">
<div class="col-md-1"></div><div class="col-md-4 styVlist"><p><span class="float-left textVcolM">Qualification</span></p></div><div class="col-md-1 styVlist">-</div>
<div class="col-md-5 styVlist"><span class="float-right"><?php echo $employee['qualification'];?></span></div><div class="col-md-2"></div>
</div>
</div> 

<div class="col-md-12"style="margin-bottom:1rem;">
<div class="row">
<div class="col-md-1"></div><div class="col-md-4 styVlist"><p><span class="float-left textVcolM">Work Exprience(In Month):</span></p></div><div class="col-md-1 styVlist">-</div>
<div class="col-md-5 styVlist"><span class="float-right"><?php echo $employee['work_exp'];?></span></div><div class="col-md-2"></div>
</div>
</div> 

</div> 
<!-- ********************************************* Finance Details sec start ***********************************************  -->
<div class="miSecn pointer" id="finDetPar" style="margin-top:0px;"> <i class="si si-user-follow"></i>&nbsp;&nbsp;Finance Details</div>
<div class="row" id="finDet" style="display:none;">
<div class="col-md-12">
<div class="row">
<div class="col-md-1"></div><div class="col-md-4 styVlist"><p><span class="float-left textVcolM">Salary Type:</span></p></div><div class="col-md-1 styVlist">-</div>
<div class="col-md-5 styVlist"><span class="float-right"> <?php if($employee['salary_type'] == 1) { echo "Daily"; }elseif($employee['salary_type'] == 2) { echo "Weekly"; }elseif($employee['salary_type'] == 3) { echo "Monthly"; } ;?></span></div><div class="col-md-2"></div>
</div>
</div> 

<div class="col-md-12"style="margin-bottom:1rem;">
<div class="row">
<div class="col-md-1"></div><div class="col-md-4 styVlist"><p><span class="float-left textVcolM">Salary Amount:</span></p></div><div class="col-md-1 styVlist">-</div>
<div class="col-md-5 styVlist"><span class="float-right"><?php echo $employee['salary_amount'];?></span></div><div class="col-md-2"></div>
</div>
</div> 

</div> 
<!-- ***************************************** Bank Account Details sec start ***************************************************  -->

<div class="miSecn pointer" id="bankAccPar" style="margin-top:0px;"> <i class="si si-user-follow"></i>&nbsp;&nbsp;Bank Account Details</div>
<div class="row" id="bankAcc" style="display:none;">

<div class="col-md-12">
<div class="row">
<div class="col-md-1"></div><div class="col-md-4 styVlist"><p><span class="float-left textVcolM">Account Holder Name:</span></p></div><div class="col-md-1 styVlist">-</div>
<div class="col-md-5 styVlist"><span class="float-right"> <?php echo $employee['holder_name'];?></span></div><div class="col-md-2"></div>
</div>
</div> 

<div class="col-md-12">
<div class="row">
<div class="col-md-1"></div><div class="col-md-4 styVlist"><p><span class="float-left textVcolM">Account Number:</span></p></div><div class="col-md-1 styVlist">-</div>
<div class="col-md-5 styVlist"><span class="float-right"> <?php echo $employee['bank_account_no'];?></span></div><div class="col-md-2"></div>
</div>
</div> 

<div class="col-md-12">
<div class="row">
<div class="col-md-1"></div><div class="col-md-4 styVlist"><p><span class="float-left textVcolM">Bank Name:</span></p></div><div class="col-md-1 styVlist">-</div>
<div class="col-md-5 styVlist"><span class="float-right"> <?php echo $employee['bank_name'];?></span></div><div class="col-md-2"></div>
</div>
</div> 

<div class="col-md-12">
<div class="row">
<div class="col-md-1"></div><div class="col-md-4 styVlist"><p><span class="float-left textVcolM">Branch</span></p></div><div class="col-md-1 styVlist">-</div>
<div class="col-md-5 styVlist"><span class="float-right">  <?php echo $employee['bank_branch'];?></span></div><div class="col-md-2"></div>
</div>
</div> 

<div class="col-md-12"style="margin-bottom:1rem;">
<div class="row">
<div class="col-md-1"></div><div class="col-md-4 styVlist"><p><span class="float-left textVcolM">IFSC Code:</span></p></div><div class="col-md-1 styVlist">-</div>
<div class="col-md-5 styVlist"><span class="float-right"><?php echo $employee['ifsc_code'];?></span></div><div class="col-md-2"></div>
</div>
</div> 

</div> 

<!-- **************************************** Account Login Details sec start ****************************************************  -->

<div class="miSecn pointer" id="accLoDetPar" style="margin-top:0px;"> <i class="si si-user-follow"></i>&nbsp;&nbsp;Account Login Details</div>
<div class="row" id="accLoDet" style="display:none;">

<div class="col-md-12">
<div class="row">
<div class="col-md-1"></div><div class="col-md-4 styVlist"><p><span class="float-left textVcolM">User Name:</span></p></div><div class="col-md-1 styVlist">-</div>
<div class="col-md-5 styVlist"><span class="float-right"> <?php echo $employee['email'];?></span></div><div class="col-md-2"></div>
</div>
</div> 

<div class="col-md-12"style="margin-bottom:1rem;">
<div class="row">
<div class="col-md-1"></div><div class="col-md-4 styVlist"><p><span class="float-left textVcolM">Password :</span></p></div><div class="col-md-1 styVlist">-</div>
<div class="col-md-5 styVlist"><span class="float-right"><?php echo $employee['show_password'];?></span></div><div class="col-md-2"></div>
</div>
</div> 

</div> 
<!-- ***************************************** Account Login Details sec end ***************************************************  -->


</div>

<style>
    	.miSecn_1{ background-color:#645bca;margin: -15px 0px 15px 0px;padding: 10px;font-weight: 900;border-bottom: 1px solid #483ebd; color:#fff;border-radius: 1rem 1rem 0rem 0rem;}
    	.miSecn{ background-color:#645bca;margin: -15px 0px 15px 0px;padding: 10px;font-weight: 900;border-bottom: 1px solid #483ebd; color:#fff;}
        .styVlist{border-bottom: 1px dotted #645bca;padding:0.5rem 2rem 0rem 1rem;margin:0px 1px;}
        .textVcolM{color:#645bca;font-weight:700;}
        .pointer {cursor: pointer;}



</style>
<!-- /* perDetPar   perDet      comDetPar   comDet      finDetPar   finDet       bankAccPar  bankAcc      accLoDetPar  accLoDet */ -->

<script>
$(document).ready(function(){
    $("#perDetPar").click(function(){
     $("#perDet").toggle();
    });
    $("#comDetPar").click(function(){
     $("#comDet").toggle();
    });
    $("#finDetPar").click(function(){
     $("#finDet").toggle();
    });
    $("#bankAccPar").click(function(){
     $("#bankAcc").toggle();
    });
    $("#accLoDetPar").click(function(){
     $("#accLoDet").toggle();
    });
});
</script>

