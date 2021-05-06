<?php

session_start();
if (!isset($_SESSION['email'])) {
  header('location: ../guest/index.php');
}
else{ 
  if ($_SESSION['status'] == "admin") {
      header('location: ../admin/index.php');
  }
}

print_r($_SESSION);

echo 'Hello user';

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
              echo '../guest/browse.php'; 
          }else{
              echo '../user/browse.php';
          } ?>" class="brand-logo">MovieFan</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="signup.php">Sign Up</a></li>
          <li><a href="<?php if(!isset($_SESSION['email'])){
              echo '../guest/browse.php';
          }else{
              echo '../user/browse.php';
          } ?>">Browse</a></li>
        </ul>
      </div>
</nav>
<ul class="sidenav" id="mobile-demo">
    <li><a class="modal-trigger" href="signup.php">Sign Up</a></li>
    <li><a class="modal-trigger" href="<?php if(!isset($_SESSION['username'])){
            echo '../guest/browse.php';
        }else{
            echo '../user/browse.php';
        } ?>">Browse</a></li>
  </ul>



  <?php include('../template/footer.php');?>
  </body>
  </html>