<?php $this->load->view('header'); ?>

<div class="blog-img">
	<div class="blog-loca poppinssemibold col-xs-12 col-sm-12">
		<h4>HOME /</h4>
		<h1>Blog</h1>
	</div>
	<img src="<?php echo base_url(); ?>public/front/images/Clothesloop Website-17.jpg" class="img-responsive" alt="MAIN IMAGE">
</div>
<div class="blog-content">
	<div class="container">
		<div class="row post-DC">
			<div class="col-sm-8 col-xs-12">
				<div class="row">
                    <?php foreach ($blogDetails as $blog) { ?>
					<div class="col-sm-6 col-xs-6 blog-post-content">
                        <style type="text/css">
                            .blogs-img<?php echo $blog['blog_id']; ?> {
                                background-image:url(<?php echo base_url(); ?>public/upload/blog/thumb/<?php echo $blog['blog_image']; ?>);
                                -background-color: #f3f3f3;
                                display: flex;
                   
                                -width: 100%;
								background-repeat:no-repeat;
                            
								background-size:contain;
                            }
                        </style>
						<div>
							<img src="<?php echo base_url(); ?>public/upload/blog/thumb/<?php echo $blog['blog_image']; ?>" class="img-responsive" alt="" />
						</div>
						<div class="post-main-content">
							<h5 class="post-date poppinsregular">
                                <?php 
                                    $originalDate = $blog['blog_created_on'];
                                    $newDate = date("F d Y", strtotime($originalDate)); 
                                    echo $newDate;
                                ?>
                            </h5>
							<h3 class="post-question poppinssemibold"><?php echo $blog['blog_title']; ?></h3>
							<h5 class="post-content poppinsregular"><?php echo $blog['blog_description']; ?></h5>
							<a href="<?php echo site_url('blog/blogView/'.$blog['blog_id']); ?>"><button class="post-button poppinssemibold">READ MORE</button></a>
						</div>
					</diV>
                    <?php } ?>
				</div>
				
				
			</div>
			<div class="col-sm-4 col-xs-12">
				<h3 class="recent-head poppinssemibold">RECENT ARTICLES</h3>
				<div class="row">
                    <?php foreach ($blogDetails as $blog) { ?>
					<div class="col-sm-12 col-xs-6 recent-post">
						
						<h4 class="recent-question poppinssemibold"><?php echo $blog['blog_title']; ?></h4>
						<h5 class="recent-date poppinsregular">
                            <?php 
                                $originalDate = $blog['blog_created_on'];
                                $newDate = date("F d Y", strtotime($originalDate)); 
                                echo $newDate;
                            ?>
                        </h5>
					</div>
                    <?php } ?>
				</div>
				<div class="row">
					<div class="col-sm-12 col-xs-6 recent-post">
						<img src="<?php echo base_url(); ?>public/front/images/Clothesloop Website-7.jpg" class="img-responsive" alt="recent-blog">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>