<?php

class Story_model extends CI_Model
{
	function total_stories($where=NULL)
	{
		if($where)
			$this->db->where($where);
			
		$query = $this->db->from('ng_story');
		return $this->db->count_all_results();
		//$this->db->order_by('RAND()');
	}
	

	function get_stories($limit=NULL, $start=NULL, $where=NULL)
	{
		
		$this->db->from('ng_story');
		
		if($where)
			  $this->db->where($where);
			  //$this->db->order_by('rand()');
			  $query = $this->db->get('', $limit, $start);
			  return $query->result();
	}
	
	function get_story_by_id($id)
	{
		  $this->db->where('story_id', $id);
		  $query = $this->db->get('ng_story');
		  return $query->row();
		  
	}
	
	
	

	

	
}


