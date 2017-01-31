<!DOCTYPE html>
<html>
<head>
    <!--script src="<?php echo base_url();?>public/admin/js/jquery.validation.js"></script-->
    <script type="text/javascript">
        $(document).ready(function(){ // jQuery DOM ready function.
            $("#frmSize").validate({
                rules:{
                    "txtSizeName":
                    {
                        required:true
                    }

                },
                messages:
                {
                    "txtSizeName":
                    {
                        required:''
                    }
                }
            });
        });
    </script>
</head>
<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Add Size</h1>
    </div>
    <!-- end  page header -->
</div>

<div class="form-group">
	<div class="row"><!-- row START -->
		<div class="col-lg-12">
			<a href="<?php echo base_url(); ?>admin/size/" class="btn btn-primary btn-quirk btn-stroke">Back Size List</a>
		</div>
	</div><!-- row END -->
</div>


<div class="panel panel-default">
    <!--<div class="panel-heading">User</div>-->
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">
                <?php
                $attributes = array('id' => 'frmSize');
                echo form_open_multipart('admin/size/add/',$attributes);
                ?>
                 <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label class="mandatory" for="txtSizeName">Size Name</label>
                            </div>
                            <div class="col-lg-3">
                                 <?php
                                $dataSizeName = array(
                                    'name'        => 'txtSizeName',
                                    'id'          => 'txtSizeName',
                                    'class'		  => 'form-control small required'
                                );
                                echo form_input($dataSizeName); ?>
                                <?php if(form_error('txtSizeName')){ ?> <span style="color:red"><?php echo form_error('txtSizeName'); ?></span> <?php } ?>
                            </div>
                        </div>
                  </div>
                
                <div class="form-group" style="margin-top:2%">
                    <div class="row">
                            <div class="col-sm-3">
                                 &nbsp;
                            </div>
                            <div class="col-sm-3">
                                 <input type="submit" name="btnAddSize"  value="Add Size" class="btn btn-primary btn-quirk btn-stroke"/>
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