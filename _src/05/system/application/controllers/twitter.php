<?php
session_start();

class Twitter extends Controller
{

	var $data;
	
	function Twitter()
	{
		parent::Controller();
		
		$this->data['consumer_key'] = ""; // insert your own consumer key here
		$this->data['consumer_secret'] = ""; // insert your own consumer secret here
	}
	
	function index()
	{
		$this->load->library('twitter_oauth', $this->data);
		
		$token = $this->twitter_oauth->get_request_token();
		
		$_SESSION['oauth_request_token'] = $token['oauth_token'];
	    $_SESSION['oauth_request_token_secret'] = $token['oauth_token_secret'];
		
		$request_link = $this->twitter_oauth->get_authorize_URL($token);
		
		$data['link'] = $request_link;
		$this->load->view('twitter/home', $data);
	}
	
	function access()
	{
		$this->data['oauth_token'] = $_SESSION['oauth_request_token'];
		$this->data['oauth_token_secret'] = $_SESSION['oauth_request_token_secret'];
	
		$this->load->library('twitter_oauth', $this->data);

		/* Request access tokens from twitter */
		$tokens = $this->twitter_oauth->get_access_token();
	
		/* Save the access tokens. Normally these would be saved in a database for future use. */
		$_SESSION['oauth_access_token'] = $tokens['oauth_token'];
		$_SESSION['oauth_access_token_secret'] = $tokens['oauth_token_secret'];
		

		$this->load->view('twitter/accessed', $tokens);
	}
	
	function logout()
	{
		session_destroy();
		$this->load->view('twitter/logout');
	}
}

?>