<?php
require 'db_config.php';

$text = null;
$subject = null;

if (isset($_POST['submit'])) {
	$from = 'asdasdasd@gmail.com';
	$subject = $_POST['title'];
	$text = $_POST['text'];
	$output_form = false;

	if(empty($subject) && empty($text)) {
		echo "nie podales title oraz text";
		$output_form = true;
	}

	if(empty($subject) && !empty($text)) {
		echo "nie podales title";
		$output_form = true;
	}

	if(!empty($subject) && empty($text)) {
		echo "nie podales text";
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
			echo "Email Send" . '<br>';
		}
	}
} else {
	$output_form = true;
}

if($output_form) {
 ?>
	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
		<input type="text" name="title" value="<?php echo $subject; ?>" placeholder="Enter Title">
		<textarea name="text" value="<?php echo $text; ?>" cols="30" rows="10" placeholder="Enter text"></textarea>
		<input type="submit" name="submit" value="Send Emails">
	</form>

<?php
	}
?>
