<?php

class Email extends Controller
{
	function Email()
	{
		parent::Controller();
	} //  function Email()
	
	function index()
	{
		
		$this->load->library('email');
		$this->load->helper('email');
		
		if($this->input->post('contact'))
		{
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$subject = $this->input->post('subject');
			$message = $this->input->post('message');
			
			if(empty($name) OR empty($email) OR empty($subject) OR empty($message))
			{
				show_404("The form submitted left fields blank, all fields are required. Please go back and fill in all of the fields.");
			}
			
			if(!valid_email($email))
			{
				show_404("The email address provided is not a valid email. Please go back and fill in all of the fields.");
			}
			
			$name = $this->input->xss_clean($name);
			$email = $this->input->xss_clean($email);
			$subject = $this->input->xss_clean($subject);
			$message = $this->input->xss_clean($message);
			
			$this->email->from($email, $name);
			$this->email->to('youremail@yourdomain.ext');

			$this->email->subject($subject);
			$this->email->message($message);

			$this->email->send();
			
			# SEND AN EMAIL USING THE EMAIL HELPER
			// send_email('youremail@yourdomain.ext', $subject, $message);
			
		}
		else
		{
			$this->load->view('contact');
		}
	} // function index()
} // class Email extends Controller

?>