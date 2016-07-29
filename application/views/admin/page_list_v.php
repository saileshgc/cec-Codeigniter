<div id="table-content">

<form id="mainform" action="">
	<table border="0" width="100%" id="product-table">
		<tr>
		  <th class="table-header-check"><input  type="checkbox"/></th>
			<th class="table-header-repeat"><a>Page Title</a></th>
			<th class="table-header-repeat"><a>Page Slug</a></th>
			<th class="table-header-options"><a>Options</a></th>
		</tr>
		<?php if($total_pages > 0) : ?>
			<?php foreach($pages as $page) : ?>
				<tr>
				<td><input  type="checkbox"/></td>
				<td><?php echo $page->title;?></td>
				<td><?php echo $page->slug;?></td>
				<td class="options-width"><a href="<?php echo admin_url('page/edit/'.$page->page_id);?>" title="Edit" class="icon-1 info-tooltip"></a> <a href="<?php echo admin_url('page/delete/'.$page->page_id);?>" title="Delete" class="icon-2 info-tooltip delete_link"></a></td>
			  </tr>
			<?php endforeach; ?>
		<?php else: ?>
			<?php show_message('error_message', 'No Pages have been added.');?>
		<?php endif; ?>
	</table>
    <!--  end product-table................................... -->
  </form>
</div>
