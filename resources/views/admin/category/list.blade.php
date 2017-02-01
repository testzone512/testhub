<script type="text/javascript">
    $(document).ready(function () {
        $('#categoryData').DataTable({
            'sPaginationType':'full_numbers' ,
            "bStateSave"	: true
        });
    });
</script>

<script type="text/javascript">

    function deleteConfirm(url)
    {
        if(confirm('Do you wish to Delete?'))
        {
            window.location.href=url;
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
                    <h1>List Category</h1>
                </div>
            </div>
        </div>
    </div><!-- row END -->
</div>

<div class="form-group">
    <div class="row"><!-- row START -->
        <div class="col-lg-12">
            <?php if(Session::get('admin_sess_is_admin')==1){ ?>
            <a href="{{ url('/admin/category/add')}}" class="btn btn-primary btn-quirk btn-stroke pull-right">Add Category</a>
            <?php } ?>
        </div>
    </div><!-- row END -->
</div>

<div class="form-group">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-bordered" id="categoryData">
                        <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Parent Category</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($categoryDetails as $category) { ?>
                        <tr>
                            <td><?php echo $category['category_name']; ?></td>
                            <td><?php echo $arrParentCat[$category['category_parent_id']]; ?></td>
                            <td>
                                <?php if(Session::get('admin_sess_is_admin')==1){ ?>
                                <a href="{{ url('/admin/category/edit/') }}<?php echo '/'.$category["category_id"]; ?>"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a>&emsp;
                                <a href="#" onclick="javascript : deleteConfirm('{{ url("/admin/category/delete/")}}<?php echo '/'.$category['category_id']?>')"><i class="fa fa-minus-circle fa-2x" aria-hidden="true"></i></a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>

                        <tfoot>
                        <tr>
                            <th>Category Name</th>
                            <th>Parent Category</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




