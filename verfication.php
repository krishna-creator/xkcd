
<?php include 'header.php'; ?>
<div class="row">
<?php 
session_start();
// require_once('connect.php');
// require 'sendmail.php';

if(isset($_POST['submit'])){
  $email=$_SESSION['email'];
  if($_POST['code']==$_SESSION['code']){
  $time=date('i')/5;
  $sql = "INSERT INTO users (email,createdat)
  VALUES ('$email','$time')";
  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  unset($_SESSION['code']);
  sendcomics($email);
  header("Location: ./home.php");
  }
  else{
    echo '<div class="row mb-2"><p class="alert alert-danger col-md-4 m-auto p-0 text-center">Wrong Verfication Code</p></div>';
  }
}
?>
  <div class="col">
    <div class="card card-body">
      <form action="verfication.php" method="post">
        <h4>Enter Your Verfication Code</h4>
        <input class="form-control" name="code" type="text" required>
        <input class="btn danger" name="submit" value="Verify" type="submit">
        </form>
      </div>
    </div>
  </div>      
<?php include 'footer.php' ?>