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
 
<div id="adding" style=" padding-bottom:10px;">
<a href="<?php echo admin_url('what_we_do/add');?>"><font size="+2" color="#26b7ee">Add Work</font></a>
</div>
<div id="table-content">
<?php global_message();?>
<form id="mainform" action="">
	<table border="0" width="100%" id="product-table">
		<tr>
			<th class="table-header-check"><input type="checkbox"/></th>
			<th class="table-header-repeat"><a>Title:</a></th>
			<th class="table-header-repeat"><a>Description</a></th>
			<th class="table-header-options"><a>Options</a></th>
		</tr>
		<?php if($total_works > 0) : ?>
			<?php foreach($works as $work) : ?>
				
				<td><input  type="checkbox"/></td>
				<td><?php echo $work->title;?></td>
				<td><?php echo $work->description;?></td>
				
				<td class="options-width"><a href="<?php echo action_link('edit', $work->id);?>" title="Edit" class="icon-1 info-tooltip"></a> <a href="<?php echo action_link('delete', $work->id);?>" title="Delete" class="icon-2 info-tooltip delete_link"></a></td>
			  </tr>
			<?php endforeach; ?>
		<?php else: ?>
			<div id="message-yellow">
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td class="yellow-left">No works have been found.</td>
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
