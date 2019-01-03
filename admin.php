<?php
include "db.php";
session_start();

if (!$_SESSION['username']) {
	header("Location: ./index.php");
}

if ($_POST['email'] && $_POST['password']) {
	$fname = mysqli_real_escape_string($connection, $_POST['fname']);
	$lname = mysqli_real_escape_string($connection, $_POST['lname']);
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$pass = mysqli_real_escape_string($connection, $_POST['password']);
	$type = mysqli_real_escape_string($connection, $_POST['type']);

	$query = "INSERT INTO users (fname, lname, email, password, type) values ('{$fname}', '{$lname}', '{$email}', '{$pass}', '{$type}')";
	$insert_user = mysqli_query($connection, $query);

	if (!$insert_user) {
		die("Error :" . mysqli_error($connection));
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
	 crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="center">
		<h1>You are logged in <?php echo $_SESSION['username'] ?>
		</h1>
		<button type="submit" onclick="location='./logout.php'" class="btn btn-dark float-right">Log out</button>
	</div>
	<div class="scenter">
		
		<div class="row h-100 justify-content-center">
			<div>
				<h2>Register new user</h2>

				<form action="./admin.php" method="POST">
					<div class="form-group">
						<label for="fname">First name</label>
						<input type="text" class="form-control" id="fname" name="fname" required>
					</div>
					<div class="form-group">
						<label for="lname">Last name</label>
						<input type="text" class="form-control" id="lname" name="lname" required>
					</div>
					<div class="form-group">
						<label for="email">Email address</label>
						<input type="email" class="form-control" id="email" name="email" required>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password" required>
					</div>
					<div class="form-group">
						<label for="type">User type</label>
						<input type="text" class="form-control" id="type" name="type" required>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
	 crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
	 crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
	 crossorigin="anonymous"></script>
	<!-- <script src="script.js"></script> -->
</body>

</html>