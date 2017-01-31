<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!--<link rel="shortcut icon" href="../images/favicon.png" type="image/png">-->

  <title>Clothesloop Admin</title>

  <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/lib/Hover/hover.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/lib/weather-icons/css/weather-icons.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/lib/ionicons/css/ionicons.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/lib/jquery-toggles/toggles-full.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/lib/morrisjs/morris.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/quirk.css">
  <link rel="stylesheet" media="all" href="<?php echo base_url(); ?>public/admin/css/jquery.dataTables.min.css">
  <link href="<?php echo base_url();?>public/admin/bxslider/jquery.bxslider.css" rel="stylesheet" />
  
  <script src="<?php echo base_url(); ?>public/admin/js/jquery-1.10.2.js"></script> 
  <script type="text/javascript" src="<?php echo base_url(); ?>public/admin/ckeditor/ckeditor.js"></script>
  <script src="<?php echo base_url(); ?>public/admin/js/jquery.validation.js"></script> 
  <script type="text/javascript" src="<?php echo base_url(); ?>public/admin/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>public/admin/lib/modernizr/modernizr.js"></script>
  <script src="<?php echo base_url();?>public/admin/bxslider/jquery.bxslider.js"></script>
  <script src="<?php echo base_url();?>public/admin/bxslider/jquery.bxslider.min.js"></script>


  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="../lib/html5shiv/html5shiv.js"></script>
  <script src="../lib/respond/respond.src.js"></script>
  <![endif]-->
  <style>
  .con
  {
	  margin-top:1%;
	  margin-left:2%;
	  margin-right:2%;
	  margin-bottom:0px;
  }
  </style>
</head>

<body>

<header>
	<?php $this->load->view('admin/header'); ?>
</header>

<section>

  <div class="leftpanel">
  		<?php $this->load->view('admin/navigation'); ?>
  </div><!-- leftpanel -->

  <div class="mainpanel">
    <div class="con">	
    <!--<div class="pageheader">
      <h2><i class="fa fa-home"></i> Dashboard</h2>
    </div>-->
    
    
<?php
if(validation_errors())
{
?>
<div class="alert alert-danger msg-success-error">
	<!-- a title="Hide Notification" class="close-notification tooltip" href="#">x</a -->
	<a href="#" class="close msg-close" data-dismiss="alert" aria-label="close">&times;</a>
	<h4>Error</h4>
	<p><?php echo validation_errors(); ?></p>
</div>
<?php
}
?>

<?php
	if ($this->session->flashdata('success')){
		?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4>Success</h4>
			<p><strong><?php echo $this->session->flashdata('success') ?></strong></p>
		</div>
		<?php
	}
?>
<?php
if ($this->session->flashdata('error')){
	?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4>Error</h4>
		<p><strong><?php echo $this->session->flashdata('error') ?></strong></p>
	</div>
	<?php
}
?>


	<?php $this->load->view($middle); ?>
    </div>  
  </div><!-- mainpanel -->

</section>

<!--script src="<?php echo base_url(); ?>public/admin/lib/jquery/jquery.js"></script-->
<script src="<?php echo base_url(); ?>public/admin/lib/jquery-ui/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>public/admin/lib/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>public/admin/lib/jquery-toggles/toggles.js"></script>

<script src="<?php echo base_url(); ?>public/admin/lib/morrisjs/morris.js"></script>
<script src="<?php echo base_url(); ?>public/admin/lib/raphael/raphael.js"></script>

<script src="<?php echo base_url(); ?>public/admin/lib/flot/jquery.flot.js"></script>
<script src="<?php echo base_url(); ?>public/admin/lib/flot/jquery.flot.resize.js"></script>
<script src="<?php echo base_url(); ?>public/admin/lib/flot-spline/jquery.flot.spline.js"></script>

<script src="<?php echo base_url(); ?>public/admin/lib/jquery-knob/jquery.knob.js"></script>

<script src="<?php echo base_url(); ?>public/admin/js/quirk.js"></script>
<script src="<?php echo base_url(); ?>public/admin/js/dashboard.js"></script>

</body>

</html>
