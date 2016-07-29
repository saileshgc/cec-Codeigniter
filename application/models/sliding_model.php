<?php

class Sliding_model extends CI_Model
{
	function total_slides($where=NULL)
	{
		if($where)
			$this->db->where($where);
			
		$query = $this->db->from('ng_home_images');
		return $this->db->count_all_results();
		//$this->db->order_by('RAND()');
	}
	

	function get_slides($limit=NULL, $start=NULL, $where=NULL)
	{
		
		$this->db->from('ng_home_images');
		
		if($where)
			  $this->db->where($where);
			  //$this->db->order_by('rand()');
			  $query = $this->db->get('', $limit, $start);
			  return $query->result();
	}
	
	function get_slide_by_id($id)
	{
		  $this->db->where('id', $id);
		  $query = $this->db->get('ng_home_images');
		  return $query->row();
		  
	}
	
	
	function get_latest_slide()
	{
		$sql = "SELECT * FROM ng_home_images ORDER BY id DESC LIMIT 1";
		$query = $this->db->query($sql);
		//$query = $this->db->get('ng_event');
		//print_r($query);
		return $query->row();
		}
/*-------------------right images------------------------*/
		
	function total_rimages($where=NULL)
	{
		if($where)
			$this->db->where($where);
			
		$query = $this->db->from('ng_rimage');
		return $this->db->count_all_results();
		//$this->db->order_by('RAND()');
	}
	
	function get_rimages($limit=NULL, $start=NULL, $where=NULL)
	{
		
		$this->db->from('ng_rimage');
		
		if($where)
			  $this->db->where($where);
			  //$this->db->order_by('rand()');
			  $query = $this->db->get('', $limit, $start);
			  return $query->result();
	}
	
	function get_rimage_by_id($id)
	{
		  $this->db->where('id', $id);
		  $query = $this->db->get('ng_rimage');
		  return $query->row();
		  
	}
	
	
	

	

	
}


