<script>
 $(document).ready(function(e) {
	 $("#frmCategory").validate({
		 rules:
		 {
			 txtCategoryName:
			 {
				 required:true
			 }

		 },
		 messages:
		 {
			 txtCategoryName:
			 {
				 required:""
			 }
		 }
	  });
 });
</script>
        <div class="row">
            <!--  page header -->
            <div class="col-lg-12">
                <h1 class="page-header">Update Category</h1>
            </div>
            <!-- end  page header -->
        </div>

        <div class="form-group">
            <div class="row"><!-- row START -->
                <div class="col-lg-12">
                    <a href="<?php echo site_url('admin/category/'); ?>" class="btn btn-primary btn-quirk btn-stroke">Back List Category</a>
                </div>
            </div><!-- row END -->
        </div>
        
        <?php
            $attributes = array('id' => 'frmCategory');
        
            echo form_open('admin/category/edit/'.$categoryDetails[0]['category_id'],$attributes);
        ?>
  <div class="panel panel-default">
    <!--<div class="panel-heading">User</div>-->
    <div class="panel-body">    
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-2">
                        <label class="control-label">Main Category</label>
                    </div>
                    <div class="col-lg-3">
                        <?php
                            $dataMain = 'id="cmbMainCat" class="form-control"';
                            echo form_dropdown('cmbMainCat',$catDetails,$categoryDetails[0]['category_parent_id'],$dataMain);
                        ?>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-2">
                        <label class="control-label">Category Name</label>
                    </div>
                    <div class="col-lg-3">
                        <?php
                            $dataCategoryName = array(
                                'name'		=> 'txtCategoryName',
                                'id'		=> 'txtCategoryName',
                                'class'		=> 'form-control',
                                'value'		=> $categoryDetails[0]['category_name'],
                            );
                            echo form_input($dataCategoryName);
                        ?>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-4">
                        <?php
                            $dataSubmit = array(
                                'name'		=> 'cmbSubmit',
                                'id'		=> 'cmbSubmit',
                                'class'		=> 'btn btn-primary btn-quirk btn-stroke'
                            );
                            echo form_submit($dataSubmit,'Update Category');
                        ?>
                    </div>
                </div>
            </div>
        </div>
  </div>           

<?php echo form_close(); ?>
