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
				<button type="button" class="btn btn-white btn-icon-text my-2 me-2">
					<i class="fe fe-download me-2"></i> Import
				</button>
				<button type="button" class="btn btn-white btn-icon-text my-2 me-2">
					<i class="fe fe-filter me-2"></i> Filter
				</button>
				<button type="button" class="btn btn-primary my-2 btn-icon-text">
					<i class="fe fe-download-cloud me-2"></i> Download Report
				</button>
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
		.cardTtl{border:1px solid #cccece;padding:0px 0px 5px 0px;margin-bottom: 20px;border-radius: 5px;/*background-color: #fff;*/}
	</style>

	<!-- Row -->
	<div class="row row-sm">
		<div class="cardTtl">		
			<div class="miHeader">
				<span class="miLst"><i class="si si-people"></i>Members</span>
				
				<span class="miBck"><a href="<?php echo $bckUrl;?>"><i class="ti-arrow-left"></i></a></span>
			</div>
			
			<div class="col-md-12 col-lg-12">
				<div class="row row-sm" id="amiResult">Result will show here</div>
				<div id="amiPage" style="margin:0px -2px 0px 0px;">Pagination link here</div>
			</div>
			<div class="col-md-12 col-lg-12" style="display:none;">
			<div class="row row-sm">
				<div class="col-md-6 col-lg-6 col-xl-3 col-sm-6">
					<div class="card custom-card">
						<div class="p-0 ht-100p">
							<div class="product-grid">
								<div class="product-image">
									<a href="ecommerce-product-details.html" class="image">
										<img class="pic-1" alt="product-image-1" src="<?php echo base_url();?>assets/img/pngs/1.png">
										<img class="pic-2" alt="product-image-2" src="<?php echo base_url();?>assets/img/pngs/01.png">
									</a>
									<a class="product-like-icon" href="javascript:void(0);"><i class="far fa-heart"></i></a>
									<!--<span class="product-discount-label">-33%</span>-->
									<div class="product-link">
										<a href="ecommerce-cart.html">
											<i class="fa fa-pencil-square-o"></i><span>Edit Details</span>
										</a>
										<a href="ecommerce-product-details.html">
											<i class="fas fa-eye"></i>
											<span>Quick View</span>
										</a>
									</div>
								</div>
								<div class="product-content">
									<h3 class="title"><a href="javascript:void(0);">Women's Red dress</a></h3>
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
				<div class="col-md-6 col-lg-6 col-xl-3 col-sm-6">
					<div class="card custom-card">
						<div class="p-0 ht-100p">
							<div class="product-grid">
								<div class="product-image">
									<a href="ecommerce-product-details.html" class="image">
										<img class="pic-1" alt="product-image-1" src="<?php echo base_url();?>assets/img/pngs/2.png">
										<img class="pic-2" alt="product-image-2" src="<?php echo base_url();?>assets/img/pngs/02.png">
									</a>
									<a class="product-like-icon" href="javascript:void(0);"><i class="far fa-heart"></i></a>
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
									<h3 class="title"><a href="javascript:void(0);">Casual wear top</a></h3>
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
				<div class="col-md-6 col-lg-6 col-xl-3 col-sm-6">
					<div class="card custom-card">
						<div class="p-0 ht-100p">
							<div class="product-grid">
								<div class="product-image">
									<a href="ecommerce-product-details.html" class="image">
										<img class="pic-1" alt="product-image-1" src="<?php echo base_url();?>assets/img/pngs/3.png">
										<img class="pic-2" alt="product-image-2" src="<?php echo base_url();?>assets/img/pngs/03.png">
									</a>
									<a class="product-like-icon" href="javascript:void(0);"><i class="far fa-heart"></i></a>
									<span class="product-discount-label bg-info">-50%</span>
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
									<h3 class="title"><a href="javascript:void(0);">Party wear black top</a></h3>
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
				<div class="col-md-6 col-lg-6 col-xl-3 col-sm-6">
					<div class="card custom-card">
						<div class="p-0 ht-100p">
							<div class="product-grid">
								<div class="product-image">
									<a href="ecommerce-product-details.html" class="image">
										<img class="pic-1" alt="product-image-1" src="<?php echo base_url();?>assets/img/pngs/4.png">
										<img class="pic-2" alt="product-image-2" src="<?php echo base_url();?>assets/img/pngs/04.png">
									</a>
									<a class="product-like-icon" href="javascript:void(0);"><i class="far fa-heart"></i></a>
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
									<h3 class="title"><a href="javascript:void(0);">Women's Rayon top</a></h3>
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
				<div class="col-md-6 col-lg-6 col-xl-3 col-sm-6">
					<div class="card custom-card">
						<div class="p-0 ht-100p">
							<div class="product-grid">
								<div class="product-image">
									<a href="ecommerce-product-details.html" class="image">
										<img class="pic-1" alt="product-image-1" src="<?php echo base_url();?>assets/img/pngs/5.png">
										<img class="pic-2" alt="product-image-2" src="<?php echo base_url();?>assets/img/pngs/05.png">
									</a>
									<a class="product-like-icon" href="javascript:void(0);"><i class="far fa-heart"></i></a>
									<span class="product-discount-label bg-danger">-40%</span>
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
									<h3 class="title"><a href="javascript:void(0);">Western Skirt &amp; Top</a></h3>
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
				<div class="col-md-6 col-lg-6 col-xl-3 col-sm-6">
					<div class="card custom-card">
						<div class="p-0 ht-100p">
							<div class="product-grid">
								<div class="product-image">
									<a href="ecommerce-product-details.html" class="image">
										<img class="pic-1" alt="product-image-1" src="<?php echo base_url();?>assets/img/pngs/1.png">
										<img class="pic-2" alt="product-image-2" src="<?php echo base_url();?>assets/img/pngs/1.png">
									</a>
									<a class="product-like-icon" href="javascript:void(0);"><i class="far fa-heart"></i></a>
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
									<h3 class="title"><a href="javascript:void(0);">Party Wear Fancy Top</a></h3>
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

				<div class="col-md-6 col-lg-6 col-xl-3 col-sm-6">
					<div class="card custom-card">
						<div class="p-0 ht-100p">
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
				<div class="col-md-6 col-lg-6 col-xl-3 col-sm-6">
					<div class="card custom-card">
						<div class="p-0 ht-100p">
							<div class="product-grid">
								<div class="product-image">
									<a href="ecommerce-product-details.html" class="image">
										<img class="pic-1" alt="product-image-1" src="<?php echo base_url();?>assets/img/pngs/7.png">
										<img class="pic-2" alt="product-image-2" src="<?php echo base_url();?>assets/img/pngs/07.png">
									</a>
									<a class="product-like-icon" href="javascript:void(0);"><i class="far fa-heart"></i></a>
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
									<h3 class="title"><a href="javascript:void(0);">Long Slit Full Sleeve</a></h3>
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
				<div class="col-md-6 col-lg-6 col-xl-3 col-sm-6">
					<div class="card custom-card">
						<div class="p-0 ht-100p">
							<div class="product-grid">
								<div class="product-image">
									<a href="ecommerce-product-details.html" class="image">
										<img class="pic-1" alt="product-image-1" src="<?php echo base_url();?>assets/img/pngs/8.png">
										<img class="pic-2" alt="product-image-2" src="<?php echo base_url();?>assets/img/pngs/08.png">
									</a>
									<a class="product-like-icon" href="javascript:void(0);"><i class="far fa-heart"></i></a>
									<div class="product-link">
										<a href="javascript:void(0);">
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
				<div class="col-md-6 col-lg-6 col-xl-3 col-sm-6">
					<div class="card custom-card">
						<div class="p-0 ht-100p">
							<div class="product-grid">
								<div class="product-image">
									<a href="ecommerce-product-details.html" class="image">
										<img class="pic-1" alt="product-image-1" src="<?php echo base_url();?>assets/img/pngs/7.png">
										<img class="pic-2" alt="product-image-2" src="<?php echo base_url();?>assets/img/pngs/07.png">
									</a>
									<a class="product-like-icon" href="javascript:void(0);"><i class="far fa-heart"></i></a>
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
									<h3 class="title"><a href="javascript:void(0);">Long Slit Full Sleeve</a></h3>
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
				<div class="col-md-6 col-lg-6 col-xl-3 col-sm-6">
					<div class="card custom-card">
						<div class="p-0 ht-100p">
							<div class="product-grid">
								<div class="product-image">
									<a href="ecommerce-product-details.html" class="image">
										<img class="pic-1" alt="product-image-1" src="<?php echo base_url();?>assets/img/pngs/8.png">
										<img class="pic-2" alt="product-image-2" src="<?php echo base_url();?>assets/img/pngs/08.png">
									</a>
									<a class="product-like-icon" href="javascript:void(0);"><i class="far fa-heart"></i></a>
									<div class="product-link">
										<a href="javascript:void(0);">
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
				<div class="col-md-6 col-lg-6 col-xl-3 col-sm-6">
					<div class="card custom-card">
						<div class="p-0 ht-100p">
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
		</div>
	</div>
	<!-- End Row -->
</div>
					
<style>
	#amiResult{/*background-color:#f0f0f0;border: 1px solid #e3e2e3;*/margin-bottom:15px;padding:10px 0px 10px 0px;height: 64rem;}
	.testingAMi{background-color: #018888;padding: 10px;margin: 10px;text-align: center;color: bisque;font-weight: bold;}
	.amiProcess{ text-align:center;margin:auto;}
</style>

<script>
$(function()
{
	$(document).ready(function()
	{
		$(".amiPg").click(function()
		{
			let dataId = $(this).attr("data-id");let cID = $(this).attr("id");let actv= $('#amiPagination li.active').attr('id');
			let liCnt=$('#amiPagination').children("li").length;let next=liCnt-2;let amiPrv=parseInt(cID)-parseInt(1);let amiNxt=parseInt(cID)+parseInt(1);
			if(cID=='1'){$('#amiPrev').addClass('disabled');}else{$('#amiPrev').removeClass('disabled');}
			if(next==cID){$('#amiNext').addClass('disabled');}else{$('#amiNext').removeClass('disabled');}
			$('#amiResult').html('<div class="amiProcess">Processing...</div>');
			$.post(dataId,{pgLmt:cID},
			function(htmlAmi){
				let amiDt='';
				$.each(htmlAmi.draw, function(i,item)
				{
					//amiDt+='<div class="col-md-6 col-lg-6 col-xl-3 col-sm-6"><div class="testingAMi">'+htmlAmi.draw[i].employee_id+'</div></div>';
					amiDt+='<div class="col-md-6 col-lg-6 col-xl-3 col-sm-6"><div class="card custom-card"><div class="p-0 ht-100p"><div class="product-grid"><div class="product-image"><a href="ecommerce-product-details.html" class="image"><img class="pic-1" alt="product-image-1" src="'+isCheck("base_url")+'assets/img/pngs/1.png"><img class="pic-2" alt="product-image-2" src="'+isCheck("base_url")+'assets/img/pngs/01.png"></a><div class="product-link"><a href="ecommerce-cart.html"><i class="fa fa-pencil-square-o"></i><span>Edit Details</span></a><a href="ecommerce-product-details.html"><i class="fas fa-eye"></i><span>Quick View</span></a></div></div><div class="product-content"><h3 class="title"><a href="javascript:void(0);">'+htmlAmi.draw[i].name+'</a></h3><div class="price"><span class="old-price">$25.00</span><span class="text-danger">$20.00</span></div><ul class="rating"><li class="fas fa-star"></li><li class="fas fa-star"></li><li class="fas fa-star"></li><li class="fas fa-star"></li><li class="far fa-star"></li></ul></div></div></div></div></div>';
					/*amiDt+='<div class="col-md-6 col-lg-6 col-xl-3 col-sm-6">
						<div class="card custom-card">
							<div class="p-0 ht-100p">
								<div class="product-grid">
									<div class="product-image">
										<a href="ecommerce-product-details.html" class="image">
											<img class="pic-1" alt="product-image-1" src="<?php echo base_url();?>assets/img/pngs/1.png">
											<img class="pic-2" alt="product-image-2" src="<?php echo base_url();?>assets/img/pngs/01.png">
										</a>
										<a class="product-like-icon" href="javascript:void(0);"><i class="far fa-heart"></i></a>
										<span class="product-discount-label">-33%</span>
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
										<h3 class="title"><a href="javascript:void(0);">'+htmlAmi.draw[i].employee_id+'</a></h3>
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
					</div>';*/
				});
				$('#amiResult').html(amiDt);
			},'json');
			$(".amiPrev").attr("id",amiPrv);
			$(".amiNext").attr("id",amiNxt);
			$('.page-item').removeClass('active');
			$('#aml'+cID).addClass('active');
		}); 

	});
   
   	$.post("<?php echo base_url('staff/profile/view');?>",
		{ami:''},
		function(htmlAmi){
			let amiDt='';
			$.each(htmlAmi.draw, function(i,item)
			{
			//amiDt+='<div class="col-md-6 col-lg-6 col-xl-3 col-sm-6"><div class="testingAMi">'+htmlAmi.draw[i].employee_id+'</div></div>';
			amiDt+='<div class="col-md-6 col-lg-6 col-xl-3 col-sm-6"><div class="card custom-card"><div class="p-0 ht-100p"><div class="product-grid"><div class="product-image"><a href="ecommerce-product-details.html" class="image"><img class="pic-1" alt="product-image-1" src="'+isCheck("base_url")+'assets/img/pngs/1.png"><img class="pic-2" alt="product-image-2" src="'+isCheck("base_url")+'assets/img/pngs/01.png"></a><div class="product-link"><a href="ecommerce-cart.html"><i class="fa fa-pencil-square-o"></i><span>Edit Details</span></a><a href="ecommerce-product-details.html"><i class="fas fa-eye"></i><span>Quick View</span></a></div></div><div class="product-content"><h3 class="title"><a href="javascript:void(0);">'+htmlAmi.draw[i].name+'</a></h3><div class="price"><span class="old-price">$25.00</span><span class="text-danger">$20.00</span></div><ul class="rating"><li class="fas fa-star"></li><li class="fas fa-star"></li><li class="fas fa-star"></li><li class="fas fa-star"></li><li class="far fa-star"></li></ul></div></div></div></div></div>';
			});
			$('#amiResult').html(amiDt);
			$('#amiPage').html(htmlAmi.miPg);
		},'json');
  	});
</script>





					
					
					
					
					
					