<!DOCTYPE html>
<html>
<head>
    <!--script src="<?php echo url('public/admin/js/jquery.validation.js');?>"></script-->
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
            <a href="<?php echo url('admin/testimonial'); ?>" class="btn btn-primary btn-quirk btn-stroke">List Testimonial</a>
        </div>
    </div><!-- row END -->
</div>


<div class="panel panel-default">
    <!--<div class="panel-heading">User</div>-->
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">
               <form method="post" name="frmTestimonial" id="frmTestimonial" action="{{ url('/admin/testimonial/edit/') }}<?php echo '/'.$testimonialDetails[0]['testimonial_id']; ?>" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="testimonialImage">Testimonial Image</label>
                        </div>
                        <div class="col-sm-3">
                             <input type="file" name="testimonialImage" id="testimonialImage" class="form-control required" value="<?php echo $testimonialDetails[0]['testimonial_image']; ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                        </div>
                        <div class="col-sm-3">
                            <?php if($testimonialDetails[0]['testimonial_image']!=''){ ?>
                            <img src="<?php echo url('public/upload/testimonial/thumb').'/'.$testimonialDetails[0]['testimonial_image'];?>" width="100" align="left"/>
                            <?php } else { ?>
                            <img src="<?php echo url('public/upload/gallery/thumb/noPreview.png');?>" width="100" align="left"/>
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
                              <input type="" name="txtName" id="txtName" class="form-control" value="<?php echo $testimonialDetails[0]['testimonial_name']; ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="sliderImage">Description</label>
                        </div>
                        <div class="col-sm-8">
                             <textarea name="txtDescription" id="txtDescription" class="form-control" rows="8"><?php echo $testimonialDetails[0]['testimonial_description']; ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group" style="margin-top:2%">
                    <div class="row">
                        <div class="col-sm-3">
                            &nbsp;
                        </div>
                        <div class="col-sm-3">
                            <input type="submit" name="btnTestimonialEdit"  value="Update Testimonial" class="btn btn-primary btn-quirk btn-stroke"/>
                        </div>
                    </div>
                </div>



              </form>


                        <!-- End Form Elements -->
            </div>
        </div>
    </div>
</div>
</html>