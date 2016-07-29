	<link rel="shortcut icon" type="image/x-icon" href="<?php echo config_item('site_images');?>favicon.ico" />
	<link rel="apple-touch-icon" href='<?php echo config_item('site_images');?>icon.png'/>
	<!-- css -->
	<link href="<?php echo config_item('site_css');?>reset.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo config_item('site_css');?>style.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo config_item('site_css');?>message.css" rel="stylesheet" type="text/css" />
	
	<!-- jquery -->
	<script type="text/javascript" src="<?php echo config_item('site_asset');?>plugins/jquery/jquery-1.5.1.js"></script>
	<script src="<?php echo config_item('admin_js');?>jquery.validate.js" type="text/javascript"></script>
	
	<script type="text/javascript" src="<?php echo config_item('site_asset');?>plugins/jquery/jquery.cycle.all.min.js"></script>
	<script type="text/javascript" src="<?php echo config_item('site_asset');?>plugins/jquery/jquery.hoverIntent.minified.js"></script>
	<script type="text/javascript" src="<?php echo config_item('site_asset');?>plugins/jquery/curvycorners.src.js"> </script>
	
	<!--<script src="<?php echo config_item('site_asset').'js_compressed.php';?>" type="text/javascript"></script>-->

	<!-- cufon -->
	<script type="text/javascript" src="<?php echo config_item('site_asset');?>plugins/cufon/cufon-yui.js"></script>
	<script type="text/javascript" src="<?php echo config_item('site_asset');?>plugins/cufon/ms_400.font.js"></script>
	
	<!--[if IE 6]>
	<link href="<?php echo config_item('site_css');?>ie6.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo config_item('site_asset');?>plugins/pngfix/DD_belatedPNG_0.0.8a-min.js"></script>
	<script>
	  DD_belatedPNG.fix('#logo img, .badge, .post, #search, .memberLoginForm, #searchFilter, #advertisements, .sideBtm, #footer, #contact .inpWrap, #contact .txtWrap, .icEvent, .viewAll, .selectState a');
	</script>
	<![endif]-->
	<!--[if IE 7]>
	<link href="<?php echo config_item('site_css');?>ie7.css" rel="stylesheet" type="text/css" />
	<![endif]-->
	
	<script type="text/javascript" src="<?php echo config_item('site_js');?>common.js"></script>
	<script type="text/javascript" src="<?php echo config_item('site_asset');?>plugins/jqtransform/jquery.jqtransform.js" ></script>
	
	<script language="javascript">
		$(function(){
			$('form').jqTransform({imgPath:'<?php echo config_item('site_asset');?>plugins/jqtransform/img/'});
		});
	</script>
	
	<!-- ThickBox -->
	<link rel="stylesheet" href="<?=$this->config->item('site_asset')?>thickbox/thickbox.css" type="text/css" media="screen" />
	<script>var tb_pathToImage = "<?=$this->config->item('site_asset')?>thickbox/loadingAnimation.gif";</script>
	<script src="<?=$this->config->item('site_asset')?>thickbox/thickbox.js" type="text/javascript"></script>
	
	<!-- Jquery Dialog -->

	<script type="text/javascript" src="<?php echo config_item('admin_js');?>jquery.ui.core.js"></script>
	<script type="text/javascript" src="<?php echo config_item('admin_js');?>jquery.ui.widget.js"></script>
