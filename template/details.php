<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<!-- Include header -->
<?php include('../template/header.php'); ?>

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
        <li><a class="modal-trigger" href="<?php if (!isset($_SESSION['email'])) {
                                              echo '../guest/index.php';
                                            } else {
                                              echo '../user/index.php';
                                            } ?>">Home</a></li>
        <li><a class="modal-trigger" href="<?php if (!isset($_SESSION['email'])) {
                                              echo '../guest/browse.php';
                                            } else {
                                              echo '../user/browse.php';
                                            } ?>">Browse</a></li>
      </ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
    <li><a class="modal-trigger" href="<?php if (!isset($_SESSION['email'])) {
                                          echo '../guest/index.php';
                                        } else {
                                          echo '../user/index.php';
                                        } ?>">Home</a></li>
    <li><a class="modal-trigger" href="<?php if (!isset($_SESSION['email'])) {
                                          echo '../guest/browse.php';
                                        } else {
                                          echo '../user/browse.php';
                                        } ?>">Browse</a></li>
  </ul>
  <div class="container">
    <div class="row" id="movie">

    </div>
  </div>
  <?php include('../template/footer.php'); ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../javascript/main.js"></script>
  <script>
    <?php if (isset($_SESSION['email'])) {
      echo 'getIndividualMovieLoggedIn()';
    } else {
      echo  'getIndividualMovie()';
    }
    ?>
  </script>
</body>

</html>