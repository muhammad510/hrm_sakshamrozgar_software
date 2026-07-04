<div class="row row-sm">
    <div class="col-12">
    	 <span id="deptNme" class="regiErr">SoftArena</span>
        <label>Department Name:<span class="text-danger">*</span></label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
            </div>
            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $update_department['id'] ?>">
            <input type="text" class="form-control" name="department_name" id="department_name" value="<?php echo $update_department['department_name'] ?>">
        </div>
    </div>
    <div class="col-12">
        <label>Description:<span class="text-danger">*</span></label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-edit"></i></span>
            </div>
            <textarea class="form-control" name="description" id="description"><?php echo $update_department['description'] ?></textarea>
        </div>
    </div>
</div>