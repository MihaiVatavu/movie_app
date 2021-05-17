<?php
include('../utilities/conn.php');

session_start();
$email = $_SESSION['email'];
$id = $_POST['id'];
$title = $_POST['title'];
$rating = $_POST['rating'];

// print_r($_POST);

$sql="
   INSERT INTO movies 
    SET Title = '$title',
     Rating = '$rating',
     MovieLink= '$id',
     UserID = (
      SELECT id
        FROM users
       WHERE email = '$email')
";

$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);


?>