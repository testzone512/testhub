<!DOCTYPE html>
<html>
<head>
    <!--script src="<?php echo url('public/admin/js/jquery.validation.js');?>"></script-->
    <script type="text/javascript">
        $(document).ready(function(){ // jQuery DOM ready function.
            $("#frmSize").validate({
                rules:{
                    "txtSizeName":
                    {
                        required:true
                    }

                },
                messages:
                {
                    "txtSizeName":
                    {
                        required:''
                    }
                }
            });
        });
    </script>
</head>
<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Add Size</h1>
    </div>
    <!-- end  page header -->
</div>

<div class="form-group">
    <div class="row"><!-- row START -->
        <div class="col-lg-12">
            <a href="<?php echo url('admin/size'); ?>" class="btn btn-primary btn-quirk btn-stroke">Back Size List</a>
        </div>
    </div><!-- row END -->
</div>


<div class="panel panel-default">
    <!--<div class="panel-heading">User</div>-->
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">
                <form method="post" name="frmSize" id="frmSize" action="{{ url('admin/size/add/') }}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-3">
                            <label class="mandatory" for="txtSizeName">Size Name</label>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" name="txtSizeName" id="txtSizeName" class="form-control small required">
                        </div>
                    </div>
                </div>

                <div class="form-group" style="margin-top:2%">
                    <div class="row">
                        <div class="col-sm-3">
                            &nbsp;
                        </div>
                        <div class="col-sm-3">
                            <input type="submit" name="btnAddSize"  value="Add Size" class="btn btn-primary btn-quirk btn-stroke"/>
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