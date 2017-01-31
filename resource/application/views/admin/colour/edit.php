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
            <a href="<?php echo site_url('admin/colour/'); ?>" class="btn btn-primary btn-quirk btn-stroke">Back List Colour</a>
        </div>
    </div><!-- row END -->
</div>

<?php
$attributes = array('id' => 'frmColour');

echo form_open('admin/colour/edit/' . $colourDetails[0]['colour_id'], $attributes);
?>
<div class="panel panel-default">
    <!--<div class="panel-heading">User</div>-->
    <div class="panel-body">

        <div class="form-group">
            <div class="row">
                <div class="col-lg-2">
                    <label class="control-label">Colour Name</label>
                </div>
                <div class="col-lg-3">
                    <?php
                    $dataColourName = array(
                        'name'          => 'txtColourName',
                        'id'            => 'txtColourName',
                        'class'         => 'form-control required',
                        'value'         => $colourDetails[0]['colour_name']
                    );
                    echo form_input($dataColourName);
                    ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-3">
                    <?php
                    $dataSubmit = array(
                        'name' => 'btnUpdate',
                        'id' => 'btnUpdate',
                        'class' => 'btn btn-primary btn-quirk btn-stroke'
                    );
                    echo form_submit($dataSubmit, 'Update Colour');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>           

<?php echo form_close(); ?>

