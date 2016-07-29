 <?php
class Aboutorg extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();	
		$this->load->model('org_info_model');
		$this->load->model('member_model');
	}
	
	function index()
	{
		$where ='';
		$data['total_infos'] = $this->org_info_model->total_info($where);
		$data['infos'] = $this->org_info_model->get_info($this->settings->item('rows_per_page'), $this->uri->segment(4), $where);
		
		create_pagination($data['total_infos'], 4, $this->settings->item('rows_per_page'));

		$data['page_title'] = 'Organization Info';
		$data['page'] = 'infodisplay_v';
		$this->load->view('admin/main_v', $data);
	}
	
	function members($task='list', $id=NULL)
	{
		switch($task)
		{
			case 'list':
				$this->member_list();
				break;
			case 'edit_member':
				
				$this->edit_member($id);
				break;
			case 'delete_member':
				$this->event_approval_delete($id);
				break;
			default:
				$this->event_approval_list();
				break;
		}
	}
	
	function member_list()
	{
		$where ='';
		$data['total_members'] = $this->member_model->total_members($where);
		$data['members'] = $this->member_model->get_members($this->settings->item('rows_per_page'), $this->uri->segment(4), $where);
		
		create_pagination($data['total_members'], 4, $this->settings->item('rows_per_page'));

		$data['page_title'] = 'Organization Info';
		$data['page'] = 'member_listing_v';
		$this->load->view('admin/main_v', $data);
		}
	
	function add($id=NULL)
	{
		//$data['info'] = $this->org_info_model->get_info_by_id($id);
		if($this->input->post('submit_info'))
		{
			
			$not = array( 'prev_image','submit_info');
			//die(print_r(array));
		
			$post = $this->general_model->get_post_array($not);
			//debug_array($post);die();
			
			$upload_image = $this->input->post('prev_image');			
	
			if($_FILES['logo']['name'])
			{
				
				$prev_image = $this->input->post('prev_image');
				$image = upload_image('logo', $this->config->item('charity_images_root'), array('dest' => $this->config->item('charity_images_root'), 'size' => array('w' => 250, 'h' => 200), 'ratio' => true), $prev_image);
				
				if($image)
					$upload_image = $post['logo'] = $image;
				else
					$post['logo'] = $prev_image;
			}
			
			
			
			
				if($id)
				{
					$this->general_db_model->update('ng_info', $post, 'id = '.$id);				
					$this->session->set_flashdata('success_message', 'Web Deal successfully updated.');
				}
				else
				{
					$this->general_db_model->insert('ng_info', $post);				
					$this->session->set_flashdata('success_message', 'Web Deal successfully added.');
				}
				
				redirect(current_url());
			
			
			//debug_array($data);
		
		}
		//$this->load->model('org_info_model');
		//$data['infos'] = $this->org_info_model->get_info();
		$data['page_title'] = 'Add Info';
		$data['page'] = 'add_info_v';
		$this->load->view('admin/main_v', $data);
	}
	
	function add_member($id=NULL)
	{
		//$data['info'] = $this->org_info_model->get_info_by_id($id);
		if($this->input->post('submit_info'))
		{
			
			$not = array('prev_image', 'submit_info');
			//die(print_r(array));
		
			$post = $this->general_model->get_post_array($not);
			//debug_array($post);die();
			
			$upload_image = $this->input->post('prev_image');
			
			
			
			if($_FILES['image']['name'])
			{
				$prev_image = $this->input->post('prev_image');
				$image = upload_image('image', $this->config->item('member_images_root'), array('dest' => $this->config->item('member_images_root'), 'size' => array('w' => 250, 'h' => 200), 'ratio' => true), $prev_image);
				
				if($image)
					$upload_image = $post['image'] = $image;
				else
					$post['image'] = $prev_image;
			}
			
			
				if($id)
				{
					$this->general_db_model->update('ng_family', $post, 'member_id = '.$id);
					
					$this->session->set_flashdata('success_message', 'Member successfully updated.');
				}
				else
				{
					$this->general_db_model->insert('ng_family', $post);
				
					$this->session->set_flashdata('success_message', 'Member successfully added.');
				}
				
				redirect(current_url());
			
			
			//debug_array($data);
		
		}
		
		$data['page_title'] = 'Add Member';
		$data['page'] = 'member_adding_v';
		$this->load->view('admin/main_v', $data);
	}
	
	function edit($id)
	{
		if($this->input->post('submit_info'))
		{
			$this->add_edit($id);
			redirect(filter_url('edit'));
		}
		
		$this->load->model('org_info_model');
		

		$data['info'] = $this->org_info_model->get_info_by_id($id);
		//debug_array($data);die();
		$data['page_title'] = 'Edit Event';
		$data['page'] = 'add_info_v';
		$this->load->view('admin/main_v', $data);
	}
	
	function edit_member($id)
	{
		
		if($this->input->post('submit_info'))
		{
			
			$this->add_edit_member($id);
			redirect(filter_url('edit_member'));
		}
		
		$this->load->model('member_model');
		

		$data['member'] = $this->member_model->get_member_by_id($id);
		//debug_array($data);die();
		$data['page_title'] = 'Edit Member';
		$data['page'] = 'member_adding_v';
		$this->load->view('admin/main_v', $data);
	}
	
	function delete($id)
	{
		$this->general_db_model->delete('ng_info', 'id = '.$id);
		
		$this->session->set_flashdata('success_messsage', 'The Client Event successfully deleted.');
		
		redirect(admin_url('aboutorg'));
	}
	
	function add_edit($id=NULL)
	{
		if($this->input->post('submit_info'))
		{
			$not = array('prev_image', 'submit_info');
			//die(print_r(array));
		
			$post = $this->general_model->get_post_array($not);
			//debug_array($post);die();
			
			$upload_image = $this->input->post('prev_image');
			
			/*$post['ngo_name'] = $this->input->post('ngo_name');
			$post['address'] = $this->input->post('address');
			$post['history'] = $this->input->post('history');
			$post['email'] = $this->input->post('email');
			$post['contact_no'] = $this->input->post('contact_no');*/
			
			if($_FILES['logo']['name'])
			{
				
				$prev_image = $this->input->post('prev_image');
				$image = upload_image('logo', $this->config->item('charity_images_root'), array('dest' => $this->config->item('charity_images_root'), 'size' => array('w' => 250, 'h' => 200), 'ratio' => true), $prev_image);
				
				if($image)
					$upload_image = $post['logo'] = $image;
				else
					$post['logo'] = $prev_image;
			}
			
		//$not = array('ngo_name','address','history','email','contact_no');
		//$post = $this->general_model->get_post_array($not);
		if($id)
		{
		$this->general_db_model->update('ng_info',$post,'id = '.$id);
		$this->session->set_flashdata('success_message', 'Info successfully updated.');
		}
		else
		{
		$this->general_db_model->insert('ng_info', $post);
		$this->session->set_flashdata('success_message', 'Info successfully added.');
		}
			
			//redirect(current_url());
		}
	}
	
	function add_edit_member($id=NULL)
	{
		if($this->input->post('submit_info'))
		{
			$not = array('prev_image','submit_info');
			$post = $this->general_model->get_post_array($not);
			$upload_image = $this->input->post('prev_image');
			
			
			if($_FILES['image']['name'])
			{
				
				$prev_image = $this->input->post('prev_image');
				$image = upload_image('logo', $this->config->item('member_images_root'), array('dest' => $this->config->item('member_images_root'), 'size' => array('w' => 250, 'h' => 200), 'ratio' => true), $prev_image);
				
				if($image)
					$upload_image = $post['image'] = $image;
				else
					$post['image'] = $prev_image;
			}
			//debug_array($post);die();
			
		//$not = array('member_name','address','my_experience','email','contact_no','designation','joint_date');
		//$post = $this->general_model->get_post_array($not);
		if($id)
		{
			$this->general_db_model->update('ng_family', $post,'member_id = ' .$id);
			$this->session->set_flashdata('success_message', 'Member successfully updated.');
			}
			 else
			 {
		$this->general_db_model->insert('ng_family', $post);
		$this->session->set_flashdata('success_message', 'Info successfully added.');
			 }
			
			//redirect(current_url());
		}
	}
	


	
	function delete_category($category_id)
	{
		$this->general_db_model->delete('p3_event_categories', 'category_id = '.$category_id);
		$this->session->set_flashdata('success_messsage', 'Event catgory successfully deleted.');
		redirect(admin_url('event/category/list/'));
	}
	
	function remove_image()
	{
		$id = $this->input->post('event_id');
		$this->general_db_model->update('p3_events', array('event_image' => ''), 'id = '.$id);
		$this->general_db_model->update('p3_events_log', array('event_image' => ''), 'id = '.$id);
	}
	
	function get_client_info()
	{
		$id = $this->input->post('client_id');
		$this->load->model('member_model');
		$client_info = $this->member_model->get_client_by_id($id);
		
		echo json_encode($client_info);
	}
	
	function approval($task='list', $id=NULL)
	{
	
		switch($task)
		{
			case 'list':
				$this->event_approval_list();
				break;
			case 'edit':
				if($this->input->post())
				{
					$this->process_approval($id);
				}
				$this->event_approval_edit($id);
				break;
			case 'delete':
				$this->event_approval_delete($id);
				break;
			default:
				$this->event_approval_list();
				break;
		}
	}
	
	
	
	function event_approval_list()
	{
		$data['total_events'] = $this->calendar_model->total_events_log('approval = "0"');
		
		$data['events'] = $this->calendar_model->get_all_events_log($this->settings->item('rows_per_page'), $this->uri->segment(5), 'approval = "0"');
		
		create_pagination($data['total_events'], 5, $this->settings->item('rows_per_page'));
		//echo $this->db->last_query();die();
		//debug_array($data);die();
		$data['page_title'] = 'Events Approval';
		$data['page'] = 'event_log_list_v';
		$this->load->view('admin/main_v', $data);
	}
	
	function event_approval_edit($id)
	{
		$this->load->model('member_model');
		$data['clients'] = $this->member_model->get_clients();
		$data['event'] = $this->calendar_model->get_event_log_by_id($id);
		$data['datetime'] = $this->calendar_model->get_event_datetime_log($id);
		//debug_array($data);die();
		$data['page_title'] = 'Approve Event';
		$data['page'] = 'event_log_edit_v';
		$this->load->view('admin/main_v', $data);
	}
	
	function event_approval_delete($id)
	{
		$this->general_db_model->delete('p3_events', 'id = '.$id);
		$this->general_db_model->delete('p3_events_log', 'id = '.$id);
		$this->session->set_flashdata('success_messsage', 'The Client Event successfully deleted.');
		
		redirect(admin_url('event/approval/list'));
	}
	
	function more_date()
	{
		$data['key'] = $this->input->post('key');
		$content = $this->load->view('admin/more_date_v', $data, true);
		echo $content;
	}
	
	function ajax_event_category()
	{
		$event_type = $this->input->post('event_type');
		select_event_categories('category_id', $event_type, NULL, false);
	}
}
