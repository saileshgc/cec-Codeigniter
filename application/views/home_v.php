<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>NGO</title>
<script type="text/javascript">var sitePath = '<?php echo site_url();?>';</script>
<?php $this->load->view('css_js');?>
<?php //die("here");?>

</head>
<body>

<div id="wrapper">
      <div id="header">
    <div class="headerRight">
          <div class="topLinks">
		  <ul id="socialMedias">
              <li><a href="http://twitter.com/#!/PickPlanPlay1" target="_blank"><img src="<?php echo config_item('site_images');?>twitter.png" alt="twitter" /></a></li>
              <li><a href="http://www.facebook.com/pages/Pick-Plan-Play/204891709546325" target="_blank"><img src="<?php echo config_item('site_images');?>facebook.png" alt="facebook" /></a></li>
            </ul>
        <?php if(is_logged_in()) : ?>
       	Welcome <?php echo member_name();?><span style="padding-left:5px;"><a href="<?php echo site_url('login/logout');?>">LOGOUT</a></span>
        <?php else: ?>
        <a href="<?php echo site_url();?>">HOME</a> | <a href="<?php echo site_url('register');?>">CLIENT REGISTRATION</a> | <a href="<?php echo site_url('login');?>">CLIENT LOGIN</a>
        <?php endif; ?>
        
      </div>
          <div class="memberLogin">
        <div class="memberLoginForm">
              <h2>become a member</h2>
              <p>Join the Pick Plan Play family for exclusive 
            deals and offers.</p>
              <form action="">
            <input type="button" class="join" id="join_now" value="join now" />
            	<div class="inpWrap">
                  <input type="text" class="text toogle" id="join_email" value="Email Address" />
                </div>
          </form>
            </div>
      </div>
          <?php $deal = get_deal();?>
          <?php if(!empty($deal)) : ?>
          <div class="bestDeal"><a href="<?php echo $deal->link;?>" onclick="return updateBestDealStatus(<?php echo $deal->id;?>);" target="_blank"><img src="<?php echo config_item('deal_images_path').$deal->image;?>" /></a>
        <!--<div class="badge"></div>-->
      </div>
          <?php endif; ?>
        </div>
    <div id="logo"> <a href="<?php echo site_url();?>"><img src="<?php echo config_item('site_images');?>logo.png" alt="pickplanplay" /></a> </div>
	
  </div>
  
      <!-- end #header -->
      <div id="page" class="clf">
    <div id="content">
          <?php $this->load->view('menu');?>
          <div class="post">
        <div class="pTop">
              <div class="pBtm">
            <?php $this->load->view($content_view);?>
          </div>
            </div>
      </div>
        <div id="footer">
        	<!--<p>&copy; 2011. PickPlanPlay. All Rights Reserved.</p>-->
			 <ul>
			  <li><span class="copyRight">&copy; 2011. PickPlanPlay. All Rights Reserved.</span></li>
			  <li><a href="<?php echo site_url('page/about');?>">About Us</a></li>
			  <li><a href="<?php echo site_url('page/terms');?>">Terms and Conditions</a></li>
			  <li><a href="<?php echo site_url('page/policy');?>">Privacy Policy</a></li>
			  <li><a href="<?php echo site_url('contact');?>">Contact Us</a></li>
			</ul>
      	</div>
          <!-- end #footer --> 
        </div>
    <!-- end #content -->
    <div id="sidebar">
	<div class="selectState"><a href="javascript:;" id="selectNewState"><span>Select a State</span></a></div>
          <ul>
        <li id="search">
              <h2>SEARCH</h2>
              <form action="<?php echo site_url('calendar/process_search/');?>" method="post">
				<div class="inpWrap">
					  <input type="text" name="search_key" id="search_key" class="text toogle" value="Search" />
					</div>
				<input name="search_event" id="search_event" type="submit" class="search" value="SEARCH" />
			  </form>
            </li>
        <li id="searchFilter">
              <h2>SEARCH FILTER</h2>
              <form action="<?php echo site_url('calendar/process_search/');?>" method="post">
            <ul>
                  <li>
                <label>Activity:</label>
                <?php
					$categories = event_categories('class', 'category_name');
				?>
                <select name="category"	class="width189">
                      <option value="">All</option>
                      <?php if(count($categories) > 0) : ?>
                      <?php foreach($categories as $category) : ?>
                      <option value="<?php echo $category->category_slug;?>" <?php if(isset($_GET['activity'])){ if($_GET['activity'] == $category->category_slug) echo 'selected = "selected"';}?>)><?php echo $category->category_name;?></option>
                      <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
              </li>
                  <li>
                <label>Postcode:</label>
                <div class="inpWrap"> <span>
                  <input type="text" name="postcode" id="postcode" value="<?php if(isset($_GET['pcode'])) echo $_GET['pcode'];?>" />
                  </span> </div>
              </li>
                  <!--<li>
                <label>State:</label>
					<?php // $state_id = isset($_GET['state']) ? $_GET['state'] : NULL; ?>
                  	<?php // select_states('state_id', $state_id, 'All', 'width189');?>
              </li>-->
                  <li>
                <label>Age range:</label>
                <div class="ageRange clf">
                      <label>From</label>
                      <select style="width: 66px;" name="age_from">
                    <option value="newborn" <?php if(isset($_GET['age_from'])){ if($_GET['age_from'] == 'newborn') echo 'selected="selected"';}?>>Newborn</option>
                    <?php for($i=1; $i<=16; $i++): ?>
                    <option value="<?php echo $i;?>" <?php if(isset($_GET['age_from'])){ if($_GET['age_from'] == $i) echo 'selected="selected"';}?>><?php echo $i;?> yrs</option>
                    <?php endfor; ?>
                  </select>
                      <label>To</label>
                      <select style="width: 42px;" name="age_to">
                    <?php for($i=1; $i<=15; $i++): ?>
                    <option value="<?php echo $i;?>" <?php if(isset($_GET['age_to'])){ if($_GET['age_to'] == $i) echo 'selected="selected"';}?>><?php echo $i;?> yrs</option>
                    <?php endfor; ?>
                    <option value="16" <?php if(isset($_GET['age_to'])){ if($_GET['age_to'] == 16) echo 'selected="selected"';} else if(!isset($_GET['age_to'])){ echo 'selected = "selected"';}?>><?php echo $i;?> yrs</option>
                  </select>
                    </div>
              </li>
                </ul>
            <input type="hidden" name="calendar_view" value="<?php echo current_url();?>" />
            <input name="search_events" type="submit" class="search_event" value="SEARCH" />
          </form>
            </li>
        <?php $this->load->view('rightside_ad');?>
      </ul>
          <div class="sideBtm">&nbsp;</div>
          <img src="<?php echo config_item('site_images');?>childrens.gif" alt="childrens" class="childrens" /> </div>
    <!-- end #sidebar --> 
    
  </div>
      <!-- end #page --> 
    </div>
<script type="text/javascript">
/* <![CDATA[ */
jQuery(document).ready(function() {
$('.ageRange .jqTransformSelectWrapper:odd').css('margin-right','0');

jQuery('.icViewDay .icDayContent').each(function(){
	var _ec = $(this).children('.icEvent').size();
	var _ecw = 600/_ec;
	var _ec = $(this).children('.icEvent').css('width',_ecw+"px");
});

$('div.day_today').parent('td').addClass('icToday');
//$('.lastItem span').addClass('lastday');

});
/* ]]> */
</script> 
<script type="text/javascript"> 
	Cufon.now(); 
	
	var default_search = $('#search_key').val();
	
	$('#search_event').click(function(){
		_key = $('#search_key').val();
		if(_key == default_search || _key == '')
			return false;
		else
		{
			return true;
		}
	});
	
	var default_email = $('#join_email').val();
	$('#join_now').click(function(){
		_email = $('#join_email').val();
		if(_email == default_email || _email == '')
			_email = '';
		
		_redirect = '<?php echo site_url('join');?>';
		if(_email)
			_redirect = _redirect + '?email=' + _email;
			
		window.location.href = _redirect;
		return false;
	});
	
	$('#selectNewState').click(function(){
		tb_show("Select State", "<?php echo site_url('home/select_member_state/');?>?TB_iframe=true&height=220&width=400&modal=true","");
	});
	
</script>
</body>
</html>
