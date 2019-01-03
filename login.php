<?php 
include "db.php";
session_destroy();
session_start();

if ($_POST['email'] && $_POST['password']) {
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$pass = mysqli_real_escape_string($connection, $_POST['password']);

	$query = "SELECT * FROM users WHERE email = '{$email}' AND password = '{$pass}'";
	$select_user_query = mysqli_query($connection, $query);

	if (!$select_user_query) {
		die("Try again" . mysqli_error($connection));
	}

	while ($row = mysqli_fetch_assoc($select_user_query)) {
		$db_user_email = $row['email'];
		$db_fname = $row['fname'];
		$db_user_password = $row['password'];
	}

	if ($email === $db_user_email && $pass === $db_user_password) {
		header("Location: ./admin.php");
		$_SESSION['username'] = $db_fname;
		$_SESSION['error'] = null;

	} else {
		header("Location: ./index.php");
		$_SESSION['error'] = 'email or password is wrong!';
		$_SESSION['username'] = null;
	}
}