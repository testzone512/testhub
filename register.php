<?php include('header.php'); ?>

<div class="container">
	<div class="reg-main-cont">
		<div class="row register-head">
			<div class="col-sm-3 col-xs-3 register-main-head">
				<img src="images/Clothesloop Website-1.jpg" class="img-responsive" alt="">
			</div>
			<div class="col-sm-9 col-xs-9 register-head-content">
				<h1 class="register-content-head poppinssemibold">Curabitur ullamcorper dolor maximus nulla pretium, vitae pretium.</h1>
				<h5 class="register-sub-content poppinsregular">Phasellus quis neque et ante porta ultricies eu quis est. Curabitur ullamcorper dolor maximus nulla pretium, vitae pretium metus porta. Nam laoreet efficitur urna, sed varius nisi..</h5>
			</div>
		</div>
		<div class="row">
			<div class="register-form">
				<h3 class="register-form-head poppinssemibold">REGISTER YOUR ACCOUNT</h3>
				<div class="register-line"></div>
			</div>
			<div class="col-sm-6 col-xs-9 register-textbox first-details">
				<label class="register-form-label poppinsregular">FIRST NAME</label>
				<input type="text" name="" value="" class="form-control">
			</div>
			<div class="col-sm-6 col-xs-9 register-textbox">
				<label class="register-form-label poppinsregular">LAST NAME</label>
				<input type="text" name="" value="" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-xs-9 register-textbox first-details">
				<label class="register-form-label poppinsregular">EMAIL</label>
				<input type="text" name="" value="" class="form-control">
			</div>
			<div class="col-sm-6 col-xs-9">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-xs-9 register-textbox first-details">
				<label class="register-form-label poppinsregular">YOUR MAIN ADDRESS LINE 1</label>
				<input type="text" name="" value="" class="form-control">
			</div>
			<div class="col-sm-6 col-xs-9 register-textbox">
				<label class="register-form-label poppinsregular">ADDRESS LINE 2</label>
				<input type="text" name="" value="" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-xs-9 register-textbox first-details">
				<label class="register-form-label poppinsregular">SUBURB</label>
				<input type="text" name="" value="" class="form-control">
			</div>
			<div class="col-sm-6 col-xs-9 register-textbox">
				<label class="register-form-label poppinsregular">POSTCODE</label>
				<input type="text" name="" value="" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-xs-9 register-textbox first-details">
				<label class="register-form-label poppinsregular">COUNTRY</label>
				<input type="text" name="" value="" class="form-control">
			</div>
			<div class="col-sm-6 col-xs-9">
			</div>
		</div>
		<div class="row">
			<div class="register-line"></div>
			<div class="col-sm-6 col-xs-9 register-textbox first-details">
				<h3 class="poppinssemibold">RESGISTER YOUR GARMENT</h3>
				<h5 class="poppinsregular">Your garment ID is located on the Tag on the side of your garment</h5>
			</div>
			<div class="col-sm-6 col-xs-9">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-9 col-xs-9 first-details register-id-num">
				<label class="poppinsregular">1. ID NUMBER</label>
				
				<div class="my-form">
					<form role="form" method="post">
						<p class="text-box">
							<input type="text" name="boxes[]" value="" class="form-control" id="box1" />
							<button class="add-box poppinssemibold" >ADD ANOTHER +</button>
						</p>
					</form>
				</div>
			</div>
			<div class="col-sm-3 col-xs-9">
			</div>
		</div>
		<div class="row">
			<div class="register-line"></div>
			<div class="col-sm-12 col-xs-9 register-questions first-details">
				<h3 class="question-form poppinssemibold">QUESTIONS</h3>
				<h5 class="question-first-label poppinsregular">In the event of a Face-to-face swap with another customer, how far are you willing to travel to conduct a transaction?</h5>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-xs-9 first-details">
				<div class="row">
					<div class="col-sm-12 col-xs-9 register-textbox">
						<select name="">
							<option selected="selected" > <2km </option>
							<option> <4km </option>
							<option> <6km </option>
							<option> <8km </option>
							<option> <10km </option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-xs-9 register-textbox">
						<h5 class="label-name poppinsregular" >(Optional) What location would you prefer to meet your match?</h5>
						<input type="text" name="" value="" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-xs-9 register-textbox">
						<h5 class="label-name poppinsregular" >How did you learn about The Clothes Loop?</h5>
						<select name="">
							<option selected="selected" > Friends & family </option>
							<option> Office Staff </option>
							<option> Internet </option>
							<option> Other </option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-xs-9 label-name">
						<label ><input type="checkbox" name="checkbox-01" /><span class="poppinsregular">Yes I want to be notifed of our platform launch</span></label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-xs-9 label-name">
						<label class="poppinsregular"><input type="checkbox" name="checkbox-01" /><span>Yes I want to subscribe to the mailing list</span></label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-xs-9 register-form-submit">
						<button class="label-name poppinssemibold" >SUBMIT</button>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-9"></div>
		</div>
	</div>
</div>
<script type="text/javascript">
jQuery(document).ready(function($){
    $('.my-form .add-box').click(function(){
        var n = $('.text-box').length + 1;
        var box_html = $('<p class="text-box"> <input type="text" class="form-control" name="boxes[]" value="" id="box' + n + '" /> <button class="remove-box">Remove</button></p>');
        box_html.hide();
        $('.my-form p.text-box:last').after(box_html);
        box_html.fadeIn('slow');
        return false;
    });
});

$('.my-form').on('click', '.remove-box', function(){
    $(this).parent().css( 'background-color', '#FF6C6C' );
    $(this).parent().fadeOut("slow", function() {
        $(this).remove();
        $('.box-number').each(function(index){
            $(this).text( index + 1 );
        });
    });
    return false;
});

</script>
<?php include('footer.php'); ?>