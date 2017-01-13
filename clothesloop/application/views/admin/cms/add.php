<!DOCTYPE html>
<html>
<head>
    <!--script src="<?php echo base_url();?>public/admin/js/jquery.validation.js"></script-->
    <script type="text/javascript">
        $(document).ready(function(){ // jQuery DOM ready function.
            $("#frmCms").validate({
                rules:{
                    "txtCmsTitle":
                    {
                        required:true
                    }

                },
                messages:
                {
                    "txtCmsTitle":
                    {
                        required:''
                    }
                }
            });
        });
    </script>
    <style>
        input.error, textarea.error, select.error { border-color:#FF0000; }
    </style>


</head>
<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Add Cms</h1>
    </div>
    <!-- end  page header -->
</div>

<div class="form-group">
	<div class="row"><!-- row START -->
		<div class="col-lg-12">
			<a href="<?php echo base_url(); ?>admin/cms/" class="btn btn-primary btn-quirk btn-stroke">Back Cms List</a>
		</div>
	</div><!-- row END -->
</div>


<div class="panel panel-default">
    <!--<div class="panel-heading">User</div>-->
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">
                <?php
                $attributes = array('id' => 'frmCms');
                echo form_open_multipart('admin/cms/add/',$attributes);
                ?>
				
                 <div class="form-group">
                    <div class="row">
                            <div class="col-lg-2">
                                <label class="mandatory" for="txtCmsTitle">Cms Title</label>
                            </div>
                            <div class="col-lg-3">
                                 <?php
                                $dataCmsTitle = array(
                                    'name'        => 'txtCmsTitle',
                                    'id'          => 'txtCmsTitle',
                                    'class'		  => 'form-control small required'
                                );
                                echo form_input($dataCmsTitle); ?>
                                <?php if(form_error('txtCmsTitle')){ ?> <span style="color:red"><?php echo form_error('txtCmsTitle'); ?></span> <?php } ?>
                            </div>
                        </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <label class="control-label" for="txtCmsDes">Cms Description</label>
                        </div>
                        <div class="col-lg-8">
                            <?php
                                $dataMessage = array(
                                    'name'		=> 'txtCmsDes',
                                    'id'		=> 'txtCmsDes',
                                    'class'		=> 'form-control'
                                );
                                echo form_textarea($dataMessage);
                            ?>
                            <script>
                                CKEDITOR.replace( 'txtCmsDes' );
                            </script>
                        </div>
                    </div>
				 </div>

                
                <div class="form-group" style="margin-top:2%">
                    <div class="row">
                            <div class="col-sm-3">
                                 &nbsp;
                            </div>
                            <div class="col-sm-3">
                                 <input type="submit" name="btnAddCms"  value="Add Cms" class="btn btn-primary btn-quirk btn-stroke"/>
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