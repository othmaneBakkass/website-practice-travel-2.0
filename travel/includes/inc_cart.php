<?php
//include necessary classes

include_once '../classes/dataAccess.php';
include_once '../classes/cls_user.php';
include_once '../classes/cls_cart.php';

session_start();

//increase or decrease qte and change the total amount

if (isset($_POST['newQte'])) {
    $response = array();
    //get POST information
    $tripId = $_POST['tripId'];
    $new_qte = $_POST['newQte'];
    //get user id
    $user = unserialize($_SESSION['user']);
    $user_email = $user->get_email();
    //user id
    $user_id = User::get_id($user_email);
    //default price
    $default_price = Cart::get_price($tripId);
    if ($new_qte > 0) {
        $new_total = $default_price * $new_qte;
    } else {
        $new_total = $default_price;
    }
    //update cart 
    if (cart::UpdateCart($user_id, $tripId, $new_qte, $new_total)) //returns true on success
    {
        //get total sum 
        $totalSum = cart::get_cartTotal($user_id);
        //cart is updated : now we return msg , new total of an order , total sum of cart orders
        array_push($response, ["response" => true]);
        array_push($response, ["new_total" => $new_total]);
        array_push($response, ["total_sum" => $totalSum]);
    } else {
        array_push($response, false);
    }

    echo (json_encode($response));
}

//delete row
if (isset($_POST['delete_row'])) {
    $response = [];

    //set trip id
    $trip_id = $_POST['trip_id'];
    //set user id
    $user = unserialize($_SESSION['user']);
    $user_email = $user->get_email();
    //user id
    $user_id = User::get_id($user_email);
    //call delete function
    $stmt = Cart::deleteCartRow($user_id, $trip_id); //returns true on success

    if ($stmt == true) {
        //get total sum 
        $totalSum = cart::get_cartTotal($user_id);
        array_push($response, ['response' => true]);
        array_push($response, ['total' => $totalSum]);
    } else {
        array_push($response, ['response' => false]);
    }

    echo (json_encode($response));
}
