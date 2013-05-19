<?php
session_start();
include('../inc/config.php');
include('../inc/db.php');

$db = new edb();

$email = $_POST['username'];
$password = $_POST['password'];
    
    if($db->authenticate($email, $password)){
        $_SESSION['loggedIn'] = true;
        $user = $db->getUserByEmail($email);
        $_SESSION['name'] = $user[0]->fullname;
        $_SESSION['id'] = $user[0]->id;
        echo $user[0]->fullname;
    }
    else{
        $_SESSION['loggedIn'] = false;
        echo "0";
    }
    
?>
