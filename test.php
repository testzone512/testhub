<!-- <style>
label,
input[type="radio"] + span,
input[type="radio"] + span::before,
label,
input[type="checkbox"] + span,
input[type="checkbox"] + span::before
{
    display: inline-block;
    vertical-align: middle;
}
 
label *,
label *
{
    cursor: pointer;
}
 
input[type="radio"],
input[type="checkbox"]
{
    opacity: 0;
    position: absolute;
}
 
input[type="radio"] + span,
input[type="checkbox"] + span
{
    font: normal 11px/14px Arial, Sans-serif;
    color: #333;
}
 
label:hover span::before,
label:hover span::before
{
    -moz-box-shadow: 0 0 2px #ccc;
    -webkit-box-shadow: 0 0 2px #ccc;
    box-shadow: 0 0 2px #ccc;
}
 
label:hover span,
label:hover span
{
    color: #000;
}
 
input[type="radio"] + span::before,
input[type="checkbox"] + span::before
{
    content: "";
    width: 12px;
    height: 12px;
    margin: 0 4px 0 0;
    border: solid 1px #a8a8a8;
    line-height: 14px;
    text-align: center;
     
    -moz-border-radius: 100%;
    -webkit-border-radius: 100%;
    border-radius: 100%;
     
    background: #f6f6f6;
    background: -moz-radial-gradient(#f6f6f6, #dfdfdf);
    background: -webkit-radial-gradient(#f6f6f6, #dfdfdf);
    background: -ms-radial-gradient(#f6f6f6, #dfdfdf);
    background: -o-radial-gradient(#f6f6f6, #dfdfdf);
    background: radial-gradient(#f6f6f6, #dfdfdf);
}
 
input[type="radio"]:checked + span::before,
input[type="checkbox"]:checked + span::before
{
    color: #666;
}
 
input[type="radio"]:disabled + span,
input[type="checkbox"]:disabled + span
{
    cursor: default;
     
    -moz-opacity: .4;
    -webkit-opacity: .4;
    opacity: .4;
}
 
input[type="checkbox"] + span::before
{
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
}
 
input[type="radio"]:checked + span::before
{
    content: "\2022";
    font-size: 30px;
    margin-top: -1px;
}
 
input[type="checkbox"]:checked + span::before
{
    content: "\2714";
    font-size: 12px;
}



input[class="blue"] + span::before
{
    border: solid 1px blue;
    background: #B2DBFF;
    background: -moz-radial-gradient(#B2DBFF, #dfdfdf);
    background: -webkit-radial-gradient(#B2DBFF, #dfdfdf);
    background: -ms-radial-gradient(#B2DBFF, #dfdfdf);
    background: -o-radial-gradient(#B2DBFF, #dfdfdf);
    background: radial-gradient(#B2DBFF, #dfdfdf);
}
input[class="blue"]:checked + span::before
{
    color: darkblue;
}



input[class="red"] + span::before
{
    border: solid 1px red;
    background: #FF9593;
    background: -moz-radial-gradient(#FF9593, #dfdfdf);
    background: -webkit-radial-gradient(#FF9593, #dfdfdf);
    background: -ms-radial-gradient(#FF9593, #dfdfdf);
    background: -o-radial-gradient(#FF9593, #dfdfdf);
    background: radial-gradient(#FF9593, #dfdfdf);
}
input[class="red"]:checked + span::before
{
    color: darkred;
}
</style>
 <label><input type="radio" checked="checked" name="radios-01" /><span>checked radio button</span></label>
 <label><input type="radio" name="radios-01" /><span>unchecked radio button</span></label>
 <label><input type="radio" name="radios-01" disabled="disabled" /><span>disabled radio button</span></label>

<br/>

 <label><input type="radio" checked="checked" name="radios-02"  class="blue" /><span>checked radio button</span></label>
 <label><input type="radio" name="radios-02" class="blue" /><span>unchecked radio button</span></label>
 <label><input type="radio" name="radios-02" disabled="disabled" class="blue" /><span>disabled radio button</span></label>

<br/>

 <label><input type="radio" checked="checked" name="radios-03"  class="red" /><span>checked radio button</span></label>
 <label><input type="radio" name="radios-03" class="red" /><span>unchecked radio button</span></label>
 <label><input type="radio" name="radios-03" disabled="disabled" class="red" /><span>disabled radio button</span></label>

<br/>
 
<label><input type="checkbox" checked="checked" name="checkbox-01" /><span>selected checkbox</span></label>
<label><input type="checkbox" name="checkbox-02" /><span>unselected checkbox</span></label>
<label><input type="checkbox" name="checkbox-03" disabled="disabled" /><span>disabled checkbox</span></label>

<br/>
 
<label><input type="checkbox" checked="checked" name="checkbox-01" class="blue" /><span>selected checkbox</span></label>
<label><input type="checkbox" name="checkbox-02" class="blue" /><span>unselected checkbox</span></label>
<label><input type="checkbox" name="checkbox-03" disabled="disabled" class="blue" /><span>disabled checkbox</span></label>

<br/>
 
<label><input type="checkbox" checked="checked" name="checkbox-01" class="red" /><span>selected checkbox</span></label>
<label><input type="checkbox" name="checkbox-02" class="red" /><span>unselected checkbox</span></label>
<label><input type="checkbox" name="checkbox-03" disabled="disabled" class="red" /><span>disabled checkbox</span></label> -->



<!-- 
<html>
<head>
<script type="text/javascript" src="table_script.js"></script>
</head>
<body>
<div id="wrapper">
<table align='center' cellspacing=2 cellpadding=5 id="data_table" border=1>
<tr>
<th>Name</th>
<th>Country</th>
<th>Age</th>
</tr>

<tr id="row1">
<td id="name_row1">Ankit</td>
<td id="country_row1">India</td>
<td id="age_row1">20</td>
<td>
<input type="button" id="edit_button1" value="Edit" class="edit" onclick="edit_row('1')">
<input type="button" id="save_button1" value="Save" class="save" onclick="save_row('1')">
<input type="button" value="Delete" class="delete" onclick="delete_row('1')">
</td>
</tr>

<tr id="row2">
<td id="name_row2">Shawn</td>
<td id="country_row2">Canada</td>
<td id="age_row2">26</td>
<td>
<input type="button" id="edit_button2" value="Edit" class="edit" onclick="edit_row('2')">
<input type="button" id="save_button2" value="Save" class="save" onclick="save_row('2')">
<input type="button" value="Delete" class="delete" onclick="delete_row('2')">
</td>
</tr>

<tr id="row3">
<td id="name_row3">Rahul</td>
<td id="country_row3">India</td>
<td id="age_row3">19</td>
<td>
<input type="button" id="edit_button3" value="Edit" class="edit" onclick="edit_row('3')">
<input type="button" id="save_button3" value="Save" class="save" onclick="save_row('3')">
<input type="button" value="Delete" class="delete" onclick="delete_row('3')">
</td>
</tr>

<tr>
<td><input type="text" id="new_name"></td>
<td><input type="text" id="new_country"></td>
<td><input type="text" id="new_age"></td>
<td><input type="button" class="add" onclick="add_row();" value="Add Row"></td>
</tr>

</table>
</div>

</body>
</html>
<script>
function edit_row(no)
{
 document.getElementById("edit_button"+no).style.display="none";
 document.getElementById("save_button"+no).style.display="block";
	
 var name=document.getElementById("name_row"+no);
 var country=document.getElementById("country_row"+no);
 var age=document.getElementById("age_row"+no);
	
 var name_data=name.innerHTML;
 var country_data=country.innerHTML;
 var age_data=age.innerHTML;
	
 name.innerHTML="<input type='text' id='name_text"+no+"' value='"+name_data+"'>";
 country.innerHTML="<input type='text' id='country_text"+no+"' value='"+country_data+"'>";
 age.innerHTML="<input type='text' id='age_text"+no+"' value='"+age_data+"'>";
}

function save_row(no)
{
 var name_val=document.getElementById("name_text"+no).value;
 var country_val=document.getElementById("country_text"+no).value;
 var age_val=document.getElementById("age_text"+no).value;

 document.getElementById("name_row"+no).innerHTML=name_val;
 document.getElementById("country_row"+no).innerHTML=country_val;
 document.getElementById("age_row"+no).innerHTML=age_val;

 document.getElementById("edit_button"+no).style.display="block";
 document.getElementById("save_button"+no).style.display="none";
}

function delete_row(no)
{
 document.getElementById("row"+no+"").outerHTML="";
}

function add_row()
{
 var new_name=document.getElementById("new_name").value;
 var new_country=document.getElementById("new_country").value;
 var new_age=document.getElementById("new_age").value;
	
 var table=document.getElementById("data_table");
 var table_len=(table.rows.length)-1;
 var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td id='name_row"+table_len+"'>"+new_name+"</td><td id='country_row"+table_len+"'>"+new_country+"</td><td id='age_row"+table_len+"'>"+new_age+"</td><td><input type='button' id='edit_button"+table_len+"' value='Edit' class='edit' onclick='edit_row("+table_len+")'> <input type='button' id='save_button"+table_len+"' value='Save' class='save' onclick='save_row("+table_len+")'> <input type='button' value='Delete' class='delete' onclick='delete_row("+table_len+")'></td></tr>";

 document.getElementById("new_name").value="";
 document.getElementById("new_country").value="";
 document.getElementById("new_age").value="";
}
</script> -->

<script type="text/javascript" src="//code.jquery.com/jquery-latest.js"></script>

<div class="my-form">
    <form role="form" method="post">
        <p class="text-box">
            <label for="box1">Box <span class="box-number">1</span></label>
            <input type="text" name="boxes[]" value="" id="box1" />
            <a class="add-box" href="#">Add More</a>
        </p>
        <p><input type="submit" value="Submit" /></p>
    </form>
</div>
<script type="text/javascript">
jQuery(document).ready(function($){
    $('.my-form .add-box').click(function(){
        var n = $('.text-box').length + 1;
        var box_html = $('<p class="text-box"><label for="box' + n + '">Box <span class="box-number">' + n + '</span></label> <input type="text" name="boxes[]" value="" id="box' + n + '" /> <a href="#" class="remove-box">Remove</a></p>');
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
<!-- 
<form role="form" method="post">
    <?php
    $data='a:3:{i:0;s:14:"Value in Box 1";i:1;s:7:"Value 2";i:2;s:11:"Box 3 Value";}';
    if( !empty( $data ) )
    {
        foreach( unserialize($data) as $key => $value ) :
    ?>
            <p class="text-box">
                <label for="box<?php echo $key + 1; ?>">Box <span class="box-number"><?php echo $key + 1; ?></span></label>
                <input type="textl" name="boxes[]" id="box<?php echo $key + 1; ?>" value="<?php echo $value; ?>" />
                <?php echo ( 0 == $key ? '<a href="#" class="add-box">Add More</a>' : '<a href="#" class="remove-box">Remove</a>' ); ?>
            </p>
    <?php
        endforeach;
    }
    else
    {
    ?>
        <p class="text-box">
            <label for="box1">Box <span class="box-number">1</span></label>
            <input type="text" name="boxes[]" value="" id="box1" />
            <a class="add-box" href="#">Add More</a>
        </p>
    <?php
    }
    ?>
    <p><input type="submit" value="Submit" /></p>
</form>
<script>
$('.my-form .add-box').click(function(){
    var n = $('.text-box').length + 1;
    if( 5 < n ) {
        alert('Stop it!');
        return false;
    }
    var box_html = $('<p class="text-box"><label for="box' + n + '">Box <span class="box-number">' + n + '</span></label> <input type="text" name="boxes[]" value="" id="box' + n + '" /> <a href="#" class="remove-box">Remove</a></p>');
    box_html.hide();
    $('.my-form p.text-box:last').after(box_html);
    box_html.fadeIn('slow');
    return false;
});
if( 5 < count( $_POST['boxes'] ) )
{
    echo 'Your error message here';
    exit;
}
</script> -->