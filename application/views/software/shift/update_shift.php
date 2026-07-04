<div class="row">
    <div class="col-4">
        <label>Shift Name:<span class="text-danger">*</span></label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
            </div>
            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $update_shift['id'] ?>">
            <input type="text" class="form-control" name="shift_name" id="shift_name" value="<?php echo $update_shift['shift_name']; ?>">
        </div>
    </div>
    <div class="col-4">
        <label>Shift duration: (Hours)<span class="text-danger">*</span></label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-business-time"></i></span>
            </div>
            <input type="text" class="form-control" name="shift_duration" id="shift_duration" value="<?php echo $update_shift['shift_duration']; ?>" oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')" maxlength="2">
        </div>
    </div>
    <div class="col-4">
        <label>Greace Preiod:{min}</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-business-time"></i></span>
            </div>
            <input type="text" class="form-control" name="graceP" id="graceP" value="<?php echo $update_shift['grace_periods']; ?>" oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')" maxlength="2">
        </div>
    </div>
    <div class="col-6">
        <label>Shift Start Time:<span class="text-danger">*</span></label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-clock"></i></span>
            </div>
            <input type="text" class="form-control" name="previous_shift_start" id="previous_shift_end" value="<?php echo $update_shift['shift_start']; ?>" readonly>
            <input type="time" class="form-control" name="shift_start" id="shift_start">
        </div>
    </div>
    <div class="col-6">
        <label>Shift End Time:<span class="text-danger">*</span></label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-clock"></i></span>
            </div>
            <input type="text" class="form-control" name="previous_shift_end" id="previous_shift_end" value="<?php echo $update_shift['shift_end']; ?>" readonly>
            <input type="time" name="shift_end" id="shift_end" class="form-control">
        </div>
    </div>
</div>