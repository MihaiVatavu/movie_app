<?php

session_start();
if (isset($_SESSION['email'])) {
  // if ($_SESSION['status'] == "admin") {
  //     header('location: ../admin/index.php');
  // }
}


// echo "hello browse user"

?>

<!DOCTYPE html>
<html lang="en">

<!-- Include header -->
<?php include('../template/header.php'); ?>

<!-- Navbar  -->

<body>
  <nav class="grey darken-4 ">
    <div class="nav-wrapper container ">
      <a href="<?php if (!isset($_SESSION['email'])) {
                  echo '../guest/index.php';
                } else {
                  echo '../user/index.php';
                } ?>" class="brand-logo">MovieFan</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="../user/index.php">Home</a></li>
        <li><a href="../template/logout.php">Log Out</a></li>
      </ul>
    </div>
  </nav>
  <ul class="sidenav" id="mobile-demo">
    <li><a class="modal-trigger" href="../user/index.php">Home</a></li>
  </ul>
  <div class="container">

  </div>

  <?php include('../template/footer.php'); ?>
</body>

</html>