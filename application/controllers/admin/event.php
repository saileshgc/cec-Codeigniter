<?php
class Event extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();	
		$this->load->model('event_model');
		//$this->load->model('member_model');
	}
	
	function index()
	{
		$where ='';
		$data['total_events'] = $this->event_model->total_events($where);
		$data['events'] = $this->event_model->get_events($this->settings->item('rows_per_page'), $this->uri->segment(4), $where);
		create_pagination($data['total_events'], 4, $this->settings->item('rows_per_page'));
		$data['page_title'] = 'Event Info';
		$data['page'] = 'event_display_v';
		$this->load->view('admin/main_v', $data);
	}
	
	function add($id=NULL)
	{
		//$data['info'] = $this->org_info_model->get_info_by_id($id);
		if($this->input->post('submit_event'))
		{
			$not = array( 'prev_image','submit_event');
			$post = $this->general_model->get_post_array($not);
			$upload_image = $this->input->post('prev_image');
			
			if($_FILES['event_image']['name'])
			{
				
				$prev_image = $this->input->post('prev_image');
				$image = upload_image('event_image', $this->config->item('event_images_root'), array('dest' => $this->config->item('event_images_root'), 'size' => array('w' => 247, 'h' => 137), 'ratio' => false), $prev_image);
				
				
				if($image)
					$upload_image = $post['event_image'] = $image;
				else
					$post['event_image'] = $prev_image;
			}
			
			if($id)
				{
					$this->general_db_model->update('ng_event', $post, 'id = '.$id);
					$this->session->set_flashdata('success_message', 'Web Deal successfully updated.');
				}
				else
				{
					
					$this->general_db_model->insert('ng_event', $post);
					$this->session->set_flashdata('success_message', 'Event successfully added.');
				}
				
				redirect(current_url());
			
		}
		//$this->load->model('org_info_model');
		//$data['infos'] = $this->org_info_model->get_info();
		$data['page_title'] = 'Add Event';
		$data['page'] = 'event_add_v';
		$this->load->view('admin/main_v', $data);
	}
	function edit($id)
	{
		if($this->input->post('submit_event'))
		{
			$this->add_edit($id);
			redirect(filter_url('edit'));
		}
	
		$data['event'] = $this->event_model->get_event_by_id($id);
		$data['page_title'] = 'Edit Event';
		$data['page'] = 'event_add_v';
		$this->load->view('admin/main_v', $data);
	}
	

	function delete($id)
	{
		$this->general_db_model->delete('ng_event', 'event_id = '.$id);
		$this->session->set_flashdata('success_messsage', 'Event successfully deleted.');
		redirect(admin_url('event'));
	}
	
	function add_edit($id=NULL)
	{
		if($this->input->post('submit_event'))
		{
			$not = array('prev_image', 'submit_event');
			$post = $this->general_model->get_post_array($not);
			$upload_image = $this->input->post('prev_image');
			if($_FILES['event_image']['name'])
			{
				
				$prev_image = $this->input->post('prev_image');
				$image = upload_image('event_image', $this->config->item('event_images_root'), array('dest' => $this->config->item('event_images_root'), 'size' => array('w' => 247, 'h' => 137), 'ratio' => false), $prev_image);
				
				
				if($image)
					$upload_image = $post['event_image'] = $image;
				else
					$post['event_image'] = $prev_image;
			}
		
		if($id)
		{
		  $this->general_db_model->update('ng_event',$post,'event_id = '.$id);
		  $this->session->set_flashdata('success_message', 'Event successfully updated.');
		}
			  else
			  {
			  $this->general_db_model->insert('ng_event', $post);
			  $this->session->set_flashdata('success_message', 'Info successfully added.');
			  }			
		}
	}
/*-----------------------------Ticket Section	-----------------------------------*/
	function tickets($task='list', $id=NULL)
	{
		switch($task)
		{
			case 'list':
				$this->tbuyer_list();
				break;
			
			case 'delete_tbuyer':
				$this->delete_tbuyer($id);
				break;
			default:
				$this->tbuyer_list();
				break;
		}
	}
	
	function tbuyer_list()
	{
		$where ='';
		$data['total_buyers'] = $this->event_model->total_buyers($where);
		$data['buyers'] = $this->event_model->get_buyers($this->settings->item('rows_per_page'), $this->uri->segment(4), $where);
		create_pagination($data['total_buyers'], 4, $this->settings->item('rows_per_page'));
		$data['page_title'] = 'Ticket Buyer Info';
		$data['page'] = 'tbuyer_listing_v';
		$this->load->view('admin/main_v', $data);
		}
		
		function delete_tbuyer($id)
	{
		$this->general_db_model->delete('ng_ticket_buyer_info', 'id = '.$id);
		$this->session->set_flashdata('success_messsage', 'Ticket Buyer Info deleted.');
		redirect(admin_url('event/tbuyer_list'));
	}
}
?>