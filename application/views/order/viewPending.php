<?php $this->load->view('header'); ?>
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
				<img src="<?php echo base_url();?>public/front/images/Clothesloop Website-1.jpg" class="img-responsive" alt="">
			</div>
			<div class="col-sm-9 col-xs-9 register-head-content">
				<h1 class="register-content-head poppinssemibold">Curabitur ullamcorper dolor maximus nulla pretium, vitae pretium.</h1>
				<h5 class="register-sub-content poppinsregular">Phasellus quis neque et ante porta ultricies eu quis est. Curabitur ullamcorper dolor maximus nulla pretium, vitae pretium metus porta. Nam laoreet efficitur urna, sed varius nisi..</h5>
			</div>
		</div>
        <?php 
            $attributes = 'id="frmPendingOrder"';
            echo form_open('order/pendingView/'.$viewPastOrder[0]['cart_id'],$attributes);
        ?>
        
		<div class="form-group row">
			<div class=" form-group register-form">
				<h3 class="register-form-head poppinssemibold">View Pending Orders</h3>
				<div class="register-line"></div>
			</div>
		</div>
       
        <div class="row">
        	<div class="col-sm-4">
                <div class="form-group row">
                    <div class="col-sm-12 first-details">
                        <div class="orders">
                            <a href="" class="poppinssemibold" style="font-size:18px;color:#454545;">&emsp;ORDERS</a><br/>
                            <a href="<?php echo site_url('order/'); ?>" class="poppinssemibold active"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Pending Orders</a><br/>
                            <a href="<?php echo site_url('order/pastOrder'); ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Past Orders</a>
                        </div>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-sm-12 first-details">
                        <div class="orders">
                            <a href="<?php echo site_url('register/edit/'.$this->session->userdata('front_user_id')); ?>" class="poppinssemibold" style="font-size:18px;color:#454545;">&emsp;SETTINGS</a><br/>
                            <a href="<?php echo site_url('register/edit/'.$this->session->userdata('front_user_id')); ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Personal Information</a><br/>
                            <a href="<?php echo site_url('register/changePassword/'); ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Change Password</a><br/>
                            <a href="<?php echo site_url('register/updateEmail/'); ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Update Email</a><br/>
                            <a href="<?php echo site_url('register/deactivateAccount/'); ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Deactivate Account</a><br/>
                            
                        </div>
                    </div>
                </div>
            </div>
			<div class="col-sm-8  first-details">
				<div class="row">
					<div class="col-sm-12  register-textbox">
                        <a href="<?php echo site_url('order/'); ?>" class="back poppinssemibold">Back to Order</a>
                        <table class="table table-bordered table-responsive try">
                            <tr>
                                <th>User Name</th>
                                <td><?php echo $viewPastOrder[0]['user_firstname']; ?>&nbsp;<?php echo $viewPastOrder[0]['user_lastname']; ?></td>
                            </tr>
                            <tr>
                                <th>Product Name</th>
                                <td><?php echo $viewPastOrder[0]['cart_product_name']; ?></td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td><?php echo $viewPastOrder[0]['user_address']; ?></td>
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
                                    <?php if($viewPastOrder[0]['cart_product_name'] != '') { ?>
                                        <img src="<?php echo base_url();?>public/upload/product/thumb/<?php echo $viewPastOrder[0]['cart_product_img']; ?>" style="height: 100px; width: 100px;" class="img-responsive">
                                    <?php } else { ?>
                                        <img src="<?php echo base_url();?>public/upload/product/thumb/noPreview.png">
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
		
        <?php echo form_close(); ?>
	</div>
</div>

<?php $this->load->view('footer'); ?>