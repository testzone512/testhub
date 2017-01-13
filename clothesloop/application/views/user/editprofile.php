<?php $this->load->view('header'); ?>
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
				<img src="<?php echo base_url();?>public/front/images/Clothesloop Website-1.jpg" class="img-responsive" alt="">
			</div>
			<div class="col-sm-9 col-xs-9 register-head-content">
				<h1 class="register-content-head poppinssemibold">Curabitur ullamcorper dolor maximus nulla pretium, vitae pretium.</h1>
				<h5 class="register-sub-content poppinsregular">Phasellus quis neque et ante porta ultricies eu quis est. Curabitur ullamcorper dolor maximus nulla pretium, vitae pretium metus porta. Nam laoreet efficitur urna, sed varius nisi..</h5>
			</div>
		</div>
        <?php 
            $attributes = 'id="frmRegister"';
            echo form_open_multipart('register/edit/'.$userDetails[0]['user_id'],$attributes);
        ?>
        
		<div class="form-group row">
			<div class=" form-group register-form">
				<h3 class="register-form-head poppinssemibold">PERSONAL INFORMATION</h3>
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
                    <div class="col-sm-3 first-details">
                        <div class="orders">
                            <a href="" class="poppinssemibold" style="font-size:18px;color:#454545;">&emsp;ORDERS</a><br/>
                            <a href="<?php echo site_url('order/'); ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Pending Orders</a><br/>
                            <a href="<?php echo site_url('order/pastOrder'); ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Past Orders</a>
                        </div>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-sm-3 first-details">
                        <div class="orders">
                            <a href="<?php echo site_url('register/edit/'.$this->session->userdata('front_user_id')); ?>" class="poppinssemibold" style="font-size:18px;color:#454545;">&emsp;SETTINGS</a><br/>
                            <a href="<?php echo site_url('register/edit/'.$userDetails[0]['user_id']); ?>" class="poppinssemibold active"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Personal Information</a><br/>
                            <a href="<?php echo site_url('register/changePassword/'); ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Change Password</a><br/>
                            <a href="<?php echo site_url('register/updateEmail/'); ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Update Email</a><br/>
                            <a href="<?php echo site_url('register/deactivateAccount/'); ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Deactivate Account</a><br/>
                            
                        </div>
                    </div>
                </div>
            </div>
			<div class="col-sm-8 first-details">
				<div class="row">
					<div class="col-sm-12 register-textbox">
                        <label class="editprofile-label poppinsregular">FIRST NAME</label>
                        <?php
                            $dataFirstName = array(
                                'name'      => 'txtFirstName',
                                'id'        => 'txtFirstName',
                                'class'     => 'form-control',
                                'value'     => $userDetails[0]['user_firstname']
                            );
                            echo form_input($dataFirstName);
                        ?>
					</div>
                    <div class="col-sm-12 register-textbox">
                        <label class="editprofile-label poppinsregular">LAST NAME</label>
                        <?php
                            $dataLastName = array(
                                'name'      => 'txtLastName',
                                'id'        => 'txtLastName',
                                'class'     => 'form-control',
                                'value'     => $userDetails[0]['user_lastname']
                            );
                            echo form_input($dataLastName);
                        ?>
					</div>
                    <div class="col-sm-12 register-textbox">
                        <label class="editprofile-label poppinsregular">EMAIL</label>
                        <?php
                            $dataEmail = array(
                                'name'      => 'txtEmail',
                                'id'        => 'txtEmail',
                                'class'     => 'form-control',
                                'value'     => $userDetails[0]['user_email']
                            );
                            echo form_input($dataEmail);
                        ?>
                    </div>
                    <div class="col-sm-12 register-textbox">
                        <label class="editprofile-label poppinsregular">YOUR MAIN ADDRESS LINE 1</label>
                        <?php
                            $dataAddressLine1 = array(
                                'name'      => 'txtAddressLine1',
                                'id'        => 'txtAddressLine1',
                                'class'     => 'form-control',
                                'value'     => $userDetails[0]['user_address']
                            );
                            echo form_input($dataAddressLine1);
                        ?>
                    </div>
                    <div class="col-sm-12 register-textbox">
                        <label class="editprofile-label poppinsregular">ADDRESS LINE 2</label>
                        <?php
                            $dataAddressLine2 = array(
                                'name'      => 'txtAddressLine2',
                                'id'        => 'txtAddressLine2',
                                'class'     => 'form-control',
                                'value'     => $userDetails[0]['user_address2']
                            );
                            echo form_input($dataAddressLine2);
                        ?>
                    </div>
                    <div class="col-sm-6  register-textbox">
                        <label class="editprofile-label poppinsregular">POSTCODE</label>
                        <?php
                            $dataPostCode = array(
                                'name'      => 'txtPostCode',
                                'id'        => 'txtPostCode',
                                'class'     => 'form-control',
                                'value'     => $userDetails[0]['user_postcode']
                            );
                            echo form_input($dataPostCode);
                        ?>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 register-textbox">
                            <label class="editprofile-label poppinsregular" style="margin-left: 18px;">COUNTRY</label>
                            <?php
                                $dataCountry = 'id="cmbCountry" class="form-control" style="margin-left:18px"';
                                echo form_dropdown('cmbCountry',$countryKeyValueArr,$userDetails[0]['user_country_id'],$dataCountry);
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6  register-textbox">
                            <label class="editprofile-label poppinsregular" style="margin-left: 18px;">PROFILE IMAGE</label>
                            <?php
                                $dataProfileImage = array(
                                    'name'      => 'txtProfileImage',
                                    'id'        => 'txtProfileImage',
                                    'value'     => $userDetails[0]['user_profile_pic'],
                                    'style'     => "margin-left: 18px;"
                                );
                                echo form_upload($dataProfileImage);
                            ?>
                        </div>
                        <div class="col-sm-6  register-textbox">
                            <label class="editprofile-label poppinsregular"></label>
                            <?php if($userDetails[0]['user_profile_pic'] != '') { ?>
                            <img src="<?php echo base_url(); ?>public/upload/profile/thumb/<?php echo $userDetails[0]['user_profile_pic']; ?>" style="margin-top:15px;">
                            <?php } else { ?>
                            <img src="<?php echo base_url(); ?>public/front/images/noprofile.jpg" class="img-responsive" style="height:100px; width:100px;border:2px solid #000;">
                            <?php } ?>
                        </div>
                    </div>
                    <!-- div class="register-line"></div>
                    <div class="col-sm-12 col-xs-9 register-questions first-details">
                        <h3 class="question-form poppinssemibold">QUESTIONS</h3>
                        <h5 class="question-first-label poppinsregular">In the event of a Face-to-face swap with another customer, how far are you willing to travel to conduct a transaction?</h5>
                    </div>
                    <div class="col-sm-12 col-xs-9 register-textbox">
                        <?php
                            $dataKilometer = 'id="cmbKilometer"';
                            echo form_dropdown('cmbKilometer',$this->config->item('COMMON_KILOMETER'),$userDetails[0]['question_distance'],$dataKilometer);
                        ?>
					</div>
                    <div class="col-sm-12 col-xs-9 register-textbox">
						<h5 class="editprofile-label poppinsregular" >(Optional) What location would you prefer to meet your match?</h5>
						<?php
                            $dataLocation = array(
                                'name'      => 'txtLocation',
                                'id'        => 'txtLocation',
                                'class'     => 'form-control',
                                'value'     => $userDetails[0]['question_location']
                            );
                            echo form_input($dataLocation);
                        ?>
					</div>
                    <div class="col-sm-12 col-xs-9 register-textbox">
						<h5 class="editprofile-label poppinsregular" >How did you learn about The Clothes Loop?</h5>
                        <?php
                            $dataKnowAbout = 'id="cmbKnowAbout"';
                            echo form_dropdown('cmbKnowAbout',$this->config->item('COMMON_KNOW_ABOUT'),$userDetails[0]['question_learn_about'],$dataKnowAbout);
                        ?>
					</div -->
                    <div class="col-sm-12">
                        <input type="submit" name="btnUpdate" id="btnUpdate" class="editprofile-label poppinssemibold btnregister" value="Update Profile"></input>
					</div>
                    
				</div>
			</div>
		</div>
        <input type="hidden" name="hdnProfileImage" id="hdnProfileImage" value="<?php echo $userDetails[0]['user_profile_pic']; ?>">
        <?php echo form_close(); ?>
	</div>
</div>

<?php $this->load->view('footer'); ?>