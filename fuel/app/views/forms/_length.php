<div class="formRow">
    <div class="grid3"><label><?= $field->label; ?></label></div>
    <div class="grid9 noSearch" align="left">
		<input type='text' class="required number" name="<?=$field->tag;?>" style='width: 45px;' value="<?=$value;?>" />
		<select class='select required' name="<?=$field->tag;?>_unit" style="width: 100px;">
				<option value="m">Metres</option>
				<option value="ft">Feet</option>
		</select>
	</div>
	 <div class="clear"></div>
</div>
