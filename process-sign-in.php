<?php 
    include_once 'config/Database.php';
    include_once 'class/User.php';

    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);

    $user->email = $_POST["email"];
    $user->password = $_POST["password"];	
    $user->role = $_POST["role"];

    if($user->login()) {
        if($_SESSION["role"] == 'admin') {
            $url = 'http://localhost/ose/admin/';
            echo $url;
        } else if ($_SESSION["role"] == 'user'){
            $url = 'http://localhost/ose/';
            echo $url;
        }		
    } else {
        $url = 'http://localhost/ose/sign-in';
        echo $url;
    }
?>