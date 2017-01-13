<!DOCTYPE html>
<html>
<head>

    <script src="<?php echo base_url();?>public/admin/js/jquery.validation.js"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script>
        $(document).ready(function(e) {
            var numberIncr = <?php echo count($ProdctDetails); ?>;

            var arrColour = $('.sltMulcolour').html();
			 var arrSize = $('.sltMulsize').html();

            <!-- Remove Row On click Event Start -->
            $('body').on('click', '.btn_more_delete', function() {

                $(this).closest ('tr').remove ();

            });
            <!-- Remove Row On click Event  End -->
            $("#btn_AddMore").click(function(){
                //add multiple row
//	var fieldHTML = '<tr class="addrow"><td>Colour<input id="txtMulcolour['+numberIncr+']" class="txtMulcolour required" name="txtMulcolour['+numberIncr+']"></td><td>Weight<input type="text" class="txtMulweight  required" id="txtMulweight['+numberIncr+']" value="" name="txtMulweight['+numberIncr+']"></td><td>Size<input type="text" class="txtMulsize  required" id="txtMulsize['+numberIncr+']" value="" name="txtMulsize['+numberIncr+']"></td><td>Price<input type="text" class="txtMulprice  required" id="txtMulprice['+numberIncr+']" value="" name="txtMulprice['+numberIncr+']"><a class="btn_more_delete" >X</a></td></tr>';

                var fieldHTML = '<tr class="addrow"><td>Colour<select name="sltMulcolour['+numberIncr+'][]" id="sltMulcolour['+numberIncr+'][]"  multiple="multiple" class="sltMulcolour small form-control required">'+arrColour+'</select></td><td>Weight<input type="text" class="txtMulweight small form-control required" id="txtMulweight['+numberIncr+']" value="" name="txtMulweight['+numberIncr+']"></td><td>Size<select name="txtMulsize['+numberIncr+']" id="txtMulsize['+numberIncr+']" class="txtMulsize small form-control required">'+arrSize+'</select></td><td>Price<input type="text" class="txtMulprice small form-control required" id="txtMulprice['+numberIncr+']" value="" name="txtMulprice['+numberIncr+']"></td><td><a class="btn_more_delete" >X</a></td></tr>';
                $('.attribute').append(fieldHTML);

                $('[name*="sltMulcolour['+numberIncr+']"][]').rules("add", {
                    messages:
                    {
                        required: ""//add multiple row in color validation
                    }
                });

                $('[name*="txtMulweight['+numberIncr+']"]').rules("add", {
                    messages:
                    {
                        required: "" //add multiple weight in weight validation
                    }
                });

                $('[name*="txtMulsize['+numberIncr+']"]').rules("add", {
                    messages:
                    {
                        required: ""//add multiple row in size validation
                    }
                });
                $('[name*="txtMulprice['+numberIncr+']"]').rules("add", {
                    messages:
                    {
                        required: ""//add multiple row in price validation
                    }
                });

                numberIncr++; //addmore on click then input name after increment like as txtMulname[1]
            });


            $("#frmProduct").validate({
                <?php if($product[0]['product_type'] == 'Multiple') { ?>
                ignore: [],
                <?php } ?>
                rules:
                {
                    txtProductName:
                    {
                        required:true
                    },
                    sltProductCategory:
                    {
                        required:true
                    },
                    txtProductQty:
                    {
                        required:true
                    },
                    txtProductPrice:
                    {
                        required:true
                    }

                },
                messages:
                {
                    txtProductName:
                    {
                        required:""
                    },
                    sltProductCategory:
                    {
                        required:""
                    },
                    txtProductQty:
                    {
                        required:""
                    },
                    txtProductPrice:
                    {
                        required:""
                    },
                    <?php for ($pd = 0; $pd < count($ProdctDetails); $pd++) { ?>
                    "sltMulcolour[<?php echo $pd; ?>][]":
                    {
                        required:''
                    },
                    "txtMulweight[<?php echo $pd; ?>]":
                    {
                        required:''
                    },
                    "txtMulsize[<?php echo $pd; ?>]":
                    {
                        required:''
                    },
                    "txtMulprice[<?php echo $pd; ?>]":
                    {
                        required:''
                    },
                    <?php } ?>
                },
                //invalid then this event call
                invalidHandler: function(event, validator)
                {

                    $('.errorli').removeClass("errorli");
                    var errors = validator.numberOfInvalids();
                    // alert(errors);

                    if (errors)
                    {
                        var invalidPanels = $(validator.invalidElements()).closest(".sidetab", event);
                        ///console.log(invalidPanels);
                        if (invalidPanels.size() > 0)
                        {
                            $.each($.unique(invalidPanels.get()), function(){
                                $('.'+this.id).addClass("errorli");
                                $('.'+this.id).effect("pulsate",{times: 3}, 2000);
                                // alert('.'+this.id);
                            });

                            $('html, body').animate({
                                scrollTop: $(".sidetab-switch").offset().top
                            }, 2000);
                        }
                    }
                },
                unhighlight: function(element, errorClass, validClass)
                {
                    ///console.log(element.id);

                    $(element).removeClass(errorClass);
                    ///$(element.form).find("label[for=" + element.id + "]").removeClass(errorClass);

                    var $panel = $(element).closest(".sidetab", element);
                    if ($panel.size() > 0)
                    {
                        //console.log($panel);

                        if ($panel.find(".errorli" + ":visible").size() == 0)
                        {
                            //	$('.'+$panel[0].id).removeClass("errorli");
                            ///$panel.siblings(".ui-tabs-nav").find("a[href='#" + $panel[0].id + "']").parent().removeClass("errorli");
                        }
                    }
                }

            });
        });
    </script>
    <script>
        //hide show functinality
        $(document).ready(function(e) {
            $("#sidetab2").hide();

            $(".sidetab1").click(function(){
                $("#sidetab1").show();
                $("#sidetab2").hide();
            });

            $(".sidetab2").click(function(){
                $("#sidetab2").show();
                $("#sidetab1").hide();
            });
        });
    </script>
    <style>
        .btn_more_delete:hover
        {
            cursor: pointer;
            color:red;
        }
        input.error, textarea.error, select.error { border-color:#FF0000; }
        .sidetab-switch li.errorli a {color:#FF0000;}
td, th {
    padding: 12px;
}
    </style>

</head>
<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header"> Edit Product</h1>
    </div>
    <!-- end  page header -->
</div>

<div class="form-group">
	<div class="row"><!-- row START -->
		<div class="col-lg-12">
			<a href="<?php echo base_url(); ?>admin/product/" class="btn btn-primary btn-quirk btn-stroke">Back Product List</a>
		</div>
	</div><!-- row END -->
</div>
<div class="panel panel-default">
    <!--<div class="panel-heading">User</div>-->
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-2">
                <!-- sidebar-->
                <ul class="sidetab-switch">
                    <li class="sidetab1"><a href="#">General</a></li>
                    <?php if($product[0]['product_type'] == 'Multiple')
                    { ?>
                        <li class="sidetab2"><a href="#" >Attribute</a></li>
                        <?php
                    } ?>
                </ul>
                <!--sidebar-->
            </div>
            <div class="col-lg-6">
                <?php
                $attributes = array('id' => 'frmProduct');
                echo form_open_multipart('admin/product/edit/'.$product[0]['product_id'],$attributes);
                ?>
                <!-- start general -->
                <div id="sidetab1">
				    <div class="form-group">
                        <div class="row">
                                <div class="col-lg-2">
                                    <label class="mandatory" for="txtProductName">Product Name</label>
                                </div>
                                <div class="col-lg-3">
                                     <?php
									$dataProductName = array(
										'name'        => 'txtProductName',
										'id'          => 'txtProductName',
										'class'		  => 'form-control small required',
										'value'       => $product[0]['product_name']
									);
									echo form_input($dataProductName); ?>
									<?php if(form_error('txtProductName')){ ?> <span style="color:red"><?php echo form_error('txtProductName'); ?></span> <?php } ?>
                                </div>
                          </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                                <div class="col-lg-2">
                                    <label  class="mandatory" for="sltProductCategory">Product Category</label>
                                </div>
                                <div class="col-lg-3">
                                    <select id="sltProductCategory required"   class="small form-control" name="sltProductCategory">
                                        <option value="">--select Product Category--</option>
                                        <?php
                                        for ($c = 0; $c < count($categorydata); $c++) {
                                            /// echo form_dropdown('selCategory[]', $categorydata,'','class="small" id="selCategory required" multiple');
                                            if ($categorydata[$c]['category_parent_id'] == 0) {
                                                ?>
                                                <option value="<?php echo $categorydata[$c]['category_id']; ?>" disabled><i><?php echo $categorydata[$c]['category_name']; ?></i></option>
                                                <?php
                                            } else {
                                                if (strpos($product[0]['product_category_id'], $categorydata[$c]['category_id']) !== false) {
                                                    ?>
                                                    <option value="<?php echo $categorydata[$c]['category_id']; ?>" selected="selected"><?php echo $categorydata[$c]['category_name']; ?></option>
                                                <?php } else {
                                                    ?>
                                                    <option value="<?php echo $categorydata[$c]['category_id']; ?>"><?php echo $categorydata[$c]['category_name']; ?></option>
                                                    <?php
                                                } // strpos if
                                            } // else
                                        } // for
                                        ?>
                                    </select>
                                    <?php if(form_error('sltProductCategory')){ ?> <span style="color:red"><?php echo form_error('sltProductCategory'); ?></span> <?php } ?>
                                </div>
                          </div>
                    </div>
                    
                     <div class="form-group">
                        <div class="row">
                                <div class="col-lg-2">
                                    <label class="mandatory" for="txtProductQty">Product Qty</label>
                                </div>
                                <div class="col-lg-3">
                                     <?php
									$dataProductQty = array(
										'name'        => 'txtProductQty',
										'id'          => 'txtProductQty',
										'class'		  => 'form-control small required',
										'value'       => $product[0]['product_qty']
									);
									echo form_input($dataProductQty); ?>
									<?php if(form_error('txtProductQty')){ ?> <span style="color:red"><?php echo form_error('txtProductQty'); ?></span> <?php } ?>
                                </div>
                          </div>
                    </div>
                    
                     <div class="form-group">
                        <div class="row">
                                <div class="col-lg-2">
                                    <label class="mandatory" for="txtProductPrice">Product Price</label>
                                </div>
                                <div class="col-lg-3">
                                    <?php
									$dataProductPrice = array(
										'name'        => 'txtProductPrice',
										'id'          => 'txtProductPrice',
										'class'		  => 'form-control small required',
										'value'       => $product[0]['product_price']
									);
									echo form_input($dataProductPrice); ?>
									<?php if(form_error('txtProductPrice')){ ?> <span style="color:red"><?php echo form_error('txtProductPrice'); ?></span> <?php } ?>
                                </div>
                          </div>
                    </div>
                    
                      <div class="form-group">
                        <div class="row">
                                <div class="col-lg-2">
                                     <label  for="productImage">Product Image</label>
                                </div>
                                <div class="col-lg-3">
                                    <?php
									$dataProductImage = array(
										'name'        => 'productImage',
										'id'          => 'productImage',
										'value' 	  => $product[0]['product_image']
									);
									echo form_upload($dataProductImage);
									?>
									<?php if ($product[0]['product_image'] != '') { ?>
										<img height="119" width="180" alt="" src="<?php echo site_url() . "public/upload/product/thumb/" . $product[0]['product_image']; ?>"><?php } else { ?><img height="119" width="180" alt="" src="<?php echo site_url(); ?>/public/upload/product/thumb/noPreview.png"><?php } ?>
                                </div>
                          </div>
                    </div>
                    
                </div><!-- End general -->
				 
                <?php if($product[0]['product_type'] == 'Multiple') { ?>
                <!-- start side 2-->
				<div id="sidetab2">	
                    <table  style="background-color:#FFFFFF;"  class="attribute sidetab" border="0"  align="center">
                        <?php for ($pd = 0; $pd < count($ProdctDetails); $pd++)
                        { ?>
                            <tr>
                                <td colspan="4" align="center">Attribute </td>
                            </tr>
                            <tr>
                                <td><label  for="ddVariantColour[<?php echo $pd; ?>]" class="mandatory">Colour :</label>
                                    <?php
                                   ?>
                               <select name="sltMulcolour[0][]" id="sltMulcolour" class="sltMulcolour required small form-control" multiple>
                                  <?php foreach($colourDetail as $colourval)
								  {
								   ?>
                                    <option <?php foreach(explode(',', $ProdctDetails[$pd]['pd_product_color']) as $vl){ 
										 if($vl == $colourval['colour_id'])
										 { 
										 	echo "selected";} 
										 }
									  ?> value="<?php echo $colourval['colour_id']; ?>"><?php echo ucfirst($colourval['colour_name']); ?></option>
                                   <?php
									
								  } 
								  ?>
                                </select>
                                </td>
                                <td><label  for="txtMulweight[<?php echo $pd; ?>]" class="mandatory">Weight :</label><input type="text" class="required small form-control" name="txtMulweight[<?php echo $pd; ?>]" id="txtMulweight[<?php echo $pd; ?>]" value ="<?php echo $ProdctDetails[$pd]['pd_product_weight']; ?>"/></td>
                                <td><label  for="txtMulsize[<?php echo $pd; ?>]" class="mandatory">Size :</label> <?php echo $ProdctDetails[$pd]['pd_product_size']; ?>
                                <select name="sltMulsize[<?php echo $pd; ?>]" id="sltMulsize[<?php echo $pd; ?>]" class="sltMulsize required small form-control" >
                                  <?php foreach($sizeDetail as $sizeval)
								  {
								   ?>
                                    <option <?php if($ProdctDetails[$pd]['pd_product_size']==$sizeval['size_id']){ echo "selected";} ?> value="<?php echo $sizeval['size_id']; ?>"><?php echo ucfirst($sizeval['size_name']); ?></option>
                                   <?php
								  } 
								  ?>
                                </select>
                                <td><label  for="txtMulprice[<?php echo $pd; ?>]" class="mandatory">Price :</label><input type="text" class="required small form-control" name="txtMulprice[<?php echo $pd; ?>]" id="txtMulprice[<?php echo $pd; ?>]" value ="<?php echo $ProdctDetails[$pd]['pd_product_price']; ?>"/></td>
                            </tr>
                           
                        <?php
                        } ?>
                        	 <tr>
                           		 <td colspan="4"><input type="button" class="btn btn-primary btn-quirk btn-stroke" value="Add More" name="btn_AddMore" id="btn_AddMore"></td>
                        	</tr>
                         <tr>
                            <td colspan="4"></td>
                        </tr>
                     </table>
                  </div>  
                  <!-- end side 2-->
                <?php } ?>
                        
			
        
				
                		<div class="form-group" style="margin-top:2%">
                            <div class="row">
                                    <div class="col-lg-2">
                                         &nbsp;
                                    </div>
                                    <div class="col-lg-3">
               							 <input type="submit" name="btnEditProduct"  value="Update Product" class="btn btn-primary btn-quirk btn-stroke"/>
                                    </div>
                             </div>
                        </div>   
                        
                <?php echo form_close(); ?>
				<!-- End Form Elements -->
            </div>
        </div>
    </div>
</div>
</html>