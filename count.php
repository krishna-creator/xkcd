<?php
require_once('connect.php');
require 'sendmail.php';
$time=date('i')/5;

$query="SELECT email FROM users WHERE sendemail=1 AND createdat=$time";
$result=$conn->query($query);

if($result->num_rows > 0){
  while($row = $result->fetch_assoc()) {
      sendcomics($row['email']);
    }
}

?>