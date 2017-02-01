<meta name="viewport" content="width=device-width, initial-scale=1" xmlns="http://www.w3.org/1999/html">
<script type="text/javascript">
    $(document).ready(function () {
        $('#blog').DataTable({
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
<style>
    .error{color:red; border:1px solid #FF0000;}
</style>
<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">List Blog</h1>
    </div>
    <!-- end  page header -->
</div>

<div class="form-group">
    <div class="row"><!-- row START -->
        <div class="col-sm-12">
            <?php if(Session::get('admin_sess_is_admin')==1){ ?>
            <a href="<?php echo url('admin/blog/add'); ?>" class="btn btn-primary btn-quirk btn-stroke pull-right">Add Blog</a>
            <?php } ?>
        </div>
    </div><!-- row END -->
</div>

<div class="form-group">
    <div class="row">
        <div class="col-lg-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <!--div class="panel-heading"> </div -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="blog">
                            <thead>
                            <tr>
                                <th>Blog Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 1;
                            foreach ($blogDetails as $blog) { ?>
                            <tr>
                                <td>
                                    <?php if($blog['blog_image']!='') { ?>
                                    <img src="<?php echo url('public/upload/blog/thumb').'/'.$blog['blog_image'];?>" width="100" align="left"/>
                                    <?php } else { ?>
                                    <img src="<?php echo url('public/upload/gallery/thumb/noPreview.png');?>" width="100" align="left"/>
                                    <?php } ?>
                                </td>

                                <td><?php echo $blog['blog_title']; ?></td>
                                <td><?php echo substr($blog['blog_description'],0,30); ?></td>
                                <td>
                                    <a title="View Product" href="<?php echo url('admin/blog/view').'/'.$blog['blog_id']; ?>"><i class="fa fa-eye fa-2x" aria-hidden="true"></i></a>&emsp;
                                    <?php if(Session::get('admin_sess_is_admin')==1){ ?>
                                        <a href="<?php echo url('admin/blog/edit').'/'.$blog["blog_id"];?>"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a>&emsp;
                                    <?php } ?>
                                    <?php if(Session::get('admin_sess_is_admin')==1){ ?>
                                        <a href="#" onclick="javascript : deleteConfirm('<?php echo url("/admin/blog/delete/").'/'.$blog['blog_id']; ?>')"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Blog Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>

                        </table>
                        <?php //echo @$links; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
