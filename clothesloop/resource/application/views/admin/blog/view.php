<!DOCTYPE html>
<html>
<head></head>
<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">View Blog</h1>
    </div>
    <!-- end  page header -->
</div>

<div class="form-group">
	<div class="row"><!-- row START -->
		<div class="col-lg-12">
			<a href="<?php echo base_url(); ?>admin/blog/" class="btn btn-primary btn-quirk btn-stroke">Back to Blog List</a>
		</div>
	</div><!-- row END -->
</div>


<div class="panel panel-default">
    <!--<div class="panel-heading">User</div>-->
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">
                <?php
                $attributes = array('id' => 'frmBlog');
                echo form_open_multipart('admin/blog/view/'.$blogDetails[0]['blog_id'],$attributes);
                ?>
				
                 <div class="form-group">
                    <div class="row">
                            <div class="col-sm-3">
                                 <label for="galleryImage" class="control-label">Blog Image : </label>
                            </div>
                            <div class="col-sm-5">
                                <?php if($blogDetails[0]['blog_image']!='') { ?>
                                    <img src="<?php echo site_url().'public/upload/blog/thumb/'.$blogDetails[0]['blog_image'];?>" style="width:10em;"/>
                                <?php } else { ?>
                                    <img src="<?php echo site_url();?>/public/upload/gallery/thumb/noPreview.png" width="100" align="left"/>
                                <?php } ?>
                            </div>
                     </div>
                 </div>
                 
                 <div class="form-group">
                    <div class="row">
                            <div class="col-sm-3">
                                 <label for="galleryImage" class="control-label">Title : </label>
                            </div>
                            <div class="col-sm-5">
                                <?php echo $blogDetails[0]['blog_title']; ?>
                            </div>
                     </div>
                 </div>
                 
                 <div class="form-group">
                    <div class="row">
                            <div class="col-sm-3">
                                 <label for="galleryImage" class="control-label">Description : </label>
                            </div>
                            <div class="col-sm-8">
                                <?php echo $blogDetails[0]['blog_description']; ?>
                            </div>
                     </div>
                 </div>  
                 
                 <div class="form-group">
                    <div class="row">
                            <div class="col-sm-3">
                            	<label for="galleryImage" class="control-label">Created ON : </label>
                            </div>
                            <div class="col-sm-3">
                                <?php echo $blogDetails[0]['blog_created_on']; ?>
                            </div>
                     </div>
                 </div> 
                 
                  <div class="form-group">
                    <div class="row">
                            <div class="col-sm-3">
                            	<label for="galleryImage" class="control-label">Updated ON : </label>
                            </div>
                            <div class="col-sm-3">
                                <?php echo $blogDetails[0]['blog_updated_on']; ?>
                            </div>
                     </div>
                 </div>      
                
                
                <?php echo form_close(); ?>


                <!-- End Form Elements -->
            </div>
        </div>
    </div>
</div>
</html>