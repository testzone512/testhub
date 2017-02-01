@include('layout.header')
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#frmReg").validate({
            rules:
            {
                name:
                {
                    required:true
                },
                email:
                {
                    required:true,
                    email: true
                },
                password:
                {
                    required:true
                },
                password_confirmation:
                {
                    required:true,
                    equalTo: '#password'
                }

            },
            messages:
            {
                name:
                {
                    required:'<span class="msg">Name Required</span>'
                },
                email:
                {
                    required:'<span class="msg">Email Required</span>',
                    email: '<span class="msg">Please Enter Valid Email</span>'
                },
                password:
                {
                    required:'<span class="msg">Password Required</span>'
                },
                password_confirmation:
                {
                    required:'<span class="msg">Confirm Password Required</span>',
                    equalTo: '<span class="msg">Confirm Password Does Not Match</span>'
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
        <form method="post" name="frmReg" id="frmReg" action="{{ url('register') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="form-group register-form">
                <h3 class="register-form-head poppinssemibold">REGISTER YOUR ACCOUNT</h3>
                <div class="register-line"></div>
            </div>

            <div class="col-sm-6 register-textbox first-details">
               <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                   <label for="name" class="register-form-label poppinsregular">Name</label>
                   <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                       <span class="help-block">
                           <strong>{{ $errors->first('name') }}</strong>
                       </span>
                   @endif
               </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 register-textbox first-details">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="register-form-label poppinsregular">E-Mail Address</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 register-textbox first-details">
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="register-form-label poppinsregular">Password</label>
                    <input id="password" type="password" class="form-control" name="password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 register-textbox first-details">
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="password-confirm" class="register-form-label poppinsregular">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
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
                <input type="submit" name="btnLogin" id="btnLogin" class="label-name poppinssemibold btnregister" value="Register">
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