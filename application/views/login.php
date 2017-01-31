<?php $this->load->view('header'); ?>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
       $("#frmLogin").validate({
		 rules:
		 {
			 txtUsername:
			 {
				 required:true,
                 email: true
			 },
             txtPassword:
			 {
				 required:true
			 }

		 },
		 messages:
		 {
			 txtUsername:
			 {
				 required:'<span class="msg">Username Required</span>',
                 email: '<span class="msg">Please Enter Valid Email</span>'
			 },
             txtPassword:
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
        </div>
		<div class="row register-head">
			<div class="col-sm-3 register-main-head">
				<center><img src="<?php echo base_url();?>public/front/images/Clothesloop_demo.jpg" class="img-responsive" alt=""></center>
			</div>
			<div class="col-sm-9  register-head-content">
				<h1 class="register-content-head poppinssemibold">Curabitur ullamcorper dolor maximus nulla pretium, vitae pretium.</h1>
				<h5 class="register-sub-content poppinsregular">Phasellus quis neque et ante porta ultricies eu quis est. Curabitur ullamcorper dolor maximus nulla pretium, vitae pretium metus porta. Nam laoreet efficitur urna, sed varius nisi..</h5>
			</div>
		</div>
        <?php 
            $attributes = 'id="frmLogin"';
            echo form_open('login/',$attributes);
        ?>
        
		<div class="row">
			<div class="form-group register-form">
				<h3 class="register-form-head poppinssemibold">LOGIN TO YOUR ACCOUNT</h3>
				<div class="register-line"></div>
			</div>
            
			<div class="col-sm-6 register-textbox first-details">
				<label class="register-form-label poppinsregular">USERNAME</label>
                <?php
                    $dataUsername = array(
                        'name'      => 'txtUsername',
                        'id'        => 'txtUsername',
                        'class'     => 'form-control'
                    );
                    echo form_input($dataUsername);
                ?>
			</div>
		</div>
        
        <div class="row">
			<div class="col-sm-6 register-textbox first-details">
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
		</div>
        
		<div class="row">
            <div class="col-sm-4 label-name first-details">
                <label ><span class="poppinsregular">Forgot Your Password</span></label>
            </div>
            <div class="col-sm-8 label-name first-details">
                <label><span class="poppinsregular"><a href="<?php echo base_url();?>register" style="color: #E21476;font-weight: bold;font-size: 18px;">New to Clothes Loop?Create Account</a></span></label>
            </div>
        </div>
				<div class="row">
					<div class="col-sm-12">
                        <input type="submit" name="btnLogin" id="btnLogin" class="label-name poppinssemibold btnregister" value="LOGIN">
                        <!-- input type="submit" name="btnRegister" id="btnRegister" value="Register" -->
					</div>
				</div>
			</div>
			<div class="col-sm-6"></div>
		</div>
        <?php echo form_close(); ?>
	</div>
</div>

  

<?php $this->load->view('footer'); ?>