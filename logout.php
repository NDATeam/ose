<?php 
    session_start();
    $_SESSION["userId"] = '';
    
    session_destroy();
    $url = 'http://localhost/ose/sign-in';
    header("Location:" . $url);
?>