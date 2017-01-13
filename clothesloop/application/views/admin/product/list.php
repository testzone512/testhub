<meta name="viewport" content="width=device-width, initial-scale=1" xmlns="http://www.w3.org/1999/html">
<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable({
            'sPaginationType':'full_numbers' ,
            "bStateSave"	: true
        });
    });
</script>

<!-- start ajax_product_active_inactive -->
<script>
    function ajax_product_active_inactive(Action,ProductId)
    {
        if(Action != "" && ProductId !="")
        {
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('admin/product/ajax_product_active_inactive'); ?>",
                data: {Action: Action, ProductId : ProductId},
                dataType: 'text',
                success: function (data)
                {
                    //alert(data);
                    if(data == 'Active')
                    {
                        alert('Product Inactivated Successfully');
                        location.reload(true);
                    }
                    else if(data == 'Inactive')
                    {
                        alert('Product Activated Successfully');
                        location.reload(true);
                    }
                }
            });


        }

    }
</script>
<!-- start ajax_product_active_inactive -->

<script type="text/javascript">

    function active_confirm(Action,ProductId)
    {
        if(confirm('Do you wish to Active?'))
        {
			ajax_product_active_inactive(Action,ProductId);
        }
    }
</script>

<script type="text/javascript">

    function inactive_confirm(Action,ProductId)
    {
        if(confirm('Do you wish to InActive?'))
        {
			ajax_product_active_inactive(Action,ProductId);
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

<!-- end ajax_active_inactive -->
<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header"> List Product </h1>
    </div>
    <!-- end  page header -->
</div>
<div class="form-group">
	<div class="row"><!-- row START -->
		<div class="col-lg-12">
			<a href="<?php echo site_url('admin/product/add_select_type_product/'); ?>" class="btn btn-primary btn-quirk btn-stroke pull-right">Add Product</a>
		</div>
	</div><!-- row END -->
</div>
<div class="form-group">
    <div class="row">
        <div class="col-sm-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <!--div class="panel-heading"> </div -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Product Category Name</th>
                                    <th>Product Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
							//echo "<pre>";print_r($productDetails);
                            $i = 1;
                            foreach ($productDetails as $product) 
							{
                                if ($product['product_status'] == 0) 
								{
                                    $statuschk = 'Inactive';
                                } elseif ($product['product_status'] == 1) 
								{
                                    $statuschk = 'Active';
                                }
                                ?>
                                <tr >
                                    <td><?php echo $i; ?></td>

                                    <td><?php if($product['product_image']!='')
                                        { ?>
                                            <img src="<?php echo site_url().'public/upload/product/thumb/'.$product['product_image'];?>" width="100" height="100" align="left"/>
                                        <?php
                                        }
                                        else
                                        { ?>
                                            <img src="<?php echo site_url();?>/public/upload/product/thumb/noPreview.png" width="100" align="left"/>
                                        <?php
                                        }?>
                                    </td>

                                    <td><?php echo $product['product_name']; ?></td>
                                    <td><?php echo $product['category_name']; ?></td>
                                    <td><?php echo $product['product_price']; ?></td>
                                    <td><?php echo $statuschk; ?></td>
                                    <td>
                                        <a title="View Product" href="<?php echo base_url(); ?>admin/product/view/<?php echo $product['product_id']; ?>"><i class="fa fa-eye fa-2x" aria-hidden="true"></i></a>
                                        <a title="Edit Product"  href="<?php echo base_url(); ?>admin/product/edit/<?php echo $product['product_id']; ?>"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a>&nbsp;
                                        <a title="Gallery Product"  href="<?php echo base_url(); ?>admin/gallery/list_gallery/<?php echo $product['product_id']; ?>"><i class="fa fa-camera fa-2x" aria-hidden="true"></i></a>&nbsp;
                                        <a title="Delete Product"  href="#" onclick="javascript : deleteConfirm('<?php echo base_url(); ?>admin/product/delete_product/<?php echo $product['product_id']; ?>')" style="text-decoration:none;"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>&nbsp;
                                        <?php
                                        if ($statuschk == 'Inactive')
                                        {
                                            ?>
                                            <a title="Deactive Product" href="javascript:void(0)" onclick="javascript : active_confirm('<?php echo $statuschk; ?>',<?php echo $product['product_id']; ?>)" class="ActiveInactive" style="text-decoration:none; color:#FF0000">
<i class="fa fa-circle fa-2x" aria-hidden="true"></i></a>
                                            <!--<a href="<?php //echo base_url(); ?>admin/user/inactiveuser/<?php //echo $user['ID']; ?>" style="text-decoration:none; color:#FF0000"> <img src="<?php //echo base_url(); ?>assets/admin/img/inactive.png"/> </a>-->
                                            <?php
                                        }
                                        else
                                        { ?>
                                            <a title="Active Product" href="javascript:void(0)" onclick="javascript : inactive_confirm('<?php echo $statuschk; ?>',<?php echo $product['product_id']; ?>)"  class="ActiveInactive" style="text-decoration:none; color:#4cae4c">
<i class="fa fa-circle fa-2x" aria-hidden="true"></i></a>
                                            <!--<a href="<?php //echo base_url(); ?>admin/user/inactiveuser/<?php //echo $user['ID']; ?>" style="text-decoration:none; color:#FF0000"> <img src="<?php //echo base_url(); ?>assets/admin/img/inactive.png"/> </a>-->
                                            <?php
                                        }
                                        ?>
									</td>

                                </tr>
                                <?php $i++; } ?>

                            <tfoot>
                            <tr>
                                <th>Sr No.</th>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Product Category Name</th>
                                <th>Product Price</th>
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
<a href="javascript:void(0)" data-target="#UserActiveInactiveModel" id="btnActiveInactiveUser" data-toggle="modal"> </a>

<!---start UserActiveInactive-->
<div id="UserActiveInactiveModel" class="modal fade" role="dialog">
    <?php echo form_open('admin/user/addcategory'); ?>
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <center><h4 class="modal-title">Active Inactive Form</h4></center>
            </div>
            <div class="modal-body">
                <div class="msg"></div>
                <div class="row">
                    <input type="hidden" name="hdnAction" id="hdnAction"/>
                    <input type="hidden" name="hdnId" id="hdnId"/>
                    <div class="col-lg-2">&nbsp;</div>
                    <div class="col-lg-1">Reason</div>
                    <div class="col-lg-1">&nbsp;</div>
                    <div class="col-lg-4"><textarea cols="18" rows="4" name="txtReason" id="txtReason"></textarea></div>
                    <div class="col-lg-4">&nbsp;</div>
                </div>
                <br/><br>
                <div class="row">
                    <div class="col-lg-12">
                        <center><button type="button" id="btnSave" class="btn btn-primary" name="btnSave" onclick="ajax_user_active_inactive()">Save</button></center>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- Modal content-->
    </div>
    <?php echo form_close(); ?>
</div>
<!---end UserActiveInactive-->