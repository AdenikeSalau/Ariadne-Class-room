<?php
require_once('functions.php');

echo '<h3>Current Teacher Classes</h3>';

$current_teacher_id = 1;

$current_teacher_classes = show_classes($current_teacher_id);

if ($current_teacher_classes) {
	echo '<ul>';
	foreach ($current_teacher_classes as $title => $class) {
		echo '<li><p>'.$class["name"].'</p></li>';

		//showing items under each class
		$current_class_items = show_items($class['id']);
		echo 'Items: <ul>';
		foreach ($current_class_items as $key => $item) {
			//checking for attachment
			$attach = '(No attachment added)';
			if ($item['attachment'] != NULL) {
				$attach = '<a href="uploads/'.$item['attachment'].'" download>Download attached file</a>';
			}
			$item_details = '<p> $item["title"] </p>';
			$item_details .= '<p> $item["content"].$attach </p>';
			echo '<li><p>'.$item["title"].'</p><p>'.$item["content"].' '.$attach.'</p></li>';
		}
		echo '</ul><br><a href="item.php">Add Item to class</a>';
	}
	echo '</ul>';
}

echo '<br><br><hr>';




echo '<h3>All Classes</h3>';

$all_classes = show_all_classes();

if ($all_classes) {
	echo '<ul>';
	foreach ($all_classes as $title => $class) {
		echo '<li><p>'.$class["name"].'</p></li>'.'<a href="item.php">Add Item to class</a>';
	}
	echo '</ul>';
}