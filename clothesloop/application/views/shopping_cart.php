<?php $this->load->view('header'); ?>
<script>
  $(document).ready(function(){
      $(".sltqty").change(function(){
          var cart_id = $(this).attr('id');
          var qty = $(this).val();
          var price = $(this).attr('data_price');
         // alert(cart_id+ '' +qty);
          $.ajax({
              type: "POST",
              url: "<?php echo site_url('cart/ajax_temp_update_qty_cart'); ?>",
              data: {cart_id: cart_id,qty:qty,price:price},
              dataType: 'text',
              success: function (data)
              {
                  if(data == "true")
                  {
                      location.reload();
                  }
              }
          });
      });
  });
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
<style>
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
                    <th width="25%" class="active"><center>Summary</center></th>
                    <th width="25%"><center>Delivery Deatil</center></th>
                    <th width="25%"><center>Payment</center></th>
                    <th width="25%"><center>Confirm Order</center></th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- end header part -->
<?php if(product_count($this->session->userdata('front_user_id'))!=0)
{?>
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
                    foreach($shoppingDetails as $shop)
                    {
                    ?>
                        <tr>
                            <td style="width: 30%;">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <img src="<?php echo base_url(); ?>public/upload/product/thumb/<?php echo $shop['tc_product_img']; ?>" class="img-responsive" alt="">
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-12"><h5><?php echo ucfirst($shop['tc_product_name']); ?></h5></div>
                                        </div>
                                        <?php if($shop['tc_product_colour']){ ?>
                                        <div class="row">
                                            <div class="col-sm-12">Colour:&nbsp;<?php echo ucfirst(get_colour($shop['tc_product_colour'])); ?></div>
                                        </div>
                                        <?php } ?>
                                        <?php if(!empty($shop['tc_product_size'])){ ?>
                                        <div class="row">
                                            <div class="col-sm-12">Size:&nbsp;<?php  echo ucwords(get_product_size($shop['tc_product_size'])); ?> </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <select name="sltqty" class="sltqty" data_price="<?php echo $shop['tc_product_price']; ?> " id="<?php echo $shop['tc_id'];?>">
                                    <?php
                                    for ($i = 1; $i<= get_qty($shop['tc_product_id']); $i++)
                                    {
                                        ?>
                                        <option value="<?php echo $i; ?>" <?php if($i==$shop['tc_product_qty']){ echo "selected"; } ?>><?php echo $i; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <a href="#" onclick="javascript : deleteConfirm('<?php echo base_url("cart/delete_shop_product/".$shop['tc_id']); ?>')"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
                            </td>
                            <td><?php echo $shop['tc_product_price']; ?></td>
                            <td><?php echo $shop['tc_product_total']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">
                            <div class="row">
                                <div class="col-xs-12">
                                	<div style="float:right;">
                                            <div class="row">
                                                <div class="col-sm-12">SubTotal:<?php echo sub_total($this->session->userdata('front_user_id')); ?></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">Shipping: <?php echo shipping_calculate(sub_total($this->session->userdata('front_user_id'))); ?></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">Total:<?php echo sub_total($this->session->userdata('front_user_id'))+shipping_calculate(sub_total($this->session->userdata('front_user_id'))); ?></div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </th>
                    </tr>
                    </tfoot>
            </table>
        </div>

    </div>
    <!-- start footer -->
    <div class="row" style="border: 1px solid #eeeeee; margin-top: 1%; padding: 2%;">
        <div class="col-xs-12">
        	<div style="float:left;">
        		<a href="<?php echo base_url();?>shop" style="border: 1px solid #080808; padding: 5px 10px;"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Continue Shopping </a>
            </div>
            <div style="float:right;">
                    <?php if($this->session->userdata('front_logged_user_in')==1)
                    {
                        ?>
                        <a href="<?php echo base_url(); ?>cart/delivery_deatil" style="border: 1px solid #080808; padding: 5px 10px;">Checkout <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                        <?php
                    }
                    else
                    {
                        ?>
                        <a href="<?php echo base_url(); ?>login" style="border: 1px solid #080808; padding: 5px 10px;">Checkout <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
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
                    <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url();?>public/front/images/logo.png" class="img-responsive" alt="LOGO"></a>
                    <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis molestie ex arcu, sit amet sodales quam fermentum vel. Morbi ullamcorper magna sed ex pulvinar,</h5>
                </div>
                <div class="col-sm-3 col-xs-6 info-content">
                    <h4>INFORMATION</h4>
                    <ul>
                        <li><h5><a href="<?php echo site_url(); ?>">About Us</a></h5></li>
                        <li><h5><a href="<?php echo site_url('clothloop'); ?>">Why Clothes Loop?</a></h5></li>
                        <li><h5><a href="<?php echo site_url('blog'); ?>">Blog</a></h5></li>
                        <li><h5><a href="<?php echo site_url('register'); ?>">Sign Up / Register your garment</a></h5></li>
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
