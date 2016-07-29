<?php
class Personal extends CI_Controller
{
	function __construct()
	{
		parent::__construct();	
		//$this->load->model('page_model');
		$this->load->library('form_validation');
		$this->load->model('personal_model');
	}
	
	function index()
	{
		if($this->input->post('submit_detail'))
		{
			if($this->form_validation())
			{
				$this->personal_model->update();
			} 
			
			//redirect(current_url());
		}
		else
		{
			$data['details'] = $this->personal_model->getpersonal_detail();
		}
		
		
		$data['page_title'] = 'Personal Detail';
		$data['page'] = 'persional_detail_v';
		$this->load->view('admin/main_v', $data);
	}
	
	
	function form_validation()
	{
		$this->form_validation->set_rules('fullname', 'Full Name', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confrompassword]');
		$this->form_validation->set_rules('confrompassword','Conform password', 'trim|required');
		$this->form_validation->set_rules('email','Email', 'trim|required|valid_email');
		if($this->form_validation->run()=== false)
		{
			return false;
		}
		else
		{
			return true;
		}
	
	}

}
?>