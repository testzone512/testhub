<!DOCTYPE html>
<html><head>
<title>Clothesloop</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>public/front/css/bootstrap/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="shortcut icon" href="images/small-logo.png" />
<!-- Optional theme -->
<link rel="stylesheet" href="<?php echo base_url(); ?>public/front/css/bootstrap/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="<?php echo base_url(); ?>public/front/css/bootstrap/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- BX Slider Start -->

<!-- BX Slider End -->
<script type="text/javascript" src="//code.jquery.com/jquery-latest.js"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/front/css/style.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/front/css/shop-all.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/front/css/how-it-works.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/front/css/why-the-clothes-loop.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/front/css/blog.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/front/css/blog-details.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/front/css/register.css" media="all">
<!--link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/front/css/product-details.css" media="all"-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/front/css/shopping-cart.css" media="all">
<style type="text/css">
.bxslider li{
    margin-left: -45px;
    -width: 445.833px;
} 
/* Dropdown Button */
.dropbtn {
    background-color: #EDEDED;
    color: #000000;
    padding: 10px;
    font-size: 14px;
    border: none;
    cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
    margin-left: 10px;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
	right:35;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #454545; color: #FFF;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    background-color: #EDEDED;
}
    
</style>
<style>
.navbar {
    border: none !important;
    margin-bottom: 30px;
	margin-top:30px;
    -min-height: 114px !important;

}
</style>
<style>

.navbar-nav .active
{
	 
}
.navbar-default {
	background-image:none !important;
    background-color:#FFFFFF !important;
    border-color: #e7e7e7 !important;
	box-shadow:none !important;
}
.navbar-nav li
{
	padding-right:38px;
	
}
.navbar-nav > li > a {
    color: #3C3C3C !important;
	 padding-top: 0px !important;
	
}

.search-nav li
{
	padding-right:0px !important;
	padding-left:0px !important;
}
.search-nav li a
{
	padding:5px !important;
}
</style>
</head>
<body>
<header>
	<div class="register-content">
		
			<div class="row poppinssemibold">
				<div class="col-sm-5 col-xs-5 col-sm-offset-1 msg-welcome ">
					<div class="our-store-msg">
						<h5>Hi, Welcome to our store</h5>
					</div>
				</div>
				<div class="col-sm-6 col-xs-12 black-line-menu ">
					<div class="menu-register" style="margin-right:20%">
						<ul>
							<?php if($this->session->userdata('front_logged_user_in') == '1') { ?>
							<!-- li>
								<a href="<?php echo site_url(''); ?>"><h5><?php //echo ucfirst($this->session->userdata('user_firstname')); ?>&nbsp;<?php //echo ucfirst($this->session->userdata('user_lastname')); ?> |</h5></a>
							</li -->
                            <?php 
                            $id = $this->session->userdata('front_user_id');
                            $data = $this->db->query("SELECT * FROM users WHERE user_id = $id");
                            $row=  $data->result_array();
                            ?>
								<div class="dropdown">
									<button class="dropbtn">
										<?php if($row[0]['user_profile_pic'] != '') { ?>
											<img src="<?php echo base_url();?>public/upload/profile/thumb/<?php echo $row[0]['user_profile_pic']; ?>" style="height:25px; width: 25px;"><?php } else { ?><img src="<?php echo base_url(); ?>public/front/images/noprofile.jpg" style="height:25px; width: 25px;"><?php } ?>&nbsp;<?php echo ucfirst($row[0]['user_firstname']); ?>&nbsp;<?php echo ucfirst($row[0]['user_lastname']); ?>
									</button>
									<div class="dropdown-content">
										<!-- a href="<?php echo site_url('register/edit/'.$this->session->userdata('front_user_id')); ?>"><i class="fa fa-user" aria-hidden="true"></i> &nbsp;Profile</a -->
										<a href="<?php echo site_url('register/edit/'.$this->session->userdata('front_user_id')); ?>"><i class="fa fa-cogs" aria-hidden="true"></i> &nbsp;Settings</a>
										<a href="<?php echo site_url('login/logout/'); ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> &nbsp;Logout</a>
									</div>
								</div>
                            <?php } else { ?>
                            <li>
								<a href="<?php echo site_url('register'); ?>"><h5>Register&nbsp;&nbsp;|&nbsp;&nbsp;</h5></a>
							</li>
                            <li>
								<a href="<?php echo site_url('login'); ?>"><h5>&nbsp;&nbsp;Login&nbsp;&nbsp;|</h5></a>
							</li>
                            <?php } ?>
							<li>
								<a href=""><h5>&nbsp;&nbsp;Check Out&nbsp;&nbsp;|</h5></a>
							</li>
							<li>
								<a href=""><h5>&nbsp;&nbsp;$AUD</h5></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
	</div>
   
<div class="row bs-example">
    <nav role="navigation" class="navbar navbar-default">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="col-sm-2">&nbsp;</div>
           <div class="col-sm-2">
           		<div class="navbar-header">
                    <div class="row">
                        <div class="col-sm-10 col-xs-8">
                             <center><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url();?>public/front/images/logo.png" class="img-responsive" alt="LOGO"></a></center>
                        </div>
                        <div class="col-sm-2">
                            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                        </div>
                    </div>    
                </div>
           </div>
        <!-- Collection of nav links, forms, and other content for toggling -->
       <div id="navbarCollapse" class="collapse navbar-collapse">  
            <div class="col-sm-6 col-xs-12">
                    <ul class="nav navbar-nav poppinssemibold">
                        <li class="active"><a href="<?php echo site_url('shop'); ?>" class="" >Shop</a></li>
                        <li><a href="<?php echo site_url('hiw'); ?>" class="" >How it works</a></li>
                        <li><a href="<?php echo site_url('clothloop'); ?>" class="" >Why the clothes loop?</a></li>
                        <li><a href="<?php echo site_url('blog'); ?>" class="" >Blog</a></li>
                        <li><a href="#" class="" >Complagin</a></li>
                       
                    </ul>
            </div>
            <div class="col-sm-2 col-xs-12">
                    <ul class="nav navbar-nav search-nav">
                        <li>
                        <!-- Start search box -->
                         
                           <a href="#"><i class="fa fa-search fa-lg" aria-hidden="true">&nbsp;|</i></a>
                            <!-- End search box-->       
                    </li>
                 
                       
                        
                        <li>
                        <?php if($this->session->userdata('front_user_id'))
                        {
                        ?>
                            <!--a href="<?php echo base_url(); ?>/cart/shopping_cart"><span style="margin-left: 20px;"><?php echo product_count($this->session->userdata('front_user_id')); ?> Product</span></a-->
                            <a href="<?php echo base_url(); ?>/cart/shopping_cart"><i class="fa fa-shopping-cart fa-lg " aria-hidden="true" ></i></a>
                        <?php
                        }
                        else
                        {
                        ?>
                            <!--a href="<?php echo base_url(); ?>/login"><span style="margin-left: 20px;"><?php echo product_count($this->session->userdata('front_user_id')); ?> Product</span></a-->
                            <a href="<?php echo base_url(); ?>/login"><i class="fa fa-shopping-cart fa-lg " aria-hidden="true" ></i></a>
                        <?php
                        }
                        ?></li>
                    </ul>
            </div>
            
      </div>  
    </nav>
</div>

		<!--div class="row logo-head poppinssemibold">
        	<div class="col-sm-1">&nbsp;</div>
			<div class="col-sm-3 col-xs-3 logo-content">
				<center><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url();?>public/front/images/logo.png" class="img-responsive" alt="LOGO"></a></center>
			</div>
			<div class="col-sm-2 col-xs-2 cart-and-search">
				<div class="addtocart-font">
					<i class="fa fa-bars fa-lg dropbtn dropdowns" id="open-menu" aria-hidden="true">&nbsp;|&nbsp;</i>
					<i class="fa fa-times fa-lg close-menu dropdowns" id="close-menu" aria-hidden="true">&nbsp;|&nbsp;</i>
                  
                       
                        	<input class="search" type="search" placeholder="Search" />
                           
                                <i class="fa fa-search fa-lg" aria-hidden="true">&nbsp;|&nbsp;</i>
                     
				
                   
					
					
					<?php if($this->session->userdata('front_user_id'))
					{
					?>
                        <a href="<?php echo base_url(); ?>/cart/shopping_cart" title="<?php echo product_count($this->session->userdata('front_user_id')); ?> Product" class="tooltip"><i class="fa fa-shopping-cart fa-lg " aria-hidden="true" ></i></a>
					<?php
					}
					else
					{
					?>
                        <a href="<?php echo base_url(); ?>/login" title="<?php echo product_count($this->session->userdata('front_user_id')); ?> Product" class="tooltip"><i class="fa fa-shopping-cart fa-lg " aria-hidden="true" ></i></a>
					<?php
					}
					?>
				</div>
				
			</div>
			
			<div class="col-sm-7 col-xs-7 menu-lists">
				<div class="menu-list">
					<ul>
						<li>
							<a class="<?php if(isset($shop)){ echo $shop ;} ?>" href="<?php echo site_url('shop'); ?>">shop</a>
						</li>
						<li>
							<a href="<?php echo site_url('hiw'); ?>" >How it works</a>
						</li>
						<li>
							<a href="<?php echo site_url('clothloop'); ?>">
								why the clothes loop?
							</a>
						</li>
						<li>
							<a class="<?php if(isset($blog)){ echo $blog ;} ?>" href="<?php echo site_url('blog'); ?>">blog</a>
						</li>
						<li>
							<a href="">complagin</a>
						</li>
					</ul>
				</div>
			</div>
            
		</div>
	<div class="dropdown">
				<div id="myDropdown" class="dropdown-content dd-content">
					<a href="<?php echo site_url('shop'); ?>" class="" ><i class="fa fa-shopping-basket" aria-hidden="true"></i>&emsp;shop</a>
					<a href="<?php echo site_url('hiw'); ?>" class="" ><i class="fa fa-briefcase" aria-hidden="true"></i>&emsp;How it works</a>
					<a href="<?php echo site_url('clothloop'); ?>" class="" ><i class="fa fa-female" aria-hidden="true"></i>&emsp;why the clothes loop?</a>
					<a href="<?php echo site_url('blog'); ?>" class="" ><i class="fa fa-th" aria-hidden="true"></i>&emsp;blog</a>
					<a href="#" class="" ><i class="fa fa-plug" aria-hidden="true"></i>&emsp;complagin</a>
				</div>
			</div -->
			<script>
				$(document).ready(function(){
					$("#close-menu").hide();
					$("#open-menu").click(function(){
						$("#myDropdown").toggle("slow");
						$("#close-menu").show();
						$("#open-menu").hide();
					});
					$("#close-menu").click(function(){
						$("#myDropdown").toggle("slow");
						$("#close-menu").hide();
						$("#open-menu").show();
					});
				});
			</script>
            <script>
			  	$(document).ready(function(e) {
                    $(".navbar-nav li").removeClass('active');
                });
			</script>
</header>
<!--script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script -->

