<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/

$hook['pre_system'] = array(
                                'class'    => 'Maintenance',
                                'function' => 'decide',
                                'filename' => 'maintenance.php',
                                'filepath' => 'hooks',
								'params' => 'TRUE'
                                );


/* End of file hooks.php */
/* Location: ./system/application/config/hooks.php */