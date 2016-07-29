<?php
class Home extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('work_model');
		$this->load->model('event_model');
		$this->load->model('member_model');
		$this->load->model('story_model');
		$this->load->model('donar_model');
		$this->load->model('sliding_model');
		
	}
		
		
		function index()
		{
			$data['check'] = $this->general_db_model->get_content();
			$data['banner_image'] = $this->general_db_model->get_banner_image();
			$data['home_content'] = $this->general_db_model->getLast('ng_aboutus_content');
			$data['latest_work'] = $this->work_model->get_latest_work();
			$data['event_detail'] = $this->event_model->get_latest_event(); 
			$data['slide_image'] = $this->sliding_model->get_latest_slide();
			$data['left_image'] = $this->sliding_model->get_slide_by_id(2);
			$this->load->view('front_page', $data);
		}
	
	
	function about_us()
	{
		$data['home_content'] = $this->general_db_model->getLast('ng_aboutus_content');
		$data['members'] = $this->member_model->get_members();
		$data['event_detail'] = $this->event_model->get_latest_event(); 
		$data['banner_detail'] = $this->donar_model->get_banner_by_id(1);		
		$this->load->view('about_us', $data);
		
		
	}
	
	function event_detail($event_id)
			{
				//echo "here";die;
				$data['event'] = $this->event_model->get_event_by_id($event_id);
				$this->load->view('event_info', $data);
		
				}	
	
	function show_event($id)
	{
		$data['event'] = $this->event_model->get_event_by_id($id);
		$this->load->view('event_info', $data);
		}
		
	function show_complete()
		{
		$this->load->view('payment_complete');
			}
	


	function upcoming_events()
	{
		$data['events'] = $this->event_model->get_events();
		$this->load->view('events_display', $data);
		}
	
	  function our_work()
	  {
		  $data['latest_work'] = $this->work_model->get_latest_work();
		  $data['stories'] = $this->story_model->get_stories();
		  $data['event_detail'] = $this->event_model->get_latest_event();
		  $data['banner_detail'] = $this->donar_model->get_banner_by_id(2);
		  echo $this->db->last_query();
		  $this->load->view('our_work', $data);
		  }	
	
		function contact_us()
		{
			if($this->input->post('submit_contact'))
			{
				$not = array('submit_contact');
				
				$post = $this->general_model->get_post_array($not);
				$this->general_db_model->insert('ng_contact', $post);
				$this->session->set_flashdata('success_message', 'Thanks!!! For contacting us.');
				}
			 $data['banner_detail'] = $this->donar_model->get_banner_by_id(4);	
			 echo $this->db->last_query();
			$this->load->view('contact_us_v');
			}	
			
		function donation()
		{
			if($this->input->post('submit_donation'))
			{
				$this->load->view('donar_detail_v');
				}
 			
			$data['donation'] = $this->donar_model->get_latest_cause();
			$this->load->view('donation_v',$data);
			}	
			
			
			function donar_info()
			{
				
				$this->load->view('donar_info_v');
				}
				
				function search_result()
				{
					
					 if($this->input->post('Input') == 'donation' || $this->input->post('Input') == 'Donation' )
					 
					 {
						 redirect(site_url('home/donation'));
						 }
						 
						 elseif($this->input->post('Input') == 'events' || $this->input->post('Input') == 'future events' )
						 {
							 redirect(site_url('home/upcoming_events'));
							 }
							 else
							 {
								 redirect(site_url('home'));
								 }
					 }
					 
					function notify_ticket()
					{
						$message = '';
						foreach ($_POST as $key => $value){
						$message.= $key.':'.$value."<br>";
										}
						$post['mc_gross']			= $this->input->post('mc_gross');
						$post['first_name']			= $this->input->post('first_name');
						$post['last_name']			= $this->input->post('last_name');
						$post['payer_email']		= $this->input->post('payer_email'); 
						$post['address_country']	= $this->input->post('address_country');
						$post['address_city']		= $this->input->post('address_city');
						$post['item_name']			= $this->input->post('item_name');
						
						if($this->input->post('payment_status') == 'completed' || $this->input->post('payment_status') == 'Completed')
							{
								$this->general_db_model->insert('ng_ticket_buyer_info', $post);
							}
				//$this->my_library->send_email('sona@ebpearls.com', 'Donation receipt', $message,'','buddha@ebpearls.com' );				
						} 
					 
	function notify()
	{
		$message = '';
		foreach ($_POST as $key => $value){
			$message.= $key.':'.$value."<br>";
		}
		
		$item_name			= $_POST['item_name'];
		$payment_date 		= $_POST['payment_date'];
		$payment_amount 	= $_POST['mc_gross'];
		$payer_email 		= $_POST['payer_email'];
		$receiver_email 	= $_POST['receiver_email'];
		$first_name 		= $_POST['first_name'];
		$receiver_email		= $_POST['receiver_email'];
		$payment_status		= $_POST['payment_status'];
		$message_sent		= 'Dear '.$first_name.'<br>Thank you, for the difference you made<br>The donation amount is $'.$payment_amount;
		//$this->my_library->send_email('sona@ebpearls.com', 'Donation receipt', $message,'','buddha@ebpearls.com' );
		
		$customs = explode(',',$_POST['custom']);
		if($customs)
		{
			$$data = array();
			for($i=0;$i<count($customs);$i++)
			{
				$fields_val = explode('=',$customs[$i]);
				if($fields_val)
				{
					$data[$fields_val[0]] = $fields_val[1];
					//$result.= .$fields_val[1];
				}
			}
		}
		
		foreach($data as $key => $value)
		{
			$msg.= $key.'='.$value;
			}
		//$message = 'Dear'.$first_name.'<br>Thank you, for the difference you made<br>The donation amount is $'.$donation_amount;
		//$this->my_library->send_email('sona@ebpearls.com', 'Donation receipt', $msg,'','buddha@ebpearls.com' );
		$this->general_db_model->insert('ng_donar', $data);
		if($payment_status == 'Completed' || $payment_status == 'completed' )
		{
			/*if(isset($_POST['custom']))
			{
				$custom_fields = explode(',',$_POST['custom']);
				if($custom_fields)
				{
					$data = array();
					foreach($custom_fields as $custom_fields_row)
					{
						
					}
				}
				
			}*/
			$message_sent		= 'Dear'.$first_name.'<br>Thank you, for the difference you made<br>The donation amount is $'.$payment_amount;
		$this->my_library->send_email($payer_email, 'Donation receipt', $message_sent,'',$receiver_email );
		//$this->my_library->send_email('sona@ebpearls.com', 'Donation receipt', $msg,'','buddha@ebpearls.com' );
			
		}
		else
		{
			$payment_pending = 'Dear'.$first_name.'<br>Thanks for your contribution<br>Your payment is on the way to be accepted. We will email you after successful contribution. Your donated amount is '.$payment_amount;
			$this->my_library->send_email($payer_email, 'Donation receipt', $payment_pending,'',$receiver_email );
			//$this->my_library->send_email('sona@ebpearls.com', 'Donation receipt', $message,'','buddha@ebpearls.com' );
		
		}
	
		
		}	
}	
?>