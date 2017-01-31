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
        <h1 class="page-header">Update Slider</h1>
    </div>
    <!-- end  page header -->
</div>

<div class="form-group">
	<div class="row"><!-- row START -->
		<div class="col-lg-12">
			<a href="<?php echo base_url(); ?>admin/slider/" class="btn btn-primary btn-quirk btn-stroke">List Slider</a>
		</div>
	</div><!-- row END -->
</div>


<div class="panel panel-default">
    <!--<div class="panel-heading">User</div>-->
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">
                <?php
                $attributes = array('id' => 'frmSlider');
                echo form_open_multipart('admin/slider/edit/'.$sliderDetails[0]['slider_id'],$attributes);
                ?>
				
                 <div class="form-group">
                    <div class="row">
                            <div class="col-sm-3">
                                 <label for="sliderImage">Slider Image</label>
                            </div>
                            <div class="col-sm-3">
                                <?php 
                                    $dataSliderImage = array(
                                        'name'        => 'txtSliderImage',
                                        'id'          => 'txtSliderImage',
                                        'class'		  => 'small',
                                        'value'       => $sliderDetails[0]['slider_image']
                                        );
                                    echo form_upload($dataSliderImage);
							   ?>
                            </div>
                     </div>
                 </div>   
                
                <div class="form-group">
                    <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-3">
                                <?php if($sliderDetails[0]['slider_image']!=''){ ?>
                                    <img src="<?php echo site_url().'public/upload/slider/thumb/'.$sliderDetails[0]['slider_image'];?>" width="100" align="left"/>
                                <?php } else { ?>
                                    <img src="<?php echo site_url();?>/public/upload/gallery/thumb/noPreview.png" width="100" align="left"/>
                                <?php } ?>
                            </div>
                     </div>
                 </div> 
                
                <div class="form-group">
                    <div class="row">
                            <div class="col-sm-3">
                                 <label for="sliderImage">Short Description</label>
                            </div>
                            <div class="col-sm-8">
                                <?php 
                                    $dataShortDescription = array(
                                        'name'        => 'txtShortDescription',
                                        'id'          => 'txtShortDescription',
                                        'class'		  => 'form-control',
                                        'rows'        => 8,
                                        'value'       => $sliderDetails[0]['slider_short_description']
                                        );
                                    echo form_textarea($dataShortDescription);
							   ?>
                            </div>
                     </div>
                 </div>
                
                <div class="form-group">
                    <div class="row">
                            <div class="col-sm-3">
                                 <label for="sliderImage">Long Description</label>
                            </div>
                            <div class="col-sm-8">
                                <?php 
                                    $dataLongDescription = array(
                                        'name'        => 'txtLongDescription',
                                        'id'          => 'txtLongDescription',
                                        'class'		  => 'form-control',
                                        'rows'        => 8,
                                        'value'       => $sliderDetails[0]['slider_long_description']
                                        );
                                    echo form_textarea($dataLongDescription);
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
                                 <input type="submit" name="btnEdit"  value="Update Slider" class="btn btn-primary btn-quirk btn-stroke"/>
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