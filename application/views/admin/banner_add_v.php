<link rel="stylesheet" href="<?php echo config_item('admin_css');?>themes/base/jquery.ui.all.css">
<script type="text/javascript" src="<?php echo config_item('ckeditor');?>/ckeditor.js"></script>


<?php global_message();?>
<?php
	$isEdit = isset($banner) ? true : false;
	$text = empty($isEdit) ? 'Add' : 'Update';
	$selected = 'selected="selected"';
?>

<form id="newForm" method="post" enctype="multipart/form-data">
<table border="0" cellpadding="0" cellspacing="0"  id="id-form" width="100%">
	<tr valign="top">
		<td colspan="3">
			<div id="step-holder">
				<div class="step-no">1</div>
				<div class="step-dark-left"><a href="javascript:;">Banner Details</a></div>
				<div class="step-dark-round">&nbsp;</div>
				<div class="clear"></div>
			</div>		
		</td>
	</tr>
	
	
	
	
	<tr>
		<th width="18%" valign="top">Banner Text:</th>
	  	<td width="39%">
	  		<input type="text" name="banner_text" class="inp-form required" value="<?php if($isEdit) echo $banner->banner_text;?>" />
		</td>
		<td width="43%"></td>
	</tr>
	<tr>
		<th valign="top">Image:</th>
		<td>
			
			<input type="file" name="banner_image" class="file_1" />
			<input type="hidden" name="prev_image" value="<?php if($isEdit) echo $banner->banner_image;?>" />
			<div><em><?php if($isEdit) echo $banner->banner_image;?></em></div>
		</td>
	</tr>
	
  
	
	
    
   
    
    
    
    
 
    
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" name="submit_banner" value="submitInfo" class="form-submit" />
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
