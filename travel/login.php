<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divine Travel</title>
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <div class="test">

    </div>
    <header class="logo-container">
        <h1 class="logo">
            Divine <span class="logo__second-part">Travel</span>
        </h1>
    </header>
    <main class="form-container">
        <div class="login__form">
            <div class="login__form-header login__form-content">
                <h1>Login</h1>
                <p id="validate_login_msg"></p>
            </div>
            <div class="login__form-main login__form-content">
                <div class="login__form-email">
                    <label id="label__email" for="email">Email:</label>
                    <input type="text" name="email" id="email">
                    <p id="email_msg" class="response_msg"></p>
                </div>
                <div class="login__form-password">
                    <label id="label__password" for="password">Password:</label>
                    <input type="password" name="password" id="password">
                    <p id="password_msg" class="response_msg long_msg"></p>
                </div>
                <a class="sign-up-link" href="signup.php">Don't have an account? Sign up</a>
            </div>
            <div class="login__form-footer login__form-content">
                <button class="login-btn btn-sm">
                    Login
                </button>
            </div>
        </div>
    </main>
    <!-- EXTERNAL SCRIPTS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- /EXTERNAL SCRIPTS -->
    <script src="./js/login.js"></script>
    <script src="ajax/a_login.js"></script>

</body>

</html>