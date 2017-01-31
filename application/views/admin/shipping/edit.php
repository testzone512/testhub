<script>
 $(document).ready(function(e) {
     $("#frmShipping").validate({
             rules:
             {
                 txtShippingFrom:
                 {
                         required:true
                 },
                 txtShippingTo:
                 {
                         required:true
                 },
                 txtShippingAmount:
                 {
                         required:true
                 }

             },
             messages:
             {
                 txtShippingFrom:
                 {
                         required:""
                 },
                 txtShippingTo:
                 {
                         required:""
                 },
                 txtShippingAmount:
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
        <h1 class="page-header">Update Shipping</h1>
    </div>
    <!-- end  page header -->
</div>

<div class="form-group">
	<div class="row"><!-- row START -->
		<div class="col-lg-12">
			<a href="<?php echo site_url('admin/shipping/'); ?>" class="btn btn-primary btn-quirk btn-stroke">Back List Shipping</a>
		</div>
	</div><!-- row END -->
</div>

<?php
	$attributes = array('id' => 'frmShipping');

	echo form_open('admin/shipping/edit/'.$shippingDetails[0]['shipping_id'],$attributes);
?>
<div class="panel panel-default">
    <!--<div class="panel-heading">User</div>-->
    <div class="panel-body">
           
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-2">
                        <label class="control-label">Shipping From</label>
                    </div>
                    <div class="col-lg-3">
                        <?php
                            $dataShippingFrom= array(
                                'name'		=> 'txtShippingFrom',
                                'id'		=> 'txtShippingFrom',
                                'class'		=> 'form-control required',
                                'value'         => $shippingDetails[0]['shipping_from']
                            );
                            echo form_input($dataShippingFrom);
                        ?>
                    </div>
                </div>
            </div>
        
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-2">
                        <label class="control-label">Shipping To</label>
                    </div>
                    <div class="col-lg-3">
                        <?php
                            $dataShippingTo= array(
                                'name'		=> 'txtShippingTo',
                                'id'		=> 'txtShippingTo',
                                'class'		=> 'form-control required',
                                'value'         => $shippingDetails[0]['shipping_to']
                            );
                            echo form_input($dataShippingTo);
                        ?>
                    </div>
                </div>
            </div>
        
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-2">
                        <label class="control-label">Shipping Amount</label>
                    </div>
                    <div class="col-lg-3">
                        <?php
                            $dataShippingAmount= array(
                                'name'		=> 'txtShippingAmount',
                                'id'		=> 'txtShippingAmount',
                                'class'		=> 'form-control required',
                                'value'         => $shippingDetails[0]['shipping_amount']
                            );
                            echo form_input($dataShippingAmount);
                        ?>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-3">
                        <?php
                            $dataSubmit = array(
                                'name'		=> 'btnUpdate',
                                'id'		=> 'btnUpdate',
                                'class'		=> 'btn btn-primary btn-quirk btn-stroke'
                            );
                            echo form_submit($dataSubmit,'Update Shipping');
                        ?>
                    </div>
                </div>
            </div>
         </div>
 </div>           

<?php echo form_close(); ?>

