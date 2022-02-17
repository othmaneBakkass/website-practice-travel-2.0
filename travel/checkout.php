<?php

session_start();

//if user not logged return him to intro page
if ($_SESSION['isLogged'] == false) {
    header('location:intro.php');
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divine Travel</title>
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="./css/checkout.css">
</head>

<body>
    <header class="navbar-wrapper">

        <div class="navbar">
            <div class="logo-wrapper">
                <h1 class="logo">Divine <span class="logo-end-part">Travel</span></h1>
            </div>
            <div class="nav-wrapper">
                <div class="links-wrapper">
                    <div class="nav-overlay">
                        <ul class="nav-item-wrapper">
                            <li class="nav-item"><a href="./index.php" class="nav-link link-home ">Home</a></li>
                            <li class="nav-item"><a href="./cart.php" class="nav-link link-cart active">Shopping Cart</a></li>
                            <li class="nav-item"><a href="./trips.php" class="nav-link link-dashboard">Trips</a></li>
                            <li class="nav-item"><a href="./signout.php" class="nav-link link-sign">Sign Out</a></li>
                            <li class="link-home-bg">Home</li>
                            <li class="link-cart-bg">Shopping Cart</li>
                            <li class="link-dashboard-bg">Trips</li>
                            <li class="link-sign-bg">Sign Out</li>
                        </ul>
                    </div>
                    <div class="nav-icon">
                        <div class="nav-icon-el nav-icon-top"></div>
                        <div class="nav-icon-el nav-icon-middle"></div>
                        <div class="nav-icon-el nav-icon-bottom"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>



    <main class="checkout_wrapper">
        <section class="checkout_wrapper-content">
            <div class="checkout_content-title-wrapper">
                <h3 class="checkout_content-title">
                    Checkout
                </h3>
            </div>
            <div class="checkout_content-inputs-wrapper">
                <div class="inputs_top_row-wrapper">
                    <div class="input-container">
                        <label class="input-label" for="card_holder">Détenteur de la carte:</label>
                        <input class="input-field" type="text" name="card_holder" id="card_holder">
                        <p id="card_holder_msg" class="response_msg "></p>

                    </div>
                    <div class="input-container">
                        <label class="input-label" for="card_year"> Année d'expiration:</label>
                        <select class="input-field" name="card_year" id="card_year">
                            <?php
                            for ($i = 2020; $i < 2031; $i++) {
                                echo ('
                                    <option class="input-field-select_option" value="' . $i . '">' . $i . '</option>
                                    
                                    ');
                            }

                            ?>
                        </select>
                        <p id="card_year_msg" class="response_msg "></p>

                    </div>
                </div>
                <div class="inputs_middle_row-wrapper">
                    <div class="input-container">
                        <label class="input-label" for="card_month"> Mois:</label>
                        <select class="input-field" name="card_year" id="card_month">
                            <?php
                            for ($i = 1; $i < 13; $i++) {
                                echo ('
                                    <option class="input-field-select_option" value="' . $i . '">' . $i . '</option>
                                    
                                    ');
                            }

                            ?>
                        </select>
                        <p id="card_month_msg" class="response_msg "></p>

                    </div>
                    <div class="input-container">
                        <label class="input-label" for="card_number">Numéro de la carte:</label>
                        <input class="input-field" type="text" name="card_number" id="card_number">
                        <p id="card_number_msg" class="response_msg "></p>

                    </div>
                </div>
                <div class="inputs_bottom_row-wrapper">

                    <div class="input-container">
                        <label class="input-label" for="card_crypto">Cryptogramme:</label>
                        <input class="input-field" type="text" name="card_crypto" id="card_crypto">
                        <p id="crypto_msg" class="response_msg "></p>

                    </div>
                    <div class="btn-container">
                        <button class="btn">confirm</button>
                    </div>
                </div>
            </div>

        </section>
    </main>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="./js/checkout.js"></script>
    <script src="./ajax/a_checkout.js"></script>

</body>

</html>