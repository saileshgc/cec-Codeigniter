<?php
class What_we_do extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();	
		$this->load->model('work_model');
		$this->load->model('story_model');
		$this->load->model('member_model');
		$this->load->model('donar_model');
		$this->load->model('sliding_model');
	}
	
	function index()
	{
		$where ='';
		$data['total_works'] = $this->work_model->total_works($where);
		$data['works'] = $this->work_model->get_works($this->settings->item('rows_per_page'), $this->uri->segment(4), $where);
		create_pagination($data['total_works'], 4, $this->settings->item('rows_per_page'));
		$data['page_title'] = 'Work Info';
		$data['page'] = 'work_listing_v';
		$this->load->view('admin/main_v', $data);
	}
	
	function add($id=NULL)
	{
		//$data['info'] = $this->org_info_model->get_info_by_id($id);
		if($this->input->post('submit_work'))
		{
			$not = array( 'prev_image','submit_work');
			//die(print_r(array));
		
			$post = $this->general_model->get_post_array($not);
			//debug_array($post);die();
			
			$upload_image = $this->input->post('prev_image');
			
			if($_FILES['image']['name'])
			{
				
				$prev_image = $this->input->post('prev_image');
				$image = upload_image('image', $this->config->item('charity_images_root'), array('dest' => $this->config->item('charity_images_root'), 'size' => array('w' => 250, 'h' => 200), 'ratio' => true), $prev_image);
				
				if($image)
					$upload_image = $post['image'] = $image;
				else
					$post['image'] = $prev_image;
			}
			
			
			if($id)
				{
					$this->general_db_model->update('ng_our_work', $post, 'id = '.$id);
					$this->session->set_flashdata('success_message', 'Work successfully updated.');
				}
				else
				{
					$this->general_db_model->insert('ng_our_work', $post);
					$this->session->set_flashdata('success_message', 'Work successfully added.');
				}
				
				redirect(current_url());
			
			
			//debug_array($data);
		
		}
		//$this->load->model('org_info_model');
		//$data['infos'] = $this->org_info_model->get_info();
		$data['page_title'] = 'Add Work';
		$data['page'] = 'work_add_v';
		$this->load->view('admin/main_v', $data);
	}
	
	
	function edit($id)
	{
		if($this->input->post('submit_work'))
		{
			$this->add_edit($id);
			redirect(filter_url('edit'));
		}
		
		$this->load->model('work_model');
		$data['work'] = $this->work_model->get_work_by_id($id);
		//debug_array($data);die();
		$data['page_title'] = 'Edit Work';
		$data['page'] = 'work_add_v';
		$this->load->view('admin/main_v', $data);
	}
	
	
	
	function delete($id)
	{
		$this->general_db_model->delete('ng_our_work', 'id = '.$id);
		$this->session->set_flashdata('success_messsage', 'The information successfully deleted.');
		redirect(admin_url('what_we_do'));
	}
	
	function add_edit($id=NULL)
	{
		if($this->input->post('submit_work'))
		{
			$not = array('prev_image', 'submit_work');
			//die(print_r(array));
		
			$post = $this->general_model->get_post_array($not);
			//debug_array($post);die();
			
			$upload_image = $this->input->post('prev_image');
			
			/*$post['ngo_name'] = $this->input->post('ngo_name');
			$post['address'] = $this->input->post('address');
			$post['history'] = $this->input->post('history');
			$post['email'] = $this->input->post('email');
			$post['contact_no'] = $this->input->post('contact_no');*/
			
			if($_FILES['image']['name'])
			{
				
				$prev_image = $this->input->post('prev_image');
				$image = upload_image('image', $this->config->item('charity_images_root'), array('dest' => $this->config->item('charity_images_root'), 'size' => array('w' => 250, 'h' => 200), 'ratio' => true), $prev_image);
				
				if($image)
					$upload_image = $post['image'] = $image;
				else
					$post['image'] = $prev_image;
			}
			
		//$not = array('ngo_name','address','history','email','contact_no');
		//$post = $this->general_model->get_post_array($not);
		if($id)
		{
		$this->general_db_model->update('ng_our_work',$post,'id = '.$id);
		$this->session->set_flashdata('success_message', 'Work successfully updated.');
		}
		else
		{
		$this->general_db_model->insert('ng_our_work', $post);
		$this->session->set_flashdata('success_message', 'Info successfully added.');
		}
			
			//redirect(current_url());
		}
	}
	
	/*---------------About Us Section--------------------------------*/
	
	function about_us()
	{
		if($this->input->post('submit_about_us_content'))
		{
			$data['main_content'] = $this->input->post('main_content');
			$data['updated_date'] = date('Y-m-d H:i:s');
			if($id = $this->input->post('id'))
			{
				$this->general_db_model->update('ng_aboutus_content', $data, 'id = '.$id);
			}
			else
			{
				$this->general_db_model->insert('ng_aboutus_content', $data);
			}
			
			$this->session->set_flashdata('success_message', 'Content Successfully Updated');
			redirect(current_url());
		}
		
		$data['content'] = $this->general_db_model->getLast('ng_aboutus_content');
		$data['page'] = 'about_us_content_v';
		$data['page_title'] = 'About Us Content';
		$this->load->view('admin/main_v', $data);
	}
	
/*------------Story Section---------------*/	

function add_story($id=NULL)
	{
		//$data['info'] = $this->org_info_model->get_info_by_id($id);
		if($this->input->post('submit_story'))
		{
			
			$not = array('prev_image', 'submit_story');
			//die(print_r(array));
		
			$post = $this->general_model->get_post_array($not);
			//debug_array($post);die();
			
			$upload_image = $this->input->post('prev_image');
			
			if($_FILES['image']['name'])
			{
				$prev_image = $this->input->post('prev_image');
				$image = upload_image('image', $this->config->item('member_images_root'), array('dest' => $this->config->item('member_images_root'), 'size' => array('w' => 138, 'h' => 138), 'ratio' => false), $prev_image);
				
				if($image)
					$upload_image = $post['image'] = $image;
				else
					$post['image'] = $prev_image;
			}
			
			
				if($id)
				{
					$this->general_db_model->update('ng_story', $post, 'story_id = '.$id);
					$this->session->set_flashdata('success_message', 'Member successfully updated.');
				}
				else
				{
					$this->general_db_model->insert('ng_story', $post);
					$this->session->set_flashdata('success_message', 'Story successfully added.');
				}
				
				redirect(current_url());
			
			
			//debug_array($data);
		
		}
		
		$data['page_title'] = 'Add Story';
		$data['page'] = 'story_add_v';
		$this->load->view('admin/main_v', $data);
	}
	
	function stories($task='list', $id=NULL)
	{
		switch($task)
		{
			case 'list':
				$this->story_list();
				break;
			case 'edit_story':
				
				$this->edit_story($id);
				break;
			case 'delete_story':
				$this->story_delete($id);
				break;
			default:
				$this->story_list();
				break;
		}
	}
	
	function story_list()
	{
		$where ='';
		$data['total_stories'] = $this->story_model->total_stories($where);
		$data['stories'] = $this->story_model->get_stories($this->settings->item('rows_per_page'), $this->uri->segment(4), $where);
		
		create_pagination($data['total_stories'], 4, $this->settings->item('rows_per_page'));

		$data['page_title'] = 'Story Info';
		$data['page'] = 'story_listing_v';
		$this->load->view('admin/main_v', $data);
		}
		
	function edit_story($id)
	{
		
		if($this->input->post('submit_story'))
		{
			
			$this->add_edit_story($id);
			redirect(filter_url('edit_story'));
		}
		
		$this->load->model('story_model');
		

		$data['story'] = $this->story_model->get_story_by_id($id);
		//debug_array($data);die();
		$data['page_title'] = 'Edit Story';
		$data['page'] = 'story_add_v';
		$this->load->view('admin/main_v', $data);
	}
	
		function add_edit_story($id=NULL)
	{
		if($this->input->post('submit_story'))
		{
			$not = array('prev_image','submit_story');
			$post = $this->general_model->get_post_array($not);
			$upload_image = $this->input->post('prev_image');
			
			
			if($_FILES['image']['name'])
			{
				
				$prev_image = $this->input->post('prev_image');
				$image = upload_image('image', $this->config->item('member_images_root'), array('dest' => $this->config->item('member_images_root'), 'size' => array('w' => 138, 'h' => 138), 'ratio' => false), $prev_image);
				
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
			$this->general_db_model->update('ng_story', $post,'story_id = ' .$id);
			$this->session->set_flashdata('success_message', 'Story successfully updated.');
			}
			 else
			 {
		$this->general_db_model->insert('ng_story', $post);
		$this->session->set_flashdata('success_message', 'Story successfully added.');
			 }
			
			//redirect(current_url());
		}
	}
	
	function story_delete($id)
	{
		$this->general_db_model->delete('ng_story', 'story_id = '.$id);
		
		$this->session->set_flashdata('success_messsage', 'Story successfully deleted.');
		
		redirect(admin_url('what_we_do/stories/list'));
	}
	
	function delete_story($id)
	{
		$this->general_db_model->delete('ng_story', 'story_id = '.$id);
		$this->session->set_flashdata('success_messsage', 'Story successfully deleted.');
		redirect(admin_url('event/category/list/'));
	}
	
	/*---------------------Sliding Section----------------------------*/
	
	function sliding($task='list', $id=NULL)
	{
		switch($task)
		{
			case 'list':
				$this->sliding_list();
				break;
			case 'edit_slide':
				
				$this->edit_slide($id);
				break;
			case 'slide_delete':
				$this->slide_delete($id);
				break;
			default:
				$this->sliding_list();
				break;
		}
	}
		
		function slide_delete($id)
	{
		$this->general_db_model->delete('ng_home_images', 'id = '.$id);
		$this->session->set_flashdata('success_messsage', 'Story successfully deleted.');
		redirect(admin_url('what_we_do/sliding/list'));
	}
		
		function sliding_list()
	{
		$where ='';
		$data['total_slides'] = $this->sliding_model->total_slides($where);
		$data['slides'] = $this->sliding_model->get_slides($this->settings->item('rows_per_page'), $this->uri->segment(5), $where);
		
		create_pagination($data['total_slides'], 5, $this->settings->item('rows_per_page'));

		$data['page_title'] = 'Slider Images Info';
		$data['page'] = 'slider_listing_v';
		$this->load->view('admin/main_v', $data);
		}
		
		function add_slide()
		{
			if($this->input->post('submit_slide'))
		{
			
			$not = array('prev_image', 'submit_slide');
			//die(print_r(array));
		
			$post = $this->general_model->get_post_array($not);
			//debug_array($post);die();
			
			$upload_image = $this->input->post('prev_image');
			
			if($_FILES['home_image']['name'])
			{
				$prev_image = $this->input->post('prev_image');
				$image = upload_image('home_image', $this->config->item('home_images_root'), array('dest' => $this->config->item('home_images_root'), 'size' => array('w' => 1000, 'h' => 400), 'ratio' => false), $prev_image);
				
				if($image)
					$upload_image = $post['home_image'] = $image;
				else
					$post['home_image'] = $prev_image;
			}
			
			
				if($id)
				{
					$this->general_db_model->update('ng_home_images', $post, 'id = '.$id);
					$this->session->set_flashdata('success_message', 'Member successfully updated.');
				}
				else
				{
					$this->general_db_model->insert('ng_home_images', $post);
					$this->session->set_flashdata('success_message', 'Image successfully added.');
				}
				
				redirect(current_url());
			
			
			//debug_array($data);
		
		}
		
		$data['page_title'] = 'Add Story';
		$data['page'] = 'slide_add_v';
		$this->load->view('admin/main_v', $data);
			}
/*------------------Member Section--------------------------------*/	
	
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
				$this->member_delete($id);
				break;
			default:
				$this->member_list();
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
		
	function member_delete($id)
	{
		$this->general_db_model->delete('ng_family', 'member_id = '.$id);
		
		$this->session->set_flashdata('success_messsage', 'Story successfully deleted.');
		
		redirect(admin_url('what_we_do/members/list'));
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
				$image = upload_image('image', $this->config->item('member_images_root'), array('dest' => $this->config->item('member_images_root'), 'size' => array('w' => 138, 'h' => 138), 'ratio' => false), $prev_image);
				
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
				$image = upload_image('image', $this->config->item('member_images_root'), array('dest' => $this->config->item('member_images_root'), 'size' => array('w' => 138, 'h' => 138), 'ratio' => false), $prev_image);
				
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
	
/*---------------Donation Section-----------------------------*/	
	
	function donation($task='list', $id=NULL)
	{
		switch($task)
		{
			case 'list':
				$this->donation_list();
				break;
			case 'edit_donation':
				
				$this->edit_donation($id);
				break;
			case 'donation_delete':
				$this->donation_delete($id);
				break;
			default:
				$this->donation_list();
				break;
		}
	}
	
	
	function donation_delete($id)
	{
		$this->general_db_model->delete('ng_donar_info', 'donar_id = '.$id);
		$this->session->set_flashdata('success_messsage', 'Donar Info successfully deleted.');
		redirect(admin_url('what_we_do/donation/list'));
	}
	
	
	function donation_list()
	{
		$where ='';
		$data['total_donars'] = $this->donar_model->total_donars($where);
		$data['donars'] = $this->donar_model->get_donars($this->settings->item('rows_per_page'), $this->uri->segment(4), $where);
		
		create_pagination($data['total_donars'], 4, $this->settings->item('rows_per_page'));

		$data['page_title'] = 'Organization Info';
		$data['page'] = 'donar_listing_v';
		$this->load->view('admin/main_v', $data);
		}
		
		function edit_donation($id)
	{
		
		if($this->input->post('submit_donar'))
		{
			
			$this->add_edit_donation($id);
			redirect(filter_url('edit_donar'));
		}
		
		$this->load->model('donar_model');
		

		$data['donar'] = $this->donar_model->get_donar_by_id($id);
		//debug_array($data);die();
		$data['page_title'] = 'Edit Donation Information';
		$data['page'] = 'donar_add_v';
		$this->load->view('admin/main_v', $data);
	}
	function add_edit_donation($id=NULL)
	{
		if($this->input->post('submit_donar'))
		{
			$not = array('submit_donar');
			$post = $this->general_model->get_post_array($not);
			
			//debug_array($post);die();
			
		//$not = array('member_name','address','my_experience','email','contact_no','designation','joint_date');
		//$post = $this->general_model->get_post_array($not);
		if($id)
		{
			$this->general_db_model->update('ng_donar_info', $post,'donar_id = ' .$id);
			$this->session->set_flashdata('success_message', 'Donar Info successfully updated.');
			}
			 else
			 {
		$this->general_db_model->insert('ng_family', $post);
		$this->session->set_flashdata('success_message', 'Info successfully added.');
			 }
			
			//redirect(current_url());
		}
	}
	

	function add_donation($id=NULL)
	{
		//$data['info'] = $this->org_info_model->get_info_by_id($id);
		if($this->input->post('submit_donar'))
		{
			
			$not = array( 'submit_donar');
			//die(print_r(array));
		
			$post = $this->general_model->get_post_array($not);
			//debug_array($post);die();
			
					$this->general_db_model->insert('ng_donar_info', $post);
				
					$this->session->set_flashdata('success_message', 'Donar successfully added.');
				
				
				redirect(current_url());
			
			//debug_array($data);
		
		}
		
		$data['page_title'] = 'Add Donation Information';
		$data['page'] = 'donar_add_v';
		$this->load->view('admin/main_v', $data);
	}	
}
?>