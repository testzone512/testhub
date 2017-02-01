<meta name="viewport" content="width=device-width, initial-scale=1" xmlns="http://www.w3.org/1999/html">
<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable({
            'sPaginationType':'full_numbers' ,
            "bStateSave"	: true
        });
    });
</script>
<!-- start ajax_user_active_inactive -->

<script type="text/javascript">

    function deleteConfirm(url)
    {
        if(confirm('Do you wish to Delete?'))
        {
            window.location.href=url;
        }
    }
</script>
<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">List Size</h1>
    </div>
    <!-- end  page header -->
</div>

<div class="form-group">
    <div class="row"><!-- row START -->
        <div lass="col-lg-12">
            <?php if(Session::get('admin_sess_is_admin')==1){ ?>
            <a  href="<?php echo url('admin/size/add'); ?>"  class="btn btn-primary btn-quirk btn-stroke pull-right">Add Size</a>
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
                        <table class="table table-striped table-bordered " id="example">
                            <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Size</th>
                                <th>Create On</th>
                                <th>Update On</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <?php
                            $i = 1;
                            foreach ($sizeDetails as $size)
                            {
                            ?>
                            <tr class="gradeA">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $size['size_name']; ?></td>
                                <td><?php echo $size['size_created_on']; ?></td>
                                <td><?php echo $size['size_updated_on']; ?></td>
                                <td>
                                    <?php if(Session::get('admin_sess_is_admin')==1){ ?>
                                    <a title="Edit Size" href="<?php echo url('admin/size/edit').'/'.$size["size_id"]; ?>"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a>&emsp;
                                    <a title="Delete Size" href="#" onclick="javascript : deleteConfirm('<?php echo url("/admin/size/delete/").'/'.$size['size_id']; ?>')"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php $i++; } ?>
                            <tfoot>
                            <tr>
                                <th>Sr No.</th>
                                <th>Size</th>
                                <th>Create On</th>
                                <th>Update On</th>
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
