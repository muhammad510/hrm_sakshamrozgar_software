<div class="row">

<?php //print_r($employee_data);?>


    <div class="col-12">
        <label>Mark Attendance Status:<span class="text-danger">*</span></label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
            </div>
            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $employee_data['id'] ?>">
            <select name="attendance_status" id="attendance_status" class="form-control">
                <option value=""> --- Select One --- </option>
                <?php foreach($attendance_type as $attd) { ?>
                    <option value="<?php echo $attd['id'] ?>" <?php echo ($attd['id'] == $employee_data['attendance_status']) ? "Selected" : ""; ?>><?php echo $attd['type'] ?></option>
                <?php } ?>
            </select>
            <input type="hidden" class="form-control" name="attendance_date_time" id="attendance_date_time" value="<?php echo date('Y-m-d h:i a') ?>">
        </div>
    </div>
    <div class="col-12">
        <label>Attendance Date:<span class="text-danger">*</span></label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
            </div>
            <input type="text" class="form-control" name="atdate_time" id="atdate_time" value="<?php echo date('Y-m-d h:i a') ?>">
        </div>
    </div>
</div>
