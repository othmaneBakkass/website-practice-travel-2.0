<?php

session_start();

$_SESSION['isLogged'] = false;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divine Travel</title>
    <link rel="stylesheet" href="./css/signup.css">
</head>

<body>

    <header class="logo-container">
        <h1 class="logo">
            Divine <span class="logo__second-part">Travel</span>
        </h1>
    </header>
    <main class="form-container">
        <div class="signup__form">
            <div class="signup__form-header signup__form-content">
                <h1>Sign up</h1>
            </div>
            <div class="signup__form-main signup__form-content">
                <div class="signup__form-main_left-side ">
                    <div class="signup__form-email">
                        <label id="label__email" for="email">Email:</label>
                        <input type="text" name="email" id="email">
                        <p id="email_msg" class="response_msg"></p>
                    </div>
                    <div class="signup__form-password">
                        <label id="label__password" for="password">Password:</label>
                        <input type="password" name="password" id="password">
                        <p id="password_msg" class="response_msg long_msg"></p>

                    </div>
                    <div class="signup__form-password">
                        <label id="label__cnfrm_password" for="cnfrm_password">Confirm Password:</label>
                        <input type="password" name="cnfrm_password" id="cnfrm_password">
                        <p id="cnfrm_password_msg" class="response_msg"></p>

                    </div>
                </div>
                <div class="signup__form-main_right-side">
                    <div class="signup__form-firstname">
                        <label id="label__firstname" for="firstname">First Name:</label>
                        <input type="text" name="firstname" id="firstname">
                        <p id="firstname_msg" class=" response_msg long_msg"></p>

                    </div>
                    <div class="signup__form-lastname">
                        <label id="label__lastname" for="lastname">Last Name:</label>
                        <input type="text" name="lastname" id="lastname">
                        <p id="lastname_msg" class=" response_msg long_msg"></p>

                    </div>
                    <div class="signup__form-birth">
                        <label id="label__birth" for="birth">Date of Birth:</label>
                        <input type="date" name="birth" id="birth">
                        <p id="birth_msg" class="response_msg"></p>

                    </div>


                </div>
            </div>
            <a class="login-link signup__form-content" href="login.php">Already have an account? Login</a>
            <div class="signup__form-footer signup__form-content">

                <button class="signup-btn btn-sm"> Sign up
                </button>
            </div>
        </div>
    </main>
    <!-- EXTERNAL SCRIPTS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- /EXTERNAL SCRIPTS -->
    <script src="./js/signup.js"></script>
    <script src="./ajax/a_signup.js"></script>
</body>

</html>