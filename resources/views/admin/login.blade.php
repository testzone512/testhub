<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!--<link rel="shortcut icon" href="../images/favicon.png" type="image/png">-->

  <title>ClothesLoop Admin Login</title>

  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
  

  <link rel="stylesheet" href="{{ URL::asset('public/admin/css/quirk.css') }}">
 <script src="{{ URL::asset('public/admin/js/jquery-1.10.2.js') }}"></script> 
 <script src="{{ URL::asset('public/admin/lib/bootstrap/js/bootstrap.js') }}"></script>
 <script src="{{ URL::asset('public/admin/lib/modernizr/modernizr.js') }}"></script>
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="../lib/html5shiv/html5shiv.js"></script>
  <script src="../lib/respond/respond.src.js"></script>
  <![endif]-->

</head>
   
<body class="">
 <?php
		if (Session::has('success')){
			?>
            <div class="row">
                <div class="col-sm-offset-4 col-sm-4 alert alert-success msg-success-error">
                    <!-- a title="Hide Notification" class="close-notification tooltip" href="#">x</a -->
                    <a href="#" class="close msg-close" data-dismiss="alert" aria-label="close">&times;</a>
                    <h4>Success</h4>
                    <p>{{ session('success') }}</p>
                </div>
            </div>
			<?php
		}
		?>
		<?php
		if (Session::has('error')){
			?>
            <div class="row">
                <div class="col-sm-offset-4 col-sm-4 alert alert-danger msg-success-error">
                    <!-- a title="Hide Notification" class="close-notification tooltip" href="#">x</a -->
                    <a href="#" class="close msg-close" data-dismiss="alert" aria-label="close">&times;</a>
                    <h4>Error</h4>
                    <p>{{ session('error') }}</p>
                </div>
            </div>
			<?php
		} 
		?>
  <div class="panel signin">
    <div class="panel-heading">
      <h1>ClothesLoop</h1>
      <!--h4 class="panel-title">Welcome! Please Login.</h4-->
    </div>
    <div class="panel-body">
      <form method="post" name="frmLogin" id="frmLogin" action="{{ url('admin/login') }}">
        <div class="form-group mb10">
          <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input id="email" type="email" class="form-control" placeholder="Enter Your Email" name="email" value="{{ old('email') }}">
    
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
        </div>
        <div class="form-group nomargin">
          <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
             <input id="password" type="password" class="form-control" placeholder="Enter Your Password" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
          </div>
        </div>
        <div class="form-group">
        	<div class="input-group">
            	<div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> Remember Me
                    </label>
                </div>
            </div>
        </div>
        <div> <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a></div>
        <div class="form-group">
          <input type="submit" name="btnLogin" value="Login" class="btn btn-success btn-quirk btn-block">
        </div>
      </form>
      <hr class="invisible">
      <div class="form-group">
        <a href="#" class="btn btn-default btn-quirk btn-stroke btn-stroke-thin btn-block btn-sign">[Comming SOON]</a>
      </div>
    </div>
  </div><!-- panel -->

</body>

</html>
