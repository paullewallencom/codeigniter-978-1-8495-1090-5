<?php

class Maintenance
{
	function decide($maintenance)
	{	
		if($maintenance == TRUE)
		{
			show_error('The system is offline for maintenance.');
		}
	}
}

?>