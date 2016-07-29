<link rel="stylesheet" href="<?php echo config_item('admin_css');?>themes/base/jquery.ui.all.css">
<link rel="stylesheet" href="<?php echo config_item('admin_css');?>date_picker.css">

<script type="text/javascript">
$(function(){
	$('#banner_start_date').datepicker({dateFormat:"yy-mm-dd"});
	$('#banner_end_date').datepicker({dateFormat:"yy-mm-dd"});
	$('#calendar_pick_date').datepicker({dateFormat:"yy-mm-dd"});
});
</script>

<?php global_message();?>
<?php
	$isEdit = isset($deal) ? true : false;
	$text = empty($isEdit) ? 'Add' : 'Update';
	$selected = 'selected="selected"';
?>

<form id="newForm" method="post" enctype="multipart/form-data">
<table border="0" cellpadding="0" cellspacing="0"  id="id-form" width="100%">
	<tr valign="top">
		<td colspan="3">
			<div id="step-holder">
				<div class="step-no">1</div>
				<div class="step-dark-left"><a href="javascript:;">Web Deal Details</a></div>
				<div class="step-dark-round">&nbsp;</div>
				<div class="clear"></div>
			</div>		
		</td>
	</tr>
	
	<tr>
		<th>Client</th>
		<td>
			<select name="client_id" id="client_id" class="required styledselect-day width200">
			<option value="">Select Client</option>
             
            
			<?php if(count($clients) > 0) : ?>
            
           
				<?php foreach($clients as $client) : ?>
                
					<option value="<?php echo $client->client_id;?>" <?php if($isEdit){ if($client->client_id == $deal->client_id) echo $selected;}?>><?php echo $client->business_name;?></option>
				<?php endforeach;?>
			<?php endif;?>
			</select>
		</td>
	</tr>
	
	
	<tr>
		<th width="18%" valign="top">Title:</th>
	  	<td width="39%">
	  		<input type="text" name="title" class="inp-form required" value="<?php if($isEdit) echo $deal->title;?>" />
		</td>
		<td width="43%"></td>
	</tr>
	<tr>
		<th valign="top">Image:</th>
		<td>
			<div style="padding-bottom:5px;"><em>Best Fit size (290px * 100px)</em></div>
			<input type="file" name="deal_image" class="file_1" />
			<input type="hidden" name="prev_image" value="<?php if($isEdit) echo $deal->deal_image;?>" />
			<div><em><?php if($isEdit) echo $deal->deal_image;?></em></div>
		</td>
	</tr>
	<tr>
		<th valign="top">Description:</th>
		<td>
			
			<textarea name="description" class="form-textarea required"><?php if($isEdit) echo $deal->description;?></textarea>
		</td>
	</tr>
    
    <tr>
		<th valign="top">State:</th>
		<td>
			<?php if($isEdit) $webdeal_state = $deal->webdeal_state_id; else $webdeal_state = NULL;?>
			<?php select_states('webdeal_state_id', $webdeal_state, NULL);?>		
		</td>
	</tr>
    
    <?php if($isEdit) : ?>
			<div id="related-activities">
				<div id="related-act-top">
				<img src="<?php echo config_item('admin_images');?>forms/header_related_act.gif" width="271" height="43" alt="" />				</div>
				<div id="related-act-bottom" style="padding:0 0 15px 0;">
					<div id="related-act-inner">
						<div class="right">
							<h5>Added By:</h5>
							<?php echo ucfirst($deal->added_from);?>
							<ul class="greyarrow">
								<li><a href="javascript:;"><?php //echo deal_added_by($deal->added_from, $deal->added_by);?></a></li>
							</ul>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		  <?php endif; ?>
    
	<tr>
		<th width="18%" valign="top">Details Link:</th>
	  	<td width="39%">
	  		<input type="text" name="deal_link" class="inp-form url required" value="<?php if($isEdit) echo $deal->deal_link; else echo 'http://';?>" />
		</td>
		<td width="43%"></td>
	</tr>
	<tr>
		<th valign="top">Date From:</th>
		<td>
			<input type="text" name="start_date" id="banner_start_date" class="inp-form required" readonly="readonly" value="<?php if($isEdit) echo $deal->start_date;?>" />
		</td>
	</tr>
	<tr>
		<th valign="top">Date To:</th>
		<td>
			<input type="text" name="end_date" id="banner_end_date" class="inp-form required" readonly="readonly" value="<?php if($isEdit) echo $deal->end_date;?>" />
		</td>
	</tr>
    
    
    
    
	<tr>
		<th valign="top">Publish</th>
		<td>
			<select name="publish" id="" class="styledselect-day" style="width:100px;">
				<option value="yes" <?php if($isEdit){ if($deal->publish == 'yes') echo $selected;}?>>Yes</option>
				<option value="no" <?php if($isEdit){ if($deal->publish == 'no') echo $selected;}?>>No</option>
			</select>
		</td>
	</tr>
    
    <tr>
		<th valign="top">Calendar Date:</th>
		<td>
			<input type="text" name="calendar_date" id="calendar_pick_date"  class="inp-form required" readonly="readonly" value="<?php if($isEdit) echo $deal->calendar_date;?>" />
		</td>
	</tr>
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" name="submit_deal" value="submitDeal" class="form-submit" />
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
