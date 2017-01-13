<?php $this->load->view('header'); ?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<link href="<?php echo base_url(); ?>public/front/bxslider/jquery.bxslider.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>public/front/bxslider/jquery.bxslider.js"></script>
<script src="<?php echo base_url(); ?>public/front/bxslider/jquery.bxslider.min.js"></script>
<script src="<?php echo base_url(); ?>public/front/js/jquery.elevatezoom.js"></script>
 <style>
 .bx-controls{
	 display:block;
 }
.offer-pro-img img:hover
{
	-border: 2px solid #F04791;
	box-shadow: 0px 0px 10px #333333;
	-padding: 5px;
}
.bannerDetail1 {
  -color: #00000;
  top: 16%;
  -left: 221px;
  position: absolute;
  font-size: 105px;
    background: linear-gradient(to right, #EF9321 43%, #EF9321 25%, #E31178 99%, #E31178 75%, #EF9321 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  line-height:normal;
  text-align:center; 
}
.bannerDetail2 {
  -color: #00000;
  top: 41%;
  -left: 221px;
  position: absolute;
  font-size: 25px;
  line-height:normal;
  text-align:center;
}
.bannerDetail3 {
  -color: #00000;
  top: 52%;
  -left: 221px;    	
  position: absolute;
  font-size: 25px;
  line-height:normal;
 
}
#round
{
	background-color:#313131;
	width:160px;
	height:160px;
	border-radius:100%;
	font-size:18px;
}
@media screen and (max-width:1280px)
{
	.bannerDetail1
	{
		font-size:95px;
	}
	.bannerDetail2
	{
		font-size:25px;
	}
	#round
	{
		width:150px;
		height:150px;
		-font-size:18px;
	}
	#round span
	{
		font-size:18px;
	}
}
@media screen and (max-width:1200px)
{
	.bannerDetail1
	{
		font-size:85px;
	}
	.bannerDetail2
	{
		font-size:20px;
	}
	#round
	{
		width:140px;
		height:140px;
		-font-size:18px;
	}
	#round span
	{
		font-size:18px;
	}
}

@media screen and (max-width:1082px)
{
	.bannerDetail1
	{
		font-size:75px;
	}
	.bannerDetail2
	{
		font-size:20px;
	}
	#round
	{
		width:130px;
		height:130px;
		-font-size:18px;
	}
	#round span
	{
		font-size:17px;
	}
}
@media screen and (max-width:1065px)
{
	.bannerDetail1
	{
		font-size:70px;
	}
	.bannerDetail2
	{
		font-size:20px;
	}
	#round
	{
		width:120px;
		height:120px;
		-font-size:18px;
	}
	#round span
	{
		font-size:16px;
	}
}


@media screen and (max-width:990px)
{
	.bannerDetail1
	{
		font-size:66px;
	}
	.bannerDetail2
	{
		font-size:20px;
	}
	#round
	{
		width:110px;
		height:110px;
		-font-size:18px;
	}
	#round span
	{
		font-size:15px;
	}
}
@media screen and (max-width:913px)
{
	.bannerDetail1
	{
		font-size:62px;
	}
	.bannerDetail2
	{
		font-size:20px;
	}
	#round
	{
		width:105px;
		height:105px;
		-font-size:18px;
	}
	#round span
	{
		font-size:14px;
	}
}
@media screen and (max-width:896px)
{
	.bannerDetail1
	{
		font-size:56px;
	}
	.bannerDetail2
	{
		font-size:18px;
	}
	#round
	{
		width:100px;
		height:100px;
		-font-size:18px;
	}
	#round span
	{
		font-size:14px;
	}
}
@media screen and (max-width:838px)
{
	.bannerDetail1
	{
		font-size:50px;
	}
	.bannerDetail2
	{
		font-size:16px;
	}
	#round
	{
		width:90px;
		height:90px;
		-font-size:18px;
	}
	#round span
	{
		font-size:12px;
	}
}


@media screen and (max-width:768px)
{
	.bannerDetail1
	{
		font-size:44px;
	}
	.bannerDetail2
	{
		font-size:16px;
	}
	#round
	{
		width:80px;
		height:80px;
		-font-size:18px;
	}
	#round span
	{
		font-size:10px;
	}
}
@media screen and (max-width:700px)
{
	.bannerDetail1
	{
		font-size:38px;
	}
	.bannerDetail2
	{
		font-size:16px;
	}
	#round
	{
		width:70px;
		height:70px;
		-font-size:18px;
	}
	#round span
	{
		font-size:9px;
	}
}
@media screen and (max-width:600px)
{
	.bannerDetail1
	{
		font-size:34px;
	}
	.bannerDetail2
	{
		font-size:14px;
	}
	#round
	{
		width:60px;
		height:60px;
		-font-size:18px;
	}
	#round span
	{
		font-size:8px;
	}
}
@media screen and (max-width:500px)
{
	.bannerDetail1
	{
		font-size:28px;
	}
	.bannerDetail2
	{
		font-size:12px;
	}
	#round
	{
		width:60px;
		height:60px;
		-font-size:18px;
	}
	#round span
	{
		font-size:7px;
	}
	
}
@media screen and (max-width:450px)
{
	.bannerDetail1
	{
		font-size:26px;
	}
	.bannerDetail2
	{
		font-size:10px;
	}
	#round
	{
		width:50px;
		height:50px;
		-font-size:18px;
	}
	#round span
	{
		font-size:6px;
	}
}
@media screen and (max-width:375px){
	.bannerDetail1
	{
		font-size:20px;
	}
	.bannerDetail2
	{
		font-size:9px;
	}
	#round
	{
		width:50px;
		height:50px;
		-font-size:18px;
	}
	#round span
	{
		font-size:5px;
	}
}

 </style>
	<script>
		$(document).ready(function(){
			$('.bxslider').bxSlider({
				infiniteLoop: false,
				hideControlOnEnd: true,
				mode: 'fade',
				auto:true
			});
		});
	</script>
	<div class="row">
		<div class="col-sm-12 col-xs-12">
			<ul class="bxslider">
				<?php
				$count="";
				foreach($sliderDetails as $slider)
				{
					$count++;
					?>
					<li><img src="<?php echo site_url().'public/upload/slider/'.$slider['slider_image'];?>" class="img-responsive" />
                     <div class="row">
                     	<div class="bannerDetail1 poppinssemibold col-sm-12 col-xs-12">
                        	<?php echo $slider['slider_short_description'];?>
                        </div>
                     </div>
                      <div class="row">
                     	<div class="bannerDetail2 poppinsregular col-sm-12 col-xs-12">
                        	<?php echo $slider['slider_long_description'];?>
                        </div>
                     </div>
                     <div class="row">
                        <div class="bannerDetail3   col-sm-12 col-xs-12">
                        	<center><div id="round"><span style=" color:#fff; position:absolute; width:9%;  top:25%; left:46%;">SHOP NEW ARRIVALS <br /> &gt;</span></div></center>
                        </div>
                     </div>
                    </li>
                    
				<?php
				} ?>
			</ul> 
		</div>
	</div>


<div class="main-product">
	<div class="container">
		<div class="row main-display-product poppinssemibold ">
			<h3 class="poppinsregular" >Quisque eget metus orci vitae feugiat nisi</h3>
			<h1>sed tincidunt, ante eu sodales malesuada?</h1>
			<div class="process-content">
            	<div class="col-sm-2">&nbsp;</div>
				<div class="col-sm-3 col-xs-6 Aenean-1">
					<img src="<?php echo base_url();?>public/front/images/process_logo1.png" alt="process-logo1">
					<h5><b>Aenean venenatis et</b></h5>
					<h6 class="poppinsregular">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices</h6>
				</div>
				<div class="col-sm-3 col-xs-6 Aenean-2">
					<img src="<?php echo base_url();?>public/front/images/process_logo2.png" alt="process-logo2">
					<h5><b>Aenean venenatis et</b></h5>
					<h6 class="poppinsregular" >Vestibulum ante ipsum primis in faucibus orci luctus et ultrices</h6>
				</div>
				<div class="col-sm-3 col-xs-12 Aenean-3">
					<img src="<?php echo base_url();?>public/front/images/process_logo3.png" alt="process-logo3">
					<h5><b>Aenean venenatis et</b></h5>
					<h6 class="poppinsregular" >Vestibulum ante ipsum primis in faucibus orci luctus et ultrices</h6>
				</div>
                <div class="col-sm-1">&nbsp;</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-xs-12">
			<div class="more-button">
				<button>OMG TELL ME MORE!</button>
			</div>
			<div class="pink-line"></div>
			</div>
		</div>
        
        
		<div class="row">
			<center>
			<div class="seal-pro">
				<div class="col-sm-4 col-xs-6 product-1">
					<div class="product-img">
						<img src="<?php echo base_url();?>public/upload/product/<?php echo $productRandDetails[0]['product_image']; ?>" class="img-responsive " alt="Product1">
					</div>
					<div class="product-content">
						<div class="sale-p">
							<h4 class="seal-pro-name poppinsregular"><?php echo $productRandDetails[0]['product_name']; ?></h4>
						</div>
						<div class="pro-details ">
							<h4 class="price-pro poppinsbold">$<?php echo $productRandDetails[0]['product_price']; ?></h4>
							<h4 class="size-pro poppinsregular">Available:<?php echo get_size($productRandDetails[0]['product_id']);?></h4>
						</div>
					</div>
				</div>
				<div class="col-sm-4 col-xs-6 product-3">
					<div class="product-img">
						<img src="<?php echo base_url();?>public/upload/product/<?php echo $productRandDetails[1]['product_image']; ?>" class="img-responsive" alt="Product3">
					</div>
					<div class="product-content">
						<div class="sale-p">
							<h4 class="seal-pro-name poppinsregular"><?php echo $productRandDetails[1]['product_name']; ?></h4>
						</div>
						<div class="pro-details">
							<h4 class="price-pro poppinsbold">$<?php echo $productRandDetails[1]['product_price']; ?></h4>
							<h4 class="size-pro poppinsregular">Available:<?php echo get_size($productRandDetails[1]['product_id']);?></h4>
						</div>
					</div>
				</div>
				<div class="col-sm-4 col-xs-12 product-2">
					<div class="seal-pro-main">
						<div class="product-img2">
							<img src="<?php echo base_url();?>public/front/images/Clothesloop Website-1.jpg" class="img-responsive" alt="Product2">
						</div>
						<div class="product-content2">
							<div class="row">
								<h5 class="seal-pro-option">NO MORE CROWDED CLOSETS</h5>
							</div>
							<div class="row">
								<img src="<?php echo base_url();?>public/front/images/sale-pro-details1.png" alt="" class="sale-pro-details1 img-responsive">
							</div>
							<div class="row">
								<h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis molestie ex arcu, sit amet sodales quam fermentum vel. Morbi ullamcorper magna sed ex pulvinar,</h6>
							</div>
							<div class="row explore-button">
								<button>EXPLORE OUR STYLES</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			</center>
		</div>
		<div class="row seal-pro2">
			<center>
			<div>
				<div class="col-sm-4 col-xs-6 product-4">
					<div class="product-img">
						<img src="<?php echo base_url();?>public/upload/product/<?php echo $productRandDetails[2]['product_image']; ?>" class="img-responsive" alt="Product4">
					</div>
					<div class="product-content">
						<div class="sale-p">
							<h4 class="seal-pro-name poppinsregular" ><?php echo $productRandDetails[2]['product_name']; ?></h4>
						</div>
						<div class="pro-details">
							<h4 class="price-pro poppinsbold">$<?php echo $productRandDetails[2]['product_price']; ?></h4>
							<h4 class="size-pro poppinsregular">
								Available:<?php echo get_size($productRandDetails[2]['product_id']);?></h4>
						</div>
					</div>
				</div>
				<div class="col-sm-4 col-xs-6 product-6">
					<div class="product-img">
						<img src="<?php echo base_url();?>public/upload/product/<?php echo $productRandDetails[3]['product_image']; ?>" class="img-responsive" alt="Product6">
					</div>
					<div class="product-content">
						<div class="sale-p">
							<h4 class="seal-pro-name poppinsregular"><?php echo $productRandDetails[3]['product_name']; ?></h4>
						</div>
						<div class="pro-details">
							<h4 class="price-pro poppinsbold">$<?php echo $productRandDetails[3]['product_price']; ?></h4>
							<h4 class="size-pro poppinsregular">Available:<?php echo get_size($productRandDetails[3]['product_id']);?></h4>
						</div>
					</div>
				</div>
				<div class="col-sm-4 col-xs-12 product-5">
				
				</div>
				
			</div>
			</center>
		</div>
	</div>
</div>
<div class="our-mission">
	<div class="container">
		<div class="row poppinssemibold ">
			<div class="col-sm-8 col-xs-12 our-mission-content ">
				<h3 class="way-head" >More than just a store but a way to be</h3>
				<img src="<?php echo base_url();?>public/front/images/lady-content-image.jpg" class="img-responsive" alt="">
				<!-- <h1 class="dolor-head1 poppinsbold ">Lorem ipsum dolor</h1>
				<h1 class="dolor-head2 poppinsbold ">consectetur adipiscing</h1> -->
				<h4 class="our-content poppinsregular">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Moebi accumsan, lorem sit amet condimentum malesuada, metus nunc luctus dolor, at vulputate sapien orci ut justo. Quisque mi odio, vehicula eu tortor consequat, volutpat consequat odio. Mauris in ornare dui.</h4>
				<div class="mission-boxs">
					<div class="col-sm-4 col-xs-6 mission-boxs-content">
						<h4 class="more-content">SUSTAINABLE</h4>
						<h4 class="poppinsregular">Swapping will reduce waste and give you a new outfit at same time!</h4>
					</div>
					<div class="col-sm-4 col-xs-6 mission-boxs-content">
						<h4 class="more-content" >COMMUNITY CENTERED</h4>
						<h4 class="poppinsregular">Belong to a community that understands and shares your style</h4>
					</div>
					<div class="col-sm-4 col-xs-6 mission-boxs-content mission-boxs-content3">
						<h4 class="more-content" >RESEARCHED BASED</h4>
						<h4 class="poppinsregular">From interviews with people heavily involved in the industry, we believe this is the future of fashion</h4>
					</div>
				</div>
				<div class="mission-btn">
					<button>LEARN MORE ABOUT OUR MISSION</button>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12 lady-image-content">
				<img src="<?php echo base_url();?>public/front/images/lady.png" class="lady_image" alt="">
			</div>
		</div>
	</div>
</div>
<div class="testimonial">
	<div class="container">
		<div class="row poppinssemibold ">
			<div class="col-sm-3 col-xs-4 testimonial-block1">
				<center>
					<div class="testimonial-box box1"></div>
				</center>
			</div>
			<div class="col-sm-8 col-xs-8 testimonial-font testimonial-block2">
				<h3 class="testimonial-content">Etiam placerat ex nec enim fringilla, sit amet euismod Iectus malesuada. Nunc sed arcu condimentum</h3>
				<h4 class="testimonial-sub-content ">Rose Heatherfield-Founder, Director</h4>
			</div>
		</div>
	</div>
</div>
<div class="pro-content">
	<div class="container">
		<div class="row poppinssemibold">
			<div class="pro-offers-content">
				<h5>PURCHASE</h5>
				<h2>THIS WEEK’S TOP PICKS</h2>
			</div>
		</div>
		<div class="row pros-content">
			<div class="col-sm-3 col-xs-6 offer-pro">
				<div class="offer-pro-img">
                    <a href="<?php echo site_url('shop/view/'.$productRecentDetails[0]['product_id']); ?>"><img src="<?php echo base_url();?>public/upload/product/<?php if(!empty($productRecentDetails[0]['product_image'])) {  echo $productRecentDetails[0]['product_image']; } ?>" class="img-responsive" alt="No Product Available"></a>
				</div>
				<div class="offer-pro-name">
					<h4 class="poppinsregular"><?php if(!empty($productRecentDetails[0]['product_name'])) { echo  $productRecentDetails[0]['product_name']; } ?></h4>
					<div class="offer-pro-details">
						<h3 class="price-pro-offer poppinsbold"><?php if(!empty($productRecentDetails[0]['product_price'])) { echo '$'.$productRecentDetails[0]['product_price'] ;} ?></h3>
						<h5 class="size-pro-offer poppinsregular ">Available:<?php echo get_size($productRecentDetails[0]['product_id']);?></h5>
					</div>
				</div>
			</div>
			<div class="col-sm-3 col-xs-6">
				<div class="offer-pro-img">
                    <a href="<?php echo site_url('shop/view/'.$productRecentDetails[1]['product_id']); ?>"><img src="<?php echo base_url();?>public/upload/product/<?php if(!empty($productRecentDetails[1]['product_image'])) {  echo $productRecentDetails[1]['product_image']; } ?>" class="img-responsive" alt="No Product Available"></a>
				</div>
				<div class="offer-pro-name">
					<h4 class="poppinsregular"><?php if(!empty($productRecentDetails[1]['product_name'])) { echo  $productRecentDetails[1]['product_name']; } ?></h4>
					<div class="offer-pro-details">
						<h3 class="price-pro-offer poppinsbold"><?php if(!empty($productRecentDetails[1]['product_price'])) { echo '$'.$productRecentDetails[1]['product_price'] ;} ?></h3>
						<h5 class="size-pro-offer poppinsregular ">Available:<?php echo get_size($productRecentDetails[1]['product_id']);?></h5>
					</div>
				</div>
			</div>
			<div class="col-sm-3 col-xs-6">
				<div class="offer-pro-img">
                    <a href="<?php echo site_url('shop/view/'.$productRecentDetails[2]['product_id']); ?>"><img src="<?php echo base_url();?>public/upload/product/<?php if(!empty($productRecentDetails[2]['product_image'])) {  echo $productRecentDetails[2]['product_image']; } ?>" class="img-responsive" alt="No Product Available"></a>
				</div>
				<div class="offer-pro-name">
					<h4 class="poppinsregular"><?php if(!empty($productRecentDetails[2]['product_name'])) { echo  $productRecentDetails[2]['product_name']; } ?></h4>
					<div class="offer-pro-details">
						<h3 class="price-pro-offer poppinsbold"><?php if(!empty($productRecentDetails[2]['product_price'])) { echo '$'.$productRecentDetails[2]['product_price'] ;} ?></h3>
						<h5 class="size-pro-offer poppinsregular">Available:<?php echo get_size($productRecentDetails[2]['product_id']);?></h5>
					</div>
				</div>
			</div>
			<div class="col-sm-3 col-xs-6">
				<div class="offer-pro-img">
                    <a href="<?php echo site_url('shop/view/'.$productRecentDetails[3]['product_id']); ?>"><img src="<?php echo base_url();?>public/upload/product/<?php if(!empty($productRecentDetails[3]['product_image'])) {  echo $productRecentDetails[3]['product_image']; } ?>" class="img-responsive" alt="No Product Available"></a>
				</div>
				<div class="offer-pro-name">
					<h4 class="poppinsregular"><?php if(!empty($productRecentDetails[3]['product_name'])) { echo  $productRecentDetails[3]['product_name']; } ?></h4>
					<div class="offer-pro-details">
						<h3 class="price-pro-offer poppinsbold"><?php if(!empty($productRecentDetails[3]['product_price'])) { echo '$'.$productRecentDetails[3]['product_price'] ;} ?></h3>
						<h5 class="size-pro-offer poppinsregular">Available:<?php echo get_size($productRecentDetails[3]['product_id']);?></h5>
					</div>
				</div>
			</div>
		</div>
		<div class="row pro-sample">
			<div class="col-sm-3 col-xs-6">
				<div class="offer-pro-img">
                    <a href="<?php echo site_url('shop/view/'.$productRecentDetails[4]['product_id']); ?>"><img src="<?php echo base_url();?>public/upload/product/<?php if(!empty($productRecentDetails[4]['product_image'])) {  echo $productRecentDetails[4]['product_image']; } ?>" class="img-responsive" alt="No Product Available"></a>
				</div>
				<div class="offer-pro-name">
					<h4 class="poppinsregular"><?php if(!empty($productRecentDetails[4]['product_name'])) { echo  $productRecentDetails[4]['product_name']; } ?></h4>
					<div class="offer-pro-details">
						<h3 class="price-pro-offer poppinsbold"><?php if(!empty($productRecentDetails[4]['product_price'])) { echo '$'.$productRecentDetails[4]['product_price'] ;} ?></h3>
						<h5 class="size-pro-offer poppinsregular">Available:<?php echo get_size($productRecentDetails[4]['product_id']);?></h5>
					</div>
				</div>
			</div>
			<div class="col-sm-3 col-xs-6">
				<div class="offer-pro-img">
                    <a href="<?php echo site_url('shop/view/'.$productRecentDetails[5]['product_id']); ?>"><img src="<?php echo base_url();?>public/upload/product/<?php if(!empty($productRecentDetails[5]['product_image'])) {  echo $productRecentDetails[5]['product_image']; } ?>" class="img-responsive" alt="No Product Available"></a>
				</div>
				<div class="offer-pro-name">
					<h4 class="poppinsregular"><?php if(!empty($productRecentDetails[5]['product_name'])) { echo  $productRecentDetails[5]['product_name']; } ?></h4>
					<div class="offer-pro-details">
						<h3 class="price-pro-offer poppinsbold"><?php if(!empty($productRecentDetails[5]['product_price'])) { echo '$'.$productRecentDetails[5]['product_price'] ;} ?></h3>
						<h5 class="size-pro-offer poppinsregular">Available: <?php echo get_size($productRecentDetails[5]['product_id']);?></h5>
					</div>
				</div>
			</div>
			<div class="col-sm-3 col-xs-6">
				<div class="offer-pro-img">
                    <a href="<?php echo site_url('shop/view/'.$productRecentDetails[6]['product_id']); ?>"><img src="<?php echo base_url();?>public/upload/product/<?php if(!empty($productRecentDetails[6]['product_image'])) {  echo $productRecentDetails[6]['product_image']; } ?>" class="img-responsive" alt="No Product Available"></a>
				</div>
				<div class="offer-pro-name">
					<h4 class="poppinsregular"><?php if(!empty($productRecentDetails[6]['product_name'])) { echo  $productRecentDetails[6]['product_name']; } ?></h4>
					<div class="offer-pro-details">
						<h3 class="price-pro-offer poppinsbold"><?php if(!empty($productRecentDetails[6]['product_price'])) { echo '$'.$productRecentDetails[6]['product_price'] ;} ?></h3>
						<h5 class="size-pro-offer poppinsregular">Available:<?php echo get_size($productRecentDetails[6]['product_id']);?></h5>
					</div>
				</div>
			</div>
			<div class="col-sm-3 col-xs-6">
				<div class="offer-pro-img">
                    <a href="<?php echo site_url('shop/view/'.$productRecentDetails[7]['product_id']); ?>"><img src="<?php echo base_url();?>public/upload/product/<?php if(!empty($productRecentDetails[7]['product_image'])) {  echo $productRecentDetails[7]['product_image']; } ?>" class="img-responsive" alt="No Product Available"></a>
				</div>
				<div class="offer-pro-name">
					<h4 class="poppinsregular"><?php if(!empty($productRecentDetails[7]['product_name'])) { echo  $productRecentDetails[7]['product_name']; } ?></h4>
					<div class="offer-pro-details">
						<h3 class="price-pro-offer poppinsbold"><?php if(!empty($productRecentDetails[7]['product_price'])) { echo '$'.$productRecentDetails[7]['product_price'] ;} ?></h3>
						<h5 class="size-pro-offer poppinsregular">Available:<?php echo get_size($productRecentDetails[7]['product_id']);?></h5>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-xs-12 explore-btn">
				<button>EXPLORE OUR STYLES</button>
				<div class="pink-line2"></div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('footer'); ?>