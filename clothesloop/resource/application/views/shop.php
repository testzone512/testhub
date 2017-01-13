<?php $this->load->view('header'); ?>
	<style>
		.pagination a
		{
			padding: 5px 10px;
			border: 1px solid #b2b2b2;
		}
		.pagination .active
		{
			background-color: black;
			color: #ffffff;
			border: none;
		}
	</style>
<style>
	.product img:hover
	{
		-border: 1px solid #F04791;
		 box-shadow: 0px 0px 10px #333333;
		-padding: 5px;
	}
</style>
	<script>
		$(document).ready(function(){
			$(".pagination a").click(function(){
				//alert("dfd");
				var id = $(this).attr('id');
				$(".pagination a").removeClass('active');
				$('#'+id).addClass('active');
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#myul li a').click(function() {
				// fetch the class of the clicked item
				var ourClass = $(this).attr('class');

				// reset the active class on all the buttons
				$('#myul li').removeClass('active');
				// update the active state on our clicked button
				$(this).parent().addClass('active');

				if(ourClass == 'all') {
					// show all our items
					$('.pro-list').children('div.product').show();
				}
				else {
					// hide all elements that don't share ourClass
					$('.pro-list').children('div:not(.' + ourClass + ')').hide();
					// show all elements that do share ourClass
					$('.pro-list').children('div.' + ourClass).show();
				}
				return false;
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#sizeul li a').click(function() {
				// fetch the class of the clicked item
				var ourClass = $(this).attr('class');

				// reset the active class on all the buttons
				$('#sizeul li').removeClass('active');
				// update the active state on our clicked button
				$(this).parent().addClass('active');

				if(ourClass == 'all') {
					// show all our items
					$('.pro-list').children('div.product').show();
				}
				else {
					// hide all elements that don't share ourClass
					$('.pro-list').children('div:not(.' + ourClass + ')').hide();
					// show all elements that do share ourClass
					$('.pro-list').children('div.' + ourClass).show();
				}
				return false;
			});
		});
	</script>
<!-- start ajax pagination -->
<script>
   function ajax_pagination(page)
   {
	   //alert(page);

	   if(page != "")
	   {
		   $.ajax({
			   type: "POST",
			   url: "<?php echo site_url('shop/ajax_pagination'); ?>",
			   data: {page: page},
			   dataType: 'text',
			   success: function (data)
			   {
				   //alert(data);
				   $("#ourHolder").html(data);

			   }
		   });
	   }
   }
</script>
<!-- End ajax pagination -->
<div class="main-head-img row">
	<div class="pages-location poppinsbold col-xs-12 col-sm-12">
		<h4>HOME /</h4>
		<h1>SHOP ALL</h1>
	</div>
	<img src="<?php echo base_url(); ?>public/front/images/Clothesloop Website-17.jpg" class="img-responsive" alt="MAIN IMAGE">
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-3">
			<div class="row">
				<div class="col-sm-12 col-xs-6">
					<div class="category-list poppinsregular ">
						<h3>CATEGORIES</h3>
						<h4 class="all-list-pro">ALL <span id="down"><i class="fa fa-chevron-down" aria-hidden="true"></i></span><span id="up"><i class="fa fa-chevron-up" aria-hidden="true"></i></span></h4>
						<ul id="myul">
							<?php
							 foreach($categoryDetails as $category)
							 {
							?>
								<li><h4><a href="#" class="<?php echo $category['category_name']; ?>"><?php echo ucfirst($category['category_name']); ?></a></h4></li>
						   <?php } ?>
						</ul>
					</div>
					<script>
						$(document).ready(function(){
							$("#up").hide();
							$("#down").click(function(){
								$("#myul").toggle("slow");
								$("#up").show();
								$("#down").hide();
							});
							$("#up").click(function(){
								$("#myul").toggle("slow");
								$("#up").hide();
								$("#down").show();
							});
						});
					</script>
				</div>
				<div class="col-sm-12 col-xs-6">
					<div class="filter-list poppinsregular ">
						<h3>FILTER BY SIZE</h3>
						<ul id="sizeul">
							<?php foreach($sizeProductDetails as $size)
							{
							?>
							<li><h4><a href="#" class="<?php echo $size['size_name']; ?>"><?php echo ucfirst($size['size_name']); ?></a></h4></li>
							<?php
							}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-9 col-xs-12">
			<!--div class="grid-list">
				<i class="fa fa-th fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;
				<i class="fa fa-th-list fa-2x" aria-hidden="true"></i>
			</div-->
			<!--div class="grid-list-line"></div-->

			<div class="row pro-list"  id="ourHolder">
				<?php
				//echo "<pre>";print_r($productDetails);
				foreach($shopProductDetails as $shop)
				{
					?>
                    
					<div class="col-sm-4 col-xs-4 product <?php echo $shop['category_name']; ?> <?php echo $shop['size_name']; ?>">
						<div class="main-product-img" >
							<a href="<?php echo base_url();?>shop/view/<?php echo $shop['product_id']; ?>"><img src="<?php echo base_url();?>public/upload/product/<?php  echo $shop['product_image']; ?>" class="img-responsive" alt=""></a>
						</div>
						
						<div class="main-product-content" >
                        	<div class="row">
                    			<div class="col-sm-12"><h4 class="main-pro-name poppinsregular" ><?php echo $shop['product_name']; ?></h4></div>
                   			 </div>
                             <div class="row">
                             	<div class="col-sm-12">
                                    <div class="main-pro-details" >
                                        <h4 class="main-price-pro poppinsbold" ><?php echo '$'.$shop['product_price']; ?></h4>
                                        <h4 class="main-size-pro poppinsregular " >Available:<?php echo get_size($shop['product_id']);?></h4>
                                    </div>
                                </div>
                             </div>
						</div>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col-sm-9">&nbsp;</div>
		<div class="col-sm-3 pagination">
				<?php
				$objQuery = $this->db->query("SELECT * FROM product");
				$data= $objQuery->result_array();
				$total_records = count($data);  //count number of records
				$total_pages = ceil($total_records / $num_rec_per_page);
				?>
				<!--a onclick="ajax_pagination('1')" href="javascript:void(0);">|<</a-->

				<?php
				for ($i=1; $i<=$total_pages; $i++)
				{
					?>
					<a class="<?php if($active_pagination == $i){ echo 'active'; } ?>" id="<?php echo $i; ?>" onclick="ajax_pagination('<?php echo $i; ?>')"   href="javascript:void(0);"><?php echo $i; ?></a>
					<?php
				}
				?>
				<!--a onclick="ajax_pagination('<?php echo $total_pages; ?>')" href="javascript:void(0);">>|</a-->
		</div>
	</div>

</div>


<?php include('footer.php'); ?>