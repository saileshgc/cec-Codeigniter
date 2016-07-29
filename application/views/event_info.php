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
     <div><h2>events</h2></div> 
     <div class="abtpic-sec"><img src="<?php echo config_item('site_images');?>aboutpic.jpg" width="260" height="183" /></div>
      <div class="clear"></div>
    </div>
    <div class="ban-b-shadow-img"></div>
    <div id="maincontent">
      
      <div class="eventblock">
       <h2><?php echo $event->title;?></h2>
      <div class="upcomingwhi-bg">
          <div class="upcomingwhi-img"><img src="<?php echo config_item('event_images_path').$event->event_image;?>"/></div>
        </div>
        <div class="eve-detail-sec">
        
        <h5>Date:<span><?php echo new_date($event->event_date);?></span></h5>
		<h5>Location:<span><?php echo $event->venue;?></span></h5>
        <h5>Ticket Price:<span><?php echo '$'.$event->ticket_price;?></span></h5>
        <h5>Description:</h5> <?php echo $event->detail;?>
        <h5>Contact: <a href=""><?php echo $event->contact;?></a></h5>
        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="business" value="seller_1313991396_biz@ebpearls.com">
        <input type="hidden" name="item_name" value="<?php echo $event->title.' Ticket'?>">
        <input type="hidden" name="amount" value="<?php echo $event->ticket_price;?>">
        <input type="hidden" name="currency_code" value="AUD">
        <!--<input type="image" src="https://www.paypal.com/en_AU/i/btn/btn_buynow_LG.gif" border="0" name="submit">-->
        <!--<img alt="" border="0" src="https://www.paypal.com/en_AU/i/scr/pixel.gif" width="1" height="1">--> 
        <input type="hidden" name="return" value="<?php echo site_url('home');?>">
        <input type="hidden" name="notify_url" value="<?php echo site_url('home/notify_ticket');?>" />
        <div class="purchase-sec"><input name="" type="submit" value="Purchase Tickets" class="purchasebtn" /></div>
        </form>
        
       
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

