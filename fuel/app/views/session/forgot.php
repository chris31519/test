<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<title>Yacht Fractions</title>
	<?php echo render('_includes'); ?>
</head>
<body>
<?php echo render('_flash_messages'); ?>
<form action="<?= Uri::create('session/forgot'); ?>" method="POST" accept-charset="utf-8">
<div style="width: 100%;" align="center"	>
<div class="widget fluid" style="width: 450px;">

    <div class="whead">
		<h6>Password Recovery</h6>
		<div class="clear"></div>
	</div>

    <div class="formRow">
Please enter your email and a new password will be sent to you.
        <div class="clear"></div>
    </div>

    <div class="formRow">
        <div class="grid3"><label>Email:</label></div>
        <div class="grid9"><input type='text' name='email' /></div>
        <div class="clear"></div>
    </div>
	<div class="whead">
		<div style='text-align: right;'>
			<button class="buttonS bGreen" style="margin: 6px 6px;">Reset Password</button>
		</div>
		<div class="clear"></div>
	</div>

</div>
</div>
</form>
<br>
