<!DOCTYPE html>
<html>
<head>
    <!--script src="<?php echo base_url();?>public/admin/js/jquery.validation.js"></script-->
    <style>
        .thumb{ width:50px; height:50px;}
        input.error, textarea.error, select.error { border-color:#FF0000; }
    </style>


</head>
<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Update Testimonial</h1>
    </div>
    <!-- end  page header -->
</div>

<div class="form-group">
	<div class="row"><!-- row START -->
		<div class="col-lg-12">
			<a href="<?php echo base_url(); ?>admin/testimonial/" class="btn btn-primary btn-quirk btn-stroke">List Testimonial</a>
		</div>
	</div><!-- row END -->
</div>


<div class="panel panel-default">
    <!--<div class="panel-heading">User</div>-->
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">
                <?php
                $attributes = array('id' => 'frmTestimonial');
                echo form_open_multipart('admin/testimonial/edit/'.$testimonialDetails[0]['testimonial_id'],$attributes);
                ?>
				
                 <div class="form-group">
                    <div class="row">
                            <div class="col-sm-3">
                                 <label for="testimonialImage">Testimonial Image</label>
                            </div>
                            <div class="col-sm-3">
                                <?php 
                                    $dataTestimonialImage = array(
                                        'name'        => 'txtTestimonialImage',
                                        'id'          => 'txtTestimonialImage',
                                        'class'		  => 'small',
                                        'value'       => $testimonialDetails[0]['testimonial_image']
                                        );
                                    echo form_upload($dataTestimonialImage);
							   ?>
                            </div>
                     </div>
                 </div> 
                
                <div class="form-group">
                    <div class="row">
                            <div class="col-sm-3">
                            </div>
                            <div class="col-sm-3">
                                <?php if($testimonialDetails[0]['testimonial_image']!=''){ ?>
                                    <img src="<?php echo site_url().'public/upload/testimonial/thumb/'.$testimonialDetails[0]['testimonial_image'];?>" width="100" align="left"/>
                                <?php } else { ?>
                                    <img src="<?php echo site_url();?>/public/upload/gallery/thumb/noPreview.png" width="100" align="left"/>
                                <?php } ?>
                            </div>
                     </div>
                 </div> 
                
                <div class="form-group">
                    <div class="row">
                            <div class="col-sm-3">
                                <label for="sliderImage">Name</label>
                            </div>
                            <div class="col-sm-4">
                                <?php 
                                    $dataName = array(
                                        'name'        => 'txtName',
                                        'id'          => 'txtName',
                                        'class'		  => 'form-control',
                                        'value'       => $testimonialDetails[0]['testimonial_name']
                                        );
                                    echo form_input($dataName);
							   ?>
                            </div>
                     </div>
                 </div>
                
                <div class="form-group">
                    <div class="row">
                            <div class="col-sm-3">
                                 <label for="sliderImage">Description</label>
                            </div>
                            <div class="col-sm-8">
                                <?php 
                                    $dataDescription = array(
                                        'name'        => 'txtDescription',
                                        'id'          => 'txtDescription',
                                        'class'		  => 'form-control',
                                        'rows'        => 8,
                                        'value'       => $testimonialDetails[0]['testimonial_description']
                                        );
                                    echo form_textarea($dataDescription);
							   ?>
                            </div>
                     </div>
                 </div>
                
                <div class="form-group" style="margin-top:2%">
                    <div class="row">
                            <div class="col-sm-3">
                                 &nbsp;
                            </div>
                            <div class="col-sm-3">
                                 <input type="submit" name="btnEdit"  value="Update Testimonial" class="btn btn-primary btn-quirk btn-stroke"/>
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