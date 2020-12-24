<?php

class Email extends Controller
{
	function Email()
	{
		parent::Controller();
	} //  function Email()
	
	
	function index()
	{
		$this->load->library(array('email', 'form_validation'));
		$this->load->helper(array('email', 'form'));
		
		$this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|callback_add_user|xss_clean');
		$this->form_validation->set_rules('subject', 'Subject', 'required|xss_clean');
		$this->form_validation->set_rules('message', 'Message', 'required|xss_clean');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('email'); // load the contact form
		}
		else
		{
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$subject = $this->input->post('subject');
			$message = $this->input->post('message');
			
			$this->email->from($email, $name);
			$this->email->to('youremail@yourdomain.ext');

			$this->email->subject($subject);
			$this->email->message($message);

			$this->email->send();
			
			$data['msg'] = "Thank you, your email has now been sent.";
			$this->load->view('email_success', $data);
		}
	} // function index()
	
	function add_user($email)
	{
		$this->load->database();
		
		$query = $this->db->query("SELECT * FROM `user_data` WHERE `email` = '$email'");
		
		if($query->num_rows === 0)
		{
			$name  = $this->input->post('name');
			
			$this->db->query("INSERT INTO `user_data` (name, email) VALUES ('$name', '$email')");
		}
		
	} // function add_user($email)
} // class Email extends Controller

?>