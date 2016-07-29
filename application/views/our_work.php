<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Christopher Robin Committee</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="wrapper">
  <div id="mainlayout">
    <!--start header-->
    <?php $this->load->view('header');?>
    <!--end menu-->
	<?php print_r($banner_detail);?>
    <div id="banner-innersec">
     <div><h2><?php echo $banner_detail->banner_text;?></h2></div> 
     <div class="abtpic-sec"><img src="<?php echo config_item('uploads')."banner_images/";?><?php echo $banner_detail->banner_image;?>" width="260" height="183" /></div>
      <div class="clear"></div>
    </div>
    <div class="ban-b-shadow-img"></div>
    <div id="maincontent">
      
      <div class="abtblock">
       <h2>WHO WE DO?</h2>
      <?php echo $latest_work->description;?>
        
       <div class="memblock">  
         <h2>STORIES</h2>
         <?php foreach($stories as $story):?>
         <div class="mempicbg"><img src="<?php echo config_item('member_images_path').$story->image;?>" /></div>
      <div class="mem-content">
     <p><b><a href="<?php echo site_url('more/stories/'.$story->story_id);?>"> <?php echo $story->title;?></a></b></p>
	  <?php echo short_text($story->detail,400);?></div>
        
        <div class="memblock-line"></div>
        <?php endforeach;?>
        
         
        </div>
       
      </div>
      
      
      <div class="contentblock">
        <h2>UPCOMING EVENT</h2>
        <div class="upcomingwhi-bg">
          <div class="upcomingwhi-img"><img src="<?php echo config_item('event_images_path').$event_detail->event_image;?>"/></div>
        </div>
        <div class="eventdate">Date:</div><div class="eventdate-detail"><?php echo new_date($event_detail->event_date);?></div>
		<div class="eventdate">Location:</div><div class="eventdate-detail"><?php echo $event_detail->venue;?></div>
        <div class="readmore-sec"><a href="<?php echo site_url('home/event_detail/'.$event_detail->event_id);?>">Read More</a></div>
      </div>
	 
    </div>
	
	<!--footer sec start-->
	
	<?php $this->load->view('footer');?>
	<!--footer sec start-->
  </div>
</div>
</body>
</html>
