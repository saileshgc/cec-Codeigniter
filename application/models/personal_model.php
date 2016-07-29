<?php

class Personal_model extends CI_Model
{
	private $profile_table	=	"ng_admin_info";
	
	function update()
	{
		$fullname	= $this->input->post('fullname');
		$password	= md5($this->input->post('password'));
		$email		= $this->input->post('email');
		$id = $this->session->userdata('admin_login_id');
		$this->db->trans_begin();
		//
		$data = array('name' => $fullname ,'password' => $password, 'email' => $email);
		$this->db->update($this->profile_table, $data, array('id' => $id));
		
		if ($this->db->trans_status() === FALSE)
		{
    		$this->db->trans_rollback();
			return false;
		}
		else
		{
    		$this->db->trans_commit();
			return true;
		}
	}
	
	function getpersonal_detail()
	{ 
		$id = $this->session->userdata('admin_login_id');
		$this->db->where(array('id' => $id));
		$query = $this->db->get($this->profile_table); 
		
		return $query->row(); 
		//return count($query);
	}  
}

?>