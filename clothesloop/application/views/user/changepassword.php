<?php $this->load->view('header'); ?>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
       $("#frmChangePassword").validate({
		 rules:
		 {
			 txtOldPassword:
			 {
				 required:true,
                 remote: {
                       url: "<?php echo base_url('register/isOldPasswordMatch'); ?>",
                       type: "post",
                       data: {
                           name: function() {
                               return $("#txtOldPassword").val();
                           }
                       } // data
                   } // remote
			 },
             txtNewPassword:
			 {
				 required:true,
                 minlength: 6,
                 remote: {
                       url: "<?php echo base_url('register/isOldAndNewPasswordDiffrent'); ?>",
                       type: "post",
                       data: {
                           newpassword: function() {
                               return $("#txtNewPassword").val();
                           },
                           oldpassword: function() {
                               return $("#txtOldPassword").val();
                           }
                       } // data
                   }  // remote
			 },
             txtConfirmPassword:
			 {
				 required:true,
                 equalTo: '#txtNewPassword'
			 }

		 },
		 messages:
		 {
			 txtOldPassword:
			 {
				 required:'<span class="msg">Old Password Required</span>',
                 remote: '<span class="msg">Old Password Does Not Match</span>'
			 },
             txtNewPassword:
			 {
				 required:'<span class="msg">New Password Required</span>',
                 minlength: '<span class="msg">Password must be atleast 6 Character</span>',
                 remote: '<span class="msg">Do not enter Old password as a New Password</span>'
			 },
             txtConfirmPassword:
			 {
				 required:'<span class="msg">Re Enter Password Required</span>',
                 equalTo: '<span class="msg">Password Does not Match</span>'
			 }
		 }
	  });  
    });
</script>
<div class="container">
	<div class="reg-main-cont">
		<div class="row register-head">
			<div class="col-sm-3 col-xs-3 register-main-head">
				<img src="<?php echo base_url();?>public/front/images/Clothesloop Website-1.jpg" class="img-responsive" alt="">
			</div>
			<div class="col-sm-9 col-xs-9 register-head-content">
				<h1 class="register-content-head poppinssemibold">Curabitur ullamcorper dolor maximus nulla pretium, vitae pretium.</h1>
				<h5 class="register-sub-content poppinsregular">Phasellus quis neque et ante porta ultricies eu quis est. Curabitur ullamcorper dolor maximus nulla pretium, vitae pretium metus porta. Nam laoreet efficitur urna, sed varius nisi..</h5>
			</div>
		</div>
        <?php 
            $attributes = 'id="frmChangePassword"';
            echo form_open('register/changePassword/',$attributes);
        ?>
        
		<div class="form-group row">
			<div class=" form-group register-form">
				<h3 class="register-form-head poppinssemibold">CHANGE PASSWORD</h3>
				<div class="register-line"></div>
			</div>
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
		</div>
       	
        <div class="row">
        	<div class="col-sm-4">
                   <div class="form-group row">
                        <div class="col-sm-12 first-details">
                            <div class="orders">
                                <a href="" class="poppinssemibold" style="font-size:18px;color:#454545;">&emsp;ORDERS</a><br/>
                                <a href="<?php echo site_url('order/'); ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Pending Orders</a><br/>
                                <a href="<?php echo site_url('order/pastOrder'); ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Past Orders</a>
                            </div>
                        </div>
                  </div>
                
                  <div class="form-group row">
                    <div class="col-sm-12 first-details">
                        <div class="orders">
                            <a href="<?php echo site_url('register/edit/'.$this->session->userdata('front_user_id')); ?>" class="poppinssemibold" style="font-size:18px;color:#454545;">&emsp;SETTINGS</a><br/>
                            <a href="<?php echo site_url('register/edit/'.$this->session->userdata('front_user_id')); ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Personal Information</a><br/>
                            <a href="<?php echo site_url('register/changePassword/'); ?>" class="poppinssemibold active"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Change Password</a><br/>
                            <a href="<?php echo site_url('register/updateEmail/'); ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Update Email</a><br/>
                            <a href="<?php echo site_url('register/deactivateAccount/'); ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Deactivate Account</a><br/>
                        </div>
                    </div>
                </div>
            </div>
			<div class="col-sm-8 first-details">
				<div class="row">
					<div class="col-sm-12 register-textbox">
                        <label class="editprofile-label poppinsregular">Old Password</label>
                        <?php
                            $dataOldPassword = array(
                                'name'      => 'txtOldPassword',
                                'id'        => 'txtOldPassword',
                                'class'     => 'form-control'
                            );
                            echo form_password($dataOldPassword);
                        ?>
					</div>
                    <div class="col-sm-12 register-textbox">
                        <label class="editprofile-label poppinsregular">New Passsword</label>
                        <?php
                            $dataNewPassword = array(
                                'name'              => 'txtNewPassword',
                                'id'                => 'txtNewPassword',
                                'class'             => 'form-control'
                            );
                            echo form_password($dataNewPassword);
                        ?>
					</div>
                    <div class="col-sm-12 register-textbox">
                        <label class="editprofile-label poppinsregular">Re Enter Password</label>
                        <?php
                            $dataConfirmPassword = array(
                                'name'      => 'txtConfirmPassword',
                                'id'        => 'txtConfirmPassword',
                                'class'     => 'form-control'
                            );
                            echo form_password($dataConfirmPassword);
                        ?>
                    </div>
                    
                    <div class="col-sm-12 ">
                        <input type="submit" name="btnChangePassword" id="btnChangePassword" class="editprofile-label poppinssemibold btnregister" value="Change Password"></input>
					</div>
                    
				</div>
			</div>
		</div>
		
        <?php echo form_close(); ?>
	</div>
</div>

<?php $this->load->view('footer'); ?>