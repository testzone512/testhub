<!DOCTYPE html>
<html>
<head>
    <!--script src="<?php echo base_url();?>public/admin/js/jquery.validation.js"></script-->
    <script type="text/javascript">
        $(document).ready(function(){ // jQuery DOM ready function.
            $("#frmSlider").validate({
                rules:{
                    txtSliderImage:
                    {
                        required:true
                    }

                },
                messages:
                {
                    txtSliderImage:
                    {
                        required:'Please Upload Image'
                    }
                }
            });
        });
    </script>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                $(input.files).each(function () {
                    var reader = new FileReader();
                    reader.readAsDataURL(this);
                    reader.onload = function (e) {
                        //document.getElementById('gi').insertBefore('');
                        $("#gi").append("<img class='thumb' src='" + e.target.result + "'>");
                    }
                });
            }
        }
    </script>
    <style>
        .thumb{ width:50px; height:50px;}
        input.error, textarea.error, select.error { border-color:#FF0000; }
    </style>


</head>
<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Add Testimonial</h1>
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
                echo form_open_multipart('admin/testimonial/add/',$attributes);
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
                                        'onchange'	  => 'readURL(this)'
                                        );
                                    echo form_upload($dataTestimonialImage);
							   ?>
								<span id="gi"></span>
                            </div>
                     </div>
                 </div>   
                <?php if(form_error('txtTestimonialImage')){ ?> <span style="color:red"><?php echo form_error('txtTestimonialImage'); ?></span> <?php } ?>
                
                <div class="form-group">
                    <div class="row">
                            <div class="col-sm-3">
                                 <label for="txtName">Name</label>
                            </div>
                            <div class="col-sm-4">
                                <?php 
                                    $dataName = array(
                                        'name'        => 'txtName',
                                        'id'          => 'txtName',
                                        'class'		  => 'form-control'
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
                                        'rows'        => 8
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
                                 <input type="submit" name="btnAdd"  value="Add Testimonial" class="btn btn-primary btn-quirk btn-stroke"/>
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