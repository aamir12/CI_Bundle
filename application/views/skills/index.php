<!DOCTYPE html>
<html lang="en-US">
<head>
<title>CodeIgniter Autocomplete Textbox by CodexWorld</title>
<meta charset="utf-8">

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
$(function() {
    $("#skill_input").autocomplete({
        source: "<?php echo base_url('skills/autocompleteData'); ?>",
        select: showtextlb,
        change: showtextlb,
        focus:  showtextlb
    });

    function showtextlb( event, ui ) {
            event.preventDefault();
            $("#skill_input").val(ui.item.value);
            $("#id").val(ui.item.id);
        }
});
</script>

<style type="text/css">
input{height: 25px; font-size: 16px;}
</style>
</head>
<body>
<div class="container">
	<h4>Autocomplete Input for Skills Search</h4>
	<p>Your Skills: <input type="text" name="skill_input" id="skill_input"/>
    <input type="text" id="id" name="id">
	</p>
</div>
</body>
</html>