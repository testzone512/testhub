<script type="text/javascript">
    $(document).ready(function () {
        $('#orderData').DataTable({
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
                    <h1>List Order</h1>
                </div>
            </div>
        </div>
    </div><!-- row END -->
</div>

<div class="form-group">

</div>

<div class="form-group">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-bordered" id="orderData">
                        <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Product Name</th>
                            <th>Sub Total</th>
                            <th>Shipping Charge</th>
                            <th>Order Status</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($orderDetails as $order) { ?>
                        <tr>
                            <td><?php echo $order['name']; ?> &nbsp;</td>
                            <td>{{ Helpers::get_product_name($order['sc_product_id']) }}</td>
                            <td><?php echo $order['sc_sub_total']; ?></td>
                            <td><?php echo $order['sc_shipping_charge']; ?></td>
                            <td><?php echo $order['cart_order_status']; ?></td>
                            <td><?php echo $order['sc_total']; ?></td>
                            <td>
                                <a href="<?php echo url('/admin/order/view/').'/'.$order["sc_id"]; ?>"><i class="fa fa-eye fa-2x" aria-hidden="true" title="View Order"></i></a>&emsp;
                                <?php if(Session::get('sess_user_profile_pic') == '1') { ?>
                                <a href="#" onclick="javascript : deleteConfirm('<?php echo url("/admin/order/delete/").'/'.$order['cart_id']; ?>')"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>

                        <tfoot>
                        <tr>
                            <th>User Name</th>
                            <th>Product Name</th>
                            <th>Sub Total</th>
                            <th>Shipping Charge</th>
                            <th>Order Status</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




