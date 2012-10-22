<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<title><?=$title;?></title>
	<?php echo render('_includes'); ?>
</head>
<body>
<div style="width: 100%; padding-top: 20px;" align="center">

	<h1><?=$title;?></h1>
	<div style="width: 80%;">
		<?php echo render('_flash_messages'); ?>
	</div>

	<?= $content; ?>

	<br>

	Chris Hawes, Yacht Fractions Ltd., PO Box 196, Falmouth, Cornwall. TR11 5WD Tel: 01326 374435 Fax 01326 374625 Email chris@yachtfractions.co.uk

	<? if($user): ?><br><a href="<?= Uri::create('session/logout'); ?>">Logout</a><? endif; ?>
</div>
