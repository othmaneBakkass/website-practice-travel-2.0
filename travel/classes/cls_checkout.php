<?php

include_once "dataAccess.php";


class Checkout
{
    //check credit card
    public static function check_card($month_value, $year_value, $holder_value, $number_value, $crypto_value)
    {
        //prepare query
        $query = "SELECT * FROM cartebancaire where cardnumber = '$number_value' and holder = '$holder_value' and yearEx = '$year_value' and monthEx = '$month_value' and crypto = '$crypto_value'";

        //execute query
        $stmt = Dataaccess::check($query); //returns number higher then 0 on success

        if ($stmt <> 0) {
            return true;
        } else {
            return false;
        }
    }
}
