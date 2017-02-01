<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript">
        $(document).ready(function(){ // jQuery DOM ready function.
            $("#frmCms").validate({
                rules:{
                    "txtCmsTitle":
                    {
                        required:true
                    }

                },
                messages:
                {
                    "txtCmsTitle":
                    {
                        required:''
                    }
                }
            });
        });
    </script>
    <style>
        input.error, textarea.error, select.error { border-color:#FF0000; }
    </style>


</head>
<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Add Cms</h1>
    </div>
    <!-- end  page header -->
</div>

<div class="form-group">
    <div class="row"><!-- row START -->
        <div class="col-lg-12">
            <a href="<?php echo url('admin/cms'); ?>" class="btn btn-primary btn-quirk btn-stroke">Back Cms List</a>
        </div>
    </div><!-- row END -->
</div>


<div class="panel panel-default">
    <!--<div class="panel-heading">User</div>-->
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">
                    <form method="post" name="frmCms" id="frmCms" action="{{ url('/admin/cms/add') }}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <label class="mandatory" for="txtCmsTitle">Cms Title</label>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" name="txtCmsTitle" id="txtCmsTitle" class="form-control small required">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <label class="control-label" for="txtCmsDes">Cms Description</label>
                        </div>
                        <div class="col-lg-8">
                            <textarea name="txtCmsDes" id="txtCmsDes" class="form-control"></textarea>
                            <script>
                                CKEDITOR.replace( 'txtCmsDes' );
                            </script>
                        </div>
                    </div>
                </div>


                <div class="form-group" style="margin-top:2%">
                    <div class="row">
                        <div class="col-sm-3">
                            &nbsp;
                        </div>
                        <div class="col-sm-3">
                            <input type="submit" name="btnAddCms"  value="Add Cms" class="btn btn-primary btn-quirk btn-stroke"/>
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