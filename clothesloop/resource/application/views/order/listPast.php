<?php $this->load->view('header'); ?>

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
            echo form_open('order',$attributes);
        ?>
        
		<div class="form-group row">
			<div class=" form-group register-form">
				<h3 class="register-form-head poppinssemibold">List Past Orders</h3>
				<div class="register-line"></div>
			</div>
		</div>
        <div class="row">
        	<div class="col-sm-4">
            	<div class="form-group row">
                        <div class="col-sm-12 first-details">
                            <div class="orders">
                                <a href="" class="poppinssemibold" style="font-size:18px;color:#454545;">&emsp;ORDERS</a><br/>
                                <a href="<?php echo site_url('order/'); ?>" class="poppinssemibold"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Pending Orders</a><br/>
                                <a href="<?php echo site_url('order/pastOrder'); ?>" class="poppinssemibold active"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&emsp;Past Orders</a>
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
			<div class="col-sm-8 first-details">
				<div class="row">
					<div class="col-sm-12 register-textbox">
                        <?php if($pastOrderDetails) { ?>
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
                                <?php foreach($pastOrderDetails as $pastOrder) { ?>
                                <tr>
                                    <td>
                                        <?php if($pastOrder['cart_product_name'] != '') { ?>
                                        <img src="<?php echo base_url();?>public/upload/product/thumb/<?php echo $pastOrder['cart_product_img']; ?>" style="height: 100px; width: 100px;" class="img-responsive">
                                        <?php } else { ?>
                                            <img src="<?php echo base_url();?>public/upload/product/thumb/noPreview.png">
                                        <?php } ?>
                                    </td>
                                    <td><?php echo $pastOrder['user_firstname']; ?>&nbsp;<?php echo $pastOrder['user_lastname']; ?></td>
                                    <td><?php echo $pastOrder['cart_product_name']; ?></td>
                                    <td><?php echo $pastOrder['cart_order_status']; ?></td>
                                    <td><a href="<?php echo site_url('order/pastView/'.$pastOrder['cart_id']); ?>"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a></td>
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
                            <h1>No Past Order Found</h1>
                        <?php } ?>
					</div>
                    
                    
				</div>
			</div>
		</div>
		
        <?php echo form_close(); ?>
	</div>
</div>

<?php $this->load->view('footer'); ?>