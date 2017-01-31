<html>
    <head>
        <title>Cloth Shop</title>
        <link rel="stylesheet" media="all" type="text/css" href="css/styles.css">
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/script.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
          $("#products").hide();
          $("#up").hide();
           
          $("#listview").click(function(){
              $("#products").show();
              $("#grid").hide();
          });
          $("#gridview").click(function(){
              $("#grid").show();
              $("#products").hide();
          });
          
           $("#down").click(function(){
              $("#category").toggle();
              $("#up").show();
              $("#down").hide();
           });
           
          $("#up").click(function(){
              $("#category").toggle();
              $("#down").show();
              $("#up").hide();
          });

          
        });   
        </script>
        <style type="text/css">
            #grid { width: 100%;}
        </style>
    </head>
    <body>
        
        <!-- Header START -->
        
        <?php include('header.php'); ?>
        
        <!-- Header END -->
        
        <!-- Image Shop all START -->
        <div class="row">
            <div class="col-sm-12 text">
                <h4 class="satext">HOME /</h4>
                <h1 class="sptext">SHOP ALL</h1>
                <img src="images/shopall.png" alt="Shop All" class="img-responsive">
            </div>
        </div>
        <!-- Image shop all END -->
        
        <!-- Product Section START -->
        <div class="container">
            <div class="form-group">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <h3><b>CATEGORIES</b></h3>
                            <a href="#"><u>ALL</u></a>
                            <a href="#" class="pull-right"><span id="down"><i class="fa fa-angle-down fa-lg" aria-hidden="true"></i></span></a>
                            <a href="#" class="pull-right"><span id="up"><i class="fa fa-angle-up fa-lg" aria-hidden="true"></i></span></a>
                            <div id="category">
                                <h4 class="catlist">Tops</h4>
                                <h4 class="catlist">Pants, Shorts & Skirts</h4>
                                <h4 class="catlist">Jackets</h4>
                                <h4 class="catlist">Dresses,Playsuits</h4>
                            </div>
                             
                            <h3 class="catlist"><b>FILTER BY SIZE</b></h3>
                            <h4 class="catlist">XXS</h4>
                            <h4 class="catlist">XS</h4>
                            <h4 class="catlist">S</h4>
                            <h4 class="catlist">M</h4>
                            <h4 class="catlist">L</h4>
                            <h4 class="catlist">XL</h4>
                            <h4 class="catlist">XL</h4>
                        </div>
                        
                        <div class="col-sm-9">
                            <a href="#" id="gridview" class="switcher"><i class="fa fa-th-list fa-lg" aria-hidden="true"></i></a>
                            <a href="#" id="listview" class="switcher active"><i class="fa fa-th fa-lg" aria-hidden="true"></i></a><br/>
                            
                            <!-- GRID VIEW Products START -->
                            <div id="grid">
                            <div class="col-sm-4">
                                <img src="images/sp3.png" alt="Weekend Product" class="img-responsive sp prod-img">
                                <h3>Loose Pleated Pants</h3>
                                <p class="sp-price">$43.00</p>
                                <p class="sp-size">Avialable: XS,S</p>
                            </div>
                            <div class="col-sm-4">
                                <img src="images/sp1.png" alt="Weekend Product" class="img-responsive sp prod-img">
                                <h3>Loose Pleated Pants</h3>
                                <p class="sp-price">$43.00</p>
                                <p class="sp-size">Avialable: XS,S</p>
                            </div>
                            <div class="col-sm-4">
                                <img src="images/sp3.png" alt="Weekend Product" class="img-responsive sp prod-img">
                                <h3>Loose Pleated Pants</h3>
                                <p class="sp-price">$43.00</p>
                                <p class="sp-size">Avialable: XS,S</p>
                            </div>
                            
                            <div class="col-sm-4">
                                <img src="images/sp3.png" alt="Weekend Product" class="img-responsive sp prod-img">
                                <h3>Loose Pleated Pants</h3>
                                <p class="sp-price">$43.00</p>
                                <p class="sp-size">Avialable: XS,S</p>
                            </div>
                            <div class="col-sm-4">
                                <img src="images/sp1.png" alt="Weekend Product" class="img-responsive sp prod-img">
                                <h3>Loose Pleated Pants</h3>
                                <p class="sp-price">$43.00</p>
                                <p class="sp-size">Avialable: XS,S</p>
                            </div>
                            <div class="col-sm-4">
                                <img src="images/sp3.png" alt="Weekend Product" class="img-responsive sp prod-img">
                                <h3>Loose Pleated Pants</h3>
                                <p class="sp-price">$43.00</p>
                                <p class="sp-size">Avialable: XS,S</p>
                            </div>
                            
                            <div class="col-sm-4">
                                <img src="images/sp3.png" alt="Weekend Product" class="img-responsive sp prod-img">
                                <h3>Loose Pleated Pants</h3>
                                <p class="sp-price">$43.00</p>
                                <p class="sp-size">Avialable: XS,S</p>
                            </div>
                            <div class="col-sm-4">
                                <img src="images/sp1.png" alt="Weekend Product" class="img-responsive sp prod-img">
                                <h3>Loose Pleated Pants</h3>
                                <p class="sp-price">$43.00</p>
                                <p class="sp-size">Avialable: XS,S</p>
                            </div>
                            <div class="col-sm-4">
                                <img src="images/sp3.png" alt="Weekend Product" class="img-responsive sp prod-img">
                                <h3>Loose Pleated Pants</h3>
                                <p class="sp-price">$43.00</p>
                                <p class="sp-size">Avialable: XS,S</p>
                            </div>
                            
                            <div class="col-sm-4">
                                <img src="images/sp3.png" alt="Weekend Product" class="img-responsive sp prod-img">
                                <h3>Loose Pleated Pants</h3>
                                <p class="sp-price">$43.00</p>
                                <p class="sp-size">Avialable: XS,S</p>
                            </div>
                            <div class="col-sm-4">
                                <img src="images/sp1.png" alt="Weekend Product" class="img-responsive sp prod-img">
                                <h3>Loose Pleated Pants</h3>
                                <p class="sp-price">$43.00</p>
                                <p class="sp-size">Avialable: XS,S</p>
                            </div>
                            <div class="col-sm-4">
                                <img src="images/sp3.png" alt="Weekend Product" class="img-responsive sp prod-img">
                                <h3>Loose Pleated Pants</h3>
                                <p class="sp-price">$43.00</p>
                                <p class="sp-size">Avialable: XS,S</p>
                            </div>
                            </div>
                               </div>
                            <!-- GRID VIEW Products END -->
                            
                            <!-- LIST VIEW Products START -->
                            <div id="wrap" class="col-sm-9">
                            <ul id="products" class="list clearfix">
                                <!-- row 1 -->
                                <li class="clearfix" style="width: 110%; margin-bottom: 3%;">
                                    <section class="left">
                                        <img src="images/sp1.png" alt="default thumb" class="thumb img-responsive">
                                        <h3>Loose Pleated Pants</h3>
                                        <span class="darkview">
                                            <a href="javascript:void(0);" class="firstbtn"><img src="images/read-more-btn.png" alt="Read More..."></a>
                                            <a href="javascript:void(0);"><img src="images/add-to-cart-btn.png" alt="Add to Cart"></a>
                                        </span>
                                    </section>

                                    <section class="right">
                                         <p class="sp-price">$43.00</p>
                                         <p class="sp-size">Avialable: XS,S</p>
                                    </section>
                                </li>

                                <!-- row 2 -->
                                <li class="clearfix" style="width: 110%; margin-bottom: 3%;">
                                    <section class="left">
                                        <img src="images/sp3.png" alt="default thumb" class="thumb img-responsive fixone">
                                        <h3>Loose Pleated Pants</h3>
                                        <span class="darkview">
                                            <a href="javascript:void(0);" class="firstbtn"><img src="images/read-more-btn.png" alt="Read More..."></a>
                                            <a href="javascript:void(0);"><img src="images/add-to-cart-btn.png" alt="Add to Cart"></a>
                                        </span>
                                    </section>

                                    <section class="right">
                                         <p class="sp-price">$43.00</p>
                                         <p class="sp-size">Avialable: XS,S</p>
                                    </section>
                                </li>

                                <!-- row 3 -->
                                <li class="clearfix" style="width: 110%; margin-bottom: 3%;">
                                    <section class="left">
                                        <img src="images/sp1.png" alt="default thumb" class="thumb img-responsive">
                                        <h3>Loose Pleated Pants</h3>
                                        <span class="darkview">
                                            <a href="javascript:void(0);" class="firstbtn"><img src="images/read-more-btn.png" alt="Read More..."></a>
                                            <a href="javascript:void(0);"><img src="images/add-to-cart-btn.png" alt="Add to Cart"></a>
                                        </span>
                                    </section>

                                    <section class="right">
                                         <p class="sp-price">$43.00</p>
                                         <p class="sp-size">Avialable: XS,S</p>
                                    </section>
                                </li>

                                <!-- row 4 -->
                                <li class="clearfix" style="width: 110%; margin-bottom: 3%;">
                                    <section class="left">
                                        <img src="images/sp3.png" alt="default thumb" class="thumb img-responsive fixone">
                                        <h3>Loose Pleated Pants</h3>
                                        <span class="darkview">
                                            <a href="javascript:void(0);" class="firstbtn"><img src="images/read-more-btn.png" alt="Read More..."></a>
                                            <a href="javascript:void(0);"><img src="images/add-to-cart-btn.png" alt="Add to Cart"></a>
                                        </span>
                                    </section>

                                    <section class="right">
                                         <p class="sp-price">$43.00</p>
                                         <p class="sp-size">Avialable: XS,S</p>
                                    </section>
                                </li>

                                <!-- row 5 -->
                                <li class="clearfix" style="width: 110%; margin-bottom: 3%;">
                                    <section class="left">
                                        <img src="images/sp1.png" alt="default thumb" class="thumb img-responsive">
                                        <h3>Loose Pleated Pants</h3>
                                        <span class="darkview">
                                            <a href="javascript:void(0);" class="firstbtn"><img src="images/read-more-btn.png" alt="Read More..."></a>
                                            <a href="javascript:void(0);"><img src="images/add-to-cart-btn.png" alt="Add to Cart"></a>
                                        </span>
                                    </section>

                                    <section class="right">
                                         <p class="sp-price">$43.00</p>
                                         <p class="sp-size">Avialable: XS,S</p>
                                    </section>
                                </li>

                                <!-- row 6 -->
                                <li class="clearfix" style="width: 110%; margin-bottom: 3%;">
                                    <section class="left">
                                        <img src="images/sp3.png" alt="default thumb" class="thumb img-responsive fixone">
                                        <h3>Loose Pleated Pants</h3>
                                        <span class="darkview">
                                            <a href="javascript:void(0);" class="firstbtn"><img src="images/read-more-btn.png" alt="Read More..."></a>
                                            <a href="javascript:void(0);"><img src="images/add-to-cart-btn.png" alt="Add to Cart"></a>
                                        </span>
                                    </section>

                                    <section class="right">
                                         <p class="sp-price">$43.00</p>
                                         <p class="sp-size">Avialable: XS,S</p>
                                    </section>
                                </li>

                                <!-- row 7 -->
                                <li class="clearfix" style="width: 110%; margin-bottom: 3%;">
                                    <section class="left">
                                        <img src="images/sp1.png" alt="default thumb" class="thumb img-responsive">
                                        <h3>Loose Pleated Pants</h3>
                                        <span class="darkview">
                                            <a href="javascript:void(0);" class="firstbtn"><img src="images/read-more-btn.png" alt="Read More..."></a>
                                            <a href="javascript:void(0);"><img src="images/add-to-cart-btn.png" alt="Add to Cart"></a>
                                        </span>
                                    </section>

                                    <section class="right">
                                         <p class="sp-price">$43.00</p>
                                         <p class="sp-size">Avialable: XS,S</p>
                                    </section>
                                </li>

                                <!-- row 8 -->
                                <li class="clearfix" style="width: 110%; margin-bottom: 3%;">
                                    <section class="left">
                                        <img src="images/sp3.png" alt="default thumb" class="thumb img-responsive fixone">
                                        <h3>Loose Pleated Pants</h3>
                                        <span class="darkview">
                                            <a href="javascript:void(0);" class="firstbtn"><img src="images/read-more-btn.png" alt="Read More..."></a>
                                            <a href="javascript:void(0);"><img src="images/add-to-cart-btn.png" alt="Add to Cart"></a>
                                        </span>
                                    </section>

                                    <section class="right">
                                         <p class="sp-price">$43.00</p>
                                         <p class="sp-size">Avialable: XS,S</p>
                                    </section>
                                </li>

                                <!-- row 9 -->
                                <li class="clearfix" style="width: 110% margin-bottom: 3%;">
                                    <section class="left">
                                        <img src="images/sp1.png" alt="default thumb" class="thumb img-responsive">
                                        <h3>Loose Pleated Pants</h3>
                                        <span class="darkview">
                                            <a href="javascript:void(0);" class="firstbtn"><img src="images/read-more-btn.png" alt="Read More..."></a>
                                            <a href="javascript:void(0);"><img src="images/add-to-cart-btn.png" alt="Add to Cart"></a>
                                        </span>
                                    </section>

                                    <section class="right">
                                         <p class="sp-price">$43.00</p>
                                         <p class="sp-size">Avialable: XS,S</p>
                                    </section>
                                </li>
                            </ul>
                            <!-- LIST VIEW Products END -->
                        </div>

                     
                    </div>
                </div>
            </div>  
        </div>
        <!-- Product Section END -->
        
        <!-- Footer Section START -->
        
        <?php include('footer.php'); ?>
        
        <!-- Footer Section END -->
        
    </body>
</html>