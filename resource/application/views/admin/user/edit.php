<script type="text/javascript">
	$(document).ready(function(){
		$('#cmbCountry').change(function(){
			var selectedCountry = this.value;
			if(this.value!='')
			{
				 $.ajax({
					type: "POST",
					url: "<?php echo site_url() ?>admin/profile/ajaxGetStateOnCountry/",
					data: { countryId: selectedCountry}
				}).done(function( msg ) {
						//alert(msg);
						  msg = $.trim( msg );
						  var options = '<option value="">--- Select State ---</option>';
						  if(msg != ''){
							  var obj = jQuery.parseJSON(msg);			  
							  for (var i = 0; i < obj.length; i++) {
								options += '<option value="'+obj[i].state_id+'">'+obj[i].state_name+'</option>';
							  }			  
						}
						$("#cmbState").html(options);
					});
			}
			else
			{
				// removing options from State drop down as it is on bases of Country
				$("#cmbState option").remove();
				$("#cmbState").append('<option value="">--- Select State ---</option>');
			}
		});

		$('#cmbState').change(function(){
			var selectedCity = this.value;
			if(this.value!='')
			{
				 $.ajax({
					type: "POST",
					url: "<?php echo site_url() ?>admin/profile/ajaxGetCityOnState/",
					data: { stateId: selectedCity}
				}).done(function( msg ) {
						//alert(msg);
						  msg = $.trim( msg );
						  var options = '<option value="">--- Select City ---</option>';
						  if(msg != ''){
							  var obj = jQuery.parseJSON(msg);			  
							  for (var i = 0; i < obj.length; i++) {
								options += '<option value="'+obj[i].city_id+'">'+obj[i].city_name+'</option>';
							  }			  
						}
						$("#cmbCity").html(options);
					});
			}
			else
			{
				// removing options from State drop down as it is on bases of Country
				$("#cmbCity option").remove();
				$("#cmbCity").append('<option value="">--- Select City ---</option>');
			}
		});


	});
</script>
<script>
  $(document).ready(function(e) {
	$("#frmEditUser").validate({
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
			txtAboutMe:
			{
				required:true
			},
			txtAddress:
			{
				required:true
			},
			txtMobile:
			{
				required:true
			},
			cmbCountry:
			{
				required:true
			},
			cmbState:
			{
				required:true
			},
			cmbCity:
			{
				required:true
			}
			<?php if($this->session->userdata('user_is_admin')==1){ ?>
			,
			cmbIsAdmin:
			{
				required:true
			}
		    <?php } ?>	
			

		},
		messages:
		{
			txtFirstName:
			{
				required:"FirstName required."
			},
			txtLastName:
			{
				required:"LastName required."
			},
			txtAboutMe:
			{
				required:"AboutMe required."
			},
			txtAddress:
			{
				required:"Address required."
			},
			txtMobile:
			{
				required:"Mobile required."
			},
			cmbCountry:
			{
				required:"Please Select Country."
			},
			cmbState:
			{
				required:"Please Select State."
			},
			cmbCity:
			{
				required:"Please Select City."
			}
			<?php if($this->session->userdata('user_is_admin')==1){ ?>,
			cmbIsAdmin:
			{
				required:"Please Select IsAdmin."
			}
			<?php } ?>
		}
	});
  });
</script>
<div class="contentpanel">
   <div class="form-group">
    <div class="row"><!-- row START -->
        <div class="col-sm-1">&nbsp;</div>
        <div class="col-sm-11">
            <a href="<?php echo base_url(); ?>admin/user/" class="btn btn-primary btn-quirk btn-stroke">Back User List</a>
        </div>
    </div><!-- row END -->
  </div>	
  <div class="row profile-wrapper">
    <div class="col-xs-12 col-md-3 col-lg-2 profile-left">
      <div class="profile-left-heading">
        <ul class="panel-options">
          <li><a><i class="glyphicon glyphicon-option-vertical"></i></a></li>
        </ul>
        <a href="#" class="profile-photo"><img class="img-circle img-responsive" src="<?php if(!empty($userDetails[0]['user_profile_pic'])){ echo site_url().'public/upload/profile/thumb/'.$userDetails[0]['user_profile_pic']; } else { echo site_url().'public/admin/images/noprofile.jpg';}?>" alt=""></a>
        <h2 class="profile-name"><?php if(!empty($userDetails[0]['user_firstname'])){ echo ucfirst($userDetails[0]['user_firstname']); }?>&nbsp;<?php if(!empty($userDetails[0]['user_lastname'])) { echo ucfirst($userDetails[0]['user_lastname']); } ?></h2>
        <h4 class="profile-designation"><?php if($userDetails[0]['user_is_admin']==1){ echo 'Administrator'; } else { echo 'Local User'; } ?></h4>
        <a href="<?php echo site_url('admin/user/view/'.$userDetails[0]['user_id']); ?>" class="btn btn-danger btn-quirk btn-block profile-btn-follow">View Profile</a>
      </div>
      <!--div class="profile-left-body">
        <hr class="fadeout">
        <h4 class="panel-title">Social</h4>
        <ul class="list-inline profile-social">
          <li><a href="#"><i class="fa fa-facebook-official"></i></a></li>
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
        </ul>
      </div-->
    </div>
    <div class="col-md-6 col-lg-8 profile-right">
      <div class="profile-right-body"> 
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-justified nav-line">
          <li class="active"><a href="#activity" data-toggle="tab"><strong>Edit Profile</strong></a></li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="activity">
            <div class="panel panel-post-item">
              <div class="panel-heading">
                <div class="media">
                  	
                </div>
                <!-- media --> 
              </div>
              <!-- panel-heading -->
              <?php 
			  		$attributes = 'id="frmEditUser"';
					echo form_open_multipart('admin/user/edit/'.$userDetails[0]['user_id'],$attributes);
			  ?>
              
              <div class="form-group">
              	<div class="row">
                	<div class="col-lg-2">
                    	<h4 class="media-heading">User Picture: </h4>
                    </div>
                    <div class="col-lg-4">
                    	<?php
							$dataProfile = array(
								'name'		=> 'userImage',
								'id'		=> 'userImage'
							); 
							echo form_upload($dataProfile);
						?>
                    </div>
                </div>
              </div>
              
              <div class="form-group">
              	<div class="row">
                	<div class="col-lg-2">
                    </div>
                    <div class="col-lg-4">
                    	<?php if($userDetails[0]['user_profile_pic'] != '') { ?>
							<img src="<?php echo site_url().'public/upload/profile/thumb/'.$userDetails[0]['user_profile_pic'];?>" style="height: 8em;">
						<?php } else { ?>
							<img src="<?php echo site_url().'public/admin/images/noprofile.jpg';?>" height="85">
						<?php } ?>
                    </div>
                </div>
              </div>
              
              <div class="form-group">
              	<div class="row">
                	<div class="col-lg-2">
                    	<h4 class="media-heading">First Name: </h4>
                    </div>
                    <div class="col-lg-4">
                    	<?php
							$dataFirstName = array(
								'name'		=> 'txtFirstName',
								'id'		=> 'txtFirstName',
								'class'		=> 'form-control',
								'value'		=> $userDetails[0]['user_firstname']
							); 
							echo form_input($dataFirstName);
						?>
                    </div>
                </div>
              </div>
              
              <div class="form-group">
              	<div class="row">
                	<div class="col-lg-2">
                    	<h4 class="media-heading">Last Name : </h4>
                    </div>
                    <div class="col-lg-4">
                    	<?php
							$dataLastName = array(
								'name'		=> 'txtLastName',
								'id'		=> 'txtLastName',
								'class'		=> 'form-control',
								'value'		=> $userDetails[0]['user_lastname']
							); 
							echo form_input($dataLastName);
						?>
                    </div>
                </div>
              </div>
              
              <div class="form-group">
              	<div class="row">
                	<div class="col-lg-2">
                    	<h4 class="media-heading">About Me: </h4>
                    </div>
                    <div class="col-lg-6">
                    	<?php
							$dataAboutMe = array(
								'name'		=> 'txtAboutMe',
								'id'		=> 'txtAboutMe',
								'class'		=> 'form-control',
								'value'		=> $userDetails[0]['user_introduction'],
								'rows'		=> 5
							); 
							echo form_textarea($dataAboutMe);
						?>
                    </div>
                </div>
              </div>
              
              <div class="form-group">
              	<div class="row">
                	<div class="col-lg-2">
                    	<h4 class="media-heading">Address: </h4>
                    </div>
                    <div class="col-lg-6">
                    	<?php
							$dataAddress = array(
								'name'		=> 'txtAddress',
								'id'		=> 'txtAddress',
								'class'		=> 'form-control',
								'value'		=> $userDetails[0]['user_address'],
								'rows'		=> 5
							); 
							echo form_textarea($dataAddress);
						?>
                    </div>
                </div>
              </div>
              
              <div class="form-group">
              	<div class="row">
                	<div class="col-lg-2">
                    	<h4 class="media-heading">Mobile: </h4>
                    </div>
                    <div class="col-lg-4">
                    	<?php
							$dataMobile = array(
								'name'		=> 'txtMobile',
								'id'		=> 'txtMobile',
								'class'		=> 'form-control',
								'value'		=> $userDetails[0]['user_mobile']
							); 
							echo form_input($dataMobile);
						?>
                    </div>
                </div>
              </div>
              
              <div class="form-group">
              	<div class="row">
                	<div class="col-lg-2">
                    	<h4 class="media-heading">Email: </h4>
                    </div>
                    <div class="col-lg-4">
                    	<?php
							$dataEmail = array(
								'name'		=> 'txtEmail',
								'id'		=> 'txtEmail',
								'class'		=> 'form-control',
								'value'		=> $userDetails[0]['user_email']
							); 
							echo form_input($dataEmail);
						?>
                    </div>
                </div>
              </div>
              
              <div class="form-group">
              	<div class="row">
                	<div class="col-lg-2">
                    	<h4 class="media-heading">Country: </h4>
                    </div>
                    <div class="col-lg-4">
                    	<?php
							$dataCountry = 'id="cmbCountry" class="form-control"';
							echo form_dropdown('cmbCountry',$countryKeyValueArr,$userDetails[0]['user_country_id'],$dataCountry);
						?>
                    </div>
                </div>
              </div>
              
              <div class="form-group">
              	<div class="row">
                	<div class="col-lg-2">
                    	<h4 class="media-heading">State: </h4>
                    </div>
                    <div class="col-lg-4">
                    	<?php
							$dataState = 'id="cmbState" class="form-control"';
							echo form_dropdown('cmbState',$stateKeyValueArr,$userDetails[0]['user_state_id'],$dataState);
						?>
                    </div>
                </div>
              </div>
              
              <div class="form-group">
              	<div class="row">
                	<div class="col-lg-2">
                    	<h4 class="media-heading">City: </h4>
                    </div>
                    <div class="col-lg-4">
                    	<?php
							$dataCity = 'id="cmbCity" class="form-control"';
							echo form_dropdown('cmbCity',$cityKeyValueArr,$userDetails[0]['user_city_id'],$dataCity);
						?>
                    </div>
                </div>
              </div>
              <?php if($this->session->userdata('user_is_admin')==1)
			  {
			  ?>	
              <div class="form-group">
              	<div class="row">
                	<div class="col-lg-2">
                    	<h4 class="media-heading">Is Admin: </h4>
                    </div>
                    <div class="col-lg-4">
                    	<?php
							$dataIsAdmin = 'id="cmbIsAdmin" class="form-control"';
							echo form_dropdown('cmbIsAdmin',$this->config->item('COMMON_YES_NO_BOOLEAN'),$userDetails[0]['user_is_admin'],$dataIsAdmin);
						?>
                    </div>
                </div>
              </div>
             <?php 
			 } ?> 
              
              <div class="form-group">
              	<div class="row">
                	<div class="col-lg-2">
                    </div>
                    <div class="col-lg-4">
                    	<?php
							$dataUpdate = array(
								'name'		=> 'btnUpdate',
								'id'		=> 'btnUpdate',
								'class'		=> 'btn btn-primary btn-quirk btn-stroke'
							);
							echo form_submit($dataUpdate,'Update Profile');
						?>
                    </div>
                </div>
              </div>
              
             
            </div>
            <!-- panel panel-post -->
            
            
          </div>
          <!-- tab-pane -->
          
          
        </div>
      </div>
    </div>
    
  </div>
  <!-- row --> 
  
</div>
<!-- contentpanel -->