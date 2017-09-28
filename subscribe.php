<?php
require 'app/db_config.php';
require 'app/subscribe_app.php';
?>

<? if($form): ?>
	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
		<input type="text" name="first-name" value="<?php echo $firstName ?>" placeholder="First Name">
		<input type="text" name="last-name" value="<?php echo $lastName ?>" placeholder="Last Name">
		<input type="text" name="email" value="<?php echo $email ?>" placeholder="email">
		<input type="submit" name="submit" value="Add email">
	</form>

	<? if($error): ?>
		<p style="color: red"><?= $error ?>
	<? endif ?>
<? endif ?>