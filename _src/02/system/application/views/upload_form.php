<?php echo $error;?>

<?php echo form_open_multipart('upload/do_upload');?>

	File:<br />
	<input name="file" type="file" /><br />

	<input type="submit" name="submit" value="Upload" />
	
<?php echo form_close(); ?>