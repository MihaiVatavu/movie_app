<?php

$conn = mysqli_connect('localhost','movieadmin','adminmovie1234','movies_app');

if(!$conn){
  echo 'Connection error'. mysqli_connect_error();
}

?>