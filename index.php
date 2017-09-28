<?php
require 'app/db_config.php';
require 'app/add-email_app.php';
?>

<? if($output_form): ?>
	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
		<input type="text" name="title" value="<?php echo $subject; ?>" placeholder="Enter Title">
		<textarea name="text" value="<?php echo $text; ?>" cols="30" rows="10" placeholder="Enter text"></textarea>
		<input type="submit" name="submit" value="Send Emails">
	</form>

	<?if ($error): ?>
		<p style="color: red"><?= $error ?>
	<? endif?>
<? endif ?>
