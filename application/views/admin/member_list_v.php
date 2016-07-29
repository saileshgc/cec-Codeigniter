<div id="listFilter" style="line-height:20px; margin:10px;">
<div id="adding" style=" padding-bottom:10px;">
<a href="<?php echo admin_url('client/add');?>"><font size="+2" color="#26b7ee">Add Client</font></a>
</div>
<form method="get" action="<?php echo admin_url('client');?>">
<table>
<tr>
	<td>
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
<form id="mainform" action="">
	<table border="0" width="100%" id="product-table">
		<tr>
		  <th class="table-header-check"><input  type="checkbox"/></th>
			<th width="18%" class="table-header-repeat"><a>Name</a></th>
			<th width="18%" class="table-header-repeat"><a>Email</a></th>
			<th width="18%" class="table-header-repeat"><a>Username</th>
			<th width="18%" class="table-header-repeat"><a>Password</th>
			<th width="18%" class="table-header-repeat"><a>State</a></th>
			<th width="18%" class="table-header-options"><a>Options</a></th>
		</tr>
		<?php if($total_clients > 0) : ?>
			<?php foreach($clients as $client) : ?>
				<tr>
				<td><input  type="checkbox"/></td>
				<td><?php echo $client->business_name;?></td>
				<td><a href="mailto:<?php echo $client->business_email;?>" target="_blank"><?php echo $client->business_email;?></a></td>
				<td><?php echo $client->username;?></td>
				<td><?php echo $client->pass;?></td>
				<td><?php echo $client->state_name;?></td>
				<td class="options-width"><a href="<?php echo action_link('edit', $client->client_id);?>" title="Edit" class="icon-1 info-tooltip"></a> <a href="<?php echo action_link('delete', $client->client_id);?>" title="Delete" class="icon-2 info-tooltip delete_link"></a></td>
			  </tr>
			<?php endforeach; ?>
		<?php else: ?>
			<?php show_message('error_message', 'No Members have been found.');?>
		<?php endif; ?>
	</table>
    <!--  end product-table................................... -->
  </form>
	<div id="pagination">
		<?php echo $this->pagination->create_links(); ?>
	</div> 

</div>
