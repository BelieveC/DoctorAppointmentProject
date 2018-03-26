<?php

//Start session

session_start();

unset($_SESSION['username']); // DELETES THE USERNAME KEY

//session_destroy(); Deletes all the keys

header('Location:login.php');

?>