@include('layout.header')
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#frmDeactivateAccount").validate({
            rules:
            {
                txtPassword:
                {
                    required:true,
                    remote: {
                        url: "<?php echo url('register/isAccountDeactivatePasswordMatch'); ?>",
                        type: "post",
                        data: {"_token": "{{ csrf_token() }}",
                            name: function() {
                                return $("#txtPassword").val();
                            }
                        } // data
                    } // remote
                }

            },
            messages:
            {
                txtPassword:
                {
                    required:'<span class="msg">Password Required</span>',
                    remote: '<span class="msg">Old Password Does Not Match</span>'
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
        <form method="post" name="frmDeactivateAccount" id="frmDeactivateAccount" action="{{ url('register/deactivateAccount') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">


            <div class="form-group row">
            <div class=" form-group register-form">
                <h3 class="register-form-head poppinssemibold">DEACTIVATE ACCOUNT</h3>
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
                    <div class="col-sm-12 first-details">
                        <div class="orders">
                            <a href="" class="poppinssemibold" style="font-size:18px;color:#454545;">&emsp;ORDERS</a><br/>
                            <a href="<?php echo url('order/pending_order_list'); ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Pending Orders</a><br/>
                            <a href="<?php echo url('order/past_order_list'); ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Past Orders</a>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12 first-details">
                        <div class="orders">
                            <?php $user = Auth::user();
                            $id = $user['id']; ?>
                            <a href="<?php echo url('register/edit/').'/'.$id; ?>" class="poppinssemibold" style="font-size:18px;color:#454545;">&emsp;SETTINGS</a><br/>
                            <a href="<?php echo url('register/edit/').'/'.$id; ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Personal Information</a><br/>
                            <a href="<?php echo url('register/changePassword/'); ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Change Password</a><br/>
                            <a href="<?php echo url('register/updateEmail/'); ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Update Email</a><br/>
                            <a href="<?php echo url('register/deactivateAccount/'); ?>" class="poppinssemibold active"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Deactivate Account</a><br/>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 first-details">
                <div class="row">
                    <div class="col-sm-12 register-textbox">
                        <label class="editprofile-label poppinsregular">Email ID : </label>
                        <b><?php echo $user['email']; ?></b>
                    </div>
                    <div class="col-sm-12 register-textbox">
                        <label class="editprofile-label poppinsregular">Password</label>
                        <input type="password" name="txtPassword" id="txtPassword" class="form-control"/>
                    </div>

                    <div class="col-sm-12">
                        <input type="submit" name="btnDeactivate" id="btnDeactivate" class="editprofile-label poppinssemibold btnregister" value="Deactivate Account"/>
                    </div>

                </div>
            </div>
        </div>

      </form>
    </div>
</div>

@include('layout.footer')