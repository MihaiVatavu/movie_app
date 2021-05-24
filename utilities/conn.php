<?php
// require 'vendor/autoload.php';

// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);

// $dotenv->load();

// $cleardb_url = parse_url(getenv("URL"));
// $cleardb_server = $_ENV['SERVER'];
// $cleardb_username = $_ENV['USERNAME'];
// $cleardb_password = $_ENV['PASSWORD'];
// $cleardb_db = substr($_ENV['DB'], 1);
// $active_group = 'default';
// $query_builder = TRUE;
// // Connect to DB
// $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

// $conn = mysqli_connect('localhost','movieadmin','adminmovie1234','movies_app');

//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
if (!$conn) {
  echo 'Connection error' . mysqli_connect_error();
}
