<meta name="viewport" content="width=device-width, initial-scale=1" xmlns="http://www.w3.org/1999/html">
<script type="text/javascript">
    $(document).ready(function () {
        $('#sliderData').DataTable({
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
        <h1 class="page-header">List Slider</h1>
    </div>
    <!-- end  page header -->
</div>

<div class="form-group">
	<div class="row"><!-- row START -->
		<div class="col-lg-12">
			<a href="<?php echo base_url(); ?>admin/slider/add" class="btn btn-primary btn-quirk btn-stroke pull-right">Add Slider</a>
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
                        <table class="table table-striped table-bordered table-hover" id="sliderData">
                            <thead>
                            <tr>
                                <th>Slider Image</th>
                                <th>Short Description</th>
                                <th>Long Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <?php foreach ($sliderDetails as $slider) { ?>
                                <tr class="gradeA">
                                    <td>
                                        <?php if($slider['slider_image']!=''){ ?>
                                            <img src="<?php echo site_url().'public/upload/slider/thumb/'.$slider['slider_image'];?>" width="100" align="left"/>
                                        <?php } else { ?>
                                            <img src="<?php echo site_url();?>/public/upload/gallery/thumb/noPreview.png" width="100" align="left"/>
                                        <?php } ?>
                                    </td>
                                    <td><?php echo $slider['slider_short_description']; ?></td>
                                    <td><?php echo $slider['slider_long_description']; ?></td>
                                    <td>
                                        <a title="Edit Gallery"  href="<?php echo base_url(); ?>admin/slider/edit/<?php echo $slider['slider_id']; ?>" style="text-decoration:none;"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a>&nbsp;
                                        
                                        <a title="Delete Gallery"  href="#" onclick="javascript : deleteConfirm('<?php echo base_url(); ?>admin/slider/deleteSlider/<?php echo $slider['slider_id']; ?>')" style="text-decoration:none;"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a></td>
                                </tr>
                                <?php } ?>

                            <tfoot>
                            <tr>
                                <th>Slider Image</th>
                                <th>Short Description</th>
                                <th>Long Description</th>
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
