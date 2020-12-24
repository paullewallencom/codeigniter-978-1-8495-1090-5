<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
	<title>Facebook Connect</title>
</head>
<body>
	<script src="http://static.ak.connect.facebook.com/js/api_lib/v0.4/FeatureLoader.js.php" type="text/javascript"></script>
	<?php if ( !$user_id ): ?>
		<fb:login-button onlogin="window.location='<?=current_url()?>'"></fb:login-button>
	<?php else: ?>
		<p><img class="profile_square" src="<?=$user['pic_square']?>" />
		Hi <?=$user['first_name']?>!</p>
		<p><a href="#" onclick="FB.Connect.logout(function() { window.location='<?=current_url()?>' }); return false;" >(Logout)</a></p>
		
		<p>You are now logged in!!</p>
	<?php endif; ?>
	
	<script type="text/javascript">
		FB.init("<?php echo $api_key; ?>", "/xd_receiver.htm");
	</script>
</body>
</html>