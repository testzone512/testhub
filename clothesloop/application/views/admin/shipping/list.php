<script type="text/javascript">
    $(document).ready(function () {
        $('#shippingData').DataTable({
            'sPaginationType': 'full_numbers',
            "bStateSave": true
        });
    });
</script>

<script type="text/javascript">

    function deleteConfirm(url)
    {
        if (confirm('Do you wish to Delete?'))
        {
            window.location.href = url;
        }
    }
</script>
<style type="text/css">
    tr:nth-child(even) {background: #D8DCE3}
    -tr:nth-child(odd) {background: #DCDCDC;}
</style>

<div class="form-group">
    <div class="row"><!-- row START -->
        <div class="col-lg-12">
            <div class="panel-heading">
                <div class="panel-body">
                    <h1>List Shipping</h1>
                </div>
            </div>
        </div>
    </div><!-- row END -->
</div>

<div class="form-group">
    <div class="row"><!-- row START -->
        <div class="col-lg-12">
            <a href="<?php echo site_url('admin/shipping/add/'); ?>" class="btn btn-primary btn-quirk btn-stroke pull-right">Add Shipping</a>
        </div>
    </div><!-- row END -->
</div>

<div class="form-group">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-bordered" id="shippingData">
                        <thead>
                            <tr>
                                <th>Shipping From</th>
                                <th>Shipping To</th>
                                <th>Amount</th>
                                <th>Created ON</th>
                                <th>Updated ON</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($shippingDetails as $shipping) { ?>
                                <tr>
                                    <td><?php echo $shipping['shipping_from']; ?></td>
                                    <td><?php echo $shipping['shipping_to']; ?></td>
                                    <td><?php echo $shipping['shipping_amount']; ?></td>
                                    <td><?php echo $shipping['shipping_created_on']; ?></td>
                                    <td><?php echo $shipping['shipping_updated_on']; ?></td>
                                    <td>
                                        <a href="<?php echo site_url('admin/shipping/edit/' . $shipping["shipping_id"]); ?>"><i class="fa fa-pencil fa-2x" aria-hidden="true" title="Edit Shipping"></i></a>&emsp;
                                        <a href="#" onclick="javascript : deleteConfirm('<?php echo site_url("admin/shipping/deleteShipping/" . $shipping['shipping_id']); ?>')"><i class="fa fa-trash fa-2x" aria-hidden="true" title="Delete Shipping"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>

                        <tfoot>
                            <tr>
                                <th>Shipping From</th>
                                <th>Shipping To</th>
                                <th>Amount</th>
                                <th>Created ON</th>
                                <th>Updated ON</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




