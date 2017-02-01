@include('layout.header')

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

        <form method="post" name="frmPendingOrder" enctype="multipart/form-data" id="frmPendingOrder" action="{{ url('order/pastOrder') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group row">
            <div class=" form-group register-form">
                <h3 class="register-form-head poppinssemibold">List Pending Orders</h3>
                <div class="register-line"></div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-4">
                <div class="form-group row">
                    <div class="col-sm-12 first-details">
                        <div class="orders">
                            <a href="" class="poppinssemibold" style="font-size:18px;color:#454545;">&emsp;ORDERS</a><br/>
                            <a href="<?php echo url('order/pending_order_list'); ?>" class="poppinssemibold active"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Pending Orders</a><br/>
                            <a href="<?php echo url('order/past_order_list'); ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Past Orders</a>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12 first-details">
                        <div class="orders">
                            <?php $user = Auth::user();
                            $id = $user['id']; ?>
                            <a href="<?php echo url('register/edit').'/'.$id; ?>" class="poppinssemibold" style="font-size:18px;color:#454545;">&emsp;SETTINGS</a><br/>
                            <a href="<?php echo url('register/edit').'/'.$id;?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Personal Information</a><br/>
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
                        <?php if($orderDetails) { ?>
                        <table class="table table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th>Product Image</th>
                                <th>User Name</th>
                                <th>Product Name</th>
                                <th>Order Status</th>
                                <th>View</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php foreach($orderDetails as $pendingOrder) { ?>
                            <tr>
                                <td>
                                    <?php if($pendingOrder['cart_product_name'] != '') { ?>
                                    <img src="<?php echo url('public/upload/product/').'/'.$pendingOrder['cart_product_img']; ?>" style="height: 100px; width: 100px;" class="img-responsive">
                                    <?php } else { ?>
                                    <img src="<?php echo url('public/upload/product/thumb/noPreview.png');?>">
                                    <?php } ?>
                                </td>
                                <td><?php $data = explode(' ',$pendingOrder['name']) ; echo $data[0]; ?>&nbsp;<?php $data = explode(' ',$pendingOrder['name']) ; echo $data[1]; ?></td>
                                <td><?php echo $pendingOrder['cart_product_name']; ?></td>
                                <td><?php echo $pendingOrder['cart_order_status']; ?></td>
                                <td><a href="<?php echo url('order/pending_order_view').'/'.$pendingOrder['cart_id']; ?>"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a></td>
                            </tr>
                            <?php } ?>
                            </tbody>

                            <tfoot>
                            <tr>
                                <th>Product Image</th>
                                <th>User Name</th>
                                <th>Product Name</th>
                                <th>Order Status</th>
                                <th>View</th>
                            </tr>
                            </tfoot>
                        </table>
                        <?php } else { ?>
                        <h1>No Pending Order Found</h1>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

     </form>
    </div>
</div>

@include('layout.footer')