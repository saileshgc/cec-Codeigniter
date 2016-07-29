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
     <div><h2>coming events</h2></div> 
     <div class="abtpic-sec"><img src="<?php echo config_item('site_images');?>aboutpic.jpg" width="260" height="183" /></div>
      <div class="clear"></div>
    </div>
    <div class="ban-b-shadow-img"></div>
    <div id="maincontent">
      
      <div class="eventblock">
       <h2>EVENTS</h2>
       <?php foreach($events as $event):?>
      <div class="upcomingwhi-bg">
      
          <div class="upcomingwhi-img"><img src="<?php echo config_item('event_images_path').$event->event_image;?>"/></div>
        </div>
        <div class="eve-detail-sec">
        <h5>Event Name:<span><?php echo $event->title;?></span></h5>
        <h5>Date:<span><?php echo new_date($event->event_date);?></span></h5>
		<h5>Location:<span><?php echo $event->venue;?></span></h5>
        <h5>Ticket Price:<span><?php echo '$'.$event->ticket_price;?></span></h5>
        <div class="readmore-sec"><a href="<?php echo site_url('home/event_detail/'.$event->event_id);?>">Read More</a></div>
        </div>   
       <?php endforeach;?>
      </div>
      
      
  
	 
    </div>
	
	<!--footer sec start-->
	<?php $this->load->view('footer');?>
	<!--footer sec start-->
  </div>
</div>
</body>
</html>
