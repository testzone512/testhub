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
        <h1 class="page-header">Update Slider</h1>
    </div>
    <!-- end  page header -->
</div>

<div class="form-group">
    <div class="row"><!-- row START -->
        <div class="col-lg-12">
            <a href="<?php echo url('admin/slider'); ?>" class="btn btn-primary btn-quirk btn-stroke">List Slider</a>
        </div>
    </div><!-- row END -->
</div>


<div class="panel panel-default">
    <!--<div class="panel-heading">User</div>-->
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">
                    <form method="post" name="frmSlider" id="frmSlider" action="{{ url('/admin/slider/edit/') }}<?php echo '/'.$sliderDetails[0]['slider_id']; ?>" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="sliderImage">Slider Image</label>
                        </div>
                        <div class="col-sm-3">
                           <input type="file" name="sliderImage" id="sliderImage" class="small"  value="<?php echo $sliderDetails[0]['slider_image']; ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3">
                            <?php if($sliderDetails[0]['slider_image']!=''){ ?>
                            <img src="<?php echo url('public/upload/slider/thumb').'/'.$sliderDetails[0]['slider_image'];?>" width="100" align="left"/>
                            <?php } else { ?>
                            <img src="<?php echo url('public/upload/gallery/thumb/noPreview.png');?>" width="100" align="left"/>
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
                              <textarea name="txtShortDescription" id="txtShortDescription" class="form-control" rows="8"><?php echo $sliderDetails[0]['slider_short_description']; ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="sliderImage">Long Description</label>
                        </div>
                        <div class="col-sm-8">
                            <textarea name="txtLongDescription" id="txtLongDescription" class="form-control" rows="8"><?php echo $sliderDetails[0]['slider_long_description']; ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group" style="margin-top:2%">
                    <div class="row">
                        <div class="col-sm-3">
                            &nbsp;
                        </div>
                        <div class="col-sm-3">
                            <input type="submit" name="btnSliderEdit"  value="Update Slider" class="btn btn-primary btn-quirk btn-stroke"/>
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