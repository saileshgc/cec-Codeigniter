<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Christopher Robin Committee</title>
<link rel="stylesheet" href="<?php echo config_item('site_css');?>style.css" type="text/css" />
</head>

<body>
<div id="wrapper">
  <div id="mainlayout">
    <?php $this->load->view('header');?>
    <div id="bannersec">
      <div class="photohere1">
     
      
      
      <img src="<?php echo config_item('home_images_path').$left_image->home_image;?>" /></div>
      <div class="photohere2">
       <iframe width="420" height="315" src="http://www.youtube.com/embed/eI6GmEP5aDw" frameborder="0" allowfullscreen></iframe>
      <!--<img src="<?php echo config_item('home_images_path').$slide_image->home_image;?>" width="400" height="375" />--></div>
      <div class="clear"></div>
    </div>
    <div class="ban-b-shadow-img"></div>
    <div id="maincontent">
      <div class="contentblock">
        <h2>ABOUT US?</h2>
        <?php echo short_text($home_content->main_content, 450); ?>
        
        <div class="readmore-sec"><a href="<?php echo site_url('more');?>">Read More</a></div>
      </div>
      <div class="contentblock">
        <h2>WHAT WE DO?</h2>
        <?php echo short_text($latest_work->description, 500); ?>
        <div class="readmore-sec"><a href="<?php echo site_url('more/what_more');?>">Read More</a></div>
      </div>
      <div class="contentblock">
        <h2>NEXT EVENT</h2>
        <div class="upcomingwhi-bg">
          <div class="upcomingwhi-img"><a href="<?php echo action_link('event_detail', $event_detail->event_id);?>"><img src="<?php echo config_item('event_images_path').$event_detail->event_image;?>"/></a></div>
        </div>
        <div class="eventdate">Date:</div><div class="eventdate-detail"><?php echo new_date($event_detail->event_date);?></div>
		<div class="eventdate">Location:</div><div class="eventdate-detail"><?php echo $event_detail->venue;?></div>
        <div class="readmore-sec"><a href="<?php echo action_link('event_detail', $event_detail->event_id);?>">Read More</a></div>
      </div>
	 
    </div>
	
	<?php $this->load->view('footer');?>
  </div>
</div>
</body>
</html>

