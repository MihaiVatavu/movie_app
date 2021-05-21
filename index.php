<?php
if (!isset($_SESSION['email'])) {
    header('location: guest/index.php');
}
else{ 
    header('location: user/index.php');
}


?>