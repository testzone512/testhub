<div class="container">
	<?php
		$url = $_SERVER['REQUEST_URI'];
		if($url!='/clothesloop-website/how-it-works.php'){
	?>
	<div class="form-group">
		<div class="newsletter poppinsregular">
			<div class="row">
				<div class="col-sm-12 col-xs-12">
					<h2 class="poppinssemibold">Get news about our latest products and news</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-xs-12">
					<h5 class="poppinssemibold">Sign up to our newsletter</h5>
				</div>
			</div>
			<div class="row email-content poppinsregular">
				<div class="col-xs-6 col-xs-offset-2 input-box">
					<input type="" name="" class="form-control" value="" placeholder="Your Email">
				</div>
				<div class="col-xs-4 button-box">
					<button>HIT ME UP</button>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<footer>
		<div class="footer-content">
			<div class="row poppinsregular">
				<div class="col-sm-3 col-xs-6 footer-logo-content">
                    <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url();?>public/front/images/logo.png" class="img-responsive" alt="LOGO"></a>
					<h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis molestie ex arcu, sit amet sodales quam fermentum vel. Morbi ullamcorper magna sed ex pulvinar,</h5>
				</div>
                <div class="col-sm-1">&nbsp;</div> 
				<div class="col-sm-3 col-xs-6 info-content">
					<h4>INFORMATION</h4>
					<ul>
                        <li><h5><a href="<?php echo site_url(); ?>">About Us</a></h5></li>
                        <li><h5><a href="<?php echo site_url('clothloop'); ?>">Why Clothes Loop?</a></h5></li>
                        <li><h5><a href="<?php echo site_url('blog'); ?>">Blog</a></h5></li>
                        <li><h5><a href="<?php echo site_url('register'); ?>">Sign Up / Register your garment</a></h5></li>
					</ul>
				</div>
				<div class="col-sm-2 col-xs-6 social-content">
					<h4 class="social-title" >SOCIAL</h4>
					<ul>
						<li><h5><i class="fa fa-instagram instagram-icon" aria-hidden="true"></i>&nbsp;&nbsp;Instagram</h5></li>
						<li><h5><i class="fa fa-facebook-square facebook-icon" aria-hidden="true"></i>&nbsp;&nbsp;Facebook</h5></li>
					</ul>
				</div>
				<div class="col-sm-3 col-xs-6 contact-content">
					<h4 class="social-title" >CONTACT US</h4>
					<h5 class="site-s-p">Got a question about our services & products?</h4>
					<h5 class="site-email">Email us at: <span>info@theclothesloop.com</span></h5>
					<h5>For Press & Media please contact: <span>rose@theclothesloop.com</span></h5>
				</div>
			</div>
		</div>
	</footer>
</div>
</body>
</html>