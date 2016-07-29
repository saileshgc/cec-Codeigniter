<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="<?php echo config_item('admin_js');?>jquery.js" type="text/javascript"></script>
<script src="<?php echo config_item('admin_js');?>jquery.validate.js" type="text/javascript"></script>

<link rel="stylesheet" href="<?php echo config_item('admin_css');?>themes/base/jquery.ui.all.css">
<!--<link rel="stylesheet" href="<?php echo config_item('admin_css');?>screen.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="<?php echo config_item('admin_css');?>message.css" type="text/css" media="screen" title="default" />-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Charity centre Pvt Ltd</title>
<!--<link href="css/style.css" rel="stylesheet" type="text/css" />-->
<script src="<?php echo config_item('admin_js');?>jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(document).pngFix();
	
	//$.validator.messages.required = '';
	//$.validator.messages.url = 'invalid url';
	
	$('#myform').validate();
});
</script>
</head>

<body>

<div id="wrapper">
  <div id="mainlayout">
    <!--start header-->
    <?php $this->load->view('header');?>
    <!--end menu-->
		
    <div id="banner-innersec">
     <div><h2>contact us</h2></div> 
     <div class="abtpic-sec"><img src="<?php echo config_item('site_images');?>aboutpic.jpg" width="260" height="183" /></div>
      <div class="clear"></div>
    </div>
    <div class="ban-b-shadow-img"></div>
    <div id="maincontent">
      
      <div class="contactblock">
       <h2>GET IN TOUCH WITH US</h2>
       <div class="message"><?php global_message();?></div>
       <form method="post" name="myform" id="myform">
      
           <dl>
           <dt>Name * :</dt>
           <dd><input name="contact_name" type="text" class="contact-txtbox inp-form required" /></dd>
           <dt>Email Address * :</dt>
           <dd><input name="email" type="text" class="contact-txtbox inp-form required email" /></dd>
           <dt>Address :</dt>
           <dd><input name="address" type="text" class="contact-txtbox" /></dd>
           <dt>Services :</dt>
           <dd><input name="services" type="text" class="contact-txtbox" /></dd>
           <dt>Phone :</dt>
           <dd><input name="phone" type="text" class="contact-txtbox" /></dd>
           <dt>Message * :</dt>
           <dd><textarea name="message" cols="" rows="" class="contact-textarea inp-form required"></textarea></dd>
           
           <dt>&nbsp;</dt>
           <dd><input name="submit_contact" type="submit" value="Submit" class="submitbtn" /></dd>
           
           </dl>
           </form>
       
      </div>
      
    
	 
    </div>
	
	<!--footer sec start-->
	<?php $this->load->view('footer');?>
	<!--footer sec start-->
  </div>
</div>
</body>
</html>

