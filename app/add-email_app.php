<?
$text = null;
$subject = null;
$error = false;

if (isset($_POST['submit'])) {
	$from = 'asdasdasd@gmail.com';
	$subject = $_POST['title'];
	$text = $_POST['text'];
	$output_form = false;

	if(empty($subject) && empty($text)) {
		$error = "nie podales title oraz text";
		$output_form = true;
	}

	if(empty($subject) && !empty($text)) {
		$error = "nie podales title";
		$output_form = true;
	}

	if(!empty($subject) && empty($text)) {
		$error = "nie podales text";
		$output_form = true;
	}

	if(!empty($subject) && !empty($text)) {
		$db = "SELECT * FROM `email_list`";
		$result = mysqli_query($conn, $db);
		while($row = mysqli_fetch_array($result)) {
			$first_name = $row['first_name'];
			$last_name = $row['last_name'];
			$email = $row['email'];

			$msg = "Hej $first_name $last_name," . '<br>' . "$text";
			// mail($email, $subject, $msg, $from);
			$error = "Email Send" . '<br>';
		}
	}
} else {
	$output_form = true;
}
?>