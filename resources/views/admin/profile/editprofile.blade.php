<script type="text/javascript">
	$(document).ready(function(){
		$('#cmbCountry').change(function(){
			var selectedCountry = this.value;
			if(this.value!='')
			{
				 $.ajax({
					type: "POST",
					url: "<?php echo url('admin/profile/ajaxGetStateOnCountry') ?>",
					data: {"_token": "{{ csrf_token() }}",countryId: selectedCountry}
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
					url: "<?php echo url('admin/profile/ajaxGetCityOnState') ?>",
					data: {"_token": "{{ csrf_token() }}", stateId: selectedCity}
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
<?php //echo"<pre>"; print_r($profile_data); echo $profile_data[0]->id;?>
<div class="contentpanel">
  <div class="row profile-wrapper">
    <div class="col-xs-12 col-md-3 col-lg-2 profile-left">
      <div class="profile-left-heading">
        <ul class="panel-options">
          <li><a><i class="glyphicon glyphicon-option-vertical"></i></a></li>
        </ul>
        <a href="#" class="profile-photo">
        	<?php if($profile_data[0]['profile_pic'] != '') 
						{ ?>
							<img class="img-circle img-responsive" src="<?php echo url('public/upload/profile/thumb').'/'.$profile_data[0]['profile_pic'];?>" alt="Profile Image" />
						<?php } else { ?>
                            <img class="img-circle img-responsive" src="<?php echo url('public/admin/images/noprofile.jpg'); ?>" alt="Profile Image" />
						<?php } ?>
        </a>
        <h2 class="profile-name"><?php $data = explode(' ',$profile_data[0]['name']) ; echo $data[0]; ?>&nbsp;<?php $data = explode(' ',$profile_data[0]['name']) ; echo $data[1]; ?></h2>
        <h4 class="profile-designation"><?php if($profile_data[0]['is_admin']==1){ echo 'Administrator'; } else { echo 'Local User'; } ?></h4>
        <a href="{{ url('/admin/profile') }}" class="btn btn-danger btn-quirk btn-block profile-btn-follow">View Profile</a>
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
			  		//$attributes = 'id="frmProfile"';
					//echo form_open_multipart('admin/profile/editProfile/'.$profileDetails[0]['user_id'],$attributes);
			  ?>
                <form method="post" name="frmProfile" id="frmProfile" action="{{ url('admin/profile/editProfile/') }}<?php echo '/'.$profile_data[0]['id'] ?>" enctype="multipart/form-data">
              <div class="form-group">
              	<div class="row">
                	<div class="col-lg-2">
                    	<h4 class="media-heading">Profile Picture: </h4>
                    </div>
                    <div class="col-lg-4">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="file" name="profileImage" id="profileImage" value="<?php echo $profile_data[0]['profile_pic']; ?>">
                    </div>
                </div>
              </div>
              
              <div class="form-group">
              	<div class="row">
                	<div class="col-lg-2">
                    </div>
                    <div class="col-lg-4">
                    	<?php if( $profile_data[0]['profile_pic'] != '') { ?>
                        	<img  src="<?php echo url('public/upload/profile/thumb').'/'.$profile_data[0]['profile_pic'];?>"  style="height: 8em;" />
						<?php } else { ?>
                           <img  src="<?php echo url('public/admin/images/noprofile.jpg'); ?>"  height="85" />
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
                        <input type="text" name="txtFirstName" id="txtFirstName" class="form-control" value="<?php $data = explode(' ',$profile_data[0]['name']) ; echo $data[0]; ?>">
                    </div>
                </div>
              </div>
              
              <div class="form-group">
              	<div class="row">
                	<div class="col-lg-2">
                    	<h4 class="media-heading">Last Name : </h4>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" name="txtLastName" id="txtLastName" class="form-control" value="<?php $data = explode(' ',$profile_data[0]['name']) ; echo $data[1]; ?>">
                    </div>
                </div>
              </div>
              
              <div class="form-group">
              	<div class="row">
                	<div class="col-lg-2">
                    	<h4 class="media-heading">About Me: </h4>
                    </div>
                    <div class="col-lg-6">
                        <textarea name="txtAboutMe" id="txtAboutMe" class="form-control" role="5"><?php echo $profile_data[0]['introduction']; ?></textarea>
                    </div>
                </div>
              </div>
              
              <div class="form-group">
              	<div class="row">
                	<div class="col-lg-2">
                    	<h4 class="media-heading">Address: </h4>
                    </div>
                    <div class="col-lg-6">
                      <textarea name="txtAddress" id="txtAddress" class="form-control" role="5"><?php echo $profile_data[0]['address1']; ?></textarea>
                    </div>
                </div>
              </div>
              
              <div class="form-group">
              	<div class="row">
                	<div class="col-lg-2">
                    	<h4 class="media-heading">Mobile: </h4>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" name="txtMobile" id="txtMobile" class="form-control" value="<?php echo $profile_data[0]['mobile']; ?>">
                    </div>
                </div>
              </div>
              
              <div class="form-group">
              	<div class="row">
                	<div class="col-lg-2">
                    	<h4 class="media-heading">Email: </h4>
                    </div>
                    <div class="col-lg-4">
                      <input type="text" name="txtEmail" id="txtEmail" class="form-control" value="<?php echo $profile_data[0]['email']; ?>">
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
							$dataCountry = array('id'=>'cmbCountry','class'=>'form-control');	
							echo Form::select('cmbCountry',$countryKeyValueArr,$profile_data[0]['country_id'],$dataCountry); 
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
							$dataState = array('id'=>'cmbState','class'=>'form-control');	
							echo Form::select('cmbState',$stateKeyValueArr,$profile_data[0]['state_id'],$dataState); 
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
							$dataCity = array('id'=>'cmbCity','class'=>'form-control');	
							echo Form::select('cmbCity',$cityKeyValueArr,$profile_data[0]['city_id'],$dataCity); 
				     ?>
                    </div>
                </div>
              </div>
              
              <?php  if(Session::get('sess_user_is_admin')==1)
			  {
			  ?>	
              <div class="form-group">
              	<div class="row">
                	<div class="col-lg-2">
                    	<h4 class="media-heading">Is Admin: </h4>
                    </div>
                    <div class="col-lg-4">
                    <?php 
						$dataIsAdmin = array('id'=>'cmbIsAdmin','class'=>'form-control');	
						echo Form::select('cmbIsAdmin',config('custom_constants.COMMON_YES_NO_BOOLEAN'),$profile_data[0]['is_admin'],$dataIsAdmin); 
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
                        <input type="submit" name="btnUpdate" id="btnUpdate" class="btn btn-primary btn-quirk btn-stroke">
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