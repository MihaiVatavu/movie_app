<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<?php include('../template/header.php');?>

<!-- Navbar -->
<body>
  <nav class="grey darken-4 "> 
      <div class="nav-wrapper container ">
        <a href="../index.php" class="brand-logo">MovieFan</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a class="modal-trigger" href="../index.php">Home</a></li>
          <li><a class="modal-trigger" href="<?php if(!isset($_SESSION['email'])){
              echo '../guest/browse.php';
          }else{
              echo '../user/browse.php';
          } ?>">Browse</a></li>
        </ul>
      </div>
  </nav>
  <ul class="sidenav" id="mobile-demo">
    <li><a class="modal-trigger" href="../index.php">Home</a></li>
    <li><a class="modal-trigger" href="<?php if(!isset($_SESSION['email'])){
            echo '../guest/browse.php';
        }else{
            echo '../user/browse.php';
        } ?>">Browse</a></li>
  </ul>
<div class="container">
<!-- Search for a movie -->
  <div class="row">
    <form id="searchform" class="col m6 offset-m3">
      <input type="text" id="search" placeholder="Search for a movie">
    </form>
  </div>
  
  <!-- Output box for movies -->
  <div class="row" id="movies">

  </div>
</div>
<?php include('../template/footer.php');?>
<script type="text/javascript" src="../javascript/main.js"></script>
<script >
  popularMovies()
</script>
</body>
</html> 