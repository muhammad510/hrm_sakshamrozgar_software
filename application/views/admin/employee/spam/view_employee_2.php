<?php if ($employee['status'] == 1) {
    echo "<span class='text-success'><b> Active <i class='fa fa-check'></i> </b></span>";
} else {
    echo "<span class='text-danger'><b> De-Active <i class='fa fa-times'></i> </b></span>";
}  ?>
<div class="card-body">
    <div class="row">
        <div class="col-6 col-sm-6">
          <h4 class="text-center">Personal Details</h4>
            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>employee Name</b>
                    <a class="float-right">
                        <?php echo $employee['name'] ."(". $employee['employee_id'] . ")" ;?>
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Father Name</b>
                    <a class="float-right">
                        <?php echo $employee['father_name'];?>
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Date Of Birth</b>
                    <a class="float-right">
                        <?php echo $employee['dob'] ?>
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Gender</b>
                    <a class="float-right">
                        <?php if($employee['gender'] == 1) { echo "Male"; } elseif($employee['gender'] == 2) { echo "Female";} ?>
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Mobile No.</b>
                    <a class="float-right">
                        <?php echo $employee['contact_no'];?>
                    </a>
                </li><li class="list-group-item">
                    <b>Email Id:</b>
                    <a class="float-right">
                        <?php echo $employee['email'];?>
                    </a>
                </li><li class="list-group-item">
                    <b>Address:</b>
                    <a class="float-right">
                        <?php echo $employee['address'];?>
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Nationality</b>
                    <a class="float-right">
                        <?php echo $employee['nationality'];?>
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Refrence Person Name:</b>
                    <a class="float-right">
                        <?php echo $employee['reference_person_name'];?>
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Reference Person Mobile No.:</b>
                    <a class="float-right">
                        <?php echo $employee['reference_person_number'];?>
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Marital Status:</b>
                    <a class="float-right">
                        <?php if($employee['marital_status'] == 1) { echo "Maried";} elseif($employee['marital_status'] == 2) { echo "Un-married";} ;?>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-6 col-md-6 col-lg-6">
            <h4 class="text-center">company Details</h4>
            <div class="col-md-12">
                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Department</b>
                        <a class="float-right">
                            <?php echo $employee['department_name'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Designation</b>
                        <a class="float-right">
                            <?php echo $employee['designation_name'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Date of Joining:</b>
                        <a class="float-right">
                            <?php echo $employee['date_of_joining'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Shift</b>
                        <a class="float-right">
                            <?php echo $employee['shift_name'] ."(". $employee['shift_start'] . " - ". $employee['shift_end']. ")" ;?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Qualification:</b>
                        <a class="float-right">
                            <?php echo $employee['qualification'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Work Exprience(In Month):</b>
                        <a class="float-right">
                            <?php echo $employee['work_exp'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Status:</b>
                        <a class="float-right">
                            <?php if($employee['status'] == 1) { echo "Active"; } else{ echo "De-Active"; };?>
                        </a>
                    </li>
                </ul>
            </div>
            <h4 class="text-center">Finance Details</h4>
            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>Salary Type:</b>
                    <a class="float-right">
                        <?php if($employee['salary_type'] == 1) { echo "Daily"; }elseif($employee['salary_type'] == 2) { echo "Weekly"; }elseif($employee['salary_type'] == 3) { echo "Monthly"; } ;?>
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Salary Amount:</b>
                    <a class="float-right">
                        <?php echo $employee['salary_amount'];?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-6 col-md-6 col-lg-6">
            <h4 class="text-center">Bank Account Details</h4>
            <div class="col-md-12">
                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Account Holder Name:</b>
                        <a class="float-right">
                            <?php echo $employee['holder_name'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Account Number:</b>
                        <a class="float-right">
                            <?php echo $employee['bank_account_no'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Bank Name:</b>
                        <a class="float-right">
                            <?php echo $employee['bank_name'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Branch:</b>
                        <a class="float-right">
                            <?php echo $employee['bank_branch'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>IFSC Code:</b>
                        <a class="float-right">
                            <?php echo $employee['ifsc_code'];?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-6 col-sm-6">
          <h4 class="text-center">Account Login Details</h4>
            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>User Name:</b>
                    <a class="float-right">
                        <?php echo $employee['email'];?>
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Password:</b>
                    <a class="float-right">
                        <?php echo $employee['show_password'];?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>