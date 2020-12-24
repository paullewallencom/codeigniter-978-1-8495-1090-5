<?php
session_start();

class MY_Session extends CI_Session
{
	function MY_Session()
	{
		parent::CI_Session();
	}
	
	function userdata($item)
	{
		if(empty($_SESSION[$item]))
		{
			return FALSE;
		}
		else
		{
			return $_SESSION[$item];
		}
	}
	
	function set_userdata($items, $value = NULL)
	{
		if(is_array($items))
		{
			foreach($items as $item => $value)
			{
				$_SESSION[$item] = $value;
			}
		}
		else
		{
			$_SESSION[$items] = $value;
		}
	}
	
	function unset_userdata($items)
	{
		if(is_array($items))
		{
			foreach($items as $item => $value)
			{
				unset($_SESSION[$item]);
			}
		}
		else
		{
			unset($_SESSION[$items]);
		}
	}
	
	function sess_destroy()
	{
		session_destroy();
	}
}

?>