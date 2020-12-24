<?php

include(APPPATH . "libraries/Rest_controller.php");

class Server extends Rest_controller
{

	function Server()
	{
		parent::Rest_controller();
		$this->load->database();
	}
	
	function post_get($id = NULL)
	{
		if($id == NULL)
		{
			$data = $this->postmodel->get_post();
			$this->response($data);
		}
		else
		{
			$data = $this->postmodel->get_post($id);
			$this->response($data);
		}
	}
	
	function post_put($id)
	{
		// get the put data from the input stream
		parse_str(file_get_contents("php://input"), $put_data);
		$this->postmodel->update_post($put_data, $id);
		
		$message = array('id' => $id, 'message' => 'Edited!');
		$this->response($message);
	}
	
	function post_post()
	{
		$this->postmodel->create_post($_POST);

		$message = array('message' => 'Added!');
		$this->response($message);
	}
	
	function post_delete($id = NULL)
	{
		if($id == NULL)
		{
			$this->postmodel->delete_post();
			
			$message = array('message' => 'Deleted!');
			$this->response($message);
		}
		else
		{
			$this->postmodel->delete_post($id);
			
			$message = array('message' => 'Deleted!');
			$this->response($message);
		}
	}
	
}

?>