<?php

class Facebooker extends Controller 
{

	function Facebooker()
	{
		parent::Controller();
	
		$this->load->helper('url');
	}

	function index()
	{
		$data['api_key'] = ""; // insert your own API key here
		$data['secret_key'] = ""; // insert your own secret key here
	
		$this->load->library('facebook_connect', $data);
	
		$data['user'] = $this->facebook_connect->user;
		$data['user_id'] = $this->facebook_connect->user_id;

		var_dump($data);
		
		$this->load->view('facebook', $data);
	}

}
	
?>