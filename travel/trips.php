<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divine Travel</title>

    <!-- EXTERNAL LINKS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">
    <!-- /EXTERNAL LINKS -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/trip.css">

</head>

<body>

    <?php
    //include necessary classes
    include_once "./classes/cls_trips.php";

    session_start();

    //if user not logged return him to intro page
    if ($_SESSION['isLogged'] == false) {
        header('location:intro.php');
    }
    ?>

    <div class="scroll-container" data-scroll-container>
        <header class="navbar-wrapper">
            <div class="navbar">
                <div class="logo-wrapper">
                    <h1 class="logo">Divine <span class="logo-end-part">Travel</span></h1>
                </div>
                <div class="nav-wrapper">
                    <a class="shopping-cart-wrapper" href="./cart.php">
                        <div class="cart-count-wrapper">
                            <p class="cart-count">0</p>
                        </div>
                        <p class="shopping-cart-text">Shopping Cart</p>
                    </a>
                    <div class="links-wrapper">
                        <div class="nav-overlay">
                            <ul class="nav-item-wrapper">
                                <li class="nav-item"><a href="./index.php" class="nav-link link-home active">Home</a></li>
                                <li class="nav-item"><a href="./cart.php" class="nav-link link-cart">Shopping Cart</a></li>
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


        <section class="hero" data-scroll-section>
            <div class="first-part__tagline-wrapper">
                <h1 class="tagline">Treat Yourself</h1>
            </div>
            <div class="hero-img-wrapper">
                <div id="curtainJs">
                    <div id="canvas"></div>
                    <div class="curtain">
                        <img class="hero-img" data-sampler="simplePlaneTexture" src="./design/imgs/hero.jpg">
                    </div>
                </div>
            </div>
            <div class="second-part__tagline-wrapper">
                <h1 class="tagline">You Deserve It</h1>
            </div>
        </section>

        <section class="container__filter-products" data-scroll-section>
            <section class="search__filter">
                <div class="search">
                    <label for="search_field">
                        <img class="search_field-icon" src="./design/icons/search.svg">
                    </label>
                    <input type="text" name="search_field" id="search_field" placeholder="search">
                </div>
                <div class="filter">
                    <label class="filter__label">Filter by</label>
                    <span class="filter__icon__wrapper">
                        <img class="filter-icon" src="./design/icons/filter.svg">
                    </span>
                    <div class="filter-menu" data-scroll>
                        <div class="price__filter">
                            <p class="price__filter-label">Price:</p>
                            <div class="price__filter-input">
                                <input class="filter-price" type="radio" name="filter_price" value="price between 500 and 1000" id="price_500_1000">
                                <label for="price_500_1000">500$ - 1000$</label>
                            </div>
                            <div class="price__filter-input">
                                <input class="filter-price" type="radio" name="filter_price" value="price between 1000 and 1500" id="price_1000_1500">
                                <label for="price_1000_1500">1000$ - 1500$</label>
                            </div>
                            <div class="price__filter-input">
                                <input class="filter-price" type="radio" name="filter_price" value="price between 1500 and 2000" id="price_1500_2000">
                                <label for="price_1500_2000">1500$ - 2000$</label>
                            </div>
                        </div>
                        <div class="startPoint__filter">
                            <p class="startPoint__filter-label">Starting Point:</p>
                            <div class="startPoint__filter-input">
                                <input class="filter-startPoint" type="radio" name="startPoint" value="City of Moher" id="City_of_Moher_start">
                                <label for="City_of_Moher_start">City of Moher</label>
                            </div>
                            <div class="startPoint__filter-input">
                                <input class="filter-startPoint" type="radio" name="startPoint" value="Dublin" id="dublin_start">
                                <label for="dublin_start">Dublin</label>
                            </div>
                            <div class="startPoint__filter-input">
                                <input class="filter-startPoint" type="radio" name="startPoint" value="Waterford" id="waterford_start">
                                <label for="waterford_start">Waterford</label>
                            </div>
                            <div class="startPoint__filter-input">
                                <input class="filter-startPoint" type="radio" name="startPoint" value="Galway" id="galway_start">
                                <label for="galway_start">Galway</label>
                            </div>
                            <div class="startPoint__filter-input">
                                <input class="filter-startPoint" type="radio" name="startPoint" value="Cork" id="cork_start">
                                <label for="cork_start">Cork</label>
                            </div>
                        </div>
                        <div class="endPoint__filter">
                            <p class="endPoint__filter-label">Ending Point:</p>
                            <div class="endPoint__filter-input">
                                <input class="filter-endPoint" type="radio" name="endpoint" value="City of Moher" id="City_of_Moher_end">
                                <label for="City_of_Moher_end">City of Moher</label>
                            </div>
                            <div class="endPoint__filter-input">
                                <input class="filter-endPoint" type="radio" name="endpoint" value="Dublin" id="dublin_end">
                                <label for="dublin_end">Dublin</label>
                            </div>
                            <div class="endPoint__filter-input">
                                <input class="filter-endPoint" type="radio" name="endpoint" value="Waterford" id="waterford_end">
                                <label for="waterford_end">Waterford</label>
                            </div>
                            <div class="endPoint__filter-input">
                                <input class="filter-endPoint" type="radio" name="endpoint" value="Galway" id="galway_end">
                                <label for="galway_end">Galway</label>
                            </div>
                            <div class="endPoint__filter-input">
                                <input class="filter-endPoint" type="radio" name="endpoint" value="Cork" id="cork_end">
                                <label for="cork_end">Cork</label>
                            </div>
                        </div>
                        <div class="btn-filter-container">
                            <button class="btn-filter btn-sm">
                                done
                            </button>
                            <button class="btn-unfilter btn-sm">
                                unfilter
                            </button>
                        </div>
                    </div>
                </div>
            </section>
            <section class="all_products">
                <?php

                $result = Trips::fetchAllTrips();

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo ('
                    <section class="products">
                        <div class="product__pin-container product__pin-container-1 product__pin' . $row['tripId'] . '">
                            <div class="product__img-wrapper" data-scroll data-scroll-sticky data-scroll-target=".product__pin' . $row['tripId'] . '">
                                <img data-trip-id = ' . $row['tripId'] . ' class="product__img-img" src="./design/imgs/' . $row['imgsrc'] . '">
                            </div>
                        </div>
                        <div class="product__info">
                            <div class="product__info--section-1">
                                <h3 class="product__name">
                                    <span data-trip-id = ' . $row['tripId'] . '>' . $row['tripName'] . '</span>
                                </h3>
                                <div class="product__desc">
                                    <h3 class="product__desc-title">Description:</h3>
                                    <div class="product__desc-content" data-trip-id = ' . $row['tripId'] . '>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo, enim senectus semper diam. Nibh diam suspendisse posuere leo sed arcu sollicitudin integer enim. Metus, lorem at facilisi malesuada ultrices dui vel vulputate.
                                        Arcu aliquam integer massa vitae. Scelerisque blandit ut eget semper egestas dictum fames sed vel. Amet
                                    </div>
                                </div>
                                <div class="product__additional__info">
                                    <h3 class="product__additional__info-title">Additional Information:</h3>
                                    <div class="product__additional__info-content">
                                        <p class="product__additional__info-starting-point">
                                            Starting Point:
                                            <span class = "trips-start-point" data-trip-id = ' . $row['tripId'] . '>' . $row['startingPoint'] . '</span>
                                        </p>
                                        <p class="product__additional__info-ending-point">
                                            Ending Point:
                                            <span class = "trips-end-point" data-trip-id = ' . $row['tripId'] . '>' . $row['endingPoint'] . '</span>
                                        </p>
                                        <p class="product__additional__info-vacation-point">
                                            Vacation Length:
                                            <span data-trip-id = ' . $row['tripId'] . '>' . $row['vacationLength'] . ' week</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="product__info--section-2">
                                <div class="product__time">
                                    <h3 class="product__time-title">Time:</h3>
                                    <p class="product__time-departure-time">
                                        Departure time:
                                        <span data-trip-id = ' . $row['tripId'] . '>' . $row['startTime'] . '</span>
                                    </p>
                                    <p class="product__time-arrival-time">
                                        Arrival time:
                                        <span data-trip-id = ' . $row['tripId'] . '>' . $row['endTime'] . '</span>
                                    </p>
                                </div>
                                <div class="product__activities">
                                    <h3 class="product__activities-title">Activities:</h3>
                                    <p class="product__activities-content" data-trip-id = ' . $row['tripId'] . '>
                                        ' . $row['activities'] . '
                                    </p>
                                </div>
                                <div class="product__price">
                                    <h3 class="product__price-title">Price:</h3>
                                    <p class="product__price-content" data-trip-id = ' . $row['tripId'] . '>
                                    ' . $row['price'] . '<span class="product__price-content-add-ons"> $ Per Person</span>
                                    </p>
                                </div>
                                <button class="order_now-btn btn " data-trip-id = ' . $row['tripId'] . '>
                                    Order Now
                                </button>
                            </div>
                        </div>                   
                        </section>
                            ');
                }

                ?>

            </section>
        </section>
    </div>
    <!-- EXTERNAL SCRIPTS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- /EXTERNAL SCRIPTS -->
    <script type="module" src="./js/shade.js"></script>
    <script src="./js/trips.js"></script>
    <script src="./ajax/a_trips.js"></script>

</body>

</html>