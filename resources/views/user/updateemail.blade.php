@include('layout.header')
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#frmEmail").validate({
            rules:
            {
                txtEmail:
                {
                    required:true,
                    email: true
                }

            },
            messages:
            {
                txtEmail:
                {
                    required:'<span class="msg">Email Address Required</span>',
                    email: '<span class="msg">Please Enter Valid Email</span>'
                }
            }
        });
    });
</script>
<div class="container">
    <div class="reg-main-cont">
        <div class="row register-head">
            <div class="col-sm-3 col-xs-3 register-main-head">
                <img src="<?php echo url('public/front/images/Clothesloop Website-1.jpg');?>" class="img-responsive" alt="">
            </div>
            <div class="col-sm-9 col-xs-9 register-head-content">
                <h1 class="register-content-head poppinssemibold">Curabitur ullamcorper dolor maximus nulla pretium, vitae pretium.</h1>
                <h5 class="register-sub-content poppinsregular">Phasellus quis neque et ante porta ultricies eu quis est. Curabitur ullamcorper dolor maximus nulla pretium, vitae pretium metus porta. Nam laoreet efficitur urna, sed varius nisi..</h5>
            </div>
        </div>
        <form method="post" name="frmEmail" id="frmEmail" action="{{ url('register/updateEmail') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group row">
            <div class=" form-group register-form">
                <h3 class="register-form-head poppinssemibold">UPDATE EMAIL</h3>
                <div class="register-line"></div>
            </div>
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
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group row">
                    <div class="col-sm-3 first-details">
                        <div class="orders">
                            <a href="" class="poppinssemibold" style="font-size:18px;color:#454545;">&emsp;ORDERS</a><br/>
                            <a href="<?php echo url('order/pending_order_list'); ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Pending Orders</a><br/>
                            <a href="<?php echo url('order/past_order_list'); ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Past Orders</a>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-3 first-details">
                        <div class="orders">
                            <?php $user = Auth::user();
                            $id = $user['id']; ?>
                            <a href="<?php echo url('register/edit/').'/'.$id; ?>" class="poppinssemibold" style="font-size:18px;color:#454545;">&emsp;SETTINGS</a><br/>
                            <a href="<?php echo url('register/edit/').'/'.$id; ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Personal Information</a><br/>
                            <a href="<?php echo url('register/changePassword/'); ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Change Password</a><br/>
                            <a href="<?php echo url('register/updateEmail/'); ?>" class="poppinssemibold active"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Update Email</a><br/>
                            <a href="<?php echo url('register/deactivateAccount/'); ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Deactivate Account</a><br/>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-12 first-details">
                        <div class="row">
                            <div class="col-sm-12 register-textbox">
                                <label class="editprofile-label poppinsregular">Email ID</label>
                                 <input type="text" name="txtEmail" id="txtEmail" class="form-control">
                            </div>

                            <div class="col-sm-12">
                                <input type="submit" name="btnUpdateEmail" id="btnUpdateEmail" class="editprofile-label poppinssemibold btnregister" value="Update Email"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </form>
    </div>
</div>
@include('layout.footer')