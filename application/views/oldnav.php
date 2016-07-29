<div class="nav">
	<div class="table">
	
	<ul class="select <?php active_class('home');?>">
		<li><a href="<?php echo admin_url('home');?>"><b>Dashboard</b><!--[if IE 7]><!--></a><!--<![endif]--></li>
	</ul>
	
	<div class="nav-divider">&nbsp;</div>
						
	<ul class="select <?php active_class('event');?>"><li><a href="<?php echo admin_url('event');?>"><b>Events</b><!--[if IE 7]><!--></a><!--<![endif]-->
	<!--[if lte IE 6]><table><tr><td><![endif]-->
	
	<!--[if lte IE 6]></td></tr></table></a><![endif]-->
	</li>
	</ul>
	
	<div class="nav-divider">&nbsp;</div>
	
    <ul class="select <?php active_class('aboutorg');?>"><li><a href="<?php echo admin_url('aboutorg');?>"><b>About Organization</b><!--[if IE 7]><!--></a><!--<![endif]-->
	<!--[if lte IE 6]><table><tr><td><![endif]-->
	<div class="select_sub <?php active_class('aboutorg','show');?>">
		<ul class="sub">
			<li class="<?php active_class('index', 'sub_show');?>"><a href="<?php echo admin_url('aboutorg');?>">Organization Info</a></li>
            <li class="<?php active_class('members', 'sub_show');?>"><a href="<?php echo admin_url('aboutorg/members');?>">Members</a></li>
			
		</ul>
	</div>
	<!--[if lte IE 6]></td></tr></table></a><![endif]-->
	</li>
	</ul>
    
	
	
    
	<div class="nav-divider">&nbsp;</div>
	
	<ul class="select <?php active_class('what_we_do');?>"><li><a href="<?php echo admin_url('what_we_do');?>"><b>What We Do</b><!--[if IE 7]><!--></a><!--<![endif]-->
	<!--[if lte IE 6]><table><tr><td><![endif]-->
	<div class="select_sub <?php active_class('what_we_do','show');?>">
		<ul class="sub">
			<li class="<?php active_class('index', 'sub_show');?>"><a href="<?php echo admin_url('what_we_do');?>">Works Done</a></li>
			<li class="<?php active_class('stories', 'sub_show');?>"><a href="<?php echo admin_url('what_we_do/stories');?>">Stories</a></li>
		</ul>
	</div>
	<!--[if lte IE 6]></td></tr></table></a><![endif]-->
	</li>
	</ul>
	<div class="nav-divider">&nbsp;</div>
	
	<ul class="select <?php active_class('donation');?>"><li><a href="<?php echo admin_url('donation');?>"><b>Donation</b><!--[if IE 7]><!--></a><!--<![endif]-->
	<!--[if lte IE 6]><table><tr><td><![endif]-->
	<div class="select_sub <?php active_class('donation','show');?>">
		<ul class="sub">
			<li class="<?php active_class('index', 'sub_show');?>"><a href="<?php echo admin_url('donation');?>">Cause</a></li>
			<li class="<?php active_class('donar', 'sub_show');?>"><a href="<?php echo admin_url('donation/donar');?>">Donar Info</a></li>
		</ul>
	</div>
	<!--[if lte IE 6]></td></tr></table></a><![endif]-->
	</li>
	</ul>
	<div class="nav-divider">&nbsp;</div>
	

    
	<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>