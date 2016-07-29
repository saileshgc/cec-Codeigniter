<?php

class Member_model extends CI_Model
{
	function total_members($where=NULL)
	{
		if($where)
			$this->db->where($where);
			
		$query = $this->db->from('ng_family');
		return $this->db->count_all_results();
		//$this->db->order_by('RAND()');
	}
	

	function get_members($limit=NULL, $start=NULL, $where=NULL)
	{
		
		$this->db->from('ng_family');
		
		if($where)
			  $this->db->where($where);
			  //$this->db->order_by('rand()');
			  $query = $this->db->get('', $limit, $start);
			  return $query->result();
	}
	
	function get_member_by_id($id)
	{
		  $this->db->where('member_id', $id);
		  $query = $this->db->get('ng_family');
		  return $query->row();
		  
	}
	
	
	
	
	

	

	
}


