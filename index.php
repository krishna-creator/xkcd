<?php
//require("sendgrid-php/sendgrid-php.php");
require_once 'config.php';
//require_once('connect.php');
session_start();
if(isset($_SESSION['email'])){
  $e=$_SESSION['email'];
  $q="SELECT email FROM users WHERE email='$e'";
  $r=$conn->query($q);
  if($r->num_rows > 0){
    header("Location: ./home.php");
  }
}
if(isset($_POST['submit'])){  
  $e=$_POST['email'];

  $s="SELECT email FROM users WHERE email='$e'";
  $result=$conn->query($s);

  if($result->num_rows > 0){
    $_SESSION['email']=$e;
    header("Location: ./home.php");
  }
  else{
    $email = new \SendGrid\Mail\Mail();
    $_SESSION['email']=$e;
    $code=rand(100000,999999);
    $_SESSION['code']= $code;
    $email->setFrom("vtu14715@veltech.edu.in", "RandomXKCD");
    $email->addTo($e, "");
    $email->setSubject("Verfication Code");
    $email->addContent('text/html',strval($code));
    $sendgrid = new \SendGrid(SENDGRID_API_KEY);
try {
    $response = $sendgrid->send($email);
    header('Location: ./verfication.php');
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
}
    mysqli_close($conn);
  }
    ?>
  <?php include 'header.php'; ?>
  <div class="row">
      <div class="col">
        <div class="card card-body">
          <form action="index.php" method="post">
            <h1 class="text-center ">Welcome to XKCD</h1>
            <div>
              <label for="email">Email :</label>
              <input class="form-control" type="email" name="email" required />
            </div>
            <input class="btn" name="submit" type="submit" value="Login / Signup" />
          </form>
        </div>
      </div>
    </div>
    <?php include 'footer.php';?>
