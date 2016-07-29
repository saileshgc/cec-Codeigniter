<div class="nav">
	<div class="table">
	
	<ul class="select <?php active_class('home_admin');?>">
		<li><a href="<?php echo admin_url('home_admin');?>"><b>Home</b><!--[if IE 7]><!--></a><!--<![endif]--></li>
	</ul>
	
	<div class="nav-divider">&nbsp;</div>
						
	<ul class="select <?php active_class('event');?>"><li><a href="<?php echo admin_url('event');?>"><b>Events</b><!--[if IE 7]><!--></a><!--<![endif]-->
	<!--[if lte IE 6]><table><tr><td><![endif]-->
	<div class="select_sub <?php active_class('event','show');?>">
		<ul class="sub">
			<li class="<?php active_class('index', 'sub_show');?>"><a href="<?php echo admin_url('event');?>">Event Info</a></li>
            <li class="<?php active_class('tickets', 'sub_show');?>"><a href="<?php echo admin_url('event/tickets');?>">Tickets Bought</a></li>
            
			
		</ul>
	</div>
	<!--[if lte IE 6]></td></tr></table></a><![endif]-->
	</li>
	</ul>
	
	<div class="nav-divider">&nbsp;</div>
	
    <ul class="select <?php active_class('what_we_do');?>"><li><a href="<?php echo admin_url('what_we_do');?>"><b>CMS Pages</b><!--[if IE 7]><!--></a><!--<![endif]-->
	<!--[if lte IE 6]><table><tr><td><![endif]-->
	<div class="select_sub <?php active_class('what_we_do','show');?>">
		<ul class="sub">
			<li class="<?php active_class('index', 'sub_show');?>"><a href="<?php echo admin_url('what_we_do');?>">Works Done</a></li>
            <li class="<?php active_class('members', 'sub_show');?>"><a href="<?php echo admin_url('what_we_do/members');?>">Members</a></li>
            <li class="<?php active_class('stories', 'sub_show');?>"><a href="<?php echo admin_url('what_we_do/stories');?>">Stories</a></li>
             <li class="<?php active_class('donation', 'sub_show');?>"><a href="<?php echo admin_url('what_we_do/donation');?>">Donation</a></li>
             
             <li class="<?php active_class('about_us', 'sub_show');?>"><a href="<?php echo admin_url('what_we_do/about_us');?>">About Us</a></li>
              <li class="<?php active_class('sliding', 'sub_show');?>"><a href="<?php echo admin_url('what_we_do/sliding');?>">Home Images</a></li>
                <li class="<?php active_class('sliding', 'banner');?>"><a href="<?php echo admin_url('what_we_do/banner');?>">Banners</a></li>
             
              
			
		</ul>
	</div>
	<!--[if lte IE 6]></td></tr></table></a><![endif]-->
	</li>
	</ul>
    
	
	
    
	<div class="nav-divider">&nbsp;</div>
	
	
	<ul class="select <?php active_class('contact');?>"><li><a href="<?php echo admin_url('contact');?>"><b>Contact</b><!--[if IE 7]><!--></a><!--<![endif]-->
	<!--[if lte IE 6]><table><tr><td><![endif]-->

            
			
		</ul>
	</div>
	<!--[if lte IE 6]></td></tr></table></a><![endif]-->
	</li>
	</ul>
	
	
	
	
	
	
   
    
    
	<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>