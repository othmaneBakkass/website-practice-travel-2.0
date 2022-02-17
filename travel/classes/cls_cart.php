<?php

include_once "dataAccess.php";

class Cart
{

    //check if order already exists in cart
    public static function checkCart($trip_id, $user_id)
    {
        //prepare query
        $query = "SELECT * FROM cart WHERE userId = $user_id AND tripId = $trip_id";
        //execute the query
        $stmt = Dataaccess::check($query); //returns value > 0 if trip does exist

        if ($stmt <> 0) {
            return true;
        } else {
            return false;
        }
    }

    //insert new order	
    public static function addToCart($user_id, $trip_id, $trip_name, $trip_img, $price, $qte, $total)
    {
        //prepare query
        $query = "INSERT INTO cart (userId,tripId,tripName,tripImg,price,qte,total) VALUES ('$user_id','$trip_id','$trip_name','$trip_img','$price','$qte','$total')";
        //exeucte query
        $stmt = Dataaccess::report($query); //returns the number of affected rows

        if ($stmt > 0) {
            return true;
        } else {
            return false;
        }
    }
    //update order on cart table
    public static function UpdateCart($user_id, $trip_id, $qte, $total)
    {
        //prepare query
        $query = "UPDATE cart SET  qte = '$qte', total = '$total' WHERE  userId = '$user_id' AND tripId = '$trip_id' ";
        //exeucte query
        $stmt = Dataaccess::report($query); //returns the number of affected rows

        if ($stmt > 0) {
            return true;
        } else {
            return false;
        }
    }

    //get current product qte in the cart
    public static function get_qte($user_id, $trip_id)
    {
        //prepare the sql query
        $query = "SELECT qte FROM cart WHERE userId = '$user_id' AND tripId = '$trip_id'";

        //execute the query
        $stmt = Dataaccess::selection($query);
        //check if product exist in cart
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $qte = $row['qte'];
            }
            $stmt->closeCursor();
            return $qte;
        } else {
            return false;
        }
    }

    //get number of products in the cart of a user 
    public static function countOrders($user_id)
    {
        //prepare the sql query
        $query = "SELECT SUM(qte) as nbr FROM cart Where userId = '$user_id'";

        //execute the query
        $stmt = Dataaccess::selection($query);
        //returns number of products in the cart of a user 
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $num = $row['nbr'];
        }
        $stmt->closeCursor();
        return $num;
    }

    //get the price of a Trip
    public static function get_price($trip_id)
    {
        //prepare query
        $query = "SELECT price FROM cart WHERE tripId = '$trip_id' LIMIT 1";
        //execute query
        $stmt = Dataaccess::selection($query); //returns pdo object on success
        //fetch the price value
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $price = $row['price'];
        }
        $stmt->closeCursor();
        //return price value
        return $price;
    }

    //get cart Total by user id 
    public static function get_cartTotal($user_id)
    {
        //prepare query
        $query = "SELECT SUM(total) as total FROM cart WHERE userId = '$user_id'";

        //execute query
        $stmt = Dataaccess::selection($query); //returns pdo object on success

        //fetch value
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $total = $row['total'];
        }
        $stmt->closeCursor();

        return $total;
    }

    //get cart content by user id
    public static function get_cartContent($user_id)
    {

        //prepare query
        $query = "SELECT * FROM cart WHERE userId = '$user_id'";

        //execute query
        $stmt = Dataaccess::selection($query); //returns pdo object on success

        //return pdo object
        return $stmt;
    }

    //get Trip names in the cart by user id
    public static function get_tripName($user_id)
    {

        //prepare query
        $query = "SELECT tripName FROM cart WHERE userId = '$user_id'";

        //execute query
        $stmt = Dataaccess::selection($query); //returns pdo object on success

        //return pdo object
        return $stmt;
    }

    //get Trip ids in the cart by user id
    public static function get_tripID($user_id)
    {

        //prepare query
        $query = "SELECT tripId FROM cart WHERE userId = '$user_id'";

        //execute query
        $stmt = Dataaccess::selection($query); //returns pdo object on success

        //return pdo object
        return $stmt;
    }

    //delete cart row
    public static function deleteCartRow($user_id, $trip_id)
    {

        //prepare query
        $query = "DELETE FROM cart WHERE userId = '$user_id' AND tripId = '$trip_id'";

        //execute query
        $stmt = Dataaccess::report($query); //returns the number of affected rows by the query

        if ($stmt > 0) {
            //success
            return true;
        } else {
            //failure
            return false;
        }
    }

    //clean User Cart
    public static function cleanUserCart($user_id)
    {

        //prepare query
        $query = "DELETE FROM cart WHERE userId = '$user_id'";

        //execute query
        $stmt = Dataaccess::report($query); //returns the number of affected rows by the query

        if ($stmt >= 0) {
            //success
            return true;
        } else {
            //failure
            return false;
        }
    }



    //transfer Data from cart table to orders table
    public static function transferData($user_id)
    {
        //prepare query
        $query = "INSERT INTO orders(cartId,userId,tripId,tripName,tripImg,price,qte,total) SELECT cart.cartId,cart.userId,cart.tripId,cart.tripName,cart.tripImg,cart.price,cart.qte,cart.total FROM cart Where userId = '$user_id'";

        //execute query
        $stmt = Dataaccess::report($query); //returns the number of affected rows by the query

        if ($stmt > 0) {
            //success
            return true;
        } else {
            //failure
            return false;
        }
    }
}
