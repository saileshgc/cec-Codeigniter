<style>
.main_body
{
	width:90%;
	height:100%;
	/*border:1px solid #F00;*/
	}
.image
{
	padding-top:10px;
	}
.content
{
	padding-top:10px;
	width:50%;
	height:50%;
	/*border:1px solid #0F0;*/
	}
.left_content
{
	padding-top:10px;
	float:left;
	width:20%;
	/*border:1px solid #00F;*/
	
	text-transform:capitalize;
	font-weight:bold
	}		
	
.right_content
{
	float:left;
	width:86%;
	/*border:1px solid #C36;*/
	}		
</style>

<div class="main_body">
<b>UPCOMING EVENTS</b>
<hr width="100%" color="#999999" />
<b><?php echo $event->title;?></b>
<div class="image">
<img src="<?php echo config_item('event_images_path').$event->event_image;?>">
</div>
<div class="content">
<div class="left_content">Date: </div>
<div class="right_content"> <?php echo new_date($event->event_date);?></div>
<div class="left_content">Location:</div>
<div class="right_content"><?php echo $event->venue;?></div>

<div class="left_content">Detail:</div>
<div class="right_content"><?php echo $event->detail;?></div>

<div class="left_content">Contact:</div>
<div class="right_content"><?php echo $event->contact;?></div>

</div>


<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="seller_1313991396_biz@ebpearls.com">
<input type="hidden" name="item_name" value="ticket">
<input type="hidden" name="amount" value="<?php echo $event->ticket_price;?>">
<input type="hidden" name="currency_code" value="AUD">
<!--<input type="image" src="https://www.paypal.com/en_AU/i/btn/btn_buynow_LG.gif" border="0" name="submit">-->
<!--<img alt="" border="0" src="https://www.paypal.com/en_AU/i/scr/pixel.gif" width="1" height="1">--> 
<input type="hidden" name="return" value="<?php echo site_url('home/show_complete');?>">
<input type="submit" value="Purchase a Ticket"> 
</form>

</div><!--main body-->