<!-- Row -->
<div class="row row-sm" style="margin-top: -45px;">
    <div class="col-lg-12 col-md-12">
        <div class="card custom-card">
            <div class="card-body">
                <form id="add_employee_data" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                    <div class="row row-sm">
                        <div class="miHeader">
                            <h5 class="miLst">Personal Details</h5>
                        </div>
                        <div class="col-6">
                            <label>Name:<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $upd_emp['id']; ?>">
                                <input type="text" class="form-control" name="name" id="name" value="<?php echo $upd_emp['name'] ?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Father Name:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" name="father_name" id="father_name" value="<?php echo $upd_emp['father_name'] ?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Date of Birth:<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                </div>
                                <input type="date" class="form-control" name="dob" id="dob" value="<?php echo $upd_emp['dob'] ?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Gender:<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <select class="form-control" name="gender" id="gender">
                                    <option value=""> --- Select Gnder --- </option>
                                    <option value="1" <?php echo ($upd_emp['gender'] == 1) ? "Selected" : ""; ?>>Male</option>
                                    <option value="2" <?php echo ($upd_emp['gender'] == 2) ? "Selected" : ""; ?>>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Mobile No.:<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                                </div>
                                <input type="number" class="form-control" name="contact_no" id="contact_no" value="<?php echo $upd_emp['contact_no'] ?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Email Id:<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" name="email" id="email" class="form-control" value="<?php echo $upd_emp['email'] ?>" onchange="return get_email(this.value)">
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Address:<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-map"></i></span>
                                </div>
                                <textarea type="text" name="address" id="address" class="form-control"><?php echo $upd_emp['address'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Nationality:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-flag"></i></span>
                                </div>
                                <input type="text" name="nationality" id="nationality" class="form-control" value="<?php echo $upd_emp['nationality'] ?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Refrence Person Name:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="reference_person_name" id="reference_person_name" class="form-control" value="<?php echo $upd_emp['reference_person_name'] ?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Reference Person Mobile No.:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                                </div>
                                <input type="number" name="reference_person_number" id="reference_person_number" class="form-control" value="<?php echo $upd_emp['reference_person_number'] ?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Marital Status:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <select name="marital_status" id="marital_status" class="form-control">
                                    <option value=""> --- Select One --- </option>
                                    <option value="1" <?php echo ($upd_emp['marital_status'] == 1) ? "Selected" : "" ; ?>>Married</option>
                                    <option value="2" <?php echo ($upd_emp['marital_status'] == 2) ? "Selected" : ""; ?>>UnMarried</option>
                                </select>
                            </div>
                        </div>
                        <div class="miHeader">
                            <h5 class="miLst">company Details</h5>
                        </div>
                        <div class="col-6">
                            <label>ID:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                </div>
                                <input type="text" name="employee_id" id="employee_id" class="form-control" value="<?php echo $upd_emp['employee_id'] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Department:<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                </div>
                                <select name="department" id="department" class="form-control">
                                    <option value=""> --- Select Department --- </option>
                                    <?php foreach ($department as $deprt) { ?>
                                            <option value="<?php echo $deprt['id']; ?>" <?php echo ($deprt['id'] == $upd_emp['department']) ? "Selected" : ""; ?>><?php echo $deprt['department_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Designation:<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                </div>
                                <select name="designation" id="designation" class="form-control">
                                    <option value=""> --- Select Department First ---</option>
                                    <?php foreach ($designation as $desig) { ?>
                                            <option value="<?php echo $desig['id'] ?>" <?php echo ($desig['id'] == $upd_emp['designation']) ? "Selected" : ""; ?>><?php echo $desig['designation_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Date of Joining:<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-plus"></i></span>
                                </div>
                                <input type="date" name="date_of_joining" id="date_of_joining" class="form-control" value="<?php echo $upd_emp['date_of_joining'] ?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Shift:<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                </div>
                                <select name="shift" id="shift" class="form-control">
                                    <option value=""> --- Select Shift --- </option>
                                    <?php foreach ($shift as $sft) { ?>
                                            <option value="<?php echo $sft['id'] ?>" <?php echo ($sft['id'] == $upd_emp['shift']) ? "Selected" : ""; ?>><?php echo $sft['shift_name'] . "(" . $sft['shift_start'] . " - " . $sft['shift_end'] . ")" ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Qualification:<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                </div>
                                <input type="text" name="qualification" id="qualification" class="form-control" value="<?php echo $upd_emp['qualification'] ?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Work Exprience(In Month):<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                </div>
                                <input type="text" name="work_exp" id="work_exp" class="form-control" value="<?php echo $upd_emp['work_exp'] ?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Status:<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-smile"></i></span>
                                </div>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" <?php echo ($upd_emp['status'] == 1) ? "Selected" : ""; ?>>Active</option>
                                    <option value="2" <?php echo ($upd_emp['status'] == 2) ? "Selected" : ""; ?>>De-active</option>
                                </select>
                            </div>
                        </div>
                        <div class="miHeader">
                            <h5 class="miLst">Finance Details</h5>
                        </div>
                        <div class="col-6">
                            <label>Salary Type:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-money-bill"></i></span>
                                </div>
                                <select name="salary_type" id="salary_type" class="form-control">
                                    <option value=""> --- Select One --- </option>
                                    <option value="1" <?php echo ($upd_emp['salary_type'] == 1) ? "Selected" : ""; ?>>Daily</option>
                                    <option value="2" <?php echo ($upd_emp['salary_type'] == 2) ? "Selected" : ""; ?>>Weekly</option>
                                    <option value="3" <?php echo ($upd_emp['salary_type'] == 3) ? "Selected" : ""; ?>>Monthly</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Salary Amount:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-money-bill"></i></span>
                                </div>
                                <input type="text" name="salary_amount" id="salary_amount" class="form-control" value="<?php echo $upd_emp['salary_amount'] ?>">
                            </div>
                        </div>
                        <div class="miHeader">
                            <h5 class="miLst">Bank Account Details</h5>
                        </div>
                        <div class="col-6">
                            <label>Account Holder Name:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="holder_name" id="holder_name" class="form-control" value="<?php echo $upd_emp['holder_name'] ?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Account Number:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                </div>
                                <input type="number" name="bank_account_no" id="bank_account_no" class="form-control" value="<?php echo $upd_emp['bank_account_no'] ?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Bank Name:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                </div>
                                <input type="text" name="bank_name" id="bank_name" class="form-control" value="<?php echo $upd_emp['bank_name'] ?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Branch:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                </div>
                                <input type="text" name="bank_branch" id="bank_branch" class="form-control" value="<?php echo $upd_emp['bank_branch'] ?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <label>IFSC Code:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                </div>
                                <input type="text" name="ifsc_code" id="ifsc_code" class="form-control" value="<?php echo $upd_emp['ifsc_code'] ?>">
                            </div>
                        </div>
                        <div class="miHeader">
                            <h5 class="miLst">Account Login Details</h5>
                        </div>
                        <div class="col-6">
                            <label>User Name:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="text" name="user_name" id="user_name" class="form-control" value="<?php echo $upd_emp['email'] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Password:<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="text" name="password" id="password" class="form-control" value="<?php echo $upd_emp['show_password'] ?>">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Row -->