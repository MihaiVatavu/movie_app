<?php

session_start();
if (isset($_SESSION['email'])) {
    if ($_SESSION['status'] == "admin") {
        header('location: ../admin/index.php');
    } else {
        header('location: ../user/index.php');
    }
}

echo "hello browse user"

?>