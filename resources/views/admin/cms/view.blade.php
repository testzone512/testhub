<!DOCTYPE html>
<html>
<head>
</head>
<div class="row">
    <!--  page header -->
    <div class="col-sm-12">
        <h1 class="page-header">View Cms</h1>
    </div>
    <!-- end  page header -->
</div>

<div class="form-group">
    <div class="row"><!-- row START -->
        <div class="col-sm-12">
            <a href="<?php echo url('admin/cms'); ?>" class="btn btn-primary btn-quirk btn-stroke">Back Cms List</a>
        </div>
    </div><!-- row END -->
</div>
<div class="panel panel-default">
    <!--<div class="panel-heading">User</div>-->
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="mainCat"><b>Cms Title</b></label>
                        </div>
                        <div class="col-sm-1"><b>-</b></div>
                        <div class="col-sm-4">
                            <?php echo $cmsDetails[0]['cms_title']; ?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="mainCat"><b>Cms Description</b></label>
                        </div>
                        <div class="col-sm-1"><b>-</b></div>
                        <div class="col-sm-4">
                            <?php echo $cmsDetails[0]['cms_description']; ?>
                        </div>
                    </div>
                </div>
                <!-- End Form Elements -->
            </div>
        </div>
    </div>
</div>
</html>