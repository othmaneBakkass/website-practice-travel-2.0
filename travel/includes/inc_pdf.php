<?php

//include necessary classes

include_once '../classes/dataAccess.php';
include_once '../classes/cls_user.php';
include_once '../classes/cls_cart.php';

session_start();
if (isset($_POST['delete_items'])) {
    $response = [];
    //get user id
    $user = unserialize($_SESSION['user']);
    $user_email = $user->get_email();

    //user id
    $user_id = User::get_id($user_email);
    //cart data transfer to orders table
    $transfer = Cart::transferData($user_id);

    if ($transfer) {
        //call delete function
        $result = Cart::cleanUserCart($user_id); //returns true on success

        if ($transfer) {
            array_push($response, ['response' => true]);
        } else {
            array_push($response, ['response' => false]);
        }
    } else {
        array_push($response, ['response' => false]);
    }


    echo json_encode($response);
}
