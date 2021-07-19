<?php
require("sendgrid-php\sendgrid-php.php");
require_once 'config.php';
function sendcomics($reciever){
  $rand=rand(1,650);
  // Read JSON file
  $api_url = 'http://xkcd.com/'.$rand.'/info.0.json';
  $json_data = file_get_contents($api_url);

  // Decode JSON data into PHP array
  $response_data = json_decode($json_data,JSON_PRETTY_PRINT);
  $img = $response_data['img'];
  $title=$response_data['title'];
  $alt=$response_data['alt'];
  $email = new \SendGrid\Mail\Mail(); 
  $email->setFrom("vtu14715@veltech.edu.in", "RandomXKCD");
  $email->addTo($reciever, "");
  $email->setSubject("Xkcd Comics");
  $email->addContent('text/html','<h1>'.$title.'</h1><br><img src="'.$img.'" alt="'.$alt.'">');
  $sendgrid = new \SendGrid(SENDGRID_API_KEY);
  try {
      $response = $sendgrid->send($email);
  } catch (Exception $e) {
      echo 'Caught exception: '. $e->getMessage() ."\n";
  }
}

?>