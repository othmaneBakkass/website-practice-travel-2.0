<?php

//include necessary classes

include_once '../classes/dataAccess.php';
include_once '../classes/cls_user.php';
include_once '../classes/cls_checkout.php';
include_once '../classes/cls_cart.php';

session_start();

if (isset($_POST['key'])) {

    $_SESSION['allowPdf'] = false;
    $response = [];
    //get data
    $month_value = $_POST['month_value'];
    $year_value = $_POST['year_value'];
    $holder_value = $_POST['holder_value'];
    $number_value = $_POST['number_value'];
    $crypto_value = $_POST['crypto_value'];

    //send data
    if (checkout::check_card($month_value, $year_value, $holder_value, $number_value, $crypto_value)) //returns true on success
    {
        //the data is correct now we can the user to enter the PDF page
        $_SESSION['allowPdf'] = true;

        array_push($response, ['response' => true]);
    } else {
        array_push($response, ['response' => false]);
    }

    echo (json_encode($response));
}

if (isset($_POST['pdf'])) {
    $response = [];

    //get data for pdf page

    //get user id
    $user = unserialize($_SESSION['user']);
    $user_email = $user->get_email();

    //user id
    $user_id = User::get_id($user_email);

    //trip name
    $stmt_tripName = Cart::get_tripName($user_id); //returns pdo object
    $tripName = [];

    while ($row = $stmt_tripName->fetch(PDO::FETCH_ASSOC)) {
        array_push($tripName, [$row['tripName']]);
    }


    //trip code
    $stmt_tripCode = Cart::get_tripID($user_id); //returns pdo object
    $tripCode = [];

    while ($row = $stmt_tripCode->fetch(PDO::FETCH_ASSOC)) {
        array_push($tripCode, [$row['tripId']]);
    }

    $tripCodeDate = date("Ymd");

    array_push($tripCode, [$user_id]);
    array_push($tripCode, [$tripCodeDate]);



    //total
    $total = Cart::get_cartTotal($user_id);

    array_push($response, ['response' => true]);
    array_push($response, ['trip_name' => $tripName]);
    array_push($response, ['trip_code' => $tripCode]);
    array_push($response, ['total' => $total]);

    echo (json_encode($response));
}
