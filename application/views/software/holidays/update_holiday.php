<div class="row row-sm">
    <div class="col-6">
        <span id="holidyNme" class="regiErr">SoftArena</span>
        <label>Holiday Name:<span class="text-danger">*</span></label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
            </div>
            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $update_holiday['id'] ?>">
            <input type="text" class="form-control" name="holiday_name" id="holiday_name" value="<?php echo $update_holiday['holiday_name'] ?>">
        </div>
    </div>
    <div class="col-6">
        <span id="holidyDte" class="regiErr">SoftArena</span>
        <label>From Date:<span class="text-danger">*</span></label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-clock"></i></span>
            </div>
            <input type="date" class="form-control fc-datepicker" name="from_date" id="from_date" value="<?php echo $update_holiday['from_date'] ?>">
        </div>
    </div>

    <div class="col-6">
        <span id="holidyDte" class="regiErr">SoftArena</span>
        <label>To Date:<span class="text-danger">*</span></label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-clock"></i></span>
            </div>
            <input type="date" class="form-control fc-datepicker" name="to_date" id="to_date" value="<?php echo $update_holiday['to_date'] ?>">
        </div>
    </div>


    <div class="col-12">
        <label>Description : </label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-edit"></i></span>
            </div>
            <textarea class="form-control" name="description" id="description"><?php echo $update_holiday['description'] ?></textarea>
        </div>
    </div>
</div>