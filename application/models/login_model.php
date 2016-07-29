<?php 
class Login_Model extends CI_Model
{ 

	function __construct()
	{ 
		parent::__construct();
	}
	
	function authenticate($table , $array)
	{ 
		$this->db->select("*");
		$this->db->from($table);
		$this->db->where($array);
		$query = $this->db->get(); 
		return  $query->row(); 
		
	} 
	
	function check_email($array)
	{ 
		$this->db->select('*');
		$this->db->from('p3_clients');
		$this->db->join('p3_client_login_info', 'p3_clients.client_id = p3_client_login_info.client_id');
		$this->db->where($array); 
		$query = $this->db->get();
		if($query->num_rows() == 1) 
			return $query->row(); 
		else 
			return false; 
	}
	
	function check_email_webdeal($array)
	{ 
		$this->db->select('*');
		$this->db->from('p3_web_deal_clients');
		$this->db->join('p3_web_deal_client_login_info', 'p3_web_deal_clients.client_id = p3_web_deal_client_login_info.client_id');
		$this->db->where($array); 
		$query = $this->db->get();
		if($query->num_rows() == 1) 
			return $query->row(); 
		else 
			return false; 
	}
	
	function update_verification_code($table,$condition )
	{ 
		$vCode = time().rand(1111,999999); 
		$data = array('verification_code' => $vCode);
		$this->db->where($condition);
		$this->db->update($table, $data); 
		return $vCode; 
	}
	 
	function check_verification_code($table , $condition)
	{ 
		$this->db->where($condition);
		$query = $this->db->get($table); 
		if($query->num_rows()==1)
			return true;  
		else 
			return false; 
	} 
	
	 
	
	function admin_info($table , $field=NULL)
	{ 
		$this->db->select('*');
		$this->where('id', $this->login_id ); 
		$query =  $this->db->get($table);
		if (is_null($field)) 
		return $query->row(); 
		else 
		return $query->row()->$field; 
	} 
	
	function change_password($table,$new_password,$condition) 
	{ 
		$data = array('password' =>$new_password );
		$this->db->where($condition);
		if ($this->db->update($table, $data)) 
			return true; 
		else 
			return false; 
	}


	function empty_verification_code( $table,$condition )
	{ 
		$data = array('verification_code' => NULL);
		$this->db->where($condition);
		$this->db->update($table, $data); 
	}      	
	
} 
 
