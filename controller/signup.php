<?php

include('../inc/config.php');
include('../inc/db.php');

$db = new edb();

$full_name = $_POST['inputName'];
$email = $_POST['inputEmail'];
$password = $_POST['inputPassword'];
$repassword = $_POST['reinputPassword'];

$error = false;

if ($full_name == "" || $email == "" || $password == "" || $repassword == "") {
    $error = true;
} else if ($password != $repassword) {
    $error = true;
}

if (!$error) {
    
    $db->insertUser($email, $full_name, $password);
    
    echo '1';
} else {
    echo '-1';
}
?>
