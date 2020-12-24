<?php

function logged_in()
{
	
	$CI =& get_instance();
	
	if($CI->session->userdata('logged_in') == TRUE)
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}

?>