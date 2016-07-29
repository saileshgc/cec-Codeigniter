<style>
.main_body
{
	
	width:1000px;
	height:800px;
	/*border:1px solid #3F6;*/
	}
.indiv
{
	width:46%;
	height:47%;
	/*border:1px solid #F00;*/
	float:left;
	padding-left:10px;
	/*padding:5px 5px 5px 5px;*/
	}
.title
{
	width:80%;
	height:10%;
	/*border:1px solid #F0F;*/
	font-family:Georgia, "Times New Roman", Times, serif;
	font-weight:bold;
	color:#aa0011;
	}	
	
.title_content
{
	width:80%;
	height:6%;
	/*border:1px solid #F0F;*/
	font-weight:bold;
	
	}
.content
{
	width:80%;
	height:6%;
	/*border:1px solid #F0F;*/
	color:#aa0011;
	
	}	
.for_image
{
	width:80%;
	height:51%;
	/*border:1px solid #F0F;*/
	font-weight:bold;}
.topic
{
	font-family:Georgia, "Times New Roman", Times, serif;
	font-weight:bold;
	padding-top:10px;
	/*border:1px solid #00F;*/
	padding-bottom:10px;
	}				
</style>
<div class="main_body">
<div class="menu">
<a href="<?php echo site_url('home');?>">home|&nbsp;&nbsp;&nbsp;&nbsp;</a>
<a href="<?php echo site_url('home/about_us');?>">about us|&nbsp;&nbsp;&nbsp;&nbsp;</a>
<a href="<?php echo site_url('home/our_work');?>">what we do|&nbsp;&nbsp;&nbsp;&nbsp;</a>
<a href="<?php echo site_url('home/upcoming_events')?>">coming events|&nbsp;&nbsp;&nbsp;&nbsp;</a>
<a href="#">donate|&nbsp;&nbsp;&nbsp;&nbsp;</a>

</div>

<div class="topic"></div>
<?php foreach ($events as $event):?>
<div class="indiv">
<div class="title"><a href="<?php echo site_url('home/show_event/'.$event->event_id);?>"><?php echo $event->title;?></a></div>
<hr width="100%" color="#999999">
<div class="for_image">
<a href="<?php echo site_url('home/show_event/'.$event->event_id);?>">

<img src="<?php echo config_item('event_images_path').$event->event_image;?>"></a>
</div>
<div class="title_content">DATE:</div>
<div class="content"><?php echo $event->event_date;?></div>
<div class="title_content">LOCATION:</div> 
<div class="content"><?php echo $event->venue;?></div>
</div>
<?php endforeach;?>
</div>