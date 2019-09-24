<?php 

require_once('functions.php');


if (isset($_POST['create'])) {

	$title = $_POST['title'];
	$content = $_POST['content'];
	$file = $_FILES['file']['name'];
	//this will be defined from the class selected
	$class_id = 1;
	$upload_folder = "uploads/";

	//checking if there's any attachment
    if ($file != NULL) {
        //handling attachments
        if (upload_file($upload_folder)) {
            if (add_item($title, $content, $file, $class_id)) {
                ?>
                <script type="text/javascript">
                    alert('Item successfully added.');
                    window.location = 'classes.php';
                </script><?php
            } else { ?> <script type="text/javascript">alert('Item Not Added!');</script><?php }
        } else {
            ?><script type="text/javascript">alert('File size cannot be more than 200kb and MUST be in PDF format.');</script><?php
        }
    } else {

    	if (add_item($title, $content, $file, $class_id)) {
                ?>
                <script type="text/javascript">
                    alert('Item successfully added.');
                    window.location = 'classes.php';
                </script><?php
            } else { ?> <script type="text/javascript">alert('Item Not Added!');</script><?php }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Add a new Item</title>
</head>
<body>
	<main>
		<div id="box">
			<h1>Ariadne</h1>
			<p class="welcome_txt">Add New Item</p>
			<br>
			<form class="signupForm" action='<?= $_SERVER["PHP_SELF"];?>' method="POST" enctype="multipart/form-data" name="item">
				<input name="title" placeholder="Item Title" id="name" required autofocus><br>
				<textarea name="content" required></textarea><br>
				<input type="file" name="file" placeholder="Upload PDF here"><br>
				<small>Note: File must be PDF and not more than 200MB</small><br>
				<button class="btn-submit" type="submit" name="create">Add Item</button>
			</form>
			<a href="classes.php">View My Classes</a>
			<a href="classes.php">View all Classes</a>
		</div>
	</main>
</body>
</html>