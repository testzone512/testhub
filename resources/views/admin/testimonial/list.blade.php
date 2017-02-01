<meta name="viewport" content="width=device-width, initial-scale=1" xmlns="http://www.w3.org/1999/html">
<script type="text/javascript">
    $(document).ready(function () {
        $('#testimonialData').DataTable({
            'sPaginationType':'full_numbers' ,
            "bStateSave"	: true
        });
    });
</script>


<script type="text/javascript">

    function deleteConfirm(url)
    {
        if(confirm('Do you wish to Delete?'))
        {
            window.location.href=url;
        }
    }
</script>
<style>
    .error{color:red; border:1px solid #FF0000;}
</style>
<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">List Testimonial</h1>
    </div>
    <!-- end  page header -->
</div>

<div class="form-group">
    <div class="row"><!-- row START -->
        <div class="col-lg-12">
            <?php if(Session::get('admin_sess_is_admin')==1){ ?>
            <a href="<?php echo url('admin/testimonial/add'); ?>" class="btn btn-primary btn-quirk btn-stroke pull-right">Add TEstimonial</a>
            <?php } ?>
        </div>
    </div><!-- row END -->
</div>

<div class="form-group">
    <div class="row">
        <div class="col-lg-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <!--div class="panel-heading"> </div -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="testimonialData">
                            <thead>
                            <tr>
                                <th>Testimonial Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <?php foreach ($testimonialDetails as $testimonial) { ?>
                            <tr class="gradeA">
                                <td>
                                    <?php if($testimonial['testimonial_image']!=''){ ?>
                                    <img src="<?php echo url('public/upload/testimonial/thumb').'/'.$testimonial['testimonial_image'];?>" width="100" align="left"/>
                                    <?php } else { ?>
                                    <img src="<?php echo url('public/upload/gallery/thumb/noPreview.png');?>" width="100" align="left"/>
                                    <?php } ?>
                                </td>
                                <td><?php echo $testimonial['testimonial_name']; ?></td>
                                <td><?php echo $testimonial['testimonial_description']; ?></td>
                                <td>
                                    <?php if(Session::get('admin_sess_is_admin')==1){ ?>
                                    <a title="Edit Testimonial"  href="<?php echo url('admin/testimonial/edit').'/'.$testimonial['testimonial_id']; ?>" style="text-decoration:none;"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a>&nbsp;
                                    <a title="Delete Testimonial"  href="#" onclick="javascript : deleteConfirm('<?php echo url('admin/testimonial/delete').'/'.$testimonial['testimonial_id']; ?>')" style="text-decoration:none;"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a></td>
                                     <?php } ?>
                            </tr>
                            <?php } ?>

                            <tfoot>
                            <tr>
                                <th>Testimonial Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>

                        </table>
                        <?php //echo @$links; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
