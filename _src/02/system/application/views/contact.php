<?php 

if(isset($msg))
{
	echo $msg;
}

?>
<form method="POST">
Name<br />
<input type="text" name="name" /><br />

Email<br />
<input type="text" name="email" /><br />

Subject<br />
<input type="text" name="subject" /><br />

Message<br />
<textarea rows="17" cols="70" name="message"></textarea><br />

<input type="submit" name="contact" value="Send Email" />
</form>