<?php
$host = 'remotemysql.com';
$username = 'clhJzTWjOF';
$password = 'Lu8hLwXQob';
$dbname = 'clhJzTWjOF';
$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
echo "connected sucessfully";
?>