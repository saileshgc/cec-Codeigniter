<link rel="stylesheet" href="<?php echo config_item('admin_css');?>themes/base/jquery.ui.all.css">
<script type="text/javascript" src="<?php echo config_item('ckeditor');?>/ckeditor.js"></script>


<?php global_message();?>
<?php
	$isEdit = isset($donar) ? true : false;
	$text = empty($isEdit) ? 'Add' : 'Update';
	$selected = 'selected="selected"';
?>

<form id="newForm" method="post" enctype="multipart/form-data">
<table border="0" cellpadding="0" cellspacing="0"  id="id-form" width="100%">
	<tr valign="top">
		<td colspan="3">
			<div id="step-holder">
				<div class="step-no">1</div>
				<div class="step-dark-left"><a href="javascript:;">Cause Details</a></div>
				<div class="step-dark-round">&nbsp;</div>
				<div class="clear"></div>
			</div>		
		</td>
	</tr>
    
    <tr>
		<th width="18%" valign="top">Title:</th>
	  	<td width="39%">
	  		<input type="text" name="cause_title" class="inp-form required" value="<?php if($isEdit) echo $donar->cause_title;?>" />
		</td>
		<td width="43%"></td>
	</tr>
    <tr>
		<th valign="top">Image:</th>
		<td>
			
			<input type="file" name="cause_image" class="file_1" />
			<input type="hidden" name="prev_image" value="<?php if($isEdit) echo $donar->cause_image;?>" />
			<div><em><?php if($isEdit) echo $donar->cause_image;?></em></div>
		</td>
	</tr>
    
    <tr>
    	<td ><strong>Detail:</strong></td>
        <td width="60%">
        	<textarea name="cause_detail" id="cause_detail" rows="8" cols="80" class="ckeditor"><?php if($isEdit) echo $donar->cause_detail;?></textarea>
        </td>
    </tr>
    
    <tr>
		<td colspan="3">
			<div id="step-holder">
				<div class="step-no">2</div>
				<div class="step-dark-left"><a href="javascript:;">Donar Details</a></div>
				<div class="step-dark-round">&nbsp;</div>
				<div class="clear"></div>
			</div>		
		</td>
	</tr>
	
	
	
	
	<tr>
		<th width="18%" valign="top">First Name:</th>
	  	<td width="39%">
	  		<input type="text" name="first_name" class="inp-form required" value="<?php if($isEdit) echo $donar->first_name;?>" />
		</td>
		<td width="43%"></td>
	</tr>
    
    <tr>
		<th width="18%" valign="top">Last Name:</th>
	  	<td width="39%">
	  		<input type="text" name="last_name" class="inp-form required" value="<?php if($isEdit) echo $donar->last_name;?>" />
		</td>
		<td width="43%"></td>
	</tr>
	
	<tr>
		<th valign="top">Email:</th>
		<td>
			
			<input type="text" name="email" class="inp-form required" value="<?php if($isEdit) echo $donar->email;?>" />
		</td>
	</tr>
  
	
	<tr>
		<th valign="top">Address:</th>
		<td>
			
			<input type="text" name="address" class="inp-form required" value="<?php if($isEdit) echo $donar->address;?>" />
		</td>
	</tr>
    
    <tr>
		<th valign="top">City:</th>
		<td>
			
			<input type="text" name="city" class="inp-form required" value="<?php if($isEdit) echo $donar->city;?>" />
		</td>
	</tr>
    
    <tr>
		<th valign="top">Zip Code:</th>
		<td>
			
			<input type="text" name="zip" class="inp-form required" value="<?php if($isEdit) echo $donar->zip;?>" />
		</td>
	</tr>
    
    <tr>
		<th valign="top">Country:</th>
		<td>
			<?php if($isEdit) $donar_country = $donar->country_id; else $donar_country = NULL;?>
			<?php select_countries('country_id', $donar_country, NULL);?>		
		</td>
	</tr>
    
    
	<tr>
		<th valign="top">Contact Number:</th>
		<td>
			
			<input type="text" name="contact_no" class="inp-form required" value="<?php if($isEdit) echo $donar->contact_no;?>" />
		</td>
	</tr>
    
    <tr>
		<th valign="top">Donation Amount:</th>
		<td>
			<div style="padding-bottom:5px;"><em>IN Dollars "$"</em></div>
			<input type="text" name="donation_amount" class="inp-form required digits" value="<?php if($isEdit) echo $donar->donation_amount;?>" />
		</td>
	</tr>
 
    
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" name="submit_donar" value="submitInfo" class="form-submit" />
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
