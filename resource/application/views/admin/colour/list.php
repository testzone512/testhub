<script type="text/javascript">
    $(document).ready(function () {
        $('#colourData').DataTable({
            'sPaginationType': 'full_numbers',
            "bStateSave": true
        });
    });
</script>

<script type="text/javascript">

    function deleteConfirm(url)
    {
        if (confirm('Do you wish to Delete?'))
        {
            window.location.href = url;
        }
    }
</script>
<style type="text/css">
    tr:nth-child(even) {background: #D8DCE3}
    -tr:nth-child(odd) {background: #DCDCDC;}
</style>

<div class="form-group">
    <div class="row"><!-- row START -->
        <div class="col-lg-12">
            <div class="panel-heading">
                <div class="panel-body">
                    <h1>List Colour</h1>
                </div>
            </div>
        </div>
    </div><!-- row END -->
</div>

<div class="form-group">
    <div class="row"><!-- row START -->
        <div class="col-lg-12">
            <a href="<?php echo site_url('admin/colour/add/'); ?>" class="btn btn-primary btn-quirk btn-stroke pull-right">Add Colour</a>
        </div>
    </div><!-- row END -->
</div>

<div class="form-group">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-bordered" id="colourData">
                        <thead>
                            <tr>
                                <th>Colour Name</th>
                                <th>Created ON</th>
                                <th>Updated ON</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($colourDetails as $colour) { ?>
                                <tr>
                                    <td><?php echo $colour['colour_name']; ?></td>
                                    <td><?php echo $colour['colour_created_on']; ?></td>
                                    <td><?php echo $colour['colour_updated_on']; ?></td>
                                    <td>
                                        <a href="<?php echo site_url('admin/colour/edit/' . $colour["colour_id"]); ?>"><i class="fa fa-pencil fa-2x" aria-hidden="true" title="Edit Colour"></i></a>&emsp;
                                        <a href="#" onclick="javascript : deleteConfirm('<?php echo site_url("admin/colour/deleteColour/" . $colour['colour_id']); ?>')"><i class="fa fa-minus-circle fa-2x" aria-hidden="true" title="Delete Colour"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>

                        <tfoot>
                            <tr>
                                <th>Colour Name</th>
                                <th>Created ON</th>
                                <th>Updated ON</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




