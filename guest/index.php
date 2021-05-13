
<!DOCTYPE html>
<html lang="en">

  <!-- Include header -->
  <?php include('../template/header.php');?>


  <!-- Navbar  -->
<body>
  <nav class="grey darken-4 "> 
      <div class="nav-wrapper container ">
        <a href="index.php" class="brand-logo">MovieFan</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a class="modal-trigger" href="../utilities/login.php">Log In</a></li>
          <li><a class="modal-trigger" href="../utilities/signup.php">Sign Up</a></li>
          <li><a class="modal-trigger" href="<?php if(!isset($_SESSION['username'])){
              echo '../guest/browse.php';
          }else{
              echo '../user/browse.php';
          } ?>">Browse</a></li>
        </ul>
      </div>
</nav>

  <ul class="sidenav" id="mobile-demo">
    <li><a class="modal-trigger" href="../utilities/login.php">Log In</a></li>
    <li><a class="modal-trigger" href="../utilities/signup.php">Sign Up</a></li>
    <li><a class="modal-trigger" href="<?php if(!isset($_SESSION['username'])){
            echo '../guest/browse.php';
        }else{
            echo '../user/browse.php';
        } ?>">Browse</a></li>
  </ul>

  <!-- Container -->

<div class="container body">
    <h1 class="center">Welcome to Movie Fan</h1>
    <p class="center">Movie fan is a website where you can find informations about your favourite movies</p>
    <div class="section">
      <div class="carousel carousel-slider center">
        <a class="carousel-item" href="#one!"><img src="../assets/avengers.jpg"></a>
        <a class="carousel-item" href="#two!"><img src="../assets/batman.jpg"></a>
        <a class="carousel-item" href="#three!"><img src="../assets/godzilla-vs-kong.png"></a>
        <a class="carousel-item" href="#four!"><img src="../assets/Shrek.jpg"></a>
      </div>
    </div>

    <!-- Modal triggers Log In && Sign Up -->
  <section class="cta">
    <div class="row center">
      <a class="waves-effect waves-light btn-large grey darken-4 modal-trigger" href="../utilities/login.php">Log In</a>
      <a class="waves-effect waves-light btn-large grey darken-4 modal-trigger" href="../utilities/signup.php">Sign Up</a>
    </div>
  </section>
  </div>
</div> 
  <!-- Include footer -->

<?php include('../template/footer.php');?>
<script type="text/javascript">

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.carousel');
    var instances = M.Carousel.init(elems,{
    indicators: true,
    duration: 150
    });
    setInterval(()=>{
     M.Carousel.getInstance(elems[0]).next();
  },3500);
  }); 
  
</script>
</body>
</html>