<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function site_title()
{
	$CI = &get_instance();
	return $CI->config->item('site_title');
}

function project_title()
{
	$CI = &get_instance();
	return $CI->config->item('project_title');
}

function debug_array($array)
{
	echo "<pre>";
	print_r($array);
	echo "</pre>";
}

function admin_url($uri='')
{
	$CI = &get_instance();
	return site_url('admin').'/'.$uri;
}


function upload_image($image, $target, $thumb = array('dest' => '', 'size' => array('w' => 257, 'h' => 218), 'ratio' => false), $prev_img = NULL)
{
	
	$CI = &get_instance();
	initialize_upload($target);
	if($CI->upload->do_upload($image))
	{
		if($prev_img)
		{
			if(is_file($target.$prev_img))
				@unlink($target.$prev_img);
		}
		
		$data = $CI->upload->data();
		$image = $data['file_name'];
		$image_path = $data['full_path'];
		$image_name = $data['raw_name'];
		$image_ext = $data['file_ext'];
		
		if($thumb)
		{
			//$thumb_size = array('w' => 200, 'h' =>220);
			if($thumb['dest'])
				$dest = $thumb['dest'];
			else
				$dest = $target;
			create_thumb($image_path, $dest.$image, $thumb['size'], $thumb['ratio']);
		}
		return $image;
	}
	else
	{
		$CI->session->set_flashdata('error_message', $CI->upload->display_errors());
		return false;
		//return $CI->upload->display_errors();
	}
	
}

function initialize_upload($path, $max_size = '20480', $max_width = '2048', $max_height='2048')
{
	$CI = &get_instance();
	$config['upload_path'] = $path;
	$config['allowed_types'] = 'gif|jpg|png';
	$config['max_size']	= $max_size;
	$config['max_width']  = $max_width;
	$config['max_height']  = $max_height;
	
	$CI->load->library('upload', $config);

}

function create_thumb($src, $dest, $size, $ratio = false)
{
	$CI = &get_instance();
	
	$config['image_library'] = 'gd2';
	$config['source_image'] = $src;
	$config['new_image']    = $dest;
	$config['create_thumb'] = TRUE;
	if($ratio)
		$config['maintain_ratio'] = TRUE;
	else
		$config['maintain_ratio'] = FALSE;
		
	$config['thumb_marker'] = '';	
		
	$config['width'] = $size['w'];
	$config['height'] = $size['h'];
	
	$CI->load->library('image_lib');
	$CI->image_lib->initialize($config); 
	
	$CI->image_lib->resize();

}

function global_message()
{ 
	$CI = &get_instance();
	if ($CI->session->flashdata('error_message'))
	{ 
		echo global_message_output($CI->session->flashdata('error_message') , 'error_message' ) ; 
	}
	if ($CI->session->flashdata('success_message'))
	{ 
		echo global_message_output($CI->session->flashdata('success_message') , 'success_message' ) ; 
		
	}
	if ($CI->session->flashdata('warning_message'))
	{ 
		echo global_message_output($CI->session->flashdata('warning_message') , 'warning_message' ) ; 
		
	}
	// this is because to show the error when there is error in the insertion in the database. We cannot use session beaucas it does not support the object as the value. We we used the post data again as the source to conserve the data. 
	if ($CI->input->post('error_message')) 
	{ 
		echo global_message_output($CI->input->post('error_message') , 'error_message' ) ; 
	}     
}

function global_message_output($msg, $var_name)
{ 
	if (is_string($msg))
	{ 
		return    "<div class='".$var_name."' onclick='javascript:$(this).fadeOut(1000)'><span>".$msg."<span><span style='float:right'>x</span></div>"; 		
	}
	else if (is_array($msg))
	{ 
		$message = "<ul class= '".$var_name."' style='list-style:disc' onclick='javascript:$(this).fadeOut(1000)'> "; 
		
		foreach ($msg as $ms) 
		{ 
			$message .= "<li>" . $ms . "</li>" ; 
		} 
		$message .= "</ul>"; 
		return $message; 
	}  
}

function show_message($msg_type, $msg)
{
	switch($msg_type)
	{
		case 'error_message':
			echo '<div id="message-yellow">
					<table border="0" width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td class="yellow-left">'.$msg.'</td>
						<td class="yellow-right"><a class="close-yellow"><img src="'.config_item('admin_images').'table/icon_close_yellow.gif"   alt="" /></a></td>
					</tr>
					</table>
				</div>';		
			break;
	}
	
}

function new_date( $date )
{ 
		echo date("D N M , Y", strtotime(substr($date,0,10)));
	//return date("j F Y" , strtotime(substr($date,0,10))); 
}  

function new_day($date)
{
	return date("l" , strtotime(substr($date,0,10))); 
}

function new_time($date)
{
	return date("g:i a", strtotime($date));
}

function create_pagination($totalRows, $uri_segment = 4, $per_page = NULL)
{
	$CI = &get_instance();
	$CI->load->library('pagination');
	if (preg_match('/(.*)\/page\/[0-9]+/',current_url()))
	{ 	
		$url = preg_replace('/\/page\/[0-9]+/','',current_url());
		$array['base_url'] = $url.'/page'; 
	} 
	else 
	{ 
		$array['base_url'] = current_url()."/page"; 
	} 
	
	//$array['base_url'] = site_url('admin/media/lists/page/');
	$array['total_rows'] = $totalRows ;
	$array['uri_segment'] = $uri_segment;
	$array['first_link'] = 'First';
	$array['last_link'] = 'Last';
	$array['next_link'] = 'Next';
	$array['prev_link'] = 'Prev';
	if($per_page)
		$array['per_page'] = $per_page;
	else
		$array['per_page'] = $CI->config->item('per_page');

	$CI->pagination->initialize($array);
	
	// if some rows is deleted then there is no rows for that particular page then redirect to previous page. 
	
	if ($totalRows == $CI->uri->segment($uri_segment) and preg_match('/(.*)\/page\/[0-9]+/',current_url()) ) 
	{ 
		$CI->session->keep_flashdata('error_message');
		$CI->session->keep_flashdata('success_message');
		$uri_value = ($totalRows -  $array['per_page']); 
		$url = $array['base_url'].'/'. $uri_value; 
		if ($uri_value== 0 ) 
		{ 
			$url = preg_replace('/\/page\/[0-9]+/','', current_url());
		} 
		
		$query = $_SERVER['QUERY_STRING'];
		if($query)
			$url = $url.'/?'.$query;

		redirect( $url ); 
	} 
}

function action_link($type, $id, $replace=NULL)
{
	$CI = &get_instance();

	$segment_array  =  $CI->uri->segment_array(); 
	$keys = array_keys($segment_array, 'page');
	if (count($keys))
	{ 
		array_splice($segment_array, count($segment_array)-2, 0, array($type,$id));
	}
	else 	
	{ 
		array_splice($segment_array, count($segment_array), 0, array($type,$id)); 
	}
	
	if($replace)
	{
	
		unset($segment_array[$replace]);
	}
	
	$url =  site_url($segment_array);  
	
	$query = $_SERVER['QUERY_STRING'];
	if($query)
		$url = $url.'/?'.$query;

	return $url;
}

function filter_url($type, $query=NULL)
{ 
	$CI = &get_instance();
	$segment_array  =  $CI->uri->segment_array(); 
	$keys = array_keys($segment_array, $type);
	
	$total = count($segment_array); 
	if (count($keys))
	{ 
		array_splice($segment_array, $keys[0]-1 ,2 ); 
		
	}
	
	$url =  site_url($segment_array); 
	
	$query = $_SERVER['QUERY_STRING'];
	if($query)
		$url = $url.'/?'.$query;
	return $url;
}

function select_countries($identity = 'countries_id', $selected=NULL, $option='Select Country', $class='styledselect-day width200')
{
	$CI = &get_instance();
	$countries = $CI->general_model->get_countries();
	
	$output = '<select name="'.$identity.'" id="'.$identity.'" class="'.$class.'">';
	if($option)
	{
		$output.= '<option value="">'.$option.'</option>';
	}
	foreach($countries as $country)
	{
		$output.= '<option value="'.$country->countries_id.'"';
		if($selected)
		{
			if(is_numeric($selected))
			{
				if($country->countries_id == $selected)
					$output.= ' selected = "selected"';
			}
			else
			{
				if(strtolower($country->countries_name) == strtolower($selected))
					$output.= ' selected = "selected"';
			}
		}
		$output.= '>'.$country->countries_name.'</option>';
	}
	$output.= '</select>';
	echo $output;
}

function get_states()
{
	$CI = &get_instance();
	$states = $CI->general_model->get_states();
	return $states;
}
function get_countries()
{
	$CI = &get_instance();
	$countries = $CI->general_model->get_countries();
	return $countries;
}

function select_event_categories($identity = 'event_category_id', $event_type='class', $selected=NULL, $option='Select Category', $class='styledselect-day width200', $other=true)
{
	$CI = &get_instance();
	$CI->load->model('calendar_model');
	$categories = $CI->calendar_model->get_event_categories($event_type);
	
	$output = '<select name="'.$identity.'" id="'.$identity.'" class="'.$class.'" >';
	if($option)
		$output.= '<option value="">'.$option.'</option>';

	foreach($categories as $category)
	{
		$output.= '<option value="'.$category->category_id.'"';
		if($selected)
		{
			if(is_numeric($selected))
			{
				if($category->category_id == $selected)
					$output.= ' selected = "selected"';
			}
		}

		$output.= '>'.$category->category_name.'</option>';
	}

	$output.= '</select>';
	echo $output;
}

function event_categories($event_type=NULL, $order_by=NULL)
{
	$CI = &get_instance();
	$CI->load->model('calendar_model');
	return $CI->calendar_model->get_event_categories($event_type, $order_by);
}


function array_values_exist($array)
{
	$values =  array_count_values($array);
	if($values[''] == count($array))
		return false;
	else
		return true;
}

function fullName($first_name, $last_name)
{
	return ucfirst($first_name).'&nbsp;'.ucfirst($last_name);
}

function generateRandom($len=8)
{
	return substr(md5(time().rand(1,999999)), 0, $len);
}

function generatePassword($len=8)
{
	return generateRandom($len);
}

function upload_file($file, $target, $file_type, $prev_file = NULL, $max_size = '102400')
{

	$CI = &get_instance();
	$config['upload_path'] = $target;
	$config['allowed_types'] = $file_type;
	$config['max_size']	= $max_size;
	
	$CI->load->library('upload', $config);
	
	if($CI->upload->do_upload($file))
	{
		if($prev_file)
		{
			if(is_file($target.$prev_file))
				@unlink($target.$prev_file);
		}
		
		$data = $CI->upload->data();
		$file = $data['file_name'];
				
		return $file;
	}
	else
	{
		$CI->session->set_flashdata('error_message', $CI->upload->display_errors());
		return false;
		//return $CI->upload->display_errors();
	}
	
}

function short_text($string, $limit)
{
	if($limit)
	{
		$CI = &get_instance();
		$CI->load->helper('text');
		$short_text = character_limiter($string, $limit);
		
		return $short_text;
	}
	else
		return $string;
}

function active_class($uri , $class_name = 'current' )
{ 
	$CI =  &get_instance(); 
	
	$controller = $CI->router->fetch_class();
	$method = $CI->router->fetch_method();
	if(is_array($uri))
	{
		if(in_array($controller, $uri))
		{
			echo $class_name;
		}
	}
	else
	{
		if ($uri  == $controller || $uri == $method) 
			echo $class_name; 
	}
} 

function enum_select( $table , $field )
{
	$query = " SHOW COLUMNS FROM `$table` LIKE '$field' ";
	$result = mysql_query( $query ) or die( 'error getting enum field ' . mysql_error() );
	$row = mysql_fetch_array( $result , MYSQL_NUM );
	$regex = "/'(.*?)'/";
	//$regex = "/'[^"\\\r\n]*(\\.[^"\\\r\n]*)*'/";
	preg_match_all( $regex , $row[1], $enum_array );
	$enum_fields = $enum_array[1];
	return( $enum_fields );
}

function get_events($cur_date, $where=NULL, $limit=NULL)
{
	$CI = & get_instance();
	$sql = 'SELECT * FROM p3_events left join p3_event_categories on (p3_events.category_id = p3_event_categories.category_id) JOIN p3_events_datetime ON (p3_events.id = p3_events_datetime.event_id) WHERE p3_events_datetime.event_date = "'.$cur_date.'" and publish = "yes"';
	if($where)
		$sql.= ' and '.$where;
	$sql.= ' order by p3_events_datetime.event_time_start asc';
	if($limit)
		$sql.= ' limit '.$limit;
	$query = $CI->db->query($sql);
	return $query->result();
}

function get_webdeals($cur_date)
{
	$CI = & get_instance();
	$sql = 'SELECT * FROM p3_web_deals WHERE publish = "yes" and calendar_date = "'.$cur_date.'"';
	$query = $CI->db->query($sql);
	return $query->result();
}

function total_webdeals()
{
	$CI = & get_instance();
	$sql = 'SELECT * FROM p3_web_deals WHERE publish = "yes" and calendar_date = "'.$cur_date.'"';
	$query = $CI->db->query($sql);
	return $query->num_rows();
}

function total_events($cur_date, $where=NULL)
{
	$CI = & get_instance();
	$sql = 'SELECT * FROM p3_events left join p3_event_categories on (p3_events.category_id = p3_event_categories.category_id) JOIN p3_events_datetime ON (p3_events.id = p3_events_datetime.event_id) WHERE p3_events_datetime.event_date = "'.$cur_date.'" and publish = "yes"';
	if($where)
		$sql.= ' and '.$where;
	$query = $CI->db->query($sql);
	return $query->num_rows();
}

function get_day_events($date, $time, $interval, $where=NULL)
{
	$CI = & get_instance();
	$CI->load->model('calendar_model');
	return $CI->calendar_model->get_day_events($date, $time, $interval, $where);
}

function calendar_time($time)
{
	$CI = & get_instance();
	return date('g:i a', strtotime($time));
}

function calendar_date($date)
{
	$CI = & get_instance();
	return date('j M, Y', strtotime($date));
}

function get_banners($position, $number)
{
	$CI = & get_instance();
	$CI->load->model('banner_model');
	return $CI->banner_model->get_banners_randomly($position, $number);
}

function get_deal()
{
	$CI = & get_instance();
	$CI->load->model('deal_model');
	$deal = $CI->deal_model->get_deal_randomly();
	if(!empty($deal))
	{
		$update['views'] = $deal->views + 1;
		$CI->general_db_model->update('p3_best_deals', $update, 'id = '.$deal->id);
	}
	return $deal;
}

function member_id()
{
	$CI = &get_instance();
	return $CI->session->userdata('member_login_id');
}

function member_type()
{
	$CI = &get_instance();
	return $CI->session->userdata('member_type');
}


function member_name()
{
	$CI = &get_instance();
	return $CI->session->userdata('member_login_name');
}

function member_email()
{
	$CI = &get_instance();
	$CI->load->model('member_model');
	$client = $CI->member_model->get_client_by_id(member_id());
	return $client->business_email;
}

function admin_login_id()
{
	$CI = &get_instance();
	return $CI->session->userdata('admin_login_id');
}

function is_logged_in()
{
	$CI = &get_instance();
	if($CI->session->userdata('member_login_id'))
		return true;
	else
		return false;
}

function total_new_member_events()
{
	$CI = & get_instance();
	$CI->load->model('calendar_model');
	return $CI->calendar_model->total_new_member_events();
}

function event_added_by($from, $id)
{
	$CI = & get_instance();
	if($from == 'member')
	{
		$CI->db->select('business_name');
		$CI->db->where('client_id', $id);
		$query = $CI->db->get('p3_clients');
		$row = $query->row();
		if($row)
			return $row->business_name;
		else
			return false;
	}
	else
	{
		$CI->db->select('name');
		$CI->db->where('id', $id);
		$query = $CI->db->get('p3_admin_login_info');
		$row = $query->row();
		if($row)
			return $row->name;
		else
			return false;
	}
}

function checkPopup()
{
	$CI = & get_instance();
	if ($CI->input->cookie('alwPopup') == 'YES')
	{ 
		return true;
	}
	
	return false;
}

function member_state_id()
{
	$CI = &get_instance();
	if ($CI->input->cookie('mbrStateId'))
	{ 
		return $CI->input->cookie('mbrStateId');
	}

	return false;
}

function get_timeZone($state_id)
{
	$CI = &get_instance();
	$CI->db->select('timezone');
	$CI->db->where('id', $state_id);
	$query = $CI->db->get('p3_states');
	$row = $query->row();
	return $row->timezone;
}

function postcodesInRadius($center_postcode, $radius, $unit='miles')
{
	$CI = & get_instance();
	if(strtolower($unit)!='miles'){ $radius = $radius*0.621371192; } //assume unit is kilometers if it isn't miles/default. convert kilometers to miles before calculations occur
	$query = $CI->db->query("SELECT `lat`,`lon` FROM `p3_postal_codes` WHERE `postcode`='{$center_postcode}'");
	$result = $query->row();
	
	$postcodes = array($center_postcode);
	if($result)
	{
		$lat = $result->lat;
		$lon = $result->lon;
		
		$query = $CI->db->query("SELECT `postcode` FROM `p3_postal_codes` WHERE (POW((69.1*(`lon`-\"$lon\")*cos($lat/57.3)),\"2\")+POW((69.1*(`lat`-\"$lat\")),\"2\"))<($radius*$radius)");
		$ref = $query->result();
		foreach($ref as $val)
		{
			if(!in_array($val->postcode, $postcodes))
				array_push($postcodes, $val->postcode);
		}
	
	}

	return $postcodes;
}

function total_events_for_approval()
{
	$CI = &get_instance();
	$CI->load->model('calendar_model');
	return $CI->calendar_model->total_events_log('approval = "0"');
}

function total_web_deals_for_approval()
{
	$CI = &get_instance();
	$CI->load->model('web_deal_model');
	return $CI->web_deal_model-> total_deals_web('approval = "0"');
}


function delete_event_image($image)
{
	if($image)
	{
		$CI = &get_instance();
		$path = $CI->config->item('event_images_root');
		if(is_file($path.$image))
		{
			@unlink($path.$image);
		}
		else
			return false;
	}
	else
		return false;
}

function encode($string,$key) {
    $key = sha1($key);
    $strLen = strlen($string);
    $keyLen = strlen($key);
	$j=0;
	$hash='';
    for ($i = 0; $i < $strLen; $i++) {
        $ordStr = ord(substr($string,$i,1));
        if ($j == $keyLen) { $j = 0; }
        $ordKey = ord(substr($key,$j,1));
        $j++;
        $hash .= strrev(base_convert(dechex($ordStr + $ordKey),16,36));
    }
    return $hash;
}

function decode($string,$key) {
    $key = sha1($key);
    $strLen = strlen($string);
    $keyLen = strlen($key);
	$j=0;
	$hash='';
    for ($i = 0; $i < $strLen; $i+=2) {
        $ordStr = hexdec(base_convert(strrev(substr($string,$i,2)),36,16));
        if ($j == $keyLen) { $j = 0; }
        $ordKey = ord(substr($key,$j,1));
        $j++;
        $hash .= chr($ordStr - $ordKey);
    }
    return $hash;
}

function get_compressed_js()
{
	header('Content-type: text/javascript');
	ob_start("ob_gzhandler");
	
	include_once(config_item('site_asset').'plugins/jquery/jquery-1.5.1.js');
	include_once(config_item('admin_js').'jquery.validate.js');
	include_once(config_item('site_asset').'plugins/jquery/jquery.cycle.all.min.js');
	include_once(config_item('site_asset').'plugins/jquery/jquery.hoverIntent.minified.js');
	include_once(config_item('site_asset').'plugins/jquery/curvycorners.src.js');
}


function readXml($filename)
{
	$CI = &get_instance();	
	$CI->load->library('xml');
	$path = $filename;
	$array = $CI->xml->parse();
	var_dump($array);
}



function makeXMLTree($data)
 {
    $output = array();
    $parser = xml_parser_create();
	xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
    xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
    xml_parse_into_struct($parser, $data, $values, $tags);
    xml_parser_free($parser);
    
    $hash_stack = array();
    
    foreach ($values as $key => $val)
    {
     switch ($val['type'])
     {
      case 'open':
       array_push($hash_stack, $val['tag']);
       break;
     
      case 'close':
       array_pop($hash_stack);
       break;
     
      case 'complete':
       array_push($hash_stack, $val['tag']);
       eval("\$output['" . implode($hash_stack, "']['") . "'] = \"{$val['value']}\";");
       array_pop($hash_stack);
       break;
     }
    }
    return $output;
   }
   
function parse_xml($xml, $tag)
{
	$objDOM = new DOMDocument();
	$objDOM->load($xml);
	$notes = $objDOM->getElementsByTagName($tag);
	//print_r($notes);
	if($notes->length > 0)
	{
		$array = array();
		foreach($notes as $key=>$note)
		{
			//$array[$key][$note->tagName] = $note->nodeValue;
			$child_array = array();
			$childs = $note->childNodes;
			foreach($childs as $child)
			{
				$array[$key][$child->nodeName] = $child->nodeValue;
			}
		}
		//debug_array($array);
		return $array;
	}
	else
		return false;

}

function paymentIpn()
{
	//send_email('sona@ebpearls.com', 'hi','transaction not completed', 'header','roshan@ebpearls.com');
	$CI = &get_instance();
	$req = 'cmd=_notify-validate';
	foreach ($_POST as $key => $value){
		$value = urlencode(stripslashes($value));
		$req .= "&$key=$value";
	}
	// post back to PayPal system to validate
	$header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
	$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
	$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
	//For Live Mode: ssl://www.paypal.com
	//For Test Mode: ssl://www.sandbox.paypal.com
	//$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);
	//$fp = fsockopen ('www.sandbox.paypal.com', 80, $errno, $errstr, 30);
	$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);
	
	// assign posted variables to local variables
	 $item_name = $_POST['item_name'];
	 $item_number = $_POST['item_number'];
	 $payment_status = $_POST['payment_status'];
	 $payment_amount = $_POST['mc_gross'];
	 $payment_currency = $_POST['mc_currency'];
	 $txn_id = $_POST['txn_id'];
	 $receiver_email = $_POST['receiver_email'];
	 $payer_email = $_POST['payer_email'];
	 $local_txn_id = $_POST['custom'];
	 $txn_type = $_POST['txn_type'];
	 
	 if (!$fp){
		// HTTP ERROR
		
		send_email($to, 'Product Payment Socket Error', 'Product Payment Socket Error');
	}
	else{
		fputs ($fp, $header . $req);
		while (!feof($fp)){
			$res = fgets ($fp, 1024);
			if (strcmp ($res, "VERIFIED") == 0){
				// check the payment_status is Completed
				// check that txn_id has not been previously processed
				// check that receiver_email is your Primary PayPal email
				// check that payment_amount/payment_currency are correct
				// process payment
				if($payment_status == 'Completed'){
				        
						send_email('sona@ebpearls.com', 'hi',$req, 'header','sona@ebpearls.com');
				}
				
			}
			else if (strcmp ($res, "INVALID") == 0){
				// log for manual investigation
				send_email('sona@ebpearls.com', 'hi','transaction not completed', 'header','roshan@ebpearls.com');
			}
		}
		fclose ($fp);
	}
	 }

   
?>