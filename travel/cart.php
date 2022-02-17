<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divine Travel</title>
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="./css/cart.css">
</head>

<body>
    <?php
    //include necessary classes
    include_once "./classes/cls_cart.php";
    include_once "./classes/cls_user.php";

    session_start();

    //if user not logged return him to intro page
    if ($_SESSION['isLogged'] == false) {
        header('location:intro.php');
    }

    ?>
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
                            <li class="nav-item"><a href="#" class="nav-link link-cart active">Shopping Cart</a></li>
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
    <main class="cart__wrapper">
        <div class="cart__wrapper-table">
            <table class="cart__content-table">
                <thead class="cart__wrapper-table-head">
                    <tr>
                        <th class="table__head-col cart__wrapper-table-head-first-th" colspan="2">
                            Ticket
                        </th>
                        <th class="table__head-col">
                            Price
                        </th>
                        <th class="table__head-col">
                            Quantity
                        </th>
                        <th class="table__head-col">
                            Total
                        </th>
                        <th class="table__head-col">

                        </th>
                    </tr>
                </thead>
                <tbody class="cart__wrapper-table-body">

                    <?php
                    //get user id
                    $user = unserialize($_SESSION['user']);
                    $user_email = $user->get_email();

                    //user id
                    $user_id = User::get_id($user_email);
                    //fetch Cart data from database
                    $stmt = Cart::get_cartContent($user_id); //returns pdo object

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo ('
                                    <tr class="table__body-row">
                                        <td data-table-responsive="Ticket" class="table__body-col " colspan="2">
                                            <div class="cart__content-img-container">
                                                <div class="cart__content-img-wrapper">
                                                    <img class="cart__content-img" src="./design/imgs/' . $row['tripImg'] . '" alt="">
                                                </div>
                                                <p>' . $row['tripName'] . '</p>
                                            </div>
                
                                        </td>
                                        <td data-table-responsive="Price" class="table__body-col  cart__content-price">
                                            <h4 data-trip-id="' . $row['tripId'] . '"  class="default_price">' . $row['price'] . '<span>$</span></h4>
                                        </td>
                                        <td data-table-responsive="Quantity" class="table__body-col  cart__content-quantity">
                                            <div class="quantity-wrapper">
                                                <span data-trip-id="' . $row['tripId'] . '" class="material-icons-sharp cart-quantity-desc">expand_more</span>
                                                <span data-trip-id="' . $row['tripId'] . '" class="cart-quantity">' . $row['qte'] . '</span>
                                                <span data-trip-id="' . $row['tripId'] . '" class="material-icons-sharp cart-quantity-inc">expand_less</span>
                                            </div>
                                        </td>
                                        <td data-table-responsive="Total" class="table__body-col  cart__content-item-total">
                                            <h4 data-trip-id="' . $row['tripId'] . '"  class="default_total">' . $row['total'] . '<span>$</span></h4>
                                        </td>
                                        <td  data-table-responsive="remove from cart" class="table__body-col  cart__content-btn">
                                            <span data-trip-id="' . $row['tripId'] . '" class="material-icons x-btn">
                                                cancel
                                            </span>
                                        </td>
                                    </tr>
                                ');
                    }

                    //fetch total amount from database
                    $total_amount = Cart::get_cartTotal($user_id);

                    ?>
                    <tr class="cart__content-summary">
                        <td class="cart__content-summary-col" colspan="5">
                            <div class="cart__content-summary-wrapper">
                                <div class="cart__content-summary-total">
                                    <h4 class="cart-total">Total: <span id="summary-total"><?= $total_amount ?></span>$</h4>
                                </div>
                                <div class="cart__content-summary-checkout">
                                    <a class="checkout-btn" href="./checkout.php">checkout</a>
                                </div>
                            </div>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="./js/cart.js"></script>
    <script src="./ajax/a_cart.js"></script>

</body>

</html>