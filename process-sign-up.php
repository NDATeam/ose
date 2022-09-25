<?php 
    include_once 'config/Database.php';
    include_once 'class/User.php';

    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);

    date_default_timezone_set('Asia/Ho_Chi_Minh');

    $user->first_name = $_POST["first_name"];
    $user->last_name = $_POST["last_name"];	
    $user->phone = $_POST["phone"];
    $user->address = $_POST["address"];
    $user->gender = $_POST["gender"];
    $user->email = $_POST["email"];
    $user->password = $_POST["password"];
    $user->role = 'user';
    $user->created_at = date("Y-m-d H:i:s");

    if($user->register()) {
        $url = 'http://localhost/ose/sign-in';	
        echo $url;
    } else {
        $url = 'http://localhost/ose/sign-up';
        echo $url;
    }
?>