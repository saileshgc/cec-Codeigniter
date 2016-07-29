<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');  
class CI_Authenticate
{ 
	private $CI;
	//private $member_pages = array('dashboard','profile','business','mynotice','message'); 
	function CI_Authenticate()
	{ 
		$this->CI =& get_instance();
		$this->check_admin_login();
		$this->check_member_login();
		//$this->check_client_login();
	} 
	
	function check_admin_login()
	{ 	
		if ($this->CI->uri->segment(1) == 'admin' and $this->CI->uri->segment(2)!='login' ) 
		{ 
			if (!$this->CI->session->userdata('admin_logged_in')) 
			{ 
				if($this->CI->uri->segment(2))
					$this->CI->session->set_userdata('admin_redirect_login_url', uri_string()); 
				redirect(admin_url('login'));  
			}
			
		}
	
	}
	
	function check_member_login()
	{
		if ($this->CI->uri->segment(1) != 'admin') 
		{ 
			if($this->CI->uri->segment(1) == 'member')
			{
				if (!$this->CI->session->userdata('member_login_id')) 
				{ 
					if($this->CI->uri->segment(1))
						$this->CI->session->set_userdata('member_redirect_login_url', uri_string()); 
						
					redirect(site_url('login'));  
				}
			}
		}
	
	}
} 
?>