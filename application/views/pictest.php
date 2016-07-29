<style>
.main_body
{
	width:80%;
	height:95%; 
	border: 1px solid #F00;

}
.left_content
{
	width:55%;
	height:40%;
	border:1px solid #30F;
	float:left;
}

.event
{
	width:25%;
	height:40%;
	border:1px solid #30F;
	float:left;
}
.member
{
	width:55%;
	height:15%;
	border:1px solid #0F6;
	padding-top:5px;
	}
.member_pic
{
	width:30%
	height: 15%;
	border:1px solid #C9C;
	float:left;
	 }	
	 
	.member_info
{
	width:30%
	height: 15%;
	border:1px solid #C9C;
	float:left;
	padding-left:10px;
	 }	 
	
</style>

<div class="main_body">

<div class="left_content">
<b>WHO WE ARE?</b>
<hr width="100%" color="#999999" />

<?php echo short_text($home_content->main_content, 700); ?>

</div>

<div class="event">

<b>UPCOMING EVENTS</b>
<hr width="100%" color="#999999" />
<img src="<?php echo config_item('event_images_path').$event_detail->event_image;?>">
<div class="content">
Date:    <?php echo new_date($event_detail->event_date);?></br>
Location:&nbsp;<?php echo $event_detail->venue;?><br/>

</div>

<b>MEMBERS</b>
<?php foreach($members as $member):?>
<div class="member">

<hr width="100%" color="#999999" />
<div class="member_pic">
<img src="<?php echo config_item('member_images_path').$member->image;?>" />
</div>

<div class="member_info">
<b><?php echo $member->member_name;?></b><br/>
<b><?php echo $member->designation;?></b>
<?php echo $member->my_experience;?>
</div>

</div>
<?php endforeach;?>


</div><!-----/main_body------>