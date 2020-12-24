<?php

class Account_model extends Model 
{

	function Account_model()
	{
		parent::Model();
		$this->load->database();
		$this->load->library('session');
	}
	
	function create($data)
	{	
		if($this->db->insert('users', $data))
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
					'username' => $this->input->post('username'),
					'logged_in' => TRUE
					);
					
		$this->session->set_userdata($data);
	}
	
	function logged_in()
	{
		if($this->session->userdata('logged_in') == TRUE)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}

?>