<link rel="stylesheet" href="<?php echo config_item('admin_css');?>themes/base/jquery.ui.all.css">
<link rel="stylesheet" href="<?php echo config_item('admin_css');?>date_picker.css">
    <!--<link rel="stylesheet" href="<?php echo config_item('admin_js');?>timepicker/include/jquery-ui-1.8.14.custom.css" type="text/css" />-->
    <link rel="stylesheet" href="<?php echo config_item('admin_js');?>timepicker/jquery-ui-timepicker.css" type="text/css" />

	<script type="text/javascript" src="<?php echo config_item('ckeditor');?>/ckeditor.js"></script>
    

	<script type="text/javascript">
        $(document).ready(function() {
            $('#event_time').timepicker({
				showPeriod: true,
				showLeadingZero: true,	
			});
        });
    </script>
    
    <script type="text/javascript">
	$(function(){
		$('#event_start_date').datepicker({dateFormat:"yy-mm-dd"});
		
	});
</script>

<?php global_message();?>
<?php
	$isEdit = isset($event) ? true : false;
	$text = empty($isEdit) ? 'Add' : 'Update';
	$selected = 'selected="selected"';
?>
<form id="newForm" method="post" enctype="multipart/form-data">
<table border="0" cellpadding="0" cellspacing="0"  id="id-form" width="100%">
	<tr valign="top">
		<td colspan="3">
			<div id="step-holder">
				<div class="step-no">1</div>
				<div class="step-dark-left"><a href="javascript:;">Events Details</a></div>
				<div class="step-dark-round">&nbsp;</div>
				<div class="clear"></div>
			</div>		
		</td>
	</tr>
	
	
	
	
	<tr>
		<th width="18%" valign="top">Title:</th>
	  	<td width="39%">
	  		<input type="text" name="title" class="inp-form required" value="<?php if($isEdit) echo $event->title;?>" />
		</td>
		<td width="43%"></td>
	</tr>
	<tr>
		<th valign="top">Image:</th>
		<td>
			
			<input type="file" name="event_image" class="file_1" />
			<input type="hidden" name="prev_image" value="<?php if($isEdit) echo $event->event_image;?>" />
			<div><em><?php if($isEdit) echo $event->event_image;?></em></div>
		</td>
	</tr>
	<tr>
		<th valign="top">Venue:</th>
		<td>
			
			<input type="text" name="venue" class="inp-form required" value="<?php if($isEdit) echo $event->venue;?>" />
		</td>
	</tr>
    
    <tr>
		<th valign="top">Date:</th>
		<td>
			<input type="text" name="event_date" id="event_start_date" class="inp-form required" readonly="readonly" value="<?php if($isEdit) echo $event->event_date;?>" />
            
            
		</td>
	</tr>
     <div style="clear:both;"></div>
    
    
    <tr>
		<th valign="top">Time:</th>
		<td>
			<div>
			<input type="text" name="event_time" id="event_time" class="inp-form required event_time" readonly="readonly" value="<?php if($isEdit) echo $event->event_time;?>" />
            </div>
		</td>
	</tr>
   <div style="clear:both"></div>
  
	
	<tr>
		<th valign="top">Ticket Price:</th>
		<td>
			<div style="padding-bottom:5px;"><em>IN Dollars "$"</em></div>
			<input type="text" name="ticket_price" class="inp-form required digits" value="<?php if($isEdit) echo $event->ticket_price;?>" />
		</td>
	</tr>
    
    <tr>
    	<td ><strong>Details</strong></td>
        <td width="60%">
        	<textarea name="detail" id="detail" rows="8" cols="80" class="ckeditor"><?php if($isEdit) echo $event->detail;?></textarea>
        </td>
    </tr>
	<tr>
		<th valign="top">Contact Details :</th>
		<td>
			
			<input type="text" name="contact" class="inp-form required " value="<?php if($isEdit) echo $event->contact;?>" />
		</td>
	</tr>
 
    
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" name="submit_event" value="submitInfo" class="form-submit" />
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