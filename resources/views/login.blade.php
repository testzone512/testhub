@include('layout.header')
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#frmLogin").validate({
            rules:
            {
                email:
                {
                    required:true,
                    email: true
                },
                password:
                {
                    required:true
                }

            },
            messages:
            {
                email:
                {
                    required:'<span class="msg">Username Required</span>',
                    email: '<span class="msg">Please Enter Valid Email</span>'
                },
                password:
                {
                    required:'<span class="msg">Password Required</span>'
                }
            }
        });
    });
</script>
<style type="text/css">
    .msg{ color: #FF0000;}
    input.error{border: 1px solid #FF0000;}
</style>

<div class="container">


    <div class="reg-main-cont">
        <div class="row">
            <div class="col-sm-12">
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
            </div>
        </div>
        <div class="row register-head">
            <div class="col-sm-3 register-main-head">
                <center><img src="<?php echo url('public/front/images/Clothesloop_demo.jpg');?>" class="img-responsive" alt=""></center>
            </div>
            <div class="col-sm-9  register-head-content">
                <h1 class="register-content-head poppinssemibold">Curabitur ullamcorper dolor maximus nulla pretium, vitae pretium.</h1>
                <h5 class="register-sub-content poppinsregular">Phasellus quis neque et ante porta ultricies eu quis est. Curabitur ullamcorper dolor maximus nulla pretium, vitae pretium metus porta. Nam laoreet efficitur urna, sed varius nisi..</h5>
            </div>
        </div>
        <form method="post" name="frmLogin" id="frmLogin" action="{{ url('login') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="form-group register-form">
                <h3 class="register-form-head poppinssemibold">LOGIN TO YOUR ACCOUNT</h3>
                <div class="register-line"></div>
            </div>

            <div class="col-sm-6 register-textbox first-details">
                <label class="register-form-label poppinsregular {{ $errors->has('email') ? ' has-error' : '' }}">Email</label>
                <input id="email" type="email" class="form-control"  name="email" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 register-textbox first-details">
                <label class="register-form-label poppinsregular {{ $errors->has('password') ? ' has-error' : '' }}">PASSWORD</label>
                <input id="password" type="password" class="form-control"  name="password">

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4 label-name first-details">
                <label ><span class="poppinsregular">Forgot Your Password</span></label>
            </div>
            <div class="col-sm-8 label-name first-details">
                <label><span class="poppinsregular"><a href="<?php echo url('register');?>" style="color: #E21476;font-weight: bold;font-size: 18px;">New to Clothes Loop?Create Account</a></span></label>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <input type="submit" name="btnLogin" id="btnLogin" class="label-name poppinssemibold btnregister" value="LOGIN">
                <!-- input type="submit" name="btnRegister" id="btnRegister" value="Register" -->
            </div>
        </div>
        </form>
    </div>
    <div class="col-sm-6"></div>
</div>

</div>
</div>



@include('layout.footer')