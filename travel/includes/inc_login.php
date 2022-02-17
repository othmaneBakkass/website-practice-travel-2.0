<?php
//include necessary classes
include_once "../classes/cls_user.php";
session_start();
$_SESSION['isLogged'] = false;


//setting the values
$email = $_POST['email'];
$password = $_POST['password'];

//the data response
$response = [];
$info = [];
//check if values are empty
if (isset($email) && isset($password)) {

    //check if user exist
    if (User::checkUser($email, $password)) {

        //get user info
        $info = User::getUserInfo($email, $password);
        $user = new User($info[0]["email"], $info[0]["firstName"], $info[0]["lastName"], $info[0]["userPassword"], $info[0]["birth"], $info[0]["userDate"]);

        //store user in session
        $_SESSION['user'] = serialize($user);
        //allow user to login
        $_SESSION['isLogged'] = true;
        //set up for pdf page
        $_SESSION['allowPdf'] = false;
        //user does exist return a response
        $result = ['response' => true];
    } else {
        $result = ['response' => false];
    }
} else {
    $result = ['response' => false];
}

array_push($response, $result);

echo json_encode($response);
