<?php

include('../utilities/conn.php');

$name = $email =$password = $confirmpassword = '';

$errors = array('name' => '', 'email'=>'','password'=>'','confirmpassword'=>'');

if(isset($_POST['submit'])){
  //check name
  if(empty($_POST['name'])){
    $errors['name'] = 'A name is required</br>';
  }

  //check email
  if(empty($_POST['email'])){
    $errors['email'] ='An email is required </br>';
  }else{
    $email = $_POST['email'];
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $errors['email'] = 'Email must be a valid email address';
    }
  }
  //check password
  if(empty($_POST['password'])){
    $errors['password']='Please enter password </br>';
  }

  //check confirm password
  if(empty($_POST['confirmpassword'])){
    $errors['confirmpassword']='Please enter password </br>';
  }

  if(($_POST['password']) != ($_POST['confirmpassword'])){
    $errors['password'] = 'Passwords do not match </br>';
    $errors['confirmpassword'] = 'Passwords do not match </br>';
  }

  if(array_filter($errors)){  

  }else{

    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    //Query

    $query = "INSERT INTO users(username,email,pass,status) VALUES('$name','$email','$password','user')";

    if(mysqli_query($conn,$query)){
      session_start();
      $_SESSION['email'] = $email; 
      header('Location:../user/index.php');
    }else{
      echo 'query error:'. mysqli_error($conn);
    }
  }
}

?>


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

<div class="cont" id="signup">
      <div class="row">
        <h3 class="center">Sign Up</h3>
        <form action="signup.php" method="POST">
        <input type="hidden" name="signup" value="yes" >
        <div class="row">
          <div class="input-field col l8 offset-l2">
          <input placeholder="Enter your name" name="name" id="name" type="text" class="validate" value="<?php echo htmlspecialchars($name) ?>">
            <label for="name">Name</label>
            <div class="red-text"><?php echo $errors['name'] ?></div>
            </div>
          <div class="row">
          </div>
          <div class="input-field col l8 offset-l2">
          <input placeholder="Enter email" name="email" id="email" type="text" class="validate" value="<?php echo htmlspecialchars($email) ?>">
            <label for="email">Email</label>
            <div class="red-text"><?php echo $errors['email'] ?></div>
            </div>
            </div>
          <div class="row">
          <div class="input-field col l8 offset-l2">
          <input placeholder="Enter your password" name="password" id="password" type="password" class="validate" value="<?php echo htmlspecialchars($password) ?>">
            <label for="password">Password</label>
            <div class="red-text"><?php echo $errors['password'] ?></div>
          </div>
          </div>
          <div class="row">
          <div class="input-field col l8 offset-l2">
          <input placeholder="Confirm your password" name="confirmpassword" id="confirmpassword" type="password" class="validate" value="<?php echo htmlspecialchars($confirmpassword) ?>">
            <label for="conformpassword">Confirm Password</label>
            <div class="red-text"><?php echo $errors['confirmpassword'] ?></div>
          </div>
          </div>
          <div class="row center">
          <button class="btn-large waves-effect waves-light grey darken-4 center" type="submit" name="submit" value="submit">Sign Up
            <i class="material-icons right">send</i>
          </button>
          </div> 
        </form>
      </div>
    </div>
  </div>

<?php include('../template/footer.php');?>
</body>
</html>