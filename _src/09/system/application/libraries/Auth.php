<?php

class Auth 
{
	
	var $CI;

	function Account_model()
	{
		parent::Model();
		$this->CI->load->database();
		$this->CI->load->library('session');
	}
	
	function create($data)
	{	
		if($this->CI->db->insert('users', $data))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function login()
	{
		$data = array(
					'username' => $this->CI->input->post('username'),
					'logged_in' => TRUE
					);
					
		$this->CI->session->set_userdata($data);
	}
	
	function logged_in()
	{
		if($this->CI->session->userdata('logged_in') == TRUE)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function logout()
	{
		$this->CI->session->sess_destroy();
	}
}

?>