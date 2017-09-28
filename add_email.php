<?php
require 'db_config.php';

$form = true;
$firstName = null;
$lastName = null;
$email = null;

$error = false;
if(isset($_POST['submit'])) {

	$firstName = $_POST['first-name'];
	$lastName = $_POST['last-name'];
	$email = $_POST['email'];

	$checkEmail = "SELECT email FROM email_list WHERE email = '$email' ";
	$sql = mysqli_query($conn, $checkEmail);
	$result = mysqli_fetch_array($sql);


	if(empty($firstName) || empty($lastName) || empty($email)) {
		$error = "Uzupelnij wszystkie pola";
		$form = true;
	} elseif (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error = "email niepoprawny";
	} elseif($result > 1) {
		$error = "Email jest juz w bazie";
	} else {
		$db = sprintf('INSERT INTO email_list (first_name, last_name, email) VALUES ("%s", "%s", "%s")', $firstName, $lastName, $email);
		$addUser = mysqli_query($conn, $db);
		// header('Location: subscribe.php');
		$form = true;
		$error = "Dodany do listy mailingowej";
	}	 
}?>




<? if($form): ?>
	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
		<input type="text" name="first-name" value="<?php echo $firstName ?>" placeholder="First Name">
		<input type="text" name="last-name" value="<?php echo $lastName ?>" placeholder="Last Name">
		<input type="text" name="email" value="<?php echo $email ?>" placeholder="email">
		<input type="submit" name="submit" value="Add email">
	</form>

	<? if($error): ?>
		<p style="color: red"><?= $error ?>
	<? endif; ?>
<? endif ?>


<!-- while() {}
while(): endwhile;

if() {} elseif {} else {}
if(): elseif: else: endif;

for(); 
for(): endfor;

foreach(){} 
foreach: endforeach;

switch() {}
switch: endswitch; -->
