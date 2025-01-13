<?php
session_start();
if(isset($_SESSION['username'])){
    session_destroy();
    $_SESSION['username']='';
    header("location:login.php");
}

?>