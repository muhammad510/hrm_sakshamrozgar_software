<style>
.dataTables_processing{ background-color:#DCC392 !important; color:#805400;}
.miWdth{ width:65px;}
#forViewDetailLeave{ display:none;}/*.lvListView{ display:none;}*/
.btn-miOk {color: #10c1b1  !important;border-color: #10c1b1 ;}
.btn-miOk:hover{border-color: #10c1b1 ; background-color:#10c1b1; color:#fff !important }
.appResultMsg{padding:20px;padding-right:20px;padding-left:20px;margin:auto auto 35px auto;width:75%;border-radius:10px;text-align: center; }

.delMsg{text-align:center;font-size:20px;margin:30px 0px 10px 0px;color:#c65300;}
.delMsg i{background-color: #c65300;color:#fff;padding: 7px;border-radius: 5px;}

.actnData{text-align: center;margin: 0px 0px 20px 0px;color: #716c6c;font-size: .8rem;}

</style>
 <!-------------------- @mit Code Changes Here Start -------------------->                     
     <div class="row row-sm" style="margin:15px -10px 15px -10px;">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header  border-0"> <h4 class="card-title"><?php echo $title; ?> Summary</h4> </div> 
                  <div class="card-body lvListView">
                     <div class="table-responsive">
                        <div class="row row-sm">
							<br />
                            <h3 align="center">How to Import Excel Data into Mysql in Codeigniter</h3>
                            <form method="post" id="import_form" enctype="multipart/form-data">
                                <p><label>Select Excel File</label>
                                <input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>
                                <br />
                                <input type="submit" name="import" value="Import" class="btn btn-info" />
                            </form>
                            <br />
                            <div class="table-responsive" id="customer_data"></div>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
$(document).ready(function()
{
//7859016767
 load_data();

 function load_data()
 {
  $.ajax({
   url:"<?php echo base_url('admin/testingMode/fetch'); ?>",
   method:"POST",
   success:function(data){
    $('#customer_data').html(data);
   }
  })
 }

 $('#import_form').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"<?php echo base_url('admin/testingMode/import'); ?>",
   method:"POST",
   data:new FormData(this),
   contentType:false,
   cache:false,
   processData:false,
   success:function(data){
    $('#file').val('');
    load_data();
    alert(data);
   }
  })
 });

});
</script>
 
 
 
 
 
 
 