<?php
class Contact extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();	
		$this->load->model('contact_model');
		//$this->load->model('member_model');
	}
	
	function index()
	{
		$where ='';
		$data['total_contacts'] = $this->contact_model->total_contacts($where);
		$data['contacts'] = $this->contact_model->get_contacts($this->settings->item('rows_per_page'), $this->uri->segment(4), $where);
		create_pagination($data['total_contacts'], 4, $this->settings->item('rows_per_page'));
		$data['page_title'] = 'Contact Info';
		$data['page'] = 'contact_listing_v';
		$this->load->view('admin/main_v', $data);
	}
	
	
	

	function delete($id)
	{
		$this->general_db_model->delete('ng_contact', 'id = '.$id);
		$this->session->set_flashdata('success_messsage', 'Event successfully deleted.');
		redirect(admin_url('contact'));
	}
	
	
}
?>