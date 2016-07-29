<?php global_message();?>
<?php
	$isEdit = isset($member) ? true : false;
	$text = empty($isEdit) ? 'Add' : 'Update';
	$selected = 'selected="selected"';
?>

<form id="newForm" method="post" enctype="multipart/form-data">
<table border="0" cellpadding="0" cellspacing="0"  id="id-form" width="100%">
	<tr>
		<th width="18%" valign="top">Member Name:</th>
	  	<td width="39%">
	  		<input type="text" name="name" class="inp-form required" value="<?php if($isEdit) echo $member->name;?>" />
		</td>
		<td width="43%"></td>
	</tr>
	<tr>
		<th width="18%" valign="top">Email:</th>
	  	<td width="39%">
	  		<input type="text" name="email" class="inp-form required email" value="<?php if($isEdit) echo $member->email;?>" />
		</td>
		<td width="43%"></td>
	</tr>
	<tr>
		<th width="18%" valign="top">State:</th>
	  	<td width="39%">
			<?php if($isEdit) $state_id = $member->state_id; else $state_id = NULL;?>
			<?php select_states('state_id', $state_id, NULL);?>
		</td>
		<td width="43%"></td>
	</tr>
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" name="submit_member_info" value="submitDeal" class="form-submit" />
			<input type="button" value="" class="form-reset" onclick="document.location.href='<?=filter_url('edit')?>'" />		
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
