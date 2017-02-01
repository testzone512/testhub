<meta name="viewport" content="width=device-width, initial-scale=1" xmlns="http://www.w3.org/1999/html">
<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable({
            'sPaginationType':'full_numbers' ,
            "bStateSave"	: true
        });
    });
</script>
<!-- start ajax_user_active_inactive -->
<script>
    function ajax_user_active_inactive(Action,UserId)
    {
        if(Action != "" && UserId !="")
        {
            $.ajax({
                type: "POST",
                url: "<?php echo url('/admin/user/ajax_user_active_inactive'); ?>",
                data: {"_token": "{{ csrf_token() }}",Action: Action, UserId : UserId},
                dataType: 'text',
                success: function (data)
                {
                    //alert(data);
                    if(data == 'Active')
                    {
                        alert('User Inactivated Successfully');
                        location.reload(true);
                    }
                    else if(data == 'Inactive')
                    {
                        alert('User Activated Successfully');
                        location.reload(true);
                    }
                }
            });


        }

    }
</script>
<!-- start ajax_user_active_inactive -->
<script type="text/javascript">

    function active_confirm(Action,UserId)
    {
        if(confirm('Do you wish to Active?'))
        {
            ajax_user_active_inactive(Action,UserId);
        }
    }
</script>

<script type="text/javascript">

    function inactive_confirm(Action,UserId)
    {
        if(confirm('Do you wish to InActive?'))
        {
            ajax_user_active_inactive(Action,UserId);
        }
    }
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
        <h1 class="page-header">List User</h1>
    </div>
    <!-- end  page header -->
</div>

<div class="form-group">
    <div class="row"><!-- row START -->
        <div class="col-lg-11">
            &nbsp;
        </div>
        <div lass="col-lg-1">
            <!--a  href="<?php echo url('admin/user/add'); ?>"  class="btn btn-primary btn-quirk btn-stroke">Add Cms </a-->
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
                        <table class="table table-striped table-bordered " id="example">
                            <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Create</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <?php
                                //echo"<pre>"; print_r($userDetails); die;
                            $i = 1;
                            foreach ($userDetails as $user)
                            {
                            if ($user['activation_pending'] == 0)
                            {
                                $statuschk = 'Inactive';
                            } elseif ($user['activation_pending'] == 1)
                            {
                                $statuschk = 'Active';
                            }
                            ?>
                            <tr class="gradeA">
                                <td><?php echo $i; ?></td>
                                <td><?php if($user['profile_pic']) { ?>
                                    <img width="50" src="<?php echo url('public/upload/profile').'/'.$user['profile_pic'];?>" alt="" class="media-object img-circle">
                                    <?php } else { ?>
                                    <img src="<?php echo url('public/upload/profile').'/'.$user['profile_pic'];?>" alt="No Profile Image" class="media-object img-circle">
                                    <?php } ?>
                                </td>
                                <td><?php $data = explode(' ',$user['name']) ; if(!empty($data[0])){ echo ucfirst($data[0]); }?>&nbsp;<?php if(!empty($data[1])){ echo ucfirst($data[1]); }?></td>
                                <td><?php echo $user['email']; ?></td>
                                <td><?php echo $user['created_at']; ?></td>
                                <td>
                                    <a title="View User" href="<?php echo url('admin/user/view').'/'.$user['id']; ?>"><i class="fa fa-eye fa-2x" aria-hidden="true"></i></a>

                                    <?php
                                    if(Session::get('admin_sess_is_admin')==1)
                                    {
                                    if ($statuschk == 'Inactive')
                                    {
                                    ?>
                                    <a title="Deactive User" href="javascript:void(0)" onclick="javascript : active_confirm('<?php echo $statuschk; ?>',<?php echo $user['id']; ?>)" class="ActiveInactive" style="text-decoration:none; color:#FF0000">
                                        <i class="fa fa-circle fa-2x" aria-hidden="true"></i></a>
                                    <!--<a href="<?php //echo base_url(); ?>admin/user/inactiveuser/<?php //echo $user['ID']; ?>" style="text-decoration:none; color:#FF0000"> <img src="<?php //echo base_url(); ?>assets/admin/img/inactive.png"/> </a>-->
                                    <?php
                                    }
                                    else
                                    { ?>
                                    <a title="Active User" href="javascript:void(0)" onclick="javascript : inactive_confirm('<?php echo $statuschk; ?>',<?php echo $user['id']; ?>)"  class="ActiveInactive" style="text-decoration:none; color:#4cae4c">
                                        <i class="fa fa-circle fa-2x" aria-hidden="true"></i></a>
                                    <!--<a href="<?php //echo base_url(); ?>admin/user/inactiveuser/<?php //echo $user['ID']; ?>" style="text-decoration:none; color:#FF0000"> <img src="<?php //echo base_url(); ?>assets/admin/img/inactive.png"/> </a>-->
                                    <?php
                                    }
                                    }
                                    ?>

                                    <?php if(Session::get('admin_sess_is_admin')==1)
                                    { ?>
                                    <a title="Delete User"  href="#" onclick="javascript : deleteConfirm('<?php echo url('admin/user/delete'); ?>.'/'.<?php echo $user['id']; ?>')" style="text-decoration:none;"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
                                    <?php
                                    } ?>
                                </td>
                            </tr>
                            <?php $i++; } ?>

                            <tfoot>
                            <tr>
                                <th>Sr No.</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Create</th>
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
