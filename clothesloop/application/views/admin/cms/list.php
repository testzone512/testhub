<meta name="viewport" content="width=device-width, initial-scale=1" xmlns="http://www.w3.org/1999/html">
<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable({
            'sPaginationType':'full_numbers' ,
            "bStateSave"	: true
        });
    });
</script>


<script type="text/javascript">

    function active_confirm(Action,GalleryId)
    {
        if(confirm('Do you wish to Active?'))
        {
			ajax_gallery_active_inactive(Action,GalleryId);
        }
    }
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
        <h1 class="page-header">List Cms</h1>
    </div>
    <!-- end  page header -->
</div>

<div class="form-group">
	<div class="row"><!-- row START -->
		<div class="col-lg-11">
			&nbsp;
		</div>
        <div lass="col-lg-1">
        	<a  href="<?php echo base_url(); ?>admin/cms/add/"  class="btn btn-primary btn-quirk btn-stroke">Add Cms </a>
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
                                <th>Title</th>
                                <th>Description</th>
                                <th>create</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <?php
                            $i = 1;
                            foreach ($cmsDetails as $cms) 
							{
                                ?>
                                <tr class="gradeA">
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $cms['cms_title']; ?></td>
                                    <td><?php if(strlen($cms['cms_description'])>27){ echo substr(trim($cms['cms_description']),0,25).'....'; } else { echo $cms['cms_description']; } ?></td>
                                    <td><?php echo $cms['cms_created_on']; ?></td>
                                    <td>
                                        <a title="Edit Cms"  href="<?php echo base_url(); ?>admin/cms/edit/<?php echo $cms['cms_id']; ?>" style="text-decoration:none;"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a>&nbsp;
                                        <a title="View Cms" href="<?php echo base_url(); ?>admin/cms/view/<?php echo $cms['cms_id']; ?>"><i class="fa fa-eye fa-2x" aria-hidden="true"></i></a>
                                        <a title="Delete Cms"  href="#" onclick="javascript : deleteConfirm('<?php echo base_url(); ?>admin/cms/delete_cms/<?php echo $cms['cms_id']; ?>')" style="text-decoration:none;"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                <?php $i++; } ?>

                            <tfoot>
                            <tr>
                                <th>Sr No.</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>create</th>
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
