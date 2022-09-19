<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="apple-touch-icon" href="">
    <link rel="shortcut icon" type="image/x-icon" href="{!! asset('public/backend/app-assets/images/favicon/favicon-32x32.png') !!}">
    <title>Online exam system | Sign In Page</title>
</head>

<body>
    <div id="wrapper">
        <div class="bg-login">
            <form action="" method="POST" class="form-login" id="form-1">
                <h3 class="heading">
                    <img src="./assets/images/quiz-icon.png" alt="" srcset="">
                </h3>

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

                <button class="form-submit">Khôi phục mật khẩu</button>
            </form>

            <?php include './inc/toggle.php' ?>
        </div>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="./assets/js/validator.js"></script>
    <script src="./assets/js/login.js"></script>

    <script>
        Validator({
            form: "#form-1",
            formGroupSelector: ".form-group",
            errorSelector: ".form-message",
            rules: [
                Validator.isRequired("#email"),
                Validator.isEmail("#email")
            ],
            onsubmit: function (value) {
                // CALL API
                console.log(value);
            },
        });
    </script>
                
</body>
</html>