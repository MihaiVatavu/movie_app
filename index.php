<?php
if (!isset($_SESSION['email'])) {
    header('location: guest/index.php');
}
else if (isset($_SESSION['status']) == "admin") {
    header('location: admin/index.php');
}
else{ 
    header('location: user/index.php');
}


?>