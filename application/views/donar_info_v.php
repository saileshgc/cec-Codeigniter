<?php
if(isset($_POST['submit_donar']))
{
	$donation_amount = $_POST['donation_amount'];
	$first_name      = $_POST['first_name'];
	$last_name       = $_POST['last_name'];
	$address         = $_POST['address'];
	$city            = $_POST['city'];
	$zip             = $_POST['zip'];
	$email           = $_POST['email'];
	$country_id      = $_POST['country_id'];
	$contact_no      = $_POST['contact_no'];
	
	$custom = 'donation_amount='.$_POST['donation_amount'].',first_name='.$_POST['first_name'].',last_name='.$_POST['last_name'].',address='.$_POST['address'].',city='.$_POST['city'].',zip='.$_POST['zip'].',email='.$_POST['email'].',country_id='.$_POST['country_id'].',contact_no='.$_POST['contact_no'];
	/*$custom = $_POST['donation_amount'].','.$_POST['first_name'].','.$_POST['last_name'].','.$_POST['address'].','.$_POST['city'].','.$_POST['zip'].','.$_POST['email'].','.$_POST['country_id'].','.$_POST['contact_no'];*/
	echo '<form name="form" id="frm" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
        <input type="hidden" name="rm" value="2" />
        <input type="hidden" name="return" value="'.site_url('home').'" />
        <input type="hidden" name="business" value="seller_1313991396_biz@ebpearls.com">
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="item_name" id="item_name" value="Donation" />
        <input type="hidden" name="amount" id="amount" value="'.$_POST['donation_amount'].'" />
        <input type="hidden" name="custom" value="'.$custom.'" id="custom" />
        <input type="hidden" name="currency_code" value="AUD" />
        <input type="hidden" name="notify_url" value="'.site_url('home/notify').'" />
        <input type="hidden" name="no_note" value="1">
        <input type="hidden" name="bn" value="PP-BuyNowBF" /></form>';
		echo '<script>document.getElementById("frm").submit();</script>';
}
?>
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

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Charity centre Pvt Ltd</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
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
     <div><h2>donation</h2></div> 
     <div class="abtpic-sec"><img src="<?php echo config_item('site_images');?>aboutpic.jpg" width="260" height="183" /></div>
      <div class="clear"></div>
    </div>
    <div class="ban-b-shadow-img"></div>
    <div id="maincontent">
      
      <div class="contactblock">
       <h2>BILLING INFORMATION</h2>
       <form method="post" name="myform" id="myform" >
      
        <input type="hidden" name="return" value="<?php echo site_url('home/show_complete');?>">
        <input type="hidden" name="notify_url" value="<?php echo site_url('home/notify');?>" />
      
           <dl>
           <dt>Enter amount*  </dt>
           <dd><input name="donation_amount" type="text" class="contact-txtbox inp-form required" /></dd>
           
           <dt>Title </dt>
           <dd><select name="" class="select-txtbox">
           <option>Mr.</option>
            <option>Ms.</option>
             <option>Miss.</option>
              <option>Mrs.</option>
           </select></dd>
           <dt>First Name*  </dt>
           <dd><input name="first_name" type="text" class="contact-txtbox inp-form required" /></dd>
           <dt>Last Name*  </dt>
           <dd><input name="last_name" type="text" class="contact-txtbox inp-form required" /></dd>
           
           <dt>Address  </dt>
           <dd><input name="address" type="text" class="contact-txtbox" /></dd>
            
            <dt>City  </dt>
           <dd><input name="city" type="text" class="contact-txtbox" /></dd>
           
            <dt>Zip/Postal Code  </dt>
           <dd><input name="zip" type="text" class="contact-txtbox" /></dd>
           <dt>Country    </dt>
           <dd><?php select_countries('country_id', NULL);?></dd>
            <dt>Email*   </dt>
           <dd><input name="email" type="text" class="contact-txtbox inp-form required email" /></dd>
            
            <dt>Phone </dt>
           <dd><input name="contact_no" type="text" class="contact-txtbox" /></dd>
           
           <dt>&nbsp;</dt>
           <dd><input name="submit_donar" type="submit" value="Submit" class="submitbtn" /></dd>
           
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
