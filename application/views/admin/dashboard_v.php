<div id="table-content">

<form id="mainform" action="">
	<table border="0" width="100%" id="product-table">
		<tr>
			<th>Home Contents</th>
			<th>&nbsp;</th>
		</tr>
		<tr>
			<td><a href="<?php //echo admin_url('event/approval/list');?>">Member Events for approval</a></td>
			<td><?php //echo total_events_for_approval();?></td>
		</tr>
        
        <tr>
			<td><a href="<?php //echo admin_url('webdeal/deal_approval/list');?>">Web Deals for approval</a></td>
			<td><?php //echo total_web_deals_for_approval();?></td>
		</tr>		
	</table>

  </form>
</div>