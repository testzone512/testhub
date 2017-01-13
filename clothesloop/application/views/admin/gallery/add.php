<!DOCTYPE html>
<html>
<head>
    <!--script src="<?php echo base_url();?>public/admin/js/jquery.validation.js"></script-->
    <script type="text/javascript">
        $(document).ready(function(){ // jQuery DOM ready function.
            $("#frmGallery").validate({
                rules:{
                    "galleryImage[]":
                    {
                        required:true
                    }

                },
                messages:
                {
                    "galleryImage[]":
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
        <h1 class="page-header">Add Product Gallery</h1>
    </div>
    <!-- end  page header -->
</div>

<div class="form-group">
	<div class="row"><!-- row START -->
		<div class="col-lg-12">
			<a href="<?php echo base_url(); ?>admin/gallery/list_gallery/<?php echo $product_id; ?>" class="btn btn-primary btn-quirk btn-stroke">Back Product Gallery List</a>
		</div>
	</div><!-- row END -->
</div>


<div class="panel panel-default">
    <!--<div class="panel-heading">User</div>-->
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">
                <?php
                $attributes = array('id' => 'frmGallery');
                echo form_open_multipart('admin/gallery/add/'.$product_id,$attributes);
                ?>
				
                 <div class="form-group">
                    <div class="row">
                            <div class="col-sm-3">
                                 <label for="galleryImage">Gallery Product Image</label>
                            </div>
                            <div class="col-sm-3">
                                <?php $dataGalleryImage = array(
								'name'        => 'galleryImage[]',
								'id'          => 'galleryImage[]',
								'class'		  => 'small',
								'multiple'	  => 'multiple',
								'onchange'	  => 'readURL(this)'
								);
							   ?>
								<?php echo form_upload($dataGalleryImage); ?>
								<span id="gi"></span>
                            </div>
                     </div>
                 </div>   
                <?php if(form_error('galleryImage')){ ?> <span style="color:red"><?php echo form_error('galleryImage'); ?></span> <?php } ?>
                
                <div class="form-group" style="margin-top:2%">
                    <div class="row">
                            <div class="col-sm-3">
                                 &nbsp;
                            </div>
                            <div class="col-sm-3">
                                 <input type="submit" name="btnAddGallery"  value="Add Gallery" class="btn btn-primary btn-quirk btn-stroke"/>
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