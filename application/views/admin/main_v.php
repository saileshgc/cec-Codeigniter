<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!--<link rel="shortcut icon" type="image/x-icon" href="<?php echo config_item('admin_images');?>favicon.ico" />
<link rel="apple-touch-icon" href='<?php echo config_item('admin_images');?>icon.png'/>-->
<title><?php echo $page_title.' - Admin '.project_title(); ?></title>
<link rel="stylesheet" href="<?php echo config_item('admin_css');?>screen.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="<?php echo config_item('admin_css');?>message.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="<?php echo config_item('admin_css');?>pagination.css" type="text/css" media="screen" title="default" />


<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="<?php echo config_item('admin_css');?>pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<script src="<?php echo config_item('admin_js');?>jquery.js" type="text/javascript"></script>
<script src="<?php echo config_item('admin_js');?>general.js" type="text/javascript"></script>
<!--<script src="<?php //echo config_item('admin_js');?>jquery.validate.js" type="text/javascript"></script>-->

<!-- ThickBox -->
<link rel="stylesheet" href="<?=$this->config->item('site_asset')?>thickbox/thickbox.css" type="text/css" media="screen" />
<script>var tb_pathToImage = "<?=$this->config->item('site_asset')?>thickbox/loadingAnimation.gif";</script>
<script src="<?=$this->config->item('site_asset')?>thickbox/thickbox.js" type="text/javascript"></script>
	
<!--  checkbox styling script -->
<!--<script type="text/javascript" src="<?php echo config_item('admin_js');?>jquery.ui.core.js"></script>
<script type="text/javascript" src="<?php echo config_item('admin_js');?>jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo config_item('admin_js');?>jquery.ui.datepicker.js"></script>-->

<script src="<?php echo config_item('admin_js');?>jquery/jquery.bind.js" type="text/javascript"></script>

<![if !IE 7]>

<!--  styled select box script version 1 -->
<script src="<?php echo config_item('admin_js');?>jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
});
</script>
 

<![endif]>

<!--  styled select box script version 2 --> 
<script src="<?php echo config_item('admin_js');?>jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</script>

<!--  styled select box script version 3 --> 
<script src="<?php echo config_item('admin_js');?>jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
});
</script>

<!--  styled file upload script --> 
<script src="<?php echo config_item('admin_js');?>jquery/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
  $(function() {
      $("input.file_1").filestyle({ 
          image: "<?php echo config_item('admin_images');?>forms/upload_file.gif",
          imageheight : 29,
          imagewidth : 78,
          width : 300
      });
  });
</script>

<!-- Custom jquery scripts -->
<script src="<?php echo config_item('admin_js');?>jquery/custom_jquery.js" type="text/javascript"></script>
 
<!-- Tooltips -->
<script src="<?php echo config_item('admin_js');?>jquery/jquery.tooltip.js" type="text/javascript"></script>
<script src="<?php echo config_item('admin_js');?>jquery/jquery.dimensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true, 
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
</script> 


<!--  date picker script -->
<!--<link rel="stylesheet" href="<?php echo config_item('admin_css');?>datePicker.css" type="text/css" />
<script src="<?php echo config_item('admin_js');?>jquery/date.js" type="text/javascript"></script>
<script src="<?php echo config_item('admin_js');?>jquery/jquery.datePicker.js" type="text/javascript"></script>-->


<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="<?php echo config_item('admin_js');?>jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>

<script type="text/javascript" src="<?php echo config_item('admin_js');?>timepicker/include/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="<?php echo config_item('admin_js');?>timepicker/include/jquery.ui.core.min.js"></script>
<script type="text/javascript" src="<?php echo config_item('admin_js');?>timepicker/include/jquery.ui.position.min.js"></script>

<script type="text/javascript" src="<?php echo config_item('admin_js');?>timepicker/jquery.ui.timepicker.js"></script>
<script type="text/javascript" src="<?php echo config_item('admin_js');?>jquery.ui.datepicker.js"></script>

<script src="<?php echo config_item('admin_js');?>jquery.validate.js" type="text/javascript"></script>

</head>
<body> 
<!-- Start: page-top-outer -->
<div id="page-top-outer1" style="height:44px; background:#414141;">    

<!-- Start: page-top -->
	<?php //$this->load->view('admin/inc/header');?>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->
	
<div class="clear">&nbsp;</div>
 
<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat"> 
<!--  start nav-outer -->
<div class="nav-outer"> 

		<!-- start nav-right -->
			<?php $this->load->view('admin/inc/right_nav');?>
		<!-- end nav-right -->


		<!--  start nav -->
			<?php $this->load->view('admin/inc/nav');?>
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->

<div class="clear"></div>
 
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1><?php echo $page_title;?></h1>
	</div>
	<!-- end page-heading -->
	<?php echo $this->load->view('admin/inc/content');?>
	
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
    
<!-- start footer -->         
	<?php $this->load->view('admin/inc/footer');?>
<!-- end footer -->
 
</body>
</html>