<?php
class Home_admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();	
		//$this->load->model('event_model');
		//$this->load->model('member_model');
	}
	
	function index()
	{
		$this->home();
	}
	
	function home()
	{
		if($this->input->post('submit_home_content'))
		{
			$data['main_content'] = $this->input->post('main_content');
			$data['updated_date'] = date('Y-m-d H:i:s');
			if($id = $this->input->post('id'))
			{
				$this->general_db_model->update('ng_main_content', $data, 'id = '.$id);
			}
			else
			{
				$this->general_db_model->insert('ng_main_content', $data);
			}
			
			$this->session->set_flashdata('success_message', 'Content Successflly Updated');
			redirect(current_url());
		}
		
		$data['content'] = $this->general_db_model->getLast('ng_main_content');
		$data['page'] = 'home_content_v';
		$data['page_title'] = 'Welcome Page';
		$this->load->view('admin/main_v', $data);
	}
	
	function upload_images()
	{
		//die("here");
		$this->load->model('general_model');
		//UploadifyField::show_debug();
		//die("here");
		if (!empty($_FILES)){
			$image_name = upload_image('Filedata', $this->config->item('home_images_root'), array('dest' => $this->config->item('home_images_root'), 'size' => array('w' => 257, 'h' => 218), 'ratio' => false));
			//die($image_name);
			
			
			if($image_name)
			{
				$data['image'] = $image_name;
				$last_order = $this->general_model->get_max_value('ng_home_images', 'sort_order');
				$data['sort_order'] = (int)$last_order + 1;
				$this->general_db_model->insert('ng_home_images', $data);
				echo "success";
			}
			else
				echo "failure";
				
			/*$tempFile = $_FILES['Filedata']['tmp_name'];
			$targetFile =  'E:/wamp/www/atms/uploads/home_images/'. $_FILES['Filedata']['name'];
			
			move_uploaded_file($tempFile,$targetFile);*/
			
		}
	}
	
	function ajax_show_images()
	{
		$images = $this->general_db_model->getAll('ng_home_images', 'sort_order');
	
		$content = '';
		if($images)
		{
			$content.= '<table width="100%"><tr>';
			$k = 1;
			$row_count = 5;
			foreach($images as $image)
			{

				if(($k % $row_count) == 1 && $k != 1) 
					$content.= '<tr>';
				$content.= '<td align="center">
								<div class="home_image">
									<img src="'.config_item('home_images_path').$image->home_image.'" width="128" height="109" alt="test.jpg">
									<div class="action">
										<a href="javascript:;" onclick="delete_image('.$image->id.');"><span class="close"></span></a>
									</div>
								</div>
							</td>';
				if(($k % $row_count) == 0) 
					$content.= '</tr>';
							
				$k++; 
			}
			$content.= '</tr></table>';
		}
        else
        {
        	$content.= 'No images are added';
        }
		
		echo $content;
	}
	
	function delete_image()
	{
		$image_id = $this->input->post('image_id');
		$image_info = $this->general_db_model->getById('ng_home_images', 'id', $image_id);
		$image_name = $image_info->image;
		if(is_file(config_item('home_images_root').$image_name))
			@unlink(config_item('home_images_root').$image_name);
			
		$this->general_db_model->delete('ng_home_images', 'id = '.$image_id);
	}
	
	
	function test_upload()
	{
		$this->load->view('test_upload');
	}
	
	function contact()
	{
		if($this->input->post('submit_contact'))
		{
			$not = array('submit_contact');
			$post_arr = $this->general_model->get_post_array($not);
			//debug_array($post_arr);
			foreach($post_arr as $key=>$post)
			{
				$data['value'] = $this->input->post($key);
				$this->general_db_model->update('atms_contact_details', $data, 'slug = "'.$key.'"');
			}
			
			$this->session->set_flashdata('success_message', 'Contact Details updated.');
			redirect(current_url());
		}
		
		$data['contact_details'] = $this->general_db_model->getAll('atms_contact_details');
		$data['page'] = 'general/contact_v';
		$data['page_title'] = 'Contact Details';
		$this->load->view('admin/main', $data);
	}
}
?>