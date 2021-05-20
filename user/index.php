<?php

include('../utilities/conn.php');

session_start();

if (!isset($_SESSION['email'])) {
  header('location: ../guest/index.php');
} else {
  if ($_SESSION['status'] == "admin") {
    header('location: ../admin/index.php');
  }
}

// $email = $_SESSION['email'];
$email = mysqli_real_escape_string($conn, $_SESSION['email']);
// echo $email;

$sqlgetmovies = "SELECT * FROM movies 
inner join users
on movies.UserID = users.id
WHERE email = '$email'";

$sqlgetuser = "SELECT * FROM users
WHERE email = '$email'";

$resultUser = mysqli_query($conn, $sqlgetuser);

$user = mysqli_fetch_all($resultUser, MYSQLI_ASSOC);

$resultMovies = mysqli_query($conn, $sqlgetmovies);
print_r($resultMovies);
$movies = mysqli_fetch_all($resultMovies, MYSQLI_ASSOC);

// $_SESSION['id']= $data[0]['MovieLink'];
// echo $_SESSION['id'];

mysqli_close($conn);

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
        <li><a href="../template/logout.php">Log Out</a></li>
        <li><a href="<?php if (!isset($_SESSION['email'])) {
                        echo '../guest/browse.php';
                      } else {
                        echo '../user/browse.php';
                      } ?>">Browse</a></li>
      </ul>
    </div>
  </nav>
  <ul class="sidenav" id="mobile-demo">
    <li><a class="modal-trigger" href="<?php if (!isset($_SESSION['username'])) {
                                          echo '../guest/browse.php';
                                        } else {
                                          echo '../user/browse.php';
                                        } ?>">Browse</a></li>
  </ul>
  <div class="cont">
    <div class="row">
      <h1 class="center">Hello <span><?php echo $user[0]['username']; ?></span></h1>

    </div>
    <div class="row">
      <div class="col s12 offset-l1 m4">
        <h2>Details</h2>
        <h4>Bio : <span><?php echo $user[0]['bio'] ?></span></h4>
        <h4>Country : <span><?php echo $user[0]['country'] ?></span></h4>
        <h4>City : <span><?php echo $user[0]['city'] ?></span></h4>
        <h4>Age : <span><?php echo $user[0]['age'] ?></span></h4>
        <a href="edituserdetails.php" class="btn-large waves-effect waves-light grey darken-4 center">Edit Details<i class="material-icons right">edit</i></a>
      </div>
      <div class="col s12 offset-l1 l4">
        <h4>Favourite Movies</h4>
        <ul class="collection">
          <?php if (mysqli_num_rows($resultMovies) == 0) { ?>
            <h5 class="center">No favourite movies yet</h5>
            <p class="center">To add a movie please use the browse feature</p>
          <?php }
          foreach ($movies as $movie) : ?>
            <li class="collection-item avatar">
              <span class="title"><?php echo $movie['Title'] ?></span>
              <p> Rating <?php echo $movie['Rating'] ?> </p>
              <a href="<?php echo $movie['MovieLink'] ?> " class="secondary-content"><i class="material-icons">link</i></a>
            </li>
          <?php endforeach; ?>
        </ul>

      </div>
    </div>


  </div>
  <?php include('../template/footer.php'); ?>
  <script type="text/javascript" src="../javascript/main.js"></script>
  <script type="text/javascript">
  </script>
</body>

</html>