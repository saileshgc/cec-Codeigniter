<?php

class Org_info_model extends CI_Model
{
	function total_info($where=NULL)
	{
		if($where)
			$this->db->where($where);
			
		$query = $this->db->from('ng_info');
		return $this->db->count_all_results();
		//$this->db->order_by('RAND()');
	}
	

	function get_info($limit=NULL, $start=NULL, $where=NULL)
	{
		
		$this->db->from('ng_info');
		
		if($where)
			  $this->db->where($where);
			  //$this->db->order_by('rand()');
			  $query = $this->db->get('', $limit, $start);
			  return $query->result();
	}
	
	function get_info_by_id($id)
	{
		  $this->db->where('id', $id);
		  $query = $this->db->get('ng_info');
		  return $query->row();
		  
	}
	
	
	

	

	
}


