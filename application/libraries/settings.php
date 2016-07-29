<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CI_Settings {

	var $settings = array();
	
	function CI_Settings()
	{
		$CI = & get_instance();
		$CI->load->model('settings_model');
		$this->settings = $CI->settings_model->get_settings_item();
		//print_r($this->settings);die();
	}
	
	function item($item, $index = '')
	{	
		if ($index == '')
		{	
			if ( ! isset($this->settings[$item]))
			{
				return FALSE;
			}

			$pref = $this->settings[$item];
		}
		else
		{
			if ( ! isset($this->settings[$index]))
			{
				return FALSE;
			}
			if ( ! isset($this->settings[$index][$item]))
			{
				return FALSE;
			}

			$pref = $this->settings[$index][$item];
		}

		return $pref;
	}
}

?>