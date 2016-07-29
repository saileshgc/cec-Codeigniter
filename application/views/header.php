<link rel="stylesheet" href="<?php echo config_item('site_css');?>style.css" type="text/css" />
<div class="header-sec">
      <h1><a href=""><img src="<?php echo config_item('site_images');?>logo.jpg" width="565" height="134" alt="christopher Robin Committee" border="0" /></a></h1>
      <h2><a href=""><img src="<?php echo config_item('site_images');?>logo-rt.png" alt="SYDNEY CHILDREN'S HOSPITAL RANDWICK" border="0"  /></a></h2>
    </div>
    <!--end header-->
    <!--start menu-->
    <div class="menubg">
      <ul>
        <li class="<?php if($this->router->fetch_class() == 'home') {active_class('index','homehover');}?>"><a href="<?php echo site_url('home');?>">home</a></li>
         <li class="<?php active_class('about_us','abthover');?>"><a href="<?php echo site_url('home/about_us');?>">about us</a></li>
        <li class="<?php active_class('our_work','whathover');?>"><a href="<?php echo site_url('home/our_work');?>">what we do </a></li>
        <li class="<?php active_class('upcoming_events','whathover');?>"><a href="<?php echo site_url('home/upcoming_events');?>">upcoming events </a></li>
        <!--<li class="<?php active_class('donation','homehover');?>"><a href="<?php echo site_url('home/donation');?>">donate</a></li>-->
        <li class="<?php active_class('contact_us','contacthover');?>"><a href="<?php echo site_url('home/contact_us');?>">contact us</a></li>
      </ul>
      <div class="serch-area">
      <form action="<?php echo site_url('home/search_result')?>" method="post" id="search_form">
        <input name="Input" type="text" class="serchtxtboxbg" value="search..."onfocus="javascript:if(this.value=='search...') {this.value='';}" onblur="javascript:if(this.value=='') {this.value='search...'}"  />
        </form>
      </div>
    </div>