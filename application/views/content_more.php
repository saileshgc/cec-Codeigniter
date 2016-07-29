<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Charity centre Pvt Ltd</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="wrapper">
  <div id="mainlayout">
    <!--start header-->
   <?php $this->load->view('header');?>
    <!--end menu-->
    <div id="banner-innersec">
     <div><h2>WHO WE ARE?</h2></div> 
     <div class="abtpic-sec"><img src="<?php echo config_item('site_images');?>aboutpic.jpg" width="260" height="183" /></div>
      <div class="clear"></div>
    </div>
    <div class="ban-b-shadow-img"></div>
    <div id="maincontent">
      
      <div class="eventblock">
       <h2>WHO WE ARE?</h2>
      
           <?php echo $check->main_content; ?>
      </div>
      
      
    
      
	 
    </div>
	
	<!--footer sec start-->
	<?php $this->load->view('footer');?>
	<!--footer sec start-->
  </div>
</div>
</body>
</html>
