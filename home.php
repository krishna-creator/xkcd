<?php
ini_set('display_errors', 1);
session_start();
//  echo '<pre>'. print_r($_SESSION, TRUE) . '</pre>'; 
//  header('Access-Control-Allow-Origin: origin,x-requested-withNULL');
//  header('Access-Control-Allow-Origin: *');
//  $ch=curl_init();
// //  $url="https://reqres.in/api/users?page=2";
// $url="https://cors-anywhere.herokuapp.com/http://xkcd.com/614/info.0.json";
//  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
//  curl_setopt($ch,CURLOPT_URL,$url);
// //  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
// //     'Content-Type: application/json',
// //     'Connection: Keep-Alive'
// //     ));
//  $res=curl_exec($ch);
//  $j=json_decode($res,true);
//  var_dump($j);

 ?>

<?php include 'header.php' ?>
    <h1>Welcome to RandomXKCD</h1><br>
    <h4>You will receive a random XKCD comic with attachment for every 5 minutes to your email</h4>
    <a class="links" href="./stop.php">Stop receving emails</a><br>
    <a class="links" href="./logout.php">Logout</a>
<?php include 'footer.php' ?>
