<?php
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
		$form = true;
		$error = "Dodany do listy mailingowej";
	}	 
}
?>