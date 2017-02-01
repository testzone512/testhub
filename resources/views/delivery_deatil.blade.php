@include('layout.header')

<script>
    $(document).ready(function(){
        $(".show_address").hide();
        $(".rdo_delivery").click(function(){
            var rdo_val = $(this).val();
            //alert(rdo_val);
            if(rdo_val == 'new_address')
            {
                $(".show_address").show();
            }
            else{
                $(".show_address").hide();
            }
        });
    });
</script>
<script>
    $(document).ready(function(){
        $(".btnUpdate").click(function(){
            var txtAddress = $(".txtAddress").val();
            if(txtAddress == "")
            {
                alert('Please Insert address');
            }
            else
            {
                $.ajax({
                    type: "POST",
                    url: "<?php echo url('cart/ajax_delivery_deatil_update_user_address'); ?>",
                    data: {"_token": "{{ csrf_token() }}",txtAddress: txtAddress},
                    dataType: 'text',
                    success: function (data)
                    {
                        if(data == "true")
                        {
                            location.reload();
                        }
                    }
                });
            }
        });
    });
</script>

<style>
    .before_active
    {
        background-color: #6b6b6b !important;
        color: #ffffff;
        border: none;
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
    .show_address button{
        background-color: #000000;
        border: 0 none;
        border-radius: 0;
        color: #ffffff;
        font-weight: bold;
        margin-left: 8%;
        margin-top:  5%;
        padding: 5px 10px;
        width: 12%;
    }
</style>
<div class="container">
    <!-- start header part -->
    <div class="row" style="margin-top: 5%;">
        <div class="col-sm-12">
            <table class="table">
                <thead>
                <tr>
                    <th width="25%" class="before_active"><center><a href="<?php echo url('cart/shopping_cart');?>">Summary</a></center></th>
                    <th width="25%" class="active"><center>Delivery Deatil</center></th>
                    <th width="25%"><center>Payment</center></th>
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
        <div class="col-sm-12" style="border: 1px solid #eeeeee;">
            <div class="row" style="margin:5%;">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12"><input type="radio" checked name="rdo_delivery" class="rdo_delivery" id="exist_address" value="exist_address"> <label for="exist_address">I want to use an existing address</label> </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-1">&nbsp;</div>
                        <div class="col-sm-11"> <p><?php echo $deliveryDetails[0]['address1']; ?></p></div>
                    </div>
                </div>
            </div>

            <div class="row" style="margin:5%;">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12"><input type="radio" name="rdo_delivery" value="new_address" id="new_address" class="rdo_delivery"> <label for="new_address">I want to use new address</label></div>
                    </div>
                    <div class="row show_address">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-1">&nbsp;</div>
                                <div class="col-sm-11"><textarea name="txtAddress"  style=" width: 30%" class="txtAddress form-control"></textarea></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12"><button type="button" name="btnUpdate" id="btnUpdate" class="btnUpdate">Update</button></div>
                            </div>
                        </div>
                    </div>
                </div>
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
                <a href="<?php echo url('cart/payment'); ?>" style="border: 1px solid #080808; padding: 5px 10px;">Checkout <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
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
                        <li><h5><a href="<?php echo url('why-the-clothes-loop'); ?>">Why Clothes Loop?</a></h5></li>
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
