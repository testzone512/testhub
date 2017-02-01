@include('layout.header')

<div class="blog-details-img">
    <div class="blog-details-loca poppinssemibold">
        <h4>HOME /</h4>
        <h1>What is fashion therapy?</h1>
    </div>
    <img src="<?php echo url('public/front/images/Clothesloop Website-17.jpg'); ?>" class="img-responsive" alt="MAIN IMAGE">
</div>
<div class="blog-details-content">
    <div class="container">
        <div class="row">
            <?php foreach ($blogDetails as $blog) { ?>
            <div class="col-sm-8">
                <div class="more-details-img">
                    <img src="<?php echo url('public/upload/blog').'/'.$blog['blog_image']; ?>" class="img-responsive" alt="">
                </div>
                <div class="blog-details-content">
                    <h5 class="blog-details-date poppinsregular">
                        <?php
                        $originalDate = $blog['blog_created_on'];
                        $newDate = date("F d Y", strtotime($originalDate));
                        echo $newDate;
                        ?>
                    </h5>
                    <h3 class="blog-details-question poppinssemibold"><?php echo $blog['blog_title']; ?></h3>
                    <h5 class="blog-details-answer1 poppinsregular"><?php echo $blog['blog_description']; ?></h5>
                    <h5 class="blog-details-answer2"><?php echo $blog['blog_description']; ?></h5>
                    <h5 class="blog-details-answer2 poppinsregular"><?php echo $blog['blog_description']; ?></h5>
                    <h5 class="blog-details-answer2 poppinsregular"><?php echo $blog['blog_description']; ?></h5>
                </div>
            </div>
            <?php } ?>
            <div class="col-sm-4">
                <h3 class="recent-head">RECENT ARTICLES</h3>
                <div class="row">
                    <?php foreach ($blogDetails as $blog) { ?>
                    <div class="col-sm-12 recent-post">
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
                    <div class="col-sm-12 recent-post">
                        <img src="<?php echo url('public/upload/blog/thumb').'/'.$blog['blog_image']; ?>" class="img-responsive" alt="recent-blog">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layout.footer')