<?php 
    include_once './config/Database.php';
    include_once './class/User.php';

    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);

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
    <title>Online exam system</title>
    <link rel="stylesheet" href="./assets/css/normalize.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">
</head>
<body>
    
    <h1>User</h1>
    <?php echo $_SESSION['role'] ?>
    <a href="http://localhost/ose/logout">Logout</a>
</body>
</html>
