<script src="<?php echo config_item('admin_js');?>jquery/ui.core.js" type="text/javascript"></script>
<script src="<?php echo config_item('admin_js');?>jquery/ui.checkbox.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$('input').checkBox();
	$('#toggle-all').click(function(){
 	$('#toggle-all').toggleClass('toggle-checked');
	$('#mainform input[type=checkbox]').checkBox('toggle');
		return false;
	});
	
});
</script> 

<?php
	$selected = 'selected = "selected"';
?>
 
<div id="listFilter" style="line-height:20px; margin:10px;">
<form method="get" action="<?php echo admin_url('event');?>">
<table>
<tr>
	<td>
		<div style="float:left;">
			<select name="type" onchange="form.submit();" style="height:20px;">
				<option value="">All Events</option>
				<option value="class" <?php if($this->input->get('type') == 'class') echo $selected;?>>Classes</option>
				<option value="activity" <?php if($this->input->get('type') == 'activity') echo $selected;?>>Bored</option>
			</select>
		</div>
		<div style="float:left; margin-left:10px;">
			<input type="text" name="search" value="<?php echo $this->input->get('search');?>" style="height:20px;" />
			<input type="submit" value="Search" />
		</div>
	</td>
</tr>
</table>
</form>
</div>
<div id="table-content">
<?php global_message();?>
<form id="mainform" action="">
	<table border="0" width="100%" id="product-table">
		<tr>
			<th class="table-header-check"><input type="checkbox"/></th>
			<th class="table-header-repeat"><a>Event Title</a></th>
			<th class="table-header-repeat"><a>Event Type</a></th>
			<th class="table-header-repeat"><a>Event Category</a></th>
			<th class="table-header-options"><a>Options</a></th>
		</tr>
		<?php if($total_events > 0) : ?>
			<?php foreach($events as $event) : ?>
				<tr class="<?php if($event->publish == 'no') echo 'redText';?>">
				<td><input  type="checkbox"/></td>
				<td><?php echo $event->event_name;?></td>
				<td>
					<?php 
						$event_type = $event->event_type;
						if($event_type == 'activity')
							$event_type = 'Boared';
						else
							$event_type = 'Classes';
					?>
					
					<?php echo $event_type;?>
				</td>
				<td><?php echo $event->category_name;?></td>
				<td class="options-width"><a href="<?php echo action_link('edit', $event->id);?>" title="Edit" class="icon-1 info-tooltip"></a> <a href="<?php echo action_link('delete', $event->id);?>" title="Delete" class="icon-2 info-tooltip delete_link"></a></td>
			  </tr>
			<?php endforeach; ?>
		<?php else: ?>
			<div id="message-yellow">
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td class="yellow-left">No Events have been found.</td>
				<td class="yellow-right"><a class="close-yellow"><img src="<?php echo config_item('admin_images');?>table/icon_close_yellow.gif"   alt="" /></a></td>
			</tr>
			</table>
			</div>
		<?php endif; ?>
	</table>
    <!--  end product-table................................... -->
  </form>
  	<div id="pagination">
		<?php echo $this->pagination->create_links(); ?>
	</div> 

</div>
