<?php

class admin_controller extends Controller 
{

	function admin_controller()
	{
		parent::Controller();
		
		$this->load->model('account_model');
		
		if($this->account_model->logged_in() === FALSE)
		{
			show_error("You must be logged in to view this page.");
		}
	}

}

?>