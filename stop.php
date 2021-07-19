<?php
require_once('connect.php');
session_start();
if(issset($_SESSION['email'])){
    $email=$_SESSION['email'];
    $sql = "UPDATE users SET sendemail=0 WHERE email='$email'";
    if ($conn->query($sql) === TRUE) {
        header('Location: ./home.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }
}


?>