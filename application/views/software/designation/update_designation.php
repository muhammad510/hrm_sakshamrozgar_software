<div class="row row-sm">
    <div class="col-12">
    <span id="deptNme" class="regiErr">SoftArena</span>
        <label>Department Name:<span class="text-danger">*</span></label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
            </div>
            <input type="hidden" name="id" id="id" value="<?php echo $update_designation['id']; ?>">
            <select class="form-control" name="department" id="department">
                <option value=""> --- Select Department --- </option>
                <?php foreach($department as $dep) { ?>
                <option value="<?php echo $dep['id']; ?>" <?php echo ($dep['id'] == $update_designation['department']) ? "Selected" : "";  ?>><?php echo $dep['department_name']; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="col-12">
        <span id="desigNme" class="regiErr">SoftArena</span>
        <label>Designation Name:<span class="text-danger">*</span></label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
            </div>
            <input type="text" class="form-control" name="designation_name" id="designation_name" value="<?php echo $update_designation['designation_name']; ?>">
        </div>
    </div>
    <div class="col-12">
            <label>Priority:</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="si si-badge"></i></span>
                </div>
                 <select class="form-control" name="priority" id="priority">
                    <option value=""> --- Select Priority --- </option>
                    <option value="Highest" <?php echo (($update_designation['is_priority']=="Highest")?"Selected":"");?> >High</option>
                    <option value="Mid Level" <?php echo (($update_designation['is_priority']=="Mid Level")?"Selected":"");?> >Middle</option>
                    <option value="Lowest"  <?php echo (($update_designation['is_priority']=="Lowest")?"Selected":"");?> >Low</option>
                </select>
            </div>
        </div>
    <div class="col-12">
        <label>Description : </label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-edit"></i></span>
            </div>
            <textarea class="form-control" name="description" id="description"><?php echo $update_designation['description']; ?></textarea>
        </div>
    </div>
</div>