<?php

class Donar_model extends CI_Model
{
	function total_donars($where=NULL)
	{
		if($where)
			$this->db->where($where);
			
		$query = $this->db->from('ng_donar_info');
		return $this->db->count_all_results();
		//$this->db->order_by('RAND()');
	}
	

	function get_donars($limit=NULL, $start=NULL, $where=NULL)
	{
		
		$this->db->from('ng_donar_info');
		
		if($where)
			  $this->db->where($where);
			  //$this->db->order_by('rand()');
			  $query = $this->db->get('', $limit, $start);
			  return $query->result();
	}
	
	function get_donar_by_id($id)
	{
		  $this->db->where('donar_id', $id);
		  $query = $this->db->get('ng_donar_info');
		  return $query->row();
		  
	}
	
	
	function get_latest_cause()
	{
		$sql = "SELECT * FROM ng_donar_info ORDER BY donar_id DESC LIMIT 1";
		$query = $this->db->query($sql);
		//$query = $this->db->get('ng_event');
		//print_r($query);
		return $query->row();
		}
		
		
	
	function total_banners($where=NULL)
	{
		if($where)
			$this->db->where($where);
			
		$query = $this->db->from('ng_banner');
		return $this->db->count_all_results();
		//$this->db->order_by('RAND()');
	}
	

	function get_banners($limit=NULL, $start=NULL, $where=NULL)
	{
		
		$this->db->from('ng_banner');
		
		if($where)
			  $this->db->where($where);
			  //$this->db->order_by('rand()');
			  $query = $this->db->get('', $limit, $start);
			  return $query->result();
	}
	
	function get_banner_by_id($id)
	{
		  $this->db->where('banner_id', $id);
		  $query = $this->db->get('ng_banner');
		  return $query->row();
		  
	}	

	

	
}


