<?php 
session_start();
include('../inc/config.php');
include('../inc/db.php');

$db = new edb();

$user_id = $_SESSION['id'];
$event_id = $_POST['event_id'];
$data = $_POST['jsonData'];

if($_SESSION['loggedIn']){
	
	$db->reservation($user_id, $event_id, $data);
	
	echo "1";
	
} else {
	echo "-1";
}

?>