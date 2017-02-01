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
        <h1 class="page-header">Add Shipping</h1>
    </div>
    <!-- end  page header -->
</div>

<div class="form-group">
    <div class="row"><!-- row START -->
        <div class="col-lg-12">
            <a href="<?php echo url('/admin/shipping'); ?>" class="btn btn-primary btn-quirk btn-stroke">Back List Shipping</a>
        </div>
    </div><!-- row END -->
</div>


<form method="post" name="frmShipping" id="frmShipping" action="{{ url('/admin/shipping/add') }}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="panel panel-default">
    <!--<div class="panel-heading">User</div>-->
    <div class="panel-body">

        <div class="form-group">
            <div class="row">
                <div class="col-lg-2">
                    <label class="control-label">Shipping From</label>
                </div>
                <div class="col-lg-3">
                    <input type="text" name="txtShippingFrom" id="txtShippingFrom" class="form-control required">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-lg-2">
                    <label class="control-label">Shipping To</label>
                </div>
                <div class="col-lg-3">
                      <input type="text" name="txtShippingTo" id="txtShippingTo" class="form-control required">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-lg-2">
                    <label class="control-label">Shipping Amount</label>
                </div>
                <div class="col-lg-3">
                    <input type="text" name="txtShippingAmount" id="txtShippingAmount" class="form-control required">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-3">
                        <input type="submit" name="btnAddShipping" id="btnAddShipping"  value="Save Shipping" class="btn btn-primary btn-quirk btn-stroke"/>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

