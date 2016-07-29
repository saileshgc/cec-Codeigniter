<?php global_message();?>
<?php
	$isEdit = isset($client) ? true : false;
	$text = empty($isEdit) ? 'Add' : 'Update';
	$selected = 'selected="selected"';
?>

<form id="newForm" method="post" enctype="multipart/form-data">
<table border="0" cellpadding="0" cellspacing="0"  id="id-form" width="100%">
	<tr valign="top">
		<td colspan="3">
			<div id="step-holder">
				<div class="step-no">1</div>
				<div class="step-dark-left"><a href="javascript:;">Business Details</a></div>
				<div class="step-dark-round">&nbsp;</div>
				<div class="clear"></div>
			</div>		
		</td>
	</tr>
	<tr>
		<th width="18%" valign="top">Business Name:</th>
	  	<td width="82%">
	  		<input type="text" name="business_name" class="inp-form required" value="<?php if($isEdit) echo $client->business_name;?>" />
	  </td>
	</tr>
	<tr>
		<th width="18%" valign="top">State:</th>
	  	<td width="82%">
			<?php $client_id = !empty($isEdit) ? $client->business_state_id : NULL;?>
	  		<?php select_states('business_state_id', $client_id, NULL);?>		
		</td>
	</tr>
	<tr>
		<th width="18%" valign="top">Email:</th>
	  	<td width="82%">
	  		<input type="text" name="business_email" class="inp-form email" value="<?php if($isEdit) echo $client->business_email;?>" />
	  </td>
	</tr>
	<tr>
		<th width="18%" valign="top">Address:</th>
	  	<td width="82%">
	  		<input type="text" name="business_city_address" class="inp-form" value="<?php if($isEdit) echo $client->business_city_address;?>" />
	  </td>
	</tr>
	<tr>
		<th width="18%" valign="top">PostCode:</th>
	  	<td width="82%">
	  		<input type="text" name="business_postcode" class="inp-form" value="<?php if($isEdit) echo $client->business_postcode;?>" />
	  </td>
	</tr>
	
	<!--<tr>
		<th width="18%" valign="top">Website:</th>
	  	<td width="82%">
	  		<input type="text" name="business_website" class="inp-form url" value="<?php if($isEdit) echo $client->business_website;?>" />
	  </td>
	</tr>-->
	<tr>
		<th width="18%" valign="top">Phone:</th>
	  	<td width="82%">
	  		<input type="text" name="business_phone" class="inp-form" value="<?php if($isEdit) echo $client->business_phone;?>" />
	  </td>
	</tr>
	<tr>
		<th width="18%" valign="top">Mobile:</th>
	  	<td width="82%">
	  		<input type="text" name="business_mobile" class="inp-form" value="<?php if($isEdit) echo $client->business_mobile;?>" />
	  </td>
	</tr>
	<tr>
		<td colspan="3">
			<div id="step-holder">
				<div class="step-no">2</div>
				<div class="step-dark-left"><a href="javascript:;">Login Details</a></div>
				<div class="step-dark-round">&nbsp;</div>
				<div class="clear"></div>
			</div>		
		</td>
	</tr>
	<tr>
		<th width="18%" valign="top">Username:</th>
	  	<td width="82%">
	  		<input type="text" name="username" class="inp-form" value="<?php if($isEdit) echo $client->username;?>" />
	  </td>
	</tr>
	<tr>
		<th valign="top">Password:</th>
		<td>
	  		<input type="password" name="password" id="password" class="inp-form <?php if(!$isEdit) echo 'required';?>" value="" />
		</td>
	</tr>
	<tr>
		<th width="18%" valign="top">Confirm Password:</th>
	  	<td width="82%">
	  		<input type="password" name="confirm_password" class="inp-form" value="" />
	  </td>
	</tr>
	<tr>
		<th valign="top">Status</th>
		<td>
			<select name="status" id="" class="styledselect-day" style="width:100px;">
				<option value="enabled" <?php if($isEdit){ if($client->status == 'enabled') echo $selected;}?>>Enabled</option>
				<option value="disabled" <?php if($isEdit){ if($client->status == 'disabled') echo $selected;}?>>Disabled</option>
			</select>
		</td>
	</tr>
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" name="submit_client_info" value="submitDeal" class="form-submit" />
			<input type="button" value="" class="form-reset" onclick="document.location.href='<?=filter_url('edit')?>'" />		
		</td>
		<td width="0%"></td>
	</tr>
</table>
</form>


<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="<?php echo config_item('admin_js');?>jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(document).pngFix();
	
	$.validator.messages.required = '';
	$.validator.messages.url = 'Enter valid URL (eg: http://www.pickplanplay.com)';
	$('#newForm').validate({
		rules:{
			username: {
				minlength: 5
			},
			password: {
				minlength: 5
			},
			confirm_password: {
				minlength: 5,
				equalTo: "#password"
			}
			<?php if(!$isEdit) : ?>
			,
			business_email: {
				required: true,
				email: true,
				remote: '<?php echo admin_url('client/authenticate_client_email');?>'
			}
			<?php endif; ?>
		},
		messages:{
			username: {
				minlength: "Username must consist of at least 5 characters"
			},
			password: {
				minlength: "Password must be at least 5 characters long"
			},
			confirm_password: {
				equalTo: "Please Confirm the password"
			}
		}
	});
});
</script>
