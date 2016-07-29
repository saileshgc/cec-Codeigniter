<style>
#settingForm label
{
	width:100%;
}

.desc {
	font-style:italic;
	color:#996600;
	font-size:11px;
}
.field{
	padding-left: 20px;
}
</style>
<?php global_message();?>
<form id="newForm" method="post">
<table border="0" cellpadding="0" cellspacing="0"  id="id-form" width="100%">
	<?php foreach($settings as $setting): ?>
	<tr>
    	<th width="13%">
        	<label><?php echo $setting->title;?></label>
	  </th>
		<td width="24%">
            <div class="field">
            	<input type="<?php echo $setting->type;?>" name="<?php echo $setting->slug;?>" class="inp-form" value="<?php if(empty($setting->value)) echo $setting->default; else echo $setting->value;?>" />
            </div>
	  </td>
		<td width="63%">
            <div class="desc"><?php echo $setting->description;?></div>
      </td>
    </tr>
	<?php endforeach; ?>
	<tr>
		<th><input type="submit" name="submit_setting" value="submitSetting" class="form-submit" /></th>
		<td valign="top">&nbsp;
			
		</td>
		<td>&nbsp;</td>
	</tr>
</table>
</form>
