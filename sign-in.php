<?php 
    include_once './config/Database.php';
    include_once './class/User.php';

    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);

    if($user->loggedIn()) {	
        if($_SESSION["role"] == 'admin') {
            $url = 'http://localhost/ose/admin/';
            header("Location: " . $url);
        } 
        else if ($_SESSION["role"] == 'user'){
            $url = 'http://localhost/ose/';
            header('Location' . $url);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="./assets/images/favicon/quiz-icon.png">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Online exam system | Sign In Page</title>
</head>

<body>
    <div id="wrapper">
        <div class="bg-login">
            <form action="" method="POST" class="form-login" id="form-1">
                <h3 class="heading">Đăng nhập hệ thống</h3>

                <div class="spacer"></div>

                <div class="form-group">
                    <i class="far fa-envelope"></i>
                        <input
                            id="email"
                            name="email"
                            type="text"
                            placeholder="VD: email@domain.com"
                            class="form-control"
                            
                        />
                    <span class="form-message"></span>
                </div>

                <div class="form-group">
                    <i class="fas fa-key"></i>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Nhập mật khẩu"
                        class="form-control pr-40"
                        autocomplete="off"
                    />
                    <div id="eye">
                        <i class="far fa-eye"></i>
                    </div>
                    <span class="form-message"></span>
                </div>

                <div class="form-group">
                    <i class="fas fa-users"></i>
                    <select name="role" id="role" class="form-control">
                        <option value="" selected disabled>Chọn vai trò</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                    <span class="form-message"></span>
                </div>

                <button class="form-submit" name="login">Đăng nhập</button>
            </form>

            <?php include './inc/toggle.php' ?>
            <?php include './inc/paragraph.php' ?>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./assets/js/validator.js"></script>
    <script src="./assets/js/login.js"></script>

    <script>
        Validator({
            form: "#form-1",
            formGroupSelector: ".form-group",
            errorSelector: ".form-message",
            rules: [
                Validator.isRequired("#email"),
                Validator.isEmail("#email"),
                Validator.minLength("#password", 6),
                Validator.isRequired("#role")
            ],
            onsubmit: function (value, formElement) {
                const btnSubmit = formElement.querySelector(".form-submit");
                
                btnSubmit.innerHTML = 'Đang đăng nhập';
                btnSubmit.classList.add('spinning');

                setTimeout(function () {
                    btnSubmit.classList.remove('spinning');
                    btnSubmit.innerHTML = 'Đăng nhập';

                    $.post('process-sign-in.php', value, function (res) {  
                        if (res === 'http://localhost/ose/') {
                            toastr.success('Success', 'Đăng nhập thành công');

                            setTimeout(function() {
                                window.location.href = res;
                            }, 1500)
                        } else if (res === 'http://localhost/ose/admin/') {
                            toastr.success('Success', 'Đăng nhập thành công');

                            setTimeout(function() {
                                window.location.href = res;
                            }, 1500)
                        } else {
                            toastr.error('Error', 'Đăng nhập thất bại');

                            setTimeout(function() {
                                window.location.href = res;
                            }, 1500)
                        }
                    });
                }, 2000);
            },
        });
</script>
                
</body>
</html>