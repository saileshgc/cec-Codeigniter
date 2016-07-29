<?php
class General_model extends CI_Model
{	
	function get_max_value($table, $field)
	{
		$this->db->select_max($field, 'max_val');
		$query = $this->db->get($table);
		$result = $query->row();
		return $result->max_val;
	}
	
	function get_states()
	{
		$query = $this->db->get('p3_states');
		return $query->result();
	}
	
	function get_countries()
	{
		$query = $this->db->get('izm_countries');
		return $query->result();
	}
	
	function get_state_by_id($state_id, $select='state_abbr')
	{
		$this->db->select($select);
		$this->db->where('id', $state_id);
		$query = $this->db->get('p3_states');
		$result = $query->row();
		if($result)
			return $result->$select;
		else
			return false;
	}
	
	function get_post_array( $not )
	{ 
		 $array = array(); 
		 $CI = &get_instance(); 
		 foreach($_POST as $key=>$value)
		 { 
			$match=false; 
			foreach($not as $vals)
			{ 
				if ($key==$vals) 
				{ 
				  $match=true; 	
				} 
			} 
			if ($match == false)
			{ 
				$array[$key] = $CI->input->post($key); 
			} 
		  } 
		return $array; 
	}
	
	function value_exist($table, $field, $value)
	{
		$this->db->where(''.$field.'', $value);
		$this->db->from($table);
		if($this->db->count_all_results() > 0)
			return true;
		else
			return false;
	}
	
	function get_home_image()
	{
		$sql = 'SELECT image FROM atms_main_content_images ORDER BY RAND() LIMIT 1';
		$query = $this->db->query($sql);
		$row = $query->row();
		return $row->image;
	}
	
	function get_contact_details()
	{
		$contact_details = $this->general_db_model->getAll('atms_contact_details');
		
		$contact = array();
		foreach($contact_details as $val)
		{
			$contact[$val->slug] = $val->value;
		}
		
		return (object)$contact;
	}
	
	function check_captcha($captcha)
	{
		$expiration = time()-7200; // Two hour limit
		$this->db->query("DELETE FROM atms_captcha WHERE captcha_time < ".$expiration);		
	
		// Then see if a captcha exists:
		$sql = "SELECT COUNT(*) AS count FROM atms_captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
		$binds = array($captcha, $this->input->ip_address(), $expiration);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();
		//echo $row->count;
		if ($row->count == 0)
		{
			return false;
		}
		else
			return true;
	}
}
?>