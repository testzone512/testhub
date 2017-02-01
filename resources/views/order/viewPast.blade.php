@include('layout.header')

<style type="text/css">
    .back
    {
        background: #000 none repeat scroll 0 0;
        color: #fff;
        font-size: 15px;
        padding: 10px 26px;
    }
    .back.poppinssemibold { color: #FFF;}
    .try { margin-top: 15px;}
</style>
<div class="container">
    <div class="reg-main-cont">
        <div class="row register-head">
            <div class="col-sm-3 col-xs-3 register-main-head">
                <img src="<?php echo url('public/front/images/Clothesloop Website-1.jpg');?>" class="img-responsive" alt="">
            </div>
            <div class="col-sm-9 col-xs-9 register-head-content">
                <h1 class="register-content-head poppinssemibold">Curabitur ullamcorper dolor maximus nulla pretium, vitae pretium.</h1>
                <h5 class="register-sub-content poppinsregular">Phasellus quis neque et ante porta ultricies eu quis est. Curabitur ullamcorper dolor maximus nulla pretium, vitae pretium metus porta. Nam laoreet efficitur urna, sed varius nisi..</h5>
            </div>
        </div>

        <form method="post" name="frmPastOrder" id="frmPastOrder" action="" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group row">
            <div class=" form-group register-form">
                <h3 class="register-form-head poppinssemibold">View Past Orders</h3>
                <div class="register-line"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group row">
                    <div class="col-sm-12 first-details">
                        <div class="orders">
                            <a href="" class="poppinssemibold" style="font-size:18px;color:#454545;">&emsp;ORDERS</a><br/>
                            <a href="<?php echo url('order/pending_order_list'); ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Pending Orders</a><br/>
                            <a href="<?php echo url('order/past_order_list'); ?>" class="poppinssemibold active"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Past Orders</a>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12 first-details">
                        <div class="orders">
                            <?php $user = Auth::user();
                            $id = $user['id']; ?>
                            <a href="<?php echo url('register/edit').'/'.$id; ?>" class="poppinssemibold" style="font-size:18px;color:#454545;">&emsp;SETTINGS</a><br/>
                            <a href="<?php echo url('register/edit').'/'.$id; ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Personal Information</a><br/>
                            <a href="<?php echo url('register/changePassword'); ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Change Password</a><br/>
                            <a href="<?php echo url('register/updateEmail'); ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Update Email</a><br/>
                            <a href="<?php echo url('register/deactivateAccount'); ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Deactivate Account</a><br/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 first-details">
                <div class="row">
                    <div class="col-sm-12 register-textbox">
                        <a href="<?php echo url('order/past_order_list'); ?>" class="back poppinssemibold">Back to Order</a>
                        <table class="table table-bordered table-responsive try">
                            <tr>
                                <th>User Name</th>
                                <td>&nbsp; <?php echo $viewPastOrder[0]['name'];?></td>
                            </tr>
                            <tr>
                                <th>Product Name</th>
                                <td><?php echo $viewPastOrder[0]['cart_product_name']; ?></td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td><?php echo $viewPastOrder[0]['address1']; ?></td>
                            </tr>
                            <tr>
                                <th>Product Price</th>
                                <td><?php echo $viewPastOrder[0]['cart_product_price']; ?></td>
                            </tr>
                            <tr>
                                <th>Product Quantity</th>
                                <td><?php echo $viewPastOrder[0]['cart_product_qty']; ?></td>
                            </tr>
                            <tr>
                                <th>Product Image</th>
                                <td>
                                    <?php if($viewPastOrder[0]['cart_product_img'] != '') { ?>
                                    <img src="<?php echo url('public/upload/product/thumb').'/'.$viewPastOrder[0]['cart_product_img']; ?>" style="height: 100px; width: 100px;" class="img-responsive">
                                    <?php } else { ?>
                                    <img src="<?php echo url('public/upload/product/thumb/noPreview.png');?>">
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Product Colour</th>
                                <td><?php echo $viewPastOrder[0]['colour_name']; ?></td>
                            </tr>
                            <tr>
                                <th>Product Size</th>
                                <td><?php echo $viewPastOrder[0]['size_name']; ?></td>
                            </tr>
                            <tr>
                                <th>Product Total</th>
                                <td><?php echo $viewPastOrder[0]['cart_product_total']; ?></td>
                            </tr>
                            <tr>
                                <th>Order Status</th>
                                <td><?php echo $viewPastOrder[0]['cart_order_status']; ?></td>
                            </tr>
                            <tr>
                                <th>Created On</th>
                                <td><?php echo $viewPastOrder[0]['cart_created_on']; ?></td>
                            </tr>
                        </table>
                    </div>


                </div>
            </div>
        </div>
      </form>
    </div>
</div>

@include('layout.footer')