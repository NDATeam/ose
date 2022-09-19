<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <title>Online exam system | Sign Up Page</title>
</head>

<body>
    <div id="wrapper">
        <div class="bg-login">
            <form action="" method="POST" class="form-login" id="form-1">
                <h3 class="heading">Đăng ký</h3>

                <div class="spacer"></div>

                <div class="wrap">
                    <div class="form-group">
                        <i class="far fa-user"></i>
                        <input
                            id="first_name"
                            name="first_name"
                            type="text"
                            placeholder="VD: Nguyễn"
                            class="form-control"
                        />
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                        <i class="far fa-user"></i>
                        <input
                            id="last_name"
                            name="last_name"
                            type="text"
                            placeholder="VD: Văn A"
                            class="form-control"
                        />
                        <span class="form-message"></span>
                    </div>
                </div>

                <div class="form-group">
                    <i class="far fa-phone"></i>
                        <input
                            id="phone"
                            name="phone"
                            type="text"
                            placeholder="VD: 032.xxx.xxx"
                            class="form-control"
                        />
                    <span class="form-message"></span>
                </div>

                <div class="form-group">
                    <i class="far fa-location"></i>
                        <input
                            id="address"
                            name="address"
                            type="text"
                            placeholder="VD: 147 Hai Bá Trưng"
                            class="form-control"
                        />
                    <span class="form-message"></span>
                </div>

                <div class="form-group">
                   
                    <div class="horizontal">
                        <div class="wrap">
                            <input
                                name="gender"
                                type="radio"
                                value="male"
                                class="form-control"
                            />
                            <span>Nam</span>
                        </div>
                        <div class="wrap">
                            <input
                                name="gender"
                                type="radio"
                                value="female"
                                class="form-control"
                            />
                            <span>Nữ</span>
                        </div>
                        <div class="wrap">
                            <input
                                name="gender"
                                type="radio"
                                value="orthor"
                                class="form-control"
                            />
                            <span>Khác</span>
                        </div>
                    </div>
                    <span class="form-message"></span>
                </div>

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

                <div class="wrap">
                    <div class="form-group">
                        <i class="fas fa-key"></i>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            placeholder="M.Khẩu"
                            class="form-control"
                        />
                        <div id="eye">
                            <i class="far fa-eye"></i>
                        </div>
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                        <i class="fas fa-key"></i>
                        <input
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder="NL.M.Khẩu"
                            type="password"
                            class="form-control"
                        />
                        <div id="eye-1">
                            <i class="far fa-eye"></i>
                        </div>
                        <span class="form-message"></span>
                    </div>
                </div>

                <div class="form-group">
                    <i class="fas fa-upload"></i>
                    <input
                        id="avatar"
                        name="avatar"
                        type="file"
                        class="form-control"
                    />
                    <span class="form-message"></span>
                </div>

                <button class="form-submit">Đăng ký</button>
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
                Validator.isRequired("#first_name"),
                Validator.isRequired("#last_name"),
                Validator.isRequired("#phone"),
                Validator.isRequired("#address"),
                Validator.isRequired('input[name="gender"]'),
                Validator.isRequired("#email"),
                Validator.isEmail("#email"),
                Validator.isRequired("#password"),
                Validator.minLength("#password", 6),
                Validator.isRequired("#password_confirmation"),
                Validator.isConfirmed(
                    "#password_confirmation",
                    function () {
                        return document.querySelector(
                            "#form-1 #password"
                        ).value;
                    },
                    "Mật khẩu nhập lại không chính xác"
                ),
            ],
            onsubmit: function (value) {
                // CALL API
                console.log(value);
            },
        });
    </script>
                
</body>
</html>