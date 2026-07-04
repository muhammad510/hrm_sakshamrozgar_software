<div class="col-md-6">
    <label>Expenses By:<span class="text-danger">*</span></label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="si si-user"></i></span>
        </div>
         <div class="miSlwdth" style="width:92.33%"> 
           <select class="form-control select2-with-search " name="expenseBy" id="expenseBy">
                <option value=""> Choose One </option>
                <?php 
                if($expenseByEmp)
                {
                    foreach($expenseByEmp as $emp)
                    {?>
                 <option value="<?php echo $emp->id;?>"><?php echo $emp->name;?></option>
                <?php }}else{?> <option value="">No data available</option><?php }?>
        </select>  
        </div>
    </div>
</div>
<?php print_r($expenseByEmp);?>