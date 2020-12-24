<?php

class Client extends Controller 
{

	function Client()
	{
		parent::Controller();
		$this->load->library('rest');
	}

	function index()
	{
		$data = array(
						'author' => 'blog post author',
						'title' => 'blog post title',
						'content' => 'blog post content'
					);
		
		$request = $this->rest->request("http://localhost/0905_08/index.php/server/post/");
	}

}

?>