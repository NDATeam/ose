<?php 
    include_once '../config/Database.php';
    include_once '../class/User.php';

    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);

    if($user->loggedIn()) {	
        if($_SESSION["role"] == 'user') {
            $url = 'http://localhost/ose/';
            header("Location: " . $url);
        } 	
    }

    if(!$user->loggedIn()) {
        $url = 'http://localhost/ose/sign-in';
        header("Location: " . $url);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <h1>Admin Page</h1>
    <?php echo $_SESSION['userId'] ?>
    <a href="http://localhost/ose/admin/logout">Logout</a>
</body>
</html>