<script type="text/javascript">

function replace_tag(label)
{
	var label = label.split(" ").join("_").replace(/\W/g, '').toLowerCase();

	$("input[name=tag]").val(label);
}

var selected_options = [];
</script>
<?= render('settings/_nav'); ?>

<form action="<?= Uri::create('formfieldbuyer/edit/'.$field->id); ?>" method="POST" accept-charset="utf-8">
<div class="widget fluid">

    <div class="whead">
		<h6>Edit Form Field</h6>
		<div style='text-align: right'>
			<a href="<?= Uri::create('formfield'); ?>"><button class="buttonS bRed" style="margin: 6px 6px;">Back</button></a>
		</div>
		<div class="clear"></div>
	</div>

    <div class="formRow">
        <div class="grid3"><label>Label:</label></div>
        <div class="grid9"><input type='text' name='label' value="<?=$field->label;?>"/>
			<span>This is the label for the field which will be displayed to the users.
			</span></div>
        <div class="clear"></div>
    </div>

    <div class="formRow">
        <div class="grid3"><label>Tag:</label></div>
        <div class="grid9"><input type='text' name='tag' value="<?=$field->tag;?>" />
			<span>Value should contains NO spaces or non alpha-numeric characters. This is a technical field used by the program but whose value will not be displayed to the user. A value is automatically generated, do not modify if you are not sure of its meaning.
			</span>
		</div>
        <div class="clear"></div>
    </div>

    <div class="formRow">
        <div class="grid3"><label>Type:</label></div>
        <div class="grid9 noSearch">
			<select class="select" onchange="select_type(this.value)" name="type">
					<option value="text" <?if($field->type == "text"):?>selected="yes"<?endif;?>>Single line text field</option>
					<option value="textarea" <?if($field->type == "textarea"):?>selected="yes"<?endif;?>>Mutli line text field</option>
					<option value="text_fraction" <?if($field->type == "text_fraction"):?>selected="yes"<?endif;?>>Single line text field for fractions (i.e. share size)</option>
					<option value="dropdown" <?if($field->type == "dropdown"):?>selected="yes"<?endif;?>>Dropdown box</option>
					<option value="dropdown" <?if($field->type == "other"):?>selected="yes"<?endif;?>>Other</option>
			</select>
		</div>
        <div class="clear"></div>
    </div>

    <div class="formRow" id="textarea">
        <div class="grid3"><label>Description:</label></div>
        <div class="grid9">
			<textarea name='description'><?=$field->description;?></textarea>
		</div>
        <div class="clear"></div>
    </div>

	<? if($field->type == 'textarea'): ?>
    <div class="formRow" id="textarea">
        <div class="grid3"><label># of rows:</label></div>
        <div class="grid9">
			<input type='text' name='rows' style="width: 50px;" />
		</div>
        <div class="clear"></div>
    </div>
	<? else: ?>
    <div class="formRow" id="textarea">
        <div class="grid3"><label>Options:</label></div>
        <div class="grid9">
			<textarea name='options'><?=$field->options;?></textarea>
		</div>
        <div class="clear"></div>
    </div>
	<? endif; ?>

    <div class="formRow" id="public">
        <div class="grid3"><label>Publicly viewable?</label></div>
        <div class="grid9">
			<input type="checkbox" name="public" <?if($field->public):?>checked="yes"<?endif;?> />
			<span class="note">Do you want the data users enter into this field to be viewable to the public?</span>
		</div>
        <div class="clear"></div>
    </div>

    <div class="whead">
		<h6 style="opacity: 0.0;">-</h6>
		<div style='text-align: right'>
			<button class="buttonS bGreen" style="margin: 6px 6px;">Update</button>
		</div>
		<div class="clear"></div>
    </div>

</div>
</form>
