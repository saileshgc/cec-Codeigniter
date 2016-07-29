<?php

class Event_model extends CI_Model
{
	function total_events($where=NULL)
	{
		if($where)
			$this->db->where($where);
			
		$query = $this->db->from('ng_event');
		return $this->db->count_all_results();
		//$this->db->order_by('RAND()');
	}
	

	function get_events($limit=NULL, $start=NULL, $where=NULL)
	{
		
		$this->db->from('ng_event');
		
		if($where)
			  $this->db->where($where);
			  //$this->db->order_by('rand()');
			  $query = $this->db->get('', $limit, $start);
			  return $query->result();
	}
	
	
	
	function get_event_by_id($id)
	{
		  $this->db->where('event_id', $id);
		  $query = $this->db->get('ng_event');
		  return $query->row();
		  
	}
	
	function total_buyers($where=NULL)
	{
		if($where)
			$this->db->where($where);
			
		$query = $this->db->from('ng_ticket_buyer_info');
		return $this->db->count_all_results();
		//$this->db->order_by('RAND()');
	}
	

	function get_buyers($limit=NULL, $start=NULL, $where=NULL)
	{
		
		$this->db->from('ng_ticket_buyer_info');
		
		if($where)
			  $this->db->where($where);
			  //$this->db->order_by('rand()');
			  $query = $this->db->get('', $limit, $start);
			  return $query->result();
	}
	
	
	
	function get_buyer_by_id($id)
	{
		  $this->db->where('id', $id);
		  $query = $this->db->get('ng_ticket_buyer_info');
		  return $query->row();
		  
	}
	function get_latest_event()
	{
		$sql = "SELECT * FROM ng_event ORDER BY event_id DESC LIMIT 1";
		$query = $this->db->query($sql);
		//$query = $this->db->get('ng_event');
		//print_r($query);
		return $query->row();
		}
		
		
	function get_all()
	{
		$this->db->get('ng_our_work');
		$this->db->order_by('event_id','DESC');
		}	
	
	
	
}

