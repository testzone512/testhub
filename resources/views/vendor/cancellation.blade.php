@include('layout.header')

<style type="text/css">
    .thnx
    {
        font-size: 60px;
        font-weight: bold;
    }
    .message
    {
        font-size: 18px;
        fon-weight: bold;
    }
</style>

<div class="container">
    <div class="form-group row">
        <div class="col-sm-12">
            <center><img src="<?php echo url('public/front/images/cancellation.png'); ?>" class="img-responsive"></center>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <center><h1 class="thnx">Sorry For Inconvenience</h1></center>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <center><h1 class="message">Your Payment is Cancelled Please Contact to Site Management</h1></center>
        </div>
    </div>

</div>

@include('layout.footer')