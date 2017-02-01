<!DOCTYPE html>
<html>
<head>
</head>
<div class="row">
    <!--  page header -->
    <div class="col-sm-12">
        <h1 class="page-header">View Order</h1>
    </div>
    <!-- end  page header -->
</div>

<div class="form-group">
    <div class="row"><!-- row START -->
        <div class="col-sm-12">
            <a href="<?php echo url('admin/order'); ?>" class="btn btn-primary btn-quirk btn-stroke">Back Order List</a>
        </div>
    </div><!-- row END -->
</div>
<div class="panel panel-default">
    <!--<div class="panel-heading">User</div>-->
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <div class="row">
                        <!--div class="col-sm-3">
                            <label for="mainCat"><b>User Name</b></label>
                        </div-->
                        <div class="col-sm-1">&nbsp;</div>
                        <div class="col-sm-11">
                            <?php echo ucfirst($viewOrder[0]['name']); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">

                <div class="form-group">
                    <div class="row">
                        <!--div class="col-sm-3">
                            <label for="mainCat"><b>Address</b></label>
                        </div-->
                        <div class="col-sm-1">&nbsp;</div>
                        <div class="col-sm-11">
                            <?php echo $viewOrder[0]['address1']; ?>
                        </div>
                    </div>
                </div>


                <?php
                $id = explode(',',$viewOrder[0]['sc_product_id']);
                $newDate = date("Y-m-d H", strtotime($viewOrder[0]['sc_created_on']));
                //  echo "<pre>"; print_r(shipping_cost_order($id,$newDate));
                ?>
                        <!-- End Form Elements -->
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table">
                    <thead>
                    <tr style="background-color:#EDEDED; border: none; ">
                        <th>Item Description</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach(Helpers::shipping_cost_order($id,$newDate) as $shop)
                    {
                    ?>
                    <tr>
                        <td style="width: 30%;">
                            <div class="row">
                                <div class="col-sm-6">
                                    <img src="<?php echo url('public/upload/product').'/'.$shop['cart_product_img']; ?>" class="img-responsive" alt="">
                                </div>

                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-12"><h5><?php echo ucfirst($shop['cart_product_name']); ?></h5></div>
                                    </div>
                                    <?php if($shop['cart_product_colour']){ ?>
                                    <div class="row">
                                        <div class="col-sm-12">Colour:&nbsp;<?php echo ucfirst(Helpers::get_colour($shop['cart_product_colour'])); ?></div>
                                    </div>
                                    <?php } ?>
                                    <?php if(!empty($shop['cart_product_size'])){ ?>
                                    <div class="row">
                                        <div class="col-sm-12">Size:&nbsp;<?php  echo ucwords(Helpers::get_product_size($shop['cart_product_size'])); ?> </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </td>
                        <td><?php echo $shop['cart_product_qty']; ?></td>
                        <td><?php echo $shop['cart_product_price']; ?></td>
                        <td><?php echo $shop['cart_product_total']; ?></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th colspan="4">
                            <div class="row">
                                <div class="col-sm-3">&nbsp;</div>
                                <div class="col-sm-3">&nbsp;</div>
                                <div class="col-sm-4">&nbsp;</div>
                                <div class="col-sm-2">
                                    <div class="row">
                                        <div class="col-sm-12">SubTotal: <?php echo $viewOrder[0]['sc_sub_total']; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">Shipping: <?php echo $viewOrder[0]['sc_shipping_charge']; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">Total:<?php echo $viewOrder[0]['sc_total'];?></div>
                                    </div>
                                </div>
                            </div>
                        </th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</html>