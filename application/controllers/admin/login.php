<?php
/* 
This controller contains the methods that is all related to login <br />
Eg. Forgot Password, Change Password , Process Login , Authentication

IMPORTANT: 
Session is set or not that has been checked in the my_loader library which runs in every pages. 

*/

class Login  extends CI_Controller
{ 
	private $after_login_url 	= 	'admin/home_admin';
	private $cookie_name 		= 	'auto_admin_login'; 
	private $cookie_value 		= 	'YES'; 
	private $cookie_expiry 		= 	 86500; 
	private $session_name 		= 	'admin_logged_in'; 
	// for internal use
	private $dir 				=  	''; 
	private $full_url 			= 	''; 
	private $admin_email_from 	=	'admin@ngo'; 
	private $admin_email_name 	= 	''; 
	private $table_name			= 	'ng_admin_info';
	private $encode_key 		= 	'my_key'; 
	private $login_id			=	'';
	
	function __construct() 
	{ 
		parent::__construct();
		$this->load->model('login_model'); 
		$this->initialize(); 
	} 
	
	function initialize($config=NULL)
	{ 
		//$this->after_login_url = $this->dir.$this->after_login_url;
	} 
	
	function do_upload($image)
	{
		$config['upload_path'] = $this->config->item('home_images_root');
		$config['allowed_types'] = 'txt';
		$config['max_size']	= '20480';
		$config['max_width']  = '2048';
		$config['max_height']  = '2048';

		$this->load->library('upload');
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload($image))
		{
			$error = array('error' => $this->upload->display_errors());
			return $this->upload->display_errors();
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			
			return $image = $data['file_name'];

		}
	}
	
	function upload_images()
	{
		
		$this->load->model('general_model');
		if (!empty($_FILES)){
			$this->load->helper('my_helper');
			
			//$image_name = upload_image('Filedata', $this->config->item('home_images_root'), false);
			//$image_name = $this->do_upload('Filedata');
			
			$tempFile = $_FILES['Filedata']['tmp_name'];
			$targetFile =  'C:/wamp/www/NGO_local/uploads/home_images/'. $_FILES['Filedata']['name'];
			move_uploaded_file($tempFile,$targetFile);
			$image_name = $_FILES['Filedata']['name'];
			
			if($image_name)
			{
				$data['home_image'] = $image_name;
				$last_order = $this->general_model->get_max_value('ng_home_images', 'sort_order');
				$data['sort_order'] = (int)$last_order + 1;
				$this->general_db_model->insert('ng_home_images', $data);
				echo "success";
			}
			else
				echo "failure";
				
			
				
			/*$tempFile = $_FILES['Filedata']['tmp_name'];
			$targetFile =  'C:/wamp/www/NGO_local/uploads/home_images/'. $_FILES['Filedata']['name'];
			move_uploaded_file($tempFile,$targetFile);*/
			
			/*$data = array();
			$data['sort_order'] = 1;
			$this->general_db_model->insert('ng_home_images',$data);*/
		}
			
	}
	
	
	
	function index()
	{ 
		//  if the admin has set the 'remember me checkbox logged' checked. 
		//$this->check_cookie();
		$this->process_login(); 
		$data['page_title'] = 'Admin Login' ;
		$this->load->view('admin/login_v', $data); 
	}
	
	// to authenticate the admin user // helper function 
	function process_login()
	{ 
		// has the form been submitted and with valid form info (not empty values)
		if($this->input->post('submit_login_info'))
		{
			
				$username = $this->input->post('login_username');
				$password = md5($this->input->post('login_pass'));
				
				$result_set = $this->login_model->authenticate($this->table_name, array('username'=>$username,'password'=>$password));
				
				
				if($result_set)
				{ 
					// if remember me chekbox has been checked. 
					/*if($this->input->post('rememberMe')) 
						$this->set_cookie(); */
					// set value to the session member variables
					
					
					// set into session variable that admin has logged in 
					 //$user_row = $result_set->row(); 
					 $this->login_id = $result_set->id;
					 $this->set_session_var();
					 //die();
					
					 // to redirect to the url entered before login if it is set .........after successful login. 
					/* if ($this->session->userdata('admin_redirect_login_url'))
					 { 
					 	$redirect_url = $this->session->userdata('admin_redirect_login_url'); 
					  	$this->session->unset_userdata('admin_redirect_login_url');
						redirect($redirect_url);		
					 } */
					 redirect($this->after_login_url); 
				}  
				else
				{ 
					$this->session->set_flashdata('error_message','Access Denied: Incorrect username and/or password..'); 
					redirect(current_url()); 
				} 
		}
	} 
	
	
	function forgot_password()
	{ 
		if ($this->input->post('forgot_password'))
		{ 
			// check the email provided. 
			$row_info = $this->login_model->check_email($this->table_name,array('login_email_address'=>$this->input->post('email')) ) ; 
			
			// if email or username does not exist in the database. 
			if (!$row_info)
			{ 
				$this->session->set_flashdata('error_message','Information you provided does not exist on the database.'); 
				redirect($this->config->item('admin_url').'login/forgot_password'); 
			} 
			// if exists then send confirmation email . 
			else 
			{ 
				// update the verification code. 
				$v_code = $this->login_model->update_verification_code($this->table_name,array('id'=>$row_info->id )) ; 
				// send email 
				$message .=  '<strong>Dear ' . ucfirst($row_info->first_name) .'</strong><br /<br />' ; 
 
				$message .=  'Please follow the link below to change your password <br>'; 
				$message .=  "<a href='". $this->full_url ."login/change_password/".$row_info->id."/".$v_code."' >". $this->full_url ."login/change_password/".$row_info->id."/".$v_code."</a>" ;
				$message .=  "<br><br><br>Thank You <br><br><strong>" .strtoupper( project_title() ) ."</strong>";  
				if( $this->my_library->sendEmail($this->input->post('email') , 'Reset Password',$message, project_title().' - Administrator', $this->admin_email_from)) 
				{
					$this->session->set_flashdata('success_message',' Confirmation email has been sent to your email . Please check '); 
					redirect($this->config->item('admin_url').'login/forgot_password'); 
				} 
				else
				{ 
					$this->session->set_flashdata('error_message','Something went wrong. Please try again later. '); 
					my_redirect($this->config->item('admin_url').'login/forgot_password');
				} 
			
			} 
			//$this->session->set_flashdata('errorMessage','Incorrect user email.  '); 
		} 
		

		$data['page_title'] = project_title()." | Forgot Password " ;
		$data['full_url']	= $this->full_url;  
		$this->load->view($this->dir.'forgot_password_v',$data); 
		
	
	} 
	
	function change_password()
	{
		$data['page_title'] = project_title()." | Change Password" ; 
		if ($this->input->post('change_password')) 
		{ 
			if ( $this->input->post('password') != $this->input->post('password1') )  
			{ 
				$this->session->set_flashdata('error_message',' Passwords you provided did not match. '); 
				redirect(current_url()); 
			} 
			else 
			{ 
				if ($this->login_model->change_password($this->table_name, md5($this->input->post('password')),array('id'=>$this->uri->segment(4)) )) 
				{ 
					$this->session->set_flashdata('success_message',' Password has been successfully reset. Please Login. '); 
					$this->login_model->empty_verification_code($this->table_name,array('id'=>$this->uri->segment(4))); 
					redirect($this->dir . '/login'); 
				}
				else 
				{ 
					$this->session->set_flashdata('error_message',' Something went wrong. Please try again later.' ); 
					redirect(current_url());
				}  
		    } 
		
		} 
		else if ( $this->uri->segment(4)  and  ($this->uri->segment(5)) ) 
		{ 
			$is_verified =  $this->login_model->check_verification_code($this->table_name , array('id'=>$this->uri->segment(4), 'verification_code'=>$this->uri->segment(5) )); 
			
			if ($is_verified)
			{ 
				
				$data['full_url']	= $this->full_url;  
				$this->load->view($this->dir.'change_password_v',$data) ; 
			} 
			else 
			{ 
				$this->session->set_flashdata('error_message',' Your change password link is broken. Please try again with forgot password.'); 
				redirect($this->dir.'login/forgot_password'); 
			} 
		}
		else 
		{ 
				$this->session->set_flashdata('success_message',' Your change password link is broken . Please try again with forgot password .'); 
				redirect($this->dir.'login/forgot_password'); 
		}  
	}
	// when admin logs out . 
	function logout() 
	{ 	
		if($this->input->cookie($this->cookie_name)== $this->cookie_value) 
		{ 
			$this->load->helper('cookie');
			// CI cookie helper function 
			delete_cookie($this->cookie_name);  	
		}
		$sess_userdata = array('admin_logged_in' => '', 'admin_login_id' => '', 'admin_redirect_login_url' => '');
		$this->session->unset_userdata($sess_userdata);
		
		/*$this->session->set_userdata = array(); 
		$this->session->sess_destroy();*/
		redirect(admin_url('login'));
	
	} 
	
	
	/******************************** helper functions ***********************************************************/


	// checks if cookie is already set. 
	function check_cookie()
	{ 
		if ($this->input->cookie($this->cookie_name) == $this->cookie_value)
		{ 
			$this->session->set_userdata($this->session_name, true); 
			redirect($this->after_login_url); 	
		} 
	}
	
	// sets cookie	
	function set_cookie()
	{ 
		$this->load->helper('cookie');
		$cookie = array(
					 'name'   => $this->cookie_name,
					 'value'  => 'YES',
					 'expire' => '86500',
					 //'domain' => '.some-domain.com',
					 //'path'   => '/',
					 //'prefix' => 'myprefix_',
				   );
		// CI cookie helper function ; 
		set_cookie($cookie); 
	}
	 
	function set_session_var()
	{ 
		$this->session->set_userdata( $this->session_name,true ) ;
		$this->session->set_userdata( "admin_login_id", $this->login_id);
		// admin_login_id  =  ''  
		//$this->session->set_userdata( substr($this->dir,0,-1)."_login_"."id", $this->login_id) ; 
		
	
	} 
	
}  
?>