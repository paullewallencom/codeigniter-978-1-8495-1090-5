<?php

class Batch_email extends Controller
{
	function Batch_email()
	{
		parent::Controller();
	}
	
	function index()
	{
		$this->load->library('email');
		
		$config['bcc_batch_mode'] = TRUE;
		$config['bcc_batch_size'] = 500; // 200 by default
		$this->email->initialize($config);
	}
}

?>