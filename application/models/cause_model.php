<?php

class Cause_model extends CI_Model
{
	function total_cause($where=NULL)
	{
		if($where)
			$this->db->where($where);
			
		$query = $this->db->from('ng_cause');
		return $this->db->count_all_results();
		//$this->db->order_by('RAND()');
	}
	

	function get_cause($limit=NULL, $start=NULL, $where=NULL)
	{
		
		$this->db->from('ng_cause');
		
		if($where)
			  $this->db->where($where);
			  //$this->db->order_by('rand()');
			  $query = $this->db->get('', $limit, $start);
			  return $query->result();
	}
	
	function get_cause_by_id($id)
	{
		  $this->db->where('cause_id', $id);
		  $query = $this->db->get('ng_cause');
		  return $query->row();
		  
	}
	
	
	

	

	
}


