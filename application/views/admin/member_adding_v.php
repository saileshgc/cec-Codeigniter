<link rel="stylesheet" href="<?php echo config_item('admin_css');?>themes/base/jquery.ui.all.css">
<script src="<?php echo config_item('admin_js');?>jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo config_item('ckeditor');?>/ckeditor.js"></script>
<link rel="stylesheet" href="<?php echo config_item('admin_css');?>date_picker.css">

<script type="text/javascript">
$(function(){
	$('#charity_joint_date').datepicker({dateFormat:"yy-mm-dd"});
	
});
</script>


<?php global_message();?>
<?php
	$isEdit = isset($member) ? true : false;
	$text = empty($isEdit) ? 'Add' : 'Update';
	$selected = 'selected="selected"';
?>

<form id="newForm" method="post" enctype="multipart/form-data">
<table border="0" cellpadding="0" cellspacing="0"  id="id-form" width="100%">
	<tr valign="top">
		<td colspan="3">
			<div id="step-holder">
				<div class="step-no">1</div>
				<div class="step-dark-left"><a href="javascript:;">Member Details</a></div>
				<div class="step-dark-round">&nbsp;</div>
				<div class="clear"></div>
			</div>		
		</td>
	</tr>
	
	
	
	
	<tr>
		<th width="18%" valign="top">Member Name:</th>
	  	<td width="39%">
	  		<input type="text" name="member_name" class="inp-form required" value="<?php if($isEdit) echo $member->member_name;?>" />
		</td>
		<td width="43%"></td>
	</tr>
	<tr>
		<th valign="top">Picture:</th>
		<td>
			
			<input type="file" name="image" class="file_1" />
			<input type="hidden" name="prev_image" value="<?php if($isEdit) echo $member->image;?>" />
			<div><em><?php if($isEdit) echo $member->image;?></em></div>
		</td>
	</tr>
	<tr>
		<th valign="top">Email:</th>
		<td>
			
			<input type="text" name="email" class="inp-form required email" value="<?php if($isEdit) echo $member->email;?>" />
		</td>
	</tr>
  
	
	<tr>
		<th valign="top">Address:</th>
		<td>
			
			<input type="text" name="address" class="inp-form required" value="<?php if($isEdit) echo $member->address;?>" />
		</td>
	</tr>
    
    <tr>
    	<td ><strong>My Experience</strong></td>
        <td width="60%">
        	<textarea name="my_experience" id="my_experience" rows="8" cols="80" class="ckeditor"><?php if($isEdit) echo $member->my_experience;?></textarea>
        </td>
    </tr>
	<tr>
		<th valign="top">Contact Number:</th>
		<td>
			
			<input type="text" name="contact_no" class="inp-form required" value="<?php if($isEdit) echo $member->contact_no;?>" />
		</td>
	</tr>
    
    <tr>
		<th valign="top">Designation:</th>
		<td>
			
			<input type="text" name="designation" class="inp-form required" value="<?php if($isEdit) echo $member->designation;?>" />
		</td>
	</tr>
    
    <tr>
		<th valign="top">Joint Date:</th>
		<td>
			<input type="text" name="joint_date" id="charity_joint_date" class="inp-form required" readonly="readonly" value="<?php if($isEdit) echo $member->joint_date;?>" />
		</td>
	</tr>
 
    
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" name="submit_info" value="submitInfo" class="form-submit" />
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
	//$.validator.messages.url = 'invalid url';
	
	$('#newForm').validate();
});
</script>

