<?php

include('../inc/config.php');
include('../inc/db.php');

$db = new edb();

$email = $_POST['inputEmail'];
$password = $_POST['inputPassword'];

    echo $db->authenticate($email, $password);
?>
