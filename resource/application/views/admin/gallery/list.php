<meta name="viewport" content="width=device-width, initial-scale=1" xmlns="http://www.w3.org/1999/html">
<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable({
            'sPaginationType':'full_numbers' ,
            "bStateSave"	: true
        });
    });
</script>

<!-- start ajax_gallery_active_inactive -->
<script>
    function ajax_gallery_active_inactive(Action,GalleryId)
    {
        if(Action != "" && GalleryId !="")
        {
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('admin/gallery/ajax_gallery_active_inactive'); ?>",
                data: {Action: Action, GalleryId : GalleryId},
                dataType: 'text',
                success: function (data)
                {
                    //alert(data);
                    if(data == 'Active')
                    {
                        alert('Gallery Inactivated Successfully');
                        location.reload(true);
                    }
                    else if(data == 'Inactive')
                    {
                        alert('Gallery Activated Successfully');
                        location.reload(true);
                    }
                }
            });


        }

    }
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

    function inactive_confirm(Action,GalleryId)
    {
        if(confirm('Do you wish to InActive?'))
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
        <h1 class="page-header">List Product Gallery</h1>
    </div>
    <!-- end  page header -->
</div>

<div class="form-group">
	<div class="row"><!-- row START -->
		<div class="col-lg-11">
			<a href="<?php echo base_url(); ?>admin/product/" class="btn btn-primary btn-quirk btn-stroke">Back Product List</a>
		</div>
        <div lass="col-lg-1">
        	<a  href="<?php echo base_url(); ?>admin/gallery/add/<?php echo $product_id; ?>"  class="btn btn-primary btn-quirk btn-stroke">Add Gallery </a>
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
                        <table class="table table-striped table-bordered table-hover" id="example">
                            <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Gallery Image</th>
                                <th>Product Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <?php
                            $i = 1;
                            foreach ($galleryDetails as $gallery) {
                                if ($gallery['gallery_status'] == 0) {
                                    $statuschk = 'Inactive';
                                } elseif ($gallery['gallery_status'] == 1) {
                                    $statuschk = 'Active';
                                }
                                ?>
                                <tr class="gradeA">
                                    <td><?php echo $i; ?></td>

                                    <td><?php if($gallery['gallery_image']!='')
                                        { ?>
                                            <img src="<?php echo site_url().'public/upload/gallery/thumb/'.$gallery['gallery_image'];?>" width="100" align="left"/>
                                            <?php
                                        }
                                        else
                                        { ?>
                                            <img src="<?php echo site_url();?>/public/upload/gallery/thumb/noPreview.png" width="100" align="left"/>
                                            <?php
                                        }?>
                                    </td>

                                    <td><?php echo $gallery['product_name']; ?></td>
                                    <td><?php echo $statuschk; ?></td>
                                    <td>
                                        <a title="Edit Gallery"  href="<?php echo base_url(); ?>admin/gallery/edit/<?php echo $gallery['gallery_id']; ?>" style="text-decoration:none;"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a>&nbsp;
                                        <?php
                                        if ($statuschk == 'Inactive')
                                        {
                                            ?>
                                            <a title="Deactive Gallery" href="javascript:void(0)" onclick="javascript : active_confirm('<?php echo $statuschk; ?>',<?php echo $gallery['gallery_id']; ?>)"  style="text-decoration:none; color:#FF0000"><i class="fa fa-circle fa-2x" aria-hidden="true"></i></a>
                                            <?php
                                        }
                                        else
                                        { ?>
                                            <a title="Active Gallery" href="javascript:void(0)" onclick="javascript : inactive_confirm('<?php echo $statuschk; ?>',<?php echo $gallery['gallery_id']; ?>)"  style="text-decoration:none; color:#4cae4c"><i class="fa fa-circle fa-2x" aria-hidden="true"></i></a>
                                            <?php
                                        }
                                        ?>
                                        <a title="Delete Gallery"  href="#" onclick="javascript : deleteConfirm('<?php echo base_url(); ?>admin/gallery/delete_gallery/<?php echo $gallery['gallery_id']; ?>')" style="text-decoration:none;"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a></td>
                                </tr>
                                <?php $i++; } ?>

                            <tfoot>
                            <tr>
                                <th>Sr No.</th>
                                <th>Gallery Image</th>
                                <th>Product Name</th>
                                <th>Status</th>
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
