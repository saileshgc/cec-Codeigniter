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
<a href="<?php echo admin_url('aboutorg/add');?>"><font size="+2" color="#26b7ee">Add Info</font></a>
</div>
<div id="table-content">
<?php global_message();?>
<form id="mainform" action="">
	<table border="0" width="100%" id="product-table">
		<tr>
			<th class="table-header-check"><input type="checkbox"/></th>
			<th class="table-header-repeat"><a>Organization Name:</a></th>
			<th class="table-header-repeat"><a>Address</a></th>
			<th class="table-header-repeat"><a>Email</a></th>
			<th class="table-header-options"><a>Options</a></th>
		</tr>
		<?php if($total_infos > 0) : ?>
			<?php foreach($infos as $info) : ?>
				
				<td><input  type="checkbox"/></td>
				<td><?php echo $info->ngo_name;?></td>
				<td><?php echo $info->address;?></td>
				<td><?php echo $info->email;?></td>
				<td class="options-width"><a href="<?php echo action_link('edit', $info->id);?>" title="Edit" class="icon-1 info-tooltip"></a> <a href="<?php echo action_link('delete', $info->id);?>" title="Delete" class="icon-2 info-tooltip delete_link"></a></td>
			  </tr>
			<?php endforeach; ?>
		<?php else: ?>
			<div id="message-yellow">
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td class="yellow-left">No Info have been found.</td>
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
