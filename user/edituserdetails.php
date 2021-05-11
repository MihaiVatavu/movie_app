<?php

$name = $country = $city = $age = $bio = '';


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

  <!-- Mobile menu -->
  <ul class="sidenav" id="mobile-demo">
    <li><a class="modal-trigger" href="<?php if (!isset($_SESSION['username'])) {
                                          echo '../guest/browse.php';
                                        } else {
                                          echo '../user/browse.php';
                                        } ?>">Browse</a></li>
  </ul>

  <!-- Edit details form-->
  <div class="cont">
    <div class="row">
      <form class="col s12 l6 offset-l3" action="edituserdetails.php" method="POST">
        <h1>Edit your details</h1>
        <div class="row">
          <div class="input-field">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="validate" placeholder="Enter/Change your name" value=<?php echo htmlspecialchars($name) ?>>
          </div>
        </div>
        <div class="row">
          <div class="input-field">
            <label for="age">Age</label>
            <input type="number" id="age" name="age" class="validate" placeholder="Enter/Change your age" value=<?php echo htmlspecialchars($age) ?>>
          </div>
        </div>
        <div class="row">
          <div class="input-field">
            <label for="bio">Bio</label>
            <textarea id="bio" name="bio" class="materialize-textarea validate" value=<?php echo htmlspecialchars($bio) ?>></textarea>
          </div>
        </div>
        <div class="row">
          <div class="input-field">
            <label for="country">Country</label>
            <input type="text" id="country" name="country" class="validate" placeholder="Enter/Change your country" value=<?php echo htmlspecialchars($country) ?>>
          </div>
        </div>
        <div class="row">
          <div class="input-field">
            <label for="city">City</label>
            <input type="text" id="city" name="city" class="validate" placeholder="Enter/change your city" value=<?php echo htmlspecialchars($city) ?>>
          </div>
        </div>
        <button class="btn-large waves-effect waves-light grey darken-4 center" type="submit" name="submit" value="submit">Edit Details
          <i class="material-icons right">edit</i>
      </form>
    </div>
  </div>


  <!-- Include footer -->
  <?php include('../template/footer.php'); ?>
  <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
      var elem = document.getElementById('bio').val('New Text');
      M.textareaAutoResize(elem);
    });
  </script>
</body>

</html>