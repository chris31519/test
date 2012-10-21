<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<title>Yacht Fractions</title>
	<?php echo render('_includes'); ?>
</head>
<body>
<?php echo render('_flash_messages'); ?>
<script type="text/javascript">
var shares = <?= $json_shares; ?>

function select_share()
{
	id = $('#interested_boats').val();

	if(id)
	{
		$("#selected_shares").show();
		$("#selected_shares_content").append(shares[id]+"<br>");
		$("#boats_interest").val($("#boats_interest").val()+id+",");
	}
}

$(document).ready(function(){
	$("#create_form").validate();
});

function save_form()
{
	var saved_form = $("#create_form").serializeArray();

	var request = $.ajax({
		url: "<?=Uri::create('session/save_form');?>",
		type: "POST",
		data: { form : saved_form},
		success: function(data) {
			$("#text_bar").html(data);
			//setTimeout(function(){ save_form(); },3000);
		}
	});
}
</script>

<form action="<?= Uri::create('buyer/handle_post'); ?>" method="POST" accept-charset="utf-8" id="create_form">
<input type="hidden" name="insert" value="1" />
<input type="hidden" name="form_type" value="buyer">

<div style="width: 100%;" align="center"	>
<div class="widget fluid" style="width: 80%;">

    <div class="whead">
		<h6>Buyer Enquiry Form</h6>
		<div style="text-align: right">
			<span id="text_bar">
			</span>
			<button class="buttonS bGreen" style="margin: 6px 6px;" onclick="save_form()" type="button">Save for Later</button>
		</div>
		<div class="clear"></div>
	</div>

<? foreach($fields_search as $field): ?>

	<? if($field->type == 'text'): ?>
		<?= render('forms/_text',array('field'=>$field,'value'=>$saved_form_data[$field->tag]),false); ?>
	<? elseif($field->type == 'dropdown'): ?>
		<?= render('forms/_dropdown',array('field'=>$field,'value'=>$saved_form_data[$field->tag]),false); ?>
	<? elseif($field->type == 'textarea'): ?>
		<?= render('forms/_textarea',array('field'=>$field,'value'=>$saved_form_data[$field->tag]),false); ?>
	<? elseif($field->type == 'text_fraction'): ?>
		<?= render('forms/_text_fraction',array('field'=>$field,'value'=>array('num' =>$saved_form_data[$field->tag.'_num'],'den' => $saved_form_data[$field->tag.'_den'])),false); ?>
	<? elseif($field->type == 'length'): ?>
		<?= render('forms/_length',array('field'=>$field,'value'=>$saved_form_data[$field->tag]),false); ?>
	<? endif; ?>

<? endforeach; ?>

    <div class="formRow">
        <div class="grid3"><label>Specifiy boats which interest you</label></div>
        <div class="grid9 searchDrop" align="left">
			<select name="" class="select" id="interested_boats">
				<option value="">Select</option>
				<? foreach($yachtshares as $share): ?>
					<option value="<?= $share->id; ?>"><?= $share->name; ?></option>
				<? endforeach; ?>
			</select>
			<button class="buttonS bBlue" style="margin: 6px 6px;" type="button" onclick="select_share()">Add</button>
		</div>
        <div class="clear"></div>
    </div>

	<div class="formRow" id="selected_shares" style="display: none;">
	    <div class="grid3"><label>Selected Boats</label></div>
	    <div class="grid9" id="selected_shares_content" align="left">
		</div>
		<input type="hidden" name="boats_interest" id="boats_interest" />
	    <div class="clear"></div>
	</div>

	<div class="whead">
		<h6 style="opacity: 0.0;">-</h6>
		<div style='text-align: right;'>
			<button class="buttonS bGreen" style="margin: 6px 6px;" type="submit">Submit</button>
		</div>
		<div class="clear"></div>
	</div>
</div>
