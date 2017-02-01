@include('layout.header')
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#frmRegister").validate({
            rules:
            {
                txtFirstName:
                {
                    required:true
                },
                txtLastName:
                {
                    required:true
                },
                txtEmail:
                {
                    required:true
                },
                txtAddressLine1:
                {
                    required:true
                },
                txtPostCode:
                {
                    required:true
                },
                txtCountry:
                {
                    required:true
                }

            },
            messages:
            {
                txtFirstName:
                {
                    required:'<span class="msg">First Name Required</span>'
                },
                txtLastName:
                {
                    required:'<span class="msg">Last Name Required</span>'
                },
                txtEmail:
                {
                    required:'<span class="msg">Email Required</span>'
                },
                txtAddressLine1:
                {
                    required:'<span class="msg">Address Line 1 Required</span>'
                },
                txtPostCode:
                {
                    required:'<span class="msg">PostCode Required</span>'
                },
                txtCountry:
                {
                    required:'<span class="msg">Country Required</span>'
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
           <form method="post" name="frmRegister" id="frmRegister" action="{{ url('register/edit') }}<?php echo '/'.$userDetails[0]['id']; ?>" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group row">
            <div class=" form-group register-form">
                <h3 class="register-form-head poppinssemibold">PERSONAL INFORMATION</h3>
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
                            <a href="<?php echo url('register/edit').'/'.$id; ?>" class="poppinssemibold" style="font-size:18px;color:#454545;">&emsp;SETTINGS</a><br/>
                            <a href="<?php echo url('register/edit').'/'.$userDetails[0]['id']; ?>" class="poppinssemibold active"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Personal Information</a><br/>
                            <a href="<?php echo url('register/changePassword'); ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Change Password</a><br/>
                            <a href="<?php echo url('register/updateEmail'); ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Update Email</a><br/>
                            <a href="<?php echo url('register/deactivateAccount'); ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Deactivate Account</a><br/>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 first-details">
                <div class="row">
                    <div class="col-sm-12 register-textbox">
                        <label class="editprofile-label poppinsregular">FIRST NAME</label>
                         <input type="text" name="txtFirstName" id="txtFirstName" class="form-control required" value="<?php $data = explode(' ',$userDetails[0]['name']) ; if(!empty($data[0])) { echo $data[0]; } ?>">
                    </div>
                    <div class="col-sm-12 register-textbox">
                        <label class="editprofile-label poppinsregular">LAST NAME</label>
                        <input type="text" name="txtLastName" id="txtLastName" class="form-control required" value="<?php $data = explode(' ',$userDetails[0]['name']) ; if(!empty($data[1])){ echo $data[1]; } ?>">
                    </div>
                    <div class="col-sm-12 register-textbox">
                        <label class="editprofile-label poppinsregular">EMAIL</label>
                        <input type="text" name="txtEmail" id="txtEmail" class="form-control required" value="<?php echo $userDetails[0]['email']; ?>">
                    </div>
                    <div class="col-sm-12 register-textbox">
                        <label class="editprofile-label poppinsregular">YOUR MAIN ADDRESS LINE 1</label>
                        <input type="text" name="txtAddressLine1" id="txtAddressLine1" class="form-control required" value="<?php echo $userDetails[0]['address1']; ?>">
                    </div>
                    <div class="col-sm-12 register-textbox">
                        <label class="editprofile-label poppinsregular">ADDRESS LINE 2</label>
                        <input type="text" name="txtAddressLine2" id="txtAddressLine2" class="form-control required" value="<?php echo $userDetails[0]['address2']; ?>">

                    </div>
                    <div class="col-sm-6  register-textbox">
                        <label class="editprofile-label poppinsregular">POSTCODE</label>
                        <input type="text" name="txtPostCode" id="txtPostCode" class="form-control required" value="<?php echo $userDetails[0]['postcode']; ?>">
                    </div>
                    <div class="row">
                        <div class="col-sm-12 register-textbox">
                            <label class="editprofile-label poppinsregular" style="margin-left: 18px;">COUNTRY</label>
                           <?php
                            $dataCountry = array('id'=>'cmbCountry','class'=>'form-control');
                            echo Form::select('cmbCountry',$countryKeyValueArr,$userDetails[0]['country_id'],$dataCountry);
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6  register-textbox">
                            <label class="editprofile-label poppinsregular" style="margin-left: 18px;">PROFILE IMAGE</label>
                            <input type="file" name="profileImage" id="profileImage" value="<?php echo $userDetails[0]['profile_pic']; ?>" style="margin-left: 18px;">
                        </div>
                        <div class="col-sm-6  register-textbox">
                            <label class="editprofile-label poppinsregular"></label>
                            <?php if($userDetails[0]['profile_pic'] != '') { ?>
                            <img src="<?php echo url('public/upload/profile').'/'.$userDetails[0]['profile_pic']; ?>" style="height:100px; width:100px;border:2px solid #000; margin-top:15px;">
                            <?php } else { ?>
                            <img src="<?php echo url('public/front/images/noprofile.jpg'); ?>" class="img-responsive" style="height:100px; width:100px;border:2px solid #000;">
                            <?php } ?>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <input type="submit" name="btnUpdate" id="btnUpdate" class="editprofile-label poppinssemibold btnregister" value="Update Profile"/>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>

@include('layout.footer')