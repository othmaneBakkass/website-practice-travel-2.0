<?php

//include necessary classes

include_once '../classes/dataAccess.php';
include_once '../classes/cls_trips.php';
include_once '../classes/cls_user.php';
include_once '../classes/cls_cart.php';
session_start();


//search function
if (isset($_POST["search_value"])) {
    $search = ucfirst(strtolower($_POST["search_value"]));
    $stmt = Trips::getTripByName($search);
    if ($stmt <> false) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
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
                                <button class="order_now-btn btn" data-trip-id = ' . $row['tripId'] . '>
                                    Order Now
                                </button>
                            </div>
                        </div>
                </section>
                        ');
        }
    } else {
        echo ('
        <section class="products">
        <h1 class="products__notFound">Not Found</h1>
        </section>
        ');
    }
}

//Filter Function

if (isset($_POST['filter'])) {
    //set variables
    $price = '';
    $start_point = '';
    $end_point = '';

    //check if all elements are not empty
    if (!empty($_POST['price'])) {
        $price = $_POST['price'];
    }

    if (!empty($_POST['start_point'])) {
        $start_point = implode(',', $_POST['start_point']);
    }

    if (!empty($_POST['end_point'])) {
        $end_point = implode(',', $_POST['end_point']);
    }

    //setting up  the query



    //price
    if (empty($_POST['start_point']) and empty($_POST['end_point']) and !empty($_POST['price'])) {
        $query = "SELECT * FROM trips WHERE $price";
    }

    //start point 
    if (!empty($_POST['start_point']) and empty($_POST['end_point']) and empty($_POST['price'])) {
        $query = "SELECT * FROM trips WHERE startingPoint in ('$start_point')";
    }

    //end point 
    if (empty($_POST['start_point']) and !empty($_POST['end_point']) and empty($_POST['price'])) {
        $query = "SELECT * FROM trips WHERE endingPoint in ('$end_point')";
    }

    //price and start point
    if (!empty($_POST['price']) and !empty($_POST['start_point']) and empty($_POST['end_point'])) {
        $query = "SELECT * FROM trips WHERE $price and  startingPoint in ('$start_point')";
    }

    //price and end point
    if (!empty($_POST['price']) and !empty($_POST['end_point']) and empty($_POST['start_point'])) {
        $query = "SELECT * FROM trips WHERE $price and  endingPoint in ('$end_point')";
    }

    //start point and end point
    if (!empty($_POST['start_point']) and !empty($_POST['end_point']) and empty($_POST['price'])) {
        $query = "SELECT * FROM trips WHERE startingPoint in ('$start_point') and endingPoint in ('$end_point')";
    }

    //ALL
    if (!empty($_POST['price']) and !empty($_POST['end_point']) and !empty($_POST['start_point'])) {
        $query = "SELECT * FROM trips WHERE $price and startingPoint in ('$start_point') and endingPoint in ('$end_point')";
    }

    //preparing and executing the query
    $check = Dataaccess::check($query);
    if ($check <> 0) {
        $stmt = Dataaccess::selection($query);
        //fetch the PDO object
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
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
                        <button class="order_now-btn btn" data-trip-id = ' . $row['tripId'] . '>
                            Order Now
                        </button>
                    </div>
                </div>
        </section>
                ');
        }
    } else {
        echo ('<section class="products"><h1 class="products__notFound">Not Found</h1></section>');
    }
}

//unfilter function

if (isset($_POST['unfilter'])) {
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
                    <button class="order_now-btn btn" data-trip-id = ' . $row['tripId'] . '>
                        Order Now
                    </button>
                </div>
            </div>                   
            </section>
                ');
    }
}


//add order function

if (isset($_POST['order'])) {

    $response = [];

    $user = unserialize($_SESSION['user']);
    $user_email = $user->get_email();
    //get user id
    $user_id = User::get_id($user_email);
    //get trip id
    $trip_id = $_POST['tripId'];
    //get trip info
    $stmt = Trips::getTripByID($trip_id); //returns object
    //fetch necessary data
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $trip_name = $row['tripName'];
        $trip_img = $row['imgsrc'];
        $trip_price = $row['price'];
    }
    $stmt->closeCursor();
    //set defaults for total and qte
    $default_qte = 1;
    $default_total = $trip_price;

    //check if the trip already exists in the cart table 
    if (cart::checkCart($trip_id, $user_id) === true) //returns true if trip does exist in cart
    {
        //get current qte number
        $current_qte = cart::get_qte($user_id, $trip_id);
        $new_qte =  (int)$current_qte + 1;
        $new_total = $default_total * $new_qte;
        //update cart instead of inserting new trip
        if (cart::UpdateCart($user_id, $trip_id, $new_qte, $new_total)) //returns true on success
        {
            array_push($response, true);
        } else {
            array_push($response, false);
        }
    } else {
        //insert
        if (cart::addToCart($user_id, $trip_id, $trip_name, $trip_img, $trip_price, $default_qte, $default_total)) //returns true on success
        {
            array_push($response, true);
        } else {
            array_push($response, false);
        }
    }
    //get number of products in cart after insert or update
    $numberOfTrips = Cart::countOrders($user_id);
    array_push($response, $numberOfTrips);
    echo (json_encode($response));
}

//get number of products in user's cart from database

if (isset($_POST['allowCartCount'])) {

    $user = unserialize($_SESSION['user']);
    $user_email = $user->get_email();

    //get user id
    $user_id = User::get_id($user_email);

    //get initial number of products in cart
    $numberOfTrips = Cart::countOrders($user_id);
    $response = ['number' => $numberOfTrips];
    echo (json_encode($response));
}
