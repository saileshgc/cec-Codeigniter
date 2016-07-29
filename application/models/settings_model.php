<?php

class Settings_model extends CI_Model
{
	function get_settings()
	{
		$query = $this->db->get('ng_settings');
		return $query->result();
	}
	
	function get_settings_item()
	{
		$this->db->select('slug, value');
		$query = $this->db->get('ng_settings');
		$result = $query->result();
		$settings = array();
		foreach($result as $key=>$val)
		{
			$settings[$val->slug] = $val->value;
		}
		
		return $settings;
	}
}

?>