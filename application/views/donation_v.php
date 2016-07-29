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
     <div><h2>donate</h2></div> 
    
     <div class="abtpic-sec"><img src="<?php echo config_item('site_images');?>aboutpic.jpg" width="260" height="183" /></div>
      <div class="clear"></div>
    </div>
    <div class="ban-b-shadow-img"></div>
    <div id="maincontent">
      
      <div class="eventblock">
       <h2><?php echo $donation->cause_title;?></h2>
        
      <div class="upcomingwhi-bg">
          <div class="upcomingwhi-img"><img src="<?php echo config_item('cause_images_path').$donation->cause_image;?>"/></div>
        </div>
        <div class="eve-detail-sec">
       
        <?php echo $donation->cause_detail;?>
        <div class="readmore-sec"><a href="<?php echo site_url('home/donar_info');?>">Donate</a></div>
        </div> 
        
       
      </div>
      
  
	 
    </div>
	
	<!--footer sec start-->
	<?php $this->load->view('footer');?>
	<!--footer sec start-->
  </div>
</div>
</body>
</html>
