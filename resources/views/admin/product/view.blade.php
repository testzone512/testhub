<!DOCTYPE html>
<html>
<head>

<script>
$(document).ready(function(){
  $('.bxslider').bxSlider({
	   pagerCustom: '#bx-pager',
	   mode: 'fade',
   });
});
</script>
</head>
<div class="row">
    <!--  page header -->
    <div class="col-sm-12">
        <h1 class="page-header">View Product</h1>
    </div>
    <!-- end  page header -->
</div>

<div class="form-group">
	<div class="row"><!-- row START -->
		<div class="col-sm-12">
			<a href="<?php echo url('admin/product'); ?>" class="btn btn-primary btn-quirk btn-stroke">Back Product List</a>
		</div>
	</div><!-- row END -->
</div>
<div class="panel panel-default">
    <!--<div class="panel-heading">User</div>-->
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">
                <form method="post" name="frmSelectProduct" enctype="multipart/form-data" id="frmProduct" action="{{ url('/admin/product/add_select_type_product/') }}">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="mainCat"><b>Product Name</b></label>
                        </div>
                        <div class="col-sm-1"><b>-</b></div>
                        <div class="col-sm-4">
                        	<?php echo $productDetails[0]['product_name']; ?>
                        </div>
                     </div>
				 </div>
                 
                 <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="mainCat"><b>Product Category Name</b></label>
                        </div>
                        <div class="col-sm-1"><b>-</b></div>
                        <div class="col-sm-4">
                        	<?php echo $productDetails[0]['category_name']; ?>
                        </div>
                     </div>
				 </div>
                 
                  <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="mainCat"><b>Product Type</b></label>
                        </div>
                        <div class="col-sm-1"><b>-</b></div>
                        <div class="col-sm-4">
                        	<?php echo $productDetails[0]['product_type']; ?>
                        </div>
                     </div>
				 </div>
                 
                 <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="mainCat"><b>Product Qty</b></label>
                        </div>
                        <div class="col-sm-1"><b>-</b></div> 
                        <div class="col-sm-4">
                        	<?php echo $productDetails[0]['product_qty']; ?>
                        </div>
                     </div>
				 </div>
                 
                  <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="mainCat"><b>Product Price</b></label>
                        </div>
                        <div class="col-sm-1"><b>-</b></div> 
                        <div class="col-sm-4">
                        	<?php echo $productDetails[0]['product_price']; ?>
                        </div>
                     </div>
				 </div>
                 
                  <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="mainCat"><b>Product Status</b></label>
                        </div>
                        <div class="col-sm-1"><b>-</b></div> 
                        <div class="col-sm-4">
                        	<?php if($productDetails[0]['product_status']==1){ echo "Active"; } else { echo "Deactive"; } ?>
                        </div>
                     </div>
				 </div>
                 
                  <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="mainCat"><b>Product Create</b></label>
                        </div>
                        <div class="col-sm-1"><b>-</b></div> 
                        <div class="col-sm-4">
                        	<?php echo $productDetails[0]['product_created_on']; ?>
                        </div>
                     </div>
				 </div>
                 
                 
               <?php
			     if($productDetails[0]['product_updated_on'] != "0000-00-00 00:00:00") 
				 {?>
                  <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="mainCat"><b>Product Last Update</b></label>
                        </div>
                        <div class="col-sm-1"><b>-</b></div> 
                        <div class="col-sm-4">
                        	<?php  echo $productDetails[0]['product_updated_on'];  ?>
                        </div>
                     </div>
				 </div>
				<?php } ?>
                
              <!-- start bxslider -->              
                 <div class="form-group">            
                    <div class="row">
                        <div class="col-sm-3"><label for="mainCat"><b>Product and Gallery Images</b></label></div>
                        <div class="col-sm-1"><b>-</b></div> 
                        <div class="col-sm-4">
                                <!-- start slider-->
                                <ul class="bxslider">
                                     <?php 
                                       foreach($productDetails as $pval)
                                       {
                                           if($pval['product_image'])
                                           {
                                             ?>
                                               <li style=" left: 0;"><img class="img1" src="<?php echo url('public/upload/product/thumb').'/'.$pval['product_image']; ?>" data-zoom-image="<?php echo url('public/upload/product').'/'.$pval['product_image']; ?>" /></li>
                                             <?php	
                                           }
                                            foreach($galleryDetails as $gval)
                                            {
                                                if($gval['gallery_image'])
                                                {
                                        ?>	
                                                <li style=" left: 0;"><img class="img1" src="<?php echo url('public/upload/gallery/thumb').'/'.$gval['gallery_image']; ?>" data-zoom-image="<?php echo url('public/upload/gallery').'/'.$gval['gallery_image']; ?>" /></li>
                                      <?php
                                                }
                                            }
                                        }
                                       ?>
                                </ul>
                                <!-- end slider -->
                                
                                <!-- start small thumb -->
                                <div id="bx-pager">
                                     <?php 
                                        $count=0;
                                        foreach($productDetails as $pval)
                                        { 
                                            if($pval['product_image'])
                                            {
                                     ?>
                                                 <a data-slide-index="<?php echo $count; ?>" href=""><img width="50px" height="50px" src="<?php echo url('public/upload/product/thumb').'/'.$pval['product_image']; ?>" /></a>
                                      <?php
                                                $count=1;
                                            }
                                            foreach($galleryDetails as $gval)
                                            {
                                              if($gval['gallery_image'])
                                              {
                                      ?>	
                                                <a data-slide-index="<?php echo $count; ?>" href=""><img width="50px" height="50px" src="<?php echo url('public/upload/gallery/thumb').'/'.$gval['gallery_image']; ?>" /></a>
                                                <?php $count++;
                                              }
                                            }
                                        }
                                       ?>
                                </div>
                                    <!-- end small thumb -->
                            </div><!-- end col-sm-3 -->
                       </div>
                     </div>     
                   <!-- End bx slider -->  


                <?php 
					if(!empty($productAttributeDetails))
					{
					 ?>
                     <table class="table table-striped table-bordered" id="example" style="background-color:#FFFFFF;">
                        <thead>
                        	<tr>
                            	<th colspan="5"><center><h4>Product Attribute</h4></center></th>
                            <tr>
                            <tr>
                                <th>Sr No.</th>
                                <th>Product Color</th>
                                <th>Product Weight</th>
                                <th>Product Size</th>
                                <th>Product Price</th>
                            </tr>
                        </thead>
                       <?php	
					   	 $i = 1;
						foreach($productAttributeDetails as $val)
						{
						?>
                   			 <?php //echo "<pre>"; print_r($productAttributeDetails); ?>
                    
                             <tr>
                             	<td><?php echo $i; ?></td>
                             	<td><?php echo $val['pd_product_color']; ?></td>
                                <td><?php echo $val['pd_product_weight']; ?></td>
                                <td><?php echo $val['pd_product_size']; ?></td>
                                <td><?php echo $val['pd_product_price']; ?></td>
                             </tr>

               			 <?php
						$i++; }
						?>
                        </table>
                        <?php
					}
					?>
             
               
               
              </form>
                <!-- End Form Elements -->
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(function() {
$(".img1").elevateZoom();
});
</script>

</html>