<?php
include_once '../classes/dataAccess.php';
include_once '../classes/cls_user.php';

session_start();

$firstname = $_POST["firstName"];
$lastname = $_POST["lastName"];
$email = $_POST["email"];
$password = $_POST["password"];
$birth = $_POST["birth"];
$dateAdded = date("Y-m-d");
$result = [];
$_SESSION['isLogged'] = false;
//check if input value is set
if (isset($firstname) && isset($lastname) && isset($email) && isset($password) && isset($birth)) {
    //check email if alredy exist
    if (User::checkEmail($email) == false) {
        //call function to add user
        if (User::addUser($email, $password, $firstname, $lastname, $birth, $dateAdded) === true) {

            //allow user to login
            $_SESSION['isLogged'] = true;
            $user = new user($email, $firstname, $lastname, $password, $birth, $dateAdded);
            $_SESSION['user'] = serialize($user);
            //set up for pdf page
            $_SESSION['allowPdf'] = false;
            $success = ["result" => "true"];
        } else {
            $success = ["result" => "issue adding user",];
        }
    } else {
        $success = ["result" => "email already exists"];
    }
} else {
    $success = ["result" => "inputs are empty"];
}

array_push($result, $success);
$response = json_encode($result);
echo $response;

if (isset($_POST["redirect"])) {
    header("location:index.php");
}
