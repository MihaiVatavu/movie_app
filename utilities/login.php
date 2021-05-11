<?php 
include('../utilities/conn.php');

$password = $email = '';

$errors = array('email'=>'','password'=>'');

if(isset($_POST['submit'])) {
  // check email
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
  if(array_filter($errors)){
  
  }else{
    
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $password = mysqli_real_escape_string($conn,$_POST['password']);

//Query
  $query = "SELECT email, pass, status FROM users WHERE email = '$email' && pass = '$password'";

  $result = mysqli_query($conn,$query);
  
  $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

  $count = mysqli_num_rows($result);

  if($count == 1){
    session_start();
    $_SESSION['status'] = $data[0]['status'];
    $_SESSION['email'] = $email; 
    header('location: ../user/index.php');
  }else{
    header('location: ../guest/index.php');
  }

  mysqli_close($conn);
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
        <a href="../index.php" class="brand-logo">MovieFan</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a class="modal-trigger" href="signup.php">Sign Up</a></li>
          <li><a class="modal-trigger" href="<?php if(!isset($_SESSION['username'])){
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


   <div class="cont">
   <h1 class="center">Log In</h1>
     <div class="row">
        <div class="col s12 l6 offset-l3">
        <form class="center" action="login.php" method="POST">
        <div class="row">
          <div class="input-field">
          <input placeholder="Enter your email" name="email" id="email" type="text" class="validate" value="<?php echo htmlspecialchars($email) ?>">
            <label for="email">Email</label>
            <div class="red-text"><?php echo $errors['email'] ?></div>
          </div>
        </div>
        <div class="row">  
          <div class="input-field">
          <input placeholder="Enter your password" name="password" id="password" type="password" class="validate" value="<?php echo htmlspecialchars($password) ?>">
            <label for="password">Password</label>
            <div class="red-text"><?php echo $errors['password'] ?></div>
          </div>
        </div> 
          <button class="btn-large waves-effect waves-light grey darken-4 center" type="submit" name="submit" value="submit">Log In
            <i class="material-icons right">send</i>
          </button> 
        </form>
        </div>
     </div>

   </div>

  <!-- Include footer -->

  <?php include('../template/footer.php');?>
  </body>
  </html>