<?php

include_once "dataAccess.php";


class Order
{


    //get Trip names in the cart by user id
    public static function get_tripName($user_id)
    {

        //prepare query
        $query = "SELECT tripName FROM orders WHERE userId = '$user_id'";

        //execute query
        $stmt = Dataaccess::selection($query); //returns pdo object on success

        //return pdo object
        return $stmt;
    }


    //get Trip ids in the cart by user id
    public static function get_tripID($user_id)
    {

        //prepare query
        $query = "SELECT tripId FROM orders WHERE userId = '$user_id'";

        //execute query
        $stmt = Dataaccess::selection($query); //returns pdo object on success

        //return pdo object
        return $stmt;
    }

    //get cart Total by user id 
    public static function get_cartTotal($user_id)
    {
        //prepare query
        $query = "SELECT SUM(total) as total FROM orders WHERE userId = '$user_id'";

        //execute query
        $stmt = Dataaccess::selection($query); //returns pdo object on success

        //fetch value
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $total = $row['total'];
        }
        $stmt->closeCursor();

        return $total;
    }
}
