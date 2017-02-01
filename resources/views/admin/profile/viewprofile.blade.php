<div class="contentpanel">
  <div class="row profile-wrapper">
    <div class="col-xs-12 col-md-3 col-lg-2 profile-left">
      <div class="profile-left-heading">
        <ul class="panel-options">
          <li><a><i class="glyphicon glyphicon-option-vertical"></i></a></li>
        </ul>
        <a href="#" class="profile-photo"><img class="img-circle img-responsive" src="<?php echo url('public/upload/profile/thumb').'/'.$view_profile[0]['profile_pic'];?>" alt="No Found"></a>
        <h2 class="profile-name"><?php $data = explode(' ',$view_profile[0]['name']) ; echo $data[0]; ?>&nbsp;<?php $data = explode(' ',$view_profile[0]['name']) ; echo $data[1]; ?></h2>
        <h4 class="profile-designation"><?php if($view_profile[0]['is_admin']==1){ echo 'Administrator'; } else { echo 'Local User'; } ?></h4>
        <a href="<?php echo url('admin/profile/editProfile').'/'.$view_profile[0]['id']; ?>" class="btn btn-danger btn-quirk btn-block profile-btn-follow">Edit Profile</a>
        <!-- input type="submit" class="btn btn-danger btn-quirk btn-block profile-btn-follow" value="Edit Profile" -->
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
          <li class="active"><a href="#activity" data-toggle="tab"><strong>View Profile</strong></a></li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="activity">
            <div class="panel panel-post-item">
              <div class="panel-heading">
                <div class="media">
                  <div class="media-left"> <a href="#"> <img alt="" src="<?php echo url('public/upload/profile/thumb').'/'.$view_profile[0]['profile_pic'];?>" class="media-object img-circle"> </a> </div>
                  	<div class="media-body">
                    	<h4 class="media-heading"><?php $data = explode(' ',$view_profile[0]['name']) ; echo $data[0]; ?>&nbsp;<?php $data = explode(' ',$view_profile[0]['name']) ; echo $data[1]; ?></h4>
                  	</div>
                </div>
                <!-- media --> 
              </div>
              <!-- panel-heading -->
              <div class="form-group">
              	<div class="row">
                	<div class="col-lg-2">
                    	<h4 class="media-heading">About Me: </h4>
                    </div>
                    <div class="col-lg-4">
                    	<?php echo $view_profile[0]['introduction']; ?>
                    </div>
                </div>
              </div>
              
              <div class="form-group">
              	<div class="row">
                	<div class="col-lg-2">
                    	<h4 class="media-heading">Address: </h4>
                    </div>
                    <div class="col-lg-4">
                    	<?php echo $view_profile[0]['address1']; ?>
                    </div>
                </div>
              </div>
              
              <div class="form-group">
              	<div class="row">
                	<div class="col-lg-2">
                    	<h4 class="media-heading">Mobile: </h4>
                    </div>
                    <div class="col-lg-4">
                    	<?php echo $view_profile[0]['mobile']; ?>
                    </div>
                </div>
              </div>
              
              <div class="form-group">
              	<div class="row">
                	<div class="col-lg-2">
                    	<h4 class="media-heading">Email: </h4>
                    </div>
                    <div class="col-lg-4">
                    	<?php echo $view_profile[0]['email']; ?>
                    </div>
                </div>
              </div>
              
              <div class="form-group">
              	<div class="row">
                	<div class="col-lg-2">
                    	<h4 class="media-heading">Country: </h4>
                    </div>
                    <div class="col-lg-4">
                    	<?php echo $view_profile[0]['country_name']; ?>
                    </div>
                </div>
              </div>
              
              <div class="form-group">
              	<div class="row">
                	<div class="col-lg-2">
                    	<h4 class="media-heading">State: </h4>
                    </div>
                    <div class="col-lg-4">
                    	<?php echo $view_profile[0]['state_name']; ?>
                    </div>
                </div>
              </div>
              
              <div class="form-group">
              	<div class="row">
                	<div class="col-lg-2">
                    	<h4 class="media-heading">City: </h4>
                    </div>
                    <div class="col-lg-4">
                    	<?php echo $view_profile[0]['city_name']; ?>
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