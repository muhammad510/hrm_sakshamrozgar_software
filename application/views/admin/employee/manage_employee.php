<div class="inner-body">
	<!-- Page Header -->
	<div class="page-header">
		<div>
			<h2 class="main-content-title tx-24 mg-b-5">Staff</h2>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Profile</a></li>
				<li class="breadcrumb-item active" aria-current="page">Create New</li>
			</ol>
		</div>
		<div class="d-flex">
			<div class="justify-content-center">
			  <a href="<?php echo base_url('admin/employee/create');?>" class="btn btn-white btn-icon-text my-2 me-2"> <i class="fe fe-plus"></i> Join Employee </a>
              <a href="<?php echo base_url('admin/employee/import');?>"  class="btn btn-white btn-icon-text my-2 me-2"> <i class="fe fe-download me-2"></i> Import </a>
              <a href="<?php echo base_url('auth/login/signout');?>" class="btn btn-danger btn-icon-text  my-2 me-2"> <i class="fe fe-power me-2"></i> Sign Out </a>
			</div>
		</div>
	</div>
	<!-- End Page Header -->

	<style>
		.miBck a:hover{ background-color:#645bca; color:#fff;}
		.miBck{ font-weight:600;text-transform: uppercase; float:right;margin-right: 10px;}
		.miBck a{ border:1px solid #645bca;padding: 8px 12px 8px 12px;border-radius: 5px;color: #645bca;font-weight: bold;}
		.miLst{ font-weight:600;text-transform: uppercase;}
		.miLst i{ background-color: #645bca;padding: 10px;margin-right: 10px;border-radius: 20px;color: #fff;font-weight: bold;}
		.miHeader{padding:20px 15px 15px 15px;border-bottom:1px solid #cccece;margin:0px -10px 20px -10px;border-top-left-radius:5px;border-top-right-radius:5px;background-color: #fff;}
		.cardTtl{border:1px solid #cccece;padding:0px 0px 5px 0px;margin-bottom: 20px;border-radius: 5px;background-color: #fff;}
	</style>

	<!-- Row -->
	<div class="row row-sm" style="margin-bottom:65px;">
		<div class="cardTtl">		
			<div class="miHeader">
				<span class="miLst"><i class="si si-people"></i>Members</span>
				
				<span class="miBck"><a href="<?php echo $bckUrl;?>"><i class="ti-plus"></i></a></span>
			</div>


<!-------------------------------------------------------------------------------->			
			<div class="col-md-12 col-lg-12">
				<div class="row row-sm" >
		          <?php $this->load->view('admin/employee/card_templates'); ?>
<!--------------------------------------------------------------------------------->			
			<div class="col-md-12 col-lg-12">
				<div class="row row-sm" id="amiResult">Result will show here</div>
				<div id="amiPage">Pagination link here</div>
			</div>
			<div class="col-md-12 col-lg-12" style="display:none;">
				<div class="row row-sm">
					<div class="col-md-6 col-lg-6 col-xl-3 col-sm-6">
						<div class="card custom-card">
							<div class="p-0 ht-100p" >
								<div class="product-grid">
									<div class="product-image">
										<a href="ecommerce-product-details.html" class="image">
											<img class="pic-1" alt="product-image-1" src="<?php echo base_url();?>assets/img/pngs/6.png">
											<img class="pic-2" alt="product-image-2" src="<?php echo base_url();?>assets/img/pngs/06.png">
										</a>
										<a class="product-like-icon" href="javascript:void(0);"><i class="far fa-heart"></i></a>
										<span class="product-discount-label bg-warning">-33%</span>
										<div class="product-link">
											<a href="ecommerce-cart.html">
												<i class="fa fa-shopping-cart"></i>
												<span>Add to cart</span>
											</a>
											<a href="ecommerce-product-details.html">
												<i class="fas fa-eye"></i>
												<span>Quick View</span>
											</a>
										</div>
									</div>
									<div class="product-content">
										<h3 class="title"><a href="javascript:void(0);">Long Floral Tunic Tops</a></h3>
										<div class="price"><span class="old-price">$25.00</span><span class="text-danger">$20.00</span></div>
										<ul class="rating">
											<li class="fas fa-star"></li>
											<li class="fas fa-star"></li>
											<li class="fas fa-star"></li>
											<li class="fas fa-star"></li>
											<li class="far fa-star"></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="modal" id="view_employee_modal">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Employee Details</h6>
							<button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">x</span></button>
						</div>
						<div class="modal-body">
							<div id="show_employee"></div>
						</div>
					</div>
				</div>
			</div>
			<!-- View Employee Modal End-->

			<!-- Update Employee Modal Start -->
			<div class="modal" id="update_employee_modal">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Update Employee Details</h6>
							<button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">x</span></button>
						</div>
						<form id="employee_updata" method="post" accept-charset="utf-8" enctype="multipart/form-data">
							<div class="modal-body">
								<div id="up_employee"></div>
							</div>
							<div class="modal-footer">
								<button class="btn ripple btn-primary" type="submit" id="employeedataupdate">Save changes</button>
								<button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Update Employee Modal End-->
		</div>
	</div>
	<!-- End Row -->
</div>
					
<style>
#amiPage{ margin:-30px 0px 20px 0px !important;}
	#amiResult{/*background-color:#f0f0f0;border: 1px solid #e3e2e3;*/margin-bottom:15px;padding:10px 0px 10px 0px;/*height: 64rem;*/}
	.testingAMi{background-color: #018888;padding: 10px;margin: 10px;text-align: center;color: bisque;font-weight: bold;}
	.amiProcess{text-align:center;margin:auto auto 30px auto;background-color:#FFC26F;width:220px;padding:10px;padding-right:10px;padding-left:10px;border-radius:5px;
  border: 1px solid #D2AD7B;color: #AE4A00;}
</style>

<script>
$(function()
{
	$(document).ready(function()
	{
		$(".amiPg").click(function()
		{
			let dataId = $(this).attr("data-id");
			let cID = $(this).attr("id");
			let base_target = $("#base_url").val();
			let actv= $('#amiPagination li.active').attr('id');
			let liCnt=$('#amiPagination').children("li").length;let next=liCnt-2;let amiPrv=parseInt(cID)-parseInt(1);let amiNxt=parseInt(cID)+parseInt(1);
			if(cID=='1'){$('#amiPrev').addClass('disabled');}else{$('#amiPrev').removeClass('disabled');}
			if(next==cID){$('#amiNext').addClass('disabled');}else{$('#amiNext').removeClass('disabled');}
			$('#amiResult').html('<div class="amiProcess">Processing...</div>');
			$.post(dataId,{pgLmt:cID},
			function(htmlAmi){
			
				
				let amiDt='';let viewBtn='';let editBtn='';
				
				$('#amiResult').html(htmlAmi.draw);
				$('#amiPage').html(htmlAmi.miPg);
				
				/*$.each(htmlAmi.draw, function(i,item)
				{
					
					viewBtn="view_employee('"+htmlAmi.draw[i].designation_name+"')";
					editBtn="update_employee('"+htmlAmi.draw[i].designation_name+"')";
					amiDt+='<div class="col-md-6 col-lg-6 col-xl-3 col-sm-6"><div class="card custom-card"><div class="p-0 ht-100p"><div class="product-grid"><div class="product-image"><a href="javascript:void(0)" class="image"><img class="pic-1" style="height: 230px;" alt="product-image-1" src="'+isCheck("base_url")+htmlAmi.draw[i].image+'"><img class="pic-2" alt="product-image-2" src="'+isCheck("base_url")+htmlAmi.draw[i].image+'" style="height: 230px;"></a><div class="product-link"><a href="javascript:void(0);"data-bs-target="#update_employee_modal" data-bs-toggle="modal" style="margin-left:-5px;" onclick="'+editBtn+'" title="Click to Update Employee Details" class="miDefault"><i class="fa fa-pencil-square-o"></i><span>Edit Details</span></a><a href="javascript:void(0);"data-bs-target="#view_employee_modal" data-bs-toggle="modal" style="margin-left:-5px;" onclick="'+viewBtn+'" title="Click to View Employee Details" class="miDefault"><i class="fas fa-eye"></i><span>Quick View</span></a></div></div><div class="product-content"><h3 class="title"><a href="javascript:void(0);">'+htmlAmi.draw[i].name+'<span>('+htmlAmi.draw[i].employee_id+') </span></a></h3><div class="price"><span class="text-danger">'+htmlAmi.draw[i].designation_name+'</span></div></div></div></div></div></div>';
				});
				$('#amiResult').html(amiDt);*/
				
			},'json');
			$(".amiPrev").attr("id",amiPrv);
			$(".amiNext").attr("id",amiNxt);
			$('.page-item').removeClass('active');
			$('#aml'+cID).addClass('active');
		}); 

	});
   
   	$.post("<?php echo base_url('admin/Employee/all_employee_data');?>",
		{ami:''},
		function(htmlAmi){
			let amiDt='';let card='card custom-card';
		/*	$.each(htmlAmi.draw, function(i,item)
			{
			//amiDt+='<div class="col-md-6 col-lg-6 col-xl-3 col-sm-6"><div class="testingAMi">'+htmlAmi.draw[i].employee_id+'</div></div>';
			amiDt+='<div class="col-md-6 col-lg-6 col-xl-3 col-sm-6><div class="'+card+'"><div class="p-0 ht-100p"><div class="product-grid"><div class="product-image"><a href="ecommerce-product-details.html" class="image"><img style="height: 230px;" class="pic-1" alt="product-image-1" src="'+isCheck("base_url")+''+htmlAmi.draw[i].image+'"></a><div class="product-link"><a href="javascript:void(0);"data-bs-target="#view_employee_modal" data-bs-toggle="modal" style="margin-left:-5px;" onclick="view_employee('+htmlAmi.draw[i].id+ ')" title="Click to View Employee Details" class="miDefault"><i class="fas fa-eye"></i><span>Quick View</span></a><a href="javascript:void(0);"data-bs-target="#update_employee_modal" data-bs-toggle="modal" style="margin-left:-5px;" onclick="update_employee(' +htmlAmi.draw[i].id+ ')" title="Click to Update Employee Details" class="miDefault"><i class="fa fa-pencil-square-o"></i><span>Edit Details</span></a></div></div><div class="product-content"><h3 class="title"><a href="javascript:void(0);">'+htmlAmi.draw[i].name+'<span>('+htmlAmi.draw[i].employee_id+') </span></a></h3><div class="price"><span class="text-danger">'+htmlAmi.draw[i].designation_name+'</span></div></div></div></div></div></div>';
			});
			$('#amiResult').html(amiDt);*/
			
			$('#amiResult').html(htmlAmi.draw);
			$('#amiPage').html(htmlAmi.miPg);
		},'json');
  	});
</script>
<script src="<?php echo base_url() ?>assets/js/admin/employee.js"></script>





					
					
					
					
					
					