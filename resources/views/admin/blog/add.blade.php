<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="<?php echo url('public/admin/ckeditor/ckeditor.js'); ?>"></script>
    <!--script src="<?php echo url('public/admin/js/jquery.validation.js');?>"></script-->
    <script type="text/javascript">
        $(document).ready(function(){ // jQuery DOM ready function.
            $("#frmBlog").validate({
                rules:{
                    txtBlogImage:
                    {
                        required:true
                    },
                    txtBlogTitle:
                    {
                        required: true
                    }

                },
                messages:
                {
                    txtBlogImage:
                    {
                        required:'Please Upload Image'
                    },
                    txtBlogTitle:
                    {
                        required: ''
                    }
                }
            });
        });
    </script>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                $(input.files).each(function () {
                    var reader = new FileReader();
                    reader.readAsDataURL(this);
                    reader.onload = function (e) {
                        //document.getElementById('gi').insertBefore('');
                        $("#gi").append("<img class='thumb' src='" + e.target.result + "'>");
                    }
                });
            }
        }
    </script>
    <style>
        .thumb{ width:50px; height:50px;}
        input.error, textarea.error, select.error { border-color:#FF0000; }
    </style>


</head>
<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Add Blog</h1>
    </div>
    <!-- end  page header -->
</div>

<div class="form-group">
    <div class="row"><!-- row START -->
        <div class="col-lg-12">
            <a href="<?php echo url('admin/blog'); ?>" class="btn btn-primary btn-quirk btn-stroke">Back to Blog List</a>
        </div>
    </div><!-- row END -->
</div>


<div class="panel panel-default">
    <!--<div class="panel-heading">User</div>-->
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">
                <form method="post" name="frmBlog" id="frmBlog" action="{{ url('/admin/blog/add') }}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="galleryImage" class="control-label">Blog Image : </label>
                        </div>
                        <div class="col-sm-5">
                            <input type="file" name="BlogImage" id="BlogImage" onchange="readURL(this)">
                            <span id="gi"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="galleryImage" class="control-label">Title : </label>
                        </div>
                        <div class="col-sm-5">
                            <input type="text" name="txtBlogTitle" id="txtBlogTitle" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="galleryImage" class="control-label">Description : </label>
                        </div>
                        <div class="col-sm-9">
                                <textarea name="editor1" id="editor1" class="form-control"></textarea>
                            <script>
                                CKEDITOR.replace( 'editor1' );
                            </script>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                        </div>
                        <div class="col-sm-3">
                            <input type="submit" name="btnAdd" id="btnAdd" value="Save Blog" class="btn btn-primary btn-quirk btn-stroke">
                        </div>
                    </div>
                </div>




                </form>


                        <!-- End Form Elements -->
            </div>
        </div>
    </div>
</div>
</html>