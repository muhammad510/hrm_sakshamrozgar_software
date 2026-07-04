<style>
   .ami_tHeader {background-color: #088 !important;}.ami_tHeader > tr >th {border: 1px solid #088 !important;color: #fff !important;padding-left: 5px !important;}
	.table-responsive{min-height: 420px !important;}
	.amtltip {position: relative;display: inline-block;cursor: pointer;/*  border-bottom: 1px dotted black;*/}
.amtltip .tlptext{visibility:hidden;width: 180px; background-color: rgba(0, 18, 19, 0.99);color: #fff; text-align: center;border-radius: 6px;padding: 10px 10px 10px 10px;position: absolute;z-index: 1;  bottom: 110%;  left: 50%;  margin-left: -50%;white-space: pre-wrap;white-space: -moz-pre-wrap;white-space: -pre-wrap;white-space: -o-pre-wrap;word-wrap: break-word;}.amtltip .tlptext::after {content: ""; position: absolute;top: 100%; left: 50%;margin-left: -5px;border-width: 5px; border-style: solid;border-color: rgba(0, 18, 19, 0.99) transparent transparent transparent;}.amtltip:hover .tlptext {visibility:visible;}
#perfrmView{display:none;}.timeDisplay{float: right;font-size: 11px; color:#7b7b7b;}
.memMessageList{background-color: #ECF2EF;padding:15px;border:1px solid #e1e1e1;border-radius: 5px;}.memMessageList h6{ color:#4F46B1;font-size: 1rem;}

#tchatList{margin: 10px 0px 10px 0px;padding: 10px;border: 1px solid #8080801f;}
.direct-chat-name{ font-weight:600;}.direct-chat-timestamp{ color: #7b6f6f;font-weight: lighter;font-size: 11px;padding-left: 5px;}
.direct-chat-text {border-radius: 5px;position: relative;padding: 5px 10px;background: #e8f7d4;border: 1px solid #e0f4c5;margin: 5px 0 0 50px;color: #444;}.direct-chat-msg::after {content: " ";display: table;}
.direct-chat-msg::after {clear: both;}::after, ::before {-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;}.direct-chat-warning .right > .direct-chat-text { background: #f39c12;border-color: #f39c12;color: #fff;}.right .direct-chat-text {margin-right: 50px;margin-left: 0;background-color: #eaeaea;border: 1px solid #e1e0e0;
}.direct-chat-info { display: block;margin-bottom: 2px;font-size: 12px;}.direct-chat-msg, .direct-chat-text { display: block;}.right .direct-chat-img {float: right;}.direct-chat-msg{ margin:10px !important; }
.direct-chat-img {border-radius: 50%;float: left;width: 40px;height: 40px;}
.myChatCon{ color: #009bbf;font-weight: 600;text-transform: uppercase;border-bottom: 1px solid #3003;padding: 5px 0px 5px 0px;}
.myChatCon span{ border:1px solid #009bbf;padding:7px 5px 4px 5px;}
.myChatCon i{color: white;padding: 8px;background-color: #009bbf;}
#chtConversion{height: 350px;overflow: auto;}
#writeConversion{}
.pstRemarks{color: #4636EE;font-weight: 700;background-color: #4636EE33;padding: 10px 10px 10px 10px;border: 1px solid #4636EE26;}
</style>
<div class="inner-body">
          
<div class="row row-sm" style="margin:15px -10px 75px -10px;">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header  border-0"> <h5 class="card-title">Performance</h5></div> 
              <div class="card-body">
                <div class="row row-sm">
                    <div class="col-md-12 col-lg-12">
                       <div id="getPrfrmList">
                        	<div class="table-responsive">
                            <table class="table text-nowrap text-md-nowrap table-striped table-bordered table-hover mg-b-0" id="perform_det">
                              <thead class="ami_tHeader">
                                <tr>
                                  <th>SL. </th>
                                  <th>Feedback Heading</th>
                                  <th>Remarks</th>
                                  <th>Date</th>
                                  <th>Action</th> 
                                </tr>
                              </thead>
                            </table>
                        </div>
                       </div>
                       <div id="perfrmView">
                       		<!---------------------------------------------------------------------------------------------------------->
                                <div class="main-content-body main-content-body-contacts">
											<div class="main-contact-info-header pt-3">
												<div class="media">
													<div class="main-img-user">
														<img alt="avatar" id="empImgSrc" src="<?php echo base_url('assets/img/users/1.jpg');?>"> <a href="javascript:void(0);"><i class="fe fe-camera"></i></a>
													</div>
													<div class="media-body">
														<h4 id="empNm">R M Singh </h4>
														<p id="empDesig">Designation</p>
														<nav class="contact-info">
															<a href="javascript:void(0);" class="contact-icon border tx-inverse" data-bs-toggle="tooltip" title="" data-bs-original-title="Call" aria-label="Call"><i class="fe fe-phone"></i></a>
															<a href="javascript:void(0);" class="contact-icon border tx-inverse" data-bs-toggle="tooltip" title="" data-bs-original-title="Block" aria-label="Block"><i class="fe fe-slash"></i></a>
														</nav>
													</div>
												</div>
												<div class="main-contact-action btn-list pt-3 pe-3">
													<a href="javascript:void(0);" class="btn ripple btn-outline-primary btn-icon" data-bs-placement="top" data-bs-toggle="tooltip" title="" data-bs-original-title="Review" aria-label="Review">
                                                    	<i class="fe fe-edit"></i>
                                                    </a>
                                  <a href="javascript:void(0);" class="btn ripple btn-outline-dark btn-icon getAction" data-id="prBackTolist===thecodex" data-bs-placement="top" data-bs-toggle="tooltip" title="" data-bs-original-title="Back" aria-label="Back">
                                                        <i class="ti-arrow-left"></i>
                                                    </a>
												</div>
											</div>
											<div class="main-contact-info-body">
												<div class="memMessageList">
													<h6 id="msgHeading">Biography</h6>
													<p id="empMsgs"></p>
												</div>

                                                <div id="tchatList">                                                  
                                                    <div class="myChatCon"><i class="si si-bubble"></i><span>Chat Messages</span></div>  
                                                   <div id="chtConversion"></div>                                
                                                </div>                                               
                                               <div id="writeConversion">
                                              		<div class="ql-wrapper ql-wrapper-demo mb-3">
                                                        <label class="pstRemarks">Post Remarks By You</label>
                                                        <div id="quillEditor">
                                                        </div>
                                                    </div>
                                              
                                                <div style="background-color:#CCCCCC;">
                                                    <button class="btn ripple btn-outline-success pull-right amiStl" id="remarksByAdmin" type="button">
                                                        <i class="ti-save"></i> Submit
                                                    </button>
                                                     <button class="btn ripple btn-outline-dark pull-right amiStl getAction" data-id="prBackToView===thecodex" type="button" style="margin-right:5px;">
                                                        <i class="ti-arrow-left"></i> Back
                                                     </button>
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
var reportBranch = '';
$(document).ready(function()
 {
    let searchObj = {};
    var target = $('#target').val();
    reportBranch = { printTable: function(search_data) {getpaginate(search_data, '#perform_det', target, 'Only For Id,Date,Heading.'); } }
    reportBranch.printTable(searchObj);
	});
$(function() 
{
	$(document).on("click", '.getAction', function() 
	{
		let actNbtn=$(this).attr('data-id');
		let getData=actNbtn.split('===');
		if(getData[0]=='miLvView')
		{	
			$('#prview' + getData[2]).html('<i class="fe fe-sun bx-spin"></i>');
			$.post(base_url+getData[1],{id:getData[2]},function(htmlAmi)
			{
				if(htmlAmi.addClas=='success')
				{
					$('#prview' + getData[2]).html('<i class="ti-eye"></i>');
					$('#perfrmView').show();$('#getPrfrmList').hide();$('#empImgSrc').attr('src',htmlAmi.empImage);
					$('#empNm').html(htmlAmi.empName);$('#empDesig').html(htmlAmi.empDesig);
					$('#msgHeading').html(htmlAmi.heading);$('#empMsgs').html(htmlAmi.message);
					if(htmlAmi.chtMsg==""){$('#tchatList').hide();$('#writeConversion').css('margin-top','10px');}else{$('#tchatList').show();$('#writeConversion').css('margin-top','0px');}
					
					$('#chtConversion').html(htmlAmi.chtMsg);
					$('#remarksByAdmin').attr('data-id',htmlAmi.chtMsgSave).addClass('getAction');
					//console.log(htmlAmi);
					}
				else{toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);$('#remarksByAdmin').removeClass('getAction');}
				},'json');
			}	
		else if(getData[0]=='saveRemarks')
		{	
			$('#remarksByAdmin').html('<i class="fe fe-sun bx-spin"></i> Please Wait');
			$.post(base_url+getData[1],{id:getData[2],remarks:$('.ql-editor').html()},function(htmlAmi)
			{
				if(htmlAmi.addClas=='tst_success'){window.location.reload(1);}
				toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
				$('#remarksByAdmin').html('<i class="ti-save"></i> Submit');
				},'json');
		}				
		else if((getData[0]=='prBackTolist')||(getData[0]=='prBackToView')){$('#perfrmView').hide();$('#getPrfrmList').show();}					
		});
});

</script>
