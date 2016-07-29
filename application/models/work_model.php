<?php

class Work_model extends CI_Model
{
	function total_works($where=NULL)
	{
		if($where)
			$this->db->where($where);
			
		$query = $this->db->from('ng_our_work');
		return $this->db->count_all_results();
		//$this->db->order_by('RAND()');
	}
	

	function get_works($limit=NULL, $start=NULL, $where=NULL)
	{
		
		$this->db->from('ng_our_work');
		
		if($where)
			  $this->db->where($where);
			  //$this->db->order_by('rand()');
			  $query = $this->db->get('', $limit, $start);
			  return $query->result();
	}
	
	function get_work_by_id($id)
	{
		  $this->db->where('id', $id);
		  $query = $this->db->get('ng_our_work');
		  return $query->row();
		  
	}
	
	
	function get_latest_work()
	{
		
		$sql = "SELECT * FROM ng_our_work ORDER BY id DESC LIMIT 1";
		$query = $this->db->query($sql);
		return $query->row();
		}
	
	
	

	

	
}


