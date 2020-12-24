<?php

class Upload extends Controller
{
	function Upload()
	{
		parent::Controller();
		$this->load->helper(array('form', 'url', 'file'));
	}
	
	function index()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}
	
	function do_upload()
	{
		$config['upload_path'] = APPPATH . 'uploads/';
		$config['allowed_types'] = 'jpeg|jpg|gif|png';
		$config['max_size'] = '1024';

		$this->load->library('upload', $config);
		
		$field_name = "file";
		
		if ( ! $this->upload->do_upload($field_name))
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}	
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('upload_success', $data);
		}
	}
	
}
?>