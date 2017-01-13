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
					},
					cmbKilometer:
					{
						required: true
					},
					cmbKnowAbout:
					{
						required: true
					},
                    txtPassword:
					{
						required: true
					},
                    txtConfirmPassword:
					{
						required: true,
                        equalTo: '#txtPassword'
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
					},
					cmbKilometer:
					{
						required: '<span class="msg">Distance Required</span>'
					},
					cmbKnowAbout:
					{
						required: '<span class="msg">Learn about Required</span>'
					},
                    txtPassword:
					{
						required: '<span class="msg">Password Required</span>'
					},
                    txtConfirmPassword:
					{
						required: '<span class="msg">Confirm Password Required</span>',
                        equalTo: '<span class="msg">Confirm Password Does Not Match</span>'
					}
				}
			});
		});
	</script>
	<style type="text/css">
		.msg{ color: #FF0000;}
		input.error,select.error {border: 1px solid #FF0000;}
        .register{
            background-color: #000000;
            border: 0 none;
            border-radius: 0;
            color: #ffffff;
            font-weight: bold;
            margin-left: 50px;
            margin-top: 27px;
            padding: 12px;
            width: 25%;
        }
	</style>
<div class="container">
	<div class="reg-main-cont">
		<div class="row register-head">
			<div class="col-sm-3 register-main-head">
				<center><img src="<?php echo base_url();?>public/front/images/Clothesloop_demo.jpg" alt=""></center>
			</div>
			<div class="col-sm-9 register-head-content">
				<h1 class="register-content-head poppinssemibold">Curabitur ullamcorper dolor maximus nulla pretium, vitae pretium.</h1>
				<h5 class="register-sub-content poppinsregular">Phasellus quis neque et ante porta ultricies eu quis est. Curabitur ullamcorper dolor maximus nulla pretium, vitae pretium metus porta. Nam laoreet efficitur urna, sed varius nisi..</h5>
			</div>
		</div>
        <?php 
            $attributes = 'id="frmRegister"';
            echo form_open('register/add/',$attributes);
        ?>
        <!-- div class="row">
            <div class="col-lg-2">
                <label class="control-label">Name : </label>
            </div>
            <div class="col-lg-4">
                <input type="text" name="txtName" id="txtName" class="form-control">
            </div>
        </div -->
        
		<div class="row">
			<div class="register-form">
				<h3 class="register-form-head poppinssemibold">REGISTER YOUR ACCOUNT</h3>
				<div class="register-line"></div>
			</div>
			<div class="col-sm-6 register-textbox first-details">
				<label class="register-form-label poppinsregular">FIRST NAME</label>
                <?php
                    $dataFirstName = array(
                        'name'      => 'txtFirstName',
                        'id'        => 'txtFirstName',
                        'class'     => 'form-control'
                    );
                    echo form_input($dataFirstName);
                ?>
			</div>
			<div class="col-sm-6  register-textbox">
				<label class="register-form-label poppinsregular">LAST NAME</label>
                <?php
                    $dataLastName = array(
                        'name'      => 'txtLastName',
                        'id'        => 'txtLastName',
                        'class'     => 'form-control'
                    );
                    echo form_input($dataLastName);
                ?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6  register-textbox first-details">
				<label class="register-form-label poppinsregular">EMAIL</label>
				<?php
                    $dataEmail = array(
                        'name'      => 'txtEmail',
                        'id'        => 'txtEmail',
                        'class'     => 'form-control'
                    );
                    echo form_input($dataEmail);
                ?>
			</div>
			<div class="col-sm-6"> 
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 register-textbox first-details">
				<label class="register-form-label poppinsregular">YOUR MAIN ADDRESS LINE 1</label>
				<?php
                    $dataAddressLine1 = array(
                        'name'      => 'txtAddressLine1',
                        'id'        => 'txtAddressLine1',
                        'class'     => 'form-control'
                    );
                    echo form_input($dataAddressLine1);
                ?>
			</div>
			<div class="col-sm-6 register-textbox">
				<label class="register-form-label poppinsregular">ADDRESS LINE 2</label>
				<?php
                    $dataAddressLine2 = array(
                        'name'      => 'txtAddressLine2',
                        'id'        => 'txtAddressLine2',
                        'class'     => 'form-control'
                    );
                    echo form_input($dataAddressLine2);
                ?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 register-textbox first-details">
				<label class="register-form-label poppinsregular">COUNTRY</label>
				<?php
                    $dataCountry = 'id="cmbCountry" class="form-control"';
                    echo form_dropdown('cmbCountry',$countryKeyValueArr,'',$dataCountry);
                ?>
			</div>
			<div class="col-sm-6 register-textbox">
				<label class="register-form-label poppinsregular">POSTCODE</label>
				<?php
                    $dataPostCode = array(
                        'name'      => 'txtPostCode',
                        'id'        => 'txtPostCode',
                        'class'     => 'form-control'
                    );
                    echo form_input($dataPostCode);
                ?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6  register-textbox first-details">
				<label class="register-form-label poppinsregular">PASSWORD</label>
				<?php
                    $dataPassword = array(
                        'name'      => 'txtPassword',
                        'id'        => 'txtPassword',
                        'class'     => 'form-control'
                    );
                    echo form_password($dataPassword);
                ?>
			</div>
			<div class="col-sm-6 register-textbox">
				<label class="register-form-label poppinsregular">CONFIRM PASSWORD</label>
				<?php
                    $dataConfirmPassword = array(
                        'name'      => 'txtConfirmPassword',
                        'id'        => 'txtConfirmPassword',
                        'class'     => 'form-control'
                    );
                    echo form_password($dataConfirmPassword);
                ?>
			</div>
		</div>
		<div class="row">
			<div class="register-line"></div>
			<div class="col-sm-6 register-textbox first-details">
				<h3 class="poppinssemibold">RESGISTER YOUR GARMENT</h3>
				<h5 class="poppinsregular">Your garment ID is located on the Tag on the side of your garment</h5>
			</div>
			<div class="col-sm-6 ">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-9 first-details register-id-num">
				<label class="poppinsregular">1. ID NUMBER</label>
				
				<div class="my-form">
						<p class="text-box">
                        <?php
                            $dataIdNumber = array(
                                'name'      => 'boxes[]',
                                'id'        => 'box1',
                                'class'     => 'form-control'
                            );
                            echo form_input($dataIdNumber);
                        ?>
							<!-- input type="text" name="boxes[]" value="" class="form-control" id="box1" / -->
							<button class="add-box poppinssemibold" >ADD ANOTHER +</button>
						</p>
				</div>
			</div>
			<div class="col-sm-3 ">
			</div>
		</div>
		<div class="row">
			<div class="register-line"></div>
			<div class="col-sm-12  register-questions first-details">
				<h3 class="question-form poppinssemibold">QUESTIONS</h3>
				<h5 class="question-first-label poppinsregular">In the event of a Face-to-face swap with another customer, how far are you willing to travel to conduct a transaction?</h5>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6  first-details">
				<div class="row">
					<div class="col-sm-12  register-textbox">
                        <?php
                            $dataKilometer = 'id="cmbKilometer"';
                            echo form_dropdown('cmbKilometer',$this->config->item('COMMON_KILOMETER'),'',$dataKilometer);
                        ?>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 register-textbox">
						<h5 class="label-name poppinsregular" >(Optional) What location would you prefer to meet your match?</h5>
						<?php
                            $dataLocation = array(
                                'name'      => 'txtLocation',
                                'id'        => 'txtLocation',
                                'class'     => 'form-control'
                            );
                            echo form_input($dataLocation);
                        ?>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12  register-textbox">
						<h5 class="label-name poppinsregular" >How did you learn about The Clothes Loop?</h5>
                        <?php
                            $dataKnowAbout = 'id="cmbKnowAbout"';
                            echo form_dropdown('cmbKnowAbout',$this->config->item('COMMON_KNOW_ABOUT'),'',$dataKnowAbout);
                        ?>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 label-name">
						<label ><input type="checkbox" name="chkLaunch" /><span class="poppinsregular">Yes I want to be notifed of our platform launch</span></label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 label-name">
						<label class="poppinsregular"><input type="checkbox" name="chkSubscribe" /><span>Yes I want to subscribe to the mailing list</span></label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
                        <input type="submit" name="btnRegister" id="btnRegister" class="label-name poppinssemibold register" value="REGISTER"></input>
                        <!-- input type="submit" name="btnRegister" id="btnRegister" value="Register" -->
					</div>
				</div>
			</div>
			<div class="col-sm-6"></div>
		</div>
        <?php echo form_close(); ?>
	</div>
</div>
<script type="text/javascript">
jQuery(document).ready(function($){
    $('.my-form .add-box').click(function(){
        var n = $('.text-box').length + 1;
        var box_html = $('<p class="text-box"> <input type="text" class="form-control" name="boxes[]" value="" id="box' + n + '" /> <button class="remove-box">Remove</button></p>');
        box_html.hide();
        $('.my-form p.text-box:last').after(box_html);
        box_html.fadeIn('slow');
        return false;
    });
});

$('.my-form').on('click', '.remove-box', function(){
    $(this).parent().css( 'background-color', '#FF6C6C' );
    $(this).parent().fadeOut("slow", function() {
        $(this).remove();
        $('.box-number').each(function(index){
            $(this).text( index + 1 );
        });
    });
    return false;
});

</script>
<?php $this->load->view('footer'); ?>