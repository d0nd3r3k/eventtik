<?php 
session_start();
include('../inc/config.php');
include('../inc/db.php');

$db = new edb();

$user_id = $_SESSION['id'];

$events = $db->getUserEvents($_SESSION['id']);

echo json_encode($events);

?>