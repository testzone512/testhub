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
  @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
  <div class="panel signin">
    <div class="panel-heading">
      <h1>ClothesLoop</h1>
      <!--h4 class="panel-title">Welcome! Please Login.</h4-->
    </div>
    <div class="panel-body">
      <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}
        <div class="form-group mb10">
          <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="email" type="email" class="form-control" name="email" placeholder="Enter Your Email" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
          </div>
        </div>
        <div class="form-group">
          <input type="submit" name="btnPasswordLink" value="Send Password Reset Link" class="btn btn-success btn-quirk btn-block">
        </div>
      </form>
      <hr class="invisible">
      <div> <a class="btn btn-link" href="{{ url('admin') }}">Back To Login</a></div>
      <div class="form-group">
        <a href="#" class="btn btn-default btn-quirk btn-stroke btn-stroke-thin btn-block btn-sign">[Comming SOON]</a>
      </div>
    </div>
  </div><!-- panel -->

</body>

</html>
