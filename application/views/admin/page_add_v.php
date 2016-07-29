<script type="text/javascript" src="<?php echo config_item('ckeditor');?>/ckeditor.js"></script>
<?php global_message();?>
<?php
	$isEdit = isset($pages) ? true : false;
	$text = empty($isEdit) ? 'Add' : 'Update';
	$selected = 'selected="selected"';
?>

<form id="newForm" method="post">
<table border="0" cellpadding="0" cellspacing="0"  id="id-form" width="100%">
	<tr>
		<th width="18%" valign="top">Page Title:</th>
	  	<td width="82%">
	  		<input type="text" name="title" class="inp-form required" value="<?php if($isEdit) echo $pages->title;?>" />
	  </td>
		<td width="0%"></td>
	</tr>
	<tr>
		<th width="18%" valign="top">Page Slug:</th>
	  	<td width="82%">
	  		<input type="text" name="slug" class="inp-form required" value="<?php if($isEdit) echo $pages->slug;?>" />
	  </td>
		<td width="0%"></td>
	</tr>
	<tr>
		<th valign="top">Page Content:</th>
		<td><textarea name="content" class="form-textarea required ckeditor" ><?php if($isEdit) echo $pages->content;?></textarea></td>
	</tr>
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" name="submit_page" value="submitPage" class="form-submit" />
			<input type="button" value="" class="form-reset" onclick="document.location.href='<?=admin_url('page')?>'" />		
		</td>
		<td></td>
	</tr>
</table>
</form>


<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="<?php echo config_item('admin_js');?>jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(document).pngFix();
	
	$.validator.messages.required = '';
	$('#newForm').validate();
});
</script>
