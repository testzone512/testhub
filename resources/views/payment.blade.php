@include('layout.header')
<script>
    $(document).ready(function(){
        $('.final_checkout').click(function(){
            $.ajax({
                type: "POST",
                url: "<?php echo url('cart/ajax_confirm_order'); ?>",
                data: {"_token": "{{ csrf_token() }}"},
                dataType: 'text',
                success: function (data)
                {
                    if(data == "true")
                    {
                        $('#frmPayPal').submit();
                    }
                    else
                    {
                        alert("Payment Failed..");
                    }
                }
            });
        });
    });
</script>

<style>
    .before_active
    {
        background-color: #6b6b6b !important;
        color: #ffffff;
        border-top: none;
        border-bottom: none;
        border-left: none;
    }
    .before_active a{
        color: #ffffff;
    }
    .active
    {
        background-color: black !important;
        color: #ffffff;
        border: none;
    }
</style>
<div class="container">
    <!-- start header part -->
    <div class="row" style="margin-top: 5%;">
        <div class="col-sm-12">
            <table class="table" style="border-top:1px solid black; ">
                <thead>
                <tr>
                    <th width="25%" class="before_active"><center><a href="<?php echo url('cart/shopping_cart');?>">Summary</a></center></th>
                    <th width="25%" class="before_active"><center><a href="<?php echo url('cart/delivery_deatil');?>">Delivery Deatil</a></center></th>
                    <th width="25%"  class="active"><center>Payment</center></th>
                    <th width="25%"><center>Confirm Order</center></th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- end header part -->
    <?php $user = Auth::user(); if(Helpers::product_count($user['id'])!=0)
    {?>
    <div class="row">
        <div class="col-xs-9">
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
                foreach($shoppingDetails as $shop)
                {
                ?>
                <tr>
                    <td style="width: 30%;">
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="<?php echo url('public/upload/product/').'/'.$shop['tc_product_img']; ?>" class="img-responsive" alt="">
                            </div>

                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-12"><h5><?php echo ucfirst($shop['tc_product_name']); ?></h5></div>
                                </div>
                                <?php if($shop['tc_product_colour']){ ?>
                                <div class="row">
                                    <div class="col-sm-12">Colour:&nbsp;<?php echo ucfirst(Helpers::get_colour($shop['tc_product_colour'])); ?></div>
                                </div>
                                <?php } ?>
                                <?php if(!empty($shop['tc_product_size'])){ ?>
                                <div class="row">
                                    <div class="col-sm-12">Size:&nbsp;<?php  echo ucwords(Helpers::get_product_size($shop['tc_product_size'])); ?> </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </td>
                    <td><?php echo $shop['tc_product_qty']; ?></td>
                    <td><?php echo $shop['tc_product_price']; ?></td>
                    <td><?php echo $shop['tc_product_total']; ?></td>
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
                                    <div class="col-sm-12">SubTotal:<?php echo Helpers::sub_total($user['id']); ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">Shipping: <?php echo Helpers::shipping_calculate(Helpers::sub_total($user['id'])); ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">Total:<?php echo Helpers::sub_total($user['id'])+Helpers::shipping_calculate(Helpers::sub_total($user['id'])); ?></div>
                                </div>
                            </div>
                        </div>
                    </th>
                </tr>
                </tfoot>
            </table>
        </div>
        <div class="col-xs-3" style="border: 2px solid #CCCCCC;">
            <div class="row">
                <div class="col-sm-12"> <center><h5>Delivery Address</h5></center> <hr>   </div>
            </div>
            <div class="row">
                <div class="col-sm-12"><p><?php echo $deliveryDetails[0]['address1']; ?></p></div>
            </div>
        </div>
    </div>
    <!-- start footer -->
    <div class="row" style="border: 1px solid #eeeeee; margin-top: 1%; padding: 2%;">
        <div class="col-xs-12">
            <div style="float:left;">
                <a href="<?php echo url('shop');?>" style="border: 1px solid #080808; padding: 5px 10px;"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Continue Shopping </a>
            </div>
            <div style="float:right;">
                <?php if($user['id'])
                {
                ?>
                <?php
                $paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr'; // Test Paypal API URL
                $paypal_id='testzone512-facilitator@gmail.com'; // Business email ID
                ?>
                <form action="<?php echo $paypal_url; ?>" method="post" name="frmPayPal" id="frmPayPal">

                    <!-- Identify your business so that you can collect the payments. -->
                    <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">

                    <!-- Specify a PayPal Shopping Cart Add to Cart button. -->

                    <input type="hidden" name="cmd" value="_cart">
                    <input type="hidden" name="upload" value="1">


                    <!-- Specify details about the item that buyers will purchase. -->
                    <?php
                    $i=1;
                    foreach($shoppingDetails as $shop)
                    {
                    ?>
                    <input type="hidden" name="item_name_<?php echo $i; ?>" value="<?php echo $shop['tc_product_name']; ?>">
                    <input type="hidden" name="amount_<?php echo $i; ?>" value="<?php echo $shop['tc_product_price']; ?>">
                    <input type="hidden" name="quantity_<?php echo $i; ?>" value="<?php echo $shop['tc_product_qty']; ?>">

                    <?php $i++; } ?>
                    <input type="hidden" name="shipping_1" value=" <?php echo Helpers::shipping_calculate(Helpers::sub_total($user['id'])); ?>">
                    <input type="hidden" name="currency_code" value="USD">


                    <!-- Display header page logo. -->
                    <input type="hidden" name="cpp_header_image" value="http://list.radhecreation.com/clothesloop/public/front/images/logo.png">
                    <!-- payment success or cancel then after show page. -->
                    <input type="hidden" name="cancel_return" value="<?php echo url('cart/cancel_payment');?>">
                    <input type="hidden" name="return" value="<?php echo url('cart/success_payment');?>">
                    <input type='hidden' name='rm' value='2'>
                    <!-- Display the payment button. -->
                    <!--input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"-->
                    <!--img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1"-->
                </form>
                <a href="javascript:void(0);" class="final_checkout" style="border: 1px solid #080808; padding: 5px 10px;">Checkout <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                <?php
                }
                else
                {
                ?>
                <a href="<?php echo url('login'); ?>" style="border: 1px solid #080808; padding: 5px 10px;">Checkout <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                <?php

                }  ?>
            </div>
        </div>
    </div>
    <!-- end footer -->
    <?php
    }
    else
    {
    ?>
    <div class="row" style="background-color: #666666; color: #ffffff;">
        <div class="col-sm-12"><center><h4>Your Shopping Cart Is Empty.</h4></center></div>
    </div>
    <?php
    }
    ?>

</div>

<div class="container" style="margin-top: 15%;">
    <footer>
        <div class="footer-content">
            <div class="row poppinsregular">
                <div class="col-sm-3 col-xs-6 footer-logo-content">
                    <a href="<?php echo url('/'); ?>"><img src="<?php echo url('public/front/images/logo.png');?>" class="img-responsive" alt="LOGO"></a>
                    <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis molestie ex arcu, sit amet sodales quam fermentum vel. Morbi ullamcorper magna sed ex pulvinar,</h5>
                </div>
                <div class="col-sm-3 col-xs-6 info-content">
                    <h4>INFORMATION</h4>
                    <ul>
                        <li><h5><a href="<?php echo url('/'); ?>">About Us</a></h5></li>
                        <li><h5><a href="<?php echo url('clothloop'); ?>">Why Clothes Loop?</a></h5></li>
                        <li><h5><a href="<?php echo url('blog'); ?>">Blog</a></h5></li>
                        <li><h5><a href="<?php echo url('register'); ?>">Sign Up / Register your garment</a></h5></li>
                    </ul>
                </div>
                <div class="col-sm-3 col-xs-6 social-content">
                    <h4 class="social-title" >SOCIAL</h4>
                    <ul>
                        <li><h5><i class="fa fa-instagram instagram-icon" aria-hidden="true"></i>&nbsp;&nbsp;Instagram</h5></li>
                        <li><h5><i class="fa fa-facebook-square facebook-icon" aria-hidden="true"></i>&nbsp;&nbsp;Facebook</h5></li>
                    </ul>
                </div>
                <div class="col-sm-3 col-xs-6 contact-content">
                    <h4 class="social-title" >CONTACT US</h4>
                    <h4 class="site-s-p">Got a question about our services & products?</h4>
                    <h5 class="site-email">Email us at: <span>info@theclothesloop.com</span></h5>
                    <h5>For Press & Media please contact: <span>rose@theclothesloop.com</span></h5>
                </div>
            </div>
        </div>
    </footer>
</div>
