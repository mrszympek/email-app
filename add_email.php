<?php

require 'db_config.php';

$firstName = $_POST['first-name'];
$lastName = $_POST['last-name'];
$email = $_POST['email'];

$db = "INSERT INTO email_list (first_name, last_name, email) VALUES ('$firstName', '$lastName', '$email')";
$addUser = mysqli_query($conn, $db);

header('Location: index.php');