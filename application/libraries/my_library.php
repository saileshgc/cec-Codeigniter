<?php 
//Author Prabeen Giri <prabeengiri.com.np> 
class My_library
{ 
		var $requiredPost =  array(); 
		var $CI; 
		
		function __construct()
		{ 
			$this->CI =& get_instance();
		} 
		
		function send_email($to, $subject, $message, $header , $from)
		{
			$CI = &get_instance();
			$CI->load->library('email');
					
			$CI->email->clear(true);
			
			$config['mailtype'] = 'html';
			$config['charset']  = 'iso-8859-1';
			$config['send_multipart'] = false;
			$CI->email->initialize($config);
			
			$CI->email->from($from, $header);
			$CI->email->to($to);
			
			$CI->email->subject($subject);
			$CI->email->message($message);
			
			if($CI->email->send())
				return true;
			else
				return false;
		}
		
} 
?>