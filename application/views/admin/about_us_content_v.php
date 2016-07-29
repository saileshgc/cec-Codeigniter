    <style>
	tr td, thead th {
   /* border-left: 1px solid #CCCCCC;
    color: #616161;*/
    padding: 8px;
}
	
	</style>


<script type="text/javascript" src="<?php echo config_item('ckeditor');?>/ckeditor.js"></script>


<?php //echo $this->config->item('home_images_root');?>


    
<div class="container">
<div class="box-header"></div>
<div class="box table">
<form name="form1" method="post" enctype="multipart/form-data">
<table class="non_border" width="100%">
	<tr>
    	<td width="13%">
       <strong>Content</strong></td>
        <td width="87%">
        	<textarea name="main_content" id="main_content" rows="8" cols="80" class="ckeditor"><?php if($content) echo $content->main_content;?></textarea>
        </td>
    </tr>
  
    <tr>
    	<td>&nbsp;</td>
        <td><input type="submit" id="submit_about_us_content" name="submit_about_us_content" value="Save" /></td>
    </tr>
</table>
<input type="hidden" name="id" value="<?php if($content) echo $content->id;?>" />
</form>
</div>
</div>

