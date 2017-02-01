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
        <h1 class="page-header">Add Category</h1>
    </div>
    <!-- end  page header -->
</div>

<div class="form-group">
	<div class="row"><!-- row START -->
		<div class="col-lg-12">
			<a href="{{url('admin/category/')}}" class="btn btn-primary btn-quirk btn-stroke">Back List Category</a>
		</div>
	</div><!-- row END -->
</div>
<form method="post" name="frmCategory" id="frmCategory" action="{{ url('/admin/category/add') }}">

<div class="panel panel-default">
    <!--<div class="panel-heading">User</div>-->
    <div class="panel-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-2">
                        <label class="control-label">Main Category</label>
                    </div>
                    <div class="col-lg-3">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <?php
                        $dataMain = array('id'=>'cmbMainCat','class'=>'form-control');
                        echo Form::select('cmbMainCat',$catDetails,'',$dataMain);
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
                        <input type="text" name="txtCategoryName" id="txtCategoryName" class="form-control required"/>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-3">
                        <input type="submit" name="cmbSubmit" id="cmbSubmit" class="btn btn-primary btn-quirk btn-stroke" value="Save Category"/>
                    </div>
                </div>
            </div>
         </div>
 </div>           

</form>

