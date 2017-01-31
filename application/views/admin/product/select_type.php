<!DOCTYPE html>
<html>
<head>
<script>
  $(document).ready(function(e) {
            $("#frmSelectProduct").validate({
                rules:
                {
                    sltProductCategory:
                    {
                        required:true
                    }

                },
                messages:
                {
                    sltProductCategory:
                    {
                        required:""
                    }
                }
			});
  });
</script>
</head>
<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header"> Select Product Category </h1>
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
            <div class="col-lg-6">
                <?php  $attributes = array('id' => 'frmSelectProduct');
				 echo form_open('admin/product/add_select_type_product',$attributes); ?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-2">
                            <label for="mainCat">Main Category</label>
                        </div>
                        <div class="col-sm-4">
                                    <?php
                                    $dataCategory = array('id' => 'sltProductCategory', 'class' => 'form-control');
                                    $catPDetails=array
                                    (
                                        '' =>'--select Product Category--',
                                        'Single' =>'Single',
                                        'Multiple' =>'Multiple',
                                    );
                                    echo form_dropdown('sltProductCategory', $catPDetails,'',$dataCategory); ?>
                                  <?php if(form_error('sltProductCategory')){ ?> <span style="color:red"><?php echo form_error('sltProductCategory'); ?></span> <?php } ?>
                        </div>
                     </div>
				 </div>
                 
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-2">
                            &nbsp;
                        </div>
                        <div class="col-sm-4">
                          <input type="submit" name="btnAddProductType"  value="Add Product Type" class="btn btn-primary btn-quirk btn-stroke"/>
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