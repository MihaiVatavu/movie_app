<?php

include('../utilities/conn.php');

session_start();
if (!isset($_SESSION['email'])) {
  header('location: ../guest/index.php');
}
else{ 
  if ($_SESSION['status'] == "admin") {
      header('location: ../admin/index.php');
  }
}

// $email = $_SESSION['email'];
$email = mysqli_real_escape_string($conn,$_SESSION['email']);
// echo $email;

$sqlget = "SELECT * FROM users WHERE email = '$email'";

$result = mysqli_query($conn,$sqlget);

$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

// print_r($result);
print_r($data);


?>

<!DOCTYPE html>
<html lang="en">

  <!-- Include header -->
  <?php include('../template/header.php');?>

  <!-- Navbar  -->
  <body>
  <nav class="grey darken-4 "> 
      <div class="nav-wrapper container ">
        <a href="<?php if(!isset($_SESSION['email'])){
              echo '../guest/index.php'; 
          }else{
              echo '../user/index.php';
          } ?>" class="brand-logo">MovieFan</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
        <li><a href="../template/logout.php">Log Out</a></li>
          <li><a href="<?php if(!isset($_SESSION['email'])){
              echo '../guest/browse.php';
          }else{
              echo '../user/browse.php';
          } ?>">Browse</a></li>
        </ul>
      </div>
</nav>
<ul class="sidenav" id="mobile-demo">
    <li><a class="modal-trigger" href="<?php if(!isset($_SESSION['username'])){
            echo '../guest/browse.php';
        }else{
            echo '../user/browse.php';
        } ?>">Browse</a></li>
  </ul>
  <div class="cont">
    <div class="row">
      <h1 class="center">Hello <span><?php echo $data[0]['username'];?></span></h1>
    </div>
   <div class="row">
   </div>
  </div>


  <?php include('../template/footer.php');?>
  </body>
  </html>