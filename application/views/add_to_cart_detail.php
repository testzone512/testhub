<?php $this->load->view('header'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/front/css/product-details.css" media="all">
	<script src="<?php echo base_url(); ?>public/admin/js/jquery-1.10.2.js"></script>
	<link href="<?php echo base_url(); ?>public/bxslider/jquery.bxslider.css" rel="stylesheet" />
	<script src="<?php echo base_url(); ?>public/bxslider/jquery.bxslider.js"></script>
	<script src="<?php echo base_url(); ?>public/bxslider/jquery.bxslider.min.js"></script>
	<script src="<?php echo base_url(); ?>public/front/js/jquery.elevatezoom.js"></script>
	<script>
		$(document).ready(function(){
			$('.bxslider').bxSlider({
				pagerCustom: '#bx-pager',
				mode: 'fade',
			});
		});
		$('.bxslider').bxSlider({
			pagerCustom: '#bx-pager'
		});
	</script>

	<script src="<?php echo base_url(); ?>public/admin/js/jquery.validation.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#frmAddToCart").validate({
				rules:
				{
					<?php if(!empty($colourDetails[0]['pd_product_color'])){?>
					sltcolour:
					{
						required:true
					},
																	<?php } ?>
					<?php
					if(!empty($sizeDetails)){ ?>
					sltsize:
					{
						required:true
					},
									 <?php } ?>
					sltqty:
					{
						required:true
					}
				},
				messages:
				{
					<?php if(!empty($colourDetails[0]['pd_product_color'])){?>
					sltcolour:
					{
						required:''
					},
																	 <?php } ?>
					<?php
					if(!empty($sizeDetails)){?>
					sltsize:
					{
						required: ''
					},
									  <?php } ?>
					sltqty:
					{
						required: ''
					}
				}
			});
		});
	</script>

<script>
	$(document).ready(function(){
		$("#sltsize").change(function(){
			var sltsize = $(this).val();
			var product_id = $(this).attr('data_size');
			//alert(sltsize);
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('cart/ajax_size_found_in_tempcart'); ?>",
				data: {sltsize: sltsize,product_id,product_id},
				dataType: 'text',
				success: function (data)
				{
					if(data == "user_not_login")
					{
						$("#target").html('<a id="goto_cart" href="<?php echo base_url('login'); ?>">Go TO CART</a>');
					}
					if(data =="true")
					{
						$("#target").html('<a id="goto_cart" href="<?php echo base_url('cart/shopping_cart'); ?>">Go TO CART</a>');
					}
					else
					{
						$("#target").html('<button type="submit" name="btnAddToCart">ADD TO CART</button>');
					}
				}
			});
		});
	});
</script>

	<style type="text/css">

		input.error,select.error {border: 1px solid #FF0000;}
		#goto_cart
		{
			background-color: #999999 !important;
			margin-left: 24%;
			background-color: #000000;
			border: 0 none;
			border-radius: 0;
			color: #ffffff;
			font-weight: bold;
			padding: 12px;
			width: 50%;
		}
	</style>
<div class="product-dets">
	<div class="product-dets-loca poppinssemibold col-xs-12 col-sm-12">
		<h4>HOME /</h4>
		<h1><?php echo ucfirst($productDetails[0]['product_name']); ?></h1>
	</div>
	<img src="<?php echo base_url();?>public/front/images/Clothesloop Website-17.jpg" class="img-responsive" alt="MAIN IMAGE">
</div>

<?php
$attributes = 'id="frmAddToCart" name="frmAddToCart"';
echo form_open('cart/temp_add_cart/',$attributes);
?>
<div class="container">
	<?php
	if(validation_errors())
	{
		?>
		<div class="alert alert-danger msg-success-error" style="margin-top: 5%">
			<!-- a title="Hide Notification" class="close-notification tooltip" href="#">x</a -->
			<a href="#" class="close msg-close" data-dismiss="alert" aria-label="close">&times;</a>
			<h4>Error</h4>
			<p><?php echo validation_errors(); ?></p>
		</div>
		<?php
	}
	?>
	<div class="row">
		<div class="col-sm-5">
			 <div class="row" >
				<div class="col-sm-12">
					<ul class="bxslider">
						<?php
						foreach($productDetails as $pval)
						{
							if($pval['product_image'])
							{
								?>
								<li><img class="img1 img-responsive" src="<?php echo site_url();?>public/upload/product/<?php echo $pval['product_image']; ?>" data-zoom-image="<?php echo site_url();?>public/upload/product/thumb/<?php echo $pval['product_image']; ?>" /></li>
								<?php
							}
							foreach($galleryDetails as $gval)
							{
								if($gval['gallery_image'])
								{
									?>
									<li><img class="img1 img-responsive" src="<?php echo site_url();?>public/upload/gallery/<?php echo $gval['gallery_image']; ?>" data-zoom-image="<?php echo site_url();?>public/upload/gallery/thumb/<?php echo $gval['gallery_image']; ?>" /></li>
									<?php
								}
							}
						}
						?>
					</ul>
				</div>
				<div class="col-sm-12 sub-pro-imgs">
					<div id="bx-pager" class="sub-img">
                     <?php
						$count=0;
						foreach($productDetails as $pval)
						{
							if($pval['product_image'])
							{
								?>
								<a data-slide-index="<?php echo $count; ?>" href=""><img  src="<?php echo site_url();?>public/upload/product/thumb/<?php echo $pval['product_image']; ?>" /></a>
								<?php
								$count=1;
							}
							foreach($galleryDetails as $gval)
							{
								if($gval['gallery_image'])
								{
									?>
									<a data-slide-index="<?php echo $count; ?>" href=""><img   src="<?php echo site_url();?>public/upload/gallery/thumb/<?php echo $gval['gallery_image']; ?>" /></a>
									<?php $count++;
								}
							}
						}
						?>
					</div>
				</div>
			</div>
			<script type="text/javascript">
			$(function() {
			$(".img1").elevateZoom();
			});
			</script>
		</div>

		<div class="col-sm-7 select-pro-detail poppinsregular">
			<input type="hidden" name="hdn_product_id" value="<?php echo $productDetails[0]['product_id']; ?> ">
			<input type="hidden" name="hdn_product_name" value="<?php echo $productDetails[0]['product_name']; ?> ">
			<input type="hidden" name="hdn_product_price" value="<?php echo $productDetails[0]['product_price']; ?> ">
			<input type="hidden" name="hdn_product_image" value="<?php echo $productDetails[0]['product_image']; ?> ">

			<h3 class="pro-deta-heading"><?php echo strtoupper($productDetails[0]['product_name']); ?></h3>

				<?php if(get_qty($productDetails[0]['product_id']) <= 0)
				{
				?>
					<h4 class="pro-stock"><i class="fa fa-ban" aria-hidden="true" style="color: red;"> STOCK OUT</i></h4>
					<?php
				}
				else
				{
				?>
					<h4 class="pro-stock"><i class="fa fa-check-square-o" aria-hidden="true"></i> IN STOCK</h4>
				<?php
				}
				?>

			<h3 class="pro-prize">$ <?php echo $productDetails[0]['product_price'].'.00'; ?>  <?php //echo "<pre>"; print_r($sizeDetails); ?></h3>
			<h5 class="pro-details-content">The perfect light coat to protect you from the light breeze in the spring. This classic coat is a wardrobe staple that goes with almost anything.</h5>
			<h4 class="pro-dets-content poppinssemibold">PRODUCT DETAILS</h4>
			<ul>
				<li><h5>&emsp;Soft Faux Suede fabric, polyester</h5></li>
				<li><h5>&emsp;Working Pockets</h5></li>
				<li><h5>&emsp;Waterfall style collar</h5></li>
				<li><h5>&emsp;Washing Instructions: Iron on low heat, Cold Machine Wash Only. Do not dryclean.</h5></li>
				<li><h5>&emsp;Made in China</h5></li>
			</ul>
			<?php
			//if colour and size empty then not show
			if(!empty($colourDetails[0]['pd_product_color']) && !empty($sizeDetails))
			{
			?>
				<div class="row poppinssemibold">
					<div class="pro-dets-line"></div>
					 <?php
					 if(!empty($colourDetails[0]['pd_product_color']))
					 {
					  ?>
							<div class="col-sm-5 pro-dets-textbox">
								<label>Colour</label>
								<select name="sltcolour" class="poppinsregular form-control" id="sltcolour">
									<option value="">- Select Colour -</option>
									<?php
									    $color = explode(",",$colourDetails[0]['pd_product_color']);
										foreach ($color as $colour){
									?>
										<option value="<?php echo $colour; ?>"><?php echo ucfirst(get_colour($colour)); ?></option>
									<?php } ?>
								</select>
							</div>
					<?php } ?>
					<?php
					if(!empty($sizeDetails))
					{
					?>
					<div class="col-sm-5 pro-dets-textbox">
						<label>Size</label>
						<select name="sltsize" class="poppinsregular form-control" id="sltsize" data_size="<?php echo $productDetails[0]['product_id']; ?>">
							<option value="">- Select Size -</option>
							<?php
								//$size = explode(",",$sizeDetails[0]['pd_product_size']);
								foreach ($sizeDetails as $productSize){
							?>
							<option  value="<?php echo $productSize['size_id']; ?>"><?php echo ucwords(get_product_size($productSize['size_id'])); ?></option>
							<?php } ?>
						</select>
					</div>
					<?php } ?>
				</div>
			<?php } ?>
			<?php if(get_qty($productDetails[0]['product_id']) != 0)
			{
			?>
			<div class="row poppinssemibold">
				<div class="pro-dets-line2"></div>
				<div class="col-sm-5 pro-dets-textbox">
					<label>Qty</label>
					<select name="sltqty" class="poppinsregular form-control" id="sltqty">
						<option value="" selected>- Select Qty -</option>
						<?php
						for ($i = 1; $i<= get_qty($productDetails[0]['product_id']); $i++)
						{
							?>
							<option <?php if($i==1){echo 'selected'; } ?> value="<?php echo $i; ?>" ><?php echo $i; ?></option>
							<?php
						}
						?>
					</select>
				</div>
				<div class="col-sm-6"></div>
			</div>
			<?php } ?>
			<div class="row pro-dets-button" style="margin-top: 5%">
				<div class="col-sm-6 ">
					<?php if(get_qty($productDetails[0]['product_id'])==0)
					{
					  ?>
						<h4 class="pro-stock"><i class="fa fa-ban" aria-hidden="true" style="color: red;"> STOCK OUT</i></h4>
						<?php
					}
					else
					{
						?>
							<span id="target"><button type="submit" name="btnAddToCart">ADD TO CART</button></span>
						<?php
					}
					?>

				</div>
				<div class="col-sm-6">
					&nbsp;
				</div>
			</div>
			<div class="row">
				<div class="pro-dets-line2"></div>
				<div class="col-sm-12">
					<h4 class="share-head">SHARE THIS</h4>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<h3 class="feedback-head poppinssemibold">GARMENT MEASUREMENTS&emsp;&emsp;|&emsp;&emsp;WEARER FEEDBACK</h3>
		</div>
	</div>
	<div class="row poppinsregular">
		<div class="pro-dets-line2"></div>
		<div class=" col-sm-12 sizing-list">
			<h5 class="sizing-table">Sizing varies from product to product, please ensure you check the garment measurements before buying.</h5>
			<table class="sizing-main-table">
				<thead class="poppinssemibold">
				<tr>
					<th>SIZE</th>
					<th>LENGTH (CM)</th>
					<th>WAIST (CM)</th>
					<th>SLEEVE</th>
				</tr>
				</thead>
				<tbody>
				<?php if(!empty($sizeDetails)) { ?>
					<?php foreach ($sizeDetails as $size) { ?>
						<tr>
							<td><?php echo $size['size_name']; ?></td>
							<td>98</td>
							<td>92</td>
							<td>55</td>
						</tr>

					<?php } ?>
				<?php } else {  ?>
					<tr>
						<td colspan="4"><center><strong>No Size Avialable....</strong></center></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	<?php echo form_close();?>
</div>

<?php include('footer.php'); ?>