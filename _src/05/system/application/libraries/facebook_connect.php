<?php

require_once(APPPATH . 'libraries/facebook/facebook.php');

class Facebook_connect
{
	var $CI;
	var $connection;
	
	var $api_key;
	var $secret_key;
	var $user;
	var $user_id;
	var $client;
	
	function Facebook_connect($data)
	{
		
		$this->CI =& get_instance();
		
		$this->CI->load->library('session');
		
		$this->api_key = $data['api_key'];
		$this->secret_key = $data['secret_key'];
		
		$this->connection = new Facebook($this->api_key, $this->secret_key);
		$this->client = $this->connection->api_client;
		$this->user_id = $this->connection->get_loggedin_user();

		$this->_session();
		
	}
	
	function _session()
	{
		$user = $this->CI->session->userdata('facebook_user');

		if($user === FALSE && $this->user_id !== NULL)
		{
			$profile_data = array('uid','first_name', 'last_name', 'name', 'locale', 'pic_square', 'profile_url');
			$info = $this->connection->api_client->users_getInfo($this->user_id, $profile_data);

			$user = $info[0];

			$this->CI->session->set_userdata('facebook_user', $user);
		}
		elseif($user !== FALSE && $this->user_id === NULL)
		{
			$this->CI->session->sess_destroy();
		}

		if($user !== FALSE)
		{
			$this->user = $user;
		}
	}
	
}

?>