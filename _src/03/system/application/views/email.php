<form method="POST">
Name<br />
<input type="text" name="name" value="<?php echo set_value('name'); ?>" />
<?php echo form_error('name'); ?><br />

Email<br />
<input type="text" name="email" value="<?php echo set_value('email'); ?>" />
<?php echo form_error('email'); ?><br />

Subject<br />
<input type="text" name="subject" value="<?php echo set_value('subject'); ?>" />
<?php echo form_error('subject'); ?><br />

Message<br />
<textarea rows="17" cols="70" name="message"><?php echo set_value('message'); ?></textarea>
<?php echo form_error('message'); ?><br />

<input type="submit" name="contact" value="Send Email" />
</form>