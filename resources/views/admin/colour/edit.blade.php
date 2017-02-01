<script>
    $(document).ready(function (e) {
        $("#frmColour").validate({
            rules:
            {
                txtColourName:
                {
                    required: true
                }

            },
            messages:
            {
                txtColourName:
                {
                    required: ""
                }
            }
        });
    });
</script>
<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Update Colour</h1>
    </div>
    <!-- end  page header -->
</div>

<div class="form-group">
    <div class="row"><!-- row START -->
        <div class="col-lg-12">
            <a href="<?php echo url('/admin/colour'); ?>" class="btn btn-primary btn-quirk btn-stroke">Back List Colour</a>
        </div>
    </div><!-- row END -->
</div>
<form method="post" name="frmColour" id="frmColour" action="{{ url('/admin/colour/edit/') }}<?php echo '/'.$colourDetails[0]['colour_id']; ?>" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="panel panel-default">
    <!--<div class="panel-heading">User</div>-->
    <div class="panel-body">

        <div class="form-group">
            <div class="row">
                <div class="col-lg-2">
                    <label class="control-label">Colour Name</label>
                </div>
                <div class="col-lg-3">
                    <input type="text" name="txtColourName" id="txtColourName" class="form-control required" value="<?php echo $colourDetails[0]['colour_name']; ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-3">
                   <input type="submit" name="btnColourUpdate"  value="Update Colour" class="btn btn-primary btn-quirk btn-stroke"/>
                </div>
            </div>
        </div>
    </div>
</div>

</form>

