<?php
require_once('functions.php');

// $error = array('name' =>  '', 'description' => '', 'password' => '');
// $message = '';

if (isset($_POST['create'])) {

	$name = $_POST['name'];
	$description = $_POST['description'];
	$t_id = 1;

	// if (empty($name)) {
	// 	$error['name'] = 'Name field cannot be empty';
	// } else if (empty($email)) {
	// 	$error['description'] = 'Description field cannot be empty';
	// } else {
		if (create_class($t_id, $name, $description)) {
			echo "Class successfully added";
		} else {
			echo "Class cannot be added!";
		}
	// }
	
}



?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Create New Class</title>
</head>
<body>
	<main>
		<div id="box">
			<h1>Ariadne</h1>
			<p class="welcome_txt">Create a new class</p>
			<br>
			<form class="signupForm" action='<?= $_SERVER["PHP_SELF"];?>' method="POST">
				<input type="name" name="name" placeholder="Class Name" id="name" required autofocus><br>
				<textarea name="description" required></textarea>
				<button class="btn-submit" type="submit" name="create">Create Class</button>
			</form>
			<a href="classes.php">View My Classes</a>
			<a href="classes.php">View all Classes</a>
		</div>
	</main>
</body>
</html>
