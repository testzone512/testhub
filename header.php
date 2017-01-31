<!DOCTYPE html>
<html>
<head>
<title>Clothesloop</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="shortcut icon" href="images/small-logo.png" />
<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- BX Slider Start -->

  
<script src="bxslider/jquery.bxslider.js" type="text/javascript"></script>
<script src="bxslider/jquery.bxslider.min.js" type="text/javascript"></script>
<link href="bxslider/jquery.bxslider.css" rel="stylesheet" type="text/css" />
<!-- BX Slider End -->
<script type="text/javascript" src="//code.jquery.com/jquery-latest.js"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/style.css" media="all">
<link rel="stylesheet" type="text/css" href="css/shop-all.css" media="all">
<link rel="stylesheet" type="text/css" href="css/how-it-works.css" media="all">
<link rel="stylesheet" type="text/css" href="css/why-the-clothes-loop.css" media="all">
<link rel="stylesheet" type="text/css" href="css/blog.css" media="all">
<link rel="stylesheet" type="text/css" href="css/blog-details.css" media="all">
<link rel="stylesheet" type="text/css" href="css/register.css" media="all">
<link rel="stylesheet" type="text/css" href="css/product-details.css" media="all">
</head>
<body>

<header>
	<div class="register-content">
		<div class="container" >
			<div class="row poppinssemibold">
				<div class="col-sm-6 col-xs-6 msg-welcome ">
					<div class="our-store-msg">
						<h5>Hi, Welcome to our store</h5>
					</div>
				</div>
				<div class="col-sm-6 col-xs-6 black-line-menu ">
					<div class="menu-register">
						<ul>
							<li>
								<a href="register.php"><h5>Register&nbsp;|</h5></a>
							</li>
							<li>
								<a href=""><h5>&nbsp;Check Out&nbsp;|</h5></a>
							</li>
							<li>
								<a href=""><h5>&nbsp;$AUD</h5></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container" >
		<div class="row logo-head poppinssemibold">
			<div class="col-sm-3 col-xs-6 logo-content">
				<a href="index.php"><img src="images/logo.png" class="img-responsive" alt="LOGO"></a>
			</div>
			<div class="col-sm-2 col-xs-6 cart-and-search">
				<div class="addtocart-font">
					<i class="fa fa-bars dropbtn dropdowns" id="open-menu" aria-hidden="true">&nbsp;|&nbsp;</i>
					<i class="fa fa-times close-menu dropdowns" id="close-menu" aria-hidden="true">&nbsp;|&nbsp;</i>
					<i class="fa fa-search" aria-hidden="true">&nbsp;|&nbsp;</i>
					<i class="fa fa-shopping-cart " aria-hidden="true"></i>
				</div>
				
			</div>
			<div class="dropdown">
				<div id="myDropdown" class="dropdown-content dd-content">
					<a href="shop-all.php" class="" ><i class="fa fa-shopping-basket" aria-hidden="true"></i>&emsp;shop</a>
					<a href="how-it-works.php" class="" ><i class="fa fa-briefcase" aria-hidden="true"></i>&emsp;How it works</a>
					<a href="why-the-clothes-loop.php" class="" ><i class="fa fa-female" aria-hidden="true"></i>&emsp;why the clothes loop?</a>
					<a href="blog.php" class="" ><i class="fa fa-th" aria-hidden="true"></i>&emsp;blog</a>
					<a href="#" class="" ><i class="fa fa-plug" aria-hidden="true"></i>&emsp;complagin</a>
				</div>
			</div>
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
			<div class="col-sm-7 col-xs-4 menu-lists">
				<div class="menu-list">
					<ul>
						<li>
							<a href="shop-all.php">shop</a>
						</li>
						<li>
							<a href="how-it-works.php" >How it works</a>
						</li>
						<li>
							<a href="why-the-clothes-loop.php">
								why the clothes loop?
							</a>
						</li>
						<li>
							<a href="blog.php">blog</a>
						</li>
						<li>
							<a href="">complagin</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</header>
<script>
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
</script>