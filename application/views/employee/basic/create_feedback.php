<style>
.pstRemarks{color:#74737B;font-weight: 700;}
</style>
<div class="inner-body">      
<div class="row row-sm" style="margin:15px -10px 75px -10px;">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header  border-0"> <h5 class="card-title">Post Remarks By You</h5></div> 
              <div class="card-body">
                <div class="row row-sm">
                    <div class="col-md-12 col-lg-12">
                      
                       <div id="perfrmView">
                       		<!---------------------------------------------------------------------------------------------------------->
                                <div class="main-content-body main-content-body-contacts">
											
											<div class="main-contact-info-body">
				                                               
                                               <div id="writeConversion">
                                              		<div class="ql-wrapper ql-wrapper-demo mb-3">
                                                       <div class="form-group">
                                                            <p class="mg-b-10">Feedback Heading</p>
                                                            <input type="text" class="form-control" name="feedbckHeading" id="feedbckHeading" placeholder="Feedback Heading">
                                                        </div>
                                                       
                                                        <label class="pstRemarks">Feedback Remark</label>
                                                        <div id="quillEditor"></div>
                                                    </div>
                                              
                                                <div style="background-color:#CCCCCC;">
                                                    <button class="btn ripple btn-outline-success pull-right amiStl getAction" id="remarksByAdmin" data-id="<?php echo $remarkFeedback;?>" type="button">
                                                        <i class="ti-save"></i> Submit
                                                    </button>
                                                     <a class="btn ripple btn-outline-dark pull-right amiStl getAction" href="<?php echo base_url('employee/performance');?>" style="margin-right:5px;">
                                                        <i class="ti-arrow-left"></i> Back
                                                     </a>
                                                </div>
                                               </div>
                                               
											</div>
										</div>
                                
                            <!---------------------------------------------------------------------------------------------------------->
                       </div>                                                 
                    </div>
                </div>       
            </div>
        </div>
    </div>
</div>
 <input type="hidden" id="target" name="target" value="<?php echo $target;?>" />
   <script src="<?php echo base_url('assets/plugins/quill/quill.min.js');?>"></script>
<script>
$(function() {
	'use strict'
	var toolbarOptions = [[{'header': [1, 2, 3, 4, 5, 6, false]}],['bold', 'italic', 'underline', 'strike'],[{'list': 'ordered'}, {'list': 'bullet'}],['link', 'image', 'video']];
	var quill = new Quill('#quillEditor', {modules: {toolbar: toolbarOptions},theme: 'snow'});
	var toolbarInlineOptions = [['bold', 'italic', 'underline'],[{'header': 1}, {'header': 2}, 'blockquote'],['link', 'image', 'code-block'],];
	
});
$(function() 
{
	$(document).on("click", '.getAction', function() 
	{
		let actNbtn=$(this).attr('data-id');
		let getData=actNbtn.split('===');
		if(getData[0]=='saveRemarks')
		{	
			$('#remarksByAdmin').html('<i class="fe fe-sun bx-spin"></i> Please Wait');
			$.post(base_url+getData[1],{remarks:$('.ql-editor').html(),heading:$('#feedbckHeading').val()},function(htmlAmi)
			{
				if(htmlAmi.addClas=='tst_success'){setTimeout(function(){window.location.href=htmlAmi.reloadLoc;},2000);}
				toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
				$('#remarksByAdmin').html('<i class="ti-save"></i> Submit');
				},'json');
		}						
		});
});

</script>
