<?php
class More extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('work_model');
		$this->load->model('event_model');
		$this->load->model('member_model');
		$this->load->model('story_model');
		
	}
		
		
		function index()
		{
			$data['check'] = $this->general_db_model->get_content();
			$this->load->view('content_more', $data);
			}
			
		function what_more()
		{
			$data['latest_work'] = $this->work_model->get_latest_work();
			$this->load->view('what_more',$data);
			}
			
			function event_detail($event_id)
			{
				//echo "here";die;
				$data['event'] = $this->event_model->get_event_by_id($event_id);
				$this->load->view('event_info', $data);
		
				}	
				
				function stories($id)
				{
					$data['story'] = $this->story_model->get_story_by_id($id);
					$this->load->view('story_v', $data);
					}
	
	}
	
	
	
?>
